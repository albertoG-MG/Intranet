<?php
    require 'conexion.php';
    $object = new connection_database();

    $statement = $object -> _db -> prepare("SELECT COUNT(*) AS totalrows FROM avisos");
    $statement -> execute();
    $data=$statement->fetch(PDO::FETCH_OBJ);
    print $data->totalrows;
?>
