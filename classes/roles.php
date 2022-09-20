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
		$sql = "select roles.id, roles.nombre, jerarquia.id as jerarquiaid from jerarquia inner join roles on jerarquia.rol_id=roles.id";
        $fetchjerarquia = $object->_db->prepare($sql);
        $fetchjerarquia->execute();
        $jerarquia = $fetchjerarquia->fetchAll(PDO::FETCH_OBJ);
		return $jerarquia;
    }

    public static function FetchEditJerarquia($id){
        $object = new connection_database();
        $sql = "select roles.id, roles.nombre, jerarquia.id as jerarquiaid from jerarquia inner join roles on jerarquia.rol_id=roles.id where roles.id!=:rolid";
        $fetchjerarquia = $object->_db->prepare($sql);
        $fetchjerarquia->execute(array(':rolid' => $id));
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
        if($this->jerarquia != null){
            roles::Editarjerarquia($id, $this->jerarquia);         
        }else{
            $crud -> delete('jerarquia', 'rol_id=:rolid', ['rolid' => $id]);
        }
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

    public static function Editarjerarquia($rol_id, $jerarquia){
        $object = new connection_database();
        $crud=new crud();
        if($jerarquia == "SIN JEFE"){
            $jerarquia = null;
        }
        $sql = $object -> _db ->prepare("SELECT * from jerarquia where rol_id=:rolid");
        $sql -> execute(array(':rolid' => $rol_id));
        $check_jerarquia = $sql -> rowCount();
        if($check_jerarquia > 0 ){
            $crud->update('jerarquia', ['jerarquia_id' => $jerarquia], 'rol_id=:rolid', ['rolid' => $rol_id]);
        }else{
            $crud->store('jerarquia', ['rol_id' => $rol_id, 'jerarquia_id' => $jerarquia]);
        }
    }

    public static function EliminarRol($id){
		$crud = new crud();
		$crud->delete('roles', 'id=:idrol', ['idrol' => $id]);
	}
    
    public static function FetchSessionRol($id){
		$object = new connection_database();
		$check_rol = $object->_db->prepare("select nombre from roles where id=:sessionrol");
		$check_rol ->execute(array(':sessionrol' => $id));
		$fetch_rol = $check_rol -> fetch(PDO::FETCH_OBJ);
		return $fetch_rol->nombre;
    }
}
?>