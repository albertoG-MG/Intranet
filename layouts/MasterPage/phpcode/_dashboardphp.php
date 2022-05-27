<?php
    include_once("../config/conexion.php");
    $object = new connection_database();
    
    session_start();
    if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header('Location: Login.php');
        die();
    }
    
    $perfil = $object->_db->prepare("SELECT * FROM usuarios WHERE id=:sessionid");
    $perfil->bindParam("sessionid", $_SESSION['id'], PDO::PARAM_INT);
    $perfil->execute();
?>