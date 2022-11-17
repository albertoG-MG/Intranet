<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-center">
        <div class="grid w-11/12 md:w-9/12">
            <h3 class="text-gray-700 text-3xl font-medium">Crear expedientes</h3>
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

                            <a href="crear_expediente.php" class="flex items-center text-blue-600 -px-2 hover:underline">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M22,4H14V7H10V4H2A2,2 0 0,0 0,6V20A2,2 0 0,0 2,22H22A2,2 0 0,0 24,20V6A2,2 0 0,0 22,4M8,9A2,2 0 0,1 10,11A2,2 0 0,1 8,13A2,2 0 0,1 6,11A2,2 0 0,1 8,9M12,17H4V16C4,14.67 6.67,14 8,14C9.33,14 12,14.67 12,16V17M20,18H14V16H20V18M20,14H14V12H20V14M20,10H14V8H20V10M13,6H11V2H13V6Z" />
                                </svg>

                                <span class="mx-2">Crear Expedientes</span>
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
                    <ul id='tabs' class='flex flex-col items-center sm:flex-row w-full px-11 pt-2 '>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 border-blue-400 rounded-t opacity-50'><a id='default-tab' class='active' href='#first'>Datos generales</a></li>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 rounded-t opacity-50'><a href='#second'>Datos adicionales</a></li>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 rounded-t opacity-50'><a href='#third'>Datos bancarios</a></li>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 rounded-t opacity-50'><a href='#fourth'>Documentos necesarios</a></li>
                    </ul>
                    <form id="Guardar" method="post">
                        <div id='tab-contents'>
                            <div id='first' class='p-4 tab-pane'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Vincular usuario al expediente</label>
                                    <div class="group flex" id="selectprueba" style="display:none !important; position:relative;">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <select id="prueba" name="prueba">
                                            <option></option>
                                            <?php
                                            $arr = array();
                                            $checkexpuser = $object -> _db -> prepare("SELECT usuarios.id FROM expedientes INNER JOIN usuarios ON expedientes.users_id=usuarios.id"); 
                                            $checkexpuser -> execute();
                                            while ($fetchuserexp = $checkexpuser->fetch(PDO::FETCH_OBJ)){
                                                $arr[] = $fetchuserexp->id;
                                            }
                                            $usuarios = user::FetchUsuarios();
                                            foreach ($usuarios as $row) {
                                                if($row->rolnom != "Superadministrador" && $row->rolnom != "Administrador")
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
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de empleado</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="numempleado" name="numempleado" placeholder="Input 1">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-box-multiple text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 bg-gray-200 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="departamento" name="departamento" placeholder="Input 2" readonly>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Puesto</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-hard-hat text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="puesto" name="puesto" placeholder="Input 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nivel de estudios</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-school text-gray-400 text-lg"></i></div>
                                        <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="estudios" name="estudios">
                                            <option value="">--Selecciona--</option>
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
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Posee correo electrónico personal?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-correo-personal-1" type="radio" name="posee_correo" value="si" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-correo-personal-1" aria-describedby="option-correo-personal-1" checked="">
                                        <label for="option-correo-personal-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-correo-personal-2" type="radio" name="posee_correo" value="no" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-correo-personal-2" aria-describedby="option-correo-personal-2">
                                        <label for="option-correo-personal-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>     
                                <div id="div_correo_electrónico">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="correo_personal" name="correo_personal" placeholder="Input">
                                    </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Datos de ubicación</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Calle</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-map-marker text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="calle" name="calle" placeholder="Input 4">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número interior</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="ninterior" name="ninterior" placeholder="Input 5">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número exterior</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="nexterior" name="nexterior" placeholder="Input 6">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-map-marker text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="colonia" name="colonia" placeholder="Input 7">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-map-marker text-gray-400 text-lg"></i></div>
                                            <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="estado" name="estado">
                                                <option value="">--Selecciona--</option>
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
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Municipio</label>
                                        <div class="group flex" id="imunicipio">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-map-marker text-gray-400 text-lg"></i></div>
                                            <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="municipio" name="municipio">
                                                <option value="">--Selecciona un estado--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código postal</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="codigo" name="codigo" placeholder="Input 8">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono de domicilio</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-phone text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="teldom" name="teldom" placeholder="Input 9">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Posee teléfono propio?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-telmov-1" type="radio" name="tel_movil" value="si" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                        <label for="option-telmov-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-telmov-2" type="radio" name="tel_movil" value="no" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
                                        <label for="option-telmov-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>
                                <div id="div_movil">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono móvil propio</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="telmov" name="telmov" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono asignado por la empresa?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-telempresa-1" type="radio" name="tel_movil_empresa" value="si" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                        <label for="option-telempresa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-telempresa-2" type="radio" name="tel_movil_empresa" value="no" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
                                        <label for="option-telempresa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>
                                <div id="div_movil_empresa">
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Marcación corta</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="marcacion" name="marcacion" placeholder="Input">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de serie</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="serie" name="serie" placeholder="Input">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">SIM</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="sim" name="sim" placeholder="Input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de red</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="numred" name="numred" placeholder="Input">
                                            </div>
                                        </div>							
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Modelo</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-alphabetical-variant text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="modelotel" name="modelotel" placeholder="Input">
                                            </div>
                                        </div>				
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Marca</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-alphabetical-variant text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="marcatel" name="marcatel" placeholder="Input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">IMEI</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="imei" name="imei" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Laptop asignado por la empresa?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-laptop-1" type="radio" name="laptop_empresa" value="si" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-laptop-1" aria-describedby="option-laptop-1" checked="">
                                        <label for="option-laptop-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-laptop-2" type="radio" name="laptop_empresa" value="no" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-laptop-2" aria-describedby="option-laptop-2">
                                        <label for="option-laptop-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>
                                <div id="div_laptop_empresa">
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Marca de la laptop</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-laptop text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="marca_laptop" name="marca_laptop" placeholder="Input">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Modelo de la laptop</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-magnify text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="modelo_laptop" name="modelo_laptop" placeholder="Input">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Serie de la laptop</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="serie_laptop" name="serie_laptop" placeholder="Input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Casa propia?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-casa-1" type="radio" name="casa" value="si" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                        <label for="option-casa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-casa-2" type="radio" name="casa" value="no" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
                                        <label for="option-casa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">DATOS RELEVANTES DEL USUARIO</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado civil</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-ring text-gray-400 text-lg"></i></div>
                                        <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="ecivil" name="ecivil">
                                            <option value="">--Selecciona--</option>
                                            <option value="SOLTERO">Soltero</option>
                                            <option value="CASADO">Casado</option>
                                            <option value="DIVORCIADO">Divorciado</option>
                                            <option value="UNION LIBRE">Unión libre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Posee retención?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-retencion-1" type="radio" name="retencion" value="si" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                        <label for="option-retencion-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-retencion-2" type="radio" name="retencion" value="no" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
                                        <label for="option-retencion-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>
                                <div id="div_retencion">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Monto mensual</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-currency-usd text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="monto_mensual" name="monto_mensual" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de nacimiento</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechanac" name="fechanac">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de inicio de contrato</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechacon" name="fechacon">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de alta</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechaalta" name="fechaalta">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Salario - Inicio de contrato</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-currency-usd text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="salario_contrato" name="salario_contrato" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Salario - Fecha de alta</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-currency-usd text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="salario_fechaalta" name="salario_fechaalta" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Observaciones</label>
                                    <textarea class="w-full rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="observaciones" name="observaciones" placeholder="Input 11"></textarea>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Curp</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-format-list-numbered text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="curp" name="curp" placeholder="Input 12">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de seguro social</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="nss" name="nss" placeholder="Input 13">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-file-document-edit-outline text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="rfc" name="rfc" placeholder="Input 14">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de identificación</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-card-account-details-outline text-gray-400 text-lg"></i></div>
                                        <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="identificacion" name="identificacion">
                                            <option value="">--Selecciona--</option>
                                            <option value="INE">INE</option>
                                            <option value="PASAPORTE">PASAPORTE</option>
                                            <option value="CEDULA">CEDULA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de identificación</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="numeroidentificacion" name="numeroidentificacion" placeholder="Input 15">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <div class="flex justify-center sm:justify-end">
                                        <button type="button" id="siguiente" name="siguiente" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                            <div id='second' class='hidden p-4 tab-pane'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de referencias laborales</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="reflab" name="reflab" oninput="AgregarReferencias()" maxlength="1" value="" placeholder="Input 16">
                                    </div>
                                </div>
                                <div id="referencias">
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Capacitación</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-hard-hat text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="capacitacion" name="capacitacion" placeholder="Input 17">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">UNIFORMES</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de entrega de uniforme</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-blank text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechauniforme" name="fechauniforme" placeholder="Input 18">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cantidad (camisa)</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-tshirt-crew text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="cantidadpolo" name="cantidadpolo" placeholder="Input 19">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla (camisa)</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-tshirt-crew text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="tallapolo" name="tallapolo" placeholder="Input 20">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CONTACTOS DE EMERGENCIA</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo1</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergencianom" name="emergencianom" placeholder="Input 21">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parentesco1</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-group text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciaparentesco" name="emergenciaparentesco" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono1</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciatel" name="emergenciatel" placeholder="Input 22">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo2</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergencianom2" name="emergencianom2" placeholder="Input 21">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parentesco2</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-group text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciaparentesco2" name="emergenciaparentesco2" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono2</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciatel2" name="emergenciatel2" placeholder="Input 22">
                                        </div>
                                    </div>
                                </div>    
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">OTROS DATOS</label>
                                        <hr>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Resultado antidoping</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-hospital-box text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="antidoping" name="antidoping" placeholder="Input 23">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cómo se entero de la vacante?</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-hard-hat text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="vacante" name="vacante" placeholder="Input 24">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tiene familiares dentro de la empresa?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-empresa-1" type="radio" name="empresa" value="si" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                        <label for="option-empresa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-empresa-2" type="radio" name="empresa" value="no" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
                                        <label for="option-empresa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7" id="famnom">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo del familiar</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="nomfam" name="nomfam" placeholder="Input 25">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <div class="flex justify-center sm:justify-end gap-3">
                                        <button type="button" id="anterior" name="anterior" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
                                        <button type="button" id="siguiente2" name="siguiente2" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
                                    </div>
                                </div>           
                            </div>
                            <div id='third' class='hidden p-4 tab-pane'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de beneficiarios bancarios</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="refban" name="refban" oninput="AgregarBanco()" maxlength="1" value="" placeholder="Input 26">
                                    </div>
                                </div>
                                <div id="ref">
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CUENTA BANCARIA PERSONAL</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Banco</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-bank text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="banco_personal" name="banco_personal" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="cuenta_personal" name="cuenta_personal" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clabe</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="clabe_personal" name="clabe_personal" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CUENTA BANCARIA NOMINA</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Banco</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-bank text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="banco_nomina" name="banco_nomina" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="cuenta_nomina" name="cuenta_nomina" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clabe</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="clabe_nomina" name="clabe_nomina" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 lg:col-span-3">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Plástico asignado</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-piggy-bank-outline text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="plastico" name="plastico" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <div class="flex justify-center sm:justify-end gap-3">
                                        <button type="button" id="anterior2" name="anterior2" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
                                        <button type="button" id="siguiente3" name="siguiente3" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                            <div id='fourth' class='hidden p-4 tab-pane'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <table class="min-w-full border-collapse block md:table">
                                        <thead class="block md:table-header-group">
                                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">id</th>
                                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody class="block md:table-row-group">
                                        <?php while($fetchtipopapeleria = $checktipospapeleria -> fetch(PDO::FETCH_OBJ)){ ?>
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p><?php echo $fetchtipopapeleria->id; ?></p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p><?php echo ucfirst(strtolower($fetchtipopapeleria->nombre)); ?></p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <div class="flex flex-col w-full justify-center">
                                                        <div id="upload-button<?php echo $fetchtipopapeleria->id ?>" class="inline-flex self-start items-center px-6 py-2 border-2 <?php print($arrayColors[$colorscont]['border']); ?> cursor-pointer <?php print($arrayColors[$colorscont]['text']); ?> font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                            Subir archivo
                                                        </div>
                                                        <div class="flex-1 md:flex items-center justify-between">
                                                            <span id="upload-text<?php echo $fetchtipopapeleria->id ?>">No hay ningún archivo seleccionado</span>
                                                            <button type="button" id="upload-delete<?php echo $fetchtipopapeleria->id ?>" class="hidden">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512"><path
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
                                            $colorscont++;
                                            if($colorscont>=count($arrayColors)){
                                                $colorscont = 0;
                                            }
                                        } 
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <div class="flex justify-center sm:justify-end gap-3">
                                        <button type="button" id="anterior3" name="anterior3" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
                                        <div id="submit-button">
                                            <button type="submit" id="finish" name="finish" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Guardar</button>
                                        </div>    
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