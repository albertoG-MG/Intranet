<?php
include_once __DIR__ . "/../../../classes/expedientes.php";
session_start();
if(isset($_POST["id"])){
    $logged_user= $_SESSION["nombre"]. " " .$_SESSION["apellidopat"]. " " .$_SESSION["apellidomat"];
    $id = $_POST["id"];
    Expedientes::EliminarExpediente($id, $logged_user);
}
?>