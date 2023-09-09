<?php
    require 'conexion.php';
    $object = new connection_database();
	
	session_start();

    $no_of_records_per_page = $_GET["pageSize"];
    $pageno = $_GET["pageNumber"];
    $offset = ($pageno-1) * $no_of_records_per_page;

    $statement = $object -> _db -> prepare("SELECT alerta_notificaciones.*, CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) AS enviado_por FROM alerta_notificaciones LEFT JOIN usuarios ON usuarios.id=alerta_notificaciones.enviado_por WHERE notificado_a=:notificado AND alerta_estatus = 0 ORDER BY fecha_creacion DESC LIMIT $offset, $no_of_records_per_page");
    $statement -> execute(array('notificado' => $_SESSION["id"]));
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
    print json_encode(['items' => $data]);
?>