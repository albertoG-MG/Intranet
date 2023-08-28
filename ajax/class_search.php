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
include_once __DIR__ . "/../config/conexion.php";
$object = new connection_database();
session_start();

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
	if(isset($_POST["select2"], $_POST["select2text"], $_POST["numempleado"], $_POST["puesto"], $_POST["estudios"], $_POST["posee_correo"], 
    $_POST["correo_adicional"], $_POST["calle"], $_POST["ninterior"], $_POST["nexterior"], $_POST["colonia"], $_POST["estado"],
    $_POST["estadotext"], $_POST["municipio"], $_POST["municipiotext"], $_POST["codigo"], $_POST["teldom"], $_POST["posee_telmov"], 
    $_POST["telmov"], $_POST["posee_telempresa"], $_POST["marcacion"], $_POST["serie"], $_POST["sim"], $_POST["numred"], $_POST["modelotel"], 
    $_POST["marcatel"], $_POST["imei"], $_POST["posee_laptop"], $_POST["marca_laptop"], $_POST["modelo_laptop"], $_POST["serie_laptop"], 
    $_POST["radio"], $_POST["ecivil"], $_POST["posee_retencion"], $_POST["monto_mensual"], $_POST["fechanac"], $_POST["fechacon"], 
    $_POST["fechaalta"], $_POST["salario_contrato"], $_POST["salario_fechaalta"], $_POST["observaciones"], $_POST["curp"], 
    $_POST["nss"], $_POST["rfc"], $_POST["identificacion"], $_POST["numeroidentificacion"], $_POST["numeroreferenciaslab"], 
    $_POST["fechauniforme"], $_POST["cantidadpolo"], $_POST["tallapolo"], $_POST["emergencianom"], $_POST["emergenciaparentesco"], 
    $_POST["emergenciatel"], $_POST["emergencianom2"], $_POST["emergenciaparentesco2"], $_POST["emergenciatel2"], $_POST["capacitacion"],
    $_POST["antidoping"], $_POST["tipo_sangre"], $_POST["vacante"], $_POST["radio2"], $_POST["nomfam"], $_POST["numeroreferenciasban"], $_POST["banco_personal"], 
    $_POST["cuenta_personal"], $_POST["clabe_personal"], $_POST["plastico_personal"], $_POST["banco_nomina"], $_POST["cuenta_nomina"], $_POST["clabe_nomina"], 
    $_POST["plastico"], $_POST["logged_user"], $_POST["method"])){
        
        //CHECA SI EL EXPEDIENTE EXISTE
        if($_POST["method"] == "edit"){
            $expediente_check = $object -> _db -> prepare("SELECT * FROM expedientes where id=:expedienteid");
            $expediente_check -> execute(array(':expedienteid' => $_POST["id_expediente"]));
            $count_expediente_check = $expediente_check -> rowCount();
            if($count_expediente_check == 0){
                die(json_encode(array("expediente_deleted", "Este expediente ya no existe!")));
            }
        }

		//CHECA SI EL USUARIO TIENE PERMISO PARA REALIZAR LAS ACCIONES DE CREAR Y EDITAR EXPEDIENTES
		if($_POST["method"] == "store"){
			if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Crear expediente") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
				die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
			}
		}else if($_POST["method"] == "edit"){
			if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "false" || Permissions::CheckPermissions($_SESSION["id"], "Editar expediente") == "false") && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
				die(json_encode(array("error", "No tiene permisos para realizar estas acciones")));
			}       
		}
		
		/*
		=============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS GENERALES
		=============================================
		*/
		
		//SELECT2
		if($_POST["select2"] != null){
			if($_POST["method"] == "store"){
				$select2_content = $object -> _db -> prepare("SELECT usuarios.id AS userid, concat(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS nombre FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre NOT IN ('Superadministrador', 'Administrador', 'Director general', 'Usuario externo') AND NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id=expedientes.users_id)");
				$select2_content -> execute();
			}else if($_POST["method"] == "edit"){
				$select2_content = $object -> _db -> prepare("SELECT usuarios.id AS userid, concat(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS nombre FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id WHERE roles.nombre NOT IN ('Superadministrador', 'Administrador', 'Director general', 'Usuario externo') AND NOT EXISTS (SELECT 1 FROM expedientes WHERE usuarios.id=expedientes.users_id AND expedientes.id!=:expedienteid)");
				$select2_content -> execute(array(':expedienteid' => $_POST["id_expediente"]));
			}
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
			die(json_encode(array("error", "Debe asignar un usuario al expediente")));
		}
		
		//NÚM. EMPLEADO
		if(empty($_POST["numempleado"])){
            die(json_encode(array("error", "Por favor, ingrese un número de empleado")));
        }else if(!preg_match("/^([FL]){1}-([0-9])+$/", $_POST["numempleado"])){
            die(json_encode(array("error", "Por favor, escriba el número de empleado en el formato correcto")));
        }else{
            if($_POST["method"] == "store"){
                $query = $object ->_db->prepare("SELECT num_empleado from expedientes where num_empleado=:empleadonum");
				$query -> execute(array(":empleadonum" => $_POST["numempleado"]));
				$numempleadocount = $query->rowCount();
				if($numempleadocount > 0){
                    die(json_encode(array("error", "Este número de empleado ya existe, por favor, escriba otro")));
                }		
            }else if($_POST["method"] == "edit"){
                $query = $object ->_db->prepare("SELECT num_empleado from expedientes where num_empleado=:empleadonum and id!=:idexpediente");
				$query -> execute(array(":empleadonum" => $_POST["numempleado"], ":idexpediente" => $_POST["id_expediente"]));
				$numempleadocount = $query->rowCount();
				if($numempleadocount > 0){
                    die(json_encode(array("error", "Este número de empleado ya existe, por favor, escriba otro")));
                }
            }
            $num_empleado = $_POST["numempleado"];
        }
		
		//DEPARTAMENTO
				
		//PUESTO
		if(empty($_POST["puesto"])){
            die(json_encode(array("error", "Por favor, ingrese un puesto")));
        }else if(strlen($_POST["puesto"]) < 4){
            die(json_encode(array("error", "El puesto debe de contener 4 caracteres como mínimo")));
        }else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["puesto"])){
            die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el puesto")));
        }else{
			$puesto = $_POST["puesto"];
		}
		
		//NIVEL DE ESTUDIOS
		$nivelestudios_array = array("PRIMARIA", "SECUNDARIA", "BACHILLERATO", "CARRERA TECNICA", "LICENCIATURA", "ESPECIALIDAD", "MAESTRIA", "DOCTORADO");
		if (in_array($_POST["estudios"], $nivelestudios_array)) {
             $estudios = $_POST["estudios"];
        }else if(empty($_POST["estudios"])){
             $estudios = null;
        }else{
             die(json_encode(array("error", "El valor escogido en el dropdown de nivel de estudios está modificado, por favor, vuelva a poner el valor original en el dropdown")));
        }
		
		//CORREO ELECTRÓNICO
		
		//POSEE CORREO ELECTRÓNICO ADICIONAL?
		if($_POST["posee_correo"] == "si"){
			if(empty($_POST["correo_adicional"])){
				die(json_encode(array("error", "Por favor, ingrese un correo adicional")));
			}else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST["correo_adicional"])){
				die(json_encode(array("error", "Asegúrese que el texto ingresado en correo adicional este en formato de email")));
			}else{
				if($_POST["method"] == "store"){
					$get_correo = $object ->_db->prepare("SELECT correo_adicional from expedientes where correo_adicional=:correo1 UNION ALL SELECT correo from usuarios where correo=:correo2");
					$get_correo -> execute(array(':correo1' => $_POST["correo_adicional"], ':correo2' => $_POST["correo_adicional"]));
					$count_query = $get_correo -> rowCount();
					if($count_query > 0){
						die(json_encode(array("error", "El correo adicional ingresado ya existe, por favor, escriba otro")));
					}
				}else if($_POST["method"] == "edit"){
					$get_correo = $object -> _db -> prepare("SELECT correo_adicional from expedientes where correo_adicional=:correo1 AND id!=:idexpediente UNION ALL SELECT correo from usuarios where correo=:correo2");
					$get_correo -> execute(array(':correo1' => $_POST["correo_adicional"], ':idexpediente' => $_POST["id_expediente"], ':correo2' => $_POST["correo_adicional"]));
					$count_query = $get_correo -> rowCount();
					if($count_query > 0){
						die(json_encode(array("error", "El correo adicional ingresado ya existe, por favor, escriba otro")));
					}
				}
                $correo_adicional = $_POST["correo_adicional"];
			}
		}else{
			$correo_adicional = null;
		}
			
		/*
		=============================================
		TERMINA LA VALIDACIÓN DE LOS DATOS GENERALES
		=============================================
		*/
		
		

		/*
		===============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS ADICIONALES
		===============================================
		*/
			
		//CALLE	
		if(empty($_POST["calle"])){
			$calle = null;
		}else{
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["calle"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios en la calle")));
			}else{
				$calle = $_POST["calle"];
			}
		}
		
		//NÚMERO INTERIOR
		if(empty($_POST["ninterior"])){
			$ninterior = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["ninterior"])){
				die(json_encode(array("error", "Solo se permiten números en el número interior")));
			}else{
				$ninterior = $_POST["ninterior"];
			}
		}
		
		//NÚMERO EXTERIOR
		if(empty($_POST["nexterior"])){
			$nexterior = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["nexterior"])){
				die(json_encode(array("error", "Solo se permiten números en el número exterior")));
			}else{
				$nexterior = $_POST["nexterior"];
			}
		}
		
		
		//COLONIA	
		if(empty($_POST["colonia"])){
			$colonia = null;
		}else{
			if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\x{00C0}-\x{00FF}]+[?:\.|,]?)*$/u", $_POST["colonia"])){
				die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios en la colonbia")));
			}else{
				$colonia = $_POST["colonia"];
			}
		}
		
		//ESTADO
		if(empty($_POST["estado"])){
			$estado = null;
		}else{
			$retrieve_estados = $object -> _db -> prepare("SELECT id, nombre FROM estados");
			$retrieve_estados -> execute();
			$fetch_retrieve_estados = $retrieve_estados -> fetchAll(PDO::FETCH_KEY_PAIR);
			if (array_key_exists($_POST["estado"], $fetch_retrieve_estados)) {
				$array_key_state_value = $fetch_retrieve_estados[$_POST["estado"]];
				if(isset($_POST["estadotext"]) && $_POST['estadotext'] == $array_key_state_value){
					$estado = $_POST["estado"];
				}else{
					die(json_encode(array("error", "Por favor, asegúrese que el estado escogido se encuentre en el dropdown")));
				}
			}else{
				die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los estados registrados")));
			}
		}
		
		//MUNICIPIO
        if(empty($_POST["municipio"])){
			$municipio = null;
		}else if(empty($_POST["estado"]) && !(empty($_POST["municipio"]))){
			die(json_encode(array("error", "Por favor, seleccione un estado y luego un municipio")));
		}else{
			$retrieve_estados_municipio = $object -> _db -> prepare("SELECT id, nombre from municipios where estado=:estado");
			$retrieve_estados_municipio -> execute(array(':estado' => $_POST["estado"]));
			$count_retrieve_estados_municipio = $retrieve_estados_municipio -> rowCount();
			if($count_retrieve_estados_municipio > 0){
				$fetch_retrieve_estados_municipio = $retrieve_estados_municipio -> fetchAll(PDO::FETCH_KEY_PAIR);
				if (array_key_exists($_POST["municipio"], $fetch_retrieve_estados_municipio)) {
					$array_key_municipio_value = $fetch_retrieve_estados_municipio[$_POST["municipio"]];
					if(isset($_POST["municipiotext"]) && $_POST['municipiotext'] == $array_key_municipio_value){
						$municipio = $_POST["municipio"];
					}else{
						die(json_encode(array("error", "Por favor, asegúrese que el municipio escogido se encuentre en el dropdown")));
					}
				}else{
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los municipios registrados")));
				}
			}else{
				die(json_encode(array("error", "El estado elegido no tiene ningún municipio, el dropdown de municipios debe estar vacío")));
			}
		}
		
		//CÓDIGO POSTAL
        if(empty($_POST["codigo"])){
			$codigo = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["codigo"])){
				die(json_encode(array("error", "Solo se permiten números en el código postal")));
			}else{
				$codigo = $_POST["codigo"];
			}
		}
		
		//TELÉFONO DE DOMICILIO
        if(empty($_POST["teldom"])){
			$teldom= null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["teldom"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de domicilio")));
			}else{
				$teldom = $_POST["teldom"];
			}
		}
		
		//POSEE TELÉFONO MÓVIL PROPIO?
		if($_POST["posee_telmov"] == "si"){
			if(empty($_POST["telmov"])){
				die(json_encode(array("error", "Por favor, ingrese un teléfono móvil")));
			}else if(!preg_match("/^[0-9]*$/", $_POST["telmov"])){
				die(json_encode(array("error", "Solo se permiten números en el teléfono de móvil")));
			}else{
                $telmov = $_POST["telmov"];
            }
		}else{
			$telmov = null;
		}
			
		/*
		===============================================
		TERMINA LA VALIDACIÓN DE LOS DATOS ADICIONALES
		===============================================
		*/
		
		
		/*
		========================================================================
		EMPIEZA LA VALIDACIÓN DE LOS DISPOSITIVOS PROPORCIONADOS POR LA EMPRESA
		========================================================================
		*/
            
		//POSEE TELÉFONO ASIGNADO POR LA EMPRESA?
        if($_POST["posee_telempresa"] == "si"){
			if(empty($_POST["marcacion"])){
                die(json_encode(array("error", "Por favor, ingrese la marcación del teléfono asignado")));
            }else if(!preg_match("/^[0-9]*$/", $_POST["marcacion"])){
                die(json_encode(array("error", "Solo se permiten números en la marcación del teléfono asignado")));
            }else if(empty($_POST["serie"])){
                die(json_encode(array("error", "Por favor, ingrese la serie del teléfono asignado")));
            }else if(!preg_match("/^[\w]+$/i", $_POST["serie"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos en la serie del teléfono asignado")));
            }else if(empty($_POST["sim"])){
                die(json_encode(array("error", "Por favor, ingrese el sim del teléfono asignado")));
            }else if(!preg_match("/^[0-9]*$/", $_POST["sim"])){
                die(json_encode(array("error", "Solo se permiten números en el sim del teléfono asignado")));
            }else if(empty($_POST["numred"])){
                die(json_encode(array("error", "Por favor, ingrese el número de red del teléfono asignado")));
            }else if(!preg_match("/^[0-9]*$/", $_POST["numred"])){
                die(json_encode(array("error", "Solo se permiten números en el número de red del teléfono asignado")));
            }else if(empty($_POST["modelotel"])){
                die(json_encode(array("error", "Por favor, ingrese el modelo del teléfono asignado")));
            }else if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}])+([?:\s|\-|\_][a-zA-Z0-9\x{00C0}-\x{00FF}]+)*$/u", $_POST["modelotel"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, guiones intermedios y espacios en el modelo del teléfono asignado")));
             }else if(empty($_POST["marcatel"])){
                die(json_encode(array("error", "Por favor, ingrese la marca del teléfono asignado")));
             }else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["marcatel"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en la marca del teléfono asignado")));
             }else if(empty($_POST["imei"])){
                die(json_encode(array("error", "Por favor, ingrese el imei del teléfono asignado")));
             }else if(!preg_match("/^[0-9]*$/", $_POST["imei"])){
                die(json_encode(array("error", "Solo se permiten números en el imei del teléfono asignado")));
             }else{
                $marcacion = $_POST["marcacion"];
                $serie = $_POST["serie"];
                $sim = $_POST["sim"];
                $numred = $_POST["numred"];
                $modelotel = $_POST["modelotel"];
                $marcatel = $_POST["marcatel"];
                $imei = $_POST["imei"];
             }

		}else{
			    $marcacion = null;
                $serie = null;
                $sim = null;
                $numred = null;
                $modelotel = null;
                $marcatel = null;
                $imei = null;
		}
		
		//POSEE LAPTOP ASIGNADA POR LA EMPRESA?
        if($_POST["posee_laptop"] == "si"){
			if(empty($_POST["marca_laptop"])){
                die(json_encode(array("error", "Por favor, ingrese la marca de la laptop asignada")));
            }else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["marca_laptop"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en la marca de la laptop asignada")));
            }else if(empty($_POST["modelo_laptop"])){
                die(json_encode(array("error", "Por favor, ingrese el modelo de la laptop asignada")));
            }else if(!preg_match("/^([a-zA-Z0-9\x{00C0}-\x{00FF}])+([?:\s|\-|\_][a-zA-Z0-9\x{00C0}-\x{00FF}]+)*$/u", $_POST["modelo_laptop"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos, guiones intermedios y espacios en el modelo de la laptop asignada")));
            }else if(empty($_POST["serie_laptop"])){
                die(json_encode(array("error", "Por favor, ingrese la serie de la laptop asignada")));
            }else if(!preg_match("/^[\w]+$/i", $_POST["serie_laptop"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos en la serie de la laptop asignada")));
            }else{
                $marca_laptop = $_POST["marca_laptop"];
                $modelo_laptop = $_POST["modelo_laptop"];
                $serie_laptop = $_POST["serie_laptop"];
            }
		}else{
		    $marca_laptop = null;
            $modelo_laptop = null;
            $serie_laptop = null;
		}

        /*
		========================================================================
		TERMINA LA VALIDACIÓN DE LOS DISPOSITIVOS PROPORCIONADOS POR LA EMPRESA
		========================================================================
		*/
		
		/*
		==============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS RELEVANTES
		==============================================
		*/
		
		//CASA PROPIA
		$casa_propia = $_POST["radio"];
			
		//ESTADO CIVIL
		$estadocivil_array = array("SOLTERO", "CASADO", "DIVORCIADO", "UNION LIBRE");
		if (in_array($_POST["ecivil"], $estadocivil_array)) {
            $ecivil = $_POST["ecivil"];
        }else if(empty($_POST["ecivil"])){
            $ecivil = null;
        }else{
            die(json_encode(array("error", "El valor escogido en el dropdown de estado civil está modificado, por favor, vuelva a poner el valor original en el dropdown")));
        }
		
		//POSEE RETENCIÓN?
        if($_POST["posee_retencion"] == "si"){
			if(empty($_POST["monto_mensual"])){
                die(json_encode(array("error", "Por favor, ingrese el monto mensual")));
            }else if(!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["monto_mensual"])){
                die(json_encode(array("error", "Solo se permiten números y decimales en el monto mensual")));
            }else{
                $monto_mensual = $_POST["monto_mensual"];
            }
            
		}else{
		    $monto_mensual = null;
		}
		
		//FECHA DE NACIMIENTO
        if(empty($_POST["fechanac"])){
			$fechanac = null;
		}else{
			if(!preg_match("/^\d{4}\-\d{2}\-\d{2}$/", $_POST["fechanac"])){
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de nacimiento")));
			}else{
				$date_now = date("Y-m-d");    
                if ($_POST["fechanac"] > $date_now) {
                    die(json_encode(array("error", "Por favor, ingrese una fecha menor a la fecha de hoy")));
                }else{
                   $fechanac = $_POST["fechanac"];
                }
			}
		}
		
		//FECHA DE INICIO DE CONTRATO
        if(empty($_POST["fechacon"])){
			$fechacon = null;
		}else{
			if(!preg_match("/^\d{4}\-\d{2}\-\d{2}$/", $_POST["fechacon"])){
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de contrato")));
			}else{
				$fechacon = $_POST["fechacon"];
			}
		}

        //FECHA DE ALTA
        if(empty($_POST["fechaalta"])){
			$fechaalta = null;
		}else{
			if(!preg_match("/^\d{4}\-\d{2}\-\d{2}$/", $_POST["fechaalta"])){
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de alta")));
			}else{
				$fechaalta = $_POST["fechaalta"];
			}
		}
		
		//SALARIO AL INICIO DEL PERIODO DE PRUEBA
        if(empty($_POST["salario_contrato"])){
			$salario_contrato = null;
		}else{
			if(!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["salario_contrato"])){
				die(json_encode(array("error", "Solo se permiten números y decimales en el salario al inicio del periodo de prueba")));
			}else{
				$salario_contrato = $_POST["salario_contrato"];
			}
		}

        //SALARIO DESPUÉS DEL PERIODO DE PRUEBA
        if(empty($_POST["salario_fechaalta"])){
			$salario_fechaalta = null;
		}else{
			if(!preg_match("/^[1-9]\d*(\.\d+)?$/", $_POST["salario_fechaalta"])){
                die(json_encode(array("error", "Solo se permiten números y decimales en el salario después al periodo de prueba")));
			}else{
				$salario_fechaalta = $_POST["salario_fechaalta"];
			}
		}
		
		//OBSERVACIONES
		if(empty($_POST["observaciones"])){
			$observaciones = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["observaciones"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las observaciones")));
			}else{
				$observaciones = $_POST["observaciones"];
			}
		}
		
		//CURP
		if(empty($_POST["curp"])){
			$curp = null;
		}else{
			if(!preg_match("/^[\w]+$/i", $_POST["curp"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos en el curp")));
			}else{
				$curp= $_POST["curp"];
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
			if(!preg_match("/^[\w]+$/i", $_POST["rfc"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos en el rfc")));
			}else{
				$rfc = $_POST["rfc"];
			}
		}
		
		//TIPO DE IDENTIFICACIÓN Y NÚMERO DE IDENTIFICACIÓN
        if(empty($_POST["identificacion"]) && empty($_POST["numeroidentificacion"])){
            $identificacion = null;
            $numeroidentificacion = null;
        }else if(!(empty($_POST["identificacion"])) && empty($_POST["numeroidentificacion"])){
            die(json_encode(array("error", "Por favor, ingrese el número de identificación")));
        }else if(empty($_POST["identificacion"]) && !(empty($_POST["numeroidentificacion"]))){
            die(json_encode(array("error", "Por favor, eliga un tipo de identificación y después ingrese el número de identificación")));
        }else{
            if(!preg_match("/^[\w]+$/i", $_POST["numeroidentificacion"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos en el número de identificación")));
            }else{
                $identificacion = $_POST["identificacion"];
                $numeroidentificacion = $_POST["numeroidentificacion"];
            }
        }
		
		/*
		==============================================
		TERMINA LA VALIDACIÓN DE LOS DATOS RELEVANTES
		==============================================
		*/
		
		/*
		===============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS ADICIONALES
		===============================================
		*/

        if(!(empty($_POST["numeroreferenciaslab"]))){
            if(preg_match("/^\b[0-9]\b$/", $_POST["numeroreferenciaslab"])){
                if($_POST["numeroreferenciaslab"] != 0){
                    $referencias_decoded = json_decode($_POST["referencias"], true);
                    foreach($referencias_decoded as $referencia_laboral){
                         if(empty($referencia_laboral)){
                             die(json_encode(array("error", "El número de referencias laborales ingresado no coincide con el enviado, por favor, verifique la información")));
                         }
                    }
                    $referencias_contador = 1;
                    for($i=0; $i<$_POST["numeroreferenciaslab"]; $i++){
                        if(empty($referencias_decoded[$i]["nombre"] && $referencias_decoded[$i]["relacion"] && $referencias_decoded[$i]["telefono"])){
                            die(json_encode(array("error", "Existen campos vacíos en las referencias laborales, por favor, verifique la información")));
                        }else{
                                if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $referencias_decoded[$i]["nombre"])){
                                    die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre completo" .$referencias_contador. " de las referencias laborales")));
                                }else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $referencias_decoded[$i]["relacion"])){
                                    die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las relacion " .$referencias_contador. " de las referencias laborales")));
                                }else if(!preg_match("/^[0-9]*$/", $referencias_decoded[$i]["telefono"])){
                                    die(json_encode(array("error", "Solo se permiten números en el teléfono " .$referencias_contador. " de las referencias laborales")));
                                }
                        }
                        $referencias_contador++;
                    }
                    $referencias = $_POST["referencias"];
                }else{
                    $referencias = null;
                }
            }else{
                die(json_encode(array("error", "Solo se permiten números y de un solo dígito en el número de referencias laborales")));
            }
        }else{
            $referencias = null;
        }
        
		//FECHA DE ENTREGA DE UNIFORME
        if(empty($_POST["fechauniforme"])){
			$fechauniforme = null;
		}else{
			if(!preg_match("/^\d{4}\-\d{2}\-\d{2}$/", $_POST["fechauniforme"])){
				die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de entrega del uniforme")));
			}else{
				$fechauniforme = $_POST["fechauniforme"];
			}
		}
		
		//CANTIDAD UNIFORME
        if(empty($_POST["cantidadpolo"])){
			$cantidadpolo = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["cantidadpolo"])){
                die(json_encode(array("error", "Solo se permiten números en la cantidad entregada de uniformes")));
			}else{
				$cantidadpolo = $_POST["cantidadpolo"];
			}
		}
		
		//TALLA UNIFORME
        if(empty($_POST["tallapolo"])){
			$tallapolo = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["tallapolo"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en la talla de los uniformes")));
			}else{
				$tallapolo = $_POST["tallapolo"];
			}
		}
		
		//CONTACTO DE EMERGENCIA 1 - NOMBRE
        if(empty($_POST["emergencianom"])){
			$emergencianom = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el primer contacto de emergencia")));
			}else{
				$emergencianom = $_POST["emergencianom"];
			}
		}
		
		//CONTACTO DE EMERGENCIA 1 - PARENTESCO
        if(empty($_POST["emergenciaparentesco"])){
			$emergenciaparentesco = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaparentesco"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el parentesco del primer contacto de emergencia")));
			}else{
				$emergenciaparentesco = $_POST["emergenciaparentesco"];
			}
		}

        //CONTACTO DE EMERGENCIA 1 - TELÉFONO
        if(empty($_POST["emergenciatel"])){
			$emergenciatel = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatel"])){
                die(json_encode(array("error", "Solo se permiten números en el teléfono del primer contacto de emergencia")));
			}else{
				$emergenciatel = $_POST["emergenciatel"];
			}
		}
		
		//CONTACTO DE EMERGENCIA 2 - NOMBRE
        if(empty($_POST["emergencianom2"])){
			$emergencianom2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergencianom2"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre del segundo contacto de emergencia")));
			}else{
				$emergencianom2 = $_POST["emergencianom2"];
			}
		}

        //CONTACTO DE EMERGENCIA 2 - PARENTESCO
        if(empty($_POST["emergenciaparentesco2"])){
			$emergenciaparentesco2 = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["emergenciaparentesco2"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el parentesco del segundo contacto de emergencia")));
			}else{
				$emergenciaparentesco2 = $_POST["emergenciaparentesco2"];
			}
		}

        //CONTACTO DE EMERGENCIA 2 - TELÉFONO
        if(empty($_POST["emergenciatel2"])){
			$emergenciatel2 = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["emergenciatel2"])){
                die(json_encode(array("error", "Solo se permiten números en el teléfono del segundo contacto de emergencia")));
			}else{
				$emergenciatel2 = $_POST["emergenciatel2"];
			}
		}
		
		//CAPACITACIÓN
        if(empty($_POST["capacitacion"])){
			$capacitacion = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["capacitacion"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el campo de la capacitación")));
			}else{
				$capacitacion = $_POST["capacitacion"];
			}
		}

        //RESULTADO ANTIDOPING
        if(empty($_POST["antidoping"])){
			$antidoping = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["antidoping"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el campo del resultado antidoping")));
			}else{
				$antidoping = $_POST["antidoping"];
			}
		}

		//TIPO DE SANGRE
		$tiposangre_array = array("A_POSITIVO", "A_NEGATIVO", "B_POSITIVO", "B_NEGATIVO", "AB_POSITIVO", "AB_NEGATIVO", "O_POSITIVO", "O_NEGATIVO");
		if(in_array($_POST["tipo_sangre"], $tiposangre_array)) {
			$tipo_sangre = $_POST["tipo_sangre"];
		}else if(empty($_POST["tipo_sangre"])){
			$tipo_sangre = null;
		}else{
			die(json_encode(array("error", "El valor escogido en el dropdown de nivel de tipo de sangre está modificado, por favor, vuelva a poner el valor original en el dropdown")));
		}

        //VACANTE
        if(empty($_POST["vacante"])){
			$vacante = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["vacante"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el campo de la vacante")));
			}else{
				$vacante = $_POST["vacante"];
			}
		}
		
		//POSEE FAMILIAR EN LA EMPRESA
        if($_POST["radio2"] == "si"){
			if(empty($_POST["nomfam"])){
                die(json_encode(array("error", "Por favor, ingrese el nombre completo del familiar en la empresa")));
            }else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["nomfam"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre completo del familiar en la empresa")));
            }else{
                $nomfam = $_POST["nomfam"];
            }
            
		}else{
		    $nomfam = null;
		}
		

        /*
		===============================================
		TERMINA LA VALIDACIÓN DE LOS DATOS ADICIONALES
		===============================================
		*/
		
		/*
		=============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS BANCARIOS
		=============================================
		*/

        //REFERENCIAS BANCARIAS
        if(!(empty($_POST["numeroreferenciasban"]))){
            if(preg_match("/^\b[0-9]\b$/", $_POST["numeroreferenciasban"])){
                if($_POST["numeroreferenciasban"] != 0){
                    $referenciasbancarias_decoded = json_decode($_POST["refbanc"], true);
                    foreach($referenciasbancarias_decoded as $referencia_bancaria){
                         if(empty($referencia_bancaria)){
                             die(json_encode(array("error", "El número de referencias bancarias ingresado no coincide con el enviado, por favor, verifique la información")));
                         }
                    }
                    $referenciasban_contador = 1;
                    for($i=0; $i<$_POST["numeroreferenciasban"]; $i++){
                        if(empty($referenciasbancarias_decoded[$i]["nombre"] && $referenciasbancarias_decoded[$i]["relacion"] && $referenciasbancarias_decoded[$i]["rfc"] && $referenciasbancarias_decoded[$i]["curp"] && $referenciasbancarias_decoded[$i]["porcentaje"])){
                            die(json_encode(array("error", "Existen campos vacíos en las referencias bancarias, por favor, verifique la información")));
                        }else{
                                if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+(?:[-'\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $referenciasbancarias_decoded[$i]["nombre"])){
                                    die(json_encode(array("error", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios en el nombre completo" .$referenciasban_contador. " de las referencias bancarias")));
                                }else if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $referenciasbancarias_decoded[$i]["relacion"])){
                                    die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en las relacion " .$referenciasban_contador. " de las referencias bancarias")));
                                }else if(!preg_match("/^[\w]+$/i", $referenciasbancarias_decoded[$i]["rfc"])){
                                    die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos en el rfc " .$referenciasban_contador. " de las referencias bancarias")));
                                }else if(!preg_match("/^[\w]+$/i", $referenciasbancarias_decoded[$i]["curp"])){
                                    die(json_encode(array("error", "Solo se permiten carácteres alfanúmericos en el curp " .$referenciasban_contador. " de las referencias bancarias")));
                                }else if(!preg_match("/^[0-9]*$/", $referenciasbancarias_decoded[$i]["porcentaje"])){
                                    die(json_encode(array("error", "Solo se permiten números en el porcentaje de derecho " .$referenciasban_contador. " de las referencias bancarias")));
                                }
                        }
                        $referenciasban_contador++;
                    }
                    $refbanc = $_POST["refbanc"];
                }else{
                    $refbanc = null;
                }
            }else{
                die(json_encode(array("error", "Solo se permiten números y de un solo dígito en el número de referencias bancarias")));
            }
        }else{
            $refbanc = null;
        }
		
		//BANCO PERSONAL
        if(empty($_POST["banco_personal"])){
			$banco_personal = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_personal"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco personal")));
			}else{
				$banco_personal = $_POST["banco_personal"];
			}
		}

		//CUENTA PERSONAL
        if(empty($_POST["cuenta_personal"])){
			$cuenta_personal = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["cuenta_personal"])){
                die(json_encode(array("error", "Solo se permiten números en la cuenta personal")));
			}else if(strlen($_POST["cuenta_personal"]) < 10){	
				die(json_encode(array("error", "La cuenta personal no puede ser menor a 10 dígitos")));
			}else if(strlen($_POST["cuenta_personal"]) > 10){	
				die(json_encode(array("error", "La cuenta personal no puede ser mayor a 10 dígitos")));
			}else{
				$cuenta_personal = $_POST["cuenta_personal"];
			}
		}

        //CLABE PERSONAL
        if(empty($_POST["clabe_personal"])){
			$clabe_personal = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["clabe_personal"])){
                die(json_encode(array("error", "Solo se permiten números en la clabe personal")));
			}else if(strlen($_POST["clabe_personal"]) < 18){
				die(json_encode(array("error", "La clabe personal no puede ser menor a 18 dígitos")));
			}else if(strlen($_POST["clabe_personal"]) > 18){	
				die(json_encode(array("error", "La clabe personal no puede ser mayor a 18 dígitos")));	
			}else{
				$clabe_personal = $_POST["clabe_personal"];
			}
		}

		//PLÁSTICO PERSONAL
		if(empty($_POST["plastico_personal"])){
			$plastico_personal = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["plastico_personal"])){
				die(json_encode(array("error", "Solo se permiten números en el plástico personal de la cuenta personal bancaria")));
			}else if(strlen($_POST["plastico_personal"]) < 16){	
				die(json_encode(array("error", "La plástico asignado personal no puede ser menor a 16 dígitos")));
			}else if(strlen($_POST["plastico_personal"]) > 16){	
				die(json_encode(array("error", "La plástico asignado personal no puede ser mayor a 16 dígitos")));
			}else{
				$plastico_personal = $_POST["plastico_personal"];
			}
		}

        //BANCO NÓMINA
        if(empty($_POST["banco_nomina"])){
			$banco_nomina = null;
		}else{
			if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["banco_nomina"])){
                die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el banco asignado por la empresa")));
			}else{
				$banco_nomina = $_POST["banco_nomina"];
			}
		}

		//CUENTA NÓMINA
        if(empty($_POST["cuenta_nomina"])){
			$cuenta_nomina = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["cuenta_nomina"])){
                die(json_encode(array("error", "Solo se permiten números en la cuenta asignada por la empresa")));
			}else if(strlen($_POST["cuenta_nomina"]) < 10){	
				die(json_encode(array("error", "La cuenta de nómina no puede ser menor a 10 dígitos")));
			}else if(strlen($_POST["cuenta_nomina"]) > 10){	
				die(json_encode(array("error", "La cuenta de nómina no puede ser mayor a 10 dígitos")));
			}else{
				$cuenta_nomina = $_POST["cuenta_nomina"];
			}
		}

        //CLABE NÓMINA
        if(empty($_POST["clabe_nomina"])){
			$clabe_nomina = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["clabe_nomina"])){
                die(json_encode(array("error", "Solo se permiten números en la clabe asignada por la empresa")));
			}else if(strlen($_POST["clabe_nomina"]) < 18){
				die(json_encode(array("error", "La clabe de nómina no puede ser menor a 18 dígitos")));
			}else if(strlen($_POST["clabe_nomina"]) > 18){	
				die(json_encode(array("error", "La clabe de nómina no puede ser mayor a 18 dígitos")));
			}else{
				$clabe_nomina = $_POST["clabe_nomina"];
			}
		}

        //PLÁSTICO ASIGNADO
        if(empty($_POST["plastico"])){
			$plastico = null;
		}else{
			if(!preg_match("/^[0-9]*$/", $_POST["plastico"])){
                die(json_encode(array("error", "Solo se permiten números en el plástico asignado por la empresa")));
			}else if(strlen($_POST["plastico"]) < 16){	
				die(json_encode(array("error", "La plástico asignado de nómina no puede ser menor a 16 dígitos")));
			}else if(strlen($_POST["plastico"]) > 16){	
				die(json_encode(array("error", "La plástico asignado de nómina no puede ser mayor a 16 dígitos")));
			}else{
				$plastico = $_POST["plastico"];
			}
		}
		
        /*
		=============================================
		TERMINA LA VALIDACIÓN DE LOS DATOS BANCARIOS
		=============================================
		*/
		
		/*
		===============================================
		EMPIEZA LA VALIDACIÓN DE LA PAPELERÍA RECIBIDA
		===============================================
		*/

        //DOCUMENTOS
        $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
        $checktipospapeleria -> execute();
        $counttipospapeleria = $checktipospapeleria -> rowCount();
        if($counttipospapeleria > 0){
            $fetchtipopapeleria = $checktipospapeleria -> fetchAll(PDO::FETCH_ASSOC);
            $arraypapeleria = [];
            for($i = 1; $i <= $counttipospapeleria; $i++){
                if(isset($_FILES['papeleria'.$i.'']['name'])){
                    $allowed = array('jpeg', 'png', 'jpg', 'pdf');
                    $filename = $_FILES['papeleria'.$i.'']['name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!in_array($ext, $allowed)) {
                        die(json_encode(array("error", "Solo se permite jpg, jpeg, pngs y pdfs en " .$fetchtipopapeleria[$i]["nombre"])));
                    }else if($_FILES['papeleria'.$i.'']['size'] > 10485760){
                        die(json_encode(array("error", "El archivo debe pesar ser menos de 10 MB en " .$fetchtipopapeleria[$i]["nombre"])));
                    }else{
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mimetype = finfo_file($finfo, $_FILES['papeleria'.$i.'']["tmp_name"]);
                        finfo_close($finfo);
                        if($mimetype != "image/jpeg" && $mimetype != "image/png" && $mimetype != "application/pdf"){
                            die(json_encode(array("error", "Por favor, asegurese que la imagen sea originalmente un archivo png, jpg, jpeg y pdf en " .$fetchtipopapeleria[$i]["nombre"])));
                        }
                        $arraypapeleria[$i] = $_FILES['papeleria'.$i.''];
                    }
                }else{
                    $arraypapeleria[$i] = null;
                }
            }
        }

        /*
		===============================================
		TERMINA LA VALIDACIÓN DE LA PAPELERÍA RECIBIDA
		===============================================
		*/
		
		switch($_POST["method"]){
            case "store":
                $expediente = new Expedientes($num_empleado, $puesto, $estudios, $_POST["posee_correo"], $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $_POST["posee_telmov"], $telmov, $_POST["posee_telempresa"], $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $_POST["posee_laptop"], $marca_laptop, $modelo_laptop, $serie_laptop, $casa_propia, $ecivil, $_POST["posee_retencion"], $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $tipo_sangre, $vacante, $_POST["radio2"], $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $refbanc, $arraypapeleria);
                $expediente ->Crear_expediente($select2, $_POST["logged_user"]);
                die(json_encode(array("success", "Se ha creado un expediente")));
            break;
            case "edit":
                //SITUACIÓN, ESTATUS EMPLEADO Y MOTIVO
                $situacion_array = array("ALTA", "BAJA");
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
                    }else if($_POST["situacion"] == "BAJA"){
                        $estatus_array = array("FALLECIMIENTO", "ABANDONO DE TRABAJO", "RENUNCIA VOLUNTARIA", "LIQUIDACION");
                        if (in_array($_POST["estatus_empleado"], $estatus_array)) {
                            if($_POST["estatus_empleado"] == "ABANDONO DE TRABAJO" || $_POST["estatus_empleado"] == "RENUNCIA VOLUNTARIA" || $_POST["estatus_empleado"] == "LIQUIDACION"){
                                if(empty($_POST["motivo_estatus"])){
                                    die(json_encode(array("error", "El campo motivo del estatus es requerido")));
                                }else{
                                    if(!preg_match("/^[a-zA-Z\x{00C0}-\x{00FF}]+([\s][a-zA-Z\x{00C0}-\x{00FF}]+)*$/u", $_POST["motivo_estatus"])){
                                        die(json_encode(array("error", "Solo se permiten carácteres alfabéticos y espacios en el motivo del estatus")));
                                    }else{
                                        $situacion = $_POST["situacion"];
                                        $estatus_empleado = $_POST["estatus_empleado"];
                                        $motivo = $_POST["motivo_estatus"];
                                    }
                                }
                            }else{
                                $situacion = $_POST["situacion"];
                                $estatus_empleado = $_POST["estatus_empleado"];
                                $motivo = null;
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
                    if(!preg_match("/^\d{4}\-\d{2}\-\d{2}$/", $_POST["estatus_fecha"])){
                        die(json_encode(array("error", "Por favor, ingrese una fecha válida en la fecha de estatus")));
                    }else{
                        $estatus_fecha = $_POST["estatus_fecha"];
                    }
                }
                $delete_array = explode(",", $_POST["delete_array"]);
                $expediente = new Expedientes($num_empleado, $puesto, $estudios, $_POST["posee_correo"], $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $_POST["posee_telmov"], $telmov, $_POST["posee_telempresa"], $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $_POST["posee_laptop"], $marca_laptop, $modelo_laptop, $serie_laptop, $casa_propia, $ecivil, $_POST["posee_retencion"], $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $tipo_sangre, $vacante, $_POST["radio2"], $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $refbanc, $arraypapeleria);
                $expediente ->Editar_expediente($select2, $_POST["id_expediente"], $delete_array, $situacion, $estatus_empleado, $estatus_fecha, $motivo, $_POST["logged_user"]);
                die(json_encode(array("success", "Se ha editado un expediente")));
            break;
        }
	}
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
}else if(isset($_POST["app"]) && $_POST["app"] == "solicitud_incidencia"){
    if(isset($_POST["estatus"]) && isset($_POST["incidenciaid"]) && isset($_POST["method"])){
		$incidenciaid= $_POST["incidenciaid"];
		
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
		$select_user = $object -> _db -> prepare("SELECT nombre, apellido_pat, apellido_mat FROM usuarios WHERE id=:iduser");
		$select_user -> execute(array(':iduser' => $_SESSION["id"]));
        $fetch_user = $select_user -> fetch(PDO::FETCH_OBJ);
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
                Incidencias::Almacenar_estatus($incidenciaid, $estatus, $sueldo, $fetch_user -> nombre, $fetch_user -> apellido_pat, $fetch_user -> apellido_mat, $comentario);
                die(json_encode(array("success")));
            break;
        }
    }
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
}else if(isset($_POST["app"]) && $_POST["app"] == "Vacaciones"){
	if(isset($_POST["periodo_vacaciones"]) && isset($_POST["method"])){
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

		function check_negative($value){
			if (isset($value)){
				if (substr(strval($value), 0, 1) == "-"){
					return true;
				}else{
					return false;
				}
			}
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
		$hoy =  date("Y-m-d");

		$d1 = new DateTime($hoy);
		$d2 = new DateTime($fecha_estatus);
		$diff = $d2->diff($d1);
		if($diff->y == 0) {
			$vacaciones = 0;
		}else if($diff->y == 1) {
			$vacaciones=12;
		}else if($diff->y == 2){
			$vacaciones=14;
		}else if($diff->y == 3){
			$vacaciones=16;
		}else if($diff->y == 4){
			$vacaciones=18;
		}else if($diff->y == 5){
			$vacaciones=20;
		}else{
			$acum=6;
			$acum2=10;
			$vacaciones=20;
			$counter=0;
			do {
				if(($acum > $diff->y) && ($diff->y < $acum2)){
					$counter++;
				}else{
					$vacaciones = $vacaciones + 2;
					$acum = $acum + 5;
					$acum2 = $acum2 + 5;
				}
			} while($counter <= 1);
		}

		//Se calculan los días ya usados y se obtienen las vacaciones restantes
		$check_solicitudes_vacaciones = $object -> _db -> prepare("SELECT COALESCE(SUM(dias_solicitados),0) AS dias_solicitados FROM solicitud_vacaciones where users_id=:userid AND (estatus=4 OR estatus=1)");
		$check_solicitudes_vacaciones -> execute(array(':userid' => $_SESSION["id"]));
		$fetch_sum_vacaciones = $check_solicitudes_vacaciones -> fetch(PDO::FETCH_OBJ);

		$dias_restantes = $vacaciones - $fetch_sum_vacaciones -> dias_solicitados;
		$dias_restantes = $dias_restantes - $days;

		if(check_negative($dias_restantes)){
			die(json_encode(array("error", "El número de días solicitados sobrepasa el número de vacaciones restantes")));
		}


		switch($_POST["method"]){
            case "store":
                $vacas = new Vacaciones($periodo_vacaciones);
                $vacas->CrearSolicitudVacaciones($_SESSION['id'], $days, $jefe_array);
				$check_update_vacaciones = $object -> _db -> prepare("SELECT COALESCE(SUM(dias_solicitados),0) AS dias_solicitados FROM solicitud_vacaciones where users_id=:userid AND (estatus=4 OR estatus=1)");
				$check_update_vacaciones -> execute(array(':userid' => $_SESSION["id"]));
				$fetch_update_sum_vacaciones = $check_update_vacaciones -> fetch(PDO::FETCH_OBJ);
				$new_dias_restantes = $vacaciones - $fetch_update_sum_vacaciones -> dias_solicitados;
                die(json_encode(array("success", "Se ha subido su solicitud de vacaciones!", $new_dias_restantes)));
            break;
        }
	}
}else if(isset($_POST["app"]) && $_POST["app"] == "solicitud_vacaciones"){
    if(isset($_POST["solicitud_vacaciones"]) && isset($_POST["estatus"]) && isset($_POST["method"])){
		//Checar si la solicitud existe
		$check_request = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones WHERE id=:solicitudid");
		$check_request -> execute(array(':solicitudid' => $_POST["solicitud_vacaciones"]));
		$count_request = $check_request -> rowCount();
		if($count_request == 0){
			die(json_encode(array("failed", "Esta solicitud no existe!")));
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
		
		//Obtener el nombre completo del usuario
		$nombre_completo = $_SESSION["nombre"]. " " .$_SESSION["apellidopat"]. " " .$_SESSION["apellidomat"];
		
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
                Vacaciones::Almacenar_estatus($solicitud_vacaciones, $estatus, $nombre_completo, $comentario);
                die(json_encode(array("success")));
            break;
        }
    }
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
}else if(isset($_POST["app"]) && $_POST["app"] == "editStatus"){
	if(isset($_POST["estatus"], $_POST["sueldo"], $_POST["comentarios"], $_POST["id"])){
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
		
		//Obtener el nombre completo del usuario
		$nombre_completo = $_SESSION["nombre"]. " " .$_SESSION["apellidopat"]. " " .$_SESSION["apellidomat"];
		
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

		Incidencias::editStatus($id, $estatus, $sueldo, $comentarios, $nombre_completo);
        die(json_encode(array("success", "Se ha editado el estatus de la incidencia!")));
	}
}else if(isset($_POST["app"]) && $_POST["app"] == "editStatus_vacaciones"){
	if(isset($_POST["estatus_vacaciones"], $_POST["comentarios_vacaciones"], $_POST["id"])){
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
		
		//Obtener el nombre completo del usuario
		$nombre_completo = $_SESSION["nombre"]. " " .$_SESSION["apellidopat"]. " " .$_SESSION["apellidomat"];
		
		if(empty($_POST["comentarios_vacaciones"])){
			die(json_encode(array("error", "Los comentarios no pueden estar vacíos")));
		}else{
			if(!preg_match("/^(.|\s)*[a-zA-Z]+(.|\s)*$/u", $_POST["comentarios_vacaciones"])){
				die(json_encode(array("error", "Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra")));
			}else{
				$comentarios_vacaciones = $_POST["comentarios_vacaciones"];
			}
		}

		Vacaciones::editStatus($id, $estatus_vacaciones, $comentarios_vacaciones, $nombre_completo);
        die(json_encode(array("success", "Se ha editado el estatus de la solicitud de vacaciones!")));
	}
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
}
?>
