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
                                <div class="text-left md:text-right"><span><?php echo "$selected->nombre $selected->apellido_pat $selected->apellido_mat"; ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de empleado</label>
                                <div class="text-left md:text-right"><span><?php if($ver->enum_empleado == null){ echo "No hay datos"; }else{echo "{$ver->enum_empleado}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento</label>
                                <div class="text-left md:text-right"><span><?php if($selected->departamento == null){echo "Sin departamento";}else{ echo "{$selected->departamento}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Puesto</label>
                                <div class="text-left md:text-right"><span><?php if($ver->epuesto == null){ echo "No hay datos"; }else{echo "{$ver->epuesto}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nivel de estudios</label>
                                <div class="text-left md:text-right"><span><?php if($ver->eestudios == null){ echo "No hay datos"; }else{echo "{$ver->eestudios}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Situación</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> esituacion_del_empleado == null){ echo "No hay datos"; }else{echo "{$ver -> esituacion_del_empleado}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estatus</label>
                                <div class="text-left md:text-right"><span><?php if($ver->eestatus_del_empleado == null){ echo "No hay datos"; }else{echo "{$ver->eestatus_del_empleado}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha</label>
                                <div class="text-left md:text-right"><span><?php if($ver->eestatus_fecha == null){ echo "No hay datos"; }else{echo "{$ver->eestatus_fecha}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Motivo</label>
                                <div class="text-left md:text-right"><span><?php if($ver->emotivo == null){ echo "No hay datos"; }else{echo "{$ver->emotivo}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Datos de ubicación</label>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle</label>
                                <div class="text-left md:text-right"><span><?php if($ver->ecalle == null){ echo "No hay datos"; }else{echo "{$ver->ecalle}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número interior</label>
                                <div class="text-left md:text-right"><span><?php if($ver->enum_interior == null){ echo "No hay datos"; }else{echo "{$ver->enum_interior}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número exterior</label>
                                <div class="text-left md:text-right"><span><?php if($ver->enum_exterior == null){ echo "No hay datos"; }else{echo "{$ver->enum_exterior}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia</label>
                                <div class="text-left md:text-right"><span><?php if($ver->ecolonia == null){ echo "No hay datos"; }else{echo "{$ver->ecolonia}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado</label>
                                <div class="text-left md:text-right"><span><?php mb_internal_encoding('UTF-8'); if($countestado == 0){echo "No hay datos";}else{ $state=ucfirst(mb_strtolower($verestado->nombre)); echo "{$state}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Municipio</label>
                                <div class="text-left md:text-right"><span><?php mb_internal_encoding('UTF-8'); if($countmunicipio == 0){echo "No hay datos";}else{ $city=ucfirst(mb_strtolower($vermunicipio->nombre)); echo "{$city}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código postal</label>
                                <div class="text-left md:text-right"><span><?php if($ver->ecodigo == null){ echo "No hay datos"; }else{echo "{$ver->ecodigo}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono de domicilio</label>
                                <div class="text-left md:text-right"><span><?php if($ver->etel_dom == null){ echo "No hay datos"; }else{echo "{$ver->etel_dom}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Posee teléfono propio?</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eposee_telmov == null){ echo "No hay datos"; }else{echo "{$ver -> eposee_telmov}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono móvil</label>
                                <div class="text-left md:text-right"><span><?php if($ver->etel_mov == null){ echo "No hay datos"; }else{echo "{$ver->etel_mov}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono asignado por la empresa?</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eposee_telempresa == null){ echo "No hay datos"; }else{echo "{$ver -> eposee_telempresa}";} ?></span></div>
                            </div>							
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Marcación</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> emarcacion == null){ echo "No hay datos"; }else{echo "{$ver -> emarcacion}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de serie</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eserie == null){ echo "No hay datos"; }else{echo "{$ver -> eserie}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Sim</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> esim == null){ echo "No hay datos"; }else{echo "{$ver -> esim}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Casa propia</label>
                                <div class="text-left md:text-right"><span><?php if($ver->ecasa_propia == null){ echo "No hay datos"; }else{echo "{$ver->ecasa_propia}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
	                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Datos relevantes del usuario</label>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado civil</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eecivil == null){ echo "No hay datos"; }else{echo "{$ver -> eecivil}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Posee retención</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eposee_retencion == null){ echo "No hay datos"; }else{echo "{$ver -> eposee_retencion}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Monto mensual</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> emonto_mensual == null){ echo "No hay datos"; }else{echo "{$ver -> emonto_mensual}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de nacimiento</label>
                                <div class="text-left md:text-right"><span><?php if($ver->efecha_nacimiento == null){ echo "No hay datos"; }else{echo "{$ver->efecha_nacimiento}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha inicio de contrato</label>
                                <div class="text-left md:text-right"><span><?php if($ver->efecha_inicioc == null){ echo "No hay datos"; }else{echo "{$ver->efecha_inicioc}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de alta</label>
                                <div class="text-left md:text-right"><span><?php if($ver->efecha_alta == null){ echo "No hay datos"; }else{echo "{$ver->efecha_alta}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Salario - Inicio de contrato</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> esalario_contrato == null){ echo "No hay datos"; }else{echo "{$ver -> esalario_contrato}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Salario - Fecha de alta</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> esalario_fechaalta == null){ echo "No hay datos"; }else{echo "{$ver -> esalario_fechaalta}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Observaciones</label>
                                <div class="text-left md:text-right"><span><?php if($ver->eobservaciones == null){ echo "No hay datos"; }else{echo "{$ver->eobservaciones}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Curp</label>
                                <div class="text-left md:text-right"><span><?php if($ver->ecurp == null){ echo "No hay datos"; }else{echo "{$ver->ecurp}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de seguro social</label>
                                <div class="text-left md:text-right"><span><?php if($ver->enss == null){ echo "No hay datos"; }else{echo "{$ver->enss}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                                <div class="text-left md:text-right"><span><?php if($ver->erfc == null){ echo "No hay datos"; }else{echo "{$ver->erfc}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de identificación</label>
                                <div class="text-left md:text-right"><span><?php if($ver->etipo_identificacion == null){echo "No hay datos";}else{ $tidentificacion=ucfirst(strtolower($ver->etipo_identificacion)); echo "{$tidentificacion}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de identificación</label>
                                <div class="text-left md:text-right"><span><?php if($ver->enum_identificacion == null){ echo "No hay datos"; }else{echo "{$ver->enum_identificacion}";} ?></span></div>
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
                                <div class="text-left md:text-right"><span><?php if($ver->ecapacitacion == null){ echo "No hay datos"; }else{echo "{$ver->ecapacitacion}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Uniformes</label>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de entrega de uniforme</label>
                                <div class="text-left md:text-right"><span><?php if($ver->efecha_enuniforme == null){ echo "No hay datos"; }else{echo "{$ver->efecha_enuniforme}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cantidad (camisa)</label>
                                <div class="text-left md:text-right"><span><?php if($ver->ecantidad_polo == null){ echo "No hay datos"; }else{echo "{$ver->ecantidad_polo}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla (camisa)</label>
                                <div class="text-left md:text-right"><span><?php if($ver->etalla_polo == null){ echo "No hay datos"; }else{echo "{$ver->etalla_polo}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Contactos de emergencia</label>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo1</label>
                                <div class="text-left md:text-right"><span><?php if($ver->eemergencia_nombre == null){ echo "No hay datos"; }else{echo "{$ver->eemergencia_nombre}";} ?></span></div>
                            </div>							
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parentesco1</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eemergencia_parentesco == null){ echo "No hay datos"; }else{echo "{$ver -> eemergencia_parentesco}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono2</label>
                                <div class="text-left md:text-right"><span><?php if($ver->eemergencia_telefono == null){ echo "No hay datos"; }else{echo "{$ver->eemergencia_telefono}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo2</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eemergencia_nombre2 == null){ echo "No hay datos"; }else{echo "{$ver -> eemergencia_nombre2}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parentesco2</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eemergencia_parentesco2 == null){ echo "No hay datos"; }else{echo "{$ver -> eemergencia_parentesco2}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono2</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eemergencia_telefono2 == null){ echo "No hay datos"; }else{echo "{$ver -> eemergencia_telefono2}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Otros datos</label>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Resultado antidoping</label>
                                <div class="text-left md:text-right"><span><?php if($ver->eresultado_antidoping == null){ echo "No hay datos"; }else{echo "{$ver->eresultado_antidoping}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cómo se entero de la vacante?</label>
                                <div class="text-left md:text-right"><span><?php if($ver->evacante == null){ echo "No hay datos"; }else{echo "{$ver->evacante}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tiene familiares dentro de la empresa?</label>
                                <div class="text-left md:text-right"><span><?php if($ver->efam_dentro_empresa == null){ echo "No hay datos"; }else{echo "{$ver->efam_dentro_empresa}";} ?></span></div>
                            </div>
							<?php if($ver->efam_nombre != null){ ?>
								<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
									<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo del familiar</label>
									<div class="text-left md:text-right"><span><?php if($ver->efam_nombre == null){ echo "No hay datos"; }else{echo "{$ver->efam_nombre}";} ?></span></div>
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
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Beneficiarios bancarios</label>
                            </div>    
                            <div id="ref">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
	                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta bancaria personal</label>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Banco personal</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> ebanco_personal == null){ echo "No hay datos"; }else{echo "{$ver -> ebanco_personal}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta personal</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> ecuenta_personal == null){ echo "No hay datos"; }else{echo "{$ver -> ecuenta_personal}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clabe personal</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eclabe_personal == null){ echo "No hay datos"; }else{echo "{$ver -> eclabe_personal}";} ?></span></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
	                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta bancaria nomina</label>
                            </div>						
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Banco nómina</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> ebanco_nomina == null){ echo "No hay datos"; }else{echo "{$ver -> ebanco_nomina}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta nómina</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> ecuenta_nomina == null){ echo "No hay datos"; }else{echo "{$ver -> ecuenta_nomina}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clabe nómina</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eclabe_nomina == null){ echo "No hay datos"; }else{echo "{$ver -> eclabe_nomina}";} ?></span></div>
                            </div>	
							<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Plastico asignado</label>
                                <div class="text-left md:text-right"><span><?php if($ver -> eplastico == null){ echo "No hay datos"; }else{echo "{$ver -> eplastico}";} ?></span></div>
                            </div>
							<div class="grid grid-cols-1 mt-5 mx-7">
								<div class="flex justify-center sm:justify-end gap-3">
									<button type="button" id="anterior2" name="anterior2" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
									<button type="button" id="siguiente3" name="siguiente3" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
								</div>
							</div>
						</div>
						<div id='fourth' class='hidden p-4'>
                        <?php for ($i = 0; $i < count($array3); $i++) { 
                                $historial_expedientes = $object -> _db -> prepare("SELECT * FROM historial_papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
                                $historial_expedientes -> execute(array(':expedienteid' => $Verid, ':tipo' => $array3[$i]["id"]));
                                $count_historial = $historial_expedientes -> rowCount();    
                        ?>
                            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"><?php print ($array3[$i]['nombre']); ?></label>
                                <?php 
                                    $filepath = "../src/pdfs_uploaded/"; 
                                    if(is_file($filepath.$array3[$i]["identificador"])){ 
                                ?>
                                <div class = 'text-left md:text-right'>
                                    <a class='text-blue-600 hover:border-b-2 hover:border-blue-600 cursor-pointer' onclick='javascript:window.open("<?php print ($filepath.$array3[$i]["identificador"]); ?>", "_blank")'>
                                        <?php print ($array3[$i]['nombre_archivo']); ?>
                                    </a>
                                </div>
                                <?php 
                                    }else{ 
                                ?> 
                                        <div class='text-left md:text-right'>
                                            <span>
                                                No se encontró el archivo en la base de datos
                                            </span>
                                        </div>  
                                    <?php 
                                    } 
                                    if($count_historial > 0){
                                    ?>
                                        <br>
                                        <div class="text-left md:text-right">
                                            <a class="text-blue-600 hover:border-b-2 hover:border-blue-600" href="ver_historial.php?tipo_papeleria=<?php print ($array3[$i]['id']); ?>">
                                                Ver historial...
                                            </a>
                                        </div>							
                                    <?php 
                                    }
                                    ?>
                            </div>
                        <?php } ?>
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