<?php 
include_once __DIR__ . "/../../config/conexion.php";
$object = new connection_database();

if(isset($_POST["validationapp"]) && $_POST["validationapp"] == "resetformGeneral"){
	$sessionid = $_POST["sessionid"];
	$status = "";
	$array = [];
	$checkdata = $object -> _db -> prepare("SELECT usuarios.nombre AS nombre, usuarios.apellido_pat AS apellido_pat, usuarios.apellido_mat AS apellido_mat, usuarios.correo AS correo, usuarios.nombre_foto AS filename, usuarios.foto_identificador AS foto FROM usuarios WHERE usuarios.id=:sessionid");
	$checkdata -> execute(array(":sessionid" => $sessionid));
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
	$array = json_encode(array('nombre'=>$fetchdata["nombre"], 'apellido_pat' => $fetchdata["apellido_pat"], 'apellido_mat' => $fetchdata["apellido_mat"], 'correo' => $fetchdata["correo"], 'nombre_archivo'=>$fetchdata["filename"], 'identificador'=>$fetchdata["foto"], 'status' => $status));
	die($array);
}
?>