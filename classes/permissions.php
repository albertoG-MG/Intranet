<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class permissions {
	
    public $permisos;
	
	public function __construct($nompermisos){
        $this->permisos = $nompermisos;
	}
	
	public function CrearPermisos(){
		$crud = new crud();
		$crud->store('permisos', ['nombre' => $this->permisos]);
	}
    
    public function EditarPermisos($id){
		$crud = new crud();
		$crud -> update('permisos', ['nombre' => $this->permisos], "id=:idpermiso", ['idpermiso' => $id]);
	}
    
    public static function FetchPermisos(){
		$object = new connection_database();
		$sql = "SELECT * FROM permisos";
        $fetchpermisos = $object->_db->prepare($sql);
        $fetchpermisos->execute();

        $permisos = $fetchpermisos->fetchAll(PDO::FETCH_OBJ);
		return $permisos;
    }

    public static function EliminarPermisos($id){
		$crud = new crud();
		$crud->delete('permisos', 'id=:idpermiso', ['idpermiso' => $id]);
	}
	
	public static function CheckPermissions($user_id, $permission_name) { 
		$object = new connection_database();
		
		try
		{
			$select_permissions = $object -> _db -> prepare("SELECT count(*) AS total_permissions FROM rolesxpermisos rp LEFT JOIN usuarios u ON rp.roles_id=u.roles_id LEFT JOIN permisos p ON p.id=rp.permisos_id WHERE u.id=:userid AND p.nombre=:permisosname");
			$select_permissions -> execute(array(':userid' => $user_id, ':permisosname' => $permission_name));
			$fetch_permissions = $select_permissions -> fetch(PDO::FETCH_OBJ);
			
			$authorized = ''; 
			
			if ($fetch_permissions -> total_permissions > 0) {
				$authorized = "true";
			} else {
				 $authorized = "false";
			}
			
			return $authorized;
		}catch (Exception $e) {
				echo $e->getMessage();
		}
	}
}
?>