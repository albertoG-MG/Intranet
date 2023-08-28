<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class avisos {
        
        public $usuario;
        public $titulo_aviso;
        public $descripcion_aviso;
        public $filename_avisos;
        public $foto_aviso;
        public $filename_archivo_aviso;
	    public $archivo_file_aviso;
        
        public function __construct($user, $notice_title, $notice_description, $notice_filename, $notice_photo, $notice_file_filename, $notice_file_archivo){
            $this->usuario = $user;
            $this->titulo_aviso = $notice_title;
            $this->descripcion_aviso = $notice_description;
            $this->filename_avisos = $notice_filename;
            $this->foto_aviso = $notice_photo;
            $this->filename_archivo_aviso = $notice_file_filename;
	        $this->archivo_file_aviso = $notice_file_archivo;
        }

        public function findAllNotices()
        {
            $object = new connection_database();
            $statement = "SELECT id, users_id, modificado_por, titulo_aviso, descripcion_aviso, fecha_creacion_aviso, fecha_modificacion, filename_avisos, avisos_foto_identificador, filename_archivo_aviso, aviso_archivo_identificador FROM avisos;";
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
            $statement = "SELECT id, users_id, modificado_por, titulo_aviso, descripcion_aviso, fecha_creacion_aviso, fecha_modificacion, filename_avisos, avisos_foto_identificador, filename_archivo_aviso, aviso_archivo_identificador FROM avisos WHERE id = ?;";
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
            if($this->filename_avisos != null && $this->foto_aviso !=null && $this->filename_archivo_aviso == null && $this->archivo_file_aviso == null){
                $location_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($location_foto, $ext_foto);
                if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)){
                    $crud->store('avisos', ['users_id' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso, 'filename_avisos' => $this->filename_avisos,
                    'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso]);
                }
            }else if($this->filename_avisos == null && $this->foto_aviso ==null && $this->filename_archivo_aviso != null && $this->archivo_file_aviso != null){
                $location_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($location_archivo, $ext_archivo);
                if(move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                    $crud->store('avisos', ['users_id' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso, 'filename_avisos' => $this->filename_avisos,
                    'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => basename($uploadfile_archivo)]);
                }
            }else if($this->filename_avisos != null && $this->foto_aviso !=null && $this->filename_archivo_aviso != null && $this->archivo_file_aviso != null){
                $location_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($location_archivo, $ext_archivo);
                $location_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($location_foto, $ext_foto);
                 if(move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo) && move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)){
                    $crud->store('avisos', ['users_id' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso, 'filename_avisos' => $this->filename_avisos,
                    'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => basename($uploadfile_archivo)]);
                }
            }else if($this->filename_avisos == null && $this->foto_aviso ==null && $this->filename_archivo_aviso == null && $this->archivo_file_aviso == null){
                $crud->store('avisos', ['users_id' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso, 'filename_avisos' => $this->filename_avisos,
                'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso]);
            }
        }

        public function editNotice($id, $delete, $delete2){
            $crud = new crud();
            $object = new connection_database();
            $selectphoto = $object -> _db -> prepare("select filename_avisos, avisos_foto_identificador, filename_archivo_aviso, aviso_archivo_identificador from avisos where id=:idavisos");
            $selectphoto -> execute(array(':idavisos' => $id));
            $fetch_row_photo = $selectphoto -> fetch(PDO::FETCH_OBJ);
            $hoy = date("Y-m-d H:i:s");
            //Cuando existe la foto y se reemplaza pero no existe el archivo en la base de datos y no se subió ningún archivo - != !=	== ==
            if(($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso != null && $this->filename_avisos != null) && ($fetch_row_photo -> filename_archivo_aviso == null && $fetch_row_photo -> aviso_archivo_identificador == null && $this->archivo_file_aviso == null && $this->filename_archivo_aviso == null)){
                $path_foto = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                $directory_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($directory_foto, $ext_foto);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> avisos_foto_identificador);
                }
                if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando existe la foto y se reemplaza pero no existe el archivo en la base de datos y se sube un archivo - != !=	== !=
            }else if(($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso != null && $this->filename_avisos != null) && ($fetch_row_photo -> filename_archivo_aviso == null && $fetch_row_photo -> aviso_archivo_identificador == null && $this->archivo_file_aviso != null && $this->filename_archivo_aviso != null)){
                $path_foto = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                $directory_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($directory_foto, $ext_foto);
                $directory_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> avisos_foto_identificador);
                }
                if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto) && move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando existe la foto y se reemplaza y existe el archivo en la base de datos y se sube un archivo - != !=	 != !=
            }else if(($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso != null && $this->filename_avisos != null) && ($fetch_row_photo -> filename_archivo_aviso != null && $fetch_row_photo -> aviso_archivo_identificador != null && $this->archivo_file_aviso != null && $this->filename_archivo_aviso != null)){
                $path_foto = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                $directory_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($directory_foto, $ext_foto);
                $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                $directory_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> avisos_foto_identificador);
                }
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> aviso_archivo_identificador);
                }
                if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto) && move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando existe la foto y se reemplaza y existe el archivo en la base de datos y no se sube nada - != !=   != ==
            }else if(($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso != null && $this->filename_avisos != null) && ($fetch_row_photo -> filename_archivo_aviso != null && $fetch_row_photo -> aviso_archivo_identificador != null && $this->archivo_file_aviso == null && $this->filename_archivo_aviso == null)){
                $path_foto = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                $directory_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($directory_foto, $ext_foto);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> avisos_foto_identificador);
                }
                if($delete2 == "false"){
                    if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $fetch_row_photo -> filename_archivo_aviso, 'aviso_archivo_identificador' => $fetch_row_photo -> aviso_archivo_identificador], "id=:avisoid", ['avisoid' => $id]);
                    }
                }else{
                    $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                    $directory_archivo = "../src/avisos_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> aviso_archivo_identificador);
                    }
                    if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);
                    }
                }
                //Cuando no existe la foto, no se sube nada pero no existe el archivo en la base de datos y no se subió ningún archivo - == ==   == == 
            }else if(($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso == null && $this->filename_avisos == null) && ($fetch_row_photo -> filename_archivo_aviso == null && $fetch_row_photo -> aviso_archivo_identificador == null && $this->archivo_file_aviso == null && $this->filename_archivo_aviso == null)){
                $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);
                //Cuando no existe la foto, no se sube nada pero existe el archivo en la base de datos y no se subió ningún archivo - == ==   != ==
            }else if(($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso == null && $this->filename_avisos == null) && ($fetch_row_photo -> filename_archivo_aviso != null && $fetch_row_photo -> aviso_archivo_identificador != null && $this->archivo_file_aviso == null && $this->filename_archivo_aviso == null)){
                if($delete2 == "false"){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $fetch_row_photo -> filename_archivo_aviso, 'aviso_archivo_identificador' => $fetch_row_photo -> aviso_archivo_identificador], "id=:avisoid", ['avisoid' => $id]);
                }else{
                    $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                    $directory_archivo = "../src/avisos_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> aviso_archivo_identificador);
                    }
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando no existe la foto, no se sube nada pero no existe el archivo en la base de datos y se subió un archivo - == ==   == !=
            }else if(($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso == null && $this->filename_avisos == null) && ($fetch_row_photo -> filename_archivo_aviso == null && $fetch_row_photo -> aviso_archivo_identificador == null && $this->archivo_file_aviso != null && $this->filename_archivo_aviso != null)){
                $directory_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($directory_archivo, $ext_archivo);
                if(move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando no existe la foto, no se sube nada pero existe el archivo en la base de datos y se subió un archivo - == ==   != !=
            }else if(($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso == null && $this->filename_avisos == null) && ($fetch_row_photo -> filename_archivo_aviso != null && $fetch_row_photo -> aviso_archivo_identificador != null && $this->archivo_file_aviso != null && $this->filename_archivo_aviso != null)){
                $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                $directory_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> aviso_archivo_identificador);
                }
                if(move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando existe la foto, no se sube nada pero no existe el archivo en la base de datos y no se subió nada - != ==   == ==
            }else if(($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso == null && $this->filename_avisos == null) && ($fetch_row_photo -> filename_archivo_aviso == null && $fetch_row_photo -> aviso_archivo_identificador == null && $this->archivo_file_aviso == null && $this->filename_archivo_aviso == null)){
                if($delete == "false"){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $fetch_row_photo -> filename_avisos, 'avisos_foto_identificador' => $fetch_row_photo -> avisos_foto_identificador, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);
                }else{
                    $directory = "../src/avisos/";
                    $path = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> avisos_foto_identificador);  
                    }
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);  
                }
                //Cuando existe la foto, no se sube nada pero existe el archivo en la base de datos y no se subió nada - != ==   != ==
            }else if(($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso == null && $this->filename_avisos == null) && ($fetch_row_photo -> filename_archivo_aviso != null && $fetch_row_photo -> aviso_archivo_identificador != null && $this->archivo_file_aviso == null && $this->filename_archivo_aviso == null)){
                if($delete == "false" && $delete2 == "false"){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $fetch_row_photo -> filename_avisos, 'avisos_foto_identificador' => $fetch_row_photo -> avisos_foto_identificador, 'filename_archivo_aviso' => $fetch_row_photo -> filename_archivo_aviso, 'aviso_archivo_identificador' => $fetch_row_photo -> aviso_archivo_identificador], "id=:avisoid", ['avisoid' => $id]);
                }else if($delete == "false" && $delete2 == "true"){
                    $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                    $directory_archivo = "../src/avisos_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> aviso_archivo_identificador);
                    }
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $fetch_row_photo -> filename_avisos, 'avisos_foto_identificador' => $fetch_row_photo -> avisos_foto_identificador, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);
                }else if($delete == "true" && $delete2 == "false"){
                    $directory_foto = "../src/avisos/";
                    $path_foto = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                    if(file_exists($path_foto)){
                        unlink($directory_foto.$fetch_row_photo -> avisos_foto_identificador);  
                    }
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $fetch_row_photo -> filename_archivo_aviso, 'aviso_archivo_identificador' => $fetch_row_photo -> aviso_archivo_identificador], "id=:avisoid", ['avisoid' => $id]);  
                }else if($delete == "true" && $delete2 == "true"){
                    $directory_foto = "../src/avisos/";
                    $path_foto = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                    if(file_exists($path_foto)){
                        unlink($directory_foto.$fetch_row_photo -> avisos_foto_identificador);  
                    }
                    $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                    $directory_archivo = "../src/avisos_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> aviso_archivo_identificador);
                    }
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando existe la foto, no se sube nada pero no existe el archivo en la base de datos y se subió algo - != ==   == !=
            }else if(($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso == null && $this->filename_avisos == null) && ($fetch_row_photo -> filename_archivo_aviso == null && $fetch_row_photo -> aviso_archivo_identificador == null && $this->archivo_file_aviso != null && $this->filename_archivo_aviso != null)){
                $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                $directory_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($directory_archivo, $ext_archivo);          
                if($delete == "false"){
                    if(move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $fetch_row_photo -> filename_avisos, 'avisos_foto_identificador' => $fetch_row_photo -> avisos_foto_identificador, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);
                    }
                }else{
                    $directory = "../src/avisos/";
                    $path = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> avisos_foto_identificador);  
                    }
                    if(move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);  
                    }
                }
                //Cuando existe la foto, no se sube nada pero existe el archivo en la base de datos y se subió algo - != ==   != !=
            }else if(($fetch_row_photo -> filename_avisos != null && $fetch_row_photo -> avisos_foto_identificador != null && $this->foto_aviso == null && $this->filename_avisos == null) && ($fetch_row_photo -> filename_archivo_aviso != null && $fetch_row_photo -> aviso_archivo_identificador != null && $this->archivo_file_aviso != null && $this->filename_archivo_aviso != null)){
                $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                $directory_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> aviso_archivo_identificador);
                }      
                if($delete == "false"){
                    if(move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $fetch_row_photo -> filename_avisos, 'avisos_foto_identificador' => $fetch_row_photo -> avisos_foto_identificador, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);
                    }
                }else{
                    $directory = "../src/avisos/";
                    $path = "../src/avisos/".$fetch_row_photo -> avisos_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> avisos_foto_identificador);  
                    }
                    if(move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => $this->foto_aviso, 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);  
                    }
                }
                //Cuando no existe la foto, se sube algo pero no existe el archivo en la base de datos y no se subió nada == !=   == ==
            }else if(($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso != null && $this->filename_avisos != null) && ($fetch_row_photo -> filename_archivo_aviso == null && $fetch_row_photo -> aviso_archivo_identificador == null && $this->archivo_file_aviso == null && $this->filename_archivo_aviso == null)){
                $directory_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($directory_foto, $ext_foto);
                if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this -> filename_archivo_aviso, 'aviso_archivo_identificador' => $this -> archivo_alerta], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y no se subió nada == !=   != ==
            }else if(($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso != null && $this->filename_avisos != null) && ($fetch_row_photo -> filename_archivo_aviso != null && $fetch_row_photo -> aviso_archivo_identificador != null && $this->archivo_file_aviso == null && $this->filename_archivo_aviso == null)){
                $directory_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($directory_foto, $ext_foto);
                if($delete2 == "false"){
                    if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this -> filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $fetch_row_photo -> filename_archivo_aviso, 'aviso_archivo_identificador' => $fetch_row_photo -> aviso_archivo_identificador], "id=:avisoid", ['avisoid' => $id]);
                    }
                }else{
                    $directory = "../src/avisos_archivo/";
                    $path = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> aviso_archivo_identificador); 
                    }
                    if(move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)){
                        $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                        'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this->filename_archivo_aviso, 'aviso_archivo_identificador' => $this->archivo_file_aviso], "id=:avisoid", ['avisoid' => $id]);  
                    }
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y no se subió nada == !=	== !=
            }else if(($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso != null && $this->filename_avisos != null) && ($fetch_row_photo -> filename_archivo_aviso == null && $fetch_row_photo -> aviso_archivo_identificador == null && $this->archivo_file_aviso != null && $this->filename_archivo_aviso != null)){
                $directory_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($directory_foto, $ext_foto);
                $directory_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($directory_archivo, $ext_archivo);
                if((move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)) && (move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo))){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this -> filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y se sube algo == !=	!= !=
            }else if(($fetch_row_photo -> filename_avisos == null && $fetch_row_photo -> avisos_foto_identificador == null && $this->foto_aviso != null && $this->filename_avisos != null) && ($fetch_row_photo -> filename_archivo_aviso != null && $fetch_row_photo -> aviso_archivo_identificador != null && $this->archivo_file_aviso != null && $this->filename_archivo_aviso != null)){
                $directory_foto = "../src/avisos/";
                $ext_foto = pathinfo($this->filename_avisos, PATHINFO_EXTENSION);
                $uploadfile_foto = Avisos::tempnam_sfx($directory_foto, $ext_foto);
                $patch_archivo = "../src/avisos_archivo/".$fetch_row_photo -> aviso_archivo_identificador;
                $directory_archivo = "../src/avisos_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_aviso, PATHINFO_EXTENSION);
                $uploadfile_archivo = Avisos::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> aviso_archivo_identificador);
                }
                if((move_uploaded_file($this->foto_aviso['tmp_name'],$uploadfile_foto)) && (move_uploaded_file($this->archivo_file_aviso['tmp_name'],$uploadfile_archivo))){
                    $crud->update('avisos', ['modificado_por' => $this->usuario, 'titulo_aviso' => $this->titulo_aviso, 'descripcion_aviso' => $this->descripcion_aviso,
                    'fecha_modificacion' => $hoy, 'filename_avisos' => $this->filename_avisos, 'avisos_foto_identificador' => basename($uploadfile_foto), 'filename_archivo_aviso' => $this -> filename_archivo_aviso, 'aviso_archivo_identificador' =>basename($uploadfile_archivo)], "id=:avisoid", ['avisoid' => $id]);
                }
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
