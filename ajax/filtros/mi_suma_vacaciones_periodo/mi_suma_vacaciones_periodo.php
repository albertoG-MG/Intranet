<?php
    include_once __DIR__ . "/../../../config/conexion.php";
    $object = new connection_database();
	session_start();
	
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $fecha_actual = date("Y/m/d");

    $statement = $object -> _db -> prepare('SELECT GROUP_CONCAT(historial_solicitud_vacaciones.id) AS id, CONCAT(usuarios.nombre, " ", MAX(usuarios.apellido_pat), " ", MAX(usuarios.apellido_mat)) AS nombre, CONCAT(DATE_FORMAT(:fecha_inicio, "%Y/%m/%d"), " - ", DATE_FORMAT(:fecha_fin, "%Y/%m/%d")) AS periodo, SUM(historial_solicitud_vacaciones.dias_solicitados) AS dias, DATE_FORMAT(:fecha_actual, "%Y/%m/%d") AS fecha_solicitud, historial_solicitud_vacaciones.estatus AS estatus FROM historial_solicitud_vacaciones INNER JOIN usuarios ON usuarios.id = historial_solicitud_vacaciones.users_id WHERE STR_TO_DATE(SUBSTRING_INDEX(historial_solicitud_vacaciones.periodo_solicitado, " - ", 1), "%Y/%m/%d") BETWEEN :fecha_inicio AND :fecha_fin OR STR_TO_DATE(SUBSTRING_INDEX(historial_solicitud_vacaciones.periodo_solicitado, " - ", -1), "%Y/%m/%d") BETWEEN :fecha_inicio AND :fecha_fin AND usuarios.id=:sessionid GROUP BY usuarios.nombre, periodo, estatus');
    $statement->execute(array(':fecha_inicio' => $fecha_inicio, ':fecha_fin' => $fecha_fin, ':fecha_actual' => $fecha_actual, ':sessionid' => $_SESSION["id"]));
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>