<?php
    include_once __DIR__ . "/../../../classes/alertas.php";
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        Alertas::eraseAlerts($id);
    }
?>