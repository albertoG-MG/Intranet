<div class="container mx-auto px-6 py-8">
  <h3 class="text-gray-700 text-3xl font-medium">Crear roles</h3>
  <div class="mt-4">
    <div class="flex flex-col mt-8">
      <div class="flex bg-gray-200 items-center justify-center mb-32">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12">
          <div class="flex justify-center py-4">
            <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
              </svg>
            </div>
          </div>

          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Roles</h1>
            </div>
          </div>

          <form id="Guardar" method="post">
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Escriba el nombre del rol</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border-2 border-indigo-600 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:border-transparent" type="text" id="rol" name="rol" placeholder="Input 1">
              </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Permisos</label>
              <div class="flex flex-col gap-3 sm:flex-wrap sm:flex-row">
              <?php 
              $permisos = permissions::FetchPermisos();
              foreach ($permisos as $row){
                echo "<div class='flex gap-3 items-center' style='flex: 1 0 21%'>";
                echo "<input type='checkbox' value='".$row->nombre."'>" .$row->nombre. "</>";
                echo "</div>";
              }
              ?>
            </div>
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
              <button class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</button>
              <button class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>