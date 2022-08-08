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
		$Editarid = $_GET['idExpediente'];
        /*Checa si el expediente esta vinculado*/
        $checkexp=Expedientes::Checkusuarioxexpediente($Editarid);
        if($checkexp == 0){
            header('Location: expedientes.php');
        }
	}

    $edit=Expedientes::Fetcheditexpediente($Editarid);

    $estado = $object->_db->prepare("select * from estados");
    $estado->execute();
    $contestado=0;


    /*REFERENCIAS LABORALES*/
    $array = [];
    $contador_array = 0;
    $referencias_laborales = $object->_db->prepare("select * from ref_laborales where expediente_id =:expedienteid");
    $referencias_laborales->bindParam("expedienteid", $Editarid, PDO::PARAM_INT);
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
    $datos_bancarios->bindParam("expedienteid", $Editarid, PDO::PARAM_INT);
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

?>