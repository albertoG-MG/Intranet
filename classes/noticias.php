<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class noticias {
        
        public $usuario;
        public $titulo_noticia;
        public $descripcion_noticia;
        public $filename_noticias;
        public $foto; 
        
        public function __construct($user, $news_title, $news_description, $news_filename, $photo){
            $this->usuario = $user;
            $this->titulo_noticia = $news_title;
            $this->descripcion_noticia = $news_description;
            $this->filename_noticias = $news_filename;
            $this->foto = $photo;
        }

        public function findAllNews()
        {
            $object = new connection_database();
            $statement = "SELECT id, users_id, modificado_por, titulo_noticia, descripcion_noticia, fecha_creacion_noticia, fecha_modificacion, filename_noticias, noticias_foto_identificador FROM noticias;";
            try {
                $statement = $object->_db->query($statement);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        public function findNews($id)
        {
            $object = new connection_database();
            $statement = "SELECT id, users_id, modificado_por, titulo_noticia, descripcion_noticia, fecha_creacion_noticia, fecha_modificacion, filename_noticias, noticias_foto_identificador FROM noticias WHERE id = ?;";
            try {
                $statement = $object->_db->prepare($statement);
                $statement->execute(array($id));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }    
        }

        public function insertNews(){
            $object = new connection_database();
            $crud = new crud();
            if($this->filename_noticias != null && $this->foto !=null){
                $location = "../src/noticias/";
                $ext = pathinfo($this->filename_noticias, PATHINFO_EXTENSION);
                $uploadfile = Noticias::tempnam_sfx($location, $ext);
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                    $crud->store('noticias', ['users_id' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia, 'filename_noticias' => $this->filename_noticias,
                    'noticias_foto_identificador' => basename($uploadfile)]);
                }
            }else{
                $crud->store('noticias', ['users_id' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia, 'filename_noticias' => $this->filename_noticias,
                'noticias_foto_identificador' => $this->foto]);
            }
        }

        public function editNews($id, $delete){
            $crud = new crud();
            $object = new connection_database();
            $selectphoto = $object -> _db -> prepare("select filename_noticias, noticias_foto_identificador from noticias where id=:idnoticia");
            $selectphoto -> execute(array(':idnoticia' => $id));
            $fetch_row_photo = $selectphoto -> fetch(PDO::FETCH_OBJ);
            $hoy = date("Y-m-d H:i:s");
            //Cuando existe la foto y se sube algo
            if($fetch_row_photo -> filename_noticias != null && $fetch_row_photo -> noticias_foto_identificador != null && $this->foto != null && $this->filename_noticias != null){
                //Aquí se debe de eliminar la foto anterior
                $path = "../src/noticias/".$fetch_row_photo -> noticias_foto_identificador;
                $directory = "../src/noticias/";
                $ext = pathinfo($this->filename_noticias, PATHINFO_EXTENSION);
                $uploadfile = Noticias::tempnam_sfx($directory, $ext);
                if(!file_exists($path)){
                    if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                        $crud->update('noticias', ['modificado_por' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia,
                        'fecha_modificacion' => $hoy, 'filename_noticias' => $this->filename_noticias, 'noticias_foto_identificador' => basename($uploadfile)], "id=:noticiaid", ['noticiaid' => $id]);
                    }
                }else{
                    unlink($directory.$fetch_row_photo -> noticias_foto_identificador);
                    if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                        $crud->update('noticias', ['modificado_por' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia,
                        'fecha_modificacion' => $hoy, 'filename_noticias' => $this->filename_noticias, 'noticias_foto_identificador' => basename($uploadfile)], "id=:noticiaid", ['noticiaid' => $id]);
                    }
                }
            //Cuando existe la foto y no se sube nada
            }else if($fetch_row_photo -> filename_noticias != null && $fetch_row_photo -> noticias_foto_identificador != null && $this->foto == null && $this->filename_noticias == null){
                if($delete == "false"){
                    $crud->update('noticias', ['modificado_por' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia,
                    'fecha_modificacion' => $hoy, 'filename_noticias' => $fetch_row_photo -> filename_noticias, 'noticias_foto_identificador' => $fetch_row_photo -> noticias_foto_identificador], "id=:noticiaid", ['noticiaid' => $id]);
                }else{
                    $directory = "../src/noticias/";
                    $path = "../src/noticias/".$fetch_row_photo -> noticias_foto_identificador;
                    if(!file_exists($path)){
                        $crud->update('noticias', ['modificado_por' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia,
                        'fecha_modificacion' => $hoy, 'filename_noticias' => $this->filename_noticias, 'noticias_foto_identificador' => $this->foto], "id=:noticiaid", ['noticiaid' => $id]);
                    }else{
                        unlink($directory.$fetch_row_photo -> noticias_foto_identificador);
                        $crud->update('noticias', ['modificado_por' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia,
                        'fecha_modificacion' => $hoy, 'filename_noticias' => $this->filename_noticias, 'noticias_foto_identificador' => $this->foto], "id=:noticiaid", ['noticiaid' => $id]);
                    }
                }
            //Cuando no existe la foto y se sube algo
            }else if($fetch_row_photo -> filename_noticias == null && $fetch_row_photo -> noticias_foto_identificador == null && $this->foto != null && $this->filename_noticias != null){
                $directory = "../src/noticias/";
                $ext = pathinfo($this->filename_noticias, PATHINFO_EXTENSION);
                $uploadfile = Noticias::tempnam_sfx($directory, $ext);
                if(move_uploaded_file($this->foto['tmp_name'],$uploadfile)){
                    $crud->update('noticias', ['modificado_por' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia,
                    'fecha_modificacion' => $hoy, 'filename_noticias' => $this->filename_noticias, 'noticias_foto_identificador' => basename($uploadfile)], "id=:noticiaid", ['noticiaid' => $id]);
                }    
            //Cuando no existe la foto y no se sube algo      
            }else if($fetch_row_photo -> filename_noticias == null && $fetch_row_photo -> noticias_foto_identificador == null && $this->foto == null && $this->filename_noticias == null){
                $crud->update('noticias', ['modificado_por' => $this->usuario, 'titulo_noticia' => $this->titulo_noticia, 'descripcion_noticia' => $this->descripcion_noticia,
                'fecha_modificacion' => $hoy, 'filename_noticias' => $this->filename_noticias, 'noticias_foto_identificador' => $this->foto], "id=:noticiaid", ['noticiaid' => $id]);
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
