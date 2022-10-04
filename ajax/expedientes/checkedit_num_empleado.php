<?php
	include_once __DIR__ . "/../../config/conexion.php";
	$object = new connection_database();

	$numempleado = $_POST["numempleado"];
	$id = $_POST["editarid"];
	$query = $object ->_db->prepare("SELECT num_empleado from expedientes where num_empleado=:empleadonum and id!=:idexpediente");
	$query -> execute(array(":empleadonum" => $numempleado, ":idexpediente" => $id));
	$numempleadocount = $query->rowCount();
	if($numempleadocount > 0){
		$output = false;
	}else{
		$output = true;
	}
	echo json_encode($output);
?>