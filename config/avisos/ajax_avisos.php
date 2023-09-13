<?php
    require '../conexion.php';
    include_once __DIR__ . "/../../classes/permissions.php";
    include_once __DIR__ . "/../../classes/roles.php";
    $object = new connection_database();

    $idrol = $_POST["rol"];
    $id = $_POST["sessionid"];

    
	$consulta = "SELECT a.id, concat(u1.nombre,' ',u1.apellido_pat,' ',u1.apellido_mat) AS creada_por, concat(u2.nombre,' ',u2.apellido_pat,' ',u2.apellido_mat) AS modificado_por, a.titulo_aviso, a.descripcion_aviso, a.fecha_creacion_aviso, a.fecha_modificacion, a.filename_avisos, a.avisos_foto_identificador, a.filename_archivo_aviso, a.aviso_archivo_identificador FROM avisos a INNER JOIN usuarios u1 ON u1.id=a.users_id LEFT JOIN usuarios u2 ON u2.id=a.modificado_por ORDER BY id desc;";
	$resultado = $object->_db->prepare($consulta);
	$resultado -> execute();
	$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
	print json_encode($data, JSON_UNESCAPED_UNICODE);
?>
