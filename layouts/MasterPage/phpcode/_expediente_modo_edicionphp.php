<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();
    
    session_start();
    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    /*Si no hay token en el link, regresa*/
    if($_GET['token'] == null){
        header('Location: dashboard.php');
        die();
    }
    
    $token = $_GET['token'];
    
    /*Verifica si el token está registrado y esté pertenezca al expediente asignado*/
    $check_token = $object -> _db -> prepare("SELECT * FROM token_expediente INNER JOIN expedientes ON expedientes.id=token_expediente.expedientes_id INNER JOIN usuarios ON usuarios.id=expedientes.users_id WHERE token_expediente.token=:token AND usuarios.id=:sessionid");
    $check_token -> execute(array(':token' => $token, ':sessionid' => $_SESSION["id"]));
    $count_token = $check_token -> rowCount();
    if($count_token == 0){
        header('Location: dashboard.php');
        die();
    }
    
    $fetch_token_user = $check_token -> fetch(PDO::FETCH_OBJ);
    date_default_timezone_set("America/Monterrey");
    $formatDate = mktime(date("H")-1, date("i"), date("s"), date("m") ,date("d"), date("Y"));
    $curDate = date("Y-m-d H:i:s",$formatDate);
    
    
    
    
    /* Papelería  */
    $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria WHERE tipo_papeleria.nombre NOT IN('CONTRATO DEFINITIVO', 'ALTA DE IMSS', 'CONTRATO NOMINA BANCARIA', 'CONTRATO DE PRUEBA', 'CONTRATO INTERNO', 'CONTRATO SUPERVIVENCIA', 'MODIFICACION SALARIAL', 'REGLAMENTO INTERIOR DEL TRABAJO', 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS', 'BAJA ANTE IMSS', 'EVALUACION PSICOMETRICA', 'CARTA DE SEGUNDO TRABAJO', 'ACTA DE MATRIMONIO')");
    $checktipospapeleria -> execute();
    $counttipospapeleria = $checktipospapeleria -> rowCount();  
?>
