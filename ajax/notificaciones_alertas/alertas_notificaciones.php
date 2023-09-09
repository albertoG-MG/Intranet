<?php
	include_once __DIR__ . "/../../config/conexion.php";
	$object = new connection_database();
	session_start();

	if(isset($_POST['view']))
	{

		if($_POST["view"] != '')

		{
		   $update_alert = $object -> _db -> prepare("UPDATE alerta_notificaciones SET alerta_estatus = 1 WHERE alerta_estatus=0 AND id=:id");
		   $update_alert -> execute(array(':id' => $_POST["view"]));
		}

		$status_query = $object -> _db -> prepare("SELECT * FROM alerta_notificaciones WHERE alerta_estatus=0 AND notificado_a=:sessionid");
		$status_query -> execute(array(':sessionid' => $_SESSION["id"]));
		$count_query = $status_query -> rowCount();


		$data = array(
		   'unseen_notification'  => $count_query
		);

		echo json_encode($data);
	}
?>