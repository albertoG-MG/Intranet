<?php
    include_once __DIR__ . "/../../config/conexion.php";
    $object = new connection_database();

    $numero_nomina = $_GET["numero_nomina"];

    // Consulta en ambas tablas usando UNION
    $query = $object->_db->prepare("
        SELECT numero_nomina FROM expedientes WHERE numero_nomina = :nominanum
    ");
    $query->execute(array(":nominanum" => $numero_nomina));
    $numero_nomina_count = $query->rowCount();

    if ($numero_nomina_count > 0) {
        $output = false; // Mostrar error
    } else {
        $output = true; // No se encontró en ninguna tabla
    }

    echo json_encode($output);
?>