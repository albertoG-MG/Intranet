<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class roles {
	
    public $roles;
	
	public function __construct($rolnom){
        $this->roles = $rolnom;
	}
	
	public function CrearRol(){
		
	}
    
    public function EditarRol($id){
		
	}

    public static function EliminarRol($id){
		
	} 
}
?>