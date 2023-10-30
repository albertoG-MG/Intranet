<div class="container mx-auto px-6 py-8">
   <h2 class="Titulos text-3xl sm:text-5xl lg:text-6xl">
      Editar expedientes
   </h2>
   <div class="mt-4">
      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto">
            <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
               <div class="w-full">
                  <div class="bg-gray-50 shadow-md rounded-t">
                     <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                        <a href="dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
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
                        <a href="expedientes.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
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
                           <span class="text-sm font-medium">Editar expedientes</span>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white p-3 shadow-md rounded-b">
                     <div class="px-4 py-2 mt-1 mx-7 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                        <b>EDITAR EXPEDIENTE: </b>El formulario se divide en varias secciones o pestañas para organizar la información. Cada sección contiene un conjunto específico de datos que el usuario debe completar. La característica clave aquí es que no es necesario completar todo el formulario de una vez; en su lugar, el usuario puede guardar los datos de cada sección individualmente sin necesidad de llenar todas las secciones antes de avanzar. <b> Nota: </b> El botón de guardar progreso no es consecutivo, esto significa que los datos se almacenan por separado en función de la pestaña en la que se encuentra el usuario. 
                     </div>
                     
                     <ul id='menu' class='flex flex-col items-center md:flex-row md:flex-wrap w-full px-7 mt-5 gap-3'>
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
                              <span>Papelería</span>
                           </button>
                        </li>
                     </ul>
                     <form id="Guardar" method="post">
                        <div id='menu-contents' style="word-break: break-word;">
                           <div class="block bg-transparent rounded-lg tab-pane" id="datosG" role="tabpanel" aria-labelledby="datosG-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold">Datos del empleado</h2>
                                 <span class="text-[#64748b]">Por favor, proporciona todos los datos necesarios.</span>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                    ASIGNAR EXPEDIENTE A:
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
                                             $checkexpuser = $object->_db->prepare("SELECT usuarios.id FROM expedientes INNER JOIN usuarios ON expedientes.users_id = usuarios.id WHERE expedientes.id != :expedienteid");
                                             $checkexpuser->bindParam('expedienteid', $Editarid, PDO::PARAM_INT);
                                             $checkexpuser->execute();
                                             while ($fetchuserexp = $checkexpuser->fetch(PDO::FETCH_OBJ)) {
                                                $arr[] = $fetchuserexp->id;
                                             }
                                             $usuarios = user::FetchUsuarios();
                                             foreach ($usuarios as $row) {
                                                if ($row->rolnom != "Superadministrador" && $row->rolnom != "Administrador" && $row->rolnom != "Director general" && $row->rolnom != "Usuario externo") {
                                                      if (!in_array($row->id, $arr)) {
                                                         echo "<option value='" . $row->id . "'";
                                                         if ($row->id == $edit->userid) {
                                                            echo 'selected';
                                                         }
                                                         echo ">";
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
                                    IDENTIFICADOR DEL EXPEDIENTE
                                 </label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" aria-describedby="numero_expediente_help" id="numero_expediente" name="numero_expediente" value="<?php echo isset($edit->enum_expediente) ? $edit->enum_expediente : ""; ?>" placeholder="i.e. L-35">
                                 </div>
                                 <div id="loader-numero-expediente" class="hidden mt-5">
                                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                       <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                    </svg>
                                    <span>Cargando...</span>
                                 </div>
                                 <div class="hidden" id="correct-numero-expediente">
                                    <li class="flex items-center">
                                       <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                       </svg>
                                       <p class="text-green-600">Identificador del expediente válido y disponible</p>
                                    </li>
                                 </div>
                                 <div id="numero_expediente_help" class="text-[#64748b]">
                                    El identificador del expediente debe estar compuesto de una letra, un guión y varios números.
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                    NUMERO DE NOMINA
                                 </label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" aria-describedby="numero_nomina_help" id="numero_nomina" name="numero_nomina" value="<?php echo isset($edit->enum_nomina) ? $edit->enum_nomina : ""; ?>" placeholder="Número de nómina">
                                 </div>
                                 <div id="loader-numero-nomina" class="hidden mt-5">
                                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                       <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                    </svg>
                                    <span>Cargando...</span>
                                 </div>
                                 <div class="hidden" id="correct-numero-nomina">
                                    <li class="flex items-center">
                                       <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                       </svg>
                                       <p class="text-green-600">Número de nómina válido y disponible</p>
                                    </li>
                                 </div>
                                 <div id="numero_nomina_help" class="text-[#64748b]">
                                    Ingresa el número de nómina.
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">
                                   NUMERO DE ASISTENCIA/EMPLEADO
                                 </label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" aria-describedby="asistencia_empleado_help" id="asistencia_empleado" name="asistencia_empleado" value="<?php echo isset($edit->enum_asistencia) ? $edit->enum_asistencia : ""; ?>" placeholder="i.e. 12345678901234567">
                                 </div>
                                 <div id="loader-asistencia" class="hidden mt-5">
                                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                       <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                    </svg>
                                    <span>Cargando...</span>
                                 </div>
                                 <div class="hidden" id="correct-asistencia">
                                    <li class="flex items-center">
                                       <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                       </svg>
                                       <p class="text-green-600">Número de asistencia/empleado válido y disponible</p>
                                    </li>
                                 </div>
                                 <div id="asistencia_empleado_help" class="text-[#64748b]">
                                    Ingrese su número de asistencia.
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">DEPARTAMENTO</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border border-gray-200 bg-gray-200 text-gray-900 rounded-md focus:ring-2 focus:ring-celeste-600" type="text" id="departamento" name="departamento" placeholder="Departamento" readonly>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">PUESTO</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="puesto" name="puesto" value="<?php if($edit->epuesto !== null){ echo "{$edit->epuesto}"; } ?>" placeholder="Puesto">
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">NIVEL DE ESTUDIOS</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M16 8C16 10.21 14.21 12 12 12C9.79 12 8 10.21 8 8L8.11 7.06L5 5.5L12 2L19 5.5V10.5H18V6L15.89 7.06L16 8M12 14C16.42 14 20 15.79 20 18V20H4V18C4 15.79 7.58 14 12 14Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="estudios" name="estudios">
                                       <option value="">-- Seleccione --</option>
                                       <option value="PRIMARIA" <?php if($edit->eestudios == "PRIMARIA"){echo 'selected="selected"';} ?>>Primaria</option>
                                       <option value="SECUNDARIA" <?php if($edit->eestudios == "SECUNDARIA"){echo 'selected="selected"';} ?>>Secundaria</option>
                                       <option value="BACHILLERATO" <?php if($edit->eestudios == "BACHILLERATO"){echo 'selected="selected"';} ?>>Bachillerato</option>
                                       <option value="CARRERA TECNICA" <?php if($edit->eestudios == "CARRERA TECNICA"){echo 'selected="selected"';} ?>>Carrera técnica</option>
                                       <option value="LICENCIATURA" <?php if($edit->eestudios == "LICENCIATURA"){echo 'selected="selected"';} ?>>Licenciatura</option>
                                       <option value="ESPECIALIDAD" <?php if($edit->eestudios == "ESPECIALIDAD"){echo 'selected="selected"';} ?>>Especialidad</option>
                                       <option value="MAESTRIA" <?php if($edit->eestudios == "MAESTRIA"){echo 'selected="selected"';} ?>>Maestría</option>
                                       <option value="DOCTORADO" <?php if($edit->eestudios == "DOCTORADO"){echo 'selected="selected"';} ?>>Doctorado</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">CORREO ELECTRONICO</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border border-gray-200 bg-gray-200 text-gray-900 rounded-md focus:ring-2 focus:ring-celeste-600" type="text" id="correo_usuario" name="correo_usuario" placeholder="Correo" readonly>
                                 </div>
                              </div>
                              <div x-data="{ open: <?php echo $edit->eposee_correo === 'SI' ? 'true' : 'false'; ?> }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">¿DESEA AGREGAR UN CORREO ELECTRONICO ADICIONAL?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-correo-personal-1" type="radio" name="posee_correo" value="si" x-on:click="open = true" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-correo-personal-1" aria-describedby="option-correo-personal-1" <?php echo $edit->eposee_correo === 'SI' ? 'checked' : ''; ?>>
                                       <label for="option-correo-personal-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-correo-personal-2" type="radio" name="posee_correo" value="no" x-on:click="open = false" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-correo-personal-2" aria-describedby="option-correo-personal-2" <?php echo ($edit->eposee_correo === 'NO' || $edit->eposee_correo === null) ? 'checked' : ''; ?>>
                                       <label for="option-correo-personal-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">Correo electrónico adicional</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                                             </svg>
                                          </div>
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" aria-describedby="correoadicional_help" id="correo_adicional" name="correo_adicional" value="<?php echo $edit->eposee_correo === 'SI' ? $edit->ecorreo_adicional : '';?>" placeholder="i.e. example@example.com">
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
                                 <h2 class="text-2xl text-celeste font-semibold mt-5">Datos de ubicación</h2>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">CALLE <label style="color:red;"> *</label></label>
                                    <div class="group flex"> 
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="calle" name="calle" value="<?php if($edit->ecalle !== null){ echo "{$edit->ecalle}"; } ?>" placeholder="Calle">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">NUMERO INTERIOR</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="ninterior" name="ninterior" value="<?php if($edit->enum_interior !== null){ echo "{$edit->enum_interior}"; } ?>" placeholder="Número Interior">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">NUMERO EXTERIOR <label style="color:red;"> *</label></label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="nexterior" name="nexterior" value="<?php if($edit->enum_exterior !== null){ echo "{$edit->enum_exterior}"; } ?>" placeholder="Número exterior">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">COLONIA</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="colonia" name="colonia" value="<?php if($edit->ecolonia !== null){ echo "{$edit->ecolonia}"; } ?>" placeholder="Colonia">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">ESTADO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                          </svg>
                                       </div>
                                       <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="estado" name="estado">
                                          <option value="">--Seleccione--</option>
                                          <?php
                                             while ($r = $estado->fetch(PDO::FETCH_OBJ)) {
                                                $contestado++;
                                          ?>
                                          <option value="<?php echo $contestado; ?>" <?php if($contestado == $edit->eestado){echo 'selected="selected"';} ?>><?php echo $r->nombre; ?></option>
                                          <?php
                                             }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">MUNICIPIO</label>
                                    <div class="group flex" id="imunicipio">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                          </svg>
                                       </div>
                                       <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="municipio" name="municipio">
                                          <option value="">--Seleccione un estado--</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">CODIGO POSTAL <label style="color:red;"> *</label></label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="codigo" name="codigo" value="<?php if($edit->ecodigo !== null){ echo "{$edit->ecodigo}"; } ?>" placeholder="Código postal">
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">TELEFONO DE DOMICILIO <label style="color:red;"> *</label></label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="teldom" name="teldom" value="<?php if($edit->etel_dom !== null){ echo "{$edit->etel_dom}"; } ?>" placeholder="Télefono de domicilio">
                                 </div>
                              </div>
                              <div x-data="{ open: <?php echo $edit->eposee_telmov === 'SI' ? 'true' : 'false'; ?> }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">¿POSEE TELEFONO PROPIO?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-telmov-1" type="radio" name="tel_movil" value="si" x-on:click="open = true" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-1" aria-describedby="option-1" <?php echo $edit->eposee_telmov === 'SI' ? 'checked' : ''; ?>>
                                       <label for="option-telmov-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-telmov-2" type="radio" name="tel_movil" value="no" x-on:click="open = false" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-2" aria-describedby="option-2" <?php echo ($edit->eposee_telmov === 'NO' || $edit->eposee_telmov === null) ? 'checked' : ''; ?>>
                                       <label for="option-telmov-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">Teléfono móvil propio</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                             </svg>
                                          </div>
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="telmov" name="telmov" value="<?php echo $edit->eposee_telmov === 'SI' ? $edit->etel_mov : '';?>" placeholder="Télefono móvil propio">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold mt-5">Dispositivos proporcionados por la empresa</h2>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div x-data="{ open: <?php echo $edit->eposee_telempresa === 'SI' ? 'true' : 'false';?> }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">¿TELEFONO ASIGNADO POR LA EMPRESA?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-telempresa-1" type="radio" name="tel_movil_empresa" value="si" x-on:click="open = true" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-1" aria-describedby="option-1" <?php echo $edit->eposee_telempresa === 'SI' ? 'checked' : ''; ?>>
                                       <label for="option-telempresa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-telempresa-2" type="radio" name="tel_movil_empresa" value="no" x-on:click="open = false" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-2" aria-describedby="option-2" <?php echo ($edit->eposee_telempresa === 'NO' || $edit->eposee_telempresa === null) ? 'checked' : ''; ?>>
                                       <label for="option-telempresa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">MARCACION CORTA</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="marcacion" name="marcacion" value="<?php echo $edit->eposee_telempresa === 'SI' ? $edit->emarcacion : ''; ?>" placeholder="i.e. 767">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">NUMERO DE SERIE</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M22,18V22H18V19H15V16H12L9.74,13.74C9.19,13.91 8.61,14 8,14A6,6 0 0,1 2,8A6,6 0 0,1 8,2A6,6 0 0,1 14,8C14,8.61 13.91,9.19 13.74,9.74L22,18M7,5A2,2 0 0,0 5,7A2,2 0 0,0 7,9A2,2 0 0,0 9,7A2,2 0 0,0 7,5Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="serie" name="serie" value="<?php echo $edit->eposee_telempresa === 'SI' ? $edit->eserie : ''; ?>" placeholder="i.e. DB168091200530">
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
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="sim" name="sim" value="<?php echo $edit->eposee_telempresa === 'SI' ? $edit->esim : ''; ?>" placeholder="i.e 89014103211118510720">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">NUMERO DE RED</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4.93,4.93C3.12,6.74 2,9.24 2,12C2,14.76 3.12,17.26 4.93,19.07L6.34,17.66C4.89,16.22 4,14.22 4,12C4,9.79 4.89,7.78 6.34,6.34L4.93,4.93M19.07,4.93L17.66,6.34C19.11,7.78 20,9.79 20,12C20,14.22 19.11,16.22 17.66,17.66L19.07,19.07C20.88,17.26 22,14.76 22,12C22,9.24 20.88,6.74 19.07,4.93M7.76,7.76C6.67,8.85 6,10.35 6,12C6,13.65 6.67,15.15 7.76,16.24L9.17,14.83C8.45,14.11 8,13.11 8,12C8,10.89 8.45,9.89 9.17,9.17L7.76,7.76M16.24,7.76L14.83,9.17C15.55,9.89 16,10.89 16,12C16,13.11 15.55,14.11 14.83,14.83L16.24,16.24C17.33,15.15 18,13.65 18,12C18,10.35 17.33,8.85 16.24,7.76M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="numred" name="numred" value="<?php echo $edit->eposee_telempresa === 'SI' ? $edit->enumred : ''; ?>" placeholder="i.e. 310260">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">MODELO</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,2C2.89,2 2,2.89 2,4V14H4V4H14V2H4M8,6C6.89,6 6,6.89 6,8V18H8V8H18V6H8M12,10C10.89,10 10,10.89 10,12V20C10,21.11 10.89,22 12,22H20C21.11,22 22,21.11 22,20V12C22,10.89 21.11,10 20,10H12Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="modelotel" name="modelotel" value="<?php echo $edit->eposee_telempresa === 'SI' ? $edit->modeltel : ''; ?>" placeholder="i.e. TP802A">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">MARCA</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,2C2.89,2 2,2.89 2,4V14H4V4H14V2H4M8,6C6.89,6 6,6.89 6,8V18H8V8H18V6H8M12,10C10.89,10 10,10.89 10,12V20C10,21.11 10.89,22 12,22H20C21.11,22 22,21.11 22,20V12C22,10.89 21.11,10 20,10H12Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="marcatel" name="marcatel" value="<?php echo $edit->eposee_telempresa === 'SI' ? $edit->marcatel : ''; ?>" placeholder="i.e. Samsung Galaxy">
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
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="imei" name="imei" value="<?php echo $edit->eposee_telempresa === 'SI' ? $edit->eimei : ''; ?>" placeholder="i.e. 861536030196001">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div x-data="{ open: <?php echo $edit->eposee_laptop === 'SI' ? 'true' : 'false';?> }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">¿LAPTOP ASIGNADA POR LA EMPRESA?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-laptop-1" type="radio" name="laptop_empresa" value="si" x-on:click="open = true" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-laptop-1" aria-describedby="option-laptop-1" <?php echo $edit->eposee_laptop === 'SI' ? 'checked' : ''; ?>>
                                       <label for="option-laptop-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-laptop-2" type="radio" name="laptop_empresa" value="no" x-on:click="open = false" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-laptop-2" aria-describedby="option-laptop-2" <?php echo ($edit->eposee_laptop === 'NO' || $edit->eposee_laptop === null) ? 'checked' : ''; ?>>
                                       <label for="option-laptop-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">MARCA DE LA LAPTOP</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,6H20V16H4M20,18A2,2 0 0,0 22,16V6C22,4.89 21.1,4 20,4H4C2.89,4 2,4.89 2,6V16A2,2 0 0,0 4,18H0V20H24V18H20Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="marca_laptop" name="marca_laptop" value="<?php echo $edit->eposee_laptop === 'SI' ? $edit->emarca_laptop : '';?>" placeholder="i.e. Lenovo">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">MODELO DE LA LAPTOP</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M4,2C2.89,2 2,2.89 2,4V14H4V4H14V2H4M8,6C6.89,6 6,6.89 6,8V18H8V8H18V6H8M12,10C10.89,10 10,10.89 10,12V20C10,21.11 10.89,22 12,22H20C21.11,22 22,21.11 22,20V12C22,10.89 21.11,10 20,10H12Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="modelo_laptop" name="modelo_laptop" value="<?php echo $edit->eposee_laptop === 'SI' ? $edit->emodelo_laptop : ''; ?>" placeholder="i.e. Lenovo Ideapad 330-15ARR">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">SERIE DE LA LAPTOP</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M22,18V22H18V19H15V16H12L9.74,13.74C9.19,13.91 8.61,14 8,14A6,6 0 0,1 2,8A6,6 0 0,1 8,2A6,6 0 0,1 14,8C14,8.61 13.91,9.19 13.74,9.74L22,18M7,5A2,2 0 0,0 5,7A2,2 0 0,0 7,9A2,2 0 0,0 9,7A2,2 0 0,0 7,5Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="serie_laptop" name="serie_laptop" value="<?php echo $edit->eposee_laptop === 'SI' ? $edit->eserie_laptop : ''; ?>" placeholder="i.e. S100NWDJ">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste mt-5 font-semibold">Datos relevantes del empleado</h2>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">¿POSEE CASA PROPIA?</label>
                                 <div class="group flex mt-3 items-center">
                                    <input id="option-casa-1" type="radio" name="casa" value="si" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-1" aria-describedby="option-1" <?php echo $edit->ecasa_propia === 'SI' ? 'checked' : ''; ?>>
                                    <label for="option-casa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                    Sí
                                    </label>
                                    <input id="option-casa-2" type="radio" name="casa" value="no" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-2" aria-describedby="option-2" <?php echo ($edit->ecasa_propia === 'NO' || $edit->ecasa_propia === null) ? 'checked' : ''; ?>>
                                    <label for="option-casa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                    No
                                    </label>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">ESTADO CIVIL</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,10L8,4.4L9.6,2H14.4L16,4.4L12,10M15.5,6.8L14.3,8.5C16.5,9.4 18,11.5 18,14A6,6 0 0,1 12,20A6,6 0 0,1 6,14C6,11.5 7.5,9.4 9.7,8.5L8.5,6.8C5.8,8.1 4,10.8 4,14A8,8 0 0,0 12,22A8,8 0 0,0 20,14C20,10.8 18.2,8.1 15.5,6.8Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="ecivil" name="ecivil">
                                       <option value="">--Seleccione--</option>
                                       <option value="SOLTERO" <?php if($edit->eecivil == "SOLTERO"){echo 'selected="selected"';} ?>>Soltero</option>
                                       <option value="CASADO" <?php if($edit->eecivil == "CASADO"){echo 'selected="selected"';} ?>>Casado</option>
                                       <option value="DIVORCIADO" <?php if($edit->eecivil == "DIVORCIADO"){echo 'selected="selected"';} ?>>Divorciado</option>
                                       <option value="UNION LIBRE" <?php if($edit->eecivil == "UNION LIBRE"){echo 'selected="selected"';} ?>>Unión libre</option>
                                    </select>
                                 </div>
                              </div>
                              <div x-data="{ open: <?php echo $edit->eposee_retencion === 'SI' ? 'true' : 'false'; ?> }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">¿POSEE RETENCION DE CREDITO INFONAVIT?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-retencion-1" type="radio" name="retencion" value="si" x-on:click="open = true" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-1" aria-describedby="option-1" <?php echo $edit->eposee_retencion === 'SI' ? 'checked' : ''; ?>>
                                       <label for="option-retencion-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                       Sí
                                       </label>
                                       <input id="option-retencion-2" type="radio" name="retencion" value="no" x-on:click="open = false" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-2" aria-describedby="option-2" <?php echo ($edit->eposee_retencion === 'NO' || $edit->eposee_retencion === null) ? 'checked' : ''; ?>>
                                       <label for="option-retencion-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                       No
                                       </label>
                                    </div>
                                 </div>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">MONTO MENSUAL</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg  class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" />
                                             </svg>
                                          </div>
                                          <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="monto_mensual" name="monto_mensual" value="<?php echo $edit->eposee_retencion === 'SI' ? $edit->emonto_mensual : ''; ?>" placeholder="Monto mensual">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">FECHA DE NACIMIENTO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="fechanac" name="fechanac" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">INICIO DE CONTRATO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="fechacon" name="fechacon" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">FECHA DE ALTA</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="fechaalta" name="fechaalta" autocomplete="off">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">SALARIO AL INICIO DEL PERIODO DE PRUEBA</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="salario_contrato" name="salario_contrato" value="<?php if($edit->esalario_contrato !== null){ echo "{$edit->esalario_contrato}"; } ?>" placeholder="Salario al inicio del periodo de prueba">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">SALARIO DESPUES DEL PERIODO DE PRUEBA</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="salario_fechaalta" name="salario_fechaalta" value="<?php if($edit->esalario_fechaalta !== null){ echo "{$edit->esalario_fechaalta}"; }?>" placeholder="Salario después del periodo de prueba">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">OBSERVACIONES</label>
                                 <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="observaciones" name="observaciones" placeholder="Observaciones"><?php if($edit->eobservaciones !== null){ echo "{$edit->eobservaciones}"; } ?></textarea>
                                 <div id="error_observaciones"></div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">CURP</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="curp" name="curp" value="<?php if($edit->ecurp !== null){ echo "{$edit->ecurp}"; } ?>" placeholder="Curp">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">NUMERO DE SEGURO SOCIAL</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="nss" name="nss" value="<?php if($edit->enss !== null){ echo "{$edit->enss}"; } ?>" placeholder="NSS">
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
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="rfc" name="rfc" value="<?php if($edit->erfc !== null){ echo "{$edit->erfc}"; }?>" placeholder="RFC">
                                    </div>
                                 </div>
                              </div>
                              <div x-data="{ open: <?php echo $edit->etipo_identificacion !== null ? 'true' : 'false'; ?>, ine: <?php echo $edit->etipo_identificacion === "INE" ? 'true' : 'false'; ?>, pasaporte: <?php echo $edit->etipo_identificacion === "PASAPORTE" ? 'true' : 'false';?>, cedula: <?php echo $edit->etipo_identificacion === "CEDULA" ? 'true' : 'false'; ?> }">
                                 <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 md:gap-8 items-start">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                       <label class="text-[#64748b] font-semibold mb-2">TIPO DE IDENTIFICACION</label>
                                       <div class="group flex">
                                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                             <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M22,3H2C0.91,3.04 0.04,3.91 0,5V19C0.04,20.09 0.91,20.96 2,21H22C23.09,20.96 23.96,20.09 24,19V5C23.96,3.91 23.09,3.04 22,3M22,19H2V5H22V19M14,17V15.75C14,14.09 10.66,13.25 9,13.25C7.34,13.25 4,14.09 4,15.75V17H14M9,7A2.5,2.5 0 0,0 6.5,9.5A2.5,2.5 0 0,0 9,12A2.5,2.5 0 0,0 11.5,9.5A2.5,2.5 0 0,0 9,7M14,7V8H20V7H14M14,9V10H20V9H14M14,11V12H18V11H14" />
                                             </svg>
                                          </div>
                                          <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" x-on:change="if($el.value == 'INE'){open = true; ine = true; pasaporte = false; cedula = false;}else if($el.value == 'PASAPORTE'){open = true; ine = false; pasaporte = true; cedula = false;}else if($el.value == 'CEDULA'){open = true; ine = false; pasaporte = false; cedula = true;}else{open = false; ine = false; pasaporte = false; cedula = false;}" id="identificacion" name="identificacion">
                                             <option value="">--Seleccione--</option>
                                             <option value="INE" <?php if($edit->etipo_identificacion == "INE"){echo 'selected="selected"';} ?>>INE</option>
                                             <option value="PASAPORTE" <?php if($edit->etipo_identificacion == "PASAPORTE"){echo 'selected="selected"';} ?>>PASAPORTE</option>
                                             <option value="CEDULA" <?php if($edit->etipo_identificacion == "CEDULA"){echo 'selected="selected"';} ?>>CEDULA</option>
                                          </select>
                                       </div>
                                       <div x-show.important="open">
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold mb-2">NUMERO DE IDENTIFICACION</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M22,18V22H18V19H15V16H12L9.74,13.74C9.19,13.91 8.61,14 8,14A6,6 0 0,1 2,8A6,6 0 0,1 8,2A6,6 0 0,1 14,8C14,8.61 13.91,9.19 13.74,9.74L22,18M7,5A2,2 0 0,0 5,7A2,2 0 0,0 7,9A2,2 0 0,0 9,7A2,2 0 0,0 7,5Z" />
                                                   </svg>
                                                </div>
                                                <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="numeroidentificacion" name="numeroidentificacion" value="<?php echo $edit->etipo_identificacion !== null ? $edit->enum_identificacion : ''; ?>" placeholder="Número de identificación">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div x-show.important="ine">
                                       <div class=" grid-cols-1 mt-5 ">
                                          <img class="w-full" src="../src/img/INE.jpeg">
                                       </div>
                                    </div>
                                    <div x-show.important="pasaporte">
                                       <div class="grid grid-cols-1 mt-5 ">
                                          <img class="w-full" src="../src/img/PASAPORTE.jpeg">
                                       </div>
                                    </div>
                                    <div x-show.important="cedula">
                                       <div class="grid grid-cols-1 mt-5 ">
                                          <img class="w-full" src="../src/img/CEDULA.jpeg">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-12 h-px bg-slate-200"></div>
                              <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                 <button type="button" id="siguiente" name="siguiente" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Siguiente</button>
                                 <div id="submit-DG">
                                    <button type="button" id="guardarDG" name="guardarDG" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Guardar progreso</button>
                                 </div>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg tab-pane" id="datosA" role="tabpanel" aria-labelledby="datosA-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold mt-5">Referencias laborales</h2>
                                 <span class="text-[#64748b]">Opinión de terceros sobre el desempeño laboral del empleado.</span>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div x-data="{ numReferencias: <?php if($referencias_count == 0){ echo 0; }else if($referencias_count == 1){ echo 1; }else if($referencias_count == 2){ echo 2; }else if($referencias_count == 3){ echo 3; }?> }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label for="numReferencias" class="text-[#64748b] font-semibold mb-2">NUMERO DE REFERENCIAS LABORALES</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z"></path>
                                          </svg>
                                       </div>
                                       <select id="numReferencias" name="numReferencias" x-model="numReferencias" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600">
                                          <option value="0">NO TENGO REFERENCIAS</option>
                                          <option value="1">UNA REFERENCIA</option>
                                          <option value="2">DOS REFERENCIAS</option>
                                          <option value="3">TRES REFERENCIAS</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div x-show="numReferencias >= 1">
                                    <!-- Referencia 1 -->
                                    <div class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7 items-start border-t border-[#d1d5db] pt-5">
                                       <div class="md:col-span-1">
                                          <div class="text-[#000] font-bold mb-2">Primer referencia</div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">NOMBRE (s)</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rnombre1" value="<?php echo ($referencias_count >= 1) ? $fetch_referencias[0]["nombre"] : ''; ?>" placeholder="Nombre (s)" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">APELLIDO PATERNO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rapellidopat1" value="<?php echo ($referencias_count >= 1) ? $fetch_referencias[0]["apellido_pat"] : ''; ?>" placeholder="Apellido paterno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">APELLIDO MATERNO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rapellidomat1" value="<?php echo ($referencias_count >= 1) ? $fetch_referencias[0]["apellido_mat"] : ''; ?>" placeholder="Apellido materno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">RELACION</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z"></path>
                                                      </svg>
                                                   </div>
                                                   <select name="infa_rrelacion1" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                      <option value="">--Selecciona--</option>
                                                      <option value="SUPERVISOR" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "SUPERVISOR") ? 'selected' : ''; ?>>SUPERVISOR</option>
                                                      <option value="SUPERVISORA" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "SUPERVISORA") ? 'selected' : ''; ?>>SUPERVISORA</option>
                                                      <option value="COLEGA" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "COLEGA") ? 'selected' : ''; ?>>COLEGA</option>
                                                      <option value="SUBORDINADO" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "SUBORDINADO") ? 'selected' : ''; ?>>SUBORDINADO</option>
                                                      <option value="SUBORDINADA" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "SUBORDINADA") ? 'selected' : ''; ?>>SUBORDINADA</option>
                                                      <option value="MENTOR" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "MENTOR") ? 'selected' : ''; ?>>MENTOR</option>
                                                      <option value="MENTORA" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "MENTORA") ? 'selected' : ''; ?>>MENTORA</option>
                                                      <option value="CLIENTE" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "CLIENTE") ? 'selected' : ''; ?>>CLIENTE</option>
                                                      <option value="PROFESOR" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "PROFESOR") ? 'selected' : ''; ?>>PROFESOR</option>
                                                      <option value="PROFESORA" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "PROFESORA") ? 'selected' : ''; ?>>PROFESORA</option>
                                                      <option value="DEPARTAMENTO DE PERSONAL" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "DEPARTAMENTO DE PERSONAL") ? 'selected' : ''; ?>>DEPARTAMENTO DE PERSONAL</option>
                                                      <option value="PROVEEDOR" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "PROVEEDOR") ? 'selected' : ''; ?>>PROVEEDOR</option>
                                                      <option value="PROVEEDORA" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "PROVEEDORA") ? 'selected' : ''; ?>>PROVEEDORA</option>
                                                      <option value="MIEMBRO DE UN COMITE" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "MIEMBRO DE UN COMITE") ? 'selected' : ''; ?>>MIEMBRO DE UN COMITÉ</option>
                                                      <option value="OTRO" <?php echo ($referencias_count >= 1 && $fetch_referencias[0]["relacion"] === "OTRO") ? 'selected' : ''; ?>>OTRO</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">TELEFONO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rtelefono1" value="<?php echo ($referencias_count >= 1) ? $fetch_referencias[0]["telefono"] : ''; ?>" placeholder="Teléfono" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div x-show="numReferencias >= 2">
                                    <!-- Referencia 2 -->
                                    <div class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7 items-start border-t border-[#d1d5db] pt-5">
                                       <div class="md:col-span-1">
                                          <div class="text-[#000] font-bold mb-2">Segunda referencia</div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">NOMBRE (s)</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rnombre2" value="<?php echo ($referencias_count >= 2) ? $fetch_referencias[1]["nombre"] : ''; ?>" placeholder="Nombre (s)" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">APELLIDO PATERNO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rapellidopat2" value="<?php echo ($referencias_count >= 2) ? $fetch_referencias[1]["apellido_pat"] : ''; ?>" placeholder="Apellido paterno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">APELLIDO MATERNO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rapellidomat2" value="<?php echo ($referencias_count >= 2) ? $fetch_referencias[1]["apellido_mat"] : ''; ?>" placeholder="Apellido materno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">RELACION</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z"></path>
                                                      </svg>
                                                   </div>
                                                   <select name="infa_rrelacion2" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                      <option value="">--Selecciona--</option>
                                                      <option value="SUPERVISOR" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "SUPERVISOR") ? 'selected' : ''; ?>>SUPERVISOR</option>
                                                      <option value="SUPERVISORA" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "SUPERVISORA") ? 'selected' : ''; ?>>SUPERVISORA</option>
                                                      <option value="COLEGA" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "COLEGA") ? 'selected' : ''; ?>>COLEGA</option>
                                                      <option value="SUBORDINADO" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "SUBORDINADO") ? 'selected' : ''; ?>>SUBORDINADO</option>
                                                      <option value="SUBORDINADA" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "SUBORDINADA") ? 'selected' : ''; ?>>SUBORDINADA</option>
                                                      <option value="MENTOR" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "MENTOR") ? 'selected' : ''; ?>>MENTOR</option>
                                                      <option value="MENTORA" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "MENTORA") ? 'selected' : ''; ?>>MENTORA</option>
                                                      <option value="CLIENTE" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "CLIENTE") ? 'selected' : ''; ?>>CLIENTE</option>
                                                      <option value="PROFESOR" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "PROFESOR") ? 'selected' : ''; ?>>PROFESOR</option>
                                                      <option value="PROFESORA" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "PROFESORA") ? 'selected' : ''; ?>>PROFESORA</option>
                                                      <option value="DEPARTAMENTO DE PERSONAL" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "DEPARTAMENTO DE PERSONAL") ? 'selected' : ''; ?>>DEPARTAMENTO DE PERSONAL</option>
                                                      <option value="PROVEEDOR" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "PROVEEDOR") ? 'selected' : ''; ?>>PROVEEDOR</option>
                                                      <option value="PROVEEDORA" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "PROVEEDORA") ? 'selected' : ''; ?>>PROVEEDORA</option>
                                                      <option value="MIEMBRO DE UN COMITE" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "MIEMBRO DE UN COMITE") ? 'selected' : ''; ?>>MIEMBRO DE UN COMITÉ</option>
                                                      <option value="OTRO" <?php echo ($referencias_count >= 2 && $fetch_referencias[1]["relacion"] === "OTRO") ? 'selected' : ''; ?>>OTRO</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">TELEFONO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rtelefono2" value="<?php echo ($referencias_count >= 2) ? $fetch_referencias[1]["telefono"] : ''; ?>" placeholder="Teléfono" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div x-show="numReferencias >= 3">
                                    <!-- Referencia 3 -->
                                    <div class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7 items-start border-t border-[#d1d5db] pt-5">
                                       <div class="md:col-span-1">
                                          <div class="text-[#000] font-bold mb-2">Tercer referencia</div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">NOMBRE (s)</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rnombre3" value="<?php echo ($referencias_count >= 3) ? $fetch_referencias[2]["nombre"] : ''; ?>" placeholder="Nombre (s)" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">APELLIDO PATERNO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rapellidopat3" value="<?php echo ($referencias_count >= 3) ? $fetch_referencias[2]["apellido_pat"] : ''; ?>" placeholder="Apellido paterno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">APELLIDO MATERNO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rapellidomat3" value="<?php echo ($referencias_count >= 3) ? $fetch_referencias[2]["apellido_mat"] : ''; ?>" placeholder="Apellido materno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">RELACION</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z"></path>
                                                      </svg>
                                                   </div>
                                                   <select name="infa_rrelacion3" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                      <option value="">--Selecciona--</option>
                                                      <option value="SUPERVISOR" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "SUPERVISOR") ? 'selected' : ''; ?>>SUPERVISOR</option>
                                                      <option value="SUPERVISORA" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "SUPERVISORA") ? 'selected' : ''; ?>>SUPERVISORA</option>
                                                      <option value="COLEGA" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "COLEGA") ? 'selected' : ''; ?>>COLEGA</option>
                                                      <option value="SUBORDINADO" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "SUBORDINADO") ? 'selected' : ''; ?>>SUBORDINADO</option>
                                                      <option value="SUBORDINADA" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "SUBORDINADA") ? 'selected' : ''; ?>>SUBORDINADA</option>
                                                      <option value="MENTOR" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "MENTOR") ? 'selected' : ''; ?>>MENTOR</option>
                                                      <option value="MENTORA" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "MENTORA") ? 'selected' : ''; ?>>MENTORA</option>
                                                      <option value="CLIENTE" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "CLIENTE") ? 'selected' : ''; ?>>CLIENTE</option>
                                                      <option value="PROFESOR" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "PROFESOR") ? 'selected' : ''; ?>>PROFESOR</option>
                                                      <option value="PROFESORA" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "PROFESORA") ? 'selected' : ''; ?>>PROFESORA</option>
                                                      <option value="DEPARTAMENTO DE PERSONAL" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "DEPARTAMENTO DE PERSONAL") ? 'selected' : ''; ?>>DEPARTAMENTO DE PERSONAL</option>
                                                      <option value="PROVEEDOR" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "PROVEEDOR") ? 'selected' : ''; ?>>PROVEEDOR</option>
                                                      <option value="PROVEEDORA" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "PROVEEDORA") ? 'selected' : ''; ?>>PROVEEDORA</option>
                                                      <option value="MIEMBRO DE UN COMITE" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "MIEMBRO DE UN COMITE") ? 'selected' : ''; ?>>MIEMBRO DE UN COMITÉ</option>
                                                      <option value="OTRO" <?php echo ($referencias_count >= 3 && $fetch_referencias[2]["relacion"] === "OTRO") ? 'selected' : ''; ?>>OTRO</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="grid grid-cols-1">
                                                <label class="text-[#64748b] font-semibold">TELEFONO</label>
                                                <div class="group flex">
                                                   <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                         <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                      </svg>
                                                   </div>
                                                   <input type="text" name="infa_rtelefono3" value="<?php echo ($referencias_count >= 3) ? $fetch_referencias[2]["telefono"] : ''; ?>" placeholder="Teléfono" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold mt-5">Uniformes</h2>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">FECHA DE ENTREGA DE UNIFORME</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                       </svg>
                                    </div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="fechauniforme" name="fechauniforme" autocomplete="off">
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">CANTIDAD (CAMISA)</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M16,21H8A1,1 0 0,1 7,20V12.07L5.7,13.07C5.31,13.46 4.68,13.46 4.29,13.07L1.46,10.29C1.07,9.9 1.07,9.27 1.46,8.88L7.34,3H9C9.29,4.8 10.4,6.37 12,7.25C13.6,6.37 14.71,4.8 15,3H16.66L22.54,8.88C22.93,9.27 22.93,9.9 22.54,10.29L19.71,13.12C19.32,13.5 18.69,13.5 18.3,13.12L17,12.12V20A1,1 0 0,1 16,21" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="cantidadpolo" name="cantidadpolo" value="<?php if($edit->ecantidad_polo !== null){ echo "{$edit->ecantidad_polo}"; } ?>" placeholder="Cantidad">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">TALLA (CAMISA)</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M16,21H8A1,1 0 0,1 7,20V12.07L5.7,13.07C5.31,13.46 4.68,13.46 4.29,13.07L1.46,10.29C1.07,9.9 1.07,9.27 1.46,8.88L7.34,3H9C9.29,4.8 10.4,6.37 12,7.25C13.6,6.37 14.71,4.8 15,3H16.66L22.54,8.88C22.93,9.27 22.93,9.9 22.54,10.29L19.71,13.12C19.32,13.5 18.69,13.5 18.3,13.12L17,12.12V20A1,1 0 0,1 16,21" />
                                          </svg>
                                       </div>
                                       <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="tallapolo" name="tallapolo">
                                          <option value="">--Seleccione--</option>
                                          <option value="XSS" <?php if($edit->etalla_polo == "XSS"){echo 'selected="selected"';} ?>>XSS</option>
                                          <option value="XS" <?php if($edit->etalla_polo == "XS"){echo 'selected="selected"';} ?>>XS</option>
                                          <option value="S" <?php if($edit->etalla_polo == "S"){echo 'selected="selected"';} ?>>S</option>
                                          <option value="M" <?php if($edit->etalla_polo == "M"){echo 'selected="selected"';} ?>>M</option>
                                          <option value="L" <?php if($edit->etalla_polo == "L"){echo 'selected="selected"';} ?>>L</option>
                                          <option value="XL" <?php if($edit->etalla_polo == "XL"){echo 'selected="selected"';} ?>>XL</option>
                                          <option value="XXL" <?php if($edit->etalla_polo == "XXL"){echo 'selected="selected"';} ?>>XXL</option>
                                          <option value="XXXL" <?php if($edit->etalla_polo == "XXXL"){echo 'selected="selected"';} ?>>XXXL</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold mt-5">Contactos de emergencia</h2>
                                 <div class="my-3 h-px bg-celeste"></div>
                                 <span class="text-[#000]"><b> Primer contacto </b> de emergencia.</span>
                              </div>
                              <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">NOMBRE (s)</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="emergencia_nom" name="emergencia_nom" value="<?php if($edit->eemergencia_nombre !== null){ echo "{$edit->eemergencia_nombre}"; } ?>" placeholder="Nombre (s)">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">APELLIDO PATERNO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="emergencia_appat" name="emergencia_appat" value="<?php if($edit->eemergencia_appelidopat !== null){ echo "{$edit->eemergencia_appelidopat}"; } ?>" placeholder="Apellido paterno">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">APELLIDO MATERNO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="emergencia_apmat" name="emergencia_apmat" value="<?php if($edit->eemergencia_appelidomat !== null){ echo "{$edit->eemergencia_appelidomat}"; } ?>" placeholder="Apellido materno">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">RELACION</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                                          </svg>
                                       </div>
                                       <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="emergencia_relacion" name="emergencia_relacion">
                                          <option value="">--Selecciona--</option>
                                          <option value="PADRE" <?php if($edit->eemergencia_relacion == "PADRE"){echo 'selected="selected"';}?>>Padre</option>
                                          <option value="MADRE" <?php if($edit->eemergencia_relacion == "MADRE"){echo 'selected="selected"';} ?>>Madre</option>
                                          <option value="HERMANO" <?php if($edit->eemergencia_relacion == "HERMANO"){echo 'selected="selected"';} ?>>Hermano</option>
                                          <option value="HERMANA" <?php if($edit->eemergencia_relacion == "HERMANA"){echo 'selected="selected"';} ?>>Hermana</option>
                                          <option value="CONYUGE" <?php if($edit->eemergencia_relacion == "CONYUGE"){echo 'selected="selected"';} ?>>Cónyuge</option>
                                          <option value="PAREJA" <?php if($edit->eemergencia_relacion == "PAREJA"){echo 'selected="selected"';} ?>>Pareja</option>
                                          <option value="AMIGO" <?php if($edit->eemergencia_relacion == "AMIGO"){echo 'selected="selected"';} ?>>Amigo</option>
                                          <option value="AMIGA" <?php if($edit->eemergencia_relacion == "AMIGA"){echo 'selected="selected"';} ?>>Amiga</option>
                                          <option value="VECINO" <?php if($edit->eemergencia_relacion == "VECINO"){echo 'selected="selected"';} ?>>Vecino</option>
                                          <option value="COMPAÑERO_DE_TRABAJO" <?php if($edit->eemergencia_relacion == "COMPAÑERO_DE_TRABAJO"){echo 'selected="selected"';} ?>>Compañero de trabajo</option>
                                          <option value="COMPAÑERA_DE_TRABAJO" <?php if($edit->eemergencia_relacion == "COMPAÑERA_DE_TRABAJO"){echo 'selected="selected"';} ?>>Compañera de trabajo</option>
                                          <option value="OTRO" <?php if($edit->eemergencia_relacion == "OTRO"){echo 'selected="selected"';} ?>>Otro</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">TELEFONO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="emergencia_tel" name="emergencia_tel" value="<?php if($edit->eemergencia_telefono !== null){ echo "{$edit->eemergencia_telefono}"; }?>" placeholder="Teléfono">
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold">Contactos de emergencia</h2>
                                 <span class="text-[#000]"><b> Segundo contacto </b> de emergencia.</span>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">NOMBRE (s)</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="emergencia_nom2" name="emergencia_nom2" value="<?php if($edit->eemergencia_nombre2 !== null){ echo "{$edit->eemergencia_nombre2}"; } ?>" placeholder="Nombre (s)">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">APELLIDO PATERNO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="emergencia_appat2" name="emergencia_appat2" value="<?php if($edit->eemergencia_appelidopat2 !== null){ echo "{$edit->eemergencia_appelidopat2}"; } ?>" placeholder="Apellido paterno">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">APELLIDO MATERNO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="emergencia_apmat2" name="emergencia_apmat2" value="<?php if($edit->eemergencia_appelidomat2 !== null){ echo "{$edit->eemergencia_appelidomat2}"; }?>" placeholder="Apellido materno">
                                    </div>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">RELACION</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                                          </svg>
                                       </div>
                                       <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="emergencia_relacion2" name="emergencia_relacion2">
                                          <option value="">--Selecciona--</option>
                                          <option value="PADRE" <?php if($edit->eemergencia_relacion2 == "PADRE"){echo 'selected="selected"';} ?>>Padre</option>
                                          <option value="MADRE" <?php if($edit->eemergencia_relacion2 == "MADRE"){echo 'selected="selected"';} ?>>Madre</option>
                                          <option value="HERMANO" <?php if($edit->eemergencia_relacion2 == "HERMANO"){echo 'selected="selected"';} ?>>Hermano</option>
                                          <option value="HERMANA" <?php if($edit->eemergencia_relacion2 == "HERMANA"){echo 'selected="selected"';} ?>>Hermana</option>
                                          <option value="CONYUGE" <?php if($edit->eemergencia_relacion2 == "CONYUGE"){echo 'selected="selected"';} ?>>Cónyuge</option>
                                          <option value="PAREJA" <?php if($edit->eemergencia_relacion2 == "PAREJA"){echo 'selected="selected"';} ?>>Pareja</option>
                                          <option value="AMIGO" <?php if($edit->eemergencia_relacion2 == "AMIGO"){echo 'selected="selected"';} ?>>Amigo</option>
                                          <option value="AMIGA" <?php if($edit->eemergencia_relacion2 == "AMIGA"){echo 'selected="selected"';} ?>>Amiga</option>
                                          <option value="VECINO" <?php if($edit->eemergencia_relacion2 == "VECINO"){echo 'selected="selected"';} ?>>Vecino</option>
                                          <option value="COMPAÑERO_DE_TRABAJO" <?php if($edit->eemergencia_relacion2 == "COMPAÑERO_DE_TRABAJO"){echo 'selected="selected"';} ?>>Compañero de trabajo</option>
                                          <option value="COMPAÑERA_DE_TRABAJO" <?php if($edit->eemergencia_relacion2 == "COMPAÑERA_DE_TRABAJO"){echo 'selected="selected"';} ?>>Compañera de trabajo</option>
                                          <option value="OTRO" <?php if($edit->eemergencia_relacion2 == "OTRO"){echo 'selected="selected"';} ?>>Otro</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">TELEFONO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="emergencia_tel2" name="emergencia_tel2" value="<?php if($edit->eemergencia_telefono2 !== null){ echo "{$edit->eemergencia_telefono2}"; }?>" placeholder="Teléfono">
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold mt-5">Otros datos del empleado</h2>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">¿RECIBIO CAPACITACION PARA EL PUESTO POR PARTE DE LA EMPRESA?</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="capacitacion" name="capacitacion">
                                       <option value="">--Seleccione--</option>
                                       <option value="SI" <?php if($edit->ecapacitacion == "SI"){echo 'selected="selected"';} ?>>Sí</option>
                                       <option value="NO" <?php if($edit->ecapacitacion == "NO"){echo 'selected="selected"';} ?>>No</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">RESULTADO ANTIDOPING</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M18,14H14V18H10V14H6V10H10V6H14V10H18M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="antidoping" name="antidoping">
                                       <option value="">--Seleccione--</option>
                                       <option value="POSITIVO" <?php if($edit->eresultado_antidoping == "POSITIVO"){echo 'selected="selected"';} ?>>POSITIVO</option>
                                       <option value="NEGATIVO" <?php if($edit->eresultado_antidoping == "NEGATIVO"){echo 'selected="selected"';} ?>>NEGATIVO</option>
                                       <option value="NO APLICA" <?php if($edit->eresultado_antidoping == "NO APLICA"){echo 'selected="selected"';} ?>>NO APLICA</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">TIPO DE SANGRE</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,20A6,6 0 0,1 6,14C6,10 12,3.25 12,3.25C12,3.25 18,10 18,14A6,6 0 0,1 12,20Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="tipo_sangre" name="tipo_sangre">
                                       <option value="">--Seleccione--</option>
                                       <option value="A_POSITIVO" <?php if($edit->etipo_sangre == "A_POSITIVO"){echo 'selected="selected"';} ?>>A+</option>
                                       <option value="A_NEGATIVO" <?php if($edit->etipo_sangre == "A_NEGATIVO"){echo 'selected="selected"';} ?>>A-</option>
                                       <option value="B_POSITIVO" <?php if($edit->etipo_sangre == "B_POSITIVO"){echo 'selected="selected"';} ?>>B+</option>
                                       <option value="B_NEGATIVO" <?php if($edit->etipo_sangre == "B_NEGATIVO"){echo 'selected="selected"';} ?>>B-</option>
                                       <option value="AB_POSITIVO" <?php if($edit->etipo_sangre == "AB_POSITIVO"){echo 'selected="selected"';} ?>>AB+</option>
                                       <option value="AB_NEGATIVO" <?php if($edit->etipo_sangre == "AB_NEGATIVO"){echo 'selected="selected"';} ?>>AB-</option>
                                       <option value="O_POSITIVO" <?php if($edit->etipo_sangre == "O_POSITIVO"){echo 'selected="selected"';} ?>>O+</option>
                                       <option value="O_NEGATIVO" <?php if($edit->etipo_sangre == "O_NEGATIVO"){echo 'selected="selected"';} ?>>O-</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="grid grid-cols-1 mt-5 mx-7">
                                 <label class="text-[#64748b] font-semibold mb-2">¿COMO SE ENTERO DE LA VACANTE?</label>
                                 <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                       <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z" />
                                       </svg>
                                    </div>
                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="vacante" name="vacante">
                                       <option value="">--Seleccione--</option>
                                       <option value="PLATAFORMA LABORAL" <?php if($edit->evacante == "PLATAFORMA LABORAL"){echo 'selected="selected"';} ?>>PLATAFORMA LABORAL</option>
                                       <option value="RECOMENDACION" <?php if($edit->evacante == "RECOMENDACION"){echo 'selected="selected"';}?>>RECOMENDACION</option>
                                       <option value="REDES SOCIALES" <?php if($edit->evacante == "REDES SOCIALES"){echo 'selected="selected"';} ?>>REDES SOCIALES</option>
                                       <option value="AVISOS DE OCASION" <?php if($edit->evacante == "AVISOS DE OCASION"){echo 'selected="selected"';} ?>>AVISOS DE OCASION</option>
                                    </select>
                                 </div>
                              </div>
                              <div x-data="{ open: <?php echo $edit->efam_dentro_empresa === 'SI' ? 'true' : 'false';?> }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">¿TIENE FAMILIARES DENTRO DE LA EMPRESA?</label>
                                    <div class="group flex mt-3 items-center">
                                       <input id="option-empresa-1" type="radio" name="empresa" value="si" x-on:click="open = true" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-1" aria-describedby="option-1" <?php echo $edit->efam_dentro_empresa === 'SI' ? 'checked' : ''; ?>>
                                       <label for="option-empresa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                          Sí
                                       </label>
                                       <input id="option-empresa-2" type="radio" name="empresa" value="no" x-on:click="open = false" class="h-4 w-4 border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" aria-labelledby="option-2" aria-describedby="option-2" <?php echo ($edit->efam_dentro_empresa === 'NO' || $edit->efam_dentro_empresa === null) ? 'checked' : ''; ?>>
                                       <label for="option-empresa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                          No
                                       </label>
                                    </div>
                                 </div>
                                 <div x-show.important="open">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">NOMBRE(s)</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="nomfam" name="nomfam" value="<?php echo $edit->efam_dentro_empresa === 'SI' ? $edit->efam_nombre : ''; ?>" placeholder="Nombre">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">APELLIDO PATERNO</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="apfam" name="apfam" value="<?php echo $edit->efam_dentro_empresa === 'SI' ? $edit->efam_apellidopat : ''; ?>" placeholder="Apellido paterno">
                                          </div>
                                       </div>
                                       <div class="grid grid-cols-1">
                                          <label class="text-[#64748b] font-semibold mb-2">APELLIDO MATERNO</label>
                                          <div class="group flex">
                                             <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                   <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                                </svg>
                                             </div>
                                             <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="amfam" name="amfam" value="<?php echo $edit->efam_dentro_empresa === 'SI' ? $edit->efam_apellidomat : ''; ?>" placeholder="Apellido materno">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-12 h-px bg-slate-200"></div>
                              <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                 <button type="button" id="anterior" name="anterior" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                 <button type="button" id="siguiente2" name="siguiente2" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Siguiente</button>
                                 <div id="submit-DA">
                                    <button type="button" id="guardarDA" name="guardarDA" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Guardar progreso</button>
                                 </div>
                              </div>
                           </div>
                           <div class="hidden bg-transparent rounded-lg tab-pane" id="datosB" role="tabpanel" aria-labelledby="datosB-tab">
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold">Beneficiarios bancarios</h2>
                                 <span class="text-[#64748b]">El beneficiario es la persona ante la cual, una entidad financiera se obliga a cumplir una prestación establecida en el contrato que celebró con su cliente. <b> Nota: los beneficiarios deben ser mayores de 18 años. </b></span>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div x-data="{ numBeneficiariosBancarios: <?php if($ben_bancarios_count == 0){ echo 0; }else if($ben_bancarios_count == 1){ echo 1; }else if($ben_bancarios_count == 2){ echo 2; }?> }">
                                 <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label for="numBeneficiariosBancarios" class="text-[#64748b] font-semibold mb-2">NUMERO DE BENEFICIARIOS BANCARIOS</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z"></path>
                                          </svg>
                                       </div>
                                       <select id="numBeneficiariosBancarios" name="numBeneficiariosBancarios" x-model="numBeneficiariosBancarios" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600">
                                          <option value="0">NO TENGO BENEFICIARIOS</option>
                                          <option value="1">UN BENEFICIARIO</option>
                                          <option value="2">DOS BENEFICIARIOS</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div x-show="numBeneficiariosBancarios >= 1">
                                    <!-- Referencia 1 -->
                                    <div class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7 items-start border-t border-[#d1d5db] pt-5">
                                       <div class="md:col-span-1">
                                          <div class="text-[#000] font-bold mb-2">Primer beneficiario</div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">NOMBRE (s)</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rnombre1" value="<?php echo ($ben_bancarios_count >= 1) ? $fetch_ben_bancarios[0]["nombre"] : ''; ?>" placeholder="Nombre (s)" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">APELLIDO PATERNO</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rapellidopat1" value="<?php echo ($ben_bancarios_count >= 1) ? $fetch_ben_bancarios[0]["apellido_pat"] : ''; ?>" placeholder="Apellido paterno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">APELLIDO MATERNO</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rapellidomat1" value="<?php echo ($ben_bancarios_count >= 1) ? $fetch_ben_bancarios[0]["apellido_mat"] : ''; ?>" placeholder="Apellido materno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          </div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">RELACION</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                   </svg>
                                                </div>
                                                <select name="infb_rrelacion1" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                   <option value="">--Selecciona--</option>
                                                   <option value="PADRE" <?php echo ($ben_bancarios_count >= 1 && $fetch_ben_bancarios[0]["relacion"] === "PADRE") ? 'selected' : ''; ?>>PADRE</option>
                                                   <option value="MADRE" <?php echo ($ben_bancarios_count >= 1 && $fetch_ben_bancarios[0]["relacion"] === "MADRE") ? 'selected' : ''; ?>>MADRE</option>
                                                   <option value="CONYUGE" <?php echo ($ben_bancarios_count >= 1 && $fetch_ben_bancarios[0]["relacion"] === "CONYUGE") ? 'selected' : ''; ?>>CONYUGE</option>
                                                   <option value="HIJO" <?php echo ($ben_bancarios_count >= 1 && $fetch_ben_bancarios[0]["relacion"] === "HIJO") ? 'selected' : ''; ?>>HIJO</option>
                                                   <option value="HIJA" <?php echo ($ben_bancarios_count >= 1 && $fetch_ben_bancarios[0]["relacion"] === "HIJA") ? 'selected' : ''; ?>>HIJA</option>
                                                   <option value="OTRO" <?php echo ($ben_bancarios_count >= 1 && $fetch_ben_bancarios[0]["relacion"] === "OTRO") ? 'selected' : ''; ?>>OTRO</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">RFC</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rrfc1" value="<?php echo ($ben_bancarios_count >= 1) ? $fetch_ben_bancarios[0]["rfc"] : ''; ?>" placeholder="RFC" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">CURP</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rcurp1" value="<?php echo ($ben_bancarios_count >= 1) ? $fetch_ben_bancarios[0]["curp"] : ''; ?>" placeholder="CURP" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">PORCENTAJE DE DERECHO</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.1 3 19 3M8.83 7.05C9.81 7.05 10.6 7.84 10.6 8.83C10.6 9.81 9.81 10.6 8.83 10.6C7.84 10.6 7.05 9.81 7.05 8.83C7.05 7.84 7.84 7.05 8.83 7.05M15.22 17C14.24 17 13.45 16.2 13.45 15.22C13.45 14.24 14.24 13.45 15.22 13.45C16.2 13.45 17 14.24 17 15.22C17 16.2 16.2 17 15.22 17M8.5 17.03L7 15.53L15.53 7L17.03 8.5L8.5 17.03Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rporcentaje1" x-bind:value="numBeneficiariosBancarios == '1' ? '100' : '50'" placeholder="Porcentaje de derecho" readonly="readonly" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-gray-200 bg-gray-200 text-gray-900 outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div x-show="numBeneficiariosBancarios >= 2">
                                    <!-- Referencia 2 -->
                                    <div class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7 items-start border-t border-[#d1d5db] pt-5">
                                       <div class="md:col-span-1">
                                          <div class="text-[#64748b] font-semibold mb-2">Segundo beneficiario</div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">NOMBRE (s)</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rnombre2" value="<?php echo ($ben_bancarios_count >= 2) ? $fetch_ben_bancarios[1]["nombre"] : ''; ?>" placeholder="Nombre (s)" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">APELLIDO PATERNO</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rapellidopat2" value="<?php echo ($ben_bancarios_count >= 2) ? $fetch_ben_bancarios[1]["apellido_pat"] : ''; ?>" placeholder="Apellido paterno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">APELLIDO MATERNO</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rapellidomat2" value="<?php echo ($ben_bancarios_count >= 2) ? $fetch_ben_bancarios[1]["apellido_mat"] : ''; ?>" placeholder="Apellido materno" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          </div>
                                          <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">RELACION</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z"></path>
                                                   </svg>
                                                </div>
                                                <select name="infb_rrelacion2" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                                   <option value="">--Selecciona--</option>
                                                   <option value="PADRE" <?php echo ($ben_bancarios_count >= 2 && $fetch_ben_bancarios[1]["relacion"] === "PADRE") ? 'selected' : ''; ?>>PADRE</option>
                                                   <option value="MADRE" <?php echo ($ben_bancarios_count >= 2 && $fetch_ben_bancarios[1]["relacion"] === "MADRE") ? 'selected' : ''; ?>>MADRE</option>
                                                   <option value="CONYUGE" <?php echo ($ben_bancarios_count >= 2 && $fetch_ben_bancarios[1]["relacion"] === "CONYUGE") ? 'selected' : ''; ?>>CONYUGE</option>
                                                   <option value="HIJO" <?php echo ($ben_bancarios_count >= 2 && $fetch_ben_bancarios[1]["relacion"] === "HIJO") ? 'selected' : ''; ?>>HIJO</option>
                                                   <option value="HIJA" <?php echo ($ben_bancarios_count >= 2 && $fetch_ben_bancarios[1]["relacion"] === "HIJA") ? 'selected' : ''; ?>>HIJA</option>
                                                   <option value="OTRO" <?php echo ($ben_bancarios_count >= 2 && $fetch_ben_bancarios[1]["relacion"] === "OTRO") ? 'selected' : ''; ?>>OTRO</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">RFC</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rrfc2" value="<?php echo ($ben_bancarios_count >= 2) ? $fetch_ben_bancarios[1]["rfc"] : ''; ?>" placeholder="RFC" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">CURP</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rcurp2" value="<?php echo ($ben_bancarios_count >= 2) ? $fetch_ben_bancarios[1]["curp"] : ''; ?>" placeholder="CURP" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                          </div>
                                          <div class="grid grid-cols-1">
                                             <label class="text-[#64748b] font-semibold">PORCENTAJE DE DERECHO</label>
                                             <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                   <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                      <path fill="currentColor" d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.1 3 19 3M8.83 7.05C9.81 7.05 10.6 7.84 10.6 8.83C10.6 9.81 9.81 10.6 8.83 10.6C7.84 10.6 7.05 9.81 7.05 8.83C7.05 7.84 7.84 7.05 8.83 7.05M15.22 17C14.24 17 13.45 16.2 13.45 15.22C13.45 14.24 14.24 13.45 15.22 13.45C16.2 13.45 17 14.24 17 15.22C17 16.2 16.2 17 15.22 17M8.5 17.03L7 15.53L15.53 7L17.03 8.5L8.5 17.03Z"></path>
                                                   </svg>
                                                </div>
                                                <input type="text" name="infb_rporcentaje2" x-bind:value="numBeneficiariosBancarios == '1' ? '100' : '50'" placeholder="Porcentaje de derecho" readonly="readonly" class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-gray-200 bg-gray-200 text-gray-900 outline-none focus:ring-2 focus:ring-celeste-600">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste mt-5 font-semibold">Cuenta bancaria personal</h2>
                                 <span class="text-[#64748b]">En esta sección se encuentran las credenciales bancarias personales del empleado.</span>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">BANCO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="banco_personal" name="banco_personal" value="<?php if($edit->ebanco_personal !== null){ echo "{$edit->ebanco_personal}"; }?>" placeholder="Banco">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">CUENTA</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="cuenta_personal" name="cuenta_personal" value="<?php if($edit->ecuenta_personal !== null){ echo "{$edit->ecuenta_personal}"; } ?>" placeholder="Cuenta">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">CLABE</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="clabe_personal" name="clabe_personal" value="<?php if($edit->eclabe_personal !== null){ echo "{$edit->eclabe_personal}"; } ?>" placeholder="Clabe">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1 lg:col-span-3">
                                    <label class="text-[#64748b] font-semibold mb-2">PLASTICO ASIGNADO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M19.83 7.5L17.56 5.23C17.63 4.81 17.74 4.42 17.88 4.08C17.96 3.9 18 3.71 18 3.5C18 2.67 17.33 2 16.5 2C14.86 2 13.41 2.79 12.5 4H7.5C4.46 4 2 6.46 2 9.5S4.5 21 4.5 21H10V19H12V21H17.5L19.18 15.41L22 14.47V7.5H19.83M16 11C15.45 11 15 10.55 15 10S15.45 9 16 9C16.55 9 17 9.45 17 10S16.55 11 16 11Z"></path>
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="plastico_personal" name="plastico_personal" value="<?php if($edit->eplastico_personal !== null){ echo "{$edit->eplastico_personal}"; } ?>" placeholder="Plástico asignado">
                                    </div>
                                 </div>
                              </div>
                              <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-celeste font-semibold">Cuenta bancaria asignada por la empresa</h2>
                                 <span class="text-[#64748b]">En esta sección se encuentra la nómina asignada al empleado.</span>
                                 <div class="my-3 h-px bg-celeste"></div>
                              </div>
                              <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">BANCO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="banco_nomina" name="banco_nomina" value="<?php if($edit->ebanco_nomina !== null){ echo "{$edit->ebanco_nomina}"; }?>" placeholder="Banco">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">CUENTA</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="cuenta_nomina" name="cuenta_nomina" value="<?php if($edit->ecuenta_nomina !== null){ echo "{$edit->ecuenta_nomina}"; } ?>" placeholder="Cuenta">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">CLABE</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="clabe_nomina" name="clabe_nomina" value="<?php if($edit->eclabe_nomina !== null){ echo "{$edit->eclabe_nomina}"; }?>" placeholder="Clabe">
                                    </div>
                                 </div>
                                 <div class="grid grid-cols-1 lg:col-span-3">
                                    <label class="text-[#64748b] font-semibold mb-2">PLASTICO ASIGNADO</label>
                                    <div class="group flex">
                                       <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                             <path fill="currentColor" d="M19.83 7.5L17.56 5.23C17.63 4.81 17.74 4.42 17.88 4.08C17.96 3.9 18 3.71 18 3.5C18 2.67 17.33 2 16.5 2C14.86 2 13.41 2.79 12.5 4H7.5C4.46 4 2 6.46 2 9.5S4.5 21 4.5 21H10V19H12V21H17.5L19.18 15.41L22 14.47V7.5H19.83M16 11C15.45 11 15 10.55 15 10S15.45 9 16 9C16.55 9 17 9.45 17 10S16.55 11 16 11Z" />
                                          </svg>
                                       </div>
                                       <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="plastico" name="plastico" value="<?php if($edit->eplastico !== null){ echo "{$edit->eplastico}"; } ?>" placeholder="Plástico asignado">
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-12 h-px bg-slate-200"></div>
                              <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                 <button type="button" id="anterior2" name="anterior2" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                 <button type="button" id="siguiente3" name="siguiente3" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Siguiente</button>
                                 <div id="submit-DB">
                                    <button type="button" id="guardarDB" name="guardarDB" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Guardar progreso</button>
                                 </div>
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
                                       <?php foreach ($papeleria as $fetchtipopapeleria) { ?>
                                          <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                             <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                <span class="inline-block md:hidden font-bold">Nombre</span>
                                                <p><?php echo ucfirst(strtolower($fetchtipopapeleria["nombre"])); ?></p>
                                             </td>
                                             <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                <span class="inline-block md:hidden font-bold">Acción</span>
                                                <div class="flex flex-col w-full justify-center">
                                                   <div id="upload-button<?php echo $fetchtipopapeleria['id'] ?>" class="inline-flex self-start items-center px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white btn-gris">
                                                      Subir archivo
                                                   </div>
                                                   <div class="flex-1 md:flex items-center justify-between">
                                                      <?php 
                                                         if(is_null($fetchtipopapeleria["nombre_archivo"]) || is_null($fetchtipopapeleria["identificador"])) { 
                                                      ?>
                                                            <span id="upload-text<?php echo $fetchtipopapeleria['id'] ?>">No hay ningún archivo seleccionado</span>
                                                            <button type="button" id="upload-delete<?php echo $fetchtipopapeleria['id'] ?>" class="hidden">
                                                               <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                                  <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                                               </svg>
                                                            </button>
                                                      <?php 
                                                         }else{ 
                                                            $path = "../src/documents/".$fetchtipopapeleria['identificador'];
                                                            if(!file_exists($path)){
                                                               $buscar_papeleria="false";
                                                      ?>
                                                               <span id="upload-text<?php print($fetchtipopapeleria['id']); ?>"><p style="color: rgb(250 30 45);">No se encontró el archivo, por favor, suba otro archivo ó seleccione la x para reemplazarlo por un archivo anterior a este</p></span>
                                                               <button type="button" id="upload-delete<?php print($fetchtipopapeleria['id']); ?>" class="z-100 md:p-2 my-auto">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                                  <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                                                  </svg>
                                                               </button>
                                                      <?php 
                                                            }else{
                                                               $buscar_papeleria="true";
                                                      ?>
                                                               <span id="upload-text<?php print($fetchtipopapeleria['id']); ?>">1 archivo seleccionado</span>
                                                               <button type="button" id="upload-delete<?php print($fetchtipopapeleria['id']); ?>" class="z-100 md:p-2 my-auto">
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
                                                <input type="file" name="infp_papeleria<?php echo $fetchtipopapeleria["id"] ?>" id="infp_papeleria<?php echo $fetchtipopapeleria["id"] ?>"  class="hidden" />
                                                <div id="content-container<?php echo $fetchtipopapeleria["id"] ?>">
                                                   <?php 
                                                      if(isset($fetchtipopapeleria['nombre_archivo']) && isset($fetchtipopapeleria['identificador'])) {
                                                         if($buscar_papeleria=="true"){
                                                   ?>
                                                            <ul id="lista<?php print($fetchtipopapeleria['nombre_archivo']); ?>" class="break-all md:break-normal">
                                                               <li id="papeleria<?php print($fetchtipopapeleria['id']); ?>" class="flex flex-wrap">
                                                                  <?php 
                                                                  $ext = pathinfo($fetchtipopapeleria['nombre_archivo'], PATHINFO_EXTENSION);
                                                                  if($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
                                                                     echo '<svg style="width:24px; heigth:24px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><path style="fill:#6DABE4;" d="M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z"/><path style="opacity:0.15;enable-background:new    ;" d="M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z"/><path style="fill:#FFFFFF;" d="M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z"/><circle style="fill:#FFB547;" cx="200.999" cy="143.414" r="38.958"/><path style="fill:#4C9462;" d="M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z"	/><path style="fill:#8D6645;" d="M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z"/><path style="fill:#99DAEA;" d="M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z"/><polygon style="opacity:0.1;enable-background:new    ;" points="188.713,379.313 226.521,379.313 313.42,163.313 "/><path style="fill:#1E252B;" d="M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                                                                  }else if($ext == "pdf"){
                                                                     echo '<svg style="width:24px; heigth:24px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 303.188 303.188" style="enable-background:new 0 0 303.188 303.188;" xml:space="preserve"><g>	<polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>	<path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/>	<polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>	<g>		<path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>		<path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z"/>		<path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z"/>	</g>	<polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                                                                  }
                                                                  print ($fetchtipopapeleria['nombre_archivo']);
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
                                       <?php
									               $buscar_papeleria="false";
                                       } 
                                       ?>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="mt-12 h-px bg-slate-200"></div>
                              <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                 <button type="button" id="anterior3" name="anterior3" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                 <div id="submit-button">   
                                    <button type="button" id="finish" name="finish" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Guardar</button>
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