<?php
    include_once __DIR__ . "/../../config/conexion.php";
    $object = new connection_database();

    $numero_asistencia = $_POST["asistencia_empleado"];
	$idexpediente = $_POST["editarid"];

    // Consulta en ambas tablas usando UNION
    $query = $object->_db->prepare("
		SELECT numero_asistencia FROM expedientes WHERE numero_asistencia = :asistencianum AND id != :idexpediente
    ");
    $query->execute(array(":asistencianum" => $numero_asistencia, ":idexpediente" => $idexpediente));
    $numero_asistencia_count = $query->rowCount();

    if ($numero_asistencia_count > 0) {
        $output = false; // Mostrar error
    } else {
        $output = true; // No se encontró en ninguna tabla
    }

    echo json_encode($output);
?>