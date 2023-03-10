<?php
	include_once __DIR__ . "/../../config/conexion.php";
	$object = new connection_database();


	if(isset($_POST["id"])){
		$id = $_POST["id"];
		$select_user_departamento_correo = $object -> _db -> prepare("SELECT departamentos.departamento, usuarios.correo FROM usuarios LEFT JOIN departamentos ON usuarios.departamento_id = departamentos.id WHERE usuarios.id=:userid");
		$select_user_departamento_correo -> execute(array(':userid' => $id));
		$fetch_user_departamento_correo = $select_user_departamento_correo -> fetch(PDO::FETCH_OBJ);
		if($fetch_user_departamento_correo -> departamento != null && $fetch_user_departamento_correo -> correo != null){
			echo (json_encode(array($fetch_user_departamento_correo -> departamento , $fetch_user_departamento_correo -> correo)));
		}else if($fetch_user_departamento_correo -> departamento == null && $fetch_user_departamento_correo -> correo != null){
			echo (json_encode(array("Sin departamento", $fetch_user_departamento_correo -> correo)));
		}else if($fetch_user_departamento_correo -> departamento != null && $fetch_user_departamento_correo -> correo == null){
			echo (json_encode(array($fetch_user_departamento_correo -> departamento , "Sin correo")));
		}else if($fetch_user_departamento_correo -> departamento == null && $fetch_user_departamento_correo -> correo == null){
			echo (json_encode(array("Sin departamento" , "Sin correo")));
		}  
	}
?>