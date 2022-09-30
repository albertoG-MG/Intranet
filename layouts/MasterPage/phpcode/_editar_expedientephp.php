<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/user.php";
    include_once __DIR__ . "/../../../classes/expedientes.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    if (Permissions::CheckPermissions($_SESSION["id"], "Editar expediente") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
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
	
	/*Si el id no existe, regresa*/
	if($_GET['idExpediente'] == null){
		header('Location: expedientes.php');
	}else{
		$Editarid = $_GET['idExpediente'];
        /*Checa si el expediente esta vinculado*/
        $checkexp=Expedientes::Checkusuarioxexpediente($Editarid);
        if($checkexp == 0){
            header('Location: expedientes.php');
        }
	}

    $edit=Expedientes::Fetcheditexpediente($Editarid);

    $estado = $object->_db->prepare("select * from estados");
    $estado->execute();
    $contestado=0;


    /*REFERENCIAS LABORALES*/
    $array = [];
    $contador_array = 0;
    $referencias_laborales = $object->_db->prepare("select * from ref_laborales where expediente_id =:expedienteid");
    $referencias_laborales->bindParam("expedienteid", $Editarid, PDO::PARAM_INT);
    $referencias_laborales->execute();
    $cont_referencias = $referencias_laborales->rowCount();
    while ($row_ref = $referencias_laborales->fetch(PDO::FETCH_OBJ)) {
        $array[$contador_array] = ($row_ref->nombre);
        $contador_array++;
        $array[$contador_array] = ($row_ref->parentesco);
        $contador_array++;
        $array[$contador_array] = ($row_ref->telefono);
        $contador_array++;
    }
    $json = json_encode($array, JSON_UNESCAPED_UNICODE);

    /*REFERENCIAS BANCARIAS*/
    $array2 = [];
    $contador_array2 = 0;
    $datos_bancarios = $object->_db->prepare("select * from ref_bancarias where expediente_id =:expedienteid");
    $datos_bancarios->bindParam("expedienteid", $Editarid, PDO::PARAM_INT);
    $datos_bancarios->execute();
    $cont_datos = $datos_bancarios->rowCount();
    while ($row_datos = $datos_bancarios->fetch(PDO::FETCH_OBJ)) {
        $array2[$contador_array2] = ($row_datos->nombre);
        $contador_array2++;
        $array2[$contador_array2] = ($row_datos->parentesco);
        $contador_array2++;
        $array2[$contador_array2] = ($row_datos->rfc);
        $contador_array2++;
        $array2[$contador_array2] = ($row_datos->curp);
        $contador_array2++;
        $array2[$contador_array2] = ($row_datos->prcnt_derecho);
        $contador_array2++;
    }
    $json2 = json_encode($array2, JSON_UNESCAPED_UNICODE);

    /*PAPELERIAS*/
    $array3 = [];
    $papeleria = $object->_db->prepare("SELECT tipo_papeleria.id as id, tipo_papeleria.nombre as nombre, papeleria_empleado.nombre_archivo as nombre_archivo, papeleria_empleado.archivo as archivo, papeleria_empleado.fecha_subida as fecha_subida FROM tipo_papeleria left join papeleria_empleado on tipo_papeleria.id = papeleria_empleado.tipo_archivo and papeleria_empleado.expediente_id = :expedienteid");
    $papeleria->bindParam("expedienteid", $Editarid, PDO::PARAM_INT);
    $papeleria->execute();

    while ($papel = $papeleria->fetch(PDO::FETCH_OBJ)) { 
        $array3[]=array('id'=>$papel->id,'nombre'=>$papel->nombre,'nombre_archivo'=>$papel->nombre_archivo, 'archivo'=>$papel->archivo, 'fecha_subida'=>$papel->fecha_subida);
    }

?>