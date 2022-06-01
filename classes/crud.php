
<?php
include_once("../config/conexion.php");
class crud {
	
	private $conn;
	
	public function __construct(){
		$this->conn = new connection_database();
	}
	
	public function store($table, $parameters){
		$sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {

            $statement = $this->conn->_db->prepare($sql);
            $statement->execute($parameters);

        } catch (Exception $e) {
            die('Algo salio mal al momento de insertar los datos');
        }

        /* Para insertar datos es: instancia -> store('users', [ 'name' => $_POST['name']]);*/
	}
	
	public function read(){
		
	}
	public function update(){
		
	}

	public function delete(){
		
	}
}
