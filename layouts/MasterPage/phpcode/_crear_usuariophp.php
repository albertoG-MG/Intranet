<?php
    include_once("../config/conexion.php");
    $object = new connection_database();
    
    session_start();
    if ($_SESSION['loggedin'] != true) {
        header('Location: Login.php');
        die();
    }
?>