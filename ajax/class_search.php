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