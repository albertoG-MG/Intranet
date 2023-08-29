<div class="container mx-auto px-6 py-8">
    <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
        Dashboard
    </h2>

    <div class="mt-4">
        <div class="bg-white overflow-hidden shadow-xl rounded-lg" style="background-image: url(../src/img/profile.jpg); background-size: cover; background-position:center; background-repeat:no-repeat;">
            <div class="flex flex-col">
                <div class="rounded-3xl p-4 m-4">
                    <div class="flex-none text-center items-center sm:flex">
                        <div class="relative shrink-0 h-32 w-32 mx-auto md:m-0 sm:mb-0 mb-3">
                            <?php
                                if($profile -> nombre_foto != null && $profile -> foto != null){
                                    $path = __DIR__ . "/../../../src/img/imgs_uploaded/".$profile -> foto;
                                    if(!file_exists($path)){
                            ?>
                                        <img class="w-32 h-32 object-cover rounded-2xl" src="../src/img/not_found.jpg">
                            <?php
                                    }else{
                            ?>
                                        <img class="w-32 h-32 object-cover rounded-2xl" src="../src/img/imgs_uploaded/<?php echo $profile -> foto ?>">
                            <?php          
                                    }
                                }else{
                            ?>
                                    <img class=" w-32 h-32 object-cover rounded-2xl" src="../src/img/default-user.png">
                            <?php
                                }
                            ?>
                        </div>
                        <div class="flex-1 flex flex-col min-w-0 sm:ml-5 text-center md:text-left sm:mt-2" style="word-break: break-word;">
							<span class="text-lg text-white font-bold leading-none">
								<?php echo $profile->nombre. " " .$profile->apellido_pat. " " .$profile->apellido_mat;?>
							</span>
							<span class="text-white my-1">
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
                    <button class="menu-active w-full group flex items-center space-x-2 rounded-lg bg-[#4f46e5] px-4 py-2.5 tracking-wide text-white outline-none transition-all" id="vision-tab-profile" data-tabs-target="#vision" type="button" role="tab" aria-controls="vision" aria-selected="false">
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

            <div class="mt-8">

            </div>
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
        <div class="hidden p-4 bg-white rounded-lg" id="comunicados" role="tabpanel" aria-labelledby="comunicados-tab-profile">
            <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800">Contacts tab's associated content</strong>. Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
    </div>
</div>
<div id="modal-component-container" class="modal-component-container hidden fixed inset-0">
    <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
        <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
        <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
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