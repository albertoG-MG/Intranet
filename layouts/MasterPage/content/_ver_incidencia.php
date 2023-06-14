<div class="container mx-auto px-6 py-8">
  <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
    <?php if($fetch_tipo -> tipo_permiso == "PERMISO REGLAMENTARIO D"){ echo "Ver permiso reglamentario descriptivo"; }else if($fetch_tipo -> tipo_permiso == "PERMISO REGLAMENTARIO ND"){ echo "Ver permiso reglamentario no descriptivo"; }else if($fetch_tipo -> tipo_permiso == "PERMISO NO REGLAMENTARIO G"){ echo "Ver permiso no reglamentario general"; }else if($fetch_tipo -> tipo_permiso == "PERMISO NO REGLAMENTARIO A"){ echo "Ver permiso no reglamentario ausencia"; }else if($fetch_tipo -> tipo_permiso == "INCAPACIDAD"){ echo "Ver incapacidad"; }?>
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
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4 2C2.89 2 2 2.89 2 4V20A2 2 0 0 0 4 22H12.41A7 7 0 0 0 16 23A7 7 0 0 0 23 16A7 7 0 0 0 18 9.3V8L12 2H4M11 3.5L16.5 9H11V3.5M16 11A5 5 0 0 1 21 16A5 5 0 0 1 16 21A5 5 0 0 1 11 16A5 5 0 0 1 16 11M15 12V17L18.61 19.16L19.36 17.94L16.5 16.25V12H15Z" />
                  </svg>
                  <span class="text-sm font-medium">Ver incidencias</span>
                </div>
              </div>
            </div>
            <div class="bg-white p-3 shadow-md rounded-b">
              <div class="flex flex-col mt-5 mx-7">
                <h2 class="text-2xl text-[#64748b] font-semibold">Detalles de la incidencia</h2>
                <span class="text-[#64748b]">En esta sección, se mostrará todos los datos de la incidencia.</span>
                <div class="my-3 h-px bg-slate-200"></div>
              </div>
              <?php if($fetch_tipo -> tipo_permiso == "PERMISO REGLAMENTARIO D"){ ?>
              <div id="main_permiso_rd" class="mt-5 mx-7 p-2">
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Creada por:
                    </div>
                    <span>
                      <?php if($fetch_information->creada_por == null){ echo "Sin datos"; }else{ echo $fetch_information->creada_por; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Fecha de expedición:
                    </div>
                    <span>
                      <?php if($fetch_information->fecha == null){ echo "Sin datos"; }else{ echo $fetch_information->fecha; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Estatus:
                    </div>
                    <span>
                      <?php if($fetch_information->estatus == null){ echo "Sin datos"; }else{ echo $fetch_information->estatus; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Permiso reglamentario:
                    </div>
                    <span>
                      <?php if($fetch_information->permiso_r == null){ echo "Sin datos"; }else{ echo $fetch_information->permiso_r; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Periodo:
                    </div>
                    <span>
                      <?php if($fetch_information->observaciones_permiso_r == null){ echo "Sin datos"; }else{ echo $fetch_information->observaciones_permiso_r; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Observaciones y/o comentarios:
                    </div>
                    <span>
                      <?php if($fetch_information->observaciones_permiso_r == null){ echo "Sin datos"; }else{ echo $fetch_information->observaciones_permiso_r; } ?>
                    </span>
                  </div>
                </div>
                <div class="mt-12 h-px bg-slate-200"></div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Justificante:
                    </div>
                    <label class='flex flex-col border-4 border-dashed w-full group'>
                      <div class='flex flex-col items-center justify-center pt-7'>
                        <div id="svg_permiso_rd">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                          </svg>
                        </div>
                        <div id="text_permiso_rd">
                          <p id="archivo_permiso_rd" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Cargando...</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <?php }else if($fetch_tipo -> tipo_permiso == "PERMISO REGLAMENTARIO ND"){ ?>
              <div id="main_permiso_nd" class="mt-5 mx-7 p-2">
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Creada por:
                    </div>
                    <span>
                      <?php if($fetch_information->creada_por == null){ echo "Sin datos"; }else{ echo $fetch_information->creada_por; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Fecha de expedición:
                    </div>
                    <span>
                      <?php if($fetch_information->fecha == null){ echo "Sin datos"; }else{ echo $fetch_information->fecha; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Estatus:
                    </div>
                    <span>
                      <?php if($fetch_information->estatus == null){ echo "Sin datos"; }else{ echo $fetch_information->estatus; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Permiso reglamentario:
                    </div>
                    <span>
                      <?php if($fetch_information->permiso_r == null){ echo "Sin datos"; }else{ echo $fetch_information->permiso_r; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Periodo:
                    </div>
                    <span>
                      <?php if($fetch_information->periodo_ausencia_r == null){ echo "Sin datos"; }else{ echo $fetch_information->periodo_ausencia_r; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Motivo del permiso:
                    </div>
                    <span>
                      <?php if($fetch_information->motivo_permiso_r == null){ echo "Sin datos"; }else{ echo $fetch_information->motivo_permiso_r; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Observaciones y/o comentarios:
                    </div>
                    <span>
                      <?php if($fetch_information->observaciones_permiso_r == null){ echo "Sin datos"; }else{ echo $fetch_information->observaciones_permiso_r; } ?>
                    </span>
                  </div>
                </div>
                <div class="mt-12 h-px bg-slate-200"></div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Justificante:
                    </div>
                    <label class='flex flex-col border-4 border-dashed w-full group'>
                      <div class='flex flex-col items-center justify-center pt-7'>
                        <div id="svg_permiso_rnd">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                          </svg>
                        </div>
                        <div id="text_permiso_rnd">
                          <p id="archivo_permiso_rnd" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Cargando...</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <?php }else if($fetch_tipo -> tipo_permiso == "PERMISO NO REGLAMENTARIO G"){ ?>
              <div id="main_permiso_nrg" class="mt-5 mx-7 p-2">
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Creada por:
                    </div>
                    <span>
                      <?php if($fetch_information->creada_por == null){ echo "Sin datos"; }else{ echo $fetch_information->creada_por; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Fecha de expedición:
                    </div>
                    <span>
                      <?php if($fetch_information->fecha == null){ echo "Sin datos"; }else{ echo $fetch_information->fecha; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Estatus:
                    </div>
                    <span>
                      <?php if($fetch_information->estatus == null){ echo "Sin datos"; }else{ echo $fetch_information->estatus; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Permiso no reglamentario:
                    </div>
                    <span>
                      <?php if($fetch_information->permiso_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->permiso_nr; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Periodo:
                    </div>
                    <span>
                      <?php if($fetch_information->periodo_ausencia_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->periodo_ausencia_nr; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      ¿Justificante?:
                    </div>
                    <span>
                      <?php if($fetch_information->posee_jpermiso_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->posee_jpermiso_nr; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Motivo del permiso no reglamentario:
                    </div>
                    <span>
                      <?php if($fetch_information->motivo_permiso_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->motivo_permiso_nr; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Observaciones y/o comentarios:
                    </div>
                    <span>
                      <?php if($fetch_information->observaciones_permiso_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->observaciones_permiso_nr; } ?>
                    </span>
                  </div>
                </div>
                <div x-data="{ showjustificanteg:  <?php if($fetch_information -> posee_jpermiso_nr == null){ echo "false";  }else{ echo "true";} ?>}">
                  <div x-show="showjustificanteg">
                    <div class="mt-12 h-px bg-slate-200"></div>
                    <div class="flex flex-col mx-7">
                      <div class="flex-1 flex flex-col mt-5">
                        <div class="text-[#64748b] font-semibold">
                          Justificante:
                        </div>
                        <label class='flex flex-col border-4 border-dashed w-full group'>
                          <div class='flex flex-col items-center justify-center pt-7'>
                            <div id="svg_permiso_nrg">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                              </svg>
                            </div>
                            <div id="text_permiso_nrg">
                              <p id="archivo_permiso_nrg" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Cargando...</p>
                            </div>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php }else if($fetch_tipo -> tipo_permiso == "PERMISO NO REGLAMENTARIO A"){ ?>
              <div id="main_permiso_nra" class="mt-5 mx-7 p-2">
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Creada por:
                    </div>
                    <span>
                      <?php if($fetch_information->creada_por == null){ echo "Sin datos"; }else{ echo $fetch_information->creada_por; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Fecha de expedición:
                    </div>
                    <span>
                      <?php if($fetch_information->fecha == null){ echo "Sin datos"; }else{ echo $fetch_information->fecha; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Estatus:
                    </div>
                    <span>
                      <?php if($fetch_information->estatus == null){ echo "Sin datos"; }else{ echo $fetch_information->estatus; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Permiso no reglamentario:
                    </div>
                    <span>
                      <?php if($fetch_information->permiso_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->permiso_nr; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Periodo:
                    </div>
                    <span>
                      <?php if($fetch_information->periodo_ausencia_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->periodo_ausencia_nr; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      ¿Justificante?:
                    </div>
                    <span>
                      <?php if($fetch_information->posee_jpermiso_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->posee_jpermiso_nr; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Motivo del permiso no reglamentario:
                    </div>
                    <span>
                      <?php if($fetch_information->motivo_permiso_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->motivo_permiso_nr; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Observaciones y/o comentarios:
                    </div>
                    <span>
                      <?php if($fetch_information->observaciones_permiso_nr == null){ echo "Sin datos"; }else{ echo $fetch_information->observaciones_permiso_nr; } ?>
                    </span>
                  </div>
                </div>
                <div x-data="{ showjustificantea:  <?php if($fetch_information -> posee_jpermiso_nr == null){ echo "false";  }else{ echo "true";} ?>}">
                  <div x-show="showjustificantea">
                    <div class="mt-12 h-px bg-slate-200"></div>
                    <div class="flex flex-col mx-7">
                      <div class="flex-1 flex flex-col mt-5">
                        <div class="text-[#64748b] font-semibold">
                          Justificante:
                        </div>
                        <label class='flex flex-col border-4 border-dashed w-full group'>
                          <div class='flex flex-col items-center justify-center pt-7'>
                            <div id="svg_permiso_nra">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                              </svg>
                            </div>
                            <div id="text_permiso_nra">
                              <p id="archivo_permiso_nra" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Cargando...</p>
                            </div>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php }else if($fetch_tipo -> tipo_permiso == "INCAPACIDAD"){ ?>
              <div id="main_permiso_nra" class="mt-5 mx-7 p-2">
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Creada por:
                    </div>
                    <span>
                      <?php if($fetch_information->creada_por == null){ echo "Sin datos"; }else{ echo $fetch_information->creada_por; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Fecha de expedición:
                    </div>
                    <span>
                      <?php if($fetch_information->fecha == null){ echo "Sin datos"; }else{ echo $fetch_information->fecha; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Estatus:
                    </div>
                    <span>
                      <?php if($fetch_information->estatus == null){ echo "Sin datos"; }else{ echo $fetch_information->estatus; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Número de la incapacidad:
                    </div>
                    <span>
                      <?php if($fetch_information->numero_incapacidad == null){ echo "Sin datos"; }else{ echo $fetch_information->numero_incapacidad; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Serie y folio de la incapacidad:
                    </div>
                    <span>
                      <?php if($fetch_information->serie_folio_incapacidad == null){ echo "Sin datos"; }else{ echo $fetch_information->serie_folio_incapacidad; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Tipo de incapacidad:
                    </div>
                    <span>
                      <?php if($fetch_information->tipo_incapacidad == null){ echo "Sin datos"; }else{ echo $fetch_information->tipo_incapacidad; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Ramo de seguro:
                    </div>
                    <span>
                      <?php if($fetch_information->ramo_seguro_incapacidad == null){ echo "Sin datos"; }else{ echo $fetch_information->ramo_seguro_incapacidad; } ?>
                    </span>
                  </div>
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Periodo de la incapacidad:
                    </div>
                    <span>
                      <?php if($fetch_information->periodo_incapacidad == null){ echo "Sin datos"; }else{ echo $fetch_information->periodo_incapacidad; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Motivo de la incapacidad:
                    </div>
                    <span>
                      <?php if($fetch_information->motivo_incapacidad == null){ echo "Sin datos"; }else{ echo $fetch_information->motivo_incapacidad; } ?>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Observaciones y/o comentarios:
                    </div>
                    <span>
                      <?php if($fetch_information->observaciones_incapacidad == null){ echo "Sin datos"; }else{ echo $fetch_information->observaciones_incapacidad; } ?>
                    </span>
                  </div>
                </div>
                <div class="mt-12 h-px bg-slate-200"></div>
                <div class="flex flex-col mx-7">
                  <div class="flex-1 flex flex-col mt-5">
                    <div class="text-[#64748b] font-semibold">
                      Justificante:
                    </div>
                    <label class='flex flex-col border-4 border-dashed w-full group'>
                      <div class='flex flex-col items-center justify-center pt-7'>
                        <div id="svg_incapacidad">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                          </svg>
                        </div>
                        <div id="text_incapacidad">
                          <p id="archivo_incapacidad" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Cargando...</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <?php } ?>
              <div class="mt-12 h-px bg-slate-200 mx-7"></div>
              <div class="grid grid-cols-1 mx-7 mt-5">
                <div class="text-center md:text-right">
                  <a href="incidencias.php" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Regresar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>