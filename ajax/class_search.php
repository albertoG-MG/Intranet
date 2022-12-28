<?php
include_once __DIR__ . "/../classes/user.php";
include_once __DIR__ . "/../classes/permissions.php";
include_once __DIR__ . "/../classes/roles.php";
include_once __DIR__ . "/../classes/departamentos.php";
include_once __DIR__ . "/../classes/expedientes.php";
include_once __DIR__ . "/../classes/incidencias.php";
include_once __DIR__ . "/../classes/categorias.php";
include_once __DIR__ . "/../classes/subroles.php";
include_once __DIR__ . "/../config/email_verification/class.verifyEmail.php";
include_once __DIR__ . "/../config/conexion.php";
$object = new connection_database();

set_time_limit(0);


if(isset($_POST["app"]) && $_POST["app"] == "usuario"){
    if(isset($_POST["usuario"], $_POST["password"], $_POST["confirmar_password"], $_POST["nombre"], $_POST["apellido_pat"], $_POST["apellido_mat"], $_POST["correo"], $_POST["departamento"], $_POST["roles_id"], $_POST["rolnom"], $_POST["rolsession"], $_POST["subrol_id"], $_POST["method"])){
        
        if(empty($_POST["usuario"])){
            die(json_encode(array("error", "Por favor, ingresa un usuario")));
        }else if(strlen($_POST["usuario"]) < 5){
            die(json_encode(array("error", "El usuario debe de contener 5 caracteres como mínimo")));
        }else if(!preg_match("/^(?=[a-zA-Z0-9._]{4,30}$)(?!.*[_.]{2})[^_.].*[^_.]$/", $_POST["usuario"])){
            die(json_encode(array("error", "Usuario no válido")));
        }else{
            if($_POST["method"] == "store"){
                $username = $_POST["usuario"];
                $check_username = $object ->_db->prepare("SELECT username from usuarios where username=:username");
                $check_username -> execute(array(":username" => $username));
                $count_username = $check_username -> rowCount();
                if($count_username > 0){
                    die(json_encode(array("error", "Usuario repetido")));
                }
            }else if($_POST["method"] == "edit"){
                $username = $_POST["usuario"];
                $check_edit_username = $object ->_db->prepare("SELECT username from usuarios where username=:username and id!=:iduser");
                $check_edit_username -> execute(array(":username" => $username, ":iduser" => $_POST["editarid"]));
                $count_edit_username = $check_edit_username -> rowCount();
                if($count_edit_username > 0){
                    die(json_encode(array("error", "Usuario repetido")));
                }
            }		
        }
        
        if(empty($_POST["password"]) && empty($_POST["confirmar_password"])){
            if($_POST["method"] == "store"){
                die(json_encode(array("error", "Por favor, llene los campos de contraseña y confirmar contraseña")));
            }else if($_POST["method"] == "edit"){
                $retrieve_password = $object -> _db -> prepare("SELECT * FROM usuarios where id=:editarid");
                $retrieve_password -> bindParam('editarid', $_POST["editarid"], PDO::PARAM_INT);
                $retrieve_password -> execute();
                $retrieved = $retrieve_password -> fetch(PDO::FETCH_OBJ);
                $password = $retrieved -> password;
            }
        }else if(empty($_POST["password"]) && !(empty($_POST["confirmar_password"]))){
            die(json_encode(array("error", "Por favor, ingrese la contraseña")));
        }else if(!(empty($_POST["password"])) && empty($_POST["confirmar_password"])){
            die(json_encode(array("error", "Por favor, ingrese la confirmación de la contraseña")));
        }else if(!(empty($_POST["password"])) && !(empty($_POST["confirmar_password"]))){
            if(strlen($_POST["password"]) < 8){
                die(json_encode(array("error", "La contraseña debe de contener 8 caracteres como mínimo")));
            }else if(strlen($_POST["confirmar_password"]) < 8){
                die(json_encode(array("error", "La confirmación de la contraseña debe de tener como mínimo 8 caracteres")));
            }else if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$/", $_POST["password"])){
                die(json_encode(array("error", "Contraseña no válida")));
            }else if($_POST["confirmar_password"] != $_POST["password"]){
                die(json_encode(array("error", "Las contraseñas no coinciden")));
            }else{
                $password = $_POST["password"];
                $blacklist_serverside = $object ->_db->prepare("SELECT password from blacklist_password");
                $blacklist_serverside -> execute();
                $fetch_serverside_badword = $blacklist_serverside -> fetchAll(PDO::FETCH_ASSOC);
                foreach($fetch_serverside_badword as $serverside_badword){
                    if(strpos($password, $serverside_badword["password"]) !== false)
                    {
                        die(json_encode(array("error", "La contraseña no puede contener: " .$serverside_badword['password']. ", Por favor, modifique la contraseña")));
                    }
                }
                $password = sha1($password);
            }
        }

        if(empty($_POST["nombre"])){
            die(json_encode(array("error", "Por favor, ingrese un nombre")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nombre"])){
            die(json_encode(array("error", "Nombre inválido")));
        }else{
            $nombre = $_POST["nombre"];
        }

        if(empty($_POST["apellido_pat"])){
            die(json_encode(array("error", "Por favor, ingrese un apellido paterno")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellido_pat"])){
            die(json_encode(array("error", "Apellido paterno inválido")));
        }else{
            $apellido_pat = $_POST["apellido_pat"];
        }

        if(empty($_POST["apellido_mat"])){
            die(json_encode(array("error", "Por favor, ingrese un apellido materno")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellido_mat"])){
            die(json_encode(array("error", "Apellido materno inválido")));
        }else{
            $apellido_mat = $_POST["apellido_mat"];
        }

        if(empty($_POST["correo"])){
            die(json_encode(array("error", "Por favor, ingrese un correo electrónico")));
        }else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo"])){
            die(json_encode(array("error", "Asegúrese que el texto ingresado este en formato de email")));
        }else{
            if($_POST["method"] == "store"){
                
                $check_correo = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo");
                $check_correo -> execute(array(":correo" => $_POST["correo"]));
                $count_email = $check_correo->rowCount();
                
                if($count_email > 0){
                    die(json_encode(array("error", "Este correo ya existe, por favor, escriba otro")));
                }	
            }else if($_POST["method"] == "edit"){
                $check_edit_correo = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo and id!=:iduser");
                $check_edit_correo -> execute(array(":correo" => $_POST["correo"], ":iduser" => $_POST["editarid"]));
                $count_edit_correo = $check_edit_correo -> rowCount();
                
                if($count_edit_correo > 0){
                    die(json_encode(array("error", "Este correo ya existe, por favor, escriba otro")));
                }
            }
            $vmail = new verifyEmail();
            $vmail->setStreamTimeoutWait(20);
            $vmail->Debug= false;
            $vmail->Debugoutput= 'html';
            $vmail->setEmailFrom('viska@viska.is');
            if ($vmail->check($_POST["correo"])) {
                $correo = $_POST["correo"];
            } else if(verifyEmail::validate($_POST["correo"])) {
                die(json_encode(array("error", 'correo <' . $_POST["correo"] . '> válido, pero el nombre del servidor ó el dominio erróneos!')));
            } else {
                die(json_encode(array("error", 'correo <' . $_POST["correo"] . '> no válido!')));
            }
            $correo = $_POST["correo"];
        }

        $check_session = $object -> _db -> prepare("SELECT nombre FROM roles WHERE id=:rolid");
        $check_session -> execute(array(':rolid' => $_POST["rolsession"]));
        $fetch_session = $check_session -> fetch(PDO::FETCH_OBJ);
        
        if($fetch_session -> nombre == "Superadministrador"){
            $admin_privileges = $object -> _db -> prepare("SELECT id, nombre FROM roles");
            $admin_privileges -> execute();
            $fetch_admin_privileges = $admin_privileges -> fetchAll(PDO::FETCH_KEY_PAIR);
            
            $key_admin = array_search($_POST['rolnom'], $fetch_admin_privileges);
            
            if ($key_admin !== false || $_POST['rolnom'] == "Sin rol") {
                if($key_admin != $_POST["roles_id"] && !(empty($_POST["roles_id"]))){
                    die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los roles registrados")));
                }
            }else{
                die(json_encode(array("error", "Por favor, asegurese que el rol escogido se encuentre en el dropdown")));
            }		
        }else if($fetch_session -> nombre == "Administrador" || Permissions::CheckPermissions($_POST["rolsession"], "Crear usuario") == "true" && Permissions::CheckPermissions($_POST["rolsession"], "Vista tecnico") == "false"){
            $user_privileges = $object -> _db -> prepare("SELECT id, nombre FROM roles WHERE nombre NOT IN('Superadministrador', 'Administrador')");
            $user_privileges -> execute();
            $fetch_user_privileges = $user_privileges -> fetchAll(PDO::FETCH_KEY_PAIR);

            $key_user = array_search($_POST['rolnom'], $fetch_user_privileges);

            if ($key_user !== false || $_POST['rolnom'] == "Sin rol") {
                if($key_user != $_POST["roles_id"] && !(empty($_POST["roles_id"]))){
                    die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los roles registrados")));
                }
            }else{
                die(json_encode(array("error", "Por favor, asegurese que el rol escogido se encuentre en el dropdown")));
            }
        }else if(Permissions::CheckPermissions($_POST["rolsession"], "Crear usuario") == "true" && Permissions::CheckPermissions($_POST["rolsession"], "Vista tecnico") == "true"){
            $supervisor_privileges = $object -> _db -> prepare("SELECT id, nombre FROM roles WHERE nombre IN('Tecnico')");
            $supervisor_privileges -> execute();
            $fetch_supervisor_privileges = $supervisor_privileges -> fetchAll(PDO::FETCH_KEY_PAIR);
            
            $key_supervisor = array_search($_POST['rolnom'], $fetch_supervisor_privileges);
            
            if ($key_supervisor !== false || $_POST['rolnom'] == "Sin rol") {
                if($key_supervisor != $_POST["roles_id"] && !(empty($_POST["roles_id"]))){
                    die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los roles registrados")));
                }
            }else{
                die(json_encode(array("error", "Por favor, asegurese que el rol escogido se encuentre en el dropdown")));
            }
        }

        if(!(empty($_POST["roles_id"]))){
            $check_rol = $object -> _db -> prepare("SELECT * FROM roles WHERE id=:rolid");
            $check_rol -> execute(array(':rolid' => $_POST["roles_id"]));
            $count_rol = $check_rol -> rowCount();
            if($count_rol > 0){
                $roles = $_POST["roles_id"];
            
                //Correo	
                $select_jerarquia = $object -> _db -> prepare("SELECT roles.nombre FROM jerarquia inner join roles ON roles.id=jerarquia.rol_id");
                $select_jerarquia -> execute();
                $fetch_jerarquia = $select_jerarquia -> fetchAll(PDO::FETCH_ASSOC);
                
                foreach($fetch_jerarquia as $rol_email){
                    if($rol_email["nombre"] == $_POST["rolnom"]){
                        if(empty($_POST["correo"])){
                            die(json_encode(array("error", "Por favor, ingrese un correo electrónico")));
                        }else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo"])){
                            die(json_encode(array("error", "Asegúrese que el texto ingresado este en formato de email")));
                        }else{
                            if($_POST["method"] == "store"){
                                
                                $check_correo = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo");
                                $check_correo -> execute(array(":correo" => $_POST["correo"]));
                                $count_email = $check_correo->rowCount();
                                
                                if($count_email > 0){
                                    die(json_encode(array("error", "Este correo ya existe, por favor, escriba otro")));
                                }	
                            }else if($_POST["method"] == "edit"){
                                $check_edit_correo = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo and id!=:iduser");
                                $check_edit_correo -> execute(array(":correo" => $_POST["correo"], ":iduser" => $_POST["editarid"]));
                                $count_edit_correo = $check_edit_correo -> rowCount();
                                
                                if($count_edit_correo > 0){
                                    die(json_encode(array("error", "Este correo ya existe, por favor, escriba otro")));
                                }
                            }
                            $vmail = new verifyEmail();
                            $vmail->setStreamTimeoutWait(20);
                            $vmail->Debug= false;
                            $vmail->Debugoutput= 'html';
                            $vmail->setEmailFrom('viska@viska.is');
                            if ($vmail->check($_POST["correo"])) {
                                $correo = $_POST["correo"];
                            } else if(verifyEmail::validate($_POST["correo"])) {
                                die(json_encode(array("error", 'correo <' . $_POST["correo"] . '> válido, pero el nombre del servidor ó el dominio erróneos!')));
                            } else {
                                die(json_encode(array("error", 'correo <' . $_POST["correo"] . '> no válido!')));
                            }
                            $correo = $_POST["correo"];
                        }
                        break;		
                    }else{
                        $correo=null;
                    }
                }
                
                //SUBROLES
                if($_POST["rolnom"] != "Superadministrador" && $_POST["rolnom"] != "Administrador" && $_POST["rolnom"] != "Sin rol"){
                    if(!(empty($_POST["subrol_id"]))){	
                        $check_subrol = $object -> _db -> prepare("SELECT * FROM subroles WHERE roles_id=:rolid && id=:subrolid");
                        $check_subrol -> execute(array(':rolid' => $_POST["roles_id"], ':subrolid' => $_POST["subrol_id"]));
                        $count_subrol = $check_subrol -> rowCount();						
                        if($count_subrol == 0 )
                        {
                            die(json_encode(array("error", "No se encontró el subrol")));
                        }else{
                            $subroles = $_POST["subrol_id"];
                        }
                    }else{
                        $subroles=null;
                    }
                }else{
                    $subroles=null;
                }	
                
                //DEPARTAMENTOS
                if(!(empty($_POST["departamento"]))){
                    $select_departamentos = $object -> _db -> prepare("SELECT * FROM departamentos WHERE id=:depaid");
                    $select_departamentos -> execute(array(':depaid' => $_POST["departamento"]));
                    $count_departamentos = $select_departamentos -> rowCount();
                    if($count_departamentos == 0){
                        die(json_encode(array("error", "No se encontró el departamento")));
                    }else{
                        $check_jerarquia = $object -> _db -> prepare("SELECT roles.nombre FROM jerarquia inner join roles ON roles.id=jerarquia.rol_id");
                        $check_jerarquia -> execute();
                        $fetch_this_jerarquia = $check_jerarquia -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($fetch_this_jerarquia as $rol_departamento){
                            if($rol_departamento["nombre"] == $_POST["rolnom"]){
                                $departamento = $_POST["departamento"];
                                break;
                            }else{
                                $departamento = null;
                            }
                        }
                    }
                }else{
                    $departamento = null;
                }			
            }else{
                die(json_encode(array("error", "Ese rol no existe")));
            }
        }else{
            $roles = null;
            $correo = null;
            $subroles = null;
            $departamento = null;
        }

        if(isset($_FILES['foto']['name'])){
            $allowed = array('jpeg', 'png', 'jpg');
            $filename = $_FILES['foto']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                die(json_encode(array("error", "Solo se permite jpg, jpeg y pngs")));
            }else if($_FILES['foto']['size'] > 10485760){
                die(json_encode(array("error", "Solo se permiten imágenes de un máximo de 10 megabytes")));
            }else{
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimetype = finfo_file($finfo, $_FILES["foto"]["tmp_name"]);
                finfo_close($finfo);
                if($mimetype != "image/jpeg" && $mimetype != "image/png"){
                    die(json_encode(array("error", "Por favor, asegurese que la imagen sea originalmente un archivo png, jpg y jpeg")));
                }
            }
            $foto=$_FILES['foto'];
        }else{
            $filename=null;
            $foto=null;
        }
        switch($_POST["method"]){

            case "store":
                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $departamento, $roles, $subroles, $filename, $foto);
                    $user->CrearUsuarios();
                    die(json_encode(array("success", "Se ha creado un usuario exitosamente!")));
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
                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $departamento, $roles, $subroles, $filename, $foto);
                    $user->EditarUsuarios($ideditar);
                    exit("success");
                }
                break;
            
        }
    }
}else if(isset($_POST["app"]) && $_POST["app"] == "permisos"){
    if(isset($_POST["permisos"]) && isset($_POST["categorias"]) && isset($_POST["method"])){
        $permisos = $_POST["permisos"];
        $categorias = $_POST["categorias"];
        switch($_POST["method"]){
            case "store":
                $permiso = new Permissions($permisos, $categorias);
                $permiso ->CrearPermisos();
                exit("success");
            break;
            case "edit":
                if(isset($_POST["editarid"])){
                    $id = $_POST["editarid"];
                    $permiso = new Permissions($permisos, $categorias);
                    $permiso ->EditarPermisos($id);
                    exit("success");
                }
            break;
        }
    }
}else if(isset($_POST["app"]) && $_POST["app"] == "roles"){
    if(isset($_POST["roles"]) && isset($_POST["method"])){
        $roles = $_POST["roles"];
        $jerarquia = null;
        $categorias = null;
        if(isset($_POST["jerarquia"]) && is_numeric($_POST["jerarquia"])){
            $checkjerarquia = $object->_db->prepare("select id from jerarquia where rol_id=:rolesid");
            $checkjerarquia -> execute(array('rolesid' => $_POST["jerarquia"])); 
            $countjerarquia = $checkjerarquia -> rowCount();
            if($countjerarquia > 0){
                $fetchjerarquia = $checkjerarquia ->fetch(PDO::FETCH_OBJ);
                $jerarquia = $fetchjerarquia -> id;
            }
        }else if($_POST["jerarquia"] == "SIN JEFE"){
            $jerarquia=$_POST["jerarquia"];
        }
		if(isset($_POST["categorias"])){
            $categorias = json_decode($_POST["categorias"]);
        }
        switch($_POST["method"]){
            case "store":
                $rol = new Roles($roles, $jerarquia, $categorias);
                $rol->CrearRol();
                exit("success");
                break;
            case "edit":
                if(isset($_POST["editarid"])){
                    $id = $_POST["editarid"];
                    $rol = new Roles($roles, $jerarquia, $categorias);
                    $rol ->EditarRol($id);
                    exit("success");
                }
                break;
        }
    }
}else if(isset($_POST["app"]) && $_POST["app"] == "departamentos"){
    if(isset($_POST["departamentos"]) && isset($_POST["method"])){
        $departamentos = $_POST["departamentos"];
        switch($_POST["method"]){
            case "store":
                $departamento = new Departamentos($departamentos);
                $departamento->CrearDepartamento();
                exit("success");
            break;
            case "edit":
                if(isset($_POST["editarid"])){
                    $id = $_POST["editarid"];
                    $departamento = new Departamentos($departamentos);
                    $departamento ->EditarDepartamento($id);
                    exit("success");
                }
            break;
        }
    }
}else if(isset($_POST["app"]) && $_POST["app"] == "expediente"){
	if(isset($_POST["select2"]) && isset($_POST["fechaalta"]) && isset($_POST["method"])){
        if(!(empty($_POST["numempleado"]))){
            $numempleado = $_POST["numempleado"];
        }else{
            $numempleado = null;
        }
        if(!(empty($_POST["puesto"]))){
            $puesto = $_POST["puesto"];
        }else{
            $puesto = null;
        }
        if(!(empty($_POST["estudios"]))){
            $estudios = $_POST["estudios"];
        }else{
            $estudios = null;
        }
        if(!(empty($_POST["posee_correo"]))){
            $posee_correo = $_POST["posee_correo"];
        }else{
            $posee_correo = null;
        }
		if(!(empty($_POST["correo_personal"]))){
            $correo_personal = $_POST["correo_personal"];
        }else{
            $correo_personal = null;
        }
        if(!(empty($_POST["calle"]))){
            $calle = $_POST["calle"];
        }else{
            $calle = null;
        }
        if(!(empty($_POST["ninterior"]))){
            $ninterior = $_POST["ninterior"];
        }else{
            $ninterior = null;
        }
        if(!(empty($_POST["nexterior"]))){
            $nexterior = $_POST["nexterior"];
        }else{
            $nexterior = null;
        }
        if(!(empty($_POST["colonia"]))){
            $colonia = $_POST["colonia"];
        }else{
            $colonia = null;
        }
        if(!(empty($_POST["estado"]))){
            $estado = $_POST["estado"];
        }else{
            $estado = null;
        }
        if(!(empty($_POST["municipio"]))){
            $municipio = $_POST["municipio"];
        }else{
            $municipio = null;
        }
        if(!(empty($_POST["codigo"]))){
            $codigo = $_POST["codigo"];
        }else{
            $codigo = null;
        }
        if(!(empty($_POST["teldom"]))){
            $teldom = $_POST["teldom"];
        }else{
            $teldom = null;
        }
        if(!(empty($_POST["posee_telmov"]))){
            $posee_telmov = $_POST["posee_telmov"];
        }else{
            $posee_telmov = null;
        }
        if(!(empty($_POST["telmov"]))){
            $telmov = $_POST["telmov"];
        }else{
            $telmov = null;
        }
        if(!(empty($_POST["posee_telempresa"]))){
            $posee_telempresa = $_POST["posee_telempresa"];
        }else{
            $posee_telempresa = null;
        }
        if(!(empty($_POST["marcacion"]))){
            $marcacion = $_POST["marcacion"];
        }else{
            $marcacion = null;
        }
		if(!(empty($_POST["serie"]))){
            $serie = $_POST["serie"];
        }else{
            $serie = null;
        }	
		if(!(empty($_POST["sim"]))){
            $sim = $_POST["sim"];
        }else{
            $sim = null;
        }
        if(!(empty($_POST["numred"]))){
            $numred = $_POST["numred"];
        }else{
            $numred = null;
        }
		if(!(empty($_POST["modelotel"]))){
            $modelotel = $_POST["modelotel"];
        }else{
            $modelotel = null;
        }	
		if(!(empty($_POST["marcatel"]))){
            $marcatel = $_POST["marcatel"];
        }else{
            $marcatel = null;
        }
        if(!(empty($_POST["imei"]))){
            $imei = $_POST["imei"];
        }else{
            $imei = null;
        }
        if(!(empty($_POST["posee_laptop"]))){
            $posee_laptop = $_POST["posee_laptop"];
        }else{
            $posee_laptop = null;
        }
        if(!(empty($_POST["marca_laptop"]))){
            $marca_laptop = $_POST["marca_laptop"];
        }else{
            $marca_laptop = null;
        }
        if(!(empty($_POST["modelo_laptop"]))){
            $modelo_laptop = $_POST["modelo_laptop"];
        }else{
            $modelo_laptop = null;
        }	
        if(!(empty($_POST["serie_laptop"]))){
            $serie_laptop = $_POST["serie_laptop"];
        }else{
            $serie_laptop = null;
        }
        if(!(empty($_POST["radio"]))){
            $radio = $_POST["radio"];
        }else{
            $radio = null;
        }
        if(!(empty($_POST["ecivil"]))){
            $ecivil = $_POST["ecivil"];
        }else{
            $ecivil = null;
        }	
		if(!(empty($_POST["posee_retencion"]))){
            $posee_retencion = $_POST["posee_retencion"];
        }else{
            $posee_retencion = null;
        }
		if(!(empty($_POST["monto_mensual"]))){
            $monto_mensual = $_POST["monto_mensual"];
        }else{
            $monto_mensual = null;
        }
        if(!(empty($_POST["fechanac"]))){
            $fechanac = $_POST["fechanac"];
        }else{
            $fechanac = null;
        }
        if(!(empty($_POST["fechacon"]))){
            $fechacon = $_POST["fechacon"];
        }else{
            $fechacon = null;
        }
        $fechaalta = $_POST["fechaalta"];
        if(!(empty($_POST["salario_contrato"]))){
            $salario_contrato = $_POST["salario_contrato"];
        }else{
            $salario_contrato = null;
        }
		if(!(empty($_POST["salario_fechaalta"]))){
            $salario_fechaalta = $_POST["salario_fechaalta"];
        }else{
            $salario_fechaalta = null;
        }
        if(!(empty($_POST["observaciones"]))){
            $observaciones = $_POST["observaciones"];
        }else{
            $observaciones = null;
        }
        if(!(empty($_POST["curp"]))){
            $curp = $_POST["curp"];
        }else{
            $curp = null;
        }
        if(!(empty($_POST["nss"]))){
            $nss = $_POST["nss"];
        }else{
            $nss = null;
        }
        if(!(empty($_POST["rfc"]))){
            $rfc = $_POST["rfc"];
        }else{
            $rfc = null;
        }
        if(!(empty($_POST["identificacion"]))){
            $identificacion = $_POST["identificacion"];
        }else{
            $identificacion = null;
        }
        if(!(empty($_POST["numeroidentificacion"]))){
            $numeroidentificacion = $_POST["numeroidentificacion"];
        }else{
            $numeroidentificacion = null;
        }
        if(!(empty($_POST["referencias"]))){
            $referencias = $_POST["referencias"];
        }
        if(!(empty($_POST["capacitacion"]))){
            $capacitacion = $_POST["capacitacion"];
        }else{
            $capacitacion = null;
        }
        if(!(empty($_POST["fechauniforme"]))){
            $fechauniforme = $_POST["fechauniforme"];
        }else{
            $fechauniforme = null;
        }
        if(!(empty($_POST["cantidadpolo"]))){
            $cantidadpolo = $_POST["cantidadpolo"];
        }else{
            $cantidadpolo = null;
        }
        if(!(empty($_POST["tallapolo"]))){
            $tallapolo = $_POST["tallapolo"];
        }else{
            $tallapolo = null;
        }
        if(!(empty($_POST["emergencianom"]))){
            $emergencianom = $_POST["emergencianom"];
        }else{
            $emergencianom = null;
        }
        if(!(empty($_POST["emergenciaparentesco"]))){
            $emergenciaparentesco = $_POST["emergenciaparentesco"];
        }else{
            $emergenciaparentesco = null;
        }
        if(!(empty($_POST["emergenciatel"]))){
            $emergenciatel = $_POST["emergenciatel"];
        }else{
            $emergenciatel = null;
        }
        if(!(empty($_POST["emergencianom2"]))){
            $emergencianom2 = $_POST["emergencianom2"];
        }else{
            $emergencianom2 = null;
        }
		if(!(empty($_POST["emergenciaparentesco2"]))){
            $emergenciaparentesco2 = $_POST["emergenciaparentesco2"];
        }else{
            $emergenciaparentesco2 = null;
        }
		if(!(empty($_POST["emergenciatel2"]))){
            $emergenciatel2 = $_POST["emergenciatel2"];
        }else{
            $emergenciatel2 = null;
        }
        if(!(empty($_POST["antidoping"]))){
            $antidoping = $_POST["antidoping"];
        }else{
            $antidoping = null;
        }
        if(!(empty($_POST["vacante"]))){
            $vacante = $_POST["vacante"];
        }else{
            $vacante = null;
        }
        if(!(empty($_POST["radio2"]))){
            $radio2 = $_POST["radio2"];
        }else{
            $radio2 = null;
        }
        if(!(empty($_POST["nomfam"]))){
            $nomfam = $_POST["nomfam"];
        }else{
            $nomfam = null;
        }
        if(!(empty($_POST["banco_personal"]))){
            $banco_personal = $_POST["banco_personal"];
        }else{
            $banco_personal = null;
        }
		if(!(empty($_POST["cuenta_personal"]))){
            $cuenta_personal = $_POST["cuenta_personal"];
        }else{
            $cuenta_personal = null;
        }
		if(!(empty($_POST["clabe_personal"]))){
            $clabe_personal = $_POST["clabe_personal"];
        }else{
            $clabe_personal = null;
        }
		if(!(empty($_POST["banco_nomina"]))){
            $banco_nomina = $_POST["banco_nomina"];
        }else{
            $banco_nomina = null;
        }
		if(!(empty($_POST["cuenta_nomina"]))){
            $cuenta_nomina = $_POST["cuenta_nomina"];
        }else{
            $cuenta_nomina = null;
        }
		if(!(empty($_POST["clabe_nomina"]))){
            $clabe_nomina = $_POST["clabe_nomina"];
        }else{
            $clabe_nomina = null;
        }
		if(!(empty($_POST["plastico"]))){
            $plastico = $_POST["plastico"];
        }else{
            $plastico = null;
        }
        if(!(empty($_POST["refbanc"]))){
            $refbanc = $_POST["refbanc"];
        }
        $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
        $checktipospapeleria -> execute();
        $counttipospapeleria = $checktipospapeleria -> rowCount();
        $arraypapeleria = [];
        for($i = 1; $i <= $counttipospapeleria; $i++){
            if(!(empty($_FILES['papeleria'.$i.'']['name']))){
                $arraypapeleria[$i] = $_FILES['papeleria'.$i.''];
            }else{
                $arraypapeleria[$i] = null;
            }
        }
		switch($_POST["method"]){
            case "store":
                $iduser = $_POST["select2"];
                $expediente = new Expedientes($numempleado, $puesto, $estudios, $posee_correo, $correo_personal, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $posee_telempresa, $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $posee_laptop, $marca_laptop, $modelo_laptop, $serie_laptop, $radio, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $vacante, $radio2, $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $refbanc, $arraypapeleria);
                $expediente ->Crear_expediente($iduser);
                exit("success");
            break;
            case "edit":
                $iduser = $_POST["select2"];
                $id_expediente = $_POST["id_expediente"];
                $situacion = $_POST["situacion"];
                $estatus_empleado = $_POST["estatus_empleado"];
                if(!(empty($_POST["motivo_estatus"]))){
                        $motivo_estatus = $_POST["motivo_estatus"];
                }else {
                        $motivo_estatus = null;
                }
                if(!(empty($_POST["estatus_fecha"]))){
                    $fecha_estatus =  $_POST["estatus_fecha"];
                }else {
                    $fecha_estatus = null;
                }
                $expediente = new Expedientes($numempleado, $puesto, $estudios, $posee_correo, $correo_personal, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $posee_telempresa, $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $posee_laptop, $marca_laptop, $modelo_laptop, $serie_laptop, $radio, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $vacante, $radio2, $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $refbanc, $arraypapeleria);
                $expediente ->Editar_expediente($iduser, $id_expediente, $situacion, $estatus_empleado, $motivo_estatus, $fecha_estatus);
                exit("success");
            break;
        }
	}
}else if(isset($_POST["app"]) && $_POST["app"] == "incidencias"){
	if(isset($_POST["titulo"]) && isset($_POST["fechainicio"]) && isset($_POST["fechafin"]) && isset($_POST["tipo"]) && isset($_POST["descripcion"]) && isset($_POST["method"])){
		$titulo = $_POST["titulo"];
		$fechainicio = $_POST["fechainicio"];
		$fechafin = $_POST["fechafin"];
		$tipo = $_POST["tipo"];
		$descripcion = $_POST["descripcion"];
		$filename=null;
		$foto=null;
		
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
                $userid = $_POST["userid"];
				$incidencia = new Incidencias($titulo, $fechainicio, $fechafin, $tipo, $descripcion, $filename, $foto);
                $incidencia->CrearIncidencias($userid);
                die(json_encode(array("success")));
			break;
			case "edit":
                $incidenciaid = $_POST["editarid"];
                $incidencia = new Incidencias($titulo, $fechainicio, $fechafin, $tipo, $descripcion, $filename, $foto);
                $incidencia->EditarIncidencias($incidenciaid);
                die(json_encode(array("success")));
			break;
		}
	}
}else if(isset($_POST["app"]) && $_POST["app"] == "solicitud_incidencia"){
    if(isset($_POST["estatus"]) && isset($_POST["incidenciaid"]) && isset($_POST["method"])){
		$incidenciaid= $_POST["incidenciaid"];
        $estatus= $_POST["estatus"];
        $sueldo=null;
        if(isset($_POST["sueldo"])){
		    $sueldo= $_POST["sueldo"];
        }
		$select_user = $object -> _db -> prepare("SELECT nombre, apellido_pat, apellido_mat FROM usuarios WHERE id=:iduser");
		$select_user -> execute(array(':iduser' => $_POST["iduser"]));
        $fetch_user = $select_user -> fetch(PDO::FETCH_OBJ);
        if(!(empty($_POST["comentario"]))){
            $comentario = $_POST["comentario"];
        }else{
            $comentario = null;
        }
        switch($_POST["method"]){
            case "store":
                Incidencias::Almacenar_estatus($incidenciaid, $estatus, $sueldo, $fetch_user -> nombre, $fetch_user -> apellido_pat, $fetch_user -> apellido_mat, $comentario);
                die(json_encode(array("success")));
            break;
        }
    }
}else if(isset($_POST["app"]) && $_POST["app"] == "categorias"){
    if(isset($_POST["categorias"]) && isset($_POST["method"])){
        $categorias = $_POST["categorias"];
        switch($_POST["method"]){
            case "store":
                $categoria = new Categorias($categorias);
                $categoria ->CrearCategorias();
                exit("success");
            break;
            case "edit":
                if(isset($_POST["editarid"])){
                    $id = $_POST["editarid"];
                    $categoria = new Categorias($categorias);
                    $categoria ->EditarCategorias($id);
                    exit("success");
                }
            break;
        }
    }
}else if(isset($_POST["app"]) && $_POST["app"] == "subroles"){
    if(isset($_POST["roles"]) && isset($_POST["subroles"]) && isset($_POST["method"])){
        $roles = $_POST["roles"];
		$subroles = $_POST["subroles"];
		$permissions = null;
		if(isset($_POST["permisos"])){
        $permissions = json_decode($_POST["permisos"]);
        }
        switch($_POST["method"]){
            case "store":
                $subrol = new Subroles($roles, $subroles, $permissions);
                $subrol->CrearSubrol();
                exit("success");
                break;
            break;
            case "edit":
                if(isset($_POST["subrol_id"])){
                    $subrol_id = $_POST["subrol_id"];
                    $subrol = new Subroles($roles, $subroles, $permissions);
                    $subrol->EditarSubrol($subrol_id);
                    exit("success");
                }
            break;
        }
    }
}
?>