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
              <div class="flex flex-col mt-5 mx-7">
                <h2 class="text-2xl text-[#64748b] font-semibold">Formulario para crear una incidencia</h2>
                <span class="text-[#64748b]">Por favor, proporciona todos los datos necesarios para poder crear una incidencia.</span>
                <div class="my-3 h-px bg-slate-200"></div>
              </div>
              <ul id='menu' class='flex flex-col items-center md:flex-row md:flex-wrap w-full px-7 gap-3'>
                <li role="presentation" class="w-full md:w-max">
                  <button class="menu-active w-full group flex items-center space-x-2 rounded-lg bg-[#4f46e5] px-4 py-2.5 tracking-wide text-white outline-none transition-all" id="permiso-tab" data-tabs-target="#permiso" type="button" role="tab" aria-controls="permiso" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M14 2H6C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H18C19.11 22 20 21.11 20 20V8L14 2M18 20H6V4H13V9H18V20M13 13C13 14.1 12.1 15 11 15S9 14.1 9 13 9.9 11 11 11 13 11.9 13 13M15 18V19H7V18C7 16.67 9.67 16 11 16S15 16.67 15 18Z" />
                    </svg>
                    <span>Permiso</span>
                  </button>
                </li>
                <li role="presentation" class="w-full md:w-max">
                  <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="incapacidad-tab" data-tabs-target="#incapacidad" type="button" role="tab" aria-controls="incapacidad" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M10 20H6V4H13V9H18V12.1L20 10.1V8L14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20M20.2 13C20.3 13 20.5 13.1 20.6 13.2L21.9 14.5C22.1 14.7 22.1 15.1 21.9 15.3L20.9 16.3L18.8 14.2L19.8 13.2C19.9 13.1 20 13 20.2 13M20.2 16.9L14.1 23H12V20.9L18.1 14.8L20.2 16.9Z" />
                    </svg>
                    <span>Incapacidad</span>
                  </button>
                </li>
                <li role="presentation" class="w-full md:w-max">
                  <button class="w-full group flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800" id="actaA-tab" data-tabs-target="#actaA" type="button" role="tab" aria-controls="actaA" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                    </svg>
                    <span>Acta A.</span>
                  </button>
                </li>
              </ul>
              <div id='menu-contents' style="word-break: break-word;">
                <div class="block bg-transparent rounded-lg tab-pane" id="permiso" role="tabpanel" aria-labelledby="permiso-tab">
                  <form id="permiso-form" method="post">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Título del permiso</label>
                      <div class="group flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />
                          </svg>
                        </div>
                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="titulo_permiso" name="titulo_permiso" placeholder="Título del permiso">
                      </div>
                    </div>
                    <div x-data="{ reglamentaria: false, no_reglamentaria: false }">
                      <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="text-[#64748b] font-semibold mb-2">Tipo de permiso</label>
                        <div class="group flex">
                          <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12 20C16.4 20 20 16.4 20 12S16.4 4 12 4 4 7.6 4 12 7.6 20 12 20M12 2C17.5 2 22 6.5 22 12S17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2M12.5 7V12.2L9.8 17L8.5 16.2L11 11.8V7H12.5Z" />
                            </svg>
                          </div>
                          <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-on:change="if($el.value == 'REGLAMENTARIA'){ reglamentaria = true; no_reglamentaria = false; }else if($el.value == 'NO_REGLAMENTARIA'){ reglamentaria = false; no_reglamentaria = true; }else{ reglamentaria = false; no_reglamentaria = false; }" id="tipo_permiso" name="tipo_permiso">
                            <option value="">--Seleccione--</option>
                            <option value="REGLAMENTARIA">Reglamentaria</option>
                            <option value="NO_REGLAMENTARIA">No reglamentaria</option>
                          </select>
                        </div>
                      </div>
                      <div x-show.important="reglamentaria" style="display:none;">
                        <div x-data="{ permiso_descriptivo: false, permiso_no_descriptivo: false }">
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="text-[#64748b] font-semibold mb-2">Seleccione una opción</label>
                            <div class="group flex">
                              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M11,7H15V9H11V11H13A2,2 0 0,1 15,13V15A2,2 0 0,1 13,17H9V15H13V13H11A2,2 0 0,1 9,11V9A2,2 0 0,1 11,7M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" />
                                </svg>
                              </div>
                              <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-on:change="if($el.value == 'OTRO' || $el.value == 'HOME_OFFICE'){ permiso_descriptivo = false, permiso_no_descriptivo = true }else if($el.value == 'FALLECIMIENTO' || $el.value == 'MATRIMONIO' || $el.value == 'ESCOLARIDAD' || $el.value == 'NACIMIENTO_ADOPCION_ABORTO'){ calcularfecha_al_inicializar($el.value); permiso_descriptivo = true, permiso_no_descriptivo = false }else{ permiso_descriptivo = false, permiso_no_descriptivo = false }" id="permiso_r" name="permiso_r">
                                <option value="">--Seleccione--</option>
                                <option value="FALLECIMIENTO">Fallecimiento</option>
                                <option value="MATRIMONIO">Matrimonio</option>
                                <option value="ESCOLARIDAD">Cuestiones escolares</option>
                                <option value="NACIMIENTO_ADOPCION_ABORTO">Paternidad ó aborto</option>
                                <option value="HOME_OFFICE">Home office</option>
                                <option value="OTRO">Otro</option>
                              </select>
                            </div>
                          </div>
                          <script>
                            function calcularfecha_al_inicializar(selected_permiso_especial){
                              var fecha = $('#fechainicio_pd').val();
                              fecha = fecha.replace(/(\d{4})\/(\d{2})\/(\d{2})/, "$2/$3/$1");
                              var date = new Date();
                              date = formatDate(fecha);
                              if(selected_permiso_especial == "FALLECIMIENTO"){
                                var fechafinal = addDays(date,3);
                                fechafinal = fechafinal.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3/$1/$2");
                                $('#fechafin_pd').val(fechafinal);
                              }else if(selected_permiso_especial == "MATRIMONIO"){
                                var fechafinal = addDays(date,2);
                                fechafinal = fechafinal.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3/$1/$2");
                                $('#fechafin_pd').val(fechafinal);
                              }else if(selected_permiso_especial == "ESCOLARIDAD"){
                                var fechafinal = addDays(date,1);
                                fechafinal = fechafinal.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3/$1/$2");
                                $('#fechafin_pd').val(fechafinal);
                              }else if(selected_permiso_especial == "NACIMIENTO_ADOPCION_ABORTO"){
                                var fechafinal = addDays(date,5);
                                fechafinal = fechafinal.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3/$1/$2");
                                $('#fechafin_pd').val(fechafinal);		
                              }
                            }
                          </script>
                          <div x-show.important="permiso_descriptivo" style="display:none;">
                            <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">Seleccione la fecha de inicio del permiso</label>
                              <div class="group flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                  <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                  </svg>
                                </div>
                                <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fechainicio_pd" name="fechainicio_pd" placeholder="Fecha de inicio del permiso" autocomplete="off">
                              </div>
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">Usted regresará en:</label>
                              <div class="group flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                  <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                  </svg>
                                </div>
                                <input class="w-full -ml-10 pl-10 py-2 h-11 border border-gray-200 bg-gray-200 text-gray-900 rounded-md focus:ring-2 focus:ring-indigo-600" type="text" id="fechafin_pd" name="fechafin_pd" placeholder="Fecha fin del permiso" autocomplete="off" disabled>
                              </div>
                            </div>
                          </div>
                          <div x-show.important="permiso_no_descriptivo" style="display:none;">
                            <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">Periodo de ausencia</label>
                              <div class="group flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                  <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                  </svg>
                                </div>
                                <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="periodo_pnd" name="periodo_pnd" placeholder="Periodo de ausencia" autocomplete="off">
                              </div>
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">Motivo del permiso</label>
                              <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="motivo_pnd" name="motivo_pnd" placeholder="Motivo del permiso"></textarea>
                              <div id="error_motivo_pnd"></div>
                            </div>
                          </div>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7" id="img_permiso_r">
                          <label class="text-[#64748b] font-semibold mb-2">Subir justificante (Puede subirse después)</label>
                          <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">
                              <div class="flex flex-col items-center justify-center pt-7">
                                <div id="svg_permiso_r">
                                  <svg class="w-10 h-10 text-gray-400 group-hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor" d="M6,2A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2H6M6,4H13V9H18V20H6V4M8,12V14H16V12H8M8,16V18H13V16H8Z" />
                                  </svg>
                                </div>
                                <img id="preview_permiso_r" class="hidden">
                                <svg id="pdf_preview_r" class="w-10 h-10 hidden" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 303.188 303.188" style="enable-background:new 0 0 303.188 303.188;" xml:space="preserve"><g><polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525"/><path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/><polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0"/><g><path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>		<path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z"/><path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z"/></g><polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                <p id="archivo_permiso_r" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona un archivo</p>
                              </div>
                              <input type="file" id="justificante_permiso_r" name="justificante_permiso_r" class="hidden">
                            </label>
                          </div>
                          <div id="error_justificante_permiso_r" class="m-auto"></div>
                        </div>
                        <div id="div_actions_archivo_permiso_r" class="hidden flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">
                          <button type="button" id="delete_archivo_permiso_r" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">
                            <svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />
                            </svg>
                            Eliminar
                          </button>
                        </div>
                      </div>
                      <div x-show.important="no_reglamentaria" style="display:none;">
                        <div x-data="{ fecha_hora: false, fecha: false }">
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="text-[#64748b] font-semibold mb-2">Seleccione una opción</label>
                            <div class="group flex">
                              <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12 20C16.4 20 20 16.4 20 12S16.4 4 12 4 4 7.6 4 12 7.6 20 12 20M12 2C17.5 2 22 6.5 22 12S17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2M12.5 7V12.2L9.8 17L8.5 16.2L11 11.8V7H12.5Z" />
                                </svg>
                              </div>
                              <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-on:change="if($el.value == 'AUSENCIA'){  fecha_hora = false, fecha = true }else if($el.value == 'RETARDO' || $el.value == 'SALIDA'){ fecha_hora = true, fecha = false }else{ fecha_hora = false, fecha = false }" id="permiso_nr" name="permiso_nr">
                                <option value="">--Seleccione--</option>
                                <option value="RETARDO">Retardo</option>
                                <option value="SALIDA">Salida</option>
                                <option value="AUSENCIA">Ausencia</option>
                              </select>
                            </div>
                          </div>
                          <div x-show.important="fecha_hora" style="display:none;">
                            <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">Seleccione la fecha y la hora</label>
                              <div class="group flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                  <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                  </svg>
                                </div>
                                <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="periodo_pnr_fh" name="periodo_pnr_fh" placeholder="Periodo de ausencia" autocomplete="off">
                              </div>
                            </div>
                          </div>
                          <div x-show.important="fecha" style="display:none;">
                            <div class="grid grid-cols-1 mt-5 mx-7">
                              <label class="text-[#64748b] font-semibold mb-2">Seleccione la fecha</label>
                              <div class="group flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                  <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                  </svg>
                                </div>
                                <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="periodo_pnr_f" name="periodo_pnr_f" placeholder="Periodo de ausencia" autocomplete="off">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                          <label class="text-[#64748b] font-semibold mb-2">Motivo del permiso</label>
                          <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="motivo_permiso_nr" name="motivo_permiso_nr" placeholder="Motivo del permiso"></textarea>
                          <div id="error_motivo_permiso_nr"></div>
                        </div>
                        <div x-data="{ open: true }">
                          <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="text-[#64748b] font-semibold mb-2">¿Justificante?</label>
                            <div class="group flex mt-3 items-center">
                              <input id="option-justificante-permiso-nr-1" type="radio" name="posee_jpermiso_nr" value="si" x-on:change="archivo_permisos; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-justificante-permiso-nr-1" aria-describedby="option-justificante-permiso-nr-1" checked="">
                              <label for="option-justificante-permiso-nr-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                Sí
                              </label>
                              <input id="option-justificante-permiso-nr-2" type="radio" name="posee_jpermiso_nr" value="no" x-on:change="archivo_permisos; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-justificante-permiso-nr-2" aria-describedby="option-justificante-permiso-nr-2">
                              <label for="option-justificante-permiso-nr-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                No
                              </label>
                            </div>
                          </div>
                          <script>
                            function archivo_permisos(e) {
                              if (e.target.value == "no") {
                                $("#justificante_permiso_nr").val("");
                                $("#justificante_permiso_nr-error").css("display", "none");
                                $('#preview_permiso_nr').removeClass('w-10 h-10');
                                $('#preview_permiso_nr').addClass('hidden');
                                $('#pdf_preview_nr').addClass('hidden');
                                $('#svg_permiso_nr').removeClass('hidden');
                                $('#archivo_permiso_nr').text("Selecciona un archivo");
                                $("#div_actions_archivo_permiso_nr").addClass("hidden");
                              }
                            }
                          </script>
                          <div x-show.important="open">
                            <div class="grid grid-cols-1 mt-5 mx-7" id="img_permisos_nr">
                              <label class="text-[#64748b] font-semibold mb-2">Subir justificante (Puede subirse después)</label>
                              <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">
                                  <div class="flex flex-col items-center justify-center pt-7">
                                    <div id="svg_permiso_nr">
                                      <svg class="w-10 h-10 text-gray-400 group-hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor" d="M6,2A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2H6M6,4H13V9H18V20H6V4M8,12V14H16V12H8M8,16V18H13V16H8Z" />
                                      </svg>
                                    </div>
                                    <img id="preview_permiso_nr" class="hidden">
                                    <svg id="pdf_preview_nr" class="w-10 h-10 hidden" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 303.188 303.188" style="enable-background:new 0 0 303.188 303.188;" xml:space="preserve"><g><polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525"/><path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/><polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0"/><g><path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>		<path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z"/><path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z"/></g><polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    <p id="archivo_permiso_nr" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona un archivo</p>
                                  </div>
                                  <input type="file" id="justificante_permiso_nr" name="justificante_permiso_nr" class="hidden">
                                </label>
                              </div>
                              <div id="error_justificante_permiso_nr" class="m-auto"></div>
                            </div>
                            <div id="div_actions_archivo_permiso_nr" class="hidden flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">
                              <button type="button" id="delete_archivo_permiso_nr" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">
                                <svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />
                                </svg>
                                Eliminar
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mt-12 h-px bg-slate-200"></div>
                    <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                      <button type="button" id="reset-permiso" name="reset-permiso" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Resetear</button>
                      <div id="submit-permiso">
                        <button type="submit" id="Guardar-permiso" name="Guardar-permiso" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Guardar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="hidden bg-transparent rounded-lg tab-pane" id="incapacidad" role="tabpanel" aria-labelledby="incapacidad-tab">
                  <form id="incapacidad-form" method="post">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Título de la incapacidad</label>
                      <div class="group flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />
                          </svg>
                        </div>
                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="titulo_incapacidad" name="titulo_incapacidad" placeholder="Título de la incapacidad">
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Periodo de la incapacidad</label>
                      <div class="group flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                          </svg>
                        </div>
                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="periodo_incapacidad" name="periodo_incapacidad" placeholder="Periodo de la incapacidad" autocomplete="off">
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Motivo de la incapacidad</label>
                      <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="motivo_incapacidad" name="motivo_incapacidad" placeholder="Motivo de la incapacidad"></textarea>
                      <div id="error_motivo_incapacidad"></div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7" id="img_incapacidad">
                      <label class="text-[#64748b] font-semibold mb-2">Subir incapacidad (Puede subirse después)</label>
                      <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">
                          <div class="flex flex-col items-center justify-center pt-7">
                            <div id="svg_incapacidad">
                              <svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                              </svg>
                            </div>
                            <img id="preview_incapacidad" class="hidden">
                            <svg id="pdf_preview_incapacidad" class="w-10 h-10 hidden" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 303.188 303.188" style="enable-background:new 0 0 303.188 303.188;" xml:space="preserve"><g><polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525"/><path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/><polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0"/><g><path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>		<path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z"/><path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z"/></g><polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            <p id="archivo_incapacidad" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona un archivo</p>
                          </div>
                          <input type="file" id="comprobante_incapacidad" name="comprobante_incapacidad" class="hidden">
                        </label>
                      </div>
                      <div id="error_comprobante_incapacidad" class="m-auto"></div>
                    </div>
                    <div id="div_actions_archivo_incapacidad" class="hidden flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">
                      <button type="button" id="delete_archivo_incapacidad" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">
                        <svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />
                        </svg>
                        Eliminar
                      </button>
                    </div>
                    <div class="mt-12 h-px bg-slate-200"></div>
                    <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                      <button type="button" id="reset-incapacidad" name="reset-incapacidad" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Resetear</button>
                      <div id="submit-incapacidad">
                        <button type="submit" id="Guardar-incapacidad" name="Guardar-incapacidad" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Guardar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="hidden bg-transparent rounded-lg tab-pane" id="actaA" role="tabpanel" aria-labelledby="actaA-tab">
                  <form id="acta-form" method="post">
                    <div class="grid grid-cols-1 mt-5 mx-7">
                      <label class="text-[#64748b] font-semibold mb-2">Título del acta administrativa</label>
                      <div class="group flex">
                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                          <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />
                          </svg>
                        </div>
                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="titulo_acta" name="titulo_acta" placeholder="Título del acta administrativa">
                      </div>
                    </div>
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
                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fecha_acta" name="fecha_acta" placeholder="Fecha en la que se realiza" autocomplete="off">
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
                    <div class="mt-12 h-px bg-slate-200"></div>
                    <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                      <button type="button" id="reset-acta" name="reset-acta" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Resetear</button>
                      <div id="submit-acta">
                        <button type="submit" id="Guardar-acta" name="Guardar-acta" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Guardar</button>
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
  </div>
</div>