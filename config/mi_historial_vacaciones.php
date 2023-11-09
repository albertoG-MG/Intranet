<?php
    require 'conexion.php';
    include_once __DIR__ . "/../classes/permissions.php";
    include_once __DIR__ . "/../classes/roles.php";
    $object = new connection_database();

    $id = $_POST["sessionid"];

    $consulta = 'SELECT historial_solicitud_vacaciones.id AS id, concat(usuarios.nombre," ",usuarios.apellido_pat," ",usuarios.apellido_mat) AS nombre, historial_solicitud_vacaciones.periodo_solicitado AS periodo, historial_solicitud_vacaciones.dias_solicitados AS dias, historial_solicitud_vacaciones.fecha_solicitud AS fecha_solicitud, historial_solicitud_vacaciones.estatus AS estatus FROM historial_solicitud_vacaciones INNER JOIN usuarios on usuarios.id = historial_solicitud_vacaciones.users_id WHERE usuarios.id=:sessionid';
    $resultado = $object->_db->prepare($consulta);
    $resultado -> bindParam('sessionid', $id, PDO::PARAM_INT);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>