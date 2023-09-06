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
                                
                                
                                
                                
                                
                            
                                
                            <?php }else{ ?>
                                <div class="flex items-center" style="word-break:break-word;">
                                        <div class="w-full flex flex-col items-center justify-center">
                                        <div class="text-center">
                                            <h2 class="flex flex-col lg:flex-row lg:gap-5 md:text-9xl text-5xl mb-8 font-extrabold">
                                                <span>Error </span>
                                                <span>404</span>
                                            </h2>
                                            <p class="text-2xl font-semibold md:text-3xl">El link ha expirado.</p>
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
