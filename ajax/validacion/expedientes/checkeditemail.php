<?php 
		include_once __DIR__ . "/../../../config/conexion.php";
		$object = new connection_database();

		$Editarid = $_POST["editarid"];
		$correo = $_POST["correo_personal"];
		$get_correo = $object -> _db -> prepare("SELECT * FROM expedientes WHERE correo_personal=:correo AND id!=:idexpediente");
		$get_correo -> execute(array(':correo' => $correo, ':idexpediente' => $Editarid));
		$count_query = $get_correo -> rowCount();
		if($count_query > 0){
			$output = false;
		}else{
			$output = true;
		}
		echo json_encode($output);
?>