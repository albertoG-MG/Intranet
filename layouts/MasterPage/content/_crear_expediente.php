<div class="container mx-auto px-6 py-8">
   <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
      Crear expedientes
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
                        <a href="expedientes.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#4f46e5] hover:text-[#4f46e5]">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" />
                           </svg>
                           Expedientes
                        </a>
                        <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                        <div class="flex items-center text-gray-400">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M14 2H6C4.89 2 4 2.89 4 4V20C4 21.11 4.89 22 6 22H13.81C13.28 21.09 13 20.05 13 19C13 18.67 13.03 18.33 13.08 18H6V16H13.81C14.27 15.2 14.91 14.5 15.68 14H6V12H18V13.08C18.33 13.03 18.67 13 19 13S19.67 13.03 20 13.08V8L14 2M13 9V3.5L18.5 9H13M18 15V18H15V20H18V23H20V20H23V18H20V15H18Z" />
                           </svg>
                           <span class="text-sm font-medium">Crear expedientes</span>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white p-3 shadow-md rounded-b">
                     <div class="flex flex-col mt-5 mx-7">
                        <h2 class="text-2xl text-[#64748b] font-semibold">Formulario para asignar un expediente a un usuario</h2>
                        <span class="text-[#64748b]">Por favor, proporciona todos los datos necesarios para poder asignar un expediente a un usuario.</span>
                        <div class="my-3 h-px bg-slate-200"></div>
                     </div>
                     <ul id='menu' class='flex flex-col items-center md:flex-row md:flex-wrap w-full px-7 gap-3'>
                        <li role="presentation" class="w-full md:w-max">
                           <button class="menu-active w-full group flex items-center space-x-2 rounded-lg bg-[#4f46e5] px-4 py-2.5 tracking-wide text-white outline-none transition-all" id="datosG-tab" data-tabs-target="#datosG" type="button" role="tab" aria-controls="datosG" aria-selected="false">
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
                     <form id="Guardar" method="post">
                        <div id='menu-contents' style="word-break: break-word;">
                           <div class="block bg-transparent rounded-lg tab-pane" id="datosG" role="tabpanel" aria-labelledby="datosG-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos del empleado</h2>
                                 <span class="text-[#64748b]">Información personal del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                 Asignar expediente a:
                                 </label>
                                 <div class="group flex" id="selectuser" style="display:none !important; position:relative;">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                       </svg>
                                    </div>
                                    <select id="user" name="user">
                                       <option></option>
                                       <optgroup label="Usuarios">
                                          <?php
                                             $arr = array();
                                             $checkexpuser = $object -> _db -> prepare("SELECT usuarios.id FROM expedientes INNER JOIN usuarios ON expedientes.users_id=usuarios.id"); 
                                             $checkexpuser -> execute();
                                             while ($fetchuserexp = $checkexpuser->fetch(PDO::FETCH_OBJ)){
                                                $arr[] = $fetchuserexp->id;
                                             }
                                             $usuarios = user::FetchUsuarios();
                                             foreach ($usuarios as $row) {
                                                if($row->rolnom != "Superadministrador" && $row->rolnom != "Administrador" && $row->rolnom != "Director general" && $row->rolnom != "Usuario externo")
                                                {
                                                   if(!in_array($row->id, $arr))
                                                   {
                                                         echo "<option value='" . $row->id . "'>";
                                                         echo "$row->nombre $row->apellido_pat $row->apellido_mat";
                                                         echo "</option>";
                                                   }
                                                }
                                             }
                                          ?>
                                       </optgroup>
                                    </select>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                 Número de empleado
                                 </label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" aria-describedby="numempleado_help" id="numempleado" name="numempleado" placeholder="i.e. L-35">
                                 </div>
                                 <div id="loader-numempleado" class="hidden mt-5">
                                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                       <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                    </svg>
                                    <span>Cargando...</span>
                                 </div>
                                 <div class="hidden" id="correct-numempleado">
                                    <li class="flex items-center">
                                       <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                       </svg>
                                       <p class="text-green-600">Número de empleado válido y disponible</p>
                                    </li>
                                 </div>
                                 <div id="numempleado_help" class="text-[#64748b]">
                                    El número de empleado debe estar compuesto de una letra, un guión y varios números.
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Departamento</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border border-gray-200 bg-gray-200 text-gray-900 rounded-md focus:ring-2 focus:ring-indigo-600" type="text" id="departamento" name="departamento" placeholder="Departamento" readonly>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Puesto</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="puesto" name="puesto" placeholder="Puesto">
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Nivel de estudios</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M16 8C16 10.21 14.21 12 12 12C9.79 12 8 10.21 8 8L8.11 7.06L5 5.5L12 2L19 5.5V10.5H18V6L15.89 7.06L16 8M12 14C16.42 14 20 15.79 20 18V20H4V18C4 15.79 7.58 14 12 14Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="estudios" name="estudios">
                                       <option value="">-- Seleccione --</option>
                                       <option value="PRIMARIA">Primaria</option>
                                       <option value="SECUNDARIA">Secundaria</option>
                                       <option value="BACHILLERATO">Bachillerato</option>
                                       <option value="CARRERA TECNICA">Carrera técnica</option>
                                       <option value="LICENCIATURA">Licenciatura</option>
                                       <option value="ESPECIALIDAD">Especialidad</option>
                                       <option value="MAESTRIA">Maestría</option>
                                       <option value="DOCTORADO">Doctorado</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Correo electrónico</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border border-gray-200 bg-gray-200 text-gray-900 rounded-md focus:ring-2 focus:ring-indigo-600" type="text" id="correo_usuario" name="correo_usuario" placeholder="Correo" readonly>
                                 </div>
                              </div>
                              <div x-data="{ open: true }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">¿Desea agregar un correo electrónico adicional?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-correo-personal-1" type="radio" name="posee_correo" value="si" x-on:click="rcorreoadicional; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-correo-personal-1" aria-describedby="option-correo-personal-1" checked="">
                                       <label for="option-correo-personal-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-correo-personal-2" type="radio" name="posee_correo" value="no" x-on:click="rcorreoadicional; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-correo-personal-2" aria-describedby="option-correo-personal-2">
                                       <label for="option-correo-personal-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <script>
                                    function rcorreoadicional(e) {
                                       if(e.target.value == "no"){
                                       if (!($("#correo_adicional").val().length == 0)){
                                          $("#correo_adicional").removeData("previousValue");
                                       }
                                       $("#correo_adicional").val("");
                                       $("#correo_adicional").rules("remove");
                                       $("#correo_adicional").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                       $("#correo_adicional").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                       $("#correo_adicional-error").css("display", "none");
                                       $('#loader-correo').addClass('hidden');
                                       $('#correct-correo').addClass('hidden');
                                       }else if(e.target.value == "si"){
                                       $("#correo_adicional").rules("add", {
                                          required: true,
                                          email_verification: true,
                                          remote: {
                                             url: "../ajax/validacion/expedientes/checkemail.php",
                                             type: "GET",
                                             beforeSend: function () {
                                                $('#loader-correo').removeClass('hidden');
                                                $('#correct-correo').addClass('hidden');
                                             },
                                             complete: function(data){
                                                if(data.responseText == "true") {
                                                $('#loader-correo').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
                                                $('#correct-correo').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
                                                }else{
                                                $('#loader-correo').addClass('hidden');
                                                $('#correct-correo').addClass('hidden');
                                                }
                                             }
                                          },
                                          messages: {
                                             required:function () {$('#loader-correo').addClass('hidden'); $('#correct-correo').addClass('hidden'); $("#correo_adicional").removeData("previousValue"); return "Por favor, ingrese un correo electrónico"; },
                                             email_verification:function () {$('#loader-correo').addClass('hidden'); $('#correct-correo').addClass('hidden'); $("#correo_adicional").removeData("previousValue"); return "Asegúrese que el texto ingresado este en formato de email"; }
                                          }
                                       });	
                                       }
                                    }
                                 </script>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">Correo electrónico adicional</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                                             </svg>
                                          </div>
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" aria-describedby="correoadicional_help" id="correo_adicional" name="correo_adicional" placeholder="i.e. example@example.com">
                                       </div>
                                       <div id="loader-correo" class="hidden mt-5">
                                          <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                             <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                          </svg>
                                          <span>Cargando...</span>
                                       </div>
                                       <div class="hidden" id="correct-correo">
                                          <li class="flex items-center">
                                             <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                             </svg>
                                             <p class="text-green-600">Correo electrónico válido y disponible</p>
                                          </li>
                                       </div>
                                       <div id="correoadicional_help" class="text-[#64748b]">
                                          El correo electrónico adicional no se utilizará para las notificaciones ni para las diversas funciones del sistema.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos de ubicación</h2>
                                 <span class="text-[#64748b]">Datos de ubicación del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Calle</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="calle" name="calle" placeholder="Calle">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Número interior</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="ninterior" name="ninterior" placeholder="Número Interior">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Número exterior</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="nexterior" name="nexterior" placeholder="Número exterior">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Colonia</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="colonia" name="colonia" placeholder="Colonia">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Estado</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                          </svg>
                                       </div>
                                       <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="estado" name="estado">
                                          <option value="">--Seleccione--</option>
                                          <?php
                                             while ($r = $estado->fetch(PDO::FETCH_OBJ)) {
                                                $contestado++;
                                             ?>
                                          <option value="<?php echo $contestado; ?>"><?php echo $r->nombre; ?></option>
                                          <?php
                                             }
                                             ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Municipio</label>
                                    <div class="group flex" id="imunicipio">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                          </svg>
                                       </div>
                                       <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="municipio" name="municipio">
                                          <option value="">--Seleccione un estado--</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Código postal</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="codigo" name="codigo" placeholder="Código postal">
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Teléfono de domicilio</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="teldom" name="teldom" placeholder="Télefono de domicilio">
                                 </div>
                              </div>
                              <div x-data="{ open: true }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">Posee teléfono propio?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-telmov-1" type="radio" name="tel_movil" value="si" x-on:click="rtelmov; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                       <label for="option-telmov-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-telmov-2" type="radio" name="tel_movil" value="no" x-on:click="rtelmov; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
                                       <label for="option-telmov-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <script>
                                    function rtelmov(e) {
                                       if(e.target.value == "no"){
                                       $("#telmov").val("");
                                       $("#telmov").rules("remove");
                                       $("#telmov").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                       $("#telmov").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                       $("#telmov-error").css("display", "none");
                                       }else if(e.target.value == "si"){
                                       $("#telmov").rules("add", {
                                          required: true,
                                          digits: true,
                                          messages: {
                                             required: 'Este campo es requerido',
                                             digits: 'Solo se permiten números'
                                          }
                                       });	
                                       }
                                    }
                                 </script>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">Teléfono móvil propio</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                             </svg>
                                          </div>
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="telmov" name="telmov"  placeholder="Télefono móvil propio">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Dispositivos proporcionados por la empresa</h2>
                                 <span class="text-[#64748b]">Información sobre los dispositivos proporcionados por la empresa.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div x-data="{ open: true }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">Teléfono asignado por la empresa?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-telempresa-1" type="radio" name="tel_movil_empresa" value="si" x-on:click="telempresa; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                       <label for="option-telempresa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-telempresa-2" type="radio" name="tel_movil_empresa" value="no" x-on:click="telempresa; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
                                       <label for="option-telempresa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <script>
                                    function telempresa(e) {
                                       if(e.target.value == "no"){
                                       const array = ["#marcacion", "#serie", "#sim", "#numred", "#modelotel", "#marcatel", "#imei"];
                                       for(var i=0; i < array.length; i++){
                                       $(""+array[i]+"").val("");
                                       $(""+array[i]+"").rules("remove");
                                       $(""+array[i]+"").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                       $(""+array[i]+"").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                       $(""+array[i]+"-error").css("display", "none");
                                       }
                                       }else if(e.target.value == "si"){
                                       $("#marcacion").rules("add", {
                                          required: true,
                                          digits:true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             digits: "Solo se permiten números"
                                          }
                                       });
                                       $("#serie").rules("add", {
                                          required: true,
                                          alphanumeric: true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             alphanumeric: 'Solo se permiten carácteres alfanúmericos'
                                          }
                                       });
                                       $("#sim").rules("add", {
                                          required: true,
                                          digits: true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             digits: "Solo se permiten números"
                                          }
                                       });
                                       $("#numred").rules("add", {
                                          required: true,
                                          digits:true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             digits: "Solo se permiten números"
                                          }
                                       });
                                       $("#modelotel").rules("add", {
                                          required: true,
                                          model_validation: true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             model_validation: 'Solo se permiten carácteres alfanúmericos, guiones intermedios y espacios'
                                          }
                                       });
                                       $("#marcatel").rules("add", {
                                          required: true,
                                          field_validation: true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                                          }
                                       });
                                       $("#imei").rules("add", {
                                          required: true,
                                          digits: true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             digits: "Solo se permiten números"
                                          }
                                       });
                                       }
                                    }
                                 </script>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">Marcación corta</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="marcacion" name="marcacion" placeholder="i.e. 767">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">Número de serie</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M22,18V22H18V19H15V16H12L9.74,13.74C9.19,13.91 8.61,14 8,14A6,6 0 0,1 2,8A6,6 0 0,1 8,2A6,6 0 0,1 14,8C14,8.61 13.91,9.19 13.74,9.74L22,18M7,5A2,2 0 0,0 5,7A2,2 0 0,0 7,9A2,2 0 0,0 9,7A2,2 0 0,0 7,5Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="serie" name="serie" placeholder="i.e. DB168091200530">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">SIM</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="sim" name="sim" placeholder="i.e 89014103211118510720">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">Número de red</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4.93,4.93C3.12,6.74 2,9.24 2,12C2,14.76 3.12,17.26 4.93,19.07L6.34,17.66C4.89,16.22 4,14.22 4,12C4,9.79 4.89,7.78 6.34,6.34L4.93,4.93M19.07,4.93L17.66,6.34C19.11,7.78 20,9.79 20,12C20,14.22 19.11,16.22 17.66,17.66L19.07,19.07C20.88,17.26 22,14.76 22,12C22,9.24 20.88,6.74 19.07,4.93M7.76,7.76C6.67,8.85 6,10.35 6,12C6,13.65 6.67,15.15 7.76,16.24L9.17,14.83C8.45,14.11 8,13.11 8,12C8,10.89 8.45,9.89 9.17,9.17L7.76,7.76M16.24,7.76L14.83,9.17C15.55,9.89 16,10.89 16,12C16,13.11 15.55,14.11 14.83,14.83L16.24,16.24C17.33,15.15 18,13.65 18,12C18,10.35 17.33,8.85 16.24,7.76M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="numred" name="numred" placeholder="i.e. 310260">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">Modelo</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,2C2.89,2 2,2.89 2,4V14H4V4H14V2H4M8,6C6.89,6 6,6.89 6,8V18H8V8H18V6H8M12,10C10.89,10 10,10.89 10,12V20C10,21.11 10.89,22 12,22H20C21.11,22 22,21.11 22,20V12C22,10.89 21.11,10 20,10H12Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="modelotel" name="modelotel" placeholder="i.e. TP802A">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">Marca</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,2C2.89,2 2,2.89 2,4V14H4V4H14V2H4M8,6C6.89,6 6,6.89 6,8V18H8V8H18V6H8M12,10C10.89,10 10,10.89 10,12V20C10,21.11 10.89,22 12,22H20C21.11,22 22,21.11 22,20V12C22,10.89 21.11,10 20,10H12Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="marcatel" name="marcatel" placeholder="i.e. Samsung Galaxy">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">IMEI</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                             </svg>
                                          </div>
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="imei" name="imei" placeholder="i.e. 861536030196001">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div x-data="{ open: true }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">Laptop asignado por la empresa?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-laptop-1" type="radio" name="laptop_empresa" value="si" x-on:click="laptopempresa; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-laptop-1" aria-describedby="option-laptop-1" checked="">
                                       <label for="option-laptop-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-laptop-2" type="radio" name="laptop_empresa" value="no" x-on:click="laptopempresa; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-laptop-2" aria-describedby="option-laptop-2">
                                       <label for="option-laptop-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <script>
                                    function laptopempresa(e){
                                       if(e.target.value == "no"){
                                       const array = ["#marca_laptop", "#modelo_laptop", "#serie_laptop"];
                                       for(var i=0; i < array.length; i++){
                                          $(""+array[i]+"").val("");
                                          $(""+array[i]+"").rules("remove");
                                          $(""+array[i]+"").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                          $(""+array[i]+"").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                          $(""+array[i]+"-error").css("display", "none");
                                       }
                                       }else if(e.target.value == "si"){
                                       $("#marca_laptop").rules("add", {
                                          required: true,
                                          field_validation: true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                                          }
                                       });
                                       $("#modelo_laptop").rules("add", {
                                          required: true,
                                          model_validation: true,
                                          messages: {
                                             required: "Por favor, ingrese el modelo de la laptop",
                                             model_validation: "Solo se permiten carácteres alfanúmericos, guiones intermedios y espacios"
                                          }
                                       });
                                       $("#serie_laptop").rules("add", {
                                          required: true,
                                          alphanumeric: true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             alphanumeric: 'Solo se permiten carácteres alfanúmericos'
                                          }
                                       });
                                       }
                                    }
                                 </script>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">Marca de la laptop</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,6H20V16H4M20,18A2,2 0 0,0 22,16V6C22,4.89 21.1,4 20,4H4C2.89,4 2,4.89 2,6V16A2,2 0 0,0 4,18H0V20H24V18H20Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="marca_laptop" name="marca_laptop" placeholder="i.e. Lenovo">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">Modelo de la laptop</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,2C2.89,2 2,2.89 2,4V14H4V4H14V2H4M8,6C6.89,6 6,6.89 6,8V18H8V8H18V6H8M12,10C10.89,10 10,10.89 10,12V20C10,21.11 10.89,22 12,22H20C21.11,22 22,21.11 22,20V12C22,10.89 21.11,10 20,10H12Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="modelo_laptop" name="modelo_laptop" placeholder="i.e. Lenovo Ideapad 330-15ARR">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">Serie de la laptop</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M22,18V22H18V19H15V16H12L9.74,13.74C9.19,13.91 8.61,14 8,14A6,6 0 0,1 2,8A6,6 0 0,1 8,2A6,6 0 0,1 14,8C14,8.61 13.91,9.19 13.74,9.74L22,18M7,5A2,2 0 0,0 5,7A2,2 0 0,0 7,9A2,2 0 0,0 9,7A2,2 0 0,0 7,5Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="serie_laptop" name="serie_laptop" placeholder="i.e. S100NWDJ">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos relevantes del empleado</h2>
                                 <span class="text-[#64748b]">Otros datos de interés del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Casa propia?</label>
                                 <div class="group flex mt-3 items-center">
                                    <input id="option-casa-1" type="radio" name="casa" value="si" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                    <label for="option-casa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                    Sí
                                    </label>
                                    <input id="option-casa-2" type="radio" name="casa" value="no" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
                                    <label for="option-casa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                    No
                                    </label>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Estado civil</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,10L8,4.4L9.6,2H14.4L16,4.4L12,10M15.5,6.8L14.3,8.5C16.5,9.4 18,11.5 18,14A6,6 0 0,1 12,20A6,6 0 0,1 6,14C6,11.5 7.5,9.4 9.7,8.5L8.5,6.8C5.8,8.1 4,10.8 4,14A8,8 0 0,0 12,22A8,8 0 0,0 20,14C20,10.8 18.2,8.1 15.5,6.8Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="ecivil" name="ecivil">
                                       <option value="">--Seleccione--</option>
                                       <option value="SOLTERO">Soltero</option>
                                       <option value="CASADO">Casado</option>
                                       <option value="DIVORCIADO">Divorciado</option>
                                       <option value="UNION LIBRE">Unión libre</option>
                                    </select>
                                 </div>
                              </div>
                              <div x-data="{ open: true }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">Posee retención?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-retencion-1" type="radio" name="retencion" value="si" x-on:click="rretencion; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                       <label for="option-retencion-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-retencion-2" type="radio" name="retencion" value="no" x-on:click="rretencion; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
                                       <label for="option-retencion-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <script>
                                    function rretencion(e){
                                       if(e.target.value == "no"){
                                       $("#monto_mensual").val('');
                                       $("#monto_mensual").rules("remove");
                                       $("#monto_mensual").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                       $("#monto_mensual").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                       $("#monto_mensual-error").css("display", "none");
                                       }else if(e.target.value == "si"){
                                       $("#monto_mensual").rules("add", {
                                          required: true,
                                          number: true,
                                          messages: {
                                             required: "Este campo es requerido",
                                             number: "Solo se permiten números y decimales"
                                          }
                                       }); 
                                       }
                                    }
                                 </script>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">Monto mensual</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg  class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" />
                                             </svg>
                                          </div>
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="monto_mensual" name="monto_mensual" placeholder="Monto mensual">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Fecha de nacimiento</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="date" id="fechanac" name="fechanac">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Inicio de contrato</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="date" id="fechacon" name="fechacon">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Fecha de alta</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="date" id="fechaalta" name="fechaalta">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Salario al inicio del periodo de prueba</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="salario_contrato" name="salario_contrato" placeholder="Salario al inicio del periodo de prueba">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Salario después del periodo de prueba</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="salario_fechaalta" name="salario_fechaalta" placeholder="Salario después del periodo de prueba">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Observaciones</label>
                                 <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="observaciones" name="observaciones" placeholder="Observaciones"></textarea>
                                 <div id="error_observaciones"></div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Curp</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="curp" name="curp" placeholder="Curp">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Número de seguro social</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="nss" name="nss" placeholder="NSS">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">RFC</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="rfc" name="rfc" placeholder="RFC">
                                    </div>
                                 </div>
                              </div>
                              <div x-data="{ open: false }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">Tipo de identificación</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M22,3H2C0.91,3.04 0.04,3.91 0,5V19C0.04,20.09 0.91,20.96 2,21H22C23.09,20.96 23.96,20.09 24,19V5C23.96,3.91 23.09,3.04 22,3M22,19H2V5H22V19M14,17V15.75C14,14.09 10.66,13.25 9,13.25C7.34,13.25 4,14.09 4,15.75V17H14M9,7A2.5,2.5 0 0,0 6.5,9.5A2.5,2.5 0 0,0 9,12A2.5,2.5 0 0,0 11.5,9.5A2.5,2.5 0 0,0 9,7M14,7V8H20V7H14M14,9V10H20V9H14M14,11V12H18V11H14" />
                                          </svg>
                                       </div>
                                       <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-on:change="if($el.value == 'INE'){tidentificacion($el.value); open = true;}else if($el.value == 'PASAPORTE'){tidentificacion($el.value); open = true;}else if($el.value == 'CEDULA'){tidentificacion($el.value); open = true;}else{tidentificacion($el.value); open = false;}" id="identificacion" name="identificacion">
                                          <option value="">--Seleccione--</option>
                                          <option value="INE">INE</option>
                                          <option value="PASAPORTE">PASAPORTE</option>
                                          <option value="CEDULA">CEDULA</option>
                                       </select>
                                    </div>
                                 </div>
                                 <script>
                                    function tidentificacion(value){
                                       if(value == ""){
                                          $("#numeroidentificacion").val("");
                                          $("#numeroidentificacion").rules("remove");
                                          $("#numeroidentificacion").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                          $("#numeroidentificacion").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                          $("#numeroidentificacion-error").css("display", "none");
                                       }else {
                                          $("#numeroidentificacion").rules("add", {
                                             required: true,
                                             alphanumeric: true,
                                             messages: {
                                                required: "Este campo es requerido",
                                                alphanumeric: "Solo se permiten carácteres alfanúmericos"
                                             }
                                          }); 
                                       }
                                    }
                                 </script>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">Número de identificación</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M22,18V22H18V19H15V16H12L9.74,13.74C9.19,13.91 8.61,14 8,14A6,6 0 0,1 2,8A6,6 0 0,1 8,2A6,6 0 0,1 14,8C14,8.61 13.91,9.19 13.74,9.74L22,18M7,5A2,2 0 0,0 5,7A2,2 0 0,0 7,9A2,2 0 0,0 9,7A2,2 0 0,0 7,5Z" />
                                             </svg>
                                          </div>
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="numeroidentificacion" name="numeroidentificacion" placeholder="Número de identificación">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-12 h-px bg-slate-200"></div>
                              <div class="grid grid-cols-1 mx-7 mt-5">
                                 <div class="text-center md:text-right">	
                                    <button type="button" id="siguiente" name="siguiente" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Siguiente</button>
                                 </div>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg tab-pane" id="datosA" role="tabpanel" aria-labelledby="datosA-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos adicionales del empleado</h2>
                                 <span class="text-[#64748b]">En esta sección encontrará información extra del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Número de referencias laborales</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="reflab" name="reflab" oninput="AgregarReferencias()" maxlength="1" data-msg-maxlength="Solo se permite un número de un dígito" value="" placeholder="Número de referencias laborales">
                                 </div>
                              </div>
                              <div id="referencias">
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Uniformes</h2>
                                 <span class="text-[#64748b]">Datos de entrega de uniforme.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Fecha de entrega de uniforme</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="date" id="fechauniforme" name="fechauniforme">
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Cantidad (camisa)</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M16,21H8A1,1 0 0,1 7,20V12.07L5.7,13.07C5.31,13.46 4.68,13.46 4.29,13.07L1.46,10.29C1.07,9.9 1.07,9.27 1.46,8.88L7.34,3H9C9.29,4.8 10.4,6.37 12,7.25C13.6,6.37 14.71,4.8 15,3H16.66L22.54,8.88C22.93,9.27 22.93,9.9 22.54,10.29L19.71,13.12C19.32,13.5 18.69,13.5 18.3,13.12L17,12.12V20A1,1 0 0,1 16,21" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="cantidadpolo" name="cantidadpolo" placeholder="Cantidad">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Talla (camisa)</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <title>tshirt-v</title>
                                             <path fill="currentColor" d="M16,21H8A1,1 0 0,1 7,20V12.07L5.7,13.07C5.31,13.46 4.68,13.46 4.29,13.07L1.46,10.29C1.07,9.9 1.07,9.27 1.46,8.88L7.34,3H9C9.29,4.8 10.4,6.37 12,7.25C13.6,6.37 14.71,4.8 15,3H16.66L22.54,8.88C22.93,9.27 22.93,9.9 22.54,10.29L19.71,13.12C19.32,13.5 18.69,13.5 18.3,13.12L17,12.12V20A1,1 0 0,1 16,21" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="tallapolo" name="tallapolo" placeholder="Talla">
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Contactos de emergencia</h2>
                                 <span class="text-[#64748b]">Estos son los contactos de emergencia del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Nombre completo1</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergencianom" name="emergencianom" placeholder="Nombre Completo1">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Parentesco1</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergenciaparentesco" name="emergenciaparentesco" placeholder="Parentesco1">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Teléfono1</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergenciatel" name="emergenciatel" placeholder="Teléfono1">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Nombre completo2</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergencianom2" name="emergencianom2" placeholder="Nombre Completo2">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Parentesco2</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergenciaparentesco2" name="emergenciaparentesco2" placeholder="Parentesco2">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Teléfono2</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergenciatel2" name="emergenciatel2" placeholder="Teléfono2">
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Otros datos del empleado</h2>
                                 <span class="text-[#64748b]">En esta sección encontrará datos extra del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Capacitación</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="capacitacion" name="capacitacion" placeholder="Capacitación">
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Resultado antidoping</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M18,14H14V18H10V14H6V10H10V6H14V10H18M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="antidoping" name="antidoping" placeholder="Resultado antidoping">
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Tipo de sangre</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,20A6,6 0 0,1 6,14C6,10 12,3.25 12,3.25C12,3.25 18,10 18,14A6,6 0 0,1 12,20Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="tipo_sangre" name="tipo_sangre">
                                       <option value="">--Seleccione--</option>
                                       <option value="A_POSITIVO">A+</option>
                                       <option value="A_NEGATIVO">A-</option>
                                       <option value="B_POSITIVO">B+</option>
                                       <option value="B_NEGATIVO">B-</option>
                                       <option value="AB_POSITIVO">AB+</option>
                                       <option value="AB_NEGATIVO">AB-</option>
                                       <option value="O_POSITIVO">O+</option>
                                       <option value="O_NEGATIVO">O-</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">¿Cómo se enteró de la vacante?</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="vacante" name="vacante" placeholder="¿Cómo se entero de la vacante?">
                                 </div>
                              </div>
                              <div x-data="{ open: true }">
			                     <div class="grid grid-cols-1 mt-5 mx-7">
				                    <label class="text-[#64748b] font-semibold mb-2">Tiene familiares dentro de la empresa?</label>
				                    <div class="group flex mt-3 items-center">
				                       <input id="option-empresa-1" type="radio" name="empresa" value="si" x-on:click="rfamiliarempresa; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
				                       <label for="option-empresa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
				                       Sí
				                       </label>
				                       <input id="option-empresa-2" type="radio" name="empresa" value="no" x-on:click="rfamiliarempresa; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
				                       <label for="option-empresa-2" class="text-sm font-medium text-gray-900 ml-2 block">
				                       No
				                       </label>
				                    </div>
			                     </div>
			                     <script>
				                    function rfamiliarempresa(e){
				                       if(e.target.value == "no"){
					                      $("#nomfam").val('');
						                     $("#nomfam").rules("remove");
						                     $("#nomfam").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
						                     $("#nomfam").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
						                     $("#nomfam-error").css("display", "none");
				                       }else if(e.target.value == "si"){
					                      $("#nomfam").rules("add", {
						                     required: true,
						                     names_validation: true,
						                     messages: {
							                    required: "Este campo es requerido",
							                    names_validation: "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios"
						                     }
					                      }); 
				                       }
				                    }
			                     </script>
			                     <div x-show.important="open">
				                    <div class="grid grid-cols-1 mt-5 mx-7">
				                       <label class="text-[#64748b] font-semibold mb-2">Nombre completo del familiar</label>
				                       <div class="group flex">
					                      <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
						                     <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							                    <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
						                     </svg>
					                      </div>
					                      <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="nomfam" name="nomfam" placeholder="Nombre completo del familiar">
				                       </div>
				                    </div>
			                     </div>
		                     </div>
                           <div class="mt-12 h-px bg-slate-200"></div>
                              <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                 <button type="button" id="anterior" name="anterior" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                 <button type="button" id="siguiente2" name="siguiente2" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Siguiente</button>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg tab-pane" id="datosB" role="tabpanel" aria-labelledby="datosB-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Datos bancarios del empleado</h2>
                                 <span class="text-[#64748b]">En esta sección encontrará información sobre los datos bancarios del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">Número de beneficiarios bancarios</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="refban" name="refban" oninput="AgregarBanco()" maxlength="1" data-msg-maxlength="Solo se permite un número de un dígito" value="" placeholder="Número de beneficiarios bancarios">
                                 </div>
                              </div>
                              <div id="ref">
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Cuenta bancaria personal</h2>
                                 <span class="text-[#64748b]">En esta sección se encuentran las credenciales bancarias personales del empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Banco</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="banco_personal" name="banco_personal" placeholder="Banco">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Cuenta</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="cuenta_personal" name="cuenta_personal" placeholder="Cuenta">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Clabe</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="clabe_personal" name="clabe_personal" placeholder="Clabe">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1 lg:col-span-3">
                                    <label class="text-[#64748b] font-semibold mb-2">Plástico asignado</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M19.83 7.5L17.56 5.23C17.63 4.81 17.74 4.42 17.88 4.08C17.96 3.9 18 3.71 18 3.5C18 2.67 17.33 2 16.5 2C14.86 2 13.41 2.79 12.5 4H7.5C4.46 4 2 6.46 2 9.5S4.5 21 4.5 21H10V19H12V21H17.5L19.18 15.41L22 14.47V7.5H19.83M16 11C15.45 11 15 10.55 15 10S15.45 9 16 9C16.55 9 17 9.45 17 10S16.55 11 16 11Z"></path>
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="plastico_personal" name="plastico_personal" placeholder="Plástico asignado">
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Cuenta bancaria asignada por la empresa</h2>
                                 <span class="text-[#64748b]">En esta sección se encuentra la nómina asignada al empleado.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Banco</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="banco_nomina" name="banco_nomina" placeholder="Banco">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Cuenta</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="cuenta_nomina" name="cuenta_nomina" placeholder="Cuenta">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Clabe</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="clabe_nomina" name="clabe_nomina" placeholder="Clabe">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1 lg:col-span-3">
                                    <label class="text-[#64748b] font-semibold mb-2">Plástico asignado</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M19.83 7.5L17.56 5.23C17.63 4.81 17.74 4.42 17.88 4.08C17.96 3.9 18 3.71 18 3.5C18 2.67 17.33 2 16.5 2C14.86 2 13.41 2.79 12.5 4H7.5C4.46 4 2 6.46 2 9.5S4.5 21 4.5 21H10V19H12V21H17.5L19.18 15.41L22 14.47V7.5H19.83M16 11C15.45 11 15 10.55 15 10S15.45 9 16 9C16.55 9 17 9.45 17 10S16.55 11 16 11Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="plastico" name="plastico" placeholder="Plástico asignado">
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-12 h-px bg-slate-200"></div>
                              <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                 <button type="button" id="anterior2" name="anterior2" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                 <button type="button" id="siguiente3" name="siguiente3" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Siguiente</button>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg tab-pane" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <table class="min-w-full border-collapse block md:table">
                                    <thead class="block md:table-header-group">
                                       <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                          <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                                          <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acción</th>
                                       </tr>
                                    </thead>
                                    <tbody class="block md:table-row-group">
                                       <?php while($fetchtipopapeleria = $checktipospapeleria -> fetch(PDO::FETCH_OBJ)){ ?>
                                       <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                          <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                             <span class="inline-block md:hidden font-bold">Nombre</span>
                                             <p><?php echo ucfirst(strtolower($fetchtipopapeleria->nombre)); ?></p>
                                          </td>
                                          <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                             <span class="inline-block md:hidden font-bold">Acción</span>
                                             <div class="flex flex-col w-full justify-center">
                                                <div id="upload-button<?php echo $fetchtipopapeleria->id ?>" class="inline-flex self-start items-center px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900">
                                                   Subir archivo
                                                </div>
                                                <div class="flex-1 md:flex items-center justify-between">
                                                   <span id="upload-text<?php echo $fetchtipopapeleria->id ?>">No hay ningún archivo seleccionado</span>
                                                   <button type="button" id="upload-delete<?php echo $fetchtipopapeleria->id ?>" class="hidden">
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                         <path
                                                            d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                                      </svg>
                                                   </button>
                                                </div>
                                             </div>
                                             <input type="file" name="infp_papeleria<?php echo $fetchtipopapeleria->id ?>" id="infp_papeleria<?php echo $fetchtipopapeleria->id ?>"  class="hidden" />
                                             <div id="content-container<?php echo $fetchtipopapeleria->id ?>"></div>
                                          </td>
                                       </tr>
                                       <?php
                                          } 
                                          ?>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="mt-12 h-px bg-slate-200"></div>
                              <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                 <button type="button" id="anterior3" name="anterior3" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                 <div id="submit-button">   
                                    <button type="submit" id="finish" name="finish" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Guardar</button>
                                 </div>
                              </div>
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