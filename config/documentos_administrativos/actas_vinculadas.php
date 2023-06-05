<?php
require '../conexion.php';
include_once __DIR__ . "/../../classes/permissions.php";
include_once __DIR__ . "/../../classes/roles.php";
$object = new connection_database();

$idrol = $_POST["rol"];
$id = $_POST["sessionid"];

$check_jerarquia = $object -> _db -> prepare("SELECT * FROM jerarquia INNER JOIN roles ON roles.id=jerarquia.rol_id INNER JOIN usuarios ON usuarios.roles_id=roles.id WHERE usuarios.id=:userid AND jerarquia.jerarquia_id is NOT NULL");
$check_jerarquia -> execute(array(":userid" => $id));
$count_jerarquia = $check_jerarquia -> rowCount();

if($count_jerarquia > 0){
    $consulta = 'SELECT * FROM (SELECT CONCAT(u1.nombre, " ", u1.apellido_pat, " ", u1.apellido_mat) AS creada_por,  CONCAT(u2.nombre, " ", u2.apellido_pat, " ", u2.apellido_mat) AS asignada_a, CASE WHEN ia.id_acta_administrativa is NOT NULL THEN "ACTA ADMINISTRATIVA" ELSE "CARTA COMPROMISO" END AS tipo, ia.fecha_expedicion AS fecha, ia.nombre_archivo_firmado AS documento_nombre, ia.identificador_archivo_firmado AS documento, ia.id as id, ia.id_acta_administrativa as id_acta_administrativa, ia.id_carta_compromiso as id_carta_compromiso FROM incidencias_administrativas ia INNER JOIN usuarios u1 ON u1.id=ia.users_id INNER JOIN usuarios u2 ON u2.id=ia.asignada_a WHERE u2.id=:sessionid order by fecha desc) AS x WHERE x.tipo="ACTA ADMINISTRATIVA"';
    $resultado = $object->_db->prepare($consulta);
    $resultado -> execute(array(':sessionid' => $id));
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
}
?>
