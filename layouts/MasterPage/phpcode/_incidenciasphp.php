<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    $bloquearboton = $object -> _db -> prepare("SELECT * FROM incidencias i INNER JOIN estatus_incidencia ei ON i.estatus_id=ei.id INNER JOIN usuarios u ON i.users_id=u.id WHERE u.id=:userid AND i.estatus_id = 4 ");
    $bloquearboton -> execute(array(':userid' => $_SESSION["id"]));
    $count_block = $bloquearboton -> rowCount();
?>
