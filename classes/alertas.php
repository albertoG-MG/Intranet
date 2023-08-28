<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class alertas {
        
        public $usuario;
        public $titulo_alerta;
        public $descripcion_alerta;
        public $filename_alertas;
        public $foto;
        public $filename_archivo_alerta;
        public $archivo_alerta;
        
        public function __construct($user, $alerts_title, $alerts_description, $alerts_filename, $photo, $alerts_file_filename, $alert_file){
            $this->usuario = $user;
            $this->titulo_alerta = $alerts_title;
            $this->descripcion_alerta = $alerts_description;
            $this->filename_alertas = $alerts_filename;
            $this->foto = $photo;
            $this->filename_archivo_alerta = $alerts_file_filename;
            $this->archivo_alerta = $alert_file;
        }

        public function findAllAlerts()
        {
            $object = new connection_database();
            $statement = "SELECT id, users_id, modificado_por, titulo_alerta, descripcion_alerta, fecha_creacion_alerta, fecha_modificacion, filename_alertas, alertas_foto_identificador, filename_archivo_alerta, archivo_alerta FROM alertas;";
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
            $statement = "SELECT id, users_id, modificado_por, titulo_alerta, descripcion_alerta, fecha_creacion_alerta, fecha_modificacion, filename_alertas, alertas_foto_identificador, filename_archivo_alerta, archivo_alerta FROM alertas WHERE id = ?;";
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
            if($this->filename_alertas != null && $this->foto !=null && $this->filename_archivo_alerta == null && $this->archivo_alerta == null){
                $location = "../src/alertas/";
                $ext = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile = Alertas::tempnam_sfx($location, $ext);
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                    $crud->store('alertas', ['users_id' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta, 'filename_alertas' => $this->filename_alertas,
                    'alertas_foto_identificador' => basename($uploadfile), 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta]);
                }
            }else if($this->filename_alertas == null && $this->foto ==null && $this->filename_archivo_alerta != null && $this->archivo_alerta != null){
                $location = "../src/alertas_archivo/";
                $ext = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile = Alertas::tempnam_sfx($location, $ext);
                if(move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile)){
                    $crud->store('alertas', ['users_id' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta, 'filename_alertas' => $this->filename_alertas,
                    'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile)]);
                }
            }else if($this->filename_alertas != null && $this->foto !=null && $this->filename_archivo_alerta != null && $this->archivo_alerta != null){
                $location_archivo_alerta = "../src/alertas_archivo/";
                $ext_alerta = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($location_archivo_alerta, $ext_alerta);
                $location_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($location_foto, $ext_foto);
                 if(move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo) && move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)){
                    $crud->store('alertas', ['users_id' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta, 'filename_alertas' => $this->filename_alertas,
                    'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)]);
                }
            }else if($this->filename_alertas == null && $this->foto ==null && $this->filename_archivo_alerta == null && $this->archivo_alerta == null){
                $crud->store('alertas', ['users_id' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta, 'filename_alertas' => $this->filename_alertas,
                'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta]);
            }
        }

        public function editAlerts($id, $delete, $delete2){
            $crud = new crud();
            $object = new connection_database();
            $selectphoto = $object -> _db -> prepare("select filename_alertas, alertas_foto_identificador, filename_alertas_archivo, alertas_archivo_identificador from alertas where id=:idalerta");
            $selectphoto -> execute(array(':idalerta' => $id));
            $fetch_row_photo = $selectphoto -> fetch(PDO::FETCH_OBJ);
            $hoy = date("Y-m-d H:i:s");
            //Cuando existe la foto y se reemplaza pero no existe el archivo en la base de datos y no se subió ningún archivo - != !=	== ==
            if(($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto != null && $this->filename_alertas != null) && ($fetch_row_photo -> filename_alertas_archivo == null && $fetch_row_photo -> alertas_archivo_identificador == null && $this->archivo_alerta == null && $this->filename_archivo_alerta == null)){
                $path_foto = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                $directory_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($directory_foto, $ext_foto);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> alertas_foto_identificador);
                }
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando existe la foto y se reemplaza pero no existe el archivo en la base de datos y se sube un archivo - != !=	== !=
            }else if(($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto != null && $this->filename_alertas != null) && ($fetch_row_photo -> filename_alertas_archivo == null && $fetch_row_photo -> alertas_archivo_identificador == null && $this->archivo_alerta != null && $this->filename_archivo_alerta != null)){
                $path_foto = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                $directory_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($directory_foto, $ext_foto);
                $directory_archivo = "../src/alertas_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> alertas_foto_identificador);
                }
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto) && move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo)){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando existe la foto y se reemplaza y existe el archivo en la base de datos y se sube un archivo - != !=	 != !=
            }else if(($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto != null && $this->filename_alertas != null) && ($fetch_row_photo -> filename_alertas_archivo != null && $fetch_row_photo -> alertas_archivo_identificador != null && $this->archivo_alerta != null && $this->filename_archivo_alerta != null)){
                $path_foto = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                $directory_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($directory_foto, $ext_foto);
                $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                $directory_archivo = "../src/alertas_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> alertas_foto_identificador);
                }
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> alertas_archivo_identificador);
                }
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto) && move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo)){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando existe la foto y se reemplaza y existe el archivo en la base de datos y no se sube nada - != !=   != ==
            }else if(($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto != null && $this->filename_alertas != null) && ($fetch_row_photo -> filename_alertas_archivo != null && $fetch_row_photo -> alertas_archivo_identificador != null && $this->archivo_alerta == null && $this->filename_archivo_alerta == null)){
                $path_foto = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                $directory_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($directory_foto, $ext_foto);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> alertas_foto_identificador);
                }
                if($delete2 == "false"){
                    if(move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $fetch_row_photo -> filename_alertas_archivo, 'alertas_archivo_identificador' => $fetch_row_photo -> alertas_archivo_identificador], "id=:alertaid", ['alertaid' => $id]);
                    }
                }else{
                    $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                    $directory_archivo = "../src/alertas_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> alertas_archivo_identificador);
                    }
                    if(move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
                    }
                }
                //Cuando no existe la foto, no se sube nada pero no existe el archivo en la base de datos y no se subió ningún archivo - == ==   == == 
            }else if(($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto == null && $this->filename_alertas == null) && ($fetch_row_photo -> filename_alertas_archivo == null && $fetch_row_photo -> alertas_archivo_identificador == null && $this->archivo_alerta == null && $this->filename_archivo_alerta == null)){
                $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
                //Cuando no existe la foto, no se sube nada pero existe el archivo en la base de datos y no se subió ningún archivo - == ==   != ==
            }else if(($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto == null && $this->filename_alertas == null) && ($fetch_row_photo -> filename_alertas_archivo != null && $fetch_row_photo -> alertas_archivo_identificador != null && $this->archivo_alerta == null && $this->filename_archivo_alerta == null)){
                if($delete2 == "false"){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $fetch_row_photo -> filename_alertas_archivo, 'alertas_archivo_identificador' => $fetch_row_photo -> alertas_archivo_identificador], "id=:alertaid", ['alertaid' => $id]);
                }else{
                    $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                    $directory_archivo = "../src/alertas_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> alertas_archivo_identificador);
                    }
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando no existe la foto, no se sube nada pero no existe el archivo en la base de datos y se subió un archivo - == ==   == !=
            }else if(($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto == null && $this->filename_alertas == null) && ($fetch_row_photo -> filename_alertas_archivo == null && $fetch_row_photo -> alertas_archivo_identificador == null && $this->archivo_alerta != null && $this->filename_archivo_alerta != null)){
                $directory_archivo = "../src/alertas_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($directory_archivo, $ext_archivo);
                if(move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo)){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando no existe la foto, no se sube nada pero existe el archivo en la base de datos y se subió un archivo - == ==   != !=
            }else if(($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto == null && $this->filename_alertas == null) && ($fetch_row_photo -> filename_alertas_archivo != null && $fetch_row_photo -> alertas_archivo_identificador != null && $this->archivo_alerta != null && $this->filename_archivo_alerta != null)){
                $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                $directory_archivo = "../src/alertas_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> alertas_archivo_identificador);
                }
                if(move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo)){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando existe la foto, no se sube nada pero no existe el archivo en la base de datos y no se subió nada - != ==   == ==
            }else if(($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto == null && $this->filename_alertas == null) && ($fetch_row_photo -> filename_alertas_archivo == null && $fetch_row_photo -> alertas_archivo_identificador == null && $this->archivo_alerta == null && $this->filename_archivo_alerta == null)){
                if($delete == "false"){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $fetch_row_photo -> filename_alertas, 'alertas_foto_identificador' => $fetch_row_photo -> alertas_foto_identificador, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
                }else{
                    $directory = "../src/alertas/";
                    $path = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> alertas_foto_identificador);  
                    }
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);  
                }
                //Cuando existe la foto, no se sube nada pero existe el archivo en la base de datos y no se subió nada - != ==   != ==
            }else if(($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto == null && $this->filename_alertas == null) && ($fetch_row_photo -> filename_alertas_archivo != null && $fetch_row_photo -> alertas_archivo_identificador != null && $this->archivo_alerta == null && $this->filename_archivo_alerta == null)){
                if($delete == "false" && $delete2 == "false"){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $fetch_row_photo -> filename_alertas, 'alertas_foto_identificador' => $fetch_row_photo -> alertas_foto_identificador, 'filename_alertas_archivo' => $fetch_row_photo -> filename_alertas_archivo, 'alertas_archivo_identificador' => $fetch_row_photo -> alertas_archivo_identificador], "id=:alertaid", ['alertaid' => $id]);
                }else if($delete == "false" && $delete2 == "true"){
                    $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                    $directory_archivo = "../src/alertas_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> alertas_archivo_identificador);
                    }
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $fetch_row_photo -> filename_alertas, 'alertas_foto_identificador' => $fetch_row_photo -> alertas_foto_identificador, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
                }else if($delete == "true" && $delete2 == "false"){
                    $directory_foto = "../src/alertas/";
                    $path_foto = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                    if(file_exists($path_foto)){
                        unlink($directory_foto.$fetch_row_photo -> alertas_foto_identificador);  
                    }
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $fetch_row_photo -> filename_alertas_archivo, 'alertas_archivo_identificador' => $fetch_row_photo -> alertas_archivo_identificador], "id=:alertaid", ['alertaid' => $id]);  
                }else if($delete == "true" && $delete2 == "true"){
                    $directory_foto = "../src/alertas/";
                    $path_foto = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                    if(file_exists($path_foto)){
                        unlink($directory_foto.$fetch_row_photo -> alertas_foto_identificador);  
                    }
                    $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                    $directory_archivo = "../src/alertas_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> alertas_archivo_identificador);
                    }
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando existe la foto, no se sube nada pero no existe el archivo en la base de datos y se subió algo - != ==   == !=
            }else if(($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto == null && $this->filename_alertas == null) && ($fetch_row_photo -> filename_alertas_archivo == null && $fetch_row_photo -> alertas_archivo_identificador == null && $this->archivo_alerta != null && $this->filename_archivo_alerta != null)){
                $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                $directory_archivo = "../src/alertas_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($directory_archivo, $ext_archivo);          
                if($delete == "false"){
                    if(move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $fetch_row_photo -> filename_alertas, 'alertas_foto_identificador' => $fetch_row_photo -> alertas_foto_identificador, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);
                    }
                }else{
                    $directory = "../src/alertas/";
                    $path = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> alertas_foto_identificador);  
                    }
                    if(move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);  
                    }
                }
                //Cuando existe la foto, no se sube nada pero existe el archivo en la base de datos y se subió algo - != ==   != !=
            }else if(($fetch_row_photo -> filename_alertas != null && $fetch_row_photo -> alertas_foto_identificador != null && $this->foto == null && $this->filename_alertas == null) && ($fetch_row_photo -> filename_alertas_archivo != null && $fetch_row_photo -> alertas_archivo_identificador != null && $this->archivo_alerta != null && $this->filename_archivo_alerta != null)){
                $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                $directory_archivo = "../src/alertas_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> alertas_archivo_identificador);
                }      
                if($delete == "false"){
                    if(move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $fetch_row_photo -> filename_alertas, 'alertas_foto_identificador' => $fetch_row_photo -> alertas_foto_identificador, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);
                    }
                }else{
                    $directory = "../src/alertas/";
                    $path = "../src/alertas/".$fetch_row_photo -> alertas_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> alertas_foto_identificador);  
                    }
                    if(move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => $this->foto, 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);  
                    }
                }
                //Cuando no existe la foto, se sube algo pero no existe el archivo en la base de datos y no se subió nada == !=   == ==
            }else if(($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto != null && $this->filename_alertas != null) && ($fetch_row_photo -> filename_alertas_archivo == null && $fetch_row_photo -> alertas_archivo_identificador == null && $this->archivo_alerta == null && $this->filename_archivo_alerta == null)){
                $directory_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($directory_foto, $ext_foto);
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this -> filename_archivo_alerta, 'alertas_archivo_identificador' => $this -> archivo_alerta], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y no se subió nada == !=   != ==
            }else if(($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto != null && $this->filename_alertas != null) && ($fetch_row_photo -> filename_alertas_archivo != null && $fetch_row_photo -> alertas_archivo_identificador != null && $this->archivo_alerta == null && $this->filename_archivo_alerta == null)){
                $directory_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($directory_foto, $ext_foto);
                if($delete2 == "false"){
                    if(move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this -> filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $fetch_row_photo -> filename_alertas_archivo, 'alertas_archivo_identificador' => $fetch_row_photo -> alertas_archivo_identificador], "id=:alertaid", ['alertaid' => $id]);
                    }
                }else{
                    $directory = "../src/alertas_archivo/";
                    $path = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> alertas_archivo_identificador); 
                    }
                    if(move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)){
                        $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                        'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this->filename_archivo_alerta, 'alertas_archivo_identificador' => $this->archivo_alerta], "id=:alertaid", ['alertaid' => $id]);  
                    }
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y no se subió nada == !=	== !=
            }else if(($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto != null && $this->filename_alertas != null) && ($fetch_row_photo -> filename_alertas_archivo == null && $fetch_row_photo -> alertas_archivo_identificador == null && $this->archivo_alerta != null && $this->filename_archivo_alerta != null)){
                $directory_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($directory_foto, $ext_foto);
                $directory_archivo = "../src/alertas_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($directory_archivo, $ext_archivo);
                if((move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)) && (move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo))){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this -> filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y se sube algo == !=	!= !=
            }else if(($fetch_row_photo -> filename_alertas == null && $fetch_row_photo -> alertas_foto_identificador == null && $this->foto != null && $this->filename_alertas != null) && ($fetch_row_photo -> filename_alertas_archivo != null && $fetch_row_photo -> alertas_archivo_identificador != null && $this->archivo_alerta != null && $this->filename_archivo_alerta != null)){
                $directory_foto = "../src/alertas/";
                $ext_foto = pathinfo($this->filename_alertas, PATHINFO_EXTENSION);
                $uploadfile_foto = Alertas::tempnam_sfx($directory_foto, $ext_foto);
                $patch_archivo = "../src/alertas_archivo/".$fetch_row_photo -> alertas_archivo_identificador;
                $directory_archivo = "../src/alertas_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_alerta, PATHINFO_EXTENSION);
                $uploadfile_archivo = Alertas::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> alertas_archivo_identificador);
                }
                if((move_uploaded_file($this->foto['tmp_name'],$uploadfile_foto)) && (move_uploaded_file($this->archivo_alerta['tmp_name'],$uploadfile_archivo))){
                    $crud->update('alertas', ['modificado_por' => $this->usuario, 'titulo_alerta' => $this->titulo_alerta, 'descripcion_alerta' => $this->descripcion_alerta,
                    'fecha_modificacion' => $hoy, 'filename_alertas' => $this->filename_alertas, 'alertas_foto_identificador' => basename($uploadfile_foto), 'filename_alertas_archivo' => $this -> filename_archivo_alerta, 'alertas_archivo_identificador' => basename($uploadfile_archivo)], "id=:alertaid", ['alertaid' => $id]);
                }
            }
        }

        public static function eraseAlerts($id){
            $crud = new crud();
            $object = new connection_database();
            $select_photo = $object -> _db -> prepare("select filename_alertas, alertas_foto_identificador, filename_alertas_archivo, alertas_archivo_identificador from alertas where id=:idalerta");
            $select_photo -> execute(array(':idalerta' => $id));
            $fetch_select_photo = $select_photo -> fetch(PDO::FETCH_OBJ);
            if($fetch_select_photo -> filename_alertas != null && $fetch_select_photo -> alertas_foto_identificador != null && $fetch_select_photo -> filename_alertas_archivo == null && $fetch_select_photo -> alertas_archivo_identificador == null){
                $directory_foto = __DIR__ . "/../src/alertas/";
                $path_foto = __DIR__ . "/../src/alertas/".$fetch_select_photo -> alertas_foto_identificador;
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_select_photo -> alertas_foto_identificador);
                }
                $crud->delete('alertas', 'id=:idalerta', ['idalerta' => $id]);
            }else if($fetch_select_photo -> filename_alertas == null && $fetch_select_photo -> alertas_foto_identificador == null && $fetch_select_photo -> filename_alertas_archivo != null && $fetch_select_photo -> alertas_archivo_identificador != null){
                $directory_archivo = __DIR__ . "/../src/alertas_archivo/";
                $path_archivo = __DIR__ . "/../src/alertas_archivo/".$fetch_select_photo -> alertas_archivo_identificador;
                if(file_exists($path_archivo)){
                    unlink($directory_archivo.$fetch_select_photo -> alertas_archivo_identificador);
                }
                $crud->delete('alertas', 'id=:idalerta', ['idalerta' => $id]);
            }else if($fetch_select_photo -> filename_alertas != null && $fetch_select_photo -> alertas_foto_identificador != null && $fetch_select_photo -> filename_alertas_archivo != null && $fetch_select_photo -> alertas_archivo_identificador != null){
                $directory_foto = __DIR__ . "/../src/alertas/";
                $path_foto = __DIR__ . "/../src/alertas/".$fetch_select_photo -> alertas_foto_identificador;
                $directory_archivo = __DIR__ . "/../src/alertas_archivo/";
                $path_archivo = __DIR__ . "/../src/alertas_archivo/".$fetch_select_photo -> alertas_archivo_identificador;
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_select_photo -> alertas_foto_identificador);
                }
                if(file_exists($path_archivo)){
                    unlink($directory_archivo.$fetch_select_photo -> alertas_archivo_identificador);
                }
                $crud->delete('alertas', 'id=:idalerta', ['idalerta' => $id]);
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