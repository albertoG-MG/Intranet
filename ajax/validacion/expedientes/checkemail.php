<?php 
	include_once __DIR__ . "/../../../config/conexion.php";
	$object = new connection_database();

	
	$correo = $_GET["correo_personal"];
	$get_correo = $object -> _db -> prepare("SELECT * from expedientes where correo_personal=:correo");
	$get_correo -> execute(array(':correo' => $correo));
	$count_query = $get_correo -> rowCount();
	if($count_query > 0){
		$output = false;
	}else{
		$output = true;
	}
	echo json_encode($output);
?>