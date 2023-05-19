<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
include_once __DIR__ . "/../classes/permissions.php";
include_once __DIR__ . "/../classes/roles.php";
include_once __DIR__ . "/../classes/departamentos.php";
require_once __DIR__ . "/../config/PHPMailer/src/PHPMailer.php";
require_once __DIR__ . "/../config/PHPMailer/src/Exception.php";
require_once __DIR__ . "/../config/PHPMailer/src/SMTP.php";
class incidencias {
	public $usuario_id;
	public $usuario_rol;
	public $titulo_incidencia;
    
	public function __construct($user_id, $user_rol, $incident_title){
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
        $this->titulo_incidencia = $incident_title;
	}

	public static function tempnam_sfx($path, $suffix){
        do {
            $file = $path."/".mt_rand().".".$suffix;
            $fp = @fopen($file, 'x');
        }
        while(!$fp);
    
        fclose($fp);
        return $file;
    }

	public static function sendEmail($incidencia_id, $jefe_array, $tipoincidencia){
		$object = new connection_database();
		$crud = new crud();
		$sql = $object->_db->prepare('SELECT CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) as nombre FROM incidencias INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id WHERE incidencias.id=:incidenciaid');
		$sql -> execute(array(':incidenciaid' => $incidencia_id));
		$row_user_incidencia = $sql ->fetch(PDO::FETCH_OBJ);
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$path = dirname($path);
		$links = $path. "/layouts/solicitud_incidencia.php";
		$mail=new PHPMailer\PHPMailer\PHPMailer();
		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->SMTPDebug = 0;
		$mail->SMTPSecure = 'tls'; 
		$mail->Host = 'mail.sinttecom.com'; 
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->Port = 587;
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "ntf_sinttecom_noreply@sinttecom.com"; // SMTP username
		$mail->Password = "k8@SY#xR"; // SMTP password
		$mail->IsHTML(true);
		$lista_correos = Array();
		foreach($jefe_array as $correo){
			foreach($correo as $value){
				$mail->AddAddress($value);
				$lista_correos[]=$value;
			}
		}
		$correos= implode(', ', $lista_correos);
		$mail->SetFrom($mail -> Username, 'Sinttecom Intranet');
		$mail->AddReplyTo($mail -> Username, 'Sinttecom Intranet');
		$mail->Subject  = "Solicitud de aprobación de incidencias";
		$mail->Body     = "Buen día ".$correos.": <br> El usuario ".$row_user_incidencia -> nombre." ha solicitado un " .$tipoincidencia. " <br> Haga clic en el link a continuación para ver la incidencia y evaluarla: <br> $links";
		$mail->WordWrap = 50;
		$mail->CharSet = "UTF-8";
		if(!$mail->Send()) {
			echo 'Message was not sent.';
			echo 'Mailer error: ' . $mail->ErrorInfo;
		}
	}

	public static function Almacenar_estatus($incidenciaid, $estatus, $sueldo, $nombre, $apellido_pat, $apellido_mat, $comentario){
		$check_incidencia = Incidencias::Checkincidencia($incidenciaid);
		if($check_incidencia > 0 ){
			$object = new connection_database();
			$crud = new crud();
			$nombre_completo = $nombre. ' ' .$apellido_pat. ' ' .$apellido_mat;
			$crud -> store ('accion_incidencias', ['incidencias_id' => $incidenciaid, 'tipo_de_accion' => $estatus, 'goce_de_sueldo' => $sueldo, 'comentario' => $comentario, 'evaluado_por' => $nombre_completo]);
			$update_state = $object -> _db -> prepare("UPDATE incidencias i INNER JOIN (SELECT transicion_estatus_incidencia.incidencias_id, transicion_estatus_incidencia.estatus_siguiente FROM transicion_estatus_incidencia WHERE transicion_estatus_incidencia.incidencias_id=:incidenciaid ORDER BY transicion_estatus_incidencia.id desc LIMIT 1) temp ON i.id=temp.incidencias_id INNER JOIN solicitudes_incidencias ON i.id_solicitud_incidencias=solicitudes_incidencias.id SET solicitudes_incidencias.estatus = temp.estatus_siguiente");
			$update_state -> execute(array(':incidenciaid' => $incidenciaid));
			/*Incidencias::getResponse($incidenciaid, $estatus);*/
		}else{
			die(json_encode(array("failed", "La incidencia ya no existe!")));
		}
	}
	
	public static function Checkincidencia($id){
		$object = new connection_database();
		$editar = $object -> _db->prepare("SELECT * FROM incidencias WHERE id=:incidenciaid");
		$editar->bindParam("incidenciaid", $id ,PDO::PARAM_INT);
		$editar->execute();
		$check_incidencia=$editar->rowCount();
		return $check_incidencia;
	}
}

interface tipo_permiso {
	public function reglamentario_descriptivo($permiso_r, $fechainicio_pd, $fechafin_pd, $filename_justificante_permiso_r, $justificante_permiso_r);
	public function reglamentario_no_descriptivo($permiso_r, $periodo_pnd, $motivo_pnd, $filename_justificante_permiso_r, $justificante_permiso_r);
	public function no_reglamentario_g($permiso_nr, $periodo_pnr_fh, $motivo_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr);
	public function no_reglamentario_a($permiso_nr, $periodo_pnr_f, $motivo_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr);
}

class permiso extends incidencias implements tipo_permiso {
	public $tipo_permiso;
	public function __construct($user_id, $user_rol, $incident_title, $permission_type) {
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
		$this->titulo_incidencia = $incident_title;
		$this->tipo_permiso = $permission_type;
	}

	//CREACION DE PERMISOS
	public function reglamentario_descriptivo($permiso_r, $fechainicio_pd, $fechafin_pd, $filename_justificante_permiso_r, $justificante_permiso_r){
		$object = new connection_database();
		$crud = new crud();
		if(Roles::FetchSessionRol($this->usuario_rol) != "Superadministrador" && Roles::FetchSessionRol($this->usuario_rol) != "Administrador" && Roles::FetchSessionRol($this->usuario_rol) != "Director general" && Roles::FetchSessionRol($this->usuario_rol) != "Usuario externo" && Roles::FetchSessionRol($this->usuario_rol) != ""){
			$select = $object -> _db ->prepare("SELECT u1.correo FROM jerarquia j1 INNER JOIN roles r1 ON r1.id = j1.rol_id INNER JOIN usuarios u1 ON u1.roles_id = r1.id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id WHERE IF(d1.departamento IS NULL, d1.departamento IS NULL, d1.departamento = :departamento1) AND r1.nombre =(SELECT CASE WHEN r6.nombre = 'Director' THEN (SELECT r2.nombre FROM jerarquia j2 INNER JOIN roles r2 ON j2.rol_id = r2.id INNER JOIN usuarios u2 ON u2.roles_id = r2.id LEFT JOIN departamentos d2 ON d2.id = u2.departamento_id WHERE r2.nombre =(SELECT r4.nombre FROM jerarquia j3 INNER JOIN roles r3 ON r3.id=j3.rol_id INNER JOIN jerarquia j4 ON j4.id = j3.jerarquia_id INNER JOIN roles r4 ON r4.id = j4.rol_id WHERE r4.nombre = 'Director') AND d2.departamento = :departamento2 UNION SELECT 'Director general' LIMIT 1) ELSE r6.nombre END FROM jerarquia j5 INNER JOIN roles r5 ON r5.id = j5.rol_id INNER JOIN jerarquia j6 ON j6.id = j5.jerarquia_id INNER JOIN roles r6 ON r6.id = j6.rol_id WHERE r5.nombre = :rolnom)");
			$select -> execute(array(':departamento1' => Roles::FetchUserDepartamento($this->usuario_id), ':departamento2' => Roles::FetchUserDepartamento($this->usuario_id), ':rolnom' => Roles::FetchSessionRol($this->usuario_rol)));
			$select_count = $select -> rowCount();
			if($select_count > 0){
				$jefe_array = $select -> fetchAll(PDO::FETCH_ASSOC);
				$check_jefe = $object -> _db -> prepare("SELECT t1.id AS jerarquiaid, b.nombre as jefe FROM jerarquia t1 RIGHT JOIN roles a ON t1.rol_id=a.id LEFT JOIN usuarios u ON u.roles_id=a.id LEFT JOIN jerarquia t2 ON t1.jerarquia_id = t2.id LEFT JOIN roles b ON t2.rol_id=b.id WHERE u.id=:userid");
				$check_jefe -> execute(array(':userid' => $this->usuario_id ));
				$row_jefe = $check_jefe->fetch(PDO::FETCH_OBJ);
				if(!(is_null($row_jefe -> jerarquiaid))){
					$crud -> store ('solicitudes_incidencias', ['users_id' => $this->usuario_id]);
					$solicitud_id = $object -> _db -> lastInsertId();
					foreach($jefe_array as $correos){
						foreach($correos as $correo){
							$selectid = $object -> _db -> prepare("SELECT id from usuarios where correo=:correo");
							$selectid -> execute(array('correo' => $correo));
							$insertid = $selectid -> fetch(PDO::FETCH_OBJ);
							$crud -> store ('notificaciones_incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_notificado' => $insertid -> id]);
						}
					}
					if($filename_justificante_permiso_r != null && $justificante_permiso_r != null){
						$fecha_periodo = $fechainicio_pd. " - " .$fechafin_pd;
						$location = "../src/permisos_reglamentarios/permisos_descriptivos/";
						$ext = pathinfo($filename_justificante_permiso_r, PATHINFO_EXTENSION);
						$uploadfile = Incidencias::tempnam_sfx($location, $ext);
						if(move_uploaded_file($justificante_permiso_r['tmp_name'],$uploadfile)){
							$crud -> store ('permisos_reglamentarios', ['titulo_permiso_reglamentario' => $this->titulo_incidencia, 'permiso_r' => $permiso_r, 'periodo_ausencia_r' => $fecha_periodo, 'nombre_justificante_r' => $filename_justificante_permiso_r, 'identificador_justificante_r' => basename($uploadfile)]);
						}
					}else{
						$crud -> store ('permisos_reglamentarios', ['titulo_permiso_reglamentario' => $this->titulo_incidencia, 'permiso_r' => $permiso_r, 'periodo_ausencia_r' => $fecha_periodo, 'nombre_justificante_r' => $filename_justificante_permiso_r, 'identificador_justificante_r' => $justificante_permiso_r]);
					}
					$permiso_id = $object -> _db -> lastInsertId();
					$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_permiso_reglamentario' => $permiso_id]);
					$incidencia_id = $object -> _db -> lastInsertId();
					Incidencias::sendEmail($incidencia_id, $jefe_array, "permiso reglamentario descriptivo");
				}else if(is_null($row_jefe -> jerarquiaid)){
					die(json_encode(array("error", "Su usuario no está en la jerarquía")));
				}
			}else{
				die(json_encode(array("error", "No tiene un jefe asignado")));
			}
		}
	}

	//Permiso reglamentario OTRO/HOME OFFICE
	public function reglamentario_no_descriptivo($permiso_r, $periodo_pnd, $motivo_pnd, $filename_justificante_permiso_r, $justificante_permiso_r){
		$object = new connection_database();
		$crud = new crud();
		if(Roles::FetchSessionRol($this->usuario_rol) != "Superadministrador" && Roles::FetchSessionRol($this->usuario_rol) != "Administrador" && Roles::FetchSessionRol($this->usuario_rol) != "Director general" && Roles::FetchSessionRol($this->usuario_rol) != "Usuario externo" && Roles::FetchSessionRol($this->usuario_rol) != ""){
			$select = $object -> _db ->prepare("SELECT u1.correo FROM jerarquia j1 INNER JOIN roles r1 ON r1.id = j1.rol_id INNER JOIN usuarios u1 ON u1.roles_id = r1.id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id WHERE IF(d1.departamento IS NULL, d1.departamento IS NULL, d1.departamento = :departamento1) AND r1.nombre =(SELECT CASE WHEN r6.nombre = 'Director' THEN (SELECT r2.nombre FROM jerarquia j2 INNER JOIN roles r2 ON j2.rol_id = r2.id INNER JOIN usuarios u2 ON u2.roles_id = r2.id LEFT JOIN departamentos d2 ON d2.id = u2.departamento_id WHERE r2.nombre =(SELECT r4.nombre FROM jerarquia j3 INNER JOIN roles r3 ON r3.id=j3.rol_id INNER JOIN jerarquia j4 ON j4.id = j3.jerarquia_id INNER JOIN roles r4 ON r4.id = j4.rol_id WHERE r4.nombre = 'Director') AND d2.departamento = :departamento2 UNION SELECT 'Director general' LIMIT 1) ELSE r6.nombre END FROM jerarquia j5 INNER JOIN roles r5 ON r5.id = j5.rol_id INNER JOIN jerarquia j6 ON j6.id = j5.jerarquia_id INNER JOIN roles r6 ON r6.id = j6.rol_id WHERE r5.nombre = :rolnom)");
			$select -> execute(array(':departamento1' => Roles::FetchUserDepartamento($this->usuario_id), ':departamento2' => Roles::FetchUserDepartamento($this->usuario_id), ':rolnom' => Roles::FetchSessionRol($this->usuario_rol)));
			$select_count = $select -> rowCount();
			if($select_count > 0){
				$jefe_array = $select -> fetchAll(PDO::FETCH_ASSOC);
				$check_jefe = $object -> _db -> prepare("SELECT t1.id AS jerarquiaid, b.nombre as jefe FROM jerarquia t1 RIGHT JOIN roles a ON t1.rol_id=a.id LEFT JOIN usuarios u ON u.roles_id=a.id LEFT JOIN jerarquia t2 ON t1.jerarquia_id = t2.id LEFT JOIN roles b ON t2.rol_id=b.id WHERE u.id=:userid");
				$check_jefe -> execute(array(':userid' => $this->usuario_id ));
				$row_jefe = $check_jefe->fetch(PDO::FETCH_OBJ);
				if(!(is_null($row_jefe -> jerarquiaid))){
					$crud -> store ('solicitudes_incidencias', ['users_id' => $this->usuario_id]);
					$solicitud_id = $object -> _db -> lastInsertId();
					foreach($jefe_array as $correos){
						foreach($correos as $correo){
							$selectid = $object -> _db -> prepare("SELECT id from usuarios where correo=:correo");
							$selectid -> execute(array('correo' => $correo));
							$insertid = $selectid -> fetch(PDO::FETCH_OBJ);
							$crud -> store ('notificaciones_incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_notificado' => $insertid -> id]);
						}
					}
					if($filename_justificante_permiso_r != null && $justificante_permiso_r != null){
						$location = "../src/permisos_reglamentarios/permisos_no_descriptivos/";
						$ext = pathinfo($filename_justificante_permiso_r, PATHINFO_EXTENSION);
						$uploadfile = Incidencias::tempnam_sfx($location, $ext);
						if(move_uploaded_file($justificante_permiso_r['tmp_name'],$uploadfile)){
							$crud -> store ('permisos_reglamentarios', ['titulo_permiso_reglamentario' => $this->titulo_incidencia, 'permiso_r' => $permiso_r, 'periodo_ausencia_r' => $periodo_pnd, 'motivo_permiso_r' => $motivo_pnd, 'nombre_justificante_r' => $filename_justificante_permiso_r, 'identificador_justificante_r' => basename($uploadfile)]);
						}
					}else{
						$crud -> store ('permisos_reglamentarios', ['titulo_permiso_reglamentario' => $this->titulo_incidencia, 'permiso_r' => $permiso_r, 'periodo_ausencia_r' => $periodo_pnd, 'motivo_permiso_r' => $motivo_pnd, 'nombre_justificante_r' => $filename_justificante_permiso_r, 'identificador_justificante_r' => $justificante_permiso_r]);
					}
					$permiso_id = $object -> _db -> lastInsertId();
					$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_permiso_reglamentario' => $permiso_id]);
					$incidencia_id = $object -> _db -> lastInsertId();
					Incidencias::sendEmail($incidencia_id, $jefe_array, "permiso reglamentario no descriptivo");
				}else if(is_null($row_jefe -> jerarquiaid)){
					die(json_encode(array("error", "Su usuario no está en la jerarquía")));
				}
			}else{
				die(json_encode(array("error", "No tiene un jefe asignado")));
			}
		}
	}

	public function no_reglamentario_g($permiso_nr, $periodo_pnr_fh, $motivo_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr){
		$object = new connection_database();
		$crud = new crud();
		if(Roles::FetchSessionRol($this->usuario_rol) != "Superadministrador" && Roles::FetchSessionRol($this->usuario_rol) != "Administrador" && Roles::FetchSessionRol($this->usuario_rol) != "Director general" && Roles::FetchSessionRol($this->usuario_rol) != "Usuario externo" && Roles::FetchSessionRol($this->usuario_rol) != ""){
			$select = $object -> _db ->prepare("SELECT u1.correo FROM jerarquia j1 INNER JOIN roles r1 ON r1.id = j1.rol_id INNER JOIN usuarios u1 ON u1.roles_id = r1.id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id WHERE IF(d1.departamento IS NULL, d1.departamento IS NULL, d1.departamento = :departamento1) AND r1.nombre =(SELECT CASE WHEN r6.nombre = 'Director' THEN (SELECT r2.nombre FROM jerarquia j2 INNER JOIN roles r2 ON j2.rol_id = r2.id INNER JOIN usuarios u2 ON u2.roles_id = r2.id LEFT JOIN departamentos d2 ON d2.id = u2.departamento_id WHERE r2.nombre =(SELECT r4.nombre FROM jerarquia j3 INNER JOIN roles r3 ON r3.id=j3.rol_id INNER JOIN jerarquia j4 ON j4.id = j3.jerarquia_id INNER JOIN roles r4 ON r4.id = j4.rol_id WHERE r4.nombre = 'Director') AND d2.departamento = :departamento2 UNION SELECT 'Director general' LIMIT 1) ELSE r6.nombre END FROM jerarquia j5 INNER JOIN roles r5 ON r5.id = j5.rol_id INNER JOIN jerarquia j6 ON j6.id = j5.jerarquia_id INNER JOIN roles r6 ON r6.id = j6.rol_id WHERE r5.nombre = :rolnom)");
			$select -> execute(array(':departamento1' => Roles::FetchUserDepartamento($this->usuario_id), ':departamento2' => Roles::FetchUserDepartamento($this->usuario_id), ':rolnom' => Roles::FetchSessionRol($this->usuario_rol)));
			$select_count = $select -> rowCount();
			if($select_count > 0){
				$jefe_array = $select -> fetchAll(PDO::FETCH_ASSOC);
				$check_jefe = $object -> _db -> prepare("SELECT t1.id AS jerarquiaid, b.nombre as jefe FROM jerarquia t1 RIGHT JOIN roles a ON t1.rol_id=a.id LEFT JOIN usuarios u ON u.roles_id=a.id LEFT JOIN jerarquia t2 ON t1.jerarquia_id = t2.id LEFT JOIN roles b ON t2.rol_id=b.id WHERE u.id=:userid");
				$check_jefe -> execute(array(':userid' => $this->usuario_id ));
				$row_jefe = $check_jefe->fetch(PDO::FETCH_OBJ);
				if(!(is_null($row_jefe -> jerarquiaid))){
					$crud -> store ('solicitudes_incidencias', ['users_id' => $this->usuario_id]);
					$solicitud_id = $object -> _db -> lastInsertId();
					foreach($jefe_array as $correos){
						foreach($correos as $correo){
							$selectid = $object -> _db -> prepare("SELECT id from usuarios where correo=:correo");
							$selectid -> execute(array('correo' => $correo));
							$insertid = $selectid -> fetch(PDO::FETCH_OBJ);
							$crud -> store ('notificaciones_incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_notificado' => $insertid -> id]);
						}
					}
					if($filename_justificante_permiso_nr != null && $justificante_permiso_nr != null){
						$location = "../src/permisos_no_reglamentarios/no_reglamentario_g/";
						$ext = pathinfo($filename_justificante_permiso_nr, PATHINFO_EXTENSION);
						$uploadfile = Incidencias::tempnam_sfx($location, $ext);
						if(move_uploaded_file($justificante_permiso_nr['tmp_name'],$uploadfile)){
							$crud -> store ('permisos_no_reglamentarios', ['titulo_permiso_no_reglamentario' => $this->titulo_incidencia, 'permiso_nr' => $permiso_nr, 'periodo_ausencia_nr' => $periodo_pnr_fh, 'motivo_permiso_nr' => $motivo_permiso_nr, 'posee_jpermiso_nr' => $posee_jpermiso_nr,'nombre_justificante_nr' => $filename_justificante_permiso_nr, 'identificador_justificante_nr' => basename($uploadfile)]);
						}
					}else{
						$crud -> store ('permisos_no_reglamentarios', ['titulo_permiso_no_reglamentario' => $this->titulo_incidencia, 'permiso_nr' => $permiso_nr, 'periodo_ausencia_nr' => $periodo_pnr_fh, 'motivo_permiso_nr' => $motivo_permiso_nr, 'posee_jpermiso_nr' => $posee_jpermiso_nr, 'nombre_justificante_nr' => $filename_justificante_permiso_nr, 'identificador_justificante_nr' => $justificante_permiso_nr]);
					}
					$permiso_id = $object -> _db -> lastInsertId();
					$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_permiso_no_reglamentario' => $permiso_id]);
					$incidencia_id = $object -> _db -> lastInsertId();
					Incidencias::sendEmail($incidencia_id, $jefe_array, "permiso no reglamentario general");
				}else if(is_null($row_jefe -> jerarquiaid)){
					die(json_encode(array("error", "Su usuario no está en la jerarquía")));
				}
			}else{
				die(json_encode(array("error", "No tiene un jefe asignado")));
			}
		}
	}

	public function no_reglamentario_a($permiso_nr, $periodo_pnr_f, $motivo_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr){
		$object = new connection_database();
		$crud = new crud();
		if(Roles::FetchSessionRol($this->usuario_rol) != "Superadministrador" && Roles::FetchSessionRol($this->usuario_rol) != "Administrador" && Roles::FetchSessionRol($this->usuario_rol) != "Director general" && Roles::FetchSessionRol($this->usuario_rol) != "Usuario externo" && Roles::FetchSessionRol($this->usuario_rol) != ""){
			$select = $object -> _db ->prepare("SELECT u1.correo FROM jerarquia j1 INNER JOIN roles r1 ON r1.id = j1.rol_id INNER JOIN usuarios u1 ON u1.roles_id = r1.id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id WHERE IF(d1.departamento IS NULL, d1.departamento IS NULL, d1.departamento = :departamento1) AND r1.nombre =(SELECT CASE WHEN r6.nombre = 'Director' THEN (SELECT r2.nombre FROM jerarquia j2 INNER JOIN roles r2 ON j2.rol_id = r2.id INNER JOIN usuarios u2 ON u2.roles_id = r2.id LEFT JOIN departamentos d2 ON d2.id = u2.departamento_id WHERE r2.nombre =(SELECT r4.nombre FROM jerarquia j3 INNER JOIN roles r3 ON r3.id=j3.rol_id INNER JOIN jerarquia j4 ON j4.id = j3.jerarquia_id INNER JOIN roles r4 ON r4.id = j4.rol_id WHERE r4.nombre = 'Director') AND d2.departamento = :departamento2 UNION SELECT 'Director general' LIMIT 1) ELSE r6.nombre END FROM jerarquia j5 INNER JOIN roles r5 ON r5.id = j5.rol_id INNER JOIN jerarquia j6 ON j6.id = j5.jerarquia_id INNER JOIN roles r6 ON r6.id = j6.rol_id WHERE r5.nombre = :rolnom)");
			$select -> execute(array(':departamento1' => Roles::FetchUserDepartamento($this->usuario_id), ':departamento2' => Roles::FetchUserDepartamento($this->usuario_id), ':rolnom' => Roles::FetchSessionRol($this->usuario_rol)));
			$select_count = $select -> rowCount();
			if($select_count > 0){
				$jefe_array = $select -> fetchAll(PDO::FETCH_ASSOC);
				$check_jefe = $object -> _db -> prepare("SELECT t1.id AS jerarquiaid, b.nombre as jefe FROM jerarquia t1 RIGHT JOIN roles a ON t1.rol_id=a.id LEFT JOIN usuarios u ON u.roles_id=a.id LEFT JOIN jerarquia t2 ON t1.jerarquia_id = t2.id LEFT JOIN roles b ON t2.rol_id=b.id WHERE u.id=:userid");
				$check_jefe -> execute(array(':userid' => $this->usuario_id ));
				$row_jefe = $check_jefe->fetch(PDO::FETCH_OBJ);
				if(!(is_null($row_jefe -> jerarquiaid))){
					$crud -> store ('solicitudes_incidencias', ['users_id' => $this->usuario_id]);
					$solicitud_id = $object -> _db -> lastInsertId();
					foreach($jefe_array as $correos){
						foreach($correos as $correo){
							$selectid = $object -> _db -> prepare("SELECT id from usuarios where correo=:correo");
							$selectid -> execute(array('correo' => $correo));
							$insertid = $selectid -> fetch(PDO::FETCH_OBJ);
							$crud -> store ('notificaciones_incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_notificado' => $insertid -> id]);
						}
					}
					if($filename_justificante_permiso_nr != null && $justificante_permiso_nr != null){
						$location = "../src/permisos_no_reglamentarios/no_reglamentario_a/";
						$ext = pathinfo($filename_justificante_permiso_nr, PATHINFO_EXTENSION);
						$uploadfile = Incidencias::tempnam_sfx($location, $ext);
						if(move_uploaded_file($justificante_permiso_nr['tmp_name'],$uploadfile)){
							$crud -> store ('permisos_no_reglamentarios', ['titulo_permiso_no_reglamentario' => $this->titulo_incidencia, 'permiso_nr' => $permiso_nr, 'periodo_ausencia_nr' => $periodo_pnr_f, 'motivo_permiso_nr' => $motivo_permiso_nr, 'posee_jpermiso_nr' => $posee_jpermiso_nr,'nombre_justificante_nr' => $filename_justificante_permiso_nr, 'identificador_justificante_nr' => basename($uploadfile)]);
						}
					}else{
						$crud -> store ('permisos_no_reglamentarios', ['titulo_permiso_no_reglamentario' => $this->titulo_incidencia, 'permiso_nr' => $permiso_nr, 'periodo_ausencia_nr' => $periodo_pnr_f, 'motivo_permiso_nr' => $motivo_permiso_nr, 'posee_jpermiso_nr' => $posee_jpermiso_nr, 'nombre_justificante_nr' => $filename_justificante_permiso_nr, 'identificador_justificante_nr' => $justificante_permiso_nr]);
					}
					$permiso_id = $object -> _db -> lastInsertId();
					$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_permiso_no_reglamentario' => $permiso_id]);
					$incidencia_id = $object -> _db -> lastInsertId();
					Incidencias::sendEmail($incidencia_id, $jefe_array, "permiso no reglamentario ausencia");
				}else if(is_null($row_jefe -> jerarquiaid)){
					die(json_encode(array("error", "Su usuario no está en la jerarquía")));
				}
			}else{
				die(json_encode(array("error", "No tiene un jefe asignado")));
			}
		}
	}
	//TERMINA LA CREACION DE PERMISOS
}

class incapacidades extends incidencias{
	public function __construct($user_id, $user_rol, $incident_title) {
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
		$this->titulo_incidencia = $incident_title;
	}

	public function crear_incapacidad($periodo_incapacidad, $motivo_incapacidad, $filename_comprobante_incapacidad, $comprobante_incapacidad){
		$object = new connection_database();
		$crud = new crud();
		if(Roles::FetchSessionRol($this->usuario_rol) != "Superadministrador" && Roles::FetchSessionRol($this->usuario_rol) != "Administrador" && Roles::FetchSessionRol($this->usuario_rol) != "Director general" && Roles::FetchSessionRol($this->usuario_rol) != "Usuario externo" && Roles::FetchSessionRol($this->usuario_rol) != ""){
			$select = $object -> _db ->prepare("SELECT u1.correo FROM jerarquia j1 INNER JOIN roles r1 ON r1.id = j1.rol_id INNER JOIN usuarios u1 ON u1.roles_id = r1.id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id WHERE IF(d1.departamento IS NULL, d1.departamento IS NULL, d1.departamento = :departamento1) AND r1.nombre =(SELECT CASE WHEN r6.nombre = 'Director' THEN (SELECT r2.nombre FROM jerarquia j2 INNER JOIN roles r2 ON j2.rol_id = r2.id INNER JOIN usuarios u2 ON u2.roles_id = r2.id LEFT JOIN departamentos d2 ON d2.id = u2.departamento_id WHERE r2.nombre =(SELECT r4.nombre FROM jerarquia j3 INNER JOIN roles r3 ON r3.id=j3.rol_id INNER JOIN jerarquia j4 ON j4.id = j3.jerarquia_id INNER JOIN roles r4 ON r4.id = j4.rol_id WHERE r4.nombre = 'Director') AND d2.departamento = :departamento2 UNION SELECT 'Director general' LIMIT 1) ELSE r6.nombre END FROM jerarquia j5 INNER JOIN roles r5 ON r5.id = j5.rol_id INNER JOIN jerarquia j6 ON j6.id = j5.jerarquia_id INNER JOIN roles r6 ON r6.id = j6.rol_id WHERE r5.nombre = :rolnom)");
			$select -> execute(array(':departamento1' => Roles::FetchUserDepartamento($this->usuario_id), ':departamento2' => Roles::FetchUserDepartamento($this->usuario_id), ':rolnom' => Roles::FetchSessionRol($this->usuario_rol)));
			$select_count = $select -> rowCount();
			if($select_count > 0){
				$jefe_array = $select -> fetchAll(PDO::FETCH_ASSOC);
				$check_jefe = $object -> _db -> prepare("SELECT t1.id AS jerarquiaid, b.nombre as jefe FROM jerarquia t1 RIGHT JOIN roles a ON t1.rol_id=a.id LEFT JOIN usuarios u ON u.roles_id=a.id LEFT JOIN jerarquia t2 ON t1.jerarquia_id = t2.id LEFT JOIN roles b ON t2.rol_id=b.id WHERE u.id=:userid");
				$check_jefe -> execute(array(':userid' => $this->usuario_id ));
				$row_jefe = $check_jefe->fetch(PDO::FETCH_OBJ);
				if(!(is_null($row_jefe -> jerarquiaid))){
					$crud -> store ('solicitudes_incidencias', ['users_id' => $this->usuario_id]);
					$solicitud_id = $object -> _db -> lastInsertId();
					foreach($jefe_array as $correos){
						foreach($correos as $correo){
							$selectid = $object -> _db -> prepare("SELECT id from usuarios where correo=:correo");
							$selectid -> execute(array('correo' => $correo));
							$insertid = $selectid -> fetch(PDO::FETCH_OBJ);
							$crud -> store ('notificaciones_incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_notificado' => $insertid -> id]);
						}
					}
					if($filename_comprobante_incapacidad != null && $comprobante_incapacidad != null){
						$location = "../src/incapacidades/";
						$ext = pathinfo($filename_comprobante_incapacidad, PATHINFO_EXTENSION);
						$uploadfile = Incidencias::tempnam_sfx($location, $ext);
						if(move_uploaded_file($comprobante_incapacidad['tmp_name'],$uploadfile)){
							$crud -> store ('incapacidades', ['titulo_incapacidad' => $this->titulo_incidencia, 'periodo_incapacidad' => $periodo_incapacidad, 'motivo_incapacidad' => $motivo_incapacidad, 'nombre_justificante_incapacidad' => $filename_comprobante_incapacidad, 'archivo_identificador_incapacidad' => basename($uploadfile)]);
						}
					}else{
						$crud -> store ('incapacidades', ['titulo_incapacidad' => $this->titulo_incidencia, 'periodo_incapacidad' => $periodo_incapacidad, 'motivo_incapacidad' => $motivo_incapacidad, 'nombre_justificante_incapacidad' => $filename_comprobante_incapacidad, 'archivo_identificador_incapacidad' => $comprobante_incapacidad]);
					}
					$incapacidad_id = $object -> _db -> lastInsertId();
					$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_incapacidades' => $incapacidad_id]);
					$incidencia_id = $object -> _db -> lastInsertId();
					Incidencias::sendEmail($incidencia_id, $jefe_array, "incapacidad");
				}else if(is_null($row_jefe -> jerarquiaid)){
					die(json_encode(array("error", "Su usuario no está en la jerarquía")));
				}
			}else{
				die(json_encode(array("error", "No tiene un jefe asignado")));
			}
		}
	}
}

class actas extends incidencias{
	public function __construct($user_id, $user_rol, $incident_title) {
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
		$this->titulo_incidencia = $incident_title;
	}

	public function crear_acta($caja_empleado, $caja_empleado_text, $fecha_acta, $motivo_acta, $obcomen_acta){
		$object = new connection_database();
		$crud = new crud();
		if(Roles::FetchSessionRol($this->usuario_rol) != "Usuario externo" && Roles::FetchSessionRol($this->usuario_rol) != ""){
			$crud -> store ('incidencias_acta_administrativas', ['users_id' => $this->usuario_id, 'titulo_acta' => $this->titulo_incidencia, 'asignada_a' => $caja_empleado_text, 'fecha_acta' => $fecha_acta, 'motivo_acta' => $motivo_acta, 'observaciones_acta' => $obcomen_acta]);
		}
	}
}
?>