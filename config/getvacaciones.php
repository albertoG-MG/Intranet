<?php
	require 'conexion.php';
	include_once __DIR__ . "/../classes/permissions.php";
	include_once __DIR__ . "/../classes/roles.php";
	$object = new connection_database();

	$usuario_id = $_GET["usuarioid"];
	$expediente_id = $_GET["expedienteid"];

    //Checa si el usuario tiene status de ALTA Y BAJA
    $check_status = $object -> _db -> prepare("SELECT estatus_empleado.situacion_del_empleado AS situacion_del_empleado, estatus_empleado.estatus_del_empleado AS estatus_del_empleado, estatus_empleado.fecha AS estatus_fecha FROM estatus_empleado INNER JOIN expedientes ON expedientes.id=estatus_empleado.expedientes_id INNER JOIN usuarios ON usuarios.id=expedientes.users_id WHERE usuarios.id=:iduser");
    $check_status -> execute(array(':iduser' => $usuario_id));
    $count_status = $check_status -> rowCount();
    if($count_status == 0){
        die(json_encode(array("error", "El usuario no tiene un estatus asignado")));
    }else{
        $fetch_status = $check_status -> fetch(PDO::FETCH_OBJ);
        if($fetch_status -> situacion_del_empleado == "BAJA"){
            die(json_encode(array("error", "El usuario está dado de baja y no puede pedir vacaciones")));
        }
    }

    //Se calcula las vacaciones disponibles
    $fecha_estatus = $fetch_status -> estatus_fecha;
    $hoy =  date("Y-m-d");

    $d1 = new DateTime($hoy);
    $d2 = new DateTime($fecha_estatus);
    $diff = $d2->diff($d1);
    if($diff->y == 0) {
        $vacaciones = 0;
    }else if($diff->y == 1) {
        $vacaciones=12;
    }else if($diff->y == 2){
        $vacaciones=14;
    }else if($diff->y == 3){
        $vacaciones=16;
    }else if($diff->y == 4){
        $vacaciones=18;
    }else if($diff->y == 5){
        $vacaciones=20;
    }else{
        $acum=6;
        $acum2=10;
        $vacaciones=20;
        $counter=0;
        do {
            if(($acum > $diff->y) && ($diff->y < $acum2)){
                $counter++;
            }else{
                $vacaciones = $vacaciones + 2;
                $acum = $acum + 5;
                $acum2 = $acum2 + 5;
            }
        } while($counter <= 1);
    }

    //Se calculan los días ya usados y se obtienen las vacaciones restantes
    $check_update_vacaciones = $object -> _db -> prepare("SELECT COALESCE(SUM(dias_solicitados),0) AS dias_solicitados FROM solicitud_vacaciones where users_id=:userid AND (estatus=4 OR estatus=1)");
    $check_update_vacaciones -> execute(array(':userid' => $usuario_id));
    $fetch_update_sum_vacaciones = $check_update_vacaciones -> fetch(PDO::FETCH_OBJ);
    $dias_restantes = $vacaciones - $fetch_update_sum_vacaciones -> dias_solicitados;

    //Sacar la fecha de vencimiento
    function get_next_anniversary($anniversary) {
        $date = new DateTime($anniversary);
        $date->modify('+' . date('Y') - $date->format('Y') . ' years');
        if($date < new DateTime()) {
            $date->modify('+1 year');
        }
    
        return $date->format('Y/m/d');
    }
    
    $fecha_vencimiento = get_next_anniversary($fecha_estatus);

    //Checar el número de solicitudes hechas
    $check_request_vacaciones = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones where users_id=:userid");
    $check_request_vacaciones -> execute(array(':userid' => $usuario_id));
    $count_request = $check_request_vacaciones -> rowCount();

    //Checar el número de solicitudes aprobadas
    $check_request_vacaciones_approved = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones where users_id=:userid  AND estatus=1");
    $check_request_vacaciones_approved -> execute(array(':userid' => $usuario_id));
    $count_request_approved = $check_request_vacaciones_approved -> rowCount();

    //Checar el número de solicitudes rechazadas
    $check_request_vacaciones_rejected = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones where users_id=:userid AND estatus=3");
    $check_request_vacaciones_rejected -> execute(array(':userid' => $usuario_id));
    $count_request_rejected = $check_request_vacaciones_rejected -> rowCount();

    //Checar el número de solicitudes canceladas
    $check_request_vacaciones_canceled = $object -> _db -> prepare("SELECT * FROM solicitud_vacaciones where users_id=:userid AND estatus=2");
    $check_request_vacaciones_canceled -> execute(array(':userid' => $usuario_id));
    $count_request_canceled = $check_request_vacaciones_canceled -> rowCount();

    die(json_encode(array("success", $vacaciones, $dias_restantes, $fecha_estatus, $fecha_vencimiento, $count_request, $count_request_approved, $count_request_rejected, $count_request_canceled)));
?>
