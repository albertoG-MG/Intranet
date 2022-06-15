<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

$rol = $_GET["rol"];
$query = $object ->_db->prepare("SELECT nombre from roles where nombre=:rolnom");
$query -> execute(array(":rolnom" => $rol));
$rolcount = $query->rowCount();
if($rolcount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>