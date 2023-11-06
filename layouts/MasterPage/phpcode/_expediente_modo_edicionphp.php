<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/expedientes.php";
    $object = new connection_database();
    $crud = new Crud();
    
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

    /*ESTADOS*/
    $estado = $object->_db->prepare("select * from estados");
    $estado->execute();
    $contestado=0;

    date_default_timezone_set("America/Monterrey");
    $formatDate = mktime(date("H")-1, date("i"), date("s"), date("m") ,date("d"), date("Y"));
    $curDate = date("Y-m-d H:i:s",$formatDate);
    
    $id_expediente = ($fetch_token_user -> idExpediente);
    /*REFERENCIAS LABORALES*/
    $fetch_referencias = [];
    $query = "SELECT nombre1 AS nombre, apellido_pat1 AS apellido_pat, apellido_mat1 AS apellido_mat, relacion1 AS relacion, telefono1 AS telefono FROM ref_laborales WHERE expediente_id = :expedienteid AND (nombre1 IS NOT NULL OR apellido_pat1 IS NOT NULL OR apellido_mat1 IS NOT NULL OR relacion1 IS NOT NULL OR telefono1 IS NOT NULL) UNION ALL SELECT nombre2 AS nombre, apellido_pat2 AS apellido_pat, apellido_mat2 AS apellido_mat, relacion2 AS relacion, telefono2 AS telefono FROM ref_laborales WHERE expediente_id = :expedienteid AND (nombre2 IS NOT NULL OR apellido_pat2 IS NOT NULL OR apellido_mat2 IS NOT NULL OR relacion2 IS NOT NULL OR telefono2 IS NOT NULL) UNION ALL SELECT nombre3 AS nombre, apellido_pat3 AS apellido_pat, apellido_mat3 AS apellido_mat, relacion3 AS relacion, telefono3 AS telefono FROM ref_laborales WHERE expediente_id = :expedienteid AND (nombre3 IS NOT NULL OR apellido_pat3 IS NOT NULL OR apellido_mat3 IS NOT NULL OR relacion3 IS NOT NULL OR telefono3 IS NOT NULL);";


    $referencias_laborales = $object->_db->prepare($query);
    $referencias_laborales->execute(array(':expedienteid' =>   $id_expediente ));
    $referencias_count = $referencias_laborales->rowCount();

    if ($referencias_count > 0) {
        $fetch_referencias = $referencias_laborales->fetchAll(PDO::FETCH_ASSOC);
    }

    /*REFERENCIAS BANCARIAS*/
    $fetch_ben_bancarios = [];
    $query = "SELECT nombre1 AS nombre, apellido_pat1 AS apellido_pat, apellido_mat1 AS apellido_mat, relacion1 AS relacion, rfc1 AS rfc, curp1 AS curp, porcentaje1 AS porcentaje FROM ben_bancarios WHERE expediente_id = :expedienteid AND (nombre1 IS NOT NULL OR apellido_pat1 IS NOT NULL OR apellido_mat1 IS NOT NULL OR relacion1 IS NOT NULL OR rfc1 IS NOT NULL OR curp1 IS NOT NULL OR porcentaje1 IS NOT NULL) UNION ALL SELECT nombre2 AS nombre, apellido_pat2 AS apellido_pat, apellido_mat2 AS apellido_mat, relacion2 AS relacion, rfc2 AS rfc, curp2 AS curp, porcentaje2 AS porcentaje FROM ben_bancarios WHERE expediente_id = :expedienteid AND (nombre2 IS NOT NULL OR apellido_pat2 IS NOT NULL OR apellido_mat2 IS NOT NULL OR relacion2 IS NOT NULL OR rfc2 IS NOT NULL OR curp2 IS NOT NULL OR porcentaje2 IS NOT NULL);";

        $ben_bancarios = $object->_db->prepare($query);
        $ben_bancarios->execute(array(':expedienteid' =>  $id_expediente ));
        $ben_bancarios_count = $ben_bancarios->rowCount();

    if ($ben_bancarios_count > 0) {
        $fetch_ben_bancarios = $ben_bancarios->fetchAll(PDO::FETCH_ASSOC);
    }

    $bringuser = $object -> _db -> prepare("SELECT usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, usuarios.correo as correo, departamentos.departamento as departamento FROM expedientes INNER JOIN usuarios ON expedientes.users_id=usuarios.id LEFT JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE expedientes.id=:expedienteid"); 
    $bringuser -> bindParam('expedienteid', $id_expediente, PDO::PARAM_INT); 
    $bringuser -> execute();
    $selected = $bringuser->fetch(PDO::FETCH_OBJ);
    
    /* PAPELERÍA  */
    
    if(Roles::FetchSessionRol($_SESSION['rol']) == "Tecnico") {
        $checktipospapeleria = $object->_db->prepare("SELECT tipo_papeleria.id as id, tipo_papeleria.nombre as nombre, papeleria_empleado.nombre_archivo as nombre_archivo, papeleria_empleado.identificador as identificador, papeleria_empleado.fecha_subida as fecha_subida FROM tipo_papeleria left join papeleria_empleado on tipo_papeleria.id = papeleria_empleado.tipo_archivo and papeleria_empleado.expediente_id = :expedienteid WHERE tipo_papeleria.nombre NOT IN('EVALUACION PSICOMETRICA' , 'CONTRATO DETERMINADO' , 'PRESTADOR DE SERVICIOS' , 'CONVENIO DE CONFIDENCIALIDAD' , 'CONTRATO INDETERMINADO' , 'ALTA DE IMSS' , 'CONTRATO NOMINA BANCARIA' , 'REGLAMENTO INTERIOR DEL TRABAJO' , 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS' , 'MODIFICACION SALARIAL', 'BAJA ANTE IMSS') order by id asc");
        $checktipospapeleria->setFetchMode(PDO::FETCH_ASSOC);
        $checktipospapeleria->execute(array(':expedienteid' => $fetch_token_user -> idExpediente));
        $counttipospapeleria = $checktipospapeleria -> rowCount();
        $papeleria = $checktipospapeleria->fetchAll();
        $buscar_papeleria="true";
        }else{
            $checktipospapeleria = $object->_db->prepare("SELECT tipo_papeleria.id as id, tipo_papeleria.nombre as nombre, papeleria_empleado.nombre_archivo as nombre_archivo, papeleria_empleado.identificador as identificador, papeleria_empleado.fecha_subida as fecha_subida FROM tipo_papeleria left join papeleria_empleado on tipo_papeleria.id = papeleria_empleado.tipo_archivo and papeleria_empleado.expediente_id = :expedienteid WHERE tipo_papeleria.nombre NOT IN('EVALUACION PSICOMETRICA', 'IMAGEN DE DATOS BANCARIOS' , 'CONTRATO DETERMINADO' , 'PRESTADOR DE SERVICIOS' , 'CONVENIO DE CONFIDENCIALIDAD' , 'CONTRATO INDETERMINADO' , 'ALTA DE IMSS' , 'CONTRATO NOMINA BANCARIA' , 'REGLAMENTO INTERIOR DEL TRABAJO' , 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS' , 'MODIFICACION SALARIAL', 'BAJA ANTE IMSS') order by id asc");
            $checktipospapeleria->setFetchMode(PDO::FETCH_ASSOC);
            $checktipospapeleria->execute(array(':expedienteid' => $fetch_token_user->idExpediente));
            $counttipospapeleria = $checktipospapeleria->rowCount();
            $papeleria = $checktipospapeleria->fetchAll();
            $buscar_papeleria = "true";
            
            }
?>