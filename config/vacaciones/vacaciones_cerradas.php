<?php
    require '../conexion.php';
    include_once __DIR__ . "/../../classes/permissions.php";
    include_once __DIR__ . "/../../classes/roles.php";
    $object = new connection_database();

    $consulta = 'SELECT solicitud_vacaciones.id AS solicitud_id, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre, solicitud_vacaciones.periodo_solicitado AS periodo_solicitado, solicitud_vacaciones.dias_solicitados as dias, solicitud_vacaciones.fecha_solicitud AS fecha_solicitud, estatus_vacaciones.id AS estatus FROM solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id INNER JOIN estatus_vacaciones ON estatus_vacaciones.id=solicitud_vacaciones.estatus WHERE estatus_vacaciones.id!="4" order by fecha_solicitud desc';
    $resultado = $object->_db->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>
