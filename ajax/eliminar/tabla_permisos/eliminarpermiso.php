<?php
include_once __DIR__ . "/../../../classes/permissions.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
    Permissions::EliminarPermisos($id);
}
?>