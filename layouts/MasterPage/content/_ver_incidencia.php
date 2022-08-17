<div class="container mx-auto px-6 py-8">
  <div class="flex items-center justify-center">
    <div class="grid w-11/12 md:w-9/12">
      <h3 class="text-gray-700 text-3xl font-medium">Ver incidencias</h3>
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

              <a href="ver_incidencia.php?idIncidencia=<?php echo $verid ?>" class="flex items-center text-blue-600 -px-2 hover:underline">
				<svg style="width:24px;height:24px" viewBox="0 0 24 24">
					<path fill="currentColor" d="M3,3V5A2,2 0 0,1 5,7V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V7A2,2 0 0,1 21,5V3H3M7,9H10V10H7V9M7,11H10V12H7V11M10,16H7V15H10V16M12,14H7V13H12V14M12,8H7V7H12V8Z" />
				</svg>

				<span class="mx-2">Ver Incidencia</span>
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

          <div class="grid grid-cols-1">
            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 b-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Título de la incidencia</label>
              <span class="md:flex md:justify-end"><?php echo "{$ver->titulo}"; ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha inicio</label>
              <span class="md:flex md:justify-end"><?php echo "{$ver->fecha_inicio}"; ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Fecha fin</label>
              <span class="md:flex md:justify-end"><?php echo "{$ver->fecha_fin}"; ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tipo de incidencia</label>
              <span class="md:flex md:justify-end"><?php echo "{$ver->tipo_incidencia}"; ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estatus</label>
              <span class="md:flex md:justify-end"><?php echo "{$ver->estatus_incidencia}"; ?></span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Descripción</label>
              <span class="md:flex md:justify-end"><?php echo "{$ver->descripcion}"; ?></span>
            </div>

            
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Comprobante</label>
              <img id="preview" <?php if($ver->foto != null && $ver->filename != null){ echo "class='w-full' src='".$ver->foto."'"; }else { echo "class='hidden'"; } ?> />
              <a href="<?php echo "{$ver->foto}"; ?>" download="<?php echo "{$ver->filename}"; ?>" id="archivo" class='lowercase text-sm text-center pt-1 tracking-wider'><span class="text-blue-600 hover:border-b-2 hover:border-blue-600"><?php if ($ver->foto == null) { echo "No se encontró el comprobante en la base de datos"; } else { echo $ver->filename; } ?></span></a>         
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
              <a href="incidencias.php" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id='regresar' name='regresar'>Regresar</a>
              <a href="editar_incidencia.php?idIncidencia=<?php echo $verid ?>" class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' id='editar' name='editar'>Editar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>