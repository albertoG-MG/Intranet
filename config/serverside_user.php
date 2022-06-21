<?php
require 'conexion.php';
$table_data->get('serverside_user','id',array('id', 'username','usnom','apellido_pat','apellido_mat', 'correo', 'roles_id', 'foto', 'rolnom', 'depa_id', 'depanom'));

?>
