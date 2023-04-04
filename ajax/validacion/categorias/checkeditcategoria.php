<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

$categoria = $_POST["editcategoria"];
$id = $_POST["editarid"];
$query = $object ->_db->prepare("SELECT nombre from categorias where nombre=:nombre and id!=:idpermiso");
$query -> execute(array(":nombre" => $categoria, ":idpermiso" => $id));
$categoriacount = $query->rowCount();
if($categoriacount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>