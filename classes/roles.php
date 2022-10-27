<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class roles {
	
    public $roles;
    public $jerarquia;
    public $rolcategorias;
	
	public function __construct($rolnom, $hierarchy, $rcategorias){
        $this->roles = $rolnom;
        $this->jerarquia = $hierarchy;
        $this->rolcategorias = $rcategorias;
	}
	
	public function CrearRol(){
        $object = new connection_database();
		$crud = new crud();
        $crud -> store('roles', ["nombre" => $this->roles]);
        $rol_id = $object -> _db->lastInsertId();
        if($this->jerarquia != null){
            roles::Asignarjerarquia($rol_id, $this->jerarquia);         
        }
		if($this->rolcategorias != null){
            roles::Asignarcategorias($rol_id, $this->rolcategorias);
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

    protected static function Asignarcategorias($rol_id, $categorias){
        $crud = new crud();
        for($i = 0; $i < count($categorias); $i++){
            $crud -> store('rolesxcategorias', ["roles_id" => $rol_id, "categorias_id" => $categorias[$i]]);
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
            $agregar_permisos = array_values(array_diff($this->rolpermissions, $fetchroles));
            $eliminar_permisos = array_values(array_diff($fetchroles, $this->rolpermissions));  
            
            for($i=0; $i<count($eliminar_permisos); $i++){
                $crud->delete('rolesxpermisos', 'roles_id=:roles AND permisos_id=:permisos', [':roles' => $id, ":permisos" => $eliminar_permisos[$i]]);
            }

            if(count($agregar_permisos) > 0){
                for($j=0; $j<count($agregar_permisos); $j++){
                    $crud->store('rolesxpermisos', ['roles_id' => $id, 'permisos_id' => $agregar_permisos[$j]]);
                }
            }
            

        }else if($countdatabase < $countselected){
            $agregar_permisos = array_values(array_diff($this->rolpermissions, $fetchroles));
            $eliminar_permisos = array_values(array_diff($fetchroles, $this->rolpermissions));
            
            for($i=0; $i<count($agregar_permisos); $i++){
                $crud->store('rolesxpermisos', ['roles_id' => $id, 'permisos_id' => $agregar_permisos[$i]]);
            }

            if(count($eliminar_permisos) > 0){
                for($j=0; $j<count($eliminar_permisos); $j++){
                    $crud->delete('rolesxpermisos', 'roles_id=:roles AND permisos_id=:permisos', [':roles' => $id, ":permisos" => $eliminar_permisos[$j]]);
                }
            }
            
            
        }else if($countdatabase == $countselected){
            $agregar_permisos = array_values(array_diff($this->rolpermissions, $fetchroles));
            $eliminar_permisos = array_values(array_diff($fetchroles, $this->rolpermissions));           
            if(count($eliminar_permisos) > 0){
                for($i=0; $i<count($eliminar_permisos); $i++){
                    $crud->delete('rolesxpermisos', "roles_id=:roles AND permisos_id=:permisos", [':roles' => $id, ':permisos' => $eliminar_permisos[$i]]);
                }
            }
            if(count($agregar_permisos) >0){
                for($j=0; $j<count($agregar_permisos); $j++){
                    $crud->store('rolesxpermisos', ['roles_id' => $id, 'permisos_id' => $agregar_permisos[$j]]);
                }
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

    public static function FetchUserDepartamento($id){
		$object = new connection_database();
		$check_departamento = $object->_db->prepare("select departamentos.departamento from usuarios inner join roles on roles.id=usuarios.roles_id left join departamentos on departamentos.id=usuarios.departamento_id where usuarios.id=:sessionrol");
		$check_departamento ->execute(array(':sessionrol' => $id));
		$fetch_departamento = $check_departamento -> fetch(PDO::FETCH_OBJ);
		return $fetch_departamento->departamento;
    }
}
?>