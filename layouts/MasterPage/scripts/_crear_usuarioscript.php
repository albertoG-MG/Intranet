<script>
        $(document).ready(function() {

            $.validator.addMethod('user_validation', function (value) {
				return /^(?=[a-zA-Z0-9._]{4,30}$)(?!.*[_.]{2})[^_.].*[^_.]$/.test(value);
			}, 'not a valid user.');

            $.validator.addMethod('password_validation', function (value) {
				return /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+$/.test(value);
			}, 'at least one uppercase, one lowercase, one number and one symbol.');

            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1000000)
            }, 'File size must be less than {0} MB');

            $.validator.addMethod('sinttecom', function (value) {
	            return /^[\w.-]+@sinttecom+[\.]+com$/.test(value);
            }, 'not a valid Sinttecom email.');

            if ($('#Guardar').length > 0) {
                $('#Guardar').validate({
                    ignore: [],
                    errorPlacement: function(error, element) {
                        if((element.attr('name') === 'foto')){
                            error.appendTo("div#error");  
                        }else{
                            error.insertAfter(element.parent('.group.flex'));
                        }
                    },
                    invalidHandler: function(e, validator){
                        if(!($('#error-container').length)){
                            this.$div = $('<div id="error-container" class="grid grid-cols-1 mt-5 mx-7"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex items-center"><div class="p-2"><div class="flex items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-6 py-4 text-red-900 font-semibold text-lg">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors" class="px-16 mb-4"></div></div></div></div>').insertBefore("#Guardar");
                        }
                        $("#arrayerrors").html(""); 
                        $.each(validator.errorMap, function( index, value ) { 
                            this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
                            $("#arrayerrors").append(this.$arrayerror);
                        });
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
                        usuario: {
                            required: true,
                            minlength: 5,
                            user_validation: true,
                            remote: '../ajax/validacion/crear_usuarios/checkusername.php'
                        },
                        password:{
                            required: true,
                            minlength: 8,
                            password_validation: true,
			                remote: "../ajax/validacion/crear_usuarios/checkpassword.php"
                        },
                        cpassword:{
                            required: true,
                            minlength: 8,
                            equalTo: "input[name=\"password\"]"
                        },
                        nombre: {
                            required: true
                        },
                        apellido_pat: {
                            required: true
                        },
                        apellido_mat: {
                            required: true
                        },
                        correo: {
                            required: true,
                            email: true,
                            remote: '../ajax/validacion/crear_usuarios/checkemail.php',
                            sinttecom: true
                        },
                        foto: {
                            extension: "jpg|jpeg|png",
                            filesize: 10
                        }
                    },
                    messages: {
                        usuario: {
                            required: 'Por favor, ingresa un usuario',
                            minlength: 'El usuario debe de contener 8 caracteres como mínimo',
                            user_validation: 'Usuario no válido',
                            remote: 'Ese usuario ya existe, por favor escriba otro'
                        },
                        password:{
                            required: 'Por favor, ingresa una contraseña',
                            minlength: "La contraseña debe de contener 8 caracteres como mínimo",
                            password_validation: "Contraseña no válida"
                        },
                        cpassword:{
                            required: 'Por favor, confirme su contraseña',
                            minlength: "La confirmación de la contraseña debe de tener como mínimo 8 caracteres",
                            equalTo: 'Las contraseñas no coinciden'
                        },
                        nombre: {
                            required: 'Por favor, ingrese un nombre'
                        },
                        apellido_pat: {
                            required: 'Por favor, ingrese un apellido paterno'
                        },
                        apellido_mat: {
                            required: 'Por favor, ingrese un apellido materno'
                        },
                        correo: {
                            required: 'Por favor, ingrese un correo electrónico',
                            email: 'Asegúrese que el texto ingresado este en formato de email',
                            remote: 'Ese correo ya existe, por favor escriba otro',
                            sinttecom: 'Ingrese el email correctamente y que tenga el dominio sinttecom'
                        },
                        foto: {
                            extension: 'Solo se permite jpg, jpeg y pngs',
                            filesize: 'Solo se permiten imágenes de un máximo de 10 megabytes'
                        }
                    },
                    submitHandler: function(form) {
                        $('#submit-button').html(
                        '<button disabled type="button" class="w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2">'+
                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                            '</svg>'+
                            'Cargando...'+
                        '</button>');
                        check_user_logged().then((response) => {
		                    if(response == "true"){
                                window.addEventListener('beforeunload', unloadHandler);
                                var fd = new FormData();
                                var usuario = $("input[name=usuario]").val();
                                var password = $("input[name=password]").val();
                                var confirmar_password = $("input[name=cpassword]").val();
                                var nombre = $("input[name=nombre]").val();
                                var apellido_pat = $("input[name=apellido_pat]").val();
                                var apellido_mat = $("input[name=apellido_mat]").val();
                                var correo = $("input[name=correo]").val();
                                var departamento = $("#departamento").val();
                                var rol = $("#rol").val();
                                var subrol = $("#subrol").val();
                                var foto = $('#foto')[0].files[0];
                                var method = "store";
                                var app = "usuario";
                                fd.append('usuario', usuario);
                                fd.append('password', password);
                                fd.append('confirmar_password', confirmar_password);
                                fd.append('nombre', nombre);
                                fd.append('apellido_pat', apellido_pat);
                                fd.append('apellido_mat', apellido_mat);
                                fd.append('correo', correo);
                                fd.append('departamento', departamento);
                                fd.append('roles_id', rol);
                                fd.append('subrol_id', subrol);
                                fd.append('foto', foto);
                                fd.append('method', method);
                                fd.append('app', app);
                                $.ajax({
                                    url: '../ajax/class_search.php',
                                    type: 'POST',
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(data) {
                                        data = data.replace(/[\r\n]/gm, '');
                                        if(data == "success"){
                                            Swal.fire({
                                                title: "Usuario Creado",
                                                text: "Se ha creado un usuario exitosamente!",
                                                icon: "success"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-button').html("<button disabled class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' type='submit' id='grabar' name='grabar'>Guardar</button>");
                                                window.location.href = "users.php";	
                                                });
                                        }
                                    },
                                    error: function(data) {
                                        $("#ajax-error").text('Fail to send request');
                                    }
                                });
                            }else{
                                Swal.fire({
                                    title: "Ocurrió un error",
                                    text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                                    icon: "error"
                                }).then(function() {
                                    $('#submit-button').html("<button disabled class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' type='submit' id='grabar' name='grabar'>Guardar</button>");
                                    window.location.href = "login.php";
                                });
                            }
                        }).catch((error) => {
		                    console.log(error)
	                    })
                        return false;
                    }
                });
            }

            <?php
            if(basename($_SERVER['PHP_SELF']) == 'crear_usuario.php'){?>
                var dropdown = document.getElementById('catalogos');
                dropdown.classList.remove("hidden");
            <?php } ?>

            function check_user_logged(){
                return new Promise((resolve, reject) => {
                    $.ajax({
                        type: "POST",
                        url: "../ajax/check_user_logged.php",
                        data:{
                            pagina: <?php echo "\"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\"";?>
                        },
                        success: function (response) {
                            resolve(response)
                        },
                        error: function (error) {
                            reject(error)
                        }
                    });
                })
            }

            function unloadHandler(e) {
                // Cancel the event
                e.preventDefault();
                // Chrome requires returnValue to be set
                e.returnValue = '';
            }

            $('input[name="foto"]').change(function(e) {
                if($("#foto").val() != ''){
                    var file = e.target.files[0].name;
                    var lastDot = file.lastIndexOf('.');
                    var extension = file.substring(lastDot + 1);
                    const archivo = this.files[0];
                    if(extension == "jpeg" || extension == "jpg" || extension == "png") {
                        $('#preview').removeClass('hidden');
                        $('#preview').addClass('w-10 h-10');
                        $('#svg').addClass('hidden');
                        $('#archivo').text(file);
                        let reader = new FileReader();
                        reader.onload = function(event){
                            $('#preview').attr('src', event.target.result);
                        }
                        reader.readAsDataURL(archivo);
                    }else{
                        $('#preview').addClass('hidden');
                        $('#svg').removeClass('hidden');
                        $('#archivo').text("El archivo " +file+ " no es una imagen");
                    }
                }
		    });

            var role_selected = $('#rol').find('option:selected').text();
            if (role_selected == "Sin rol"){
                $('#correo').attr('disabled', "true").addClass("bg-gray-200");
                $('#subrol').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin subrol</option>");
                $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                $("#correo").val('');
                $("#correo").rules("remove");
                $("#correo").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                $("#correo").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
                $("#correo-error").css("display", "none");
            
            }

            $("#rol").on("change", function () {
                var role_selected = $('#rol').find('option:selected').text();
                if (role_selected == "Superadministrador" || role_selected == "Administrador" || role_selected == "Sin rol"){
                    $('#correo').attr('disabled', "true").addClass("bg-gray-200");
                    $('#subrol').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin subrol</option>");
                    $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                    $("#correo").val('');
			        $("#correo").rules("remove");
			        $("#correo").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
			        $("#correo").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
			        $("#correo-error").css("display", "none");
                }else if(role_selected == "Usuario externo"){
                    $('#correo').attr('disabled', "true").addClass("bg-gray-200");
                    $('#subrol').removeAttr('disabled').removeClass("bg-gray-200");
                    $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                    $("#correo").val('');
			        $("#correo").rules("remove");
			        $("#correo").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
			        $("#correo").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
			        $("#correo-error").css("display", "none");
                    var x = $("#rol option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: "../ajax/usuarios/getsubrol.php",
                        data: {
                            "roles_id": x
                        },
                        success: function (response) {
                            $("#subrol").html(response);
                        }
                    });
                }else if(role_selected == "Director general"){
                    $('#correo').removeAttr('disabled').removeClass("bg-gray-200");
                    $('#subrol').removeAttr('disabled').removeClass("bg-gray-200");
                    $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                    $("#correo").rules("add", {
                        required: true,
                        email: true,
                        remote: '../ajax/validacion/crear_usuarios/checkemail.php',
                        sinttecom: true,
                        messages: {
                            required: 'Por favor, ingrese un correo electrónico',
                            email: 'Asegúrese que el texto ingresado este en formato de email',
                            remote: 'Ese correo ya existe, por favor escriba otro',
                            sinttecom: 'Ingrese el email correctamente y que tenga el dominio sinttecom'
                        }
                    });
                    var x = $("#rol option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: "../ajax/usuarios/getsubrol.php",
                        data: {
                            "roles_id": x
                        },
                        success: function (response) {
                            $("#subrol").html(response);
                        }
                    });
                }else{
                    $('#correo').removeAttr('disabled').removeClass("bg-gray-200");
                    $('#subrol').removeAttr('disabled').removeClass("bg-gray-200");
                    $('#departamento').removeAttr('disabled').removeClass("bg-gray-200");
                    $("#correo").rules("add", {
                        required: true,
                        email: true,
                        remote: '../ajax/validacion/crear_usuarios/checkemail.php',
                        sinttecom: true,
                        messages: {
                            required: 'Por favor, ingrese un correo electrónico',
                            email: 'Asegúrese que el texto ingresado este en formato de email',
                            remote: 'Ese correo ya existe, por favor escriba otro',
                            sinttecom: 'Ingrese el email correctamente y que tenga el dominio sinttecom'
                        }
                    });
                    var x = $("#rol option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: "../ajax/usuarios/getsubrol.php",
                        data: {
                            "roles_id": x
                        },
                        success: function (response) {
                            $("#subrol").html(response);
                        }
                    });
                }
            });
        });
    </script>
    <style>
        .error{
            color: rgb(244 63 94);
        }
    </style>