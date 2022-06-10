<?php
include_once __DIR__ . "/../../../classes/user.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
    User::EliminarUsuarios($id);
}
?>