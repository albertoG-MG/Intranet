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
   Ver Expedientes
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
                        <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M14,20V19C14,17.67 11.33,17 10,17C8.67,17 6,17.67 6,19V20H14M10,12A2,2 0 0,0 8,14A2,2 0 0,0 10,16A2,2 0 0,0 12,14A2,2 0 0,0 10,12Z" />
                     </svg>
                     <span class="text-sm font-medium">Ver Expedientes</span>
                  </div>
               </div>
            </div>
            <div class="bg-white p-3 shadow-md rounded-b">
               <div class="flex flex-col mt-5 mx-7">
                  <h2 class="text-2xl text-[#64748b] font-semibold">Expediente del Empleado: <?php echo $selected->nombre. " " .$selected->apellido_pat. " " .$selected->apellido_mat ?></h2>
                  <span class="text-[#64748b]">En esta sección puede visualizar la información de un empleado.</span>
                  <div class="my-3 h-px bg-slate-200"></div>
               </div>
               <ul id='menu' class='flex flex-col items-center md:flex-row md:flex-wrap w-full px-7 gap-3'>
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
                  <div class="block bg-transparent rounded-lg tab-pane" id="datosG" role="tabpanel" aria-labelledby="datosG-tab">
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
                           <?php if($ver->enum_empleado == null){ echo "No hay datos"; }else{echo "{$ver->enum_empleado}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Departamento:
                           </div>
                           <span>
                           <?php if($selected->departamento == null){ echo "No hay datos"; }else{echo "{$selected->departamento}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Puesto:
                           </div>
                           <span>
                           <?php if($ver->epuesto == null){ echo "No hay datos"; }else{echo "{$ver->epuesto}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Nivel de estudios:
                           </div>
                           <span>
                           <?php if($ver->eestudios == null){ echo "No hay datos"; }else{echo "{$ver->eestudios}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Correo electrónico:
                           </div>
                           <span>
                           <?php if($selected->correo == null){ echo "No hay datos"; }else{echo "{$selected->correo}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Correo electrónico adicional:
                           </div>
                           <span>
                           <?php if($ver->eposee_correo == "no"){ echo "No posee un correo electrónico adicional"; }else{echo "{$ver->ecorreo_adicional}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col mt-5 mx-7">
                        <h2 class="text-2xl text-[#64748b] font-semibold">Estatus del empleado</h2>
                        <span class="text-[#64748b]">Visualización del estatus del empleado.</span>
                        <div class="my-3 h-px bg-slate-200"></div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Situación del empleado:
                           </div>
                           <span>
                           <?php if($ver->esituacion_del_empleado == null){ echo "No hay datos"; }else{echo "{$ver->esituacion_del_empleado}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Estatus del empleado:
                           </div>
                           <span>
                           <?php if($ver->eestatus_del_empleado == null){ echo "No hay datos"; }else{echo "{$ver->eestatus_del_empleado}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Fecha del estatus:
                           </div>
                           <span>
                           <?php if($ver->eestatus_fecha == null){ echo "No hay datos"; }else{echo "{$ver->eestatus_fecha}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5" x-data="{ showestatusmotivo:  <?php if($ver -> eestatus_del_empleado == "RENUNCIA VOLUNTARIA" || $ver -> eestatus_del_empleado == "LIQUIDACION"){ echo "true";  }else{ echo "false";} ?>}">
                           <div x-show="showestatusmotivo">
                              <div class="text-[#64748b] font-semibold">
                                 Motivo del estatus:
                              </div>
                              <span>
                              <?php if($ver->emotivo == null){ echo "No hay datos"; }else{echo "{$ver->emotivo}";} ?>
                              </span>
                           </div>
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
                           <?php if($ver->ecalle == null){ echo "No hay datos"; }else{echo "{$ver->ecalle}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Número interior:
                           </div>
                           <span>
                           <?php if($ver->enum_exterior == null){ echo "No hay datos"; }else{echo "{$ver->enum_exterior}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Número exterior:
                           </div>
                           <span>
                           <?php if($ver->enum_exterior == null){ echo "No hay datos"; }else{echo "{$ver->enum_exterior}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Colonia:
                           </div>
                           <span>
                           <?php if($ver->ecolonia == null){ echo "No hay datos"; }else{echo "{$ver->ecolonia}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Estado:
                           </div>
                           <span>
                           <?php mb_internal_encoding('UTF-8'); if($countestado == 0){echo "No hay datos";}else{ $state=ucfirst(mb_strtolower($verestado->nombre)); echo "{$state}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Municipio:
                           </div>
                           <span>
                           <?php mb_internal_encoding('UTF-8'); if($countmunicipio == 0){echo "No hay datos";}else{ $city=ucfirst(mb_strtolower($vermunicipio->nombre)); echo "{$city}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Código postal:
                           </div>
                           <span>
                           <?php if($ver->ecodigo == null){ echo "No hay datos"; }else{echo "{$ver->ecodigo}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Teléfono del domicilio:
                           </div>
                           <span>
                           <?php if($ver->etel_dom == null){ echo "No hay datos"; }else{echo "{$ver->etel_dom}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Teléfono propio:
                           </div>
                           <span>
                           <?php if($ver->eposee_telmov == "no"){ echo "No posee un teléfono propio"; }else{echo "{$ver->etel_mov}";} ?>
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
                           <?php if($ver -> eposee_telempresa == "no"){ echo "Sin teléfono proporcionado por la empresa"; }else{echo "{$ver -> eposee_telempresa}";} ?>
                           </span>
                        </div>
                     </div>
                     <div x-data="{ showtelefonoempresa:  <?php if($ver -> eposee_telempresa == "no"){ echo "false";  }else{ echo "true";} ?>}">
                        <div x-show="showtelefonoempresa">
                           <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Marcación corta:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$ver -> emarcacion}";} ?>
                                 </span>
                              </div>
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Número de serie:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$ver -> eserie}";} ?>
                                 </span>
                              </div>
                           </div>
                           <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    SIM:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$ver -> esim}";} ?>
                                 </span>
                              </div>
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Número de red:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$ver -> enumred}";} ?>
                                 </span>
                              </div>
                           </div>
                           <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Modelo:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$ver -> modeltel}";} ?>
                                 </span>
                              </div>
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Marca:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_telempresa == "no"){ echo "No hay datos"; }else{echo "{$ver -> marcatel}";} ?>
                                 </span>
                              </div>
                           </div>
                           <div class="flex flex-col mx-7">
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    IMEI:
                                 </div>
                                 <span>
                                 <?php if($ver->eposee_telmov == "no"){ echo "No hay datos"; }else{echo "{$ver->eimei}";} ?>
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
                           <?php if($ver -> eposee_laptop == "no"){ echo "Sin laptop proporcionado por la empresa"; }else{echo "{$ver -> eposee_laptop}";} ?>
                           </span>
                        </div>
                     </div>
                     <div x-data="{ showlaptopempresa:  <?php if($ver -> eposee_laptop == "no"){ echo "false";  }else{ echo "true";} ?>}">
                        <div x-show="showlaptopempresa">
                           <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Marca de la laptop:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_laptop == "no"){ echo "No hay datos"; }else{echo "{$ver -> emarca_laptop}";} ?>
                                 </span>
                              </div>
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Modelo de la laptop:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_laptop == "no"){ echo "No hay datos"; }else{echo "{$ver -> emodelo_laptop}";} ?>
                                 </span>
                              </div>
                           </div>
                           <div class="flex flex-col mx-7">
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Serie de la laptop:
                                 </div>
                                 <span>
                                 <?php if($ver -> eposee_laptop == "no"){ echo "No hay datos"; }else{echo "{$ver -> eserie_laptop}";} ?>
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
                           <?php if($ver -> ecasa_propia == null){ echo "No hay datos"; }else{echo "{$ver -> ecasa_propia}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Estado civil:
                           </div>
                           <span>
                           <?php if($ver -> eecivil == null){ echo "No hay datos"; }else{echo "{$ver -> eecivil}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Monto mensual de retención:
                           </div>
                           <span>
                           <?php if($ver -> eposee_retencion == "no"){ echo "No tiene retención"; }else{echo "{$ver -> emonto_mensual}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Fecha de nacimiento:
                           </div>
                           <span>
                           <?php if($ver -> efecha_nacimiento == null){ echo "No hay datos"; }else{echo "{$ver -> efecha_nacimiento}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Fecha de inicio de contrato:
                           </div>
                           <span>
                           <?php if($ver -> efecha_inicioc == null){ echo "No hay datos"; }else{echo "{$ver -> efecha_inicioc}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Fecha de alta:
                           </div>
                           <span>
                           <?php if($ver -> efecha_alta == null){ echo "No hay datos"; }else{echo "{$ver -> efecha_alta}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Salario en el contrato de trabajo:
                           </div>
                           <span>
                           <?php if($ver -> esalario_contrato == null){ echo "No hay datos"; }else{echo "{$ver -> esalario_contrato}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Salario en la fecha de alta:
                           </div>
                           <span>
                           <?php if($ver -> esalario_fechaalta == null){ echo "No hay datos"; }else{echo "{$ver -> esalario_fechaalta}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Observaciones:
                           </div>
                           <span>
                           <?php if($ver -> eobservaciones == null){ echo "Sin observaciones"; }else{echo "{$ver -> eobservaciones}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Curp:
                           </div>
                           <span>
                           <?php if($ver -> ecurp == null){ echo "No hay datos"; }else{echo "{$ver -> ecurp}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Número de seguro social:
                           </div>
                           <span>
                           <?php if($ver -> enss == null){ echo "No hay datos"; }else{echo "{$ver -> enss}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              RFC:
                           </div>
                           <span>
                           <?php if($ver -> erfc == null){ echo "No hay datos"; }else{echo "{$ver -> erfc}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Tipo de identificación:
                           </div>
                           <span>
                           <?php if($ver -> etipo_identificacion == null){ echo "No hay datos"; }else{echo "{$ver -> etipo_identificacion}";} ?>
                           </span>
                        </div>
                     </div>
                     <div x-data="{ showidentificacion:  <?php if($ver -> etipo_identificacion == null){ echo "false";  }else{ echo "true";} ?>}">
                        <div x-show="showidentificacion">
                           <div class="flex flex-col mx-7">
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Número de identificación:
                                 </div>
                                 <span>
                                 <?php if($ver -> enum_identificacion == null){ echo "Sin identificación"; }else{echo "{$ver -> enum_identificacion}";} ?>
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
                  <div class="hidden bg-transparent rounded-lg tab-pane" id="datosA" role="tabpanel" aria-labelledby="datosA-tab">
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
                           <?php if($ver->efecha_enuniforme == null){ echo "No se ha entregado uniforme"; }else{echo "{$ver->efecha_enuniforme}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Cantidad (camisa):
                           </div>
                           <span>
                           <?php if($ver->ecantidad_polo == null){ echo "No se ha entregado uniforme"; }else{echo "{$ver->ecantidad_polo}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Talla (camisa):
                           </div>
                           <span>
                           <?php if($ver->etalla_polo == null){ echo "No hay datos"; }else{echo "{$ver->etalla_polo}";} ?>
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
                           <?php if($ver->eemergencia_nombre == null){ echo "No hay datos"; }else{echo "{$ver->eemergencia_nombre}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Parentesco:
                           </div>
                           <span>
                           <?php if($ver -> eemergencia_parentesco == null){ echo "No hay datos"; }else{echo "{$ver -> eemergencia_parentesco}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Teléfono:
                           </div>
                           <span>
                           <?php if($ver->eemergencia_telefono == null){ echo "No hay datos"; }else{echo "{$ver->eemergencia_telefono}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Nombre completo2:
                           </div>
                           <span>
                           <?php if($ver -> eemergencia_nombre2 == null){ echo "No hay datos"; }else{echo "{$ver -> eemergencia_nombre2}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Parentesco2:
                           </div>
                           <span>
                           <?php if($ver -> eemergencia_parentesco2 == null){ echo "No hay datos"; }else{echo "{$ver -> eemergencia_parentesco2}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Teléfono2:
                           </div>
                           <span>
                           <?php if($ver -> eemergencia_telefono2 == null){ echo "No hay datos"; }else{echo "{$ver -> eemergencia_telefono2}";} ?>
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
                           <?php if($ver->ecapacitacion == null){ echo "No hay datos"; }else{echo "{$ver->ecapacitacion}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Resultado antidoping:
                           </div>
                           <span>
                           <?php if($ver->eresultado_antidoping == null){ echo "No hay datos"; }else{echo "{$ver->eresultado_antidoping}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Tipo de sangre:
                           </div>
                           <span>
                           <?php if($ver->etipo_sangre == null){ echo "No hay datos"; }else{echo "{$ver->etipo_sangre}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              ¿Cómo se entero de la vacante?:
                           </div>
                           <span>
                           <?php if($ver->evacante == null){ echo "No hay datos"; }else{echo "{$ver->evacante}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              ¿Tiene familiares en la empresa?:
                           </div>
                           <span>
                           <?php if($ver->efam_dentro_empresa == null){ echo "No hay datos"; }else{echo "{$ver->efam_dentro_empresa}";} ?>
                           </span>
                        </div>
                     </div>
                     <div x-data="{ showfamiliar:  <?php if($ver -> efam_dentro_empresa == "no"){ echo "false";  }else{ echo "true";} ?>}">
                        <div x-show="showfamiliar">
                           <div class="flex flex-col mx-7">
                              <div class="flex-1 flex flex-col mt-5">
                                 <div class="text-[#64748b] font-semibold">
                                    Nombre completo del familiar:
                                 </div>
                                 <span>
                                 <?php if($ver->efam_nombre == null){ echo "No hay datos"; }else{echo "{$ver->efam_nombre}";} ?>
                                 </span>
                              </div>
                           </div>
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
                  <div class="hidden bg-transparent rounded-lg tab-pane" id="datosB" role="tabpanel" aria-labelledby="datosB-tab">
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
                           <?php if($ver -> ebanco_personal == null){ echo "No hay datos"; }else{echo "{$ver -> ebanco_personal}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Cuenta personal:
                           </div>
                           <span>
                           <?php if($ver -> ecuenta_personal == null){ echo "No hay datos"; }else{echo "{$ver -> ecuenta_personal}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:items-center lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Clabe personal:
                           </div>
                           <span>
                           <?php if($ver -> eclabe_personal == null){ echo "No hay datos"; }else{echo "{$ver -> eclabe_personal}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Plástico asignado personal:
                           </div>
                           <span>
                           <?php if($ver -> eplastico_personal == null){ echo "No hay datos"; }else{echo "{$ver -> eplastico_personal}";} ?>
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
                           <?php if($ver -> ebanco_nomina == null){ echo "No hay datos"; }else{echo "{$ver -> ebanco_nomina}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Cuenta nómina:
                           </div>
                           <span>
                           <?php if($ver -> ecuenta_nomina == null){ echo "No hay datos"; }else{echo "{$ver -> ecuenta_nomina}";} ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:items-center lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Clabe nómina:
                           </div>
                           <span>
                           <?php if($ver -> eclabe_nomina == null){ echo "No hay datos"; }else{echo "{$ver -> eclabe_nomina}";} ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Plástico asignado nómina:
                           </div>
                           <span>
                           <?php if($ver -> eplastico == null){ echo "No hay datos"; }else{echo "{$ver -> eplastico}";} ?>
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
                  <div class="hidden bg-transparent rounded-lg tab-pane" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
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
                              <?php foreach($array_papeleria as $documents){ ?>
                              <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                 <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre del documento</span>
                                    <p><?php echo ucfirst(strtolower($documents["nombre"])); ?></p>
                                 </td>
                                 <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">
                                    Archivo
                                    </span>
                                    <?php
                                       $checkdocument = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:archivo");
                                       $checkdocument -> execute(array(":expedienteid" => $Verid, ":archivo" => $documents["id"]));
                                       $countdocument = $checkdocument -> rowCount();
                                       $historial_expedientes = $object -> _db -> prepare("SELECT * FROM historial_papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo UNION SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid2 AND tipo_archivo=:tipo2");
                                       $historial_expedientes -> execute(array(':expedienteid' => $Verid, ':tipo' => $documents["id"], ':expedienteid2' => $Verid, ':tipo2' => $documents["id"]));
                                       $count_historial = $historial_expedientes -> rowCount();
                                       if($countdocument > 0){
                                          $path = __DIR__ . "/../../../src/documents/".$documents["identificador"];  
                                          if(is_file($path)){  
                                             echo "<p><a class='text-blue-600 hover:border-b-2 hover:border-blue-600 cursor-pointer' href='../src/documents/{$documents["identificador"]}'>{$documents["nombre_archivo"]}</a></p>"; 
                                          }else{ 
                                             echo "<p style='color: rgb(244 63 94);'>El sistema no puede encontrar el archivo especificado.</p>"; 
                                          } 
                                       }else{
                                          if($count_historial > 0){ echo "<p style='color: rgb(244 63 94);'>No existe un archivo vinculado.</p>"; }else{ echo "<p>No hay registros del archivo.</p>"; }
                                       }
                                       if($count_historial > 0){
                                    ?>  
                                          <a class="text-blue-600 hover:border-b-2 hover:border-blue-600" href="ver_historial.php?idExpediente=<?php echo $Verid; ?>&tipo_papeleria=<?php print ($documents['id']); ?>">
                                             <?php echo "Ver historial de archivos subidos de " .ucfirst(strtolower($documents["nombre"])). "..."?>
                                          </a>
                                    <?php
                                       }
                                    ?>
                                 </td>
                              </tr>
                              <?php 
                                 } 
                                 ?>
                           </tbody>
                        </table>
                     </div>
                     <div class="flex flex-col mt-5 mx-7">
                        <div class="my-3 h-px bg-slate-200"></div>
                        <div class="self-end mt-3">
                           <button type="button" id="anterior3" name="anterior3" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
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
    </style>
</div>