<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class alertas {
        
        public $usuario;
        public $titulo_alerta;
        public $descripcion_alerta;
        public $filename_alertas;
        public $foto; 
        
        public function __construct($user, $alerts_title, $alerts_description, $alerts_filename, $photo){
            $this->usuario = $user;
            $this->titulo_alerta = $alerts_title;
            $this->descripcion_alerta = $alerts_description;
            $this->filename_alertas = $alerts_filename;
            $this->foto = $photo;
        }

        public function findAllAlerts()
        {
            $object = new connection_database();
            $statement = "SELECT id, users_id, modificado_por, titulo_alerta, descripcion_alerta, fecha_creacion_alerta, fecha_modificacion, filename_alertas, alertas_foto_identificador FROM alertas;";
            try {
                $statement = $object->_db->query($statement);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        public function findAlerts($id)
        {
            $object = new connection_database();
            $statement = "SELECT id, users_id, modificado_por, titulo_alerta, descripcion_alerta, fecha_creacion_alerta, fecha_modificacion, filename_alertas, alertas_foto_identificador FROM alertas WHERE id = ?;";
            try {
                $statement = $object->_db->prepare($statement);
                $statement->execute(array($id));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }    
        }

        public function insertAlerts(){
            $object = new connection_database();
            $crud = new crud();
            if($this->filename_alertas != null && $this->foto !=null){
                $location = "../src/alertas/";
                $ext = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile = Alertas::tempnam_sfx($location, $ext);
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                    $crud->store('alertas', ['users_id' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta, 'filename_alertas' => $this->filename_alertas,
                    'alertas_foto_identificador' => basename($uploadfile)]);
                }
            }else{
                $crud->store('alertas', ['users_id' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta, 'filename_alertas' => $this->filename_alertas,
                'alertas_foto_identificador' => $this->foto]);
            }
        }

        public function editAlerts($id, $delete){
            $crud = new crud();
            $object = new connection_database();
            $selectphoto = $object -> _db -> prepare("select filename_alertas, alertas_foto_identificador from alertas where id=:idalerta");
            $selectphoto -> execute(array(':idalerta' => $id));
            $fetch_row_photo = $selectphoto -> fetch(PDO::FETCH_OBJ);
            $hoy = date("Y-m-d H:i:s");
            //Cuando existe la foto y se sube algo
            if($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto != null && $this->filename_alertas != null){
                //Aquí se debe de eliminar la foto anterior
                $path = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                $directory = "../src/alertas/";
                $ext = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile = alertas::tempnam_sfx($directory, $ext);
                if(!file_exists($path)){
                    if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile)], "id=:alertaid", ['alertaid' => $id]);
                    }
                }else{
                    unlink($directory.$fetch_row_photo -> alertas_foto_identificador);
                    if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile)], "id=:alertaid", ['alertaid' => $id]);
                    }
                }
            //Cuando existe la foto y no se sube nada
            }else if($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto == null && $this->filename_alertas == null){
                if($delete == "false"){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $fetch_row_photo -> filename_alertas, 'alertas_foto_identificador' => $fetch_row_photo -> alertas_foto_identificador], "id=:alertaid", ['alertaid' => $id]);
                }else{
                    $directory = "../src/alertas/";
                    $path = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                    if(!file_exists($path)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto], "id=:alertaid", ['alertaid' => $id]);
                    }else{
                        unlink($directory.$fetch_row_photo -> alertas_foto_identificador);
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto], "id=:alertaid", ['alertaid' => $id]);
                    }
                }
            //Cuando no existe la foto y se sube algo
            }else if($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto != null && $this->filename_alertas != null){
                $directory = "../src/alertas/";
                $ext = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile = alertas::tempnam_sfx($directory, $ext);
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile)], "id=:alertaid", ['alertaid' => $id]);
                }    
            //Cuando no existe la foto y no se sube algo      
            }else if($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto == null && $this->filename_alertas == null){
                $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto], "id=:alertaid", ['alertaid' => $id]);
            }
        }

        public static function eraseAlerts($id){
			$crud = new crud();
			$object = new connection_database();
			$select_photo = $object -> _db -> prepare("select filename_alertas, alertas_foto_identificador from alertas where id=:idalerta");
            $select_photo -> execute(array(':idalerta' => $id));
			$fetch_select_photo = $select_photo -> fetch(PDO::FETCH_OBJ);
			if($fetch_select_photo -> filename_alertas != null && $fetch_select_photo -> alertas_foto_identificador != null){
				$directory = __DIR__ . "/../src/alertas/";
				$path = __DIR__ . "/../src/alertas/".$fetch_select_photo -> alertas_foto_identificador;
				if(!file_exists($path)){
					$crud->delete('alertas', 'id=:idalerta', ['idalerta' => $id]);
				}else{
					unlink($directory.$fetch_select_photo -> alertas_foto_identificador);
					$crud->delete('alertas', 'id=:idalerta', ['idalerta' => $id]);
				}
			}else{
				$crud->delete('alertas', 'id=:idalerta', ['idalerta' => $id]);
			}
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