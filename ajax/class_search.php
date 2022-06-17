<?php
include_once __DIR__ . "/../classes/user.php";
include_once __DIR__ . "/../classes/permissions.php";
include_once __DIR__ . "/../classes/roles.php";
include_once __DIR__ . "/../config/conexion.php";
$object = new connection_database();


if(isset($_POST["app"]) && $_POST["app"] == "usuario"){
    if(isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido_pat"]) && isset($_POST["apellido_mat"]) && isset($_POST["correo"]) && isset($_POST["method"])){
        $username = $_POST["usuario"];
        $password = sha1($_POST["password"]);
        $nombre = $_POST["nombre"];
        $apellido_pat = $_POST["apellido_pat"];
        $apellido_mat = $_POST["apellido_mat"];
        $correo = $_POST["correo"];
        $roles=null;
        $filename=null;
        $foto=null;

        if(!(empty($_POST["roles_id"]))){
            $roles = $_POST["roles_id"];
        }

        if(isset($_FILES['foto']['name'])){
            $filename = $_FILES['foto']['name'];
            $location = "../src/img/tmp/".$filename;
            $target_file = $location . basename($_FILES['foto']['name']);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if(move_uploaded_file($_FILES['foto']['tmp_name'],$location)){
                $image_base64 = base64_encode(file_get_contents('../src/img/tmp/'.$filename));
                $foto = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                $files = glob('../src/img/tmp/*.{png,jpg,jpeg}', GLOB_BRACE); // get all file names
                foreach($files as $file){ // iterate files
                    if(is_file($file)) {
                        unlink($file); // delete file
                    }
                }
            }
        }
        switch($_POST["method"]){

            case "store":
                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $roles, $filename, $foto);
                    $user->CrearUsuarios();
                    exit("success");
                break;
            
            case "edit":
                if(isset($_POST["editarid"])){
                    $ideditar = $_POST["editarid"];
                    if($foto == null && $filename == null){
                        $selectphoto = $object -> _db -> prepare("select nombre_foto, foto from usuarios where id=:iduser");
                        $selectphoto -> bindParam("iduser", $ideditar, PDO::PARAM_INT);
                        $selectphoto -> execute();
                        $row = $selectphoto ->fetch(PDO::FETCH_OBJ);
                        $foto = $row->foto;
                        $filename = $row->nombre_foto;
                    }
                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $roles, $filename, $foto);
                    $user->EditarUsuarios($ideditar);
                    exit("success");
                }
                break;
            
        }
    }
}else if(isset($_POST["app"]) && $_POST["app"] == "permisos"){
    if(isset($_POST["permisos"]) && isset($_POST["method"])){
        $permisos = $_POST["permisos"];
        switch($_POST["method"]){
            case "store":
                $permiso = new Permissions($permisos);
                $permiso ->CrearPermisos();
                exit("success");
            break;
            case "edit":
                if(isset($_POST["editarid"])){
                    $id = $_POST["editarid"];
                    $permiso = new Permissions($permisos);
                    $permiso ->EditarPermisos($id);
                    exit("success");
                }
            break;
        }
    }
}else if(isset($_POST["app"]) && $_POST["app"] == "roles"){
    if(isset($_POST["roles"]) && isset($_POST["method"])){
        $roles = $_POST["roles"];
        $permissions = null;
        if(isset($_POST["permisos"])){
        $permissions = json_decode($_POST["permisos"]);
        }
        switch($_POST["method"]){
            case "store":
                $rol = new Roles($roles, $permissions);
                $rol->CrearRol();
                exit("success");
                break;
            case "edit":
                var_dump($_POST);
                break;
        }
    }
}
?>