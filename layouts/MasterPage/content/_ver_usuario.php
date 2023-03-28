<div class="container mx-auto px-6 py-8">
   <h2 class="font-['Raleway,sans-serif'] text-3xl font-semibold uppercase text-[#5540af] sm:text-5xl lg:text-6xl">
      Ver usuarios
   </h2>
   <div class="mt-4">
      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto">
            <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
               <div class="w-full">
                  <div class="bg-gray-50 shadow-md rounded-t">
                     <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                        <a href="dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#4f46e5] hover:text-[#4f46e5]">
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
                        <a href="users.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#4f46e5] hover:text-[#4f46e5]">
                           <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                           </svg>
                           Usuarios
                        </a>
                        <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                        <div class="flex items-center text-gray-400">
                           <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M9.14 19.75L8.85 19L9.14 18.25C9.84 16.5 11.08 15.14 12.61 14.22C11.79 14.08 10.92 14 10 14C5.58 14 2 15.79 2 18V20H9.27C9.23 19.91 9.18 19.83 9.14 19.75M17 18C16.44 18 16 18.44 16 19S16.44 20 17 20 18 19.56 18 19 17.56 18 17 18M23 19C22.06 21.34 19.73 23 17 23S11.94 21.34 11 19C11.94 16.66 14.27 15 17 15S22.06 16.66 23 19M19.5 19C19.5 17.62 18.38 16.5 17 16.5S14.5 17.62 14.5 19 15.62 21.5 17 21.5 19.5 20.38 19.5 19Z"></path>
                           </svg>
                           <span class="text-sm font-medium">Ver usuarios</span>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white p-3 shadow-md rounded-b">
                     <div class="flex flex-col mt-5 mx-7">
                        <h2 class="text-2xl text-[#64748b] font-semibold">Detalles del usuario</h2>
                        <span class="text-[#64748b]">En esta sección, se mostrará todos los datos del usuario.</span>
                        <div class="my-3 h-px bg-slate-200"></div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Usuario:
                           </div>
                           <span>
                           <?php echo "{$row->username}"; ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Nombre:
                           </div>
                           <span>
                           <?php echo "{$row->nombre}"; ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Apellido paterno:
                           </div>
                           <span>
                           <?php echo "{$row->apellido_pat}"; ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Apellido materno:
                           </div>
                           <span>
                           <?php echo "{$row->apellido_mat}"; ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Correo:
                           </div>
                           <span>
                           <?php echo "{$row->correo}"; ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Rol:
                           </div>
                           <span>
                           <?php if($row->rolnom == null){ echo "Sin rol"; }else{ echo $row->rolnom; } ?>
                           </span>
                        </div>
                     </div>
                     <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-7 mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Subrol:
                           </div>
                           <span>
                           <?php if($row->subnom == null){ echo "Sin subrol"; }else{ echo $row->subnom; } ?>
                           </span>
                        </div>
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Departamento:
                           </div>
                           <span>
                           <?php if($row->depanom == null){ echo "Sin departamento"; }else{ echo $row->depanom; } ?>
                           </span>
                        </div>
                     </div>
                     <div class="mt-12 h-px bg-slate-200"></div>
                     <div class="flex flex-col mx-7">
                        <div class="flex-1 flex flex-col mt-5">
                           <div class="text-[#64748b] font-semibold">
                              Foto:
                           </div>
                           <label class='flex flex-col border-4 border-dashed w-full group'>
                              <div class='flex flex-col items-center justify-center pt-7'>
                                 <div id="svg">
                                    <svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                 </div>
                                 <img id="preview" class="hidden" />
                                 <p id="archivo" style="word-break:break-word;" class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>Cargando...</p>
                              </div>
                           </label>
                        </div>
                     </div>
                     <div class="mt-12 h-px bg-slate-200"></div>
                     <div class='flex flex-col-reverse items-center gap-3 md:flex-row md:justify-end md:space-x-2 mx-7 mt-5'>
                        <a href="users.php" class='button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100' id='regresar' name='regresar'>Regresar</a>
                        <a href="editar_usuario.php?idUser=<?php echo $verid; ?>" class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='editar' name='editar'>Editar</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>