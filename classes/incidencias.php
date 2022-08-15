<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class incidencias {
	
    public $titulo;
	public $fechainicio;
	public $fechafin;
	public $tipo;
	public $descripcion;
	private $filename;
	private $foto;
	
	public function __construct($title, $initialdate, $finaldate, $type, $description, $nombre, $photo){
        $this->titulo = $title;
		$this->fechainicio = $initialdate;
		$this->fechafin = $finaldate;
		$this->tipo = $type;
		$this->descripcion = $description;
		$this->filename = $nombre;
		$this->foto = $photo;
	}
	
	public function CrearIncidencias($userid){
		$crud = new crud();
		$estatus = "pendiente";
        $crud -> store ('incidencias', ['users_id' => $userid, 'titulo' => $this->titulo, 'fecha_inicio' => $this->fechainicio, 'fecha_fin' => $this->fechafin, 'tipo_incidencia' => $this->tipo, 'descripcion' => $this->descripcion, 'estatus_incidencia' => $estatus, 'filename' => $this->filename, 'foto' => $this->foto]);
	}

	public static function EliminarIncidencias($id){
		$crud = new crud();
		$crud->delete('incidencias', 'id=:idincidencia', ['idincidencia' => $id]);
	}
}
?>