<div class="container mx-auto px-6 py-8">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Zilla+Slab+Highlight:wght@700&display=swap');
.Titulos{
    font-family: 'Poppins', sans-serif;
    color: #000000;
    font-size: 2.75rem !important;
}
    </style>
    <h2 class="Titulos text-3xl font-semibold sm:text-5xl lg:text-6xl">
        Dashboard
    </h2>

    <?php
    /* 
    & ------------------ APARTADO DE MENSAJES SOBRE TU EXPEDIENTE ----------------------------
    */ 

    //Consulta para revisar el estatus expediente
    $check_estatus = $object->_db->prepare("SELECT expedientes.estatus_expediente, token_expediente.link, token_expediente.exp_date, expedientes.id as expediente_id  FROM expedientes INNER JOIN token_expediente ON expedientes.id = token_expediente.expedientes_id WHERE expedientes.users_id = :user_id");
    $check_estatus->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
    $check_estatus->execute();
    $SelectEstatus = $check_estatus->fetch(PDO::FETCH_ASSOC);

    if ($SelectEstatus !== false) { // Si se encontraron resultados
        //Guardamos los datos de la consulta en variables
        $estatus_expediente = $SelectEstatus['estatus_expediente'];
        $link = $SelectEstatus['link'];
        $exp_date = $SelectEstatus['exp_date'];
        $idExpediente = $SelectEstatus['expediente_id'];

        //CONSULTA PARA CONTAR PAPELERÍA OBLIGATORIA DE LOS EMPLEADOS
        $papeleria = $object->_db->prepare("SELECT tipo_archivo FROM papeleria_empleado WHERE tipo_archivo NOT IN (2, 7, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,25) AND expediente_id = :expedienteid");
        $papeleria->execute(array(':expedienteid' => $idExpediente));
        $array_papeleria = $papeleria->fetchAll(PDO::FETCH_ASSOC);
        
        //CONSULTA PARA CONTAR LA PAPELERÍA OBLIGATORIA DE LOS TECNICOS
        $papeleria_tecnico = $object->_db->prepare("SELECT tipo_archivo FROM papeleria_empleado WHERE tipo_archivo NOT IN (2, 7, 11, 12, 13, 14, 16, 17, 18, 19, 20, 21, 22, 23, 24,25) AND expediente_id = :expedienteid");
        $papeleria_tecnico->execute(array(':expedienteid' => $idExpediente));
        $array_papeleria_tecnico = $papeleria_tecnico->fetchAll(PDO::FETCH_ASSOC);

        //CONSULTA PARA TRAER LOS CAMPOS DEL EXPEDIENTE
        $expedientes = $object->_db->prepare("SELECT estudios, calle, num_exterior,colonia, estado_id, municipio_id, codigo, tel_dom, ecivil, fecha_nacimiento, curp, nss, rfc, tipo_identificacion, num_identificacion, talla_polo, emergencia_nombre, emergencia_apellidopat, emergencia_apellidomat, emergencia_relacion, emergencia_telefono,  emergencia_nombre2, emergencia_apellidopat2, emergencia_apellidomat2, emergencia_relacion2, emergencia_telefono2, banco_personal, cuenta_personal, clabe_personal, plastico_personal FROM expedientes WHERE id = :expedienteid");
        $expedientes->execute(array(':expedienteid' => $idExpediente));
        $array_expedientes = $expedientes->fetchAll(PDO::FETCH_ASSOC);

        
        //CONSULTA PARA TRAER LOS BENEFICIARIOS BANCARIOS
        $ben_ban = $object->_db->prepare("SELECT * FROM ben_bancarios WHERE expediente_id = :expedienteid");
        $ben_ban->execute(array(':expedienteid' => $idExpediente));
        $array_benban = $ben_ban->fetchAll(PDO::FETCH_ASSOC);

        $fecha = date("d/m/Y", strtotime($exp_date)); // Obtener la fecha sin horas y en formato d/m/y
    

        //Condición para mostrar el mensaje de expediente si se encuentra incompleto o asignado
        if ($estatus_expediente == 3) {  // En caso de que el estatus sea asignado   ?>
                <div class="px-4 py-2 mt-1 mx-7 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                    <span class="font-medium"><b> SE LE ASIGNO UN EXPEDIENTE. </b></span>  <a href="<?php echo $link ?>" class="text-yellow-800"><u>Haz clic aquí para acceder</u></a>.
                    <br><p class="font-medium" style="font-style: italic; color: #c6910f;">Favor de llenarlo antes del:  <?php echo $fecha ?></p>
                </div> <?php

        } else if ($estatus_expediente == 4) { // En caso de que el estatus sea revisión  ?>
            <div class="px-4 py-2 mt-1 mx-7 text-sm text-red-700 rounded-lg bg-red-50 " role="alert">
                <span class="font-medium"><b>SU EXPEDIENTE SE ENCUENTRA INCOMPLETO. </b> </span> <a href="<?php echo $link ?>" class="text-red-700"><u>Haz clic aquí para acceder</u></a>.
                <br><p class="font-medium" style="font-style: italic; color: #ff0200;">Favor de llenar todos los datos obligatorios antes del:  <?php echo $fecha ?></p>
            </div>   <?php

            //MENSAJES DEPENDIENTO LAS SECCIONES QUE TE FALTAN POR LLENAR -------------------------

                //Condición para mandar el mensaje de papelería incompleta
                if (Roles::FetchSessionRol($_SESSION['rol']) != "Tecnico" && count($array_papeleria) < 7 ) {   ?>
                    <div class="flex items-center px-4 py-2 mt-1 mx-7 text-sm text-red-700 rounded-lg bg-red-50" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-red-700" viewBox="0 0 24 24"><path fill="currentcolor" d="M8.27,3L3,8.27V15.73L8.27,21H15.73C17.5,19.24 21,15.73 21,15.73V8.27L15.73,3M9.1,5H14.9L19,9.1V14.9L14.9,19H9.1L5,14.9V9.1M11,15H13V17H11V15M11,7H13V13H11V7" /></svg>
                      <span class="font-semibold">Tiene <b>papelería</b> pendientes de subir en su expediente.</span>  
                    </div>  
                    <?php
                } 
                
                if ( Roles::FetchSessionRol($_SESSION['rol']) == "Tecnico" && count($array_papeleria_tecnico) < 8) { // En caso de que el empleado sea técnico  ?>
                    <div class="flex items-center px-4 py-2 mt-1 mx-7 text-sm text-red-700 rounded-lg bg-red-50" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-red-700" viewBox="0 0 24 24"><path fill="currentcolor" d="M8.27,3L3,8.27V15.73L8.27,21H15.73C17.5,19.24 21,15.73 21,15.73V8.27L15.73,3M9.1,5H14.9L19,9.1V14.9L14.9,19H9.1L5,14.9V9.1M11,15H13V17H11V15M11,7H13V13H11V7" /></svg>
                      <span class="font-semibold">Tiene <b>papelería</b> pendientes de subir en su expediente.</span>  
                    </div>  
                    <?php
                }
 
                //Condición para DATOS ADICIONALES incompletos
                if (empty($array_expedientes[0]['estudios']) || empty($array_expedientes[0]['calle']) || empty($array_expedientes[0]['num_exterior']) || empty($array_expedientes[0]['colonia']) || empty($array_expedientes[0]['estado_id']) || empty($array_expedientes[0]['municipio_id']) || empty($array_expedientes[0]['codigo']) || empty($array_expedientes[0]['tel_dom']) || empty($array_expedientes[0]['ecivil']) || empty($array_expedientes[0]['estudios']) || empty($array_expedientes[0]['fecha_nacimiento']) || empty($array_expedientes[0]['curp']) || empty($array_expedientes[0]['nss']) || empty($array_expedientes[0]['rfc']) || empty($array_expedientes[0]['tipo_identificacion']) || empty($array_expedientes[0]['num_identificacion'])) {
                    ?>
                    <div class="flex items-center px-4 py-2 mt-1 mx-7 text-sm text-red-700 rounded-lg bg-red-50" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-red-700" viewBox="0 0 24 24"><path fill="currentcolor" d="M8.27,3L3,8.27V15.73L8.27,21H15.73C17.5,19.24 21,15.73 21,15.73V8.27L15.73,3M9.1,5H14.9L19,9.1V14.9L14.9,19H9.1L5,14.9V9.1M11,15H13V17H11V15M11,7H13V13H11V7" /></svg>
                      <span class="font-semibold">Tiene <b>datos generales</b> pendientes de llenar en su expediente.</span>  
                    </div>
                <?php
                }

                //Condición para DATOS GENERALES incompletos
                if (empty($array_expedientes[0]['talla_polo']) || empty($array_expedientes[0]['emergencia_nombre']) || empty($array_expedientes[0]['emergencia_apellidopat']) || empty($array_expedientes[0]['emergencia_apellidomat']) || empty($array_expedientes[0]['emergencia_relacion']) || empty($array_expedientes[0]['emergencia_telefono']) || empty($array_expedientes[0]['emergencia_nombre2']) || empty($array_expedientes[0]['emergencia_apellidopat2']) || empty($array_expedientes[0]['emergencia_apellidomat2']) || empty($array_expedientes[0]['emergencia_relacion2']) || empty($array_expedientes[0]['emergencia_telefono2'])) {
                    ?> 
                    <div class="flex items-center px-4 py-2 mt-1 mx-7 text-sm text-red-700 rounded-lg bg-red-50" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-red-700" viewBox="0 0 24 24"><path fill="currentcolor" d="M8.27,3L3,8.27V15.73L8.27,21H15.73C17.5,19.24 21,15.73 21,15.73V8.27L15.73,3M9.1,5H14.9L19,9.1V14.9L14.9,19H9.1L5,14.9V9.1M11,15H13V17H11V15M11,7H13V13H11V7" /></svg>
                     <span class="font-semibold">Tiene <b>datos adicionales</b> pendientes de llenar en su expediente.</span>  
                    </div>  
                    <?php
                }

                //Condición para DATOS GENERALES incompletos de los tecnicos
                if ( Roles::FetchSessionRol($_SESSION['rol']) == "Tecnico" && count($array_benban) == 0) {
                    if (empty($array_expedientes[0]['cuenta_personal']) || empty($array_expedientes[0]['clabe_personal']) || empty($array_expedientes[0]['banco_personal']) || empty($array_expedientes[0]['plastico_personal'])) {
                        ?> 
                        <div class="flex items-center px-4 py-2 mt-1 mx-7 text-sm text-red-700 rounded-lg bg-red-50" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-red-700" viewBox="0 0 24 24"><path fill="currentcolor" d="M8.27,3L3,8.27V15.73L8.27,21H15.73C17.5,19.24 21,15.73 21,15.73V8.27L15.73,3M9.1,5H14.9L19,9.1V14.9L14.9,19H9.1L5,14.9V9.1M11,15H13V17H11V15M11,7H13V13H11V7" /></svg>
                             <span class="font-semibold">Tiene <b>datos bancarios</b> pendientes de llenar en su expediente.</span>  
                        </div>  
                        <?php
                    }

                }else if( Roles::FetchSessionRol($_SESSION['rol']) != "Tecnico" && count($array_benban) == 0){
                    ?> 
                    <div class="flex items-center px-4 py-2 mt-1 mx-7 text-sm text-red-700 rounded-lg bg-red-50" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-red-700" viewBox="0 0 24 24"><path fill="currentcolor" d="M8.27,3L3,8.27V15.73L8.27,21H15.73C17.5,19.24 21,15.73 21,15.73V8.27L15.73,3M9.1,5H14.9L19,9.1V14.9L14.9,19H9.1L5,14.9V9.1M11,15H13V17H11V15M11,7H13V13H11V7" /></svg>
                        <span class="font-semibold">Tiene <b>datos bancarios</b> pendientes de llenar en su expediente.</span>  
                    </div>  
                    <?php

                }
            //--------------------------------------------------------------------------------------
        }
    }

/*
  & --------------------------------  FIN APARTADO DE MENSAJES SOBRE TU EXPEDIENTE -------------------------
 */   
       ?>  
    
    <div class="mt-4">
    <div class=" bg-white overflow-hidden shadow-xl rounded-lg" style="background-image: url(../src/img/Atomos-Sinttecom.png); background-size: cover; background-position:center; background-repeat:no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">      
    <div class="container-image flex flex-col">
                <div class="rounded-3xl p-4 m-4" style="z-index: 3;">
                    <div class="flex-none text-center items-center sm:flex">
                    <div class="relative shrink-0 h-32 w-32 mx-auto md:m-0 sm:mb-0 mb-3">
                            <?php
                                if($profile -> nombre_foto != null && $profile -> foto != null){
                                    $path = __DIR__ . "/../../../src/img/imgs_uploaded/".$profile -> foto;
                                    if(!file_exists($path)){
                            ?>
                                        <img class="w-32 h-32 object-cover" style= "border-radius: 35rem !important;" src="../src/img/default-user.png">
                            <?php
                                    }else{
                            ?>
                                        <img class="w-32 h-32 object-cover" style= "border-radius: 35rem !important;" src="../src/img/imgs_uploaded/<?php echo $profile -> foto ?>">
                            <?php          
                                    }
                                }else{
                            ?>
                                    <img class=" w-32 h-32 object-cover" style= "border-radius: 35rem !important;" src="../src/img/default-user.png">
                            <?php
                                }
                            ?>
                        </div>
                        <div class="flex-1 flex flex-col min-w-0 sm:ml-5 text-center md:text-left sm:mt-2" style="word-break: break-word;">
							<span class="text-lg text-black font-bold leading-none">
								<?php echo $profile->nombre. " " .$profile->apellido_pat. " " .$profile->apellido_mat;?>
							</span>
							<span class="text-black my-1">
								<?php echo $profile->rolnom; ?>
							</span>
                        </div>
						<div class="text-center ">
	                        <a class="outline-none" href="perfil.php"><button style="height:40px;" class="button w-full bg-white border border-gray-300 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 text-gray-600 rounded-md h-11 px-8 py-2">Ver mi perfil</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-evenly bg-white text-black text-center p-4" id="tabProfile" role="tablist">
                <li role="presentation" class="w-full md:w-max">
                    <button class="menu-active w-full group flex items-center space-x-2 rounded-lg bg-[#27ceeb] px-4 py-2.5 tracking-wide text-white outline-none transition-all" id="vision-tab-profile" data-tabs-target="#vision" type="button" role="tab" aria-controls="vision" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" /></svg>
                        <span>Visión general</span>
                    </button>
                </li>
                <li role="presentation" class="w-full md:w-max">
                    <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="alertas-tab-profile" data-tabs-target="#alertas" type="button" role="tab" aria-controls="alertas" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24"><path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
                        <span>Alertas</span>
                    </button>
                </li>
                <li role="presentation" class="w-full md:w-max">
                    <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="avisos-tab-profile" data-tabs-target="#avisos" type="button" role="tab" aria-controls="avisos" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24"><path fill="currentColor" d="M12.04,2.5L9.53,5H14.53L12.04,2.5M4,7V20H20V7H4M12,0L17,5V5H20A2,2 0 0,1 22,7V20A2,2 0 0,1 20,22H4A2,2 0 0,1 2,20V7A2,2 0 0,1 4,5H7V5L12,0M7,18V14H12V18H7M14,17V10H18V17H14M6,12V9H11V12H6Z" /></svg>
                        <span>Avisos informativos</span>
                    </button>
                </li>
                <li role="presentation" class="w-full md:w-max">
                    <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="comunicados-tab-profile" data-tabs-target="#comunicados" type="button" role="tab" aria-controls="comunicados" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24"><path fill="currentColor" d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z" /></svg>
                        <span>Comunicados</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <div id="profileContent">
        <div class="block bg-transparent rounded-lg" id="vision" role="tabpanel" aria-labelledby="vision-tab-profile">

            <?php 
                if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
                    if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
            ?>
                        <div class="mt-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 w-full min-w-0" style="word-break: break-word;">
                                <div class="flex flex-col flex-auto p-6 bg-white shadow rounded-2xl overflow-hidden">
                                    <div class="text-lg font-medium tracking-tight leading-6 truncate">Usuarios</div>
                                    <div class="-mt-2">
                                        <div class="flex flex-col items-center mt-2">
                                            <div class="text-6xl font-bold tracking-tight leading-none text-blue-500"><?php print_r($countusers->total); ?></div>
                                            <div class="text-lg font-medium text-blue-600 dark:text-blue-500">Usuario(s)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col flex-auto p-6 bg-white shadow rounded-2xl overflow-hidden">
                                    <div class="text-lg font-medium tracking-tight leading-6 truncate">Expedientes</div>
                                    <div class="-mt-2">
                                        <div class="flex flex-col items-center mt-2">
                                            <div class="text-6xl font-bold tracking-tight leading-none text-red-500"><?php echo $countexpedientes->totalexpedientes;?></div>
                                            <div class="text-lg font-medium text-red-600 dark:text-red-500">Expediente(s)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col flex-auto p-6 bg-white shadow rounded-2xl overflow-hidden">
                                    <div class="text-lg font-medium tracking-tight leading-6 truncate">Departamentos</div>
                                    <div class="-mt-2">
                                        <div class="flex flex-col items-center mt-2">
                                            <div class="text-6xl font-bold tracking-tight leading-none text-amber-500"><?php echo $countdepartamentos->totaldepartamentos;?></div>
                                            <div class="text-lg font-medium text-amber-600 dark:text-amber-500">departamento(s)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col flex-auto p-6 bg-white shadow rounded-2xl overflow-hidden">
                                    <div class="text-lg font-medium tracking-tight leading-6 truncate">Documentos</div>
                                    <div class="-mt-2">
                                        <div class="flex flex-col items-center mt-2">
                                            <div class="text-6xl font-bold tracking-tight leading-none text-green-500"><?php echo $countdocumentos->totalpapeleria;?></div>
                                            <div class="text-lg font-medium text-green-600 dark:text-green-500">documentos(s)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php 
                    }
                } 
            ?>

            <?php if(Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Director general" && Roles::FetchSessionRol($_SESSION["rol"]) != "Usuario externo" && Roles::FetchSessionRol($_SESSION["rol"]) != ""){ ?>
                <div class="mt-8">
                    <div class="grid grid-cols-1 2xl:grid-cols-2 gap-4 my-4">
                        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold leading-none text-gray-900">Incidencias</h3>
                                <a href="incidencias.php" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                                    Ir a incidencias
                                </a>
                            </div>
                            <?php if($count_incidencias > 0){ ?>
                                <div class="flow-root">
                                    <ul role="list" class="divide-y divide-gray-200">
                                        <?php while ($row_incidencias = $resultado -> fetch(PDO::FETCH_ASSOC)){ ?>
                                            <li class="py-3 sm:py-4">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900">
                                                            <?php echo $row_incidencias["tipo_permiso"]; ?>
                                                        </p>
                                                        <p class="text-sm text-gray-500">
                                                        <?php echo $row_incidencias["fecha_solicitud"]; ?>
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                                    <?php 
                                                            if($row_incidencias["estatus_id"] == 1){
                                                                echo "Aprobado";
                                                            }else if($row_incidencias["estatus_id"] == 2){
                                                                echo "Cancelado";
                                                            }else if($row_incidencias["estatus_id"] == 3){
                                                                echo "Rechazado";
                                                            } else if($row_incidencias["estatus_id"] == 4){
                                                                echo "Pendiente";
                                                            }
                                                    ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="grid grid-cols-1 text-center">
                                    <span class="Titulos text-3xl font-semibold uppercase text-black">Sin incidencias</span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl leading-none font-bold text-gray-900">Vacaciones</h3>
                                <a href="vacaciones.php" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                                    Ir a vacaciones
                                </a>
                            </div>
                            <?php if($count_vacaciones > 0){ ?>
                                <div class="flow-root">
                                    <ul role="list" class="divide-y divide-gray-200">
                                        <?php while ($row_vacaciones = $result -> fetch(PDO::FETCH_ASSOC)){ ?>
                                            <li class="py-3 sm:py-4">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-medium text-gray-900">
                                                            <?php echo $row_vacaciones["periodo_solicitado"]; ?>
                                                        </p>
                                                        <p class="text-sm text-gray-500">
                                                        <?php echo $row_vacaciones["fecha_solicitud"]; ?>
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                                    <?php 
                                                            if($row_vacaciones["estatus"] == 1){
                                                                echo "Aprobado";
                                                            }else if($row_vacaciones["estatus"] == 2){
                                                                echo "Cancelado";
                                                            }else if($row_vacaciones["estatus"] == 3){
                                                                echo "Rechazado";
                                                            } else if($row_vacaciones["estatus"] == 4){
                                                                echo "Pendiente";
                                                            }
                                                    ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="grid grid-cols-1 text-center">
                                    <span class="Titulos text-3xl font-semibold uppercase text-black">Sin vacaciones</span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="hidden bg-transparent rounded-lg" id="alertas" role="tabpanel" aria-labelledby="alertas-tab-profile">
            <?php 
                if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
                    if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
            ?>
                <div class="bg-white p-3 shadow-md rounded-2xl mt-5">
                    <table class="w-full" id="alertas_table" style="display:none; word-break: break-word;">
                        <thead>
                            <tr class="bg-gray-800 text-white uppercase text-sm leading-normal">
                                <th>Creada por</th>
                                <th>Modificada por</th>
                                <th>Nombre de la foto</th>
                                <th class="py-3 text-center desktop">Imágen destacada</th>
                                <th>Nombre del archivo alerta</th>
                                <th class="py-3 text-center desktop">Archivo</th>
                                <th class="py-3 text-center all">Título</th>
                                <th class="py-3 text-center desktop">Descripción</th>
                                <th class="py-3 text-center desktop">Fecha</th>
                                <th>Fecha de modificacion</th>
                                <th class="py-3 text-center min-tablet">Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php 
                    } 
                }
            ?>
            <div id="demo" class="mt-5">
                <h2 class="text-2xl text-black font-semibold">Alertas</h2>
                <div id="dataContainer" class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8" style="word-break:break-word;">
                </div>
            </div>
        </div>
        <div class="hidden bg-transparent rounded-lg" id="avisos" role="tabpanel" aria-labelledby="avisos-tab-profile">
            <?php 
                if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
                    if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
            ?>
                <div class="bg-white p-3 shadow-md rounded-2xl mt-5">
                    <table class="w-full" id="avisos_table" style="display:none; word-break: break-word;">
                        <thead>
                            <tr class="bg-gray-800 text-white uppercase text-sm leading-normal">
                                <th>Creada por</th>
                                <th>Modificada por</th>
                                <th>Nombre de la foto</th>
                                <th class="py-3 text-center desktop">Imágen destacada</th>
                                <th>Nombre del archivo aviso</th>
                                <th class="py-3 text-center desktop">Archivo</th>
                                <th class="py-3 text-center all">Título</th>
                                <th class="py-3 text-center desktop">Descripción</th>
                                <th class="py-3 text-center desktop">Fecha</th>
                                <th>Fecha de modificacion</th>
                                <th class="py-3 text-center min-tablet">Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php 
                    } 
                }
            ?>
            <div id="avisos_demo" class="mt-5">
		        <h2 class="text-2xl text-black font-semibold">Avisos informativos</h2>
		        <div id="dataContainer_avisos" class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8" style="word-break:break-word;">
		        </div>
	        </div>
        </div>
        <div class="hidden bg-transparent rounded-lg" id="comunicados" role="tabpanel" aria-labelledby="comunicados-tab-profile">
            <?php 
                if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
                    if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
            ?>
                <div class="bg-white p-3 shadow-md rounded-2xl mt-5">
                    <table class="w-full" id="comunicados_table" style="display:none; word-break: break-word;">
                        <thead>
                            <tr class="bg-gray-800 text-white uppercase text-sm leading-normal">
                                <th>Creada por</th>
                                <th>Modificada por</th>
                                <th>Nombre de la foto</th>
                                <th class="py-3 text-center desktop">Imágen destacada</th>
                                <th>Nombre del archivo comunicado</th>
                                <th class="py-3 text-center desktop">Archivo</th>
                                <th class="py-3 text-center all">Título</th>
                                <th class="py-3 text-center desktop">Descripción</th>
                                <th class="py-3 text-center desktop">Fecha</th>
                                <th>Fecha de modificacion</th>
                                <th class="py-3 text-center min-tablet">Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php 
                    } 
                }
            ?>
            <div id="comunicados_demo" class="mt-5">
		        <h2 class="text-2xl text-black font-semibold">Comunicados</h2>
		        <div id="dataContainer_comunicados" class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8" style="word-break:break-word;">
		        </div>
	        </div>
        </div>
    </div>
</div>
<div id="modal-component-container" class="contenedor modal-component-container hidden fixed overflow-y-auto inset-0 bg-gray-700 bg-opacity-75">
    <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="modal-bg-container inset-0"></div>
        <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
        <div id="modal-container" class=" modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <form id="Guardar" method="post">
                <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="modal-wrapper-flex sm:flex sm:flex-col sm:items-start">
                        ...
                    </div>
                </div>
                <div class="modal-actions bg-gray-50 flex flex-col gap-3 px-4 py-3 sm:px-6 sm:flex-row-reverse">
                    ...
                </div>
            </form>
        </div>
    </div>
</div>
<style>
        /* Degradado y animación */
        .container-image {
        width: 100%;
        position: relative;
        }

    .container-image img {
        width: 100%;
        }

    .container-image::after {
        content: "";
        width: 100%; 
        height: 300px;  /* El height controla el alto del degradado */
        position: absolute;
        height:100%; /*La altura dependerá del degradado*/
        background-size: 300% 100%; 
        animation: gradient 17s cubic-bezier(0.39, 0.58, 0.57, 1) infinite;
        background-image: linear-gradient(164deg, #ff780070, #ffffff7d);
    }


@keyframes gradient {
  0% {
      background-position: 0% 50%; 
  }
  50% {
      background-position: 100% 50%;
  }
  100% {
      background-position: 0% 50%;
  }
}
</style>