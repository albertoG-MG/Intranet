<?php 
	include_once __DIR__ . "/../../../config/conexion.php";
	$object = new connection_database();

	$Editarid = $_POST["editarid"];
	$correo = $_POST["correo_adicional"];
	$get_correo = $object -> _db -> prepare("SELECT correo_adicional from expedientes where correo_adicional=:correo1 AND id!=:idexpediente UNION ALL SELECT correo from usuarios where correo=:correo2");
	$get_correo -> execute(array(':correo1' => $correo, ':idexpediente' => $Editarid, ':correo2' => $correo));
	$count_query = $get_correo -> rowCount();
	if($count_query > 0){
		$output = false;
	}else{
		$output = true;
	}
	echo json_encode($output);
?>