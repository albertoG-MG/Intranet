<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class user {
	
	private $conn;
    public $username;
    public $nombre;
    public $apellido_pat;
    public $apellido_mat;
    public $correo;
    public $password;
    private $temppassword;
    private $departamento;
    private $roles_id;
    private $subrol_id;
    private $filename;
    private $foto;


	
	public function __construct($user, $nom, $apellidopat, $apellidomat, $email, $contraseña, $temp, $department, $rolesid, $subid, $filenom, $photo){
		$this->conn = new connection_database();
        $this->username = $user;
        $this->nombre = $nom;
        $this->apellido_pat = $apellidopat;
        $this->apellido_mat = $apellidomat;
        $this->correo = $email;
        $this->password = $contraseña;
        $this->temppassword = $temp;
        $this->departamento = $department;
        $this->roles_id = $rolesid;
        $this->subrol_id = $subid;
        $this->filename = $filenom;
        $this->foto = $photo;
	}
	
	public function CrearUsuarios(){
        $object = new connection_database();
        $crud = new crud();
        if($this->filename != null && $this->foto !=null){
            $location = "../src/img/imgs_uploaded/";
            $ext = pathinfo($this->filename, PATHINFO_EXTENSION);
            $uploadfile = User::tempnam_sfx($location, $ext);
            if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                $crud->store('usuarios', ['username' => $this->username, 'nombre' => $this->nombre, 'apellido_pat' => $this->apellido_pat,
                'apellido_mat' => $this->apellido_mat, 'correo' => $this->correo, 'password' => $this->password, 'departamento_id' => $this->departamento, 'roles_id' => $this->roles_id,
                'subrol_id' => $this->subrol_id, 'nombre_foto' => $this->filename, 'foto_identificador' => basename($uploadfile)]);
            }
        }else{
            $crud->store('usuarios', ['username' => $this->username, 'nombre' => $this->nombre, 'apellido_pat' => $this->apellido_pat,
            'apellido_mat' => $this->apellido_mat, 'correo' => $this->correo, 'password' => $this->password, 'departamento_id' => $this->departamento, 'roles_id' => $this->roles_id,
            'subrol_id' => $this->subrol_id, 'nombre_foto' => $this->filename, 'foto_identificador' => $this->foto]);
        }
        if($this->temppassword == 1){
            $user_store_id = $object -> _db -> lastInsertId();
            $crud -> store('temporal_password', ['user_id' => $user_store_id]);
        }
    }

    public static function FetchUsuarios(){
        $object = new connection_database();
		$sql = "SELECT usuarios.id as id, usuarios.nombre as nombre, usuarios.apellido_pat as apellido_pat, usuarios.apellido_mat as apellido_mat, roles.nombre as rolnom  FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id";
        $fetchusuarios = $object->_db->prepare($sql);
        $fetchusuarios->execute();

        $usuarios = $fetchusuarios->fetchAll(PDO::FETCH_OBJ);
		return $usuarios;
    } 
    
    public function EditarUsuarios($id){
        $crud = new crud();
        $object = new connection_database();
        if($this->foto == null && $this->filename == null){
            $selectphoto = $object -> _db -> prepare("select nombre_foto, foto_identificador from usuarios where id=:iduser");
            $selectphoto -> bindParam("iduser", $id, PDO::PARAM_INT);
            $selectphoto -> execute();
            $row = $selectphoto ->fetch(PDO::FETCH_OBJ);
            $this->foto = $row->foto_identificador;
            $this->filename = $row->nombre_foto;
            $crud->update('usuarios', ['username' => $this->username, 'nombre' => $this->nombre, 'apellido_pat' => $this->apellido_pat,
            'apellido_mat' => $this->apellido_mat, 'correo' => $this->correo, 'password' => $this->password, 'departamento_id' => $this->departamento, 'roles_id' => $this->roles_id,
            'subrol_id' => $this->subrol_id, 'nombre_foto' => $this->filename, 'foto_identificador' => $this->foto], "id=:iduser", ['iduser' => $id]);
        }else{
            $location = "../src/img/imgs_uploaded/";
            $ext = pathinfo($this->filename, PATHINFO_EXTENSION);
            $uploadfile = User::tempnam_sfx($location, $ext);
            if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                $crud->update('usuarios', ['username' => $this->username, 'nombre' => $this->nombre, 'apellido_pat' => $this->apellido_pat,
                'apellido_mat' => $this->apellido_mat, 'correo' => $this->correo, 'password' => $this->password, 'departamento_id' => $this->departamento, 'roles_id' => $this->roles_id,
                'subrol_id' => $this->subrol_id, 'nombre_foto' => $this->filename, 'foto_identificador' => basename($uploadfile)], "id=:iduser", ['iduser' => $id]);
            }
        }
    } 

    public static function EliminarUsuarios($id){
		$crud = new crud();
		$crud->delete('usuarios', 'id=:iduser', ['iduser' => $id]);
	}
    
    public static function tempnam_sfx($path, $suffix){
        do {
            $file = $path."/".mt_rand().".".$suffix;
            $fp = @fopen($file, 'x');
        }
        while(!$fp);
    
        fclose($fp);
        return $file;
    }
}
?>