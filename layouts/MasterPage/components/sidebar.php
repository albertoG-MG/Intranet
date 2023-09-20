<div class="flex items-center">
    <img class="h-2 w-2" src="../src/img/Sinttecom_logoblanco.png" alt="Sinttecom">

   <!-- <span class="text-white text-2xl mx-2 font-semibold">inttecom</span> -->
</div>
</div>

<nav class="mt-10">

    <!-- <div class="px-6">
        <div class="text-indigo-400 text-xs font-semibold tracking-wider uppercase">
            <span> 
                Dashboard
            </span>
        </div>
        <div class="bg-opacity-25 text-gray-500" style="font-size: 11px; line-height: 1.5">
            <span> 
                El dashboard de la intranet
            </span>
        </div>
    </div> -->

    <?php if(basename($_SERVER['PHP_SELF']) == 'dashboard.php' || basename($_SERVER['PHP_SELF']) == 'perfil.php' || basename($_SERVER['PHP_SELF']) == 'ver_usuario_perfil.php' || basename($_SERVER['PHP_SELF']) == 'ver_expediente_perfil.php'){?>
    <a class="flex items-center mt-12 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="dashboard.php">
    <?php }else{ ?>
    <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="dashboard.php">
    <?php } ?>
        <svg class="h-6 w-6" style="color: white;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
        </svg>

        <span class="mx-3" style="color: white; font-size: 112%;">Dashboard</span>
    </a>

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a usuarios") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a roles") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a departamentos") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
        <div class="px-6 mt-5">
            <div class="text-gray-200 text-xs font-semibold tracking-wider uppercase">
                <span> 
                    Navegación
                </span>
            </div>
            <div class="bg-opacity-25 text-gray-200" style="font-size: 11px; line-height: 1.5">
                <span> 
                    Secciones de la intranet
                </span>
            </div>
        </div>
    <?php } ?>

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a usuarios") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a roles") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a departamentos") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
        <button class="flex w-full items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 group hover:text-gray-100" data-collapse-toggle="catalogos">
        <svg class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-white" style="color: white; font-size: 112%;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
            </path>
        </svg>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" style="color: white; font-size: 112%;" sidebar-toggle-item>Usuarios</span>
        <svg sidebar-toggle-item class="w-6 h-6" style="color: white; font-size: 112%;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>

    <ul id="catalogos" class="hidden py-2 space-y-2">
        <li>
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a usuarios") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'users.php' || basename($_SERVER['PHP_SELF']) == 'editar_usuario.php' || basename($_SERVER['PHP_SELF']) == 'ver_usuario.php'){?>
                    <a href="users.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                <a href="users.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Consultar</p>
                </a>
            <?php } ?>

            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'crear_usuario.php' || basename($_SERVER['PHP_SELF']) == 'editar_usuario.php' || basename($_SERVER['PHP_SELF']) == 'ver_usuario.php'){?>
                    <a href="crear_usuario.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                <a href="crear_usuario.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Crear Usuario</p>
                </a>
            <?php } ?>
            
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a roles") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'roles.php' || basename($_SERVER['PHP_SELF']) == 'permisos.php' || basename($_SERVER['PHP_SELF']) == 'crear_rol.php' || basename($_SERVER['PHP_SELF']) == 'editar_rol.php' || basename($_SERVER['PHP_SELF']) == 'permisocategoria.php' || basename($_SERVER['PHP_SELF']) == 'subroles.php' || basename($_SERVER['PHP_SELF']) == 'crear_subrol.php' || basename($_SERVER['PHP_SELF']) == 'editar_subrol.php'){?>
                    <a href="roles.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="roles.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Roles</p>
                </a>
            <?php } ?>

            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a departamentos") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'departamentos.php'){?>
                    <a href="departamentos.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="departamentos.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Departamentos</p>
                </a>
            <?php } ?>    

            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a expedientes") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
            <?php if(basename($_SERVER['PHP_SELF']) == 'expedientes.php' || basename($_SERVER['PHP_SELF']) == 'crear_expediente.php' || basename($_SERVER['PHP_SELF']) == 'editar_expediente.php' || basename($_SERVER['PHP_SELF']) == 'ver_expediente.php' || basename($_SERVER['PHP_SELF']) == 'ver_historial.php'){?>
                <a href="expedientes.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
            <?php }else{ ?>
                <a href="expedientes.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
            <?php } ?>
                <p class="ml-4" style="color: white;">Expedientes</p>
            </a>
            <?php } ?>
        </li>
    </ul>
    <?php } ?>

    <!-- <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        <?php if(basename($_SERVER['PHP_SELF']) == 'incidencias.php' || basename($_SERVER['PHP_SELF']) == 'crear_incidencia.php' || basename($_SERVER['PHP_SELF']) == 'ver_incidencia.php' || basename($_SERVER['PHP_SELF']) == 'solicitud_incidencia.php' || basename($_SERVER['PHP_SELF']) == 'actas_cartas.php' || basename($_SERVER['PHP_SELF']) == 'editar_documento_administrativo.php' || basename($_SERVER['PHP_SELF']) == 'ver_documento_administrativo.php' || basename($_SERVER['PHP_SELF']) == 'ver_documento_vinculado.php'){?>
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
    <?php } ?> -->

    <!-- Modulo Incidencias con Submodulos -->
<?php if(Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
    <button class="flex w-full items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 group hover:text-gray-100" data-collapse-toggle="incidencia">
    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-white" style="color: white;font-size: 112%;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
            </path>
        </svg>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" style="color: white; font-size: 112%;" sidebar-toggle-item>Incidencias</span>
        <svg sidebar-toggle-item class="w-6 h-6" style="color: white;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
    <ul id="incidencia" class="hidden py-2 space-y-2">
        <li>
        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        <?php if(basename($_SERVER['PHP_SELF']) == 'incidencias.php' || basename($_SERVER['PHP_SELF']) == 'ver_documento_vinculado.php'){?>
            <a href="incidencias.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="incidencias.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Consultar</p>
            </a>
         <?php } ?>

         <?php  $check_jerarquia = $object -> _db -> prepare("SELECT * FROM jerarquia INNER JOIN roles ON roles.id=jerarquia.rol_id INNER JOIN usuarios ON usuarios.roles_id=roles.id WHERE usuarios.id=:userid AND jerarquia.jerarquia_id is NOT NULL");
                $check_jerarquia -> execute(array(":userid" => $_SESSION["id"]));
                $count_jerarquia = $check_jerarquia -> rowCount(); ?>
         <?php if($count_jerarquia > 0) {?>      
         <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        <?php if(basename($_SERVER['PHP_SELF']) == 'Mis_incidencias.php' || basename($_SERVER['PHP_SELF']) == 'ver_documento_vinculado.php'){?>
            <a href="Mis_incidencias.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="Mis_incidencias.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Mis Incidencias</p>
            </a>
         <?php } ?>
         <?php } ?>
         <?php if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true" || (Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "true")) || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        <?php if(basename($_SERVER['PHP_SELF']) == 'crear_incidencia.php' || basename($_SERVER['PHP_SELF']) == 'ver_documento_vinculado.php'){?>
            <a href="crear_incidencia.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="crear_incidencia.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Crear Incidencia</p>
            </a>
         <?php } ?>
            
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a solicitud incidencias") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'solicitud_incidencia.php' || basename($_SERVER['PHP_SELF']) == 'ver_incidencia.php'){?>   
                <a href="solicitud_incidencia.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="solicitud_incidencia.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Evaluar Incidencias</p>
                </a>
            <?php } ?>
   
            <?php if ((Permissions::CheckPermissions($_SESSION["id"], "Acceso a incidencias") == "true" || (Permissions::CheckPermissions($_SESSION["id"], "Acceso a acta administrativa") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a carta compromiso") == "true")) || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'actas_cartas.php' || basename($_SERVER['PHP_SELF']) == 'editar_documento_administrativo.php' || basename($_SERVER['PHP_SELF']) == 'ver_documento_administrativo.php'|| basename($_SERVER['PHP_SELF']) == 'ver_documento_vinculado.php' ){?>   
                <a href="actas_cartas.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="actas_cartas.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Actas y Cartas</p>
                </a>
            <?php } ?>
        </li>
    </ul>
    <?php } ?>
<!-- FIN Modulo Incidencias con Submodulos -->

    <!-- <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
	<?php if(basename($_SERVER['PHP_SELF']) == 'vacaciones.php' || basename($_SERVER['PHP_SELF']) == 'solicitud_vacaciones.php' || basename($_SERVER['PHP_SELF']) == 'historial_vacaciones.php' || basename($_SERVER['PHP_SELF']) == 'subir_historial.php' || basename($_SERVER['PHP_SELF']) == 'editar_historial_solicitud.php'){?>
		<a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="vacaciones.php">
	<?php }else{ ?>
		<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="vacaciones.php">
	<?php } ?>
			<svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
			</svg>

			<span class="mx-3">Vacaciones</span>
		</a>
    <?php } ?> -->

          <!-- Modulo Vacaciones con Submodulos -->
          <?php if(Permissions::CheckPermissions($_SESSION["id"], "Acceso a vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
    <button class="flex w-full items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 group hover:text-gray-100" data-collapse-toggle="vacaciones">
    <svg class="flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-white" style="color: white;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z">
            </path>
        </svg>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" style="color: white; font-size: 112%;" sidebar-toggle-item>Vacaciones</span>
        <svg sidebar-toggle-item class="w-6 h-6" style="color: white;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>

    <ul id="vacaciones" class="hidden py-2 space-y-2">
        <li>
           <?php if (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
	          <?php if(basename($_SERVER['PHP_SELF']) == 'vacaciones.php'){?>
		      <a class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100" href="vacaciones.php">
	          <?php }else{ ?>
	    	  <a class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="vacaciones.php">
	          <?php } ?>
			  <p class="ml-4" style="color: white;">Consulta</p>
		      </a>
              <?php } ?>

        <?php $check_jerarquia = $object -> _db -> prepare("SELECT * FROM jerarquia INNER JOIN roles ON roles.id=jerarquia.rol_id INNER JOIN usuarios ON usuarios.roles_id=roles.id WHERE usuarios.id=:userid AND jerarquia.jerarquia_id is NOT NULL");
              $check_jerarquia -> execute(array(":userid" => $_SESSION["id"]));
              $count_jerarquia = $check_jerarquia -> rowCount(); ?>

            <?php if($count_jerarquia > 0) {?>    
              <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
	          <?php if(basename($_SERVER['PHP_SELF']) == 'mis_vacaciones.php'){?>
		      <a class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100" href="mis_vacaciones.php">
	          <?php }else{ ?>
	    	<a class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="mis_vacaciones.php">
	          <?php } ?>
			<p class="ml-4" style="color: white;">Mis vacaciones</p>
		    </a>
              <?php } ?>
              <?php } ?>
         
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso al historial de vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'historial_vacaciones.php' || basename($_SERVER['PHP_SELF']) == 'subir_historial.php' || basename($_SERVER['PHP_SELF']) == 'editar_historial_solicitud.php'){?>   
                <a href="historial_vacaciones.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="historial_vacaciones.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Historial</p>
                </a>
            <?php } ?>

            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a solicitud vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
                <?php if(basename($_SERVER['PHP_SELF']) == 'solicitud_vacaciones.php' ){?>   
                <a href="solicitud_vacaciones.php" class="flex items-center p-2 pl-11 w-full transition duration-75 bg-gray-700 bg-opacity-25 text-gray-100">
                <?php }else{ ?>
                    <a href="solicitud_vacaciones.php" class="flex items-center p-2 pl-11 w-full transition duration-75 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                <?php } ?>
                    <p class="ml-4" style="color: white;">Evaluar Vacaciones</p>
                </a>
            <?php } ?>
        </li>
    </ul>
    <?php } ?>
<!-- FIN Modulo Vacaciones con Submodulos -->
</nav>
