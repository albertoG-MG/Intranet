<?php
    require '../conexion.php';
    include_once __DIR__ . "/../../classes/permissions.php";
    include_once __DIR__ . "/../../classes/roles.php";
    $object = new connection_database();

    $idrol = $_POST["rol"];
    $id = $_POST["sessionid"];

    
	$consulta = "SELECT c.id, concat(u1.nombre,' ',u1.apellido_pat,' ',u1.apellido_mat) AS creada_por, concat(u2.nombre,' ',u2.apellido_pat,' ',u2.apellido_mat) AS modificado_por, c.titulo_comunicado, c.descripcion_comunicado, c.fecha_creacion_comunicado, c.fecha_modificacion, c.filename_comunicados, c.comunicados_foto_identificador, c.filename_comunicados_archivo, c.comunicados_archivo_identificador FROM comunicados c INNER JOIN usuarios u1 ON u1.id=c.users_id LEFT JOIN usuarios u2 ON u2.id=c.modificado_por ORDER BY id desc;";
	$resultado = $object->_db->prepare($consulta);
	$resultado -> execute();
	$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
	print json_encode($data, JSON_UNESCAPED_UNICODE);
?>