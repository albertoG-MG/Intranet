<div class="container mx-auto px-6 py-8">
  <div class="flex items-center justify-center">
    <div class="grid w-11/12 md:w-9/12">
      <h3 class="text-gray-700 text-3xl font-medium">Editar Subroles</h3>
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

              <a href="roles.php" class="flex items-center text-gray-600 -px-2 hover:underline">
              <svg class="w-6 h-6 mx-2" viewBox="0 0 24 24">
                <path fill="currentColor" d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M9.14 19.75L8.85 19L9.14 18.25C9.84 16.5 11.08 15.14 12.61 14.22C11.79 14.08 10.92 14 10 14C5.58 14 2 15.79 2 18V20H9.27C9.23 19.91 9.18 19.83 9.14 19.75M17 18C16.44 18 16 18.44 16 19S16.44 20 17 20 18 19.56 18 19 17.56 18 17 18M23 19C22.06 21.34 19.73 23 17 23S11.94 21.34 11 19C11.94 16.66 14.27 15 17 15S22.06 16.66 23 19M19.5 19C19.5 17.62 18.38 16.5 17 16.5S14.5 17.62 14.5 19 15.62 21.5 17 21.5 19.5 20.38 19.5 19Z" />
              </svg>

              <span class="mx-2">Roles</span>
              </a>

              <span class="mx-5 rotate-90 sm:rotate-0 text-gray-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              </span>

              <a href="subroles.php" class="flex items-center text-gray-600 -px-2 hover:underline">
              <svg class="w-6 h-6 mx-2" viewBox="0 0 24 24">
                <path fill="currentColor" d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M12 18.2C12 17.24 12.5 16.34 13.2 15.74V15.5C13.2 15.11 13.27 14.74 13.38 14.38C12.35 14.14 11.21 14 10 14C5.58 14 2 15.79 2 18V20H12V18.2M22 18.3V21.8C22 22.4 21.4 23 20.7 23H15.2C14.6 23 14 22.4 14 21.7V18.2C14 17.6 14.6 17 15.2 17V15.5C15.2 14.1 16.6 13 18 13C19.4 13 20.8 14.1 20.8 15.5V17C21.4 17 22 17.6 22 18.3M19.5 15.5C19.5 14.7 18.8 14.2 18 14.2C17.2 14.2 16.5 14.7 16.5 15.5V17H19.5V15.5Z" />
              </svg>

              <span class="mx-2">Subroles</span>
              </a>
            
              <span class="mx-5 rotate-90 sm:rotate-0 text-gray-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              </span>
            
              <a href="editar_subrol.php?subrol=<?php echo $Editarid; ?>" class="flex items-center text-blue-600 -px-2 hover:underline">
              <svg class="w-6 h-6 mx-2" viewBox="0 0 24 24">
				<path fill="currentColor" d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.09 20.21,11.09 20.42,11.3L21.7,12.58C21.91,12.79 21.91,13.14 21.7,13.35M12,18.94L18.06,12.88L20.11,14.93L14.06,21H12V18.94M12,14C7.58,14 4,15.79 4,18V20H10V18.11L14,14.11C13.34,14.03 12.67,14 12,14M12,4A4,4 0 0,0 8,8A4,4 0 0,0 12,12A4,4 0 0,0 16,8A4,4 0 0,0 12,4Z" />
			  </svg>

              <span class="mx-2">Editar subrol</span>
              </a>

            </div>
          </div>


          <div class="flex justify-center py-4">
            <div class="flex bg-white rounded-full md:p-4 p-2 border-2 border-black">
              <svg style="width:48px;" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 17V19H7V17S7 13 13 13 19 17 19 17M16 8A3 3 0 1 0 13 11A3 3 0 0 0 16 8M19.2 13.06A5.6 5.6 0 0 1 21 17V19H24V17S24 13.55 19.2 13.06M18 5A2.91 2.91 0 0 0 17.11 5.14A5 5 0 0 1 17.11 10.86A2.91 2.91 0 0 0 18 11A3 3 0 0 0 18 5M8 10H5V7H3V10H0V12H3V15H5V12H8Z" />
              </svg>
            </div>
          </div>

          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Editar Subroles</h1>
            </div>
          </div>

          <form id="Guardar" method="post">
		  
		  
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Asignar subrol a</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-school text-gray-400 text-lg"></i></div>
                <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="roles" name="roles">
                  <option value="">---Seleccione---</option>
                  <?php
                    $roles = roles::FetchRol();
                    foreach ($roles as $row) {
                      if($row->nombre != "Superadministrador" && $row->nombre != "Administrador"){
                      echo "<option value='" . $row->id . "'"; if($row->id == $edit[0]->rolid){ echo "selected"; } echo ">";
                      echo "" . $row->nombre . "";
                      echo "</option>";
                      }
                    }
                  ?>
                </select>
              </div>
            </div>

		  
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Escriba el nombre del subrol</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="subrol" name="subrol" value="<?php echo $edit[0]->subnom; ?>" placeholder="Input 2">
              </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Permisos</label>
              <div id="permissionarray">
              </div>
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
              <a href="subroles.php" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id='regresar' name='regresar'>Regresar</a>
              <button class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' id='grabar' name='grabar'>Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>