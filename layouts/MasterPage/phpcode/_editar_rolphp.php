<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

session_start();

//Valida si el usuario esta loggeado o no

if ($_SESSION['loggedin'] != true) {
    $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    die();
}

if (Permissions::CheckPermissions($_SESSION["id"], "Editar roles") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador") {
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

$editarid = $_GET['idRol'];

//Validacion - Si se quiere acceder a editar usuario sin id, regresa

if($editarid == null){
    header('Location: roles.php');
    die();
}
//Fin de la validacion

$editar = $object -> _db->prepare("SELECT roles.id as rolid, roles.nombre as nombre, jerarquia.id as jerarquiaid, jerarquia.rol_id as jera_rol, jerarquia.jerarquia_id as jera_id FROM roles left join jerarquia on roles.id=jerarquia.rol_id WHERE roles.id=:editarid");
$editar->bindParam("editarid", $editarid,PDO::PARAM_INT);
$editar->execute();

 //Validacion - Si el rol no existe, regresa

 $check_rol=$editar->rowCount();

 if($check_rol > 0){
    $editarpermiso = $object -> _db->prepare("SELECT permisos_id FROM rolesxpermisos WHERE roles_id=:editarid");
    $editarpermiso->bindParam("editarid", $editarid,PDO::PARAM_INT);
    $editarpermiso->execute();
    $checkpermiso=$editarpermiso->fetchAll(PDO::FETCH_COLUMN);  
 }else{
    header('Location: roles.php');
    die();
 }

 //Fin de la validacion


 $row=$editar->fetch(PDO::FETCH_OBJ);


?>