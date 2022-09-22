<?php
require '../conexion.php';
$object = new connection_database();

/*$idrol = $_POST["rol"];*/
$id = $_POST["sessionid"];
$rechazado = 3;

/*$rolnombre = $object -> _db -> prepare("SELECT roles.nombre FROM usuarios INNER JOIN roles ON usuarios.roles_id=roles.id WHERE roles_id= :rolid");
$rolnombre -> execute(array(":rolid" => $idrol));
$fetch_rolnombre = $rolnombre -> fetch(PDO::FETCH_OBJ);*/

$select_rol_dep = $object -> _db -> prepare("SELECT roles.nombre as rolnom, departamentos.departamento as depanom FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id LEFT JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE usuarios.id=:userid");
$select_rol_dep -> execute(array(":userid" => $id));
$fetch_rol_dep = $select_rol_dep -> fetch(PDO::FETCH_OBJ);

/*if($fetch_rolnombre -> nombre == "Superadministrador" || $fetch_rolnombre -> nombre == "Administrador"){
    $consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id INNER JOIN estatus_incidencia ON incidencias.estatus_id=estatus_incidencia.id";
    $resultado = $object->_db->prepare($consulta);
}else{*/
if($fetch_rol_dep -> rolnom != "Superadministrador" && $fetch_rol_dep -> rolnom != "Administrador" && $fetch_rol_dep -> rolnom != "Director general"){
    $consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre, accion_incidencias.goce_de_sueldo as sueldo FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id INNER JOIN estatus_incidencia ON incidencias.estatus_id=estatus_incidencia.id LEFT JOIN accion_incidencias ON accion_incidencias.incidencias_id = incidencias.id WHERE usuarios.id=:iduser AND incidencias.estatus_id =:estatus";
    $resultado = $object->_db->prepare($consulta);
    $resultado -> bindParam('iduser', $id, PDO::PARAM_INT);
    $resultado -> bindParam('estatus', $rechazado, PDO::PARAM_INT);
/*}*/
    $resultado->execute();
}else{
    $consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre, accion_incidencias.goce_de_sueldo as sueldo FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id INNER JOIN estatus_incidencia ON incidencias.estatus_id=estatus_incidencia.id LEFT JOIN accion_incidencias ON accion_incidencias.incidencias_id = incidencias.id WHERE incidencias.estatus_id =:estatus";
    $resultado = $object->_db->prepare($consulta);
    $resultado -> bindParam('estatus', $rechazado, PDO::PARAM_INT);
    $resultado->execute();
}
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
?>