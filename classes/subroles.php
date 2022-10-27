<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class subroles {
	
    public $roles;
    public $subroles;
    public $subrolpermissions;
	
	public function __construct($rolnom, $subrolnom, $srpermissions){
        $this->roles = $rolnom;
        $this->subroles = $subrolnom;
        $this->subrolpermissions = $srpermissions;
	}
	
	public function CrearSubrol(){
        $object = new connection_database();
		$crud = new crud();
        $crud -> store('subroles', ["roles_id" => $this->roles,"subrol_nombre" => $this->subroles]);
        $subrol_id = $object -> _db->lastInsertId();
        if($this->subrolpermissions != null){
        subroles::Asignarpermisos($subrol_id, $this->subrolpermissions);
        }
	}

    protected static function Asignarpermisos($subrol_id, $permissions){
        $crud = new crud();
        for($i = 0; $i < count($permissions); $i++){
            $crud -> store('subrolesxpermisos', ["subroles_id" => $subrol_id, "permisos_id" => $permissions[$i]]);
        }
    }
}
?>