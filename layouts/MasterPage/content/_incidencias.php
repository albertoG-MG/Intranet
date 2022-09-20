<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">Incidencias</h3>
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

                                <a href="incidencias.php" class="flex items-center text-blue-600 -px-2 hover:underline">
                                <svg  style="width:24px;height:24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>

                                    <span class="mx-2">Incidencias</span>
                                </a>

                            </div>
                        </div>
                        <div class="bg-white p-3 shadow-md rounded-b">
                            <div id="DT-div" style="display:none;">
                                <table class="w-full" id="datatable">
                                    <thead>
                                        <tr class="bg-black text-white uppercase text-sm leading-normal">
                                            <th class="py-3 text-left desktop">Id</th>
                                            <th class="py-3 text-left all">Nombre</th>
                                            <th class="py-3 text-left desktop">Tipo</th>
                                            <th class="py-3 text-left desktop">Fecha inicio</th>
                                            <th class="py-3 text-left desktop">Fecha fin</th>
                                            <th class="py-3 text-left desktop">Estado</th>
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