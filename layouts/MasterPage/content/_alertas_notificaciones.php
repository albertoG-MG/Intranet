<div class="container mx-auto px-6 py-8">
    <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
       Notificación
    </h2>
    <div class="mt-4">
        <div class="flex flex-col mt-8">
            <div class="overflow-x-auto">
                <div class="min-w-screen bg-transparent flex items-center justify-center font-sans overflow-hidden">
                    <div class="w-full">
                        <div class="bg-transparent p-3">
                            <div class="rounded-xl border border-gray-100 bg-gray-50 p-1">
                                <ul id='menu' class='flex items-center gap-2 text-sm font-medium'>
                                    <li role="presentation" class="flex-1">
                                        <button class="menu-active w-full relative flex items-center justify-center gap-2 rounded-lg bg-white px-3 py-2 shadow hover:bg-white hover:text-gray-700 hover:shadow" id="nvistas-tab" data-tabs-target="#nvistas" type="button" role="tab" aria-controls="nvistas" aria-selected="false">
                                            <span class="font-medium">No vistas</span>
                                        </button>
                                    </li>
                                    <li role="presentation" class="flex-1">
                                        <button class="w-full flex items-center justify-center gap-2 rounded-lg px-3 py-2 text-gray-500 hover:bg-white hover:text-gray-700 hover:shadow" id="vistas-tab" data-tabs-target="#vistas" type="button" role="tab" aria-controls="vistas" aria-selected="false">
                                            <span class="font-medium">Vistas</span>
                                        </button>
                                    </li>                                   
                                </ul>
                            </div>
                            <div id='menu-contents' style="word-break: break-word;">
                                <div class="block bg-transparent tab-pane" id="nvistas" role="tabpanel" aria-labelledby="nvistas-tab">
                                    <div id="nvistas_demo" class="mt-5" style="display:none;">
                                        <h2 class="text-2xl text-black font-semibold">Sin leer</h2>
                                        <div id="dataContainer_nvistas" class="flex flex-col space-y-4" style="word-break:break-word;">
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden bg-transparent tab-pane" id="vistas" role="tabpanel" aria-labelledby="vistas-tab">
                                    <div id="vistas_demo" class="mt-5" style="display:none;">
                                        <h2 class="text-2xl text-black font-semibold">Leídas</h2>
                                        <div id="dataContainer_vistas" class="flex flex-col space-y-4" style="word-break:break-word;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>