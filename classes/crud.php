
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
	
	public function update($table, $parameters, $condition, $pdoparam){
			$cols = array();

			foreach($parameters as $key => $val) {
				$cols[] = "$key = :$key";
			}

			$sql = sprintf(
			'UPDATE %s SET %s WHERE %s',
			$table,
			implode(', ', $cols),
			$condition);
			
			$array = $parameters+$pdoparam;
			
			try {

				$statement = $this->conn->_db->prepare($sql);
				$statement->execute($array);
	
			} catch (Exception $e) {
				die('Algo salio mal al momento de editar los datos');
			}
		
	}

	public function delete($table, $condition, $pdoparam){
		$sql = sprintf(
			'DELETE FROM %s WHERE %s',
			$table,
			$condition); 

		try {

			$statement = $this->conn->_db->prepare($sql);
			$statement->execute($pdoparam);

		} catch (Exception $e) {
			die('Algo salio mal al momento de eliminar los datos');
		}
	}
}
