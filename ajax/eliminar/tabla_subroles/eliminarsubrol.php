<?php
    include_once __DIR__ . "/../../../classes/subroles.php";
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        Subroles::Eliminarsubrol($id);
    }
?>