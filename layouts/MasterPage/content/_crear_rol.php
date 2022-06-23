<div class="container mx-auto px-6 py-8">
  <div class="flex items-center justify-center">
    <div class="grid w-11/12 md:w-9/12">
      <h3 class="text-gray-700 text-3xl font-medium">Crear roles</h3>
    </div>
  </div>
  <div class="mt-4">
    <div class="flex flex-col mt-8">
      <div class="flex bg-gray-200 items-center justify-center mb-32">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12">
          <div class="flex justify-center py-4">
            <div class="flex bg-white rounded-full md:p-4 p-2 border-2 border-black">
              <svg style="width:48px;" viewBox="0 0 24 24">
                <path fill="currentColor" d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M9.14 19.75L8.85 19L9.14 18.25C9.84 16.5 11.08 15.14 12.61 14.22C11.79 14.08 10.92 14 10 14C5.58 14 2 15.79 2 18V20H9.27C9.23 19.91 9.18 19.83 9.14 19.75M17 18C16.44 18 16 18.44 16 19S16.44 20 17 20 18 19.56 18 19 17.56 18 17 18M23 19C22.06 21.34 19.73 23 17 23S11.94 21.34 11 19C11.94 16.66 14.27 15 17 15S22.06 16.66 23 19M19.5 19C19.5 17.62 18.38 16.5 17 16.5S14.5 17.62 14.5 19 15.62 21.5 17 21.5 19.5 20.38 19.5 19Z" />
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
                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="rol" name="rol" placeholder="Input 1">
              </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Permisos</label>
              <div id="permissionarray" class="flex flex-col gap-3 sm:flex-wrap sm:flex-row">
              <?php 
              $permisos = permissions::FetchPermisos();
              foreach ($permisos as $row){
                echo "<div class='flex gap-3 items-center' style='flex: 1 0 21%'>";
                echo "<input type='checkbox' value='".$row->id."'>" .$row->nombre. "</>";
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