<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/user.php";
    include_once __DIR__ . "/../../../classes/expedientes.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: Login.php');
        die();
    }
	
	/*Si el id no existe, regresa*/
	if($_GET['idExpediente'] == null){
		header('Location: expedientes.php');
	}else{
		$Verid = $_GET['idExpediente'];
        /*Checa si el expediente esta vinculado*/
        $checkexp=Expedientes::Checkusuarioxexpediente($Verid);
        if($checkexp == 0){
            header('Location: expedientes.php');
        }
	}

    $ver=Expedientes::Fetcheditexpediente($Verid);

    $estado = $object->_db->prepare("select * from estados");
    $estado->execute();
    $contestado=0;


    /*REFERENCIAS LABORALES*/
    $array = [];
    $contador_array = 0;
    $referencias_laborales = $object->_db->prepare("select * from ref_laborales where expediente_id =:expedienteid");
    $referencias_laborales->bindParam("expedienteid", $Verid, PDO::PARAM_INT);
    $referencias_laborales->execute();
    $cont_referencias = $referencias_laborales->rowCount();
    while ($row_ref = $referencias_laborales->fetch(PDO::FETCH_OBJ)) {
        $array[$contador_array] = ($row_ref->nombre);
        $contador_array++;
        $array[$contador_array] = ($row_ref->parentesco);
        $contador_array++;
        $array[$contador_array] = ($row_ref->telefono);
        $contador_array++;
    }
    $json = json_encode($array, JSON_UNESCAPED_UNICODE);

    /*REFERENCIAS BANCARIAS*/
    $array2 = [];
    $contador_array2 = 0;
    $datos_bancarios = $object->_db->prepare("select * from ref_bancarias where expediente_id =:expedienteid");
    $datos_bancarios->bindParam("expedienteid", $Verid, PDO::PARAM_INT);
    $datos_bancarios->execute();
    $cont_datos = $datos_bancarios->rowCount();
    while ($row_datos = $datos_bancarios->fetch(PDO::FETCH_OBJ)) {
        $array2[$contador_array2] = ($row_datos->nombre);
        $contador_array2++;
        $array2[$contador_array2] = ($row_datos->parentesco);
        $contador_array2++;
        $array2[$contador_array2] = ($row_datos->rfc);
        $contador_array2++;
        $array2[$contador_array2] = ($row_datos->curp);
        $contador_array2++;
        $array2[$contador_array2] = ($row_datos->prcnt_derecho);
        $contador_array2++;
    }
    $json2 = json_encode($array2, JSON_UNESCAPED_UNICODE);

    /*PAPELERIAS*/
    $array3 = [];
    $papeleria = $object->_db->prepare("SELECT tipo_papeleria.id as id, tipo_papeleria.nombre as nombre, papeleria_empleado.nombre_archivo as nombre_archivo, papeleria_empleado.archivo as archivo, papeleria_empleado.fecha_subida as fecha_subida FROM tipo_papeleria left join papeleria_empleado on tipo_papeleria.id = papeleria_empleado.tipo_archivo and papeleria_empleado.expediente_id = :expedienteid");
    $papeleria->bindParam("expedienteid", $Verid, PDO::PARAM_INT);
    $papeleria->execute();

    while ($papel = $papeleria->fetch(PDO::FETCH_OBJ)) { 
        $array3[]=array('id'=>$papel->id,'nombre'=>$papel->nombre,'nombre_archivo'=>$papel->nombre_archivo, 'archivo'=>$papel->archivo, 'fecha_subida'=>$papel->fecha_subida);
    }

?>