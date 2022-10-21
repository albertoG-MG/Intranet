<?php 
			require 'conexion.php';
			$object = new connection_database();

			if(isset($_POST["expedienteid"]) && isset($_POST["tipoarchivo"])){
				$directorio = '../src/pdfs_uploaded';
				$ficheros = preg_grep('~\.(jpeg|jpg|pdf)$~', scandir($directorio));

				$checkficheros = $object -> _db -> prepare("SELECT historial_papeleria_empleado.id, historial_papeleria_empleado.viejo_nombre_archivo, historial_papeleria_empleado.viejo_identificador, historial_papeleria_empleado.vieja_fecha_subida FROM historial_papeleria_empleado WHERE expediente_id= :expedienteid AND tipo_archivo= :tipo ORDER BY vieja_fecha_subida DESC");
				$checkficheros -> execute(array(':expedienteid' => $_POST["expedienteid"], ':tipo' => $_POST["tipoarchivo"]));
				$fetchficheros = $checkficheros -> fetchAll(PDO::FETCH_ASSOC);

				$dontexist = array_diff(array_column($fetchficheros, 'viejo_identificador'), $ficheros);

				$array = [];


				for($i = 0; $i < count($fetchficheros); $i++){
					if(is_countable($dontexist) && count($dontexist) > 0){
						if($fetchficheros[$i]["viejo_identificador"] == $dontexist[$i]){
						$array[]=array('id'=>$fetchficheros[$i]["id"],'viejo_nombre_archivo'=>'No se encontró el archivo','viejo_identificador'=>'No se encontró el archivo', 'vieja_fecha_subida'=>$fetchficheros[$i]["vieja_fecha_subida"]);
						}else{
						$array[]=array('id'=>$fetchficheros[$i]["id"],'viejo_nombre_archivo'=>$fetchficheros[$i]["viejo_nombre_archivo"],'viejo_identificador'=>$fetchficheros[$i]["viejo_identificador"], 'vieja_fecha_subida'=>$fetchficheros[$i]["vieja_fecha_subida"]);
						}
					}else{
						$array[]=array('id'=>$fetchficheros[$i]["id"],'viejo_nombre_archivo'=>$fetchficheros[$i]["viejo_nombre_archivo"],'viejo_identificador'=>$fetchficheros[$i]["viejo_identificador"], 'vieja_fecha_subida'=>$fetchficheros[$i]["vieja_fecha_subida"]);
					}
				}
				
				print json_encode($array, JSON_UNESCAPED_UNICODE);
			}
?>