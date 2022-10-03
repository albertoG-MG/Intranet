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
        echo '<div class="error" style="width:100%; display:flex; flex-direction:column;">';
        echo '<h1>Prohibido</h1>';
        echo '<p>No tiene permiso para acceder a / esta parte del servidor.</p>';
        echo "<a style='--tw-bg-opacity: 1; background-color: rgb(126 58 242/var(--tw-bg-opacity)); --tw-text-opacity: 1; color: rgb(255 255 255/var(--tw-text-opacity)); font-weight: bold; line-height: 1.25rem; border-radius: 0.5rem; padding-bottom: 1.25rem; padding-top: 1.25rem; padding-left: 1.25rem; padding-right: 1.25rem; text-decoration: none;' href='dashboard.php'/>Regresar al dashboard</a>";
        echo '</div>';
        echo '
        <style>
        a:hover{
        --tw-bg-opacity: 1;
        background-color: rgb(67 56 202 / var(--tw-bg-opacity)) !important;
        }
        @media screen and (min-width: 601px) {
            div.error {
                font-size: 25px;
            }
            a{
                font-size: 25px;
                text-align: center;
            }
        }
        @media screen and (max-width: 600px) {
            div.error {
                font-size: 15px;
            }
            a{
            font-size: 15px;
            text-align: center;
            }
        }
        @media screen and (min-width: 800px) {
            div.error {
                font-size: 45px;
            }
            a{
            font-size: 45px;
            text-align: center;
            }
        }
        </style>';
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