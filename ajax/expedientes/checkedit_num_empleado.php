<?php
	include_once __DIR__ . "/../../config/conexion.php";
	$object = new connection_database();

	$numempleado = $_POST["numempleado"];
	$idexpediente = $_POST["editarid"];

	$query = $object->_db->prepare("
		SELECT num_empleado FROM expedientes WHERE num_empleado = :empleadonum AND id != :idexpediente
		UNION
		SELECT num_empleado FROM expedientes_temporales WHERE num_empleado = :empleadonum AND expedientes_temporales.id != :idexpediente
	");
	$query->bindParam(":empleadonum", $numempleado, PDO::PARAM_STR);
	$query->bindParam(":idexpediente", $idexpediente, PDO::PARAM_INT);
	$query->execute();

	$numempleadocount = $query->rowCount();

	if ($numempleadocount > 0) {
		$output = false; // Número de empleado ya existe en otro expediente
	} else {
		$output = true; // Número de empleado disponible para este expediente
	}

	echo json_encode($output);
?>