<?php
include_once __DIR__ . "/../../../config/conexion.php";
include_once __DIR__ . "/../../../classes/expedientes.php";
$object = new connection_database();
    
session_start();
    $crud = new Crud();

if ($_SESSION['loggedin'] != true) {
    $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    die();
}

$perfil = $object->_db->prepare("SELECT usuarios.nombre AS nombre, usuarios.apellido_pat AS apellido_pat, usuarios.apellido_mat AS apellido_mat, usuarios.correo as correo, roles.nombre AS rolnom, usuarios.nombre_foto as nombre_foto, usuarios.foto_identificador as foto, departamentos.departamento as departamento FROM usuarios LEFT JOIN roles ON usuarios.roles_id=roles.id LEFT JOIN departamentos ON usuarios.departamento_id=departamentos.id WHERE usuarios.id=:sessionid");
$perfil->bindParam("sessionid", $_SESSION['id'], PDO::PARAM_INT);
$perfil->execute();
$profile = $perfil -> fetch(PDO::FETCH_OBJ);

$checkcurrentuserxexpediente = Expedientes::Checkifcurrentuserxexpediente($_SESSION["id"]);

$rolname = Roles::FetchSessionRol($_SESSION["rol"]);

if($rolname != "Superadministrador" && $rolname != "Administrador" && $rolname != "Usuario externo" && !(is_null($rolname))) {
	$switchExpedientes = "true";
}else{
	$switchExpedientes = "false";
}

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
$referencias_laborales = $object->_db->prepare("select ref_laborales.nombre1 as reflabnom, ref_laborales.apellido_pat1 as reflabcapat, ref_laborales.apellido_mat1 as reflabamat, ref_laborales.telefono1 as reflabtel, ref_laborales.relacion1 as reflabrelacion from ref_laborales inner join expedientes on expedientes.id=ref_laborales.expediente_id inner join usuarios on usuarios.id=expedientes.users_id where usuarios.id =:sessionid");
$referencias_laborales->bindParam("sessionid", $_SESSION["id"], PDO::PARAM_INT);
$referencias_laborales->execute();
$cont_referencias = $referencias_laborales->rowCount();
while ($row_ref = $referencias_laborales->fetch(PDO::FETCH_OBJ)) {
	$array[$contador_array] = ($row_ref->reflabnom);
	$contador_array++;
	$array[$contador_array] = ($row_ref->reflabrelacion);
	$contador_array++;
	$array[$contador_array] = ($row_ref->reflabtel);
	$contador_array++;
}
$json = json_encode($array, JSON_UNESCAPED_UNICODE);

/*REFERENCIAS BANCARIAS*/
$array2 = [];
$contador_array2 = 0;
$datos_bancarios = $object->_db->prepare("select ben_bancarios.nombre1 as refbancnom, ben_bancarios.apellido_pat1 as refbancapat, ben_bancarios.apellido_mat1 as refbancamat,  ben_bancarios.relacion1 as refbancrelacion, ben_bancarios.rfc1 as refbancrfc, ben_bancarios.curp1 as refbanccurp, ben_bancarios.porcentaje1 as refbancderecho from ben_bancarios inner join expedientes on expedientes.id=ben_bancarios.expediente_id inner join usuarios on usuarios.id=expedientes.users_id where usuarios.id =:sessionid");
$datos_bancarios->bindParam("sessionid", $_SESSION["id"], PDO::PARAM_INT);
$datos_bancarios->execute();
$cont_datos = $datos_bancarios->rowCount();
while ($row_datos = $datos_bancarios->fetch(PDO::FETCH_OBJ)) {
	$array2[$contador_array2] = ($row_datos->refbancnom);
	$contador_array2++;
	$array2[$contador_array2] = ($row_datos->refbancrelacion);
	$contador_array2++;
	$array2[$contador_array2] = ($row_datos->refbancrfc);
	$contador_array2++;
	$array2[$contador_array2] = ($row_datos->refbanccurp);
	$contador_array2++;
	$array2[$contador_array2] = ($row_datos->refbancderecho);
	$contador_array2++;
}
$json2 = json_encode($array2, JSON_UNESCAPED_UNICODE);

/* FAMILIARES*/
$array4 = [];
$contador_array4 = 0;
$familiares = $object->_db->prepare("select expedientes.id as idExpediente, familiares.nombre1 as familiaresnom, familiares.apellido_pat1 as familiaresappat, familiares.apellido_mat1 as familiaresapmat from familiares inner join expedientes on expedientes.id=familiares.expediente_id inner join usuarios on usuarios.id=expedientes.users_id where usuarios.id =:sessionid");
$familiares->bindParam("sessionid", $_SESSION["id"], PDO::PARAM_INT);
$familiares->execute();
$cont_familiares = $familiares->rowCount();
$fetch_familiares = $familiares->fetch(PDO::FETCH_OBJ);
while ($row_datos = $familiares->fetch(PDO::FETCH_OBJ)) {
	$array4[$contador_array4] = ($row_datos->familiaresnom);
	$contador_array4++;
	$array4[$contador_array4] = ($row_datos->familiaresappat);
	$contador_array4++;
	$array4[$contador_array4] = ($row_datos->familiaresapmat);
	$contador_array4++;
}
$json4 = json_encode($array4, JSON_UNESCAPED_UNICODE);


$idExpediente = ($fetch_familiares-> idExpediente);
//Select para oestrar los familiares
$familiar = $crud -> readWithCount('familiares', 'nombre1, apellido_pat1, apellido_mat1, nombre2, apellido_pat2, apellido_mat2,  nombre3, apellido_pat3, apellido_mat3, nombre4, apellido_pat4, apellido_mat4, nombre5, apellido_pat5, apellido_mat5', 'WHERE expediente_id = :expedienteid', [':expedienteid' => $idExpediente]);


/*PAPELERIAS*/ 
if(Roles::FetchSessionRol($_SESSION['rol']) == "Tecnico") {
	$array3 = [];
	$papeleria = $object->_db->prepare("SELECT tipo_papeleria.id as id, tipo_papeleria.nombre as nombre, papeleria_empleado.nombre_archivo as nombre_archivo, papeleria_empleado.identificador as identificador, papeleria_empleado.fecha_subida as fecha_subida FROM tipo_papeleria left join papeleria_empleado on tipo_papeleria.id = papeleria_empleado.FROM expedientes JOIN papeleria_empleado ON expedientes.id = papeleria_empleado.expediente_id RIGHT JOIN tipo_papeleria ON tipo_papeleria.id=papeleria_empleado.tipo_archivo AND expedientes.users_id=:sessionid  and papeleria_empleado.expediente_id = :expedienteid WHERE tipo_papeleria.nombre NOT IN('EVALUACION PSICOMETRICA' , 'CONTRATO DETERMINADO' , 'PRESTADOR DE SERVICIOS' , 'CONVENIO DE CONFIDENCIALIDAD' , 'CONTRATO INDETERMINADO' , 'ALTA DE IMSS' , 'CONTRATO NOMINA BANCARIA' , 'REGLAMENTO INTERIOR DEL TRABAJO' , 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS' , 'MODIFICACION SALARIAL', 'BAJA ANTE IMSS') order by id asc");
	$papeleria->execute(array(':sessionid' => $_SESSION["id"]));
	while ($papel = $papeleria->fetch(PDO::FETCH_OBJ)) { 
		$array3[]=array('id'=>$papel->id,'nombre'=>$papel->nombre,'nombre_archivo'=>$papel->nombre_archivo, 'identificador'=>$papel->identificador, 'fecha_subida'=>$papel->fecha_subida);
	}
}else{
	$array3 = [];
	$papeleria = $object->_db->prepare("SELECT tipo_papeleria.id as id, tipo_papeleria.nombre as nombre, papeleria_empleado.nombre_archivo as nombre_archivo, papeleria_empleado.identificador as identificador, papeleria_empleado.fecha_subida as fecha_subida FROM expedientes JOIN papeleria_empleado ON expedientes.id = papeleria_empleado.expediente_id RIGHT JOIN tipo_papeleria ON tipo_papeleria.id=papeleria_empleado.tipo_archivo AND expedientes.users_id=:sessionid  WHERE tipo_papeleria.nombre NOT IN('EVALUACION PSICOMETRICA', 'IMAGEN DE DATOS BANCARIOS' , 'CONTRATO DETERMINADO' , 'PRESTADOR DE SERVICIOS' , 'CONVENIO DE CONFIDENCIALIDAD' , 'CONTRATO INDETERMINADO' , 'ALTA DE IMSS' , 'CONTRATO NOMINA BANCARIA' , 'REGLAMENTO INTERIOR DEL TRABAJO' , 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS' , 'MODIFICACION SALARIAL', 'BAJA ANTE IMSS') order by id asc");
	$papeleria->execute(array(':sessionid' => $_SESSION["id"]));   
	while ($papel = $papeleria->fetch(PDO::FETCH_OBJ)) { 
		$array3[]=array('id'=>$papel->id,'nombre'=>$papel->nombre,'nombre_archivo'=>$papel->nombre_archivo, 'identificador'=>$papel->identificador, 'fecha_subida'=>$papel->fecha_subida);
	}        
}

/*CHECA SI EL USUARIO LOGGEADO TIENE NODOS*/
$doesnt_have_employees = $object -> _db -> prepare("SELECT nombre FROM (SELECT r1.nombre FROM jerarquia t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia t2 ON t1.id = t2.jerarquia_id WHERE t2.id IS NULL UNION ALL SELECT 'Superadministrador' UNION ALL SELECT 'Administrador' UNION ALL SELECT 'Usuario externo') empleado WHERE empleado.nombre = :rolnom");
$doesnt_have_employees -> execute(array(':rolnom' => Roles::FetchSessionRol($_SESSION["rol"])));
$count_doesnt_have_employees = $doesnt_have_employees -> rowCount();
?>