<?php
include_once("../config/conexion.php");
include_once("crud.php");
class user {
	
	private $conn;
    public $username;
    public $nombre;
    public $apellido_pat;
    public $apellido_mat;
    public $correo;
    public $password;
    private $roles_id;
    private $filename;
    private $foto;


	
	public function __construct($user, $nom, $apellidopat, $apellidomat, $email, $contraseña, $rolesid, $filenom, $photo){
		$this->conn = new connection_database();
        $this->username = $user;
        $this->nombre = $nom;
        $this->apellido_pat = $apellidopat;
        $this->apellido_mat = $apellidomat;
        $this->correo = $email;
        $this->password = $contraseña;
        $this->roles_id = $rolesid;
        $this->filename = $filenom;
        $this->foto = $photo;
	}
	
	public function CrearUsuarios(){
		$crud = new crud();
		$crud->store('usuarios', ['username' => $this->username, 'nombre' => $this->nombre, 'apellido_pat' => $this->apellido_pat,
		'apellido_mat' => $this->apellido_mat, 'correo' => $this->correo, 'password' => $this->password, 'roles_id' => $this->roles_id,
		'nombre_foto' => $this->filename, 'foto' => $this->foto]);
	}    
}
?>