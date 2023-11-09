<div>
    <div class="container mx-auto my-5 p-5">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Zilla+Slab+Highlight:wght@700&display=swap');
.Titulos{
    font-family: 'Poppins', sans-serif;
    color: #000000;
    font-size: 2.75rem !important;
}
    </style>
        <h2 class="Titulos text-3xl font-semibold sm:text-5xl lg:text-6xl">
            Vacaciones
        </h2>
    
             <div class="my-4"></div>
                    <div class="bg-white p-3 shadow-md rounded-lg">
                        <div id="DT-div" style="display:none;">
                            <table class="w-full" id="datatable">
                                <thead>
                                <tr class="text-white uppercase text-sm leading-normal" style="font-size: 13px !important; background-color: #000000bd !important;">                                 
                                        <th>Solicitud_id</th>
                                        <th class="py-3 text-left all">Nombre</th>
                                        <th class="py-3 text-center desktop">Periodo</th>
                                        <th class="py-3 text-center desktop">dia(s)</th>
                                        <th class="py-3 text-center desktop">Fecha solicitud</th>
                                        <th class="py-3 text-center desktop">Estatus</th>
                                        <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                            <th class="py-3 text-center min-tablet"></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
</div>
<?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
	<div id="modal-component-container" class="contenedor modal-component-container hidden fixed overflow-y-auto inset-0 bg-gray-700 bg-opacity-75" style="z-index:100;">
		<div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
			<div class="modal-bg-container inset-0"></div>
			<div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
			<div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
				<form id="vacaciones-guardar" method="post">
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
<?php } ?>