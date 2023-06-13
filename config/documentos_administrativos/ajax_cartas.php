<?php
require '../conexion.php';
include_once __DIR__ . "/../../classes/permissions.php";
include_once __DIR__ . "/../../classes/roles.php";
$object = new connection_database();

$idrol = $_POST["rol"];
$id = $_POST["sessionid"];

if(Roles::FetchSessionRol($idrol) == "Superadministrador" || Roles::FetchSessionRol($idrol) == "Administrador" || Permissions::CheckPermissions($id, "Ver todos los documentos administrativos") == "true"){
    if(Roles::FetchSessionRol($idrol) == "Gerente" && Roles::FetchUserDepartamento($id) != "Capital humano"){
        $consulta = 'SELECT * FROM (SELECT CONCAT(u1.nombre, " ", u1.apellido_pat, " ", u1.apellido_mat) AS creada_por,  CONCAT(u2.nombre, " ", u2.apellido_pat, " ", u2.apellido_mat) AS asignada_a, CASE WHEN ia.id_acta_administrativa is NOT NULL THEN "ACTA ADMINISTRATIVA" ELSE "CARTA COMPROMISO" END AS tipo, ia.fecha_expedicion AS fecha, ia.nombre_archivo_firmado AS documento_nombre, ia.identificador_archivo_firmado AS documento, ia.id as id, ia.id_acta_administrativa as id_acta_administrativa, ia.id_carta_compromiso as id_carta_compromiso FROM incidencias_administrativas ia INNER JOIN usuarios u1 ON u1.id=ia.users_id INNER JOIN roles r1 ON r1.id=u1.roles_id INNER JOIN expedientes e ON e.id=ia.asignada_a INNER JOIN usuarios u2 ON u2.id=e.users_id  INNER JOIN roles r2 ON r2.id=u2.roles_id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id WHERE r1.nombre="Gerente" AND d2.departamento=:depanom AND r2.nombre IN (SELECT r4.nombre FROM jerarquia j1 INNER JOIN jerarquia j2 ON j2.jerarquia_id=j1.id INNER JOIN roles r3 ON r3.id=j1.rol_id INNER JOIN roles r4 ON j2.rol_id=r4.id  WHERE j1.rol_id=5) order by fecha desc) AS x WHERE x.tipo="CARTA COMPROMISO"';
        $resultado = $object->_db->prepare($consulta);
        $resultado -> execute(array('depanom' => Roles::FetchUserDepartamento($id)));
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
    }else{
        $consulta = 'SELECT * FROM (SELECT CONCAT(u1.nombre, " ", u1.apellido_pat, " ", u1.apellido_mat) AS creada_por,  CONCAT(u2.nombre, " ", u2.apellido_pat, " ", u2.apellido_mat) AS asignada_a, CASE WHEN ia.id_acta_administrativa is NOT NULL THEN "ACTA ADMINISTRATIVA" ELSE "CARTA COMPROMISO" END AS tipo, ia.fecha_expedicion AS fecha, ia.nombre_archivo_firmado AS documento_nombre, ia.identificador_archivo_firmado AS documento, ia.id as id, ia.id_acta_administrativa as id_acta_administrativa, ia.id_carta_compromiso as id_carta_compromiso FROM incidencias_administrativas ia INNER JOIN usuarios u1 ON u1.id=ia.users_id INNER JOIN expedientes e ON e.id=ia.asignada_a INNER JOIN usuarios u2 ON u2.id=e.users_id order by fecha desc) AS x WHERE x.tipo="CARTA COMPROMISO"';
        $resultado = $object->_db->prepare($consulta);
        $resultado -> execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
?>
