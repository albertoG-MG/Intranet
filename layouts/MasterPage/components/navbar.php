<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>

    <div class="flex items-center">
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = ! dropdownOpen" class="flex items-center gap-3">
                <div class="relative shrink-0 block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                    <?php
                        $select_photo_user = $object -> _db -> prepare("SELECT nombre_foto, foto_identificador FROM usuarios WHERE id=:id");
                        $select_photo_user -> execute(array(":id" => $_SESSION["id"]));
                        $fetch_photo_user = $select_photo_user -> fetch(PDO::FETCH_OBJ);
                        if($fetch_photo_user -> nombre_foto != null && $fetch_photo_user -> foto_identificador != null){
                            $path = __DIR__ . "/../../../src/img/imgs_uploaded/".$fetch_photo_user -> foto_identificador;
                            if(!file_exists($path)){
                    ?>
                                <img id="navbar-photo" class="h-full w-full object-cover" src="../src/img/not_found.jpg">
                    <?php
                            }else{
                    ?>
                                <img id="navbar-photo" class="h-full w-full object-cover" src="../src/img/imgs_uploaded/<?php echo $fetch_photo_user -> foto_identificador ?>">
                    <?php          
                            }
                        }else{
                    ?>
                                <img id="navbar-photo" class="h-full w-full object-cover" src="../src/img/default-user.png">
                    <?php
                        }
                    ?>
                </div>
                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>chevron-down</title><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
                <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Cerrar sesión</a>
            </div>
        </div>
    </div>
</header>