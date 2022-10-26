<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class categorias {
	
    public $categorias;
	
	public function __construct($nomcategorias){
        $this->categorias = $nomcategorias;
	}
	
	public function CrearCategorias(){
		$crud = new crud();
		$crud->store('categorias', ['nombre' => $this->categorias]);
	}
	
	public function EditarCategorias($id){
		$crud = new crud();
		$crud -> update('categorias', ['nombre' => $this->categorias], "id=:idcategoria", ['idcategoria' => $id]);
	} 
	
	public static function EliminarCategorias($id){
		$crud = new crud();
		$crud->delete('categorias', 'id=:idcategoria', ['idcategoria' => $id]);
	}

	public static function FetchCategorias(){
		$object = new connection_database();
		$sql = "SELECT * FROM categorias";
        $fetchcategorias = $object->_db->prepare($sql);
        $fetchcategorias->execute();

        $categorias = $fetchcategorias->fetchAll(PDO::FETCH_OBJ);
		return $categorias;
	}
    
    
}
?>