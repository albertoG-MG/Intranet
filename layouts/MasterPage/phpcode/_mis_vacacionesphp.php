<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/expedientes.php";
    $object = new connection_database();

    session_start();

    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a vacaciones") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
        header("HTTP/1.0 403 Forbidden");
	    echo "
	    <html>
			<head>
				<title>403 Prohibido</title>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script>
			</head>
			<body>
                <div class='error-wrapper'>
                    <div class='error-message'>
                        <h1>Intruso!</h1>
                        <h2>403: Prohibido</h2>
                    </div>
                    <?xml version='1.0' encoding='UTF-8'?>
                    <svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' data-name='Layer 1' viewBox='-80 0 380 200' preserveAspectRatio='xMidYMax meet'>
                        <defs>
                            <style>.cls-1{fill:#13a0db;}.cls-2{fill:#1a335e;}.cls-3{fill:#f7cb10;}.cls-4{fill:#bde3f4;}.cls-5{fill:#fff;}.cls-10,.cls-11,.cls-6,.cls-9{fill:none;}.cls-6{stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:0;}.cls-7{fill:#231f20;}.cls-8{fill:#e6e7e8;}.cls-10,.cls-11,.cls-9{stroke:#000000;stroke-miterlimit:10;stroke-width:4px;}.cls-10{stroke-dasharray:10.95 3.28;}.cls-11{stroke-dasharray:10.79 3.24;}</style>
                        </defs>
                        <title>error-robot</title>
                        <rect class='cls-1' x='99.42' y='142.46' width='55.25' height='64.75' />
                        <rect class='cls-2' x='56.91' y='142.46' width='48.76' height='64.62' />
                        <rect class='cls-3' x='60.48' y='133.27' width='90.37' height='7.75' />
                        <rect class='cls-3' x='154.67' y='154.73' width='8.04' height='26.36' />
                        <rect class='cls-3' x='48.52' y='154.73' width='8.39' height='26.36' />
                        <polyline points='54.64 207.21 54.64 181.08 54.64 154.73 54.64 140.1 156.69 140.1 156.69 154.73 156.69 181.08 156.69 207.21 151.77 207.21 151.77 145.02 105.67 145.02 59.56 145.02 59.56 207.21' />
                        <path class='cls-4' d='M105.67,52.39A30.42,30.42,0,0,0,75.34,82.72v49.94h33.58L107,53.09Z' />
                        <path class='cls-5' d='M105.67,52.43h0A30.42,30.42,0,0,1,136,82.76V132.7H105.67Z' />
                        <line class='cls-6' x1='93.18' y1='94.15' x2='93.18' y2='94.15' />
                        <polygon points='93.18 94.15 91.44 95.89 99.7 104.15 103.18 100.67 94.92 92.42 93.18 94.15' />
                        <rect x='103.21' y='78.33' width='4.92' height='23.2' transform='translate(-32.64 101.05) rotate(-45)' />
                        <polygon points='111.63 75.7 108.15 79.18 116.41 87.44 118.15 85.7 119.89 83.96 111.63 75.7' />
                        <circle id='headlight' fill='#f7cb10' cx='105.67' cy='33.73' r='3.52' />
                        <path d='M138.45,130.82V83.34a32.82,32.82,0,0,0-30.33-32.69V39.94a6.69,6.69,0,1,0-4.92,0V50.65A32.82,32.82,0,0,0,72.88,83.34v47.48H60.48v4.92h90.37v-4.92ZM105.67,32a1.77,1.77,0,1,1-1.77,1.77A1.77,1.77,0,0,1,105.67,32Zm27.87,98.85H77.8V83.34a27.87,27.87,0,1,1,55.74,0Z' />
                        <rect id='chestlight' fill='#f7cb10' x='94.75' y='164.23' width='21.82' height='21.82' />
                        <path class='cls-7' d='M119,188.51H92.3V161.77H119Zm-21.82-4.92h16.91V166.69H97.21Z' />
                        <rect class='cls-8' x='61.53' y='171.45' width='7.38' height='7.38' />
                        <rect class='cls-8' x='71.98' y='171.45' width='7.38' height='7.38' />
                        <rect class='cls-8' x='82.43' y='171.45' width='7.38' height='7.38' />
                        <rect class='cls-8' x='121.33' y='171.45' width='7.38' height='7.38' />
                        <rect class='cls-8' x='131.78' y='171.45' width='7.38' height='7.38' />
                        <rect class='cls-8' x='142.23' y='171.45' width='7.38' height='7.38' />
                        <rect x='160.69' y='154.73' width='4.92' height='26.36' />
                        <rect x='46.06' y='154.73' width='4.92' height='26.36' />
                        <g id='rightarm'>
                            <path class='cls-10' d='M169.35,172.71c20 0, 40 100, 20 100' />
                        </g>
                        <g class='rightclaw' transform='rotate(0, 170, 172) rotate(0, 170, 172) translate(0, 0)'>
                            <g id='rightclaw-rightpincer' transform='rotate(0,186.3,231.38)'>
                                <path class='cls-3' d='M204.59,258.27A24.08,24.08,0,0,0,206,241.18c-3.29-12-14.44-19.37-24.87-16.5l2.65,9.64c5.11-1.4,10.75,2.86,12.58,9.51a14.31,14.31,0,0,1-.73,10Z' />
                                <path d='M207.45,240.78a25.62,25.62,0,0,0-10.37-14.66,19.78,19.78,0,0,0-16.34-2.89l-1.45.4,3.44,12.54,1.45-.4a7.13,7.13,0,0,1,6.22,1.49,13,13,0,0,1,4.52,7,12.8,12.8,0,0,1-.63,8.94l-.67,1.34,11.65,5.77.67-1.34A25.58,25.58,0,0,0,207.45,240.78Zm-3.59,15.45-6.3-3.12a16.24,16.24,0,0,0,.25-9.68,16,16,0,0,0-5.6-8.57,10.4,10.4,0,0,0-7.34-2.26L183,225.8a17,17,0,0,1,12.42,2.82,23.49,23.49,0,0,1,8.44,27.62Z' />
                            </g>
                            <g id='rightclaw-leftpincer'>
                                <path class='cls-3' d='M169.29,258.27l9-4.44a15,15,0,0,1,4.7-18,8.51,8.51,0,0,1,7.14-1.49l2.65-9.64a18.33,18.33,0,0,0-15.49,2.92,25,25,0,0,0-8,30.67Z' />
                                <path d='M193.14,223.23a19.79,19.79,0,0,0-16.75,3.14A26.49,26.49,0,0,0,168,258.94l.67,1.34,11.65-5.77-.67-1.34A13.52,13.52,0,0,1,183.81,237a7,7,0,0,1,5.89-1.28l1.45.4,3.44-12.54ZM189,232.6a10.37,10.37,0,0,0-6.91,2,15.77,15.77,0,0,0-6,8.85,16.23,16.23,0,0,0,.25,9.68l-6.3,3.12a23.58,23.58,0,0,1,8.08-27.4,17.5,17.5,0,0,1,10-3.28,15.94,15.94,0,0,1,2.77.24Z' />
                            </g>
                            <path class='cls-7' d='M186.3,231.38a2.31,2.31,0,1,1,2.31-2.31A2.32,2.32,0,0,1,186.3,231.38Zm0-3.63a1.31,1.31,0,1,0,1.31,1.32A1.32,1.32,0,0,0,186.3,227.75Z' />
                        </g>
                        <g class='leftarm_group' transform='scale(-1, 1) translate(-218, 0)'>
                            <g id='leftarm'>
                                <path class='cls-10' d='M169.35,172.71c20 0, 40 100, 20 100' />
                            </g>
                        </g>
                    </svg>
                    <svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' data-name='Layer 1' viewBox='-80 0 380 200' preserveAspectRatio='xMidYMax meet'>
                        <defs>
                            <style>.cls-1{fill:#13a0db;}.cls-2{fill:#1a335e;}.cls-3{fill:#f7cb10;}.cls-4{fill:#bde3f4;}.cls-5{fill:#fff;}.cls-10,.cls-11,.cls-6,.cls-9{fill:none;}.cls-6{stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:0;}.cls-7{fill:#231f20;}.cls-8{fill:#e6e7e8;}.cls-10,.cls-11,.cls-9{stroke:#000000;stroke-miterlimit:10;stroke-width:4px;}.cls-10{stroke-dasharray:10.95 3.28;}.cls-11{stroke-dasharray:10.79 3.24;}</style>
                        </defs>
                        <g class='leftclaw' transform='rotate(0, 170, 172) rotate(0, 170, 172) translate(0, 0)'>
                            <g class='leftclaw-rightpincer' transform='rotate(0,186.3,231.38)'>
                                <path class='cls-3' d='M204.59,258.27A24.08,24.08,0,0,0,206,241.18c-3.29-12-14.44-19.37-24.87-16.5l2.65,9.64c5.11-1.4,10.75,2.86,12.58,9.51a14.31,14.31,0,0,1-.73,10Z' />
                                <path d='M207.45,240.78a25.62,25.62,0,0,0-10.37-14.66,19.78,19.78,0,0,0-16.34-2.89l-1.45.4,3.44,12.54,1.45-.4a7.13,7.13,0,0,1,6.22,1.49,13,13,0,0,1,4.52,7,12.8,12.8,0,0,1-.63,8.94l-.67,1.34,11.65,5.77.67-1.34A25.58,25.58,0,0,0,207.45,240.78Zm-3.59,15.45-6.3-3.12a16.24,16.24,0,0,0,.25-9.68,16,16,0,0,0-5.6-8.57,10.4,10.4,0,0,0-7.34-2.26L183,225.8a17,17,0,0,1,12.42,2.82,23.49,23.49,0,0,1,8.44,27.62Z' />
                            </g>
                            <g class='leftclaw-leftpincer'>
                                <path class='cls-3' d='M169.29,258.27l9-4.44a15,15,0,0,1,4.7-18,8.51,8.51,0,0,1,7.14-1.49l2.65-9.64a18.33,18.33,0,0,0-15.49,2.92,25,25,0,0,0-8,30.67Z' />
                                <path d='M193.14,223.23a19.79,19.79,0,0,0-16.75,3.14A26.49,26.49,0,0,0,168,258.94l.67,1.34,11.65-5.77-.67-1.34A13.52,13.52,0,0,1,183.81,237a7,7,0,0,1,5.89-1.28l1.45.4,3.44-12.54ZM189,232.6a10.37,10.37,0,0,0-6.91,2,15.77,15.77,0,0,0-6,8.85,16.23,16.23,0,0,0,.25,9.68l-6.3,3.12a23.58,23.58,0,0,1,8.08-27.4,17.5,17.5,0,0,1,10-3.28,15.94,15.94,0,0,1,2.77.24Z' />
                            </g>
                            <path class='cls-7' d='M186.3,231.38a2.31,2.31,0,1,1,2.31-2.31A2.32,2.32,0,0,1,186.3,231.38Zm0-3.63a1.31,1.31,0,1,0,1.31,1.32A1.32,1.32,0,0,0,186.3,227.75Z' />
                        </g>
                    </svg>
                </div>         
            </body>
            <style>
                @import url('https://fonts.googleapis.com/css?family=Press+Start+2P');

                body {
                    padding: 0;
                    margin: 0;
                }
                
                .error-wrapper {
                    min-height: 100vh;
                    width: 100vw;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    align-items: center;
                    animation: errorBackground linear 2s alternate infinite;
                    background-image: radial-gradient(ellipse at center, transparent 0%,#333333 100%);
                    background-size: 100vmax 100vmax;
                    background-repeat: no-repeat;
                    background-position: 50%;
                }
                
                .error-message { 
                    position: fixed;
                    top: 20px;
                    padding: 5vmin;
                    box-sizing: border-box;
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    height: 40vh;
                    font-family: 'Press Start 2p', monospace;
                    text-shadow: 
                    .5vmin .5vmin 0 #000000, 
                    -.5vmin .5vmin 0 #000000, 
                    .5vmin -.5vmin 0 #000000, 
                    -.5vmin -.5vmin 0 #000000,
                        
                    .5vmin 0 0 #000000, 
                    -.5vmin 0 0 #000000, 
                    0 -.5vmin 0 #000000, 
                    0 .5vmin 0 #000000;
                    color: #ffffff;
                }

                .error-message h1 {
                    font-size: 10vmin;
                    margin-top: 0;
                    margin-bottom: 5vmin;
                    text-align: center;
                }
                
                .error-message h2 {
                    font-size: 6vmin;
                    margin: 0;
                    text-align: center;
                }
                
                svg {
                    height: 60vh;
                    width: 100vw;
                    position: fixed;
                    bottom: 0;
                }
                
                
                .rightclaw { visibility: hidden; }
                @keyframes errorBackground {
                    from{background-color: #ffaaaa;}
                    to {background-color: #aaaaff;}
                }
            </style>
            <script>
                console.clear();

                var headlight = document.querySelector('#headlight'),
                chestlight = document.querySelector('#chestlight'),
                lc = document.querySelector('.leftclaw'),
                lcrp = document.querySelector('.leftclaw-rightpincer'),
                lclp = document.querySelector('.leftclaw-leftpincer'),
                rc = document.querySelector('.rightclaw'),
                rcrp = document.querySelector('#rightclaw-rightpincer'),
                rclp = document.querySelector('#rightclaw-leftpincer'),
                la = document.querySelector('#leftarm path'),
                ra = document.querySelector('#rightarm path');
            
                TweenMax.to(ra, 1, {ease:Linear.easeNone, repeat: 0, repeatDelay:3, attr: {d: 'M169.35,172.71c20 0, 40 0, 80 0'}});
                TweenMax.to(ra, 1, {delay: 1, ease:Linear.easeNone, repeat: 0, repeatDelay:1, attr: {d: 'M169.35,172.71c0 0, 60 30, 55 -30'}});
                TweenMax.to(rc, 2, {ease:Linear.easeNone, repeat: 0, repeatDelay:3, attr: {transform: 'rotate(-190, 207, 180) rotate(-20, 40, 80) translate(-60, 30)'}});
                TweenMax.to(rcrp, .25, {ease:Linear.easeNone, delay: 2, repeat: -1, yoyo:true, attr: {transform: 'rotate(-20, 86.3, 21.38)'}});
                TweenMax.to(headlight, 1, {repeat: -1, yoyo:true, attr: {fill: '#ff0000'}});
                TweenMax.to(chestlight, 1, {repeat: -1, yoyo:true, attr: {fill: '#ff0000'}});
                TweenMax.to(lc, 2, {ease:Linear.easeNone, repeat: 0, repeatDelay:3, attr: {transform: 'rotate(-190, 207, 180) rotate(-20, 40, 80) translate(-60, 30)'}});
                TweenMax.to(lcrp, .25, {ease:Linear.easeNone, delay: 2, repeat: -1, yoyo:true, attr: {transform: 'rotate(20, 186.3,231.38)'}});
            </script>
	    </html>";
		die();
    }

    $perfil = $object->_db->prepare("SELECT usuarios.nombre AS nombre, usuarios.apellido_pat AS apellido_pat, usuarios.apellido_mat AS apellido_mat, usuarios.correo as correo, roles.nombre AS rolnom, usuarios.nombre_foto as nombre_foto, usuarios.foto_identificador as foto, departamentos.departamento as departamento FROM usuarios LEFT JOIN roles ON usuarios.roles_id=roles.id LEFT JOIN departamentos ON usuarios.departamento_id=departamentos.id WHERE usuarios.id=:sessionid");
    $perfil->bindParam("sessionid", $_SESSION['id'], PDO::PARAM_INT);
    $perfil->execute();
    $profile = $perfil -> fetch(PDO::FETCH_OBJ);

    $checkifhasexpediente = $object -> _db -> prepare("SELECT * FROM expedientes INNER JOIN usuarios ON usuarios.id=expedientes.users_id WHERE usuarios.id=:usuarioid");
    $checkifhasexpediente -> execute(array(':usuarioid' => $_SESSION['id']));
    $countexpediente = $checkifhasexpediente -> rowCount();
    
    if($countexpediente > 0){
        $fecha_estatus;
        $hoy =  date("Y-m-d");

        $check_information = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_parentesco as eemergencia_parentesco, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_parentesco2 as eemergencia_parentesco2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico, estatus_empleado.situacion_del_empleado as esituacion_del_empleado, estatus_empleado.estatus_del_empleado as eestatus_del_empleado, estatus_empleado.motivo as emotivo, estatus_empleado.fecha as eestatus_fecha from expedientes inner join usuarios on usuarios.id=expedientes.users_id left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where usuarios.id=:userid");
        $check_information -> execute(array(':userid' => $_SESSION["id"]));
        $fetch_information = $check_information -> fetch(PDO::FETCH_OBJ);

        if($fetch_information -> esituacion_del_empleado == "ALTA" && $fetch_information -> eestatus_del_empleado == "NUEVO INGRESO" || $fetch_information -> esituacion_del_empleado == "ALTA" && $fetch_information -> eestatus_del_empleado == "REINGRESO"){
            
            function get_next_anniversary($anniversary) {
                $date = new DateTime($anniversary);
                $date->modify('+' . date('Y') - $date->format('Y') . ' years');
                if($date < new DateTime()) {
                    $date->modify('+1 year');
                }
            
                return $date->format('Y/m/d');
            }
            
            $fecha_vencimiento = get_next_anniversary($fetch_information->eestatus_fecha);

            $var = $fecha_vencimiento;
            $fecha_format = str_replace('/', '-', $var);
            $fecha_format = strtotime("-1 year", strtotime($fecha_format));
            $fecha_format = date('Y-m-d', $fecha_format);

            $checkDate = $fecha_vencimiento;
            $checkAnniversary = strtotime($checkDate);
            if(date('m-d') == date('m-d', $checkAnniversary)) {
                $prepareStatement = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones WHERE users_id=:userid AND estatus!=4 AND fecha_solicitud < :fechasolicitud");
                $prepareStatement -> execute(array(':userid' => $_SESSION['id'], ':fechasolicitud' => $fecha_format));
                $countSolicitudes = $prepareStatement -> rowCount();
                if ($countSolicitudes > 0){
                    $fetchSolicitudes = $prepareStatement -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($fetchSolicitudes as $key => $value){


                        $insertStatement = $object -> _db -> prepare("INSERT INTO historial_solicitud_vacaciones(users_id, periodo_solicitado, dias_solicitados, fecha_solicitud, estatus) VALUES(:iduser, :periodo, :dias, :fecha, :estatus)");
                        $insertStatement -> execute(array(':iduser' => $value['users_id'], ':periodo' => $value['periodo_solicitado'], ':dias' => $value['dias_solicitados'], ':fecha' => $value['fecha_solicitud'], ':estatus' => $value['estatus']));
                        $deleteStatement = $object -> _db -> prepare("DELETE FROM solicitud_vacaciones WHERE id=:idsolicitud");
                        $deleteStatement -> execute(array(':idsolicitud' => $value["id"]));
                    }
                }
                $deleteall_statement = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones WHERE users_id=:iduser AND estatus=4 AND fecha_solicitud < :fechasolicitud");
                $deleteall_statement -> execute(array(":iduser" => $_SESSION["id"], ':fechasolicitud' => $fecha_format));
                $deletecount_statement = $deleteall_statement -> rowCount();
                if($deletecount_statement > 0){
                    $fetchDeleteRequest = $deleteall_statement -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($fetchDeleteRequest as $llave => $valor){
                        $deleteRequests = $object -> _db -> prepare("DELETE FROM solicitud_vacaciones WHERE id=:solicitudid");
                        $deleteRequests -> execute(array("solicitudid" => $valor["id"]));
                    }
                }
            }
                
            $fecha_estatus = $fetch_information -> eestatus_fecha;
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

            $check_solicitudes_vacaciones = $object -> _db -> prepare("SELECT COALESCE(SUM(dias_solicitados),0) AS dias_solicitados FROM solicitud_vacaciones where users_id=:userid AND (estatus=4 OR estatus=1)");
            $check_solicitudes_vacaciones -> execute(array(':userid' => $_SESSION["id"]));
            $fetch_sum_vacaciones = $check_solicitudes_vacaciones -> fetch(PDO::FETCH_OBJ);

            $dias_restantes = $vacaciones - $fetch_sum_vacaciones -> dias_solicitados;
        }
    }

    $check_jerarquia = $object -> _db -> prepare("SELECT * FROM jerarquia INNER JOIN roles ON roles.id=jerarquia.rol_id INNER JOIN usuarios ON usuarios.roles_id=roles.id WHERE usuarios.id=:userid AND jerarquia.jerarquia_id is NOT NULL");
    $check_jerarquia -> execute(array(":userid" => $_SESSION["id"]));
    $count_jerarquia = $check_jerarquia -> rowCount();
?>