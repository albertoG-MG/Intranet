<?php 
	require 'conexion.php';
	$object = new connection_database();

	if(isset($_POST["expedienteid"]) && isset($_POST["tipoarchivo"])){
		$directorio = '../src/documents';
		$ficheros = preg_grep('~\.(jpeg|jpg|png|pdf)$~', scandir($directorio));

		$checkficheros = $object -> _db -> prepare("SELECT id, nombre_archivo, identificador, fecha_subida, predeterminado FROM (SELECT historial_papeleria_empleado.id as id, historial_papeleria_empleado.viejo_nombre_archivo as nombre_archivo, historial_papeleria_empleado.viejo_identificador as identificador, historial_papeleria_empleado.vieja_fecha_subida as fecha_subida, 'no vinculado' as predeterminado FROM historial_papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo= :tipo UNION SELECT papeleria_empleado.id as id, papeleria_empleado.nombre_archivo as nombre_archivo, papeleria_empleado.identificador as identificador, papeleria_empleado.fecha_subida as fecha_subida, 'vinculado' as predeterminado FROM papeleria_empleado WHERE expediente_id=:expedienteid2 AND tipo_archivo= :tipo2) u ORDER BY fecha_subida DESC");
		$checkficheros -> execute(array(':expedienteid' => $_POST["expedienteid"], ':tipo' => $_POST["tipoarchivo"], ':expedienteid2' => $_POST["expedienteid"], ':tipo2' => $_POST["tipoarchivo"]));
		$fetchficheros = $checkficheros -> fetchAll(PDO::FETCH_ASSOC);

		$dontexist = array_diff(array_column($fetchficheros, 'identificador'), $ficheros);

		$array = [];


		for($i = 0; $i < count($fetchficheros); $i++){
			if(is_countable($dontexist) && count($dontexist) > 0){
				if(array_key_exists($i, $dontexist)){
					$array[]=array('id'=>$fetchficheros[$i]["id"],'nombre_archivo'=>null, 'identificador'=>null, 'fecha_subida'=>$fetchficheros[$i]["fecha_subida"], 'predeterminado'=>$fetchficheros[$i]["predeterminado"]);
				}else{
					$array[]=array('id'=>$fetchficheros[$i]["id"],'nombre_archivo'=>$fetchficheros[$i]["nombre_archivo"], 'identificador'=>$fetchficheros[$i]["identificador"], 'fecha_subida'=>$fetchficheros[$i]["fecha_subida"], 'predeterminado'=>$fetchficheros[$i]["predeterminado"]);
				}
			}else{
				$array[]=array('id'=>$fetchficheros[$i]["id"],'nombre_archivo'=>$fetchficheros[$i]["nombre_archivo"], 'identificador'=>$fetchficheros[$i]["identificador"], 'fecha_subida'=>$fetchficheros[$i]["fecha_subida"], 'predeterminado'=>$fetchficheros[$i]["predeterminado"]);
			}
		}
		
		print json_encode($array, JSON_UNESCAPED_UNICODE);
	}
?>