<?php
    include_once __DIR__ . "/../../../classes/avisos.php";
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        Avisos::eraseNotice($id);
    }
?>