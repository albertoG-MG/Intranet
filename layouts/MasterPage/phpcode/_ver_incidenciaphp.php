<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/incidencias.php";
    $object = new connection_database();
    
    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    if (Permissions::CheckPermissions($_SESSION["id"], "Ver incidencia") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
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
	 
	//Validacion - Si se quiere acceder a editar incidencia sin id, regresa

    if($_GET['idIncidencia'] == null){
        header('Location: incidencias.php');
        die();
    }else{
		$verid = $_GET['idIncidencia'];
		$check_document_exist = $object -> _db -> prepare("SELECT * FROM incidencias WHERE id=:incidenciaid");
        $check_document_exist -> execute(array(':incidenciaid' => $verid));
        $count_document = $check_document_exist -> rowCount();
        if($count_document == 0){
            header('Location: incidencias.php');
            die();
        }
	}

    if(Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador" && Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "false"){
        //Checar si tiene los permisos para acceder a la incidencia
        $check_owner = $object -> _db -> prepare("SELECT * FROM incidencias i INNER JOIN solicitudes_incidencias si ON si.id=i.id_solicitud_incidencias INNER JOIN usuarios u1 ON u1.id=si.users_id WHERE u1.id=:userid AND i.id=:incidenciaid");
        $check_owner -> execute(array(":userid" => $_SESSION["id"], ":incidenciaid" => $verid));
        $count_owner = $check_owner -> rowCount();
        if($count_owner == 0){
            $check_notified = $object -> _db -> prepare("SELECT ni.id_notificado FROM notificaciones_incidencias ni INNER JOIN solicitudes_incidencias si ON si.id=ni.id_solicitud_incidencias INNER JOIN incidencias i ON i.id_solicitud_incidencias=si.id WHERE i.id=:incidenciaid");
            $check_notified -> execute(array(":incidenciaid" => $verid));
            $fetch_notified = $check_notified -> fetchAll(PDO::FETCH_ASSOC);
            $contador = count($fetch_notified);
            $i = 0;
            $switch=0;
            foreach($fetch_notified as $array){
                foreach($array as $boss){
                    if($i < $contador) {
                    $i++;
                    if(intval($boss) == $_SESSION['id']){
                            $switch=1;
                    }else if($i == $contador){
                            if($switch != 1){
                                header('Location: incidencias.php');
                                die();
                            }
                    }
                    }
                }
            }
        }
    }

    //Traemos el comentario del estatus
    $check_coment = $object -> _db -> prepare('SELECT comentario AS comentario_estatus FROM accion_incidencias WHERE incidencias_id=:incidenciaid');
    $check_coment -> execute(array(":incidenciaid" => $verid));
    $fetch_coment = $check_coment -> fetch(PDO::FETCH_OBJ);
    

    //Checar que tipo de incidencia es
    $check_tipo = $object -> _db -> prepare('SELECT DISTINCT CASE WHEN incidencias.id_permiso_reglamentario is NOT NULL THEN CASE WHEN permisos_reglamentarios.permiso_r = "OTRO" OR permisos_reglamentarios.permiso_r = "HOME_OFFICE" THEN "PERMISO REGLAMENTARIO ND" ELSE "PERMISO REGLAMENTARIO D" END WHEN incidencias.id_permiso_no_reglamentario is NOT NULL THEN CASE WHEN permisos_no_reglamentarios.permiso_nr = "AUSENCIA" THEN "PERMISO NO REGLAMENTARIO A" ELSE "PERMISO NO REGLAMENTARIO G" END ELSE "INCAPACIDAD" END AS tipo_permiso  FROM incidencias LEFT JOIN permisos_reglamentarios ON permisos_reglamentarios.id=incidencias.id_permiso_reglamentario LEFT JOIN permisos_no_reglamentarios ON permisos_no_reglamentarios.id=incidencias.id_permiso_no_reglamentario LEFT JOIN incapacidades ON incapacidades.id=incidencias.id_incapacidades WHERE incidencias.id=:incidenciaid');
    $check_tipo -> execute(array(":incidenciaid" => $verid));
    $fetch_tipo = $check_tipo -> fetch(PDO::FETCH_OBJ);
    //Sacamos la información de la incidencia de la base de datos
    if($fetch_tipo -> tipo_permiso == "PERMISO REGLAMENTARIO D"){
        $retrieve_information = $object -> _db -> prepare("SELECT permisos_reglamentarios.id AS permisos_reglamentarios_id, permisos_reglamentarios.permiso_r AS permiso_r, permisos_reglamentarios.periodo_ausencia_r AS periodo_ausencia_r, permisos_reglamentarios.observaciones_permiso_r AS observaciones_permiso_r, permisos_reglamentarios.nombre_justificante_r AS nombre_justificante_r, permisos_reglamentarios.identificador_justificante_r AS identificador_justificante_r, concat(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS creada_por, solicitudes_incidencias.fecha_solicitud as fecha, estatus_incidencia.nombre AS estatus FROM permisos_reglamentarios INNER JOIN incidencias ON incidencias.id_permiso_reglamentario=permisos_reglamentarios.id INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id INNER JOIN estatus_incidencia ON estatus_incidencia.id=solicitudes_incidencias.estatus WHERE incidencias.id=:incidenciaid");
        $retrieve_information -> execute(array(':incidenciaid' => $verid));
        $fetch_information = $retrieve_information -> fetch(PDO::FETCH_OBJ);
    }else if($fetch_tipo -> tipo_permiso == "PERMISO REGLAMENTARIO ND"){
        $retrieve_information = $object -> _db -> prepare("SELECT permisos_reglamentarios.id AS permisos_reglamentarios_id, permisos_reglamentarios.permiso_r AS permiso_r, permisos_reglamentarios.periodo_ausencia_r AS periodo_ausencia_r, permisos_reglamentarios.motivo_permiso_r AS motivo_permiso_r, permisos_reglamentarios.observaciones_permiso_r AS observaciones_permiso_r, permisos_reglamentarios.nombre_justificante_r AS nombre_justificante_r, permisos_reglamentarios.identificador_justificante_r AS identificador_justificante_r, concat(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS creada_por, solicitudes_incidencias.fecha_solicitud as fecha, estatus_incidencia.nombre AS estatus FROM permisos_reglamentarios INNER JOIN incidencias ON incidencias.id_permiso_reglamentario=permisos_reglamentarios.id INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id INNER JOIN estatus_incidencia ON estatus_incidencia.id=solicitudes_incidencias.estatus WHERE incidencias.id=:incidenciaid");
        $retrieve_information -> execute(array(':incidenciaid' => $verid));
        $fetch_information = $retrieve_information -> fetch(PDO::FETCH_OBJ);
    }else if($fetch_tipo -> tipo_permiso == "PERMISO NO REGLAMENTARIO G"){
        $retrieve_information = $object -> _db -> prepare("SELECT permisos_no_reglamentarios.id AS permisos_no_reglamentarios_id, permisos_no_reglamentarios.permiso_nr AS permiso_nr, permisos_no_reglamentarios.periodo_ausencia_nr AS periodo_ausencia_nr, permisos_no_reglamentarios.motivo_permiso_nr AS motivo_permiso_nr, permisos_no_reglamentarios.observaciones_permiso_nr AS observaciones_permiso_nr, permisos_no_reglamentarios.posee_jpermiso_nr AS posee_jpermiso_nr, permisos_no_reglamentarios.nombre_justificante_nr AS nombre_justificante_nr, permisos_no_reglamentarios.identificador_justificante_nr AS identificador_justificante_nr, concat(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS creada_por, solicitudes_incidencias.fecha_solicitud as fecha, estatus_incidencia.nombre AS estatus FROM permisos_no_reglamentarios INNER JOIN incidencias ON incidencias.id_permiso_no_reglamentario=permisos_no_reglamentarios.id INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id INNER JOIN estatus_incidencia ON estatus_incidencia.id=solicitudes_incidencias.estatus WHERE incidencias.id=:incidenciaid");
        $retrieve_information -> execute(array(':incidenciaid' => $verid));
        $fetch_information = $retrieve_information -> fetch(PDO::FETCH_OBJ);
    }else if($fetch_tipo -> tipo_permiso == "PERMISO NO REGLAMENTARIO A"){
        $retrieve_information = $object -> _db -> prepare("SELECT permisos_no_reglamentarios.id AS permisos_no_reglamentarios_id, permisos_no_reglamentarios.permiso_nr AS permiso_nr, permisos_no_reglamentarios.periodo_ausencia_nr AS periodo_ausencia_nr, permisos_no_reglamentarios.motivo_permiso_nr AS motivo_permiso_nr, permisos_no_reglamentarios.observaciones_permiso_nr AS observaciones_permiso_nr, permisos_no_reglamentarios.posee_jpermiso_nr AS posee_jpermiso_nr, permisos_no_reglamentarios.nombre_justificante_nr AS nombre_justificante_nr, permisos_no_reglamentarios.identificador_justificante_nr AS identificador_justificante_nr, concat(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS creada_por, solicitudes_incidencias.fecha_solicitud as fecha, estatus_incidencia.nombre AS estatus FROM permisos_no_reglamentarios INNER JOIN incidencias ON incidencias.id_permiso_no_reglamentario=permisos_no_reglamentarios.id INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id INNER JOIN estatus_incidencia ON estatus_incidencia.id=solicitudes_incidencias.estatus WHERE incidencias.id=:incidenciaid");
        $retrieve_information -> execute(array(':incidenciaid' => $verid));
        $fetch_information = $retrieve_information -> fetch(PDO::FETCH_OBJ);
    }else if($fetch_tipo -> tipo_permiso == "INCAPACIDAD"){
        $retrieve_information = $object -> _db -> prepare("SELECT incapacidades.id AS incapacidad_id, incapacidades.numero_incapacidad AS numero_incapacidad, incapacidades.serie_folio_incapacidad AS serie_folio_incapacidad, incapacidades.tipo_incapacidad as tipo_incapacidad, incapacidades.ramo_seguro_incapacidad AS ramo_seguro_incapacidad, incapacidades.periodo_incapacidad AS periodo_incapacidad, incapacidades.motivo_incapacidad AS motivo_incapacidad, incapacidades.observaciones_incapacidad AS observaciones_incapacidad, incapacidades.nombre_justificante_incapacidad AS nombre_justificante_incapacidad, incapacidades.archivo_identificador_incapacidad AS archivo_identificador_incapacidad, concat(usuarios.nombre,' ',usuarios.apellido_pat,' ',usuarios.apellido_mat) AS creada_por, solicitudes_incidencias.fecha_solicitud as fecha, estatus_incidencia.nombre AS estatus FROM incapacidades INNER JOIN incidencias ON incidencias.id_incapacidades=incapacidades.id INNER JOIN solicitudes_incidencias ON solicitudes_incidencias.id=incidencias.id_solicitud_incidencias INNER JOIN usuarios ON usuarios.id=solicitudes_incidencias.users_id INNER JOIN estatus_incidencia ON estatus_incidencia.id=solicitudes_incidencias.estatus WHERE incidencias.id=:incidenciaid");
        $retrieve_information -> execute(array(':incidenciaid' => $verid));
        $fetch_information = $retrieve_information -> fetch(PDO::FETCH_OBJ);
    }
?>