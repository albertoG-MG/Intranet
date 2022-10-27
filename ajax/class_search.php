<?php
include_once __DIR__ . "/../classes/user.php";
include_once __DIR__ . "/../classes/permissions.php";
include_once __DIR__ . "/../classes/roles.php";
include_once __DIR__ . "/../classes/departamentos.php";
include_once __DIR__ . "/../classes/expedientes.php";
include_once __DIR__ . "/../classes/incidencias.php";
include_once __DIR__ . "/../classes/categorias.php";
include_once __DIR__ . "/../config/conexion.php";
$object = new connection_database();


if(isset($_POST["app"]) && $_POST["app"] == "usuario"){
    if(isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido_pat"]) && isset($_POST["apellido_mat"]) && isset($_POST["correo"]) && isset($_POST["method"])){
        $username = $_POST["usuario"];
        
        if($_POST["method"] == "store"){
            $password = sha1($_POST["password"]);
        }else if ($_POST["method"] == "edit"){
            if(!(empty($_POST["password"]))){
                $password = sha1($_POST["password"]); 
            }else{
                $retrieve_password = $object -> _db -> prepare("SELECT * FROM usuarios where id=:editarid");
                $retrieve_password -> bindParam('editarid', $_POST["editarid"], PDO::PARAM_INT);
                $retrieve_password -> execute();
                $retrieved = $retrieve_password -> fetch(PDO::FETCH_OBJ);
                $password = $retrieved -> password;
            }
        }

        $nombre = $_POST["nombre"];
        $apellido_pat = $_POST["apellido_pat"];
        $apellido_mat = $_POST["apellido_mat"];
        $correo = $_POST["correo"];
        $departamento = null;
        $roles=null;
        $filename=null;
        $foto=null;

        if(!(empty($_POST["departamento"]))){
            $departamento = $_POST["departamento"];
        }

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
                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $departamento, $roles, $filename, $foto);
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
                    $user = new User($username, $nombre, $apellido_pat, $apellido_mat, $correo, $password, $departamento, $roles, $filename, $foto);
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
                $expediente = new Expedientes($numempleado, $puesto, $estudios, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $posee_telempresa, $marcacion, $serie, $sim, $radio, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $vacante, $radio2, $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $refbanc, $arraypapeleria);
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
                $expediente = new Expedientes($numempleado, $puesto, $estudios, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $posee_telempresa, $marcacion, $serie, $sim, $radio, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $salario_contrato, $salario_fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $vacante, $radio2, $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $banco_nomina, $cuenta_nomina, $clabe_nomina, $plastico, $refbanc, $arraypapeleria);
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
                exit("success");
			break;
			case "edit":
                $incidenciaid = $_POST["editarid"];
                $incidencia = new Incidencias($titulo, $fechainicio, $fechafin, $tipo, $descripcion, $filename, $foto);
                $incidencia->EditarIncidencias($incidenciaid);
                exit("success");
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
        switch($_POST["method"]){
            case "store":
                Incidencias::Almacenar_estatus($incidenciaid, $estatus, $sueldo, $fetch_user -> nombre, $fetch_user -> apellido_pat, $fetch_user -> apellido_mat);
                exit("success");
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
}
?>