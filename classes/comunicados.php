<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class comunicados {
        
        public $usuario;
        public $titulo_comunicado;
        public $descripcion_comunicado;
        public $filename_comunicados;
        public $comunicado_foto;
        public $filename_archivo_comunicado;
	    public $archivo_comunicado;
        
        public function __construct($user, $communicate_title, $communicate_description, $communicate_filename, $communicate_photo, $communicate_file_filename, $communicate_file_archivo){
            $this->usuario = $user;
            $this->titulo_comunicado = $communicate_title;
            $this->descripcion_comunicado = $communicate_description;
            $this->filename_comunicados = $communicate_filename;
            $this->comunicado_foto = $communicate_photo;
            $this->filename_archivo_comunicado = $communicate_file_filename;
	        $this->archivo_comunicado = $communicate_file_archivo;
        }

        public function insertCommunicate(){
            $object = new connection_database();
            $crud = new crud();
            if($this->filename_comunicados != null && $this->comunicado_foto !=null && $this->filename_archivo_comunicado == null && $this->archivo_comunicado == null){
                $location_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($location_foto, $ext_foto);
                if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)){
                    $crud->store('comunicados', ['users_id' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado, 'filename_comunicados' => $this->filename_comunicados,
                    'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado]);
                }
            }else if($this->filename_comunicados == null && $this->comunicado_foto ==null && $this->filename_archivo_comunicado != null && $this->archivo_comunicado != null){
                $location_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($location_archivo, $ext_archivo);
                if(move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                    $crud->store('comunicados', ['users_id' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado, 'filename_comunicados' => $this->filename_comunicados,
                    'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)]);
                }
            }else if($this->filename_comunicados != null && $this->comunicado_foto !=null && $this->filename_archivo_comunicado != null && $this->archivo_comunicado != null){
                $location_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($location_archivo, $ext_archivo);
                $location_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($location_foto, $ext_foto);
                 if(move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo) && move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)){
                    $crud->store('comunicados', ['users_id' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado, 'filename_comunicados' => $this->filename_comunicados,
                    'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)]);
                }
            }else if($this->filename_comunicados == null && $this->comunicado_foto ==null && $this->filename_archivo_comunicado == null && $this->archivo_comunicado == null){
                $crud->store('comunicados', ['users_id' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado, 'filename_comunicados' => $this->filename_comunicados,
                'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado]);
            }
        }
		
		public function editCommunicate($id, $delete, $delete2){
            $crud = new crud();
            $object = new connection_database();
            $selectphoto = $object -> _db -> prepare("select filename_comunicados, comunicados_foto_identificador, filename_comunicados_archivo, comunicados_archivo_identificador from comunicados where id=:idcomunicado");
            $selectphoto -> execute(array(':idcomunicado' => $id));
            $fetch_row_photo = $selectphoto -> fetch(PDO::FETCH_OBJ);
            $hoy = date("Y-m-d H:i:s");
            //Cuando existe la foto y se reemplaza pero no existe el archivo en la base de datos y no se subió ningún archivo - != !=	== ==
            if(($fetch_row_photo -> filename_comunicados != null && $fetch_row_photo -> comunicados_foto_identificador != null && $this->comunicado_foto != null && $this->filename_comunicados != null) && ($fetch_row_photo -> filename_comunicados_archivo == null && $fetch_row_photo -> comunicados_archivo_identificador == null && $this->archivo_comunicado == null && $this->filename_archivo_comunicado== null)){
                $path_foto = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                $directory_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($directory_foto, $ext_foto);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> comunicados_foto_identificador);
                }
                if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando existe la foto y se reemplaza pero no existe el archivo en la base de datos y se sube un archivo - != !=	== !=
            }else if(($fetch_row_photo -> filename_comunicados != null && $fetch_row_photo -> comunicados_foto_identificador != null && $this->comunicado_foto != null && $this->filename_comunicados != null) && ($fetch_row_photo -> filename_comunicados_archivo == null && $fetch_row_photo -> comunicados_archivo_identificador == null && $this->archivo_comunicado != null && $this->filename_archivo_comunicado != null)){
                $path_foto = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                $directory_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($directory_foto, $ext_foto);
                $directory_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> comunicados_foto_identificador);
                }
                if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto) && move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando existe la foto y se reemplaza y existe el archivo en la base de datos y se sube un archivo - != !=	 != !=
            }else if(($fetch_row_photo -> filename_comunicados != null && $fetch_row_photo -> comunicados_foto_identificador != null && $this->comunicado_foto != null && $this->filename_comunicados != null) && ($fetch_row_photo -> filename_comunicados_archivo != null && $fetch_row_photo -> comunicados_archivo_identificador != null && $this->archivo_comunicado != null && $this->filename_archivo_comunicado != null)){
                $path_foto = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                $directory_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($directory_foto, $ext_foto);
                $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                $directory_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> comunicados_foto_identificador);
                }
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> comunicados_archivo_identificador);
                }
                if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto) && move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando existe la foto y se reemplaza y existe el archivo en la base de datos y no se sube nada - != !=   != ==
            }else if(($fetch_row_photo -> filename_comunicados != null && $fetch_row_photo -> comunicados_foto_identificador != null && $this->comunicado_foto != null && $this->filename_comunicados != null) && ($fetch_row_photo -> filename_comunicados_archivo != null && $fetch_row_photo -> comunicados_archivo_identificador != null && $this->archivo_comunicado == null && $this->filename_archivo_comunicado== null)){
                $path_foto = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                $directory_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($directory_foto, $ext_foto);
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_row_photo -> comunicados_foto_identificador);
                }
                if($delete2 == "false"){
                    if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)){
                        $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                        'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $fetch_row_photo -> filename_comunicados_archivo, 'comunicados_archivo_identificador' => $fetch_row_photo -> comunicados_archivo_identificador], "id=:comunicadoid", ['comunicadoid' => $id]);
                    }
                }else{
                    $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                    $directory_archivo = "../src/comunicados_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> comunicados_archivo_identificador);
                    }
                    if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)){
                        $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                        'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);
                    }
                }
                //Cuando no existe la foto, no se sube nada pero no existe el archivo en la base de datos y no se subió ningún archivo - == ==   == == 
            }else if(($fetch_row_photo -> filename_comunicados == null && $fetch_row_photo -> comunicados_foto_identificador == null && $this->comunicado_foto == null && $this->filename_comunicados == null) && ($fetch_row_photo -> filename_comunicados_archivo == null && $fetch_row_photo -> comunicados_archivo_identificador == null && $this->archivo_comunicado == null && $this->filename_archivo_comunicado== null)){
                $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);
                //Cuando no existe la foto, no se sube nada pero existe el archivo en la base de datos y no se subió ningún archivo - == ==   != ==
            }else if(($fetch_row_photo -> filename_comunicados == null && $fetch_row_photo -> comunicados_foto_identificador == null && $this->comunicado_foto == null && $this->filename_comunicados == null) && ($fetch_row_photo -> filename_comunicados_archivo != null && $fetch_row_photo -> comunicados_archivo_identificador != null && $this->archivo_comunicado == null && $this->filename_archivo_comunicado== null)){
                if($delete2 == "false"){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $fetch_row_photo -> filename_comunicados_archivo, 'comunicados_archivo_identificador' => $fetch_row_photo -> comunicados_archivo_identificador], "id=:comunicadoid", ['comunicadoid' => $id]);
                }else{
                    $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                    $directory_archivo = "../src/comunicados_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> comunicados_archivo_identificador);
                    }
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando no existe la foto, no se sube nada pero no existe el archivo en la base de datos y se subió un archivo - == ==   == !=
            }else if(($fetch_row_photo -> filename_comunicados == null && $fetch_row_photo -> comunicados_foto_identificador == null && $this->comunicado_foto == null && $this->filename_comunicados == null) && ($fetch_row_photo -> filename_comunicados_archivo == null && $fetch_row_photo -> comunicados_archivo_identificador == null && $this->archivo_comunicado != null && $this->filename_archivo_comunicado != null)){
                $directory_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($directory_archivo, $ext_archivo);
                if(move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando no existe la foto, no se sube nada pero existe el archivo en la base de datos y se subió un archivo - == ==   != !=
            }else if(($fetch_row_photo -> filename_comunicados == null && $fetch_row_photo -> comunicados_foto_identificador == null && $this->comunicado_foto == null && $this->filename_comunicados == null) && ($fetch_row_photo -> filename_comunicados_archivo != null && $fetch_row_photo -> comunicados_archivo_identificador != null && $this->archivo_comunicado != null && $this->filename_archivo_comunicado != null)){
                $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                $directory_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> comunicados_archivo_identificador);
                }
                if(move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando existe la foto, no se sube nada pero no existe el archivo en la base de datos y no se subió nada - != ==   == ==
            }else if(($fetch_row_photo -> filename_comunicados != null && $fetch_row_photo -> comunicados_foto_identificador != null && $this->comunicado_foto == null && $this->filename_comunicados == null) && ($fetch_row_photo -> filename_comunicados_archivo == null && $fetch_row_photo -> comunicados_archivo_identificador == null && $this->archivo_comunicado == null && $this->filename_archivo_comunicado== null)){
                if($delete == "false"){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $fetch_row_photo -> filename_comunicados, 'comunicados_foto_identificador' => $fetch_row_photo -> comunicados_foto_identificador, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);
                }else{
                    $directory = "../src/comunicados/";
                    $path = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> comunicados_foto_identificador);  
                    }
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);  
                }
                //Cuando existe la foto, no se sube nada pero existe el archivo en la base de datos y no se subió nada - != ==   != ==
            }else if(($fetch_row_photo -> filename_comunicados != null && $fetch_row_photo -> comunicados_foto_identificador != null && $this->comunicado_foto == null && $this->filename_comunicados == null) && ($fetch_row_photo -> filename_comunicados_archivo != null && $fetch_row_photo -> comunicados_archivo_identificador != null && $this->archivo_comunicado == null && $this->filename_archivo_comunicado== null)){
                if($delete == "false" && $delete2 == "false"){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $fetch_row_photo -> filename_comunicados, 'comunicados_foto_identificador' => $fetch_row_photo -> comunicados_foto_identificador, 'filename_comunicados_archivo' => $fetch_row_photo -> filename_comunicados_archivo, 'comunicados_archivo_identificador' => $fetch_row_photo -> comunicados_archivo_identificador], "id=:comunicadoid", ['comunicadoid' => $id]);
                }else if($delete == "false" && $delete2 == "true"){
                    $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                    $directory_archivo = "../src/comunicados_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> comunicados_archivo_identificador);
                    }
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $fetch_row_photo -> filename_comunicados, 'comunicados_foto_identificador' => $fetch_row_photo -> comunicados_foto_identificador, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);
                }else if($delete == "true" && $delete2 == "false"){
                    $directory_foto = "../src/comunicados/";
                    $path_foto = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                    if(file_exists($path_foto)){
                        unlink($directory_foto.$fetch_row_photo -> comunicados_foto_identificador);  
                    }
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $fetch_row_photo -> filename_comunicados_archivo, 'comunicados_archivo_identificador' => $fetch_row_photo -> comunicados_archivo_identificador], "id=:comunicadoid", ['comunicadoid' => $id]);  
                }else if($delete == "true" && $delete2 == "true"){
                    $directory_foto = "../src/comunicados/";
                    $path_foto = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                    if(file_exists($path_foto)){
                        unlink($directory_foto.$fetch_row_photo -> comunicados_foto_identificador);  
                    }
                    $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                    $directory_archivo = "../src/comunicados_archivo/";
                    if(file_exists($patch_archivo)){
                        unlink($directory_archivo.$fetch_row_photo -> comunicados_archivo_identificador);
                    }
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando existe la foto, no se sube nada pero no existe el archivo en la base de datos y se subió algo - != ==   == !=
            }else if(($fetch_row_photo -> filename_comunicados != null && $fetch_row_photo -> comunicados_foto_identificador != null && $this->comunicado_foto == null && $this->filename_comunicados == null) && ($fetch_row_photo -> filename_comunicados_archivo == null && $fetch_row_photo -> comunicados_archivo_identificador == null && $this->archivo_comunicado != null && $this->filename_archivo_comunicado != null)){
                $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                $directory_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($directory_archivo, $ext_archivo);          
                if($delete == "false"){
                    if(move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                        $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                        'fecha_modificacion' => $hoy, 'filename_comunicados' => $fetch_row_photo -> filename_comunicados, 'comunicados_foto_identificador' => $fetch_row_photo -> comunicados_foto_identificador, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);
                    }
                }else{
                    $directory = "../src/comunicados/";
                    $path = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> comunicados_foto_identificador);  
                    }
                    if(move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                        $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                        'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);  
                    }
                }
                //Cuando existe la foto, no se sube nada pero existe el archivo en la base de datos y se subió algo - != ==   != !=
            }else if(($fetch_row_photo -> filename_comunicados != null && $fetch_row_photo -> comunicados_foto_identificador != null && $this->comunicado_foto == null && $this->filename_comunicados == null) && ($fetch_row_photo -> filename_comunicados_archivo != null && $fetch_row_photo -> comunicados_archivo_identificador != null && $this->archivo_comunicado != null && $this->filename_archivo_comunicado != null)){
                $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                $directory_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> comunicados_archivo_identificador);
                }      
                if($delete == "false"){
                    if(move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                        $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                        'fecha_modificacion' => $hoy, 'filename_comunicados' => $fetch_row_photo -> filename_comunicados, 'comunicados_foto_identificador' => $fetch_row_photo -> comunicados_foto_identificador, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);
                    }
                }else{
                    $directory = "../src/comunicados/";
                    $path = "../src/comunicados/".$fetch_row_photo -> comunicados_foto_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> comunicados_foto_identificador);  
                    }
                    if(move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo)){
                        $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                        'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => $this->comunicado_foto, 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);  
                    }
                }
                //Cuando no existe la foto, se sube algo pero no existe el archivo en la base de datos y no se subió nada == !=   == ==
            }else if(($fetch_row_photo -> filename_comunicados == null && $fetch_row_photo -> comunicados_foto_identificador == null && $this->comunicado_foto != null && $this->filename_comunicados != null) && ($fetch_row_photo -> filename_comunicados_archivo == null && $fetch_row_photo -> comunicados_archivo_identificador == null && $this->archivo_comunicado == null && $this->filename_archivo_comunicado== null)){
                $directory_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($directory_foto, $ext_foto);
                if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this -> filename_archivo_comunicado, 'comunicados_archivo_identificador' =>$this -> archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y no se subió nada == !=   != ==
            }else if(($fetch_row_photo -> filename_comunicados == null && $fetch_row_photo -> comunicados_foto_identificador == null && $this->comunicado_foto != null && $this->filename_comunicados != null) && ($fetch_row_photo -> filename_comunicados_archivo != null && $fetch_row_photo -> comunicados_archivo_identificador != null && $this->archivo_comunicado == null && $this->filename_archivo_comunicado== null)){
                $directory_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($directory_foto, $ext_foto);
                if($delete2 == "false"){
                    if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)){
                        $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                        'fecha_modificacion' => $hoy, 'filename_comunicados' => $this -> filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $fetch_row_photo -> filename_comunicados_archivo, 'comunicados_archivo_identificador' => $fetch_row_photo -> comunicados_archivo_identificador], "id=:comunicadoid", ['comunicadoid' => $id]);
                    }
                }else{
                    $directory = "../src/comunicados_archivo/";
                    $path = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                    if(file_exists($path)){
                        unlink($directory.$fetch_row_photo -> comunicados_archivo_identificador); 
                    }
                    if(move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)){
                        $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                        'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this->filename_archivo_comunicado, 'comunicados_archivo_identificador' => $this->archivo_comunicado], "id=:comunicadoid", ['comunicadoid' => $id]);  
                    }
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y no se subió nada == !=	== !=
            }else if(($fetch_row_photo -> filename_comunicados == null && $fetch_row_photo -> comunicados_foto_identificador == null && $this->comunicado_foto != null && $this->filename_comunicados != null) && ($fetch_row_photo -> filename_comunicados_archivo == null && $fetch_row_photo -> comunicados_archivo_identificador == null && $this->archivo_comunicado != null && $this->filename_archivo_comunicado != null)){
                $directory_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($directory_foto, $ext_foto);
                $directory_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($directory_archivo, $ext_archivo);
                if((move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)) && (move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo))){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this -> filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
                //Cuando no existe la foto, se sube algo pero existe el archivo en la base de datos y se sube algo == !=	!= !=
            }else if(($fetch_row_photo -> filename_comunicados == null && $fetch_row_photo -> comunicados_foto_identificador == null && $this->comunicado_foto != null && $this->filename_comunicados != null) && ($fetch_row_photo -> filename_comunicados_archivo != null && $fetch_row_photo -> comunicados_archivo_identificador != null && $this->archivo_comunicado != null && $this->filename_archivo_comunicado != null)){
                $directory_foto = "../src/comunicados/";
                $ext_foto = pathinfo($this->filename_comunicados, PATHINFO_EXTENSION);
                $uploadfile_foto = Comunicados::tempnam_sfx($directory_foto, $ext_foto);
                $patch_archivo = "../src/comunicados_archivo/".$fetch_row_photo -> comunicados_archivo_identificador;
                $directory_archivo = "../src/comunicados_archivo/";
                $ext_archivo = pathinfo($this->filename_archivo_comunicado, PATHINFO_EXTENSION);
                $uploadfile_archivo = Comunicados::tempnam_sfx($directory_archivo, $ext_archivo);
                if(file_exists($patch_archivo)){
                    unlink($directory_archivo.$fetch_row_photo -> comunicados_archivo_identificador);
                }
                if((move_uploaded_file($this->comunicado_foto['tmp_name'],$uploadfile_foto)) && (move_uploaded_file($this->archivo_comunicado['tmp_name'],$uploadfile_archivo))){
                    $crud->update('comunicados', ['modificado_por' => $this->usuario, 'titulo_comunicado' => $this->titulo_comunicado, 'descripcion_comunicado' => $this->descripcion_comunicado,
                    'fecha_modificacion' => $hoy, 'filename_comunicados' => $this->filename_comunicados, 'comunicados_foto_identificador' => basename($uploadfile_foto), 'filename_comunicados_archivo' => $this -> filename_archivo_comunicado, 'comunicados_archivo_identificador' => basename($uploadfile_archivo)], "id=:comunicadoid", ['comunicadoid' => $id]);
                }
            }
        }

        public static function eraseCommunicate($id){
            $crud = new crud();
            $object = new connection_database();
            $selectphoto = $object -> _db -> prepare("select filename_comunicados, comunicados_foto_identificador, filename_comunicados_archivo, comunicados_archivo_identificador from comunicados where id=:idcomunicado");
            $select_photo -> execute(array(':idcomunicado' => $id));
            $fetch_select_photo = $select_photo -> fetch(PDO::FETCH_OBJ);
            if($fetch_select_photo -> filename_comunicados != null && $fetch_select_photo -> comunicados_foto_identificador != null && $fetch_select_photo -> filename_comunicados_archivo == null && $fetch_select_photo -> comunicados_archivo_identificador == null){
                $directory_foto = __DIR__ . "/../src/comunicados/";
                $path_foto = __DIR__ . "/../src/comunicados/".$fetch_select_photo -> comunicados_foto_identificador;
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_select_photo -> comunicados_foto_identificador);
                }
                $crud->delete('comunicados', 'id=:comunicadoid', ['comunicadoid' => $id]);
            }else if($fetch_select_photo -> filename_comunicados == null && $fetch_select_photo -> comunicados_foto_identificador == null && $fetch_select_photo -> filename_comunicados_archivo != null && $fetch_select_photo -> comunicados_archivo_identificador != null){
                $directory_archivo = __DIR__ . "/../src/comunicados_archivo/";
                $path_archivo = __DIR__ . "/../src/comunicados_archivo/".$fetch_select_photo -> comunicados_archivo_identificador;
                if(file_exists($path_archivo)){
                    unlink($directory_archivo.$fetch_select_photo -> comunicados_archivo_identificador);
                }
                $crud->delete('comunicados', 'id=:comunicadoid', ['comunicadoid' => $id]);
            }else if($fetch_select_photo -> filename_comunicados != null && $fetch_select_photo -> comunicados_foto_identificador != null && $fetch_select_photo -> filename_comunicados_archivo != null && $fetch_select_photo -> comunicados_archivo_identificador != null){
                $directory_foto = __DIR__ . "/../src/comunicados/";
                $path_foto = __DIR__ . "/../src/comunicados/".$fetch_select_photo -> comunicados_foto_identificador;
                $directory_archivo = __DIR__ . "/../src/comunicados_archivo/";
                $path_archivo = __DIR__ . "/../src/comunicados_archivo/".$fetch_select_photo -> comunicados_archivo_identificador;
                if(file_exists($path_foto)){
                    unlink($directory_foto.$fetch_select_photo -> comunicados_foto_identificador);
                }
                if(file_exists($path_archivo)){
                    unlink($directory_archivo.$fetch_select_photo -> comunicados_archivo_identificador);
                }
                $crud->delete('comunicados', 'id=:comunicadoid', ['comunicadoid' => $id]);
            }else{
                $crud->delete('comunicados', 'id=:comunicadoid', ['comunicadoid' => $id]);
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