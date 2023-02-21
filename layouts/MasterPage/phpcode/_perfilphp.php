<?php
include_once __DIR__ . "/../../../config/conexion.php";
include_once __DIR__ . "/../../../classes/expedientes.php";
$object = new connection_database();
    
session_start();

if ($_SESSION['loggedin'] != true) {
    $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    die();
}

$perfil = $object->_db->prepare("SELECT usuarios.nombre AS nombre, usuarios.apellido_pat AS apellido_pat, usuarios.apellido_mat AS apellido_mat, usuarios.correo as correo, roles.nombre AS rolnom, usuarios.nombre_foto as nombre_foto, usuarios.foto_identificador as foto, departamentos.departamento as departamento FROM usuarios LEFT JOIN roles ON usuarios.roles_id=roles.id LEFT JOIN departamentos ON usuarios.departamento_id=departamentos.id WHERE usuarios.id=:sessionid");
$perfil->bindParam("sessionid", $_SESSION['id'], PDO::PARAM_INT);
$perfil->execute();
$profile = $perfil -> fetch(PDO::FETCH_OBJ);

$view=Expedientes::Fetchownexpediente($_SESSION["id"]);

$estado_perfil = $object->_db->prepare("select estados.nombre from estados inner join expedientes on estados.id=expedientes.estado_id inner join usuarios ON usuarios.id=expedientes.users_id where usuarios.id=:usuarioid");
$estado_perfil -> bindParam('usuarioid', $_SESSION["id"], PDO::PARAM_INT);
$estado_perfil->execute();
$count_estado = $estado_perfil ->rowCount();
if($count_estado > 0){
$ver_estado = $estado_perfil->fetch(PDO::FETCH_OBJ);
}

$municipio_perfil = $object->_db->prepare("select municipios.nombre from municipios inner join expedientes on municipios.Id=expedientes.municipio_id inner join usuarios ON usuarios.id=expedientes.users_id where usuarios.id=:usuarioid");
$municipio_perfil -> bindParam('usuarioid', $_SESSION["id"], PDO::PARAM_INT);
$municipio_perfil->execute();
$count_municipio = $municipio_perfil ->rowCount();
if($count_municipio > 0){
$ver_municipio = $municipio_perfil->fetch(PDO::FETCH_OBJ);
}

/*REFERENCIAS LABORALES*/
$array = [];
$contador_array = 0;
$referencias_laborales = $object->_db->prepare("select ref_laborales.nombre as reflabnom, ref_laborales.telefono as reflabtel, ref_laborales.parentesco as reflabparent from ref_laborales inner join expedientes on expedientes.id=ref_laborales.expediente_id inner join usuarios on usuarios.id=expedientes.users_id where usuarios.id =:sessionid");
$referencias_laborales->bindParam("sessionid", $_SESSION["id"], PDO::PARAM_INT);
$referencias_laborales->execute();
$cont_referencias = $referencias_laborales->rowCount();
while ($row_ref = $referencias_laborales->fetch(PDO::FETCH_OBJ)) {
	$array[$contador_array] = ($row_ref->reflabnom);
	$contador_array++;
	$array[$contador_array] = ($row_ref->reflabparent);
	$contador_array++;
	$array[$contador_array] = ($row_ref->reflabtel);
	$contador_array++;
}
$json = json_encode($array, JSON_UNESCAPED_UNICODE);

?>