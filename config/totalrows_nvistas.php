<?php
    require 'conexion.php';
    $object = new connection_database();
	
	session_start();

    $statement = $object -> _db -> prepare("SELECT COUNT(*) AS totalrows FROM alerta_notificaciones WHERE notificado_a=:notificado AND alerta_estatus = 0");
    $statement -> execute(array('notificado' => $_SESSION["id"]));
    $data=$statement->fetch(PDO::FETCH_OBJ);
    print $data->totalrows;
?>