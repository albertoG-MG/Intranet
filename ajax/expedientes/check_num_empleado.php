<?php
	include_once __DIR__ . "/../../config/conexion.php";
	$object = new connection_database();

	$numempleado = $_GET["numempleado"];
	$query = $object ->_db->prepare("SELECT num_empleado from expedientes where num_empleado=:empleadonum");
	$query -> execute(array(":empleadonum" => $numempleado));
	$numempleadocount = $query->rowCount();
	if($numempleadocount > 0){
		$output = false;
	}else{
		$output = true;
	}
	echo json_encode($output);
?>