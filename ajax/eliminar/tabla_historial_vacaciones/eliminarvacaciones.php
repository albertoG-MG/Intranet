<?php
	session_start();
	include_once __DIR__ . "/../../../classes/vacaciones.php";
	if(isset($_POST["id"])){
		$id = $_POST["id"];
		Vacaciones::Eliminar_historial($id);
	}
?>
