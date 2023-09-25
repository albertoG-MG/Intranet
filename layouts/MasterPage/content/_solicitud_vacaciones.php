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
        Evaluar vacaciones
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
                                <a href="vacaciones.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                                    Vacaciones
                                </a>
                                <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <div class="flex items-center text-gray-400">
                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.5 17L18.5 22L15 18.5L16.5 17L18.5 19L22 15.5L23.5 17M6 2C4.89 2 4 2.89 4 4V20C4 21.11 4.89 22 6 22H13.81C13.28 21.09 13 20.05 13 19C13 15.69 15.69 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M13 3.5L18.5 9H13Z" /></svg>
                                    <span class="text-sm font-medium">Solicitud vacaciones</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-3 shadow-md rounded-b">
                            <div id="message-error" class="text-center">
                            </div>
                            <div id="DT-div" style="display:none;">
                                <table class="w-full" id="datatable" style="word-break: break-word;">
                                    <thead>
                                    <tr class="text-white uppercase text-sm leading-normal" style="font-size: 13px !important; background-color: #000000bd !important;">                                 
                                            <th>Solicitud_id</th>
                                            <th class="py-3 text-left all">Nombre</th>
                                            <th class="py-3 text-center desktop">Periodo</th>
                                            <th class="py-3 text-center desktop">Fecha solicitud</th>
                                            <th class="py-3 text-center desktop">Evaluar</th>
                                            <th class="py-3 text-center desktop">Estatus</th>
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
<div id="modal-component-container" class="contenedor modal-component-container hidden fixed overflow-y-auto inset-0 bg-gray-700 bg-opacity-75">
    <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="modal-bg-container inset-0"></div>
        <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
        <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <form id="Guardar" method="post">
                <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="modal-wrapper-flex sm:flex sm:flex-col sm:items-start">
                        <div class="flex-col gap-3 items-center flex sm:flex-row">
                            <div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-celeste-100 sm:mx-0 sm:h-10 sm:w-10"><svg class="w-5 h-5 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,7A2,2 0 0,0 9,9V15A2,2 0 0,0 11,17H13A2,2 0 0,0 15,15V14H13V15H11V9H13V10H15V9A2,2 0 0,0 13,7H11Z" /></svg></div>
                            <h3 class="text-lg font-medium text-gray-900"> Agregar comentarios </h3>
                        </div>
                        <div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left">
                            <div class="grid grid-cols-1 mt-5">
                                <label class="text-[#64748b] font-semibold mb-2">Comentarios</label>
                                <div class="group flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,7A2,2 0 0,0 9,9V15A2,2 0 0,0 11,17H13A2,2 0 0,0 15,15V14H13V15H11V9H13V10H15V9A2,2 0 0,0 13,7H11Z" /></svg></div>
                                    <input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" type="text" id="comentario" name="comentario" placeholder="Agregar comentarios">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-actions bg-gray-50 flex flex-col gap-3 px-4 py-3 sm:px-6 sm:flex-row-reverse">
                    <div id="submit-changes">
						<button id="agregar-comentario" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>
                    </div>
                    <div id="disable-close-submit">
					    <button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>
                    </div>                    
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
