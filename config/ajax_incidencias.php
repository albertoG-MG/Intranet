<?php
require 'conexion.php';
$object = new connection_database();

$idrol = $_POST["rol"];
$id = $_POST["sessionid"];

if($idrol == 1){
    $consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.titulo as titulo, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, incidencias.estatus_incidencia as estatus_incidencia FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id";
    $resultado = $object->_db->prepare($consulta);
}else{
    $consulta = "SELECT incidencias.id as incidenciaid, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, incidencias.titulo as titulo, incidencias.tipo_incidencia as tipo_incidencia, incidencias.fecha_inicio as fecha_inicio, incidencias.fecha_fin as fecha_fin, incidencias.estatus_incidencia as estatus_incidencia FROM incidencias INNER JOIN usuarios ON incidencias.users_id = usuarios.id WHERE usuarios.id = :iduser";
    $resultado = $object->_db->prepare($consulta);
    $resultado -> bindParam('iduser', $id, PDO::PARAM_INT);
}
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
?>