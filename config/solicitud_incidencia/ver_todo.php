<?php
	require '../conexion.php';
	include_once __DIR__ . "/../../classes/permissions.php";
	include_once __DIR__ . "/../../classes/roles.php";
	$object = new connection_database();

	$idrol = $_POST["rol"];
	$id = $_POST["sessionid"];

	if(Roles::FetchSessionRol($idrol) != "Superadministrador" && Roles::FetchSessionRol($idrol) != "Administrador"){
		$consulta = 'SELECT DISTINCT solicitudes_incidencias.id as solicitud_id, CONCAT(u1.nombre, " ", u1.apellido_pat, " ", u1.apellido_mat) as nombre,CASE WHEN incidencias.id_permiso_reglamentario is NOT NULL THEN CASE WHEN permisos_reglamentarios.permiso_r = "OTRO" OR permisos_reglamentarios.permiso_r = "HOME OFFICE" THEN "PERMISO REGLAMENTARIO D" ELSE "PERMISO REGLAMENTARIO ND" END WHEN incidencias.id_permiso_no_reglamentario is NOT NULL THEN CASE WHEN permisos_no_reglamentarios.permiso_nr = "AUSENCIA" THEN "PERMISO NO REGLAMENTARIO A" ELSE "PERMISO NO REGLAMENTARIO G" END ELSE "INCAPACIDAD" END AS tipo_permiso, CASE WHEN incidencias.id_permiso_reglamentario is NOT NULL THEN permisos_reglamentarios.periodo_ausencia_r WHEN incidencias.id_permiso_no_reglamentario THEN permisos_no_reglamentarios.periodo_ausencia_nr ELSE incapacidades.periodo_incapacidad END AS periodo,  accion_incidencias.goce_de_sueldo as sueldo, estatus_incidencia.id as estatus_id, solicitudes_incidencias.fecha_solicitud as fecha_solicitud, incidencias.id as Incidenciaid FROM incidencias INNER JOIN solicitudes_incidencias ON incidencias.id_solicitud_incidencias=solicitudes_incidencias.id LEFT JOIN permisos_reglamentarios ON permisos_reglamentarios.id=incidencias.id_permiso_reglamentario LEFT JOIN permisos_no_reglamentarios ON permisos_no_reglamentarios.id=incidencias.id_permiso_no_reglamentario LEFT JOIN incapacidades ON incapacidades.id=incidencias.id_incapacidades INNER JOIN usuarios u1 ON solicitudes_incidencias.users_id=u1.id INNER JOIN estatus_incidencia ON solicitudes_incidencias.estatus=estatus_incidencia.id INNER JOIN notificaciones_incidencias ON notificaciones_incidencias.id_solicitud_incidencias = solicitudes_incidencias.id INNER JOIN usuarios u2 ON u2.id=notificaciones_incidencias.id_notificado LEFT JOIN accion_incidencias ON accion_incidencias.incidencias_id=incidencias.id WHERE u2.id=:notificacion AND solicitudes_incidencias.estatus!="4" order by fecha_solicitud desc';
		$resultado = $object->_db->prepare($consulta);
		$resultado -> execute(array(':notificacion' => $id));
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		print json_encode($data, JSON_UNESCAPED_UNICODE);
	}else{
		$consulta = 'SELECT DISTINCT solicitudes_incidencias.id as solicitud_id, CONCAT(u1.nombre, " ", u1.apellido_pat, " ", u1.apellido_mat) as nombre,CASE WHEN incidencias.id_permiso_reglamentario is NOT NULL THEN CASE WHEN permisos_reglamentarios.permiso_r = "OTRO" OR permisos_reglamentarios.permiso_r = "HOME OFFICE" THEN "PERMISO REGLAMENTARIO D" ELSE "PERMISO REGLAMENTARIO ND" END WHEN incidencias.id_permiso_no_reglamentario is NOT NULL THEN CASE WHEN permisos_no_reglamentarios.permiso_nr = "AUSENCIA" THEN "PERMISO NO REGLAMENTARIO A" ELSE "PERMISO NO REGLAMENTARIO G" END ELSE "INCAPACIDAD" END AS tipo_permiso, CASE WHEN incidencias.id_permiso_reglamentario is NOT NULL THEN permisos_reglamentarios.periodo_ausencia_r WHEN incidencias.id_permiso_no_reglamentario THEN permisos_no_reglamentarios.periodo_ausencia_nr ELSE incapacidades.periodo_incapacidad END AS periodo,  accion_incidencias.goce_de_sueldo as sueldo, estatus_incidencia.id as estatus_id, solicitudes_incidencias.fecha_solicitud as fecha_solicitud, incidencias.id as Incidenciaid FROM incidencias INNER JOIN solicitudes_incidencias ON incidencias.id_solicitud_incidencias=solicitudes_incidencias.id LEFT JOIN permisos_reglamentarios ON permisos_reglamentarios.id=incidencias.id_permiso_reglamentario LEFT JOIN permisos_no_reglamentarios ON permisos_no_reglamentarios.id=incidencias.id_permiso_no_reglamentario LEFT JOIN incapacidades ON incapacidades.id=incidencias.id_incapacidades INNER JOIN usuarios u1 ON solicitudes_incidencias.users_id=u1.id INNER JOIN departamentos ON departamentos.id=u1.departamento_id INNER JOIN estatus_incidencia ON solicitudes_incidencias.estatus=estatus_incidencia.id INNER JOIN notificaciones_incidencias ON notificaciones_incidencias.id_solicitud_incidencias = solicitudes_incidencias.id INNER JOIN usuarios u2 ON u2.id=notificaciones_incidencias.id_notificado INNER JOIN roles ON roles.id=u2.roles_id LEFT JOIN accion_incidencias ON accion_incidencias.incidencias_id=incidencias.id WHERE solicitudes_incidencias.estatus!="4" order by fecha_solicitud desc';
		$resultado = $object->_db->prepare($consulta);
		$resultado -> execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		print json_encode($data, JSON_UNESCAPED_UNICODE);
	}
?>
