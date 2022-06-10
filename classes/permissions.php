<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class permissions {
	
	private $conn;
    public $permisos;


	
	public function __construct($nompermisos){
		$this->conn = new connection_database();
        $this->permisos = $nompermisos;
	}
	
	public function CrearPermisos(){
		$crud = new crud();
		$crud->store('permisos', ['nombre' => $this->permisos]);
	}
    
    public function EditarPermisos($id){
		
	}
    
    public static function FetchPermisos(){

    }

    public static function EliminarPermisos($id){
		
	} 
}
?>