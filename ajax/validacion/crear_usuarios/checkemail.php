<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

$email = $_GET["correo"];
$query = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo");
$query -> execute(array(":correo" => $email));
$emailcount = $query->rowCount();
if($emailcount > 0){
    $output = false;
}else{
    $output = true;
}
echo json_encode($output);
?>