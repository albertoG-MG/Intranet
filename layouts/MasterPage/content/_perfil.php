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
      Perfil
   </h2>
   <div class="mt-4">
      <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
         <div class="col-span-12 lg:col-span-4">
            <div class="relative min-w-[1px] flex flex-col text-[#64748b] rounded-lg bg-white p-4 sm:p-5" style="box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow) !important; --tw-shadow: 0 3px 10px 0 rgb(48 46 56/6%) !important; --tw-shadow-colored: 0 3px 10px 0 var(--tw-shadow-color) !important;">
            <?php if ( Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") { ?> 
  
            <div class="flex items-center space-x-4">
                  <div class="relative inline-flex shrink-0 h-14 w-14">
                     <?php
                        if($profile -> nombre_foto != null && $profile -> foto != null){
                        	$path = __DIR__ . "/../../../src/img/imgs_uploaded/".$profile -> foto;
                        	if(!file_exists($path)){
                        ?>
                     <img id="photo-perfil" class="rounded-full" src="../src/img/not_found.jpg">
                     <?php
                        }else{
                        ?>
                     <img id="photo-perfil" class="rounded-full" src="../src/img/imgs_uploaded/<?php echo $profile -> foto ?>">
                     <?php          
                        }
                        }else{
                        ?>
                     <img id="photo-perfil" class="rounded-full" src="../src/img/default-user.png">
                     <?php
                        }
                        ?>
                  </div>
                  <div>

                  <?php  } ?>  
                     <h3 class="text-base font-medium text-slate-700" id="profile-name" style="word-break: break-word;">
                        <?php echo $profile->nombre. " " .$profile->apellido_pat. " " .$profile->apellido_mat;?>
                     </h3>
                     <p class="text-[.8125rem] leading-[1.125rem]" style="word-break: break-word;"><?php if(!(is_null($profile->rolnom))){ echo $profile->rolnom;}else{ echo "Sin rol"; } ?></p>
                  </div>
               </div>
               <ul class="mt-6 space-y-1.5 font-medium" id="tabAjustes" role="tablist">
                  <li role="presentation">
                     <button class="w-full group flex items-center space-x-2 rounded-lg bg-[#27ceeb] px-4 py-2.5 tracking-wide text-white outline-none transition-all" id="general-tab" data-tabs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                           <path fill="CurrentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6M12,13C14.67,13 20,14.33 20,17V20H4V17C4,14.33 9.33,13 12,13M12,14.9C9.03,14.9 5.9,16.36 5.9,17V18.1H18.1V17C18.1,16.36 14.97,14.9 12,14.9Z" />
                        </svg>
                        <span>Información general</span>
                     </button>
                  </li>
                  <li role="presentation">
                     <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="password-tab" data-tabs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                           <path fill="CurrentColor" d="M21 18H15V15H13.3C12.2 17.4 9.7 19 7 19C3.1 19 0 15.9 0 12S3.1 5 7 5C9.7 5 12.2 6.6 13.3 9H24V15H21V18M17 16H19V13H22V11H11.9L11.7 10.3C11 8.3 9.1 7 7 7C4.2 7 2 9.2 2 12S4.2 17 7 17C9.1 17 11 15.7 11.7 13.7L11.9 13H17V16M7 15C5.3 15 4 13.7 4 12S5.3 9 7 9 10 10.3 10 12 8.7 15 7 15M7 11C6.4 11 6 11.4 6 12S6.4 13 7 13 8 12.6 8 12 7.6 11 7 11Z" />
                        </svg>
                        <span>Cambiar contraseña</span>
                     </button>
                  </li>
                  <?php if($switchExpedientes == "true"){ ?>
                  <li role="presentation">
                     <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" id="expediente-tab" data-tabs-target="#expediente" type="button" role="tab" aria-controls="expediente" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                           <path fill="CurrentColor" d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z" />
                        </svg>
                        <span>Mostrar expediente</span>
                     </button>
                  </li>
                  <?php } ?>
                  <?php if($count_doesnt_have_employees == 0 && Roles::FetchSessionRol($_SESSION["rol"]) != ""){ ?>
                  <li role="presentation">
                     <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" id="empleados-tab" data-tabs-target="#empleados" type="button" role="tab" aria-controls="empleados" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                           <path fill="CurrentColor" d="M13.07 10.41A5 5 0 0 0 13.07 4.59A3.39 3.39 0 0 1 15 4A3.5 3.5 0 0 1 15 11A3.39 3.39 0 0 1 13.07 10.41M5.5 7.5A3.5 3.5 0 1 1 9 11A3.5 3.5 0 0 1 5.5 7.5M7.5 7.5A1.5 1.5 0 1 0 9 6A1.5 1.5 0 0 0 7.5 7.5M16 17V19H2V17S2 13 9 13 16 17 16 17M14 17C13.86 16.22 12.67 15 9 15S4.07 16.31 4 17M15.95 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13Z" />
                        </svg>
                        <span>Todos mis empleados</span>
                     </button>
                  </li>
                  <?php } ?>
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

                        <?php if ( Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?> 
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold">Avatar</label>
                              <div class='flex items-center justify-center w-full'>
                                 <label class='flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group'>
                                    <div id="img_information" class='flex flex-col items-center justify-center pt-7'>
                                       <div id="svg">
                                          <svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                          </svg>
                                       </div>
                                       <img id="preview" class="hidden" />
                                       <p id="archivo" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider'>Selecciona una fotografía</p>
                                    </div>
                                    <input type='file' id="foto_perfil" name="foto_perfil" class="hidden" />
                                 </label>
                              </div>
                              <div id="error" class="m-auto"></div>
                           </div>
                           <div id="div_actions_foto" class="hidden flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">
                              <button type="button" id="delete_foto" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">
                                 <svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24"><path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" /></svg>
                                 Eliminar
                              </button>
                           </div>
                           <?php } ?>
                           <div class="my-7 h-px bg-slate-200"></div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#000] font-semibold mb-2">
                              Nombre
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 rounded-md linea" id="nombre" name="nombre" aria-describedby="nombre_help" value="<?php echo $_SESSION["nombre"]; ?>" disabled readonly>
                              </div>
                           </div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#000] font-semibold mb-2">
                              Apellido paterno
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">

                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md linea" id="apellido_pat" name="apellido_pat" aria-describedby="apellido_pat_help" value="<?php echo $_SESSION["apellidopat"]; ?>" disabled readonly> 
                              </div>

                           </div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#000] font-semibold mb-2">
                              Apellido materno
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md linea" id="apellido_mat" name="apellido_mat" aria-describedby="apellido_mat_help" value="<?php echo $_SESSION["apellidomat"]; ?>" disabled readonly>
                              </div>
                           </div>
                           <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#000] font-semibold mb-2">
                              Correo
                              </label>
                              <div class="group flex">
                                 <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                       <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                                    </svg>
                                 </div>
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="correo" name="correo" placeholder="i.e. example@example.com" value="<?php echo $_SESSION["correo"]; ?>">
                              </div>
                              <div id="myloader" class="hidden mt-5">
                                 <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                 <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                 </svg>
                                 <span>Cargando...</span>
                              </div>
                              <div class="hidden" id="correct-email">
                                 <li class="flex items-center">
                                 <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                 <p class="text-green-600">Correo electrónico válido y disponible</p>
                                 </li>
                              </div>
                           </div>
                           <div class="mt-12 h-px bg-slate-200"></div>
                           <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                              <button class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" id="reset_general" type="button">
                                 Resetear
                              </button>
                              <div id="submit-button">
                                 <button class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700" id="guardar_general" type="submit">
                                    Guardar
                                 </button>
                              </div>
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
                                 <div class="group flex items-center" x-data="{isshow:false}">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 -mr-10 px-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" x-bind:type="isshow ? 'text' : 'password'" type="password" id="new_password" name="new_password" aria-describedby="new_password_help" placeholder="Nueva contraseña">
                                    <button type="button" @click="isshow=!isshow" class="z-30 text-gray-600 h-max focus:outline-none focus:ring-2 focus:focus:ring-celeste-600">
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
                              <div id="loader-password" class="hidden mt-5">
                                 <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                 </svg>
                                 <span>Cargando...</span>
                              </div>
                              <div class="hidden" id="correct-password">
                                 <li class="flex items-center">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    <p class="text-green-600">Contraseña válida</p>
                                 </li>
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
                                 <div class="group flex items-center" x-data="{isshow:false}">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 -mr-10 px-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" x-bind:type="isshow ? 'text' : 'password'" type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar nueva contraseña">
                                    <button type="button" @click="isshow=!isshow" class="z-30 text-gray-600 h-max focus:outline-none focus:ring-2 focus:focus:ring-celeste-600">
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
                                 <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="password" id="current_password" name="current_password" placeholder="Contraseña actual">
                              </div>
                           </div>
                           <div class="mt-12 h-px bg-slate-200"></div>
                           <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                              <button class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" id="reset_password" type="button">
                                 Resetear
                              </button>
                              <div id="button-submit">
                                 <button class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700" id="guardar_password" type="submit">
                                    Guardar
                                 </button>
                              </div>   
                           </div>
                        </form>
                     </div>
                  </div>
                  <?php if($switchExpedientes == "true"){ ?>
                  <div class="hidden bg-transparent rounded-lg" id="expediente" role="tabpanel" aria-labelledby="expediente-tab">
                     <div class="p-4 sm:p-5">
                        <?php  
                           if($checkcurrentuserxexpediente  > 0){
                        ?>
                        <ul id='menu' class='flex flex-col items-center md:flex-row md:flex-wrap w-full p-4 mt-5 gap-3'>
                           <li role="presentation" class="w-full md:w-max">
                              <button class="menu-active w-full group flex items-center space-x-2 rounded-lg bg-[#27ceeb] px-4 py-2.5 tracking-wide text-white outline-none transition-all" id="datosG-tab" data-tabs-target="#datosG" type="button" role="tab" aria-controls="datosG" aria-selected="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M14 2H6C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H18C19.11 22 20 21.11 20 20V8L14 2M18 20H6V4H13V9H18V20M13 13C13 14.1 12.1 15 11 15S9 14.1 9 13 9.9 11 11 11 13 11.9 13 13M15 18V19H7V18C7 16.67 9.67 16 11 16S15 16.67 15 18Z" />
                                 </svg>
                                 <span>Datos generales</span>
                              </button>
                           </li>
                           <li role="presentation" class="w-full md:w-max">
                              <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="datosA-tab" data-tabs-target="#datosA" type="button" role="tab" aria-controls="datosA" aria-selected="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M10 20H6V4H13V9H18V12.1L20 10.1V8L14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20M20.2 13C20.3 13 20.5 13.1 20.6 13.2L21.9 14.5C22.1 14.7 22.1 15.1 21.9 15.3L20.9 16.3L18.8 14.2L19.8 13.2C19.9 13.1 20 13 20.2 13M20.2 16.9L14.1 23H12V20.9L18.1 14.8L20.2 16.9Z" />
                                 </svg>
                                 <span>Datos Adicionales</span>
                              </button>
                           </li>
                           <li role="presentation" class="w-full md:w-max">
                              <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="datosB-tab" data-tabs-target="#datosB" type="button" role="tab" aria-controls="datosB" aria-selected="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                 </svg>
                                 <span>Datos Bancarios</span>
                              </button>
                           </li>
                           <li role="presentation" class="w-full md:w-max">
                              <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="documentos-tab" data-tabs-target="#documentos" type="button" role="tab" aria-controls="documentos" aria-selected="false">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
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
                                       Número de expediente:
                                    </div>
                                    <span>
                                    <?php if($view->enum_expediente == null){ echo "No hay datos"; }else{echo "{$view->enum_empleado}";} ?>
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
                                    <?php if($view->eposee_correo == "no"){ echo "No posee un correo electrónico adicional"; }else{echo "{$view->ecorreo_adicional}";} ?>
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
                                    <button type="button" id="siguiente" name="siguiente" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Siguiente</button>
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
                                       Nombre(s):
                                    </div>
                                    <span>
                                    <?php if($view->eemergencia_nombre == null){ echo "No hay datos"; }else{echo "{$view->eemergencia_nombre}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Apellido Paterno:
                                    </div>
                                    <span>
                                    <?php if($view->eemergencia_appelidopat == null){ echo "No hay datos"; }else{echo "{$view->eemergencia_appelidopat}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Apellido Materno:
                                    </div>
                                    <span>
                                    <?php if($view->eemergencia_appelidomat == null){ echo "No hay datos"; }else{echo "{$view->eemergencia_appelidomat}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Relación:
                                    </div>
                                    <span>
                                    <?php if($view -> eemergencia_relacion == null){ echo "No hay datos"; }else{echo "{$view -> eemergencia_relacion}";} ?>
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
                                       Nombre completo 2:
                                    </div>
                                    <span>
                                    <?php if($view -> eemergencia_nombre2 == null){ echo "No hay datos"; }else{echo "{$view -> eemergencia_nombre2}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Apellido Paterno 2:
                                    </div>
                                    <span>
                                    <?php if($view->eemergencia_appelidopat2 == null){ echo "No hay datos"; }else{echo "{$view->eemergencia_appelidopat2}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Apellido Materno 2:
                                    </div>
                                    <span>
                                    <?php if($view->eemergencia_appelidomat2 == null){ echo "No hay datos"; }else{echo "{$view->eemergencia_appelidomat2}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Relación 2:
                                    </div>
                                    <span>
                                    <?php if($view -> eemergencia_relacion2 == null){ echo "No hay datos"; }else{echo "{$view -> eemergencia_relacion2}";} ?>
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
                                       Tipo de sangre:
                                    </div>
                                    <span>
                                    <?php if($view->etipo_sangre == null){ echo "No hay datos"; }else{echo "{$view->etipo_sangre}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       ¿Cómo se entero de la vacante?:
                                    </div>
                                    <span>
                                    <?php if($view->evacante == null){ echo "No hay datos"; }else{echo "{$view->evacante}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Familiares dentro de la empresa:
                                    </div>
                                    <?php if (empty($familiar['data'])): ?>
                                       <p>No cuenta con familiares dentro de la empresa</p>
                                    <?php else: ?>
                                       <?php foreach ($familiar['data'] as $item): ?>
                                          <div class="bg-gray-200 p-4 rounded mb-4">
                                             <div class="grid grid-cols-2 gap-4">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                   <div>
                                                   <p class="font-semibold">Familiar <?php echo $i; ?></p>
                                                   <p>Nombre: <?php echo $item['nombre' . $i] ? $item['nombre' . $i] : 'No hay datos'; ?>
                                                      <?php echo $item['apellido_pat' . $i] ?>
                                                      <?php echo $item['apellido_mat' . $i] ?>
                                                   </p>
                                                </div>

                                                <?php endfor; ?>
                                             </div>
                                          </div>
                                       <?php endforeach; ?>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <div class="my-3 h-px bg-slate-200"></div>
                                 <div class="self-end mt-3">
                                    <button type="button" id="anterior" name="anterior" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                    <button type="button" id="siguiente2" name="siguiente2" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Siguiente</button>
                                 </div>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg" id="datosB" role="tabpanel" aria-labelledby="datosB-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos bancarios del empleado</h2>
                                 <span class="text-[#64748b]">En esta sección encontrará información sobre los datos bancarios del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Referencias bancarias:
                                    </div>
                                    <div id="ref" class="mt-5">
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Cuenta bancaria personal</h2>
                                 <span class="text-[#64748b]">En esta sección se encuentran las credenciales bancarias personales del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:items-center lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Banco personal:
                                    </div>
                                    <span>
                                    <?php if($view -> ebanco_personal == null){ echo "No hay datos"; }else{echo "{$view -> ebanco_personal}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Cuenta personal:
                                    </div>
                                    <span>
                                    <?php if($view -> ecuenta_personal == null){ echo "No hay datos"; }else{echo "{$view -> ecuenta_personal}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:items-center lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Clabe personal:
                                    </div>
                                    <span>
                                    <?php if($view -> eclabe_personal == null){ echo "No hay datos"; }else{echo "{$view -> eclabe_personal}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Plástico asignado personal:
                                    </div>
                                    <span>
                                    <?php if($view -> eplastico_personal == null){ echo "No hay datos"; }else{echo "{$view -> eplastico_personal}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Cuenta bancaria asignada por la empresa</h2>
                                 <span class="text-[#64748b]">En esta sección se encuentra la nómina asignada al empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:items-center lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Banco nómina:
                                    </div>
                                    <span>
                                    <?php if($view -> ebanco_nomina == null){ echo "No hay datos"; }else{echo "{$view -> ebanco_nomina}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Cuenta nómina:
                                    </div>
                                    <span>
                                    <?php if($view -> ecuenta_nomina == null){ echo "No hay datos"; }else{echo "{$view -> ecuenta_nomina}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col lg:flex-row lg:flex-wrap lg:items-center lg:space-x-7 mx-7">
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Clabe nómina:
                                    </div>
                                    <span>
                                    <?php if($view -> eclabe_nomina == null){ echo "No hay datos"; }else{echo "{$view -> eclabe_nomina}";} ?>
                                    </span>
                                 </div>
                                 <div class="flex-1 flex flex-col mt-5">
                                    <div class="text-[#64748b] font-semibold">
                                       Plástico asignado nómina:
                                    </div>
                                    <span>
                                    <?php if($view -> eplastico == null){ echo "No hay datos"; }else{echo "{$view -> eplastico}";} ?>
                                    </span>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <div class="my-3 h-px bg-slate-200"></div>
                                 <div class="self-end mt-3">
                                    <button type="button" id="anterior2" name="anterior2" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                    <button type="button" id="siguiente3" name="siguiente3" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Siguiente</button>
                                 </div>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Documentos necesarios</h2>
                                 <span class="text-[#64748b]">En esta sección encontrará todos los documentos entregados por el empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="mt-5 px-7">
                                 <table class="min-w-full border-collapse block md:table">
                                    <thead class="block md:table-header-group">
                                       <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative ">
                                          <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre del documento</th>
                                          <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Archivo</th>
                                       </tr>
                                    </thead>
                                    <tbody class="block md:table-row-group">
                                       <?php foreach($array3 as $documents){ ?>
                                       <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                          <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                             <span class="inline-block w-1/3 md:hidden font-bold">Nombre del documento</span>
                                             <p class="text-[#000]"><?php echo ($documents["nombre"]); ?></p>
                                          </td>
                                          <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                <span class="inline-block md:hidden font-bold">Acción</span>
                                                <div class="flex flex-col w-full justify-center">
                                                   <?php if($documents['id'] == 1 || $documents['id'] == 3 || $documents['id'] == 4 || $documents['id'] == 5 || $documents['id'] == 6 || $documents['id'] == 8 || $documents['id'] == 9 || $documents['id'] == 10 || $documents['id'] == 15){ ?>
                                                      <div id="upload-button<?php echo $documents['id'] ?>" class="inline-flex self-start items-center px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded button  btn_gray_slide slide_gray_drch border rounded-md outline-none ">
                                                      Subir archivo
                                                   </div>
                                                      <?php  }?>

                                                   <div class="flex-1 md:flex items-center justify-between">
                                                      <?php 
                                                         if(is_null($documents["nombre_archivo"]) || is_null($documents["identificador"])) { 
                                                      ?>
                                                            <span id="upload-text<?php echo $documents['id'] ?>">No hay ningún archivo seleccionado</span>
                                                            <button type="button" id="upload-delete<?php echo $documents['id'] ?>" class="hidden">
                                                               <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                                  <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                                               </svg>
                                                            </button>
                                                      <?php 
                                                         }else{ 
                                                            $path = "../src/documents/".$documents['identificador'];
                                                            if(!file_exists($path)){
                                                               $buscar_papeleria="false";
                                                      ?>
                                                               <span id="upload-text<?php print($documents['id']); ?>"><p style="color: rgb(250 30 45);">No se encontró el archivo, por favor, suba otro archivo ó seleccione la x para reemplazarlo por un archivo anterior a este</p></span>
                                                               <button type="button" id="upload-delete<?php print($documents['id']); ?>" class="z-100 md:p-2 my-auto">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                                  <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                                                  </svg>
                                                               </button>
                                                      <?php 
                                                            }else{
                                                               $buscar_papeleria="true";
                                                      ?>
                                                               <span id="upload-text<?php print($documents['id']); ?>">1 archivo seleccionado</span>
                                                               <button type="button" id="upload-delete<?php print($documents['id']); ?>" class="z-100 md:p-2 my-auto">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                                  <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                                                  </svg>
                                                               </button>
                                                      <?php 
                                                            }
                                                         }
                                                      ?>
                                                   </div>
                                                </div>
                                                <input type="file" name="infp_papeleria<?php echo $documents["id"] ?>" id="infp_papeleria<?php echo $documents["id"] ?>"  class="hidden" />
                                                <div id="content-container<?php echo $documents["id"] ?>">
                                                   <?php 
                                                      if(isset($documents['nombre_archivo']) && isset($documents['identificador'])) {
                                                         if($buscar_papeleria=="true"){
                                                   ?>
                                                            <ul id="lista<?php print($documents['nombre_archivo']); ?>" class="break-all md:break-normal">
                                                               <li id="papeleria<?php print($documents['id']); ?>" class="flex flex-wrap">
                                                                  <?php 
                                                                  $ext = pathinfo($documents['nombre_archivo'], PATHINFO_EXTENSION);
                                                                  if($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
                                                                     echo '<svg style="width:24px; heigth:24px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><path style="fill:#6DABE4;" d="M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z"/><path style="opacity:0.15;enable-background:new    ;" d="M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z"/><path style="fill:#FFFFFF;" d="M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z"/><circle style="fill:#FFB547;" cx="200.999" cy="143.414" r="38.958"/><path style="fill:#4C9462;" d="M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z"	/><path style="fill:#8D6645;" d="M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z"/><path style="fill:#99DAEA;" d="M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z"/><polygon style="opacity:0.1;enable-background:new    ;" points="188.713,379.313 226.521,379.313 313.42,163.313 "/><path style="fill:#1E252B;" d="M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                                                                  }else if($ext == "pdf"){
                                                                     echo '<svg style="width:24px; heigth:24px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 303.188 303.188" style="enable-background:new 0 0 303.188 303.188;" xml:space="preserve"><g>	<polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>	<path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/>	<polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>	<g>		<path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>		<path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z"/>		<path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z"/>	</g>	<polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                                                                  }
                                                                  echo '<a class="text-blue-600 hover:border-b-2 hover:border-blue-600 cursor-pointer" href="../src/documents/' . $documents['identificador'] . '" target="_blank">' . $documents['nombre_archivo'] . '</a>';
                                                                  ?>
                                                               </li>
                                                            </ul>
                                                   <?php
                                                         }
                                                      } 
                                                   ?>
											               </div>
                                             </td>
                                       </tr>
                                       <?php } ?>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                              <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                 <button type="button" id="anterior3" name="anterior3" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                 <div id="submit-papeleria">
                                    <button type="button" id="guardarDocs" name="guardarDocs" class="button  btn_slide slide_drch border rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none ">Actualizar Papeleria</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php }else{ ?>
                              <div class="flex items-center" style="word-break:break-word;">
                                 <div class="w-full flex flex-col items-center justify-center">
                                    <div class="text-center">
                                       <h2 class="flex flex-col lg:flex-row lg:gap-5 md:text-9xl text-5xl mb-8 font-extrabold">
                                          <span>Error </span>
                                          <span>404</span>
                                       </h2>
                                       <p class="text-2xl font-semibold md:text-3xl">No tienes un expediente asignado.</p>
                                       <p class="mt-4 mb-8">Por favor, contacta a un administrador.</p>
                                    </div>
                                 </div>
                              </div>
                        <?php } ?>
                     </div>
                  </div>
                  <?php } ?>
                  <?php if($count_doesnt_have_employees == 0 && Roles::FetchSessionRol($_SESSION["rol"]) != ""){ ?>
                  <div class="hidden bg-transparent rounded-lg" id="empleados" role="tabpanel" aria-labelledby="empleados-tab">
                     <div class="p-3">
                        <table class="w-full" id="datatable" style="display:none; word-break: break-word;">
                           <thead>
                              <tr class="bg-gray-800 text-white uppercase text-sm leading-normal">
                                 <th class="py-3 text-left desktop">Tipo de trabajador</th>
                                 <th class="py-3 text-left all">Nombre</th>
                                 <th>Usuario_id</th>
                                 <th class="py-3 text-center min-tablet">Acción</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php if($count_doesnt_have_employees == 0 && Roles::FetchSessionRol($_SESSION["rol"]) != ""){  ?>
	<div id="modal-component-container" class="contenedor modal-component-container hidden fixed overflow-y-auto inset-0 bg-gray-700 bg-opacity-75">
		<div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
			<div class="modal-bg-container inset-0"></div>
			<div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
			<div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
				<div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
					<div class="modal-wrapper-flex sm:flex sm:flex-col sm:items-start">
						<div class="flex-col gap-3 items-center flex sm:flex-row">
							<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-celeste-100 sm:mx-0 sm:h-10 sm:w-10"><svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9.5H18V7.5H13V9.5M13,16.5H18V14.5H13V16.5M19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21M6,11H11V6H6V11M7,7H10V10H7V7M6,18H11V13H6V18M7,14H10V17H7V14Z" /></svg></div>
							<h3 class="text-lg font-medium text-gray-900"> Ver vacaciones</h3>
						</div>
						<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left">
						</div>
					</div>
				</div>
				<div class="modal-actions bg-gray-50 flex flex-col gap-3 px-4 py-3 sm:px-6 sm:flex-row-reverse">
					<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>
				</div>
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

.linea{
   border-bottom: 2px solid #a7a6a6 !important;
}
    </style>
	</div>
<?php } ?>