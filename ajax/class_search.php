<?php
include_once __DIR__ . "/../classes/user.php";
include_once __DIR__ . "/../classes/permissions.php";
include_once __DIR__ . "/../classes/roles.php";
include_once __DIR__ . "/../classes/departamentos.php";
include_once __DIR__ . "/../classes/expedientes.php";
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
                if(isset($_POST["editarid"])){
                    $id = $_POST["editarid"];
                    $rol = new Roles($roles, $permissions);
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
        if(!(empty($_POST["telmov"]))){
            $telmov = $_POST["telmov"];
        }else{
            $telmov = null;
        }
        if(!(empty($_POST["radio"]))){
            $radio = $_POST["radio"];
        }else{
            $radio = null;
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
        if(!(empty($_POST["emergenciatel"]))){
            $emergenciatel = $_POST["emergenciatel"];
        }else{
            $emergenciatel = null;
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
        if(!(empty($_POST["refbanc"]))){
            $refbanc = $_POST["refbanc"];
        }
        if(!(empty($_FILES['infp_curriculum']['name']))){
            $p_curriculum = $_FILES["infp_curriculum"];
        }else{
            $p_curriculum = null;
        }
        if(!(empty($_FILES['infp_evaluacion']['name']))){
            $p_evaluacion = $_FILES["infp_evaluacion"];
        }else{
            $p_evaluacion = null;
        }
        if(!(empty($_FILES['infp_nacimiento']['name']))){
            $p_nacimiento = $_FILES["infp_nacimiento"];
        }else{
            $p_nacimiento = null;
        }
        if(!(empty($_FILES['infp_curp']['name']))){
            $p_curp = $_FILES["infp_curp"];
        }else{
            $p_curp = null;
        }
        if(!(empty($_FILES['infp_identificacion']['name']))){
            $p_identificacion = $_FILES["infp_identificacion"];
        }else{
            $p_identificacion = null;
        }
        if(!(empty($_FILES['infp_comprobante']['name']))){
            $p_comprobante = $_FILES["infp_comprobante"];
        }else{
            $p_comprobante = null;
        }
        if(!(empty($_FILES['infp_rfc']['name']))){
            $p_rfc = $_FILES["infp_rfc"];
        }else{
            $p_rfc = null;
        }
        if(!(empty($_FILES['infp_cartal']['name']))){
            $p_cartal = $_FILES["infp_cartal"];
        }else{
            $p_cartal = null;
        }
        if(!(empty($_FILES['infp_cartap']['name']))){
            $p_cartap = $_FILES["infp_cartap"];
        }else{
            $p_cartap = null;
        }
        if(!(empty($_FILES['infp_retencion']['name']))){
            $p_retencion = $_FILES["infp_retencion"];
        }else{
            $p_retencion = null;
        }
        if(!(empty($_FILES['infp_strabajo']['name']))){
            $p_strabajo = $_FILES["infp_strabajo"];
        }else{
            $p_strabajo = null;
        }
        if(!(empty($_FILES['infp_imss']['name']))){
            $p_imss = $_FILES["infp_imss"];
        }else{
            $p_imss = null;
        }
        if(!(empty($_FILES['infp_nomina']['name']))){
            $p_nomina = $_FILES["infp_nomina"];
        }else{
            $p_nomina = null;
        }
		switch($_POST["method"]){
            case "store":
                $iduser = $_POST["select2"];
                $expediente = new Expedientes($numempleado, $puesto, $estudios, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $telmov, $radio, $fechanac, $fechacon, $fechaalta, $observaciones, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciatel, $antidoping, $vacante, $radio2, $nomfam, $refbanc, $p_curriculum, $p_evaluacion, $p_nacimiento, $p_curp, $p_identificacion, $p_comprobante, $p_rfc, $p_cartal, $p_cartap, $p_retencion, $p_strabajo, $p_imss, $p_nomina);
                $expediente ->Crear_expediente($iduser);
                exit("success");
            break;
            case "edit":
                var_dump($_POST);
            break;
        }
	}
}
?>