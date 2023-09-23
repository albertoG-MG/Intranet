<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/../classes/crud.php";
require_once __DIR__ . "/../config/PHPMailer/src/PHPMailer.php";
require_once __DIR__ . "/../config/PHPMailer/src/Exception.php";
require_once __DIR__ . "/../config/PHPMailer/src/SMTP.php";
$object = new connection_database();
$crud = new crud();

if(isset($_POST["email"])){
	$email = $_POST["email"];
	if(empty($email)){
		die(json_encode(array("error", "Por favor, ingresa un correo electrónico")));
	}else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
		die(json_encode(array("error", "Asegúrese que el texto ingresado este en formato de email")));
	}else{
		$email_exists = $object ->_db->prepare("SELECT correo from usuarios where correo=:correo");
		$email_exists -> execute(array(":correo" => $email));
		$countemail = $email_exists->rowCount();
		if($countemail == 0){
			die(json_encode(array("error", "El correo no existe")));
		}
	}
	$check_email_password = $object -> _db -> prepare("SELECT * FROM usuarios INNER JOIN reset_password ON reset_password.user_id=usuarios.id WHERE usuarios.correo=:usercorreo");
	$check_email_password -> execute(array(':usercorreo' => $email));
	$count_email = $check_email_password -> rowCount();
	if($count_email == 0){
		$select_user = $object -> _db -> prepare("SELECT id, username FROM usuarios WHERE correo=:correo");
		$select_user -> execute(array(':correo' => $email));
		$fetch_user = $select_user -> fetch(PDO::FETCH_OBJ);
		$token = bin2hex(random_bytes(16));
		date_default_timezone_set("America/Monterrey");
		$expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d"), date("Y"));
		$expDate = date("Y-m-d H:i:s",$expFormat);
		$crud -> store('reset_password', ['user_id' => $fetch_user->id, 'reset_link_token' => $token, 'exp_date' => $expDate]);
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$path = dirname($path);
		$links = $path. "/layouts/recuperar_contraseña.php?token=$token";
		$mail=new PHPMailer\PHPMailer\PHPMailer();
		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->SMTPDebug = 0;
		$mail->SMTPSecure = 'tls'; 
		$mail->Host = 'mail.sinttecom.com'; 
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->Port = 587;
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "ntf_sinttecom_noreply@sinttecom.com"; // SMTP username
		$mail->Password = "k8@SY#xR"; // SMTP password
		$mail->IsHTML(true);
		$mail->AddAddress($email);
		$mail->SetFrom($mail -> Username, 'Sinttecom Intranet');
		$mail->AddReplyTo($mail -> Username, 'Sinttecom Intranet');
		$mail->Subject  = "Solicitud de recuperación de contraseña";
		$mail->Body     = "Buen día ".$fetch_user->username.": <br> Toca aquí para cambiar la contraseña: <br> $links";
		$mail->WordWrap = 50;
		$mail->CharSet = "UTF-8";
		if(!$mail->Send()) {
			die(json_encode(array("error", "El mensaje no se envío, intentelo de nuevo más tarde")));
		}
		die(json_encode(array("success", "Se ha enviado un correo electrónico con instrucciones para cambiar la contraseña")));
	}else{
		die(json_encode(array("error", "Ya se generó un token para este correo, espere a su eliminación")));
	}
}
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>¿Olvidaste tu contraseña?</title>
		<link rel="stylesheet" href="../src/css/style.css">
		<link rel="stylesheet" href="../src/css/materialdesignicons.min.css">
	</head>


	<body class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5" style="background: url('../src/img/wallpaper.jpg') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
		<div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
			<div class="w-full py-10 px-5 md:px-10">
				<a href="login.php" class="hover:text-blue-600 hover:border-b-[1px] hover:border-blue-600 cursor-pointer"><i class="mdi mdi-arrow-left text-lg"></i>Regresar al login</a>
				<h1 class="font-bold text-3xl text-gray-900">¿Olvidaste tu contraseña?</h1>
				<p class="text-slate-500">Llena el siguiente formulario para cambiar tu contraseña</p>
				<form id="Enviar" class="my-10">
					<div class="flex flex-col mt-5">
							<label for="email" class="text-xs font-semibold px-1">Correo electrónico</label>
							<div class="group flex">
								<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg></div>
								<input class="w-full -ml-10 pl-10 py-2 px-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" type="text" id="email" name="email" placeholder="Correo">
							</div>
					    <div id="submit-button">
							<button class="w-full py-3 font-medium text-white btn-celeste hover:bg-celeste-500 rounded-lg border-celeste-500 hover:shadow inline-flex space-x-2 items-center justify-center mt-5">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"></path>
								</svg>
								
								<span>Cambiar contraseña</span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script src="../src/js/bundle.js"></script>
    <script>
        $(document).ready(function() {

			$.validator.addMethod('email_verification', function (value) {
	            return /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i.test(value);
            }, 'not a valid email.');

            if ($('#Enviar').length > 0) {
                $('#Enviar').validate({
					onkeyup: false,
                    errorPlacement: function(error, element) {
                            error.insertAfter(element.parent('.group'));
                    },
					highlight: function(element) {
						var elem = $(element);
						$(element).removeClass("border border-gray-300 focus:ring-blue-500 focus:border-blue-500");
						$(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
					},
					unhighlight: function(element) {
						var elem = $(element);	
						$(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
						$(element).addClass("border border-gray-300 focus:ring-blue-500 focus:border-blue-500");
					},
                    rules: {
                        email: {
                            required: true,
							email_verification: true,
							remote: '../ajax/validacion/forgotpassword/checkemail.php'
                        }
                    },
                    messages: {
                        email: {
                            required: 'Por favor, ingresa un correo electrónico',
							email_verification: 'Asegúrese que el texto ingresado este en formato de email',
							remote: 'Ese correo no existe'
                        }
                    },
                    submitHandler: function(form) {
						$('#submit-button').html(
						'<button disabled type="button" class="w-full py-3 font-medium text-white btn-celeste hover:bg-celeste-500 rounded-lg border-celeste-500 hover:shadow inline-flex space-x-2 items-center justify-center mt-5">'+
							'<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
							'<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
							'<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
							'</svg>'+
							'Cargando...'+
						'</button>');
						window.addEventListener('beforeunload', unloadHandler);
                        var fd = new FormData();
                        var email = $("input[name=email]").val();
                        fd.append('email', email);

                        $.ajax({
                            url: 'forgotpassword.php',
                            type: 'POST',
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                var array = $.parseJSON(data);
                                if (array[0] == "success") {
                                    Swal.fire({
                                        title: "Éxito!",
                                        text: array[1],
                                        icon: "success"
                                    }).then(function() {
										window.removeEventListener('beforeunload', unloadHandler);
										$('#submit-button').html(
											"<button disabled class='w-full py-3 font-medium text-white btn-celeste hover:bg-celeste-500 rounded-lg border-celeste-500 hover:shadow inline-flex space-x-2 items-center justify-center mt-5'>"+
												"<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>"+
													"<path stroke-linecap='round' stroke-linejoin='round' d='M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z'></path>"+
												"</svg>"+		
												"<span>Cambiar contraseña</span>"+
											"</button>");
                                        window.location.href = 'login.php'; 
                                    });
                                }else if(array[0] == "error"){
									Swal.fire({
										title: "Error!",
										text: array[1],
										icon: "error"
									}).then(function() {
										window.removeEventListener('beforeunload', unloadHandler);
										$('#submit-button').html(
											"<button class='w-full py-3 font-medium text-white btn-celeste hover:bg-celeste-500 rounded-lg border-celeste-500 hover:shadow inline-flex space-x-2 items-center justify-center mt-5'>"+
												"<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>"+
													"<path stroke-linecap='round' stroke-linejoin='round' d='M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z'></path>"+
												"</svg>"+		
												"<span>Cambiar contraseña</span>"+
											"</button>");
									});
								}
                            },
                            error: function(data) {
                                $("#ajax-error").text('Fail to send request');
                            }
                        });
                        return false;
                    }
                });
            }
        });

		function unloadHandler(e) {
			// Cancel the event
			e.preventDefault();
			// Chrome requires returnValue to be set
			e.returnValue = '';
		}

    </script>
	<style>
		.error{
            color: rgb(250 30 45);
        }

		.btn-celeste{
		background-color: #00a3ff  !important;
		border: none !important;
		box-shadow: 3px 3px 4px 0px rgb(0 0 0 / 22%) !important;
		font-weight: 500 !important;
		border-bottom: #fff 9px;
	}
	
		.btn-celeste:hover{
		background-color: #008eff !important;
	}
	</style>
</html>