<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class avisos {
        
        public $usuario;
        public $titulo_aviso;
        public $descripcion_aviso;
        public $filename_avisos;
        public $foto_aviso; 
        
        public function __construct($user, $notice_title, $notice_description, $notice_filename, $notice_photo){
            $this->usuario = $user;
            $this->titulo_aviso = $notice_title;
            $this->descripcion_aviso = $notice_description;
            $this->filename_avisos = $notice_filename;
            $this->foto_aviso = $notice_photo;
        }

        public function findAllNotices()
        {
            $object = new connection_database();
            $statement = "SELECT id, users_id, modificado_por, titulo_aviso, descripcion_aviso, fecha_creacion_aviso, fecha_modificacion, filename_avisos, avisos_foto_identificador FROM avisos;";
            try {
                $statement = $object->_db->query($statement);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        public function findNotice($id)
        {
            $object = new connection_database();
            $statement = "SELECT id, users_id, modificado_por, titulo_aviso, descripcion_aviso, fecha_creacion_aviso, fecha_modificacion, filename_avisos, avisos_foto_identificador FROM avisos WHERE id = ?;";
            try {
                $statement = $object->_db->prepare($statement);
                $statement->execute(array($id));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }    
        }

        public function insertNotice(){
            $object = new connection_database();
            $crud = new crud();
            if($this->filename_avisos != null && $this->foto_aviso !=null){
                $location = "../src/avisos/";
                $ext = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile = Avisos::tempnam_sfx($location, $ext);
                if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile)){
                    $crud->store('avisos', ['users_id' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso, 'filename_avisos' => $this->filename_avisos,
                    'avisos_foto_identificador' => basename($uploadfile)]);
                }
            }else{
                $crud->store('avisos', ['users_id' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso, 'filename_avisos' => $this->filename_avisos,
                'avisos_foto_identificador' => $this->foto_aviso]);
            }
        }

        public function editNotice($id, $delete){
            $crud = new crud();
            $object = new connection_database();
            $selectphoto = $object -> _db -> prepare("select filename_avisos, avisos_foto_identificador from avisos where id=:idavisos");
            $selectphoto -> execute(array(':idavisos' => $id));
            $fetch_row_photo = $selectphoto -> fetch(PDO::FETCH_OBJ);
            $hoy = date("Y-m-d H:i:s");
            //Cuando existe la foto y se sube algo
            if($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso != null && $this->filename_avisos != null){
                //Aquí se debe de eliminar la foto anterior
                $path = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                $directory = "../src/avisos/";
                $ext = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile = Avisos::tempnam_sfx($directory, $ext);
                if(!file_exists($path)){
                    if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile)], "id=:avisoid", ['avisoid' => $id]);
                    }
                }else{
                    unlink($directory.$fetch_row_photo -> avisos_foto_identificador);
                    if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile)], "id=:avisoid", ['avisoid' => $id]);
                    }
                }
            //Cuando existe la foto y no se sube nada
            }else if($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso == null && $this->filename_avisos == null){
                if($delete == "false"){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $fetch_row_photo -> filename_avisos, 'avisos_foto_identificador' => $fetch_row_photo -> avisos_foto_identificador], "id=:avisoid", ['avisoid' => $id]);
                }else{
                    $directory = "../src/avisos/";
                    $path = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                    if(!file_exists($path)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso], "id=:avisoid", ['avisoid' => $id]);
                    }else{
                        unlink($directory.$fetch_row_photo -> avisos_foto_identificador);
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso], "id=:avisoid", ['avisoid' => $id]);
                    }
                }
            //Cuando no existe la foto y se sube algo
            }else if($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso != null && $this->filename_avisos != null){
                $directory = "../src/avisos/";
                $ext = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile = Avisos::tempnam_sfx($directory, $ext);
                if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile)){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile)], "id=:avisoid", ['avisoid' => $id]);
                }    
            //Cuando no existe la foto y no se sube algo      
            }else if($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso == null && $this->filename_avisos == null){
                $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso], "id=:avisoid", ['avisoid' => $id]);
            }
        }

        public static function eraseNotice($id){
			$crud = new crud();
			$object = new connection_database();
			$select_photo = $object -> _db -> prepare("select filename_avisos, avisos_foto_identificador from avisos where id=:idavisos");
            $select_photo -> execute(array(':idavisos' => $id));
			$fetch_select_photo = $select_photo -> fetch(PDO::FETCH_OBJ);
			if($fetch_select_photo -> filename_avisos != null && $fetch_select_photo -> avisos_foto_identificador != null){
				$directory = __DIR__ . "/../src/avisos/";
				$path = __DIR__ . "/../src/avisos/".$fetch_select_photo -> avisos_foto_identificador;
				if(!file_exists($path)){
					$crud->delete('avisos', 'id=:avisoid', ['avisoid' => $id]);
				}else{
					unlink($directory.$fetch_select_photo -> avisos_foto_identificador);
					$crud->delete('avisos', 'id=:avisoid', ['avisoid' => $id]);
				}
			}else{
				$crud->delete('avisos', 'id=:avisoid', ['avisoid' => $id]);
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
