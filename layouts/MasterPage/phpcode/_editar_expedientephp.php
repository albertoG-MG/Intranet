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

?>