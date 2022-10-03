<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/incidencias.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    if (Permissions::CheckPermissions($_SESSION["id"], "Editar incidencia") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
		header("HTTP/1.0 403 Forbidden");
		echo '<h1>Prohibido</h1><br> No tiene permiso para acceder a / esta parte del servidor.';
		exit();
    }
	 
	//Validacion - Si se quiere acceder a editar incidencia sin id, regresa

    if($_GET['idIncidencia'] == null){
        header('Location: incidencias.php');
        die();
    }else{
		$editarid = $_GET['idIncidencia'];
		$checkincidencia=Incidencias::Checkincidencia($editarid);
		//Validacion - Si la incidencia no existe, regresa
		if($checkincidencia > 0){
		}else{
		   header('Location: incidencias.php');
		   die();	
		}
	}

    $edit=Incidencias::Fetcheditincidencia($editarid);

	if(Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Director general"){
		/*No le pertenece sigue; el siguiente query saca la informacion del usuario que esta tratando de ingresar y su departamento.*/
		$check_rol_departament = $object -> _db ->prepare("SELECT roles.nombre, departamentos.departamento FROM usuarios left join departamentos ON departamentos.id=usuarios.departamento_id INNER JOIN roles ON roles.id=usuarios.roles_id WHERE usuarios.id=:userid");
		$check_rol_departament -> execute(array(':userid' => $_SESSION["id"]));
		$fetch_rol_departament = $check_rol_departament -> fetch(PDO::FETCH_OBJ);
        /*Este metodo checa si la incidencia le pertenece al usuario*/
        if(Incidencias::CheckIFIncidentOwnership($editarid, $_SESSION["id"]) == "false"){
            /*Si los usuarios resultan ser empleados, supervisores o tecnicos, regresa*/
            if($fetch_rol_departament -> nombre == "Empleado" || $fetch_rol_departament -> nombre == "Supervisor" || $fetch_rol_departament -> nombre == "Tecnico"){
                if(Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true"){
                    header('Location: incidencias.php');
                    die();
                }else{
                    header('Location: dashboard.php');
                    die();
                }
            /*Si resulta ser un gerente que no sea del departamento de rh o resulta ser un director, asegurarse que solo puedan a sus empleados o departamentos*/
            }else if($fetch_rol_departament -> nombre == "Gerente" && $fetch_rol_departament -> departamento != "Recursos humanos" && $fetch_rol_departament -> departamento != "Finanzas" || $fetch_rol_departament -> nombre == "Director"){
                if($edit -> notificado_a != $_SESSION["rol"] || Incidencias::CheckSameDepartment($_SESSION["id"], $editarid) == "false"){
                    if(Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true"){
                        header('Location: incidencias.php');
                        die();
                    }else{
                        header('Location: dashboard.php');
                        die();
                    }
                }
            }
        }
    }
?>