<?php
	include_once __DIR__ . "/../../../classes/expedientes.php";
	session_start();
	if(isset($_POST["id"], $_POST["rowdefault"])){
		$logged_user= $_SESSION["nombre"]. " " .$_SESSION["apellidopat"]. " " .$_SESSION["apellidomat"];
		$id = $_POST["id"];
		$rowdefault = $_POST["rowdefault"];
		Expedientes::Eliminar_Historial_Papeleria($id, $rowdefault, $logged_user);
	}
?>