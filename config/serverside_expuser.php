<?php
	require 'conexion.php';
	$table_data->get('serverside_expuser','expediente_id',array('numero_expediente', 'nombre', 'estatus', 'departamento', 'rolnom', 'subnombre', 'foto', 'expediente_id'));
?>