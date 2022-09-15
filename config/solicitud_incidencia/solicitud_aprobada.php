<?php
require '../conexion.php';
$object = new connection_database();

/*$idrol = $_POST["rol"];*/
$id = $_POST["sessionid"];


$select_rol_dep = $object -> _db -> prepare("SELECT roles.nombre as rolnom, departamentos.departamento as depanom FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id LEFT JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE usuarios.id=:userid");
$select_rol_dep -> execute(array(":userid" => $id));
$fetch_rol_dep = $select_rol_dep -> fetch(PDO::FETCH_OBJ);

if($fetch_rol_dep -> rolnom != "Superadministrador" || $fetch_rol_dep -> rolnom != "Administrador" || $fetch_rol_dep -> rolnom != "Usuario externo"){
$consulta = 'select papel.id as incidenciaid, u.nombre as nombre, u.apellido_pat as apellido_pat, u.apellido_mat as apellido_mat, papel.tipo_incidencia as tipo_incidencia, papel.fecha_inicio as fecha_inicio, papel.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre, accion_incidencias.goce_de_sueldo as sueldo from jerarquia t1 inner join roles a ON t1.rol_id=a.id inner join usuarios u ON u.roles_id=a.id left join departamentos d ON u.departamento_id=d.id INNER JOIN incidencias papel ON papel.users_id=u.id INNER JOIN estatus_incidencia ON estatus_incidencia.id=papel.estatus_id LEFT JOIN accion_incidencias ON accion_incidencias.incidencias_id = papel.id  WHERE d.departamento = :departamento1 AND a.nombre in (SELECT CASE WHEN a.nombre="Director" THEN (select r.nombre from jerarquia t4 inner join roles r on t4.rol_id=r.id WHERE r.nombre=(SELECT a.nombre as EMPLEADO FROM jerarquia t1 INNER JOIN roles a ON t1.rol_id=a.id INNER JOIN usuarios u ON u.roles_id=a.id LEFT JOIN departamentos d ON u.departamento_id=d.id LEFT JOIN jerarquia t2 ON t1.jerarquia_id=t2.id INNER JOIN roles b ON b.id=t2.rol_id WHERE b.nombre="Director general" AND d.departamento = :departamento2) UNION select "Gerente" LIMIT 1) ELSE a.nombre END FROM jerarquia t1 INNER JOIN roles a ON t1.rol_id=a.id INNER JOIN jerarquia t2 ON t1.jerarquia_id = t2.id INNER JOIN roles b ON t2.rol_id=b.id WHERE b.nombre=:rolnom) AND papel.estatus_id="1"';
$resultado = $object->_db->prepare($consulta);
/*}else{
	$consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id INNER JOIN estatus_incidencia ON incidencias.estatus_id=estatus_incidencia.id WHERE usuarios.id = :iduser";
	$resultado = $object->_db->prepare($consulta);
	$resultado -> bindParam('iduser', $id, PDO::PARAM_INT);
}*/
$resultado->execute(array(':departamento1' => $fetch_rol_dep -> depanom, ':departamento2' => $fetch_rol_dep -> depanom, ':rolnom' => $fetch_rol_dep -> rolnom));
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
}
?>