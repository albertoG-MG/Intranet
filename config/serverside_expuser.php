<?php
require 'conexion.php';
$table_data->get('serverside_expuser','exp_id',array('exp_id', 'usernom', 'userpat', 'usermat', 'fechaalta'));
?>