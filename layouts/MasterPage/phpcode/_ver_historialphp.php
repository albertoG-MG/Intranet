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

 /*Si el id no existe, regresa*/
if($_GET['idExpediente'] == null || $_GET['tipo_papeleria'] == null){
	header('Location: expedientes.php');
	die();
}else{
	$expedienteid = $_GET['idExpediente'];
	$tipo_papeleria_id = $_GET['tipo_papeleria'];
	/*Checa si el expediente esta vinculado*/
	$checkexp=Expedientes::Checkusuarioxexpediente($expedienteid);
	if($checkexp == 0){
		header('Location: expedientes.php');
		die();
	}
	/*Checa si ese tipo de papeleria existe*/
	$checkpapeleria=Expedientes::Checkpapeleria($tipo_papeleria_id);
	if($checkpapeleria == 0){
		header('Location: expedientes.php');
		die();
	}
	/*Checa si hay records en la base de datos*/
	$check_records = Expedientes::Check_records_papeleria($expedienteid, $tipo_papeleria_id);
	if($check_records == 0){
		header('Location: expedientes.php');
		die();
	}
}
?>