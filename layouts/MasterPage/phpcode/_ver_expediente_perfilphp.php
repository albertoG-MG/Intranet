<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/user.php";
    include_once __DIR__ . "/../../../classes/expedientes.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }
	
	/*Si el id no existe, regresa*/
	if($_GET['idExpediente'] == null){
		header('Location: perfil.php');
	}else{
		$Verid = $_GET['idExpediente'];
        /*Checa si el expediente esta vinculado*/
        $checkexp=Expedientes::Checkusuarioxexpediente($Verid);
        if($checkexp == 0){
            header('Location: perfil.php');
        }
	}
	
	//Query que checa si el usuario loggeado tiene permiso para acceder a esta informacion

    if(Roles::FetchSessionRol($_SESSION['rol']) == "Director general"){
        $sql = $object->_db->prepare("SELECT r.nombre AS tipo_trabajador, CONCAT(u.nombre, ' ', u.apellido_pat, ' ', u.apellido_mat) AS nombre, u.id AS usuario_id, e.id AS expediente_id FROM usuarios u INNER JOIN roles r ON r.id=u.roles_id INNER JOIN expedientes e ON e.users_id=u.id WHERE r.nombre NOT IN('Superadministrador', 'Administrador', 'Director general', 'Usuario externo') AND e.id=:expedienteid");
        $sql -> execute(array(':expedienteid' => $Verid));
    }else if(Roles::FetchSessionRol($_SESSION['rol']) == "Director"){
        if(Roles::FetchUserDepartamento($_SESSION["id"]) == "Operaciones" || Roles::FetchUserDepartamento($_SESSION["id"]) == "Ventas"){
            $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND d2.departamento IN ('Call center', 'Operaciones', 'Laboratorio', 'Almacen') AND e2.id=:expedienteid1 UNION ALL SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r2.nombre = :rolnom2 AND d2.departamento IN ('Call center', 'Operaciones', 'Laboratorio', 'Almacen') AND e2.id=:expedienteid2");
            $sql -> execute(array(':rolnom' => 'Gerente', ':expedienteid1' => $Verid, ':rolnom2' => 'Gerente', ':expedienteid2' => $Verid));
        }else{
            $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND d2.departamento = :depanom AND e2.id = :expedienteid1 UNION ALL SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r2.nombre = :rolnom2 AND d2.departamento = :depanom2 AND e2.id = :expedienteid2");
            $sql -> execute(array(':rolnom' => 'Gerente', ':depanom' => Roles::FetchUserDepartamento($_SESSION["id"]), ':expedienteid1' => $Verid, ':rolnom2' => 'Gerente', ':depanom2' => Roles::FetchUserDepartamento($_SESSION["id"]), ':expedienteid2' => $Verid));
        }
    }else if(Roles::FetchSessionRol($_SESSION['rol']) == "Gerente"){
        $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND e2.id=:expedienteid AND d2.departamento= :depanom");
        $sql -> execute(array(':rolnom' => Roles::FetchSessionRol($_SESSION['rol']), ':expedienteid' => $Verid, ':depanom' => Roles::FetchUserDepartamento($_SESSION["id"])));
    }
	
	$count_sql = $sql -> rowCount();
	
	if($count_sql == 0){
		header('Location: perfil.php');
        die();
	}

    $view=Expedientes::Fetchverexpediente($Verid);

    $bringuser = $object -> _db -> prepare("SELECT usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, usuarios.correo as correo, departamentos.departamento as departamento FROM expedientes INNER JOIN usuarios ON expedientes.users_id=usuarios.id LEFT JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE expedientes.id=:expedienteid"); 
    $bringuser -> bindParam('expedienteid', $Verid, PDO::PARAM_INT); 
    $bringuser -> execute();
    $selected = $bringuser->fetch(PDO::FETCH_OBJ);

    $estado = $object->_db->prepare("select nombre from estados inner join expedientes on estados.id=expedientes.estado_id where expedientes.id=:expedienteid");
    $estado -> bindParam('expedienteid', $Verid, PDO::PARAM_INT);
    $estado->execute();
    $countestado = $estado ->rowCount();
    if($countestado > 0){
    $verestado = $estado->fetch(PDO::FETCH_OBJ);
    }

    $municipio = $object->_db->prepare("select nombre from municipios inner join expedientes on municipios.Id=expedientes.municipio_id where expedientes.id=:expedienteid");
    $municipio -> bindParam('expedienteid', $Verid, PDO::PARAM_INT);
    $municipio->execute();
    $countmunicipio = $municipio ->rowCount();
    if($countmunicipio > 0){
    $vermunicipio = $municipio->fetch(PDO::FETCH_OBJ);
    }


    /*REFERENCIAS LABORALES*/
    $referencias_laborales = $object->_db->prepare("select nombre, relacion, telefono from ref_laborales where expediente_id =:expedienteid");
    $referencias_laborales->execute(array(':expedienteid' => $Verid));
    $array_reflaborales = $referencias_laborales -> fetchAll(PDO::FETCH_ASSOC);
    $reflaborales_json = json_encode($array_reflaborales, JSON_UNESCAPED_UNICODE);

    /*REFERENCIAS BANCARIAS*/
    $referencias_bancarias = $object->_db->prepare("select nombre, relacion, rfc, curp, prcnt_derecho from ref_bancarias where expediente_id =:expedienteid");
    $referencias_bancarias->bindParam("expedienteid", $Verid, PDO::PARAM_INT);
    $referencias_bancarias->execute();
    $array_refban = $referencias_bancarias -> fetchAll(PDO::FETCH_ASSOC);
    $refban_json = json_encode($array_refban, JSON_UNESCAPED_UNICODE);

    /*PAPELERIA*/
    $array3 = [];
    $papeleria = $object->_db->prepare("SELECT tipo_papeleria.id as id, tipo_papeleria.nombre as nombre, papeleria_empleado.nombre_archivo AS nombre_archivo, papeleria_empleado.identificador AS identificador, papeleria_empleado.fecha_subida AS fecha_subida FROM expedientes JOIN papeleria_empleado ON expedientes.id = papeleria_empleado.expediente_id RIGHT JOIN tipo_papeleria ON tipo_papeleria.id=papeleria_empleado.tipo_archivo AND expedientes.id=:expedienteid ORDER BY id ASC");
    $papeleria->execute(array(':expedienteid' => $Verid));

    while ($papel = $papeleria->fetch(PDO::FETCH_OBJ)) { 
        $array3[]=array('id'=>$papel->id,'nombre'=>$papel->nombre,'nombre_archivo'=>$papel->nombre_archivo, 'identificador'=>$papel->identificador, 'fecha_subida'=>$papel->fecha_subida);
    }

?>