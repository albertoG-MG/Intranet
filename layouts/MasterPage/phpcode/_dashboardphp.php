<?php
    include_once("../config/conexion.php");
    $object = new connection_database();
    
    session_start();
    if ($_SESSION['loggedin'] != true) {
        header('Location: Login.php');
        die();
    }
    
    $perfil = $object->_db->prepare("SELECT usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, roles.nombre as rolnom FROM usuarios inner join roles on usuarios.roles_id=roles.id WHERE usuarios.id=:sessionid");
    $perfil->bindParam("sessionid", $_SESSION['id'], PDO::PARAM_INT);
    $perfil->execute();
    $profile = $perfil -> fetch(PDO::FETCH_OBJ);
?>