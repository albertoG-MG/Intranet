<?php
include_once __DIR__ . "/../../../classes/expedientes.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
    Expedientes::Eliminar_Historial_Papeleria($id);
}
?>