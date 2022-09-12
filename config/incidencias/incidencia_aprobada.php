<?php
require '../conexion.php';
$object = new connection_database();

/*$idrol = $_POST["rol"];*/
$id = $_POST["sessionid"];
$pendiente = 1;

/*$rolnombre = $object -> _db -> prepare("SELECT roles.nombre FROM usuarios INNER JOIN roles ON usuarios.roles_id=roles.id WHERE roles_id= :rolid");
$rolnombre -> execute(array(":rolid" => $idrol));
$fetch_rolnombre = $rolnombre -> fetch(PDO::FETCH_OBJ);

if($fetch_rolnombre -> nombre == "Superadministrador" || $fetch_rolnombre -> nombre == "Administrador"){
    $consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id INNER JOIN estatus_incidencia ON incidencias.estatus_id=estatus_incidencia.id";
    $resultado = $object->_db->prepare($consulta);
}else{*/
$consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, estatus_incidencia.nombre as estatus_nombre FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id INNER JOIN estatus_incidencia ON incidencias.estatus_id=estatus_incidencia.id WHERE usuarios.id = :iduser AND estatus_incidencia.id=:estatus";
$resultado = $object->_db->prepare($consulta);
$resultado -> bindParam('iduser', $id, PDO::PARAM_INT);
$resultado -> bindParam('estatus', $pendiente, PDO::PARAM_INT);
/*}*/
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
?>