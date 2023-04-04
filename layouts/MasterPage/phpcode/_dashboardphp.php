<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();
    
    session_start();
    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }
    
    $perfil = $object->_db->prepare("SELECT usuarios.nombre AS nombre, usuarios.apellido_pat AS apellido_pat, usuarios.apellido_mat AS apellido_mat, roles.nombre AS rolnom, usuarios.nombre_foto as nombre_foto, usuarios.foto_identificador as foto FROM usuarios LEFT JOIN roles ON usuarios.roles_id=roles.id WHERE usuarios.id=:sessionid");
    $perfil->bindParam("sessionid", $_SESSION['id'], PDO::PARAM_INT);
    $perfil->execute();
    $profile = $perfil -> fetch(PDO::FETCH_OBJ);

    $countuserscheck = $object->_db->prepare("SELECT count(*) AS total FROM usuarios");
    $countuserscheck -> execute();
    $countusers = $countuserscheck -> fetch(PDO::FETCH_OBJ);

    $checkexpedientes = $object->_db->prepare("SELECT count(*) AS totalexpedientes FROM expedientes");
    $checkexpedientes -> execute();
    $countexpedientes = $checkexpedientes -> fetch(PDO::FETCH_OBJ);

    $checkdocumentos = $object->_db->prepare("SELECT count(*) AS totalpapeleria FROM tipo_papeleria");
    $checkdocumentos -> execute();
    $countdocumentos = $checkdocumentos -> fetch(PDO::FETCH_OBJ);
?>