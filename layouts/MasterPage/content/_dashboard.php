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
                    <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="noticias-tab-profile" data-tabs-target="#noticias" type="button" role="tab" aria-controls="noticias" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24"><path fill="currentColor" d="M20 5L20 19L4 19L4 5H20M20 3H4C2.89 3 2 3.89 2 5V19C2 20.11 2.89 21 4 21H20C21.11 21 22 20.11 22 19V5C22 3.89 21.11 3 20 3M18 15H6V17H18V15M10 7H6V13H10V7M12 9H18V7H12V9M18 11H12V13H18V11Z" /></svg>
                        <span>Noticias</span>
                    </button>
                </li>
                <li role="presentation" class="w-full md:w-max">
                    <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="buzon-tab-profile" data-tabs-target="#buzon" type="button" role="tab" aria-controls="buzon" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>
                        <span>Buzón de entrada</span>
                    </button>
                </li>
                <li role="presentation" class="w-full md:w-max">
                    <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="avisos-tab-profile" data-tabs-target="#avisos" type="button" role="tab" aria-controls="avisos" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24"><path fill="currentColor" d="M12.04,2.5L9.53,5H14.53L12.04,2.5M4,7V20H20V7H4M12,0L17,5V5H20A2,2 0 0,1 22,7V20A2,2 0 0,1 20,22H4A2,2 0 0,1 2,20V7A2,2 0 0,1 4,5H7V5L12,0M7,18V14H12V18H7M14,17V10H18V17H14M6,12V9H11V12H6Z" /></svg>
                        <span>Avisos de ocasión</span>
                    </button>
                </li>
                <li role="presentation" class="w-full md:w-max">
                    <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="bolsa-tab-profile" data-tabs-target="#bolsa" type="button" role="tab" aria-controls="bolsa" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24"><path fill="currentColor" d="M18,19H6V17.6C6,15.6 10,14.5 12,14.5C14,14.5 18,15.6 18,17.6M12,7A3,3 0 0,1 15,10A3,3 0 0,1 12,13A3,3 0 0,1 9,10A3,3 0 0,1 12,7M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z" /></svg>
                        <span>Bolsa de trabajo</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <div id="profileContent">
        <div class="block bg-transparent rounded-lg" id="vision" role="tabpanel" aria-labelledby="vision-tab-profile">

            <?php if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
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
            <?php } ?>

            <div class="mt-8">

            </div>
        </div>
        <div class="hidden p-4 bg-white rounded-lg" id="noticias" role="tabpanel" aria-labelledby="noticias-tab-profile">
            <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800">Dashboard tab's associated content</strong>. Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 bg-white rounded-lg" id="buzon" role="tabpanel" aria-labelledby="buzon-tab-profile">
            <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800">Settings tab's associated content</strong>. Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 bg-white rounded-lg" id="avisos" role="tabpanel" aria-labelledby="avisos-tab-profile">
            <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800">Contacts tab's associated content</strong>. Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 bg-white rounded-lg" id="bolsa" role="tabpanel" aria-labelledby="bolsa-tab-profile">
            <p class="text-sm text-gray-500">This is some placeholder content the <strong class="font-medium text-gray-800">Contacts tab's associated content</strong>. Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
    </div>
</div>