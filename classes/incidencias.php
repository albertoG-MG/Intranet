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
    
	public function __construct($user_id, $user_rol){
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
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
		$sql = $object->_db->prepare('SELECT CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) as nombre, solicitudes_incidencias.fecha_solicitud as fecha_solicitud FROM incidencias INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id WHERE incidencias.id=:incidenciaid');
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
		$mail->Body     = "Buen día ".$correos.": <br> El usuario ".$row_user_incidencia -> nombre." ha solicitado un " .$tipoincidencia. " en la fecha " .$row_user_incidencia -> fecha_solicitud. " <br> Haga clic en el link a continuación para ver la incidencia y evaluarla: <br> $links";
		$mail->WordWrap = 50;
		$mail->CharSet = "UTF-8";
		if(!$mail->Send()) {
			echo 'Message was not sent.';
			echo 'Mailer error: ' . $mail->ErrorInfo;
		}
	}

	public static function getResponse($incidencia_id, $estatus, $sueldo, $comentario){
		$object = new connection_database();
		$crud = new crud();
		$array = [];
		$sql = $object->_db->prepare('SELECT usuarios.correo FROM incidencias INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id WHERE incidencias.id=:incidenciaid');
		$sql -> execute(array(':incidenciaid' => $incidencia_id));
		$row_user_incidencia = $sql ->fetch(PDO::FETCH_OBJ);
		array_push($array, $row_user_incidencia -> correo);
		
		$check_gerente_capital_finanzas = $object -> _db -> prepare("SELECT usuarios.correo FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id INNER JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE roles.nombre='Gerente' AND departamentos.departamento='Capital humano' || roles.nombre='Gerente' AND departamentos.departamento='Finanzas'");
		$check_gerente_capital_finanzas -> execute();
		$count_gerente_capital_finanzas = $check_gerente_capital_finanzas -> rowCount();
		$fetch_gerente_capital_finanzas = $check_gerente_capital_finanzas ->fetchAll(PDO::FETCH_ASSOC);
		if($count_gerente_capital_finanzas == 2){
			foreach($fetch_gerente_capital_finanzas as $array_gerentes){
				foreach($array_gerentes as $correos_array){
					array_push($array, $correos_array);
				}
			}
		}else if($count_gerente_capital_finanzas == 1){
			foreach($fetch_gerente_capital_finanzas as $array_gerentes){
				foreach($array_gerentes as $correos_array){
					array_push($array, $correos_array);
				}
			}
		}else if($count_gerente_capital_finanzas == 0){
			array_push($array, "alberto.martinez@sinttecom.com");
		}
		if($sueldo == 1){
			$sueldo_message = "con goce de sueldo";
		}else if($sueldo == 0){
			$sueldo_message = "sin goce de sueldo";
		}
		if($estatus == 3){
			$status = "Rechazada";
		}else if($estatus == 2){
			$status = "Cancelada";
		}else if ($estatus == 1){
			$status = "Aprobada";
		}
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$path = dirname($path);
		$links = $path. "/layouts/incidencias.php";		
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
		foreach($array as $correo)
		{
			$mail->AddAddress($correo);
		}
		$mail->SetFrom($mail -> Username, 'Sinttecom Intranet');
		$mail->AddReplyTo($mail -> Username, 'Sinttecom Intranet');
		$mail->Subject  = "La incidencia ha sido evaluada";
		$mail->Body     = "Buen día: <br> La incidencia evaluada tiene el siguiente estatus: ".$status. ' ' .$sueldo_message.". <br> Has clic aquí para ver los detalles: <br> <a href=".$links.">Checar incidencia</a> <br> Comentarios:  ".$comentario."";
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
			Incidencias::getResponse($incidenciaid, $estatus, $sueldo, $comentario);
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
	public function reglamentario_descriptivo($permiso_r, $fechainicio_pd, $fechafin_pd, $observaciones_permiso_r, $filename_justificante_permiso_r, $justificante_permiso_r, $jefe_array);
	public function reglamentario_no_descriptivo($permiso_r, $periodo_pnd, $motivo_pnd, $observaciones_permiso_r, $filename_justificante_permiso_r, $justificante_permiso_r, $jefe_array);
	public function no_reglamentario_g($permiso_nr, $periodo_pnr_fh, $motivo_permiso_nr, $observaciones_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr, $jefe_array);
	public function no_reglamentario_a($permiso_nr, $periodo_pnr_f, $motivo_permiso_nr, $observaciones_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr, $jefe_array);
}

class permiso extends incidencias implements tipo_permiso {
	public function __construct($user_id, $user_rol) {
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
	}

	//CREACION DE PERMISOS


	//Permiso reglamentario FALLECIMIENTO, MATRIMONIO, ESCOLARIDAD Y NACIMIENTO
	public function reglamentario_descriptivo($permiso_r, $fechainicio_pd, $fechafin_pd, $observaciones_permiso_r, $filename_justificante_permiso_r, $justificante_permiso_r, $jefe_array){
		$object = new connection_database();
		$crud = new crud();
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
		$fecha_periodo = $fechainicio_pd. " - " .$fechafin_pd;
		$location = "../src/permisos_reglamentarios/permisos_descriptivos/";
		$ext = pathinfo($filename_justificante_permiso_r, PATHINFO_EXTENSION);
		$uploadfile = Incidencias::tempnam_sfx($location, $ext);
		move_uploaded_file($justificante_permiso_r['tmp_name'],$uploadfile);
		$crud -> store ('permisos_reglamentarios', ['permiso_r' => $permiso_r, 'periodo_ausencia_r' => $fecha_periodo, 'observaciones_permiso_r' => $observaciones_permiso_r, 'nombre_justificante_r' => $filename_justificante_permiso_r, 'identificador_justificante_r' => basename($uploadfile)]);
		$permiso_id = $object -> _db -> lastInsertId();
		$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_permiso_reglamentario' => $permiso_id]);
		$incidencia_id = $object -> _db -> lastInsertId();
		Incidencias::sendEmail($incidencia_id, $jefe_array, "permiso reglamentario descriptivo");
	}

	//Permiso reglamentario OTRO/HOME OFFICE
	public function reglamentario_no_descriptivo($permiso_r, $periodo_pnd, $motivo_pnd, $observaciones_permiso_r, $filename_justificante_permiso_r, $justificante_permiso_r, $jefe_array){
		$object = new connection_database();
		$crud = new crud();
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
		$location = "../src/permisos_reglamentarios/permisos_no_descriptivos/";
		$ext = pathinfo($filename_justificante_permiso_r, PATHINFO_EXTENSION);
		$uploadfile = Incidencias::tempnam_sfx($location, $ext);
		move_uploaded_file($justificante_permiso_r['tmp_name'],$uploadfile);
		$crud -> store ('permisos_reglamentarios', ['permiso_r' => $permiso_r, 'periodo_ausencia_r' => $periodo_pnd, 'motivo_permiso_r' => $motivo_pnd, 'observaciones_permiso_r' => $observaciones_permiso_r, 'nombre_justificante_r' => $filename_justificante_permiso_r, 'identificador_justificante_r' => basename($uploadfile)]);
		$permiso_id = $object -> _db -> lastInsertId();
		$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_permiso_reglamentario' => $permiso_id]);
		$incidencia_id = $object -> _db -> lastInsertId();
		Incidencias::sendEmail($incidencia_id, $jefe_array, "permiso reglamentario no descriptivo");
	}

	//Permiso no reglamentario GENERAL
	public function no_reglamentario_g($permiso_nr, $periodo_pnr_fh, $motivo_permiso_nr, $observaciones_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr, $jefe_array){
		$object = new connection_database();
		$crud = new crud();
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
				$crud -> store ('permisos_no_reglamentarios', ['permiso_nr' => $permiso_nr, 'periodo_ausencia_nr' => $periodo_pnr_fh, 'motivo_permiso_nr' => $motivo_permiso_nr, 'observaciones_permiso_nr' => $observaciones_permiso_nr, 'posee_jpermiso_nr' => $posee_jpermiso_nr,'nombre_justificante_nr' => $filename_justificante_permiso_nr, 'identificador_justificante_nr' => basename($uploadfile)]);
			}
		}else{
			$crud -> store ('permisos_no_reglamentarios', ['permiso_nr' => $permiso_nr, 'periodo_ausencia_nr' => $periodo_pnr_fh, 'motivo_permiso_nr' => $motivo_permiso_nr, 'observaciones_permiso_nr' => $observaciones_permiso_nr, 'posee_jpermiso_nr' => $posee_jpermiso_nr, 'nombre_justificante_nr' => $filename_justificante_permiso_nr, 'identificador_justificante_nr' => $justificante_permiso_nr]);
		}
		$permiso_id = $object -> _db -> lastInsertId();
		$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_permiso_no_reglamentario' => $permiso_id]);
		$incidencia_id = $object -> _db -> lastInsertId();
		Incidencias::sendEmail($incidencia_id, $jefe_array, "permiso no reglamentario general");
	}

	//Permiso no reglamentario AUSENCIA
	public function no_reglamentario_a($permiso_nr, $periodo_pnr_f, $motivo_permiso_nr, $observaciones_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr, $jefe_array){
		$object = new connection_database();
		$crud = new crud();
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
				$crud -> store ('permisos_no_reglamentarios', ['permiso_nr' => $permiso_nr, 'periodo_ausencia_nr' => $periodo_pnr_f, 'motivo_permiso_nr' => $motivo_permiso_nr, 'observaciones_permiso_nr' => $observaciones_permiso_nr, 'posee_jpermiso_nr' => $posee_jpermiso_nr,'nombre_justificante_nr' => $filename_justificante_permiso_nr, 'identificador_justificante_nr' => basename($uploadfile)]);
			}
		}else{
			$crud -> store ('permisos_no_reglamentarios', ['permiso_nr' => $permiso_nr, 'periodo_ausencia_nr' => $periodo_pnr_f, 'motivo_permiso_nr' => $motivo_permiso_nr, 'observaciones_permiso_nr' => $observaciones_permiso_nr, 'posee_jpermiso_nr' => $posee_jpermiso_nr, 'nombre_justificante_nr' => $filename_justificante_permiso_nr, 'identificador_justificante_nr' => $justificante_permiso_nr]);
		}
		$permiso_id = $object -> _db -> lastInsertId();
		$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_permiso_no_reglamentario' => $permiso_id]);
		$incidencia_id = $object -> _db -> lastInsertId();
		Incidencias::sendEmail($incidencia_id, $jefe_array, "permiso no reglamentario ausencia");	
	}

	//TERMINA LA CREACION DE PERMISOS
}

class incapacidades extends incidencias{
	public function __construct($user_id, $user_rol) {
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
	}

	//Incapacidades
	public function crear_incapacidad($numero_incapacidad, $serie_folio_incapacidad, $tipo_incapacidad, $ramo_seguro_incapacidad, $periodo_incapacidad, $motivo_incapacidad, $observaciones_incapacidad, $filename_comprobante_incapacidad, $comprobante_incapacidad, $jefe_array){
		$object = new connection_database();
		$crud = new crud();
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
		$location = "../src/incapacidades/";
		$ext = pathinfo($filename_comprobante_incapacidad, PATHINFO_EXTENSION);
		$uploadfile = Incidencias::tempnam_sfx($location, $ext);
		move_uploaded_file($comprobante_incapacidad['tmp_name'],$uploadfile);
		$crud -> store ('incapacidades', ['numero_incapacidad' => $numero_incapacidad, 'serie_folio_incapacidad' => $serie_folio_incapacidad, 'tipo_incapacidad' => $tipo_incapacidad, 'ramo_seguro_incapacidad' => $ramo_seguro_incapacidad, 'periodo_incapacidad' => $periodo_incapacidad, 'motivo_incapacidad' => $motivo_incapacidad, 'observaciones_incapacidad' => $observaciones_incapacidad, 'nombre_justificante_incapacidad' => $filename_comprobante_incapacidad, 'archivo_identificador_incapacidad' => basename($uploadfile)]);
		$incapacidad_id = $object -> _db -> lastInsertId();
		$crud -> store ('incidencias', ['id_solicitud_incidencias' => $solicitud_id, 'id_incapacidades' => $incapacidad_id]);
		$incidencia_id = $object -> _db -> lastInsertId();
		Incidencias::sendEmail($incidencia_id, $jefe_array, "incapacidad");
	}
}

class actas extends incidencias{
	public function __construct($user_id, $user_rol) {
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
	}

	public function crear_acta($fecha_acta, $caja_empleado, $caja_empleado_text, $motivo_acta, $obcomen_acta){
		$object = new connection_database();
		$crud = new crud();
		$crud -> store ('incidencias_acta_administrativas', ['motivo_acta' => $motivo_acta, 'observaciones_acta' => $obcomen_acta]);
		$incapacidad_administrativa_id = $object -> _db -> lastInsertId();
		$crud -> store ('incidencias_administrativas', ['users_id' => $this->usuario_id, 'asignada_a' => $caja_empleado, 'fecha_expedicion' => $fecha_acta, 'id_acta_administrativa' => $incapacidad_administrativa_id]);
	}

	public function editar_acta($fecha_acta, $caja_empleado, $caja_empleado_text, $motivo_acta, $obcomen_acta, $incidenciaid){
		$object = new connection_database();
		$crud = new crud();
		$get_actaid = $object -> _db -> prepare("SELECT id_acta_administrativa FROM incidencias_administrativas WHERE id=:incidenciaid");
		$get_actaid -> execute(array(":incidenciaid" => $incidenciaid));
		$fetch_actaid = $get_actaid -> fetch(PDO::FETCH_OBJ);
		$crud -> update('incidencias_acta_administrativas', ['motivo_acta' => $motivo_acta, 'observaciones_acta' => $obcomen_acta], "id=:idacta", [":idacta" => $fetch_actaid -> id_acta_administrativa]);
		$crud -> update('incidencias_administrativas', ['asignada_a' => $caja_empleado, 'fecha_expedicion' => $fecha_acta], "id=:incidenciaid", [":incidenciaid" => $incidenciaid]);
	}

	public function vincular_acta($incidenciaid, $archivo){
		$crud = new crud();
		$object = new connection_database();
		$location = "../src/acta_administrativa/";
		$ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);
		$uploadfile = Incidencias::tempnam_sfx($location, $ext);
		move_uploaded_file($archivo['tmp_name'],$uploadfile);
		$crud -> update('incidencias_administrativas', ['nombre_archivo_firmado' => $archivo['name'], 'identificador_archivo_firmado' => basename($uploadfile)], "id=:incidenciaid", [":incidenciaid" => $incidenciaid]);
	}

	public static function EliminarActa($incidenciaid, $idacta){
		$crud = new crud();
		$object = new connection_database();
		$select_acta = $object -> _db -> prepare("SELECT nombre_archivo_firmado, identificador_archivo_firmado FROM incidencias_administrativas WHERE id=:incidenciaid");
		$select_acta -> execute(array(':incidenciaid' => $incidenciaid));
		$fetch_select_acta = $select_acta -> fetch(PDO::FETCH_OBJ);
		if($fetch_select_acta -> nombre_archivo_firmado != null && $fetch_select_acta -> identificador_archivo_firmado != null){
			$directory = __DIR__ . "/../src/acta_administrativa/";
			$path = __DIR__ . "/../src/acta_administrativa/".$fetch_select_acta -> identificador_archivo_firmado;
			if(!file_exists($path)){
				$crud->delete('incidencias_acta_administrativas', 'id=:actaid', ['actaid' => $idacta]);
			}else{
				unlink($directory.$fetch_select_acta -> identificador_archivo_firmado);
				$crud->delete('incidencias_acta_administrativas', 'id=:actaid', ['actaid' => $idacta]);
			}
		}else{
			$crud->delete('incidencias_acta_administrativas', 'id=:actaid', ['actaid' => $idacta]);
		}
	}
}

class cartas extends incidencias{
	public function __construct($user_id, $user_rol) {
		$this->usuario_id = $user_id;
		$this->usuario_rol = $user_rol;
	}

	public function crear_carta($fecha_carta, $array_empleado, $array_empleado_text, $responsabilidad_carta){
		$object = new connection_database();
		$crud = new crud();
		$crud -> store ('incidencias_carta_compromiso', ['resposabilidades_carta' => $responsabilidad_carta]);
		$incapacidad_administrativa_id = $object -> _db -> lastInsertId();
		$crud -> store ('incidencias_administrativas', ['users_id' => $this->usuario_id, 'asignada_a' => $array_empleado, 'fecha_expedicion' => $fecha_carta, 'id_carta_compromiso' => $incapacidad_administrativa_id]);
	}

	public function editar_carta($fecha_carta, $array_empleado, $array_empleado_text, $responsabilidad_carta, $incidenciaid){
		$object = new connection_database();
		$crud = new crud();
		$get_cartaid = $object -> _db -> prepare("SELECT id_carta_compromiso FROM incidencias_administrativas WHERE id=:incidenciaid");
		$get_cartaid -> execute(array(":incidenciaid" => $incidenciaid));
		$fetch_cartaid = $get_cartaid -> fetch(PDO::FETCH_OBJ);
		$crud -> update('incidencias_carta_compromiso', ['resposabilidades_carta' => $responsabilidad_carta], "id=:idcarta", [":idcarta" => $fetch_cartaid -> id_carta_compromiso]);
		$crud -> update('incidencias_administrativas', ['asignada_a' => $array_empleado, 'fecha_expedicion' => $fecha_acta], "id=:incidenciaid", [":incidenciaid" => $incidenciaid]);
	}

	public function vincular_carta($incidenciaid, $archivo){
		$crud = new crud();
		$object = new connection_database();
		$location = "../src/carta_compromiso/";
		$ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);
		$uploadfile = Incidencias::tempnam_sfx($location, $ext);
		move_uploaded_file($archivo['tmp_name'],$uploadfile);
		$crud -> update('incidencias_administrativas', ['nombre_archivo_firmado' => $archivo['name'], 'identificador_archivo_firmado' => basename($uploadfile)], "id=:incidenciaid", [":incidenciaid" => $incidenciaid]);
	}

	public static function EliminarCarta($incidenciaid, $idcarta){
		$crud = new crud();
		$object = new connection_database();
		$select_carta = $object -> _db -> prepare("SELECT nombre_archivo_firmado, identificador_archivo_firmado FROM incidencias_administrativas WHERE id=:incidenciaid");
		$select_carta -> execute(array(':incidenciaid' => $incidenciaid));
		$fetch_select_carta = $select_carta -> fetch(PDO::FETCH_OBJ);
		if($fetch_select_carta -> nombre_archivo_firmado != null && $fetch_select_carta -> identificador_archivo_firmado != null){
			$directory = __DIR__ . "/../src/carta_compromiso/";
			$path = __DIR__ . "/../src/carta_compromiso/".$fetch_select_carta -> identificador_archivo_firmado;
			if(!file_exists($path)){
				$crud->delete('incidencias_carta_compromiso', 'id=:cartaid', ['cartaid' => $idcarta]);
			}else{
				unlink($directory.$fetch_select_carta -> identificador_archivo_firmado);
				$crud->delete('incidencias_carta_compromiso', 'id=:cartaid', ['cartaid' => $idcarta]);
			}
		}else{
			$crud->delete('incidencias_carta_compromiso', 'id=:cartaid', ['cartaid' => $idcarta]);
		}
	}
}
?>
