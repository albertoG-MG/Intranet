<?php
	include_once __DIR__ . "/../../../classes/expedientes.php";
	if(isset($_POST["id"], $_POST["rowdefault"])){
		$id = $_POST["id"];
		$rowdefault = $_POST["rowdefault"];
		Expedientes::Eliminar_Historial_Papeleria($id, $rowdefault);
	}
?>