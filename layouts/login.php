<?php
include_once __DIR__ . "/../config/conexion.php";
require_once('environment.php');
$object = new connection_database();
session_start();

$site_key = $_ENV['SITE_KEY'];
$secret_key = $_ENV['SECRET_KEY'];

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: dashboard.php');
    die();
} else {

    if(isset($_POST["token"])){
        $data = array(
            'secret' => "$secret_key",
            'response' => $_POST['token']
        );
        
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL,   "https://hcaptcha.com/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $verifyResponse = curl_exec($verify);
        $responseData = json_decode($verifyResponse);

        if($responseData->success){

            if (isset($_POST['username']) && isset($_POST['password'])) {
                $user = $_POST['username'];
                $password = $_POST['password'];
                $password = sha1($password);

                $check_user_exist = $object -> _db -> prepare("SELECT IF(password = :password, 1, 0) as password, id, username, nombre, apellido_pat, apellido_mat, correo, roles_id FROM usuarios WHERE username=:username");
                $check_user_exist -> execute(array(':password' => $password, ':username' => $user));
                $row_user_count = $check_user_exist -> rowCount();
                
                if($row_user_count == 0){
                    die(json_encode(array("failed", "Por favor, ingrese las credenciales correctas")));
                }else{
                    $fetch_user_check = $check_user_exist -> fetch(PDO::FETCH_OBJ);
                    if($fetch_user_check -> password == 0){
                    //Usuario correcto pero contraseña incorrecta
                        $total_intentos = check_login_attempts($user, $object);
                        if($total_intentos == 5){
                            die(json_encode(array("blocked", "Has sobrepasado el límite de intentos para este usuario")));
                        }else{
                            $total_intentos++;
                            $rem_attm=5-$total_intentos;
                            $insertar_intento = $object -> _db -> prepare("INSERT INTO loginlogs(user_id) SELECT id FROM usuarios where username=:userintentoid");
                            $insertar_intento -> execute(array(':userintentoid' => $user));
                            if($rem_attm==0){
                                die(json_encode(array("blocked", "Has sobrepasado el límite de intentos para este usuario")));
                            }else{
                                die(json_encode(array("failed", "Por favor, ingrese las credenciales correctas. Tiene $rem_attm intentos más para este usuario")));
                            }
                        }	
                    }else if($fetch_user_check -> password == 1){
                    //Contraseña y usuario correcto
                        $total_intentos = check_login_attempts($user, $object);
                        if($total_intentos == 5){
                            die(json_encode(array("blocked", "Has sobrepasado el límite de intentos para este usuario")));
                        }else{
                            $delete_count_query = $object -> _db -> prepare("DELETE l FROM loginlogs l INNER JOIN usuarios u ON u.id = l.user_id WHERE u.username=:username");
                            $delete_count_query -> execute(array(':username' => $user));
                            $check_temp_pass = $object->_db->prepare("SELECT * FROM temporal_password WHERE user_id= :userid");
                            $check_temp_pass->execute(array(':userid' => $fetch_user_check->id));
                            $count_temp_pass = $check_temp_pass -> rowCount();
                            if($count_temp_pass > 0){
                                $_SESSION['changepass'] = true;
                                exit(json_encode(array("temp-pass", "temppass.php?iduser=$fetch_user_check->id")));
                            }else{
                                $_SESSION['loggedin'] = true;
                                $_SESSION['id'] = $fetch_user_check->id;
                                $_SESSION['nombre'] = $fetch_user_check->nombre;
                                $_SESSION['usuario'] = $fetch_user_check->username;
                                $_SESSION['apellidopat'] = $fetch_user_check->apellido_pat;
                                $_SESSION['apellidomat'] = $fetch_user_check->apellido_mat;
                                $_SESSION['correo'] = $fetch_user_check->correo;
                                $_SESSION['rol'] = $fetch_user_check->roles_id;
                                if(isset($_SESSION['redirectURL'])){
                                    $link = $_SESSION['redirectURL'];
                                    unset($_SESSION['redirectURL']);
                                    exit(json_encode(array("success", "{$link}")));
                                }else{
                                    exit(json_encode(array("success", "dashboard.php")));
                                }
                            }	
                        }
                    }
                }
            }
        }else {
            exit(json_encode(array("captcha-error")));
        }
    }
}

function check_login_attempts($user, $object) {
    $count_query = $object -> _db -> prepare("SELECT count(*) AS total_intentos FROM loginlogs inner join usuarios ON usuarios.id=loginlogs.user_id WHERE usuarios.username=:username");
    $count_query -> execute(array(':username' => $user));
    $fetch_count = $count_query -> fetch(PDO::FETCH_OBJ);
    $total_intentos = $fetch_count -> total_intentos;
    return $total_intentos;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/materialdesignicons.min.css">
</head>

<body class="contenedor">
    <div class="container-image min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5" style="background: url('../src/img/fondo-hexagonos.png') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
        <div class=" text-gray-500 shadow-xl w-full overflow-hidden" style="z-index:5; border-radius: 9px !important; max-width:1000px">
            <div class="md:flex w-full">
            <div class="hidden md:block w-1/2 py-10 px-10" style="background: linear-gradient(57deg , #ffff 1%, #00b7e614 103%, #005FB1 22%);">
            <img src="../src/img/telefono-login.png" alt="Sinttecom">
                   
                </div>
                <div class="bg-white w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900" style="font-size: 39px !important; font-family: sans-serif;">INTRANET</h1>
                        <p>Ingresa tus credenciales</p>
                    </div>
                    <form id="Acceder" action="login.php" method="post">
                        <div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><svg class="w-5 h-5 text-gray-500" style="margin-right: -60px !important;" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg></div>
                                        <input class="w-full labels-login pl-10 -mr-10 pr-10 py-2 px-3 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500" type="text" id="user" name="user" placeholder="Usuario">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-12">
                                    <div class="group flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><svg class="w-5 h-5 text-gray-500" style="margin-right: -60px !important;" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" /></svg></div>
                                        <input class="w-full labels-login pl-10 -mr-10 pr-10 py-2 px-3 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500" type="password" id="passwordLogin" name="passwordLogin" placeholder="Contraseña">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="h-captcha" data-sitekey="<?php echo $site_key;  ?>" data-callback="verifyCaptcha"></div>
                                <div id="h-captcha-error"></div>
                            </div>
                            <div class="flex -mx-3 mt-5">
                            <div class="w-full px-3 mb-5">
                                    <button class="block w-full max-w-xs mx-auto hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg px-3 py-3 font-semibold" style="box-shadow: 4px 3px 4px 0px #c1c1c1; background: linear-gradient(170deg , #ff7800 -12%, #ffad2a 84%);">Ingresar</button>
                                </div>
                            </div>
                            <div class="text-center">
	                            <a href="forgotpassword.php" class="text-blue-600 hover:underline cursor-pointer">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../src/js/bundle.js"></script>
    <script src='https://www.hCaptcha.com/1/api.js' async defer></script>
    <script>
        $(document).ready(function() {

            var hcaptcha_response = '';

            if ($('#Acceder').length > 0) {
                $('#Acceder').validate({
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
                        user: {
                            required: true
                        },
                        passwordLogin: {
                            required: true
                        }
                    },
                    messages: {
                        user: {
                            required: 'Por favor, ingresa un usuario'
                        },
                        passwordLogin: {
                            required: 'Por favor, ingresa una contraseña'
                        }
                    },
                    submitHandler: function(form) {
                        var hcaptcha_response = hcaptcha.getResponse();
                        if(hcaptcha_response.length == 0) {
                            document.getElementById('h-captcha-error').innerHTML = '<span style="color:red;">El captcha es requerido.</span>';
                            return false;
                        }else{
                            var fd = new FormData();
                            var user = $("input[name=user]").val();
                            var password = $("input[name=passwordLogin]").val();
                            var token = $('[name=h-captcha-response]').val();
                            fd.append('username', user);
                            fd.append('password', password);
                            fd.append('token', token);

                            $.ajax({
                                url: 'login.php',
                                type: 'POST',
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    var array = $.parseJSON(data);
                                    if (array[0] == "success") {
                                        Swal.fire({
                                            title: "Autentificación exitosa",
                                            text: "Bienvenido!",
                                            icon: "success"
                                        }).then(function() {
                                            window.location.href = array[1]; 
                                        });
                                    } else if(array[0] == "failed"){
                                        Swal.fire({
                                            title: "Error",
                                            text: array[1],
                                            icon: "error"
                                        }).then(function() {
                                            grecaptcha.reset();
                                        });
                                    } else if(array[0] == "captcha-error"){
                                        Swal.fire({
                                            title: "Error",
                                            text: "El token del captcha no existe",
                                            icon: "error"
                                        }).then(function() {
	                                        grecaptcha.reset();
	                                    });
                                    } else if(array[0] == "temp-pass"){
                                        Swal.fire({
                                            title: "Advertencia",
                                            text: "Necesitará cambiar la contraseña antes de continuar",
                                            icon: "warning"
                                        }).then(function() {
                                            window.location.href = array[1]; 
                                        });
                                    } else if(array[0] == "blocked"){
                                        Swal.fire({
                                            title: "Error",
                                            text: array[1],
                                            icon: "error"
                                        }).then(function() {
                                            grecaptcha.reset();
                                        });
                                    }
                                },
                                error: function(data) {
                                    $("#ajax-error").text('Fail to send request');
                                }
                            });
                        }
                        return false;
                    }
                });
            }
        });

        function verifyCaptcha(token) {
            hcaptcha_response = token;
            document.getElementById('h-captcha-error').innerHTML = '';
        }

    </script>
</body>
<style>

    .error{
        color: rgb(250 30 45);
    }

    @media (max-width: 300px) {
        .h-captcha {

            -webkit-transform: scale(0.76) translateX(16%);
            -moz-transform:    scale(0.76) translateX(16%);
            -ms-transform:     scale(0.76) translateX(16%);
            -o-transform:      scale(0.76) translateX(16%);
            transform:         scale(0.76) translateX(16%);

            -webkit-transform-origin: 0 0;
            -moz-transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            -o-transform-origin: 0 0;
            transform-origin: 0 0;
        }
    }

    div{
        border:0;
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
    
    /* estilo labels */
    .labels-login
    {
        border-radius: 0px !important;
        border-top-color: white !important;
        border-left-color: white !important;
        border-right-color: white !important;
        width: 78% !important;
        margin-left: -8px !important;
    }


    /* Degradado y animación */
    .container-image {
        width: 100%;
        position: relative;
        }

    .container-image img {
        width: 100%;
        }

    .container-image::after {
        content: "";
        width: 100%; 
        height: 300px;  /* El height controla el alto del degradado */
        position: absolute;
        height:100%; /*La altura dependerá del degradado*/
        background-size: 300% 100%; 
        animation: gradient 17s ease infinite; /*'gradient' es el nombre de la animación, tarda en completarse 17s y vuelve a empezar infinitamente*/
        background-image: linear-gradient(102deg, #005fb1e6, #ffffff7d);
    }


@keyframes gradient {
  0% {
      background-position: 0% 50%; 
  }
  50% {
      background-position: 100% 50%;
  }
  100% {
      background-position: 0% 50%;
  }
}


.contenedor{
    overflow-x: hidden;
    overflow-y:auto;
}
.contenedor::-webkit-scrollbar {
    -webkit-appearance: none;
    
}
.contenedor::-webkit-scrollbar:vertical {
    width:12px;
}

.contenedor::-webkit-scrollbar-button:increment,.contenedor::-webkit-scrollbar-button {
    display: none;
} 

.contenedor::-webkit-scrollbar:horizontal {
    height: 10px;
}

.contenedor::-webkit-scrollbar-thumb {
    background: #c1c1c182;
    /* background: linear-gradient(262deg, #ffa8079c 44%, #ff970e99 65%, #ffa807ba 40%); */
    border-radius: 20px;
    border: 2px solid #f1f2f3;
}

.contenedor::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(256deg , #F7941E 63%, #fff 106%,#ffa807ba 3%);
    /* background: linear-gradient(262deg, #ffa8079c 44%, #ff970e99 65%, #ffa807ba 40%); */
    border-radius: 20px;
    border: 2px solid #f1f2f3;
}

.contenedor::-webkit-scrollbar-track {
    border-radius: 10px;  
}
    </style>
</html>