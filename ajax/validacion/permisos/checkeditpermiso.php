<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

$permiso = $_POST["editpermiso"];
$id = $_POST["editarid"];
$query = $object ->_db->prepare("SELECT nombre from permisos where nombre=:nombre and id!=:idpermiso");
$query -> execute(array(":nombre" => $permiso, ":idpermiso" => $id));
$permisocount = $query->rowCount();
if($permisocount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>