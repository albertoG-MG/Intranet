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
        }

        public static function Subir_historial($select2, $periodo_vacaciones, $days, $fecha_vacaciones, $estatus_vacaciones){
            $object = new connection_database();
            $crud = new crud();
            $crud -> store('historial_solicitud_vacaciones', ['users_id' => $select2, 'periodo_solicitado' => $periodo_vacaciones, 'dias_solicitados' => $days, 'fecha_solicitud' => $fecha_vacaciones, 'estatus' => $estatus_vacaciones]);
        }

        public static function Editar_historial($select2, $periodo_vacaciones, $days, $fecha_vacaciones, $estatus_vacaciones, $id_solicitud){
            $object = new connection_database();
            $crud = new crud();
            $crud -> update('historial_solicitud_vacaciones', ['users_id' => $select2, 'periodo_solicitado' => $periodo_vacaciones, 'dias_solicitados' => $days, 'fecha_solicitud' => $fecha_vacaciones, 'estatus' => $estatus_vacaciones], "id=:id", [":id" => $id_solicitud]);
        }

        public static function Eliminar_historial($id){
            $object = new connection_database();
            $crud = new crud();
			$crud -> delete('historial_solicitud_vacaciones', "id=:id", ['id' => $id]);
        }

        public static function Almacenar_estatus($solicitud_vacaciones, $estatus, $evaluado_por, $comentario){
            $object = new connection_database();
            $crud = new crud();
            $crud -> store ('accion_vacaciones', ['id_solicitud_vacaciones' => $solicitud_vacaciones, 'tipo_de_accion' => $estatus, 'comentario' => $comentario, 'evaluado_por' => $evaluado_por]);
            $update_state = $object -> _db -> prepare("UPDATE solicitud_vacaciones sv INNER JOIN (SELECT transicion_estatus_vacaciones.id_solicitud_vacaciones, transicion_estatus_vacaciones.estatus_siguiente FROM transicion_estatus_vacaciones WHERE transicion_estatus_vacaciones.id_solicitud_vacaciones=:solicitudid ORDER BY transicion_estatus_vacaciones.id desc LIMIT 1) temp ON sv.id=temp.id_solicitud_vacaciones SET sv.estatus = temp.estatus_siguiente");
            $update_state -> execute(array(':solicitudid' => $solicitud_vacaciones));
        }

        public static function editStatus($id, $estatus, $comentarios, $nombre_completo){
            $object = new connection_database();
            $crud = new crud();
            $crud -> update ('accion_vacaciones', ['tipo_de_accion' => $estatus, 'comentario' => $comentarios, 'evaluado_por' => $nombre_completo], "id_solicitud_vacaciones=:solicitudid", [":solicitudid" => $id]);
            $update_state = $object -> _db -> prepare("UPDATE solicitud_vacaciones sv INNER JOIN (SELECT transicion_estatus_vacaciones.id_solicitud_vacaciones, transicion_estatus_vacaciones.estatus_siguiente FROM transicion_estatus_vacaciones WHERE transicion_estatus_vacaciones.id_solicitud_vacaciones=:solicitudid ORDER BY transicion_estatus_vacaciones.id desc LIMIT 1) temp ON sv.id=temp.id_solicitud_vacaciones SET sv.estatus = temp.estatus_siguiente");
            $update_state -> execute(array(':solicitudid' => $id));
            //Vacaciones::send_editEstatus($id, $estatus, $comentarios);
        }
    }
?>
