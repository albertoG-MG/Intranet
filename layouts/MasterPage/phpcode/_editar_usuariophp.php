<?php
    include_once("../config/conexion.php");
    $object = new connection_database();
    
    session_start();

    //Valida si el usuario esta loggeado o no

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: Login.php');
        die();
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