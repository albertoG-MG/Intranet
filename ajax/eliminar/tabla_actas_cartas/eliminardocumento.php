<?php
	session_start();
	include_once __DIR__ . "/../../../classes/incidencias.php";
	if(isset($_POST["id"], $_POST["tipo_incidencia"])){
		$id = $_POST["id"];
		$tipo_incidencia = $_POST["tipo_incidencia"];
		if($tipo_incidencia == "ACTA ADMINISTRATIVA"){
			$id_acta = $_POST["id_acta"];
			Actas::EliminarActa($id, $id_acta);
		}else{
			$id_carta = $_POST["id_carta"];
			Cartas::EliminarCarta($id, $id_carta);
		}
	}
?>
