<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

$categoria = $_GET["crearcategoria"];
$query = $object ->_db->prepare("SELECT nombre from categorias where nombre=:nombre");
$query -> execute(array(":nombre" => $categoria));
$categoriacount = $query->rowCount();
if($categoriacount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>