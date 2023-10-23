<?php
	include_once __DIR__ . "/../../config/conexion.php";
	$object = new connection_database();

	$estado = $_POST['id'];
	$expediente_id = $_POST['idExpediente'];

	if (!empty($estado)) {

		// Consulta para obtener la lista de municipios
		$municipios = $object->_db->prepare("SELECT municipios.Id, municipios.nombre FROM municipios INNER JOIN estados ON estados.id = municipios.estado WHERE municipios.estado = :estado");
		$municipios->bindParam("estado", $estado, PDO::PARAM_STR);
		$municipios->execute();

		// Consulta en la tabla principal para ver si existen datos
		$check_municipio = $object->_db->prepare("SELECT municipio_id FROM expedientes WHERE id = :expedienteid");
		$check_municipio->execute(array(':expedienteid' => $expediente_id));
		$municipioCount = $check_municipio->rowCount();

		//Checa si hay un municipio seleccionado en la base de datos
		if ($municipioCount > 0) {
			$fetchmunicipio = $check_municipio -> fetch(PDO::FETCH_ASSOC);
			if($fetchmunicipio['municipio_id'] !== null){
				// Resto del código para mostrar la lista de municipios
				echo "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><svg class='w-5 h-5 text-gray-500' viewBox='0 0 24 24'><path fill='currentColor' d='M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z' /></svg></div>";
				echo "<select class='w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600' id='municipio' name='municipio'>";
				while ($r = $municipios->fetch(PDO::FETCH_OBJ)) {
					echo "<option value='".$r->Id."'";  if($fetchmunicipio['municipio_id'] == $r->Id){ echo 'selected=\"selected\"'; } echo ">";
					echo $r->nombre;
					echo "</option>";
				}
				echo "</select>";
			}else{
				echo "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><svg class='w-5 h-5 text-gray-500' viewBox='0 0 24 24'><path fill='currentColor' d='M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z' /></svg></div>";
				echo "<select class='w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600' id='municipio' name='municipio'>";
				echo "<option value=''>--Seleccione un estado--</option>";
				echo "</select>";
			}
		}
	} else {
		echo "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><svg class='w-5 h-5 text-gray-500' viewBox='0 0 24 24'><path fill='currentColor' d='M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z' /></svg></div>";
		echo "<select class='w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600' id='municipio' name='municipio'>";
		echo "<option value=''>--Seleccione un estado--</option>";
		echo "</select>";
	}
?>