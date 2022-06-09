<?php
include_once("../config/conexion.php");
$object = new connection_database();

$permiso = $_GET["crearpermiso"];
$query = $object ->_db->prepare("SELECT nombre from permisos where nombre=:nombre");
$query -> execute(array(":nombre" => $permiso));
$permisocount = $query->rowCount();
if($permisocount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>