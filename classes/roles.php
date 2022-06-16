<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class roles {
	
    public $roles;
    public $rolpermissions;
	
	public function __construct($rolnom, $rpermissions){
        $this->roles = $rolnom;
        $this->rolpermissions = $rpermissions;
	}
	
	public function CrearRol(){
        $object = new connection_database();
		$crud = new crud();
        $crud -> store('roles', ["nombre" => $this->roles]);
        $rol_id = $object -> _db->lastInsertId();
        roles::Asignarpermisos($rol_id, $this->rolpermissions);
	}

    protected static function Asignarpermisos($rol_id, $permissions){
        $crud = new crud();
        if($permissions == null){
            exit("success");
        }else{
            for($i = 0; $i < count($permissions); $i++){
                $crud -> store('rolesxpermisos', ["roles_id" => $rol_id, "permisos_id" => $permissions[$i]]);
            }
        }
    }

    public static function FetchRol(){
        $object = new connection_database();
		$sql = "SELECT * FROM roles";
        $fetchroles = $object->_db->prepare($sql);
        $fetchroles->execute();

        $roles = $fetchroles->fetchAll(PDO::FETCH_OBJ);
		return $roles;
    }
    
    public function EditarRol($id){
		
	}

    public static function EliminarRol($id){
		
	} 
}
?>