<?php
include_once __DIR__ . "/../../config/conexion.php";
$object = new connection_database();


if(isset($_POST["id"])){
    $id = $_POST["id"];
    $select_user_departamento = $object -> _db -> prepare("SELECT departamentos.departamento FROM usuarios LEFT JOIN departamentos ON usuarios.departamento_id = departamentos.id WHERE usuarios.id=:userid");
    $select_user_departamento -> bindParam('userid', $id, PDO::PARAM_INT);
    $select_user_departamento -> execute();
    $fetch_user_departamento = $select_user_departamento -> fetch(PDO::FETCH_OBJ);
    echo json_encode($fetch_user_departamento -> departamento);
}
?>