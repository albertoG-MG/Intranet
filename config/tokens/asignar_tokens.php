<?php
    require '../conexion.php';
    $object = new connection_database();

    $consulta = 'SELECT (CASE WHEN (expedientes.numero_expediente IS NULL) THEN "Sin asignar" ELSE expedientes.numero_expediente END) AS numero_expediente, expedientes.id AS expediente_id, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS asignado_a, usuarios.nombre_foto AS filename_foto, usuarios.foto_identificador AS foto_identificador, token_expediente.token AS token, token_expediente.exp_date AS exp_date, token_expediente.link AS link FROM token_expediente INNER JOIN expedientes ON expedientes.id=token_expediente.expedientes_id INNER JOIN usuarios ON usuarios.id=expedientes.users_id';
    $resultado = $object->_db->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>