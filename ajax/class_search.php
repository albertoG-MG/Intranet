<?php
include_once __DIR__ . "/../classes/user.php";
include_once __DIR__ . "/../classes/permissions.php";
include_once __DIR__ . "/../classes/roles.php";
include_once __DIR__ . "/../classes/departamentos.php";
include_once __DIR__ . "/../classes/expedientes.php";
include_once __DIR__ . "/../classes/incidencias.php";
include_once __DIR__ . "/../classes/categorias.php";
include_once __DIR__ . "/../classes/subroles.php";
include_once __DIR__ . "/../classes/vacaciones.php";
include_once __DIR__ . "/../classes/alertas.php";
include_once __DIR__ . "/../classes/avisos.php";
include_once __DIR__ . "/../classes/comunicados.php";
include_once __DIR__ . "/../classes/crud.php";
include_once __DIR__ . "/../config/conexion.php";
$object = new connection_database();
session_start();
$crud = new Crud();


/**
 * *    ██    ██ ███████ ██    ██  █████  ██████  ██  ██████  
 * *    ██    ██ ██      ██    ██ ██   ██ ██   ██ ██ ██    ██ 
 * *    ██    ██ ███████ ██    ██ ███████ ██████  ██ ██    ██ 
 * *    ██    ██      ██ ██    ██ ██   ██ ██   ██ ██ ██    ██ 
 * *     ██████  ███████  ██████  ██   ██ ██   ██ ██  ██████                                                            
*/

if(isset($_POST["app"]) && $_POST["app"] == "usuario"){
    if(isset($_POST["usuario"], $_POST["password"], $_POST["confirmar_password"], $_POST["nombre"], $_POST["apellido_pat"], $_POST["apellido_mat"], $_POST["correo"], $_POST["departamento"], $_POST["departamentonom"], $_POST["roles_id"], $_POST["rolnom"], $_POST["subrol_id"], $_POST["subrol_nom"], $_POST["method"])){
        
        //Checa si el usuario existe
        if($_POST["method"] == "edit"){
            $user_check = $object -> _db -> prepare("SELECT * FROM usuarios where id=:checkuser");
            $user_check -> execute(array(':checkuser' => $_POST["editarid"]));
            $count_user_check = $user_check -> rowCount();
            if($count_user_check == 0){
                die(json_encode(array("user_deleted", "Este usuario ya no existe!")));
            }
        }

        $logged_user= $_SESSION["nombre"]. " " .$_SESSION["apellidopat"]. " " .$_SESSION["apellidomat"];

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

        if($_POST["method"] == "store"){
            if(Roles::FetchSessionRol($_SESSION['rol']) == "Superadministrador" || Roles::FetchSessionRol($_SESSION['rol']) == "Administrador"){
                $password_temporal = $_POST["password_temporal"];
            }else{
                $password_temporal = 1;
            }
        }else if($_POST["method"] == "edit"){
            if(Roles::FetchSessionRol($_SESSION['rol']) == "Superadministrador" || Roles::FetchSessionRol($_SESSION['rol']) == "Administrador"){
                $password_temporal = $_POST["password_temporal"];
            }else{
                $password_temporal = null;
            }
        }

        if(empty($_POST["nombre"])){
            die(json_encode(array("error", "Por favor, ingrese un nombre")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nombre"])){
            die(json_encode(array("error", "Nombre no válido")));
        }else{
            $nombre = $_POST["nombre"];
        }

        if(empty($_POST["apellido_pat"])){
            die(json_encode(array("error", "Por favor, ingrese un apellido paterno")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellido_pat"])){
            die(json_encode(array("error", "Apellido paterno no válido")));
        }else{
            $apellido_pat = $_POST["apellido_pat"];
        }

        if(empty($_POST["apellido_mat"])){
            die(json_encode(array("error", "Por favor, ingrese un apellido materno")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellido_mat"])){
            die(json_encode(array("error", "Apellido materno no válido")));
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
            $correo = $_POST["correo"];
        }

        $check_session = $object -> _db -> prepare("SELECT nombre FROM roles WHERE id=:rolid");
        $check_session -> execute(array(':rolid' => $_SESSION['rol']));
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
        }else if($fetch_session -> nombre == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Vista tecnico") == "false"){
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
        }else if(Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Vista tecnico") == "true"){
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
			$roles = $_POST["roles_id"];
			
			//SUBROLES	
			$check_subrol = $object -> _db -> prepare("SELECT id, subrol_nombre FROM subroles WHERE roles_id=:rolid");
			$check_subrol -> execute(array(':rolid' => $roles));
			$fetch_subrol = $check_subrol -> fetchAll(PDO::FETCH_KEY_PAIR);
			
			$key_subrol = array_search($_POST['subrol_nom'], $fetch_subrol);
			
			if ($key_subrol !== false || $_POST['subrol_nom'] == "Sin subrol") {
				if($key_subrol != $_POST["subrol_id"] && !(empty($_POST["subrol_id"]))){
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los subroles registrados")));
				}else{
					if(empty($_POST["subrol_id"])){
						$subroles = null;
					}else{
						$subroles = $_POST["subrol_id"];
					}
				}
			}else{
				die(json_encode(array("error", "Por favor, asegurese que el subrol escogido se encuentre en el dropdown")));
			}
			
			//DEPARTAMENTOS
			
			$check_departamento = $object -> _db -> prepare("SELECT id, departamento FROM departamentos");
			$check_departamento -> execute();
			$fetch_departamento = $check_departamento -> fetchAll(PDO::FETCH_KEY_PAIR);
			
			$key_departamento = array_search($_POST['departamentonom'], $fetch_departamento);
			
			if ($key_departamento !== false || $_POST['departamentonom'] == "Sin departamento") {
				if($key_departamento != $_POST["departamento"] && !(empty($_POST["departamento"]))){
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los departamentos registrados")));
				}else{
					if($_POST['rolnom'] != "Superadministrador" && $_POST['rolnom'] != "Administrador" && $_POST['rolnom'] != "Director general" && $_POST['rolnom'] != "Usuario externo"){
						if(empty($_POST["departamento"])){
							$departamento = null;
						}else{
							$departamento = $_POST["departamento"];
						}
					}else{
						$departamento = null;
					}
				}
			}else{
				die(json_encode(array("error", "Por favor, asegurese que el departamento escogido se encuentre en el dropdown")));
			}
		}else{
			$roles = null;
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
                die(json_encode(array("error", "Las imágenes deben pesar ser menos de 10 MB")));
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
                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $password_temporal, $departamento, $roles, $subroles, $filename, $foto);
                    $user->CrearUsuarios($logged_user);
                    die(json_encode(array("success", "Se ha creado un usuario exitosamente!")));
                break;
            
            case "edit":
                if(isset($_POST["editarid"])){
                    $ideditar = $_POST["editarid"];
                    $delete = $_POST["delete"];
                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $password_temporal, $departamento, $roles, $subroles, $filename, $foto);
                    $user->EditarUsuarios($ideditar, $delete, $logged_user);
                    die(json_encode(array("success", "Se ha editado un usuario exitosamente!")));
                }
                break;
            
        }
    }
/**
 * *   ██████  ███████ ██████  ███    ███ ██ ███████  ██████  ███████ 
 * *   ██   ██ ██      ██   ██ ████  ████ ██ ██      ██    ██ ██      
 * *   ██████  █████   ██████  ██ ████ ██ ██ ███████ ██    ██ ███████ 
 * *   ██      ██      ██   ██ ██  ██  ██ ██      ██ ██    ██      ██ 
 * *   ██      ███████ ██   ██ ██      ██ ██ ███████  ██████  ███████                                                                    
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "permisos"){
    if(isset($_POST["permisos"]) && isset($_POST["categorias"]) && isset($_POST["method"])){
        $permisos = $_POST["permisos"];
        $categorias = $_POST["categorias"];
        switch($_POST["method"]){
            case "store":
                $permiso = new Permissions($permisos, $categorias);
                $permiso = (mb_strtoupper($permiso, 'UTF-8') ->CrearPermisos());
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
/**
 * *   ██████   ██████  ██      ███████ ███████ 
 * *   ██   ██ ██    ██ ██      ██      ██      
 * *   ██████  ██    ██ ██      █████   ███████ 
 * *   ██   ██ ██    ██ ██      ██           ██ 
 * *   ██   ██  ██████  ███████ ███████ ███████                                              
*/
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
/**
 * *   ██████  ███████ ██████   █████  ██████  ████████  █████  ███    ███ ███████ ███    ██ ████████  ██████  ███████ 
 * *   ██   ██ ██      ██   ██ ██   ██ ██   ██    ██    ██   ██ ████  ████ ██      ████   ██    ██    ██    ██ ██      
 * *   ██   ██ █████   ██████  ███████ ██████     ██    ███████ ██ ████ ██ █████   ██ ██  ██    ██    ██    ██ ███████ 
 * *   ██   ██ ██      ██      ██   ██ ██   ██    ██    ██   ██ ██  ██  ██ ██      ██  ██ ██    ██    ██    ██      ██ 
 * *   ██████  ███████ ██      ██   ██ ██   ██    ██    ██   ██ ██      ██ ███████ ██   ████    ██     ██████  ███████                                                                                                                     
*/
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
/**
 * *   ███████ ██   ██ ██████  ███████ ██████  ██ ███████ ███    ██ ████████ ███████     ████████ ███████ ███    ███ ██████   ██████  ██████   █████  ██      
 * *   ██       ██ ██  ██   ██ ██      ██   ██ ██ ██      ████   ██    ██    ██             ██    ██      ████  ████ ██   ██ ██    ██ ██   ██ ██   ██ ██      
 * *   █████     ███   ██████  █████   ██   ██ ██ █████   ██ ██  ██    ██    █████          ██    █████   ██ ████ ██ ██████  ██    ██ ██████  ███████ ██      
 * *   ██       ██ ██  ██      ██      ██   ██ ██ ██      ██  ██ ██    ██    ██             ██    ██      ██  ██  ██ ██      ██    ██ ██   ██ ██   ██ ██      
 * *   ███████ ██   ██ ██      ███████ ██████  ██ ███████ ██   ████    ██    ███████        ██    ███████ ██      ██ ██       ██████  ██   ██ ██   ██ ███████                                                                                                                                                            
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "Expediente_temporal"){
	//La variable method, solamente puede contener 2 valores: store y edit
	if (isset($_POST["method"]) && ($_POST["method"] != "store" && $_POST["method"] != "edit")) {
		// Mostrar un mensaje de error porque el valor de "method" no es válido.
		die(json_encode(array("error", "El valor de 'method' no es válido ó no existe")));
	}

	//Checa si el usuario tiene permiso para crear ó editar expedientes
	if($_POST["method"] == "store"){
		if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear expediente") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
			die(json_encode(array("forbidden", "No tiene permisos para realizar estas acciones")));
		}
	}else if($_POST["method"] == "edit"){
		if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Editar expediente") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
			die(json_encode(array("forbidden", "No tiene permisos para realizar estas acciones")));
		}       
	}

	//En el caso de editar, checa si el expediente aún existe
	if ($_POST["method"] == "edit") {
		// Verificar si la variable $_POST['id_expediente'] está definida
		if (!isset($_POST['id_expediente'])) {
			die(json_encode(array("error", "La variable idExpediente no está definida")));
		}
		$expediente_check = $crud->readWithCount('expedientes', '*', 'WHERE id = :expedienteid', [':expedienteid' => $_POST["id_expediente"]]);
		if ($expediente_check['count'] == 0) {
			die(json_encode(array("expediente_deleted", "Este expediente ya no existe!")));
		}
	}

	//La variable pestaña, solamente puede contener 3 valores: DatosG, DatosA y DatosB
	if (isset($_POST["pestaña"]) && ($_POST["pestaña"] != "DatosG" && $_POST["pestaña"] != "DatosA" && $_POST["pestaña"] != "DatosB")) {
		// Mostrar un mensaje de error porque el valor de "pestaña" no es válido.
		die(json_encode(array("error", "El valor de 'pestaña' no es válido ó no existe")));
	}

	// Función para validar si una fecha es válida en el formato especificado
	function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}

	//Función que reemplaza caracteres acentuados por sus equivalentes sin acentos
	function quitarAcentos($texto) {
		$texto = str_replace(
			['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'],
			['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'],
			$texto
		);
		return $texto;
	}
	
	/**
	 * !   ██████   █████  ████████  ██████  ███████  ██████  
	 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██       
	 * !   ██   ██ ███████    ██    ██    ██ ███████ ██   ███ 
	 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██    ██ 
	 * !   ██████  ██   ██    ██     ██████  ███████  ██████                                                        
	*/

	if($_POST["pestaña"] == "DatosG"){
		//El usuario debe proporcionar los datos correspondientes a la pestaña; si falta algún dato, la operación no se llevará a cabo
		if(isset($_POST["select2"], $_POST["select2text"], $_POST["numero_expediente"], $_POST["numero_nomina"], $_POST["asistencia_empleado"], $_POST["puesto"], $_POST["estudios"], $_POST["posee_correo"], 
		$_POST["correo_adicional"], $_POST["calle"], $_POST["ninterior"], $_POST["nexterior"], $_POST["colonia"], $_POST["estado"],
		$_POST["estadotext"], $_POST["municipio"], $_POST["municipiotext"], $_POST["codigo"], $_POST["teldom"], $_POST["posee_telmov"], 
		$_POST["telmov"], $_POST["posee_telempresa"], $_POST["marcacion"], $_POST["serie"], $_POST["sim"], $_POST["numred"], $_POST["modelotel"], 
		$_POST["marcatel"], $_POST["imei"], $_POST["posee_laptop"], $_POST["marca_laptop"], $_POST["modelo_laptop"], $_POST["serie_laptop"], 
		$_POST["radio"], $_POST["ecivil"], $_POST["posee_retencion"], $_POST["monto_mensual"], $_POST["fechanac"], $_POST["fechacon"], 
		$_POST["fechaalta"], $_POST["salario_contrato"], $_POST["salario_fechaalta"], $_POST["observaciones"], $_POST["curp"], 
		$_POST["nss"], $_POST["rfc"], $_POST["identificacion"], $_POST["numeroidentificacion"])){

			/*
			=============================================
			EMPIEZA LA VALIDACIÓN DE LOS DATOS GENERALES
			=============================================
			*/

			if ($_POST["method"] == "store") {
				$check_form_exist = $crud -> readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_POST["select2"]]);
				
				if($check_form_exist['count'] > 0){
					if (isset($_SESSION['expediente_id'])) {
						if($_SESSION['expediente_id'] !== $_POST['select2']){
							die(json_encode(array("error", "No puedes modificar la asignación de usuarios una vez guardado el expediente.")));
						}else{
							$select2 = $_POST['select2'];
						}
					}	
				}else{
					//SELECT2 - El select2 trae a todos los usuarios de la base de datos y verifica que el usuario no haya modificado el id del usuario o el texto
					if($_POST["select2"] != null){
						//Traeme todos los usuarios de la base de datos y haz un FETCH_KEY_PAIR. FETCH_KEY_PAIR convierte los resultados de una consulta en un arreglo, utilizando el ID como clave y el nombre como valor
						$select2_content = $crud->readWithJoinsAndCount('usuarios', 'usuarios.id AS userid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre', 'INNER JOIN roles ON roles.id = usuarios.roles_id', 'WHERE roles.nombre NOT IN (:val1, :val2, :val3, :val4) AND NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id = expedientes.users_id)', [':val1' => 'Superadministrador', ':val2' => 'Administrador', ':val3' => 'Director general', ':val4' => 'Usuario externo'], PDO::FETCH_KEY_PAIR);
					
						//En este código, primero usamos array_keys($select2_content['data']) para obtener un arreglo de los IDs de usuarios y luego verificamos si $_POST["select2"] está en ese arreglo con in_array.
						if (in_array($_POST["select2"], array_keys($select2_content['data']))) {
							// Guarda el valor correspondiente al ID seleccionado en el arreglo en una variable en este caso $array_key_value
							$array_key_value = $select2_content['data'][$_POST["select2"]];
							// Verifica si la variable existe y si su valor coincide con la opción seleccionada en el arreglo
							if (isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value) {
								$select2 = $_POST["select2"];
							}else{
								//Si el usuario ha modificado el texto en el 'select2' y este valor no coincide con ningún usuario en la base de datos, retorna.
								die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
							}
						}else{
							//Si el usuario ha modificado el id en el 'select2' y este id no coincide con ningún usuario en la base de datos, retorna.
							die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
						}
					}else{
						//Si el usuario no seleccionó nada, retorna.
						die(json_encode(array("error", "Debe asignar un usuario al expediente")));
					}
				}
			}else if($_POST["method"] == "edit"){
				//SELECT2 - El select2 trae a todos los usuarios de la base de datos y verifica que el usuario no haya modificado el id del usuario o el texto
				if($_POST["select2"] != null){
					//Traeme todos los usuarios de la base de datos y haz un FETCH_KEY_PAIR. FETCH_KEY_PAIR convierte los resultados de una consulta en un arreglo, utilizando el ID como clave y el nombre como valor
					$select2_content = $crud->readWithJoinsAndCount('usuarios', 'usuarios.id AS userid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre', 'INNER JOIN roles ON roles.id = usuarios.roles_id', 'WHERE roles.nombre NOT IN (:val1, :val2, :val3, :val4) AND ((NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id = expedientes.users_id)) OR usuarios.id = :editUserId)', [':val1' => 'Superadministrador', ':val2' => 'Administrador', ':val3' => 'Director general', ':val4' => 'Usuario externo', ':editUserId' => $_POST['select2']], PDO::FETCH_KEY_PAIR);
				
					//En este código, primero usamos array_keys($select2_content['data']) para obtener un arreglo de los IDs de usuarios y luego verificamos si $_POST["select2"] está en ese arreglo con in_array.
					if (in_array($_POST["select2"], array_keys($select2_content['data']))) {
						// Guarda el valor correspondiente al ID seleccionado en el arreglo en una variable en este caso $array_key_value
						$array_key_value = $select2_content['data'][$_POST["select2"]];
						// Verifica si la variable existe y si su valor coincide con la opción seleccionada en el arreglo
						if (isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value) {
							$select2 = $_POST["select2"];
						}else{
							//Si el usuario ha modificado el texto en el 'select2' y este valor no coincide con ningún usuario en la base de datos, retorna.
							die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
						}
					}else{
						//Si el usuario ha modificado el id en el 'select2' y este id no coincide con ningún usuario en la base de datos, retorna.
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
					}
				}else{
					//Si el usuario no seleccionó nada, retorna.
					die(json_encode(array("error", "Debe asignar un usuario al expediente")));
				}
			}

			//NUM DE EXPEDIENTE
			//Checa si el numero de expediente no está vacío, en caso que si lo esté, nullifica la variable
			if(empty($_POST["numero_expediente"])){
				$numero_expediente = null;
			//PREG_MATCH - Función de php que verifica si el usuario escribió el número de expediente correctamente - F de foráneo y L de local seguido de un guión y al final números
			}else if(!preg_match("/^([FL]){1}-([0-9])+$/", $_POST["numero_expediente"])){
				die(json_encode(array("error", "Por favor, escriba el número de expediente en el formato correcto")));
			}else{
				//Checa si el número de expediente no está repetido
				if($_POST["method"] == "store"){
					if($check_form_exist['count'] > 0){
						$fetch_form = $check_form_exist['data'][0];
						if($fetch_form["numero_expediente"] !== $_POST['numero_expediente']){
							$query = $crud->readWithCount('expedientes', 'numero_expediente', 'WHERE numero_expediente = :expedientenum', [':expedientenum' => $_POST["numero_expediente"]]);
							if($query['count'] > 0){
								die(json_encode(array("error", "Este número de expediente ya existe, por favor, escriba otro")));
							}
						}
					}else{
						$query = $crud->readWithCount('expedientes', 'numero_expediente', 'WHERE numero_expediente = :expedientenum', [':expedientenum' => $_POST["numero_expediente"]]);
						if($query['count'] > 0){
							die(json_encode(array("error", "Este número de expediente ya existe, por favor, escriba otro")));
						}		
					}		
				}else if($_POST["method"] == "edit"){
					$query = $crud->readWithCount('expedientes', 'numero_expediente', 'WHERE numero_expediente = :expedientenum AND id != :idexpediente', [':expedientenum' => $_POST["numero_expediente"], ':idexpediente' => $_POST["id_expediente"]]);
					if($query['count'] > 0){
						die(json_encode(array("error", "Este número de expediente ya existe, por favor, escriba otro")));
					}
				}	
				$numero_expediente = $_POST["numero_expediente"];
			}

			//NUM DE NÓMINA
			//Checa si el numero de nómina no está vacío, en caso que si lo esté, nullifica la variable
			if(empty($_POST["numero_nomina"])){
				$numero_nomina = null;
			}else{
				//Checa si el número de nómina no está repetido
				if($_POST["method"] == "store"){
					if($check_form_exist['count'] > 0){
						$fetch_form = $check_form_exist['data'][0];
						if($fetch_form["numero_nomina"] !== $_POST['numero_nomina']){
							$query = $crud->readWithCount('expedientes', 'numero_nomina', 'WHERE numero_nomina = :nominanum', [':nominanum' => $_POST["numero_nomina"]]);
							if($query['count'] > 0){
								die(json_encode(array("error", "Este número de nómina ya existe, por favor, escriba otro")));
							}
						}
					}else{
						$query = $crud->readWithCount('expedientes', 'numero_nomina', 'WHERE numero_nomina = :nominanum', [':nominanum' => $_POST["numero_nomina"]]);
						if($query['count'] > 0){
							die(json_encode(array("error", "Este número de nómina ya existe, por favor, escriba otro")));
						}		
					}		
				}else if($_POST["method"] == "edit"){
					$query = $crud->readWithCount('expedientes', 'numero_nomina', 'WHERE numero_nomina = :nominanum AND id != :idexpediente', [':nominanum' => $_POST["numero_nomina"], ':idexpediente' => $_POST["id_expediente"]]);
					if($query['count'] > 0){
						die(json_encode(array("error", "Este número de nómina ya existe, por favor, escriba otro")));
					}
				}	
				$numero_nomina = $_POST["numero_nomina"];
			}

			//NUM DE ASISTENCIA/NUM DE EMPLEADO
			//Checa si el numero de asistencia no está vacío, en caso que si lo esté, nullifica la variable
			if(empty($_POST["asistencia_empleado"])){
				$asistencia_empleado = null;
			}else{
				//Checa si el número de asistencia no está repetido
				if($_POST["method"] == "store"){
					if($check_form_exist['count'] > 0){
						$fetch_form = $check_form_exist['data'][0];
						if($fetch_form["numero_asistencia"] !== $_POST['asistencia_empleado']){
							$query = $crud->readWithCount('expedientes', 'numero_asistencia', 'WHERE numero_asistencia = :asistencianum', [':asistencianum' => $_POST["asistencia_empleado"]]);
							if($query['count'] > 0){
								die(json_encode(array("error", "Este número de asistencia/numempleado ya existe, por favor, escriba otro")));
							}
						}
					}else{
						$query = $crud->readWithCount('expedientes', 'numero_asistencia', 'WHERE numero_asistencia = :asistencianum', [':asistencianum' => $_POST["asistencia_empleado"]]);
						if($query['count'] > 0){
							die(json_encode(array("error", "Este número de asistencia/numempleado ya existe, por favor, escriba otro")));
						}		
					}		
				}else if($_POST["method"] == "edit"){
					$query = $crud->readWithCount('expedientes', 'numero_asistencia', 'WHERE numero_asistencia = :asistencianum AND id != :idexpediente', [':asistencianum' => $_POST["asistencia_empleado"], ':idexpediente' => $_POST["id_expediente"]]);
					if($query['count'] > 0){
						die(json_encode(array("error", "Este número de asistencia/numempleado ya existe, por favor, escriba otro")));
					}
				}	
				$asistencia_empleado = $_POST["asistencia_empleado"];
			}

			//PUESTO
			//Checa si el puesto está vacío, en caso que lo esté, nullifica la variable
			if(empty($_POST["puesto"])){
				$puesto = null;
			//Checa si el puesto tenga como mínimo 4 caracteres
			}else if(strlen($_POST["puesto"]) < 4){
				die(json_encode(array("error", "El puesto debe de contener 4 caracteres como mínimo")));
			//Checa si el puesto tenga como mínimo 4 caracteres
			}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["puesto"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el puesto")));
			}else{
				$puesto = $_POST["puesto"];
				//Conviertelo en mayúsculas
				$puesto = mb_strtoupper($puesto, 'UTF-8');
				
				//Quitale los acentos
				$puesto = quitarAcentos($puesto);
			}

			//NIVEL DE ESTUDIOS
			//Este es un menú desplegable convencional, lo que significa que no es necesario revisar el texto, pero debemos verificar que el valor seleccionado coincida con los valores proporcionados en el HTML
			$nivelestudios_array = array("PRIMARIA", "SECUNDARIA", "BACHILLERATO", "CARRERA TECNICA", "LICENCIATURA", "ESPECIALIDAD", "MAESTRIA", "DOCTORADO");
			//Verifica si el valor seleccionado coincide con los valores que hay en el arreglo
			if (in_array($_POST["estudios"], $nivelestudios_array)) {
				$estudios = $_POST["estudios"];
			//Checa si el dropdown no está vacío
			}else if(empty($_POST["estudios"])){
				$estudios = null;
			}else{
				die(json_encode(array("error", "El valor escogido en el dropdown de nivel de estudios está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}

			//CORREO ELECTRÓNICO

			//¿Posee correo electrónico adicional? Comprueba si el usuario tiene un correo electrónico adicional
			if($_POST["posee_correo"] == "si"){
				//Checa si el correo está vacío
				if(empty($_POST["correo_adicional"])){
					die(json_encode(array("error", "Por favor, ingrese un correo adicional")));
					//Checa si el correo electrónico está bien escrito
				}else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo_adicional"])){
					die(json_encode(array("error", "Asegúrese que el texto ingresado en correo adicional este en formato de email")));
				}else{
					//Verifica si el correo no está repetido en la base de datos
					if($_POST["method"] == "store"){
						if($check_form_exist['count'] > 0){
							$fetch_form_correo = $check_form_exist['data'][0];
							if($fetch_form_correo["correo_adicional"] !== $_POST['correo_adicional']){
								$get_correo = $crud->readWithCount('expedientes', 'correo_adicional', 'WHERE correo_adicional = :correo UNION ALL SELECT correo FROM usuarios WHERE correo = :correo', [':correo' => $_POST["correo_adicional"]]);
								if($get_correo['count'] > 0){
									die(json_encode(array("error", "El correo adicional ingresado ya existe, por favor, escriba otro")));
								}
							}
						}else{
							$get_correo = $crud->readWithCount('expedientes', 'correo_adicional', 'WHERE correo_adicional = :correo UNION ALL SELECT correo FROM usuarios WHERE correo = :correo', [':correo' => $_POST["correo_adicional"]]);
							if($get_correo['count'] > 0){
								die(json_encode(array("error", "El correo adicional ingresado ya existe, por favor, escriba otro")));
							}		
						}
					}else if($_POST["method"] == "edit"){
						$get_correo = $crud->readWithCount('expedientes', 'correo_adicional', 'WHERE correo_adicional = :correo AND id != :idexpediente UNION ALL SELECT correo FROM usuarios WHERE correo = :correo', [':correo' => $_POST["correo_adicional"], 'idexpediente' => $_POST["id_expediente"]]);
						if($get_correo['count'] > 0){
							die(json_encode(array("error", "El correo adicional ingresado ya existe, por favor, escriba otro")));
						}
					}
					$posee_correo= $_POST["posee_correo"];
					//Conviertelo en mayúsculas
					$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
					//Quitale los acentos
					$posee_correo = quitarAcentos($posee_correo);
					//Los servidores de correo y los sistemas de correo electrónico generalmente son sensibles a los acentos en los caracteres. Esto significa que "mi.correo@gmail.com" y "mí.correo@gmail.com" se considerarían direcciones de correo electrónico distintas, lo mismo que las mayúsculas lo cual significa que aquí la regla de los acentos y mayúsculas no aplican en los correos
					$correo_adicional = $_POST["correo_adicional"];
				}
			}else{
				$posee_correo = $_POST["posee_correo"];
				//Conviertelo en mayúsculas
				$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
				//Quitale los acentos
				$posee_correo = quitarAcentos($posee_correo);
				//Si está vacío, nullificalo
				$correo_adicional = null;
			}

			//CALLE
			//Checa si el campo de la calle está vacío
			if(empty($_POST["calle"])){
				$calle = null;
			}else{
				//Verifica si el campo de la calle está bien escrito, no acepta $%&"#@
				if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["calle"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios en la calle")));
				}else{
					$calle = $_POST["calle"];  //Asigna si pasa la validación
					//Conviertelo en mayúsculas
					$calle = mb_strtoupper($calle, 'UTF-8');
					//Quitale los acentos
					$calle = quitarAcentos($calle);
				}
			}

			// NÚMERO INTERIOR
			// Checa si está vacío
			if(empty($_POST["ninterior"])){
				$ninterior = null; // Si no se proporciona el número interior, lo establecemos como nulo.
			}else{
				$ninterior = $_POST["ninterior"]; // Asignamos el número interior si pasa la validación.
			}

			// NÚMERO EXTERIOR
			//Checa si está vacío
			if(empty($_POST["nexterior"])){
				$nexterior = null; // Si no se proporciona el número exterior, lo establecemos como nulo.
			}else{
				$nexterior = $_POST["nexterior"]; // Asignamos el número exterior si pasa la validación.
			}

			// COLONIA
			// Checa si está vacío
			if(empty($_POST["colonia"])){
				$colonia = null; // Si no se proporciona la colonia, la establecemos como nula.
			}else{
				if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["colonia"])){
					// Si se proporciona una colonia, verificamos si cumple con el formato especificado.
					die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos, puntos, guiones intermedios y espacios en la colonia")));
				}else{
					$colonia = $_POST["colonia"]; // Asignamos la colonia si pasa la validación.
					//Conviertelo en mayúsculas
					$colonia = mb_strtoupper($colonia, 'UTF-8');
					//Quitale los acentos
					$colonia = quitarAcentos($colonia);
				}
			}

			// ESTADO
			//Checa si el estado está vacío
			if(empty($_POST["estado"])){
				$estado = null;
			}else{
				// Preparar y ejecutar una consulta para recuperar la lista de estados
				$retrieve_estados = $object->_db->prepare("SELECT id, nombre FROM estados");
				$retrieve_estados->execute();

				// Obtener los resultados de la consulta como un arreglo asociativo con ID como clave y Nombre como valor
				$fetch_retrieve_estados = $retrieve_estados->fetchAll(PDO::FETCH_KEY_PAIR);

				if (array_key_exists($_POST["estado"], $fetch_retrieve_estados)) {
					// El estado seleccionado coincide con uno de los estados en el dropdown
					$array_key_state_value = $fetch_retrieve_estados[$_POST["estado"]];

					// Verificar si el texto ingresado (si existe) coincide con el valor del estado
					if (isset($_POST["estadotext"]) && $_POST['estadotext'] == $array_key_state_value) {
						$estado = $_POST["estado"];
					} else {
						die(json_encode(array("error", "Por favor, asegúrese de que el estado escogido se encuentre en el dropdown")));
					}
				} else {
					// El ID seleccionado no coincide con ninguno de los estados registrados
					die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los estados registrados")));
				}
			}

			// MUNICIPIO
			//Checa si el municipio está vacío
			if (empty($_POST["municipio"])) {
				$municipio = null;
			} else if (empty($_POST["estado"]) && !(empty($_POST["municipio"]))) {
				// Asegurarse de que se haya seleccionado un estado antes de un municipio
				die(json_encode(array("error", "Por favor, seleccione un estado y luego un municipio")));
			} else {
				// Preparar y ejecutar una consulta para recuperar la lista de municipios en el estado seleccionado
				$retrieve_estados_municipio = $object->_db->prepare("SELECT id, nombre from municipios where estado=:estado");
				$retrieve_estados_municipio->execute(array(':estado' => $_POST["estado"]));

				// Contar el número de municipios recuperados
				$count_retrieve_estados_municipio = $retrieve_estados_municipio->rowCount();

				if ($count_retrieve_estados_municipio > 0) {
					// Obtener los resultados de la consulta como un arreglo asociativo con ID como clave y Nombre como valor
					$fetch_retrieve_estados_municipio = $retrieve_estados_municipio->fetchAll(PDO::FETCH_KEY_PAIR);

					if (array_key_exists($_POST["municipio"], $fetch_retrieve_estados_municipio)) {
						// El municipio seleccionado coincide con uno de los municipios en el dropdown
						$array_key_municipio_value = $fetch_retrieve_estados_municipio[$_POST["municipio"]];

						// Verificar si el texto ingresado (si existe) coincide con el valor del municipio
						if (isset($_POST["municipiotext"]) && $_POST['municipiotext'] == $array_key_municipio_value) {
							$municipio = $_POST["municipio"];
						} else {
							die(json_encode(array("error", "Por favor, asegúrese de que el municipio escogido se encuentre en el dropdown")));
						}
					} else {
						// El ID seleccionado no coincide con ninguno de los municipios registrados
						die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los municipios registrados")));
					}
				} else {
					// El estado elegido no tiene ningún municipio, el dropdown de municipios debe estar vacío
					die(json_encode(array("error", "El estado elegido no tiene ningún municipio; el dropdown de municipios debe estar vacío")));
				}
			}

			// CÓDIGO POSTAL
			//Checa si el código postal está vacío
			if(empty($_POST["codigo"])){
				$codigo = null;
			}else{
				// Validar que el código postal solo contenga números
				if(!preg_match("/^[0-9]*$/", $_POST["codigo"])){
					die(json_encode(array("error", "Solo se permiten números en el código postal")));
				}else{
					$codigo = $_POST["codigo"];
				}
			}

			// TELÉFONO DE DOMICILIO
			//Checa si el teléfono del domicilio está vacío
			if(empty($_POST["teldom"])){
				$teldom = null;
			}else{
				// Validar que el teléfono de domicilio solo contenga números
				if(!preg_match("/^[0-9]*$/", $_POST["teldom"])){
					die(json_encode(array("error", "Solo se permiten números en el teléfono de domicilio")));
				}else if(strlen($_POST["teldom"]) != 10){
					// Asegurarse de que el teléfono de domicilio tenga exactamente 10 caracteres
					die(json_encode(array("error", "El teléfono de domicilio debe tener exactamente 10 caracteres")));
				}else{
					$teldom = $_POST["teldom"];
				}
			}

			// POSEE TELÉFONO MÓVIL PROPIO?
			// Comproba si el usuario posee un teléfono móvil propio
			if($_POST["posee_telmov"] == "si"){
				if(empty($_POST["telmov"])){
					// Verificar si se ingresó un teléfono móvil cuando se selecciona "Sí"
					die(json_encode(array("error", "Por favor, ingrese un teléfono móvil")));
				}else if(!preg_match("/^[0-9]*$/", $_POST["telmov"])){
					// Validar que el teléfono móvil solo contenga números
					die(json_encode(array("error", "Solo se permiten números en el teléfono de móvil")));
				}else if(strlen($_POST["telmov"]) != 10){
					// Asegurarse de que el teléfono móvil tenga exactamente 10 caracteres
					die(json_encode(array("error", "El teléfono móvil debe tener exactamente 10 caracteres")));
				}else{
					$posee_telmov = $_POST["posee_telmov"];
					//Conviertelo en mayúsculas
					$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
					//Quitale los acentos
					$posee_telmov = quitarAcentos($posee_telmov);
					$telmov = $_POST["telmov"];
				}
			}else{
				// Si no se selecciona "Sí" para poseer teléfono móvil, establecer los valores correspondientes
				$posee_telmov = $_POST["posee_telmov"];
				//Conviertelo en mayúsculas
				$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
				//Quitale los acentos
				$posee_telmov = quitarAcentos($posee_telmov);
				$telmov = null;
			}

			//POSEE TELÉFONO ASIGNADO POR LA EMPRESA?
			// Comprobar si el usuario posee teléfono de la empresa
			if($_POST["posee_telempresa"] == "si"){
				// Validaciones para los campos del teléfono de la empresa
				if(empty($_POST["marcacion"])){
					die(json_encode(array("error", "Por favor, ingrese la marcación del teléfono asignado")));
				}else if(!preg_match("/^[0-9]*$/", $_POST["marcacion"])){
					die(json_encode(array("error", "Solo se permiten números en la marcación del teléfono asignado")));
				}else if(empty($_POST["serie"])){
					die(json_encode(array("error", "Por favor, ingrese la serie del teléfono asignado")));
				}else if(!preg_match("/^[\w]+$/i", $_POST["serie"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfanuméricos en la serie del teléfono asignado")));
				}else if(empty($_POST["sim"])){
					die(json_encode(array("error", "Por favor, ingrese el SIM del teléfono asignado")));
				}else if(!preg_match("/^[0-9]*$/", $_POST["sim"])){
					die(json_encode(array("error", "Solo se permiten números en el SIM del teléfono asignado")));
				}else if(empty($_POST["numred"])){
					die(json_encode(array("error", "Por favor, ingrese el número de red del teléfono asignado")));
				}else if(!preg_match("/^[0-9]*$/", $_POST["numred"])){
					die(json_encode(array("error", "Solo se permiten números en el número de red del teléfono asignado")));
				}else if(empty($_POST["modelotel"])){
					die(json_encode(array("error", "Por favor, ingrese el modelo del teléfono asignado")));
				}else if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}])+([?:\s|\-|\_][a-zA-Z0-9\x{00C0}-\x{00FF}]+)*$/u", $_POST["modelotel"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfanuméricos, guiones intermedios y espacios en el modelo del teléfono asignado")));
				}else if(empty($_POST["marcatel"])){
					die(json_encode(array("error", "Por favor, ingrese la marca del teléfono asignado")));
				}else if(empty($_POST["imei"])){
					die(json_encode(array("error", "Por favor, ingrese el IMEI del teléfono asignado")));
				}else if(!preg_match("/^[0-9]*$/", $_POST["imei"])){
					die(json_encode(array("error", "Solo se permiten números en el IMEI del teléfono asignado")));
				}else{
					// Asignar valores si todas las validaciones son exitosas
					$posee_telempresa = $_POST["posee_telempresa"];
					//Conviertelo en mayúsculas
					$posee_telempresa = mb_strtoupper($posee_telempresa, 'UTF-8');
					//Quitale los acentos
					$posee_telempresa = quitarAcentos($posee_telempresa);
					$marcacion = $_POST["marcacion"];
					$serie = $_POST["serie"];
					//Conviertelo en mayúsculas
					$serie = mb_strtoupper($serie, 'UTF-8');
					//Quitale los acentos
					$serie = quitarAcentos($serie);
					$sim = $_POST["sim"];
					$numred = $_POST["numred"];
					$modelotel = $_POST["modelotel"];
					//Conviertelo en mayúsculas
					$modelotel = mb_strtoupper($modelotel, 'UTF-8');
					//Quitale los acentos
					$modelotel = quitarAcentos($modelotel);
					$marcatel = $_POST["marcatel"];
					//Conviertelo en mayúsculas
					$marcatel = mb_strtoupper($marcatel, 'UTF-8');
					//Quitale los acentos
					$marcatel = quitarAcentos($marcatel);
					$imei = $_POST["imei"];
				}
			}else{
				// Si no se selecciona "Sí" para poseer teléfono de la empresa, establecer los valores correspondientes
				$posee_telempresa = $_POST["posee_telempresa"];
				//Conviertelo en mayúsculas
				$posee_telempresa = mb_strtoupper($posee_telempresa, 'UTF-8');
				//Quitale los acentos
				$posee_telempresa = quitarAcentos($posee_telempresa);
				$marcacion = null;
				$serie = null;
				$sim = null;
				$numred = null;
				$modelotel = null;
				$marcatel = null;
				$imei = null;
			}

			//POSEE LAPTOP ASIGNADA POR LA EMPRESA?
			// Verifica si la variable "posee_laptop" es igual a "si"
			if($_POST["posee_laptop"] == "si"){
				// Si es "si", continúa con las siguientes validaciones
				if(empty($_POST["marca_laptop"])){
					die(json_encode(array("error", "Por favor, ingrese la marca de la laptop asignada")));
				}  else if(empty($_POST["modelo_laptop"])){
					die(json_encode(array("error", "Por favor, ingrese el modelo de la laptop asignada")));
				} else if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}])+([?:\s|\-|\_][a-zA-Z0-9\x{00C0}-\x{00FF}]+)*$/u", $_POST["modelo_laptop"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos, guiones intermedios y espacios en el modelo de la laptop asignada")));
				} else if(empty($_POST["serie_laptop"])){
					die(json_encode(array("error", "Por favor, ingrese la serie de la laptop asignada")));
				} else if(!preg_match("/^[\w]+$/i", $_POST["serie_laptop"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos en la serie de la laptop asignada")));
				} else {
					// Si todas las validaciones son exitosas, asigna los valores a las variables correspondientes
					$posee_laptop = $_POST["posee_laptop"];
					//Conviertelo en mayúsculas
					$posee_laptop = mb_strtoupper($posee_laptop, 'UTF-8');
					//Quitale los acentos
					$posee_laptop = quitarAcentos($posee_laptop);
					$marca_laptop = $_POST["marca_laptop"];
					//Conviertelo en mayúsculas
					$marca_laptop = mb_strtoupper($marca_laptop, 'UTF-8');
					//Quitale los acentos
					$marca_laptop = quitarAcentos($marca_laptop);
					$modelo_laptop = $_POST["modelo_laptop"];
					//Conviertelo en mayúsculas
					$modelo_laptop = mb_strtoupper($modelo_laptop, 'UTF-8');
					//Quitale los acentos
					$modelo_laptop = quitarAcentos($modelo_laptop);
					$serie_laptop = $_POST["serie_laptop"];
					//Conviertelo en mayúsculas
					$serie_laptop = mb_strtoupper($serie_laptop, 'UTF-8');
					//Quitale los acentos
					$serie_laptop = quitarAcentos($serie_laptop);
				}
			} else {
				// Si "posee_laptop" no es igual a "si", asigna valores nulos a las variables correspondientes
				$posee_laptop = $_POST["posee_laptop"];
				//Conviertelo en mayúsculas
				$posee_laptop = mb_strtoupper($posee_laptop, 'UTF-8');
				//Quitale los acentos
				$posee_laptop = quitarAcentos($posee_laptop);
				$marca_laptop = null;
				$modelo_laptop = null;
				$serie_laptop = null;
			}

			//CASA PROPIA
			// Verifica si el usuario escogió un radiobutton
			if(empty($_POST["radio"])){
				die(json_encode(array("error", "Por favor, ingrese el radiobutton de casa propia no puede ir vacío")));
			}else{
				$casa_propia = $_POST["radio"];
				//Conviertelo en mayúsculas
				$casa_propia = mb_strtoupper($casa_propia, 'UTF-8');
				//Quitale los acentos
				$casa_propia = quitarAcentos($casa_propia);
			}

			// ESTADO CIVIL
			//Crea un arreglo con todas las opciones correspondientes en el HTML
			$estadocivil_array = array("SOLTERO", "CASADO", "DIVORCIADO", "UNIÓN LIBRE");

			// Verifica si el valor de "ecivil" se encuentra en el array de opciones de estado civil
			if (in_array($_POST["ecivil"], $estadocivil_array)) {
				$ecivil = $_POST["ecivil"];
			} else if (empty($_POST["ecivil"])) {
				// Si "ecivil" está vacío, asigna un valor nulo a "ecivil"
				$ecivil = null;
			} else {
				// Si "ecivil" no coincide con las opciones originales, muestra un error
				die(json_encode(array("error", "El valor escogido en el dropdown de estado civil está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}

			// POSEE RETENCIÓN
			//Comprueba si el usuario escogió 'si' en la retención
			if ($_POST["posee_retencion"] == "si") {
				// Verifica si el usuario seleccionó "si" para poseer retención
				if (empty($_POST["monto_mensual"])) {
					// Si no ingresó un monto mensual, muestra un error
					die(json_encode(array("error", "Por favor, ingrese el monto mensual")));
				} else if (!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["monto_mensual"])) {
					// Si el monto mensual no cumple con el formato especificado, muestra un error
					die(json_encode(array("error", "Solo se permiten números y decimales en el monto mensual")));
				} else {
					// Si todas las validaciones son exitosas, asigna los valores a las variables correspondientes
					$posee_retencion = $_POST["posee_retencion"];
					//Conviertelo en mayúsculas
					$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
					//Quitale los acentos
					$posee_retencion = quitarAcentos($posee_retencion);
					$monto_mensual = $_POST["monto_mensual"];
				}
			} else {
				// Si "posee_retencion" no es igual a "si", asigna valores nulos a las variables correspondientes
				$posee_retencion = $_POST["posee_retencion"];
				//Conviertelo en mayúsculas
				$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
				//Quitale los acentos
				$posee_retencion = quitarAcentos($posee_retencion);
				$monto_mensual = null;
			}

			// FECHA DE NACIMIENTO
			//Checa si la fecha de nacimiento está vacía
			if (empty($_POST["fechanac"])) {
				$fechanac = null;
			} else {
				// Reemplaza las barras oblicuas por guiones
				$_POST["fechanac"] = str_replace('/', '-', $_POST["fechanac"]);
			
				if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechanac"])) {
					// Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
					die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de nacimiento")));
				} else {
					$check_fechanac = validateDate($_POST["fechanac"], 'Y-m-d');
			
					// Verifica si la fecha de nacimiento es inválida
					if (!$check_fechanac) {
						die(json_encode(array("error", "La fecha de nacimiento es inválida")));
					}
			
					// Calcula la edad a partir de la fecha de nacimiento
					$fecha_nacimiento = new DateTime($_POST["fechanac"]);
					$fecha_hoy = new DateTime();
					$edad = $fecha_nacimiento->diff($fecha_hoy)->y;
			
					// Verifica si el solicitante es menor de 18 años
					if ($edad < 18) {
						die(json_encode(array("error", "Debes ser mayor de 18 años para aplicar")));
					}
			
					$fechanac = $_POST["fechanac"];
				}
			}

			// FECHA DE INICIO DE CONTRATO
			//Checa si la fecha de contrato está vacía
			if (empty($_POST["fechacon"])) {
				$fechacon = null;
			} else {
				// Reemplaza las barras oblicuas por guiones
				$_POST["fechacon"] = str_replace('/', '-', $_POST["fechacon"]);
			
				if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechacon"])) {
					// Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
					die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de contrato")));
				} else {
					$check_fechacon = validateDate($_POST["fechacon"], 'Y-m-d');
			
					// Verifica si la fecha de inicio de contrato es inválida
					if (!$check_fechacon) {
						die(json_encode(array("error", "La fecha de inicio de contrato es inválida")));
					}
			
					$fechacon = $_POST["fechacon"];
				}
			}

			// FECHA DE ALTA
			//Checa si la fecha de alta está vacía
			if (empty($_POST["fechaalta"])) {
				$fechaalta = null;
			} else {
				// Reemplaza las barras oblicuas por guiones
				$_POST["fechaalta"] = str_replace('/', '-', $_POST["fechaalta"]);
			
				if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechaalta"])) {
					// Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
					die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de alta")));
				} else {
					$check_fechaalta = validateDate($_POST["fechaalta"], 'Y-m-d');
			
					// Verifica si la fecha de alta es inválida
					if (!$check_fechaalta) {
						die(json_encode(array("error", "La fecha de alta es inválida")));
					}
			
					$fechaalta = $_POST["fechaalta"];
				}
			}	

			//SALARIO AL INICIO DEL PERIODO DE PRUEBA
			//Checa si el salario al inicio de prueba está vacía
			if(empty($_POST["salario_contrato"])){
				$salario_contrato = null;
			}else{
				//Checa si el salario al inicio de prueba tiene el formato adecuado
				if(!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["salario_contrato"])){
					die(json_encode(array("error", "Solo se permiten números y decimales en el salario al inicio del periodo de prueba")));
				}else{
					$salario_contrato = $_POST["salario_contrato"];
				}
			}

			//SALARIO DESPUÉS DEL PERIODO DE PRUEBA
			//Checa si el salario después del periodo de prueba está vacía
			if(empty($_POST["salario_fechaalta"])){
				$salario_fechaalta = null;
			}else{
				//Checa si el salario después del periodo de prueba tiene el formato adecuado
				if(!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["salario_fechaalta"])){
					die(json_encode(array("error", "Solo se permiten números y decimales en el salario después al periodo de prueba")));
				}else{
					$salario_fechaalta = $_POST["salario_fechaalta"];
				}
			}

			//OBSERVACIONES
			//Checa si las observaciones están vacías
			if(empty($_POST["observaciones"])){
				$observaciones = null;
			}else{
				//Checa si las observaciones tienen el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["observaciones"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las observaciones")));
				}else{
					$observaciones = $_POST["observaciones"];
					//Conviertelo en mayúsculas
					$observaciones = mb_strtoupper($observaciones, 'UTF-8');
					//Quitale los acentos
					$observaciones = quitarAcentos($observaciones);
				}
			}

			//CURP
			//Checa si el CURP está vacío
			if(empty($_POST["curp"])){
				$curp = null;
			}else{
				//Checa si el CURP tiene el formato adecuado
				if(!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $_POST["curp"])){
					die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR")));
				}else{
					$curp= $_POST["curp"];
					//Conviertelo en mayúsculas
					$curp = mb_strtoupper($curp, 'UTF-8');
					//Quitale los acentos
					$curp = quitarAcentos($curp);
				}
			}

			//NÚMERO DE SEGURO SOCIAL
			//Checa si el número de seguro social está vacío
			if(empty($_POST["nss"])){
				$nss = null;
			}else{
				//Checa si el número de seguro social tiene el formato adecuado
				if(!preg_match("/^[0-9]*$/", $_POST["nss"])){
					die(json_encode(array("error", "Solo se permiten números en el número de seguro social")));
				}else{
					$nss = $_POST["nss"];
				}
			}

			//RFC
			//Checa si el RFC está vacío
			if(empty($_POST["rfc"])){
				$rfc = null;
			}else{
				//Checa si el RFC tiene el formato adecuado
				if(!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $_POST["rfc"])){
					die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789")));
				}else{
					$rfc = $_POST["rfc"];
					//Conviertelo en mayúsculas
					$rfc = mb_strtoupper($rfc, 'UTF-8');
					//Quitale los acentos
					$rfc = quitarAcentos($rfc);
				}
			}

			//TIPO DE IDENTIFICACIÓN
			//Definimos el arreglo y agregamos las mismas opciones que en el HTML
			$identificacion_array = array("INE", "PASAPORTE", "CEDULA");
			//Búsca si la opción seleccionada coincide con los del arreglo
			if(in_array($_POST["identificacion"], $identificacion_array)) {
				$identificacion = $_POST["identificacion"];
			}else if(empty($_POST["identificacion"])){
			//Manda null si el campo está vacío
				$identificacion = null;
			}else{
			//Manda null si el campo está vacío
				die(json_encode(array("error", "El valor escogido en el dropdown de tipo de identificación está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}
			
			//NÚMERO DE IDENTIFICACIÓN
			// Verificamos si está vacío
			if(empty($_POST["numeroidentificacion"])){
				$numeroidentificacion = null;
			}else{
				if($_POST["identificacion"] == "INE"){
					// Verifica si el OCR del INE tiene el formato correcto (13 caracteres)
					if (!preg_match('/^[A-Za-z0-9]{13}$/', $_POST["numeroidentificacion"])) {
						die(json_encode(array("error", "El INE solo puede contener 13 caracteres y debe ser alfanúmerico")));
					}
				}else if($_POST["identificacion"] == "PASAPORTE"){
					// Verifica si el OCR del pasaporte tiene el formato correcto (3 letras seguidas de 6 números)
					if (!preg_match('/^[A-Z]{3}\d{6}$/i', $_POST["numeroidentificacion"])) {
						die(json_encode(array("error", "El PASAPORTE solo puede contener 9 caracteres, debe ser alfanúmerico y debe comenzar con 3 letras y seguido de 6 números")));
					}
				}else if($_POST["identificacion"] == "CEDULA"){
					if (!preg_match('/^\d{7,10}$/', $_POST["numeroidentificacion"])) {
						die(json_encode(array("error", "La CEDULA solo puede contener entre 7 y 10 dígitos y debe ser númerico")));
					}
				}
				$numeroidentificacion = $_POST["numeroidentificacion"];
				//Conviertelo en mayúsculas
				$numeroidentificacion = mb_strtoupper($numeroidentificacion, 'UTF-8');
				//Quitale los acentos
				$numeroidentificacion = quitarAcentos($numeroidentificacion);
			}



			/*
			=============================================
			TERMINA LA VALIDACIÓN DE LOS DATOS GENERALES
			=============================================
			*/

			//Debido a que PHP no acepta el request method PUT (Bueno si lo acepta pero solo acepta json) utilizamos una variable method que nos permite saber si necesitamos insertar o actualizar
			switch($_POST["method"]){
				//En este caso, voy a insertar un nuevo expediente en una tabla temporal en la base de datos usando la variable method con el valor store
				case "store":
					//Hago una instancia de la clase y le envío las variables en la clase
					$expediente = new Expedientes($select2, $numero_expediente, $numero_nomina, $asistencia_empleado, $puesto, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $posee_telempresa, $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $posee_laptop, $marca_laptop, $modelo_laptop, $serie_laptop, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion);
					//Una vez que se hayan almacenado las variables, llama al metodo para crear el expediente temporal
					$expediente ->Crear_expediente_datosG();
					//Verifica si la sesión ya existe
					if (!(isset($_SESSION['expediente_id']))) {
						//Asigna una sesión del expediente enviado si la sesión no existe
						$_SESSION['expediente_id'] = $select2;
					}
					//Cuando termine, envía al usuario la notificación de que el proceso fue un éxito
					die(json_encode(array("success", "Se han guardado los datos generales del expediente")));
				break;
				//Este es la versión de editar expediente, su función sera duplicar los datos en la tabla temporal con un estatus diferente
				case "edit":
					//Hago una instancia de la clase y le envío las variables en la clase
					$expediente = new Expedientes($select2, $numero_expediente, $numero_nomina, $asistencia_empleado, $puesto, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $posee_telempresa, $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $posee_laptop, $marca_laptop, $modelo_laptop, $serie_laptop, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion);
					//Una vez que se hayan almacenado las variables, llamar al metodo correspondiente obviamente enviando el id del expediente
					$expediente ->Crear_expediente_datosG();
					//Estatus
					$situacion = null;
					$estatus_empleado = null;
					$estatus_fecha = null;
					$numero_baja = null;
					$fijo_mensual = null;
					$tipo_esquema = null;
					$motivo = null;
					//SITUACIÓN, ESTATUS EMPLEADO Y MOTIVO
					if (!empty($_POST["situacion"])) {
						$situacion_array = array("ALTA", "BAJA", "PRESTADOR_DE_SERVICIOS");
						if (in_array($_POST["situacion"], $situacion_array)) {
							if($_POST["situacion"] == "ALTA"){
								$estatus_array = array("NUEVO INGRESO", "REINGRESO");
								if (in_array($_POST["estatus_empleado"], $estatus_array)) {
									$situacion = $_POST["situacion"];
									$estatus_empleado = $_POST["estatus_empleado"];
									$motivo = null;
								}else if(empty($_POST["estatus_empleado"])){
									die(json_encode(array("error", "El campo estatus del empleado es requerido")));
								}else{
									die(json_encode(array("error", "El valor escogido en el dropdown estatus del empleado está modificado, por favor, vuelva a poner el valor original en el dropdown")));
								}
							}else if ($_POST["situacion"] == "BAJA") {
								$estatus_array = array("FALLECIMIENTO", "ABANDONO_DE_TRABAJO", "RENUNCIA_VOLUNTARIA", "LIQUIDACION");
								if (in_array($_POST["estatus_empleado"], $estatus_array)) {
									$estatus_empleado = $_POST["estatus_empleado"];
									if ($estatus_empleado == "ABANDONO_DE_TRABAJO" || $estatus_empleado == "RENUNCIA_VOLUNTARIA" || $estatus_empleado == "LIQUIDACION") {
										if (empty($_POST["motivo_estatus"])) {
											die(json_encode(array("error", "El campo motivo del estatus es requerido")));
										} else {
											if (!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_estatus"])) {
												die(json_encode(array("error", "Solo se permiten caracteres alfabéticos y espacios en el motivo del estatus")));
											} else {
												// Verificar que el campo numero_baja sea numérico y requerido
												if (!empty($_POST["numero_baja"]) && is_numeric($_POST["numero_baja"])) {
													$numero_baja = $_POST["numero_baja"];
												} else {
													die(json_encode(array("error", "El campo número de baja es requerido y debe ser numérico")));
												}

												$situacion = $_POST["situacion"];
												$motivo = $_POST["motivo_estatus"];
											}
										}
									} else {
										// Verificar que el campo numero_baja sea numérico y requerido
										if (!empty($_POST["numero_baja"]) && is_numeric($_POST["numero_baja"])) {
											$numero_baja = $_POST["numero_baja"];
										} else {
											die(json_encode(array("error", "El campo número de baja es requerido y debe ser numérico")));
										}
										$situacion = $_POST["situacion"];
										$estatus_empleado = $_POST["estatus_empleado"];
										$motivo = null;
									}
								} elseif (empty($_POST["estatus_empleado"])) {
									die(json_encode(array("error", "El campo estatus del empleado es requerido")));
								} else {
									die(json_encode(array("error", "El valor escogido en el dropdown estatus del empleado está modificado, por favor, vuelva a poner el valor original en el dropdown")));
								}
							}else if($_POST["situacion"] == "PRESTADOR_DE_SERVICIOS"){
								$estatus_array = array("FIJO", "ESQUEMA_DE_PAGO");
								if (in_array($_POST["estatus_empleado"], $estatus_array)) {
									if($_POST["estatus_empleado"] == "FIJO"){
										if(empty($_POST["motivo_estatus"])){
											die(json_encode(array("error", "El campo motivo del estatus es requerido")));
										}else{
											if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_estatus"])){
												die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del estatus")));
											}else{
												if (!empty($_POST["fijo_mensual"]) && is_numeric($_POST["fijo_mensual"])) {
													$fijo_mensual = $_POST["fijo_mensual"];
												} else {
													die(json_encode(array("error", "El campo de cantidad mensual en el estatus es requerido y debe ser numérico")));
												}
											
												$situacion = $_POST["situacion"];
												$estatus_empleado = $_POST["estatus_empleado"];
												$motivo = $_POST["motivo_estatus"];
											}
										}
									}else{
										if(empty($_POST["motivo_estatus"])){
											die(json_encode(array("error", "El campo motivo del estatus es requerido")));
										}else{
											if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_estatus"])){
												die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del estatus")));
											}else{
												if (!empty($_POST["tipo_esquema"])) {
													$tipo_esquema = $_POST["tipo_esquema"];
												} else {
													die(json_encode(array("error", "El campo de tipo de esquema en el estatus es requerido")));
												}				
												$situacion = $_POST["situacion"];
												$estatus_empleado = $_POST["estatus_empleado"];
												$motivo = $_POST["motivo_estatus"];
											}
										}
									}
								}else if(empty($_POST["estatus_empleado"])){
									die(json_encode(array("error", "El campo estatus del empleado es requerido")));
								}else{
									die(json_encode(array("error", "El valor escogido en el dropdown estatus del empleado está modificado, por favor, vuelva a poner el valor original en el dropdown")));
								}
							}
						}else if(empty($_POST["situacion"])){
							die(json_encode(array("error", "El campo situación del empleado es requerido")));
						}else{
							die(json_encode(array("error", "El valor escogido en el dropdown situación empleado está modificado, por favor, vuelva a poner el valor original en el dropdown")));
						}
						//FECHA DEL ESTATUS
						if(empty($_POST["estatus_fecha"])){
							$estatus_fecha = null;
						}else{
							if(!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $_POST["estatus_fecha"])){
								die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de estatus")));
							}else{
								$estatus_fecha = $_POST["estatus_fecha"];
							}
						}
					}
					//Instancia del estatus
					Expedientes::Estatus_expediente($_POST["id_expediente"], $situacion, $estatus_empleado, $estatus_fecha, $numero_baja, $fijo_mensual, $tipo_esquema, $motivo);
					//Cuando termine, envía al usuario la notificación de que el proceso fue un éxito
					die(json_encode(array("success", "Se han guardado los datos generales del expediente")));
				break;
			}
		}else{
			die(json_encode(array("error", "Faltan variables requeridas en la solicitud.")));
		}

	/**
	 * !   ██████   █████  ████████  ██████  ███████  █████  
	 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
	 * !   ██   ██ ███████    ██    ██    ██ ███████ ███████ 
	 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
	 * !   ██████  ██   ██    ██     ██████  ███████ ██   ██                                                       
	*/

	}else if($_POST["pestaña"] == "DatosA"){
		//El usuario debe proporcionar los datos correspondientes a la pestaña; si falta algún dato, la operación no se llevará a cabo
		if(isset($_POST["select2"], $_POST["select2text"], $_POST["numeroreferenciaslab"], $_POST["fechauniforme"], $_POST["cantidadpolo"], $_POST["tallapolo"], 
		$_POST["emergencianom"], $_POST["emergenciaapat"], $_POST["emergenciaamat"], $_POST["emergenciarelacion"], $_POST["emergenciatelefono"], $_POST["emergencianom2"], 
		$_POST["emergenciaapat2"], $_POST["emergenciaamat2"], $_POST["emergenciarelacion2"], $_POST["emergenciatelefono2"], $_POST["capacitacion"], $_POST["antidoping"], 
		$_POST["tipo_sangre"], $_POST["vacante"], $_POST["radio2"], $_POST["nomfam"], $_POST["apellidopatfam"], $_POST["apellidomatfam"])){
			
			/*
			=============================================
			EMPIEZA LA VALIDACIÓN DE LOS DATOS ADICIONALES
			=============================================
			*/

			if ($_POST["method"] == "store") {
				$check_form_exist = $crud -> readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_POST["select2"]]);
				
				if($check_form_exist['count'] > 0){
					if (isset($_SESSION['expediente_id'])) {
						if($_SESSION['expediente_id'] !== $_POST['select2']){
							die(json_encode(array("error", "No puedes modificar la asignación de usuarios una vez guardado el expediente.")));
						}else{
							$select2 = $_POST['select2'];
						}
					}	
				}else{
					//SELECT2 - El select2 trae a todos los usuarios de la base de datos y verifica que el usuario no haya modificado el id del usuario o el texto
					if($_POST["select2"] != null){
						//Traeme todos los usuarios de la base de datos y haz un FETCH_KEY_PAIR. FETCH_KEY_PAIR convierte los resultados de una consulta en un arreglo, utilizando el ID como clave y el nombre como valor
						$select2_content = $crud->readWithJoinsAndCount('usuarios', 'usuarios.id AS userid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre', 'INNER JOIN roles ON roles.id = usuarios.roles_id', 'WHERE roles.nombre NOT IN (:val1, :val2, :val3, :val4) AND NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id = expedientes.users_id)', [':val1' => 'Superadministrador', ':val2' => 'Administrador', ':val3' => 'Director general', ':val4' => 'Usuario externo'], PDO::FETCH_KEY_PAIR);
					
						//En este código, primero usamos array_keys($select2_content['data']) para obtener un arreglo de los IDs de usuarios y luego verificamos si $_POST["select2"] está en ese arreglo con in_array.
						if (in_array($_POST["select2"], array_keys($select2_content['data']))) {
							// Guarda el valor correspondiente al ID seleccionado en el arreglo en una variable en este caso $array_key_value
							$array_key_value = $select2_content['data'][$_POST["select2"]];
							// Verifica si la variable existe y si su valor coincide con la opción seleccionada en el arreglo
							if (isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value) {
								$select2 = $_POST["select2"];
							}else{
								//Si el usuario ha modificado el texto en el 'select2' y este valor no coincide con ningún usuario en la base de datos, retorna.
								die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
							}
						}else{
							//Si el usuario ha modificado el id en el 'select2' y este id no coincide con ningún usuario en la base de datos, retorna.
							die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
						}
					}else{
						//Si el usuario no seleccionó nada, retorna.
						die(json_encode(array("error", "Debe asignar un usuario al expediente")));
					}
				}
			}else if($_POST["method"] == "edit"){
				//SELECT2 - El select2 trae a todos los usuarios de la base de datos y verifica que el usuario no haya modificado el id del usuario o el texto
				if($_POST["select2"] != null){
					//Traeme todos los usuarios de la base de datos y haz un FETCH_KEY_PAIR. FETCH_KEY_PAIR convierte los resultados de una consulta en un arreglo, utilizando el ID como clave y el nombre como valor
					$select2_content = $crud->readWithJoinsAndCount('usuarios', 'usuarios.id AS userid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre', 'INNER JOIN roles ON roles.id = usuarios.roles_id', 'WHERE roles.nombre NOT IN (:val1, :val2, :val3, :val4) AND ((NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id = expedientes.users_id)) OR usuarios.id = :editUserId)', [':val1' => 'Superadministrador', ':val2' => 'Administrador', ':val3' => 'Director general', ':val4' => 'Usuario externo', ':editUserId' => $_POST['select2']], PDO::FETCH_KEY_PAIR);
				
					//En este código, primero usamos array_keys($select2_content['data']) para obtener un arreglo de los IDs de usuarios y luego verificamos si $_POST["select2"] está en ese arreglo con in_array.
					if (in_array($_POST["select2"], array_keys($select2_content['data']))) {
						// Guarda el valor correspondiente al ID seleccionado en el arreglo en una variable en este caso $array_key_value
						$array_key_value = $select2_content['data'][$_POST["select2"]];
						// Verifica si la variable existe y si su valor coincide con la opción seleccionada en el arreglo
						if (isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value) {
							$select2 = $_POST["select2"];
						}else{
							//Si el usuario ha modificado el texto en el 'select2' y este valor no coincide con ningún usuario en la base de datos, retorna.
							die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
						}
					}else{
						//Si el usuario ha modificado el id en el 'select2' y este id no coincide con ningún usuario en la base de datos, retorna.
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
					}
				}else{
					//Si el usuario no seleccionó nada, retorna.
					die(json_encode(array("error", "Debe asignar un usuario al expediente")));
				}
			}

			// Comprueba si el campo "numeroreferenciaslab" no está vacío
			if (!empty($_POST["numeroreferenciaslab"])) {
				// Valida que "numeroreferenciaslab" sea un solo dígito y un número
				if (preg_match("/^\d$/", $_POST["numeroreferenciaslab"])) {
					// Decodifica el JSON en un arreglo asociativo
					$referencias_decoded = json_decode($_POST["referencias"], true);
			
					// Verifica que el número de referencias coincida con la cantidad real
					if (is_array($referencias_decoded) && count($referencias_decoded) == $_POST["numeroreferenciaslab"]) {
						$referencias_contador = 1;
						//Recorremos el arreglo
						foreach ($referencias_decoded as &$referencia_laboral) {
							//Checa que los campos no estén vacios
							if (empty($referencia_laboral["nombre"]) || empty($referencia_laboral["apellidopat"]) || empty($referencia_laboral["apellidomat"]) || empty($referencia_laboral["relacion"]) || empty($referencia_laboral["telefono"])) {
								die(json_encode(array("error", "Existen campos vacíos en las referencias laborales, por favor, verifique la información")));
							} else {
								//validaciones
								if (!preg_match("/^[\pL\s'-]+$/u", $referencia_laboral["nombre"])) {
									die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia laboral " . $referencias_contador)));
								} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidopat"])) {
									die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia laboral " . $referencias_contador)));
								} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidomat"])) {
									die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia laboral " . $referencias_contador)));
								} else if (!preg_match("/^\d{10}$/", $referencia_laboral["telefono"])) {
									die(json_encode(array("error", "El teléfono de la referencia laboral " . $referencias_contador . " debe tener exactamente 10 dígitos")));
								}
							}
							// Aplicamos mb_strtoupper a los valores de cadena
							//Le quitamos los acentos
							$referencia_laboral["nombre"] = mb_strtoupper(quitarAcentos($referencia_laboral["nombre"], 'UTF-8'));
							$referencia_laboral["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidopat"], 'UTF-8'));
							$referencia_laboral["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidomat"], 'UTF-8'));

							$referencias_contador++;
						}
						// Asigna el valor de "referencias" después de validar
						$referencias = json_encode($referencias_decoded); // Convierte el arreglo de vuelta a JSON
					} else {
						die(json_encode(array("error", "El número de referencias laborales ingresado no coincide con el enviado, por favor, verifique la información")));
					}
				} else {
					die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
				}
			} else {
				// Asigna "null" si "numeroreferenciaslab" está vacío
				$referencias = null;
			}

			// FECHA DE ENTREGA DE UNIFORME
			//Checa si la fecha de uniforme está vacía
			if (empty($_POST["fechauniforme"])) {
				$fechauniforme = null;
			} else {
				// Reemplaza las barras oblicuas por guiones
				$_POST["fechauniforme"] = str_replace('/', '-', $_POST["fechauniforme"]);
			
				if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechauniforme"])) {
					// Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
					die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de uniforme")));
				} else {
					$check_fechauniforme = validateDate($_POST["fechauniforme"], 'Y-m-d');
			
					// Verifica si la fecha de uniforme es inválida
					if (!$check_fechauniforme) {
						die(json_encode(array("error", "La fecha de uniforme es inválida")));
					}
			
					$fechauniforme = $_POST["fechauniforme"];
				}
			}

			//CANTIDAD POLO
			//Checa si el campo cantidad polo está vacío
			if(empty($_POST["cantidadpolo"])){
				$cantidadpolo = null;
			}else{
				//Checa si la cantidad polo tiene el formato adecuado
				if(!preg_match("/^[0-9]*$/", $_POST["cantidadpolo"])){
					die(json_encode(array("error", "Solo se permiten números en el campo de cantidad polo")));
				}else{
					$cantidadpolo = $_POST["cantidadpolo"];
				}
			}

			// TALLA CAMISA
			//Crea un arreglo con todas las opciones correspondientes en el HTML
			$tallacamisa_array = array("XS", "S", "M", "L", "XL", "XXL", "XXXL");

			// Verifica si el valor de "tallapolo" se encuentra en el array de opciones de talla camisa
			if (in_array($_POST["tallapolo"], $tallacamisa_array)) {
				$tallapolo = $_POST["tallapolo"];
			} else if (empty($_POST["tallapolo"])) {
				// Si "tallapolo" está vacío, asigna un valor nulo a "tallapolo"
				$tallapolo = null;
			} else {
				// Si "tallapolo" no coincide con las opciones originales, muestra un error
				die(json_encode(array("error", "El valor escogido en el dropdown de talla camisa está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}
			
			// CONTACTOS DE EMERGENCIA

			//Nombre del primer contacto de emergencia
			//Checa si el nombre del primer contacto está vacío
			if(empty($_POST["emergencianom"])){
				$emergencianom = null;
			}else{
				//Checa si el nombre del primer contacto tiene el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del primer contacto")));
				}else{
					$emergencianom = $_POST["emergencianom"];
					//Conviertelo en mayúsculas
					$emergencianom = mb_strtoupper($emergencianom, 'UTF-8');
					//Quitale los acentos
					$emergencianom = quitarAcentos($emergencianom);
				}
			}

			//Apellido paterno del primer contacto de emergencia
			//Checa si el apellido paterno está vacío
			if(empty($_POST["emergenciaapat"])){
				$emergenciaapat = null;
			}else{
				//Checa si el apellido paterno del primer contacto tiene el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del primer contacto")));
				}else{
					$emergenciaapat = $_POST["emergenciaapat"];
					//Conviertelo en mayúsculas
					$emergenciaapat = mb_strtoupper($emergenciaapat, 'UTF-8');
					//Quitale los acentos
					$emergenciaapat = quitarAcentos($emergenciaapat);
				}
			}

			//Apellido materno del primer contacto de emergencia
			//Checa si el apellido materno del primer contacto está vacío
			if(empty($_POST["emergenciaamat"])){
				$emergenciaamat = null;
			}else{
				//Checa si el apellido materno del primer contacto tiene el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el primer contacto")));
				}else{
					$emergenciaamat = $_POST["emergenciaamat"];
					//Conviertelo en mayúsculas
					$emergenciaamat = mb_strtoupper($emergenciaamat, 'UTF-8');
					//Quitale los acentos
					$emergenciaamat = quitarAcentos($emergenciaamat);
				}
			}

			// Relación
			if (empty($_POST["emergenciarelacion"])) {
				$emergenciarelacion = null;
			} else {
				$emergenciarelacion = $_POST["emergenciarelacion"];
			}
			// Teléfono
			//Checa si el teléfono del primer contacto está vacío
			if(empty($_POST["emergenciatelefono"])){
				$emergenciatelefono = null;
			}else{
				// Validar que el teléfono de emergencia del primer contacto solo contenga números
				if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono"])){
					die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del primer contacto")));
				}else if(strlen($_POST["emergenciatelefono"]) != 10){
					// Asegurarse de que el teléfono de emergencia del primer contacto tenga exactamente 10 caracteres
					die(json_encode(array("error", "El teléfono de emergencia del primer contacto debe tener exactamente 10 caracteres")));
				}else{
					$emergenciatelefono = $_POST["emergenciatelefono"];
				}
			}

			//Nombre del segundo contacto de emergencia
			//Checa si el nombre del segundo contacto está vacío
			if(empty($_POST["emergencianom2"])){
				$emergencianom2 = null;
			}else{
				//Checa si el nombre del segundo contacto tiene el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom2"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del segundo contacto")));
				}else{
					$emergencianom2 = $_POST["emergencianom2"];
					//Conviertelo en mayúsculas
					$emergencianom2 = mb_strtoupper($emergencianom2, 'UTF-8');
					//Quitale los acentos
					$emergencianom2 = quitarAcentos($emergencianom2);
				}
			}

			//Apellido paterno del segundo contacto de emergencia
			//Checa si el apellido paterno del segundo contacto está vacío
			if(empty($_POST["emergenciaapat2"])){
				$emergenciaapat2 = null;
			}else{
				//Checa si el apellido paterno del segundo contacto tiene el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat2"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del segundo contacto")));
				}else{
					$emergenciaapat2 = $_POST["emergenciaapat2"];
					//Conviertelo en mayúsculas
					$emergenciaapat2 = mb_strtoupper($emergenciaapat2, 'UTF-8');
					//Quitale los acentos
					$emergenciaapat2 = quitarAcentos($emergenciaapat2);
				}
			}

			//Apellido materno del segundo contacto de emergencia
			//Checa si el apellido materno del segundo contacto está vacío
			if(empty($_POST["emergenciaamat2"])){
				$emergenciaamat2 = null;
			}else{
				//Checa si el apellido materno del segundo contacto tiene el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat2"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el segundo contacto")));
				}else{
					$emergenciaamat2 = $_POST["emergenciaamat2"];
					//Conviertelo en mayúsculas
					$emergenciaamat2 = mb_strtoupper($emergenciaamat2, 'UTF-8');
					//Quitale los acentos
					$emergenciaamat2 = quitarAcentos($emergenciaamat2);
				}
			}

			// Relación
			$emergenciarelacion2 = $_POST["emergenciarelacion2"];
 			if (empty($_POST["emergenciarelacion2"])) {
				// Si "emergenciarelacion2" está vacío, asigna un valor nulo a "emergenciarelacion2"
				$emergenciarelacion2 = null;
			} 

			// Teléfono
			//Checa si el teléfono del segundo contacto está vacío
			if(empty($_POST["emergenciatelefono2"])){
				$emergenciatelefono2 = null;
			}else{
				// Validar que el teléfono de emergencia del segundo contacto solo contenga números
				if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono2"])){
					die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del segundo contacto")));
				}else if(strlen($_POST["emergenciatelefono2"]) != 10){
					// Asegurarse de que el teléfono de emergencia del segundo contacto tenga exactamente 10 caracteres
					die(json_encode(array("error", "El teléfono de emergencia del segundo contacto debe tener exactamente 10 caracteres")));
				}else{
					$emergenciatelefono2 = $_POST["emergenciatelefono2"];
				}
			}

			// CAPACITACIÓN
			//Crea un arreglo con todas las opciones correspondientes en el HTML
			$capacitacion_array = array("SI", "NO", "S", "M", "L", "XL", "XXL", "XXXL");

			// Verifica si el valor de "capacitacion" se encuentra en el array de opciones de capacitacion
			if (in_array($_POST["capacitacion"], $capacitacion_array)) {
				$capacitacion = $_POST["capacitacion"];
			} else if (empty($_POST["capacitacion"])) {
				// Si "capacitacion" está vacío, asigna un valor nulo a "capacitacion"
				$capacitacion = null;
			} else {
				// Si "capacitacion" no coincide con las opciones originales, muestra un error
				die(json_encode(array("error", "El valor escogido en el dropdown de capacitación está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}

			// RESULTADO ANTIDOPING
			//Crea un arreglo con todas las opciones correspondientes en el HTML
			$antidoping_array = array("POSITIVO", "NEGATIVO", "NO APLICA");

			// Verifica si el valor de "antidoping" se encuentra en el array de opciones de antidoping
			if (in_array($_POST["antidoping"], $antidoping_array)) {
				$antidoping = $_POST["antidoping"];
			} else if (empty($_POST["antidoping"])) {
				// Si "antidoping" está vacío, asigna un valor nulo a "antidoping"
				$antidoping = null;
			} else {
				// Si "antidoping" no coincide con las opciones originales, muestra un error
				die(json_encode(array("error", "El valor escogido en el dropdown de resultado antidoping está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}

			// TIPO DE SANGRE
			//Crea un arreglo con todas las opciones correspondientes en el HTML
			$tiposangre_array = array("A_POSITIVO", "A_NEGATIVO", "B_POSITIVO", "B_NEGATIVO", "AB_POSITIVO", "AB_NEGATIVO", "O_POSITIVO", "O_NEGATIVO");

			// Verifica si el valor de "tipo_sangre" se encuentra en el array de opciones de tipo de sangre
			if (in_array($_POST["tipo_sangre"], $tiposangre_array)) {
				$tipo_sangre = $_POST["tipo_sangre"];
			} else if (empty($_POST["tipo_sangre"])) {
				// Si "tipo_sangre" está vacío, asigna un valor nulo a "tipo_sangre"
				$tipo_sangre = null;
			} else {
				// Si "tipo_sangre" no coincide con las opciones originales, muestra un error
				die(json_encode(array("error", "El valor escogido en el dropdown de tipo de sangre está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}

			// ¿CÓMO SE ENTERO DE LA VACANTE?
			//Crea un arreglo con todas las opciones correspondientes en el HTML
			$vacante_array = array("PLATAFORMA LABORAL", "RECOMENDACION", "REDES SOCIALES", "AVISOS DE OCASION");

			// Verifica si el valor de "vacante" se encuentra en el array de opciones de los tipos de vacante
			if (in_array($_POST["vacante"], $vacante_array)) {
				$vacante = $_POST["vacante"];
			} else if (empty($_POST["vacante"])) {
				// Si "vacante" está vacío, asigna un valor nulo a "vacante"
				$vacante = null;
			} else {
				// Si "vacante" no coincide con las opciones originales, muestra un error
				die(json_encode(array("error", "El valor escogido en el dropdown de ¿cómo se entero de la vacante?, por favor, vuelva a poner el valor original en el dropdown")));
			}
			
			//¿TIENE FAMILIARES EN LA EMPRESA?
			// Verifica si la variable "radio2" es igual a "si"
			if($_POST["radio2"] == "si"){
				// Si es "si", continúa con las siguientes validaciones
				if(empty($_POST["nomfam"])){
					die(json_encode(array("error", "Por favor, ingrese el nombre del familiar que trabaja en la empresa")));
				} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nomfam"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre del familiar que trabaja en la empresa")));
				} else if(empty($_POST["apellidopatfam"])){
					die(json_encode(array("error", "Por favor, ingrese el apellido paterno del familiar que trabaja en la empresa")));
				} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidopatfam"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno del familiar que trabaja en la empresa")));
				} else if(empty($_POST["apellidomatfam"])){
					die(json_encode(array("error", "Por favor, ingrese el apellido materno del familiar que trabaja en la empresa")));
				} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidomatfam"])){
					die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno del familiar que trabaja en la empresa")));
				} else {
					// Si todas las validaciones son exitosas, asigna los valores a las variables correspondientes
					$radio2 = $_POST["radio2"];
					//Conviertelo en mayúsculas
					$radio2 = mb_strtoupper($radio2, 'UTF-8');
					//Quitale los acentos
					$radio2 = quitarAcentos($radio2);
					$nomfam = $_POST["nomfam"];
					//Conviertelo en mayúsculas
					$nomfam = mb_strtoupper($nomfam, 'UTF-8');
					//Quitale los acentos
					$nomfam = quitarAcentos($nomfam);
					$apellidopatfam = $_POST["apellidopatfam"];
					//Conviertelo en mayúsculas
					$apellidopatfam = mb_strtoupper($apellidopatfam, 'UTF-8');
					//Quitale los acentos
					$apellidopatfam = quitarAcentos($apellidopatfam);
					$apellidomatfam = $_POST["apellidomatfam"];
					//Conviertelo en mayúsculas
					$apellidomatfam = mb_strtoupper($apellidomatfam, 'UTF-8');
					//Quitale los acentos
					$apellidomatfam = quitarAcentos($apellidomatfam);
				}
			} else {
				// Si "radio2" no es igual a "si", asigna valores nulos a las variables correspondientes
				$radio2 = $_POST["radio2"];
				//Conviertelo en mayúsculas
				$radio2 = mb_strtoupper($radio2, 'UTF-8');
				//Quitale los acentos
				$radio2 = quitarAcentos($radio2);
				$nomfam = null;
				$apellidopatfam = null;
				$apellidomatfam = null;
			}

			/*
			=============================================
			TERMINA LA VALIDACIÓN DE LOS DATOS ADICIONALES
			=============================================
			*/

			//Debido a que PHP no acepta el request method PUT (Bueno si lo acepta pero solo acepta json) utilizamos una variable method que nos permite saber si necesitamos insertar o actualizar
			switch($_POST["method"]){
				//En este caso, voy a insertar un nuevo expediente en una tabla temporal en la base de datos usando la variable method con el valor store
				case "store":
					//Hago una instancia de la clase y le envío las variables en la clase
					$expediente = new Expedientes($select2, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $referencias, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaapat, $emergenciaamat, $emergenciarelacion, $emergenciatelefono, $emergencianom2, $emergenciaapat2, $emergenciaamat2, $emergenciarelacion2, $emergenciatelefono2, $capacitacion, $antidoping, $tipo_sangre, $vacante, $radio2, $nomfam, $apellidopatfam, $apellidomatfam, null);
					//Una vez que se hayan almacenado las variables, llama al metodo para crear el expediente temporal
					$expediente ->Crear_expediente_datosA();
					//Verifica si la sesión ya existe
					if (!(isset($_SESSION['expediente_id']))) {
						//Asigna una sesión del expediente enviado si la sesión no existe
						$_SESSION['expediente_id'] = $select2;
					}
					//Cuando termine, envía al usuario la notificación de que el proceso fue un éxito
					die(json_encode(array("success", "Se han guardado los datos adicionales del expediente")));
				break;
				//Este es la versión de editar expediente, su función sera duplicar los datos en la tabla temporal con un estatus diferente
				case "edit":
					//Hago una instancia de la clase y le envío las variables en la clase
					$expediente = new Expedientes($select2, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $referencias, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaapat, $emergenciaamat, $emergenciarelacion, $emergenciatelefono, $emergencianom2, $emergenciaapat2, $emergenciaamat2, $emergenciarelacion2, $emergenciatelefono2, $capacitacion, $antidoping, $tipo_sangre, $vacante, $radio2, $nomfam, $apellidopatfam, $apellidomatfam, null);
					//Una vez que se hayan almacenado las variables, llama al metodo correspondiente obviamente enviando el id del expediente
					$expediente ->Crear_expediente_datosA();
					//Cuando termine, envía al usuario la notificación de que el proceso fue un éxito
					die(json_encode(array("success", "Se han guardado los datos adicionales del expediente")));
				break;
			}
		}else{
			die(json_encode(array("error", "Faltan variables requeridas en la solicitud.")));
		}

	/**
	 * !   ██████   █████  ████████  ██████  ███████ ██████  
	 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
	 * !   ██   ██ ███████    ██    ██    ██ ███████ ██████  
	 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
	 * !   ██████  ██   ██    ██     ██████  ███████ ██████                                                        
	*/

	}else if($_POST["pestaña"] == "DatosB"){
		//El usuario debe proporcionar los datos correspondientes a la pestaña; si falta algún dato, la operación no se llevará a cabo
		if(isset($_POST["select2"], $_POST["select2text"], $_POST["numeroreferenciasban"], $_POST["banco_personal"], $_POST["cuenta_personal"], $_POST["clabe_personal"], 
		$_POST["plastico_personal"], $_POST["banco_nomina"], $_POST["cuenta_nomina"], $_POST["clabe_nomina"], $_POST["plastico"])){
			
			/*
			=============================================
			EMPIEZA LA VALIDACIÓN DE LOS DATOS BANCARIOS
			=============================================
			*/

			if ($_POST["method"] == "store") {
				$check_form_exist = $crud -> readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_POST["select2"]]);
				
				if($check_form_exist['count'] > 0){
					if (isset($_SESSION['expediente_id'])) {
						if($_SESSION['expediente_id'] !== $_POST['select2']){
							die(json_encode(array("error", "No puedes modificar la asignación de usuarios una vez guardado el expediente.")));
						}else{
							$select2 = $_POST['select2'];
						}
					}	
				}else{
					//SELECT2 - El select2 trae a todos los usuarios de la base de datos y verifica que el usuario no haya modificado el id del usuario o el texto
					if($_POST["select2"] != null){
						//Traeme todos los usuarios de la base de datos y haz un FETCH_KEY_PAIR. FETCH_KEY_PAIR convierte los resultados de una consulta en un arreglo, utilizando el ID como clave y el nombre como valor
						$select2_content = $crud->readWithJoinsAndCount('usuarios', 'usuarios.id AS userid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre', 'INNER JOIN roles ON roles.id = usuarios.roles_id', 'WHERE roles.nombre NOT IN (:val1, :val2, :val3, :val4) AND NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id = expedientes.users_id)', [':val1' => 'Superadministrador', ':val2' => 'Administrador', ':val3' => 'Director general', ':val4' => 'Usuario externo'], PDO::FETCH_KEY_PAIR);
					
						//En este código, primero usamos array_keys($select2_content['data']) para obtener un arreglo de los IDs de usuarios y luego verificamos si $_POST["select2"] está en ese arreglo con in_array.
						if (in_array($_POST["select2"], array_keys($select2_content['data']))) {
							// Guarda el valor correspondiente al ID seleccionado en el arreglo en una variable en este caso $array_key_value
							$array_key_value = $select2_content['data'][$_POST["select2"]];
							// Verifica si la variable existe y si su valor coincide con la opción seleccionada en el arreglo
							if (isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value) {
								$select2 = $_POST["select2"];
							}else{
								//Si el usuario ha modificado el texto en el 'select2' y este valor no coincide con ningún usuario en la base de datos, retorna.
								die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
							}
						}else{
							//Si el usuario ha modificado el id en el 'select2' y este id no coincide con ningún usuario en la base de datos, retorna.
							die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
						}
					}else{
						//Si el usuario no seleccionó nada, retorna.
						die(json_encode(array("error", "Debe asignar un usuario al expediente")));
					}
				}
			}else if($_POST["method"] == "edit"){
				//SELECT2 - El select2 trae a todos los usuarios de la base de datos y verifica que el usuario no haya modificado el id del usuario o el texto
				if($_POST["select2"] != null){
					//Traeme todos los usuarios de la base de datos y haz un FETCH_KEY_PAIR. FETCH_KEY_PAIR convierte los resultados de una consulta en un arreglo, utilizando el ID como clave y el nombre como valor
					$select2_content = $crud->readWithJoinsAndCount('usuarios', 'usuarios.id AS userid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre', 'INNER JOIN roles ON roles.id = usuarios.roles_id', 'WHERE roles.nombre NOT IN (:val1, :val2, :val3, :val4) AND ((NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id = expedientes.users_id)) OR usuarios.id = :editUserId)', [':val1' => 'Superadministrador', ':val2' => 'Administrador', ':val3' => 'Director general', ':val4' => 'Usuario externo', ':editUserId' => $_POST['select2']], PDO::FETCH_KEY_PAIR);
				
					//En este código, primero usamos array_keys($select2_content['data']) para obtener un arreglo de los IDs de usuarios y luego verificamos si $_POST["select2"] está en ese arreglo con in_array.
					if (in_array($_POST["select2"], array_keys($select2_content['data']))) {
						// Guarda el valor correspondiente al ID seleccionado en el arreglo en una variable en este caso $array_key_value
						$array_key_value = $select2_content['data'][$_POST["select2"]];
						// Verifica si la variable existe y si su valor coincide con la opción seleccionada en el arreglo
						if (isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value) {
							$select2 = $_POST["select2"];
						}else{
							//Si el usuario ha modificado el texto en el 'select2' y este valor no coincide con ningún usuario en la base de datos, retorna.
							die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
						}
					}else{
						//Si el usuario ha modificado el id en el 'select2' y este id no coincide con ningún usuario en la base de datos, retorna.
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
					}
				}else{
					//Si el usuario no seleccionó nada, retorna.
					die(json_encode(array("error", "Debe asignar un usuario al expediente")));
				}
			}

			//REFERENCIAS BANCARIAS
			// Comprueba si el campo "numeroreferenciasban" no está vacío
			if(!(empty($_POST["numeroreferenciasban"]))){
				// Valida que "numeroreferenciasban" sea un solo dígito y un número
				if(preg_match("/^\d$/", $_POST["numeroreferenciasban"])){
					// Decodifica el JSON en un arreglo asociativo
					$referenciasbancarias_decoded = json_decode($_POST["refbanc"], true);

					// Verifica que el número de referencias coincida con la cantidad real
					if (is_array($referenciasbancarias_decoded) && count($referenciasbancarias_decoded) == $_POST["numeroreferenciasban"]) {
						$referenciasban_contador = 1;
						//Recorremos el arreglo
						foreach ($referenciasbancarias_decoded as &$referencia_bancaria) {
							//Checa que los campos no estén vacíos
							if (empty($referencia_bancaria["nombre"]) || empty($referencia_bancaria["apellidopat"]) || empty($referencia_bancaria["apellidomat"]) || empty($referencia_bancaria["relacion"]) || empty($referencia_bancaria["rfc"]) || empty($referencia_bancaria["curp"]) || empty($referencia_bancaria["porcentaje"])) {
								die(json_encode(array("error", "Existen campos vacíos en las referencias bancarias, por favor, verifique la información")));
							}else{
								//Validaciones
								if (!preg_match("/^[\pL\s'-]+$/u", $referencia_bancaria["nombre"])) {
									die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia bancaria " . $referenciasban_contador)));
								} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidopat"])) {
									die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia bancaria " . $referenciasban_contador)));
								} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidomat"])) {
									die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia bancaria " . $referenciasban_contador)));
								} else if (!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $referencia_bancaria["rfc"])) {
									die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789 en el RFC de la referencia bancaria " . $referenciasban_contador)));
								} else if (!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $referencia_bancaria["curp"])) {
									die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR en el CURP de la referencia bancaria " . $referenciasban_contador)));
								} else if (!preg_match("/^[0-9]+$/", $referencia_bancaria["porcentaje"])) {
									die(json_encode(array("error", "El porcentaje de derecho de la referencia bancaria " . $referenciasban_contador . " debe ser númerico")));
								}
							}

							// Aplicamos mb_strtoupper a los valores de cadena
							//Le quitamos los acentos
							$referencia_bancaria["nombre"] = mb_strtoupper(quitarAcentos($referencia_bancaria["nombre"], 'UTF-8'));
							$referencia_bancaria["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidopat"], 'UTF-8'));
							$referencia_bancaria["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidomat"], 'UTF-8'));
							$referencia_bancaria["rfc"] = mb_strtoupper(quitarAcentos($referencia_bancaria["rfc"], 'UTF-8'));
							$referencia_bancaria["curp"] = mb_strtoupper(quitarAcentos($referencia_bancaria["curp"], 'UTF-8'));

							if($_POST["numeroreferenciasban"] == 1){
								$referencia_bancaria["porcentaje"] = 100;
							}else{
								$referencia_bancaria["porcentaje"] = 50;
							}

							$referenciasban_contador++;
						}
						// Asigna el valor de "refbanc" después de validar
						$refbanc = json_encode($referenciasbancarias_decoded); // Convierte el arreglo de vuelta a JSON
					} else {
						die(json_encode(array("error", "El número de referencias bancarias ingresado no coincide con el enviado, por favor, verifique la información")));
					}
				} else {
					die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
				}
			} else {
				// Asigna "null" si "numeroreferenciasban" está vacío
				$refbanc = null;
			}

			//CUENTA BANCARIA PERSONAL
			//Checa si el banco de la cuenta bancaria personal está vacío 
			if(empty($_POST["banco_personal"])){
				$banco_personal = null;
			}else{
				//Checa si el banco de la cuenta bancaria personal tiene el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_personal"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco de la cuenta personal")));
				}else{
					$banco_personal = $_POST["banco_personal"];
					//Conviertelo en mayúsculas
					$banco_personal = mb_strtoupper($banco_personal, 'UTF-8');
					//Quitale los acentos
					$banco_personal = quitarAcentos($banco_personal);
				}
			}

			//Checa si la cuenta de la cuenta bancaria personal está vacío 
			if(empty($_POST["cuenta_personal"])){
				$cuenta_personal = null;
			}else{
				//Checa si el banco de la cuenta bancaria personal tiene el formato adecuado
				if(!preg_match("/^\d{10}$/", $_POST["cuenta_personal"])){
					die(json_encode(array("error", "La cuenta bancaria personal debe contener exactamente 10 números")));
				}else{
					$cuenta_personal = $_POST["cuenta_personal"];
				}
			}

			//Checa si la clabe de la cuenta bancaria personal está vacío 
			if(empty($_POST["clabe_personal"])){
				$clabe_personal = null;
			}else{
				//Checa si la clabe de la cuenta bancaria personal tiene el formato adecuado
				if(!preg_match("/^\d{18}$/", $_POST["clabe_personal"])){
					die(json_encode(array("error", "La clabe bancaria personal debe contener exactamente 18 números")));
				}else{
					$clabe_personal = $_POST["clabe_personal"];
				}
			}

			//Checa si el plástico de la cuenta bancaria personal está vacío 
			if(empty($_POST["plastico_personal"])){
				$plastico_personal = null;
			}else{
				//Checa si el plástico de la cuenta bancaria personal tiene el formato adecuado
				if(!preg_match("/^\d{16}$/", $_POST["plastico_personal"])){
					die(json_encode(array("error", "El plástico de la cuenta bancaria personal debe contener exactamente 16 números")));
				}else{
					$plastico_personal = $_POST["plastico_personal"];
				}
			}

			//CUENTA BANCARIA NÓMINA
			//Checa si el banco de la cuenta bancaria nómina está vacío 
			if(empty($_POST["banco_nomina"])){
				$banco_nomina = null;
			}else{
				//Checa si el banco de la cuenta bancaria nómina tiene el formato adecuado
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_nomina"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco de la cuenta nómina")));
				}else{
					$banco_nomina = $_POST["banco_nomina"];
					//Conviertelo en mayúsculas
					$banco_nomina = mb_strtoupper($banco_nomina, 'UTF-8');
					//Quitale los acentos
					$banco_nomina = quitarAcentos($banco_nomina);
				}
			}

			//Checa si la cuenta de la cuenta bancaria nómina está vacío 
			if(empty($_POST["cuenta_nomina"])){
				$cuenta_nomina = null;
			}else{
				//Checa si el banco de la cuenta bancaria nómina tiene el formato adecuado
				if(!preg_match("/^\d{10}$/", $_POST["cuenta_nomina"])){
					die(json_encode(array("error", "La cuenta bancaria nómina debe contener exactamente 10 números")));
				}else{
					$cuenta_nomina = $_POST["cuenta_nomina"];
				}
			}

			//Checa si la clabe de la cuenta bancaria nómina está vacío 
			if(empty($_POST["clabe_nomina"])){
				$clabe_nomina = null;
			}else{
				//Checa si la clabe de la cuenta bancaria nómina tiene el formato adecuado
				if(!preg_match("/^\d{18}$/", $_POST["clabe_nomina"])){
					die(json_encode(array("error", "La clabe bancaria nómina debe contener exactamente 18 números")));
				}else{
					$clabe_nomina = $_POST["clabe_nomina"];
				}
			}

			//Checa si el plástico de la cuenta bancaria nómina está vacío 
			if(empty($_POST["plastico"])){
				$plastico = null;
			}else{
				//Checa si el plástico de la cuenta bancaria nómina tiene el formato adecuado
				if(!preg_match("/^\d{16}$/", $_POST["plastico"])){
					die(json_encode(array("error", "El plástico de la cuenta bancaria nómina debe contener exactamente 16 números")));
				}else{
					$plastico = $_POST["plastico"];
				}
			}

			/*
			=============================================
			TERMINA LA VALIDACIÓN DE LOS DATOS BANCARIOS
			=============================================
			*/

			//Debido a que PHP no acepta el request method PUT (Bueno si lo acepta pero solo acepta json) utilizamos una variable method que nos permite saber si necesitamos insertar o actualizar
			switch($_POST["method"]){
				//En este caso, voy a insertar un nuevo expediente en una tabla temporal en la base de datos usando la variable method con el valor store
				case "store":
					//Hago una instancia de la clase y le envío las variables en la clase
					$expediente = new Expedientes($select2, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,null, $refbanc, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico);
					//Una vez que se hayan almacenado las variables, llama al metodo para crear el expediente temporal
					$expediente ->Crear_expediente_datosB();
					//Verifica si la sesión ya existe
					if (!(isset($_SESSION['expediente_id']))) {
						//Asigna una sesión del expediente enviado si la sesión no existe
						$_SESSION['expediente_id'] = $select2;
					}
					//Cuando termine, envía al usuario la notificación de que el proceso fue un éxito
					die(json_encode(array("success", "Se han guardado los datos bancarios del expediente")));
				break;
				//Este es la versión de editar expediente, su función sera duplicar los datos en la tabla temporal con un estatus diferente
				case "edit":
					//Hago una instancia de la clase y le envío las variables en la clase
					$expediente = new Expedientes($select2, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null,null, $refbanc, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico);
					//Una vez que se hayan almacenado las variables, llama al metodo correspondiente y le mando el id del expediente
					$expediente ->Crear_expediente_datosB();
					//Cuando termine, envía al usuario la notificación de que el proceso fue un éxito
					die(json_encode(array("success", "Se han guardado los datos bancarios del expediente")));
				break;
			}
		}else{
			die(json_encode(array("error", "Faltan variables requeridas en la solicitud.")));
		}
	}
/**
 * *   ███████ ██   ██ ██████  ███████ ██████  ██ ███████ ███    ██ ████████ ███████ 
 * *   ██       ██ ██  ██   ██ ██      ██   ██ ██ ██      ████   ██    ██    ██      
 * *   █████     ███   ██████  █████   ██   ██ ██ █████   ██ ██  ██    ██    █████   
 * *   ██       ██ ██  ██      ██      ██   ██ ██ ██      ██  ██ ██    ██    ██      
 * *   ███████ ██   ██ ██      ███████ ██████  ██ ███████ ██   ████    ██    ███████                                                                                   
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "expediente"){

	//La variable method, solamente puede contener 2 valores: store y edit
	if (isset($_POST["method"]) && ($_POST["method"] != "store" && $_POST["method"] != "edit")) {
		// Mostrar un mensaje de error porque el valor de "method" no es válido.
		die(json_encode(array("error", "El valor de 'method' no es válido ó no existe")));
	}

	//Checa si el usuario tiene permiso para crear ó editar expedientes
	if($_POST["method"] == "store"){
		if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear expediente") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
			die(json_encode(array("forbidden", "No tiene permisos para realizar estas acciones")));
		}
	}else if($_POST["method"] == "edit"){
		if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Editar expediente") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
			die(json_encode(array("forbidden", "No tiene permisos para realizar estas acciones")));
		}       
	}

	//En el caso de editar, checa si el expediente aún existe
	if ($_POST["method"] == "edit") {
		// Verificar si la variable $_POST['id_expediente'] está definida
		if (!isset($_POST['id_expediente'])) {
			die(json_encode(array("error", "La variable idExpediente no está definida")));
		}
		$expediente_check = $crud->readWithCount('expedientes', '*', 'WHERE id = :expedienteid', [':expedienteid' => $_POST["id_expediente"]]);
		if ($expediente_check['count'] == 0) {
			die(json_encode(array("expediente_deleted", "Este expediente ya no existe!")));
		}
	}

	// Función para validar si una fecha es válida en el formato especificado
	function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}

	//Función que reemplaza caracteres acentuados por sus equivalentes sin acentos
	function quitarAcentos($texto) {
		$texto = str_replace(
			['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'],
			['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'],
			$texto
		);
		return $texto;
	}

	if (isset($_POST["select2"], $_POST["select2text"], $_POST["numero_expediente"], $_POST["numero_nomina"], $_POST["asistencia_empleado"], $_POST["puesto"], $_POST["estudios"], $_POST["posee_correo"], $_POST["correo_adicional"], $_POST["calle"], $_POST["ninterior"],
	$_POST["nexterior"], $_POST["colonia"], $_POST["estado"], $_POST["estadotext"], $_POST["municipio"], $_POST["municipiotext"], $_POST["codigo"], $_POST["teldom"], $_POST["posee_telmov"], $_POST["telmov"],
	$_POST["posee_telempresa"], $_POST["marcacion"], $_POST["serie"], $_POST["sim"], $_POST["numred"], $_POST["modelotel"], $_POST["marcatel"], $_POST["imei"], $_POST["posee_laptop"], $_POST["marca_laptop"],
	$_POST["modelo_laptop"], $_POST["serie_laptop"], $_POST["radio"], $_POST["ecivil"], $_POST["posee_retencion"], $_POST["monto_mensual"], $_POST["fechanac"], $_POST["fechacon"], $_POST["fechaalta"], 
	$_POST["salario_contrato"], $_POST["salario_fechaalta"], $_POST["observaciones"], $_POST["curp"], $_POST["nss"], $_POST["rfc"], $_POST["identificacion"], $_POST["numeroidentificacion"], 
	$_POST["numeroreferenciaslab"], $_POST["fechauniforme"], $_POST["cantidadpolo"], $_POST["tallapolo"], $_POST["emergencianom"], $_POST["emergenciaapat"], $_POST["emergenciaamat"], 
	$_POST["emergenciarelacion"], $_POST["emergenciatelefono"], $_POST["emergencianom2"], $_POST["emergenciaapat2"], $_POST["emergenciaamat2"], $_POST["emergenciarelacion2"], $_POST["emergenciatelefono2"], 
	$_POST["capacitacion"], $_POST["antidoping"], $_POST["tipo_sangre"], $_POST["vacante"], $_POST["radio2"], $_POST["nomfam"], $_POST["apellidopatfam"], $_POST["apellidomatfam"], 
	$_POST["numeroreferenciasban"], $_POST["banco_personal"], $_POST["cuenta_personal"], $_POST["clabe_personal"], $_POST["plastico_personal"], $_POST["banco_nomina"], $_POST["cuenta_nomina"], 
	$_POST["clabe_nomina"], $_POST["plastico"])){

		/**
		 * !   ██████   █████  ████████  ██████  ███████  ██████  
		 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██       
		 * !   ██   ██ ███████    ██    ██    ██ ███████ ██   ███ 
		 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██    ██ 
		 * !   ██████  ██   ██    ██     ██████  ███████  ██████                                                        
		*/

		/*
		=============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS GENERALES
		=============================================
		*/

		if ($_POST["method"] == "store") {
			$check_form_exist = $crud -> readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_POST["select2"]]);
			
			if($check_form_exist['count'] > 0){
				if (isset($_SESSION['expediente_id'])) {
					if($_SESSION['expediente_id'] !== $_POST['select2']){
						die(json_encode(array("error", "No puedes modificar la asignación de usuarios una vez guardado el expediente.")));
					}else{
						$select2 = $_POST['select2'];
					}
				}	
			}else{
				//SELECT2 - El select2 trae a todos los usuarios de la base de datos y verifica que el usuario no haya modificado el id del usuario o el texto
				if($_POST["select2"] != null){
					//Traeme todos los usuarios de la base de datos y haz un FETCH_KEY_PAIR. FETCH_KEY_PAIR convierte los resultados de una consulta en un arreglo, utilizando el ID como clave y el nombre como valor
					$select2_content = $crud->readWithJoinsAndCount('usuarios', 'usuarios.id AS userid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre', 'INNER JOIN roles ON roles.id = usuarios.roles_id', 'WHERE roles.nombre NOT IN (:val1, :val2, :val3, :val4) AND NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id = expedientes.users_id)', [':val1' => 'Superadministrador', ':val2' => 'Administrador', ':val3' => 'Director general', ':val4' => 'Usuario externo'], PDO::FETCH_KEY_PAIR);
				
					//En este código, primero usamos array_keys($select2_content['data']) para obtener un arreglo de los IDs de usuarios y luego verificamos si $_POST["select2"] está en ese arreglo con in_array.
					if (in_array($_POST["select2"], array_keys($select2_content['data']))) {
						// Guarda el valor correspondiente al ID seleccionado en el arreglo en una variable en este caso $array_key_value
						$array_key_value = $select2_content['data'][$_POST["select2"]];
						// Verifica si la variable existe y si su valor coincide con la opción seleccionada en el arreglo
						if (isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value) {
							$select2 = $_POST["select2"];
						}else{
							//Si el usuario ha modificado el texto en el 'select2' y este valor no coincide con ningún usuario en la base de datos, retorna.
							die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
						}
					}else{
						//Si el usuario ha modificado el id en el 'select2' y este id no coincide con ningún usuario en la base de datos, retorna.
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
					}
				}else{
					//Si el usuario no seleccionó nada, retorna.
					die(json_encode(array("error", "Debe asignar un usuario al expediente")));
				}
			}
		}else if($_POST["method"] == "edit"){
			//SELECT2 - El select2 trae a todos los usuarios de la base de datos y verifica que el usuario no haya modificado el id del usuario o el texto
			if($_POST["select2"] != null){
				//Traeme todos los usuarios de la base de datos y haz un FETCH_KEY_PAIR. FETCH_KEY_PAIR convierte los resultados de una consulta en un arreglo, utilizando el ID como clave y el nombre como valor
				$select2_content = $crud->readWithJoinsAndCount('usuarios', 'usuarios.id AS userid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre', 'INNER JOIN roles ON roles.id = usuarios.roles_id', 'WHERE roles.nombre NOT IN (:val1, :val2, :val3, :val4) AND ((NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id = expedientes.users_id)) OR usuarios.id = :editUserId)', [':val1' => 'Superadministrador', ':val2' => 'Administrador', ':val3' => 'Director general', ':val4' => 'Usuario externo', ':editUserId' => $_POST['select2']], PDO::FETCH_KEY_PAIR);
			
				//En este código, primero usamos array_keys($select2_content['data']) para obtener un arreglo de los IDs de usuarios y luego verificamos si $_POST["select2"] está en ese arreglo con in_array.
				if (in_array($_POST["select2"], array_keys($select2_content['data']))) {
					// Guarda el valor correspondiente al ID seleccionado en el arreglo en una variable en este caso $array_key_value
					$array_key_value = $select2_content['data'][$_POST["select2"]];
					// Verifica si la variable existe y si su valor coincide con la opción seleccionada en el arreglo
					if (isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value) {
						$select2 = $_POST["select2"];
					}else{
						//Si el usuario ha modificado el texto en el 'select2' y este valor no coincide con ningún usuario en la base de datos, retorna.
						die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
					}
				}else{
					//Si el usuario ha modificado el id en el 'select2' y este id no coincide con ningún usuario en la base de datos, retorna.
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
				}
			}else{
				//Si el usuario no seleccionó nada, retorna.
				die(json_encode(array("error", "Debe asignar un usuario al expediente")));
			}
		}

		//NUM DE EXPEDIENTE
		//Checa si el numero de expediente no está vacío, en caso que si lo esté, nullifica la variable
		if(empty($_POST["numero_expediente"])){
			$numero_expediente = null;
		//PREG_MATCH - Función de php que verifica si el usuario escribió el número de expediente correctamente - F de foráneo y L de local seguido de un guión y al final números
		}else if(!preg_match("/^([FL]){1}-([0-9])+$/", $_POST["numero_expediente"])){
			die(json_encode(array("error", "Por favor, escriba el número de expediente en el formato correcto")));
		}else{
			//Checa si el número de expediente no está repetido
			if($_POST["method"] == "store"){
				if($check_form_exist['count'] > 0){
					$fetch_form = $check_form_exist['data'][0];
					if($fetch_form["numero_expediente"] !== $_POST['numero_expediente']){
						$query = $crud->readWithCount('expedientes', 'numero_expediente', 'WHERE numero_expediente = :expedientenum', [':expedientenum' => $_POST["numero_expediente"]]);
						if($query['count'] > 0){
							die(json_encode(array("error", "Este número de expediente ya existe, por favor, escriba otro")));
						}
					}
				}else{
					$query = $crud->readWithCount('expedientes', 'numero_expediente', 'WHERE numero_expediente = :expedientenum', [':expedientenum' => $_POST["numero_expediente"]]);
					if($query['count'] > 0){
						die(json_encode(array("error", "Este número de expediente ya existe, por favor, escriba otro")));
					}		
				}		
			}else if($_POST["method"] == "edit"){
				$query = $crud->readWithCount('expedientes', 'numero_expediente', 'WHERE numero_expediente = :expedientenum AND id != :idexpediente', [':expedientenum' => $_POST["numero_expediente"], ':idexpediente' => $_POST["id_expediente"]]);
				if($query['count'] > 0){
					die(json_encode(array("error", "Este número de expediente ya existe, por favor, escriba otro")));
				}
			}	
			$numero_expediente = $_POST["numero_expediente"];
		}

		//NUM DE NÓMINA
		//Checa si el numero de nómina no está vacío, en caso que si lo esté, nullifica la variable
		if(empty($_POST["numero_nomina"])){
			$numero_nomina = null;
		}else{
			//Checa si el número de nómina no está repetido
			if($_POST["method"] == "store"){
				if($check_form_exist['count'] > 0){
					$fetch_form = $check_form_exist['data'][0];
					if($fetch_form["numero_nomina"] !== $_POST['numero_nomina']){
						$query = $crud->readWithCount('expedientes', 'numero_nomina', 'WHERE numero_nomina = :nominanum', [':nominanum' => $_POST["numero_nomina"]]);
						if($query['count'] > 0){
							die(json_encode(array("error", "Este número de nómina ya existe, por favor, escriba otro")));
						}
					}
				}else{
					$query = $crud->readWithCount('expedientes', 'numero_nomina', 'WHERE numero_nomina = :nominanum', [':nominanum' => $_POST["numero_nomina"]]);
					if($query['count'] > 0){
						die(json_encode(array("error", "Este número de nómina ya existe, por favor, escriba otro")));
					}		
				}		
			}else if($_POST["method"] == "edit"){
				$query = $crud->readWithCount('expedientes', 'numero_nomina', 'WHERE numero_nomina = :nominanum AND id != :idexpediente', [':nominanum' => $_POST["numero_nomina"], ':idexpediente' => $_POST["id_expediente"]]);
				if($query['count'] > 0){
					die(json_encode(array("error", "Este número de nómina ya existe, por favor, escriba otro")));
				}
			}	
			$numero_nomina = $_POST["numero_nomina"];
		}

		//NUM DE ASISTENCIA/NUM DE EMPLEADO
		//Checa si el numero de asistencia no está vacío, en caso que si lo esté, nullifica la variable
		if(empty($_POST["asistencia_empleado"])){
			$asistencia_empleado = null;
		}else{
			//Checa si el número de asistencia no está repetido
			if($_POST["method"] == "store"){
				if($check_form_exist['count'] > 0){
					$fetch_form = $check_form_exist['data'][0];
					if($fetch_form["numero_asistencia"] !== $_POST['asistencia_empleado']){
						$query = $crud->readWithCount('expedientes', 'numero_asistencia', 'WHERE numero_asistencia = :asistencianum', [':asistencianum' => $_POST["asistencia_empleado"]]);
						if($query['count'] > 0){
							die(json_encode(array("error", "Este número de asistencia/numempleado ya existe, por favor, escriba otro")));
						}
					}
				}else{
					$query = $crud->readWithCount('expedientes', 'numero_asistencia', 'WHERE numero_asistencia = :asistencianum', [':asistencianum' => $_POST["asistencia_empleado"]]);
					if($query['count'] > 0){
						die(json_encode(array("error", "Este número de asistencia/numempleado ya existe, por favor, escriba otro")));
					}		
				}		
			}else if($_POST["method"] == "edit"){
				$query = $crud->readWithCount('expedientes', 'numero_asistencia', 'WHERE numero_asistencia = :asistencianum AND id != :idexpediente', [':asistencianum' => $_POST["asistencia_empleado"], ':idexpediente' => $_POST["id_expediente"]]);
				if($query['count'] > 0){
					die(json_encode(array("error", "Este número de asistencia/numempleado ya existe, por favor, escriba otro")));
				}
			}	
			$asistencia_empleado = $_POST["asistencia_empleado"];
		}

		//PUESTO
		//Checa si el puesto está vacío, en caso que lo esté, nullifica la variable
		if(empty($_POST["puesto"])){
			$puesto = null;
		//Checa si el puesto tenga como mínimo 4 caracteres
		}else if(strlen($_POST["puesto"]) < 4){
			die(json_encode(array("error", "El puesto debe de contener 4 caracteres como mínimo")));
		//Checa si el puesto tenga como mínimo 4 caracteres
		}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["puesto"])){
			die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el puesto")));
		}else{
			$puesto = $_POST["puesto"];
			//Conviertelo en mayúsculas
			$puesto = mb_strtoupper($puesto, 'UTF-8');
			//Quitale los acentos
			$puesto = quitarAcentos($puesto);
		}

		//NIVEL DE ESTUDIOS
		//Este es un menú desplegable convencional, lo que significa que no es necesario revisar el texto, pero debemos verificar que el valor seleccionado coincida con los valores proporcionados en el HTML
		$nivelestudios_array = array("PRIMARIA", "SECUNDARIA", "BACHILLERATO", "CARRERA TECNICA", "LICENCIATURA", "ESPECIALIDAD", "MAESTRIA", "DOCTORADO");
		//Verifica si el valor seleccionado coincide con los valores que hay en el arreglo
		if (in_array($_POST["estudios"], $nivelestudios_array)) {
			$estudios = $_POST["estudios"];
		//Checa si el dropdown no está vacío
		}else if(empty($_POST["estudios"])){
			$estudios = null;
		}else{
			die(json_encode(array("error", "El valor escogido en el dropdown de nivel de estudios está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		//CORREO ELECTRÓNICO

		//¿Posee correo electrónico adicional? Comprueba si el usuario tiene un correo electrónico adicional
		if($_POST["posee_correo"] == "si"){
			//Checa si el correo está vacío
			if(empty($_POST["correo_adicional"])){
				die(json_encode(array("error", "Por favor, ingrese un correo adicional")));
				//Checa si el correo electrónico está bien escrito
			}else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo_adicional"])){
				die(json_encode(array("error", "Asegúrese que el texto ingresado en correo adicional este en formato de email")));
			}else{
				//Verifica si el correo no está repetido en la base de datos
				if($_POST["method"] == "store"){
					if($check_form_exist['count'] > 0){
						$fetch_form_correo = $check_form_exist['data'][0];
						if($fetch_form_correo["correo_adicional"] !== $_POST['correo_adicional']){
							$get_correo = $crud->readWithCount('expedientes', 'correo_adicional', 'WHERE correo_adicional = :correo UNION ALL SELECT correo FROM usuarios WHERE correo = :correo', [':correo' => $_POST["correo_adicional"]]);
							if($get_correo['count'] > 0){
								die(json_encode(array("error", "El correo adicional ingresado ya existe, por favor, escriba otro")));
							}
						}
					}else{
						$get_correo = $crud->readWithCount('expedientes', 'correo_adicional', 'WHERE correo_adicional = :correo UNION ALL SELECT correo FROM usuarios WHERE correo = :correo', [':correo' => $_POST["correo_adicional"]]);
						if($get_correo['count'] > 0){
							die(json_encode(array("error", "El correo adicional ingresado ya existe, por favor, escriba otro")));
						}		
					}
				}else if($_POST["method"] == "edit"){
					$get_correo = $crud->readWithCount('expedientes', 'correo_adicional', 'WHERE correo_adicional = :correo AND id != :idexpediente UNION ALL SELECT correo FROM usuarios WHERE correo = :correo', [':correo' => $_POST["correo_adicional"], 'idexpediente' => $_POST["id_expediente"]]);
					if($get_correo['count'] > 0){
						die(json_encode(array("error", "El correo adicional ingresado ya existe, por favor, escriba otro")));
					}
				}
				$posee_correo= $_POST["posee_correo"];
				//Conviertelo en mayúsculas
				$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
				//Quitale los acentos
				$posee_correo = quitarAcentos($posee_correo);
				//Los servidores de correo y los sistemas de correo electrónico generalmente son sensibles a los acentos en los caracteres. Esto significa que "mi.correo@gmail.com" y "mí.correo@gmail.com" se considerarían direcciones de correo electrónico distintas, lo mismo que las mayúsculas lo cual significa que aquí la regla de los acentos y mayúsculas no aplican en los correos
				$correo_adicional = $_POST["correo_adicional"];
			}
		}else{
			$posee_correo = $_POST["posee_correo"];
			//Conviertelo en mayúsculas
			$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
			//Quitale los acentos
			$posee_correo = quitarAcentos($posee_correo);
			//Si está vacío, nullificalo
			$correo_adicional = null;
		}

		//CALLE
		//Checa si el campo de la calle está vacío
		if(empty($_POST["calle"])){
			$calle = null;
		}else{
			//Verifica si el campo de la calle está bien escrito, no acepta $%&"#@
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["calle"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios en la calle")));
			}else{
				$calle = $_POST["calle"];  //Asigna si pasa la validación
				//Conviertelo en mayúsculas
				$calle = mb_strtoupper($calle, 'UTF-8');
				//Quitale los acentos
				$calle = quitarAcentos($calle);
			}
		}

		// NÚMERO INTERIOR
		// Checa si está vacío
		if(empty($_POST["ninterior"])){
			$ninterior = null; // Si no se proporciona el número interior, lo establecemos como nulo.
		}else{
			$ninterior = $_POST["ninterior"]; // Asignamos el número interior si pasa la validación.
		}

		// NÚMERO EXTERIOR
		//Checa si está vacío
		if(empty($_POST["nexterior"])){
			$nexterior = null; // Si no se proporciona el número exterior, lo establecemos como nulo.
		}else{
			$nexterior = $_POST["nexterior"]; // Asignamos el número exterior si pasa la validación.
		}

		// COLONIA
		// Checa si está vacío
		if(empty($_POST["colonia"])){
			$colonia = null; // Si no se proporciona la colonia, la establecemos como nula.
		}else{
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["colonia"])){
				// Si se proporciona una colonia, verificamos si cumple con el formato especificado.
				die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos, puntos, guiones intermedios y espacios en la colonia")));
			}else{
				$colonia = $_POST["colonia"]; // Asignamos la colonia si pasa la validación.
				//Conviertelo en mayúsculas
				$colonia = mb_strtoupper($colonia, 'UTF-8');
				//Quitale los acentos
				$colonia = quitarAcentos($colonia);
			}
		}

		// ESTADO
		//Checa si el estado está vacío
		if(empty($_POST["estado"])){
			$estado = null;
		}else{
			// Preparar y ejecutar una consulta para recuperar la lista de estados
			$retrieve_estados = $object->_db->prepare("SELECT id, nombre FROM estados");
			$retrieve_estados->execute();

			// Obtener los resultados de la consulta como un arreglo asociativo con ID como clave y Nombre como valor
			$fetch_retrieve_estados = $retrieve_estados->fetchAll(PDO::FETCH_KEY_PAIR);

			if (array_key_exists($_POST["estado"], $fetch_retrieve_estados)) {
				// El estado seleccionado coincide con uno de los estados en el dropdown
				$array_key_state_value = $fetch_retrieve_estados[$_POST["estado"]];

				// Verificar si el texto ingresado (si existe) coincide con el valor del estado
				if (isset($_POST["estadotext"]) && $_POST['estadotext'] == $array_key_state_value) {
					$estado = $_POST["estado"];
				} else {
					die(json_encode(array("error", "Por favor, asegúrese de que el estado escogido se encuentre en el dropdown")));
				}
			} else {
				// El ID seleccionado no coincide con ninguno de los estados registrados
				die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los estados registrados")));
			}
		}

		// MUNICIPIO
		//Checa si el municipio está vacío
		if (empty($_POST["municipio"])) {
			$municipio = null;
		} else if (empty($_POST["estado"]) && !(empty($_POST["municipio"]))) {
			// Asegurarse de que se haya seleccionado un estado antes de un municipio
			die(json_encode(array("error", "Por favor, seleccione un estado y luego un municipio")));
		} else {
			// Preparar y ejecutar una consulta para recuperar la lista de municipios en el estado seleccionado
			$retrieve_estados_municipio = $object->_db->prepare("SELECT id, nombre from municipios where estado=:estado");
			$retrieve_estados_municipio->execute(array(':estado' => $_POST["estado"]));

			// Contar el número de municipios recuperados
			$count_retrieve_estados_municipio = $retrieve_estados_municipio->rowCount();

			if ($count_retrieve_estados_municipio > 0) {
				// Obtener los resultados de la consulta como un arreglo asociativo con ID como clave y Nombre como valor
				$fetch_retrieve_estados_municipio = $retrieve_estados_municipio->fetchAll(PDO::FETCH_KEY_PAIR);

				if (array_key_exists($_POST["municipio"], $fetch_retrieve_estados_municipio)) {
					// El municipio seleccionado coincide con uno de los municipios en el dropdown
					$array_key_municipio_value = $fetch_retrieve_estados_municipio[$_POST["municipio"]];

					// Verificar si el texto ingresado (si existe) coincide con el valor del municipio
					if (isset($_POST["municipiotext"]) && $_POST['municipiotext'] == $array_key_municipio_value) {
						$municipio = $_POST["municipio"];
					} else {
						die(json_encode(array("error", "Por favor, asegúrese de que el municipio escogido se encuentre en el dropdown")));
					}
				} else {
					// El ID seleccionado no coincide con ninguno de los municipios registrados
					die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los municipios registrados")));
				}
			} else {
				// El estado elegido no tiene ningún municipio, el dropdown de municipios debe estar vacío
				die(json_encode(array("error", "El estado elegido no tiene ningún municipio; el dropdown de municipios debe estar vacío")));
			}
		}

		// CÓDIGO POSTAL
		//Checa si el código postal está vacío
		if(empty($_POST["codigo"])){
			$codigo = null;
		}else{
			// Validar que el código postal solo contenga números
			if(!preg_match("/^[0-9]*$/", $_POST["codigo"])){
				die(json_encode(array("error", "Solo se permiten números en el código postal")));
			}else{
				$codigo = $_POST["codigo"];
			}
		}

		// TELÉFONO DE DOMICILIO
		//Checa si el teléfono del domicilio está vacío
		if(empty($_POST["teldom"])){
			$teldom = null;
		}else{
			// Validar que el teléfono de domicilio solo contenga números
			if(!preg_match("/^[0-9]*$/", $_POST["teldom"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de domicilio")));
			}else if(strlen($_POST["teldom"]) != 10){
				// Asegurarse de que el teléfono de domicilio tenga exactamente 10 caracteres
				die(json_encode(array("error", "El teléfono de domicilio debe tener exactamente 10 caracteres")));
			}else{
				$teldom = $_POST["teldom"];
			}
		}

		// POSEE TELÉFONO MÓVIL PROPIO?
		// Comproba si el usuario posee un teléfono móvil propio
		if($_POST["posee_telmov"] == "si"){
			if(empty($_POST["telmov"])){
				// Verificar si se ingresó un teléfono móvil cuando se selecciona "Sí"
				die(json_encode(array("error", "Por favor, ingrese un teléfono móvil")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["telmov"])){
				// Validar que el teléfono móvil solo contenga números
				die(json_encode(array("error", "Solo se permiten números en el teléfono de móvil")));
			}else if(strlen($_POST["telmov"]) != 10){
				// Asegurarse de que el teléfono móvil tenga exactamente 10 caracteres
				die(json_encode(array("error", "El teléfono móvil debe tener exactamente 10 caracteres")));
			}else{
				$posee_telmov = $_POST["posee_telmov"];
				//Conviertelo en mayúsculas
				$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
				//Quitale los acentos
				$posee_telmov = quitarAcentos($posee_telmov);
				$telmov = $_POST["telmov"];
			}
		}else{
			// Si no se selecciona "Sí" para poseer teléfono móvil, establecer los valores correspondientes
			$posee_telmov = $_POST["posee_telmov"];
			//Conviertelo en mayúsculas
			$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
			//Quitale los acentos
			$posee_telmov = quitarAcentos($posee_telmov);
			$telmov = null;
		}

		//POSEE TELÉFONO ASIGNADO POR LA EMPRESA?
		// Comprobar si el usuario posee teléfono de la empresa
		if($_POST["posee_telempresa"] == "si"){
			// Validaciones para los campos del teléfono de la empresa
			if(empty($_POST["marcacion"])){
				die(json_encode(array("error", "Por favor, ingrese la marcación del teléfono asignado")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["marcacion"])){
				die(json_encode(array("error", "Solo se permiten números en la marcación del teléfono asignado")));
			}else if(empty($_POST["serie"])){
				die(json_encode(array("error", "Por favor, ingrese la serie del teléfono asignado")));
			}else if(!preg_match("/^[\w]+$/i", $_POST["serie"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfanuméricos en la serie del teléfono asignado")));
			}else if(empty($_POST["sim"])){
				die(json_encode(array("error", "Por favor, ingrese el SIM del teléfono asignado")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["sim"])){
				die(json_encode(array("error", "Solo se permiten números en el SIM del teléfono asignado")));
			}else if(empty($_POST["numred"])){
				die(json_encode(array("error", "Por favor, ingrese el número de red del teléfono asignado")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["numred"])){
				die(json_encode(array("error", "Solo se permiten números en el número de red del teléfono asignado")));
			}else if(empty($_POST["modelotel"])){
				die(json_encode(array("error", "Por favor, ingrese el modelo del teléfono asignado")));
			}else if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}])+([?:\s|\-|\_][a-zA-Z0-9\x{00C0}-\x{00FF}]+)*$/u", $_POST["modelotel"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfanuméricos, guiones intermedios y espacios en el modelo del teléfono asignado")));
			}else if(empty($_POST["marcatel"])){
				die(json_encode(array("error", "Por favor, ingrese la marca del teléfono asignado")));
			}else if(empty($_POST["imei"])){
				die(json_encode(array("error", "Por favor, ingrese el IMEI del teléfono asignado")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["imei"])){
				die(json_encode(array("error", "Solo se permiten números en el IMEI del teléfono asignado")));
			}else{
				// Asignar valores si todas las validaciones son exitosas
				$posee_telempresa = $_POST["posee_telempresa"];
				//Conviertelo en mayúsculas
				$posee_telempresa = mb_strtoupper($posee_telempresa, 'UTF-8');
				//Quitale los acentos
				$posee_telempresa = quitarAcentos($posee_telempresa);
				$marcacion = $_POST["marcacion"];
				$serie = $_POST["serie"];
				//Conviertelo en mayúsculas
				$serie = mb_strtoupper($serie, 'UTF-8');
				//Quitale los acentos
				$serie = quitarAcentos($serie);
				$sim = $_POST["sim"];
				$numred = $_POST["numred"];
				$modelotel = $_POST["modelotel"];
				//Conviertelo en mayúsculas
				$modelotel = mb_strtoupper($modelotel, 'UTF-8');
				//Quitale los acentos
				$modelotel = quitarAcentos($modelotel);
				$marcatel = $_POST["marcatel"];
				//Conviertelo en mayúsculas
				$marcatel = mb_strtoupper($marcatel, 'UTF-8');
				//Quitale los acentos
				$marcatel = quitarAcentos($marcatel);
				$imei = $_POST["imei"];
			}
		}else{
			// Si no se selecciona "Sí" para poseer teléfono de la empresa, establecer los valores correspondientes
			$posee_telempresa = $_POST["posee_telempresa"];
			//Conviertelo en mayúsculas
			$posee_telempresa = mb_strtoupper($posee_telempresa, 'UTF-8');
			//Quitale los acentos
			$posee_telempresa = quitarAcentos($posee_telempresa);
			$marcacion = null;
			$serie = null;
			$sim = null;
			$numred = null;
			$modelotel = null;
			$marcatel = null;
			$imei = null;
		}

		//POSEE LAPTOP ASIGNADA POR LA EMPRESA?
		// Verifica si la variable "posee_laptop" es igual a "si"
		if($_POST["posee_laptop"] == "si"){
			// Si es "si", continúa con las siguientes validaciones
			if(empty($_POST["marca_laptop"])){
				die(json_encode(array("error", "Por favor, ingrese la marca de la laptop asignada")));
			} else if(empty($_POST["modelo_laptop"])){
				die(json_encode(array("error", "Por favor, ingrese el modelo de la laptop asignada")));
			} else if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}])+([?:\s|\-|\_][a-zA-Z0-9\x{00C0}-\x{00FF}]+)*$/u", $_POST["modelo_laptop"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos, guiones intermedios y espacios en el modelo de la laptop asignada")));
			} else if(empty($_POST["serie_laptop"])){
				die(json_encode(array("error", "Por favor, ingrese la serie de la laptop asignada")));
			} else if(!preg_match("/^[\w]+$/i", $_POST["serie_laptop"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos en la serie de la laptop asignada")));
			} else {
				// Si todas las validaciones son exitosas, asigna los valores a las variables correspondientes
				$posee_laptop = $_POST["posee_laptop"];
				//Conviertelo en mayúsculas
				$posee_laptop = mb_strtoupper($posee_laptop, 'UTF-8');
				//Quitale los acentos
				$posee_laptop = quitarAcentos($posee_laptop);
				$marca_laptop = $_POST["marca_laptop"];
				//Conviertelo en mayúsculas
				$marca_laptop = mb_strtoupper($marca_laptop, 'UTF-8');
				//Quitale los acentos
				$marca_laptop = quitarAcentos($marca_laptop);
				$modelo_laptop = $_POST["modelo_laptop"];
				//Conviertelo en mayúsculas
				$modelo_laptop = mb_strtoupper($modelo_laptop, 'UTF-8');
				//Quitale los acentos
				$modelo_laptop = quitarAcentos($modelo_laptop);
				$serie_laptop = $_POST["serie_laptop"];
				//Conviertelo en mayúsculas
				$serie_laptop = mb_strtoupper($serie_laptop, 'UTF-8');
				//Quitale los acentos
				$serie_laptop = quitarAcentos($serie_laptop);
			}
		} else {
			// Si "posee_laptop" no es igual a "si", asigna valores nulos a las variables correspondientes
			$posee_laptop = $_POST["posee_laptop"];
			//Conviertelo en mayúsculas
			$posee_laptop = mb_strtoupper($posee_laptop, 'UTF-8');
			//Quitale los acentos
			$posee_laptop = quitarAcentos($posee_laptop);
			$marca_laptop = null;
			$modelo_laptop = null;
			$serie_laptop = null;
		}

		//CASA PROPIA
		// Verifica si el usuario escogió un radiobutton
		if(empty($_POST["radio"])){
			die(json_encode(array("error", "Por favor, ingrese el radiobutton de casa propia no puede ir vacío")));
		}else{
			$casa_propia = $_POST["radio"];
			//Conviertelo en mayúsculas
			$casa_propia = mb_strtoupper($casa_propia, 'UTF-8');
			//Quitale los acentos
			$casa_propia = quitarAcentos($casa_propia);
		}

		// ESTADO CIVIL
		//Crea un arreglo con todas las opciones correspondientes en el HTML
		$estadocivil_array = array("SOLTERO", "CASADO", "DIVORCIADO", "UNIÓN LIBRE");

		// Verifica si el valor de "ecivil" se encuentra en el array de opciones de estado civil
		if (in_array($_POST["ecivil"], $estadocivil_array)) {
			$ecivil = $_POST["ecivil"];
		} else if (empty($_POST["ecivil"])) {
			// Si "ecivil" está vacío, asigna un valor nulo a "ecivil"
			$ecivil = null;
		} else {
			// Si "ecivil" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de estado civil está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// POSEE RETENCIÓN
		//Comprueba si el usuario escogió 'si' en la retención
		if ($_POST["posee_retencion"] == "si") {
			// Verifica si el usuario seleccionó "si" para poseer retención
			if (empty($_POST["monto_mensual"])) {
				// Si no ingresó un monto mensual, muestra un error
				die(json_encode(array("error", "Por favor, ingrese el monto mensual")));
			} else if (!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["monto_mensual"])) {
				// Si el monto mensual no cumple con el formato especificado, muestra un error
				die(json_encode(array("error", "Solo se permiten números y decimales en el monto mensual")));
			} else {
				// Si todas las validaciones son exitosas, asigna los valores a las variables correspondientes
				$posee_retencion = $_POST["posee_retencion"];
				//Conviertelo en mayúsculas
				$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
				//Quitale los acentos
				$posee_retencion = quitarAcentos($posee_retencion);
				$monto_mensual = $_POST["monto_mensual"];
			}
		} else {
			// Si "posee_retencion" no es igual a "si", asigna valores nulos a las variables correspondientes
			$posee_retencion = $_POST["posee_retencion"];
			//Conviertelo en mayúsculas
			$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
			//Quitale los acentos
			$posee_retencion = quitarAcentos($posee_retencion);
			$monto_mensual = null;
		}

		// FECHA DE NACIMIENTO
		//Checa si la fecha de nacimiento está vacía
		if (empty($_POST["fechanac"])) {
			$fechanac = null;
		} else {
			// Reemplaza las barras oblicuas por guiones
			$_POST["fechanac"] = str_replace('/', '-', $_POST["fechanac"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechanac"])) {
				// Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de nacimiento")));
			} else {
				$check_fechanac = validateDate($_POST["fechanac"], 'Y-m-d');
		
				// Verifica si la fecha de nacimiento es inválida
				if (!$check_fechanac) {
					die(json_encode(array("error", "La fecha de nacimiento es inválida")));
				}
		
				// Calcula la edad a partir de la fecha de nacimiento
				$fecha_nacimiento = new DateTime($_POST["fechanac"]);
				$fecha_hoy = new DateTime();
				$edad = $fecha_nacimiento->diff($fecha_hoy)->y;
		
				// Verifica si el solicitante es menor de 18 años
				if ($edad < 18) {
					die(json_encode(array("error", "Debes ser mayor de 18 años para aplicar")));
				}
		
				$fechanac = $_POST["fechanac"];
			}
		}

		// FECHA DE INICIO DE CONTRATO
		//Checa si la fecha de contrato está vacía
		if (empty($_POST["fechacon"])) {
			$fechacon = null;
		} else {
			// Reemplaza las barras oblicuas por guiones
			$_POST["fechacon"] = str_replace('/', '-', $_POST["fechacon"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechacon"])) {
				// Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de contrato")));
			} else {
				$check_fechacon = validateDate($_POST["fechacon"], 'Y-m-d');
		
				// Verifica si la fecha de inicio de contrato es inválida
				if (!$check_fechacon) {
					die(json_encode(array("error", "La fecha de inicio de contrato es inválida")));
				}
		
				$fechacon = $_POST["fechacon"];
			}
		}

		// FECHA DE ALTA
		//Checa si la fecha de alta está vacía
		if (empty($_POST["fechaalta"])) {
			$fechaalta = null;
		} else {
			// Reemplaza las barras oblicuas por guiones
			$_POST["fechaalta"] = str_replace('/', '-', $_POST["fechaalta"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechaalta"])) {
				// Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de alta")));
			} else {
				$check_fechaalta = validateDate($_POST["fechaalta"], 'Y-m-d');
		
				// Verifica si la fecha de alta es inválida
				if (!$check_fechaalta) {
					die(json_encode(array("error", "La fecha de alta es inválida")));
				}
		
				$fechaalta = $_POST["fechaalta"];
			}
		}

		//SALARIO AL INICIO DEL PERIODO DE PRUEBA
		//Checa si el salario al inicio de prueba está vacía
		if(empty($_POST["salario_contrato"])){
			$salario_contrato = null;
		}else{
			//Checa si el salario al inicio de prueba tiene el formato adecuado
			if(!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["salario_contrato"])){
				die(json_encode(array("error", "Solo se permiten números y decimales en el salario al inicio del periodo de prueba")));
			}else{
				$salario_contrato = $_POST["salario_contrato"];
			}
		}

		//SALARIO DESPUÉS DEL PERIODO DE PRUEBA
		//Checa si el salario después del periodo de prueba está vacía
		if(empty($_POST["salario_fechaalta"])){
			$salario_fechaalta = null;
		}else{
			//Checa si el salario después del periodo de prueba tiene el formato adecuado
			if(!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["salario_fechaalta"])){
				die(json_encode(array("error", "Solo se permiten números y decimales en el salario después al periodo de prueba")));
			}else{
				$salario_fechaalta = $_POST["salario_fechaalta"];
			}
		}

		//OBSERVACIONES
		//Checa si las observaciones están vacías
		if(empty($_POST["observaciones"])){
			$observaciones = null;
		}else{
			//Checa si las observaciones tienen el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["observaciones"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las observaciones")));
			}else{
				$observaciones = $_POST["observaciones"];
				//Conviertelo en mayúsculas
				$observaciones = mb_strtoupper($observaciones, 'UTF-8');
				//Quitale los acentos
				$observaciones = quitarAcentos($observaciones);
			}
		}

		//CURP
		//Checa si el CURP está vacío
		if(empty($_POST["curp"])){
			$curp = null;
		}else{
			//Checa si el CURP tiene el formato adecuado
			if(!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $_POST["curp"])){
				die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR")));
			}else{
				$curp= $_POST["curp"];
				//Conviertelo en mayúsculas
				$curp = mb_strtoupper($curp, 'UTF-8');
				//Quitale los acentos
				$curp = quitarAcentos($curp);
			}
		}

		//NÚMERO DE SEGURO SOCIAL
		//Checa si el número de seguro social está vacío
		if(empty($_POST["nss"])){
			$nss = null;
		}else{
			//Checa si el número de seguro social tiene el formato adecuado
			if(!preg_match("/^[0-9]*$/", $_POST["nss"])){
				die(json_encode(array("error", "Solo se permiten números en el número de seguro social")));
			}else{
				$nss = $_POST["nss"];
			}
		}

		//RFC
		//Checa si el RFC está vacío
		if(empty($_POST["rfc"])){
			$rfc = null;
		}else{
			//Checa si el RFC tiene el formato adecuado
			if(!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $_POST["rfc"])){
				die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789")));
			}else{
				$rfc = $_POST["rfc"];
				//Conviertelo en mayúsculas
				$rfc = mb_strtoupper($rfc, 'UTF-8');
				//Quitale los acentos
				$rfc = quitarAcentos($rfc);
			}
		}

		//TIPO DE IDENTIFICACIÓN
		//Definimos el arreglo y agregamos las mismas opciones que en el HTML
		$identificacion_array = array("INE", "PASAPORTE", "CEDULA");
		//Búsca si la opción seleccionada coincide con los del arreglo
		if(in_array($_POST["identificacion"], $identificacion_array)) {
			$identificacion = $_POST["identificacion"];
		}else if(empty($_POST["identificacion"])){
		//Manda null si el campo está vacío
			$identificacion = null;
		}else{
		//Manda null si el campo está vacío
			die(json_encode(array("error", "El valor escogido en el dropdown de tipo de identificación está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		//NÚMERO DE IDENTIFICACIÓN
		// Verificamos si está vacío
		if(empty($_POST["numeroidentificacion"])){
			$numeroidentificacion = null;
		}else{
			if($_POST["identificacion"] == "INE"){
				// Verifica si el OCR del INE tiene el formato correcto (13 caracteres)
				if (!preg_match('/^[A-Za-z0-9]{13}$/', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "El INE solo puede contener 13 caracteres y debe ser alfanúmerico")));
				}
			}else if($_POST["identificacion"] == "PASAPORTE"){
				// Verifica si el OCR del pasaporte tiene el formato correcto (3 letras seguidas de 6 números)
				if (!preg_match('/^[A-Z]{3}\d{6}$/i', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "El PASAPORTE solo puede contener 9 caracteres, debe ser alfanúmerico y debe comenzar con 3 letras y seguido de 6 números")));
				}
			}else if($_POST["identificacion"] == "CEDULA"){
				if (!preg_match('/^\d{7,10}$/', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "La CEDULA solo puede contener entre 7 y 10 dígitos y debe ser númerico")));
				}
			}
			$numeroidentificacion = $_POST["numeroidentificacion"];
			//Conviertelo en mayúsculas
			$numeroidentificacion = mb_strtoupper($numeroidentificacion, 'UTF-8');
			//Quitale los acentos
			$numeroidentificacion = quitarAcentos($numeroidentificacion);
		}



		/*
		=============================================
		TERMINA LA VALIDACIÓN DE LOS DATOS GENERALES
		=============================================
		*/

		/**
		 * !   ██████   █████  ████████  ██████  ███████  █████  
		 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
		 * !   ██   ██ ███████    ██    ██    ██ ███████ ███████ 
		 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
		 * !   ██████  ██   ██    ██     ██████  ███████ ██   ██                                                       
		*/

		/*
		=============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS ADICIONALES
		=============================================
		*/

		// Comprueba si el campo "numeroreferenciaslab" no está vacío
		if (!empty($_POST["numeroreferenciaslab"])) {
			// Valida que "numeroreferenciaslab" sea un solo dígito y un número
			if (preg_match("/^\d$/", $_POST["numeroreferenciaslab"])) {
				// Decodifica el JSON en un arreglo asociativo
				$referencias_decoded = json_decode($_POST["referencias"], true);
		
				// Verifica que el número de referencias coincida con la cantidad real
				if (is_array($referencias_decoded) && count($referencias_decoded) == $_POST["numeroreferenciaslab"]) {
					$referencias_contador = 1;
					//Recorremos el arreglo
					foreach ($referencias_decoded as &$referencia_laboral) {
						//Checa que los campos no estén vacios
						if (empty($referencia_laboral["nombre"]) || empty($referencia_laboral["apellidopat"]) || empty($referencia_laboral["apellidomat"]) || empty($referencia_laboral["relacion"]) || empty($referencia_laboral["telefono"])) {
							die(json_encode(array("error", "Existen campos vacíos en las referencias laborales, por favor, verifique la información")));
						} else {
							//validaciones
							if (!preg_match("/^[\pL\s'-]+$/u", $referencia_laboral["nombre"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidopat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidomat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^\d{10}$/", $referencia_laboral["telefono"])) {
								die(json_encode(array("error", "El teléfono de la referencia laboral " . $referencias_contador . " debe tener exactamente 10 dígitos")));
							}
						}
						// Aplicamos mb_strtoupper a los valores de cadena
						//Le quitamos los acentos
						$referencia_laboral["nombre"] = mb_strtoupper(quitarAcentos($referencia_laboral["nombre"], 'UTF-8'));
						$referencia_laboral["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidopat"], 'UTF-8'));
						$referencia_laboral["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidomat"], 'UTF-8'));

						$referencias_contador++;
					}
					// Asigna el valor de "referencias" después de validar
					$referencias = json_encode($referencias_decoded); // Convierte el arreglo de vuelta a JSON
				} else {
					die(json_encode(array("error", "El número de referencias laborales ingresado no coincide con el enviado, por favor, verifique la información")));
				}
			} else {
				die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
			}
		} else {
			// Asigna "null" si "numeroreferenciaslab" está vacío
			$referencias = null;
		}

		// FECHA DE ENTREGA DE UNIFORME
		//Checa si la fecha de uniforme está vacía
		if (empty($_POST["fechauniforme"])) {
			$fechauniforme = null;
		} else {
			// Reemplaza las barras oblicuas por guiones
			$_POST["fechauniforme"] = str_replace('/', '-', $_POST["fechauniforme"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechauniforme"])) {
				// Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de uniforme")));
			} else {
				$check_fechauniforme = validateDate($_POST["fechauniforme"], 'Y-m-d');
		
				// Verifica si la fecha de uniforme es inválida
				if (!$check_fechauniforme) {
					die(json_encode(array("error", "La fecha de uniforme es inválida")));
				}
		
				$fechauniforme = $_POST["fechauniforme"];
			}
		}

		//CANTIDAD POLO
		//Checa si el campo cantidad polo está vacío
		if(empty($_POST["cantidadpolo"])){
			$cantidadpolo = null;
		}else{
			//Checa si la cantidad polo tiene el formato adecuado
			if(!preg_match("/^[0-9]*$/", $_POST["cantidadpolo"])){
				die(json_encode(array("error", "Solo se permiten números en el campo de cantidad polo")));
			}else{
				$cantidadpolo = $_POST["cantidadpolo"];
			}
		}

		// TALLA CAMISA
		//Crea un arreglo con todas las opciones correspondientes en el HTML
		$tallacamisa_array = array("XS", "S", "M", "L", "XL", "XXL", "XXXL");

		// Verifica si el valor de "tallapolo" se encuentra en el array de opciones de talla camisa
		if (in_array($_POST["tallapolo"], $tallacamisa_array)) {
			$tallapolo = $_POST["tallapolo"];
		} else if (empty($_POST["tallapolo"])) {
			// Si "tallapolo" está vacío, asigna un valor nulo a "tallapolo"
			$tallapolo = null;
		} else {
			// Si "tallapolo" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de talla camisa está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		// CONTACTOS DE EMERGENCIA

		//Nombre del primer contacto de emergencia
		//Checa si el nombre del primer contacto está vacío
		if(empty($_POST["emergencianom"])){
			$emergencianom = null;
		}else{
			//Checa si el nombre del primer contacto tiene el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del primer contacto")));
			}else{
				$emergencianom = $_POST["emergencianom"];
				//Conviertelo en mayúsculas
				$emergencianom = mb_strtoupper($emergencianom, 'UTF-8');
				//Quitale los acentos
				$emergencianom = quitarAcentos($emergencianom);
			}
		}

		//Apellido paterno del primer contacto de emergencia
		//Checa si el apellido paterno está vacío
		if(empty($_POST["emergenciaapat"])){
			$emergenciaapat = null;
		}else{
			//Checa si el apellido paterno del primer contacto tiene el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del primer contacto")));
			}else{
				$emergenciaapat = $_POST["emergenciaapat"];
				//Conviertelo en mayúsculas
				$emergenciaapat = mb_strtoupper($emergenciaapat, 'UTF-8');
				//Quitale los acentos
				$emergenciaapat = quitarAcentos($emergenciaapat);
			}
		}

		//Apellido materno del primer contacto de emergencia
		//Checa si el apellido materno del primer contacto está vacío
		if(empty($_POST["emergenciaamat"])){
			$emergenciaamat = null;
		}else{
			//Checa si el apellido materno del primer contacto tiene el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el primer contacto")));
			}else{
				$emergenciaamat = $_POST["emergenciaamat"];
				//Conviertelo en mayúsculas
				$emergenciaamat = mb_strtoupper($emergenciaamat, 'UTF-8');
				//Quitale los acentos
				$emergenciaamat = quitarAcentos($emergenciaamat);
			}
		}

		// Relación
		//Crea un arreglo con todas las opciones correspondientes en el HTML
		$emergencia_relacion_array = array("PADRE", "MADRE", "HERMANO", "HERMANA", "CONYUGE", "PAREJA", "AMIGO", "AMIGA", "VECINO", "COMPAÑERO_DE_TRABAJO", "COMPAÑERA_DE_TRABAJO", "OTRO");


		if (empty($_POST["emergenciarelacion"])) {
			$emergenciarelacion = null;
		} else {
			$emergenciarelacion = $_POST["emergenciarelacion"];
		}

		// Teléfono
		//Checa si el teléfono del primer contacto está vacío
		if(empty($_POST["emergenciatelefono"])){
			$emergenciatelefono = null;
		}else{
			// Validar que el teléfono de emergencia del primer contacto solo contenga números
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del primer contacto")));
			}else if(strlen($_POST["emergenciatelefono"]) != 10){
				// Asegurarse de que el teléfono de emergencia del primer contacto tenga exactamente 10 caracteres
				die(json_encode(array("error", "El teléfono de emergencia del primer contacto debe tener exactamente 10 caracteres")));
			}else{
				$emergenciatelefono = $_POST["emergenciatelefono"];
			}
		}

		//Nombre del segundo contacto de emergencia
		//Checa si el nombre del segundo contacto está vacío
		if(empty($_POST["emergencianom2"])){
			$emergencianom2 = null;
		}else{
			//Checa si el nombre del segundo contacto tiene el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del segundo contacto")));
			}else{
				$emergencianom2 = $_POST["emergencianom2"];
				//Conviertelo en mayúsculas
				$emergencianom2 = mb_strtoupper($emergencianom2, 'UTF-8');
				//Quitale los acentos
				$emergencianom2 = quitarAcentos($emergencianom2);
			}
		}

		//Apellido paterno del segundo contacto de emergencia
		//Checa si el apellido paterno del segundo contacto está vacío
		if(empty($_POST["emergenciaapat2"])){
			$emergenciaapat2 = null;
		}else{
			//Checa si el apellido paterno del segundo contacto tiene el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del segundo contacto")));
			}else{
				$emergenciaapat2 = $_POST["emergenciaapat2"];
				//Conviertelo en mayúsculas
				$emergenciaapat2 = mb_strtoupper($emergenciaapat2, 'UTF-8');
				//Quitale los acentos
				$emergenciaapat2 = quitarAcentos($emergenciaapat2);
			}
		}

		//Apellido materno del segundo contacto de emergencia
		//Checa si el apellido materno del segundo contacto está vacío
		if(empty($_POST["emergenciaamat2"])){
			$emergenciaamat2 = null;
		}else{
			//Checa si el apellido materno del segundo contacto tiene el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el segundo contacto")));
			}else{
				$emergenciaamat2 = $_POST["emergenciaamat2"];
				//Conviertelo en mayúsculas
				$emergenciaamat2 = mb_strtoupper($emergenciaamat2, 'UTF-8');
				//Quitale los acentos
				$emergenciaamat2 = quitarAcentos($emergenciaamat2);
			}
		}

		// Relación
		//Crea un arreglo con todas las opciones correspondientes en el HTML
		$emergencia_relacion_array2 = array("PADRE", "MADRE", "HERMANO", "HERMANA", "CONYUGE", "PAREJA", "AMIGO", "AMIGA", "VECINO", "COMPAÑERO_DE_TRABAJO", "COMPAÑERA_DE_TRABAJO", "OTRO");

		$emergenciarelacion2 = $_POST["emergenciarelacion2"];
		if (empty($_POST["emergenciarelacion2"])) {
			// Si "emergenciarelacion2" está vacío, asigna un valor nulo a "emergenciarelacion2"
			$emergenciarelacion2 = null;
		} 

		// Teléfono
		//Checa si el teléfono del segundo contacto está vacío
		if(empty($_POST["emergenciatelefono2"])){
			$emergenciatelefono2 = null;
		}else{
			// Validar que el teléfono de emergencia del segundo contacto solo contenga números
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono2"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del segundo contacto")));
			}else if(strlen($_POST["emergenciatelefono2"]) != 10){
				// Asegurarse de que el teléfono de emergencia del segundo contacto tenga exactamente 10 caracteres
				die(json_encode(array("error", "El teléfono de emergencia del segundo contacto debe tener exactamente 10 caracteres")));
			}else{
				$emergenciatelefono2 = $_POST["emergenciatelefono2"];
			}
		}

		// CAPACITACIÓN
		//Crea un arreglo con todas las opciones correspondientes en el HTML
		$capacitacion_array = array("SI", "NO", "S", "M", "L", "XL", "XXL", "XXXL");

		// Verifica si el valor de "capacitacion" se encuentra en el array de opciones de capacitacion
		if (in_array($_POST["capacitacion"], $capacitacion_array)) {
			$capacitacion = $_POST["capacitacion"];
		} else if (empty($_POST["capacitacion"])) {
			// Si "capacitacion" está vacío, asigna un valor nulo a "capacitacion"
			$capacitacion = null;
		} else {
			// Si "capacitacion" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de capacitación está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// RESULTADO ANTIDOPING
		//Crea un arreglo con todas las opciones correspondientes en el HTML
		$antidoping_array = array("POSITIVO", "NEGATIVO", "NO APLICA");

		// Verifica si el valor de "antidoping" se encuentra en el array de opciones de antidoping
		if (in_array($_POST["antidoping"], $antidoping_array)) {
			$antidoping = $_POST["antidoping"];
		} else if (empty($_POST["antidoping"])) {
			// Si "antidoping" está vacío, asigna un valor nulo a "antidoping"
			$antidoping = null;
		} else {
			// Si "antidoping" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de resultado antidoping está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// TIPO DE SANGRE
		//Crea un arreglo con todas las opciones correspondientes en el HTML
		$tiposangre_array = array("A_POSITIVO", "A_NEGATIVO", "B_POSITIVO", "B_NEGATIVO", "AB_POSITIVO", "AB_NEGATIVO", "O_POSITIVO", "O_NEGATIVO");

		// Verifica si el valor de "tipo_sangre" se encuentra en el array de opciones de tipo de sangre
		if (in_array($_POST["tipo_sangre"], $tiposangre_array)) {
			$tipo_sangre = $_POST["tipo_sangre"];
		} else if (empty($_POST["tipo_sangre"])) {
			// Si "tipo_sangre" está vacío, asigna un valor nulo a "tipo_sangre"
			$tipo_sangre = null;
		} else {
			// Si "tipo_sangre" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de tipo de sangre está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// ¿CÓMO SE ENTERO DE LA VACANTE?
		//Crea un arreglo con todas las opciones correspondientes en el HTML
		$vacante_array = array("PLATAFORMA LABORAL", "RECOMENDACION", "REDES SOCIALES", "AVISOS DE OCASION");

		// Verifica si el valor de "vacante" se encuentra en el array de opciones de los tipos de vacante
		if (in_array($_POST["vacante"], $vacante_array)) {
			$vacante = $_POST["vacante"];
		} else if (empty($_POST["vacante"])) {
			// Si "vacante" está vacío, asigna un valor nulo a "vacante"
			$vacante = null;
		} else {
			// Si "vacante" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de ¿cómo se entero de la vacante?, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		//¿TIENE FAMILIARES EN LA EMPRESA?
		// Verifica si la variable "radio2" es igual a "si"
		if($_POST["radio2"] == "si"){
			// Si es "si", continúa con las siguientes validaciones
			if(empty($_POST["nomfam"])){
				die(json_encode(array("error", "Por favor, ingrese el nombre del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nomfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre del familiar que trabaja en la empresa")));
			} else if(empty($_POST["apellidopatfam"])){
				die(json_encode(array("error", "Por favor, ingrese el apellido paterno del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidopatfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno del familiar que trabaja en la empresa")));
			} else if(empty($_POST["apellidomatfam"])){
				die(json_encode(array("error", "Por favor, ingrese el apellido materno del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidomatfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno del familiar que trabaja en la empresa")));
			} else {
				// Si todas las validaciones son exitosas, asigna los valores a las variables correspondientes
				$radio2 = $_POST["radio2"];
				//Conviertelo en mayúsculas
				$radio2 = mb_strtoupper($radio2, 'UTF-8');
				//Quitale los acentos
				$radio2 = quitarAcentos($radio2);
				$nomfam = $_POST["nomfam"];
				//Conviertelo en mayúsculas
				$nomfam = mb_strtoupper($nomfam, 'UTF-8');
				//Quitale los acentos
				$nomfam = quitarAcentos($nomfam);
				$apellidopatfam = $_POST["apellidopatfam"];
				//Conviertelo en mayúsculas
				$apellidopatfam = mb_strtoupper($apellidopatfam, 'UTF-8');
				//Quitale los acentos
				$apellidopatfam = quitarAcentos($apellidopatfam);
				$apellidomatfam = $_POST["apellidomatfam"];
				//Conviertelo en mayúsculas
				$apellidomatfam = mb_strtoupper($apellidomatfam, 'UTF-8');
				//Quitale los acentos
				$apellidomatfam = quitarAcentos($apellidomatfam);
			}
		} else {
			// Si "radio2" no es igual a "si", asigna valores nulos a las variables correspondientes
			$radio2 = $_POST["radio2"];
			//Conviertelo en mayúsculas
			$radio2 = mb_strtoupper($radio2, 'UTF-8');
			//Quitale los acentos
			$radio2 = quitarAcentos($radio2);
			$nomfam = null;
			$apellidopatfam = null;
			$apellidomatfam = null;
		}

		/*
		=============================================
		TERMINA LA VALIDACIÓN DE LOS DATOS ADICIONALES
		=============================================
		*/

		/**
		 * !   ██████   █████  ████████  ██████  ███████ ██████  
		 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
		 * !   ██   ██ ███████    ██    ██    ██ ███████ ██████  
		 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
		 * !   ██████  ██   ██    ██     ██████  ███████ ██████                                                        
		*/

		/*
		=============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS BANCARIOS
		=============================================
		*/

		//REFERENCIAS BANCARIAS
		// Comprueba si el campo "numeroreferenciasban" no está vacío
		if(!(empty($_POST["numeroreferenciasban"]))){
			// Valida que "numeroreferenciasban" sea un solo dígito y un número
			if(preg_match("/^\d$/", $_POST["numeroreferenciasban"])){
				// Decodifica el JSON en un arreglo asociativo
				$referenciasbancarias_decoded = json_decode($_POST["refbanc"], true);

				// Verifica que el número de referencias coincida con la cantidad real
				if (is_array($referenciasbancarias_decoded) && count($referenciasbancarias_decoded) == $_POST["numeroreferenciasban"]) {
					$referenciasban_contador = 1;
					//Recorremos el arreglo
					foreach ($referenciasbancarias_decoded as &$referencia_bancaria) {
						//Checa que los campos no estén vacíos
						if (empty($referencia_bancaria["nombre"]) || empty($referencia_bancaria["apellidopat"]) || empty($referencia_bancaria["apellidomat"]) || empty($referencia_bancaria["relacion"]) || empty($referencia_bancaria["rfc"]) || empty($referencia_bancaria["curp"]) || empty($referencia_bancaria["porcentaje"])) {
							die(json_encode(array("error", "Existen campos vacíos en las referencias bancarias, por favor, verifique la información")));
						}else{
							//Validaciones
							if (!preg_match("/^[\pL\s'-]+$/u", $referencia_bancaria["nombre"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia bancaria " . $referenciasban_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidopat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia bancaria " . $referenciasban_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidomat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia bancaria " . $referenciasban_contador)));
							} else if (!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $referencia_bancaria["rfc"])) {
								die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789 en el RFC de la referencia bancaria " . $referenciasban_contador)));
							} else if (!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $referencia_bancaria["curp"])) {
								die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR en el CURP de la referencia bancaria " . $referenciasban_contador)));
							} else if (!preg_match("/^[0-9]+$/", $referencia_bancaria["porcentaje"])) {
								die(json_encode(array("error", "El porcentaje de derecho de la referencia bancaria " . $referenciasban_contador . " debe ser númerico")));
							}
						}

						// Aplicamos mb_strtoupper a los valores de cadena
						//Le quitamos los acentos
						$referencia_bancaria["nombre"] = mb_strtoupper(quitarAcentos($referencia_bancaria["nombre"], 'UTF-8'));
						$referencia_bancaria["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidopat"], 'UTF-8'));
						$referencia_bancaria["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidomat"], 'UTF-8'));
						$referencia_bancaria["rfc"] = mb_strtoupper(quitarAcentos($referencia_bancaria["rfc"], 'UTF-8'));
						$referencia_bancaria["curp"] = mb_strtoupper(quitarAcentos($referencia_bancaria["curp"], 'UTF-8'));

						if($_POST["numeroreferenciasban"] == 1){
							$referencia_bancaria["porcentaje"] = 100;
						}else{
							$referencia_bancaria["porcentaje"] = 50;
						}

						$referenciasban_contador++;
					}
					// Asigna el valor de "refbanc" después de validar
					$refbanc = json_encode($referenciasbancarias_decoded); // Convierte el arreglo de vuelta a JSON
				} else {
					die(json_encode(array("error", "El número de referencias bancarias ingresado no coincide con el enviado, por favor, verifique la información")));
				}
			} else {
				die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
			}
		} else {
			// Asigna "null" si "numeroreferenciasban" está vacío
			$refbanc = null;
		}

		//CUENTA BANCARIA PERSONAL
		//Checa si el banco de la cuenta bancaria personal está vacío 
		if(empty($_POST["banco_personal"])){
			$banco_personal = null;
		}else{
			//Checa si el banco de la cuenta bancaria personal tiene el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_personal"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco de la cuenta personal")));
			}else{
				$banco_personal = $_POST["banco_personal"];
				//Conviertelo en mayúsculas
				$banco_personal = mb_strtoupper($banco_personal, 'UTF-8');
				//Quitale los acentos
				$banco_personal = quitarAcentos($banco_personal);
			}
		}

		//Checa si la cuenta de la cuenta bancaria personal está vacío 
		if(empty($_POST["cuenta_personal"])){
			$cuenta_personal = null;
		}else{
			//Checa si el banco de la cuenta bancaria personal tiene el formato adecuado
			if(!preg_match("/^\d{10}$/", $_POST["cuenta_personal"])){
				die(json_encode(array("error", "La cuenta bancaria personal debe contener exactamente 10 números")));
			}else{
				$cuenta_personal = $_POST["cuenta_personal"];
			}
		}

		//Checa si la clabe de la cuenta bancaria personal está vacío 
		if(empty($_POST["clabe_personal"])){
			$clabe_personal = null;
		}else{
			//Checa si la clabe de la cuenta bancaria personal tiene el formato adecuado
			if(!preg_match("/^\d{18}$/", $_POST["clabe_personal"])){
				die(json_encode(array("error", "La clabe bancaria personal debe contener exactamente 18 números")));
			}else{
				$clabe_personal = $_POST["clabe_personal"];
			}
		}

		//Checa si el plástico de la cuenta bancaria personal está vacío 
		if(empty($_POST["plastico_personal"])){
			$plastico_personal = null;
		}else{
			//Checa si el plástico de la cuenta bancaria personal tiene el formato adecuado
			if(!preg_match("/^\d{16}$/", $_POST["plastico_personal"])){
				die(json_encode(array("error", "El plástico de la cuenta bancaria personal debe contener exactamente 16 números")));
			}else{
				$plastico_personal = $_POST["plastico_personal"];
			}
		}

		//CUENTA BANCARIA NÓMINA
		//Checa si el banco de la cuenta bancaria nómina está vacío 
		if(empty($_POST["banco_nomina"])){
			$banco_nomina = null;
		}else{
			//Checa si el banco de la cuenta bancaria nómina tiene el formato adecuado
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_nomina"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco de la cuenta nómina")));
			}else{
				$banco_nomina = $_POST["banco_nomina"];
				//Conviertelo en mayúsculas
				$banco_nomina = mb_strtoupper($banco_nomina, 'UTF-8');
				//Quitale los acentos
				$banco_nomina = quitarAcentos($banco_nomina);
			}
		}

		//Checa si la cuenta de la cuenta bancaria nómina está vacío 
		if(empty($_POST["cuenta_nomina"])){
			$cuenta_nomina = null;
		}else{
			//Checa si el banco de la cuenta bancaria nómina tiene el formato adecuado
			if(!preg_match("/^\d{10}$/", $_POST["cuenta_nomina"])){
				die(json_encode(array("error", "La cuenta bancaria nómina debe contener exactamente 10 números")));
			}else{
				$cuenta_nomina = $_POST["cuenta_nomina"];
			}
		}

		//Checa si la clabe de la cuenta bancaria nómina está vacío 
		if(empty($_POST["clabe_nomina"])){
			$clabe_nomina = null;
		}else{
			//Checa si la clabe de la cuenta bancaria nómina tiene el formato adecuado
			if(!preg_match("/^\d{18}$/", $_POST["clabe_nomina"])){
				die(json_encode(array("error", "La clabe bancaria nómina debe contener exactamente 18 números")));
			}else{
				$clabe_nomina = $_POST["clabe_nomina"];
			}
		}

		//Checa si el plástico de la cuenta bancaria nómina está vacío 
		if(empty($_POST["plastico"])){
			$plastico = null;
		}else{
			//Checa si el plástico de la cuenta bancaria nómina tiene el formato adecuado
			if(!preg_match("/^\d{16}$/", $_POST["plastico"])){
				die(json_encode(array("error", "El plástico de la cuenta bancaria nómina debe contener exactamente 16 números")));
			}else{
				$plastico = $_POST["plastico"];
			}
		}

		/*
		=============================================
		TERMINA LA VALIDACIÓN DE LOS DATOS BANCARIOS
		=============================================
		*/

		/**
		 * !   ██████   ██████   ██████ ██    ██ ███    ███ ███████ ███    ██ ████████  █████   ██████ ██  ██████  ███    ██ 
		 * !   ██   ██ ██    ██ ██      ██    ██ ████  ████ ██      ████   ██    ██    ██   ██ ██      ██ ██    ██ ████   ██ 
		 * !   ██   ██ ██    ██ ██      ██    ██ ██ ████ ██ █████   ██ ██  ██    ██    ███████ ██      ██ ██    ██ ██ ██  ██ 
		 * !   ██   ██ ██    ██ ██      ██    ██ ██  ██  ██ ██      ██  ██ ██    ██    ██   ██ ██      ██ ██    ██ ██  ██ ██ 
		 * !   ██████   ██████   ██████  ██████  ██      ██ ███████ ██   ████    ██    ██   ██  ██████ ██  ██████  ██   ████                                                                                                                   
		*/

		/*
		===============================================
		EMPIEZA LA VALIDACIÓN DE LA PAPELERÍA RECIBIDA
		===============================================
		*/

        //DOCUMENTOS
        $checktipospapeleria = $object->_db->prepare("SELECT id, nombre FROM tipo_papeleria"); // Añadir "id" a la consulta
		$checktipospapeleria->execute();
		$fetchtipopapeleria = $checktipospapeleria->fetchAll(PDO::FETCH_ASSOC);

		$arraypapeleria = [];

		foreach ($fetchtipopapeleria as $tipo) {
			$inputName = 'papeleria' . $tipo["id"]; // Usar el ID como clave en lugar de la secuencia

			if (isset($_FILES[$inputName]['name'])) {
				$allowed = array('jpeg', 'png', 'jpg', 'pdf');
				$filename = $_FILES[$inputName]['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if (!in_array($ext, $allowed)) {
					die(json_encode(array("error", "Solo se permite jpg, jpeg, pngs y pdfs en " . $tipo["nombre"])));
				} elseif ($_FILES[$inputName]['size'] > 10485760) {
					die(json_encode(array("error", "El archivo debe pesar ser menos de 10 MB en " . $tipo["nombre"])));
				} else {
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					$mimetype = finfo_file($finfo, $_FILES[$inputName]["tmp_name"]);
					finfo_close($finfo);

					if ($mimetype != "image/jpeg" && $mimetype != "image/png" && $mimetype != "application/pdf") {
						die(json_encode(array("error", "Por favor, asegúrese de que la imagen sea originalmente un archivo png, jpg, jpeg y pdf en " . $tipo["nombre"])));
					}

					$arraypapeleria[$tipo["id"]] = $_FILES[$inputName]; // Usar el ID como clave
				}
			} else {
				$arraypapeleria[$tipo["id"]] = null; // Usar el ID como clave
			}
		}

        /*
		===============================================
		TERMINA LA VALIDACIÓN DE LA PAPELERÍA RECIBIDA
		===============================================
		*/

		//Debido a que PHP no acepta el request method PUT (Bueno si lo acepta pero solo acepta json) utilizamos una variable method que nos permite saber si necesitamos insertar o actualizar
		switch($_POST["method"]){
			//En este caso, voy a insertar el expediente completo
			case "store":
				//Hago una instancia de la clase y le envío las variables en la clase
				$expediente = new Expedientes($select2, $numero_expediente, $numero_nomina, $asistencia_empleado, $puesto, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $posee_telempresa, $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $posee_laptop, $marca_laptop, $modelo_laptop, $serie_laptop, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaapat, $emergenciaamat, $emergenciarelacion, $emergenciatelefono, $emergencianom2, $emergenciaapat2, $emergenciaamat2, $emergenciarelacion2, $emergenciatelefono2, $capacitacion, $antidoping, $tipo_sangre, $vacante, $radio2, $nomfam, $apellidopatfam, $apellidopatfam,null, $refbanc, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $arraypapeleria);
				$logged_user = $_SESSION['nombre']. ' ' .$_SESSION['apellidopat']. ' ' .$_SESSION['apellidomat'];
				//Una vez que se hayan almacenado las variables, llama al metodo para crear el expediente
				$expediente ->Crear_expediente($logged_user);
				//Cuando termine, envía al usuario la notificación de que el proceso fue un éxito
				die(json_encode(array("success", "Se ha creado el expediente")));
			break;
			//En este caso, voy a editar el expediente completo
			case "edit":
				//Hago una instancia de la clase y le envío las variables en la clase
				$expediente = new Expedientes($select2, $numero_expediente, $numero_nomina, $asistencia_empleado, $puesto, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $posee_telempresa, $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $posee_laptop, $marca_laptop, $modelo_laptop, $serie_laptop, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaapat, $emergenciaamat, $emergenciarelacion, $emergenciatelefono, $emergencianom2, $emergenciaapat2, $emergenciaamat2, $emergenciarelacion2, $emergenciatelefono2, $capacitacion, $antidoping, $tipo_sangre, $vacante, $radio2, $nomfam, $apellidopatfam, $apellidopatfam,null, $refbanc, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $arraypapeleria);
				$logged_user = $_SESSION['nombre']. ' ' .$_SESSION['apellidopat']. ' ' .$_SESSION['apellidomat'];
				//Una vez que se hayan almacenado las variables, llama al metodo para editar el expediente
				$delete_array = $_POST["delete_switch_array_json"];
				$delete_array = json_decode($delete_array, true);
				$expediente ->Crear_expediente($logged_user, $delete_array);
				//Estatus
				$situacion = null;
				$estatus_empleado = null;
				$estatus_fecha = null;
				$numero_baja = null;
				$fijo_mensual = null;
				$tipo_esquema = null;
				$motivo = null;
				//SITUACIÓN, ESTATUS EMPLEADO Y MOTIVO
				if (!empty($_POST["situacion"])) {
					$situacion_array = array("ALTA", "BAJA", "PRESTADOR_DE_SERVICIOS");
					if (in_array($_POST["situacion"], $situacion_array)) {
						if($_POST["situacion"] == "ALTA"){
							$estatus_array = array("NUEVO INGRESO", "REINGRESO");
							if (in_array($_POST["estatus_empleado"], $estatus_array)) {
								$situacion = $_POST["situacion"];
								$estatus_empleado = $_POST["estatus_empleado"];
								$motivo = null;
							}else if(empty($_POST["estatus_empleado"])){
								die(json_encode(array("error", "El campo estatus del empleado es requerido")));
							}else{
								die(json_encode(array("error", "El valor escogido en el dropdown estatus del empleado está modificado, por favor, vuelva a poner el valor original en el dropdown")));
							}
						}else if ($_POST["situacion"] == "BAJA") {
							$estatus_array = array("FALLECIMIENTO", "ABANDONO_DE_TRABAJO", "RENUNCIA_VOLUNTARIA", "LIQUIDACION");
							if (in_array($_POST["estatus_empleado"], $estatus_array)) {
								$estatus_empleado = $_POST["estatus_empleado"];
								if ($estatus_empleado == "ABANDONO_DE_TRABAJO" || $estatus_empleado == "RENUNCIA_VOLUNTARIA" || $estatus_empleado == "LIQUIDACION") {
									if (empty($_POST["motivo_estatus"])) {
										die(json_encode(array("error", "El campo motivo del estatus es requerido")));
									} else {
										if (!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_estatus"])) {
											die(json_encode(array("error", "Solo se permiten caracteres alfabéticos y espacios en el motivo del estatus")));
										} else {
											// Verificar que el campo numero_baja sea numérico y requerido
											if (!empty($_POST["numero_baja"]) && is_numeric($_POST["numero_baja"])) {
												$numero_baja = $_POST["numero_baja"];
											} else {
												die(json_encode(array("error", "El campo número de baja es requerido y debe ser numérico")));
											}

											$situacion = $_POST["situacion"];
											$motivo = $_POST["motivo_estatus"];
										}
									}
								} else {
									// Verificar que el campo numero_baja sea numérico y requerido
									if (!empty($_POST["numero_baja"]) && is_numeric($_POST["numero_baja"])) {
										$numero_baja = $_POST["numero_baja"];
									} else {
										die(json_encode(array("error", "El campo número de baja es requerido y debe ser numérico")));
									}
									$situacion = $_POST["situacion"];
									$estatus_empleado = $_POST["estatus_empleado"];
									$motivo = null;
								}
							} elseif (empty($_POST["estatus_empleado"])) {
								die(json_encode(array("error", "El campo estatus del empleado es requerido")));
							} else {
								die(json_encode(array("error", "El valor escogido en el dropdown estatus del empleado está modificado, por favor, vuelva a poner el valor original en el dropdown")));
							}
						}else if($_POST["situacion"] == "PRESTADOR_DE_SERVICIOS"){
							$estatus_array = array("FIJO", "ESQUEMA_DE_PAGO");
							if (in_array($_POST["estatus_empleado"], $estatus_array)) {
								if($_POST["estatus_empleado"] == "FIJO"){
									if(empty($_POST["motivo_estatus"])){
										die(json_encode(array("error", "El campo motivo del estatus es requerido")));
									}else{
										if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_estatus"])){
											die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del estatus")));
										}else{
											if (!empty($_POST["fijo_mensual"]) && is_numeric($_POST["fijo_mensual"])) {
												$fijo_mensual = $_POST["fijo_mensual"];
											} else {
												die(json_encode(array("error", "El campo de cantidad mensual en el estatus es requerido y debe ser numérico")));
											}
										
											$situacion = $_POST["situacion"];
											$estatus_empleado = $_POST["estatus_empleado"];
											$motivo = $_POST["motivo_estatus"];
										}
									}
								}else{
									if(empty($_POST["motivo_estatus"])){
										die(json_encode(array("error", "El campo motivo del estatus es requerido")));
									}else{
										if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_estatus"])){
											die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del estatus")));
										}else{
											if (!empty($_POST["tipo_esquema"])) {
												$tipo_esquema = $_POST["tipo_esquema"];
											} else {
												die(json_encode(array("error", "El campo de tipo de esquema en el estatus es requerido")));
											}				
											$situacion = $_POST["situacion"];
											$estatus_empleado = $_POST["estatus_empleado"];
											$motivo = $_POST["motivo_estatus"];
										}
									}
								}
							}else if(empty($_POST["estatus_empleado"])){
								die(json_encode(array("error", "El campo estatus del empleado es requerido")));
							}else{
								die(json_encode(array("error", "El valor escogido en el dropdown estatus del empleado está modificado, por favor, vuelva a poner el valor original en el dropdown")));
							}
						}
					}else if(empty($_POST["situacion"])){
						die(json_encode(array("error", "El campo situación del empleado es requerido")));
					}else{
						die(json_encode(array("error", "El valor escogido en el dropdown situación empleado está modificado, por favor, vuelva a poner el valor original en el dropdown")));
					}
					//FECHA DEL ESTATUS
					if(empty($_POST["estatus_fecha"])){
						$estatus_fecha = null;
					}else{
						if(!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $_POST["estatus_fecha"])){
							die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de estatus")));
						}else{
							$estatus_fecha = $_POST["estatus_fecha"];
						}
					}
				}
				//Instancia del estatus
				Expedientes::Estatus_expediente($_POST["id_expediente"], $situacion, $estatus_empleado, $estatus_fecha, $numero_baja, $fijo_mensual, $tipo_esquema, $motivo);
				//Cuando termine, envía al usuario la notificación de que el proceso fue un éxito
				die(json_encode(array("success", "Se ha editado el expediente")));
			break;
		}
	}else{
		die(json_encode(array("error", "Faltan variables requeridas en la solicitud.")));
	}
/**
 * *   ██ ███    ██  ██████ ██ ██████  ███████ ███    ██  ██████ ██  █████  ███████ 
 * *   ██ ████   ██ ██      ██ ██   ██ ██      ████   ██ ██      ██ ██   ██ ██      
 * *   ██ ██ ██  ██ ██      ██ ██   ██ █████   ██ ██  ██ ██      ██ ███████ ███████ 
 * *   ██ ██  ██ ██ ██      ██ ██   ██ ██      ██  ██ ██ ██      ██ ██   ██      ██ 
 * *   ██ ██   ████  ██████ ██ ██████  ███████ ██   ████  ██████ ██ ██   ██ ███████                                                                                  
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "Incidencias"){
	if(isset($_POST["tipo_incidencia_papel"]) && $_POST["tipo_incidencia_papel"] == "Permiso"){

		//CHECAR SI EL USUARIO TIENE PERMISO PARA REALIZAR ACCIONES
		if((Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
			die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
		}

		//CHECA SI EL USUARIO TIENE ASIGANDO UN JEFE EN LA TABLA JERARQUÍA
		$check_jerarquia = $object -> _db -> prepare("select jerarquia_id from jerarquia where rol_id=:rolid AND jerarquia_id is not null");
		$check_jerarquia -> execute(array(':rolid' => $_SESSION["rol"]));
		$count_jerarquia = $check_jerarquia -> rowCount();
		if($count_jerarquia == 0){
			die(json_encode(array("error", "Su usuario no tiene asignado un jefe")));
		}

		//CHECA SI EL JEFE DEL USUARIO ESTÁ REGISTRADO EN LA INTRANET
		switch(Roles::FetchSessionRol($_SESSION["rol"])){
			case "Director":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id WHERE r1.nombre = 'Director general' AND r2.nombre = 'Director'");
				$check_path -> execute();
				$i = 0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					$check_user_exists = $object -> _db -> prepare("SELECT correo FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre=:rolnom AND usuarios.correo='servicios_al_colaborador@sinttecom.com'");
					$check_user_exists -> execute(array(':rolnom' => $fetch_path["level"]));
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			case "Gerente":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r2.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id WHERE r1.nombre = 'Director general' AND r3.nombre = 'Gerente' UNION ALL SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id WHERE r1.nombre = 'Director general' AND r3.nombre = 'Gerente'");
				$check_path -> execute();
				$i=0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					if(Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchUserDepartamento($_SESSION["id"]) == "TI" || Roles::FetchUserDepartamento($_SESSION["id"]) == "Finanzas"){
						$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado="ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
						$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
					}else{
						if($fetch_path["level"] != "Director"){
							$check_user_exists = $object -> _db -> prepare("SELECT correo FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre=:rolnom AND usuarios.correo='servicios_al_colaborador@sinttecom.com'");
							$check_user_exists -> execute(array(':rolnom' => $fetch_path["level"]));
						}else{
							$check_user_exists = $object -> _db -> prepare('SELECT u1.correo FROM usuarios u1 INNER JOIN roles r1 ON r1.id = u1.roles_id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id LEFT JOIN expedientes e1 ON e1.users_id = u1.id LEFT JOIN estatus_empleado ee ON ee.expedientes_id = e1.id WHERE d1.departamento = "Operaciones" AND r1.nombre = :rolnom1 AND ee.situacion_del_empleado = "ALTA" UNION ALL SELECT u2.correo FROM usuarios u2 INNER JOIN roles r2 ON r2.id=u2.roles_id LEFT JOIN departamentos d2 ON d2.id=u2.departamento_id LEFT JOIN expedientes e2 ON e2.users_id = u2.id LEFT JOIN estatus_empleado ee2 ON ee2.expedientes_id = e2.id WHERE NOT EXISTS(SELECT u3.correo FROM usuarios u3 INNER JOIN roles r3 ON r3.id = u3.roles_id LEFT JOIN departamentos d3 ON d3.id = u3.departamento_id LEFT JOIN expedientes e3 ON e3.users_id = u3.id LEFT JOIN estatus_empleado ee3 ON ee3.expedientes_id = e3.id WHERE d3.departamento = "Operaciones" AND r3.nombre = :rolnom3 AND ee3.situacion_del_empleado = "ALTA") AND r2.nombre= :rolnom2 AND d2.departamento="Ventas" AND ee2.situacion_del_empleado = "ALTA"');
							$check_user_exists -> execute(array(':rolnom1' => $fetch_path["level"], ':rolnom2' => $fetch_path["level"], ':rolnom3' => $fetch_path["level"]));
						}
					}
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			case "Empleado":
			case "Supervisor":
			case "Tecnico":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r3.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre =:rolnom1 UNION ALL SELECT r2.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre = :rolnom2 UNION ALL SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre = :rolnom3");
				$check_path -> execute(array(':rolnom1' => Roles::FetchSessionRol($_SESSION["rol"]), ':rolnom2' => Roles::FetchSessionRol($_SESSION["rol"]), ':rolnom3' => Roles::FetchSessionRol($_SESSION["rol"])));
				$i=0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					if(Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchUserDepartamento($_SESSION["id"]) == "TI" || Roles::FetchUserDepartamento($_SESSION["id"]) == "Finanzas"){
						$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado = "ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
						$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
					}else{
						if($fetch_path["level"] != "Director"){
							$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado = "ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
							$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
						}else{
							$check_user_exists = $object -> _db -> prepare('SELECT u1.correo FROM usuarios u1 INNER JOIN roles r1 ON r1.id = u1.roles_id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id LEFT JOIN expedientes e1 ON e1.users_id = u1.id LEFT JOIN estatus_empleado ee ON ee.expedientes_id = e1.id WHERE d1.departamento = "Operaciones" AND r1.nombre = :rolnom1 AND ee.situacion_del_empleado = "ALTA" UNION ALL SELECT u2.correo FROM usuarios u2 INNER JOIN roles r2 ON r2.id=u2.roles_id LEFT JOIN departamentos d2 ON d2.id=u2.departamento_id LEFT JOIN expedientes e2 ON e2.users_id = u2.id LEFT JOIN estatus_empleado ee2 ON ee2.expedientes_id = e2.id WHERE NOT EXISTS(SELECT u3.correo FROM usuarios u3 INNER JOIN roles r3 ON r3.id = u3.roles_id LEFT JOIN departamentos d3 ON d3.id = u3.departamento_id LEFT JOIN expedientes e3 ON e3.users_id = u3.id LEFT JOIN estatus_empleado ee3 ON ee3.expedientes_id = e3.id WHERE d3.departamento = "Operaciones" AND r3.nombre = :rolnom3 AND ee3.situacion_del_empleado = "ALTA") AND r2.nombre= :rolnom2 AND d2.departamento="Ventas" AND ee2.situacion_del_empleado = "ALTA"');
							$check_user_exists -> execute(array(':rolnom1' => $fetch_path["level"], ':rolnom2' => $fetch_path["level"], ':rolnom3' => $fetch_path["level"]));
						}
					}
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			default:
				die(json_encode(array("error", "Su usuario no se encuentra en la jerarquía, por favor, contacte a un administrador")));
		}		

		//TIPO DE PERMISO
		$tipopermiso_array = array("REGLAMENTARIA", "NO_REGLAMENTARIA");
		if (in_array($_POST["tipo_permiso"], $tipopermiso_array)) {
             $tipo_permiso = $_POST["tipo_permiso"];
        }else if(empty($_POST["tipo_permiso"])){
            die(json_encode(array("error", "El tipo de permiso no puede estar vacío")));
        }else{
             die(json_encode(array("error", "El valor escogido en el dropdown de tipo de permiso está modificado, por favor, vuelva a poner el valor original en el dropdown")));
        }

		if($tipo_permiso == "REGLAMENTARIA"){
			//PERMISO_R
			$permisor_array = array("FALLECIMIENTO", "MATRIMONIO", "ESCOLARIDAD", "NACIMIENTO_ADOPCION_ABORTO", "HOME_OFFICE", "OTRO");
			if (in_array($_POST["permiso_r"], $permisor_array)) {
				 $permiso_r = $_POST["permiso_r"];
			}else if(empty($_POST["permiso_r"])){
				die(json_encode(array("error", "Por favor, seleccione una opción de permiso reglamentario")));
			}else{
				 die(json_encode(array("error", "El valor escogido en el dropdown para eligir un permiso reglamentario está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}

			//OBSERVACIONES Y/O COMENTARIOS  - PERMISO REGLAMENTARIO
			if(empty($_POST["observaciones_permiso_r"])){
				$observaciones_permiso_r = null;
			}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["observaciones_permiso_r"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las observaciones de permisos reglamentarios")));
			}else{
				$observaciones_permiso_r = $_POST["observaciones_permiso_r"];
			}

			//ARCHIVO - PERMISO REGLAMENTARIO
			if(isset($_FILES['justificante_permiso_r']['name'])){
				$allowed = array('pdf', 'jpeg', 'png', 'jpg');
				$filename_justificante_permiso_r = $_FILES['justificante_permiso_r']['name'];
				$ext = pathinfo($filename_justificante_permiso_r, PATHINFO_EXTENSION);
				if (!in_array($ext, $allowed)) {
					die(json_encode(array("error", "Solo se permite pdf, jpg, jpeg y pngs")));
				}else if($_FILES['justificante_permiso_r']['size'] > 10485760){
					die(json_encode(array("error", "Los archivos deben pesar ser menos de 10 MB")));
				}else{
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					$mimetype = finfo_file($finfo, $_FILES["justificante_permiso_r"]["tmp_name"]);
					finfo_close($finfo);
					if($mimetype != "image/jpeg" && $mimetype != "image/png"  && $mimetype != "application/pdf"){
						die(json_encode(array("error", "Por favor, asegúrese que la imagen sea originalmente un archivo pdf, png, jpg y jpeg")));
					}
				}
				$justificante_permiso_r=$_FILES['justificante_permiso_r'];
			}else{
				die(json_encode(array("error", "Se necesita subir un justificante para los permisos reglamentarios")));
			}

			if($permiso_r == "FALLECIMIENTO" || $permiso_r == "MATRIMONIO" || $permiso_r == "ESCOLARIDAD" || $permiso_r == "NACIMIENTO_ADOPCION_ABORTO"){
				//FECHA DE INICIO DE PERMISO
				if(empty($_POST["fechainicio_pd"])){
					die(json_encode(array("error", "Por favor, ingrese una fecha de inicio del permiso reglamentario")));
				}else if(!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $_POST["fechainicio_pd"])){
					die(json_encode(array("error", "Formato incorrecto, asegúrese que escoger la fecha de inicio del permiso usando el asistente")));
				}else{
					$fechainicio_pd= $_POST["fechainicio_pd"];
				}

				//FECHA FIN DE PERMISO
				if(empty($_POST["fechafin_pd"])){
					die(json_encode(array("error", "La fecha de fin no puede estar vacía, asegúrese de escoger la fecha de inicio usando el asistente")));
				}else if(!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $_POST["fechafin_pd"])){
					die(json_encode(array("error", "Formato incorrecto, asegúrese que escoger la fecha de inicio del permiso para calcular la fecha de fin")));
				}else{
					$fechafin_pd= $_POST["fechafin_pd"];
				}

				//Metodo para guardar Permiso reglamentario FALLECIMIENTO, MATRIMONIO, ESCOLARIDAD Y NACIMIENTO
				switch($_POST["method"]){
					case "store":
						$permiso = new Permiso($_SESSION["id"], $_SESSION["rol"]);
						$permiso -> reglamentario_descriptivo($permiso_r, $fechainicio_pd, $fechafin_pd, $observaciones_permiso_r, $filename_justificante_permiso_r, $justificante_permiso_r, $jefe_array);
						die(json_encode(array("success", "Se ha creado un permiso reglamentario descriptivo!")));
					break;
				}

			}else if($permiso_r == "HOME_OFFICE" || $permiso_r == "OTRO"){
				//PERIODO DE AUSENCIA
				if(empty($_POST["periodo_pnd"])){
					die(json_encode(array("error", "El periodo de permiso reglamentario no puede estar vacío")));
				}else if(!preg_match("/^\d{4}\/\d{2}\/\d{2}+[\s](0?[1-9]|1[012])(:[0-5]\d) [APap][mM]+[\s]-[\s]\d{4}\/\d{2}\/\d{2}+[\s](0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/", $_POST["periodo_pnd"])){
					die(json_encode(array("error", "El periodo de permiso REGLAMENTARIO HOME OFFICE/OTRO no tiene el formato requerido, por favor, escoga una fecha usando el asistente")));
				}else{
					$periodo_pnd = $_POST["periodo_pnd"];
				}
			
				//MOTIVO DEL PERMISO REGLAMENTARIO HOME OFFICE/OTRO
				if(empty($_POST["motivo_pnd"])){
					die(json_encode(array("error", "El motivo del permiso reglametario HOME OFFICE/OTRO no puede estar vacío")));
				}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_pnd"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del permiso reglametario HOME OFFICE/OTRO")));
				}else{
					$motivo_pnd = $_POST["motivo_pnd"];
				}

				//Metodo para guardar Permiso reglamentario HOME OFFICE/OTRO
				switch($_POST["method"]){
					case "store":
						$permiso = new Permiso($_SESSION["id"], $_SESSION["rol"]);
						$permiso -> reglamentario_no_descriptivo($permiso_r, $periodo_pnd, $motivo_pnd, $observaciones_permiso_r, $filename_justificante_permiso_r, $justificante_permiso_r, $jefe_array);
						die(json_encode(array("success", "Se ha creado un permiso reglamentario no descriptivo!")));
					break;
				}

			}else{
				die(json_encode(array("error", "Por favor, asegúrese de seleccionar un permiso reglamentario del dropdown y no uno modificado por la consola")));
			}
		}else if($tipo_permiso == "NO_REGLAMENTARIA"){
			//PERMISO_NR
			$permiso_nr = array("RETARDO", "SALIDA", "AUSENCIA");
			if (in_array($_POST["permiso_nr"], $permiso_nr)) {
				 $permiso_nr = $_POST["permiso_nr"];
			}else if(empty($_POST["permiso_nr"])){
				die(json_encode(array("error", "Por favor, selecciona una opción de permiso no reglamentario")));
			}else{
				 die(json_encode(array("error", "El valor escogido en el dropdown para eligir un permiso no reglamentario está modificado, por favor, vuelva a poner el valor original en el dropdown")));
			}

			//MOTIVO DEL PERMISO NO REGLAMENTARIO
			if(empty($_POST["motivo_permiso_nr"])){
				die(json_encode(array("error", "El motivo del permiso no reglametario no puede estar vacío")));
			}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_permiso_nr"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del permiso no reglametario")));
			}else{
				$motivo_permiso_nr = $_POST["motivo_permiso_nr"];
			}

			//OBSERVACIONES Y/O COMENTARIOS  - PERMISO NO REGLAMENTARIO
			if(empty($_POST["observaciones_permiso_nr"])){
				$observaciones_permiso_nr = null;
			}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["observaciones_permiso_nr"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las observaciones de permisos no reglamentarios")));
			}else{
				$observaciones_permiso_nr = $_POST["observaciones_permiso_nr"];
			}

			//POSEE JUSTICANTE, PERMISO NO REGLAMENTARIO
			if(empty($_POST["posee_jpermiso_nr"])){
				die(json_encode(array("error", "Necesitamos saber si tiene justificante o no!")));
			}else if($_POST["posee_jpermiso_nr"] != "si" && $_POST["posee_jpermiso_nr"] != "no"){
				die(json_encode(array("error", "Solo se puede elegir si ó no en el radiobutton de justificantes, por favor, regrese el valor original")));
			}else{
				$posee_jpermiso_nr = $_POST["posee_jpermiso_nr"];
			}

			//JUSTIFICANTE NO REGLAMENTARIO	
			if($posee_jpermiso_nr  == "si"){
				if(isset($_FILES['justificante_permiso_nr']['name'])){
					$allowed = array('pdf', 'jpeg', 'png', 'jpg');
					$filename_justificante_permiso_nr = $_FILES['justificante_permiso_nr']['name'];
					$ext = pathinfo($filename_justificante_permiso_nr, PATHINFO_EXTENSION);
					if (!in_array($ext, $allowed)) {
						die(json_encode(array("error", "Solo se permite pdf, jpg, jpeg y pngs")));
					}else if($_FILES['justificante_permiso_nr']['size'] > 10485760){
						die(json_encode(array("error", "Los archivos deben pesar ser menos de 10 MB")));
					}else{
						$finfo = finfo_open(FILEINFO_MIME_TYPE);
						$mimetype = finfo_file($finfo, $_FILES["justificante_permiso_nr"]["tmp_name"]);
						finfo_close($finfo);
						if($mimetype != "image/jpeg" && $mimetype != "image/png"  && $mimetype != "application/pdf"){
							die(json_encode(array("error", "Por favor, asegúrese que la imagen sea originalmente un archivo pdf, png, jpg y jpeg")));
						}
					}
					$justificante_permiso_nr=$_FILES['justificante_permiso_nr'];
				}else{
					die(json_encode(array("error", "Por favor, si no tiene justificante, eliga la opción de no!")));
				}
			}else if($posee_jpermiso_nr  == "no"){
				$filename_justificante_permiso_nr=null;
				$justificante_permiso_nr=null;
			}

			if($permiso_nr == "RETARDO" || $permiso_nr == "SALIDA"){
				//PERMISO NO REGLAMENTARIO - PERIODO RETARDO/SALIDA
				if(empty($_POST["periodo_pnr_fh"])){
					die(json_encode(array("error", "El periodo de permiso no reglamentario RETARDO/SALIDA no puede estar vacío")));
				}else if(!preg_match("/^\d{4}\/\d{2}\/\d{2}+[\s](0?[1-9]|1[012])(:[0-5]\d) [APap][mM]+[\s]-[\s]\d{4}\/\d{2}\/\d{2}+[\s](0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/", $_POST["periodo_pnr_fh"])){
					die(json_encode(array("error", "El periodo de permiso no reglamentario RETARDO/SALIDA no tiene el formato requerido, por favor, escoga una fecha usando el asistente")));
				}else{
					$periodo_pnr_fh = $_POST["periodo_pnr_fh"];
				}


				//Metodo para guardar Permiso no reglamentario RETARDO Y SALIDA
				switch($_POST["method"]){
					case "store":
						$permiso = new Permiso($_SESSION["id"], $_SESSION["rol"]);
						$permiso -> no_reglamentario_g($permiso_nr, $periodo_pnr_fh, $motivo_permiso_nr, $observaciones_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr, $jefe_array);
						die(json_encode(array("success", "Se ha creado un permiso no reglamentario general!")));
					break;
				}	

			}else if($permiso_nr == "AUSENCIA"){
				//PERMISO NO REGLAMENTARIO - PERIODO AUSENCIA
				if(empty($_POST["periodo_pnr_f"])){
					die(json_encode(array("error", "El periodo de permiso no reglamentario AUSENCIA no puede estar vacío")));
				}else if(!preg_match("/^\d{4}\/\d{2}\/\d{2}+[\s]-[\s]\d{4}\/\d{2}\/\d{2}$/", $_POST["periodo_pnr_f"])){
					die(json_encode(array("error", "El periodo de permiso no reglamentario AUSENCIA no tiene el formato requerido, por favor, escoga una fecha usando el asistente")));
				}else{
					$periodo_pnr_f = $_POST["periodo_pnr_f"];
				}

				//Metodo para guardar Permiso no reglamentario AUSENCIA
				switch($_POST["method"]){
					case "store":
						$permiso = new Permiso($_SESSION["id"], $_SESSION["rol"]);
						$permiso -> no_reglamentario_a($permiso_nr, $periodo_pnr_f, $motivo_permiso_nr, $observaciones_permiso_nr, $posee_jpermiso_nr, $filename_justificante_permiso_nr, $justificante_permiso_nr, $jefe_array);
						die(json_encode(array("success", "Se ha creado un permiso no reglamentario ausencia!")));
					break;
				}

			}else{
				die(json_encode(array("error", "Por favor, asegúrese de seleccionar un permiso no reglamentario del dropdown y no uno modificado por la consola")));
			}
		}
	}else if(isset($_POST["tipo_incidencia_papel"]) && $_POST["tipo_incidencia_papel"] == "Incapacidad"){

		//CHECAR SI EL USUARIO TIENE PERMISO PARA REALIZAR ACCIONES
		if((Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
			die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
		}

		//CHECA SI EL USUARIO TIENE ASIGANDO UN JEFE EN LA TABLA JERARQUÍA
		$check_jerarquia = $object -> _db -> prepare("select jerarquia_id from jerarquia where rol_id=:rolid AND jerarquia_id is not null");
		$check_jerarquia -> execute(array(':rolid' => $_SESSION["rol"]));
		$count_jerarquia = $check_jerarquia -> rowCount();
		if($count_jerarquia == 0){
			die(json_encode(array("error", "Su usuario no tiene asignado un jefe")));
		}

		//CHECA SI EL JEFE DEL USUARIO ESTÁ REGISTRADO EN LA INTRANET
		switch(Roles::FetchSessionRol($_SESSION["rol"])){
			case "Director":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id WHERE r1.nombre = 'Director general' AND r2.nombre = 'Director'");
				$check_path -> execute();
				$i = 0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					$check_user_exists = $object -> _db -> prepare("SELECT correo FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre=:rolnom AND usuarios.correo='servicios_al_colaborador@sinttecom.com'");
					$check_user_exists -> execute(array(':rolnom' => $fetch_path["level"]));
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			case "Gerente":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r2.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id WHERE r1.nombre = 'Director general' AND r3.nombre = 'Gerente' UNION ALL SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id WHERE r1.nombre = 'Director general' AND r3.nombre = 'Gerente'");
				$check_path -> execute();
				$i=0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					if(Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchUserDepartamento($_SESSION["id"]) == "TI" || Roles::FetchUserDepartamento($_SESSION["id"]) == "Finanzas"){
						$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado="ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
						$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
					}else{
						if($fetch_path["level"] != "Director"){
							$check_user_exists = $object -> _db -> prepare("SELECT correo FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre=:rolnom AND usuarios.correo='servicios_al_colaborador@sinttecom.com'");
							$check_user_exists -> execute(array(':rolnom' => $fetch_path["level"]));
						}else{
							$check_user_exists = $object -> _db -> prepare('SELECT u1.correo FROM usuarios u1 INNER JOIN roles r1 ON r1.id = u1.roles_id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id LEFT JOIN expedientes e1 ON e1.users_id = u1.id LEFT JOIN estatus_empleado ee ON ee.expedientes_id = e1.id WHERE d1.departamento = "Operaciones" AND r1.nombre = :rolnom1 AND ee.situacion_del_empleado = "ALTA" UNION ALL SELECT u2.correo FROM usuarios u2 INNER JOIN roles r2 ON r2.id=u2.roles_id LEFT JOIN departamentos d2 ON d2.id=u2.departamento_id LEFT JOIN expedientes e2 ON e2.users_id = u2.id LEFT JOIN estatus_empleado ee2 ON ee2.expedientes_id = e2.id WHERE NOT EXISTS(SELECT u3.correo FROM usuarios u3 INNER JOIN roles r3 ON r3.id = u3.roles_id LEFT JOIN departamentos d3 ON d3.id = u3.departamento_id LEFT JOIN expedientes e3 ON e3.users_id = u3.id LEFT JOIN estatus_empleado ee3 ON ee3.expedientes_id = e3.id WHERE d3.departamento = "Operaciones" AND r3.nombre = :rolnom3 AND ee3.situacion_del_empleado = "ALTA") AND r2.nombre= :rolnom2 AND d2.departamento="Ventas" AND ee2.situacion_del_empleado = "ALTA"');
							$check_user_exists -> execute(array(':rolnom1' => $fetch_path["level"], ':rolnom2' => $fetch_path["level"], ':rolnom3' => $fetch_path["level"]));
						}
					}
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			case "Empleado":
			case "Supervisor":
			case "Tecnico":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r3.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre =:rolnom1 UNION ALL SELECT r2.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre = :rolnom2 UNION ALL SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre = :rolnom3");
				$check_path -> execute(array(':rolnom1' => Roles::FetchSessionRol($_SESSION["rol"]), ':rolnom2' => Roles::FetchSessionRol($_SESSION["rol"]), ':rolnom3' => Roles::FetchSessionRol($_SESSION["rol"])));
				$i=0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					if(Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchUserDepartamento($_SESSION["id"]) == "TI" || Roles::FetchUserDepartamento($_SESSION["id"]) == "Finanzas"){
						$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado = "ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
						$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
					}else{
						if($fetch_path["level"] != "Director"){
							$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado = "ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
							$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
						}else{
							$check_user_exists = $object -> _db -> prepare('SELECT u1.correo FROM usuarios u1 INNER JOIN roles r1 ON r1.id = u1.roles_id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id LEFT JOIN expedientes e1 ON e1.users_id = u1.id LEFT JOIN estatus_empleado ee ON ee.expedientes_id = e1.id WHERE d1.departamento = "Operaciones" AND r1.nombre = :rolnom1 AND ee.situacion_del_empleado = "ALTA" UNION ALL SELECT u2.correo FROM usuarios u2 INNER JOIN roles r2 ON r2.id=u2.roles_id LEFT JOIN departamentos d2 ON d2.id=u2.departamento_id LEFT JOIN expedientes e2 ON e2.users_id = u2.id LEFT JOIN estatus_empleado ee2 ON ee2.expedientes_id = e2.id WHERE NOT EXISTS(SELECT u3.correo FROM usuarios u3 INNER JOIN roles r3 ON r3.id = u3.roles_id LEFT JOIN departamentos d3 ON d3.id = u3.departamento_id LEFT JOIN expedientes e3 ON e3.users_id = u3.id LEFT JOIN estatus_empleado ee3 ON ee3.expedientes_id = e3.id WHERE d3.departamento = "Operaciones" AND r3.nombre = :rolnom3 AND ee3.situacion_del_empleado = "ALTA") AND r2.nombre= :rolnom2 AND d2.departamento="Ventas" AND ee2.situacion_del_empleado = "ALTA"');
							$check_user_exists -> execute(array(':rolnom1' => $fetch_path["level"], ':rolnom2' => $fetch_path["level"], ':rolnom3' => $fetch_path["level"]));
						}
					}
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			default:
				die(json_encode(array("error", "Su usuario no se encuentra en la jerarquía, por favor, contacte a un administrador")));
		}		

		//NÚMERO DE LA INCAPACIDAD
		if(empty($_POST["numero_incapacidad"])){
			die(json_encode(array("error", "El número de la incapacidad no puede estar vacío")));
		}else if(!preg_match("/^[0-9]*$/", $_POST["numero_incapacidad"])){
			die(json_encode(array("error", "Solo se permiten números en el número de la incapacidad")));
		}else{
			$numero_incapacidad = $_POST["numero_incapacidad"];
		}

		//SERIE Y FOLIO DE LA INCAPACIDAD
		if(empty($_POST["serie_folio_incapacidad"])){
			die(json_encode(array("error", "La serie_folio de la incapacidad no puede estar vacía")));
		}else if(!preg_match("/^[\w]+$/i", $_POST["serie_folio_incapacidad"])){
			die(json_encode(array("error", "Solo se permiten caracteres alfanúmericos en la serie_folio de la incapacidad")));
		}else{
			$serie_folio_incapacidad = $_POST["serie_folio_incapacidad"];
		}

		//TIPO DE INCAPACIDAD
		$tipoincapacidad_array = array("INICIAL", "SUBSECUENTE", "POR RECAIDA", "POR MATERNIDAD", "ENLACE");
		if (in_array($_POST["tipo_incapacidad"], $tipoincapacidad_array)) {
            $tipo_incapacidad = $_POST["tipo_incapacidad"];
        }else if(empty($_POST["tipo_incapacidad"])){
            die(json_encode(array("error", "El tipo de incapacidad no puede estar vacía")));
        }else{
            die(json_encode(array("error", "El valor escogido en el dropdown de tipo incapacidad está modificado, por favor, vuelva a poner el valor original en el dropdown")));
        }

		//RAMO DE SEGURO
		$ramodeseguro_array = array("RIESGO DE TRABAJO", "ENFERMEDAD GENERAL", "MATERNIDAD");
		if (in_array($_POST["ramo_seguro_incapacidad"], $ramodeseguro_array)) {
            $ramo_seguro_incapacidad = $_POST["ramo_seguro_incapacidad"];
        }else if(empty($_POST["ramo_seguro_incapacidad"])){
            die(json_encode(array("error", "El ramo de seguro de la incapacidad no puede estar vacía")));
        }else{
            die(json_encode(array("error", "El valor escogido en el dropdown de ramo de seguro en la incapacidad está modificado, por favor, vuelva a poner el valor original en el dropdown")));
        }
		
		//PERIODO DE LA INCAPACIDAD
		if(empty($_POST["periodo_incapacidad"])){
			die(json_encode(array("error", "El periodo de la incapacidad no puede estar vacío")));
		}else if(!preg_match("/^\d{4}\/\d{2}\/\d{2}+[\s]-[\s]\d{4}\/\d{2}\/\d{2}$/", $_POST["periodo_incapacidad"])){
			die(json_encode(array("error", "El periodo de la incapacidad no tiene el formato requerido, por favor, escoga una fecha usando el asistente")));
		}else{
			$periodo_incapacidad = $_POST["periodo_incapacidad"];
		}
		
		//MOTIVO DE LA INCAPACIDAD
		if(empty($_POST["motivo_incapacidad"])){
			die(json_encode(array("error", "El motivo de la incapacidad  no puede estar vacío")));
		}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_incapacidad"])){
			die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo de la incapacidad")));
		}else{
			$motivo_incapacidad = $_POST["motivo_incapacidad"];
		}

		//OBSERVACIONES Y/O COMENTARIOS  - INCAPACIDAD
		if(empty($_POST["observaciones_incapacidad"])){
			$observaciones_incapacidad = null;
		}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["observaciones_incapacidad"])){
			die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las observaciones de las incapacidades")));
		}else{
			$observaciones_incapacidad = $_POST["observaciones_incapacidad"];
		}
		
		//JUSTIFICANTE - INCAPACIDAD
		if(isset($_FILES['comprobante_incapacidad']['name'])){
			$allowed = array('pdf', 'jpeg', 'png', 'jpg');
			$filename_comprobante_incapacidad = $_FILES['comprobante_incapacidad']['name'];
			$ext = pathinfo($filename_comprobante_incapacidad, PATHINFO_EXTENSION);
			if (!in_array($ext, $allowed)) {
				die(json_encode(array("error", "Solo se permite pdf, jpg, jpeg y pngs")));
			}else if($_FILES['comprobante_incapacidad']['size'] > 10485760){
				die(json_encode(array("error", "Los archivos deben pesar ser menos de 10 MB")));
			}else{
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mimetype = finfo_file($finfo, $_FILES["comprobante_incapacidad"]["tmp_name"]);
				finfo_close($finfo);
				if($mimetype != "image/jpeg" && $mimetype != "image/png"  && $mimetype != "application/pdf"){
					die(json_encode(array("error", "Por favor, asegúrese que la imagen sea originalmente un archivo pdf, png, jpg y jpeg")));
				}
			}
			$comprobante_incapacidad=$_FILES['comprobante_incapacidad'];
		}else{
			die(json_encode(array("error", "Se necesita subir un justificante para las incapacidades")));
		}	

		//Metodo para guardar INCAPACIDADES
		switch($_POST["method"]){
			case "store":
				$incapacidad = new Incapacidades($_SESSION["id"], $_SESSION["rol"]);
				$incapacidad -> crear_incapacidad($numero_incapacidad, $serie_folio_incapacidad, $tipo_incapacidad, $ramo_seguro_incapacidad, $periodo_incapacidad, $motivo_incapacidad, $observaciones_incapacidad, $filename_comprobante_incapacidad, $comprobante_incapacidad, $jefe_array);
				die(json_encode(array("success", "Se ha creado una incapacidad!")));
			break;
		}

	}else if(isset($_POST["tipo_incidencia_papel"]) && $_POST["tipo_incidencia_papel"] == "Acta_administrativa"){

		//CHECAR SI EL USUARIO TIENE PERMISO PARA REALIZAR ACCIONES
		if((Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
			die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
		}

		//FECHA DEL ACTA ADMINISTRATIVA
        if(empty($_POST["fecha_acta"])){
			die(json_encode(array("error", "La fecha del acta administrativa no puede estar vacío")));
		}else{
			if(!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $_POST["fecha_acta"])){
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha del acta administrativa")));
			}else{
                $fecha_acta = $_POST["fecha_acta"];
			}
		}

		//SELECT 2 - ACTAS ADMINISTRATIVAS
		if($_POST["caja_empleado"] != null){
			if(Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente" && Roles::FetchUserDepartamento($_SESSION["id"]) != "Capital humano"){
				$select_empleados = $object -> _db ->prepare("SELECT expedientes.id as expedienteid, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) as nombre FROM jerarquia j1 INNER JOIN jerarquia j2 ON j1.id=j2.jerarquia_id INNER JOIN roles r2 ON r2.id=j2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes ON expedientes.users_id=u2.id WHERE j2.jerarquia_id in (SELECT j3.jerarquia_id FROM jerarquia j3 GROUP BY j3.jerarquia_id HAVING j3.jerarquia_id >= (SELECT j4.id FROM jerarquia j4 INNER JOIN roles r3 ON r3.id=j4.rol_id WHERE r3.nombre=:rolnom AND IF(r3.nombre='Director general', d2.departamento IS NOT NULL, d2.departamento = (SELECT d3.departamento from usuarios u3 INNER JOIN departamentos d3 ON d3.id=u3.departamento_id WHERE u3.id=:sessionid))))");
				$select_empleados -> execute(array(':rolnom' => Roles::FetchSessionRol($_SESSION["rol"]), ':sessionid' => $_SESSION["id"]));
				$deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_KEY_PAIR);
				if (array_key_exists($_POST["caja_empleado"], $deploy_empleados)) {
					$array_key_acta_value = $deploy_empleados[$_POST["caja_empleado"]];
					if(isset($_POST["caja_empleado_text"]) && $_POST['caja_empleado_text'] == $array_key_acta_value){
						$caja_empleado = $_POST["caja_empleado"];
						$caja_empleado_text = $_POST["caja_empleado_text"];
					}else{
						die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
					}
				}else{
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los expedientes registrados")));
				}
			}else if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" && (Roles::FetchSessionRol($_SESSION["rol"]) != "Gerente" || Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente" && Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano"))){
				$select_empleados = $object -> _db ->prepare("SELECT expedientes.id AS expedienteid, CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) AS nombre FROM usuarios INNER JOIN expedientes ON expedientes.users_id=usuarios.id");
				$select_empleados -> execute();
				$deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_KEY_PAIR);
				if (array_key_exists($_POST["caja_empleado"], $deploy_empleados)) {
					$array_key_acta_value = $deploy_empleados[$_POST["caja_empleado"]];
					if(isset($_POST["caja_empleado_text"]) && $_POST['caja_empleado_text'] == $array_key_acta_value){
						$caja_empleado = $_POST["caja_empleado"];
						$caja_empleado_text = $_POST["caja_empleado_text"];
					}else{
						die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
					}
				}else{
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los expedientes registrados")));
				}
			}
		}else{
			die(json_encode(array("error", "Debe asignar un usuario al acta administrativa")));
		}
		
		//MOTIVO DEL ACTA ADMINISTRATIVA
		if(empty($_POST["motivo_acta"])){
			die(json_encode(array("error", "El motivo del acta administrativa no puede estar vacío")));
		}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_acta"])){
			die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del acta administrativa")));
		}else{
			$motivo_acta = $_POST["motivo_acta"];
		}
		
		//OBSERVACIONES DEL ACTA ADMINISTRATIVA
		if(!empty($_POST["obcomen_acta"])){
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["obcomen_acta"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las observaciones del acta administrativa")));
			}else{
				$obcomen_acta = $_POST["obcomen_acta"];
			}
		}else{
			$obcomen_acta = null;
		}
		
		//Metodo para guardar ACTAS ADMINISTRATIVAS
		switch($_POST["method"]){
			case "store":
				$acta = new Actas($_SESSION["id"], $_SESSION["rol"]);
				$acta -> crear_acta($fecha_acta, $caja_empleado, $caja_empleado_text, $motivo_acta, $obcomen_acta);
				die(json_encode(array("success", "Se ha asignado un acta administrativa al expediente del usuario seleccionado!")));
			break;
		}
	}else if(isset($_POST["tipo_incidencia_papel"]) && $_POST["tipo_incidencia_papel"] == "Carta_compromiso"){

		//CHECAR SI EL USUARIO TIENE PERMISO PARA REALIZAR ACCIONES
		if((Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
			die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
		}

		//FECHA DE LA CARTA COMPROMISO
        if(empty($_POST["fecha_carta"])){
			die(json_encode(array("error", "La fecha de la carta compromiso no puede estar vacía")));
		}else{
			if(!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $_POST["fecha_carta"])){
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha del de la carta compromiso")));
			}else{
                $fecha_carta = $_POST["fecha_carta"];
			}
		}

		//SELECT 2 - CARTAS COMPROMISO
		if($_POST["array_empleado"] != null){
			if(Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente" && Roles::FetchUserDepartamento($_SESSION["id"]) != "Capital humano"){
				$select_empleados = $object -> _db ->prepare("SELECT expedientes.id as expedienteid, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) as nombre FROM jerarquia j1 INNER JOIN jerarquia j2 ON j1.id=j2.jerarquia_id INNER JOIN roles r2 ON r2.id=j2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes ON expedientes.users_id=u2.id WHERE j2.jerarquia_id in (SELECT j3.jerarquia_id FROM jerarquia j3 GROUP BY j3.jerarquia_id HAVING j3.jerarquia_id >= (SELECT j4.id FROM jerarquia j4 INNER JOIN roles r3 ON r3.id=j4.rol_id WHERE r3.nombre=:rolnom AND IF(r3.nombre='Director general', d2.departamento IS NOT NULL, d2.departamento = (SELECT d3.departamento from usuarios u3 INNER JOIN departamentos d3 ON d3.id=u3.departamento_id WHERE u3.id=:sessionid))))");
				$select_empleados -> execute(array(':rolnom' => Roles::FetchSessionRol($_SESSION["rol"]), ':sessionid' => $_SESSION["id"]));
				$deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_KEY_PAIR);
				if (array_key_exists($_POST["array_empleado"], $deploy_empleados)) {
					$array_key_carta_value = $deploy_empleados[$_POST["array_empleado"]];
					if(isset($_POST["array_empleado_text"]) && $_POST['array_empleado_text'] == $array_key_carta_value){
						$array_empleado = $_POST["array_empleado"];
						$array_empleado_text = $_POST["array_empleado_text"];
					}else{
						die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
					}
				}else{
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los expedientes registrados")));
				}
			}else if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" && (Roles::FetchSessionRol($_SESSION["rol"]) != "Gerente" || Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente" && Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano"))){
				$select_empleados = $object -> _db ->prepare("SELECT expedientes.id as expedienteid, CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) AS nombre FROM usuarios INNER JOIN expedientes ON expedientes.users_id=usuarios.id");
				$select_empleados -> execute();
				$deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_KEY_PAIR);
				if (array_key_exists($_POST["array_empleado"], $deploy_empleados)) {
					$array_key_carta_value = $deploy_empleados[$_POST["array_empleado"]];
					if(isset($_POST["array_empleado_text"]) && $_POST['array_empleado_text'] == $array_key_carta_value){
						$array_empleado = $_POST["array_empleado"];
						$array_empleado_text = $_POST["array_empleado_text"];
					}else{
						die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
					}
				}else{
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los expedientes registrados")));
				}	
			}
		}else{
			die(json_encode(array("error", "Debe asignar un usuario a la carta compromiso")));
		}
		
		//RESPONSABILIDADES A CUMPLIR
		if(!empty($_POST["responsabilidad_carta"])){
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["responsabilidad_carta"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el campo de las reposabilidades de la carta compromiso")));
			}else{
				$responsabilidad_carta = $_POST["responsabilidad_carta"];
			}
		}else{
			die(json_encode(array("error", "El campo de resposabilidades no puede estar vacía")));
		}
		//Metodo para guardar CARTAS COMPROMISO
		switch($_POST["method"]){
			case "store":
				$carta = new Cartas($_SESSION["id"], $_SESSION["rol"]);
				$carta -> crear_carta($fecha_carta, $array_empleado, $array_empleado_text, $responsabilidad_carta);
				die(json_encode(array("success", "Se ha asignado una carta compromiso al expediente del usuario seleccionado!")));
			break;
		}
	}
/**
 * *   ███████ ██████  ██ ████████  █████  ██████      ██ ███    ██  ██████ ██ ██████  ███████ ███    ██  ██████ ██  █████  ███████ 
 * *   ██      ██   ██ ██    ██    ██   ██ ██   ██     ██ ████   ██ ██      ██ ██   ██ ██      ████   ██ ██      ██ ██   ██ ██      
 * *   █████   ██   ██ ██    ██    ███████ ██████      ██ ██ ██  ██ ██      ██ ██   ██ █████   ██ ██  ██ ██      ██ ███████ ███████ 
 * *   ██      ██   ██ ██    ██    ██   ██ ██   ██     ██ ██  ██ ██ ██      ██ ██   ██ ██      ██  ██ ██ ██      ██ ██   ██      ██ 
 * *   ███████ ██████  ██    ██    ██   ██ ██   ██     ██ ██   ████  ██████ ██ ██████  ███████ ██   ████  ██████ ██ ██   ██ ███████                                                                                                                                  
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "Editar_incidencias"){
	if(isset($_POST["method"])){
		if(isset($_POST["tipo_incidencia_papel"]) && $_POST["tipo_incidencia_papel"] == "Acta_administrativa"){
			//Checa si el usuario tiene permisos para realizar la acción
			if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a acta administrativa") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Ver todos los documentos administrativos") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
				die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
			}
			//Checar si la incidencia todavía existe
			$check_incidencia = $object -> _db -> prepare("SELECT * FROM incidencias_administrativas WHERE id=:incidenciaid");
			$check_incidencia -> execute(array(':incidenciaid' => $_POST["incidenciaid"]));
			$count_incidencia = $check_incidencia -> rowCount();
			if($count_incidencia > 0){
				$incidenciaid = $_POST["incidenciaid"];
			}else{
				die(json_encode(array("incidencia_desconocida", "La incidencia ya no existe!")));
			}
			//FECHA DEL ACTA ADMINISTRATIVA
			if(empty($_POST["fecha_acta"])){
				die(json_encode(array("error", "La fecha del acta administrativa no puede estar vacío")));
			}else{
				if(!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $_POST["fecha_acta"])){
					die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha del acta administrativa")));
				}else{
					$fecha_acta = $_POST["fecha_acta"];
				}
			}
			//SELECT 2 - ACTAS ADMINISTRATIVAS
			if($_POST["caja_empleado"] != null && $_POST["caja_empleado_text"] != null){
				if(Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente" && Roles::FetchUserDepartamento($_SESSION["id"]) != "Capital humano"){
					$select_empleados = $object -> _db ->prepare("SELECT expedientes.id as expedienteid, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) as nombre FROM jerarquia j1 INNER JOIN jerarquia j2 ON j1.id=j2.jerarquia_id INNER JOIN roles r2 ON r2.id=j2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes ON expedientes.users_id=u2.id WHERE j2.jerarquia_id in (SELECT j3.jerarquia_id FROM jerarquia j3 GROUP BY j3.jerarquia_id HAVING j3.jerarquia_id >= (SELECT j4.id FROM jerarquia j4 INNER JOIN roles r3 ON r3.id=j4.rol_id WHERE r3.nombre=:rolnom AND IF(r3.nombre='Director general', d2.departamento IS NOT NULL, d2.departamento = (SELECT d3.departamento from usuarios u3 INNER JOIN departamentos d3 ON d3.id=u3.departamento_id WHERE u3.id=:sessionid))))");
					$select_empleados -> execute(array(':rolnom' => Roles::FetchSessionRol($_SESSION["rol"]), ':sessionid' => $_SESSION["id"]));
					$deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_KEY_PAIR);
					if (array_key_exists($_POST["caja_empleado"], $deploy_empleados)) {
						$array_key_acta_value = $deploy_empleados[$_POST["caja_empleado"]];
						if($_POST['caja_empleado_text'] == $array_key_acta_value){
							$caja_empleado = $_POST["caja_empleado"];
							$caja_empleado_text = $_POST["caja_empleado_text"];
						}else{
							die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
						}
					}else{
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los expedientes registrados")));
					}
				}else if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" && (Roles::FetchSessionRol($_SESSION["rol"]) != "Gerente" || Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente" && Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano"))){
					$select_empleados = $object -> _db ->prepare("SELECT expedientes.id AS expedienteid, CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) AS nombre FROM usuarios INNER JOIN expedientes ON expedientes.users_id=usuarios.id");
					$select_empleados -> execute();
					$deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_KEY_PAIR);
					if (array_key_exists($_POST["caja_empleado"], $deploy_empleados)) {
						$array_key_acta_value = $deploy_empleados[$_POST["caja_empleado"]];
						if($_POST['caja_empleado_text'] == $array_key_acta_value){
							$caja_empleado = $_POST["caja_empleado"];
							$caja_empleado_text = $_POST["caja_empleado_text"];
						}else{
							die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
						}
					}else{
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los expedientes registrados")));
					}
				}
			}else{
				die(json_encode(array("error", "Debe asignar un usuario al acta administrativa")));
			}
			//MOTIVO DEL ACTA ADMINISTRATIVA
			if(empty($_POST["motivo_acta"])){
				die(json_encode(array("error", "El motivo del acta administrativa no puede estar vacío")));
			}else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_acta"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del acta administrativa")));
			}else{
				$motivo_acta = $_POST["motivo_acta"];
			}
			
			//OBSERVACIONES DEL ACTA ADMINISTRATIVA
			if(!empty($_POST["obcomen_acta"])){
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["obcomen_acta"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las observaciones del acta administrativa")));
				}else{
					$obcomen_acta = $_POST["obcomen_acta"];
				}
			}else{
				$obcomen_acta = null;
			}
			//Metodo para editar las ACTAS ADMINISTRATIVAS
			switch($_POST["method"]){
				case "edit":
					$acta = new Actas($_SESSION["id"], $_SESSION["rol"]);
					$acta -> editar_acta($fecha_acta, $caja_empleado, $caja_empleado_text, $motivo_acta, $obcomen_acta, $incidenciaid);
					die(json_encode(array("success", "Se ha editado un acta administrativa al expediente del usuario seleccionado!")));
				break;
			}
		}else if(isset($_POST["tipo_incidencia_papel"]) && $_POST["tipo_incidencia_papel"] == "Carta_compromiso"){
			//Checa si el usuario tiene permisos para realizar la acción
			if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a carta compromiso") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Ver todos los documentos administrativos") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
				die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
			}
			//Checar si la incidencia todavía existe
			$check_incidencia = $object -> _db -> prepare("SELECT * FROM incidencias_administrativas WHERE id=:incidenciaid");
			$check_incidencia -> execute(array(':incidenciaid' => $_POST["incidenciaid"]));
			$count_incidencia = $check_incidencia -> rowCount();
			if($count_incidencia > 0){
				$incidenciaid = $_POST["incidenciaid"];
			}else{
				die(json_encode(array("incidencia_desconocida", "La incidencia ya no existe!")));
			}
			//FECHA DE LA CARTA COMPROMISO
			if(empty($_POST["fecha_carta"])){
				die(json_encode(array("error", "La fecha de la carta compromiso no puede estar vacía")));
			}else{
				if(!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $_POST["fecha_carta"])){
					die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha del de la carta compromiso")));
				}else{
					$fecha_carta = $_POST["fecha_carta"];
				}
			}

			//SELECT 2 - CARTAS COMPROMISO
			if($_POST["array_empleado"] != null && $_POST["array_empleado_text"] != null){
				if(Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente" && Roles::FetchUserDepartamento($_SESSION["id"]) != "Capital humano"){
					$select_empleados = $object -> _db ->prepare("SELECT expedientes.id as expedienteid, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) as nombre FROM jerarquia j1 INNER JOIN jerarquia j2 ON j1.id=j2.jerarquia_id INNER JOIN roles r2 ON r2.id=j2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes ON expedientes.users_id=u2.id WHERE j2.jerarquia_id in (SELECT j3.jerarquia_id FROM jerarquia j3 GROUP BY j3.jerarquia_id HAVING j3.jerarquia_id >= (SELECT j4.id FROM jerarquia j4 INNER JOIN roles r3 ON r3.id=j4.rol_id WHERE r3.nombre=:rolnom AND IF(r3.nombre='Director general', d2.departamento IS NOT NULL, d2.departamento = (SELECT d3.departamento from usuarios u3 INNER JOIN departamentos d3 ON d3.id=u3.departamento_id WHERE u3.id=:sessionid))))");
					$select_empleados -> execute(array(':rolnom' => Roles::FetchSessionRol($_SESSION["rol"]), ':sessionid' => $_SESSION["id"]));
					$deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_KEY_PAIR);
					if (array_key_exists($_POST["array_empleado"], $deploy_empleados)) {
						$array_key_carta_value = $deploy_empleados[$_POST["array_empleado"]];
						if($_POST['array_empleado_text'] == $array_key_carta_value){
							$array_empleado = $_POST["array_empleado"];
							$array_empleado_text = $_POST["array_empleado_text"];
						}else{
							die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
						}
					}else{
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los expedientes registrados")));
					}
				}else if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" && (Roles::FetchSessionRol($_SESSION["rol"]) != "Gerente" || Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente" && Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano"))){
					$select_empleados = $object -> _db ->prepare("SELECT expedientes.id as expedienteid, CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) AS nombre FROM usuarios INNER JOIN expedientes ON expedientes.users_id=usuarios.id");
					$select_empleados -> execute();
					$deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_KEY_PAIR);
					if (array_key_exists($_POST["array_empleado"], $deploy_empleados)) {
						$array_key_carta_value = $deploy_empleados[$_POST["array_empleado"]];
						if($_POST['array_empleado_text'] == $array_key_carta_value){
							$array_empleado = $_POST["array_empleado"];
							$array_empleado_text = $_POST["array_empleado_text"];
						}else{
							die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
						}
					}else{
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los expedientes registrados")));
					}	
				}
			}else{
				die(json_encode(array("error", "Debe asignar un usuario a la carta compromiso")));
			}
			
			//RESPONSABILIDADES A CUMPLIR
			if(!empty($_POST["responsabilidad_carta"])){
				if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["responsabilidad_carta"])){
					die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el campo de las reposabilidades de la carta compromiso")));
				}else{
					$responsabilidad_carta = $_POST["responsabilidad_carta"];
				}
			}else{
				die(json_encode(array("error", "El campo de resposabilidades no puede estar vacía")));
			}
			//Metodo para guardar CARTAS COMPROMISO
			switch($_POST["method"]){
				case "edit":
					$carta = new Cartas($_SESSION["id"], $_SESSION["rol"]);
					$carta -> editar_carta($fecha_carta, $array_empleado, $array_empleado_text, $responsabilidad_carta, $incidenciaid);
					die(json_encode(array("success", "Se ha editado una carta administrativa al expediente del usuario seleccionado!")));
				break;
			}
		}
	}
/**
 * *   ███████  ██████  ██      ██  ██████ ██ ████████ ██    ██ ██████      ██ ███    ██  ██████ ██ ██████  ███████ ███    ██  ██████ ██  █████  
 * *   ██      ██    ██ ██      ██ ██      ██    ██    ██    ██ ██   ██     ██ ████   ██ ██      ██ ██   ██ ██      ████   ██ ██      ██ ██   ██ 
 * *   ███████ ██    ██ ██      ██ ██      ██    ██    ██    ██ ██   ██     ██ ██ ██  ██ ██      ██ ██   ██ █████   ██ ██  ██ ██      ██ ███████ 
 * *        ██ ██    ██ ██      ██ ██      ██    ██    ██    ██ ██   ██     ██ ██  ██ ██ ██      ██ ██   ██ ██      ██  ██ ██ ██      ██ ██   ██ 
 * *   ███████  ██████  ███████ ██  ██████ ██    ██     ██████  ██████      ██ ██   ████  ██████ ██ ██████  ███████ ██   ████  ██████ ██ ██   ██                                                                                                                                               
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "solicitud_incidencia"){
    if(isset($_POST["estatus"]) && isset($_POST["incidenciaid"]) && isset($_POST["method"])){
		
		//Checar si el usuario tiene permiso para evaluar incidencias
		if(Permissions::CheckPermissions($_SESSION["id"], "Acceso a solicitud incidencias") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
			die(json_encode(array("forbidden", "No tiene permisos para realizar estas acciones")));
		}

		//Checar si la incidencia todavia existe
		$check_incidencia = $object -> _db -> prepare("SELECT * FROM incidencias WHERE id=:incidenciaid");
		$check_incidencia -> execute(array("incidenciaid" => $_POST["incidenciaid"]));
		$count_incidencia = $check_incidencia -> rowCount();
		if($count_incidencia == 0){
			die(json_encode(array("incidencia_not_found", "La incidencia ya no existe!")));
		}else{
			$incidenciaid= $_POST["incidenciaid"];
		}
		
		//El estatus solo puede estar entre 1, 2 y 3
		$estatus_array = array(1, 2, 3);
		if (in_array($_POST["estatus"], $estatus_array)) {
			$estatus= $_POST["estatus"];
		}else{
			die(json_encode(array("failed", "El estatus solamente puede tener un valor definido, por favor, vuelva  a cargar la página!")));
		}

		//Goce de sueldo solamente puede ser 0 y 1
        if(isset($_POST["sueldo"])){
			$sueldo_array = array(0, 1);
                if (in_array($_POST["sueldo"], $sueldo_array)) {
		    		$sueldo= $_POST["sueldo"];
				}else{
					die(json_encode(array("failed", "El sueldo solamente puede tener un valor definido, por favor, vuelva a cargar la página!")));
				}
        }else{
			$sueldo=null;
		}
		
		//Comentario
        if(empty($_POST["comentario"])){
            $comentario = null;
        }else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["comentario"])){
				die(json_encode(array("failed", "Solo se permiten carácteres alfabéticos y espacios en los comentarios")));
			}else{
				$comentario = $_POST["comentario"];
			}
        }
        switch($_POST["method"]){
            case "store":
                Incidencias::Almacenar_estatus($incidenciaid, $estatus, $sueldo, $_SESSION["id"], $comentario);
                die(json_encode(array("success")));
            break;
        }
    }
/**
 * *    █████   ██████ ████████  █████  ███████     ██    ██      ██████  █████  ██████  ████████  █████  ███████ 
 * *   ██   ██ ██         ██    ██   ██ ██           ██  ██      ██      ██   ██ ██   ██    ██    ██   ██ ██      
 * *   ███████ ██         ██    ███████ ███████       ████       ██      ███████ ██████     ██    ███████ ███████ 
 * *   ██   ██ ██         ██    ██   ██      ██        ██        ██      ██   ██ ██   ██    ██    ██   ██      ██ 
 * *   ██   ██  ██████    ██    ██   ██ ███████        ██         ██████ ██   ██ ██   ██    ██    ██   ██ ███████                                                                                                                
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "actas_cartas"){
	if(isset($_POST["incidenciaid"], $_POST["tipo"], $_FILES["archivo"], $_POST["method"])){
		if(Permissions::CheckPermissions($_SESSION["id"], "Ver todos los documentos administrativos") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
			die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
		}
		
		$check_incident_exist = $object -> _db -> prepare("SELECT * FROM incidencias_administrativas WHERE id=:incidenciadminid");
		$check_incident_exist -> execute(array(":incidenciadminid" => $_POST["incidenciaid"]));
		$count_incident = $check_incident_exist -> rowCount();
		if($count_incident == 0){
			die(json_encode(array("error", "No tienes permiso para subir archivos a este tipo de usuario")));
		}
		
		if(Roles::FetchSessionRol($_SESSION["rol"]) == "Gerente"){
			$check_empleado = $object -> _db -> prepare("SELECT roles.nombre as rolnom, departamentos.departamento as depanom FROM incidencias_administrativas INNER JOIN usuarios ON usuarios.id=incidencias_administrativas.asignada_a INNER JOIN roles ON roles.id=usuarios.roles_id INNER JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE incidencias_administrativas.id=:incidenciaid");
			$check_empleado -> execute(array(":incidenciaid" => $_POST["incidenciaid"]));
			$fetch_empleado = $check_empleado -> fetch(PDO::FETCH_OBJ);
			if($fetch_emplado -> rolnom != "Empleado"){
				die(json_encode(array("error", "No tienes permiso para subir archivos a este tipo de usuario")));
			}else{
				if($fetch_empleado -> depanom != Roles::FetchUserDepartamento($_SESSION["id"])){
					die(json_encode(array("error", "No tienes permiso para subir archivos a este usuario de este departamento")));
				}
			}
		}
		
		$tipo_incidencia_administrativa_array = array("acta_administrativa", "carta_compromiso");
		if (!(in_array($_POST["tipo"], $tipo_incidencia_administrativa_array))) {
            die(json_encode(array("error", "Por favor, no modifique el tipo de incidencia administrativa por medio de la consola")));
        }
		
		if(isset($_FILES['archivo']['name'])){
			$allowed = array('pdf', 'jpeg', 'png', 'jpg');
			$filename_documento_administrativo = $_FILES['archivo']['name'];
			$ext = pathinfo($filename_documento_administrativo, PATHINFO_EXTENSION);
			if (!in_array($ext, $allowed)) {
				die(json_encode(array("error", "Solo se permite pdf, jpg, jpeg y pngs")));
			}else if($_FILES['archivo']['size'] > 10485760){
				die(json_encode(array("error", "Los archivos deben pesar ser menos de 10 MB")));
			}else{
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mimetype = finfo_file($finfo, $_FILES["archivo"]["tmp_name"]);
				finfo_close($finfo);
				if($mimetype != "image/jpeg" && $mimetype != "image/png"  && $mimetype != "application/pdf"){
					die(json_encode(array("error", "Por favor, asegúrese que el archivo sea originalmente un archivo pdf, png, jpg y jpeg")));
				}
			}
			$file_documento_administrativo=$_FILES['archivo'];
		}else{
			die(json_encode(array("error", "Se necesita subir un archivo firmado para el documento administrativo elegido")));
		}
		
		if($_POST['tipo'] == "acta_administrativa"){
			switch($_POST["method"]){
				case "store":
					$actas = new Actas($_SESSION["id"], $_SESSION["rol"]);
					$actas -> vincular_acta($_POST["incidenciaid"], $file_documento_administrativo);
					die(json_encode(array("success", "Se ha subido el archivo firmado para la acta administrativa!")));
				break;
				case "edit":
					$actas = new Actas($_SESSION["id"], $_SESSION["rol"]);
					$actas -> vincular_acta($_POST["incidenciaid"], $file_documento_administrativo);
					die(json_encode(array("success", "Se ha modificado el archivo firmado para la acta administrativa!")));
				break;
			}
		}else if($_POST['tipo'] == "carta_compromiso"){
			switch($_POST["method"]){
				case "store":
					$cartas = new Cartas($_SESSION["id"], $_SESSION["rol"]);
					$cartas -> vincular_carta($_POST["incidenciaid"], $file_documento_administrativo);
					die(json_encode(array("success", "Se ha subido el archivo firmado para la carta compromiso!")));
				break;
				case "edit":
					$cartas = new Cartas($_SESSION["id"], $_SESSION["rol"]);
					$cartas -> vincular_carta($_POST["incidenciaid"], $file_documento_administrativo);
					die(json_encode(array("success", "Se ha modificado el archivo firmado para la carta compromiso!")));
				break;
			}
		}
	}
/**
 * *    ██████  █████  ████████ ███████  ██████   ██████  ██████  ██  █████  ███████ 
 * *   ██      ██   ██    ██    ██      ██       ██    ██ ██   ██ ██ ██   ██ ██      
 * *   ██      ███████    ██    █████   ██   ███ ██    ██ ██████  ██ ███████ ███████ 
 * *   ██      ██   ██    ██    ██      ██    ██ ██    ██ ██   ██ ██ ██   ██      ██ 
 * *    ██████ ██   ██    ██    ███████  ██████   ██████  ██   ██ ██ ██   ██ ███████                                                                                   
*/
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
/**
 * *   ███████ ██    ██ ██████  ██████   ██████  ██      ███████ ███████ 
 * *   ██      ██    ██ ██   ██ ██   ██ ██    ██ ██      ██      ██      
 * *   ███████ ██    ██ ██████  ██████  ██    ██ ██      █████   ███████ 
 * *        ██ ██    ██ ██   ██ ██   ██ ██    ██ ██      ██           ██ 
 * *   ███████  ██████  ██████  ██   ██  ██████  ███████ ███████ ███████                                                                       
*/
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
/**
 * *   ██████  ███████ ██████  ███████ ██ ██           ██████  ███████ ███    ██ ███████ ██████   █████  ██      
 * *   ██   ██ ██      ██   ██ ██      ██ ██          ██       ██      ████   ██ ██      ██   ██ ██   ██ ██      
 * *   ██████  █████   ██████  █████   ██ ██          ██   ███ █████   ██ ██  ██ █████   ██████  ███████ ██      
 * *   ██      ██      ██   ██ ██      ██ ██          ██    ██ ██      ██  ██ ██ ██      ██   ██ ██   ██ ██      
 * *   ██      ███████ ██   ██ ██      ██ ███████      ██████  ███████ ██   ████ ███████ ██   ██ ██   ██ ███████                                                                                                               
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "perfil_general"){
    if(isset($_POST["nombre"], $_POST["apellido_pat"], $_POST["apellido_mat"], $_POST["correo"])){
        /*Nombre del empleado*/
        if(empty($_POST["nombre"])){
            die(json_encode(array("error", "Por favor, ingrese un nombre")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nombre"])){
            die(json_encode(array("error", "Nombre no válido")));
        }else{
            $nombre = $_POST["nombre"];
        }
        /*Apellido paterno del empleado*/
        if(empty($_POST["apellido_pat"])){
            die(json_encode(array("error", "Por favor, ingrese un apellido paterno")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellido_pat"])){
            die(json_encode(array("error", "Apellido paterno no válido")));
        }else{
            $apellido_pat = $_POST["apellido_pat"];
        }
        /*Apellido materno del empleado*/
        if(empty($_POST["apellido_mat"])){
            die(json_encode(array("error", "Por favor, ingrese un apellido materno")));
        }else if(!preg_match("/^(?=.{1,40}$)[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellido_mat"])){
            die(json_encode(array("error", "Apellido materno no válido")));
        }else{
            $apellido_mat = $_POST["apellido_mat"];
        }
        /*Correo*/
        if(empty($_POST["correo"])){
            die(json_encode(array("error", "Por favor, ingrese un correo electrónico")));
        }else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo"])){
            die(json_encode(array("error", "Asegúrese que el texto ingresado este en formato de email")));
        }else{
            $check_edit_correo = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo and id!=:sessionid");
            $check_edit_correo -> execute(array(":correo" => $_POST["correo"], ":sessionid" => $_SESSION["id"]));
            $count_edit_correo = $check_edit_correo -> rowCount();
            
            if($count_edit_correo > 0){
                die(json_encode(array("error", "Este correo ya existe, por favor, escriba otro")));
            }
            $correo = $_POST["correo"];
        }
        /*Foto de perfil*/
        if(isset($_FILES['foto_perfil']['name'])){
            $allowed = array('jpeg', 'png', 'jpg');
            $nombre_archivo = $_FILES['foto_perfil']['name'];
            $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                die(json_encode(array("error", "Solo se permite jpg, jpeg y pngs")));
            }else if($_FILES['foto_perfil']['size'] > 10485760){
                die(json_encode(array("error", "Las imágenes deben pesar ser menos de 10 MB")));
            }else{
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimetype = finfo_file($finfo, $_FILES["foto_perfil"]["tmp_name"]);
                finfo_close($finfo);
                if($mimetype != "image/jpeg" && $mimetype != "image/png"){
                    die(json_encode(array("error", "Por favor, asegurese que la imagen sea originalmente un archivo png, jpg y jpeg")));
                }
            }
            $foto_perfil=$_FILES['foto_perfil'];
        }else{
            $nombre_archivo=null;
            $foto_perfil=null;
        }

        $delete=$_POST['delete'];
        
        User::Editarperfilgeneral($nombre, $apellido_pat, $apellido_mat, $correo, $nombre_archivo, $foto_perfil, $_SESSION["id"], $delete);
        die(json_encode(array("success", "Se ha editado tu información general!")));
    }
/**
 * *   ██████  ███████ ██████  ███████ ██ ██          ██████   █████  ███████ ███████ ██     ██  ██████  ██████  ██████  
 * *   ██   ██ ██      ██   ██ ██      ██ ██          ██   ██ ██   ██ ██      ██      ██     ██ ██    ██ ██   ██ ██   ██ 
 * *   ██████  █████   ██████  █████   ██ ██          ██████  ███████ ███████ ███████ ██  █  ██ ██    ██ ██████  ██   ██ 
 * *   ██      ██      ██   ██ ██      ██ ██          ██      ██   ██      ██      ██ ██ ███ ██ ██    ██ ██   ██ ██   ██ 
 * *   ██      ███████ ██   ██ ██      ██ ███████     ██      ██   ██ ███████ ███████  ███ ███   ██████  ██   ██ ██████                                                                                                                        
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "perfil_password"){
    if(isset($_POST["password"], $_POST["password_confirm"], $_POST["current_password"])){
		$password = $_POST["password"];
		$password_confirm = $_POST["password_confirm"];
		$current_password = $_POST["current_password"];
		$sessionid = $_SESSION["id"];
		if(empty($password)){
			die(json_encode(array("error", "La contraseña no puede estar vacía")));
		}else if(strlen($password) < 8 ){
			die(json_encode(array("error", "La contraseña debe ser 8 dígitos ó más")));
		}else if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$/", $password)){
			die(json_encode(array("error", "La contraseña debe contener al menos un número, una letra en mayúscula, una letra en minúscula y un simbolo especial(!@#$%&*) y no se permiten espacios")));
		}else if(empty($password_confirm)){
			die(json_encode(array("error", "La confirmación de la contraseña no puede estar vacía")));
		}else if(strlen($password_confirm) < 8 ){
			die(json_encode(array("error", "La confirmación de la contraseña debe de tener como mínimo 8 caracteres")));
		}else if($password_confirm!=$password){
			die(json_encode(array("error", "Las contraseñas no coinciden")));
		}else if(empty($current_password)){
			die(json_encode(array("error", "Por favor, ingrese la contraseña actual")));
		}else{
			$blacklist_query = $object ->_db->prepare("SELECT password from blacklist_password");
			$blacklist_query -> execute();
			$fetch_blacklist = $blacklist_query -> fetchAll(PDO::FETCH_ASSOC);
			foreach($fetch_blacklist as $badword_blacklist){
				if(strpos($password, $badword_blacklist["password"]) !== false)
				{
					die(json_encode(array("error", "La contraseña no puede contener: " .$badword_blacklist["password"]. ", Por favor, modifique la contraseña")));
				}
			}
			$password_sha1 = sha1($password); 
			$check_password = $object ->_db->prepare("SELECT usuarios.password FROM usuarios WHERE id=:sessionid");
			$check_password->execute(array(':sessionid' => $sessionid));
			$fetch_password = $check_password -> fetch(PDO::FETCH_OBJ);
			if($fetch_password -> password == $password_sha1){
				die(json_encode(array("error", "La nueva contraseña no puede ser igual a la vieja contraseña, por favor, escriba otra contraseña")));
			}else{
				$password_repeat = $object ->_db->prepare("SELECT historial_password.password, historial_password.today_date FROM usuarios INNER JOIN historial_password ON historial_password.user_id=usuarios.id WHERE usuarios.id=:sessionidcache");
				$password_repeat -> execute(array(':sessionidcache' => $sessionid));
				$check_password_repeat = $password_repeat -> rowCount();
				if($check_password_repeat > 0){
					date_default_timezone_set("America/Monterrey");
					$date_database = date('y-m-d');
					$database_date = date_create($date_database);
					date_format($database_date,"y-m-d");
					$fetch_password_repeat = $password_repeat -> fetchAll(PDO::FETCH_ASSOC);
					foreach($fetch_password_repeat as $repeated_password){
						if(!preg_match("/^[0-9a-f]{40}$/i", $repeated_password["password"])){
							$hashing = sha1($repeated_password["password"]);
						}else{
							$hashing = $repeated_password["password"];
						}
						if($hashing == $password_sha1){
							$used_date = date_create($repeated_password["today_date"]);
							date_format($used_date,"y-m-d");
							$difference=date_diff($used_date, $database_date);
							if($difference -> days < 366){
								die(json_encode(array("error", "Deben pasar más de 365 días para que esta contraseña vuelva a ser usable")));
							}
						}
					}	
				}
				$check_pass = $object -> _db -> prepare("SELECT password from usuarios where id=:checkidpass");
				$check_pass -> execute(array(":checkidpass" => $sessionid));
				$fetch_pass = $check_pass -> fetch(PDO::FETCH_OBJ);		
				$current_psha1 = sha1($current_password); 
				if ($current_psha1 != $fetch_pass -> password) {
					die(json_encode(array("error", "La contraseña actual no coincide con la contraseña registrada")));
				}
				User::Editarperfilpassword($password_sha1, $sessionid);
				die(json_encode(array("success", "La contraseña ha sido cambiada")));
			}
		}
	}
/**
 * *   ██    ██  █████   ██████  █████   ██████ ██  ██████  ███    ██ ███████ ███████ 
 * *   ██    ██ ██   ██ ██      ██   ██ ██      ██ ██    ██ ████   ██ ██      ██      
 * *   ██    ██ ███████ ██      ███████ ██      ██ ██    ██ ██ ██  ██ █████   ███████ 
 * *    ██  ██  ██   ██ ██      ██   ██ ██      ██ ██    ██ ██  ██ ██ ██           ██ 
 * *     ████   ██   ██  ██████ ██   ██  ██████ ██  ██████  ██   ████ ███████ ███████                                                                                   
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "Vacaciones"){
	if(isset($_POST["periodo_vacaciones"]) && isset($_POST["method"])){

		//Checa si tiene permiso para acceder
		if(Permissions::CheckPermissions($_SESSION["id"], "Acceso a vacaciones") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
			die(json_encode(array("forbidden", "No tiene permisos para realizar estas acciones")));
		}

		//Checa si el usuario tiene expediente
		$check_expediente = $object -> _db -> prepare("SELECT * FROM expedientes INNER JOIN usuarios ON usuarios.id=expedientes.users_id WHERE usuarios.id=:userid");
		$check_expediente -> execute(array(':userid' => $_SESSION["id"]));
		$count_expediente = $check_expediente -> rowCount();
		if($count_expediente == 0){
			die(json_encode(array("error", "Este usuario no tiene un expediente asignado")));
		}else{
			//Checa si el usuario tiene estatus de ALTA ó BAJA
			$check_status = $object -> _db -> prepare("SELECT estatus_empleado.situacion_del_empleado AS situacion_del_empleado, estatus_empleado.estatus_del_empleado AS estatus_del_empleado, estatus_empleado.fecha AS estatus_fecha FROM estatus_empleado INNER JOIN expedientes ON expedientes.id=estatus_empleado.expedientes_id INNER JOIN usuarios ON usuarios.id=expedientes.users_id WHERE usuarios.id=:iduser");
			$check_status -> execute(array(':iduser' => $_SESSION["id"]));
			$count_status = $check_status -> rowCount();
			if($count_status == 0){
				die(json_encode(array("error", "El usuario no tiene un estatus asignado")));
			}else{
				$fetch_status = $check_status -> fetch(PDO::FETCH_OBJ);
				if($fetch_status -> situacion_del_empleado == "BAJA"){
					die(json_encode(array("error", "El usuario está dado de baja y no puede pedir vacaciones")));
				}
			}
		}

		//Checar si el usuario pertenece a la jerarquía
		$check_jerarquia = $object -> _db -> prepare("select jerarquia_id from jerarquia where rol_id=:rolid AND jerarquia_id is not null");
		$check_jerarquia -> execute(array(':rolid' => $_SESSION["rol"]));
		$count_jerarquia = $check_jerarquia -> rowCount();
		if($count_jerarquia == 0){
			die(json_encode(array("error", "Su usuario no tiene asignado un jefe")));
		}

		//Sacar al jefe directo
		switch(Roles::FetchSessionRol($_SESSION["rol"])){
			case "Director":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id WHERE r1.nombre = 'Director general' AND r2.nombre = 'Director'");
				$check_path -> execute();
				$i = 0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					$check_user_exists = $object -> _db -> prepare("SELECT correo FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre=:rolnom AND usuarios.correo='servicios_al_colaborador@sinttecom.com'");
					$check_user_exists -> execute(array(':rolnom' => $fetch_path["level"]));
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			case "Gerente":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r2.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id WHERE r1.nombre = 'Director general' AND r3.nombre = 'Gerente' UNION ALL SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id WHERE r1.nombre = 'Director general' AND r3.nombre = 'Gerente'");
				$check_path -> execute();
				$i=0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					if(Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchUserDepartamento($_SESSION["id"]) == "TI" || Roles::FetchUserDepartamento($_SESSION["id"]) == "Finanzas"){
						$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado="ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
						$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
					}else{
						if($fetch_path["level"] != "Director"){
							$check_user_exists = $object -> _db -> prepare("SELECT correo FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre=:rolnom AND usuarios.correo='servicios_al_colaborador@sinttecom.com'");
							$check_user_exists -> execute(array(':rolnom' => $fetch_path["level"]));
						}else{
							$check_user_exists = $object -> _db -> prepare('SELECT u1.correo FROM usuarios u1 INNER JOIN roles r1 ON r1.id = u1.roles_id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id LEFT JOIN expedientes e1 ON e1.users_id = u1.id LEFT JOIN estatus_empleado ee ON ee.expedientes_id = e1.id WHERE d1.departamento = "Operaciones" AND r1.nombre = :rolnom1 AND ee.situacion_del_empleado = "ALTA" UNION ALL SELECT u2.correo FROM usuarios u2 INNER JOIN roles r2 ON r2.id=u2.roles_id LEFT JOIN departamentos d2 ON d2.id=u2.departamento_id LEFT JOIN expedientes e2 ON e2.users_id = u2.id LEFT JOIN estatus_empleado ee2 ON ee2.expedientes_id = e2.id WHERE NOT EXISTS(SELECT u3.correo FROM usuarios u3 INNER JOIN roles r3 ON r3.id = u3.roles_id LEFT JOIN departamentos d3 ON d3.id = u3.departamento_id LEFT JOIN expedientes e3 ON e3.users_id = u3.id LEFT JOIN estatus_empleado ee3 ON ee3.expedientes_id = e3.id WHERE d3.departamento = "Operaciones" AND r3.nombre = :rolnom3 AND ee3.situacion_del_empleado = "ALTA") AND r2.nombre= :rolnom2 AND d2.departamento="Ventas" AND ee2.situacion_del_empleado = "ALTA"');
							$check_user_exists -> execute(array(':rolnom1' => $fetch_path["level"], ':rolnom2' => $fetch_path["level"], ':rolnom3' => $fetch_path["level"]));
						}
					}
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			case "Empleado":
			case "Supervisor":
			case "Tecnico":
				$jefe_array = array();
				$check_path = $object -> _db -> prepare("SELECT r3.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre =:rolnom1 UNION ALL SELECT r2.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre = :rolnom2 UNION ALL SELECT r1.nombre AS level FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id LEFT JOIN jerarquia AS t3 ON t3.jerarquia_id = t2.id INNER JOIN roles r3 ON r3.id=t3.rol_id LEFT JOIN jerarquia AS t4 ON t4.jerarquia_id = t3.id INNER JOIN roles r4 ON r4.id=t4.rol_id WHERE r1.nombre = 'Director general' AND r4.nombre = :rolnom3");
				$check_path -> execute(array(':rolnom1' => Roles::FetchSessionRol($_SESSION["rol"]), ':rolnom2' => Roles::FetchSessionRol($_SESSION["rol"]), ':rolnom3' => Roles::FetchSessionRol($_SESSION["rol"])));
				$i=0;
				while($fetch_path = $check_path -> fetch(PDO::FETCH_ASSOC)){
					$i++;
					if(Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchUserDepartamento($_SESSION["id"]) == "TI" || Roles::FetchUserDepartamento($_SESSION["id"]) == "Finanzas"){
						$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado = "ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
						$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
					}else{
						if($fetch_path["level"] != "Director"){
							$check_user_exists = $object -> _db -> prepare('SELECT correo FROM usuarios INNER JOIN roles ON roles.id = usuarios.roles_id LEFT JOIN departamentos ON departamentos.id = usuarios.departamento_id LEFT JOIN expedientes ON expedientes.users_id = usuarios.id LEFT JOIN estatus_empleado ON estatus_empleado.expedientes_id = expedientes.id WHERE IF(departamentos.departamento IS NULL, departamentos.departamento IS NULL, departamentos.departamento = :departamento) AND roles.nombre = :rolnom AND IF(roles.nombre != "Director general", estatus_empleado.situacion_del_empleado = "ALTA", usuarios.correo="servicios_al_colaborador@sinttecom.com")');
							$check_user_exists -> execute(array(':departamento' => Roles::FetchUserDepartamento($_SESSION["id"]), ':rolnom' => $fetch_path["level"]));
						}else{
							$check_user_exists = $object -> _db -> prepare('SELECT u1.correo FROM usuarios u1 INNER JOIN roles r1 ON r1.id = u1.roles_id LEFT JOIN departamentos d1 ON d1.id = u1.departamento_id LEFT JOIN expedientes e1 ON e1.users_id = u1.id LEFT JOIN estatus_empleado ee ON ee.expedientes_id = e1.id WHERE d1.departamento = "Operaciones" AND r1.nombre = :rolnom1 AND ee.situacion_del_empleado = "ALTA" UNION ALL SELECT u2.correo FROM usuarios u2 INNER JOIN roles r2 ON r2.id=u2.roles_id LEFT JOIN departamentos d2 ON d2.id=u2.departamento_id LEFT JOIN expedientes e2 ON e2.users_id = u2.id LEFT JOIN estatus_empleado ee2 ON ee2.expedientes_id = e2.id WHERE NOT EXISTS(SELECT u3.correo FROM usuarios u3 INNER JOIN roles r3 ON r3.id = u3.roles_id LEFT JOIN departamentos d3 ON d3.id = u3.departamento_id LEFT JOIN expedientes e3 ON e3.users_id = u3.id LEFT JOIN estatus_empleado ee3 ON ee3.expedientes_id = e3.id WHERE d3.departamento = "Operaciones" AND r3.nombre = :rolnom3 AND ee3.situacion_del_empleado = "ALTA") AND r2.nombre= :rolnom2 AND d2.departamento="Ventas" AND ee2.situacion_del_empleado = "ALTA"');
							$check_user_exists -> execute(array(':rolnom1' => $fetch_path["level"], ':rolnom2' => $fetch_path["level"], ':rolnom3' => $fetch_path["level"]));
						}
					}
					$count_users = $check_user_exists -> rowCount();
					if($count_users > 0){
						$fetch_users = $check_user_exists -> fetch(PDO::FETCH_ASSOC);
						$jefe_array[] = $fetch_users["correo"];
						break;
					}
					if($i == $check_path->rowCount()){
						die(json_encode(array("error", "Siguiendo la jerarquía de la empresa, no existe ningún usuario asociado con los roles")));
					}
				}
			break;
			default:
				die(json_encode(array("error", "Su usuario no se encuentra en la jerarquía, por favor, contacte a un administrador")));
		}
		
		//Validación de la fecha escogida
		function validateDate($date, $format = 'Y-m-d H:i:s')
		{
			$d = DateTime::createFromFormat($format, $date);
			return $d && $d->format($format) == $date;
		}

		function dateDiffInDays($date1, $date2)
		{
			$diff = strtotime($date2) - strtotime($date1);
			return abs(round($diff / 86400));
		}

		if(empty($_POST["periodo_vacaciones"])){
			die(json_encode(array("error", "El período vacacional no puede estar vacío")));
		}else if(!preg_match("/^\d{4}\/\d{2}\/\d{2}+[\s]-[\s]\d{4}\/\d{2}\/\d{2}$/", $_POST["periodo_vacaciones"])){
			die(json_encode(array("error", "La fecha elegida en el periodo vacacional no tiene el formato adecuado")));
		}else{
			$break_date = explode(" - ",$_POST["periodo_vacaciones"]);
			$check_validdate0 = validateDate($break_date[0], 'Y/m/d');
			$check_validdate1 = validateDate($break_date[1], 'Y/m/d');
			if($check_validdate0 = false){
				die(json_encode(array("error", "La fecha de inicio en el periodo vacacional es inválida")));
			}else if($check_validdate1 = false){
				die(json_encode(array("error", "La fecha de fin en el periodo vacacional es inválida")));
			}

			$days = dateDiffInDays($break_date[0], $break_date[1]);
			$days = $days + 1;

			$periodo_vacaciones = $_POST["periodo_vacaciones"];
		}

		//Se calcula las vacaciones disponibles
		$fecha_estatus = $fetch_status -> estatus_fecha;
		$fecha_actual = new DateTime();

		// Obtener la fecha de 3 meses antes del aniversario
		$aniversario_3_meses = $object->_db->prepare("SELECT fecha_tres_meses_antes_aniversario(:fecha_estatus) AS aniversario_3_meses");
        $aniversario_3_meses->execute(array(':fecha_estatus' => $fecha_estatus));
        $fecha_aniversario_3_meses = $aniversario_3_meses->fetchColumn();

		//Esta función obtiene el calculo de aniversario según la fecha de antiguedad
		$aniversario = $object ->_db -> prepare("SELECT calculo_aniversario_siguiente(:fecha_estatus) AS aniversario");
		$aniversario -> execute(array(':fecha_estatus' => $fecha_aniversario_3_meses));
		$aniversary = $aniversario->fetchColumn();

		//Sacar los días restantes en caso de que el usuario tenga vacaciones disponibles
        //Esta consulta obtiene las vacaciones del empleado según el año de antiguedad
        $getVacaciones = $object -> _db -> prepare("SELECT calculo_vacaciones(:fecha_estatus) AS dias_vacaciones");
        $getVacaciones -> execute(array(':fecha_estatus' => $fecha_aniversario_3_meses));
        $dias_vacaciones = $getVacaciones->fetchColumn();

		//Esta función obtiene las vacaciones del siguiente año
		$getVacacionesSiguienteanio = $object -> _db -> prepare("SELECT calculo_vacaciones_siguiente_anio(:fecha_estatus) AS vacaciones_siguiente_anio");
        $getVacacionesSiguienteanio -> execute(array(':fecha_estatus' => $fecha_aniversario_3_meses));
        $dias_siguiente_anio = $getVacacionesSiguienteanio->fetchColumn();

		//Esta función obtiene las vacaciones del año pasado
		$getVacacionesanioAnterior = $object -> _db -> prepare("SELECT calculo_vacaciones_anio_anterior(:fecha_estatus) AS vacaciones_anterior_anio");
        $getVacacionesanioAnterior -> execute(array(':fecha_estatus' => $fecha_aniversario_3_meses));
        $dias_anterior_anio = $getVacacionesanioAnterior->fetchColumn();

		//Convertir la fecha de estatus en un objeto datetime
		$fecha_estatus = new DateTime($fecha_estatus);

		$acumulador_dias = 0;
		$vacaciones_dias = 0;

		if ($dias_vacaciones == 0) {
			$dias_restantes = $acumulador_dias;
		}else{
			//Checar si es el aniversario
			$aniversary_anios = new DateTime($aniversary);
			
			if ($fecha_actual >= $aniversary_anios) {
				//Checa todas las solicitudes que el usuario ha hecho en el transcurso del año
				$check_solicitudes_vacaciones = $object -> _db -> prepare("SELECT COALESCE(SUM(dias_solicitados),0) AS dias_solicitados FROM solicitud_vacaciones where users_id=:userid AND (estatus=4 OR estatus=1)");
				$check_solicitudes_vacaciones -> execute(array(':userid' => $_SESSION["id"]));
				$fetch_sum_vacaciones = $check_solicitudes_vacaciones -> fetch(PDO::FETCH_OBJ);

				//Verifica si el usuario ya se gasto sus vacaciones del año actual antes del aniversario
				$dias_restantes  = $dias_anterior_anio - $fetch_sum_vacaciones->dias_solicitados;
				if($dias_restantes <= 0){
					$vacaciones_dias = $dias_vacaciones;
					$acumulador_dias = $dias_restantes + $dias_vacaciones;
				}else{
					$vacaciones_dias = $dias_anterior_anio;
					$acumulador_dias = $dias_restantes;
				}
				$dias_restantes = $acumulador_dias;
			}else{
				//Checa todas las solicitudes que el usuario ha hecho en el transcurso del año
				$check_solicitudes_vacaciones = $object -> _db -> prepare("SELECT COALESCE(SUM(dias_solicitados),0) AS dias_solicitados FROM solicitud_vacaciones where users_id=:userid AND (estatus=4 OR estatus=1)");
				$check_solicitudes_vacaciones -> execute(array(':userid' => $_SESSION["id"]));
				$fetch_sum_vacaciones = $check_solicitudes_vacaciones -> fetch(PDO::FETCH_OBJ);
				
				$vacaciones_dias = $dias_vacaciones;

				//Verifica si el usuario ya se gasto sus vacaciones del año actual antes del aniversario
				$dias_restantes  = $dias_vacaciones - $fetch_sum_vacaciones->dias_solicitados;

			}
		}

		$dias_restantes = $dias_restantes - $days;

		if($dias_restantes < 0){
			die(json_encode(array("error", "El número de días solicitados sobrepasa el número de vacaciones restantes ó simplemente no tienes vacaciones disponibles")));
		}

		switch($_POST["method"]){
            case "store":
                $vacas = new Vacaciones($periodo_vacaciones);
                $vacas->CrearSolicitudVacaciones($_SESSION['id'], $days, $jefe_array);
                die(json_encode(array("success", "Se ha subido su solicitud de vacaciones!")));
            break;
        }
	}
/**
 * *   ███████  ██████  ██      ██  ██████ ██ ████████ ██    ██ ██████      ██    ██  █████   ██████  █████   ██████ ██  ██████  ███    ██ ███████ ███████ 
 * *   ██      ██    ██ ██      ██ ██      ██    ██    ██    ██ ██   ██     ██    ██ ██   ██ ██      ██   ██ ██      ██ ██    ██ ████   ██ ██      ██      
 * *   ███████ ██    ██ ██      ██ ██      ██    ██    ██    ██ ██   ██     ██    ██ ███████ ██      ███████ ██      ██ ██    ██ ██ ██  ██ █████   ███████ 
 * *        ██ ██    ██ ██      ██ ██      ██    ██    ██    ██ ██   ██      ██  ██  ██   ██ ██      ██   ██ ██      ██ ██    ██ ██  ██ ██ ██           ██ 
 * *   ███████  ██████  ███████ ██  ██████ ██    ██     ██████  ██████        ████   ██   ██  ██████ ██   ██  ██████ ██  ██████  ██   ████ ███████ ███████                                                                                                                                                        
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "solicitud_vacaciones"){
    if(isset($_POST["solicitud_vacaciones"]) && isset($_POST["estatus"]) && isset($_POST["method"])){

		//checar si tiene los permisos
		if(Permissions::CheckPermissions($_SESSION["id"], "Acceso a solicitud vacaciones") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
			die(json_encode(array("forbidden", "No tiene permisos para realizar estas acciones")));
		}

		//Checar si la solicitud existe
		$check_request = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones WHERE id=:solicitudid");
		$check_request -> execute(array(':solicitudid' => $_POST["solicitud_vacaciones"]));
		$count_request = $check_request -> rowCount();
		if($count_request == 0){
			die(json_encode(array("solicitud_not_found", "Esta solicitud no existe!")));
		}else{
			$solicitud_vacaciones = $_POST["solicitud_vacaciones"];
		}
		
		//El estatus solo puede estar entre 1, 2 y 3
		$estatus_array = array(1, 2, 3);
		if (in_array($_POST["estatus"], $estatus_array)) {
			$estatus= $_POST["estatus"];
		}else{
			die(json_encode(array("failed", "El estatus solamente puede tener un valor definido, por favor, vuelva  a cargar la página!")));
		}
		
		//Obtener el comentario de evaluación
        if(empty($_POST["comentario"])){
            $comentario = null;
        }else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["comentario"])){
				die(json_encode(array("failed", "Solo se permiten carácteres alfabéticos y espacios en los comentarios")));
			}else{
				$comentario = $_POST["comentario"];
			}
        }

        switch($_POST["method"]){
            case "store":
                Vacaciones::Almacenar_estatus($solicitud_vacaciones, $estatus, $_SESSION["id"], $comentario);
                die(json_encode(array("success", "Se aprobó la solicitud de vacaciones!")));
            break;
        }
    }
/**
 * *    █████  ██      ███████ ██████  ████████  █████  ███████ 
 * *   ██   ██ ██      ██      ██   ██    ██    ██   ██ ██      
 * *   ███████ ██      █████   ██████     ██    ███████ ███████ 
 * *   ██   ██ ██      ██      ██   ██    ██    ██   ██      ██ 
 * *   ██   ██ ███████ ███████ ██   ██    ██    ██   ██ ███████                                                              
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "alertas"){
	if(isset($_POST["titulo_alerta"], $_POST["descripcion_alerta"], $_POST["method"])){
		//TÍTULO DE LA ALERTA
		if(empty($_POST["titulo_alerta"])){
			die(json_encode(array("error", "El título de la alerta no puede estar vacío")));
		}else if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["titulo_alerta"])){
			die(json_encode(array("error", "El título de la alerta no puede tener solamente símbolos especiales y debe contener al menos una letra")));
		}else{
			$titulo_alerta = $_POST["titulo_alerta"];
		}

		//DESCRIPCIÓN DE LA ALERTA
		if(empty($_POST["descripcion_alerta"])){
			die(json_encode(array("error", "La descripción de la alerta no puede estar vacío")));
		}else if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["descripcion_alerta"])){
			die(json_encode(array("error", "La descripción de la alerta no puede tener solamente símbolos especiales y debe contener al menos una letra")));
		}else{
			$descripcion_alerta = $_POST["descripcion_alerta"];
		}

		//FOTO
		if(isset($_FILES['foto']['name'])){
			$allowed = array('jpeg', 'png', 'jpg');
			$filename_alertas = $_FILES['foto']['name'];
			$ext = pathinfo($filename_alertas, PATHINFO_EXTENSION);
			if (!in_array($ext, $allowed)) {
				die(json_encode(array("error", "Solo se permite pdf, jpg, jpeg y pngs")));
			}else if($_FILES['foto']['size'] > 10485760){
				die(json_encode(array("error", "Las imágenes deben pesar ser menos de 10 MB")));
			}else{
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mimetype = finfo_file($finfo, $_FILES["foto"]["tmp_name"]);
				finfo_close($finfo);
				if($mimetype != "image/jpeg" && $mimetype != "image/png"){
					die(json_encode(array("error", "Por favor, asegúrese que la imagen sea originalmente un archivo png, jpg y jpeg")));
				}
			}
			$foto=$_FILES['foto'];
		}else{
			$filename_alertas = null;
			$foto=null;
		}

		//ARCHIVO
		if(isset($_FILES['archivo_alerta']['name'])){
			$allowed = array('pdf', 'jpeg', 'png', 'jpg');
			$filename_archivo_alerta = $_FILES['archivo_alerta']['name'];
			$ext = pathinfo($filename_archivo_alerta, PATHINFO_EXTENSION);
			if (!in_array($ext, $allowed)) {
				die(json_encode(array("error", "Solo se permite pdf, jpg, jpeg y pngs")));
			}else if($_FILES['archivo_alerta']['size'] > 10485760){
				die(json_encode(array("error", "Los archivos deben pesar ser menos de 10 MB")));
			}else{
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mimetype = finfo_file($finfo, $_FILES["archivo_alerta"]["tmp_name"]);
				finfo_close($finfo);
				if($mimetype != "image/jpeg" && $mimetype != "image/png" && $mimetype != "application/pdf"){
					die(json_encode(array("error", "Por favor, asegúrese que el archivo sea originalmente un archivo pdf, png, jpg y jpeg")));
				}
			}
			$archivo_alerta=$_FILES['archivo_alerta'];
		}else{
			$filename_archivo_alerta = null;
			$archivo_alerta=null;
		}

		switch($_POST["method"]){
            case "store":
				$alerta = new Alertas($_SESSION["id"], $titulo_alerta, $descripcion_alerta, $filename_alertas, $foto, $filename_archivo_alerta, $archivo_alerta);
				$alerta -> insertAlerts();
                die(json_encode(array("success", "Se ha creado la alerta!")));
                break;
            break;
            case "edit":
                $check_alerts = $object -> _db -> prepare("SELECT * FROM alertas WHERE id=:id");
				$check_alerts -> execute(array(":id" => $_POST["id"]));
				$count_alerts = $check_alerts -> rowCount();
				if($count_alerts == 0){
					die(json_encode(array("alert_not_found", "No se encontró la alerta!")));
				}
				$id = $_POST["id"];
				$delete = $_POST["delete"];
				$delete2 = $_POST["delete2"];
				$alerta = new Alertas($_SESSION["id"], $titulo_alerta, $descripcion_alerta, $filename_alertas, $foto, $filename_archivo_alerta, $archivo_alerta);
				$alerta -> editAlerts($id, $delete, $delete2);
				die(json_encode(array("success", "Se ha modificado la alerta!")));
            	break;
			break;
        }
	}
/**
 * *    █████  ██    ██ ██ ███████  ██████  ███████ 
 * *   ██   ██ ██    ██ ██ ██      ██    ██ ██      
 * *   ███████ ██    ██ ██ ███████ ██    ██ ███████ 
 * *   ██   ██  ██  ██  ██      ██ ██    ██      ██ 
 * *   ██   ██   ████   ██ ███████  ██████  ███████                                                  
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "avisos"){
	if(isset($_POST["titulo_aviso"], $_POST["descripcion_aviso"], $_POST["method"])){
		//TÍTULO DEL AVISO
		if(empty($_POST["titulo_aviso"])){
			die(json_encode(array("error", "El título del aviso no puede estar vacío")));
		}else if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["titulo_aviso"])){
			die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el título del aviso")));
		}else{
			$titulo_aviso = $_POST["titulo_aviso"];
		}

		//DESCRIPCIÓN DEL AVISO
		if(empty($_POST["descripcion_aviso"])){
			die(json_encode(array("error", "La descripción del aviso no puede estar vacío")));
		}else if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["descripcion_aviso"])){
			die(json_encode(array("error", "La descripción del aviso no puede tener solamente símbolos especiales y debe contener al menos una letra")));
		}else{
			$descripcion_aviso = $_POST["descripcion_aviso"];
		}

		//FOTO DESTACADA DEL AVISO
		if(isset($_FILES['foto_aviso']['name'])){
			$allowed = array('jpeg', 'png', 'jpg');
			$filename_avisos = $_FILES['foto_aviso']['name'];
			$ext = pathinfo($filename_avisos, PATHINFO_EXTENSION);
			if (!in_array($ext, $allowed)) {
				die(json_encode(array("error", "Solo se permite jpg, jpeg y pngs")));
			}else if($_FILES['foto_aviso']['size'] > 10485760){
				die(json_encode(array("error", "Las imágenes deben pesar ser menos de 10 MB")));
			}else{
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mimetype = finfo_file($finfo, $_FILES["foto_aviso"]["tmp_name"]);
				finfo_close($finfo);
				if($mimetype != "image/jpeg" && $mimetype != "image/png"){
					die(json_encode(array("error", "Por favor, asegúrese que la imagen sea originalmente un archivo png, jpg y jpeg")));
				}
			}
			$foto_aviso=$_FILES['foto_aviso'];
		}else{
			$filename_avisos = null;
			$foto_aviso=null;
		}

		//ARCHIVO
		if(isset($_FILES['archivo_file_aviso']['name'])){
			$allowed_archivo = array('pdf', 'jpeg', 'png', 'jpg');
			$filename_archivo_aviso = $_FILES['archivo_file_aviso']['name'];
			$ext_archivo = pathinfo($filename_archivo_aviso, PATHINFO_EXTENSION);
			if (!in_array($ext_archivo, $allowed_archivo)) {
				die(json_encode(array("error", "Solo se permite pdf, jpg, jpeg y pngs")));
			}else if($_FILES['archivo_file_aviso']['size'] > 10485760){
				die(json_encode(array("error", "Los archivos deben pesar ser menos de 10 MB")));
			}else{
				$finfo_archivo = finfo_open(FILEINFO_MIME_TYPE);
				$mimetype_archivo = finfo_file($finfo_archivo, $_FILES["archivo_file_aviso"]["tmp_name"]);
				finfo_close($finfo_archivo);
				if($mimetype_archivo != "image/jpeg" && $mimetype_archivo != "image/png" && $mimetype_archivo != "application/pdf"){
					die(json_encode(array("error", "Por favor, asegúrese que el archivo sea originalmente un archivo pdf, png, jpg y jpeg")));
				}
			}
			$archivo_file_aviso=$_FILES['archivo_file_aviso'];
		}else{
			$filename_archivo_aviso = null;
			$archivo_file_aviso = null;
		}

		switch($_POST["method"]){
            case "store":
				$aviso = new Avisos($_SESSION["id"], $titulo_aviso, $descripcion_aviso, $filename_avisos, $foto_aviso, $filename_archivo_aviso, $archivo_file_aviso);
				$aviso -> insertNotice();
                die(json_encode(array("success", "Se ha creado el aviso!")));
                break;
            break;
            case "edit":
                $check_notices = $object -> _db -> prepare("SELECT * FROM avisos WHERE id=:id");
				$check_notices -> execute(array(":id" => $_POST["id"]));
				$count_notices = $check_notices -> rowCount();
				if($count_notices == 0){
					die(json_encode(array("notice_not_found", "No se encontró el aviso!")));
				}
				$id = $_POST["id"];
				$delete = $_POST["delete"];
				$delete2 = $_POST["delete2"];
				$aviso = new Avisos($_SESSION["id"], $titulo_aviso, $descripcion_aviso, $filename_avisos, $foto_aviso, $filename_archivo_aviso, $archivo_file_aviso);
				$aviso -> editNotice($id, $delete, $delete2);
				die(json_encode(array("success", "Se ha modificado el aviso!")));
            	break;
			break;
        }
	}
/**
 * *    ██████  ██████  ███    ███ ██    ██ ███    ██ ██  ██████  █████  ██████   ██████  ███████ 
 * *   ██      ██    ██ ████  ████ ██    ██ ████   ██ ██ ██      ██   ██ ██   ██ ██    ██ ██      
 * *   ██      ██    ██ ██ ████ ██ ██    ██ ██ ██  ██ ██ ██      ███████ ██   ██ ██    ██ ███████ 
 * *   ██      ██    ██ ██  ██  ██ ██    ██ ██  ██ ██ ██ ██      ██   ██ ██   ██ ██    ██      ██ 
 * *    ██████  ██████  ██      ██  ██████  ██   ████ ██  ██████ ██   ██ ██████   ██████  ███████                                                                                                
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "comunicados"){
	if(isset($_POST["titulo_comunicado"], $_POST["descripcion_comunicado"], $_POST["method"])){
		//TÍTULO DEL COMUNICADO
		if(empty($_POST["titulo_comunicado"])){
			die(json_encode(array("error", "El título del comunicado no puede estar vacío")));
		}else if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["titulo_comunicado"])){
			die(json_encode(array("error", "El título del comunicado no puede tener solamente símbolos especiales y debe contener al menos una letra")));
		}else{
			$titulo_comunicado = $_POST["titulo_comunicado"];
		}

		//DESCRIPCIÓN DEL COMUNICADO
		if(empty($_POST["descripcion_comunicado"])){
			die(json_encode(array("error", "La descripción del comunicado no puede estar vacío")));
		}else if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["descripcion_comunicado"])){
			die(json_encode(array("error", "La descripción del comunicado no puede tener solamente símbolos especiales y debe contener al menos una letra")));
		}else{
			$descripcion_comunicado = $_POST["descripcion_comunicado"];
		}

		//FOTO DESTACADA DEL COMUNICADO
		if(isset($_FILES['comunicado_foto']['name'])){
			$allowed = array('jpeg', 'png', 'jpg');
			$filename_comunicados = $_FILES['comunicado_foto']['name'];
			$ext = pathinfo($filename_comunicados, PATHINFO_EXTENSION);
			if (!in_array($ext, $allowed)) {
				die(json_encode(array("error", "Solo se permite jpg, jpeg y pngs")));
			}else if($_FILES['comunicado_foto']['size'] > 10485760){
				die(json_encode(array("error", "Las imágenes deben pesar ser menos de 10 MB")));
			}else{
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mimetype = finfo_file($finfo, $_FILES["comunicado_foto"]["tmp_name"]);
				finfo_close($finfo);
				if($mimetype != "image/jpeg" && $mimetype != "image/png"){
					die(json_encode(array("error", "Por favor, asegúrese que la imagen sea originalmente un archivo png, jpg y jpeg")));
				}
			}
			$comunicado_foto=$_FILES['comunicado_foto'];
		}else{
			$filename_comunicados = null;
			$comunicado_foto=null;
		}

		//ARCHIVO
		if(isset($_FILES['archivo_comunicado']['name'])){
			$allowed_archivo = array('pdf', 'jpeg', 'png', 'jpg');
			$filename_archivo_comunicado = $_FILES['archivo_comunicado']['name'];
			$ext_archivo = pathinfo($filename_archivo_comunicado, PATHINFO_EXTENSION);
			if (!in_array($ext_archivo, $allowed_archivo)) {
				die(json_encode(array("error", "Solo se permite pdf, jpg, jpeg y pngs")));
			}else if($_FILES['archivo_comunicado']['size'] > 10485760){
				die(json_encode(array("error", "Los archivos deben pesar ser menos de 10 MB")));
			}else{
				$finfo_archivo = finfo_open(FILEINFO_MIME_TYPE);
				$mimetype_archivo = finfo_file($finfo_archivo, $_FILES["archivo_comunicado"]["tmp_name"]);
				finfo_close($finfo_archivo);
				if($mimetype_archivo != "image/jpeg" && $mimetype_archivo != "image/png" && $mimetype_archivo != "application/pdf"){
					die(json_encode(array("error", "Por favor, asegúrese que el archivo sea originalmente un archivo pdf, png, jpg y jpeg")));
				}
			}
			$archivo_comunicado=$_FILES['archivo_comunicado'];
		}else{
			$filename_archivo_comunicado = null;
			$archivo_comunicado = null;
		}

		switch($_POST["method"]){
			case "store":
				$comunicado = new Comunicados($_SESSION["id"], $titulo_comunicado, $descripcion_comunicado, $filename_comunicados, $comunicado_foto, $filename_archivo_comunicado, $archivo_comunicado);
				$comunicado -> insertCommunicate();
				die(json_encode(array("success", "Se ha creado el comunicado!")));
				break;
			break;
			case "edit":
				$check_communicates = $object -> _db -> prepare("SELECT * FROM comunicados WHERE id=:id");
				$check_communicates -> execute(array(":id" => $_POST["id"]));
				$count_communicates = $check_communicates -> rowCount();
				if($count_communicates == 0){
					die(json_encode(array("communicate_not_found", "No se encontró el comunicado!")));
				}
				$id = $_POST["id"];
				$delete = $_POST["delete"];
				$delete2 = $_POST["delete2"];
				$comunicado = new Comunicados($_SESSION["id"], $titulo_comunicado, $descripcion_comunicado, $filename_comunicados, $comunicado_foto, $filename_archivo_comunicado, $archivo_comunicado);
				$comunicado -> editCommunicate($id, $delete, $delete2);
				die(json_encode(array("success", "Se ha modificado el comunicado!")));
				break;
			break;
		}
	}
/**
 * *   ███████ ██████  ██ ████████  █████  ██████      ███████ ███████ ████████  █████  ████████ ██    ██ ███████ 
 * *   ██      ██   ██ ██    ██    ██   ██ ██   ██     ██      ██         ██    ██   ██    ██    ██    ██ ██      
 * *   █████   ██   ██ ██    ██    ███████ ██████      █████   ███████    ██    ███████    ██    ██    ██ ███████ 
 * *   ██      ██   ██ ██    ██    ██   ██ ██   ██     ██           ██    ██    ██   ██    ██    ██    ██      ██ 
 * *   ███████ ██████  ██    ██    ██   ██ ██   ██     ███████ ███████    ██    ██   ██    ██     ██████  ███████                                                                                                                
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "editStatus"){
	if(isset($_POST["estatus"], $_POST["sueldo"], $_POST["comentarios"], $_POST["id"])){

		//Permisos
		if((Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") && (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "false")){ 
			die(json_encode(array("forbidden", "No tienes los permisos necesarios para modificar el estatus de la incidencia")));
		}

		//Checar si la solicitud existe
		$check_request = $object -> _db -> prepare("SELECT * FROM incidencias i WHERE i.id=:incidenciaid");
		$check_request -> execute(array(':incidenciaid' => $_POST["id"]));
		$count_request = $check_request -> rowCount();
		if($count_request == 0){
			die(json_encode(array("incidencia_not_found", "Esta incidencia no existe!")));
		}else{
			$id = $_POST["id"];
		}

		//El estatus solo puede estar entre 1, 2 y 3
		$estatus_array = array(1, 2, 3);
		if (in_array($_POST["estatus"], $estatus_array)) {
			$estatus= $_POST["estatus"];
		}else{
			die(json_encode(array("error", "El estatus solamente puede tener un valor definido, por favor, vuelva  a cargar la página!")));
		}
		
		//Goce de sueldo solamente puede ser 0 y 1
		if(!(empty($_POST["sueldo"]))){
			$sueldo_array = array(0, 1);
				if (in_array($_POST["sueldo"], $sueldo_array)) {
					$sueldo= $_POST["sueldo"];
				}else{
					die(json_encode(array("error", "El sueldo solamente puede tener un valor definido, por favor, vuelva a cargar la página!")));
				}
		}else{
			$sueldo=null;
		}
		
		if(empty($_POST["comentarios"])){
			die(json_encode(array("error", "Los comentarios no pueden estar vacíos")));
		}else{
			if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["comentarios"])){
				die(json_encode(array("error", "Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra")));
			}else{
				$comentarios = $_POST["comentarios"];
			}
		}

		Incidencias::editStatus($id, $estatus, $sueldo, $comentarios, $_SESSION["id"]);
        die(json_encode(array("success", "Se ha editado el estatus de la incidencia!")));
	}
/**
 * *   ███████ ██████  ██ ████████  █████  ██████      ███████ ███████ ████████  █████  ████████ ██    ██ ███████     ██    ██  █████   ██████  █████   ██████ ██  ██████  ███    ██ ███████ ███████ 
 * *   ██      ██   ██ ██    ██    ██   ██ ██   ██     ██      ██         ██    ██   ██    ██    ██    ██ ██          ██    ██ ██   ██ ██      ██   ██ ██      ██ ██    ██ ████   ██ ██      ██      
 * *   █████   ██   ██ ██    ██    ███████ ██████      █████   ███████    ██    ███████    ██    ██    ██ ███████     ██    ██ ███████ ██      ███████ ██      ██ ██    ██ ██ ██  ██ █████   ███████ 
 * *   ██      ██   ██ ██    ██    ██   ██ ██   ██     ██           ██    ██    ██   ██    ██    ██    ██      ██      ██  ██  ██   ██ ██      ██   ██ ██      ██ ██    ██ ██  ██ ██ ██           ██ 
 * *   ███████ ██████  ██    ██    ██   ██ ██   ██     ███████ ███████    ██    ██   ██    ██     ██████  ███████       ████   ██   ██  ██████ ██   ██  ██████ ██  ██████  ██   ████ ███████ ███████                                                                                                                                                                                                   
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "editStatus_vacaciones"){
	if(isset($_POST["estatus_vacaciones"], $_POST["comentarios_vacaciones"], $_POST["id"])){

		//Permisos
		if((Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") && (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "false")){ 
			die(json_encode(array("forbidden", "No tienes los permisos necesarios para modificar el estatus de la solicitud de vacaciones")));
		}

		//Checar si la solicitud existe
		$check_request = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones WHERE id=:solicitudid");
		$check_request -> execute(array(':solicitudid' => $_POST["id"]));
		$count_request = $check_request -> rowCount();
		if($count_request == 0){
			die(json_encode(array("solicitud_not_found", "Esta solicitud de vacaciones no existe!")));
		}else{
			$id = $_POST["id"];
		}

		//El estatus solo puede estar entre 1, 2 y 3
		$estatus_vacaciones_array = array(1, 2, 3);
		if (in_array($_POST["estatus_vacaciones"], $estatus_vacaciones_array)) {
			$estatus_vacaciones= $_POST["estatus_vacaciones"];
		}else{
			die(json_encode(array("error", "El estatus solamente puede tener un valor definido, por favor, vuelva  a cargar la página!")));
		}
		
		if(empty($_POST["comentarios_vacaciones"])){
			die(json_encode(array("error", "Los comentarios no pueden estar vacíos")));
		}else{
			if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["comentarios_vacaciones"])){
				die(json_encode(array("error", "Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra")));
			}else{
				$comentarios_vacaciones = $_POST["comentarios_vacaciones"];
			}
		}

		Vacaciones::editStatus($id, $estatus_vacaciones, $comentarios_vacaciones, $_SESSION["id"]);
        die(json_encode(array("success", "Se ha editado el estatus de la solicitud de vacaciones!")));
	}
/**
 * *   ██   ██ ██ ███████ ████████  ██████  ██████  ██  █████  ██          ██    ██  █████   ██████  █████   ██████ ██  ██████  ███    ██ ███████ ███████ 
 * *   ██   ██ ██ ██         ██    ██    ██ ██   ██ ██ ██   ██ ██          ██    ██ ██   ██ ██      ██   ██ ██      ██ ██    ██ ████   ██ ██      ██      
 * *   ███████ ██ ███████    ██    ██    ██ ██████  ██ ███████ ██          ██    ██ ███████ ██      ███████ ██      ██ ██    ██ ██ ██  ██ █████   ███████ 
 * *   ██   ██ ██      ██    ██    ██    ██ ██   ██ ██ ██   ██ ██           ██  ██  ██   ██ ██      ██   ██ ██      ██ ██    ██ ██  ██ ██ ██           ██ 
 * *   ██   ██ ██ ███████    ██     ██████  ██   ██ ██ ██   ██ ███████       ████   ██   ██  ██████ ██   ██  ██████ ██  ██████  ██   ████ ███████ ███████                                                                                                                                                        
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "Historial_vacaciones"){
	if(isset($_POST["select2"], $_POST["select2text"], $_POST["periodo_vacaciones"], $_POST["fecha_vacaciones"], $_POST["estatus_vacaciones"], $_POST["method"])){
		
		//Checar permisos
		if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a vacaciones") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Acceso al historial de vacaciones") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
			die(json_encode(array("forbidden", "No tiene permisos para realizar estas acciones")));
		}

		//Checar si la solicitud existe
		if($_POST["method"] == "edit"){
			$check_solicitud_historial = $object -> _db->prepare("SELECT * FROM historial_solicitud_vacaciones WHERE id=:editarid");
    		$check_solicitud_historial->execute(array('editarid' => $_POST["id"]));
			$count_solicitud_historial = $check_solicitud_historial -> rowCount();
			if($count_solicitud_historial == 0){
				die(json_encode(array("solicitud_not_found", "No se encontró la solicitud")));
			}else{
				$id_solicitud = $_POST["id"];
			}
		}
		
		if($_POST["select2"] != null){
			$select2_content = $object -> _db -> prepare("SELECT usuarios.id AS userid, concat(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS nombre FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id INNER JOIN expedientes ON expedientes.users_id=usuarios.id WHERE roles.nombre NOT IN('Superadministrador', 'Administrador', 'Director general', 'Usuario externo')");
			$select2_content -> execute();
			
			$fetch_select2_content = $select2_content -> fetchAll(PDO::FETCH_KEY_PAIR);
		
			if (array_key_exists($_POST["select2"], $fetch_select2_content)) {
				$array_key_value = $fetch_select2_content[$_POST["select2"]];
				if(isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value){
					$select2 = $_POST["select2"];
				}else{
					die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
				}
			}else{
				die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
			}
		}else{
			die(json_encode(array("error", "Debe asignar un usuario a la solicitud")));
		}
		
		
		function validateDate($date, $format = 'Y-m-d H:i:s')
		{
			$d = DateTime::createFromFormat($format, $date);
			return $d && $d->format($format) == $date;
		}
		
		function dateDiffInDays($date1, $date2)
		{
			$diff = strtotime($date2) - strtotime($date1);
			return abs(round($diff / 86400));
		}
		
		if(empty($_POST["periodo_vacaciones"])){
			die(json_encode(array("error", "El período no puede estar vacío")));
		}else if(!preg_match("/^\d{4}\/\d{2}\/\d{2}+[\s]-[\s]\d{4}\/\d{2}\/\d{2}$/", $_POST["periodo_vacaciones"])){
			die(json_encode(array("error", "La fecha elegida en el periodo vacacional no tiene el formato adecuado")));
		}else{
			$break_date = explode(" - ",$_POST["periodo_vacaciones"]);
			$check_validdate0 = validateDate($break_date[0], 'Y/m/d');
			$check_validdate1 = validateDate($break_date[1], 'Y/m/d');
			if($check_validdate0 = false){
				die(json_encode(array("error", "La fecha de inicio en el periodo vacacional es inválida")));
			}else if($check_validdate1 = false){
				die(json_encode(array("error", "La fecha de fin en el periodo vacacional es inválida")));
			}
			
			$days = dateDiffInDays($break_date[0], $break_date[1]);
			$days = $days + 1;
			
			$fecha_inicio = new DateTime($break_date[0]);
			$fecha_fin    = new DateTime($break_date[1]);
			
			if ($fecha_inicio > $fecha_fin) {
				die(json_encode(array("error", "La fecha de inicio no puede ser mayor a la fecha de fin")));
			}

			$periodo_vacaciones = $_POST["periodo_vacaciones"];
		}
		
		if(empty($_POST["fecha_vacaciones"])){
			die(json_encode(array("error", "Por favor, seleccione una fecha en el que fue expedido la solicitud")));
		}else if(!preg_match("/^(\d{4})\/(\d{2})\/(\d{2})[\s](\d{2}):(\d{2}):(\d{2})$/", $_POST["fecha_vacaciones"])){
			die(json_encode(array("error", "La fecha seleccionada en la solicitud no tiene el formato adecuado")));
		}else{
			$check_validdate = validateDate($_POST["fecha_vacaciones"], 'Y-m-d H:i:s');
			if($check_validdate = false){
				die(json_encode(array("error", "La fecha seleccionada en la solicitud es inválida")));
			}
			$fecha_vacaciones = $_POST["fecha_vacaciones"];
		}
		
		
		//El estatus solo puede estar entre 1, 2 y 3
		$estatus_historial_vacaciones_array = array(1, 2, 3);
		if (in_array($_POST["estatus_vacaciones"], $estatus_historial_vacaciones_array)) {
			$estatus_vacaciones= $_POST["estatus_vacaciones"];
		}else{
			die(json_encode(array("failed", "El estatus solamente puede tener un valor definido, por favor, vuelva  a cargar la página!")));
		}
		
		
		switch($_POST["method"]){
			case "store":
				Vacaciones::Subir_historial($select2, $periodo_vacaciones, $days, $fecha_vacaciones, $estatus_vacaciones);
				die(json_encode(array("success", "Se ha subido la solicitud de vacaciones en el historial!")));
			break;
			case "edit":
				Vacaciones::Editar_historial($select2, $periodo_vacaciones, $days, $fecha_vacaciones, $estatus_vacaciones, $id_solicitud);
				die(json_encode(array("success", "Se ha editado la solicitud de vacaciones en el historial!")));
            break;
		}
	}
/**
 * *   ████████  ██████  ██   ██ ███████ ███    ██     ███████ ██   ██ ██████  ███████ ██████  ██ ███████ ███    ██ ████████ ███████ 
 * *      ██    ██    ██ ██  ██  ██      ████   ██     ██       ██ ██  ██   ██ ██      ██   ██ ██ ██      ████   ██    ██    ██      
 * *      ██    ██    ██ █████   █████   ██ ██  ██     █████     ███   ██████  █████   ██   ██ ██ █████   ██ ██  ██    ██    █████   
 * *      ██    ██    ██ ██  ██  ██      ██  ██ ██     ██       ██ ██  ██      ██      ██   ██ ██ ██      ██  ██ ██    ██    ██      
 * *      ██     ██████  ██   ██ ███████ ██   ████     ███████ ██   ██ ██      ███████ ██████  ██ ███████ ██   ████    ██    ███████                                                                                                                                   
*/
}else if(isset($_POST["app"]) && $_POST["app"] == "token_expediente"){
	if(isset($_POST["select2"], $_POST["select2text"])){	
		$check_token_user_expediente = $object -> _db -> prepare("SELECT expedientes.* FROM expedientes INNER JOIN usuarios ON usuarios.id=expedientes.users_id WHERE NOT EXISTS(SELECT token FROM token_expediente WHERE token_expediente.expedientes_id=expedientes.id) AND expedientes.id=:expedienteid");
		$check_token_user_expediente -> execute(array(':expedienteid' => $_POST["select2"]));
		$count_results = $check_token_user_expediente -> rowCount();
		if($count_results == 0){
			die(json_encode(array("tokenFound_userNotFound_userNotLinked", "El expediente ya tiene un token ó el usuario no existe ó el usuario no está vinculado a ningún expediente", $_POST["select2"], $_POST["select2text"])));
		}
		
		if($_POST["select2"] != null){
			$select2_content = $object -> _db -> prepare("SELECT expedientes.id as id, CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) AS nombre FROM expedientes INNER JOIN usuarios ON usuarios.id=expedientes.users_id WHERE NOT EXISTS(SELECT token FROM token_expediente WHERE token_expediente.expedientes_id=expedientes.id) AND expedientes.id=:expedienteid");
			$select2_content -> execute(array(':expedienteid' => $_POST["select2"]));
			$fetch_select2_content = $select2_content -> fetchAll(PDO::FETCH_KEY_PAIR);
		
			if (array_key_exists($_POST["select2"], $fetch_select2_content)) {
				$array_key_value = $fetch_select2_content[$_POST["select2"]];
				if(isset($_POST["select2text"]) && $_POST['select2text'] == $array_key_value){
					$select2 = $_POST["select2"];
				}else{
					die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
				}
			}else{
				die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
			}
		}else{
			die(json_encode(array("error", "Debe escoger un usuario para asignarle el token")));
		}
		
		Expedientes::Asignar_token($_POST["select2"]);
		die(json_encode(array("success", "Se ha asignado un token al expediente", $_POST["select2"], $_POST["select2text"])));
	}
/**
 * *   ███████ ██   ██ ██████  ███████ ██████  ██ ███████ ███    ██ ████████ ███████     ███    ███  ██████  ██████   ██████      ███████ ██████  ██  ██████ ██  ██████  ███    ██ 
 * &   ██       ██ ██  ██   ██ ██      ██   ██ ██ ██      ████   ██    ██    ██          ████  ████ ██    ██ ██   ██ ██    ██     ██      ██   ██ ██ ██      ██ ██    ██ ████   ██ 
 * &   █████     ███   ██████  █████   ██   ██ ██ █████   ██ ██  ██    ██    █████       ██ ████ ██ ██    ██ ██   ██ ██    ██     █████   ██   ██ ██ ██      ██ ██    ██ ██ ██  ██ 
 * &   ██       ██ ██  ██      ██      ██   ██ ██ ██      ██  ██ ██    ██    ██          ██  ██  ██ ██    ██ ██   ██ ██    ██     ██      ██   ██ ██ ██      ██ ██    ██ ██  ██ ██ 
 * *   ███████ ██   ██ ██      ███████ ██████  ██ ███████ ██   ████    ██    ███████     ██      ██  ██████  ██████   ██████      ███████ ██████  ██  ██████ ██  ██████  ██   ████                                                                                                                                                                                 
*/

}else if(isset($_POST["app"]) && $_POST["app"] == "expediente_modo_edicion"){

	function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}

	function quitarAcentos($texto) {
		$texto = str_replace(
			['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'],
			['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'],
			$texto
		);
		return $texto;
	}
	
	/**
	 * !   ██████   █████  ████████  ██████  ███████  ██████  
	 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██       
	 * !   ██   ██ ███████    ██    ██    ██ ███████ ██   ███ 
	 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██    ██ 
	 * !   ██████  ██   ██    ██     ██████  ███████  ██████                                                        
	*/

	if($_POST["pestaña"] == "DatosG"){
		if(isset( $_POST["estudios"], $_POST["posee_correo"],$_POST["correo_adicional"], $_POST["calle"], $_POST["ninterior"], $_POST["nexterior"], 
		$_POST["colonia"], $_POST["estado"],$_POST["estadotext"], $_POST["municipio"], $_POST["municipiotext"], $_POST["codigo"], $_POST["teldom"], $_POST["posee_telmov"], 
		$_POST["telmov"], $_POST["radio"], $_POST["ecivil"], $_POST["posee_retencion"], $_POST["monto_mensual"], $_POST["fechanac"], $_POST["fechacon"], 
		$_POST["fechaalta"], $_POST["curp"], $_POST["nss"], $_POST["rfc"], $_POST["identificacion"], $_POST["numeroidentificacion"])){

/* 
	 +  =============================================== 		EMPIEZA LA VALIDACIÓN DE LOS DATOS GENERALES		=============================================== 
*/			
			

		//NIVEL DE ESTUDIOS
		$nivelestudios_array = array("PRIMARIA", "SECUNDARIA", "BACHILLERATO", "CARRERA TECNICA", "LICENCIATURA", "ESPECIALIDAD", "MAESTRIA", "DOCTORADO");
		//Verifica si el valor seleccionado coincide con los valores que hay en el arreglo
		if (in_array($_POST["estudios"], $nivelestudios_array)) {
			$estudios = $_POST["estudios"];
		}else if(empty($_POST["estudios"])){
			$estudios = null;
		}else{
			die(json_encode(array("error", "El valor escogido en el dropdown de nivel de estudios está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		//CORREO ELECTRÓNICO
		if($_POST["posee_correo"] == "si"){
			//Checa si el correo está vacío
			if(empty($_POST["correo_adicional"])){
				die(json_encode(array("error", "Por favor, ingrese un correo adicional")));
			}else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo_adicional"])){
				die(json_encode(array("error", "Asegúrese que el texto ingresado en correo adicional este en formato de email")));
			}else{
				$posee_correo= $_POST["posee_correo"];
				//Conviertelo en mayúsculas
				$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
				//Quitale los acentos
				$posee_correo = quitarAcentos($posee_correo);
				//Los servidores de correo y los sistemas de correo electrónico generalmente son sensibles a los acentos en los caracteres. Esto significa que "mi.correo@gmail.com" y "mí.correo@gmail.com" se considerarían direcciones de correo electrónico distintas, lo mismo que las mayúsculas lo cual significa que aquí la regla de los acentos y mayúsculas no aplican en los correos
				$correo_adicional = $_POST["correo_adicional"];
			}
		}else{
			$posee_correo = $_POST["posee_correo"];
			$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
			$posee_correo = quitarAcentos($posee_correo);
			$correo_adicional = null;
		}

		//CALLE
		if(empty($_POST["calle"])){
			$calle = null;
		}else{
			//Verifica si el campo de la calle está bien escrito, no acepta $%&"#@
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["calle"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios en la calle")));
			}else{
				$calle = $_POST["calle"];  
				$calle = mb_strtoupper($calle, 'UTF-8');
				$calle = quitarAcentos($calle);
			}
		}

		// NÚMERO INTERIOR
		// Checa si está vacío
		if(empty($_POST["ninterior"])){
			$ninterior = null; // Si no se proporciona el número interior, lo establecemos como nulo.
		}else{
			$ninterior = $_POST["ninterior"]; // Asignamos el número interior si pasa la validación.
		}

		// NÚMERO EXTERIOR
		//Checa si está vacío
		if(empty($_POST["nexterior"])){
			$nexterior = null; // Si no se proporciona el número exterior, lo establecemos como nulo.
		}else{
			$nexterior = $_POST["nexterior"]; // Asignamos el número exterior si pasa la validación.
		}

		// COLONIA
		if(empty($_POST["colonia"])){
			$colonia = null; 
		}else{
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["colonia"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos, puntos, guiones intermedios y espacios en la colonia")));
			}else{
				$colonia = $_POST["colonia"]; 
				$colonia = mb_strtoupper($colonia, 'UTF-8');
				$colonia = quitarAcentos($colonia);
			}
		}

		// ESTADO
		if(empty($_POST["estado"])){
			$estado = null;
		}else{
			$retrieve_estados = $object->_db->prepare("SELECT id, nombre FROM estados"); // Preparar y ejecutar una consulta para recuperar la lista de estados
			$retrieve_estados->execute();

			$fetch_retrieve_estados = $retrieve_estados->fetchAll(PDO::FETCH_KEY_PAIR); // Obtener los resultados de la consulta como un arreglo asociativo con ID como clave y Nombre como valor

			if (array_key_exists($_POST["estado"], $fetch_retrieve_estados)) { // El estado seleccionado coincide con uno de los estados en el dropdown
				$array_key_state_value = $fetch_retrieve_estados[$_POST["estado"]];

				// Verificar si el texto ingresado (si existe) coincide con el valor del estado
				if (isset($_POST["estadotext"]) && $_POST['estadotext'] == $array_key_state_value) {
					$estado = $_POST["estado"];
				} else {
					die(json_encode(array("error", "Por favor, asegúrese de que el estado escogido se encuentre en el dropdown")));
				}
			} else {
				die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los estados registrados")));
			}
		}

		// MUNICIPIO
		if (empty($_POST["municipio"])) {
			$municipio = null;
		} else if (empty($_POST["estado"]) && !(empty($_POST["municipio"]))) {
			die(json_encode(array("error", "Por favor, seleccione un estado y luego un municipio")));
		} else {
			$retrieve_estados_municipio = $object->_db->prepare("SELECT id, nombre from municipios where estado=:estado");
			$retrieve_estados_municipio->execute(array(':estado' => $_POST["estado"]));

			$count_retrieve_estados_municipio = $retrieve_estados_municipio->rowCount();

			if ($count_retrieve_estados_municipio > 0) {
				$fetch_retrieve_estados_municipio = $retrieve_estados_municipio->fetchAll(PDO::FETCH_KEY_PAIR);

				if (array_key_exists($_POST["municipio"], $fetch_retrieve_estados_municipio)) {
					$array_key_municipio_value = $fetch_retrieve_estados_municipio[$_POST["municipio"]];

					if (isset($_POST["municipiotext"]) && $_POST['municipiotext'] == $array_key_municipio_value) {
						$municipio = $_POST["municipio"];
					} else {
						die(json_encode(array("error", "Por favor, asegúrese de que el municipio escogido se encuentre en el dropdown")));
					}
				} else {
					die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los municipios registrados")));
				}
			} else {
				die(json_encode(array("error", "El estado elegido no tiene ningún municipio; el dropdown de municipios debe estar vacío")));
			}
		}

		// CÓDIGO POSTAL
		if(empty($_POST["codigo"])){
			$codigo = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["codigo"])){
				die(json_encode(array("error", "Solo se permiten números en el código postal")));
			}else{
				$codigo = $_POST["codigo"];
			}
		}

		// TELÉFONO DE DOMICILIO
		if(empty($_POST["teldom"])){
			$teldom = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["teldom"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de domicilio")));
			}else if(strlen($_POST["teldom"]) != 10){
				die(json_encode(array("error", "El teléfono de domicilio debe tener exactamente 10 caracteres")));
			}else{
				$teldom = $_POST["teldom"];
			}
		}

		// POSEE TELÉFONO MÓVIL PROPIO
		if($_POST["posee_telmov"] == "si"){
			if(empty($_POST["telmov"])){
				die(json_encode(array("error", "Por favor, ingrese un teléfono móvil")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["telmov"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de móvil")));
			}else if(strlen($_POST["telmov"]) != 10){
				die(json_encode(array("error", "El teléfono móvil debe tener exactamente 10 caracteres")));
			}else{
				$posee_telmov = $_POST["posee_telmov"];
				$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
				$posee_telmov = quitarAcentos($posee_telmov);
				$telmov = $_POST["telmov"];
			}
		}else{
			// Si no se selecciona "Sí" para poseer teléfono móvil, establecer los valores correspondientes
			$posee_telmov = $_POST["posee_telmov"];
			$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
			$posee_telmov = quitarAcentos($posee_telmov);
			$telmov = null;
		}


		//CASA PROPIA
		if(empty($_POST["radio"])){
			die(json_encode(array("error", "Por favor, ingrese el radiobutton de casa propia no puede ir vacío")));
		}else{
			$casa_propia = $_POST["radio"];
			$casa_propia = mb_strtoupper($casa_propia, 'UTF-8');
			$casa_propia = quitarAcentos($casa_propia);
		}

		// ESTADO CIVIL
		$estadocivil_array = array("SOLTERO", "CASADO", "DIVORCIADO", "UNIÓN LIBRE");

		if (in_array($_POST["ecivil"], $estadocivil_array)) {
			$ecivil = $_POST["ecivil"];
		} else if (empty($_POST["ecivil"])) {
			$ecivil = null;
		} else {
			// Si "ecivil" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de estado civil está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// POSEE RETENCIÓN
		if ($_POST["posee_retencion"] == "si") {
			if (empty($_POST["monto_mensual"])) {
				die(json_encode(array("error", "Por favor, ingrese el monto mensual")));
			} else if (!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["monto_mensual"])) {
				die(json_encode(array("error", "Solo se permiten números y decimales en el monto mensual")));
			} else {
				$posee_retencion = $_POST["posee_retencion"];
				$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
				$posee_retencion = quitarAcentos($posee_retencion);
				$monto_mensual = $_POST["monto_mensual"];
			}
		} else {
			$posee_retencion = $_POST["posee_retencion"];
			$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
			$posee_retencion = quitarAcentos($posee_retencion);
			$monto_mensual = null;
		}

		// FECHA DE NACIMIENTO
		if (empty($_POST["fechanac"])) {
			$fechanac = null;
		} else {
			$_POST["fechanac"] = str_replace('/', '-', $_POST["fechanac"]); // Reemplaza las barras oblicuas por guiones
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechanac"])) { // Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de nacimiento")));
			} else {
				$check_fechanac = validateDate($_POST["fechanac"], 'Y-m-d');
		
				// Verifica si la fecha de nacimiento es inválida
				if (!$check_fechanac) {
					die(json_encode(array("error", "La fecha de nacimiento no es válida")));
				}
		
				// Calcula la edad a partir de la fecha de nacimiento
				$fecha_nacimiento = new DateTime($_POST["fechanac"]);
				$fecha_hoy = new DateTime();
				$edad = $fecha_nacimiento->diff($fecha_hoy)->y;
		
				// Verifica si el solicitante es menor de 18 años
				if ($edad < 18) {
					die(json_encode(array("error", "Debes ser mayor de 18 años para aplicar")));
				}
		
				$fechanac = $_POST["fechanac"];
			}
		}

		// FECHA DE INICIO DE CONTRATO
		if (empty($_POST["fechacon"])) {
			$fechacon = null;
		} else {
			$_POST["fechacon"] = str_replace('/', '-', $_POST["fechacon"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechacon"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de contrato")));
			} else {
				$check_fechacon = validateDate($_POST["fechacon"], 'Y-m-d');
		
				if (!$check_fechacon) {
					die(json_encode(array("error", "La fecha de inicio de contrato es inválida")));
				}
		
				$fechacon = $_POST["fechacon"];
			}
		}

		// FECHA DE ALTA
		if (empty($_POST["fechaalta"])) {
			$fechaalta = null;
		} else {
			$_POST["fechaalta"] = str_replace('/', '-', $_POST["fechaalta"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechaalta"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de alta")));
			} else {
				$check_fechaalta = validateDate($_POST["fechaalta"], 'Y-m-d');
		
				if (!$check_fechaalta) {
					die(json_encode(array("error", "La fecha de alta es inválida")));
				}
		
				$fechaalta = $_POST["fechaalta"];
			}
		}	

		//CURP
		if(empty($_POST["curp"])){
			$curp = null;
		}else{
			if(!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $_POST["curp"])){
				die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR")));
			}else{
				$curp= $_POST["curp"];
				$curp = mb_strtoupper($curp, 'UTF-8');
				$curp = quitarAcentos($curp);
			}
		}

		//NÚMERO DE SEGURO SOCIAL
		if(empty($_POST["nss"])){
			$nss = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["nss"])){
				die(json_encode(array("error", "Solo se permiten números en el número de seguro social")));
			}else{
				$nss = $_POST["nss"];
			}
		}

		//RFC
		if(empty($_POST["rfc"])){
			$rfc = null;
		}else{
			if(!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $_POST["rfc"])){
				die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789")));
			}else{
				$rfc = $_POST["rfc"];
				$rfc = mb_strtoupper($rfc, 'UTF-8');
				$rfc = quitarAcentos($rfc);
			}
		}

		//TIPO DE IDENTIFICACIÓN
		$identificacion_array = array("INE", "PASAPORTE", "CEDULA");
		if(in_array($_POST["identificacion"], $identificacion_array)) {
			$identificacion = $_POST["identificacion"];
		}else if(empty($_POST["identificacion"])){
			$identificacion = null;
		}else{
			die(json_encode(array("error", "El valor escogido en el dropdown de tipo de identificación está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		//NÚMERO DE IDENTIFICACIÓN
		if(empty($_POST["numeroidentificacion"])){
			$numeroidentificacion = null;
		}else{
			if($_POST["identificacion"] == "INE"){
				if (!preg_match('/^[A-Za-z0-9]{13}$/', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "El INE solo puede contener 13 caracteres y debe ser alfanúmerico")));
				}
			}else if($_POST["identificacion"] == "PASAPORTE"){
				if (!preg_match('/^[A-Z]{3}\d{6}$/i', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "El PASAPORTE solo puede contener 9 caracteres, debe ser alfanúmerico y debe comenzar con 3 letras y seguido de 6 números")));
				}
			}else if($_POST["identificacion"] == "CEDULA"){
				if (!preg_match('/^\d{7,10}$/', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "La CEDULA solo puede contener entre 7 y 10 dígitos y debe ser númerico")));
				}
			}
			$numeroidentificacion = $_POST["numeroidentificacion"];
			$numeroidentificacion = mb_strtoupper($numeroidentificacion, 'UTF-8');
			$numeroidentificacion = quitarAcentos($numeroidentificacion);
		}

/** 
	 +  =============================================== 		TERMINA LA VALIDACIÓN DE LOS DATOS GENERALES		=============================================== 
*/

			//Envia los datos 
			$expediente = new Expedientes($_SESSION['id'], null, null,null,null, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, null, null, null, null, null, null, null, null, null, null, null, null, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, null, null, null, $curp, $nss, $rfc, $identificacion, $numeroidentificacion);
			$expediente ->Insertar_expedientetoken_datosG();

			die(json_encode(array("success", "Se han guardado exitosamente los datos generales")));
		}else{
			die(json_encode(array("error", "Faltan datos requeridos en la solicitud.")));
		}

	/**
	 * !   ██████   █████  ████████  ██████  ███████  █████  
	 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
	 * !   ██   ██ ███████    ██    ██    ██ ███████ ███████ 
	 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
	 * !   ██████  ██   ██    ██     ██████  ███████ ██   ██                                                       
	*/

	}else if($_POST["pestaña"] == "DatosA"){
		if(isset($_POST["numeroreferenciaslab"],$_POST["numerofamiliares"], $_POST["fechauniforme"], $_POST["cantidadpolo"], $_POST["tallapolo"], 
		$_POST["emergencianom"], $_POST["emergenciaapat"], $_POST["emergenciaamat"], $_POST["emergenciarelacion"], $_POST["emergenciatelefono"], $_POST["emergencianom2"], 
		$_POST["emergenciaapat2"], $_POST["emergenciaamat2"], $_POST["emergenciarelacion2"], $_POST["emergenciatelefono2"], 
		$_POST["tipo_sangre"], $_POST["vacante"], $_POST["radio2"], $_POST["nomfam"], $_POST["apellidopatfam"], $_POST["apellidomatfam"],$_POST["numerofamiliares"])){
			
/** 
	 +  =============================================== 		INICIA LA VALIDACIÓN DE LOS DATOS ADICIONALES		=============================================== 
*/
			
		// REFERENCIAS LABORALES
		if (!empty($_POST["numeroreferenciaslab"])) {
			if (preg_match("/^\d$/", $_POST["numeroreferenciaslab"])) {
				$referencias_decoded = json_decode($_POST["referencias"], true);
		
				// Verifica que el número de referencias coincida con la cantidad real
				if (is_array($referencias_decoded) && count($referencias_decoded) == $_POST["numeroreferenciaslab"]) {
					$referencias_contador = 1;
					foreach ($referencias_decoded as &$referencia_laboral) {
						if (empty($referencia_laboral["nombre"]) || empty($referencia_laboral["apellidopat"]) || empty($referencia_laboral["apellidomat"]) || empty($referencia_laboral["relacion"]) || empty($referencia_laboral["telefono"])) {
							die(json_encode(array("error", "Existen campos vacíos en las referencias laborales, por favor, verifique la información")));
						} else {
							//validaciones
							if (!preg_match("/^[\pL\s'-]+$/u", $referencia_laboral["nombre"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidopat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidomat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^\d{10}$/", $referencia_laboral["telefono"])) {
								die(json_encode(array("error", "El teléfono de la referencia laboral " . $referencias_contador . " debe tener exactamente 10 dígitos")));
							}
						}
						$referencia_laboral["nombre"] = mb_strtoupper(quitarAcentos($referencia_laboral["nombre"], 'UTF-8'));
						$referencia_laboral["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidopat"], 'UTF-8'));
						$referencia_laboral["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidomat"], 'UTF-8'));

						$referencias_contador++;
					}
					$referencias = json_encode($referencias_decoded); // Convierte el arreglo de vuelta a JSON
				} else {
					die(json_encode(array("error", "El número de referencias laborales ingresado no coincide con el enviado, por favor, verifique la información")));
				}
			} else {
				die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
			}
		} else {
			$referencias = null;
		}

					
		// FAMILIARES
		if (!empty($_POST["numerofamiliares"])) {
			if (preg_match("/^\d$/", $_POST["numerofamiliares"])) {
				$familiares_decoded = json_decode($_POST["familiares"], true);
		
				// Verifica que el número de familiares coincida con la cantidad real
				if (is_array($familiares_decoded) && count($familiares_decoded) == $_POST["numerofamiliares"]) {
					$familiar_contador = 1;
					foreach ($familiares_decoded as &$familiar) {
						if (empty($familiar["nombre"]) || empty($familiar["apellidopat"]) || empty($familiar["apellidomat"])) {
							die(json_encode(array("error", "Existen campos vacíos en los familiares, por favor, verifique la información")));
						} else {
							//validaciones
							if (!preg_match("/^[\pL\s'-]+$/u", $familiar["nombre"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre del familiar " . $familiar_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $familiar["apellidopat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno del familiar " . $familiar_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $familiar["apellidomat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno del familiar " . $familiar_contador)));
							} 
						}
						$familiar["nombre"] = mb_strtoupper(quitarAcentos($familiar["nombre"], 'UTF-8'));
						$familiar["apellidopat"] = mb_strtoupper(quitarAcentos($familiar["apellidopat"], 'UTF-8'));
						$familiar["apellidomat"] = mb_strtoupper(quitarAcentos($familiar["apellidomat"], 'UTF-8'));

						$familiar_contador++;
					}
					$familiares = json_encode($familiares_decoded); // Convierte el arreglo de vuelta a JSON
				} else {
					die(json_encode(array("error", "El número de familiares ingresado no coincide con el enviado, por favor, verifique la información")));
				}
			} else {
				die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de familiares")));
			}
		} else {
			$familiares = null;
		}
		// FECHA DE ENTREGA DE UNIFORME
		if (empty($_POST["fechauniforme"])) {
			$fechauniforme = null;
		} else {
			$_POST["fechauniforme"] = str_replace('/', '-', $_POST["fechauniforme"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechauniforme"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de uniforme")));
			} else {
				$check_fechauniforme = validateDate($_POST["fechauniforme"], 'Y-m-d');
		
				if (!$check_fechauniforme) {
					die(json_encode(array("error", "La fecha de uniforme es inválida")));
				}
		
				$fechauniforme = $_POST["fechauniforme"];
			}
		}

		//CANTIDAD POLO
		if(empty($_POST["cantidadpolo"])){
			$cantidadpolo = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["cantidadpolo"])){
				die(json_encode(array("error", "Solo se permiten números en el campo de cantidad polo")));
			}else{
				$cantidadpolo = $_POST["cantidadpolo"];
			}
		}

		// TALLA CAMISA
		$tallacamisa_array = array("XS", "S", "M", "L", "XL", "XXL", "XXXL");

		if (in_array($_POST["tallapolo"], $tallacamisa_array)) {
			$tallapolo = $_POST["tallapolo"];
		} else if (empty($_POST["tallapolo"])) {
			$tallapolo = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de talla camisa está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		// CONTACTOS DE EMERGENCIA
		if(empty($_POST["emergencianom"])){
			$emergencianom = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del primer contacto")));
			}else{
				$emergencianom = $_POST["emergencianom"];
				$emergencianom = mb_strtoupper($emergencianom, 'UTF-8');
				$emergencianom = quitarAcentos($emergencianom);
			}
		}

		//Apellido paterno del primer contacto de emergencia
		if(empty($_POST["emergenciaapat"])){
			$emergenciaapat = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del primer contacto")));
			}else{
				$emergenciaapat = $_POST["emergenciaapat"];
				$emergenciaapat = mb_strtoupper($emergenciaapat, 'UTF-8');
				$emergenciaapat = quitarAcentos($emergenciaapat);
			}
		}

		//Apellido materno del primer contacto de emergencia
		if(empty($_POST["emergenciaamat"])){
			$emergenciaamat = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el primer contacto")));
			}else{
				$emergenciaamat = $_POST["emergenciaamat"];
				$emergenciaamat = mb_strtoupper($emergenciaamat, 'UTF-8');
				$emergenciaamat = quitarAcentos($emergenciaamat);
			}
		}

		// Relación
	
		if (empty($_POST["emergenciarelacion"])) {
			$emergenciarelacion = null;
		} else {
			$emergenciarelacion = $_POST["emergenciarelacion"];
		}

		// Teléfono
		if(empty($_POST["emergenciatelefono"])){
			$emergenciatelefono = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del primer contacto")));
			}else if(strlen($_POST["emergenciatelefono"]) != 10){
				die(json_encode(array("error", "El teléfono de emergencia del primer contacto debe tener exactamente 10 caracteres")));
			}else{
				$emergenciatelefono = $_POST["emergenciatelefono"];
			}
		}

		//Nombre del segundo contacto de emergencia
		if(empty($_POST["emergencianom2"])){
			$emergencianom2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del segundo contacto")));
			}else{
				$emergencianom2 = $_POST["emergencianom2"];
				$emergencianom2 = mb_strtoupper($emergencianom2, 'UTF-8');
				$emergencianom2 = quitarAcentos($emergencianom2);
			}
		}

		//Apellido paterno del segundo contacto de emergencia
		if(empty($_POST["emergenciaapat2"])){
			$emergenciaapat2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del segundo contacto")));
			}else{
				$emergenciaapat2 = $_POST["emergenciaapat2"];
				$emergenciaapat2 = mb_strtoupper($emergenciaapat2, 'UTF-8');
				$emergenciaapat2 = quitarAcentos($emergenciaapat2);
			}
		}

		//Apellido materno del segundo contacto de emergencia
		if(empty($_POST["emergenciaamat2"])){
			$emergenciaamat2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el segundo contacto")));
			}else{
				$emergenciaamat2 = $_POST["emergenciaamat2"];
				$emergenciaamat2 = mb_strtoupper($emergenciaamat2, 'UTF-8');
				$emergenciaamat2 = quitarAcentos($emergenciaamat2);
			}
		}

		// Relación
			
		if (empty($_POST["emergenciarelacion2"])) {
			$emergenciarelacion2 = null;
		} else {
			$emergenciarelacion2 = $_POST["emergenciarelacion2"];
			}

		// Teléfono
		if(empty($_POST["emergenciatelefono2"])){
			$emergenciatelefono2 = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono2"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del segundo contacto")));
			}else if(strlen($_POST["emergenciatelefono2"]) != 10){
				die(json_encode(array("error", "El teléfono de emergencia del segundo contacto debe tener exactamente 10 caracteres")));
			}else{
				$emergenciatelefono2 = $_POST["emergenciatelefono2"];
			}
		}

		// TIPO DE SANGRE
		$tiposangre_array = array("A_POSITIVO", "A_NEGATIVO", "B_POSITIVO", "B_NEGATIVO", "AB_POSITIVO", "AB_NEGATIVO", "O_POSITIVO", "O_NEGATIVO");

		if (in_array($_POST["tipo_sangre"], $tiposangre_array)) {
			$tipo_sangre = $_POST["tipo_sangre"];
		} else if (empty($_POST["tipo_sangre"])) {
			$tipo_sangre = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de tipo de sangre está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// ¿CÓMO SE ENTERO DE LA VACANTE
		$vacante_array = array("PLATAFORMA LABORAL", "RECOMENDACION", "REDES SOCIALES", "AVISOS DE OCASION");

		if (in_array($_POST["vacante"], $vacante_array)) {
			$vacante = $_POST["vacante"];
		} else if (empty($_POST["vacante"])) {
			$vacante = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de ¿cómo se entero de la vacante?, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		//¿TIENE FAMILIARES EN LA EMPRESA
		if($_POST["radio2"] == "si"){
			if(empty($_POST["nomfam"])){
				die(json_encode(array("error", "Por favor, ingrese el nombre del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nomfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre del familiar que trabaja en la empresa")));
			} else if(empty($_POST["apellidopatfam"])){
				die(json_encode(array("error", "Por favor, ingrese el apellido paterno del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidopatfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno del familiar que trabaja en la empresa")));
			} else if(empty($_POST["apellidomatfam"])){
				die(json_encode(array("error", "Por favor, ingrese el apellido materno del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidomatfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno del familiar que trabaja en la empresa")));
			} else {
				$radio2 = $_POST["radio2"];
				$radio2 = mb_strtoupper($radio2, 'UTF-8');
				$radio2 = quitarAcentos($radio2);
				$nomfam = $_POST["nomfam"];
				$nomfam = mb_strtoupper($nomfam, 'UTF-8');
				$nomfam = quitarAcentos($nomfam);
				$apellidopatfam = $_POST["apellidopatfam"];
				$apellidopatfam = mb_strtoupper($apellidopatfam, 'UTF-8');
				$apellidopatfam = quitarAcentos($apellidopatfam);
				$apellidomatfam = $_POST["apellidomatfam"];
				$apellidomatfam = mb_strtoupper($apellidomatfam, 'UTF-8');
				$apellidomatfam = quitarAcentos($apellidomatfam);
			}
		} else {
			$radio2 = $_POST["radio2"];
			$radio2 = mb_strtoupper($radio2, 'UTF-8');
			$radio2 = quitarAcentos($radio2);
			$radio2 = null;
			$nomfam = null;
			$apellidopatfam = null;
			$apellidomatfam = null;
		}

/** 
	 +  =============================================== 		TERMINA LA VALIDACIÓN DE LOS DATOS ADICIONALES		=============================================== 
*/

			$expediente = new Expedientes($_SESSION['id'], null,null,null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $referencias, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaapat, $emergenciaamat, $emergenciarelacion, $emergenciatelefono, $emergencianom2, $emergenciaapat2, $emergenciaamat2, $emergenciarelacion2, $emergenciatelefono2, null, null, $tipo_sangre, $vacante, $radio2, $nomfam, $apellidopatfam, $apellidomatfam, $familiares);
			$expediente ->Insertar_expediente_datosA();
			die(json_encode(array("success", "Se han guardado exitosamente los datos adicionales")));

		}else{
			die(json_encode(array("error", "Faltan variables requeridas en la solicitud.")));
		}

	}else if($_POST["pestaña"] == "DatosB"){
		if(isset( $_POST["numeroreferenciasban"], $_POST["banco_personal"], $_POST["cuenta_personal"], $_POST["clabe_personal"], 
		$_POST["plastico_personal"])){

		/**
		 * !   ██████   █████  ████████  ██████  ███████ ██████  
		 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
		 * !   ██   ██ ███████    ██    ██    ██ ███████ ██████  
		 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
		 * !   ██████  ██   ██    ██     ██████  ███████ ██████                                                        
		*/

	/*
	+ ============================================= EMPIEZA LA VALIDACIÓN DE LOS DATOS BANCARIOS =============================================
	*/

	//REFERENCIAS BANCARIAS
	if(!(empty($_POST["numeroreferenciasban"]))){
		if(preg_match("/^\d$/", $_POST["numeroreferenciasban"])){
			$referenciasbancarias_decoded = json_decode($_POST["refbanc"], true);

			// Verifica que el número de referencias coincida con la cantidad real
			if (is_array($referenciasbancarias_decoded) && count($referenciasbancarias_decoded) == $_POST["numeroreferenciasban"]) {
				$referenciasban_contador = 1;
				foreach ($referenciasbancarias_decoded as &$referencia_bancaria) {
					if (empty($referencia_bancaria["nombre"]) || empty($referencia_bancaria["apellidopat"]) || empty($referencia_bancaria["apellidomat"]) || empty($referencia_bancaria["relacion"]) || empty($referencia_bancaria["rfc"]) || empty($referencia_bancaria["curp"]) || empty($referencia_bancaria["porcentaje"])) {
						die(json_encode(array("error", "Existen campos vacíos en las referencias bancarias, por favor, verifique la información")));
					}else{
						//Validaciones
						if (!preg_match("/^[\pL\s'-]+$/u", $referencia_bancaria["nombre"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidopat"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidomat"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $referencia_bancaria["rfc"])) {
							die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789 en el RFC de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $referencia_bancaria["curp"])) {
							die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR en el CURP de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[0-9]+$/", $referencia_bancaria["porcentaje"])) {
							die(json_encode(array("error", "El porcentaje de derecho de la referencia bancaria " . $referenciasban_contador . " debe ser númerico")));
						}
					}

					// Aplicamos mb_strtoupper a los valores de cadena
					//Le quitamos los acentos
					$referencia_bancaria["nombre"] = mb_strtoupper(quitarAcentos($referencia_bancaria["nombre"], 'UTF-8'));
					$referencia_bancaria["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidopat"], 'UTF-8'));
					$referencia_bancaria["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidomat"], 'UTF-8'));
					$referencia_bancaria["rfc"] = mb_strtoupper(quitarAcentos($referencia_bancaria["rfc"], 'UTF-8'));
					$referencia_bancaria["curp"] = mb_strtoupper(quitarAcentos($referencia_bancaria["curp"], 'UTF-8'));

					if($_POST["numeroreferenciasban"] == 1){
						$referencia_bancaria["porcentaje"] = 100;
					}else{
						$referencia_bancaria["porcentaje"] = 50;
					}

					$referenciasban_contador++;
				}
				// Asigna el valor de "refbanc" después de validar
				$refbanc = json_encode($referenciasbancarias_decoded); // Convierte el arreglo de vuelta a JSON
			} else {
				die(json_encode(array("error", "El número de referencias bancarias ingresado no coincide con el enviado, por favor, verifique la información")));
			}
		} else {
			die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
		}
	} else {
		$refbanc = null;
	}

if(Roles::FetchSessionRol($_SESSION['rol']) == "Tecnico"){
	//CUENTA BANCARIA PERSONAL
	if(empty($_POST["banco_personal"])){
		$banco_personal = null;
	}else{
		if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_personal"])){
			die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco de la cuenta personal")));
		}else{
			$banco_personal = $_POST["banco_personal"];
			$banco_personal = mb_strtoupper($banco_personal, 'UTF-8');
			$banco_personal = quitarAcentos($banco_personal);
		}
	}

	if(empty($_POST["cuenta_personal"])){
		$cuenta_personal = null;
	}else{
		if(!preg_match("/^\d{10}$/", $_POST["cuenta_personal"])){
			die(json_encode(array("error", "La cuenta bancaria personal debe contener exactamente 10 números")));
		}else{
			$cuenta_personal = $_POST["cuenta_personal"];
		}
	}

	if(empty($_POST["clabe_personal"])){
		$clabe_personal = null;
	}else{
		if(!preg_match("/^\d{18}$/", $_POST["clabe_personal"])){
			die(json_encode(array("error", "La clabe bancaria personal debe contener exactamente 18 números")));
		}else{
			$clabe_personal = $_POST["clabe_personal"];
		}
	}

	if(empty($_POST["plastico_personal"])){
		$plastico_personal = null;
	}else{
		if(!preg_match("/^\d{16}$/", $_POST["plastico_personal"])){
			die(json_encode(array("error", "El plástico de la cuenta bancaria personal debe contener exactamente 16 números")));
		}else{
			$plastico_personal = $_POST["plastico_personal"];
		}
	}
}else{
	$banco_personal = null;
	$cuenta_personal = null;
	$clabe_personal = null;
	$plastico_personal = null;
}


			$expediente = new Expedientes($_SESSION['id'], null, null, null,null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $refbanc, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal,null,null,null,null);
			$expediente ->Insertar_expediente_datosB();
			die(json_encode(array("success", "Se han guardado los datos bancarios del expediente")));
}else{
	die(json_encode(array("error", "Faltan variables solicitadas en el expediente")));

}
/*
============================================= TERMINA LA VALIDACIÓN DE LOS DATOS BANCARIOS =============================================
*/

	/**
	 * !   ██████   ██████   ██████ ██    ██ ███    ███ ███████ ███    ██ ████████  █████   ██████ ██  ██████  ███    ██ 
	 * !   ██   ██ ██    ██ ██      ██    ██ ████  ████ ██      ████   ██    ██    ██   ██ ██      ██ ██    ██ ████   ██ 
	 * !   ██   ██ ██    ██ ██      ██    ██ ██ ████ ██ █████   ██ ██  ██    ██    ███████ ██      ██ ██    ██ ██ ██  ██ 
	 * !   ██   ██ ██    ██ ██      ██    ██ ██  ██  ██ ██      ██  ██ ██    ██    ██   ██ ██      ██ ██    ██ ██  ██ ██ 
	 * !   ██████   ██████   ██████  ██████  ██      ██ ███████ ██   ████    ██    ██   ██  ██████ ██  ██████  ██   ████                                                                                                                   
	*/

}
}else if(isset($_POST["app"]) && $_POST["app"] == "expediente_modo_edicion_papeleria"){

	/*
	+	===============================================   EMPIEZA LA VALIDACIÓN DE LA PAPELERÍA RECIBIDA        ===============================================
		*/

        //DOCUMENTOS
        $checktipospapeleria = $object->_db->prepare("SELECT id, nombre FROM tipo_papeleria"); // Añadir "id" a la consulta
		$checktipospapeleria->execute();
		$fetchtipopapeleria = $checktipospapeleria->fetchAll(PDO::FETCH_ASSOC);

		$arraypapeleria = [];

		foreach ($fetchtipopapeleria as $tipo) {
			$inputName = 'papeleria' . $tipo["id"]; // Usar el ID como clave en lugar de la secuencia

			if (isset($_FILES[$inputName]['name'])) {
				$allowed = array('jpeg', 'png', 'jpg', 'pdf');
				$filename = $_FILES[$inputName]['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if (!in_array($ext, $allowed)) {
					die(json_encode(array("error", "Solo se permite jpg, jpeg, pngs y pdfs en " . $tipo["nombre"])));
				} elseif ($_FILES[$inputName]['size'] > 10485760) {
					die(json_encode(array("error", "El archivo debe pesar ser menos de 10 MB en " . $tipo["nombre"])));
				} else {
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					$mimetype = finfo_file($finfo, $_FILES[$inputName]["tmp_name"]);
					finfo_close($finfo);

					if ($mimetype != "image/jpeg" && $mimetype != "image/png" && $mimetype != "application/pdf") {
						die(json_encode(array("error", "Por favor, asegúrese de que la imagen sea originalmente un archivo png, jpg, jpeg y pdf en " . $tipo["nombre"])));
					}

					$arraypapeleria[$tipo["id"]] = $_FILES[$inputName]; // Usar el ID como clave
				}
			} else {
				$arraypapeleria[$tipo["id"]] = null; // Usar el ID como clave
			}
		}

        /** 
		===============================================				TERMINA LA VALIDACIÓN DE LA PAPELERÍA RECIBIDA   		===============================================
		*/

		$expediente = new Expedientes($_SESSION['id'], null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $arraypapeleria);
		$logged_user = $_SESSION['nombre']. ' ' .$_SESSION['apellidopat']. ' ' .$_SESSION['apellidomat'];
		//Una vez que se hayan almacenado las variables, llama al metodo para editar el expediente
		$delete_array = $_POST["delete_switch_array_json"];
		$delete_array = json_decode($delete_array, true);
		$expediente ->Insertar_expedientetoken_Docs($logged_user, $delete_array);
		die(json_encode(array("success", "Se ha guardado la papelería ingresada")));

}else if(isset($_POST["app"]) && $_POST["app"] == "expediente_modo_edicion_final"){
	function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}

	function quitarAcentos($texto) {
		$texto = str_replace(
			['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'],
			['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'],
			$texto
		);
		return $texto;
	}
	
	/**
	 * !   ██████   █████  ████████  ██████  ███████  ██████  
	 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██       
	 * !   ██   ██ ███████    ██    ██    ██ ███████ ██   ███ 
	 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██    ██ 
	 * !   ██████  ██   ██    ██     ██████  ███████  ██████                                                        
	*/

	if($_POST["pestaña"] == "DatosG"){
		if(isset( $_POST["estudios"], $_POST["posee_correo"],$_POST["correo_adicional"], $_POST["calle"], $_POST["ninterior"], $_POST["nexterior"], 
		$_POST["colonia"], $_POST["estado"],$_POST["estadotext"], $_POST["municipio"], $_POST["municipiotext"], $_POST["codigo"], $_POST["teldom"], $_POST["posee_telmov"], 
		$_POST["telmov"], $_POST["radio"], $_POST["ecivil"], $_POST["posee_retencion"], $_POST["monto_mensual"], $_POST["fechanac"], $_POST["fechacon"], 
		$_POST["fechaalta"], $_POST["curp"], $_POST["nss"], $_POST["rfc"], $_POST["identificacion"], $_POST["numeroidentificacion"])){

/* 
	 +  =============================================== 		EMPIEZA LA VALIDACIÓN DE LOS DATOS GENERALES		=============================================== 
*/			
			

		//NIVEL DE ESTUDIOS
		$nivelestudios_array = array("PRIMARIA", "SECUNDARIA", "BACHILLERATO", "CARRERA TECNICA", "LICENCIATURA", "ESPECIALIDAD", "MAESTRIA", "DOCTORADO");
		//Verifica si el valor seleccionado coincide con los valores que hay en el arreglo
		if (in_array($_POST["estudios"], $nivelestudios_array)) {
			$estudios = $_POST["estudios"];
		}else if(empty($_POST["estudios"])){
			$estudios = null;
		}else{
			die(json_encode(array("error", "El valor escogido en el dropdown de nivel de estudios está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		//CORREO ELECTRÓNICO
		if($_POST["posee_correo"] == "si"){
			//Checa si el correo está vacío
			if(empty($_POST["correo_adicional"])){
				die(json_encode(array("error", "Por favor, ingrese un correo adicional")));
			}else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo_adicional"])){
				die(json_encode(array("error", "Asegúrese que el texto ingresado en correo adicional este en formato de email")));
			}else{
				$posee_correo= $_POST["posee_correo"];
				//Conviertelo en mayúsculas
				$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
				//Quitale los acentos
				$posee_correo = quitarAcentos($posee_correo);
				//Los servidores de correo y los sistemas de correo electrónico generalmente son sensibles a los acentos en los caracteres. Esto significa que "mi.correo@gmail.com" y "mí.correo@gmail.com" se considerarían direcciones de correo electrónico distintas, lo mismo que las mayúsculas lo cual significa que aquí la regla de los acentos y mayúsculas no aplican en los correos
				$correo_adicional = $_POST["correo_adicional"];
			}
		}else{
			$posee_correo = $_POST["posee_correo"];
			$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
			$posee_correo = quitarAcentos($posee_correo);
			$correo_adicional = null;
		}

		//CALLE
		if(empty($_POST["calle"])){
			$calle = null;
		}else{
			//Verifica si el campo de la calle está bien escrito, no acepta $%&"#@
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["calle"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios en la calle")));
			}else{
				$calle = $_POST["calle"];  
				$calle = mb_strtoupper($calle, 'UTF-8');
				$calle = quitarAcentos($calle);
			}
		}

		// NÚMERO INTERIOR
		// Checa si está vacío
		if(empty($_POST["ninterior"])){
			$ninterior = null; // Si no se proporciona el número interior, lo establecemos como nulo.
		}else{
			$ninterior = $_POST["ninterior"]; // Asignamos el número interior si pasa la validación.
		}

		// NÚMERO EXTERIOR
		//Checa si está vacío
		if(empty($_POST["nexterior"])){
			$nexterior = null; // Si no se proporciona el número exterior, lo establecemos como nulo.
		}else{
			$nexterior = $_POST["nexterior"]; // Asignamos el número exterior si pasa la validación.
		}

		// COLONIA
		if(empty($_POST["colonia"])){
			$colonia = null; 
		}else{
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["colonia"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos, puntos, guiones intermedios y espacios en la colonia")));
			}else{
				$colonia = $_POST["colonia"]; 
				$colonia = mb_strtoupper($colonia, 'UTF-8');
				$colonia = quitarAcentos($colonia);
			}
		}

		// ESTADO
		if(empty($_POST["estado"])){
			$estado = null;
		}else{
			$retrieve_estados = $object->_db->prepare("SELECT id, nombre FROM estados"); // Preparar y ejecutar una consulta para recuperar la lista de estados
			$retrieve_estados->execute();

			$fetch_retrieve_estados = $retrieve_estados->fetchAll(PDO::FETCH_KEY_PAIR); // Obtener los resultados de la consulta como un arreglo asociativo con ID como clave y Nombre como valor

			if (array_key_exists($_POST["estado"], $fetch_retrieve_estados)) { // El estado seleccionado coincide con uno de los estados en el dropdown
				$array_key_state_value = $fetch_retrieve_estados[$_POST["estado"]];

				// Verificar si el texto ingresado (si existe) coincide con el valor del estado
				if (isset($_POST["estadotext"]) && $_POST['estadotext'] == $array_key_state_value) {
					$estado = $_POST["estado"];
				} else {
					die(json_encode(array("error", "Por favor, asegúrese de que el estado escogido se encuentre en el dropdown")));
				}
			} else {
				die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los estados registrados")));
			}
		}

		// MUNICIPIO
		if (empty($_POST["municipio"])) {
			$municipio = null;
		} else if (empty($_POST["estado"]) && !(empty($_POST["municipio"]))) {
			die(json_encode(array("error", "Por favor, seleccione un estado y luego un municipio")));
		} else {
			$retrieve_estados_municipio = $object->_db->prepare("SELECT id, nombre from municipios where estado=:estado");
			$retrieve_estados_municipio->execute(array(':estado' => $_POST["estado"]));

			$count_retrieve_estados_municipio = $retrieve_estados_municipio->rowCount();

			if ($count_retrieve_estados_municipio > 0) {
				$fetch_retrieve_estados_municipio = $retrieve_estados_municipio->fetchAll(PDO::FETCH_KEY_PAIR);

				if (array_key_exists($_POST["municipio"], $fetch_retrieve_estados_municipio)) {
					$array_key_municipio_value = $fetch_retrieve_estados_municipio[$_POST["municipio"]];

					if (isset($_POST["municipiotext"]) && $_POST['municipiotext'] == $array_key_municipio_value) {
						$municipio = $_POST["municipio"];
					} else {
						die(json_encode(array("error", "Por favor, asegúrese de que el municipio escogido se encuentre en el dropdown")));
					}
				} else {
					die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los municipios registrados")));
				}
			} else {
				die(json_encode(array("error", "El estado elegido no tiene ningún municipio; el dropdown de municipios debe estar vacío")));
			}
		}

		// CÓDIGO POSTAL
		if(empty($_POST["codigo"])){
			$codigo = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["codigo"])){
				die(json_encode(array("error", "Solo se permiten números en el código postal")));
			}else{
				$codigo = $_POST["codigo"];
			}
		}

		// TELÉFONO DE DOMICILIO
		if(empty($_POST["teldom"])){
			$teldom = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["teldom"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de domicilio")));
			}else if(strlen($_POST["teldom"]) != 10){
				die(json_encode(array("error", "El teléfono de domicilio debe tener exactamente 10 caracteres")));
			}else{
				$teldom = $_POST["teldom"];
			}
		}

		// POSEE TELÉFONO MÓVIL PROPIO
		if($_POST["posee_telmov"] == "si"){
			if(empty($_POST["telmov"])){
				die(json_encode(array("error", "Por favor, ingrese un teléfono móvil")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["telmov"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de móvil")));
			}else if(strlen($_POST["telmov"]) != 10){
				die(json_encode(array("error", "El teléfono móvil debe tener exactamente 10 caracteres")));
			}else{
				$posee_telmov = $_POST["posee_telmov"];
				$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
				$posee_telmov = quitarAcentos($posee_telmov);
				$telmov = $_POST["telmov"];
			}
		}else{
			// Si no se selecciona "Sí" para poseer teléfono móvil, establecer los valores correspondientes
			$posee_telmov = $_POST["posee_telmov"];
			$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
			$posee_telmov = quitarAcentos($posee_telmov);
			$telmov = null;
		}


		//CASA PROPIA
		if(empty($_POST["radio"])){
			die(json_encode(array("error", "Por favor, ingrese el radiobutton de casa propia no puede ir vacío")));
		}else{
			$casa_propia = $_POST["radio"];
			$casa_propia = mb_strtoupper($casa_propia, 'UTF-8');
			$casa_propia = quitarAcentos($casa_propia);
		}

		// ESTADO CIVIL
		$estadocivil_array = array("SOLTERO", "CASADO", "DIVORCIADO", "UNIÓN LIBRE");

		if (in_array($_POST["ecivil"], $estadocivil_array)) {
			$ecivil = $_POST["ecivil"];
		} else if (empty($_POST["ecivil"])) {
			$ecivil = null;
		} else {
			// Si "ecivil" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de estado civil está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// POSEE RETENCIÓN
		if ($_POST["posee_retencion"] == "si") {
			if (empty($_POST["monto_mensual"])) {
				die(json_encode(array("error", "Por favor, ingrese el monto mensual")));
			} else if (!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["monto_mensual"])) {
				die(json_encode(array("error", "Solo se permiten números y decimales en el monto mensual")));
			} else {
				$posee_retencion = $_POST["posee_retencion"];
				$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
				$posee_retencion = quitarAcentos($posee_retencion);
				$monto_mensual = $_POST["monto_mensual"];
			}
		} else {
			$posee_retencion = $_POST["posee_retencion"];
			$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
			$posee_retencion = quitarAcentos($posee_retencion);
			$monto_mensual = null;
		}

		// FECHA DE NACIMIENTO
		if (empty($_POST["fechanac"])) {
			$fechanac = null;
		} else {
			$_POST["fechanac"] = str_replace('/', '-', $_POST["fechanac"]); // Reemplaza las barras oblicuas por guiones
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechanac"])) { // Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de nacimiento")));
			} else {
				$check_fechanac = validateDate($_POST["fechanac"], 'Y-m-d');
		
				// Verifica si la fecha de nacimiento es inválida
				if (!$check_fechanac) {
					die(json_encode(array("error", "La fecha de nacimiento no es válida")));
				}
		
				// Calcula la edad a partir de la fecha de nacimiento
				$fecha_nacimiento = new DateTime($_POST["fechanac"]);
				$fecha_hoy = new DateTime();
				$edad = $fecha_nacimiento->diff($fecha_hoy)->y;
		
				// Verifica si el solicitante es menor de 18 años
				if ($edad < 18) {
					die(json_encode(array("error", "Debes ser mayor de 18 años para aplicar")));
				}
		
				$fechanac = $_POST["fechanac"];
			}
		}

		// FECHA DE INICIO DE CONTRATO
		if (empty($_POST["fechacon"])) {
			$fechacon = null;
		} else {
			$_POST["fechacon"] = str_replace('/', '-', $_POST["fechacon"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechacon"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de contrato")));
			} else {
				$check_fechacon = validateDate($_POST["fechacon"], 'Y-m-d');
		
				if (!$check_fechacon) {
					die(json_encode(array("error", "La fecha de inicio de contrato es inválida")));
				}
		
				$fechacon = $_POST["fechacon"];
			}
		}

		// FECHA DE ALTA
		if (empty($_POST["fechaalta"])) {
			$fechaalta = null;
		} else {
			$_POST["fechaalta"] = str_replace('/', '-', $_POST["fechaalta"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechaalta"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de alta")));
			} else {
				$check_fechaalta = validateDate($_POST["fechaalta"], 'Y-m-d');
		
				if (!$check_fechaalta) {
					die(json_encode(array("error", "La fecha de alta es inválida")));
				}
		
				$fechaalta = $_POST["fechaalta"];
			}
		}	

		//CURP
		if(empty($_POST["curp"])){
			$curp = null;
		}else{
			if(!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $_POST["curp"])){
				die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR")));
			}else{
				$curp= $_POST["curp"];
				$curp = mb_strtoupper($curp, 'UTF-8');
				$curp = quitarAcentos($curp);
			}
		}

		//NÚMERO DE SEGURO SOCIAL
		if(empty($_POST["nss"])){
			$nss = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["nss"])){
				die(json_encode(array("error", "Solo se permiten números en el número de seguro social")));
			}else{
				$nss = $_POST["nss"];
			}
		}

		//RFC
		if(empty($_POST["rfc"])){
			$rfc = null;
		}else{
			if(!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $_POST["rfc"])){
				die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789")));
			}else{
				$rfc = $_POST["rfc"];
				$rfc = mb_strtoupper($rfc, 'UTF-8');
				$rfc = quitarAcentos($rfc);
			}
		}

		//TIPO DE IDENTIFICACIÓN
		$identificacion_array = array("INE", "PASAPORTE", "CEDULA");
		if(in_array($_POST["identificacion"], $identificacion_array)) {
			$identificacion = $_POST["identificacion"];
		}else if(empty($_POST["identificacion"])){
			$identificacion = null;
		}else{
			die(json_encode(array("error", "El valor escogido en el dropdown de tipo de identificación está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		//NÚMERO DE IDENTIFICACIÓN
		if(empty($_POST["numeroidentificacion"])){
			$numeroidentificacion = null;
		}else{
			if($_POST["identificacion"] == "INE"){
				if (!preg_match('/^[A-Za-z0-9]{13}$/', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "El INE solo puede contener 13 caracteres y debe ser alfanúmerico")));
				}
			}else if($_POST["identificacion"] == "PASAPORTE"){
				if (!preg_match('/^[A-Z]{3}\d{6}$/i', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "El PASAPORTE solo puede contener 9 caracteres, debe ser alfanúmerico y debe comenzar con 3 letras y seguido de 6 números")));
				}
			}else if($_POST["identificacion"] == "CEDULA"){
				if (!preg_match('/^\d{7,10}$/', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "La CEDULA solo puede contener entre 7 y 10 dígitos y debe ser númerico")));
				}
			}
			$numeroidentificacion = $_POST["numeroidentificacion"];
			$numeroidentificacion = mb_strtoupper($numeroidentificacion, 'UTF-8');
			$numeroidentificacion = quitarAcentos($numeroidentificacion);
		}

/** 
	 +  =============================================== 		TERMINA LA VALIDACIÓN DE LOS DATOS GENERALES		=============================================== 
*/

			//Envia los datos 
			$expediente = new Expedientes($_SESSION['id'], null, null,null,null, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, null, null, null, null, null, null, null, null, null, null, null, null, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, null, null, null, $curp, $nss, $rfc, $identificacion, $numeroidentificacion);
			$expediente ->Insertar_expedientetoken_datosG();

			die(json_encode(array("success", "Se han guardado exitosamente los datos generales")));
		}else{
			die(json_encode(array("error", "Faltan datos requeridos en la solicitud.")));
		}

	/**
	 * !   ██████   █████  ████████  ██████  ███████  █████  
	 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
	 * !   ██   ██ ███████    ██    ██    ██ ███████ ███████ 
	 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
	 * !   ██████  ██   ██    ██     ██████  ███████ ██   ██                                                       
	*/

	}else if($_POST["pestaña"] == "DatosA"){
		if(isset($_POST["numeroreferenciaslab"], $_POST["fechauniforme"], $_POST["cantidadpolo"], $_POST["tallapolo"], 
		$_POST["emergencianom"], $_POST["emergenciaapat"], $_POST["emergenciaamat"], $_POST["emergenciarelacion"], $_POST["emergenciatelefono"], $_POST["emergencianom2"], 
		$_POST["emergenciaapat2"], $_POST["emergenciaamat2"], $_POST["emergenciarelacion2"], $_POST["emergenciatelefono2"], 
		$_POST["tipo_sangre"], $_POST["vacante"], $_POST["radio2"], $_POST["nomfam"], $_POST["apellidopatfam"], $_POST["apellidomatfam"])){
			
/** 
	 +  =============================================== 		INICIA LA VALIDACIÓN DE LOS DATOS ADICIONALES		=============================================== 
*/
			
		// REFERENCIAS LABORALES
		if (!empty($_POST["numeroreferenciaslab"])) {
			if (preg_match("/^\d$/", $_POST["numeroreferenciaslab"])) {
				$referencias_decoded = json_decode($_POST["referencias"], true);
		
				// Verifica que el número de referencias coincida con la cantidad real
				if (is_array($referencias_decoded) && count($referencias_decoded) == $_POST["numeroreferenciaslab"]) {
					$referencias_contador = 1;
					foreach ($referencias_decoded as &$referencia_laboral) {
						if (empty($referencia_laboral["nombre"]) || empty($referencia_laboral["apellidopat"]) || empty($referencia_laboral["apellidomat"]) || empty($referencia_laboral["relacion"]) || empty($referencia_laboral["telefono"])) {
							die(json_encode(array("error", "Existen campos vacíos en las referencias laborales, por favor, verifique la información")));
						} else {
							//validaciones
							if (!preg_match("/^[\pL\s'-]+$/u", $referencia_laboral["nombre"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidopat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidomat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^\d{10}$/", $referencia_laboral["telefono"])) {
								die(json_encode(array("error", "El teléfono de la referencia laboral " . $referencias_contador . " debe tener exactamente 10 dígitos")));
							}
						}
						$referencia_laboral["nombre"] = mb_strtoupper(quitarAcentos($referencia_laboral["nombre"], 'UTF-8'));
						$referencia_laboral["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidopat"], 'UTF-8'));
						$referencia_laboral["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidomat"], 'UTF-8'));

						$referencias_contador++;
					}
					$referencias = json_encode($referencias_decoded); // Convierte el arreglo de vuelta a JSON
				} else {
					die(json_encode(array("error", "El número de referencias laborales ingresado no coincide con el enviado, por favor, verifique la información")));
				}
			} else {
				die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
			}
		} else {
			$referencias = null;
		}

		// FECHA DE ENTREGA DE UNIFORME
		if (empty($_POST["fechauniforme"])) {
			$fechauniforme = null;
		} else {
			$_POST["fechauniforme"] = str_replace('/', '-', $_POST["fechauniforme"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechauniforme"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de uniforme")));
			} else {
				$check_fechauniforme = validateDate($_POST["fechauniforme"], 'Y-m-d');
		
				if (!$check_fechauniforme) {
					die(json_encode(array("error", "La fecha de uniforme es inválida")));
				}
		
				$fechauniforme = $_POST["fechauniforme"];
			}
		}

		//CANTIDAD POLO
		if(empty($_POST["cantidadpolo"])){
			$cantidadpolo = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["cantidadpolo"])){
				die(json_encode(array("error", "Solo se permiten números en el campo de cantidad polo")));
			}else{
				$cantidadpolo = $_POST["cantidadpolo"];
			}
		}

		// TALLA CAMISA
		$tallacamisa_array = array("XS", "S", "M", "L", "XL", "XXL", "XXXL");

		if (in_array($_POST["tallapolo"], $tallacamisa_array)) {
			$tallapolo = $_POST["tallapolo"];
		} else if (empty($_POST["tallapolo"])) {
			$tallapolo = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de talla camisa está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		// CONTACTOS DE EMERGENCIA
		if(empty($_POST["emergencianom"])){
			$emergencianom = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del primer contacto")));
			}else{
				$emergencianom = $_POST["emergencianom"];
				$emergencianom = mb_strtoupper($emergencianom, 'UTF-8');
				$emergencianom = quitarAcentos($emergencianom);
			}
		}

		//Apellido paterno del primer contacto de emergencia
		if(empty($_POST["emergenciaapat"])){
			$emergenciaapat = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del primer contacto")));
			}else{
				$emergenciaapat = $_POST["emergenciaapat"];
				$emergenciaapat = mb_strtoupper($emergenciaapat, 'UTF-8');
				$emergenciaapat = quitarAcentos($emergenciaapat);
			}
		}

		//Apellido materno del primer contacto de emergencia
		if(empty($_POST["emergenciaamat"])){
			$emergenciaamat = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el primer contacto")));
			}else{
				$emergenciaamat = $_POST["emergenciaamat"];
				$emergenciaamat = mb_strtoupper($emergenciaamat, 'UTF-8');
				$emergenciaamat = quitarAcentos($emergenciaamat);
			}
		}

		// Relación
		$emergencia_relacion_array = array("PADRE", "MADRE", "HERMANO", "HERMANA", "CONYUGE", "PAREJA", "AMIGO", "AMIGA", "VECINO", "COMPAÑERO_DE_TRABAJO", "COMPAÑERA_DE_TRABAJO", "OTRO");

		if (in_array($_POST["emergenciarelacion"], $emergencia_relacion_array)) {
			$emergenciarelacion = $_POST["emergenciarelacion"];
		} else if (empty($_POST["emergenciarelacion"])) {
			$emergenciarelacion = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de relacion de el primer contacto está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// Teléfono
		if(empty($_POST["emergenciatelefono"])){
			$emergenciatelefono = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del primer contacto")));
			}else if(strlen($_POST["emergenciatelefono"]) != 10){
				die(json_encode(array("error", "El teléfono de emergencia del primer contacto debe tener exactamente 10 caracteres")));
			}else{
				$emergenciatelefono = $_POST["emergenciatelefono"];
			}
		}

		//Nombre del segundo contacto de emergencia
		if(empty($_POST["emergencianom2"])){
			$emergencianom2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del segundo contacto")));
			}else{
				$emergencianom2 = $_POST["emergencianom2"];
				$emergencianom2 = mb_strtoupper($emergencianom2, 'UTF-8');
				$emergencianom2 = quitarAcentos($emergencianom2);
			}
		}

		//Apellido paterno del segundo contacto de emergencia
		if(empty($_POST["emergenciaapat2"])){
			$emergenciaapat2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del segundo contacto")));
			}else{
				$emergenciaapat2 = $_POST["emergenciaapat2"];
				$emergenciaapat2 = mb_strtoupper($emergenciaapat2, 'UTF-8');
				$emergenciaapat2 = quitarAcentos($emergenciaapat2);
			}
		}

		//Apellido materno del segundo contacto de emergencia
		if(empty($_POST["emergenciaamat2"])){
			$emergenciaamat2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el segundo contacto")));
			}else{
				$emergenciaamat2 = $_POST["emergenciaamat2"];
				$emergenciaamat2 = mb_strtoupper($emergenciaamat2, 'UTF-8');
				$emergenciaamat2 = quitarAcentos($emergenciaamat2);
			}
		}

		// Relación
		if (empty($_POST["emergenciarelacion"])) {
			$emergenciarelacion = null;
		} else {
			$emergenciarelacion = $_POST["emergenciarelacion"];
		}

		// Teléfono
		if(empty($_POST["emergenciatelefono2"])){
			$emergenciatelefono2 = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono2"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del segundo contacto")));
			}else if(strlen($_POST["emergenciatelefono2"]) != 10){
				die(json_encode(array("error", "El teléfono de emergencia del segundo contacto debe tener exactamente 10 caracteres")));
			}else{
				$emergenciatelefono2 = $_POST["emergenciatelefono2"];
			}
		}

		// TIPO DE SANGRE
		$tiposangre_array = array("A_POSITIVO", "A_NEGATIVO", "B_POSITIVO", "B_NEGATIVO", "AB_POSITIVO", "AB_NEGATIVO", "O_POSITIVO", "O_NEGATIVO");

		if (in_array($_POST["tipo_sangre"], $tiposangre_array)) {
			$tipo_sangre = $_POST["tipo_sangre"];
		} else if (empty($_POST["tipo_sangre"])) {
			$tipo_sangre = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de tipo de sangre está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// ¿CÓMO SE ENTERO DE LA VACANTE
		$vacante_array = array("PLATAFORMA LABORAL", "RECOMENDACION", "REDES SOCIALES", "AVISOS DE OCASION");

		if (in_array($_POST["vacante"], $vacante_array)) {
			$vacante = $_POST["vacante"];
		} else if (empty($_POST["vacante"])) {
			$vacante = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de ¿cómo se entero de la vacante?, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		//¿TIENE FAMILIARES EN LA EMPRESA
		if($_POST["radio2"] == "si"){
			if(empty($_POST["nomfam"])){
				die(json_encode(array("error", "Por favor, ingrese el nombre del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nomfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre del familiar que trabaja en la empresa")));
			} else if(empty($_POST["apellidopatfam"])){
				die(json_encode(array("error", "Por favor, ingrese el apellido paterno del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidopatfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno del familiar que trabaja en la empresa")));
			} else if(empty($_POST["apellidomatfam"])){
				die(json_encode(array("error", "Por favor, ingrese el apellido materno del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidomatfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno del familiar que trabaja en la empresa")));
			} else {
				$radio2 = $_POST["radio2"];
				$radio2 = mb_strtoupper($radio2, 'UTF-8');
				$radio2 = quitarAcentos($radio2);
				$nomfam = $_POST["nomfam"];
				$nomfam = mb_strtoupper($nomfam, 'UTF-8');
				$nomfam = quitarAcentos($nomfam);
				$apellidopatfam = $_POST["apellidopatfam"];
				$apellidopatfam = mb_strtoupper($apellidopatfam, 'UTF-8');
				$apellidopatfam = quitarAcentos($apellidopatfam);
				$apellidomatfam = $_POST["apellidomatfam"];
				$apellidomatfam = mb_strtoupper($apellidomatfam, 'UTF-8');
				$apellidomatfam = quitarAcentos($apellidomatfam);
			}
		} else {
			$radio2 = $_POST["radio2"];
			$radio2 = mb_strtoupper($radio2, 'UTF-8');
			$radio2 = quitarAcentos($radio2);
			$nomfam = null;
			$apellidopatfam = null;
			$apellidomatfam = null;
		}

/** 
	 +  =============================================== 		TERMINA LA VALIDACIÓN DE LOS DATOS ADICIONALES		=============================================== 
*/

			$expediente = new Expedientes($_SESSION['id'], null,null,null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $referencias, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaapat, $emergenciaamat, $emergenciarelacion, $emergenciatelefono, $emergencianom2, $emergenciaapat2, $emergenciaamat2, $emergenciarelacion2, $emergenciatelefono2, null, null, $tipo_sangre, $vacante, $radio2, $nomfam, $apellidopatfam, $apellidomatfam);
			$expediente ->Crear_expediente_datosA();
			die(json_encode(array("success", "Se han guardado exitosamente los datos adicionales")));

		}else{
			die(json_encode(array("error", "Faltan variables requeridas en la solicitud.")));
		}

	
	}else if($_POST["pestaña"] == "DatosB"){
		if(isset( $_POST["numeroreferenciasban"], $_POST["banco_personal"], $_POST["cuenta_personal"], $_POST["clabe_personal"], 
		$_POST["plastico_personal"])){

		/**
		 * !   ██████   █████  ████████  ██████  ███████ ██████  
		 * !   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
		 * !   ██   ██ ███████    ██    ██    ██ ███████ ██████  
		 * !   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
		 * !   ██████  ██   ██    ██     ██████  ███████ ██████                                                        
		*/

	/*
	+ ============================================= EMPIEZA LA VALIDACIÓN DE LOS DATOS BANCARIOS =============================================
	*/

	//REFERENCIAS BANCARIAS
	if(!(empty($_POST["numeroreferenciasban"]))){
		if(preg_match("/^\d$/", $_POST["numeroreferenciasban"])){
			$referenciasbancarias_decoded = json_decode($_POST["refbanc"], true);

			// Verifica que el número de referencias coincida con la cantidad real
			if (is_array($referenciasbancarias_decoded) && count($referenciasbancarias_decoded) == $_POST["numeroreferenciasban"]) {
				$referenciasban_contador = 1;
				foreach ($referenciasbancarias_decoded as &$referencia_bancaria) {
					if (empty($referencia_bancaria["nombre"]) || empty($referencia_bancaria["apellidopat"]) || empty($referencia_bancaria["apellidomat"]) || empty($referencia_bancaria["relacion"]) || empty($referencia_bancaria["rfc"]) || empty($referencia_bancaria["curp"]) || empty($referencia_bancaria["porcentaje"])) {
						die(json_encode(array("error", "Existen campos vacíos en las referencias bancarias, por favor, verifique la información")));
					}else{
						//Validaciones
						if (!preg_match("/^[\pL\s'-]+$/u", $referencia_bancaria["nombre"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidopat"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidomat"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $referencia_bancaria["rfc"])) {
							die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789 en el RFC de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $referencia_bancaria["curp"])) {
							die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR en el CURP de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[0-9]+$/", $referencia_bancaria["porcentaje"])) {
							die(json_encode(array("error", "El porcentaje de derecho de la referencia bancaria " . $referenciasban_contador . " debe ser númerico")));
						}
					}

					// Aplicamos mb_strtoupper a los valores de cadena
					//Le quitamos los acentos
					$referencia_bancaria["nombre"] = mb_strtoupper(quitarAcentos($referencia_bancaria["nombre"], 'UTF-8'));
					$referencia_bancaria["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidopat"], 'UTF-8'));
					$referencia_bancaria["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidomat"], 'UTF-8'));
					$referencia_bancaria["rfc"] = mb_strtoupper(quitarAcentos($referencia_bancaria["rfc"], 'UTF-8'));
					$referencia_bancaria["curp"] = mb_strtoupper(quitarAcentos($referencia_bancaria["curp"], 'UTF-8'));

					if($_POST["numeroreferenciasban"] == 1){
						$referencia_bancaria["porcentaje"] = 100;
					}else{
						$referencia_bancaria["porcentaje"] = 50;
					}

					$referenciasban_contador++;
				}
				// Asigna el valor de "refbanc" después de validar
				$refbanc = json_encode($referenciasbancarias_decoded); // Convierte el arreglo de vuelta a JSON
			} else {
				die(json_encode(array("error", "El número de referencias bancarias ingresado no coincide con el enviado, por favor, verifique la información")));
			}
		} else {
			die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
		}
	} else {
		$refbanc = null;
	}

if(Roles::FetchSessionRol($_SESSION['rol']) == "Tecnico"){
	//CUENTA BANCARIA PERSONAL
	if(empty($_POST["banco_personal"])){
		$banco_personal = null;
	}else{
		if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_personal"])){
			die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco de la cuenta personal")));
		}else{
			$banco_personal = $_POST["banco_personal"];
			$banco_personal = mb_strtoupper($banco_personal, 'UTF-8');
			$banco_personal = quitarAcentos($banco_personal);
		}
	}

	if(empty($_POST["cuenta_personal"])){
		$cuenta_personal = null;
	}else{
		if(!preg_match("/^\d{10}$/", $_POST["cuenta_personal"])){
			die(json_encode(array("error", "La cuenta bancaria personal debe contener exactamente 10 números")));
		}else{
			$cuenta_personal = $_POST["cuenta_personal"];
		}
	}

	if(empty($_POST["clabe_personal"])){
		$clabe_personal = null;
	}else{
		if(!preg_match("/^\d{18}$/", $_POST["clabe_personal"])){
			die(json_encode(array("error", "La clabe bancaria personal debe contener exactamente 18 números")));
		}else{
			$clabe_personal = $_POST["clabe_personal"];
		}
	}

	if(empty($_POST["plastico_personal"])){
		$plastico_personal = null;
	}else{
		if(!preg_match("/^\d{16}$/", $_POST["plastico_personal"])){
			die(json_encode(array("error", "El plástico de la cuenta bancaria personal debe contener exactamente 16 números")));
		}else{
			$plastico_personal = $_POST["plastico_personal"];
		}
	}
}else{
	$banco_personal = null;
	$cuenta_personal = null;
	$clabe_personal = null;
	$plastico_personal = null;
}


			$expediente = new Expedientes($_SESSION['id'], null, null, null,null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $refbanc, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal,null,null,null,null);
			$expediente ->Insertar_expediente_datosB();
			die(json_encode(array("success", "Se han guardado los datos bancarios del expediente")));
}else{
	die(json_encode(array("error", "Faltan variables solicitadas en el expediente")));

}
/*
============================================= TERMINA LA VALIDACIÓN DE LOS DATOS BANCARIOS =============================================
*/

	/**
	 * !   ██████   ██████   ██████ ██    ██ ███    ███ ███████ ███    ██ ████████  █████   ██████ ██  ██████  ███    ██ 
	 * !   ██   ██ ██    ██ ██      ██    ██ ████  ████ ██      ████   ██    ██    ██   ██ ██      ██ ██    ██ ████   ██ 
	 * !   ██   ██ ██    ██ ██      ██    ██ ██ ████ ██ █████   ██ ██  ██    ██    ███████ ██      ██ ██    ██ ██ ██  ██ 
	 * !   ██   ██ ██    ██ ██      ██    ██ ██  ██  ██ ██      ██  ██ ██    ██    ██   ██ ██      ██ ██    ██ ██  ██ ██ 
	 * !   ██████   ██████   ██████  ██████  ██      ██ ███████ ██   ████    ██    ██   ██  ██████ ██  ██████  ██   ████                                                                                                                   
	*/

	}else if($_POST["pestaña"] == "documentos"){

	if (isset($_POST["estudios"], $_POST["posee_correo"], $_POST["correo_adicional"], $_POST["calle"], $_POST["ninterior"],
	$_POST["nexterior"], $_POST["colonia"], $_POST["estado"], $_POST["estadotext"], $_POST["municipio"], $_POST["municipiotext"], 
	$_POST["codigo"], $_POST["teldom"], $_POST["posee_telmov"], $_POST["telmov"], $_POST["radio"], $_POST["ecivil"], $_POST["posee_retencion"], 
	$_POST["monto_mensual"], $_POST["fechanac"], $_POST["fechacon"], $_POST["fechaalta"],$_POST["curp"], $_POST["nss"], $_POST["rfc"], 
	$_POST["identificacion"], $_POST["numeroidentificacion"], $_POST["numeroreferenciaslab"], $_POST["fechauniforme"], $_POST["cantidadpolo"], 
	$_POST["tallapolo"], $_POST["emergencianom"], $_POST["emergenciaapat"], $_POST["emergenciaamat"], $_POST["emergenciarelacion"], $_POST["emergenciatelefono"], 
	$_POST["emergencianom2"], $_POST["emergenciaapat2"], $_POST["emergenciaamat2"], $_POST["emergenciarelacion2"], $_POST["emergenciatelefono2"], 
	$_POST["tipo_sangre"], $_POST["vacante"], $_POST["radio2"], $_POST["nomfam"], $_POST["apellidopatfam"], $_POST["apellidomatfam"], 
	$_POST["numeroreferenciasban"], $_POST["banco_personal"], $_POST["cuenta_personal"], $_POST["clabe_personal"], $_POST["plastico_personal"])){


		/*
		+ ============================================= EMPIEZA LA VALIDACIÓN DE LOS DATOS GENERALES =============================================
		*/

		//NIVEL DE ESTUDIOS
		$nivelestudios_array = array("PRIMARIA", "SECUNDARIA", "BACHILLERATO", "CARRERA TECNICA", "LICENCIATURA", "ESPECIALIDAD", "MAESTRIA", "DOCTORADO");
		//Verifica si el valor seleccionado coincide con los valores que hay en el arreglo
		if (in_array($_POST["estudios"], $nivelestudios_array)) {
			$estudios = $_POST["estudios"];
		}else if(empty($_POST["estudios"])){
			$estudios = null;
		}else{
			die(json_encode(array("error", "El valor escogido en el dropdown de nivel de estudios está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		//CORREO ELECTRÓNICO
		if($_POST["posee_correo"] == "si"){
			//Checa si el correo está vacío
			if(empty($_POST["correo_adicional"])){
				die(json_encode(array("error", "Por favor, ingrese un correo adicional")));
			}else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo_adicional"])){
				die(json_encode(array("error", "Asegúrese que el texto ingresado en correo adicional este en formato de email")));
			}else{
				$posee_correo= $_POST["posee_correo"];
				//Conviertelo en mayúsculas
				$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
				//Quitale los acentos
				$posee_correo = quitarAcentos($posee_correo);
				//Los servidores de correo y los sistemas de correo electrónico generalmente son sensibles a los acentos en los caracteres. Esto significa que "mi.correo@gmail.com" y "mí.correo@gmail.com" se considerarían direcciones de correo electrónico distintas, lo mismo que las mayúsculas lo cual significa que aquí la regla de los acentos y mayúsculas no aplican en los correos
				$correo_adicional = $_POST["correo_adicional"];
			}
		}else{
			$posee_correo = $_POST["posee_correo"];
			$posee_correo = mb_strtoupper($posee_correo, 'UTF-8');
			$posee_correo = quitarAcentos($posee_correo);
			$correo_adicional = null;
		}

		//CALLE
		if(empty($_POST["calle"])){
			$calle = null;
		}else{
			//Verifica si el campo de la calle está bien escrito, no acepta $%&"#@
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["calle"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios en la calle")));
			}else{
				$calle = $_POST["calle"];  
				$calle = mb_strtoupper($calle, 'UTF-8');
				$calle = quitarAcentos($calle);
			}
		}

		// NÚMERO INTERIOR
		// Checa si está vacío
		if(empty($_POST["ninterior"])){
			$ninterior = null; // Si no se proporciona el número interior, lo establecemos como nulo.
		}else{
			$ninterior = $_POST["ninterior"]; // Asignamos el número interior si pasa la validación.
		}

		// NÚMERO EXTERIOR
		//Checa si está vacío
		if(empty($_POST["nexterior"])){
			$nexterior = null; // Si no se proporciona el número exterior, lo establecemos como nulo.
		}else{
			$nexterior = $_POST["nexterior"]; // Asignamos el número exterior si pasa la validación.
		}

		// COLONIA
		if(empty($_POST["colonia"])){
			$colonia = null; 
		}else{
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["colonia"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfanuméricos, puntos, guiones intermedios y espacios en la colonia")));
			}else{
				$colonia = $_POST["colonia"]; 
				$colonia = mb_strtoupper($colonia, 'UTF-8');
				$colonia = quitarAcentos($colonia);
			}
		}

		// ESTADO
		if(empty($_POST["estado"])){
			$estado = null;
		}else{
			$retrieve_estados = $object->_db->prepare("SELECT id, nombre FROM estados"); // Preparar y ejecutar una consulta para recuperar la lista de estados
			$retrieve_estados->execute();

			$fetch_retrieve_estados = $retrieve_estados->fetchAll(PDO::FETCH_KEY_PAIR); // Obtener los resultados de la consulta como un arreglo asociativo con ID como clave y Nombre como valor

			if (array_key_exists($_POST["estado"], $fetch_retrieve_estados)) { // El estado seleccionado coincide con uno de los estados en el dropdown
				$array_key_state_value = $fetch_retrieve_estados[$_POST["estado"]];

				// Verificar si el texto ingresado (si existe) coincide con el valor del estado
				if (isset($_POST["estadotext"]) && $_POST['estadotext'] == $array_key_state_value) {
					$estado = $_POST["estado"];
				} else {
					die(json_encode(array("error", "Por favor, asegúrese de que el estado escogido se encuentre en el dropdown")));
				}
			} else {
				die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los estados registrados")));
			}
		}

		// MUNICIPIO
		if (empty($_POST["municipio"])) {
			$municipio = null;
		} else if (empty($_POST["estado"]) && !(empty($_POST["municipio"]))) {
			die(json_encode(array("error", "Por favor, seleccione un estado y luego un municipio")));
		} else {
			$retrieve_estados_municipio = $object->_db->prepare("SELECT id, nombre from municipios where estado=:estado");
			$retrieve_estados_municipio->execute(array(':estado' => $_POST["estado"]));

			$count_retrieve_estados_municipio = $retrieve_estados_municipio->rowCount();

			if ($count_retrieve_estados_municipio > 0) {
				$fetch_retrieve_estados_municipio = $retrieve_estados_municipio->fetchAll(PDO::FETCH_KEY_PAIR);

				if (array_key_exists($_POST["municipio"], $fetch_retrieve_estados_municipio)) {
					$array_key_municipio_value = $fetch_retrieve_estados_municipio[$_POST["municipio"]];

					if (isset($_POST["municipiotext"]) && $_POST['municipiotext'] == $array_key_municipio_value) {
						$municipio = $_POST["municipio"];
					} else {
						die(json_encode(array("error", "Por favor, asegúrese de que el municipio escogido se encuentre en el dropdown")));
					}
				} else {
					die(json_encode(array("error", "El ID seleccionado no coincide con ninguno de los municipios registrados")));
				}
			} else {
				die(json_encode(array("error", "El estado elegido no tiene ningún municipio; el dropdown de municipios debe estar vacío")));
			}
		}

		// CÓDIGO POSTAL
		if(empty($_POST["codigo"])){
			$codigo = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["codigo"])){
				die(json_encode(array("error", "Solo se permiten números en el código postal")));
			}else{
				$codigo = $_POST["codigo"];
			}
		}

		// TELÉFONO DE DOMICILIO
		if(empty($_POST["teldom"])){
			$teldom = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["teldom"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de domicilio")));
			}else if(strlen($_POST["teldom"]) != 10){
				die(json_encode(array("error", "El teléfono de domicilio debe tener exactamente 10 caracteres")));
			}else{
				$teldom = $_POST["teldom"];
			}
		}

		// POSEE TELÉFONO MÓVIL PROPIO
		if($_POST["posee_telmov"] == "si"){
			if(empty($_POST["telmov"])){
				die(json_encode(array("error", "Por favor, ingrese un teléfono móvil")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["telmov"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de móvil")));
			}else if(strlen($_POST["telmov"]) != 10){
				die(json_encode(array("error", "El teléfono móvil debe tener exactamente 10 caracteres")));
			}else{
				$posee_telmov = $_POST["posee_telmov"];
				$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
				$posee_telmov = quitarAcentos($posee_telmov);
				$telmov = $_POST["telmov"];
			}
		}else{
			// Si no se selecciona "Sí" para poseer teléfono móvil, establecer los valores correspondientes
			$posee_telmov = $_POST["posee_telmov"];
			$posee_telmov = mb_strtoupper($posee_telmov, 'UTF-8');
			$posee_telmov = quitarAcentos($posee_telmov);
			$telmov = null;
		}


		//CASA PROPIA
		if(empty($_POST["radio"])){
			die(json_encode(array("error", "Por favor, ingrese el radiobutton de casa propia no puede ir vacío")));
		}else{
			$casa_propia = $_POST["radio"];
			$casa_propia = mb_strtoupper($casa_propia, 'UTF-8');
			$casa_propia = quitarAcentos($casa_propia);
		}

		// ESTADO CIVIL
		$estadocivil_array = array("SOLTERO", "CASADO", "DIVORCIADO", "UNIÓN LIBRE");

		if (in_array($_POST["ecivil"], $estadocivil_array)) {
			$ecivil = $_POST["ecivil"];
		} else if (empty($_POST["ecivil"])) {
			$ecivil = null;
		} else {
			// Si "ecivil" no coincide con las opciones originales, muestra un error
			die(json_encode(array("error", "El valor escogido en el dropdown de estado civil está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// POSEE RETENCIÓN
		if ($_POST["posee_retencion"] == "si") {
			if (empty($_POST["monto_mensual"])) {
				die(json_encode(array("error", "Por favor, ingrese el monto mensual")));
			} else if (!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["monto_mensual"])) {
				die(json_encode(array("error", "Solo se permiten números y decimales en el monto mensual")));
			} else {
				$posee_retencion = $_POST["posee_retencion"];
				$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
				$posee_retencion = quitarAcentos($posee_retencion);
				$monto_mensual = $_POST["monto_mensual"];
			}
		} else {
			$posee_retencion = $_POST["posee_retencion"];
			$posee_retencion = mb_strtoupper($posee_retencion, 'UTF-8');
			$posee_retencion = quitarAcentos($posee_retencion);
			$monto_mensual = null;
		}

		// FECHA DE NACIMIENTO
		if (empty($_POST["fechanac"])) {
			$fechanac = null;
		} else {
			$_POST["fechanac"] = str_replace('/', '-', $_POST["fechanac"]); // Reemplaza las barras oblicuas por guiones
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechanac"])) { // Si la fecha no cumple con el formato 'AAAA-MM-DD', muestra un error
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de nacimiento")));
			} else {
				$check_fechanac = validateDate($_POST["fechanac"], 'Y-m-d');
		
				// Verifica si la fecha de nacimiento es inválida
				if (!$check_fechanac) {
					die(json_encode(array("error", "La fecha de nacimiento no es válida")));
				}
		
				// Calcula la edad a partir de la fecha de nacimiento
				$fecha_nacimiento = new DateTime($_POST["fechanac"]);
				$fecha_hoy = new DateTime();
				$edad = $fecha_nacimiento->diff($fecha_hoy)->y;
		
				// Verifica si el solicitante es menor de 18 años
				if ($edad < 18) {
					die(json_encode(array("error", "Debes ser mayor de 18 años para aplicar")));
				}
		
				$fechanac = $_POST["fechanac"];
			}
		}

		// FECHA DE INICIO DE CONTRATO
		if (empty($_POST["fechacon"])) {
			$fechacon = null;
		} else {
			$_POST["fechacon"] = str_replace('/', '-', $_POST["fechacon"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechacon"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de contrato")));
			} else {
				$check_fechacon = validateDate($_POST["fechacon"], 'Y-m-d');
		
				if (!$check_fechacon) {
					die(json_encode(array("error", "La fecha de inicio de contrato es inválida")));
				}
		
				$fechacon = $_POST["fechacon"];
			}
		}

		// FECHA DE ALTA
		if (empty($_POST["fechaalta"])) {
			$fechaalta = null;
		} else {
			$_POST["fechaalta"] = str_replace('/', '-', $_POST["fechaalta"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechaalta"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de alta")));
			} else {
				$check_fechaalta = validateDate($_POST["fechaalta"], 'Y-m-d');
		
				if (!$check_fechaalta) {
					die(json_encode(array("error", "La fecha de alta es inválida")));
				}
		
				$fechaalta = $_POST["fechaalta"];
			}
		}	

		//CURP
		if(empty($_POST["curp"])){
			$curp = null;
		}else{
			if(!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $_POST["curp"])){
				die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR")));
			}else{
				$curp= $_POST["curp"];
				$curp = mb_strtoupper($curp, 'UTF-8');
				$curp = quitarAcentos($curp);
			}
		}

		//NÚMERO DE SEGURO SOCIAL
		if(empty($_POST["nss"])){
			$nss = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["nss"])){
				die(json_encode(array("error", "Solo se permiten números en el número de seguro social")));
			}else{
				$nss = $_POST["nss"];
			}
		}

		//RFC
		if(empty($_POST["rfc"])){
			$rfc = null;
		}else{
			if(!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $_POST["rfc"])){
				die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789")));
			}else{
				$rfc = $_POST["rfc"];
				$rfc = mb_strtoupper($rfc, 'UTF-8');
				$rfc = quitarAcentos($rfc);
			}
		}

		//TIPO DE IDENTIFICACIÓN
		$identificacion_array = array("INE", "PASAPORTE", "CEDULA");
		if(in_array($_POST["identificacion"], $identificacion_array)) {
			$identificacion = $_POST["identificacion"];
		}else if(empty($_POST["identificacion"])){
			$identificacion = null;
		}else{
			die(json_encode(array("error", "El valor escogido en el dropdown de tipo de identificación está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		//NÚMERO DE IDENTIFICACIÓN
		if(empty($_POST["numeroidentificacion"])){
			$numeroidentificacion = null;
		}else{
			if($_POST["identificacion"] == "INE"){
				if (!preg_match('/^[A-Za-z0-9]{13}$/', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "El INE solo puede contener 13 caracteres y debe ser alfanúmerico")));
				}
			}else if($_POST["identificacion"] == "PASAPORTE"){
				if (!preg_match('/^[A-Z]{3}\d{6}$/i', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "El PASAPORTE solo puede contener 9 caracteres, debe ser alfanúmerico y debe comenzar con 3 letras y seguido de 6 números")));
				}
			}else if($_POST["identificacion"] == "CEDULA"){
				if (!preg_match('/^\d{7,10}$/', $_POST["numeroidentificacion"])) {
					die(json_encode(array("error", "La CEDULA solo puede contener entre 7 y 10 dígitos y debe ser númerico")));
				}
			}
			$numeroidentificacion = $_POST["numeroidentificacion"];
			$numeroidentificacion = mb_strtoupper($numeroidentificacion, 'UTF-8');
			$numeroidentificacion = quitarAcentos($numeroidentificacion);
		}

		/*
		+ ============================================= TERMINA LA VALIDACIÓN DE LOS DATOS GENERALE =============================================
		*/


		/*
		+ ============================================= EMPIEZA LA VALIDACIÓN DE LOS DATOS ADICIONALES =============================================
		*/

		// FAMILIARES
		if (!empty($_POST["numerofamiliares"])) {
			if (preg_match("/^\d$/", $_POST["numerofamiliares"])) {
				$familiares_decoded = json_decode($_POST["familiares"], true);
		
				// Verifica que el número de familiares coincida con la cantidad real
				if (is_array($familiares_decoded) && count($familiares_decoded) == $_POST["numerofamiliares"]) {
					$familiar_contador = 1;
					foreach ($familiares_decoded as &$familiar) {
						if (empty($familiar["nombre"]) || empty($familiar["apellidopat"]) || empty($familiar["apellidomat"])) {
							die(json_encode(array("error", "Existen campos vacíos en los familiares, por favor, verifique la información")));
						} else {
							//validaciones
							if (!preg_match("/^[\pL\s'-]+$/u", $familiar["nombre"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre del familiar " . $familiar_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $familiar["apellidopat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno del familiar " . $familiar_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $familiar["apellidomat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno del familiar " . $familiar_contador)));
							} 
						}
						$familiar["nombre"] = mb_strtoupper(quitarAcentos($familiar["nombre"], 'UTF-8'));
						$familiar["apellidopat"] = mb_strtoupper(quitarAcentos($familiar["apellidopat"], 'UTF-8'));
						$familiar["apellidomat"] = mb_strtoupper(quitarAcentos($familiar["apellidomat"], 'UTF-8'));

						$familiar_contador++;
					}
					$familiares = json_encode($familiares_decoded); // Convierte el arreglo de vuelta a JSON
				} else {
					die(json_encode(array("error", "El número de familiares ingresado no coincide con el enviado, por favor, verifique la información")));
				}
			} else {
				die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de familiares")));
			}
		} else {
			$familiares = null;
		}
		// REFERENCIAS LABORALES
		if (!empty($_POST["numeroreferenciaslab"])) {
			if (preg_match("/^\d$/", $_POST["numeroreferenciaslab"])) {
				$referencias_decoded = json_decode($_POST["referencias"], true);
		
				// Verifica que el número de referencias coincida con la cantidad real
				if (is_array($referencias_decoded) && count($referencias_decoded) == $_POST["numeroreferenciaslab"]) {
					$referencias_contador = 1;
					foreach ($referencias_decoded as &$referencia_laboral) {
						if (empty($referencia_laboral["nombre"]) || empty($referencia_laboral["apellidopat"]) || empty($referencia_laboral["apellidomat"]) || empty($referencia_laboral["relacion"]) || empty($referencia_laboral["telefono"])) {
							die(json_encode(array("error", "Existen campos vacíos en las referencias laborales, por favor, verifique la información")));
						} else {
							//validaciones
							if (!preg_match("/^[\pL\s'-]+$/u", $referencia_laboral["nombre"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidopat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^[\pL\s]+$/u", $referencia_laboral["apellidomat"])) {
								die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia laboral " . $referencias_contador)));
							} else if (!preg_match("/^\d{10}$/", $referencia_laboral["telefono"])) {
								die(json_encode(array("error", "El teléfono de la referencia laboral " . $referencias_contador . " debe tener exactamente 10 dígitos")));
							}
						}
						$referencia_laboral["nombre"] = mb_strtoupper(quitarAcentos($referencia_laboral["nombre"], 'UTF-8'));
						$referencia_laboral["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidopat"], 'UTF-8'));
						$referencia_laboral["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_laboral["apellidomat"], 'UTF-8'));

						$referencias_contador++;
					}
					$referencias = json_encode($referencias_decoded); // Convierte el arreglo de vuelta a JSON
				} else {
					die(json_encode(array("error", "El número de referencias laborales ingresado no coincide con el enviado, por favor, verifique la información")));
				}
			} else {
				die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
			}
		} else {
			$referencias = null;
		}

		// FECHA DE ENTREGA DE UNIFORME
		if (empty($_POST["fechauniforme"])) {
			$fechauniforme = null;
		} else {
			$_POST["fechauniforme"] = str_replace('/', '-', $_POST["fechauniforme"]);
		
			if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fechauniforme"])) {
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de uniforme")));
			} else {
				$check_fechauniforme = validateDate($_POST["fechauniforme"], 'Y-m-d');
		
				if (!$check_fechauniforme) {
					die(json_encode(array("error", "La fecha de uniforme es inválida")));
				}
		
				$fechauniforme = $_POST["fechauniforme"];
			}
		}

		//CANTIDAD POLO
		if(empty($_POST["cantidadpolo"])){
			$cantidadpolo = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["cantidadpolo"])){
				die(json_encode(array("error", "Solo se permiten números en el campo de cantidad polo")));
			}else{
				$cantidadpolo = $_POST["cantidadpolo"];
			}
		}

		// TALLA CAMISA
		$tallacamisa_array = array("XS", "S", "M", "L", "XL", "XXL", "XXXL");

		if (in_array($_POST["tallapolo"], $tallacamisa_array)) {
			$tallapolo = $_POST["tallapolo"];
		} else if (empty($_POST["tallapolo"])) {
			$tallapolo = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de talla camisa está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		// CONTACTOS DE EMERGENCIA
		if(empty($_POST["emergencianom"])){
			$emergencianom = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del primer contacto")));
			}else{
				$emergencianom = $_POST["emergencianom"];
				$emergencianom = mb_strtoupper($emergencianom, 'UTF-8');
				$emergencianom = quitarAcentos($emergencianom);
			}
		}

		//Apellido paterno del primer contacto de emergencia
		if(empty($_POST["emergenciaapat"])){
			$emergenciaapat = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del primer contacto")));
			}else{
				$emergenciaapat = $_POST["emergenciaapat"];
				$emergenciaapat = mb_strtoupper($emergenciaapat, 'UTF-8');
				$emergenciaapat = quitarAcentos($emergenciaapat);
			}
		}

		//Apellido materno del primer contacto de emergencia
		if(empty($_POST["emergenciaamat"])){
			$emergenciaamat = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el primer contacto")));
			}else{
				$emergenciaamat = $_POST["emergenciaamat"];
				$emergenciaamat = mb_strtoupper($emergenciaamat, 'UTF-8');
				$emergenciaamat = quitarAcentos($emergenciaamat);
			}
		}

		// Relación
		if (empty($_POST["emergenciarelacion"])) {
			$emergenciarelacion = null;
		} else {
			$emergenciarelacion = $_POST["emergenciarelacion"];
		}

		// Teléfono
		if(empty($_POST["emergenciatelefono"])){
			$emergenciatelefono = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del primer contacto")));
			}else if(strlen($_POST["emergenciatelefono"]) != 10){
				die(json_encode(array("error", "El teléfono de emergencia del primer contacto debe tener exactamente 10 caracteres")));
			}else{
				$emergenciatelefono = $_POST["emergenciatelefono"];
			}
		}

		//Nombre del segundo contacto de emergencia
		if(empty($_POST["emergencianom2"])){
			$emergencianom2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de emergencia del segundo contacto")));
			}else{
				$emergencianom2 = $_POST["emergencianom2"];
				$emergencianom2 = mb_strtoupper($emergencianom2, 'UTF-8');
				$emergencianom2 = quitarAcentos($emergencianom2);
			}
		}

		//Apellido paterno del segundo contacto de emergencia
		if(empty($_POST["emergenciaapat2"])){
			$emergenciaapat2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaapat2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de emergencia del segundo contacto")));
			}else{
				$emergenciaapat2 = $_POST["emergenciaapat2"];
				$emergenciaapat2 = mb_strtoupper($emergenciaapat2, 'UTF-8');
				$emergenciaapat2 = quitarAcentos($emergenciaapat2);
			}
		}

		//Apellido materno del segundo contacto de emergencia
		if(empty($_POST["emergenciaamat2"])){
			$emergenciaamat2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaamat2"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de emergencia de el segundo contacto")));
			}else{
				$emergenciaamat2 = $_POST["emergenciaamat2"];
				$emergenciaamat2 = mb_strtoupper($emergenciaamat2, 'UTF-8');
				$emergenciaamat2 = quitarAcentos($emergenciaamat2);
			}
		}

		// Relación
		if (empty($_POST["emergenciarelacion2"])) {
			$emergenciarelacion2 = null;
		} else {
			$emergenciarelacion2 = $_POST["emergenciarelacion2"];
		}

		// Teléfono
		if(empty($_POST["emergenciatelefono2"])){
			$emergenciatelefono2 = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatelefono2"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de emergencia del segundo contacto")));
			}else if(strlen($_POST["emergenciatelefono2"]) != 10){
				die(json_encode(array("error", "El teléfono de emergencia del segundo contacto debe tener exactamente 10 caracteres")));
			}else{
				$emergenciatelefono2 = $_POST["emergenciatelefono2"];
			}
		}

		// TIPO DE SANGRE
		$tiposangre_array = array("A_POSITIVO", "A_NEGATIVO", "B_POSITIVO", "B_NEGATIVO", "AB_POSITIVO", "AB_NEGATIVO", "O_POSITIVO", "O_NEGATIVO");

		if (in_array($_POST["tipo_sangre"], $tiposangre_array)) {
			$tipo_sangre = $_POST["tipo_sangre"];
		} else if (empty($_POST["tipo_sangre"])) {
			$tipo_sangre = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de tipo de sangre está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

		// ¿CÓMO SE ENTERO DE LA VACANTE
		$vacante_array = array("PLATAFORMA LABORAL", "RECOMENDACION", "REDES SOCIALES", "AVISOS DE OCASION");

		if (in_array($_POST["vacante"], $vacante_array)) {
			$vacante = $_POST["vacante"];
		} else if (empty($_POST["vacante"])) {
			$vacante = null;
		} else {
			die(json_encode(array("error", "El valor escogido en el dropdown de ¿cómo se entero de la vacante?, por favor, vuelva a poner el valor original en el dropdown")));
		}
		
		//¿TIENE FAMILIARES EN LA EMPRESA
		if($_POST["radio2"] == "si"){
			if(empty($_POST["nomfam"])){
				die(json_encode(array("error", "Por favor, ingrese el nombre del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nomfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre del familiar que trabaja en la empresa")));
			} else if(empty($_POST["apellidopatfam"])){
				die(json_encode(array("error", "Por favor, ingrese el apellido paterno del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidopatfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno del familiar que trabaja en la empresa")));
			} else if(empty($_POST["apellidomatfam"])){
				die(json_encode(array("error", "Por favor, ingrese el apellido materno del familiar que trabaja en la empresa")));
			} else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["apellidomatfam"])){
				die(json_encode(array("error", "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno del familiar que trabaja en la empresa")));
			} else {
				$radio2 = $_POST["radio2"];
				$radio2 = mb_strtoupper($radio2, 'UTF-8');
				$radio2 = quitarAcentos($radio2);
				$nomfam = $_POST["nomfam"];
				$nomfam = mb_strtoupper($nomfam, 'UTF-8');
				$nomfam = quitarAcentos($nomfam);
				$apellidopatfam = $_POST["apellidopatfam"];
				$apellidopatfam = mb_strtoupper($apellidopatfam, 'UTF-8');
				$apellidopatfam = quitarAcentos($apellidopatfam);
				$apellidomatfam = $_POST["apellidomatfam"];
				$apellidomatfam = mb_strtoupper($apellidomatfam, 'UTF-8');
				$apellidomatfam = quitarAcentos($apellidomatfam);
			}
		} else {
			$radio2 = $_POST["radio2"];
			$radio2 = mb_strtoupper($radio2, 'UTF-8');
			$radio2 = quitarAcentos($radio2);
			$nomfam = null;
			$apellidopatfam = null;
			$apellidomatfam = null;
		}

/** 
	 +  =============================================== 		TERMINA LA VALIDACIÓN DE LOS DATOS ADICIONALES		=============================================== 
*/


	/* 
	+   =============================================           EMPIEZA LA VALIDACIÓN DE LOS DATOS BANCARIOS        =============================================
	*/

	//REFERENCIAS BANCARIAS
	if(!(empty($_POST["numeroreferenciasban"]))){
		if(preg_match("/^\d$/", $_POST["numeroreferenciasban"])){
			$referenciasbancarias_decoded = json_decode($_POST["refbanc"], true);

			// Verifica que el número de referencias coincida con la cantidad real
			if (is_array($referenciasbancarias_decoded) && count($referenciasbancarias_decoded) == $_POST["numeroreferenciasban"]) {
				$referenciasban_contador = 1;
				foreach ($referenciasbancarias_decoded as &$referencia_bancaria) {
					if (empty($referencia_bancaria["nombre"]) || empty($referencia_bancaria["apellidopat"]) || empty($referencia_bancaria["apellidomat"]) || empty($referencia_bancaria["relacion"]) || empty($referencia_bancaria["rfc"]) || empty($referencia_bancaria["curp"]) || empty($referencia_bancaria["porcentaje"])) {
						die(json_encode(array("error", "Existen campos vacíos en las referencias bancarias, por favor, verifique la información")));
					}else{
						//Validaciones
						if (!preg_match("/^[\pL\s'-]+$/u", $referencia_bancaria["nombre"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidopat"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido paterno de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[\pL\s]+$/u", $referencia_bancaria["apellidomat"])) {
							die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el apellido materno de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[A-ZÑ&]{3,4}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z\d]{3})$/", $referencia_bancaria["rfc"])) {
							die(json_encode(array("error", "Solo puede contener letras y números, debe tener 12 caracteres y debe de cumplir con el siguiente formato: ABCD123456789 en el RFC de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9A-Z&]{2})$/", $referencia_bancaria["curp"])) {
							die(json_encode(array("error", "Solo puede contener letras y números, debe tener 18 caracteres y debe de cumplir con el siguiente formato: ABDC123456HJKNPLR en el CURP de la referencia bancaria " . $referenciasban_contador)));
						} else if (!preg_match("/^[0-9]+$/", $referencia_bancaria["porcentaje"])) {
							die(json_encode(array("error", "El porcentaje de derecho de la referencia bancaria " . $referenciasban_contador . " debe ser númerico")));
						}
					}

					// Aplicamos mb_strtoupper a los valores de cadena
					//Le quitamos los acentos
					$referencia_bancaria["nombre"] = mb_strtoupper(quitarAcentos($referencia_bancaria["nombre"], 'UTF-8'));
					$referencia_bancaria["apellidopat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidopat"], 'UTF-8'));
					$referencia_bancaria["apellidomat"] = mb_strtoupper(quitarAcentos($referencia_bancaria["apellidomat"], 'UTF-8'));
					$referencia_bancaria["rfc"] = mb_strtoupper(quitarAcentos($referencia_bancaria["rfc"], 'UTF-8'));
					$referencia_bancaria["curp"] = mb_strtoupper(quitarAcentos($referencia_bancaria["curp"], 'UTF-8'));

					if($_POST["numeroreferenciasban"] == 1){
						$referencia_bancaria["porcentaje"] = 100;
					}else{
						$referencia_bancaria["porcentaje"] = 50;
					}

					$referenciasban_contador++;
				}
				// Asigna el valor de "refbanc" después de validar
				$refbanc = json_encode($referenciasbancarias_decoded); // Convierte el arreglo de vuelta a JSON
			} else {
				die(json_encode(array("error", "El número de referencias bancarias ingresado no coincide con el enviado, por favor, verifique la información")));
			}
		} else {
			die(json_encode(array("error", "Solo se permite un número de un solo dígito en el campo de número de referencias laborales")));
		}
	} else {
		$refbanc = null;
	}

	if(Roles::FetchSessionRol($_SESSION['rol']) == "Tecnico"){
	//CUENTA BANCARIA PERSONAL
	if(empty($_POST["banco_personal"])){
		$banco_personal = null;
	}else{
		if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_personal"])){
			die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco de la cuenta personal")));
		}else{
			$banco_personal = $_POST["banco_personal"];
			$banco_personal = mb_strtoupper($banco_personal, 'UTF-8');
			$banco_personal = quitarAcentos($banco_personal);
		}
	}

	if(empty($_POST["cuenta_personal"])){
		$cuenta_personal = null;
	}else{
		if(!preg_match("/^\d{10}$/", $_POST["cuenta_personal"])){
			die(json_encode(array("error", "La cuenta bancaria personal debe contener exactamente 10 números")));
		}else{
			$cuenta_personal = $_POST["cuenta_personal"];
		}
	}

	if(empty($_POST["clabe_personal"])){
		$clabe_personal = null;
	}else{
		if(!preg_match("/^\d{18}$/", $_POST["clabe_personal"])){
			die(json_encode(array("error", "La clabe bancaria personal debe contener exactamente 18 números")));
		}else{
			$clabe_personal = $_POST["clabe_personal"];
		}
	}

	if(empty($_POST["plastico_personal"])){
		$plastico_personal = null;
	}else{
		if(!preg_match("/^\d{16}$/", $_POST["plastico_personal"])){
			die(json_encode(array("error", "El plástico de la cuenta bancaria personal debe contener exactamente 16 números")));
		}else{
			$plastico_personal = $_POST["plastico_personal"];
		}
	}
}else{
	$banco_personal = null;
	$cuenta_personal = null;
	$clabe_personal = null;
	$plastico_personal = null;
}
/** 
		=============================================     TERMINA LA VALIDACIÓN DE LOS DATOS BANCARIOS 			=============================================
*/


	/*
	+	===============================================   EMPIEZA LA VALIDACIÓN DE LA PAPELERÍA RECIBIDA        ===============================================
		*/

        //DOCUMENTOS
        $checktipospapeleria = $object->_db->prepare("SELECT id, nombre FROM tipo_papeleria"); // Añadir "id" a la consulta
		$checktipospapeleria->execute();
		$fetchtipopapeleria = $checktipospapeleria->fetchAll(PDO::FETCH_ASSOC);

		$arraypapeleria = [];

		foreach ($fetchtipopapeleria as $tipo) {
			$inputName = 'papeleria' . $tipo["id"]; // Usar el ID como clave en lugar de la secuencia

			if (isset($_FILES[$inputName]['name'])) {
				$allowed = array('jpeg', 'png', 'jpg', 'pdf');
				$filename = $_FILES[$inputName]['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if (!in_array($ext, $allowed)) {
					die(json_encode(array("error", "Solo se permite jpg, jpeg, pngs y pdfs en " . $tipo["nombre"])));
				} elseif ($_FILES[$inputName]['size'] > 10485760) {
					die(json_encode(array("error", "El archivo debe pesar ser menos de 10 MB en " . $tipo["nombre"])));
				} else {
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					$mimetype = finfo_file($finfo, $_FILES[$inputName]["tmp_name"]);
					finfo_close($finfo);

					if ($mimetype != "image/jpeg" && $mimetype != "image/png" && $mimetype != "application/pdf") {
						die(json_encode(array("error", "Por favor, asegúrese de que la imagen sea originalmente un archivo png, jpg, jpeg y pdf en " . $tipo["nombre"])));
					}

					$arraypapeleria[$tipo["id"]] = $_FILES[$inputName]; // Usar el ID como clave
				}
			} else {
				$arraypapeleria[$tipo["id"]] = null; // Usar el ID como clave
			}
		}

        /** 
		===============================================				TERMINA LA VALIDACIÓN DE LA PAPELERÍA RECIBIDA   		===============================================
		*/

		$expediente = new Expedientes($_SESSION['id'], null, null, null, null, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, null, null, null, null, null, null, null, null, null, null, null, null, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, null, null, null, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaapat, $emergenciaamat, $emergenciarelacion, $emergenciatelefono, $emergencianom2, $emergenciaapat2, $emergenciaamat2, $emergenciarelacion2, $emergenciatelefono2, null, null, $tipo_sangre, $vacante, $radio2, $nomfam, $apellidopatfam, $apellidopatfam, $familiares, $refbanc, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, null, null, null, null, $arraypapeleria);
		$logged_user = $_SESSION['nombre']. ' ' .$_SESSION['apellidopat']. ' ' .$_SESSION['apellidomat'];
		//Una vez que se hayan almacenado las variables, llama al metodo para editar el expediente
		$delete_array = $_POST["delete_switch_array_json"];
		$delete_array = json_decode($delete_array, true);
		$expediente ->Submit_tokenexpediente($logged_user, $delete_array);
		die(json_encode(array("success", "Se ha editado el expediente")));

	}else{
		die(json_encode(array("error", "Faltan variables requeridas en la solicitud.")));
	}
}
}
?>