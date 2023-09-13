<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();
    
    session_start();
    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }
    
    $perfil = $object->_db->prepare("SELECT usuarios.nombre AS nombre, usuarios.apellido_pat AS apellido_pat, usuarios.apellido_mat AS apellido_mat, roles.nombre AS rolnom, usuarios.nombre_foto as nombre_foto, usuarios.foto_identificador as foto FROM usuarios LEFT JOIN roles ON usuarios.roles_id=roles.id WHERE usuarios.id=:sessionid");
    $perfil->bindParam("sessionid", $_SESSION['id'], PDO::PARAM_INT);
    $perfil->execute();
    $profile = $perfil -> fetch(PDO::FETCH_OBJ);

    $countuserscheck = $object->_db->prepare("SELECT count(*) AS total FROM usuarios");
    $countuserscheck -> execute();
    $countusers = $countuserscheck -> fetch(PDO::FETCH_OBJ);

    $checkexpedientes = $object->_db->prepare("SELECT count(*) AS totalexpedientes FROM expedientes");
    $checkexpedientes -> execute();
    $countexpedientes = $checkexpedientes -> fetch(PDO::FETCH_OBJ);

    $checkdepartamentos = $object -> _db ->prepare("SELECT count(*) AS totaldepartamentos from departamentos");
    $checkdepartamentos -> execute();
    $countdepartamentos = $checkdepartamentos -> fetch(PDO::FETCH_OBJ);

    $checkdocumentos = $object->_db->prepare("SELECT count(*) AS totalpapeleria FROM tipo_papeleria");
    $checkdocumentos -> execute();
    $countdocumentos = $checkdocumentos -> fetch(PDO::FETCH_OBJ);

    if(Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Director general" && Roles::FetchSessionRol($_SESSION["rol"]) != "Usuario externo" && Roles::FetchSessionRol($_SESSION["rol"]) != ""){
        //Incidencias
        $consulta = 'SELECT DISTINCT CASE WHEN incidencias.id_permiso_reglamentario is NOT NULL THEN CASE WHEN permisos_reglamentarios.permiso_r = "OTRO" OR permisos_reglamentarios.permiso_r = "HOME_OFFICE" THEN "PERMISO REGLAMENTARIO ND" ELSE "PERMISO REGLAMENTARIO D" END WHEN incidencias.id_permiso_no_reglamentario is NOT NULL THEN CASE WHEN permisos_no_reglamentarios.permiso_nr = "AUSENCIA" THEN "PERMISO NO REGLAMENTARIO A" ELSE "PERMISO NO REGLAMENTARIO G" END ELSE "INCAPACIDAD" END AS tipo_permiso, estatus_incidencia.id as estatus_id, solicitudes_incidencias.fecha_solicitud as fecha_solicitud FROM incidencias INNER JOIN solicitudes_incidencias ON incidencias.id_solicitud_incidencias=solicitudes_incidencias.id LEFT JOIN permisos_reglamentarios ON permisos_reglamentarios.id=incidencias.id_permiso_reglamentario LEFT JOIN permisos_no_reglamentarios ON permisos_no_reglamentarios.id=incidencias.id_permiso_no_reglamentario LEFT JOIN incapacidades ON incapacidades.id=incidencias.id_incapacidades INNER JOIN usuarios u1 ON solicitudes_incidencias.users_id=u1.id INNER JOIN departamentos ON departamentos.id=u1.departamento_id INNER JOIN estatus_incidencia ON solicitudes_incidencias.estatus=estatus_incidencia.id INNER JOIN notificaciones_incidencias ON notificaciones_incidencias.id_solicitud_incidencias = solicitudes_incidencias.id INNER JOIN usuarios u2 ON u2.id=notificaciones_incidencias.id_notificado INNER JOIN roles ON roles.id=u2.roles_id LEFT JOIN accion_incidencias ON accion_incidencias.incidencias_id=incidencias.id WHERE u1.id=:sessionid order by fecha_solicitud desc LIMIT 5';
        $resultado = $object->_db->prepare($consulta);
        $resultado->execute(array(':sessionid' => $_SESSION['id']));
        $count_incidencias = $resultado -> rowCount();

        //Vacaciones
        $query = 'SELECT solicitud_vacaciones.periodo_solicitado AS periodo_solicitado, solicitud_vacaciones.fecha_solicitud AS fecha_solicitud, estatus_vacaciones.id AS estatus FROM solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id INNER JOIN estatus_vacaciones ON estatus_vacaciones.id=solicitud_vacaciones.estatus WHERE usuarios.id=:sessionid order by fecha_solicitud desc LIMIT 5';
        $result = $object->_db->prepare($query);
        $result->execute(array(':sessionid' => $_SESSION['id']));
        $count_vacaciones = $result -> rowCount();
    }
?>