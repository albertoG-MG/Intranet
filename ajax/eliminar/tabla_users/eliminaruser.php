<?php
	session_start();
	include_once __DIR__ . "/../../../classes/user.php";
	if(isset($_POST["id"])){
		$logged_user= $_SESSION["nombre"]. " " .$_SESSION["apellidopat"]. " " .$_SESSION["apellidomat"];
		$id = $_POST["id"];
		User::EliminarUsuarios($id, $logged_user);
	}
?>