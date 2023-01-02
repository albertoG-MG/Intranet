<?php
	set_time_limit(0);
	include_once __DIR__ . "/../../../config/conexion.php";
	include_once __DIR__ . "/../../../config/email_verification/class.verifyEmail.php";
	$object = new connection_database();

	$email = $_POST["correo"];
	$editarid = $_POST["editarid"];
	$query = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo and id!=:iduser");
	$query -> execute(array(":correo" => $email, ":iduser" => $editarid));
	$emailcount = $query->rowCount();
	if($emailcount > 0){
        $output = 'Este correo ya existe, por favor, escriba otro';
    }else{
        $vmail = new verifyEmail();
        $vmail->setStreamTimeoutWait(20);
        $vmail->Debug= false;
        $vmail->Debugoutput= 'html';

        $vmail->setEmailFrom('viska@viska.is');

        if ($vmail->check($email)) {
            $output = true;
        } elseif (verifyEmail::validate($email)) {
            $output = 'correo &lt;' . $email . '&gt; válido, pero el nombre del servidor ó el dominio erróneos!';
        } else {
            $output = 'correo &lt;' . $email . '&gt; no válido!';
        }
    }
    echo json_encode($output);
?>