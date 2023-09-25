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
        <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ echo "Ver acta administrativa"; }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ echo "Ver carta compromiso"; } ?>
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
                                <a href="incidencias.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
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
                                <a href="actas_cartas.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M15.5,12C18,12 20,14 20,16.5C20,17.38 19.75,18.21 19.31,18.9L22.39,22L21,23.39L17.88,20.32C17.19,20.75 16.37,21 15.5,21C13,21 11,19 11,16.5C11,14 13,12 15.5,12M15.5,14A2.5,2.5 0 0,0 13,16.5A2.5,2.5 0 0,0 15.5,19A2.5,2.5 0 0,0 18,16.5A2.5,2.5 0 0,0 15.5,14M7,15V17H9C9.14,18.55 9.8,19.94 10.81,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19A2,2 0 0,1 21,5V13.03C19.85,11.21 17.82,10 15.5,10C14.23,10 13.04,10.37 12.04,11H7V13H10C9.64,13.6 9.34,14.28 9.17,15H7M17,9V7H7V9H17Z" />
                                    </svg>
                                    <span class="text-sm font-medium">Ver documento vinculado</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-3 shadow-md rounded-b">
                            <div class="flex flex-col mt-5 mx-7">
                                <h2 class="text-2xl text-[#64748b] font-semibold"><?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ echo "Acta administrativa para: " .$fetch_information -> asignada_a. ""; }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ echo "Carta compromiso para: " .$fetch_information -> asignada_a. ""; } ?></h2>
                                <span class="text-[#64748b]">En esta sección puede visualizar el documento administrativo asignado a su expediente.</span>
                                <div class="my-3 h-px bg-slate-200"></div>
                            </div>
                            <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
                            <div id="main_acta" class="mt-5 mx-7 p-2">
                                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Fecha de expedición del acta:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->fecha == null){ echo "No hay datos"; }else{echo "{$fetch_information->fecha}";} ?>
                                        </span>
                                    </div>
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Creada por:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->creada_por == null){ echo "No hay datos"; }else{echo "{$fetch_information->creada_por}";} ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Asignada a:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->asignada_a == null){ echo "No hay datos"; }else{echo "{$fetch_information->asignada_a}";} ?>
                                        </span>
                                    </div>
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Tipo de documento:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->tipo == null){ echo "No hay datos"; }else{echo "{$fetch_information->tipo}";} ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Motivo del acta:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->motivo_acta == null){ echo "No hay datos"; }else{echo "{$fetch_information->motivo_acta}";} ?>
                                        </span>
                                    </div>
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Observaciones y/o comentarios:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->observaciones_acta == null){ echo "No hay datos"; }else{echo "{$fetch_information->observaciones_acta}";} ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-12 h-px bg-slate-200"></div>
                                <div class="flex flex-col mx-7">
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Acta administrativa firmado:
                                        </div>
                                        <label class='flex flex-col border-4 border-dashed w-full group'>
                                            <div class='flex flex-col items-center justify-center pt-7'>
                                                <div id="svg_acta">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                                    </svg>
                                                </div>
                                                <div id="text-acta">
                                                <p id="archivo_acta" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Cargando...</p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div id="main_carta" class="mt-5 mx-7 p-2">
                                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Fecha de expedición de la carta:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->fecha == null){ echo "No hay datos"; }else{echo "{$fetch_information->fecha}";} ?>
                                        </span>
                                    </div>
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Creada por:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->creada_por == null){ echo "No hay datos"; }else{echo "{$fetch_information->creada_por}";} ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Asignada a:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->asignada_a == null){ echo "No hay datos"; }else{echo "{$fetch_information->asignada_a}";} ?>
                                        </span>
                                    </div>
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Tipo de documento:
                                        </div>
                                        <span>
                                            <?php if($fetch_information->tipo == null){ echo "No hay datos"; }else{echo "{$fetch_information->tipo}";} ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col mx-7">
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Responsabilidades a cumplir:
                                        </div>
                                        <span>
                                            <?php if($fetch_information -> responsabilidades_carta == "no"){ echo "Sin teléfono proporcionado por la empresa"; }else{echo "{$fetch_information -> responsabilidades_carta}";} ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-12 h-px bg-slate-200"></div>
                                <div class="flex flex-col mx-7">
                                    <div class="flex-1 flex flex-col mt-5">
                                        <div class="text-[#64748b] font-semibold">
                                            Carta compromiso firmada:
                                        </div>
                                        <label class='flex flex-col border-4 border-dashed w-full group'>
                                            <div class='flex flex-col items-center justify-center pt-7'>
                                                <div id="svg_carta">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                                    </svg>  
                                                </div>
                                                <div id="text-carta">
                                                    <p id="archivo_carta" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Cargando...</p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="mt-12 h-px bg-slate-200 mx-7"></div>
                            <div class="grid grid-cols-1 mx-7 mt-5">
                                <div class="text-center md:text-right">
                                    <a href="actas_cartas.php" class="button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
