<?php
    require 'conexion.php';
    $table_data->get('serverside_historial_vacaciones','id',array('id', 'nombre', 'periodo', 'dias', 'fecha_solicitud', 'estatus'));
?>
