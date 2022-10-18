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
                            <div id='first' class='p-4 tab-pane'>
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
                                                if($row->rolnom != "Superadministrador" && $row->rolnom != "Administrador")
                                                {
                                                    if(!in_array($row->id, $arr))
                                                    {
                                                        echo "<option value='" . $row->id . "'";
                                                        if($row->id == $edit->userid){ echo 'selected';}
                                                        echo ">";
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
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Situación del empleado</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-clock text-gray-400 text-lg"></i></div>
                                        <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="situacion" name="situacion">
                                            <option value="ACTIVO" <?php if($edit -> esituacion_del_empleado == "ACTIVO"){ echo "selected"; }?>>Activo</option>
                                            <option value="INACTIVO" <?php if($edit -> esituacion_del_empleado == "INACTIVO"){ echo "selected"; }?>>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estatus del empleado</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-search text-gray-400 text-lg"></i></div>
                                        <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="estatus_empleado" name="estatus_empleado">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha de estatus</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fecha_estatus" name="fecha_estatus" value="<?php echo "{$edit->eestatus_fecha}"; ?>">
                                    </div>
                                </div>
                                <div id="div_estatus_motivo" class="hidden">
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Motivo del estatus</label>
                                        <textarea class="w-full rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="estatus_motivo" name="estatus_motivo" placeholder="Ingrese el motivo"><?php if(!(is_null($edit -> emotivo))){ echo $edit->emotivo; }?></textarea>
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
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Código postal</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="codigo" name="codigo" value="<?php echo "{$edit -> ecodigo}"; ?>" placeholder="Input 8">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono de domicilio</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-phone text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="teldom" name="teldom" value="<?php echo "{$edit -> etel_dom}"; ?>" placeholder="Input 9">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Posee teléfono propio?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-telmov-1" type="radio" name="tel_movil" value="si" <?= ($edit->eposee_telmov == 'si') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                        <label for="option-telmov-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-telmov-2" type="radio" name="tel_movil" value="no" <?= ($edit->eposee_telmov == 'no') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
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
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="telmov" name="telmov" value="<?php echo "{$edit -> etel_mov}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono asignado por la empresa?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-telempresa-1" type="radio" name="tel_movil_empresa" value="si" <?= ($edit->eposee_telempresa == 'si') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                        <label for="option-telempresa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-telempresa-2" type="radio" name="tel_movil_empresa" value="no" <?= ($edit->eposee_telempresa == 'no') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
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
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="marcacion" name="marcacion" value="<?php echo "{$edit -> emarcacion}"; ?>" placeholder="Input">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de serie</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-phone text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="serie" name="serie" value="<?php echo "{$edit -> eserie}"; ?>" placeholder="Input">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">SIM</label>
                                            <div class="group flex">
                                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="sim" name="sim" value="<?php echo "{$edit -> esim}"; ?>" placeholder="Input">
                                            </div>
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
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado civil</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-ring text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="ecivil" name="ecivil" value="<?php echo "{$edit -> eecivil}"; ?>" placeholder="Input">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Posee retención?</label>
                                    <div class="group flex mt-3 items-center">
                                        <input id="option-retencion-1" type="radio" name="retencion" value="si" <?= ($edit->eposee_retencion == 'si') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                        <label for="option-retencion-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                        Sí
                                        </label>
                                        <input id="option-retencion-2" type="radio" name="retencion" value="no" <?= ($edit->eposee_retencion == 'no') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-2" aria-describedby="option-2">
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
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="monto_mensual" name="monto_mensual" value="<?php echo "{$edit -> emonto_mensual}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
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
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Salario - Inicio de contrato</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-currency-usd text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="salario_contrato" name="salario_contrato" value="<?php echo "{$edit -> esalario_contrato}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Salario - Fecha de alta</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-currency-usd text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="salario_fechaalta" name="salario_fechaalta" value="<?php echo "{$edit -> esalario_fechaalta}"; ?>" placeholder="Input">
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
                            <div id='second' class='hidden p-4 tab-pane'>
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
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo1</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergencianom" name="emergencianom" value="<?php echo "{$edit -> eemergencia_nombre}"; ?>" placeholder="Input 21">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parentesco1</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-group text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciaparentesco" name="emergenciaparentesco" value="<?php echo "{$edit -> eemergencia_parentesco}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono1</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciatel" name="emergenciatel" value="<?php echo "{$edit -> eemergencia_telefono}"; ?>" placeholder="Input 22">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre completo2</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergencianom2" name="emergencianom2" value="<?php echo "{$edit -> eemergencia_nombre2}"; ?>" placeholder="Input 21">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Parentesco2</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-group text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciaparentesco2" name="emergenciaparentesco2" value="<?php echo "{$edit -> eemergencia_parentesco2}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Teléfono2</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-cellphone text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="emergenciatel2" name="emergenciatel2" value="<?php echo "{$edit -> eemergencia_telefono2}"; ?>" placeholder="Input 22">
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
                            <div id='third' class='hidden p-4 tab-pane'>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Número de beneficiarios bancarios</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                        <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="refban" name="refban" oninput="AgregarBanco()" value="<?php if($cont_datos != 0){ echo "{$cont_datos}";} ?>" maxlength="1" value="" placeholder="Input 26">
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
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="banco_personal" name="banco_personal" value="<?php echo "{$edit -> ebanco_personal}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="cuenta_personal" name="cuenta_personal" value="<?php echo "{$edit -> ecuenta_personal}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clabe</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="clabe_personal" name="clabe_personal" value="<?php echo "{$edit -> eclabe_personal}"; ?>" placeholder="Input">
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
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="banco_nomina" name="banco_nomina" value="<?php echo "{$edit -> ebanco_nomina}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cuenta</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="cuenta_nomina" name="cuenta_nomina" value="<?php echo "{$edit -> ecuenta_nomina}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Clabe</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-numeric text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="clabe_nomina" name="clabe_nomina" value="<?php echo "{$edit -> eclabe_nomina}"; ?>" placeholder="Input">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 lg:col-span-3">
                                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Plástico asignado</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-piggy-bank-outline text-gray-400 text-lg"></i></div>
                                            <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="plastico" name="plastico" value="<?php echo "{$edit -> eplastico}"; ?>" placeholder="Input">
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
                                        <?php for ($i = 0; $i < count($array3); $i++) { ?>
                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">id</span><p><?php print ($array3[$i]['id']); ?></p></td>
                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><p><?php print (ucfirst(strtolower($array3[$i]['nombre']))); ?></p></td>
                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                    <span class="inline-block w-1/3 md:hidden font-bold">Acción</span>
                                                    <div class="flex flex-col w-full justify-center">
                                                        <div id="upload-button<?php print($array3[$i]['id']); ?>" class="inline-flex self-start items-center px-6 py-2 border-2 <?php print($arrayColors[$colorscont]['border']); ?> cursor-pointer <?php print($arrayColors[$colorscont]['text']); ?> font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                                                            Subir archivo
                                                        </div>
                                                        <div class="flex-1 md:flex items-center justify-between">
                                                        <?php if(is_null($array3[$i]['nombre_archivo']) || is_null($array3[$i]['identificador'])) { ?>
                                                            <span id="upload-text<?php print($array3[$i]['id']); ?>">No hay ningún archivo seleccionado</span>
                                                            <button type="button" id="upload-delete<?php print($array3[$i]['id']); ?>" class="hidden">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512"><path
                                                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                                                </svg>
                                                            </button>
                                                        <?php }else{ ?>
                                                            <span id="upload-text<?php print($array3[$i]['id']); ?>">1 archivo seleccionado</span>
                                                            <button type="button" id="upload-delete<?php print($array3[$i]['id']); ?>" class="z-100 md:p-2 my-auto">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512"><path
                                                                    d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                                                </svg>
                                                            </button>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                    <input type="file" name="infp_papeleria<?php print($array3[$i]['id']); ?>" id="infp_papeleria<?php print($array3[$i]['id']); ?>"  class="hidden" />
                                                    <div id="content-container<?php print($array3[$i]['id']); ?>">
                                                    <?php if(!(is_null($array3[$i]['nombre_archivo'])) && !(is_null($array3[$i]['identificador']))) { ?>
                                                        <ul id="lista<?php print($array3[$i]['id']); ?>" class="break-all md:break-normal">
                                                            <li id="papeleria<?php print($array3[$i]['id']); ?>" class="flex flex-wrap">
                                                                <?php 
                                                                $ext = pathinfo($array3[$i]['nombre_archivo'], PATHINFO_EXTENSION);
                                                                if($ext == "jpg"){
                                                                    echo '<svg style="width:24px; heigth:24px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><path style="fill:#6DABE4;" d="M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z"/><path style="opacity:0.15;enable-background:new    ;" d="M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z"/><path style="fill:#FFFFFF;" d="M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z"/><circle style="fill:#FFB547;" cx="200.999" cy="143.414" r="38.958"/><path style="fill:#4C9462;" d="M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z"	/><path style="fill:#8D6645;" d="M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z"/><path style="fill:#99DAEA;" d="M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z"/><polygon style="opacity:0.1;enable-background:new    ;" points="188.713,379.313 226.521,379.313 313.42,163.313 "/><path style="fill:#1E252B;" d="M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                                                                }else if($ext == "pdf"){
                                                                    echo '<svg style="width:24px; heigth:24px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 303.188 303.188" style="enable-background:new 0 0 303.188 303.188;" xml:space="preserve"><g>	<polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>	<path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/>	<polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>	<g>		<path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>		<path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z"/>		<path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z"/>	</g>	<polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                                                                }
                                                                print ($array3[$i]['nombre_archivo']);
                                                                ?>
                                                            </li>
                                                        </ul>
                                                    <?php } ?>
                                                    </div>
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