<?php
include_once("../classes/user.php");
if(isset($_POST["id"])){
    $id = $_POST["id"];
    User::EliminarUsuarios($id);
}
?>