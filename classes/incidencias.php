<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
require_once __DIR__ . "/../config/PHPMailer/src/PHPMailer.php";
require_once __DIR__ . "/../config/PHPMailer/src/Exception.php";
require_once __DIR__ . "/../config/PHPMailer/src/SMTP.php";
class incidencias {
	
    public $titulo;
	public $fechainicio;
	public $fechafin;
	public $tipo;
	public $descripcion;
	private $filename;
	private $foto;
	
	public function __construct($title, $initialdate, $finaldate, $type, $description, $nombre, $photo){
        $this->titulo = $title;
		$this->fechainicio = $initialdate;
		$this->fechafin = $finaldate;
		$this->tipo = $type;
		$this->descripcion = $description;
		$this->filename = $nombre;
		$this->foto = $photo;
	}
	
	public function CrearIncidencias($userid){
		$object = new connection_database();
		$crud = new crud();
		$sql = $object -> _db -> prepare("SELECT t1.id AS jerarquiaid, b.nombre as jefe FROM jerarquia t1 RIGHT JOIN roles a ON t1.rol_id=a.id LEFT JOIN usuarios u ON u.roles_id=a.id LEFT JOIN jerarquia t2 ON t1.jerarquia_id = t2.id LEFT JOIN roles b ON t2.rol_id=b.id WHERE u.id=:userid");
		$sql -> execute(array(':userid' => $userid));
		$row_jefe = $sql->fetch(PDO::FETCH_OBJ);
		$todaydate = date("Y-m-d");
		$numero=0;
		if(!(is_null($row_jefe -> jerarquiaid)) && !(is_null($row_jefe->jefe))){
			$crud -> store ('incidencias', ['users_id' => $userid, 'titulo' => $this->titulo, 'fecha_inicio' => $this->fechainicio, 'fecha_fin' => $this->fechafin, 'tipo_incidencia' => $this->tipo, 'descripcion' => $this->descripcion, 'filename' => $this->filename, 'foto' => $this->foto, 'incidencia_creada' => $todaydate]);
			$incidencia_id = $object -> _db -> lastInsertId();
			Incidencias::sendEmail($incidencia_id);
		}else if(!(is_null($row_jefe -> jerarquiaid)) && is_null($row_jefe->jefe)){
			$numero = 5;
			$crud -> store ('incidencias', ['users_id' => $userid, 'titulo' => $this->titulo, 'fecha_inicio' => $this->fechainicio, 'fecha_fin' => $this->fechafin, 'tipo_incidencia' => $this->tipo, 'descripcion' => $this->descripcion, 'filename' => $this->filename, 'foto' => $this->foto, 'incidencia_creada' => $todaydate, 'estatus_id' => $numero]);
		}else if(is_null($row_jefe -> jerarquiaid) && is_null($row_jefe->jefe)){
			$numero = 6;
			$crud -> store ('incidencias', ['users_id' => $userid, 'titulo' => $this->titulo, 'fecha_inicio' => $this->fechainicio, 'fecha_fin' => $this->fechafin, 'tipo_incidencia' => $this->tipo, 'descripcion' => $this->descripcion, 'filename' => $this->filename, 'foto' => $this->foto, 'incidencia_creada' => $todaydate, 'estatus_id' => $numero]);
		}
	}

	public static function sendEmail($incidencia_id){
		$object = new connection_database();
		$sql = $object->_db->prepare('SELECT incidencias.id AS id, incidencias.users_id AS userid, incidencias.titulo AS titulo, incidencias.fecha_inicio AS fecha_inicio, incidencias.fecha_fin AS fecha_fin, incidencias.tipo_incidencia AS tipo_incidencia, incidencias.estatus_id AS estatus_id, incidencias.filename AS filename, incidencias.foto AS foto, incidencias.incidencia_creada AS incidencia_creada, departamentos.departamento AS depanom, roles.nombre AS rolnom from incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id LEFT JOIN departamentos ON usuarios.departamento_id = departamentos.id LEFT JOIN roles ON usuarios.roles_id=roles.id WHERE incidencias.id=:incidenciaid');
		$sql -> execute(array(':incidenciaid' => $incidencia_id));
		$row_user_incidencia = $sql ->fetch(PDO::FETCH_OBJ);
		$select = $object -> _db ->prepare("SELECT u1.correo FROM jerarquia j1 INNER JOIN roles r1 ON r1.id = j1.rol_id INNER JOIN usuarios u1 ON u1.roles_id = r1.id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id WHERE IF(d1.departamento IS NULL, d1.departamento IS NULL, d1.departamento = :departamento1) AND r1.nombre =(SELECT CASE WHEN r6.nombre = 'Director' THEN (SELECT r2.nombre FROM jerarquia j2 INNER JOIN roles r2 ON j2.rol_id = r2.id INNER JOIN usuarios u2 ON u2.roles_id = r2.id LEFT JOIN departamentos d2 ON d2.id = u2.departamento_id WHERE r2.nombre =(SELECT r4.nombre FROM jerarquia j3 INNER JOIN roles r3 ON r3.id=j3.rol_id INNER JOIN jerarquia j4 ON j4.id = j3.jerarquia_id INNER JOIN roles r4 ON r4.id = j4.rol_id WHERE r4.nombre = 'Director') AND d2.departamento = :departamento2 UNION SELECT 'Director general' LIMIT 1) ELSE r6.nombre END FROM jerarquia j5 INNER JOIN roles r5 ON r5.id = j5.rol_id INNER JOIN jerarquia j6 ON j6.id = j5.jerarquia_id INNER JOIN roles r6 ON r6.id = j6.rol_id WHERE r5.nombre = :rolnom)");
		$select -> execute(array(':departamento1' => $row_user_incidencia->depanom, ':departamento2' => $row_user_incidencia->depanom, ':rolnom' => $row_user_incidencia->rolnom));
		$array = array();
		while($row_jefe = $select -> fetch(PDO::FETCH_OBJ)){
			$array[]=$row_jefe->correo;
		}
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$path = dirname($path);
		$links = $path. "/layouts/aprobacion_incidencia.php?idIncidencia=" .$incidencia_id;
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
		$mail->Username = "botsinttecom@sinttecom.com"; // SMTP username
		$mail->Password = "sinttecom1994"; // SMTP password
		$mail->IsHTML(true);
		if(count($array) >= 2){
			foreach($array as $correo)
			{
				$mail->AddAddress($correo);
			}
		}else{
			$correo = reset($array);
			$mail->AddAddress($correo);
		}
		$correos= implode(', ', $array);
		$mail->SetFrom($mail -> Username, 'Sinttecom Intranet');
		$mail->AddReplyTo($mail -> Username, 'Sinttecom Intranet');
		$mail->Subject  = "Solicitud de aprobación de incidencias";
		$mail->Body     = "Buen día ".$correos.": <br> Toca aquí para aprobar la incidencia <br> $links";
		$mail->WordWrap = 50;
		$mail->CharSet = "UTF-8";
		if(!$mail->Send()) {
			echo 'Message was not sent.' .$correo;
			echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
			exit("success");
		}
	}

	public static function EliminarIncidencias($id){
		$crud = new crud();
		$crud->delete('incidencias', 'id=:idincidencia', ['idincidencia' => $id]);
	}

	public static function Checkincidencia($id){
        $object = new connection_database();
	    $editar = $object -> _db->prepare("SELECT * FROM incidencias WHERE id=:incidenciaid");
		$editar->bindParam("incidenciaid", $id ,PDO::PARAM_INT);
		$editar->execute();
        $check_incidencia=$editar->rowCount();
	    return $check_incidencia;
    }

	
   public static function Fetcheditincidencia($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT * from incidencias where id=:incidenciaid");
        $row->bindParam("incidenciaid", $id, PDO::PARAM_INT);
        $row->execute();
        $editar = $row->fetch(PDO::FETCH_OBJ);
        return $editar;
    }

	public function EditarIncidencias($incidenciaid){
		$crud=new crud();
		$crud -> update ('incidencias', ['titulo' => $this->titulo, 'fecha_inicio' => $this->fechainicio, 'fecha_fin' => $this->fechafin, 'tipo_incidencia' => $this->tipo, 'descripcion' => $this->descripcion, 'filename' => $this->filename, 'foto' => $this->foto], 'id=:idincidencia', ['idincidencia' => $incidenciaid]);
	}

	public static function Fetchverincidencia($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT i.id as incidenciaid, u.nombre, u.apellido_pat, u.apellido_mat, i.titulo, i.fecha_inicio, i.fecha_fin, i.tipo_incidencia, ei.nombre as estatus_incidencia, i.descripcion, i.filename, i.foto, i.incidencia_creada FROM incidencias i INNER JOIN usuarios u ON i.users_id=u.id INNER JOIN estatus_incidencia ei ON i.estatus_id=ei.id WHERE i.id=:incidenciaid");
        $row->bindParam("incidenciaid", $id, PDO::PARAM_INT);
        $row->execute();
        $ver_incidencia = $row->fetch(PDO::FETCH_OBJ);
        return $ver_incidencia;
    }

	public static function Almacenar_estatus($incidenciaid, $estatus, $sueldo, $nombre, $apellido_pat, $apellido_mat){
		$object = new connection_database();
		$crud = new crud();
		$nombre_completo = $nombre. ' ' .$apellido_pat. ' ' .$apellido_mat;
		$crud -> store ('accion_incidencias', ['incidencias_id' => $incidenciaid, 'tipo_de_accion' => $estatus, 'goce_de_sueldo' => $sueldo, 'aprobado_por' => $nombre_completo]);
		$update_state = $object -> _db -> prepare("UPDATE incidencias i INNER JOIN (SELECT transicion_estatus_incidencia.incidencias_id, transicion_estatus_incidencia.estatus_siguiente FROM transicion_estatus_incidencia WHERE transicion_estatus_incidencia.incidencias_id=:incidenciaid ORDER BY transicion_estatus_incidencia.id desc LIMIT 1) temp ON i.id=temp.incidencias_id SET i.estatus_id = temp.estatus_siguiente");
		$update_state -> execute(array(':incidenciaid' => $incidenciaid));
	}
}
?>