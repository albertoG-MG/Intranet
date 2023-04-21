<div class="container mx-auto px-6 py-8">
  <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
    Crear incidencias
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
                <a href="incidencias.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#4f46e5] hover:text-[#4f46e5]">
                  <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13,9.5H18V7.5H13V9.5M13,16.5H18V14.5H13V16.5M19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21M6,11H11V6H6V11M7,7H10V10H7V7M6,18H11V13H6V18M7,14H10V17H7V14Z"></path>
                  </svg>
                  Incidencias
                </a>
                <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                  </svg>
                </span>
                <div class="flex items-center text-gray-400">
                  <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,12V13.5A4,4 0 0,1 23,17.5C23,18.32 22.75,19.08 22.33,19.71L21.24,18.62C21.41,18.28 21.5,17.9 21.5,17.5A2.5,2.5 0 0,0 19,15V16.5L16.75,14.25L19,12M19,23V21.5A4,4 0 0,1 15,17.5C15,16.68 15.25,15.92 15.67,15.29L16.76,16.38C16.59,16.72 16.5,17.1 16.5,17.5A2.5,2.5 0 0,0 19,20V18.5L21.25,20.75L19,23M10,17H7V14H10V17M10,7V10H7V7H10M5,21A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V11.17C20.5,11.06 20,11 19.5,11A6.5,6.5 0 0,0 13,17.5C13,18.79 13.38,20 14,21H5M13,9.5H18V7.5H13V9.5M11,13H6V18H11V13M11,6H6V11H11V6Z" />
                  </svg>
                  <span class="text-sm font-medium">Crear incidencias</span>
                </div>
              </div>
            </div>
            <div class="bg-white p-3 shadow-md rounded-b">
              <form id="Guardar" method="post">
                <div class="flex flex-col mt-5 mx-7">
                  <h2 class="text-2xl text-[#64748b] font-semibold">Formulario para crear una incidencia</h2>
                  <span class="text-[#64748b]">Por favor, proporciona todos los datos necesarios para poder crear una incidencia.</span>
                  <div class="my-3 h-px bg-slate-200"></div>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="text-[#64748b] font-semibold mb-2">Título de la incidencia</label>
                  <div class="group flex">
                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                      <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />
                      </svg>
                    </div>
                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="titulo" name="titulo" placeholder="Título de la incidencia">
                  </div>
                </div>
                <div x-data="{ acta_administrativa: false, incapacidad: false, permiso: false }">
                  <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="text-[#64748b] font-semibold mb-2">Tipo de incidencia</label>
                    <div class="group flex">
                      <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M10.18 17H7V15H10C10.08 14.32 10.23 13.64 10.5 13H7V11H11.82C11.85 10.97 11.87 10.94 11.9 10.9C13.17 9.64 14.84 9 16.5 9H7V7H17V9H16.5C18.12 9 19.74 9.61 21 10.82V5C21 3.9 20.11 3 19 3H14.82C14.4 1.84 13.3 1 12 1S9.6 1.84 9.18 3H5C3.9 3 3 3.9 3 5V19C3 20.11 3.9 21 5 21H13.06C12.65 20.74 12.26 20.45 11.9 20.1C11 19.21 10.45 18.13 10.18 17M12 3C12.55 3 13 3.45 13 4S12.55 5 12 5 11 4.55 11 4 11.45 3 12 3M20.31 17.9C20.75 17.21 21 16.38 21 15.5C21 13 19 11 16.5 11S12 13 12 15.5 14 20 16.5 20C17.37 20 18.19 19.75 18.88 19.32L22 22.39L23.39 21L20.31 17.9M16.5 18C15.12 18 14 16.88 14 15.5S15.12 13 16.5 13 19 14.12 19 15.5 17.88 18 16.5 18Z" />
                        </svg>
                      </div>
                      <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-on:change="if($el.value == 'ACTA ADMINISTRATIVA'){ acta_administrativa = true; incapacidad = false; permiso = false; }else if($el.value == 'INCAPACIDAD'){ acta_administrativa = false; incapacidad = true; permiso = false; }else if($el.value == 'PERMISO'){ acta_administrativa = false; incapacidad = false; permiso = true; }else{ acta_administrativa = false; incapacidad = false; permiso = false; }" id="tipo" name="tipo">
                        <option value="">--Seleccione--</option>
                        <option value="ACTA ADMINISTRATIVA">Acta administrativa</option>
                        <option value="INCAPACIDAD">Incapacidad</option>
                        <option value="PERMISO">Permiso</option>
                      </select>
                    </div>
                  </div>
                  <div x-show.important="acta_administrativa" style="display:none;">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">
                        Asignar acta administrativa a:
                      </label>
                      <div class="group flex" id="selectempleado" style="display:none !important; position:relative;">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                          </svg>
                        </div>
                        <select id="caja_empleado" name="caja_empleado">
                          <option></option>
                          <optgroup label="Usuarios">
                            <?php
                              foreach ($deploy_empleados as $item) {
                                  echo "<option value='" . $item["userid"] . "'>";
                                  echo $item["nombre"];
                                  echo "</option>";
                              }
                            ?>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">La fecha en la que se realiza</label>
                      <div class="group flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                          </svg>
                        </div>
                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fecha_acta" name="fecha_acta" autocomplete="off">
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Motivo por el que se realiza el acta</label>
                      <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="motivo_acta" name="motivo_acta" placeholder="Motivo por el que se realiza el acta"></textarea>
                      <div id="error_motivo_acta"></div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Observaciones y/o Comentarios</label>
                      <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="obcomen_acta" name="obcomen_acta" placeholder="Observaciones y/o Comentarios"></textarea>
                      <div id="error_obcomen_acta"></div>
                    </div>
                  </div>
                  <div x-show.important="incapacidad" style="display:none;">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Periodo de la incapacidad</label>
                      <div class="group flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                          </svg>
                        </div>
                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="periodo_incapacidad" name="periodo_incapacidad" autocomplete="off">
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Motivo de la incapacidad</label>
                      <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="motivo_incapacidad" name="motivo_incapacidad" placeholder="Motivo de la incapacidad"></textarea>
                      <div id="error_motivo_incapacidad"></div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Subir incapacidad ó comprobante</label>
                      <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">
                          <div id="img_information" class="flex flex-col items-center justify-center pt-7">
                            <div id="svg">
                              <svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                              </svg>
                            </div>
                            <img id="preview" class="hidden">
                            <p id="archivo" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona un archivo</p>
                          </div>
                          <input type="file" id="comprobante_incapacidad" name="comprobante_incapacidad" class="hidden">
                        </label>
                      </div>
                      <div id="error_comprobante_incapacidad" class="m-auto"></div>
                    </div>
                  </div>
                  <div x-show.important="permiso" style="display:none;">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Periodo del permiso</label>
                      <div class="group flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                          </svg>
                        </div>
                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="periodo_permiso" name="periodo_permiso" autocomplete="off">
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Motivo del permiso</label>
                      <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="motivo_permiso" name="motivo_permiso" placeholder="Motivo del permiso"></textarea>
                      <div id="error_motivo_permiso"></div>
                    </div>
                  </div>
                </div>
                <div class="mt-12 h-px bg-slate-200"></div>
                <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                  <button type="button" id="reset" name="reset" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Resetear</button>
                  <div id="submit-button">
                    <button type="submit" id="Guardar" name="Guardar" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Guardar</button>
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