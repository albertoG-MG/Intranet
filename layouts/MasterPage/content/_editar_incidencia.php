<div class="container mx-auto px-6 py-8">
  <div class="flex items-center justify-center">
    <div class="grid w-11/12 md:w-9/12">
      <h3 class="text-gray-700 text-3xl font-medium">Editar incidencias</h3>
    </div>
  </div>
  <div class="mt-4">
    <div class="flex flex-col mt-8">
      <div class="flex bg-gray-200 items-center justify-center mb-32">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12">
          <div class="bg-gray-50 rounded-t">
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


              <span class="mx-5 rotate-90 sm:rotate-0 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </span>

              <a href="editar_incidencia.php?idIncidencia=<?php echo $editarid ?>" class="flex items-center text-blue-600 -px-2 hover:underline">
				<svg style="width:24px;height:24px" viewBox="0 0 24 24">
					<path fill="currentColor" d="M17.75 21.16L15 18.16L16.16 17L17.75 18.59L21.34 15L22.5 16.41L17.75 21.16M3 3H21V5C19.9 5 19 5.9 19 7V12C15.69 12 13 14.69 13 18C13 19.09 13.29 20.12 13.8 21H7C5.9 21 5 20.1 5 19V7C5 5.9 4.1 5 3 5V3M7 9V10H10V9H7M7 11V12H10V11H7M10 16V15H7V16H10M12 14V13H7V14H12M12 8V7H7V8H12Z" />
				</svg>

				<span class="mx-2">Editar Incidencia</span>
			   </a>

            </div>
          </div>


          <div class="flex justify-center py-4">
            <div class="flex bg-white rounded-full md:p-4 p-2 border-2 border-black">
			  <svg style="width:48px;" viewBox="0 0 24 24">
				<path fill="currentColor" d="M3,3V5A2,2 0 0,1 5,7V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V7A2,2 0 0,1 21,5V3H3M7,9H10V10H7V9M7,11H10V12H7V11M10,16H7V15H10V16M12,14H7V13H12V14M12,8H7V7H12V8Z" />
			  </svg>
            </div>
          </div>

          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Incidencias</h1>
            </div>
          </div>

          <form id="Guardar" method="post">
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Título de la incidencia</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-beaker text-gray-400 text-lg"></i></div>
                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="titulo" name="titulo" value="<?php echo "{$edit->titulo}"; ?>"  placeholder="Input 1">
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7 items-start">
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha inicio</label>
                <div class="group flex">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                  <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechainicio" name="fechainicio" value="<?php echo "{$edit->fecha_inicio}"; ?>" >
                </div>
              </div>
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha fin</label>
                <div class="group flex">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-calendar-range text-gray-400 text-lg"></i></div>
                  <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="date" id="fechafin" name="fechafin" value="<?php echo "{$edit->fecha_fin}"; ?>" >
                </div>
              </div>
            </div>
            
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de incidencia</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-pencil-box-multiple-outline text-gray-400 text-lg"></i></div>
                <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="tipo" name="tipo">
                  <option value="">--Selecciona--</option>
                  <option value="ACTA ADMINISTRATIVA"  <?php if ($edit->tipo_incidencia == "ACTA ADMINISTRATIVA") echo 'selected="selected"'; ?>>Acta admnistrativa</option>
                  <option value="INCAPACIDAD" <?php if ($edit->tipo_incidencia == "INCAPACIDAD") echo 'selected="selected"'; ?>>Incapacidad</option>
                  <option value="PERMISO" <?php if ($edit->tipo_incidencia == "PERMISO") echo 'selected="selected"'; ?>>Permiso</option>
                </select>
              </div>
            </div>
            
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Descripción</label>
              <textarea class="w-full rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="descripcion" name="descripcion" placeholder="Input 2"><?php echo "{$edit->descripcion}"; ?></textarea>
              <div id="error2"></div>
            </div>

            
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir comprobante</label>
              <div class='flex items-center justify-center w-full'>
              <label class='flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group'>
                <div class='flex flex-col items-center justify-center pt-7'>
                <div id="svg" <?php if($edit->foto != null && $edit->filename != null){ echo "class='hidden'";  } ?>>
                  <svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                </div>
                <img id="preview" <?php if($edit->foto != null && $edit->filename != null){ echo "class='w-10 h-10' src='".$edit->foto."'"; }else { echo "class='hidden'"; } ?> />
                <p id="archivo" class='lowercase text-sm text-center text-gray-400 group-hover:text-black pt-1 tracking-wider'><?php if ($edit->foto == null) { echo "Selecciona una imagen"; } else { echo $edit->filename; } ?></p>
                </div>
                <input type='file' id="foto" name="foto" class="hidden" />
              </label>
              </div>
              <div id="error"></div>
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
              <button class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id='cancelar' name='cancelar'>Cancelar</button>
              <button class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' id='grabar' name='grabar'>Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>