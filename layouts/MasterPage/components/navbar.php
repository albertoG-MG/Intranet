<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-777" style="height: 11%; border-bottom-color: #c8760cc2;">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>

    <div class="flex items-center gap-3">
        <div class="relative">
            <button onclick="window.location='alertas_notificaciones.php';" class="flex items-center gap-3">
                <div id="notificacion_count_alert" class="absolute right-2.5 bottom-2.5 bg-blue-500 rounded-full" style="display:none;">
                    <span id="notification_alert" class="text-sm text-white p-1">0</span>
                </div>
                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#ffff" d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21" /></svg>
            </button>
        </div>
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
                <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>chevron-down</title><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
            <a href="perfil.php" class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap text-gray-700 hover:btn-celeste hover:text-white">
            <svg class="h-5" fill="#000000" viewBox="0 0 31 31" id="user-square" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#F7941E" stroke-width="4.8"><rect id="primary" x="2" y="2" width="20" height="20" rx="2" style="fill: #ffffff;"></rect><path id="secondary" d="M15.14,14.89a5,5,0,1,0-6.28,0A6,6,0,0,0,6,20v1a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V20A6,6,0,0,0,15.14,14.89Z" style="fill: #F7941E;"></path></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="2" y="2" width="20" height="20" rx="2" style="fill: #ffffff;"></rect><path id="secondary" d="M15.14,14.89a5,5,0,1,0-6.28,0A6,6,0,0,0,6,20v1a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V20A6,6,0,0,0,15.14,14.89Z" style="fill: #F7941E;"></path></g></svg>
              Ver perfil</a>   
            <a href="logout.php" class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap text-gray-700 hover:btn-celeste hover:text-white">
             <svg class="h-5" fill="#ff7300" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ff7300"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>logout</title> <path d="M0 9.875v12.219c0 1.125 0.469 2.125 1.219 2.906 0.75 0.75 1.719 1.156 2.844 1.156h6.125v-2.531h-6.125c-0.844 0-1.5-0.688-1.5-1.531v-12.219c0-0.844 0.656-1.5 1.5-1.5h6.125v-2.563h-6.125c-1.125 0-2.094 0.438-2.844 1.188-0.75 0.781-1.219 1.75-1.219 2.875zM6.719 13.563v4.875c0 0.563 0.5 1.031 1.063 1.031h5.656v3.844c0 0.344 0.188 0.625 0.5 0.781 0.125 0.031 0.25 0.031 0.313 0.031 0.219 0 0.406-0.063 0.563-0.219l7.344-7.344c0.344-0.281 0.313-0.844 0-1.156l-7.344-7.313c-0.438-0.469-1.375-0.188-1.375 0.563v3.875h-5.656c-0.563 0-1.063 0.469-1.063 1.031z"></path> </g></svg>
              Cerrar sesión</a>
            </div>
        </div>
    </div>

    <style>
        .bg-gray-opacity{
    background-color: rgb(16 22 35 / 96%);
    }

        .border-indigo-777{
    --tw-border-opacity: 1 !important;
    background: linear-gradient(186deg, #cf5700 -8%,#F7941E 51%, #cf5700 109%);
    border-top-color: ;
    border-right-color: ;
    border-bottom-color: ;
    border-left-color: ;
        }

        .btn-celeste{
		background-color: #00a3ff  !important;
		border: none !important;
		box-shadow: 3px 3px 4px 0px rgb(0 0 0 / 22%) !important;
		font-weight: 500 !important;
		border-bottom: #fff 9px;
	}
	
		.btn-celeste:hover{
		background-color: #008eff !important;
	}
    </style>
</header>