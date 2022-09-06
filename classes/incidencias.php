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
		$select = $object -> _db ->prepare("select u.correo from jerarquia t1 inner join roles a ON t1.rol_id=a.id inner join usuarios u ON u.roles_id=a.id left join departamentos d ON u.departamento_id=d.id WHERE IF(d.departamento is NULL, d.departamento is null, d.departamento = :departamento1) AND a.nombre=(SELECT CASE WHEN b.nombre='Director' THEN (select r.nombre from jerarquia t4 inner join usuarios u on t4.rol_id=u.roles_id inner join roles r on t4.rol_id=r.id left join departamentos d on d.id=u.departamento_id WHERE r.nombre=(SELECT b.nombre as JEFE FROM jerarquia t1 INNER JOIN roles a ON t1.rol_id=a.id INNER JOIN jerarquia t2 ON t1.jerarquia_id = t2.id INNER JOIN roles b ON t2.rol_id=b.id WHERE b.nombre='Director') AND d.departamento=:departamento2 UNION select 'Director general' LIMIT 1) ELSE b.nombre END FROM jerarquia t1 INNER JOIN roles a ON t1.rol_id=a.id INNER JOIN jerarquia t2 ON t1.jerarquia_id = t2.id INNER JOIN roles b ON t2.rol_id=b.id WHERE a.nombre=:rolnom)");
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
}
?>