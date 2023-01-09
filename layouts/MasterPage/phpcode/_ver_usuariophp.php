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

    if (Permissions::CheckPermissions($_SESSION["id"], "Ver usuario") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
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

    $verid = $_GET['idUser'];

    //Validacion - Si se quiere acceder a editar usuario sin id, regresa

    if($verid == null){
        header('Location: users.php');
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
       header('Location: users.php');
       die();
    }
 
    //Fin de la validacion

    //Query que checa si el usuario loggeado tiene permiso para acceder a esta informacion

    if(Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador"){
		/*El siguiente query saca la informacion del usuario loggeado y su departamento.*/
		$check_user_rol_departament = $object -> _db ->prepare("SELECT usuarios.id as userid, roles.nombre as rolnom, departamentos.departamento as depnom FROM usuarios left join departamentos ON departamentos.id=usuarios.departamento_id INNER JOIN roles ON roles.id=usuarios.roles_id WHERE usuarios.id=:userloggedid");
		$check_user_rol_departament -> execute(array(':userloggedid' => $_SESSION["id"]));
		$fetch_user_rol_departament = $check_user_rol_departament -> fetch(PDO::FETCH_OBJ);
		/*Query que saca la informacion del usuario que se ingreso*/
		$check_user_information = $object -> _db -> prepare("SELECT usuarios.id as userid, roles.nombre as rolnom, departamentos.departamento as depnom FROM usuarios left join departamentos ON departamentos.id=usuarios.departamento_id INNER JOIN roles ON roles.id=usuarios.roles_id WHERE usuarios.id=:userid");
		$check_user_information -> execute(array(':userid' => $verid));
		$fetch_user_information = $check_user_information -> fetch(PDO::FETCH_OBJ);
        /*Este metodo checa si usuario puede acceder a la parte de los usuarios*/
		if(Permissions::Check_if_user_has_permission($fetch_user_rol_departament -> userid, $fetch_user_rol_departament -> rolnom, $fetch_user_information -> rolnom) == "false"){
			header('Location: users.php');
            die();
		}        
    }

    //Fin de la validacion

    $row=$ver->fetch(PDO::FETCH_OBJ);
 
?>