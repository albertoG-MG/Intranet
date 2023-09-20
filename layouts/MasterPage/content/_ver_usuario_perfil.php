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
      Ver mis usuarios
   </h2>
   <div class="mt-4">
      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto">
            <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
               <div class="w-full">
                  <div class="bg-gray-50 shadow-md rounded-t">
                     <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                        <a href="dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
                           </svg>
                           Home
                        </a>
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
                        <a href="perfil.php" class='button bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100' id='regresar' name='regresar'>Regresar</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
