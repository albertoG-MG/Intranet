<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/user.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: Login.php');
        die();
    }
	
	/*Si el id no existe, regresa*/
	if($_GET['idUser'] == null){
		header('Location: expedientes.php');
	}else{
		$Editarid = $_GET['idUser'];
	}

    $estado = $object->_db->prepare("select * from estados");
    $estado->execute();
    $contestado=0;

?>