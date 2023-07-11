<?php
    require '../conexion.php';
    include_once __DIR__ . "/../../classes/permissions.php";
    include_once __DIR__ . "/../../classes/roles.php";
    $object = new connection_database();

    $idrol = $_POST["rol"];
    $id = $_POST["sessionid"];

    if(Roles::FetchSessionRol($idrol) != "Superadministrador" && Roles::FetchSessionRol($idrol) != "Administrador"){
        $consulta = 'SELECT solicitud_vacaciones.id as solicitud_id, CONCAT(u1.nombre, " ", u1.apellido_pat, " ", u1.apellido_mat) AS nombre, solicitud_vacaciones.periodo_solicitado AS periodo, solicitud_vacaciones.fecha_solicitud AS fecha_solicitud, estatus_vacaciones.id AS estatus_id, solicitud_vacaciones.estatus AS id_estatus FROM solicitud_vacaciones INNER JOIN usuarios u1 ON u1.id=solicitud_vacaciones.users_id INNER JOIN estatus_vacaciones ON estatus_vacaciones.id=solicitud_vacaciones.estatus INNER JOIN notificaciones_vacaciones ON notificaciones_vacaciones.id_solicitud_vacaciones = solicitud_vacaciones.id INNER JOIN usuarios u2 ON u2.id=notificaciones_vacaciones.id_notificado WHERE u2.id=:notificacion AND estatus_vacaciones.id="3" order by fecha_solicitud DESC';
        $resultado = $object->_db->prepare($consulta);
        $resultado -> execute(array(':notificacion' => $id));
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
    }else{
        $consulta = 'SELECT solicitud_vacaciones.id as solicitud_id, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre, solicitud_vacaciones.periodo_solicitado AS periodo, solicitud_vacaciones.fecha_solicitud AS fecha_solicitud, estatus_vacaciones.id AS estatus_id, solicitud_vacaciones.estatus AS id_estatus FROM solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id INNER JOIN estatus_vacaciones ON estatus_vacaciones.id=solicitud_vacaciones.estatus WHERE estatus_vacaciones.id="3" order by fecha_solicitud desc';
        $resultado = $object->_db->prepare($consulta);
        $resultado -> execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
    }
?>
