<div>
    <div class="container mx-auto my-5 p-5">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Zilla+Slab+Highlight:wght@700&display=swap');
.Titulos{
    font-family: 'Poppins', sans-serif;
    color: #000000;
    font-size: 2.75rem !important;
}
    </style>
        <h2 class="Titulos text-3xl font-semibold sm:text-5xl lg:text-6xl">
            Vacaciones
        </h2>
        <div class="mt-4">
            <div class="md:flex no-wrap md:-mx-2 ">
                <div class="w-full md:w-3/12 md:mx-2">
                    <div class="bg-white shadow-md rounded-lg p-3">
                        <div class="image overflow-hidden">
                            <?php
                                if($profile -> nombre_foto != null && $profile -> foto != null){
                                    $path = __DIR__ . "/../../../src/img/imgs_uploaded/".$profile -> foto;
                                    if(!file_exists($path)){
                            ?>
                                        <img class="h-auto w-full mx-auto" src="../src/img/not_found.jpg">
                            <?php
                                    }else{
                            ?>
                                        <img class="h-auto w-full mx-auto" src="../src/img/imgs_uploaded/<?php echo $profile -> foto ?>">
                            <?php          
                                    }
                                }else{
                            ?>
                                    <img class="h-auto w-full mx-auto" src="../src/img/default-user.png">
                            <?php
                                }
                            ?>
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1"><?php echo $profile -> nombre. " " .$profile -> apellido_pat. " " .$profile -> apellido_mat; ?></h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6"><?php if(!(is_null($profile->rolnom))){ echo $profile->rolnom;}else{ echo "Sin rol"; } ?></h3>
                        <p class="text-gray-600 font-lg text-semibold leading-6"><?php if(!(is_null($profile->departamento))){ echo $profile->departamento;}else{ echo "Sin departamento"; } ?></p>
                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Situación</span>
                                <span class="ml-auto">
                                    <?php if($countexpediente > 0){ ?>
                                        <?php if($fetch_information -> esituacion_del_empleado == "ALTA"){ ?>
                                            <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Alta</span>
                                        <?php }else{ ?>
                                            <span class="bg-red-200 py-1 px-2 rounded text-white text-sm">Baja</span>
                                        <?php } ?>
                                    <?php }else{ ?>
                                        <span class="bg-black py-1 px-2 rounded text-white text-sm">N/A</span>
                                    <?php } ?>
                                </span>
                            </li>
                            <li class="flex items-center py-3" style="word-break:break-word;">
                                <span>Estatus</span>
                                <?php if($countexpediente > 0){ ?>
                                    <?php if($fetch_information -> eestatus_del_empleado == "NUEVO INGRESO"){ ?>
                                        <span class="ml-auto"><?php echo "NI"; ?></span>
                                    <?php }else if($fetch_information -> eestatus_del_empleado == "REINGRESO"){ ?>
                                        <span class="ml-auto"><?php echo "R"; ?></span>
                                    <?php }else if($fetch_information -> eestatus_del_empleado == "FALLECIMIENTO"){ ?>
                                        <span class="ml-auto"><?php echo "F"; ?></span>
                                    <?php }else if($fetch_information -> eestatus_del_empleado == "RENUNCIA VOLUNTARIA"){ ?>
                                        <span class="ml-auto"><?php echo "RV"; ?></span>
                                    <?php }else if($fetch_information -> eestatus_del_empleado == "LIQUIDACION"){ ?>
                                        <span class="ml-auto"><?php echo "L"; ?></span>
                                    <?php }else if($fetch_information -> eestatus_del_empleado == "ABANDONO DE TRABAJO"){ ?>
                                        <span class="ml-auto"><?php echo "ADT"; ?></span>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <span class="ml-auto">No hay datos</span>
                                <?php } ?>
                            </li>
                            <li class="flex items-center py-3" style="word-break:break-word;">
                                <span>Fecha</span>
                                <?php if($countexpediente > 0){ ?>
                                    <span class="ml-auto"><?php echo $fetch_information -> eestatus_fecha; ?></span>
                                <?php }else{ ?>
                                    <span class="ml-auto">No hay datos</span>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="my-4"></div>
                    <div class="bg-white shadow-md rounded-t-lg md:rounded-lg p-3 hover:shadow">
                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Información extra</span>
                        </div>
                        <div class="px-4 py-2 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                            <span class="font-medium">Alerta!</span> Las vacaciones deben disfrutarse antes de la fecha de vencimiento.
                        </div>
                        <div class="grid grid-cols-1" style="word-break:break-word;">
                            <div class="px-4 py-2 font-semibold">
                                Correo
                            </div>
                            <div class="px-4 py-2">
                                <?php echo $profile -> correo; ?>
                            </div>
                            <div class="px-4 py-2 font-semibold">
                                Vacaciones disponibles
                            </div>
                            <?php if($countexpediente > 0){ ?>
                                <?php if($fetch_information -> esituacion_del_empleado == "ALTA" && $fetch_information -> eestatus_del_empleado == "NUEVO INGRESO" || $fetch_information -> esituacion_del_empleado == "ALTA" && $fetch_information -> eestatus_del_empleado == "REINGRESO"){ ?>
                                    <span class="px-4 py-2"><?php echo $vacaciones. " días"; ?></span>
                                <?php }else{ ?>
                                    <span class="px-4 py-2">N/A</span>
                                <?php } ?>
                            <?php }else{ ?>
                                <div class="px-4 py-2">N/A</div>
                            <?php } ?>
                            <div class="px-4 py-2 font-semibold">
                                Vacaciones restantes
                            </div>
                            <?php if($countexpediente > 0){ ?>
                                <?php if($fetch_information -> esituacion_del_empleado == "ALTA" && $fetch_information -> eestatus_del_empleado == "NUEVO INGRESO" || $fetch_information -> esituacion_del_empleado == "ALTA" && $fetch_information -> eestatus_del_empleado == "REINGRESO"){ ?>
                                    <span id="dias_restantes" class="px-4 py-2"><?php echo $dias_restantes. " día(s)"; ?></span>
                                <?php }else{ ?>
                                    <span class="px-4 py-2">N/A</span>
                                <?php } ?>
                            <?php }else{ ?>
                                <div class="px-4 py-2">N/A</div>
                            <?php } ?>
                            <div class="px-4 py-2 font-semibold">
                                Fecha de vencimiento
                            </div>
                            <?php if($countexpediente > 0){ ?>
                                <?php if($fetch_information -> esituacion_del_empleado == "ALTA" && $fetch_information -> eestatus_del_empleado == "NUEVO INGRESO" || $fetch_information -> esituacion_del_empleado == "ALTA" && $fetch_information -> eestatus_del_empleado == "REINGRESO"){ ?>
                                    <span class="px-4 py-2"><?php echo $fecha_vencimiento; ?></span>
                                <?php }else{ ?>
                                    <span class="px-4 py-2">N/A</span>
                                <?php } ?>
                            <?php }else{ ?>
                                <div class="px-4 py-2">N/A</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 h-64">
                    <form id="Guardar" method="post">
                        <div class="bg-white p-3 shadow-md rounded-b-lg md:rounded-lg">
                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                <svg aria-hidden="true" class="h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="tracking-wide">Solicitar vacaciones</span>
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label class="text-[#64748b] font-semibold mb-2">Periodo de las vacaciones a tomar</label>
                                <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                        </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="periodo_vacaciones" name="periodo_vacaciones" placeholder="Periodo de las vacaciones a tomar" autocomplete="off" aria-invalid="false">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 mt-5 text-center">
                                <div id="submit-vacaciones">
                                    <button class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700" id="guardar_general" name="guardar_general" type="submit">
                                        Solicitar vacaciones
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="my-4"></div>
                    <div class="bg-white p-3 shadow-md rounded-lg">
                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8 mb-3">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M13,9.5H18V7.5H13V9.5M13,16.5H18V14.5H13V16.5M19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21M6,11H11V6H6V11M7,7H10V10H7V7M6,18H11V13H6V18M7,14H10V17H7V14Z"></path>
                            </svg>
                            <span class="tracking-wide">Tabla de vacaciones</span>
                        </div>
                        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true"){ ?>
                            <div class="grid grid-cols-1">
                                <label class="text-[#64748b] font-semibold mb-2">Filtrar vacaciones por periodo</label>
                                <div class="group flex">
                                    <div class="w-10 z-10 pr-2.5 text-center pointer-events-none flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                        </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-7 py-2 rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-celeste-600" type="text" id="periodo_buscar" name="periodo_buscar" placeholder="Filtrar vacaciones por periodo" autocomplete="off" aria-invalid="false">
                                </div>
                            </div>
                        <?php } ?>
                        <div id="DT-div" style="display:none;">
                            <table class="w-full" id="datatable">
                                <thead>
                                <tr class="text-white uppercase text-sm leading-normal" style="font-size: 13px !important; background-color: #000000bd !important;">                                 
                                        <th>Solicitud_id</th>
                                        <th class="py-3 text-left all">Nombre</th>
                                        <th class="py-3 text-center desktop">Periodo</th>
                                        <th class="py-3 text-center desktop">Fecha solicitud</th>
                                        <th class="py-3 text-center desktop">Estatus</th>
                                        <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                            <th class="py-3 text-center min-tablet"></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
	<div id="modal-component-container" class="contenedor modal-component-container hidden fixed overflow-y-auto inset-0 bg-gray-700 bg-opacity-75" style="z-index:100;">
		<div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
			<div class="modal-bg-container inset-0"></div>
			<div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
			<div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
				<form id="vacaciones-guardar" method="post">
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
        <style>
    		.btn-celeste{
		background-color: #00a3ff  !important;
		border: none !important;
		box-shadow: 3px 3px 4px 0px rgb(0 0 0 / 22%) !important;
		font-weight: 500 !important;
		border-bottom: #fff 9px;
	}
	
		.btn-celeste:hover{
		background-color: #008eff !important;
	}
    </style>
	</div>
<?php } ?>