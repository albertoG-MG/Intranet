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