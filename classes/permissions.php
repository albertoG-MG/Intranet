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
}
?>