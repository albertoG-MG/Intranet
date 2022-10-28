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

    public static function Check_rol_subrol($id){
        $object = new connection_database();
		$sql = "select * from subroles inner join roles on roles.id=subroles.roles_id WHERE subroles.id=:subrol";
        $query_subrol = $object->_db->prepare($sql);
        $query_subrol->execute(array(':subrol' => $id));
        $count_subrol = $query_subrol->rowCount();
		return $count_subrol;
    }

    public static function fetch_rol_subrol($id){
        $object = new connection_database();
		$sql = "select subroles.id as subid, subroles.subrol_nombre as subnom, roles.id as rolid, roles.nombre as rolnom from subroles inner join roles on roles.id=subroles.roles_id WHERE subroles.id=:subrol";
        $query_rol_subrol = $object->_db->prepare($sql);
        $query_rol_subrol -> execute(array(':subrol' => $id));
        $fetch_rol_subrol = $query_rol_subrol -> fetchAll(PDO::FETCH_OBJ);
		return $fetch_rol_subrol;
    }
}
?>