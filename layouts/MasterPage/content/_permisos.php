<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Permisos</h3>
    <div class="mt-4">
        <div class="flex flex-col mt-8">
            <div class="overflow-x-auto">
                <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full">
                        <div class="bg-white p-3 shadow-md rounded">
                            <table class="w-full" id="datatable" style="display:none;">
                                <thead>
                                    <tr class="bg-black text-white uppercase text-sm leading-normal">
										<th class="py-3 text-left all">Id</th>
                                        <th class="py-3 text-left all">Permiso</th>
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
<div id="modal-component-container" class="modal-component-container hidden fixed inset-0">
    <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
        <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">&nbsp;</div>
        <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-lx transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="modal-wrapper-flex sm:flex sm:items-start">
                    <div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10"></div>
                    <div class="modal-content text-center mt-3 sm:mt-0 sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium text-gray-900">Crear permiso</h3>
                        <div class="modal-text mt-2">
                            <p class="text-gray-500 text-sm">...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-actions bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Guardar</button>
                <button id="close-modal" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-md px-4 py-2 mt-3 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
            </div>
        </div>
    </div>
</div>