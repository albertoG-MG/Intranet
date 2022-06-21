<?php
include_once __DIR__ . "/../../../classes/departamentos.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
    Departamentos::EliminarDepartamento($id);
}
?>