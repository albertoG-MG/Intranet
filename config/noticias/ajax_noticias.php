<?php
    require '../conexion.php';
    include_once __DIR__ . "/../../classes/permissions.php";
    include_once __DIR__ . "/../../classes/roles.php";
    $object = new connection_database();

    $idrol = $_POST["rol"];
    $id = $_POST["sessionid"];

    
	$consulta = "SELECT n.id, concat(u1.nombre,' ',u1.apellido_pat,' ',u1.apellido_mat) AS creada_por, concat(u2.nombre,' ',u2.apellido_pat,' ',u2.apellido_mat) AS modificado_por, n.titulo_noticia, n.descripcion_noticia, n.fecha_creacion_noticia, n.fecha_modificacion, n.filename_noticias, n.noticias_foto_identificador FROM noticias n INNER JOIN usuarios u1 ON u1.id=n.users_id LEFT JOIN usuarios u2 ON u2.id=n.modificado_por;";
	$resultado = $object->_db->prepare($consulta);
	$resultado -> execute();
	$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
	print json_encode($data, JSON_UNESCAPED_UNICODE);
?>
