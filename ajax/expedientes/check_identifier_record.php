<?php
    include_once __DIR__ . "/../../config/conexion.php";
    $object = new connection_database();

    $numero_expediente = $_GET["numero_expediente"];

    // Consulta en ambas tablas usando UNION
    $query = $object->_db->prepare("
        SELECT numero_expediente FROM expedientes WHERE numero_expediente = :expedientenum
    ");
    $query->execute(array(":expedientenum" => $numero_expediente));
    $numero_expediente_count = $query->rowCount();

    if ($numero_expediente_count > 0) {
        $output = false; // Mostrar error
    } else {
        $output = true; // No se encontró en ninguna tabla
    }

    echo json_encode($output);
?>