<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

$departamento = $_POST["editdepartamento"];
$id = $_POST["editarid"];
$query = $object ->_db->prepare("SELECT departamento from departamentos where departamento=:departamento and id!=:idpermiso");
$query -> execute(array(":departamento" => $departamento, ":idpermiso" => $id));
$departamentocount = $query->rowCount();
if($departamentocount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>