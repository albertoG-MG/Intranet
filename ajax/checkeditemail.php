<?php
include_once("../config/conexion.php");
$object = new connection_database();

$email = $_POST["correo"];
$session = $_POST["session"];
$query = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo and id!=:iduser");
$query -> execute(array(":correo" => $email, ":iduser" => $session));
$emailcount = $query->rowCount();
if($emailcount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>