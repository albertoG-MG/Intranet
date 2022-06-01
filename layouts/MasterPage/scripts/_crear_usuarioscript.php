<script>
        $(document).ready(function() {
            if ($('#Guardar').length > 0) {
                $('#Guardar').validate({
                    errorPlacement: function(error, element) {
                            error.insertAfter(element.parent('.group.flex'));
                    },
                    rules: {
                        usuario: {
                            required: true
                        }
                    },
                    messages: {
                        usuario: {
                            required: 'Por favor, ingresa un usuario'
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
                        var method = "store";
                        var app = "usuario";
                        fd.append('usuario', usuario);
                        fd.append('password', password);
                        fd.append('nombre', nombre);
                        fd.append('apellido_pat', apellido_pat);
                        fd.append('apellido_mat', apellido_mat);
                        fd.append('correo', correo);
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
        });
    </script>