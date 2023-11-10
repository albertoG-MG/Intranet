<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $fecha_actual = date("Y/m/d");

    $statement = $object -> _db -> prepare('SELECT historial_solicitud_vacaciones.id AS id, CONCAT(usuarios.nombre," ",usuarios.apellido_pat," ",usuarios.apellido_mat) AS nombre, CONCAT(DATE_FORMAT(:fecha_inicio, "%Y/%m/%d"), " - ", DATE_FORMAT(:fecha_fin, "%Y/%m/%d")) AS periodo, SUM(historial_solicitud_vacaciones.dias_solicitados) AS dias, DATE_FORMAT(:fecha_actual, "%Y/%m/%d") AS fecha_solicitud, historial_solicitud_vacaciones.estatus AS estatus FROM historial_solicitud_vacaciones INNER JOIN usuarios ON usuarios.id = historial_solicitud_vacaciones.users_id WHERE historial_solicitud_vacaciones.fecha_solicitud BETWEEN :fecha_inicio AND :fecha_fin GROUP BY historial_solicitud_vacaciones.id, usuarios.nombre, usuarios.apellido_pat, usuarios.apellido_mat, historial_solicitud_vacaciones.periodo_solicitado, historial_solicitud_vacaciones.dias_solicitados, historial_solicitud_vacaciones.fecha_solicitud, historial_solicitud_vacaciones.estatus');
    $statement->execute(array(':fecha_inicio' => $fecha_inicio, ':fecha_fin' => $fecha_fin, ':fecha_actual' => $fecha_actual));
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>