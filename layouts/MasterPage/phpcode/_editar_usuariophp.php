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
		echo '<h1>Prohibido</h1><br> No tiene permiso para acceder a / esta parte del servidor.';
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

    $row=$editar->fetch(PDO::FETCH_OBJ);
 
?>