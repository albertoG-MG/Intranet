<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    if (Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
		header("HTTP/1.0 403 Forbidden");
		echo '<h1>Prohibido</h1><br> No tiene permiso para acceder a / esta parte del servidor.';
		exit();
    }

    $check_jerarquia = $object -> _db -> prepare("select jerarquia_id from jerarquia where rol_id=:rolid");
	$check_jerarquia -> execute(array(':rolid' => $_SESSION["rol"]));
	$count_jerarquia = $check_jerarquia -> rowCount();
	$fetch_jerarquia = $check_jerarquia -> fetch(PDO::FETCH_OBJ);

    if($count_jerarquia > 0){
		if($fetch_jerarquia == null){
			header("HTTP/1.0 403 Forbidden");
			echo '<h1>Prohibido</h1><br> No tiene asignado un jefe.';
			exit();
		}
	}else{
		header("HTTP/1.0 403 Forbidden");
		echo '<h1>Prohibido</h1><br> No esta dentro de la jerarquía.';
		exit();
	}

    $bloquearboton = $object -> _db -> prepare("SELECT * FROM incidencias i INNER JOIN estatus_incidencia ei ON i.estatus_id=ei.id INNER JOIN usuarios u ON i.users_id=u.id WHERE u.id=:userid AND i.estatus_id = 4 ");
    $bloquearboton -> execute(array(':userid' => $_SESSION["id"]));
    $count_block = $bloquearboton -> rowCount();

    if($count_block > 0){
        header('Location: incidencias.php');
        die();
    }
?>