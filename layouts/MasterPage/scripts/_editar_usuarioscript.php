<script>
        $(document).ready(function() {

            var delete_switch="false";

            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1048576)
            }, 'File size must be less than {0} MB');

            $.validator.addMethod('user_validation', function (value) {
				return /^(?=[a-zA-Z0-9._]{4,30}$)(?!.*[_.]{2})[^_.].*[^_.]$/.test(value);
			}, 'not a valid user.');
			
			$.validator.addMethod('password_validation', function (value) {
				return /^(?:(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%&*])[a-zA-Z0-9!@#$%&*]+)?$/.test(value);
			}, 'at least one uppercase, one lowercase, one number and one symbol.');
			
			$.validator.addMethod('names_validation', function (value) {
				return /^(?=.{1,40}$)[a-zA-Z\u00C0-\u00FF]+(?:[-'\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
			}, 'not a valid name.');
			
			$.validator.addMethod('email_verification', function (value) {
	            return /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i.test(value);
            }, 'not a valid email.');

            if ($('#Guardar').length > 0) {
                $('#Guardar').validate({
                    ignore: [],
                    onkeyup: false,
                    errorPlacement: function(error, element) {
                        if((element.attr('name') === 'foto')){
                            error.appendTo("div#error");  
                        }else{
                            error.insertAfter(element.parent('.group.flex'));
                        }
                    },
                    invalidHandler: function(e, validator){
                        if(!($('#error-container').length)){
                            this.$div = $('<div id="error-container" class="grid grid-cols-1 mt-5 mx-7"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-6 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors" class="px-16 mb-4"></div></div></div></div>').insertBefore("#Guardar");
                        }
                        $("#arrayerrors").html(""); 
                        $.each(validator.errorMap, function( index, value ) { 
                            this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
                            $("#arrayerrors").append(this.$arrayerror);
                        });
                    },
                    highlight: function(element) {
                        var elem = $(element);
                        $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                        $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                    },
                    unhighlight: function(element) {
                        var elem = $(element);	
                        $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                        $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                    },
                    rules: {
                        usuario: {
                            required: true,
                            minlength: 5,
                            user_validation: true,
                            remote: {
                                url: "../ajax/validacion/editar_usuarios/checkeditusername.php",
                                type: "post",
                                data: {
                                    "editarid": "<?php echo $editarid; ?>"
                                },
                                beforeSend: function () {
                                    $('#loader-usuario').removeClass('hidden');
                                    $('#correct-usuario').addClass('hidden');
                                },
                                complete: function(data){
                                    if(data.responseText == "true") {
                                        $('#loader-usuario').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
                                        $('#correct-usuario').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
                                    }
                                }
                            }
                        },
                        password: {
                            minlength: 8,
                            password_validation: true,
                            remote: {
                                url: "../ajax/validacion/editar_usuarios/checkeditpassword.php",
                                type: "post",
                                data: {
                                    "editarid": "<?php echo $editarid; ?>"
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
                        cpassword:{
                            minlength: 8,
                            equalTo: "input[name=\"password\"]"
                        },
                        nombre: {
                            required: true,
                            names_validation: true
                        },
                        apellido_pat: {
                            required: true,
                            names_validation: true
                        },
                        apellido_mat: {
                            required: true,
                            names_validation: true
                        },
                        correo: {
                            required: true,
                            email_verification: true,
                            remote: {
                                url: "../ajax/validacion/editar_usuarios/checkeditemail.php",
                                type: "POST",
                                data: {
                                    "editarid": "<?php echo $editarid; ?>"
                                },
                                beforeSend: function () {
                                    $('#myloader').removeClass('hidden');
                                    $('#correct-email').addClass('hidden');
                                },
                                complete: function(data){
                                    if(data.responseText == "true") {
                                        $('#myloader').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
                                        $('#correct-email').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
                                    }else{
                                        $('#myloader').addClass('hidden');
                                        $('#correct-email').addClass('hidden');
                                    }
                                }
                            }
                        },
                        foto: {
                            extension: "jpg|jpeg|png",
                            filesize: 10
                        }
                    },
                    messages: {
                        usuario: {
                            required:function () {$('#loader-usuario').addClass('hidden'); $('#correct-usuario').addClass('hidden'); $("#usuario").removeData("previousValue"); return "Por favor, ingresa un usuario"; },
                            minlength:function () {$('#loader-usuario').addClass('hidden'); $('#correct-usuario').addClass('hidden'); $("#usuario").removeData("previousValue"); return "El usuario debe de contener 5 caracteres como mínimo"; },
                            user_validation:function () {$('#loader-usuario').addClass('hidden'); $('#correct-usuario').addClass('hidden'); $("#usuario").removeData("previousValue"); return "Usuario no válido"; },
                            remote:function () {$('#loader-usuario').addClass('hidden'); $('#correct-usuario').addClass('hidden'); $("#usuario").removeData("previousValue"); return "Usuario repetido"; }
                        },
                        password: {
                            minlength:function () {$('#loader-password').addClass('hidden'); $('#correct-password').addClass('hidden'); $("#password").removeData("previousValue"); return "La contraseña debe de contener 8 caracteres como mínimo"; },
                            password_validation:function () {$('#loader-password').addClass('hidden'); $('#correct-password').addClass('hidden'); $("#password").removeData("previousValue"); return "Contraseña no válida"; }
                        },
                        cpassword:{
                            minlength: "La confirmación de la contraseña debe de tener como mínimo 8 caracteres",
                            equalTo: 'Las contraseñas no coinciden'
                        },
                        nombre: {
                            required: 'Por favor, ingrese un nombre',
                            names_validation: 'Nombre no válido'
                        },
                        apellido_pat: {
                            required: 'Por favor, ingrese un apellido paterno',
                            names_validation: 'Apellido paterno no válido'
                        },
                        apellido_mat: {
                            required: 'Por favor, ingrese un apellido materno',
                            names_validation: 'Apellido materno no válido'
                        },
                        correo: {
                            required:function () {$('#myloader').addClass('hidden'); $('#correct-email').addClass('hidden'); $("#correo").removeData("previousValue"); return "Por favor, ingrese un correo electrónico"; },
                            email_verification:function () {$('#myloader').addClass('hidden'); $('#correct-email').addClass('hidden'); $("#correo").removeData("previousValue"); return "Asegúrese que el texto ingresado este en formato de email"; }
                        },
                        foto: {
                            extension: 'Solo se permite jpg, jpeg y pngs',
                            filesize: 'Las imágenes deben pesar ser menos de 10 MB'
                        }
                    },
                    submitHandler: function(form) {
                        $('#submit-button').html(
                        '<button disabled id="grabar" name="grabar" class="button btn-celeste hover:bg-celeste-500 active:bg-celeste-700 text-white rounded-md h-11 px-8 py-2" type="submit">'+
                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                            '</svg>'+
                            'Cargando...'+
                        '</button>');
                        $('#error-container').html("");
                        check_user_logged().then((response) => {
		                    if(response == "true"){
                                window.addEventListener('beforeunload', unloadHandler);
                                var fd = new FormData();
                                var usuario = $("input[name=usuario]").val();
                                var password = $("input[name=password]").val();
                                var confirmar_password = $("input[name=cpassword]").val();
                                <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
                                    var password_temporal = $('#checkbox-slider').is(':checked') ? 1 : 0;
	                            <?php } ?>
                                var nombre = $("input[name=nombre]").val();
                                var apellido_pat = $("input[name=apellido_pat]").val();
                                var apellido_mat = $("input[name=apellido_mat]").val();
                                var correo = $("input[name=correo]").val();
                                var departamento = $('#departamento').val();
                                var departamentonom = $("#departamento option:selected").text();
                                var rol = $("#rol").val();
                                var rolnom = $("#rol option:selected").text();
                                var subrol = $("#subrol").val();
                                var subrolnom = $("#subrol option:selected").text();
                                var foto = $('#foto')[0].files[0];
                                var editarid = <?php echo $editarid; ?>;
                                var method = "edit";
                                var app = "usuario";
                                fd.append('usuario', usuario);
                                fd.append('password', password);
                                fd.append('confirmar_password', confirmar_password);
                                <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
		                            fd.append('password_temporal', password_temporal);    
	                            <?php } ?>
                                fd.append('nombre', nombre);
                                fd.append('apellido_pat', apellido_pat);
                                fd.append('apellido_mat', apellido_mat);
                                fd.append('correo', correo);
                                fd.append('departamento', departamento);
                                fd.append('departamentonom', departamentonom);
                                fd.append('roles_id', rol);
                                fd.append('rolnom', rolnom);
                                fd.append('subrol_id', subrol);
                                fd.append('subrol_nom', subrolnom);
                                fd.append('foto', foto);
                                fd.append('delete', delete_switch);
                                fd.append('editarid', editarid);
                                fd.append('method', method);
                                fd.append('app', app);
                                $.ajax({
                                    url: '../ajax/class_search.php',
                                    type: 'POST',
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(data) {
                                        setTimeout(function(){
                                            var array = $.parseJSON(data);
                                            if (array[0] == "success") {
                                                Swal.fire({
                                                    title: "Usuario Editado",
                                                    text: array[1],
                                                    icon: "success"
                                                }).then(function() {
                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                    $('#submit-button').html("<button disabled class='button btn-celeste hover:bg-celeste-500 active:bg-celeste-700 text-white rounded-md h-11 px-8 py-2' id='grabar' name='grabar' type='submit'>Guardar</button>");
                                                    window.location.href = 'users.php'; 
                                                });
                                            } else if(array[0] == "error") {
                                                Swal.fire({
                                                    title: "Error",
                                                    text: array[1],
                                                    icon: "error"
                                                }).then(function() {
                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                    $('#submit-button').html("<button class='button btn-celeste hover:bg-celeste-500 active:bg-celeste-700 text-white rounded-md h-11 px-8 py-2' id='grabar' name='grabar' type='submit'>Guardar</button>");
                                                });
                                            } else if(array[0] == "user_deleted") {
                                                Swal.fire({
                                                    title: "Error",
                                                    text: array[1],
                                                    icon: "error"
                                                }).then(function() {
                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                    $('#submit-button').html("<button disabled class='button btn-celeste hover:bg-celeste-500 active:bg-celeste-700 text-white rounded-md h-11 px-8 py-2' id='grabar' name='grabar' type='submit'>Guardar</button>");
													window.location.href = "users.php"; 
												});
                                            }
                                        },3000);
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
                                    $('#submit-button').html("<button disabled class='button btn-celeste hover:bg-celeste-500 active:bg-celeste-700 text-white rounded-md h-11 px-8 py-2' id='grabar' name='grabar' type='submit'>Guardar</button>");
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

            var originalState = $("#img_information").clone();

            if (!($("#usuario").val().length == 0)){
				$("#usuario").valid();
			}

            if (!($("#correo").val().length == 0)){
				$("#correo").valid();
			}

            <?php  if($row->foto_identificador != null && $row->nombre_foto != null){ ?>
				if (window.FileReader && window.Blob) {
					console.log('FileReader ó Blob es compatible con este navegador.');
					$('#svg').addClass("hidden");
                    checkImage("../src/img/imgs_uploaded/<?php echo $row->foto_identificador; ?>", function(){ $('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/imgs_uploaded/<?php echo $row->foto_identificador; ?>'); $('#archivo').text("<?php echo $row->nombre_foto; ?>"); }, function(){ $('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/not_found.jpg'); $('#archivo').text("No se encontró la imagen"); } );
				}else{
					console.error('FileReader ó Blob no es compatible con este navegador.');
					checkImage("../src/img/imgs_uploaded/<?php echo $row->foto_identificador; ?>", function(){ $('#archivo').text("<?php echo $row->nombre_foto; ?>"); }, function(){ $('#archivo').text("No se encontró la imagen"); } );
				}				
			<?php } ?>

            function checkImage(imageSrc, good, bad) {
                var img = new Image();
                img.onload = good; 
                img.onerror = bad;
                img.src = imageSrc;
            }

            <?php if($row -> nombre_foto != null && $row -> foto_identificador != null){ ?>
			    $("#div_actions_foto").removeClass("hidden");
		    <?php } ?>

            <?php
            if(basename($_SERVER['PHP_SELF']) == 'editar_usuario.php'){?>
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

            $('form#Guardar input[type="text"], input[type="password"]').on('keypress', function(e) {
		        return e.which !== 13;
	        });

            $('#delete_foto').on('click', function() {
			    $("#img_information").replaceWith(originalState.clone());
			    $("#foto").val("");
			    $("#div_actions_foto").addClass("hidden");
			    delete_switch = "true";
		    });

            $('input[name="foto"]').change(function() {
                if (window.FileReader && window.Blob) {
                    var files = $('input#foto').get(0).files;
                    if (files.length > 0) {
                        var file = files[0];
                        console.log('Archivo cargado: ' + file.name);
                        console.log('Blob mime: ' + file.type);
                        console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
			            console.log('Tamaño en bytes: ' + file.size);

                        var fileReader = new FileReader();
                        fileReader.onerror = function (e) {
                            console.error('ERROR', e);
                        };
                        fileReader.onloadend = function (e) {
                            var arr = new Uint8Array(e.target.result);
                            var header = '';
                            for (var i = 0; i < arr.length; i++) {
                                header += arr[i].toString(16);
                            }
                            console.log('Encabezado: ' + header);

                            // Check the file signature against known types
                            var type = 'unknown';
                            switch (header) {
                                case '89504e47':
                                    type = 'image/png';
                                    break;
                                case 'ffd8ffe0':
                                case 'ffd8ffe1':
                                case 'ffd8ffe2':
                                    type = 'image/jpeg';
                                    break;
                            }
                            if (file.type !== type) {
                                console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
                                $('#preview').addClass('hidden');
                                $('#svg').removeClass('hidden');
                                $('#archivo').text("El archivo " +file.name+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
                                $("#div_actions_foto").removeClass("hidden");
                            } else {
                                console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                                if(file.size > 10485760){
                                    $('#preview').addClass('hidden');
				                    $('#svg').removeClass('hidden');
				                    $('#archivo').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
                                    $("#div_actions_foto").removeClass("hidden");
                                }else{
                                    $('#preview').removeClass('hidden');
                                    $('#preview').addClass('w-10 h-10');
                                    $('#svg').addClass('hidden');
                                    $('#archivo').text(file.name);
                                    $("#div_actions_foto").removeClass("hidden");
                                    delete_switch="false";
                                    let reader = new FileReader();
                                    reader.onload = function (event) {
                                        $('#preview').attr('src', event.target.result);
                                    }
                                    reader.readAsDataURL(file);
                                }
                            }
                        };
                        fileReader.readAsArrayBuffer(file.slice(0, 4));
                    }
                } else {
                    console.error('FileReader ó Blob no es compatible con este navegador.');
					if($("#foto").val() != ''){
						var file = this.files[0].name;
						var lastDot = file.lastIndexOf('.');
						var extension = file.substring(lastDot + 1);
						if(extension == "jpeg" || extension == "jpg" || extension == "png") {
                            if(this.files[0].size > 10485760){
				                $('#archivo').text("El archivo " +file+ " debe pesar menos 10 MB.");
                                $("#div_actions_foto").removeClass("hidden");
			                }else{
							    $('#archivo').text(file);
                                $("#div_actions_foto").removeClass("hidden");
                                delete_switch="false";
                            }
						}else{
							$('#archivo').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
                            $("#div_actions_foto").removeClass("hidden");
                        }
					}
                }
		    });

            var role_selected = $('#rol').find('option:selected').text();
            switch(role_selected){
                <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador"){ ?>
                    case "Superadministrador":
                    case "Administrador":
                        $('#subrol').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin subrol</option>");
                        $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                    break;
                <?php } ?>
                <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Vista tecnico") == "false"){ ?>
                    case "Usuario externo":
                        $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                        var x = $("#rol option:selected").val();
                        <?php if(isset($fetch_subrol -> roles_id)){ ?>
                            $.ajax({
                                type: "POST",
                                url: "../ajax/usuarios/geteditsubrol.php",
                                data: {
                                    "roles_id": <?php echo $fetch_subrol -> roles_id; ?>
                                    <?php if(isset($fetch_subrol -> subrol_id)){ ?>
                                    ,
                                    "subrol_id": <?php echo $fetch_subrol -> subrol_id ?>
                                    <?php } ?>
                                },
                                success: function (response) {
                                    $("#subrol").html(response);
                                }
                            });
                        <?php } ?>
                    break;
                    case "Director general":
                        $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                        var x = $("#rol option:selected").val();
                        <?php if(isset($fetch_subrol -> roles_id)){ ?>
                            $.ajax({
                                type: "POST",
                                url: "../ajax/usuarios/geteditsubrol.php",
                                data: {
                                    "roles_id": <?php echo $fetch_subrol -> roles_id; ?>
                                    <?php if(isset($fetch_subrol -> subrol_id)){ ?>
                                    ,
                                    "subrol_id": <?php echo $fetch_subrol -> subrol_id ?>
                                    <?php } ?>
                                },
                                success: function (response) {
                                    $("#subrol").html(response);
                                }
                            });
                        <?php } ?>
                    break;		
                <?php } ?>
                case "Sin rol":
                    $('#subrol').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin subrol</option>");
                    $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                break;
                default:
                    var x = $("#rol option:selected").val();
                    <?php if(isset($fetch_subrol -> roles_id)){ ?>
                        $.ajax({
                            type: "POST",
                            url: "../ajax/usuarios/geteditsubrol.php",
                            data: {
                                "roles_id": <?php echo $fetch_subrol -> roles_id; ?>
                                <?php if(isset($fetch_subrol -> subrol_id)){ ?>
                                ,
                                "subrol_id": <?php echo $fetch_subrol -> subrol_id ?>
                                <?php } ?>
                            },
                            success: function (response) {
                                $("#subrol").html(response);
                            }
                        });
                    <?php } ?>
                break;
            }
			
			
			$("#rol").on("change", function () {
                var role_selected = $('#rol').find('option:selected').text();
                switch(role_selected){
                    <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador"){ ?>
                        case "Superadministrador":
                        case "Administrador":
                            $('#subrol').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin subrol</option>");
                            $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                        break;
                    <?php } ?>
                    <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Vista tecnico") == "false"){ ?>
                        case "Usuario externo":
                            $('#subrol').removeAttr('disabled').removeClass("bg-gray-200");
                            $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
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
                        break;
                        case "Director general":
                            $('#subrol').removeAttr('disabled').removeClass("bg-gray-200");
                            $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
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
                        break;
                    <?php } ?>
                    case "Sin rol":
                        $('#subrol').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin subrol</option>");
                        $('#departamento').attr('disabled', "true").addClass("bg-gray-200").empty().append("<option value=''>Sin departamento</option><?php $departamentos = departamentos::FetchDepartamento(); foreach ($departamentos as $row) { echo "<option value='" . $row->id . "'>"; echo "" . $row->departamento . ""; echo "</option>"; } ?>");
                    break;
                    default:
                        $('#subrol').removeAttr('disabled').removeClass("bg-gray-200");
                        $('#departamento').removeAttr('disabled').removeClass("bg-gray-200");
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
                    break;
                }
            });

            var passwords_div = $("#passwords_div").clone();

            var slider = $("#slider-container").clone();

            $(document).on("click", "#reset_form", function () {
                var fd = new FormData();
                var editarid = <?php echo $editarid; ?>;
                var validationapp = "reseteditusuarios";
                fd.append('editarid', editarid);
                fd.append('validationapp', validationapp);
                $.ajax({
                    type: "POST",
                    url: "../ajax/usuarios/reseteditusuarios.php",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var array = $.parseJSON(response);
                        var validator = $( "#Guardar" ).validate();
                        validator.resetForm();
                        $('#error-container').html("");
                        $("#usuario").val(array["usuario"]);
                        if (!($("#usuario").val().length == 0)){
                            $("#usuario").removeData("previousValue");
                            $("#usuario").valid();
                        }
                        $("#passwords_div").replaceWith(passwords_div.clone());
                        $("#slider-container").replaceWith(slider.clone());
                        $("#nombre").val(array["nombre"]);
                        $("#apellido_pat").val(array["apellido_pat"]);
                        $("#apellido_mat").val(array["apellido_mat"]);
                        $("#correo").val(array["correo"]);
                        if (!($("#correo").val().length == 0)){
                            $("#correo").removeData("previousValue");
                            $("#correo").valid();
                        }
                        $("#rol").val(array["rol_id"]).trigger('change');
                        $.ajax({
                            type: "POST",
                            url: "../ajax/usuarios/reseteditusuariossubrol.php",
                            data: {
                                "subrol_id": array["subrol_id"]
                            },
                            success: function (response) {
                                $("#subrol").val(response);
                            }
                        });
                        if(array["departamentos_id"] != null){
                            $("#departamento").val(array["departamentos_id"]);
                        }else{
                            $("#departamento").val("");
                        }
                        $("#div_actions_foto").addClass("hidden");
                        $("#img_information").replaceWith(originalState.clone());
                        $("#foto_perfil").val("");
                        if(array["status"] == "not_found"){
                            $('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/not_found.jpg');
                            $('#svg').addClass('hidden');
                            $('#archivo').text("no se encontró la imagen");
                            $("#div_actions_foto").removeClass("hidden");
                        }else if(array["status"] == "found"){
                            $('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/imgs_uploaded/'+array["identificador"]);
                            $('#svg').addClass('hidden');
                            $('#archivo').text(array["nombre_archivo"]);
                            $("#div_actions_foto").removeClass("hidden");
                        }

                    }
                });
            });
        });
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