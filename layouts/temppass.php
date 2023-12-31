<?php
	include_once __DIR__ . "/../config/conexion.php";
	$object = new connection_database();
	session_start();
	
	if(isset($_POST["password"], $_POST["id_user"], $_POST["password_confirm"], $_POST["current_password"])){
		$password = $_POST["password"];
		$password_confirm = $_POST["password_confirm"];
		$current_password = $_POST["current_password"];
		$userid = $_POST["id_user"];
		if(empty($password)){
			die(json_encode(array("error", "La contraseña no puede estar vacía")));
		}else if(strlen($password) < 8 ){
			die(json_encode(array("error", "La contraseña debe ser 8 dígitos ó más")));
		}else if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$/", $password)){
			die(json_encode(array("error", "La contraseña debe contener al menos un número, una letra en mayúscula, una letra en minúscula y un simbolo especial(!@#$%&*) y no se permiten espacios")));
		}else if(empty($password_confirm)){
			die(json_encode(array("error", "La confirmación de la contraseña no puede estar vacía")));
		}else if(strlen($password_confirm) < 8 ){
			die(json_encode(array("error", "La confirmación de la contraseña debe de tener como mínimo 8 caracteres")));
		}else if($password_confirm!=$password){
			die(json_encode(array("error", "Las contraseñas no coinciden")));
		}else if(empty($current_password)){
			die(json_encode(array("error", "Por favor, ingrese la contraseña actual")));
		}else{
			$blacklist_query = $object ->_db->prepare("SELECT password from blacklist_password");
			$blacklist_query -> execute();
			$fetch_blacklist = $blacklist_query -> fetchAll(PDO::FETCH_ASSOC);
			foreach($fetch_blacklist as $badword_blacklist){
				if(strpos($password, $badword_blacklist["password"]) !== false)
				{
					die(json_encode(array("error", "La contraseña no puede contener: " .$badword_blacklist["password"]. ", Por favor, modifique la contraseña")));
				}
			}
			$password_sha1 = sha1($password); 
			$check_password = $object ->_db->prepare("SELECT usuarios.password FROM usuarios WHERE id=:userid");
			$check_password->execute(array(':userid' => $userid));
			$fetch_password = $check_password -> fetch(PDO::FETCH_OBJ);
			if($fetch_password -> password == $password_sha1){
				die(json_encode(array("error", "La nueva contraseña no puede ser igual a la vieja contraseña, por favor, escriba otra contraseña")));
			}else{
				$password_repeat = $object ->_db->prepare("SELECT historial_password.password, historial_password.today_date FROM usuarios INNER JOIN historial_password ON historial_password.user_id=usuarios.id WHERE usuarios.id=:idusercache");
				$password_repeat -> execute(array(':idusercache' => $userid));
				$check_password_repeat = $password_repeat -> rowCount();
				if($check_password_repeat > 0){
					date_default_timezone_set("America/Monterrey");
					$date_database = date('y-m-d');
					$database_date = date_create($date_database);
					date_format($database_date,"y-m-d");
					$fetch_password_repeat = $password_repeat -> fetchAll(PDO::FETCH_ASSOC);
					foreach($fetch_password_repeat as $repeated_password){
						if(!preg_match("/^[0-9a-f]{40}$/i", $repeated_password["password"])){
							$hashing = sha1($repeated_password["password"]);
						}else{
							$hashing = $repeated_password["password"];
						}
						if($hashing == $password_sha1){
							$used_date = date_create($repeated_password["today_date"]);
							date_format($used_date,"y-m-d");
							$difference=date_diff($used_date, $database_date);
							if($difference -> days < 366){
								die(json_encode(array("error", "Deben pasar más de 365 días para que esta contraseña vuelva a ser usable")));
							}
						}
					}	
				}
				$check_pass = $object -> _db -> prepare("SELECT password from usuarios where id=:checkidpass");
				$check_pass -> execute(array(":checkidpass" => $userid));
				$fetch_pass = $check_pass -> fetch(PDO::FETCH_OBJ);		
				$current_psha1 = sha1($current_password); 
				if ($current_psha1 != $fetch_pass -> password) {
					die(json_encode(array("error", "La contraseña actual no coincide con la contraseña registrada")));
				}
				$updating_password = $object -> _db -> prepare("UPDATE usuarios SET password = :password WHERE id=:useridchange");
                $updating_password -> execute(array(':password' => $password_sha1, ':useridchange' => $userid));
                $delete_temp_password = $object -> _db -> prepare("DELETE FROM temporal_password WHERE user_id=:useriddelete");
                $delete_temp_password -> execute(array(':useriddelete' => $userid));
                die(json_encode(array("success", "La contraseña ha sido cambiada, ingrese de nuevo sus credenciales para acceder al sistema")));
			}
		}			
	}
	
	
	/* Validaciones */
	if (!(isset($_SESSION['changepass'])) || $_SESSION['changepass'] != true) {
		header("HTTP/1.0 403 Forbidden");
	    echo "
	    <html>
			<head>
				<title>Error</title>
			</head>
			<body>
				<h1>Error en la auntetificación</h1>
				<p>Por seguridad, ingrese sus credenciales nuevamente en el login.</p>
				<a href='login.php'>Regresar al login</a>
			</body>
	    </html>";
		die();  
    }else{
        unset($_SESSION['changepass']);
		$id_user = $_GET['iduser'];		
    }
	
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cambiar contraseña temporal</title>
		<link rel="stylesheet" href="../src/css/style.css">
		<link rel="stylesheet" href="../src/css/materialdesignicons.min.css">
	</head>
	
	<body class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5" style="background: url('../src/img/wallpaper.jpg') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
		<div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
			<div class="w-full py-10 px-5 md:px-10">
				<h1 class="font-bold text-3xl text-gray-900">Formulario de cambio de contraseña temporal</h1>
				<p class="text-slate-500">Llena el siguiente formulario para cambiar tu contraseña</p>
                <form id="Guardar" class="my-10">
                    <div x-data="{showen:true}" class='grid grid-cols-1 mt-5 mx-7'>
                        <div x-show="showen">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Contraseña</label>
                            <div class="group flex" x-data="{isshow:false}">
								<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" /></svg></div>
        						<input class="w-full -ml-10 pl-10 -mr-10 pr-10 py-2 px-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" x-bind:type="isshow ? 'text' : 'password'" type="password" id="password" name="password" placeholder="Contraseña">
								<button type="button" @click="isshow=!isshow" class="z-30 mt-1 text-gray-600">
									<svg x-show="!isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
									</svg>
									<svg x-show="isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
									</svg>
								</button>
                            </div>
                        </div>
						<div id="loader-password" class="hidden mt-5">
							<svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
							  <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
							  <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
							</svg>
							<span>Cargando...</span>
						</div>
						<div class="hidden" id="correct-password">
							<li class="flex items-center">
							  <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
							  <p class="text-green-600">Contraseña válida</p>
							</li>
						</div>
                    </div>
                    <div x-data="{showen:true}" class='grid grid-cols-1 mt-5 mx-7'>
                        <div x-show="showen">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Confirmar contraseña</label>
                            <div class="group flex" x-data="{isshow:false}">
								<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" /></svg></div>
        						<input class="w-full -ml-10 pl-10 -mr-10 pr-10 py-2 px-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" x-bind:type="isshow ? 'text' : 'password'" type="password" id="password_confirm" name="password_confirm" placeholder="Contraseña">
								<button type="button" @click="isshow=!isshow" class="z-30 mt-1 text-gray-600">
									<svg x-show="!isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
									</svg>
									<svg x-show="isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
									</svg>
								</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mx-7">
                        <ul id="passwordHelpBlock" class="text-light text-sm text-gray-500">
                            <li>La contraseña debe contener al menos un número, una letra en mayúscula, una letra en minúscula y un simbolo especial(!@#$%&*) sin espacios, acentos ni ñ.</li>
							<li>Nota: Se hara una verificación a la contraseña para evitar el uso de palabras comunes, contraseñas repetidas y evitar su uso por 365 días.</li>
                        </ul>
                    </div>
					<div class='grid grid-cols-1 mt-5 mx-7'>
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Contraseña actual</label>
						<div class="group flex">
							<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" /></svg></div>
							<input class="w-full -ml-10 pl-10 -mr-10 pr-10 py-2 px-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" type="password" id="current_password" name="current_password" placeholder="Contraseña">
						</div>
					</div>
                    <div id="submit-button">
                        <button class="block w-full max-w-xs mx-auto btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg px-3 py-3 font-semibold cursor-pointer mt-5">Guardar</button>
                    </div>
				</form>
			</div>
		</div>
	</body>
	<script src="../src/js/bundle.js"></script>
	<script>
		$(document).ready(function() {
			 
			$.validator.addMethod('password_validation', function (value) {
			return /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$/.test(value);
			}, 'at least one uppercase, one lowercase, one number and one symbol.');
			 
			if ($('#Guardar').length > 0) {
				$('#Guardar').validate({
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
						password: {
							required: true,
							minlength: 8,
							password_validation: true,
							remote: {
                                url: "../ajax/validacion/change_password/checkpassword.php",
                                type: "post",
                                data: {
                                    "id_user": "<?php echo $id_user; ?>"
                                },
                                beforeSend: function () {
                                    $('#loader-password').removeClass('hidden');
                                    $('#correct-password').addClass('hidden');
                                },
                                complete: function(data){
                                    if(data.responseText == "true") {
                                        $('#loader-password').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
                                        $('#correct-password').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
                                    }else{
                                        $('#loader-password').addClass('hidden');
                                        $('#correct-password').addClass('hidden');
                                    }
                                }
                            }
						},
						password_confirm: {
							required: true,
							minlength: 8,
							equalTo: "input[name=\"password\"]"
						},
						current_password: {
							required: true
						}
					},
					messages: {
						password: {
							required:function () {$('#loader-password').addClass('hidden'); $('#correct-password').addClass('hidden'); $("#password").removeData("previousValue"); return "Por favor, ingresa una contraseña"; },
							minlength:function () {$('#loader-password').addClass('hidden'); $('#correct-password').addClass('hidden'); $("#password").removeData("previousValue"); return "La contraseña debe de contener 8 caracteres como mínimo"; },
							password_validation:function () {$('#loader-password').addClass('hidden'); $('#correct-password').addClass('hidden'); $("#password").removeData("previousValue"); return "Contraseña no válida"; }
						},
						password_confirm: {
							required: 'Por favor, confirme su contraseña',
							minlength: "La confirmación de la contraseña debe de tener como mínimo 8 caracteres",
							equalTo: 'Las contraseñas no coinciden'
						},
						current_password: {
							required: "Por favor, ingrese la contraseña actual"
						}
					},
					submitHandler: function(form) {
						$('#submit-button').html(
						'<button disabled type="button" class="block w-full max-w-xs mx-auto btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg px-3 py-3 font-semibold cursor-pointer mt-5">'+
							'<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
							'<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
							'<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
							'</svg>'+
							'Cargando...'+
						'</button>');
						window.addEventListener('beforeunload', unloadHandler);
						var fd = new FormData();
						var password = $("input[name=password]").val();
						var password_confirm = $("input[name=password_confirm]").val();
						var current_password = $("input[name=current_password]").val();
						var id_user = <?php echo $id_user; ?>;
						fd.append('password', password);
						fd.append('password_confirm', password_confirm);
						fd.append('current_password', current_password);
						fd.append('id_user', id_user);
						$.ajax({
							url: 'temppass.php',
							type: 'POST',
							data: fd,
							processData: false,
							contentType: false,
							success: function(data) {
								var array = $.parseJSON(data);
								if (array[0] == "success") {
									Swal.fire({
									title: "Éxito",
									text: array[1],
									icon: "success"
									}).then(function() {
										window.removeEventListener('beforeunload', unloadHandler);
										$('#submit-button').html("<button disabled class='block w-full max-w-xs mx-auto btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg px-3 py-3 font-semibold cursor-pointer mt-5'>Guardar</button>");
										window.location.href = 'dashboard.php'; 
									});
								}else if(array[0] == "error") {
									Swal.fire({
									title: "Error",
									text: array[1],
									icon: "error"
									}).then(function() {
										window.removeEventListener('beforeunload', unloadHandler);
										$('#submit-button').html("<button class='block w-full max-w-xs mx-auto btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg px-3 py-3 font-semibold cursor-pointer mt-5'>Guardar</button>");
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
	</style>
</html>