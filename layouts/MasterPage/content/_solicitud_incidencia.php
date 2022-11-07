<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Ver solicitudes de incidencia</h3>
    <div class="mt-4">
        <div class="flex flex-col mt-8">
            <div class="overflow-x-auto">
                <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full">
                        <div class="bg-gray-50 shadow-md rounded-t">
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
								
								<a href="incidencias.php" class="flex items-center text-gray-600 -px-2 hover:underline">
                                <svg  style="width:24px;height:24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                                    <span class="mx-2">Incidencias</span>
                                </a>
								
							    <span class="mx-5 rotate-90 sm:rotate-0 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>

                                <a href="solicitud_incidencia.php" class="flex items-center text-blue-600 -px-2 hover:underline">
									<svg class="w-6 h-6 mx-2" viewBox="0 0 24 24">
										<path fill="currentColor" d="M13,9.5H18V7.5H13V9.5M13,16.5H18V14.5H13V16.5M19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21M6,11H11V6H6V11M7,7H10V10H7V7M6,18H11V13H6V18M7,14H10V17H7V14Z" />
									</svg>
                                    <span class="mx-2">Solicitud de incidencia</span>
                                </a>

                            </div>
                        </div>
                        <div class="bg-white p-3 shadow-md rounded-b">
                        <div id="message-error" class="text-center">
	                    </div>
                            <div id="DT-div" style="display:none;">
                                <table class="w-full" id="datatable">
                                    <thead>
                                        <tr class="bg-black text-white uppercase text-sm leading-normal">
                                            <th class="py-3 text-left all">Id</th>
                                            <th class="py-3 text-left min-tablet">Nombre</th>
                                            <th class="py-3 text-left desktop">Tipo</th>
                                            <th class="py-3 text-left desktop">Fecha inicio</th>
                                            <th class="py-3 text-left desktop">Fecha fin</th>
                                            <th class="py-3 text-left estatus desktop">Estatus</th>
                                            <th class="py-3 text-center desktop">Goce de sueldo?</th>
                                            <th class="py-3 text-center evaluacion desktop"></th>
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
<div id="modal-component-container" class="modal-component-container hidden fixed inset-0">
    <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
        <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
        <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <form id="Guardar" method="post">
                <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="modal-wrapper-flex sm:flex sm:flex-col sm:items-start">
                        <div class="flex-col gap-3 items-center flex sm:flex-row">
                            <div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10"><i class="mdi mdi-comment text-black font-semibold text-lg"></i></div>
                            <h3 class="text-lg font-medium text-gray-900">Agregar comentario</h3>
                        </div>
                        <div class="modal-content text-center w-full mt-3 sm:mt-0 sm:mt-0 sm:ml-4 sm:text-left">
                            <div class="grid grid-cols-1 mt-5 mx-6 px-3">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Comentario</label>
                                <textarea class="w-full rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="comentario" name="comentario" placeholder="Input"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-actions bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
					<div id="submit-changes">
						<button id="agregar-comentario" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Agregar comentario</button>
					</div>	
                    <button id="close-modal" type="button" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-md px-4 py-2 mt-3 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>