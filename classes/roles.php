<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class roles {
	
    public $roles;
    public $jerarquia;
    public $rolpermissions;
	
	public function __construct($rolnom, $hierarchy, $rpermissions){
        $this->roles = $rolnom;
        $this->jerarquia = $hierarchy;
        $this->rolpermissions = $rpermissions;
	}
	
	public function CrearRol(){
        $object = new connection_database();
		$crud = new crud();
        $crud -> store('roles', ["nombre" => $this->roles]);
        $rol_id = $object -> _db->lastInsertId();
        if($this->jerarquia != null){
            roles::Asignarjerarquia($rol_id, $this->jerarquia);         
        }
        if($this->rolpermissions != null){
        roles::Asignarpermisos($rol_id, $this->rolpermissions);
        }
	}

    public static function Asignarjerarquia($rol_id, $jerarquia){
        $crud=new crud();
        if($jerarquia == "SIN JEFE"){
            $crud->store('jerarquia', ['rol_id' => $rol_id]);
        }else{
            $crud->store('jerarquia', ['rol_id' => $rol_id, 'jerarquia_id' => $jerarquia]);
        }
    }

    protected static function Asignarpermisos($rol_id, $permissions){
        $crud = new crud();
        for($i = 0; $i < count($permissions); $i++){
            $crud -> store('rolesxpermisos', ["roles_id" => $rol_id, "permisos_id" => $permissions[$i]]);
        }
    }

    public static function FetchJerarquia(){
        $object = new connection_database();
        $superadministrador = 'Superadministrador';
        $administrador= 'administrador';
        $usuario_externo = 'Usuario externo';
		$sql = "select id, nombre from roles where nombre!=:superadministrador and nombre!=:administrador and nombre !=:usuario_externo";
        $fetchjerarquia = $object->_db->prepare($sql);
        $fetchjerarquia->execute(array('superadministrador' => $superadministrador, 'administrador' => $administrador, 'usuario_externo' => $usuario_externo));
        $jerarquia = $fetchjerarquia->fetchAll(PDO::FETCH_OBJ);
		return $jerarquia;
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
        $crud -> update('roles', ['nombre' => $this->roles], 'id=:id', ['id' => $id]);
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
		$crud = new crud();
		$crud->delete('roles', 'id=:idrol', ['idrol' => $id]);
	} 
}
?>