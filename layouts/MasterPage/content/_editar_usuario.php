<div class="container mx-auto px-6 py-8">
   <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
      Editar usuarios
   </h2>
   <div class="mt-4">
      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto">
            <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
               <div class="w-full">
                  <div class="bg-gray-50 shadow-md rounded-t">
                     <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                        <a href="dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#4f46e5] hover:text-[#4f46e5]">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
                           </svg>
                           Home
                        </a>
                        <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                        <a href="users.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#4f46e5] hover:text-[#4f46e5]">
                           <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                           </svg>
                           Usuarios
                        </a>
                        <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                        <div class="flex items-center text-gray-400">
                           <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.09 20.21,11.09 20.42,11.3L21.7,12.58C21.91,12.79 21.91,13.14 21.7,13.35M12,18.94L18.06,12.88L20.11,14.93L14.06,21H12V18.94M12,14C7.58,14 4,15.79 4,18V20H10V18.11L14,14.11C13.34,14.03 12.67,14 12,14M12,4A4,4 0 0,0 8,8A4,4 0 0,0 12,12A4,4 0 0,0 16,8A4,4 0 0,0 12,4Z"></path>
                           </svg>
                           <span class="text-sm font-medium">Editar usuarios</span>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white p-3 shadow-md rounded-b">
                     <div class="flex flex-col mt-5 mx-7">
                        <h2 class="text-2xl text-[#64748b] font-semibold">Formulario para editar un usuario</h2>
                        <span class="text-[#64748b]">Por favor, proporciona todas las modificaciones necesarias para el usuario.</span>
                        <div class="my-3 h-px bg-slate-200"></div>
                     </div>
                     <form id="Guardar" method="post">
                        <div class="grid grid-cols-1 mt-5 mx-7">
                           <label class="text-[#64748b] font-semibold mb-2">
                           Usuario
                           </label>
                           <div class="group flex">
                              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                 <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                 </svg>
                              </div>
                              <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" aria-describedby="usuario_help" id="usuario" name="usuario" placeholder="i.e. Juan.Garcia" value="<?php echo "{$row->username}"; ?>">
                           </div>
                           <div id="loader-usuario" class="hidden mt-5">
                              <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                 <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                              </svg>
                              <span>Cargando...</span>
                           </div>
                           <div class="hidden" id="correct-usuario">
                              <li class="flex items-center">
                                 <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                 </svg>
                                 <p class="text-green-600">Usuario válido y disponible</p>
                              </li>
                           </div>
                           <div id="usuario_help" class="text-[#64748b]">
                              Solamente se permiten carácteres alfanúmericos, puntos y guiones bajos.
                           </div>
                        </div>
                        <div id="passwords_div">
                           <div x-data="{showen:true}" class="grid grid-cols-1 mt-5 mx-7">
                              <div x-show="showen">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                 Contraseña (opcional)
                                 </label>
                                 <div class="group flex items-center" x-data="{isshow:false}">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 -mr-10 px-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-bind:type="isshow ? 'text' : 'password'" type="password" aria-describedby="password_help" id="password" name="password" placeholder="Contraseña">
                                    <button type="button" @click="isshow=!isshow" class="z-30 text-gray-600 h-max focus:outline-none focus:ring-2 focus:focus:ring-indigo-600">
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
                                    <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="text-green-600">Contraseña válida</p>
                                 </li>
                              </div>
                              <div id="password_help" class="text-[#64748b]">
                                 La contraseña debe contener un número, una letra en mayúscula y en minúscula y un simbolo especial(!@#$%&*). 
                              </div>
                           </div>
                           <div x-data="{showen:true}" class="grid grid-cols-1 mt-5 mx-7">
                              <div x-show="showen">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                 Confirmar contraseña
                                 </label>
                                 <div class="group flex items-center" x-data="{isshow:false}">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 -mr-10 px-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-bind:type="isshow ? 'text' : 'password'" type="password" id="cpassword" name="cpassword" placeholder="Confirmar contraseña">
                                    <button type="button" @click="isshow=!isshow" class="z-30 text-gray-600 h-max focus:outline-none focus:ring-2 focus:focus:ring-indigo-600">
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
                        </div>
                        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
                        <div class="grid grid-cols-1 mx-7 mt-5" id="slider-container" <?php if($fetch_temporal_password > 0){ ?> x-data="{value: 'On', offValue: 'Off', onValue:'On'}" <?php }else{ ?> x-data="{value: 'Off', offValue: 'Off', onValue:'On'}"  <?php } ?> >
                           <label class="text-[#64748b] font-semibold mb-2">Contraseña temporal</label>
                           <div class="flex flex-col md:flex-row md:items-center cursor-pointer cm-toggle-wrapper" id="slider-event" x-on:click="value =  (value == onValue ? offValue : onValue);">
                              <div class="rounded-full w-8 h-4 p-0.5 <?php if($fetch_temporal_password > 0){ ?> bg-green-500 <?php }else{ ?>  bg-red-500  <?php } ?>" :class="{'bg-red-500': value == offValue,'bg-green-500': value == onValue}">
                                 <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out <?php if($fetch_temporal_password > 0){ ?> translate-x-2 <?php }else{ ?> -translate-x-2 <?php } ?>" :class="{'-translate-x-2': value == offValue,'translate-x-2': value == onValue}"></div>
                              </div>
                              <input type="checkbox" aria-describedby="temppassword_help" id="checkbox-slider" name="checkbox-slider" class="hidden" x-bind:checked="value == offValue ? false : true" <?php if($fetch_temporal_password > 0){ ?> checked  <?php } ?> >
                              <span class="text-[#64748b] md:ml-1" x-text="value == offValue ? 'Contraseña temporal deshabilitada': 'Contraseña temporal habilitada'">
                              <?php if($fetch_temporal_password > 0){ ?> Contraseña temporal habilitada <?php }else{ ?> Contraseña temporal deshabilitada  <?php } ?>
                              </span>
                           </div>
                           <div id="temppassword_help">
                              <ul class="text-[#64748b]">
                                 <li>Si se habilita esta opción, el usuario tendrá que cambiar la contraseña la próxima vez que inicie sesión.</li>
                                 <li>Nota: Si la contraseña temporal estaba originalmente habilitada, deshabilitarla eliminará la contraseña temporal y el usuario podrá acceder al sistema sin la necesidad de cambiar la contraseña.</li>
                              </ul>
                           </div>
                        </div>
                        <?php } ?>
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
                              <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="nombre" name="nombre" placeholder="i.e. José Juan" aria-describedby="nombre_help" value="<?php echo "{$row->nombre}"; ?>">
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
                              <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="apellido_pat" name="apellido_pat" placeholder="i.e. Caballero-Plasencia" aria-describedby="apellido_pat_help" value="<?php echo "{$row->apellido_pat}"; ?>">
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
                              <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="apellido_mat" name="apellido_mat" placeholder="i.e. Plasencia'Ramírez" aria-describedby="apellido_mat_help" value="<?php echo "{$row->apellido_mat}"; ?>">
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
                              <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="correo" name="correo" placeholder="i.e. example@example.com" value="<?php echo "{$row->correo}"; ?>">
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
                                 <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                 </svg>
                                 <p class="text-green-600">Correo electrónico válido y disponible</p>
                              </li>
                           </div>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                           <label class="text-[#64748b] font-semibold mb-2">Rol</label>
                           <div class="group flex">
                              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                 <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M12 18.2C12 17.24 12.5 16.34 13.2 15.74V15.5C13.2 15.11 13.27 14.74 13.38 14.38C12.35 14.14 11.21 14 10 14C5.58 14 2 15.79 2 18V20H12V18.2M22 18.3V21.8C22 22.4 21.4 23 20.7 23H15.2C14.6 23 14 22.4 14 21.7V18.2C14 17.6 14.6 17 15.2 17V15.5C15.2 14.1 16.6 13 18 13C19.4 13 20.8 14.1 20.8 15.5V17C21.4 17 22 17.6 22 18.3M19.5 15.5C19.5 14.7 18.8 14.2 18 14.2C17.2 14.2 16.5 14.7 16.5 15.5V17H19.5V15.5Z" />
                                 </svg>
                              </div>
                              <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="rol" name="rol">
                                 <option value="">Sin rol</option>
                                 <?php
                                    $roles = roles::FetchRol();
                                    foreach ($roles as $rq) {
                                    if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" && $rq->nombre != "Superadministrador" && $rq->nombre != "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Vista tecnico") == "false" && $rq->nombre != "Superadministrador" && $rq->nombre != "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Vista tecnico") == "true" && $rq->nombre=="Tecnico"){
                                     echo "<option value='" . $rq->id . "'";
                                     if ($row->roles_id == $rq->id) echo 'selected="selected"';
                                     echo ">";
                                     echo "" . $rq->nombre . "";
                                     echo "</option>";
                                    }
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                           <label class="text-[#64748b] font-semibold mb-2">Subrol</label>
                           <div class="group flex">
                              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                 <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M12 18.2C12 17.24 12.5 16.34 13.2 15.74V15.5C13.2 15.11 13.27 14.74 13.38 14.38C12.35 14.14 11.21 14 10 14C5.58 14 2 15.79 2 18V20H12V18.2M22 18.3V21.8C22 22.4 21.4 23 20.7 23H15.2C14.6 23 14 22.4 14 21.7V18.2C14 17.6 14.6 17 15.2 17V15.5C15.2 14.1 16.6 13 18 13C19.4 13 20.8 14.1 20.8 15.5V17C21.4 17 22 17.6 22 18.3M19.5 15.5C19.5 14.7 18.8 14.2 18 14.2C17.2 14.2 16.5 14.7 16.5 15.5V17H19.5V15.5Z" />
                                 </svg>
                              </div>
                              <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="subrol" name="subrol">
                                 <option value="">Sin subrol</option>
                              </select>
                           </div>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                           <label class="text-[#64748b] font-semibold mb-2">Departamento</label>
                           <div class="group flex">
                              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                 <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z" />
                                 </svg>
                              </div>
                              <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="departamento" name="departamento">
                                 <option value="">Sin departamento</option>
                                 <?php
                                    $departamentos = departamentos::FetchDepartamento();
                                    foreach ($departamentos as $dp) {
                                    echo "<option value='" . $dp->id . "'";
                                    if ($row->departamento_id == $dp->id) echo 'selected="selected"';
                                    echo ">";
                                    echo "" . $dp->departamento . "";
                                    echo "</option>";
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                           <label class="text-[#64748b] font-semibold mb-2">Subir foto</label>
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
                                 <input type='file' id="foto" name="foto" class="hidden" />
                              </label>
                           </div>
                           <div id="error"></div>
                        </div>
                        <div id="div_actions_foto" class="hidden flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">
                           <button type="button" id="delete_foto" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">
                              <svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />
                              </svg>
                              Eliminar
                           </button>
                        </div>
                        <div class="mt-12 h-px bg-slate-200"></div>
                        <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                           <button class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" id="reset_form" type="button">
                           Resetear
                           </button>
                           <div id="submit-button">
                              <button class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" id='grabar' name='grabar' type="submit">
                              Guardar
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>