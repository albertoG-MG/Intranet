<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

session_start();
if ($_SESSION['loggedin'] != true) {
    $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    die();
}

if (Permissions::CheckPermissions($_SESSION["id"], "Crear roles") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador") {
    header("HTTP/1.0 403 Forbidden");
    echo '<h1>Prohibido</h1><br> No tiene permiso para acceder a / esta parte del servidor.';
    exit();
}
?>