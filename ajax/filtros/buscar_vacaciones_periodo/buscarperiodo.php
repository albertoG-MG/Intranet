<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];

    $statement = $object -> _db -> prepare('SELECT solicitud_vacaciones.id AS solicitud_id, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre, solicitud_vacaciones.periodo_solicitado AS periodo_solicitado, solicitud_vacaciones.fecha_solicitud AS fecha_solicitud, estatus_vacaciones.id AS estatus FROM solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id INNER JOIN estatus_vacaciones ON estatus_vacaciones.id=solicitud_vacaciones.estatus WHERE fecha_solicitud BETWEEN :fecha_inicio AND :fecha_fin  order by fecha_solicitud desc');
    $statement->execute(array(':fecha_inicio' => $fecha_inicio, ':fecha_fin' => $fecha_fin));
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>