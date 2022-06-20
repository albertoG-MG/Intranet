<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

$departamento = $_GET["creardepartamento"];
$query = $object ->_db->prepare("SELECT departamento from departamentos where departamento=:departamento");
$query -> execute(array(":departamento" => $departamento));
$departamentocount = $query->rowCount();
if($departamentocount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>