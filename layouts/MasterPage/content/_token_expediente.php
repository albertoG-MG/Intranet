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
	    Token expediente
    </h2>
    <div class="mt-4">
        <div class="flex flex-col mt-8">
            <div class="overflow-x-auto">
                <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full">
                        <div class="bg-gray-50 shadow-md rounded-t">
                            <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                                <a href="dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24"><path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" /></svg>
                                    Home
                                </a>
                                <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <a href="expedientes.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" />
                                    </svg>
                                    Expedientes
                                </a>
                                <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <div class="flex items-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M14,20V19C14,17.67 11.33,17 10,17C8.67,17 6,17.67 6,19V20H14M10,12A2,2 0 0,0 8,14A2,2 0 0,0 10,16A2,2 0 0,0 12,14A2,2 0 0,0 10,12Z" />
                                    </svg>
                                    <span class="text-sm font-medium">Token expediente</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-3 shadow-md rounded-b">
                            <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Asignar token a a empleado</h2>
                                 <span class="text-[#64748b]">Recuerde inicializar el expediente al usuario, de lo contrario no aparecerá para seleccionar.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                            </div>
                            <form id="Guardar" method="POST">
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label class="text-[#64748b] font-semibold mb-2">
                                        Asignar token a:
                                    </label>
                                    <div class="group flex" id="selectusuario_token" style="display:none !important; position:relative;">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                            </svg>
                                        </div>
                                        <select id="usuario" name="usuario">
                                            <option></option>
                                            <optgroup label="Usuarios">
                                                <?php
                                                    foreach ($deploy_empleados as $item) {
                                                    echo "<option value='" . $item["expedienteid"] . "'>";
                                                    echo $item["nombre"];
                                                    echo "</option>";
                                                    }
                                                ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7 text-center">
                                    <div id="submit-button">   
                                        <button type="submit" id="guardar_token" name="guardar_token" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Asignar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="my-3 h-px bg-slate-200"></div>
                            <div class="flex flex-col mt-5 mx-7">
                                 <h2 class="text-2xl text-[#64748b] font-semibold">Usuarios con token asignado</h2>
                                 <span class="text-[#64748b]">Si el usuario aparece en la tabla, significa que puede acceder al link.</span>
                                 <div class="my-3 h-px bg-slate-200"></div>
                            </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <table class="w-full" id="datatable" style="display:none; word-break: break-word;">
                                    <thead>
                                    <tr class="text-white uppercase text-sm leading-normal" style="font-size: 13px !important; background-color: #000000bd !important;">                                 
                                            <th>Número de empleado</th>
                                            <th class="py-3 text-left all dt-tituloL border-white">Expediente</th>
                                            <th class="py-3 text-left desktop">Asignado a</th>
                                            <th>Filename_foto</th>
                                            <th>Foto_identificador</th>
                                            <th class="py-3 text-center desktop">Token</th>
                                            <th class="py-3 text-center desktop">Fecha de expiración</th>
                                            <th>Token</th>
                                            <th class="py-3 text-center min-tablet dt-tituloR border-white">Acción</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    		.btn-celeste{
		background-color: #00a3ff  !important;
		border: none !important;
		box-shadow: 3px 3px 4px 0px rgb(0 0 0 / 22%) !important;
		font-weight: 500 !important;
		border-bottom: #fff 9px;
	}
	
		.btn-celeste:hover{
		background-color: #008eff !important;
	}
    </style>
</div>
