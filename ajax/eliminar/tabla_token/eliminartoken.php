<?php
    include_once __DIR__ . "/../../../classes/expedientes.php";
    if(isset($_POST["eliminar_token"])){
        $eliminar_token = $_POST["eliminar_token"];
        Expedientes::Eliminar_Token($eliminar_token);
    }
?>