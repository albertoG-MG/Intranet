<?php
include_once("../../config/conexion.php");
$object = new connection_database();

$username = $_GET["usuario"];
$query = $object ->_db->prepare("SELECT username from usuarios where username=:username");
$query -> execute(array(":username" => $username));
$usernamecount = $query->rowCount();
if($usernamecount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>