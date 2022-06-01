<?php
include_once("../classes/user.php");


if(isset($_POST["app"]) && $_POST["app"] == "usuario"){
    if(isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido_pat"]) && isset($_POST["apellido_mat"]) && isset($_POST["correo"]) && isset($_POST["method"])){
        switch($_POST["method"]){

            case "store":
                    $username = $_POST["usuario"];
                    $password = sha1($_POST["password"]);
                    $nombre = $_POST["nombre"];
                    $apellido_pat = $_POST["apellido_pat"];
                    $apellido_mat = $_POST["apellido_mat"];
                    $correo = $_POST["correo"];
                    $roles=null;
                    $foto=null;

                    if(isset($_POST["roles_id"])){
                        $roles = $_POST["roles_id"];
                    }
                    if(isset($_POST["foto"])){
                        $foto = $_POST["foto"];
                    }

                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $roles, $foto);
                    $user->CrearUsuarios();
                    exit("success");
                break;
            
            case "edit":
                break;
            
        }
    }
}
?>