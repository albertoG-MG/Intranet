<?php
include_once __DIR__ . "/../../config/conexion.php";
$object = new connection_database();

$numempleado = $_GET["numempleado"];

// Consulta en ambas tablas usando UNION
$query = $object->_db->prepare("
    SELECT num_empleado FROM expedientes WHERE num_empleado = :empleadonum
");
$query->execute(array(":empleadonum" => $numempleado));
$numempleadocount = $query->rowCount();

if ($numempleadocount > 0) {
    $output = false; // Mostrar error
} else {
    $output = true; // No se encontró en ninguna tabla
}

echo json_encode($output);
?>