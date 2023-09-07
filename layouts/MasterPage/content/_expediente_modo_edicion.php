<div class="container mx-auto px-6 py-8">
    <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
        Expediente modo edición
    </h2>
    <div class="mt-4">
        <div class="flex flex-col mt-8">
            <div class="overflow-x-auto">
                <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full">
                        <div class="bg-gray-50 shadow-md rounded-t">
                            <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                                <a href="dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#4f46e5] hover:text-[#4f46e5]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24"><path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>
                                    Home
                                </a>
                                <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <div class="flex items-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20.1L20 10.1V8L14 2H6M13 3.5L18.5 9H13V3.5M20.1 13C20 13 19.8 13.1 19.7 13.2L18.7 14.2L20.8 16.3L21.8 15.3C22 15.1 22 14.7 21.8 14.5L20.5 13.2C20.4 13.1 20.3 13 20.1 13M18.1 14.8L12 20.9V23H14.1L20.2 16.9L18.1 14.8Z" />
                                    </svg>
                                    <span class="text-sm font-medium">Expediente modo edición</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-3 shadow-md rounded-b">
                            <?php if($fetch_token_user->exp_date >= $curDate){ ?>
                                <div class="flex flex-col mt-5 mx-7">
                                    <h2 class="text-2xl text-[#64748b] font-semibold">Formulario para llenar un expediente</h2>
                                    <span class="text-[#64748b]">Por favor, proporciona todos los datos necesarios para poder asignar un expediente a un usuario.</span>
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
                                            <span>Subir papelería</span>
                                        </button>
                                    </li>
                                </ul>
                                <form id="Guardar" method="post">
                                    <div id='menu-contents' style="word-break: break-word;">
                                        <div class="block bg-transparent rounded-lg tab-pane" id="datosG" role="tabpanel" aria-labelledby="datosG-tab">
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Datos del empleado</h2>
                                                <span class="text-[#64748b]">Información personal del empleado.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Nivel de estudios</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M16 8C16 10.21 14.21 12 12 12C9.79 12 8 10.21 8 8L8.11 7.06L5 5.5L12 2L19 5.5V10.5H18V6L15.89 7.06L16 8M12 14C16.42 14 20 15.79 20 18V20H4V18C4 15.79 7.58 14 12 14Z" />
                                                        </svg>
                                                    </div>
                                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="estudios" name="estudios">
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
                                            <div x-data="{ open: true }">
                                                <div class="grid grid-cols-1 mt-5 mx-7">
                                                    <label class="text-[#64748b] font-semibold mb-2">¿Desea agregar un correo electrónico adicional?</label>
                                                    <div class="group flex mt-3 items-center">
                                                        <input id="option-correo-personal-1" type="radio" name="posee_correo" value="si" x-on:click="rcorreoadicional; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-correo-personal-1" aria-describedby="option-correo-personal-1" checked="">
                                                        <label for="option-correo-personal-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                                            Sí
                                                        </label>
                                                        <input id="option-correo-personal-2" type="radio" name="posee_correo" value="no" x-on:click="rcorreoadicional; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-correo-personal-2" aria-describedby="option-correo-personal-2">
                                                        <label for="option-correo-personal-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <script>
                                                    function rcorreoadicional(e) {
                                                        if (e.target.value == "no") {
                                                            if (!($("#correo_adicional").val().length == 0)) {
                                                                $("#correo_adicional").removeData("previousValue");
                                                            }
                                                            $("#correo_adicional").val("");
                                                            $("#correo_adicional").rules("remove");
                                                            $("#correo_adicional").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                                            $("#correo_adicional").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                                            $("#correo_adicional-error").css("display", "none");
                                                            $('#loader-correo').addClass('hidden');
                                                            $('#correct-correo').addClass('hidden');
                                                        } else if (e.target.value == "si") {
                                                            $("#correo_adicional").rules("add", {
                                                                required: true,
                                                                email_verification: true,
                                                                remote: {
                                                                    url: "../ajax/validacion/expedientes/checkemail.php",
                                                                    type: "GET",
                                                                    beforeSend: function() {
                                                                        $('#loader-correo').removeClass('hidden');
                                                                        $('#correct-correo').addClass('hidden');
                                                                    },
                                                                    complete: function(data) {
                                                                        if (data.responseText == "true") {
                                                                            $('#loader-correo').delay(3000).queue(function(next) {
                                                                                $(this).addClass('hidden');
                                                                                next();
                                                                            });
                                                                            $('#correct-correo').delay(3000).queue(function(next) {
                                                                                $(this).removeClass('hidden');
                                                                                next();
                                                                            });
                                                                        } else {
                                                                            $('#loader-correo').addClass('hidden');
                                                                            $('#correct-correo').addClass('hidden');
                                                                        }
                                                                    }
                                                                },
                                                                messages: {
                                                                    required: function() {
                                                                        $('#loader-correo').addClass('hidden');
                                                                        $('#correct-correo').addClass('hidden');
                                                                        $("#correo_adicional").removeData("previousValue");
                                                                        return "Por favor, ingrese un correo electrónico";
                                                                    },
                                                                    email_verification: function() {
                                                                        $('#loader-correo').addClass('hidden');
                                                                        $('#correct-correo').addClass('hidden');
                                                                        $("#correo_adicional").removeData("previousValue");
                                                                        return "Asegúrese que el texto ingresado este en formato de email";
                                                                    }
                                                                }
                                                            });
                                                        }
                                                    }
                                                </script>
                                                <div x-show.important="open">
                                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                                        <label class="text-[#64748b] font-semibold mb-2">Correo electrónico adicional</label>
                                                        <div class="group flex">
                                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                                                                </svg>
                                                            </div>
                                                            <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" aria-describedby="correoadicional_help" id="correo_adicional" name="correo_adicional" value="<?php if($edit->eposee_correo == "si"){ echo $edit->ecorreo_adicional; } ?>" placeholder="i.e. example@example.com">
                                                        </div>
                                                        <div id="loader-correo" class="hidden mt-5">
                                                            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                                            </svg>
                                                            <span>Cargando...</span>
                                                        </div>
                                                        <div class="hidden" id="correct-correo">
                                                            <li class="flex items-center">
                                                                <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                                </svg>
                                                                <p class="text-green-600">Correo electrónico válido y disponible</p>
                                                            </li>
                                                        </div>
                                                        <div id="correoadicional_help" class="text-[#64748b]">
                                                            Solo para contacto, no es obligatorio.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Datos de ubicación</h2>
                                                <span class="text-[#64748b]">Datos de ubicación del empleado.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Calle</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="calle" name="calle" value="<?php echo "{$edit->ecalle}"; ?>" placeholder="Calle">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Número interior</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="ninterior" name="ninterior" value="<?php echo "{$edit->enum_interior}"; ?>" placeholder="Número Interior">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Número exterior</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="nexterior" name="nexterior" value="<?php echo "{$edit->enum_exterior}"; ?>" placeholder="Número exterior">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Colonia</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="colonia" name="colonia" value="<?php echo "{$edit->ecolonia}"; ?>" placeholder="Colonia">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Estado</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                                            </svg>
                                                        </div>
                                                        <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="estado" name="estado">
                                                            <option value="">--Seleccione--</option>
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
                                                    <label class="text-[#64748b] font-semibold mb-2">Municipio</label>
                                                    <div class="group flex" id="imunicipio">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                                            </svg>
                                                        </div>
                                                        <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="municipio" name="municipio">
                                                            <option value="">--Seleccione un estado--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Código postal</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="codigo" name="codigo" value="<?php echo "{$edit -> ecodigo}"; ?>" placeholder="Código postal">
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Teléfono de domicilio</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="teldom" name="teldom" value="<?php echo "{$edit -> etel_dom}"; ?>" placeholder="Télefono de domicilio">
                                                </div>
                                            </div>
                                            <div x-data="{ open: true }">
                                                <div class="grid grid-cols-1 mt-5 mx-7">
                                                    <label class="text-[#64748b] font-semibold mb-2">Posee teléfono propio?</label>
                                                    <div class="group flex mt-3 items-center">
                                                        <input id="option-telmov-1" type="radio" name="tel_movil" value="si" x-on:click="rtelmov; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                                        <label for="option-telmov-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                                            Sí
                                                        </label>
                                                        <input id="option-telmov-2" type="radio" name="tel_movil" value="no" x-on:click="rtelmov; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
                                                        <label for="option-telmov-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <script>
                                                    function rtelmov(e) {
                                                        if (e.target.value == "no") {
                                                            $("#telmov").val("");
                                                            $("#telmov").rules("remove");
                                                            $("#telmov").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                                            $("#telmov").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                                            $("#telmov-error").css("display", "none");
                                                        } else if (e.target.value == "si") {
                                                            $("#telmov").rules("add", {
                                                                required: true,
                                                                digits: true,
                                                                messages: {
                                                                    required: 'Este campo es requerido',
                                                                    digits: 'Solo se permiten números'
                                                                }
                                                            });
                                                        }
                                                    }
                                                </script>
                                                <div x-show.important="open">
                                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                                        <label class="text-[#64748b] font-semibold mb-2">Teléfono móvil propio</label>
                                                        <div class="group flex">
                                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                                                </svg>
                                                            </div>
                                                            <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="telmov" name="telmov" value="<?php if($edit->eposee_telmov == 'si'){ echo $edit->etel_mov; } ?>" placeholder="Télefono móvil propio">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Datos relevantes del empleado</h2>
                                                <span class="text-[#64748b]">Otros datos de interés del empleado.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Casa propia?</label>
                                                <div class="group flex mt-3 items-center">
                                                    <input id="option-casa-1" type="radio" name="casa" value="si" <?= ($edit->ecasa_propia == 'si') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                                    <label for="option-casa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                                        Sí
                                                    </label>
                                                    <input id="option-casa-2" type="radio" name="casa" value="no" <?= ($edit->ecasa_propia == 'no') ? 'checked' : '' ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
                                                    <label for="option-casa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Estado civil</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M12,10L8,4.4L9.6,2H14.4L16,4.4L12,10M15.5,6.8L14.3,8.5C16.5,9.4 18,11.5 18,14A6,6 0 0,1 12,20A6,6 0 0,1 6,14C6,11.5 7.5,9.4 9.7,8.5L8.5,6.8C5.8,8.1 4,10.8 4,14A8,8 0 0,0 12,22A8,8 0 0,0 20,14C20,10.8 18.2,8.1 15.5,6.8Z" />
                                                        </svg>
                                                    </div>
                                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="ecivil" name="ecivil">
                                                        <option value="">--Selecciona--</option>
                                                        <option value="SOLTERO" <?php if ($edit->eecivil == "SOLTERO") echo 'selected="selected"'; ?>>Soltero</option>
                                                        <option value="CASADO" <?php if ($edit->eecivil == "CASADO") echo 'selected="selected"'; ?>>Casado</option>
                                                        <option value="DIVORCIADO" <?php if ($edit->eecivil == "DIVORCIADO") echo 'selected="selected"'; ?>>Divorciado</option>
                                                        <option value="UNION LIBRE" <?php if ($edit->eecivil == "UNION LIBRE") echo 'selected="selected"'; ?>>Unión libre</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div x-data="{ open: true }">
                                                <div class="grid grid-cols-1 mt-5 mx-7">
                                                    <label class="text-[#64748b] font-semibold mb-2">Posee retención?</label>
                                                    <div class="group flex mt-3 items-center">
                                                        <input id="option-retencion-1" type="radio" name="retencion" value="si" x-on:click="rretencion; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                                        <label for="option-retencion-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                                            Sí
                                                        </label>
                                                        <input id="option-retencion-2" type="radio" name="retencion" value="no" x-on:click="rretencion; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
                                                        <label for="option-retencion-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <script>
                                                    function rretencion(e) {
                                                        if (e.target.value == "no") {
                                                            $("#monto_mensual").val('');
                                                            $("#monto_mensual").rules("remove");
                                                            $("#monto_mensual").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                                            $("#monto_mensual").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                                            $("#monto_mensual-error").css("display", "none");
                                                        } else if (e.target.value == "si") {
                                                            $("#monto_mensual").rules("add", {
                                                                required: true,
                                                                number: true,
                                                                messages: {
                                                                    required: "Este campo es requerido",
                                                                    number: "Solo se permiten números y decimales"
                                                                }
                                                            });
                                                        }
                                                    }
                                                </script>
                                                <div x-show.important="open">
                                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                                        <label class="text-[#64748b] font-semibold mb-2">Monto mensual</label>
                                                        <div class="group flex">
                                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z" />
                                                                </svg>
                                                            </div>
                                                            <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="monto_mensual" name="monto_mensual" value="<?php if($edit->eposee_retencion == 'si'){ echo $edit->emonto_mensual; }?>" placeholder="Monto mensual">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Fecha de nacimiento</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fechanac" name="fechanac" placeholder="Fecha de nacimiento" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Inicio de contrato</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fechacon" name="fechacon" placeholder="Inicio de contrato" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Fecha de alta</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fechaalta" name="fechaalta" placeholder="Fecha de alta" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Curp</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="curp" name="curp" value="<?php echo "{$edit->ecurp}"; ?>" placeholder="Curp">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Número de seguro social</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="nss" name="nss" value="<?php echo "{$edit->enss}"; ?>" placeholder="NSS">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">RFC</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="rfc" name="rfc" value="<?php echo "{$edit->erfc}"; ?>" placeholder="RFC">
                                                    </div>
                                                </div>
                                            </div>
                                            <div x-data="{ open: false }">
                                                <div class="grid grid-cols-1 mt-5 mx-7">
                                                    <label class="text-[#64748b] font-semibold mb-2">Tipo de identificación</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M22,3H2C0.91,3.04 0.04,3.91 0,5V19C0.04,20.09 0.91,20.96 2,21H22C23.09,20.96 23.96,20.09 24,19V5C23.96,3.91 23.09,3.04 22,3M22,19H2V5H22V19M14,17V15.75C14,14.09 10.66,13.25 9,13.25C7.34,13.25 4,14.09 4,15.75V17H14M9,7A2.5,2.5 0 0,0 6.5,9.5A2.5,2.5 0 0,0 9,12A2.5,2.5 0 0,0 11.5,9.5A2.5,2.5 0 0,0 9,7M14,7V8H20V7H14M14,9V10H20V9H14M14,11V12H18V11H14" />
                                                            </svg>
                                                        </div>
                                                        <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" x-init="<?php if($edit->etipo_identificacion == 'INE'){ ?> open = true; <?php }else if($edit->etipo_identificacion == 'PASAPORTE'){ ?> open = true; <?php }else if($edit->etipo_identificacion == 'CEDULA'){ ?> open = true; <?php } ?>" x-on:change="if($el.value == 'INE'){tidentificacion($el.value); open = true;}else if($el.value == 'PASAPORTE'){tidentificacion($el.value); open = true;}else if($el.value == 'CEDULA'){tidentificacion($el.value); open = true;}else{tidentificacion($el.value); open = false;}" id="identificacion" name="identificacion">
                                                            <option value="">--Seleccione--</option>
                                                            <option value="INE">INE</option>
                                                            <option value="PASAPORTE">PASAPORTE</option>
                                                            <option value="CEDULA">CEDULA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <script>
                                                    function tidentificacion(value) {
                                                        if (value == "") {
                                                            $("#numeroidentificacion").val("");
                                                            $("#numeroidentificacion").rules("remove");
                                                            $("#numeroidentificacion").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                                            $("#numeroidentificacion").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                                            $("#numeroidentificacion-error").css("display", "none");
                                                        } else {
                                                            $("#numeroidentificacion").rules("add", {
                                                                required: true,
                                                                alphanumeric: true,
                                                                messages: {
                                                                    required: "Este campo es requerido",
                                                                    alphanumeric: "Solo se permiten carácteres alfanúmericos"
                                                                }
                                                            });
                                                        }
                                                    }
                                                </script>
                                                <div x-show.important="open">
                                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                                        <label class="text-[#64748b] font-semibold mb-2">Número de identificación</label>
                                                        <div class="group flex">
                                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M22,18V22H18V19H15V16H12L9.74,13.74C9.19,13.91 8.61,14 8,14A6,6 0 0,1 2,8A6,6 0 0,1 8,2A6,6 0 0,1 14,8C14,8.61 13.91,9.19 13.74,9.74L22,18M7,5A2,2 0 0,0 5,7A2,2 0 0,0 7,9A2,2 0 0,0 9,7A2,2 0 0,0 7,5Z" />
                                                                </svg>
                                                            </div>
                                                            <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="numeroidentificacion" name="numeroidentificacion" value="<?php if (!(empty($edit->etipo_identificacion))){ echo $edit->enum_identificacion; } ?>" placeholder="Número de identificación">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-12 h-px bg-slate-200"></div>
                                            <div class="grid grid-cols-1 mx-7 mt-5">
                                                <div class="text-center md:text-right">
                                                    <button type="button" id="siguiente" name="siguiente" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Siguiente</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden bg-transparent rounded-lg tab-pane" id="datosA" role="tabpanel" aria-labelledby="datosA-tab">
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Referencias laborales</h2>
                                                <span class="text-[#64748b]">Opinión de terceros sobre el desempeño laboral del empleado.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Número de referencias laborales</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="reflab" name="reflab" oninput="AgregarReferencias()" maxlength="1" data-msg-maxlength="Solo se permite un número de un dígito" value="<?php if(count($array_reflaborales) != 0){ echo count($array_reflaborales);} ?>" placeholder="Número de referencias laborales">
                                                </div>
                                            </div>
                                            <div id="referencias">
                                            </div>
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Uniformes</h2>
                                                <span class="text-[#64748b]">Datos de entrega de uniforme.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Fecha de entrega de uniforme</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z" />
                                                    </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="fechauniforme" name="fechauniforme" placeholder="Fecha de entrega de uniforme" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Cantidad (camisa)</label>
                                                    <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M16,21H8A1,1 0 0,1 7,20V12.07L5.7,13.07C5.31,13.46 4.68,13.46 4.29,13.07L1.46,10.29C1.07,9.9 1.07,9.27 1.46,8.88L7.34,3H9C9.29,4.8 10.4,6.37 12,7.25C13.6,6.37 14.71,4.8 15,3H16.66L22.54,8.88C22.93,9.27 22.93,9.9 22.54,10.29L19.71,13.12C19.32,13.5 18.69,13.5 18.3,13.12L17,12.12V20A1,1 0 0,1 16,21" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="cantidadpolo" name="cantidadpolo" value="<?php echo "{$edit->ecantidad_polo}"; ?>" placeholder="Cantidad">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Talla (camisa)</label>
                                                    <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M16,21H8A1,1 0 0,1 7,20V12.07L5.7,13.07C5.31,13.46 4.68,13.46 4.29,13.07L1.46,10.29C1.07,9.9 1.07,9.27 1.46,8.88L7.34,3H9C9.29,4.8 10.4,6.37 12,7.25C13.6,6.37 14.71,4.8 15,3H16.66L22.54,8.88C22.93,9.27 22.93,9.9 22.54,10.29L19.71,13.12C19.32,13.5 18.69,13.5 18.3,13.12L17,12.12V20A1,1 0 0,1 16,21" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="tallapolo" name="tallapolo" value="<?php echo "{$edit->etalla_polo}"; ?>" placeholder="Talla">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Contactos de emergencia</h2>
                                                <span class="text-[#64748b]">Estos son los contactos de emergencia del empleado.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Nombre completo1</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergencianom" name="emergencianom" value="<?php echo "{$edit -> eemergencia_nombre}"; ?>" placeholder="Nombre Completo1">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Parentesco1</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergenciaparentesco" name="emergenciaparentesco" value="<?php echo "{$edit -> eemergencia_parentesco}"; ?>" placeholder="Parentesco1">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Teléfono1</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergenciatel" name="emergenciatel" value="<?php echo "{$edit -> eemergencia_telefono}"; ?>" placeholder="Teléfono1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Nombre completo2</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergencianom2" name="emergencianom2" value="<?php echo "{$edit -> eemergencia_nombre2}"; ?>" placeholder="Nombre Completo2">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Parentesco2</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergenciaparentesco2" name="emergenciaparentesco2" value="<?php echo "{$edit -> eemergencia_parentesco2}"; ?>" placeholder="Parentesco2">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Teléfono2</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="emergenciatel2" name="emergenciatel2" value="<?php echo "{$edit -> eemergencia_telefono2}"; ?>" placeholder="Teléfono2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Otros datos del empleado</h2>
                                                <span class="text-[#64748b]">Datos extra del empleado.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Capacitación</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="capacitacion" name="capacitacion" value="<?php echo "{$edit->ecapacitacion}"; ?>" placeholder="Capacitación">
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Resultado antidoping</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M18,14H14V18H10V14H6V10H10V6H14V10H18M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="antidoping" name="antidoping" value="<?php echo "{$edit->eresultado_antidoping}"; ?>" placeholder="Resultado antidoping">
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Tipo de sangre</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M12,20A6,6 0 0,1 6,14C6,10 12,3.25 12,3.25C12,3.25 18,10 18,14A6,6 0 0,1 12,20Z" />
                                                        </svg>
                                                    </div>
                                                    <select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="tipo_sangre" name="tipo_sangre">
                                                        <option value="">--Seleccione--</option>
                                                        <option value="A_POSITIVO" <?php if ($edit->etipo_sangre == "A_POSITIVO") echo 'selected="selected"'; ?>>A+</option>
                                                        <option value="A_NEGATIVO" <?php if ($edit->etipo_sangre == "A_NEGATIVO") echo 'selected="selected"'; ?>>A-</option>
                                                        <option value="B_POSITIVO" <?php if ($edit->etipo_sangre == "B_POSITIVO") echo 'selected="selected"'; ?>>B+</option>
                                                        <option value="B_NEGATIVO" <?php if ($edit->etipo_sangre == "B_NEGATIVO") echo 'selected="selected"'; ?>>B-</option>
                                                        <option value="AB_POSITIVO" <?php if ($edit->etipo_sangre == "AB_POSITIVO") echo 'selected="selected"'; ?>>AB+</option>
                                                        <option value="AB_NEGATIVO" <?php if ($edit->etipo_sangre == "AB_NEGATIVO") echo 'selected="selected"'; ?>>AB-</option>
                                                        <option value="O_POSITIVO" <?php if ($edit->etipo_sangre == "O_POSITIVO") echo 'selected="selected"'; ?>>O+</option>
                                                        <option value="O_NEGATIVO" <?php if ($edit->etipo_sangre == "O_NEGATIVO") echo 'selected="selected"'; ?>>O-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">¿Cómo se enteró de la vacante?</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,6.75 7,6.89 7,8H17C16.95,6.89 16.25,6.75 16.25,6.75C16.25,3.86 14,3 14,3V5.5H13V2.5C13,2.21 12.81,2 12.5,2H11.5Z" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="vacante" name="vacante" value="<?php echo "{$edit->evacante}"; ?>" placeholder="¿Cómo se entero de la vacante?">
                                                </div>
                                            </div>
                                            <div x-data="{ open: true }">
                                                <div class="grid grid-cols-1 mt-5 mx-7">
                                                    <label class="text-[#64748b] font-semibold mb-2">Tiene familiares dentro de la empresa?</label>
                                                    <div class="group flex mt-3 items-center">
                                                        <input id="option-empresa-1" type="radio" name="empresa" value="si" x-on:click="rfamiliarempresa; open = true" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-1" aria-describedby="option-1" checked="">
                                                        <label for="option-empresa-1" class="text-sm font-medium text-gray-900 ml-2 block" style="flex-basis:30px">
                                                            Sí
                                                        </label>
                                                        <input id="option-empresa-2" type="radio" name="empresa" value="no" x-on:click="rfamiliarempresa; open = false" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-2 focus:outline-none focus:ring-indigo-600" aria-labelledby="option-2" aria-describedby="option-2">
                                                        <label for="option-empresa-2" class="text-sm font-medium text-gray-900 ml-2 block">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <script>
                                                    function rfamiliarempresa(e) {
                                                        if (e.target.value == "no") {
                                                            $("#nomfam").val('');
                                                            $("#nomfam").rules("remove");
                                                            $("#nomfam").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                                                            $("#nomfam").addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                                                            $("#nomfam-error").css("display", "none");
                                                        } else if (e.target.value == "si") {
                                                            $("#nomfam").rules("add", {
                                                                required: true,
                                                                names_validation: true,
                                                                messages: {
                                                                    required: "Este campo es requerido",
                                                                    names_validation: "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios"
                                                                }
                                                            });
                                                        }
                                                    }
                                                </script>
                                                <div x-show.important="open">
                                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                                        <label class="text-[#64748b] font-semibold mb-2">Nombre completo del familiar</label>
                                                        <div class="group flex">
                                                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                    <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                                                </svg>
                                                            </div>
                                                            <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="nomfam" name="nomfam" value="<?php if($edit->efam_dentro_empresa == 'si'){ echo $edit->efam_nombre; } ?>" placeholder="Nombre completo del familiar">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-12 h-px bg-slate-200"></div>
                                            <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                                <button type="button" id="anterior" name="anterior" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                                <button type="button" id="siguiente2" name="siguiente2" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Siguiente</button>
                                            </div>
                                        </div>
                                        <div class="hidden bg-transparent rounded-lg tab-pane" id="datosB" role="tabpanel" aria-labelledby="datosB-tab">
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Beneficiarios bancarios</h2>
                                                <span class="text-[#64748b]">El beneficiario es la persona ante la cual, una entidad financiera se obliga a cumplir una prestación establecida en el contrato que celebró con su cliente.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label class="text-[#64748b] font-semibold mb-2">Número de beneficiarios bancarios</label>
                                                <div class="group flex">
                                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                                        </svg>
                                                    </div>
                                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="refban" name="refban" oninput="AgregarBanco()" maxlength="1" data-msg-maxlength="Solo se permite un número de un dígito" value="<?php if(count($array_refban) != 0){ echo count($array_refban);} ?>" placeholder="Número de beneficiarios bancarios">
                                                </div>
                                            </div>
                                            <div id="ref">
                                            </div>
                                            <div class="flex flex-col mt-5 mx-7">
                                                <h2 class="text-2xl text-[#64748b] font-semibold">Cuenta bancaria personal</h2>
                                                <span class="text-[#64748b]">Credenciales bancarias personales del empleado.</span>
                                                <div class="my-3 h-px bg-slate-200"></div>
                                            </div>
                                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Banco</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="banco_personal" name="banco_personal" value="<?php echo "{$edit -> ebanco_personal}"; ?>" placeholder="Banco">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Cuenta</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="cuenta_personal" name="cuenta_personal" value="<?php echo "{$edit -> ecuenta_personal}"; ?>" placeholder="Cuenta">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1">
                                                    <label class="text-[#64748b] font-semibold mb-2">Clabe</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M4,17V9H2V7H6V17H4M22,15C22,16.11 21.1,17 20,17H16V15H20V13H18V11H20V9H16V7H20A2,2 0 0,1 22,9V10.5A1.5,1.5 0 0,1 20.5,12A1.5,1.5 0 0,1 22,13.5V15M14,15V17H8V13C8,11.89 8.9,11 10,11H12V9H8V7H12A2,2 0 0,1 14,9V11C14,12.11 13.1,13 12,13H10V15H14Z" />
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="clabe_personal" name="clabe_personal" value="<?php echo "{$edit -> eclabe_personal}"; ?>" placeholder="Clabe">
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1 lg:col-span-3">
                                                    <label class="text-[#64748b] font-semibold mb-2">Plástico asignado</label>
                                                    <div class="group flex">
                                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="currentColor" d="M19.83 7.5L17.56 5.23C17.63 4.81 17.74 4.42 17.88 4.08C17.96 3.9 18 3.71 18 3.5C18 2.67 17.33 2 16.5 2C14.86 2 13.41 2.79 12.5 4H7.5C4.46 4 2 6.46 2 9.5S4.5 21 4.5 21H10V19H12V21H17.5L19.18 15.41L22 14.47V7.5H19.83M16 11C15.45 11 15 10.55 15 10S15.45 9 16 9C16.55 9 17 9.45 17 10S16.55 11 16 11Z"></path>
                                                            </svg>
                                                        </div>
                                                        <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="plastico_personal" name="plastico_personal" value="<?php echo "{$edit -> eplastico_personal}"; ?>" placeholder="Plástico asignado">
                                                    </div>
                                                    <div id="plastico_personal_help" class="text-[#64748b]">
                                                        Es el número de 16 dígitos que viene impreso en el frente de la tarjeta bancaria.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-12 h-px bg-slate-200"></div>
                                            <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                                <button type="button" id="anterior2" name="anterior2" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                                <button type="button" id="siguiente3" name="siguiente3" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Siguiente</button>
                                            </div>
                                        </div>
                                        <div class="hidden bg-transparent rounded-lg tab-pane" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <table class="min-w-full border-collapse block md:table">
                                                    <thead class="block md:table-header-group">
                                                        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                                            <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                                                            <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="block md:table-row-group">
                                                        <?php while($fetchtipopapeleria = $checktipospapeleria -> fetch(PDO::FETCH_OBJ)){ ?>
                                                            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                                    <span class="inline-block md:hidden font-bold">Nombre</span>
                                                                    <p><?php echo ucfirst(strtolower($fetchtipopapeleria->nombre)); ?></p>
                                                                </td>
                                                                <td width="70%" class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                                                    <span class="inline-block md:hidden font-bold">Acción</span>
                                                                    <div class="flex flex-col w-full justify-center">
                                                                        <div id="upload-button<?php echo $fetchtipopapeleria->id ?>" class="inline-flex self-start items-center px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900">
                                                                            Subir archivo
                                                                        </div>
                                                                        <div class="flex-1 md:flex items-center justify-between">
                                                                            <?php 
                                                                                if(is_null($array_papeleria[$papeleria_contador]['nombre_archivo']) || is_null($array_papeleria[$papeleria_contador]['identificador'])) { 
                                                                            ?>
                                                                            <span id="upload-text<?php echo $fetchtipopapeleria->id ?>">No hay ningún archivo seleccionado</span>
                                                                            <button type="button" id="upload-delete<?php echo $fetchtipopapeleria->id ?>" class="hidden">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                                                    <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                                                                                </svg>
                                                                            </button>
                                                                            <?php 
                                                                                }else{ 
                                                                                    $path = "../src/documents/".$array_papeleria[$papeleria_contador]['identificador'];
                                                                                    if(!file_exists($path)){
                                                                                        $buscar_papeleria="false";
                                                                            ?>
                                                                            <span id="upload-text<?php print($array_papeleria[$papeleria_contador]['id']); ?>">
                                                                                <p style="color: rgb(244 63 94);">No se encontró el archivo, por favor, suba otro archivo ó seleccione la x para reemplazarlo por un archivo anterior a este</p>
                                                                            </span>
                                                                            <button type="button" id="upload-delete<?php print($array_papeleria[$papeleria_contador]['id']); ?>" class="z-100 md:p-2 my-auto">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                                                    <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                                                                                </svg>
                                                                            </button>
                                                                            <?php 
                                                                                    }else{
                                                                                        $buscar_papeleria="true";
                                                                            ?>
                                                                            <span id="upload-text<?php print($array_papeleria[$papeleria_contador]['id']); ?>">1 archivo seleccionado</span>
                                                                            <button type="button" id="upload-delete<?php print($array_papeleria[$papeleria_contador]['id']); ?>" class="z-100 md:p-2 my-auto">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
                                                                                    <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                                                                                </svg>
                                                                            </button>
                                                                            <?php 
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <input type="file" name="infp_papeleria<?php echo $fetchtipopapeleria->id ?>" id="infp_papeleria<?php echo $fetchtipopapeleria->id ?>" class="hidden" />
                                                                    <div id="content-container<?php echo $fetchtipopapeleria->id ?>">
                                                                        <?php 
                                                                            if(isset($array_papeleria[$papeleria_contador]['nombre_archivo']) && isset($array_papeleria[$papeleria_contador]['identificador'])) {
                                                                                if($buscar_papeleria=="true"){
                                                                        ?>
                                                                        <ul id="lista<?php print($array_papeleria[$papeleria_contador]['nombre_archivo']); ?>" style="word-break: break-word;">
                                                                            <li id="papeleria<?php print($array_papeleria[$papeleria_contador]['id']); ?>" class="flex flex-wrap">
                                                                                <?php 
                                                                                    $ext = pathinfo($array_papeleria[$papeleria_contador]['nombre_archivo'], PATHINFO_EXTENSION);
                                                                                    if($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
                                                                                        echo '<svg style="width:24px; heigth:24px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><path style="fill:#6DABE4;" d="M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z"/><path style="opacity:0.15;enable-background:new    ;" d="M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z"/><path style="fill:#FFFFFF;" d="M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z"/><circle style="fill:#FFB547;" cx="200.999" cy="143.414" r="38.958"/><path style="fill:#4C9462;" d="M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z"	/><path style="fill:#8D6645;" d="M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z"/><path style="fill:#99DAEA;" d="M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z"/><polygon style="opacity:0.1;enable-background:new    ;" points="188.713,379.313 226.521,379.313 313.42,163.313 "/><path style="fill:#1E252B;" d="M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                                                                                    }else if($ext == "pdf"){
                                                                                        echo '<svg style="width:24px; heigth:24px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	 viewBox="0 0 303.188 303.188" style="enable-background:new 0 0 303.188 303.188;" xml:space="preserve"><g>	<polygon style="fill:#E8E8E8;" points="219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	"/>	<path style="fill:#FB3449;" d="M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z"/>	<polygon style="fill:#FB3449;" points="227.64,25.263 32.842,25.263 32.842,0 219.821,0 	"/>	<g>		<path style="fill:#A4A9AD;" d="M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z"/>		<path style="fill:#A4A9AD;" d="M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z"/>		<path style="fill:#A4A9AD;" d="M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z"/>	</g>	<polygon style="fill:#D1D3D3;" points="219.821,50.525 270.346,50.525 219.821,0 	"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                                                                                    }
                                                                                    print ($array_papeleria[$papeleria_contador]['nombre_archivo']);
                                                                                ?>
                                                                            </li>
                                                                        </ul>
                                                                        <?php
                                                                                }
                                                                            } 
                                                                        ?>
                                                                    </div>
                                                                    <div id="error-container<?php echo $array_papeleria[$papeleria_contador]['id']; ?>">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                                $papeleria_contador++;
                                                                $buscar_papeleria="false";
                                                            } 
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="mt-12 h-px bg-slate-200"></div>
                                            <div class="flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5">
                                                <button type="button" id="anterior3" name="anterior3" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Anterior</button>
                                                <div id="submit-button">   
                                                    <button type="submit" id="finish" name="finish" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php }else{ ?>
                                <div class="flex items-center" style="word-break:break-word;">
                                        <div class="w-full flex flex-col items-center justify-center">
                                        <div class="text-center py-4">
                                            <h2 class="flex flex-col lg:flex-row lg:gap-5 md:text-9xl text-5xl mb-8 font-extrabold">
                                                <span>Error </span>
                                                <span>404</span>
                                            </h2>
                                            <p class="text-2xl font-semibold md:text-3xl">El link ha expirado.</p>
                                            <br>
                                            <a href="dashboard.php" class="cursor-pointer button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">Volver al dashboard</a>
                                        </div>
                                    </div>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>