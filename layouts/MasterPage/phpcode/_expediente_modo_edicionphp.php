<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/expedientes.php";
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
    $check_token = $object -> _db -> prepare("SELECT expedientes.id as idExpediente, token_expediente.exp_date as exp_date FROM token_expediente INNER JOIN expedientes ON expedientes.id=token_expediente.expedientes_id INNER JOIN usuarios ON usuarios.id=expedientes.users_id WHERE token_expediente.token=:token AND usuarios.id=:sessionid");
    $check_token -> execute(array(':token' => $token, ':sessionid' => $_SESSION["id"]));
    $count_token = $check_token -> rowCount();
    if($count_token == 0){
        header('Location: dashboard.php');
        die();
    }
    
    $fetch_token_user = $check_token -> fetch(PDO::FETCH_OBJ);
    $edit=Expedientes::Fetchtokenexpediente($fetch_token_user -> idExpediente);

    /*Estados*/
    $estado = $object->_db->prepare("select * from estados");
    $estado->execute();
    $contestado=0;

    date_default_timezone_set("America/Monterrey");
    $formatDate = mktime(date("H")-1, date("i"), date("s"), date("m") ,date("d"), date("Y"));
    $curDate = date("Y-m-d H:i:s",$formatDate);
    
    /*REFERENCIAS LABORALES*/
    $referencias_laborales = $object->_db->prepare("select nombre, relacion, telefono from ref_laborales where expediente_id =:expedienteid");
    $referencias_laborales->bindParam("expedienteid", $fetch_token_user -> idExpediente, PDO::PARAM_INT);
    $referencias_laborales->execute();
    $array_reflaborales = $referencias_laborales -> fetchAll(PDO::FETCH_ASSOC);
    $reflaborales_json = json_encode($array_reflaborales, JSON_UNESCAPED_UNICODE);

    /*REFERENCIAS BANCARIAS*/
    $referencias_bancarias = $object->_db->prepare("select nombre, relacion, rfc, curp, prcnt_derecho from ref_bancarias where expediente_id =:expedienteid");
    $referencias_bancarias->bindParam("expedienteid", $fetch_token_user -> idExpediente, PDO::PARAM_INT);
    $referencias_bancarias->execute();
    $array_refban = $referencias_bancarias -> fetchAll(PDO::FETCH_ASSOC);
    $refban_json = json_encode($array_refban, JSON_UNESCAPED_UNICODE);
    
    /* Papelería  */
    $papeleria = $object->_db->prepare("SELECT tipo_papeleria.id as id, tipo_papeleria.nombre as nombre, papeleria_empleado.nombre_archivo as nombre_archivo, papeleria_empleado.identificador as identificador, papeleria_empleado.fecha_subida as fecha_subida FROM tipo_papeleria left join papeleria_empleado on tipo_papeleria.id = papeleria_empleado.tipo_archivo and papeleria_empleado.expediente_id = :expedienteid WHERE tipo_papeleria.nombre NOT IN('CONTRATO DEFINITIVO', 'ALTA DE IMSS', 'CONTRATO NOMINA BANCARIA', 'CONTRATO DE PRUEBA', 'CONTRATO INTERNO', 'CONTRATO SUPERVIVENCIA', 'MODIFICACION SALARIAL', 'REGLAMENTO INTERIOR DEL TRABAJO', 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS', 'BAJA ANTE IMSS', 'EVALUACION PSICOMETRICA', 'CARTA DE SEGUNDO TRABAJO', 'ACTA DE MATRIMONIO') order by id asc");
    $papeleria->execute(array(':expedienteid' => $fetch_token_user -> idExpediente));
    $array_papeleria = $papeleria -> fetchAll(PDO::FETCH_ASSOC);
    $papeleria_contador = 0;
    $papeleria_contador2 = 0;
    $papeleria_contador3 = 0;
    $papeleria_contador4 = 0;
	$papeleria_contador5 = 0;
    $buscar_papeleria="true";

    $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria WHERE tipo_papeleria.nombre NOT IN('CONTRATO DEFINITIVO', 'ALTA DE IMSS', 'CONTRATO NOMINA BANCARIA', 'CONTRATO DE PRUEBA', 'CONTRATO INTERNO', 'CONTRATO SUPERVIVENCIA', 'MODIFICACION SALARIAL', 'REGLAMENTO INTERIOR DEL TRABAJO', 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS', 'BAJA ANTE IMSS', 'EVALUACION PSICOMETRICA', 'CARTA DE SEGUNDO TRABAJO', 'ACTA DE MATRIMONIO')");
    $checktipospapeleria -> execute();
    $counttipospapeleria = $checktipospapeleria -> rowCount();
?>