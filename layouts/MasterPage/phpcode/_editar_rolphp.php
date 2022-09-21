<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

session_start();

//Valida si el usuario esta loggeado o no

if ($_SESSION['loggedin'] != true) {
    $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    die();
}

if (Permissions::CheckPermissions($_SESSION["id"], "Editar roles") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador") {
    header("HTTP/1.0 403 Forbidden");
    echo '<h1>Prohibido</h1><br> No tiene permiso para acceder a / esta parte del servidor.';
    exit();
}

//Fin de la validacion

$editarid = $_GET['idRol'];

//Validacion - Si se quiere acceder a editar usuario sin id, regresa

if($editarid == null){
    header('Location: roles.php');
    die();
}
//Fin de la validacion

$editar = $object -> _db->prepare("SELECT roles.id as rolid, roles.nombre as nombre, jerarquia.id as jerarquiaid, jerarquia.rol_id as jera_rol, jerarquia.jerarquia_id as jera_id FROM roles left join jerarquia on roles.id=jerarquia.rol_id WHERE roles.id=:editarid");
$editar->bindParam("editarid", $editarid,PDO::PARAM_INT);
$editar->execute();

 //Validacion - Si el rol no existe, regresa

 $check_rol=$editar->rowCount();

 if($check_rol > 0){
    $editarpermiso = $object -> _db->prepare("SELECT permisos_id FROM rolesxpermisos WHERE roles_id=:editarid");
    $editarpermiso->bindParam("editarid", $editarid,PDO::PARAM_INT);
    $editarpermiso->execute();
    $checkpermiso=$editarpermiso->fetchAll(PDO::FETCH_COLUMN);  
 }else{
    header('Location: roles.php');
    die();
 }

 //Fin de la validacion


 $row=$editar->fetch(PDO::FETCH_OBJ);


?>