<div class="container mx-auto px-6 py-8">
   <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
      Perfil
   </h2>
   <div class="mt-4">
      <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
         <div class="col-span-12 lg:col-span-4">
            <div class="relative min-w-[1px] flex flex-col text-[#64748b] rounded-lg bg-white p-4 sm:p-5" style="box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow) !important; --tw-shadow: 0 3px 10px 0 rgb(48 46 56/6%) !important; --tw-shadow-colored: 0 3px 10px 0 var(--tw-shadow-color) !important;">
               <div class="flex items-center space-x-4">
                  <div class="relative inline-flex shrink-0 h-14 w-14">
                     <?php
                        if($profile -> nombre_foto != null && $profile -> foto != null){
                        	$path = __DIR__ . "/../../../src/img/imgs_uploaded/".$profile -> foto;
                        	if(!file_exists($path)){
                        ?>
                     <img class="rounded-full" src="../src/img/not_found.jpg">
                     <?php
                        }else{
                        ?>
                     <img class="rounded-full" src="../src/img/imgs_uploaded/<?php echo $profile -> foto ?>">
                     <?php          
                        }
                        }else{
                        ?>
                     <img class="rounded-full" src="../src/img/default-user.png">
                     <?php
                        }
                        ?>
                  </div>
                  <div>
                     <h3 class="text-base font-medium text-slate-700" style="word-break: break-word;">
                        <?php echo $profile->nombre. " " .$profile->apellido_pat. " " .$profile->apellido_mat;?>
                     </h3>
                     <p class="text-[.8125rem] leading-[1.125rem]" style="word-break: break-word;"><?php echo $profile->rolnom; ?></p>
                  </div>
               </div>
               <ul class="mt-6 space-y-1.5 font-medium" id="tabAjustes" role="tablist">
                  <li role="presentation">
                     <button class="w-full group flex items-center space-x-2 rounded-lg bg-[#4f46e5] px-4 py-2.5 tracking-wide text-white outline-none transition-all" id="general-tab" data-tabs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                           <title>account-outline</title>
                           <path fill="CurrentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6M12,13C14.67,13 20,14.33 20,17V20H4V17C4,14.33 9.33,13 12,13M12,14.9C9.03,14.9 5.9,16.36 5.9,17V18.1H18.1V17C18.1,16.36 14.97,14.9 12,14.9Z" />
                        </svg>
                        <span>Información general</span>
                     </button>
                  </li>
                  <li role="presentation">
                     <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="password-tab" data-tabs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                           <title>key-outline</title>
                           <path fill="CurrentColor" d="M21 18H15V15H13.3C12.2 17.4 9.7 19 7 19C3.1 19 0 15.9 0 12S3.1 5 7 5C9.7 5 12.2 6.6 13.3 9H24V15H21V18M17 16H19V13H22V11H11.9L11.7 10.3C11 8.3 9.1 7 7 7C4.2 7 2 9.2 2 12S4.2 17 7 17C9.1 17 11 15.7 11.7 13.7L11.9 13H17V16M7 15C5.3 15 4 13.7 4 12S5.3 9 7 9 10 10.3 10 12 8.7 15 7 15M7 11C6.4 11 6 11.4 6 12S6.4 13 7 13 8 12.6 8 12 7.6 11 7 11Z" />
                        </svg>
                        <span>Cambiar contraseña</span>
                     </button>
                  </li>
                  <li role="presentation">
                     <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" id="expediente-tab" data-tabs-target="#expediente" type="button" role="tab" aria-controls="expediente" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                           <title>eye-outline</title>
                           <path fill="CurrentColor" d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z" />
                        </svg>
                        <span>Mostrar expediente</span>
                     </button>
                  </li>
               </ul>
            </div>
         </div>
         <div class="col-span-12 lg:col-span-8">
            <div class="relative min-w-[1px] flex flex-col text-[#64748b] rounded-lg bg-white" style="box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow) !important; --tw-shadow: 0 3px 10px 0 rgb(48 46 56/6%) !important; --tw-shadow-colored: 0 3px 10px 0 var(--tw-shadow-color) !important;">
               <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                  <h2 class="text-lg font-medium tracking-wide text-slate-700" id="tabTitulo">
                     Información general
                  </h2>
               </div>
               <div id="tabContent">
                  <div class="block bg-transparent rounded-lg" id="general" role="tabpanel" aria-labelledby="general-tab">
                     <div class="p-4 sm:p-5">
                        <form id="formGeneral">
                           <div class="flex flex-col items-center md:items-start mx-7">
                              <span class="text-[#64748b] font-semibold">Avatar</span>
                              <div class="inline-flex shrink-0 relative mt-1.5 h-20 w-20">
                                 <?php
                                    if($profile -> nombre_foto != null && $profile -> foto != null){
                                    $path = __DIR__ . "/../../../src/img/imgs_uploaded/".$profile -> foto;
                                    if(!file_exists($path)){
                                    ?>
                                 <img src="../src/img/not_found.jpg" class="rounded-xl">
                                 <?php
                                    }else{
                                    ?>
                                 <img src="../src/img/imgs_uploaded/<?php echo $profile -> foto ?>" class="rounded-xl">
                                 <?php          
                                    }
                                    }else{
                                    ?>
                                 <img src="../src/img/default-user.png" class="rounded-xl">
                                 <?php
                                    }
                                    ?>
                                 <div class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white">
                                    <button class="outline-none h-6 w-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 m-auto" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                       </svg>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <div class="my-7 h-px bg-slate-200"></div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">
                              Nombre
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M16.84,2.73C16.45,2.73 16.07,2.88 15.77,3.17L13.65,5.29L18.95,10.6L21.07,8.5C21.67,7.89 21.67,6.94 21.07,6.36L17.9,3.17C17.6,2.88 17.22,2.73 16.84,2.73M12.94,6L4.84,14.11L7.4,14.39L7.58,16.68L9.86,16.85L10.15,19.41L18.25,11.3M4.25,15.04L2.5,21.73L9.2,19.94L8.96,17.78L6.65,17.61L6.47,15.29" />
                                    </svg>
                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="nombre" name="nombre" placeholder="i.e. José Juan" aria-describedby="nombre_help" value="">
                              </div>
                              <div id="nombre_help" class="text-[#64748b]">
                                 Se permite la letra ñ, acentos, guiones(-) y apóstrofes.
                              </div>
                           </div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">
                              Apellido paterno
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M16.84,2.73C16.45,2.73 16.07,2.88 15.77,3.17L13.65,5.29L18.95,10.6L21.07,8.5C21.67,7.89 21.67,6.94 21.07,6.36L17.9,3.17C17.6,2.88 17.22,2.73 16.84,2.73M12.94,6L4.84,14.11L7.4,14.39L7.58,16.68L9.86,16.85L10.15,19.41L18.25,11.3M4.25,15.04L2.5,21.73L9.2,19.94L8.96,17.78L6.65,17.61L6.47,15.29" />
                                    </svg>
                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="apellido_pat" name="apellido_pat" placeholder="i.e. Caballero-Plasencia" aria-describedby="apellido_pat_help" value="">
                              </div>
                              <div id="apellido_pat_help" class="text-[#64748b]">
                                 Se permite la letra ñ, acentos, guiones(-) y apóstrofes.
                              </div>
                           </div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">
                              Apellido materno
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M16.84,2.73C16.45,2.73 16.07,2.88 15.77,3.17L13.65,5.29L18.95,10.6L21.07,8.5C21.67,7.89 21.67,6.94 21.07,6.36L17.9,3.17C17.6,2.88 17.22,2.73 16.84,2.73M12.94,6L4.84,14.11L7.4,14.39L7.58,16.68L9.86,16.85L10.15,19.41L18.25,11.3M4.25,15.04L2.5,21.73L9.2,19.94L8.96,17.78L6.65,17.61L6.47,15.29" />
                                    </svg>
                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="apellido_mat" name="apellido_mat" placeholder="i.e. Plasencia'Ramírez" aria-describedby="apellido_mat_help" value="">
                              </div>
                              <div id="apellido_mat_help" class="text-[#64748b]">
                                 Se permite la letra ñ, acentos, guiones(-) y apóstrofes.
                              </div>
                           </div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">
                              Correo
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                                    </svg>
                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="correo" name="correo" placeholder="i.e. example@example.com" value="">
                              </div>
                           </div>
                           <div class="mt-12 h-px bg-slate-200"></div>
                           <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                              <button class="button bg-white border border-gray-300 hover:bg-gray-50 active:bg-gray-100 text-gray-600 rounded-md h-11 px-8 py-2" id="reset_general" type="button">
                              Resetear
                              </button>
                              <button class="button bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white rounded-md h-11 px-8 py-2" id="guardar_general" type="submit">
                              Guardar
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="hidden bg-transparent rounded-lg" id="password" role="tabpanel" aria-labelledby="password-tab">
                     <div class="p-4 sm:p-5">
                        <form id="formPassword">
                           <div x-data="{showen:true}" class="grid grid-cols-1 mt-5 mx-7">
                              <div x-show="showen">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                 Nueva contraseña
                                 </label>
                                 <div class="group flex" x-data="{isshow:false}">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 -mr-10 px-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-bind:type="isshow ? 'text' : 'password'" type="password" id="new_password" name="new_password" aria-describedby="new_password_help" placeholder="Nueva contraseña">
                                    <button type="button" @click="isshow=!isshow" class="z-30 mt-1 text-gray-600">
                                       <svg x-show="!isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                       </svg>
                                       <svg x-show="isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                       </svg>
                                    </button>
                                 </div>
                              </div>
                              <div id="new_password_help" class="text-[#64748b]">
                                 La contraseña debe contener un número, una letra en mayúscula y en minúscula y un simbolo especial(!@#$%&*). 
                              </div>
                           </div>
                           <div x-data="{showen:true}" class="grid grid-cols-1 mt-5 mx-7">
                              <div x-show="showen">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                 Confirmar nueva contraseña
                                 </label>
                                 <div class="group flex" x-data="{isshow:false}">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 -mr-10 px-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-bind:type="isshow ? 'text' : 'password'" type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar nueva contraseña">
                                    <button type="button" @click="isshow=!isshow" class="z-30 mt-1 text-gray-600">
                                       <svg x-show="!isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                       </svg>
                                       <svg x-show="isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                       </svg>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">
                              Contraseña actual
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                    </svg>
                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="password" id="current_password" name="current_password" placeholder="Contraseña actual">
                              </div>
                           </div>
                           <div class="mt-12 h-px bg-slate-200"></div>
                           <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                              <button class="button bg-white border border-gray-300 hover:bg-gray-50 active:bg-gray-100 text-gray-600 rounded-md h-11 px-8 py-2" id="reset_password" type="button">
                              Resetear
                              </button>
                              <button class="button bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white rounded-md h-11 px-8 py-2" id="guardar_password" type="submit">
                              Guardar
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="hidden bg-transparent rounded-lg" id="expediente" role="tabpanel" aria-labelledby="expediente-tab">
                     <div class="p-4 sm:p-5">
                        <ul id='menu' class='flex flex-col items-center md:flex-row md:flex-wrap w-full p-4 mt-5 gap-3'>
                           <li role="presentation" class="w-full md:w-max">
                              <button class="menu-active w-full group flex items-center space-x-2 rounded-lg bg-[#4f46e5] px-4 py-2.5 tracking-wide text-white outline-none transition-all" id="datosG-tab" data-tabs-target="#datosG" type="button" role="tab" aria-controls="datosG" aria-selected="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                    <title>file-account-outline</title>
                                    <path fill="currentColor" d="M14 2H6C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H18C19.11 22 20 21.11 20 20V8L14 2M18 20H6V4H13V9H18V20M13 13C13 14.1 12.1 15 11 15S9 14.1 9 13 9.9 11 11 11 13 11.9 13 13M15 18V19H7V18C7 16.67 9.67 16 11 16S15 16.67 15 18Z" />
                                 </svg>
                                 <span>Datos generales</span>
                              </button>
                           </li>
                           <li role="presentation" class="w-full md:w-max">
                              <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="datosA-tab" data-tabs-target="#datosA" type="button" role="tab" aria-controls="datosA" aria-selected="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                                    <title>file-edit-outline</title>
                                    <path fill="currentColor" d="M10 20H6V4H13V9H18V12.1L20 10.1V8L14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20M20.2 13C20.3 13 20.5 13.1 20.6 13.2L21.9 14.5C22.1 14.7 22.1 15.1 21.9 15.3L20.9 16.3L18.8 14.2L19.8 13.2C19.9 13.1 20 13 20.2 13M20.2 16.9L14.1 23H12V20.9L18.1 14.8L20.2 16.9Z" />
                                 </svg>
                                 <span>Datos Adicionales</span>
                              </button>
                           </li>
                           <li role="presentation" class="w-full md:w-max">
                              <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="datosB-tab" data-tabs-target="#datosB" type="button" role="tab" aria-controls="datosB" aria-selected="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                                    <title>bank</title>
                                    <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                 </svg>
                                 <span>Datos Bancarios</span>
                              </button>
                           </li>
                           <li role="presentation" class="w-full md:w-max">
                              <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="documentos-tab" data-tabs-target="#documentos" type="button" role="tab" aria-controls="documentos" aria-selected="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                                    <title>file-document</title>
                                    <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" />
                                 </svg>
                                 <span>Papelería recibida</span>
                              </button>
                           </li>
                        </ul>
                        <div id='menu-contents' style="word-break: break-word;">
                           <div class="block bg-transparent rounded-lg" id="datosG" role="tabpanel" aria-labelledby="datosG-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos del empleado</h2>
                                 <span class="text-[#64748b]">Información personal del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Número de empleado:
                                    </div>
                                    <span>
                                    <?php if($view->enum_empleado == null){ echo "No hay datos"; }else{echo "{$view->enum_empleado}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Departamento:
                                    </div>
                                    <span>
                                    <?php if($profile->departamento == null){ echo "No hay datos"; }else{echo "{$profile->departamento}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Puesto:
                                    </div>
                                    <span>
                                    <?php if($view->epuesto == null){ echo "No hay datos"; }else{echo "{$view->epuesto}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Nivel de estudios:
                                    </div>
                                    <span>
                                    <?php if($view->eestudios == null){ echo "No hay datos"; }else{echo "{$view->eestudios}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Correo electrónico:
                                    </div>
                                    <span>
                                    <?php if($profile->correo == null){ echo "No hay datos"; }else{echo "{$profile->correo}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Correo electrónico adicional:
                                    </div>
                                    <span>
                                    <?php if($view->eposee_correo == "no"){ echo "No posee un correo electrónico adicional"; }else{echo "{$view->ecorreo_personal}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos de ubicación</h2>
                                 <span class="text-[#64748b]">Datos de ubicación del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Calle:
                                    </div>
                                    <span>
                                    <?php if($view->ecalle == null){ echo "No hay datos"; }else{echo "{$view->ecalle}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Número interior:
                                    </div>
                                    <span>
                                    <?php if($view->enum_exterior == null){ echo "No hay datos"; }else{echo "{$view->enum_exterior}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Número exterior:
                                    </div>
                                    <span>
                                    <?php if($view->enum_exterior == null){ echo "No hay datos"; }else{echo "{$view->enum_exterior}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Colonia:
                                    </div>
                                    <span>
                                    <?php if($view->ecolonia == null){ echo "No hay datos"; }else{echo "{$view->ecolonia}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Estado:
                                    </div>
                                    <span>
                                    <?php mb_internal_encoding('UTF-8'); if($count_estado == 0){echo "No hay datos";}else{ $state=ucfirst(mb_strtolower($ver_estado->nombre)); echo "{$state}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Municipio:
                                    </div>
                                    <span>
                                    <?php mb_internal_encoding('UTF-8'); if($count_municipio == 0){echo "No hay datos";}else{ $city=ucfirst(mb_strtolower($ver_municipio->nombre)); echo "{$city}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Código postal:
                                    </div>
                                    <span>
                                    <?php if($view->ecodigo == null){ echo "No hay datos"; }else{echo "{$view->ecodigo}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Teléfono del domicilio:
                                    </div>
                                    <span>
                                    <?php if($view->etel_dom == null){ echo "No hay datos"; }else{echo "{$view->etel_dom}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Teléfono propio:
                                    </div>
                                    <span>
                                    <?php if($view->eposee_telmov == "no"){ echo "No posee un teléfono propio"; }else{echo "{$view->etel_mov}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Dispositivos proporcionados por la empresa</h2>
                                 <span class="text-[#64748b]">Información sobre los dispositivos proporcionados por la empresa.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       ¿Teléfono proporcionado por la empresa?:
                                    </div>
                                    <span>
                                    <?php if($view -> eposee_telempresa == "no"){ echo "Sin teléfono proporcionado por la empresa"; }else{echo "{$view -> eposee_telempresa}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div x-data="{ showtelefonoempresa:  <?php if($view -> eposee_telempresa == "no"){ echo "false";  }else{ echo "true";} ?>}">
                                 <div x-show="showtelefonoempresa">
                                    <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Marcación corta:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$view -> emarcacion}";} ?>
                                          </span>
                                       </div>
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Número de serie:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$view -> eserie}";} ?>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             SIM:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$view -> esim}";} ?>
                                          </span>
                                       </div>
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Número de red:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$view -> enumred}";} ?>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Modelo:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$view -> modeltel}";} ?>
                                          </span>
                                       </div>
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Marca:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$view -> marcatel}";} ?>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex flex-col mx-7">
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             IMEI:
                                          </div>
                                          <span>
                                          <?php if($view->eposee_telmov == "no"){ echo "No hay datos"; }else{echo "{$view->eimei}";} ?>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       ¿Laptop asignado por la empresa?:
                                    </div>
                                    <span>
                                    <?php if($view -> eposee_laptop == "no"){ echo "Sin laptop proporcionado por la empresa"; }else{echo "{$view -> eposee_laptop}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div x-data="{ showlaptopempresa:  <?php if($view -> eposee_laptop == "no"){ echo "false";  }else{ echo "true";} ?>}">
                                 <div x-show="showlaptopempresa">
                                    <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Marca de la laptop:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_laptop == "no"){ echo "No hay datos"; }else{echo "{$view -> emarca_laptop}";} ?>
                                          </span>
                                       </div>
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Modelo de la laptop:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_laptop == "no"){ echo "No hay datos"; }else{echo "{$view -> emodelo_laptop}";} ?>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="flex flex-col mx-7">
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Serie de la laptop:
                                          </div>
                                          <span>
                                          <?php if($view -> eposee_laptop == "no"){ echo "No hay datos"; }else{echo "{$view -> eserie_laptop}";} ?>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos relevantes del empleado</h2>
                                 <span class="text-[#64748b]">Otros datos de interés del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       ¿Casa propia?:
                                    </div>
                                    <span>
                                    <?php if($view -> ecasa_propia == null){ echo "No hay datos"; }else{echo "{$view -> ecasa_propia}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Estado civil:
                                    </div>
                                    <span>
                                    <?php if($view -> eecivil == null){ echo "No hay datos"; }else{echo "{$view -> eecivil}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Monto mensual de retención:
                                    </div>
                                    <span>
                                    <?php if($view -> eposee_retencion == "no"){ echo "No tiene retención"; }else{echo "{$view -> emonto_mensual}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Fecha de nacimiento:
                                    </div>
                                    <span>
                                    <?php if($view -> efecha_nacimiento == null){ echo "No hay datos"; }else{echo "{$view -> efecha_nacimiento}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Fecha de inicio de contrato:
                                    </div>
                                    <span>
                                    <?php if($view -> efecha_inicioc == null){ echo "No hay datos"; }else{echo "{$view -> efecha_inicioc}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Fecha de alta:
                                    </div>
                                    <span>
                                    <?php if($view -> efecha_alta == null){ echo "No hay datos"; }else{echo "{$view -> efecha_alta}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Salario en el contrato de trabajo:
                                    </div>
                                    <span>
                                    <?php if($view -> esalario_contrato == null){ echo "No hay datos"; }else{echo "{$view -> esalario_contrato}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Salario en la fecha de alta:
                                    </div>
                                    <span>
                                    <?php if($view -> esalario_fechaalta == null){ echo "No hay datos"; }else{echo "{$view -> esalario_fechaalta}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Observaciones:
                                    </div>
                                    <span>
                                    <?php if($view -> eobservaciones == null){ echo "Sin observaciones"; }else{echo "{$view -> eobservaciones}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Curp:
                                    </div>
                                    <span>
                                    <?php if($view -> ecurp == null){ echo "No hay datos"; }else{echo "{$view -> ecurp}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Número de seguro social:
                                    </div>
                                    <span>
                                    <?php if($view -> enss == null){ echo "No hay datos"; }else{echo "{$view -> enss}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       RFC:
                                    </div>
                                    <span>
                                    <?php if($view -> erfc == null){ echo "No hay datos"; }else{echo "{$view -> erfc}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Tipo de identificación:
                                    </div>
                                    <span>
                                    <?php if($view -> etipo_identificacion == null){ echo "No hay datos"; }else{echo "{$view -> etipo_identificacion}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div x-data="{ showidentificacion:  <?php if($view -> etipo_identificacion == null){ echo "false";  }else{ echo "true";} ?>}">
                                 <div x-show="showidentificacion">
                                    <div class="flex flex-col mx-7">
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Número de identificación:
                                          </div>
                                          <span>
                                          <?php if($view -> enum_identificacion == null){ echo "Sin identificación"; }else{echo "{$view -> enum_identificacion}";} ?>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <div class="my-3 h-px bg-slate-200"></div>
                                 <div class="self-end mt-3">
                                    <button type="button" id="siguiente" name="siguiente" class="button bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white rounded-md h-11 px-8 py-2">Siguiente</button>
                                 </div>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg" id="datosA" role="tabpanel" aria-labelledby="datosA-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos adicionales del empleado</h2>
                                 <span class="text-[#64748b]">En esta sección encontrará información extra del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Referencias laborales:
                                    </div>
                                    <div id="referencias" class="mt-5">
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Uniformes</h2>
                                 <span class="text-[#64748b]">Datos de entrega de uniforme.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Fecha de entrega de uniforme:
                                    </div>
                                    <span>
                                    <?php if($view->efecha_enuniforme == null){ echo "No se ha entregado uniforme"; }else{echo "{$view->efecha_enuniforme}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Cantidad (camisa):
                                    </div>
                                    <span>
                                    <?php if($view->ecantidad_polo == null){ echo "No se ha entregado uniforme"; }else{echo "{$view->ecantidad_polo}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Talla (camisa):
                                    </div>
                                    <span>
                                    <?php if($view->etalla_polo == null){ echo "No hay datos"; }else{echo "{$view->etalla_polo}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Contactos de emergencia</h2>
                                 <span class="text-[#64748b]">Estos son los contactos de emergencia del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Nombre completo:
                                    </div>
                                    <span>
                                    <?php if($view->eemergencia_nombre == null){ echo "No hay datos"; }else{echo "{$view->eemergencia_nombre}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Parentesco:
                                    </div>
                                    <span>
                                    <?php if($view -> eemergencia_parentesco == null){ echo "No hay datos"; }else{echo "{$view -> eemergencia_parentesco}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Teléfono:
                                    </div>
                                    <span>
                                    <?php if($view->eemergencia_telefono == null){ echo "No hay datos"; }else{echo "{$view->eemergencia_telefono}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Nombre completo2:
                                    </div>
                                    <span>
                                    <?php if($view -> eemergencia_nombre2 == null){ echo "No hay datos"; }else{echo "{$view -> eemergencia_nombre2}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Parentesco2:
                                    </div>
                                    <span>
                                    <?php if($view -> eemergencia_parentesco2 == null){ echo "No hay datos"; }else{echo "{$view -> eemergencia_parentesco2}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Teléfono2:
                                    </div>
                                    <span>
                                    <?php if($view -> eemergencia_telefono2 == null){ echo "No hay datos"; }else{echo "{$view -> eemergencia_telefono2}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Otros datos del empleado</h2>
                                 <span class="text-[#64748b]">En esta sección encontrará datos extra del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Capacitacion:
                                    </div>
                                    <span>
                                    <?php if($view->ecapacitacion == null){ echo "No hay datos"; }else{echo "{$view->ecapacitacion}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Resultado antidoping:
                                    </div>
                                    <span>
                                    <?php if($view->eresultado_antidoping == null){ echo "No hay datos"; }else{echo "{$view->eresultado_antidoping}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       ¿Cómo se entero de la vacante?:
                                    </div>
                                    <span>
                                    <?php if($view->evacante == null){ echo "No hay datos"; }else{echo "{$view->evacante}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       ¿Tiene familiares en la empresa?:
                                    </div>
                                    <span>
                                    <?php if($view->efam_dentro_empresa == null){ echo "No hay datos"; }else{echo "{$view->efam_dentro_empresa}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div x-data="{ showfamiliar:  <?php if($view -> efam_nombre == null){ echo "false";  }else{ echo "true";} ?>}">
                                 <div x-show="showfamiliar">
                                    <div class="flex flex-col mx-7">
                                       <div class="flex-1 flex flex-col mt-5">
                                          <div class="text-[#64748b] font-semibold">
                                             Nombre completo del familiar:
                                          </div>
                                          <span>
                                          <?php if($view->efam_nombre == null){ echo "No hay datos"; }else{echo "{$view->efam_nombre}";} ?>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <div class="my-3 h-px bg-slate-200"></div>
                                 <div class="self-end mt-3">
                                    <button type="button" id="anterior" name="anterior" class="button bg-white border border-gray-300 hover:bg-gray-50 active:bg-gray-100 text-gray-600 rounded-md h-11 px-8 py-2">Anterior</button>
                                    <button type="button" id="siguiente2" name="siguiente2" class="button bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white rounded-md h-11 px-8 py-2">Siguiente</button>
                                 </div>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg" id="datosB" role="tabpanel" aria-labelledby="datosB-tab">
                           </div>
                           <div class="hidden bg-transparent rounded-lg" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>