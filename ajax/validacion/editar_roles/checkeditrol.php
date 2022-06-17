<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

$rol = $_POST["rol"];
$editarid = $_POST["editarid"];
$query = $object ->_db->prepare("SELECT nombre from roles where nombre=:rolnom and id!=:idrol");
$query -> execute(array(":rolnom" => $rol, ":idrol" => $editarid));
$rolcount = $query->rowCount();
if($rolcount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>