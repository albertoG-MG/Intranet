<?php
	include_once __DIR__ . "/../../../config/conexion.php";
	$object = new connection_database();

	$Editarid = $_POST["editarid"];
	$correo = $_POST["correo_adicional"];

	// Verificar si el correo ya existe en las tres tablas, excluyendo el registro actual que se está editando.
	$get_correo = $object->_db->prepare("
		SELECT correo_adicional FROM expedientes WHERE correo_adicional = :correo AND id != :idexpediente
		UNION ALL
		SELECT correo FROM usuarios WHERE correo = :correo
		UNION ALL
		SELECT correo_adicional FROM expedientes_temporales WHERE correo_adicional = :correo
	");
	$get_correo->execute(array(':correo' => $_POST["correo_adicional"], 'idexpediente' => $_POST["id_expediente"]));
	$count_query = $get_correo->rowCount();

	if ($count_query > 0) {
		$output = "Este correo está repetido, por favor, ingrese otro correo";
	} else {
		$output = true;
	}

	echo json_encode($output);
?>