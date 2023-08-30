<?php
    require 'conexion.php';
    $object = new connection_database();

    $no_of_records_per_page = $_GET["pageSize"];
    $pageno = $_GET["pageNumber"];
    $offset = ($pageno-1) * $no_of_records_per_page;

    $statement = $object -> _db -> prepare("SELECT comunicados.*, CONCAT(usuarios.nombre, ' ', usuarios.apellido_pat, ' ', usuarios.apellido_mat) AS nombre FROM comunicados INNER JOIN usuarios ON usuarios.id=comunicados.users_id ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
    $statement -> execute();
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
    print json_encode(['items_comunicados' => $data]);
?>