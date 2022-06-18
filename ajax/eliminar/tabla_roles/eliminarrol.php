<?php
include_once __DIR__ . "/../../../classes/roles.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
    roles::EliminarRol($id);
}
?>