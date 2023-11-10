<?php
    include_once __DIR__ . "/../config/conexion.php";
    $object = new connection_database();

    $statement = $object -> _db -> prepare("SELECT historial_solicitud_vacaciones.id AS id, CONCAT(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS nombre, historial_solicitud_vacaciones.periodo_solicitado AS periodo, historial_solicitud_vacaciones.dias_solicitados AS dias, historial_solicitud_vacaciones.fecha_solicitud AS fecha_solicitud, historial_solicitud_vacaciones.estatus AS estatus FROM historial_solicitud_vacaciones join usuarios on usuarios.id = historial_solicitud_vacaciones.users_id");
    $statement->execute();
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>