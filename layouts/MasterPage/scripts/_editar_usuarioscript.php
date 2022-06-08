<script>
        $(document).ready(function() {
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
                            remote: {
                                url: "../ajax/checkeditusername.php",
                                type: "post",
                                data: {
                                    "session": "<?php echo $_SESSION["id"] ?>"
                                }
                            }
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
                            email: true
                        },
                        foto: {
                            extension: "jpg|jpeg|png"
                        }
                    },
                    messages: {
                        usuario: {
                            required: 'Por favor, ingresa un usuario',
                            remote: 'Ese usuario ya existe, por favor, escribe otro'
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
                            email: 'Asegúrese que el texto ingresado este en formato de email'
                        },
                        foto: {
                            extension: 'Solo se permite jpg, jpeg y pngs'
                        }
                    },
                    submitHandler: function(form) {
                        var fd = new FormData();
                        var usuario = $("input[name=usuario]").val();
                        var password = $("input[name=password]").val();
                        var nombre = $("input[name=nombre]").val();
                        var apellido_pat = $("input[name=apellido_pat]").val();
                        var apellido_mat = $("input[name=apellido_mat]").val();
                        var correo = $("input[name=correo]").val();
                        var foto = $('#foto')[0].files[0];
                        var editarid = <?php echo $editarid; ?>;
                        var method = "edit";
                        var app = "usuario";
                        fd.append('usuario', usuario);
                        fd.append('password', password);
                        fd.append('nombre', nombre);
                        fd.append('apellido_pat', apellido_pat);
                        fd.append('apellido_mat', apellido_mat);
                        fd.append('correo', correo);
                        fd.append('foto', foto);
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
                                console.log("success");
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
            if(basename($_SERVER['PHP_SELF']) == 'editar_usuario.php'){?>
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