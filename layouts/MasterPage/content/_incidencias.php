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
        Incidencias
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
                                <div class="flex items-center text-gray-400">
                                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
										<path fill="currentColor" d="M13,9.5H18V7.5H13V9.5M13,16.5H18V14.5H13V16.5M19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21M6,11H11V6H6V11M7,7H10V10H7V7M6,18H11V13H6V18M7,14H10V17H7V14Z" />
									</svg>
                                    <span class="text-sm font-medium">Incidencias</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-3 shadow-md rounded-b">
                            <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true"){ ?>
                                <div class="grid grid-cols-1">
                                    <label class="text-[#64748b] font-semibold mb-2">Filtrar incidencias por periodo</label>
                                    <div class="group flex">
                                        <div class="w-10 z-10 pr-2.5 text-center pointer-events-none flex items-center justify-center">
                                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M9,10H7V12H9V10M13,10H11V12H13V10M17,10H15V12H17V10M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"></path>
                                            </svg>
                                        </div>
                                        <input class="w-full -ml-10 pl-7 py-2 rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-celeste-600" type="text" id="periodo_buscar" name="periodo_buscar" placeholder="Filtrar incidencias por periodo" autocomplete="off" aria-invalid="false">
                                    </div>
                                </div>
                            <?php } ?>
                            <div id="DT-div" style="display:none;">
                                <table class="w-full" id="datatable">
                                    <thead>
                                    <tr class="text-white uppercase text-sm leading-normal" style="font-size: 13px !important; background-color: #000000bd !important;">                                 
                                        <th>Solicitud_id</th>
                                            <th class="py-3 text-left all">Nombre</th>
                                            <th class="py-3 text-center desktop">Tipo</th>
                                            <th class="py-3 text-center desktop">Periodo</th>
                                            <th class="py-3 text-center desktop">Fecha solicitud</th>
                                            <th class="py-3 text-center desktop">Goce de sueldo?</th>
                                            <th class="py-3 text-center desktop">Estatus</th>
                                            <th class="py-3 text-center min-tablet"></th>
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
</div>
<?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
	<div id="modal-component-container" class="contenedor modal-component-container hidden fixed overflow-y-auto inset-0 bg-gray-700 bg-opacity-75">
		<div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
			<div class="modal-bg-container inset-0"></div>
			<div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
			<div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
				<form id="Guardar" method="post">
					<div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
						<div class="modal-wrapper-flex sm:flex sm:flex-col sm:items-start">
						...
						</div>
					</div>
					<div class="modal-actions bg-gray-50 flex flex-col gap-3 px-4 py-3 sm:px-6 sm:flex-row-reverse">
					...                  
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>