<?php
include_once __DIR__ . "/../../../classes/incidencias.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
    Incidencias::EliminarIncidencias($id);
}
?>