<?php
    include_once "conexion.php";
    $object = new connection_database();
    session_start();

    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $path = dirname($path);
    
    if($_POST["tipo_alerta"] == "Incidencias"){  
        $links = $path. "/layouts/solicitud_incidencia.php";
    }else if($_POST["tipo_alerta"] == "Vacaciones"){
        $links = $path. "/layouts/solicitud_vacaciones.php";
    }

    $data = array(
        'link' => $links
    );

    echo json_encode($data);
?>