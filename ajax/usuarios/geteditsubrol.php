<?php 
    include_once __DIR__ . "/../../config/conexion.php";
    $object = new connection_database();

    $get_subrol = $object -> _db -> prepare("select * from subroles where roles_id=:rolid");
    $get_subrol -> execute(array(':rolid' => $_POST["roles_id"]));
    $count_subrol = $get_subrol -> rowCount();
    if($count_subrol > 0){
        echo "<option value=''>Sin subrol</option>";
        $array = [];
        while ($fetch_subrol = $get_subrol -> fetch(PDO::FETCH_OBJ)){
            $array [] = array("id" => $fetch_subrol->id, "nombre" => $fetch_subrol->subrol_nombre);
        }
        foreach($array as $row){
            echo "<option value='".$row['id']."'"; if(isset($_POST['subrol_id'])){ if ($row['id'] == $_POST['subrol_id']){ echo "selected"; }} echo ">".$row['nombre']."</option>";
        }
    }else{
        echo "<option value=''>Sin subrol</option>";
    }
?>