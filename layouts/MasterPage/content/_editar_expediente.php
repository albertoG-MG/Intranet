<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-center">
        <div class="grid w-11/12 md:w-9/12">
            <h3 class="text-gray-700 text-3xl font-medium">Editar Expedientes</h3>
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

                            <a href="editar_expediente.php?idExpediente=<?php echo $Editarid ?>" class="flex items-center text-blue-600 -px-2 hover:underline">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M22,4H14V7H10V4H2A2,2 0 0,0 0,6V20A2,2 0 0,0 2,22H22A2,2 0 0,0 24,20V6A2,2 0 0,0 22,4M8,9A2,2 0 0,1 10,11A2,2 0 0,1 8,13A2,2 0 0,1 6,11A2,2 0 0,1 8,9M12,17H4V16C4,14.67 6.67,14 8,14C9.33,14 12,14.67 12,16V17M20,18H14V16H20V18M20,14H14V12H20V14M20,10H14V8H20V10M13,6H11V2H13V6Z" />
                                </svg>

                                <span class="mx-2">Editar Expedientes</span>
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
                            <div id='first' class='p-4'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Vincular usuario al expediente</label>
                                    <div class="group flex" id="selectprueba" style="display:none !important;">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <select id="prueba" name="prueba">
                                            <option></option>
                                            <?php
                                            $arr = array();
                                            $checkexpuser = $object -> _db -> prepare("SELECT usuarios.id FROM expedientes INNER JOIN usuarios ON expedientes.users_id=usuarios.id WHERE expedientes.id!=:expedienteid"); 
                                            $checkexpuser -> bindParam('expedienteid', $Editarid, PDO::PARAM_INT); 
                                            $checkexpuser -> execute();
                                            while ($fetchuserexp = $checkexpuser->fetch(PDO::FETCH_OBJ)){
                                                $arr[] = $fetchuserexp->id;
                                            }
                                            $usuarios = user::FetchUsuarios();
                                            foreach ($usuarios as $row) {
                                                if(!in_array($row->id, $arr))
                                                {
                                                    echo "<option value='" . $row->id . "'";
                                                    if($row->id == $edit->userid){ echo 'selected';}
                                                    echo ">";
                                                    echo "$row->nombre $row->apellido_pat $row->apellido_mat";
                                                    echo "</option>";
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
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="numempleado" name="numempleado" value="<?php echo "{$edit->enum_empleado}"; ?>" placeholder="Input 1">
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
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="puesto" name="puesto" value="<?php echo "{$edit->epuesto}"; ?>" placeholder="Input 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nivel de estudios</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-school text-gray-400 text-lg"></i></div>
                                        <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="estudios" name="estudios">
                                            <option value="">--Selecciona--</option>
                                            <option value="PRIMARIA" <?php if ($edit->eestudios == "PRIMARIA") echo 'selected="selected"'; ?>>Primaria</option>
                                            <option value="SECUNDARIA" <?php if ($edit->eestudios == "SECUNDARIA") echo 'selected="selected"'; ?>>Secundaria</option>
                                            <option value="BACHILLERATO" <?php if ($edit->eestudios == "BACHILLERATO") echo 'selected="selected"'; ?>>Bachillerato</option>
                                            <option value="CARRERA TECNICA" <?php if ($edit->eestudios == "CARRERA TECNICA") echo 'selected="selected"'; ?>>Carrera técnica</option>
                                            <option value="LICENCIATURA" <?php if ($edit->eestudios == "LICENCIATURA") echo 'selected="selected"'; ?>>Licenciatura</option>
                                            <option value="ESPECIALIDAD" <?php if ($edit->eestudios == "ESPECIALIDAD") echo 'selected="selected"'; ?>>Especialidad</option>
                                            <option value="MAESTRIA" <?php if ($edit->eestudios == "MAESTRIA") echo 'selected="selected"'; ?>>Maestría</option>
                                            <option value="DOCTORADO" <?php if ($edit->eestudios == "DOCTORADO") echo 'selected="selected"'; ?>>Doctorado</option>
                                        </select>
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
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="calle" name="calle" value="<?php echo "{$edit->ecalle}"; ?>" placeholder="Input 4">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número interior</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="ninterior" name="ninterior" value="<?php echo "{$edit->enum_interior}"; ?>" placeholder="Input 5">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número exterior</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="nexterior" name="nexterior" value="<?php echo "{$edit->enum_exterior}"; ?>" placeholder="Input 6">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Colonia</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-map-marker text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="colonia" name="colonia" value="<?php echo "{$edit->ecolonia}"; ?>" placeholder="Input 7">
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
                                                    <option value="<?php echo $contestado; ?>" <?php if ($contestado == $edit->eestado) echo 'selected="selected"'; ?>><?php echo $r->nombre; ?></option>
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
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código postal</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="codigo" name="codigo" value="<?php echo "{$edit->ecodigo}"; ?>" placeholder="Input 8">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono de domicilio</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-phone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="teldom" name="teldom" value="<?php echo "{$edit->etel_dom}"; ?>" placeholder="Input 9">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono móvil</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="telmov" name="telmov" value="<?php echo "{$edit->etel_mov}"; ?>" placeholder="Input 10">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Casa propia?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-1" type="radio" name="casa" value="si" <?= ($edit->ecasa_propia == 'si') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1">
                                        <label for="option-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-2" type="radio" name="casa" value="no" <?= ($edit->ecasa_propia == 'no') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
                                        <label for="option-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">DATOS RELEVANTES DEL USUARIO</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de nacimiento</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechanac" name="fechanac" value="<?php echo "{$edit->efecha_nacimiento}"; ?>">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de inicio de contrato</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechacon" name="fechacon" value="<?php echo "{$edit->efecha_inicioc}"; ?>">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de alta</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechaalta" name="fechaalta" value="<?php echo "{$edit->efecha_alta}"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Observaciones</label>
                                    <textarea class="w-full rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="observaciones" name="observaciones" placeholder="Input 11"><?php echo "{$edit->eobservaciones}"; ?></textarea>
                                </div>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Curp</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-format-list-numbered text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="curp" name="curp" value="<?php echo "{$edit->ecurp}"; ?>" placeholder="Input 12">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de seguro social</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="nss" name="nss" value="<?php echo "{$edit->enss}"; ?>" placeholder="Input 13">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">RFC</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-file-document-edit-outline text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="rfc" name="rfc" value="<?php echo "{$edit->erfc}"; ?>" placeholder="Input 14">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de identificación</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-card-account-details-outline text-gray-400 text-lg"></i></div>
                                        <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="identificacion" name="identificacion">
                                            <option value="">--Selecciona--</option>
                                            <option value="INE" <?php if ($edit->etipo_identificacion == 'INE') echo 'selected="selected"'; ?>>INE</option>
                                            <option value="PASAPORTE" <?php if ($edit->etipo_identificacion == 'PASAPORTE') echo 'selected="selected"'; ?>>PASAPORTE</option>
                                            <option value="CEDULA" <?php if ($edit->etipo_identificacion == 'CEDULA') echo 'selected="selected"'; ?>>CEDULA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de identificación</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="numeroidentificacion" name="numeroidentificacion" value="<?php echo "{$edit->enum_identificacion}"; ?>" placeholder="Input 15">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <div class="flex justify-center sm:justify-end">
                                        <button type="button" id="siguiente" name="siguiente" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                            <div id='second' class='hidden p-4'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de referencias laborales</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="reflab" name="reflab" oninput="AgregarReferencias()" maxlength="1" value="<?php if($cont_referencias != 0){ echo "{$cont_referencias}";} ?>" placeholder="Input 16">
                                    </div>
                                </div>
                                <div id="referencias">
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Capacitación</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-hard-hat text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="capacitacion" name="capacitacion" value="<?php echo "{$edit->ecapacitacion}"; ?>" placeholder="Input 17">
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
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechauniforme" name="fechauniforme" value="<?php echo "{$edit->efecha_enuniforme}"; ?>" placeholder="Input 18">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cantidad (camisa)</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-tshirt-crew text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="cantidadpolo" name="cantidadpolo" value="<?php echo "{$edit->ecantidad_polo}"; ?>" placeholder="Input 19">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Talla (camisa)</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-tshirt-crew text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="tallapolo" name="tallapolo" value="<?php echo "{$edit->etalla_polo}"; ?>" placeholder="Input 20">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">CONTACTO DE EMERGENCIA</label>
                                    <hr>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergencianom" name="emergencianom" value="<?php echo "{$edit->eemergencia_nombre}"; ?>" placeholder="Input 21">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciatel" name="emergenciatel" value="<?php echo "{$edit->eemergencia_telefono}"; ?>" placeholder="Input 22">
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
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="antidoping" name="antidoping" value="<?php echo "{$edit->eresultado_antidoping}"; ?>" placeholder="Input 23">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cómo se entero de la vacante?</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-hard-hat text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="vacante" name="vacante" value="<?php echo "{$edit->evacante}"; ?>" placeholder="Input 24">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tiene familiares dentro de la empresa?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-1" type="radio" name="empresa" value="si" <?= ($edit->efam_dentro_empresa == 'si') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1">
                                        <label for="option-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-2" type="radio" name="empresa" value="no" <?= ($edit->efam_dentro_empresa == 'no') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
                                        <label for="option-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                        No
                                        </label>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7" id="famnom">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo del familiar</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="nomfam" name="nomfam" <?php if ($edit->efam_nombre != null) echo "value='$edit->efam_nombre'"; ?> placeholder="Input 25">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <div class="flex justify-center sm:justify-end gap-3">
                                        <button type="button" id="anterior" name="anterior" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
                                        <button type="button" id="siguiente2" name="siguiente2" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Siguiente</button>
                                    </div>
                                </div>           
                            </div>
                            <div id='third' class='hidden p-4'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de referencias bancarias</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="refban" name="refban" oninput="AgregarBanco()" value="<?php if($cont_datos != 0){ echo "{$cont_datos}";} ?>" maxlength="1" value="" placeholder="Input 26">
                                    </div>
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
                                            <?php for ($contador_array3 = 0; $contador_array3 < count($array3); $contador_array3++) { 
												if($array3[$contador_array3]["nombre"] == "CURRICULUM Y/O SOLICITUD"){
											?>
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>1</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Curriculum y/o solicitud</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_curriculum" class="inline-block px-6 py-2 border-2 border-purple-600 cursor-pointer text-purple-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_curriculum" id="infp_curriculum" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "EVALUACION PSICOMETRICA"){
                                            ?>
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>2</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Evaluación psicométrica</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_evaluacion" class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 cursor-pointer font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text2"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_evaluacion" id="infp_evaluacion" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "COPIA ACTA DE NACIMIENTO"){
                                            ?>
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>3</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Copia acta de nacimiento</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_nacimiento" class="inline-block px-6 py-2 border-2 border-green-500 text-green-500 cursor-pointer font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text3"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_nacimiento" id="infp_nacimiento" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "CURP"){
                                            ?>
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>4</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Curp</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_curp" class="inline-block px-6 py-2 border-2 border-yellow-500 cursor-pointer text-yellow-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text4"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_curp" id="infp_curp" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "IDENTIFICACION OFICIAL"){
                                            ?>
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>5</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Identificación oficial</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_identificacion" class="inline-block px-6 py-2 border-2 border-blue-600 cursor-pointer text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text5"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_identificacion" id="infp_identificacion" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "COMPROBANTE DE DOMICILIO"){
                                            ?>
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>6</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Comprobante de domicilio</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_comprobante" class="inline-block px-6 py-2 border-2 border-gray-800 cursor-pointer text-gray-800 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text6"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_comprobante" id="infp_comprobante" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "RFC"){
                                            ?>
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>7</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>RFC</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_rfc" class="inline-block px-6 py-2 border-2 border-purple-600 cursor-pointer text-purple-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text7"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_rfc" id="infp_rfc" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "CARTA DE RECOMENDACION LABORAL"){
                                            ?>
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>8</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Carta de recomendación laboral</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_cartal" class="inline-block px-6 py-2 border-2 border-red-600 cursor-pointer text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text8"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_cartal" id="infp_cartal" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "CARTA DE RECOMENDACION PERSONAL"){
                                            ?>
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>9</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Carta de recomendación personal</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_cartap" class="inline-block px-6 py-2 border-2 border-green-500 cursor-pointer text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text9"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_cartap" id="infp_cartap" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "AVISO DE RETENCION CREDITO INFONAVIT"){
                                            ?>
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>10</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Aviso de retención crédito infonavit</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_retencion" class="inline-block px-6 py-2 border-2 border-yellow-500 cursor-pointer text-yellow-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text10"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_retencion" id="infp_retencion" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "CARTA DE SEGUNDO TRABAJO"){
                                            ?>
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>11</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Carta de segundo trabajo</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_strabajo" class="inline-block px-6 py-2 border-2 border-blue-600 cursor-pointer text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text11"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_strabajo" id="infp_strabajo" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "ALTA DE IMSS"){
                                            ?>
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>12</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Alta del IMSS</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_imss" class="inline-block px-6 py-2 border-2 border-gray-800 cursor-pointer text-gray-800 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text12"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_imss" id="infp_imss" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            } 
                                                if($array3[$contador_array3]["nombre"] == "CONTRATO NOMINA BANCARIA"){
                                            ?>
                                            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p>13</p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p>Contrato nomina bancaria</p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <label for="infp_nomina" class="inline-block px-6 py-2 border-2 border-purple-600 cursor-pointer text-purple-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                    <p>Subir archivo</p>
                                                    </label>
                                                    <p id="file-text13"><?php if($array3[$contador_array3]["nombre_archivo"] != null){ echo $array3[$contador_array3]["nombre_archivo"]; }else { echo "No hay ningún archivo seleccionado";} ?></p>
                                                    <input class="hidden" name="infp_nomina" id="infp_nomina" type="file" />
                                                </td>
                                            </tr>
                                            <?php
                                            continue; 
                                            }
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <div class="flex justify-center sm:justify-end gap-3">
                                        <button type="button" id="anterior3" name="anterior3" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Anterior</button>
                                        <button type="submit" id="finish" name="finish" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Guardar</button>
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