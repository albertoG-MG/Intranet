<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class permissions {
	
    public $permisos;
	public $categorias;
	
	public function __construct($nompermisos, $nomcategorias){
        $this->permisos = $nompermisos;
		$this->categorias = $nomcategorias;
	}
	
	public function CrearPermisos(){
		$crud = new crud();
		$crud->store('permisos', ['nombre' => $this->permisos, 'categoria_id' => $this->categorias]);
	}
    
    public function EditarPermisos($id){
		$crud = new crud();
		$crud -> update('permisos', ['nombre' => $this->permisos, 'categoria_id' => $this->categorias], "id=:idpermiso", ['idpermiso' => $id]);
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
			$select_permissions = $object -> _db -> prepare("SELECT count(*) AS total_permissions FROM subrolesxpermisos rp LEFT JOIN usuarios u ON rp.subroles_id=u.subrol_id LEFT JOIN permisos p ON p.id=rp.permisos_id WHERE u.id=:userid AND p.nombre=:permisosname");
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

	/*Editar esto si hay mas tipos de usuario que necesitan crear o editar usuarios*/
	public static function Check_if_user_has_permission($user_logged_id, $user_logged_rol, $user_information_rol){
		if($user_logged_rol == "Administrador" && $user_information_rol != "Superadministrador" && $user_information_rol != "Administrador"){
			return "true";
		}else if(Permissions::CheckPermissions($user_logged_id, "Acceso a usuarios") == "true" && Permissions::CheckPermissions($user_logged_id, "Vista tecnico") == "false" && $user_information_rol != "Superadministrador" && $user_information_rol != "Administrador"){
			return "true";
		}else if (Permissions::CheckPermissions($user_logged_id, "Acceso a usuarios") == "true" && Permissions::CheckPermissions($user_logged_id, "Vista tecnico") == "true" && $user_information_rol == "Tecnico" || is_null($user_information_rol)){
			return "true";
		}else{
			return "false";
		}
	}
}
?>