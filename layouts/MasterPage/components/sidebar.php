<div class="flex items-center">
    <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"></path>
    </svg>

    <span class="text-white text-2xl mx-2 font-semibold">Sinttecom</span>
</div>
</div>

<nav class="mt-10">
    <?php if(basename($_SERVER['PHP_SELF']) == 'dashboard.php'){?>
    <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="dashboard.php">
    <?php }else{ ?>
    <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="dashboard.php">
    <?php } ?>
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
        </svg>

        <span class="mx-3">Dashboard</span>
    </a>

    <button class="flex w-full items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 group hover:text-gray-100" data-collapse-toggle="catalogos">
        <svg class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
            </path>
        </svg>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Catálogos</span>
        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>

    <ul id="catalogos" class="hidden py-2 space-y-2">
        <li>
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a usuarios") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'users.php' || basename($_SERVER['PHP_SELF']) == 'crear_usuario.php' || basename($_SERVER['PHP_SELF']) == 'editar_usuario.php' || basename($_SERVER['PHP_SELF']) == 'ver_usuario.php'){?>
                    <a href="users.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                <a href="users.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4">Usuarios</p>
                </a>
            <?php } ?>
            
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a roles") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'roles.php' || basename($_SERVER['PHP_SELF']) == 'permisos.php' || basename($_SERVER['PHP_SELF']) == 'crear_rol.php' || basename($_SERVER['PHP_SELF']) == 'editar_rol.php'){?>
                    <a href="roles.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="roles.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4">Roles</p>
                </a>
            <?php } ?>

            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a departamentos") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'departamentos.php'){?>
                    <a href="departamentos.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="departamentos.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4">Departamentos</p>
                </a>
            <?php } ?>    

            <?php if(basename($_SERVER['PHP_SELF']) == 'expedientes.php' || basename($_SERVER['PHP_SELF']) == 'crear_expediente.php' || basename($_SERVER['PHP_SELF']) == 'editar_expediente.php' || basename($_SERVER['PHP_SELF']) == 'ver_expediente.php'){?>
                <a href="expedientes.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
            <?php }else{ ?>
                <a href="expedientes.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
            <?php } ?>
                <p class="ml-4">Expedientes</p>
            </a>
        </li>
    </ul>

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        <?php if(basename($_SERVER['PHP_SELF']) == 'incidencias.php' || basename($_SERVER['PHP_SELF']) == 'crear_incidencia.php' || basename($_SERVER['PHP_SELF']) == 'editar_incidencia.php' || basename($_SERVER['PHP_SELF']) == 'ver_incidencia.php' || basename($_SERVER['PHP_SELF']) == 'solicitud_incidencia.php'){?>
            <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="incidencias.php">
        <?php }else{ ?>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="incidencias.php">
        <?php } ?>
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
            </path>
        </svg>

        <span class="mx-3">Incidencias</span>
    </a>
    <?php } ?>
</nav>