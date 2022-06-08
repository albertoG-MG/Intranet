<?php
include_once("../config/conexion.php");
$object = new connection_database();

$username = $_POST["usuario"];
$session = $_POST["session"];
$query = $object ->_db->prepare("SELECT username from usuarios where username=:username and id!=:iduser");
$query -> execute(array(":username" => $username, ":iduser" => $session));
$usernamecount = $query->rowCount();
if($usernamecount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>