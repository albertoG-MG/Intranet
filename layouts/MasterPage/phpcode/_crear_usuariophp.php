<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    include_once __DIR__ . "/../../../classes/departamentos.php";
    $object = new connection_database();
    
    session_start();
    if ($_SESSION['loggedin'] != true) {
        $_SESSION['redirectURL'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        die();
    }

    if (Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "false" && Roles::FetchSessionRol($_SESSION["rol"]) != "Superadministrador" && Roles::FetchSessionRol($_SESSION["rol"]) != "Administrador") {
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
?>