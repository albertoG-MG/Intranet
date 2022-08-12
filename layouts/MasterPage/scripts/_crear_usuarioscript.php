<script>
        $(document).ready(function() {

            $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param * 1000000)
            }, 'File size must be less than {0} MB');

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
                    rules: {
                        usuario: {
                            required: true,
                            remote: '../ajax/validacion/crear_usuarios/checkusername.php'
                        },
                        password:{
                            required: true
                        },
                        cpassword:{
                            required: true,
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
                            remote: '../ajax/validacion/crear_usuarios/checkemail.php'
                        },
                        foto: {
                            extension: "jpg|jpeg|png",
                            filesize: 10
                        }
                    },
                    messages: {
                        usuario: {
                            required: 'Por favor, ingresa un usuario',
                            remote: 'Ese usuario ya existe, por favor escriba otro'
                        },
                        password:{
                            required: 'Por favor, ingresa una contraseña'
                        },
                        cpassword:{
                            required: 'Por favor, confirme su contraseña',
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
                            remote: 'Ese correo ya existe, por favor escriba otro'
                        },
                        foto: {
                            extension: 'Solo se permite jpg, jpeg y pngs',
                            filesize: 'Solo se permiten imágenes de un máximo de 10 megabytes'
                        }
                    },
                    submitHandler: function(form) {
                        $("#grabar").attr("disabled", true);
                        var fd = new FormData();
                        var usuario = $("input[name=usuario]").val();
                        var password = $("input[name=password]").val();
                        var nombre = $("input[name=nombre]").val();
                        var apellido_pat = $("input[name=apellido_pat]").val();
                        var apellido_mat = $("input[name=apellido_mat]").val();
                        var correo = $("input[name=correo]").val();
                        var departamento = $("#departamento").val();
                        var rol = $("#rol").val();
                        var foto = $('#foto')[0].files[0];
                        var method = "store";
                        var app = "usuario";
                        fd.append('usuario', usuario);
                        fd.append('password', password);
                        fd.append('nombre', nombre);
                        fd.append('apellido_pat', apellido_pat);
                        fd.append('apellido_mat', apellido_mat);
                        fd.append('correo', correo);
                        fd.append('departamento', departamento);
                        fd.append('roles_id', rol);
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
                                        window.location.href = "users.php";	
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

            <?php
            if(basename($_SERVER['PHP_SELF']) == 'crear_usuario.php'){?>
                var dropdown = document.getElementById('catalogos');
                dropdown.classList.remove("hidden");
            <?php } ?>

            $('input[name="foto"]').change(function(e) {
                var file = e.target.files[0].name;
                const archivo = this.files[0];
                $('#preview').removeClass('hidden');
                $('#preview').addClass('w-10 h-10');
                $('#svg').addClass('hidden');
                $('#archivo').text(file);
                if (archivo){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        console.log(event.target.result);
                        $('#preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(archivo);
                }
            });


        });
    </script>