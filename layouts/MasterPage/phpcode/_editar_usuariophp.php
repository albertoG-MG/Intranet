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

    if (Permissions::CheckPermissions($_SESSION["id"], "Editar usuario") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
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

    //Fin de la validacion

    $editarid = $_GET['idUser'];

    //Validacion - Si se quiere acceder a editar usuario sin id, regresa

    if($editarid == null){
        header('Location: users.php');
        die();
    }
    //Fin de la validacion

    $editar = $object -> _db->prepare("SELECT * FROM usuarios WHERE id=:editarid");
    $editar->bindParam("editarid", $editarid,PDO::PARAM_INT);
    $editar->execute();

    //Validacion - Si el usuario no existe, regresa

    $check_user=$editar->rowCount();

    if($check_user > 0){
      
    }else{
       header('Location: users.php');
       die();
    }
 
    //Fin de la validacion

    /*Validacion - Checa si el usuario tiene permiso para acceder a la información del usuario*/
	
	if(Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador"){
		/*El siguiente query saca la informacion del usuario loggeado y su departamento.*/
		$check_user_rol_departament = $object -> _db ->prepare("SELECT usuarios.id as userid, roles.nombre as rolnom, departamentos.departamento as depnom FROM usuarios left join departamentos ON departamentos.id=usuarios.departamento_id INNER JOIN roles ON roles.id=usuarios.roles_id WHERE usuarios.id=:userloggedid");
		$check_user_rol_departament -> execute(array(':userloggedid' => $_SESSION["id"]));
		$fetch_user_rol_departament = $check_user_rol_departament -> fetch(PDO::FETCH_OBJ);
		/*Query que saca la informacion del usuario que se ingreso*/
		$check_user_information = $object -> _db -> prepare("SELECT usuarios.id as userid, roles.nombre as rolnom, departamentos.departamento as depnom FROM usuarios left join departamentos ON departamentos.id=usuarios.departamento_id INNER JOIN roles ON roles.id=usuarios.roles_id WHERE usuarios.id=:userid");
		$check_user_information -> execute(array(':userid' => $editarid));
		$fetch_user_information = $check_user_information -> fetch(PDO::FETCH_OBJ);
        /*Este metodo checa si usuario puede acceder a la parte de los usuarios*/
		if(Permissions::Check_if_user_has_permission($fetch_user_rol_departament -> userid, $fetch_user_rol_departament -> rolnom, $fetch_user_information -> rolnom) == "false"){
			header('Location: users.php');
            die();
		}        
    }
	
	/* Fin de la validacion */

    $row=$editar->fetch(PDO::FETCH_OBJ);

    $check_subrol = $object -> _db -> prepare("SELECT subroles.id, subroles.roles_id, subroles.subrol_nombre, usuarios.subrol_id FROM subroles INNER JOIN roles ON roles.id=subroles.roles_id INNER JOIN usuarios ON usuarios.roles_id=roles.id WHERE usuarios.id=:userid");
	$check_subrol -> execute(array(':userid' => $editarid));
	$fetch_subrol = $check_subrol -> fetch(PDO::FETCH_OBJ);

    /*Query que detecta si el usuario tiene el password temporal habilitado*/
    $temporal_password = $object -> _db -> prepare("SELECT * FROM usuarios INNER JOIN temporal_password ON temporal_password.user_id=usuarios.id WHERE usuarios.id=:editar");
	$temporal_password -> execute(array(':editar' => $editarid));
	$fetch_temporal_password = $temporal_password -> rowCount();
 
?>