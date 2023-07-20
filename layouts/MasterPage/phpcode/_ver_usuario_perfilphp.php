<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/departamentos.php";
    $object = new connection_database();
    
    session_start();

    //Valida si el usuario esta loggeado o no

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    //Fin de la validacion

    $verid = $_GET['idUser'];

    //Validacion - Si se quiere acceder a editar usuario sin id, regresa

    if($verid == null){
        header('Location: perfil.php');
        die();
    }
    //Fin de la validacion

    $ver = $object -> _db->prepare("SELECT usuarios.username as username, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, usuarios.correo, departamentos.departamento as depanom, roles.nombre as rolnom, subroles.subrol_nombre as subnom, usuarios.nombre_foto as nombre_foto, usuarios.foto_identificador as foto_identificador FROM usuarios LEFT JOIN departamentos ON usuarios.departamento_id=departamentos.id LEFT JOIN roles ON usuarios.roles_id=roles.id LEFT JOIN subroles ON subroles.id=usuarios.subrol_id WHERE usuarios.id=:verid");
    $ver->bindParam("verid", $verid, PDO::PARAM_INT);
    $ver->execute();

    //Validacion - Si el usuario no existe, regresa

    $check_user=$ver->rowCount();

    if($check_user > 0){
      
    }else{
       header('Location: perfil.php');
       die();
    }
 
    //Fin de la validacion

    //Query que checa si el usuario loggeado tiene permiso para acceder a esta informacion

    if(Roles::FetchSessionRol($_SESSION['rol']) == "Director general"){
        $sql = $object->_db->prepare("SELECT r.nombre AS tipo_trabajador, CONCAT(u.nombre, ' ', u.apellido_pat, ' ', u.apellido_mat) AS nombre, u.id AS usuario_id, e.id AS expediente_id FROM usuarios u INNER JOIN roles r ON r.id=u.roles_id INNER JOIN expedientes e ON e.users_id=u.id WHERE r.nombre NOT IN('Superadministrador', 'Administrador', 'Director general', 'Usuario externo') AND u.id=:userid");
        $sql -> execute(array(':userid' => $verid));
    }else if(Roles::FetchSessionRol($_SESSION['rol']) == "Director"){
        if(Roles::FetchUserDepartamento($_SESSION["id"]) == "Operaciones" || Roles::FetchUserDepartamento($_SESSION["id"]) == "Ventas"){
            $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND d2.departamento IN ('Call center', 'Operaciones', 'Laboratorio', 'Almacen') AND u2.id=:userid1 UNION ALL SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r2.nombre = :rolnom2 AND d2.departamento IN ('Call center', 'Operaciones', 'Laboratorio', 'Almacen') AND u2.id=:userid2");
            $sql -> execute(array(':rolnom' => 'Gerente', ':userid1' => $verid, ':rolnom2' => 'Gerente', ':userid2' => $verid));
        }else{
            $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND d2.departamento = :depanom AND u2.id = :userid1 UNION ALL SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r2.nombre = :rolnom2 AND d2.departamento = :depanom2 AND u2.id = :userid2");
            $sql -> execute(array(':rolnom' => 'Gerente', ':depanom' => Roles::FetchUserDepartamento($_SESSION["id"]), ':userid1' => $verid, ':rolnom2' => 'Gerente', ':depanom2' => Roles::FetchUserDepartamento($_SESSION["id"]), ':userid2' => $verid));
        }
    }else if(Roles::FetchSessionRol($_SESSION['rol']) == "Gerente"){
        $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND u2.id=:userid AND d2.departamento= :depanom");
        $sql -> execute(array(':rolnom' => Roles::FetchSessionRol($_SESSION['rol']), ':userid' => $verid, ':depanom' => Roles::FetchUserDepartamento($_SESSION["id"])));
    }
	
	$count_sql = $sql -> rowCount();
	
	if($count_sql == 0){
		header('Location: perfil.php');
        die();
	}

    //Fin de la validacion

    $row=$ver->fetch(PDO::FETCH_OBJ);
 
?>
