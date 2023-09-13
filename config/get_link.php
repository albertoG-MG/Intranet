<?php
    include_once "conexion.php";
    $object = new connection_database();
    session_start();

    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $path = dirname($path);

    //Check link
    $check_link = $object -> _db -> prepare("SELECT * FROM alerta_notificaciones WHERE id=:notificacion");
    $check_link -> execute(array('notificacion' => $_POST["id"]));
    $fetch_link = $check_link -> fetch(PDO::FETCH_ASSOC);
    
    $links = $path. "/layouts/" .$fetch_link["link"];

    $data = array(
        'link' => $links
    );

    echo json_encode($data);
?>