<?php
		include_once __DIR__ . "/../../../config/conexion.php";
		$object = new connection_database();

		$subrol = $_GET["subrol"];
		$query = $object ->_db->prepare("SELECT subrol_nombre from subroles where subrol_nombre=:subrolnom");
		$query -> execute(array(":subrolnom" => $subrol));
		$subrolcount = $query->rowCount();
		if($subrolcount > 0){
			$output = false;
		}else{
			$output = true;
		}
		echo json_encode($output);
?>