<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class departamentos {
	
    public $departamentos;
	
	public function __construct($departament){
        $this->departamentos = $departament;
	}
	
	public function CrearDepartamento(){
		$crud = new crud();
        $crud -> store ('departamentos', ['departamento' => $this->departamentos]);
	}

    public static function FetchDepartamento(){
        $object = new connection_database();
		$sql = "SELECT * FROM departamentos";
        $fetchdepartamentos = $object->_db->prepare($sql);
        $fetchdepartamentos->execute();

        $departamentos = $fetchdepartamentos->fetchAll(PDO::FETCH_OBJ);
		return $departamentos;
    }
    
    public function EditarDepartamento($id){
		$crud = new crud();
        $crud -> update ('departamentos', ['departamento' => $this->departamentos], 'id=:id', ['id' => $id]);
	}

    public static function EliminarDepartamento($id){
		$crud = new crud();
        $crud -> delete ('departamentos', 'id=:id', ['id' => $id]);
	} 
}
?>