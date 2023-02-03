<?php
include_once __DIR__ . "/../classes/roles.php";
include_once __DIR__ . "/../classes/permissions.php"; 
$object = new connection_database();
session_start();

	$select_rol_dep = $object -> _db -> prepare("SELECT roles.nombre as rolnom, departamentos.departamento as depanom FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id LEFT JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE usuarios.id=:userid");
	$select_rol_dep -> execute(array(":userid" => $_GET["sessionid"]));
	$fetch_rol_dep = $select_rol_dep -> fetch(PDO::FETCH_OBJ);
	if($fetch_rol_dep -> rolnom == "Superadministrador"){
		$set_session = $object -> _db -> prepare("SET @var = :sessionid");
		$set_session -> execute(array(":sessionid" => $_SESSION['id']));
		$table_data->get('serverside_user_superadministrador','id',array('id', 'username','usnom','apellido_pat','apellido_mat', 'correo', 'roles_id', 'foto_identificador', 'rolnom', 'depa_id', 'depanom', 'estatus'));
	}else if ($fetch_rol_dep -> rolnom == "Administrador"){
		$table_data->get('serverside_user_administrador','id',array('id', 'username','usnom','apellido_pat','apellido_mat', 'correo', 'roles_id', 'foto_identificador', 'rolnom', 'depa_id', 'depanom', 'estatus'));
	}else if (Permissions::CheckPermissions($_GET["sessionid"], "Acceso a usuarios") == "true" && Permissions::CheckPermissions($_GET["sessionid"], "Vista tecnico") == "false" && $fetch_rol_dep -> rolnom != "Superadministrador" && $fetch_rol_dep -> rolnom != "Administrador"){ 
		$set_session = $object -> _db -> prepare("SET @var = :sessionid");
		$set_session -> execute(array(":sessionid" => $_SESSION['id']));
		$table_data->get('serverside_user_vistausuarios','id',array('id', 'username','usnom','apellido_pat','apellido_mat', 'correo', 'roles_id', 'foto_identificador', 'rolnom', 'depa_id', 'depanom', 'estatus'));
	}else if (Permissions::CheckPermissions($_GET["sessionid"], "Acceso a usuarios") == "true" && Permissions::CheckPermissions($_GET["sessionid"], "Vista tecnico") == "true" && $fetch_rol_dep -> rolnom != "Superadministrador" && $fetch_rol_dep -> rolnom != "Administrador"){
		$table_data->get('serverside_user_vistatecnicos','id',array('id', 'username','usnom','apellido_pat','apellido_mat', 'correo', 'roles_id', 'foto_identificador', 'rolnom', 'depa_id', 'depanom', 'estatus'));
	}
?>