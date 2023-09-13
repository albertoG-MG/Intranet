<?php
    include_once __DIR__ . "/../../../classes/comunicados.php";
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        Comunicados::eraseCommunicate($id);
    }
?>