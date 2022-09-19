<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/incidencias.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }
	 
	//Validacion - Si se quiere acceder a editar incidencia sin id, regresa

    if($_GET['idIncidencia'] == null){
        header('Location: incidencias.php');
        die();
    }else{
		$verid = $_GET['idIncidencia'];
		$checkincidencia=Incidencias::Checkincidencia($verid);
		//Validacion - Si la incidencia no existe, regresa
		if($checkincidencia > 0){
		}else{
		   header('Location: incidencias.php');
		   die();	
		}
	}

    $ver=Incidencias::Fetchverincidencia($verid);

	
?>