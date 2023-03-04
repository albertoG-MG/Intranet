<?php 
include_once __DIR__ . "/../../config/conexion.php";
$object = new connection_database();

if(isset($_POST["validationapp"]) && $_POST["validationapp"] == "reseteditusuarios"){
	$editarid = $_POST["editarid"];
	$status = "";
	$array = [];
	$checkdata = $object -> _db -> prepare("SELECT usuarios.username AS username, usuarios.nombre AS nombre, usuarios.apellido_pat AS apellido_pat, usuarios.apellido_mat AS apellido_mat, usuarios.correo AS correo, usuarios.nombre_foto AS filename, usuarios.foto_identificador AS foto, roles.id AS rolid, subroles.id as subrolid, departamentos.id AS depid FROM usuarios LEFT JOIN roles ON roles.id=usuarios.roles_id LEFT JOIN subroles ON usuarios.subrol_id=subroles.id LEFT JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE usuarios.id=:editarid");
	$checkdata -> execute(array(":editarid" => $editarid));
	$fetchdata = $checkdata -> fetch(PDO::FETCH_ASSOC);
	if($fetchdata["filename"] != null && $fetchdata["foto"] != null){
		$path = __DIR__ . "/../../src/img/imgs_uploaded/".$fetchdata["foto"];
		 if(!file_exists($path)){
			$status="not_found";
		 }else{
			$status= "found";
		 }
	}else{
		$status = "sin_imagen";
	}
	$array = json_encode(array('usuario'=>$fetchdata["username"],'nombre'=>$fetchdata["nombre"], 'apellido_pat' => $fetchdata["apellido_pat"], 'apellido_mat' => $fetchdata["apellido_mat"], 'correo' => $fetchdata["correo"], 'nombre_archivo'=>$fetchdata["filename"], 'identificador'=>$fetchdata["foto"], 'rol_id' => $fetchdata["rolid"], 'subrol_id' => $fetchdata["subrolid"], "departamentos_id" => $fetchdata["depid"], 'status' => $status));
	die($array);
}
?>