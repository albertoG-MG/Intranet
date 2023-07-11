<div class="container mx-auto px-6 py-8">
    <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
        <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ echo "Editar acta administrativa"; }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ echo "Editar carta compromiso"; } ?>
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
                                <a href="actas_cartas.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#4f46e5] hover:text-[#4f46e5]">
                                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z"></path>
                                    </svg>
                                    Actas y cartas
                                </a>
                                <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <div class="flex items-center text-gray-400">
                                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20.1L20 10.1V8L14 2H6M13 3.5L18.5 9H13V3.5M20.1 13C20 13 19.8 13.1 19.7 13.2L18.7 14.2L20.8 16.3L21.8 15.3C22 15.1 22 14.7 21.8 14.5L20.5 13.2C20.4 13.1 20.3 13 20.1 13M18.1 14.8L12 20.9V23H14.1L20.2 16.9L18.1 14.8Z" />
                                    </svg>
                                    <span class="text-sm font-medium">Editar documento</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-3 shadow-md rounded-b">
                            <div class="flex flex-col mt-5 mx-7">
                                <h2 class="text-2xl text-[#64748b] font-semibold"><?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ echo "Acta administrativa para: " .$fetch_information -> asignada_a. ""; }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ echo "Carta compromiso para: " .$fetch_information -> asignada_a. ""; } ?></h2>
                                <span class="text-[#64748b]">En esta sección puede editar los documentos administrativos asignados a un empleado.</span>
                                <div class="my-3 h-px bg-slate-200"></div>
                            </div>
                            <form id="editar-documento" method="POST">
                                <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">Editar la fecha de expedición del acta administrativa</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                            </svg>
                                        </div>
                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fecha_acta" name="fecha_acta" placeholder="Editar la fecha de expedición del acta administrativa" autocomplete="off">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">
                                        Reasignar acta administrativa a:
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
                                                        echo "<option value='" . $item["expedienteid"] . "'";
                                                        if($item["nombre"] == $fetch_information->asignada_a){ echo 'selected';}
                                                        echo ">";
                                                        echo $item["nombre"];
                                                        echo "</option>";
                                                    }
									            ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">Editar el motivo por el que se realiza el acta</label>
                                    <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="motivo_acta" name="motivo_acta" placeholder="Editar el motivo por el que se realiza el acta"><?php echo $fetch_information -> motivo_acta; ?></textarea>
                                    <div id="error_motivo_acta"></div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">Editar las observaciones y/o Comentarios</label>
                                    <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="obcomen_acta" name="obcomen_acta" placeholder="Editar las observaciones y/o Comentarios"><?php echo $fetch_information -> observaciones_acta; ?></textarea>
                                    <div id="error_obcomen_acta"></div>
                                </div>
                                <div class="mt-12 h-px bg-slate-200"></div>
                                <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                    <div id="submit-edit-acta">
                                        <button type="submit" id="boton-editar-acta" name="boton-editar-acta" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Editar acta</button>
                                    </div>
                                </div
                                <?php }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ ?>
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="text-[#64748b] font-semibold mb-2">Editar la fecha de expedición de la carta compromiso</label>
                                        <div class="group flex">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                                </svg>
                                            </div>
                                            <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fecha_carta" name="fecha_carta" placeholder="Editar la fecha de expedición de la carta compromiso" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="text-[#64748b] font-semibold mb-2">
                                            Reasignar carta compromiso a:
                                        </label>
                                        <div class="group flex" id="groupempleado" style="display:none !important; position:relative;">
                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                                </svg>
                                            </div>
                                            <select id="array_empleado" name="array_empleado">
                                                <option></option>
                                                <optgroup label="Usuarios">
                                                    <?php
                                                        foreach ($deploy_empleados as $empleado) {
                                                            echo "<option value='" . $empleado["expedienteid"] . "'";
                                                            if($empleado["nombre"] == $fetch_information->asignada_a){ echo 'selected';}
                                                            echo ">";
                                                            echo $empleado["nombre"];
                                                            echo "</option>";
                                                        }
                                                    ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label class="text-[#64748b] font-semibold mb-2">Editar responsabilidades a cumplir</label>
                                        <textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="responsabilidad_carta" name="responsabilidad_carta" placeholder="Editar responsabilidades a cumplir"><?php echo $fetch_information -> responsabilidades_carta; ?></textarea>
                                        <div id="error_responsabilidad_carta"></div>
                                    </div>
                                    <div class="mt-12 h-px bg-slate-200"></div>
                                    <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                        <div id="submit-edit-carta">
                                            <button type="submit" id="boton-editar-carta" name="boton-editar-carta" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Editar carta</button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
