<?php
include_once __DIR__ . "/../classes/user.php";
include_once __DIR__ . "/../classes/permissions.php";
include_once __DIR__ . "/../classes/roles.php";
include_once __DIR__ . "/../classes/departamentos.php";
include_once __DIR__ . "/../classes/expedientes.php";
include_once __DIR__ . "/../classes/incidencias.php";
include_once __DIR__ . "/../classes/categorias.php";
include_once __DIR__ . "/../classes/subroles.php";
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
    $_POST["antidoping"], $_POST["vacante"], $_POST["radio2"], $_POST["nomfam"], $_POST["numeroreferenciasban"], $_POST["banco_personal"], 
    $_POST["cuenta_personal"], $_POST["clabe_personal"], $_POST["banco_nomina"], $_POST["cuenta_nomina"], $_POST["clabe_nomina"], 
    $_POST["plastico"], $_POST["method"])){
        
        //CHECA SI EL EXPEDIENTE EXISTE
        if($_POST["method"] == "edit"){
            $expediente_check = $object -> _db -> prepare("SELECT * FROM expedientes where id=:expedienteid");
            $expediente_check -> execute(array(':expedienteid' => $_POST["id_expediente"]));
            $count_expediente_check = $expediente_check -> rowCount();
            if($count_expediente_check == 0){
                die(json_encode(array("expediente_deleted", "Este expediente ya no existe!")));
            }
        }
		
		/*
		=============================================
		EMPIEZA LA VALIDACIÓN DE LOS DATOS GENERALES
		=============================================
		*/
		
		//SELECT2
		if($_POST["select2"] != null && $_POST["select2text"] != null){
			$check_select2_session = $object -> _db -> prepare("SELECT roles_id FROM usuarios WHERE id=:userid");
			$check_select2_session -> execute(array(':userid' => $_POST["select2"]));
			$fetch_select2_session = $check_select2_session -> fetch(PDO::FETCH_OBJ);
			
			if($fetch_select2_session -> roles_id != "Superadministrador" && $fetch_select2_session -> roles_id != "Administrador" && $fetch_select2_session -> roles_id != "Usuario externo" && $fetch_select2_session -> roles_id != null){
			
				$select2_content = $object -> _db -> prepare("SELECT id, concat(nombre,' ',apellido_pat,' ',apellido_mat) AS nombre FROM usuarios");
				$select2_content -> execute();
				$fetch_select2_content = $select2_content -> fetchAll(PDO::FETCH_KEY_PAIR);
				
				$key_select2 = array_search($_POST['select2text'], $fetch_select2_content);
				
				if ($key_select2 !== false) {
					if($key_select2 != $_POST["select2"]){
						die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los usuarios registrados")));
					}
				}else{
					die(json_encode(array("error", "Por favor, asegurese que el usuario escogido se encuentre en el dropdown")));
				}
				$select2 = $_POST["select2"];
			}else{
				die(json_encode(array("error", "Este tipo de usuario no pueden tener expedientes")));
			}
		}else{
			die(json_encode(array("error", "Debe asignar un usuario al expediente")));
		}
		
		//NÚM. EMPLEADO
		if(empty($_POST["numempleado"])){
            die(json_encode(array("error", "Por favor, ingrese un número de empleado")));
        }else if(!preg_match("/^([RL]){1}-([0-9])+$/", $_POST["numempleado"])){
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
					$get_correo -> execute(array(':correo' => $_POST["correo_adicional"], ':idexpediente' => $_POST["id_expediente"], ':correo2' => $_POST["correo_adicional"]));
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
			$key_retrieve_estados = array_search($_POST['estadotext'], $fetch_retrieve_estados);
				
			if ($key_retrieve_estados !== false) {
				if($key_retrieve_estados != $_POST["estado"]){
					die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los estados registrados")));
				}
			}else{
				die(json_encode(array("error", "Por favor, asegurese que el estado escogido se encuentre en el dropdown")));
			}
			$estado = $_POST["estado"];
		
		}
		
		//MUNICIPIO
        if(empty($_POST["estado"]) && empty($_POST["municipio"])){
			$municipio = null;
        }else if(!(empty($_POST["estado"])) && empty($_POST["municipio"])){
            die(json_encode(array("error", "Por favor, seleccione un municipio")));
        }else if(empty($_POST["estado"]) && !(empty($_POST["municipio"]))){
            die(json_encode(array("error", "Por favor, seleccione un estado y luego un municipio")));
        }else{
            $retrieve_estados_municipio = $object -> _db -> prepare("SELECT id, nombre from municipios where estado=:estado");
            $retrieve_estados_municipio -> execute(array(':estado' => $_POST["estado"]));
            $count_retrieve_estados_municipio = $retrieve_estados_municipio -> rowCount();
            if($count_retrieve_estados_municipio > 0){
                $fetch_retrieve_estados_municipio = $retrieve_estados_municipio -> fetchAll(PDO::FETCH_KEY_PAIR);
                $key_retrieve_estados_municipio = array_search($_POST['municipiotext'],  $fetch_retrieve_estados_municipio);
				
			    if ($key_retrieve_estados_municipio !== false) {
				    if($key_retrieve_estados_municipio != $_POST["municipio"]){
					    die(json_encode(array("error", "El id seleccionado no coincide con ninguno de los municipios registrados")));
				    }
			    }else{
				    die(json_encode(array("error", "Por favor, asegurese que el municipio escogido se encuentre en el dropdown")));
			    }
                $municipio = $_POST["municipio"];
            }else{
                die(json_encode(array("error", "No se encontró el estado ó el estado no existe ó el estado no tiene municipios, por favor, eliga otro estado")));
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
			}else{
				$clabe_personal = $_POST["clabe_personal"];
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
                $expediente = new Expedientes($num_empleado, $puesto, $estudios, $_POST["posee_correo"], $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $_POST["posee_telmov"], $telmov, $_POST["posee_telempresa"], $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $_POST["posee_laptop"], $marca_laptop, $modelo_laptop, $serie_laptop, $casa_propia, $ecivil, $_POST["posee_retencion"], $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $vacante, $_POST["radio2"], $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $refbanc, $arraypapeleria);
                $expediente ->Crear_expediente($select2);
                die(json_encode(array("success", "Se ha creado un expediente")));
            break;
            case "edit":
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
                $expediente = new Expedientes($num_empleado, $puesto, $estudios, $_POST["posee_correo"], $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $_POST["posee_telmov"], $telmov, $_POST["posee_telempresa"], $marcacion, $serie, $sim, $numred, $modelotel, $marcatel, $imei, $_POST["posee_laptop"], $marca_laptop, $modelo_laptop, $serie_laptop, $casa_propia, $ecivil, $_POST["posee_retencion"], $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $vacante, $_POST["radio2"], $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $refbanc, $arraypapeleria);
                $expediente ->Editar_expediente($select2, $id_expediente, $situacion, $estatus_empleado, $motivo_estatus, $fecha_estatus);
                die(json_encode(array("success", "Se ha editado un expediente")));
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
}
?>