<?php
include_once __DIR__ . "/../../../classes/categorias.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
    Categorias::EliminarCategorias($id);
}
?>