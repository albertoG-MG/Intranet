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
        if($this->rolpermissions != null){
        roles::Asignarpermisos($rol_id, $this->rolpermissions);
        }
	}

    protected static function Asignarpermisos($rol_id, $permissions){
        $crud = new crud();
        for($i = 0; $i < count($permissions); $i++){
            $crud -> store('rolesxpermisos', ["roles_id" => $rol_id, "permisos_id" => $permissions[$i]]);
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
		$object = new connection_database();
        $crud = new crud();
        $checkrolesxpermisos = $object -> _db -> prepare("SELECT permisos_id FROM rolesxpermisos WHERE roles_id=:idrol");
        $checkrolesxpermisos -> execute(array(":idrol" => $id));
        $fetchroles = $checkrolesxpermisos -> fetchAll(PDO::FETCH_COLUMN);
        $countdatabase = count($fetchroles);
        $countselected = count($this->rolpermissions);

        if($countdatabase > $countselected){
            for($i=0; $i<$countdatabase; $i++){
                for($j=0; $j<$countselected; $j++){
                    if($fetchroles[$i] == $this->rolpermissions[$j]){
                        unset($fetchroles[$i]);
                        break;
                    }
                }
            }
            $params = ["rolid" => $id];
            $in = "";
            $i = 0;
            foreach ($fetchroles as $item)
            {
                $key = ":id".$i++;
                $in .= ($in ? "," : "") . $key; // :id0,:id1,:id2
                $in_params[$key] = $item; // collecting values into a key-value array
            }

        $crud->delete('rolesxpermisos', 'roles_id=:rolid AND permisos_id IN('.$in.')', array_merge($params,$in_params));
        }else if($countdatabase < $countselected){
            for($i=0; $i<$countselected; $i++){
                for($j=0; $j<$countdatabase; $j++){
                    if($fetchroles[$j] == $this->rolpermissions[$i]){
                        unset($this->rolpermissions[$i]);
                        break;
                    }
                }
            }
            $params = ["roles_id" => $id];
            foreach ($this->rolpermissions as $item)
            {
                $key = "permisos_id";
                $in_params[$key] = $item; // collecting values into a key-value array
                $crud -> store('rolesxpermisos', array_merge($params, $in_params));
            }
            
        }
	}

    public static function EliminarRol($id){
		
	} 
}
?>