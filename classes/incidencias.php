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
		$todaydate = date("Y-m-d");
        $crud -> store ('incidencias', ['users_id' => $userid, 'titulo' => $this->titulo, 'fecha_inicio' => $this->fechainicio, 'fecha_fin' => $this->fechafin, 'tipo_incidencia' => $this->tipo, 'descripcion' => $this->descripcion, 'estatus_incidencia' => $estatus, 'filename' => $this->filename, 'foto' => $this->foto, 'incidencia_creada' => $todaydate]);
	}

	public static function EliminarIncidencias($id){
		$crud = new crud();
		$crud->delete('incidencias', 'id=:idincidencia', ['idincidencia' => $id]);
	}

	public static function Checkincidencia($id){
        $object = new connection_database();
	    $editar = $object -> _db->prepare("SELECT * FROM incidencias WHERE id=:incidenciaid");
		$editar->bindParam("incidenciaid", $id ,PDO::PARAM_INT);
		$editar->execute();
        $check_incidencia=$editar->rowCount();
	    return $check_incidencia;
    }

	
   public static function Fetcheditincidencia($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT * from incidencias where id=:incidenciaid");
        $row->bindParam("incidenciaid", $id, PDO::PARAM_INT);
        $row->execute();
        $editar = $row->fetch(PDO::FETCH_OBJ);
        return $editar;
    }

	public function EditarIncidencias($incidenciaid){
		$crud=new crud();
		$crud -> update ('incidencias', ['titulo' => $this->titulo, 'fecha_inicio' => $this->fechainicio, 'fecha_fin' => $this->fechafin, 'tipo_incidencia' => $this->tipo, 'descripcion' => $this->descripcion, 'filename' => $this->filename, 'foto' => $this->foto], 'id=:idincidencia', ['idincidencia' => $incidenciaid]);
	}
}
?>