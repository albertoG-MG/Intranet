<?php
	require 'conexion.php';
	$table_data->get('serverside_expuser','expediente_id',array('num_empleado', 'nombre', 'estatus', 'departamento', 'rolnom', 'foto', 'expediente_id'));
?>