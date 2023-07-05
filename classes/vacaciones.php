<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class vacaciones {
        
        public $periodo_vacaciones;
        
        public function __construct($holiday_period){
            $this->periodo_vacaciones = $holiday_period;
        }
        
        public function CrearSolicitudVacaciones($id, $days){
            $crud = new crud();
            $crud -> store ('solicitud_vacaciones', ['users_id' => $id, 'periodo_solicitado' => $this->periodo_vacaciones, 'dias_solicitados' => $days]);
        }
    }
?>
