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
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 border-blue-400 rounded-t opacity-50'><a id='default-tab' href='#first'>Datos generales</a></li>
                        <li class='px-4 py-2 font-semibold text-gray-800 border-b-4 rounded-t opacity-50'><a href='#second'>Datos adicionales</a></li>
                    </ul>
                    <form id="Guardar" method="post">
                        <div id='tab-contents'>
                            <div id='first' class='p-4'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Vincular usuario al expediente</label>
                                    <div class="group flex" id="selectprueba" style="display:none !important;">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <select id="prueba">
                                            <option></option>
                                            <?php
                                            $usuarios = user::FetchUsuarios();
                                            foreach ($usuarios as $row) {
                                                echo "<option value='" . $row->id . "'>";
                                                echo "$row->nombre $row->apellido_pat $row->apellido_mat";
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
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
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Datos de ubicación</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
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
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
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
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código postal</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="codigo" name="codigo" placeholder="Input 8">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono de domicilio</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-phone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="teldom" name="teldom" placeholder="Input 9">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono móvil</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="telmov" name="telmov" placeholder="Input 10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id='second' class='hidden p-4'>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>