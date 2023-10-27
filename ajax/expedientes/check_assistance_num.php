<?php
    include_once __DIR__ . "/../../config/conexion.php";
    $object = new connection_database();

    $numero_asistencia = $_GET["asistencia_empleado"];

    // Consulta en ambas tablas usando UNION
    $query = $object->_db->prepare("
        SELECT numero_asistencia FROM expedientes WHERE numero_asistencia = :asistencianum
    ");
    $query->execute(array(":asistencianum" => $numero_asistencia));
    $numero_asistencia_count = $query->rowCount();

    if ($numero_asistencia_count > 0) {
        $output = false; // Mostrar error
    } else {
        $output = true; // No se encontró en ninguna tabla
    }

    echo json_encode($output);
?>