<?php
	include_once __DIR__ . "/../../config/conexion.php";
	include_once __DIR__ . "/../../classes/crud.php";
	$object = new connection_database();
	$crud = new crud();

	$id = $_POST["id"];
    $nombre_archivo = $_POST["nombre_archivo"];
    $identificador = $_POST["identificador"];
    $fecha_subida = $_POST["fecha_subida"];
    $predeterminado = $_POST["predeterminado"];
    $expedienteid = $_POST["expedienteid"];
	$tipo_papeleriaid = $_POST["tipo_papeleriaid"];
	//Checa si el documento a vincular ya se encuentra actualmente vinculado
	if($predeterminado == "vinculado"){
		die("El documento seleccionado con el identificador " .$identificador. " ya está vinculado");
	}
	//Checa si el documento todavía existe en el expediente y si el documento está duplicado en el historial
	$checkdocumentinhistory = $object -> _db -> prepare("SELECT * FROM historial_papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo AND viejo_identificador=:videntificador");
	$checkdocumentinhistory -> execute(array(':expedienteid' => $expedienteid, ':tipo' => $tipo_papeleriaid, ':videntificador' => $identificador));
	$countdocumentinhistory = $checkdocumentinhistory -> rowCount();
	if($countdocumentinhistory == 0 ){
		die("El documento seleccionado con el identificador " .$identificador. " ya no existe");
	}else if($countdocumentinhistory > 1){
		die("El documento seleccionado con el identificador " .$identificador. " se encuentra duplicado, por favor, elimine los duplicados");
	}
	//Checa si existe un archivo vinculado
	$checkvinculado = $object -> _db -> prepare("SELECT id, nombre_archivo, identificador, fecha_subida FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
	$checkvinculado -> execute(array(':expedienteid' => $expedienteid, ':tipo' => $tipo_papeleriaid));
	$countvinculado = $checkvinculado -> rowCount(); 
	if($countvinculado > 0){
		$fetchvinculado = $checkvinculado -> fetch(PDO::FETCH_ASSOC);
		//Checa si el archivo vinculado no tiene un duplicado en historial
		$checkifselectedhasduplicatedinhistory = $object -> _db -> prepare("SELECT * FROM papeleria_empleado A WHERE EXISTS (SELECT * FROM historial_papeleria_empleado B WHERE A.identificador= :sidentificador)");
		$checkifselectedhasduplicatedinhistory -> execute(array(':sidentificador' => $identificador));
		$countifselectedhasduplicatedinhistory = $checkifselectedhasduplicatedinhistory -> rowCount();
		if($countifselectedhasduplicatedinhistory > 0){
			die("No puede vincular el mismo documento con el identificador " .$identificador. ", por favor, elimine los duplicados");
		}else{
			$crud -> update('papeleria_empleado', ['nombre_archivo' => $nombre_archivo, 'identificador' => $identificador, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", [':expedienteid' => $expedienteid, ':tipo' => $tipo_papeleriaid]);
			$crud -> update('historial_papeleria_empleado', ['viejo_nombre_archivo' => $fetchvinculado["nombre_archivo"], 'viejo_identificador' => $fetchvinculado["identificador"], 'vieja_fecha_subida' => $fetchvinculado["fecha_subida"]], "id=:id AND expediente_id=:expedienteid AND tipo_archivo=:tipo", [':expedienteid' => $expedienteid, ':tipo' => $tipo_papeleriaid, ':id' => $id]);
		}
	}else{
		$crud -> store('papeleria_empleado', ['expediente_id' => $expedienteid, 'tipo_archivo' => $tipo_papeleriaid, 'nombre_archivo' => $nombre_archivo, 'identificador' => $identificador, 'fecha_subida' => $fecha_subida]);
		$crud -> delete('historial_papeleria_empleado', "id=:id AND expediente_id=:expedienteid AND tipo_archivo=:tipo", [':expedienteid' => $expedienteid, ':tipo' => $tipo_papeleriaid, ':id' => $id]);
	}
?>