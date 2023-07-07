<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class vacaciones {
        
        public $periodo_vacaciones;
        
        public function __construct($holiday_period){
            $this->periodo_vacaciones = $holiday_period;
        }
        
        public function CrearSolicitudVacaciones($id, $days, $jefe_array){
            $object = new connection_database();
		    $crud = new crud();
            $crud -> store ('solicitud_vacaciones', ['users_id' => $id, 'periodo_solicitado' => $this->periodo_vacaciones, 'dias_solicitados' => $days]);
            $solicitud_id = $object -> _db -> lastInsertId();
            foreach($jefe_array as $correo){
                $selectid = $object -> _db -> prepare("SELECT id from usuarios where correo=:correo");
                $selectid -> execute(array('correo' => $correo));
                $insertid = $selectid -> fetch(PDO::FETCH_OBJ);
                $crud -> store ('notificaciones_vacaciones', ['id_solicitud_vacaciones' => $solicitud_id, 'id_notificado' => $insertid -> id]);
            }
            /*Incidencias::sendEmail($incidencia_id, $jefe_array, "incapacidad");*/
        }

        public static function Almacenar_estatus($solicitud_vacaciones, $estatus, $nombre_completo, $comentario){
            $object = new connection_database();
            $crud = new crud();
            $crud -> store ('accion_vacaciones', ['id_solicitud_vacaciones' => $solicitud_vacaciones, 'tipo_de_accion' => $estatus, 'comentario' => $comentario, 'evaluado_por' => $nombre_completo]);
            $update_state = $object -> _db -> prepare("UPDATE solicitud_vacaciones sv INNER JOIN (SELECT transicion_estatus_vacaciones.id_solicitud_vacaciones, transicion_estatus_vacaciones.estatus_siguiente FROM transicion_estatus_vacaciones WHERE transicion_estatus_vacaciones.id_solicitud_vacaciones=:solicitudid ORDER BY transicion_estatus_vacaciones.id desc LIMIT 1) temp ON sv.id=temp.id_solicitud_vacaciones SET sv.estatus = temp.estatus_siguiente");
            $update_state -> execute(array(':solicitudid' => $solicitud_vacaciones));
            //Incidencias::getResponse($incidenciaid, $estatus, $sueldo, $comentario);
        }
    }
?>
