<div class="container mx-auto px-6 py-8">
<h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
   Ver Expediente
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
                              <?php if($view->enum_empleado == null){ echo "No hay datos"; }else{echo "{$view->enum_empleado}";} ?>
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
                              <?php if($selected->correo == null){ echo "No hay datos"; }else{echo "{$selected->correo}";} ?>
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
                              ¿Tiene familiares en la empresa?:
                           </div>
                           <span>
                              <?php if($view->efam_dentro_empresa == null){ echo "No hay datos"; }else{echo "{$view->efam_dentro_empresa}";} ?>
                           </span>
                        </div>
                     </div>
                     <div x-data="{ showfamiliar:  <?php if($view -> efam_dentro_empresa == "no"){ echo "false";  }else{ echo "true";} ?>}">
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
                           <button type="button" id="anterior" name="anterior" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                           <button type="button" id="siguiente2" name="siguiente2" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Siguiente</button>
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
                           <button type="button" id="siguiente3" name="siguiente3" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Siguiente</button>
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
                              <?php foreach($array3 as $documents){ ?>
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
                                       $checkdocument = $object -> _db -> prepare("SELECT * FROM papeleria_empleado join expedientes on expedientes.id=papeleria_empleado.expediente_id WHERE expedientes.id=:expedienteid AND papeleria_empleado.tipo_archivo=:archivo");
                                       $checkdocument -> execute(array(":expedienteid" => $Verid, ":archivo" => $documents["id"]));
                                       $countdocument = $checkdocument -> rowCount();
                                       if($countdocument > 0){
                                       $path = __DIR__ . "/../../../src/documents/".$documents["identificador"];  
                                       if(is_file($path)){  
                                       echo "<p><a class='text-blue-600 hover:border-b-2 hover:border-blue-600 cursor-pointer' href='../src/documents/{$documents["identificador"]}'>{$documents["nombre_archivo"]}</a></p>"; 
                                       }else{ 
                                       echo "<p>El sistema no puede encontrar el archivo especificado.</p>"; 
                                       } 
                                       }else{
                                       echo "<p>No hay registros del archivo.</p>";
                                       }
                                    ?>
                                 </td>
                              </tr>
                              <?php } ?>
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
</div>
