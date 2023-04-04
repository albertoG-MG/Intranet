<?php
require '../conexion.php';
$object = new connection_database();

$idrol = $_POST["rol"];
$id = $_POST["sessionid"];


$select_rol_dep = $object -> _db -> prepare("SELECT roles.nombre as rolnom, departamentos.departamento as depanom FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id LEFT JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE usuarios.id=:userid");
$select_rol_dep -> execute(array(":userid" => $id));
$fetch_rol_dep = $select_rol_dep -> fetch(PDO::FETCH_OBJ);

if($fetch_rol_dep -> rolnom != "Superadministrador" && $fetch_rol_dep -> rolnom != "Administrador"){
	if($fetch_rol_dep -> rolnom != "Director general"){
		$consulta = 'select incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre, accion_incidencias.goce_de_sueldo as sueldo from usuarios inner join departamentos on usuarios.departamento_id=departamentos.id inner join roles on usuarios.roles_id=roles.id inner join incidencias on incidencias.users_id = usuarios.id inner join estatus_incidencia on estatus_incidencia.id=incidencias.estatus_id left join accion_incidencias on accion_incidencias.incidencias_id=incidencias.id WHERE incidencias.notificado_a=:notificacion and departamentos.departamento=:departamento and incidencias.estatus_id="2"';
		$resultado = $object->_db->prepare($consulta);
		$resultado -> execute(array(':notificacion' => $idrol, ':departamento' => $fetch_rol_dep -> depanom));
	}else{
		$consulta = 'select incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre, accion_incidencias.goce_de_sueldo as sueldo from usuarios left join departamentos on usuarios.departamento_id=departamentos.id inner join roles on usuarios.roles_id=roles.id inner join incidencias on incidencias.users_id = usuarios.id inner join estatus_incidencia on estatus_incidencia.id=incidencias.estatus_id left join accion_incidencias on accion_incidencias.incidencias_id=incidencias.id WHERE incidencias.notificado_a=:notificacion and incidencias.estatus_id="2"';
		$resultado = $object->_db->prepare($consulta);
		$resultado -> execute(array(':notificacion' => $idrol));
	}
/*}else{
	$consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id INNER JOIN estatus_incidencia ON incidencias.estatus_id=estatus_incidencia.id WHERE usuarios.id = :iduser";
	$resultado = $object->_db->prepare($consulta);
	$resultado -> bindParam('iduser', $id, PDO::PARAM_INT);
}*/
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
}else{
	$consulta = 'select incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre, accion_incidencias.goce_de_sueldo as sueldo from usuarios left join departamentos on usuarios.departamento_id=departamentos.id inner join roles on usuarios.roles_id=roles.id inner join incidencias on incidencias.users_id = usuarios.id inner join estatus_incidencia on estatus_incidencia.id=incidencias.estatus_id left join accion_incidencias on accion_incidencias.incidencias_id=incidencias.id WHERE incidencias.estatus_id="2";';
	$resultado = $object->_db->prepare($consulta);
	$resultado -> execute();
	$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
	print json_encode($data, JSON_UNESCAPED_UNICODE);
}
?>