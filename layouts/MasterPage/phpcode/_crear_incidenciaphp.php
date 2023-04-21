<?php
  include_once __DIR__ . "/../../../config/conexion.php";
  $object = new connection_database();
    
  session_start();

  if ($_SESSION['loggedin'] != true) {
      $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      header('Location: login.php');
      die();
  }

  if (Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
    header("HTTP/1.0 403 Forbidden");
    echo '<div class="error" style="width:100%; display:flex; flex-direction:column;">';
    echo '<h1>Prohibido</h1>';
    echo '<p>No tiene permiso para acceder a / esta parte del servidor.</p>';
    echo "<a style='--tw-bg-opacity: 1; background-color: rgb(126 58 242/var(--tw-bg-opacity)); --tw-text-opacity: 1; color: rgb(255 255 255/var(--tw-text-opacity)); font-weight: bold; line-height: 1.25rem; border-radius: 0.5rem; padding-bottom: 1.25rem; padding-top: 1.25rem; padding-left: 1.25rem; padding-right: 1.25rem; text-decoration: none;' href='dashboard.php'/>Regresar al dashboard</a>";
    echo '</div>';
    echo '
    <style>
    a:hover{
      --tw-bg-opacity: 1;
      background-color: rgb(67 56 202 / var(--tw-bg-opacity)) !important;
    }
    @media screen and (min-width: 601px) {
        div.error {
            font-size: 25px;
        }
        a{
            font-size: 25px;
            text-align: center;
        }
    }
    @media screen and (max-width: 600px) {
        div.error {
            font-size: 15px;
        }
        a{
          font-size: 15px;
          text-align: center;
        }
    }
    @media screen and (min-width: 800px) {
        div.error {
            font-size: 45px;
        }
        a{
          font-size: 45px;
          text-align: center;
        }
    }
    </style>';
    exit();
  }

  $check_jerarquia = $object -> _db -> prepare("select jerarquia_id from jerarquia where rol_id=:rolid");
	$check_jerarquia -> execute(array(':rolid' => $_SESSION["rol"]));
	$count_jerarquia = $check_jerarquia -> rowCount();
	$fetch_jerarquia = $check_jerarquia -> fetch(PDO::FETCH_OBJ);

  if($count_jerarquia > 0){
		if($fetch_jerarquia == null){
      header("HTTP/1.0 403 Forbidden");
      echo '<div class="error" style="width:100%; display:flex; flex-direction:column;">';
      echo '<h1>Prohibido</h1>';
      echo '<p>No tiene asignado un jefe.</p>';
      echo "<a style='--tw-bg-opacity: 1; background-color: rgb(126 58 242/var(--tw-bg-opacity)); --tw-text-opacity: 1; color: rgb(255 255 255/var(--tw-text-opacity)); font-weight: bold; line-height: 1.25rem; border-radius: 0.5rem; padding-bottom: 1.25rem; padding-top: 1.25rem; padding-left: 1.25rem; padding-right: 1.25rem; text-decoration: none;' href='dashboard.php'/>Regresar al dashboard</a>";
      echo '</div>';
      echo '
      <style>
      a:hover{
        --tw-bg-opacity: 1;
        background-color: rgb(67 56 202 / var(--tw-bg-opacity)) !important;
      }
      @media screen and (min-width: 601px) {
          div.error {
              font-size: 25px;
          }
          a{
              font-size: 25px;
              text-align: center;
          }
      }
      @media screen and (max-width: 600px) {
          div.error {
              font-size: 15px;
          }
          a{
            font-size: 15px;
            text-align: center;
          }
      }
      @media screen and (min-width: 800px) {
          div.error {
              font-size: 45px;
          }
          a{
            font-size: 45px;
            text-align: center;
          }
      }
      </style>';
      exit();
		}
	}else{
		header("HTTP/1.0 403 Forbidden");
    echo '<div class="error" style="width:100%; display:flex; flex-direction:column;">';
		echo '<h1>Prohibido</h1>';
    echo '<p>No tiene asignado una jerarquía.</p>';
    echo "<a style='--tw-bg-opacity: 1; background-color: rgb(126 58 242/var(--tw-bg-opacity)); --tw-text-opacity: 1; color: rgb(255 255 255/var(--tw-text-opacity)); font-weight: bold; line-height: 1.25rem; border-radius: 0.5rem; padding-bottom: 1.25rem; padding-top: 1.25rem; padding-left: 1.25rem; padding-right: 1.25rem; text-decoration: none;' href='dashboard.php'/>Regresar al dashboard</a>";
		echo '</div>';
    echo '
    <style>
    a:hover{
      --tw-bg-opacity: 1;
      background-color: rgb(67 56 202 / var(--tw-bg-opacity)) !important;
    }
    @media screen and (min-width: 601px) {
        div.error {
            font-size: 25px;
        }
        a{
            font-size: 25px;
            text-align: center;
        }
    }
    @media screen and (max-width: 600px) {
        div.error {
            font-size: 15px;
        }
        a{
          font-size: 15px;
          text-align: center;
        }
    }
    @media screen and (min-width: 800px) {
        div.error {
            font-size: 45px;
        }
        a{
          font-size: 45px;
          text-align: center;
        }
    }
    </style>';
    exit();
	}

  $bloquearboton = $object -> _db -> prepare("SELECT * FROM incidencias i INNER JOIN estatus_incidencia ei ON i.estatus_id=ei.id INNER JOIN usuarios u ON i.users_id=u.id WHERE u.id=:userid AND i.estatus_id = 4 ");
  $bloquearboton -> execute(array(':userid' => $_SESSION["id"]));
  $count_block = $bloquearboton -> rowCount();

  if($count_block > 0){
    header('Location: incidencias.php');
    die();
  }

  if(Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador"){
      $select_empleados = $object -> _db ->prepare("SELECT u2.id as userid, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) as nombre FROM jerarquia j1 INNER JOIN jerarquia j2 ON j1.id=j2.jerarquia_id INNER JOIN roles r2 ON r2.id=j2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id WHERE j2.jerarquia_id in (SELECT j3.jerarquia_id FROM jerarquia j3 GROUP BY j3.jerarquia_id HAVING j3.jerarquia_id >= (SELECT j4.id FROM jerarquia j4 INNER JOIN roles r3 ON r3.id=j4.rol_id WHERE r3.nombre=:rolnom AND IF(r3.nombre='Director general', d2.departamento IS NOT NULL, d2.departamento = (SELECT d3.departamento from usuarios u3 INNER JOIN departamentos d3 ON d3.id=u3.departamento_id WHERE u3.id=:sessionid))))");
      $select_empleados -> execute(array(':rolnom' => Roles::FetchSessionRol($_SESSION["rol"]), ':sessionid' => $_SESSION["id"]));
      $deploy_empleados = $select_empleados -> fetchAll(PDO::FETCH_ASSOC);
  }
?>