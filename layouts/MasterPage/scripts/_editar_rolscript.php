<script>
    var array = [];
    $(document).ready(function () {
        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
        for (var i = 0; i < checkboxes.length; i++) {
            array.push(checkboxes[i].value)
        }
        $("#Guardar").validate({
            ignore: [],
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent('.group.flex'));
            },
            rules: {
                rol: {
                    required:true,
                    remote: {
                                url: "../ajax/validacion/editar_roles/checkeditrol.php",
                                type: "post",
                                data: {
                                    "editarid": "<?php echo $editarid; ?>"
                                }
                            }
                }
            },
            messages: {
                rol: {
                    required: 'Por favor, escriba un rol',
                    remote: 'Ese rol ya existe, por favor, escriba otro'
                }
            },
            submitHandler: function(form) {
                $("#grabar").attr("disabled", true);
                var fd = new FormData();
                var roles = $("input[name=rol]").val();
                var jerarquia = $("#jerarquia").val();
                var permisos = JSON.stringify(array);
                var editar = <?php echo $editarid; ?>;
                var method="edit";
                var app="roles";
                fd.append("roles", roles);
                fd.append('jerarquia', jerarquia);
                fd.append("permisos", permisos);
                fd.append("editarid", editar);
                fd.append("method", method);
                fd.append("app", app);
                $.ajax({
                    type: "POST",
                    url: "../ajax/class_search.php",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        response = response.replace(/[\r\n]/gm, '');
                        if(response == "success"){
                                Swal.fire({
                                title: "Rol Editado",
                                text: "Se ha editado un rol exitosamente!",
                                icon: "success"
                        }).then(function() {
                                window.location.href = "roles.php";	
                            });
                        }
                    }
                });
            return false;
            }
        });

        if(document.getElementById('permissionarray').textContent.trim() === ''){
            $('#permissionarray').html( "<div class='bg-gray-100 flex flex-1 justify-center items-center rounded-lg h-12 font-semibold'>No hay permisos dados de alta en el sistema</div>");
        }

        <?php
        if(basename($_SERVER['PHP_SELF']) == 'editar_rol.php'){?>
            var dropdown = document.getElementById('catalogos');
            dropdown.classList.remove("hidden");
        <?php } ?>
    });
    
    $("input[type=checkbox]").on("click", function () {
    array = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');

    for (var i = 0; i < checkboxes.length; i++) {
    array.push(checkboxes[i].value)
    }
});
</script>