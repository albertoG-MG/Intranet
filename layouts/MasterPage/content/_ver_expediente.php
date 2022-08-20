<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-center">
        <div class="grid w-11/12 md:w-9/12">
            <h3 class="text-gray-700 text-3xl font-medium">Ver Expedientes</h3>
        </div>
    </div>
    <div class="mt-4">
        <div class="flex flex-col mt-8">
            <div class="flex bg-gray-200 items-center justify-center mb-32">
                <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12">
                    <div class="bg-gray-50 rounded-t">
                        <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                            <a href="dashboard.php" class="text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                            </a>

                            <span class="mx-5 rotate-90 sm:rotate-0 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>

                            <a href="expedientes.php" class="flex items-center text-gray-600 -px-2 hover:underline">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M6,17C6,15 10,13.9 12,13.9C14,13.9 18,15 18,17V18H6M15,9A3,3 0 0,1 12,12A3,3 0 0,1 9,9A3,3 0 0,1 12,6A3,3 0 0,1 15,9M3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3H5C3.89,3 3,3.9 3,5Z" />
                                </svg>

                                <span class="mx-2">Expedientes</span>
                            </a>

                            <span class="mx-5 rotate-90 sm:rotate-0 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>

                            <a href="ver_expediente.php?idExpediente=<?php echo $Verid ?>" class="flex items-center text-blue-600 -px-2 hover:underline">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
	                                <path fill="currentColor" d="M22,4H14V7H10V4H2A2,2 0 0,0 0,6V20A2,2 0 0,0 2,22H22A2,2 0 0,0 24,20V6A2,2 0 0,0 22,4M8,9A2,2 0 0,1 10,11A2,2 0 0,1 8,13A2,2 0 0,1 6,11A2,2 0 0,1 8,9M12,17H4V16C4,14.67 6.67,14 8,14C9.33,14 12,14.67 12,16V17M20,18H14V16H20V18M20,14H14V12H20V14M20,10H14V8H20V10M13,6H11V2H13V6Z" />
                                </svg>

                                <span class="mx-2">Ver Expedientes</span>
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-center py-4">
                        <div class="flex bg-white rounded-full md:p-4 p-2 border-2 border-black">
                            <svg style="width:48px;" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M22,4H14V7H10V4H2A2,2 0 0,0 0,6V20A2,2 0 0,0 2,22H22A2,2 0 0,0 24,20V6A2,2 0 0,0 22,4M8,9A2,2 0 0,1 10,11A2,2 0 0,1 8,13A2,2 0 0,1 6,11A2,2 0 0,1 8,9M12,17H4V16C4,14.67 6.67,14 8,14C9.33,14 12,14.67 12,16V17M20,18H14V16H20V18M20,14H14V12H20V14M20,10H14V8H20V10M13,6H11V2H13V6Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="flex">
                            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Expediente</h1>
                        </div>
                    </div>
                    <div class="flex justify-center mt-4">
                        <div class="flex">
                            <button type="button" onclick="location.href = 'editar_expediente.php?idExpediente=<?php echo $Verid; ?>';" id="editar" name="editar" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Editar expediente</button>
                        </div>
                    </div>
                    <ul id='tabs' class='flex flex-col items-center sm:flex-row w-full px-11 pt-2 '>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 border-blue-400 rounded-t opacity-50'><a id='default-tab' class='active' href='#first'>Datos generales</a></li>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 rounded-t opacity-50'><a href='#second'>Datos adicionales</a></li>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 rounded-t opacity-50'><a href='#third'>Datos bancarios</a></li>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 rounded-t opacity-50'><a href='#fourth'>Documentos necesarios</a></li>
                    </ul>
					<div id='tab-contents'>
						<div id='first' class='p-4'>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 b-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Expediente asignado a:</label>
                                <span class="md:flex md:justify-end"><?php echo "$selected->nombre $selected->apellido_pat $selected->apellido_mat"; ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de empleado</label>
                                <span class="md:flex md:justify-end"><?php if($ver->enum_empleado == null){ echo "No hay datos"; }else{echo "{$ver->enum_empleado}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento</label>
                                <span class="md:flex md:justify-end"><?php if($selected->departamento == null){echo "Sin departamento";}else{ echo "{$selected->departamento}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Puesto</label>
                                <span class="md:flex md:justify-end"><?php if($ver->epuesto == null){ echo "No hay datos"; }else{echo "{$ver->epuesto}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nivel de estudios</label>
                                <span class="md:flex md:justify-end"><?php if($ver->eestudios == null){ echo "No hay datos"; }else{echo "{$ver->eestudios}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Datos de ubicación</label>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle</label>
                                <span class="md:flex md:justify-end"><?php if($ver->ecalle == null){ echo "No hay datos"; }else{echo "{$ver->ecalle}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número interior</label>
                                <span class="md:flex md:justify-end"><?php if($ver->enum_interior == null){ echo "No hay datos"; }else{echo "{$ver->enum_interior}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número exterior</label>
                                <span class="md:flex md:justify-end"><?php if($ver->enum_exterior == null){ echo "No hay datos"; }else{echo "{$ver->enum_exterior}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia</label>
                                <span class="md:flex md:justify-end"><?php if($ver->ecolonia == null){ echo "No hay datos"; }else{echo "{$ver->ecolonia}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado</label>
                                <span class="md:flex md:justify-end"><?php if($countestado == 0){echo "No hay datos";}else{ $state=ucfirst(strtolower($verestado->nombre)); echo "{$state}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Municipio</label>
                                <span class="md:flex md:justify-end"><?php if($countmunicipio == 0){echo "No hay datos";}else{ $city=ucfirst(strtolower($vermunicipio->nombre)); echo "{$city}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código postal</label>
                                <span class="md:flex md:justify-end"><?php if($ver->ecodigo == null){ echo "No hay datos"; }else{echo "{$ver->ecodigo}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono de domicilio</label>
                                <span class="md:flex md:justify-end"><?php if($ver->etel_dom == null){ echo "No hay datos"; }else{echo "{$ver->etel_dom}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono móvil</label>
                                <span class="md:flex md:justify-end"><?php if($ver->etel_mov == null){ echo "No hay datos"; }else{echo "{$ver->etel_mov}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Casa propia</label>
                                <span class="md:flex md:justify-end"><?php if($ver->ecasa_propia == null){ echo "No hay datos"; }else{echo "{$ver->ecasa_propia}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de nacimiento</label>
                                <span class="md:flex md:justify-end"><?php if($ver->efecha_nacimiento == null){ echo "No hay datos"; }else{echo "{$ver->efecha_nacimiento}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha inicio de contrato</label>
                                <span class="md:flex md:justify-end"><?php if($ver->efecha_inicioc == null){ echo "No hay datos"; }else{echo "{$ver->efecha_inicioc}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de alta</label>
                                <span class="md:flex md:justify-end"><?php if($ver->efecha_alta == null){ echo "No hay datos"; }else{echo "{$ver->efecha_alta}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Observaciones</label>
                                <span class="md:flex md:justify-end"><?php if($ver->eobservaciones == null){ echo "No hay datos"; }else{echo "{$ver->eobservaciones}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Curp</label>
                                <span class="md:flex md:justify-end"><?php if($ver->ecurp == null){ echo "No hay datos"; }else{echo "{$ver->ecurp}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de seguro social</label>
                                <span class="md:flex md:justify-end"><?php if($ver->enss == null){ echo "No hay datos"; }else{echo "{$ver->enss}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                                <span class="md:flex md:justify-end"><?php if($ver->erfc == null){ echo "No hay datos"; }else{echo "{$ver->erfc}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de identificación</label>
                                <span class="md:flex md:justify-end"><?php if($ver->etipo_identificacion == null){echo "No hay datos";}else{ $tidentificacion=ucfirst(strtolower($ver->etipo_identificacion)); echo "{$tidentificacion}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de identificación</label>
                                <span class="md:flex md:justify-end"><?php if($ver->enum_identificacion == null){ echo "No hay datos"; }else{echo "{$ver->enum_identificacion}";} ?></span>
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <div class="flex justify-center sm:justify-end">
                                    <button type="button" id="siguiente" name="siguiente" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
                                </div>
                            </div>	
						</div>
						<div id='second' class='hidden p-4'>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Referencias laborales</label>
                            </div>    
                            <div id="referencias">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Capacitación</label>
                                <span class="md:flex md:justify-end"><?php if($ver->ecapacitacion == null){ echo "No hay datos"; }else{echo "{$ver->ecapacitacion}";} ?></span>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Uniformes</label>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de entrega de uniforme</label>
                                <span class="md:flex md:justify-end"><?php if($ver->efecha_enuniforme == null){ echo "No hay datos"; }else{echo "{$ver->efecha_enuniforme}";} ?></span>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cantidad (camisa)</label>
                                <span class="md:flex md:justify-end"><?php if($ver->ecantidad_polo == null){ echo "No hay datos"; }else{echo "{$ver->ecantidad_polo}";} ?></span>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla (camisa)</label>
                                <span class="md:flex md:justify-end"><?php if($ver->etalla_polo == null){ echo "No hay datos"; }else{echo "{$ver->etalla_polo}";} ?></span>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Contacto de emergencia</label>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                                <span class="md:flex md:justify-end"><?php if($ver->eemergencia_nombre == null){ echo "No hay datos"; }else{echo "{$ver->eemergencia_nombre}";} ?></span>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono</label>
                                <span class="md:flex md:justify-end"><?php if($ver->eemergencia_telefono == null){ echo "No hay datos"; }else{echo "{$ver->eemergencia_telefono}";} ?></span>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Otros datos</label>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Resultado antidoping</label>
                                <span class="md:flex md:justify-end"><?php if($ver->eresultado_antidoping == null){ echo "No hay datos"; }else{echo "{$ver->eresultado_antidoping}";} ?></span>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cómo se entero de la vacante?</label>
                                <span class="md:flex md:justify-end"><?php if($ver->evacante == null){ echo "No hay datos"; }else{echo "{$ver->evacante}";} ?></span>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tiene familiares dentro de la empresa?</label>
                                <span class="md:flex md:justify-end"><?php if($ver->efam_dentro_empresa == null){ echo "No hay datos"; }else{echo "{$ver->efam_dentro_empresa}";} ?></span>
                            </div>
							<?php if($ver->efam_nombre != null){ ?>
								<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
									<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo del familiar</label>
									<span class="md:flex md:justify-end"><?php if($ver->efam_nombre == null){ echo "No hay datos"; }else{echo "{$ver->efam_nombre}";} ?></span>
								</div>
							<?php } ?>
							<div class="grid grid-cols-1 mt-5 mx-7">
								<div class="flex justify-center sm:justify-end gap-3">
									<button type="button" id="anterior" name="anterior" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
									<button type="button" id="siguiente2" name="siguiente2" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
								</div>
							</div>		   
						</div>
						<div id='third' class='hidden p-4'>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Referencias bancarias</label>
                            </div>    
                            <div id="ref">
                            </div>
							<div class="grid grid-cols-1 mt-5 mx-7">
								<div class="flex justify-center sm:justify-end gap-3">
									<button type="button" id="anterior2" name="anterior2" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
									<button type="button" id="siguiente3" name="siguiente3" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
								</div>
							</div>
						</div>
						<div id='fourth' class='hidden p-4'>
                        <?php for ($contador_array3 = 0; $contador_array3 < count($array3); $contador_array3++) { 
								if($array3[$contador_array3]["nombre"] == "CURRICULUM Y/O SOLICITUD"){
							?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Curriculum y/o solicitud</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue; 
								} 
								if($array3[$contador_array3]["nombre"] == "EVALUACION PSICOMETRICA"){
									?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Evaluación psicométrica</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue; 
								} 
                                if($array3[$contador_array3]["nombre"] == "COPIA ACTA DE NACIMIENTO"){
									?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Copia acta de nacimiento</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "CURP"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CURP</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "IDENTIFICACION OFICIAL"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">identificación oficial</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "COMPROBANTE DE DOMICILIO"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Comprobante de domicilio</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "RFC"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "CARTA DE RECOMENDACION LABORAL"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Carta de recomendación laboral</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "CARTA DE RECOMENDACION PERSONAL"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Carta de recomendación personal</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "AVISO DE RETENCION CREDITO INFONAVIT"){
									?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Aviso de retención crédito infonavit </label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "CARTA DE SEGUNDO TRABAJO"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Carta de segundo trabajo</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "ALTA DE IMSS"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Alta de IMMS</label>
										<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
								if($array3[$contador_array3]["nombre"] == "CONTRATO NOMINA BANCARIA"){
                                    ?>
									<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
										<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Contrato nómina bancaria</label>
									<?php if($array3[$contador_array3]['nombre_archivo'] != null){ ?><a class='text-left md:text-right' download='pdfTitle' href='<?php if($array3[$contador_array3]['nombre_archivo'] != null){ echo $array3[$contador_array3]['archivo']; }else { echo '#';} ?>' title='Download pdf document'><?php echo "<span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>".$array3[$contador_array3]['nombre_archivo']. "</span>"; ?></a><?php }else{ echo "<span class='text-left md:text-right'>No se encontró el archivo en la base de datos</span>";  }?>
									</div>
									<?php
									continue;
								}
							}
							?>
                            <div class="grid grid-cols-1 mt-5 mx-7">
								<div class="flex justify-center sm:justify-end gap-3">
									<button type="button" id="anterior3" name="anterior3" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>