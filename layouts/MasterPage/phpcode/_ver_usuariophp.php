<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/roles.php";
    include_once __DIR__ . "/../../../classes/departamentos.php";
    $object = new connection_database();
    
    session_start();

    //Valida si el usuario esta loggeado o no

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: Login.php');
        die();
    }

    //Fin de la validacion

    $verid = $_GET['idUser'];

    //Validacion - Si se quiere acceder a editar usuario sin id, regresa

    if($verid == null){
        header('Location: users.php');
        die();
    }
    //Fin de la validacion

    $ver = $object -> _db->prepare("SELECT * FROM usuarios WHERE id=:verid");
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

    $row=$ver->fetch(PDO::FETCH_OBJ);
 
?>