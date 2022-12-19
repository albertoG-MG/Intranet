<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();

    $password = $_GET["password"];
    $query = $object ->_db->prepare("SELECT password from blacklist_password");
    $query->execute();
    $fetch_badword = $query -> fetchAll(PDO::FETCH_ASSOC);
    foreach($fetch_badword as $badword){
        if(strpos($password, $badword["password"]) !== false)
        {
            $output = "La contraseña no puede contener: " .$badword['password']. ", Por favor, modifique la contraseña";
            break;
        }else{
            $output = true;
        }
    }
    echo json_encode($output);
?>