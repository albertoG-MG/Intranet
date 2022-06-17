<?php
include_once __DIR__ . "/../../../config/conexion.php";
include_once __DIR__ . "/../../../classes/permissions.php";
$object = new connection_database();

session_start();

//Valida si el usuario esta loggeado o no

if ($_SESSION['loggedin'] != true) {
    $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: Login.php');
    die();
}

//Fin de la validacion

$editarid = $_GET['idRol'];

//Validacion - Si se quiere acceder a editar usuario sin id, regresa

if($editarid == null){
    header('Location: roles.php');
    die();
}
//Fin de la validacion

$editar = $object -> _db->prepare("SELECT * FROM roles WHERE id=:editarid");
$editar->bindParam("editarid", $editarid,PDO::PARAM_INT);
$editar->execute();

 //Validacion - Si el rol no existe, regresa

 $check_rol=$editar->rowCount();

 if($check_rol > 0){
   
 }else{
    header('Location: roles.php');
    die();
 }

 //Fin de la validacion


 $row=$editar->fetch(PDO::FETCH_OBJ);


?>