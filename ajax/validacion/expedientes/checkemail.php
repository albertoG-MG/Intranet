<?php 
	include_once __DIR__ . "/../../../config/conexion.php";
	$object = new connection_database();

	$correo = $_GET["correo_adicional"];
	$get_correo = $object->_db->prepare("
        SELECT correo_adicional FROM expedientes WHERE correo_adicional = :correo
        UNION ALL
        SELECT correo FROM usuarios WHERE correo = :correo
    ");
	$get_correo->execute(array(':correo' => $correo));
	$count_query = $get_correo->rowCount();

	if ($count_query > 0) {
		$output = "Este correo está repetido, por favor, ingrese otro correo";
	} else {
		$output = true;
	}

	echo json_encode($output);
?>