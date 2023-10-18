
<?php
include_once __DIR__ . "/../config/conexion.php";
class crud {
	
	private $conn;
	
	public function __construct(){
		$this->conn = new connection_database();
	}

	/*
		Ejemplo:
		Tabla
		Parámetros
		$crud->store('comunicados', ['users_id' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado, 'filename_comunicados' => $this->filename_comunicados,
        'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado]);
	*/
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
            die($e->getMessage());
        }

        /* Para insertar datos es: instancia -> store('users', [ 'name' => $_POST['name']]);*/
	}

	/*
		Ejemplo:
		$destinationTable = 'tabla_destino';
		$sourceTable = 'tabla_origen';
		$columns = ['columna1', 'columna2', 'columna3'];
		$condition = 'edad > 18';

		$affectedRows = $gateway->insertFromSelect($destinationTable, $sourceTable, $columns, $condition);
	*/
	public function insertFromSelect($destinationTable, $sourceTable, $columns, $condition) {
        $sql = sprintf(
            'INSERT INTO %s (%s) SELECT %s FROM %s WHERE %s',
            $destinationTable,
            implode(', ', $columns),
            implode(', ', $columns),
            $sourceTable,
            $condition
        );

        try {
            $statement = $this->conn->_db->prepare($sql);
            $statement->execute();

            // Devuelve el número de filas afectadas por la inserción.
            return $statement->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

	/*
		Ejemplo:
		$resultado = $crud->readWithCount('usuarios', 'usuarios.*, roles.nombre', 'WHERE usuarios.edad > :edad', [':edad' => 18]);
		$conteo = $resultado['count'];
		$datos = $resultado['data'];
	*/
	public function readWithCount($table, $columns, $condition, $pdoparam) {
		$sql = sprintf(
			'SELECT %s FROM %s %s',
			is_array($columns) ? implode(', ', $columns) : $columns,
			$table,
			$condition
		);
	
		try {
			$statement = $this->conn->_db->prepare($sql);
			$statement->execute($pdoparam);
	
			// Obtener los resultados de la consulta como un arreglo asociativo.
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	
			// Contar las filas resultantes.
			$rowCount = $statement->rowCount();
	
			return ['count' => $rowCount, 'data' => $results];
	
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	
	/*
		Ejemplo:
		$resultado = $crud->readWithJoinsAndCount('usuarios', 'usuarios.*, roles.nombre', 'LEFT JOIN roles ON usuarios.id_rol = roles.id', 'WHERE usuarios.edad > :edad', [':edad' => 18]);
		$conteo = $resultado['count'];
		$datos = $resultado['data'];
	*/
	public function readWithJoinsAndCount($table, $columns, $joins, $condition, $pdoparam) {
		$sql = sprintf(
			'SELECT %s FROM %s %s %s',
			is_array($columns) ? implode(', ', $columns) : $columns,
			$table,
			$joins,
			$condition
		);
	
		try {
			$statement = $this->conn->_db->prepare($sql);
			$statement->execute($pdoparam);
	
			// Obtener los resultados de la consulta como un arreglo asociativo.
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	
			// Contar las filas resultantes.
			$rowCount = $statement->rowCount();
	
			return ['count' => $rowCount, 'data' => $results];
	
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	/*
		Ejemplo:
		Tabla
		Columnas y valores a actualizar
		Condición
		Valor de la condición
		$crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
	*/
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
				die($e->getMessage());
			}
		
	}

	/*
		Ejemplo:
		$targetTable = 'tabla_destino';
		$sourceTable = 'tabla_origen';
		$columnsToUpdate = ['columna1', 'columna2'];
		$joinCondition = 'tabla_destino.id = tabla_origen.id';
		$whereCondition = 'tabla_origen.edad > :edad';
		$pdoparam = [':edad' => 18];

		$affectedRows = $gateway->updateWithJoin($targetTable, $sourceTable, $columnsToUpdate, $joinCondition, $whereCondition, $pdoparam);

	*/
	public function updateWithJoin($targetTable, $sourceTable, $columnsToUpdate, $joinCondition, $whereCondition, $pdoparam) {
        $sql = sprintf(
            'UPDATE %s
             INNER JOIN %s ON %s
             SET %s
             WHERE %s',
            $targetTable,
            $sourceTable,
            $joinCondition,
            implode(', ', $columnsToUpdate),
            $whereCondition
        );

        try {
            $statement = $this->conn->_db->prepare($sql);
            $statement->execute($pdoparam);

            // Devuelve el número de filas afectadas por la actualización.
            return $statement->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


	/*
		Ejemplo:
		 Tabla
		 Condición
		 Valor de la condición
		 $crud->delete('alertas', 'id=:idalerta', ['idalerta' => $id]);
	*/
	public function delete($table, $condition, $pdoparam){
		$sql = sprintf(
			'DELETE FROM %s WHERE %s',
			$table,
			$condition); 

		try {

			$statement = $this->conn->_db->prepare($sql);
			$statement->execute($pdoparam);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/*
		Ejemplo:
		$targetTable = 'tabla_destino';
		$sourceTable = 'tabla_origen';
		$joinCondition = 'tabla_destino.id = tabla_origen.id';
		$whereCondition = 'tabla_origen.edad > :edad';
		$pdoparam = [':edad' => 18];

		$affectedRows = $gateway->deleteWithJoin($targetTable, $sourceTable, $joinCondition, $whereCondition, $pdoparam);
	*/
	public function deleteWithJoin($targetTable, $sourceTable, $joinCondition, $whereCondition, $pdoparam) {
        $sql = sprintf(
            'DELETE %s
             FROM %s
             INNER JOIN %s ON %s
             WHERE %s',
            $targetTable,
            $targetTable,
            $sourceTable,
            $joinCondition,
            $whereCondition
        );

        try {
            $statement = $this->conn->_db->prepare($sql);
            $statement->execute($pdoparam);

            // Devuelve el número de filas afectadas por la eliminación.
            return $statement->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}