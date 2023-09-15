<?php

	$DB_hostname = "localhost";
	$DB_name     = "sntt_intranet";
	$DB_username = "snttint2022";
	$DB_password = "7OAe23QjJCpl";

	$conn = new mysqli($DB_hostname, $DB_username, $DB_password, $DB_name);
	  
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$result = $conn -> query('SELECT * FROM avisos WHERE fecha_creacion_aviso + INTERVAL 30 DAY < NOW()');
	while ($row = $result->fetch_assoc()) {
		if($row['filename_avisos'] != null && $row['avisos_foto_identificador'] != null && $row['filename_archivo_aviso'] == null && $row['aviso_archivo_identificador'] == null){
			$directory_foto = __DIR__ . "/../src/avisos/";
			$path_foto = __DIR__ . "/../src/avisos/".$row['avisos_foto_identificador'];
			if(file_exists($path_foto)){
				unlink($directory_foto.$row['avisos_foto_identificador']);
			}
		}else if($row['filename_avisos'] == null && $row['avisos_foto_identificador'] == null && $row['filename_archivo_aviso'] != null && $row['aviso_archivo_identificador'] != null){
			$directory_archivo = __DIR__ . "/../src/avisos_archivo/";
			$path_archivo = __DIR__ . "/../src/avisos_archivo/".$row['aviso_archivo_identificador'];
			if(file_exists($path_archivo)){
				unlink($directory_archivo.$row['aviso_archivo_identificador']);
			}
		}else if($row['filename_avisos'] != null && $row['avisos_foto_identificador'] != null && $row['filename_archivo_aviso'] != null && $row['aviso_archivo_identificador'] != null){
			$directory_foto = __DIR__ . "/../src/avisos/";
			$path_foto = __DIR__ . "/../src/avisos/".$row['avisos_foto_identificador'];
			$directory_archivo = __DIR__ . "/../src/avisos_archivo/";
			$path_archivo = __DIR__ . "/../src/avisos_archivo/".$row['aviso_archivo_identificador'];
			if(file_exists($path_foto)){
				unlink($directory_foto.$row['avisos_foto_identificador']);
			}
			if(file_exists($path_archivo)){
				unlink($directory_archivo.$row['aviso_archivo_identificador']);
			}
		}
    }
  
    $conn->query("DELETE FROM avisos WHERE fecha_creacion_aviso + INTERVAL 30 DAY < NOW()");
  
    $conn->close();
?>