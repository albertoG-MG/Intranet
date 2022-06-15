<script>
    var array = [];
    $("input[type=checkbox]").on("click", function () {
    array = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

    for (var i = 0; i < checkboxes.length; i++) {
    array.push(checkboxes[i].value)
    }
});

$(document).ready(function () {
$("#Guardar").validate({
        ignore: [],
        errorPlacement: function(error, element) {
            error.insertAfter(element.parent('.group.flex'));
        },
        rules: {
            rol: {
                required:true
            }
        },
        messages: {
            rol: {
                required: 'Por favor, escriba un rol'
            }
        },
        submitHandler: function(form) {
            var fd = new FormData();
            var roles = $("input[name=rol]").val();
            var permisos = JSON.stringify(array);
            var method="store";
            var app="roles";
            fd.append("roles", roles);
            fd.append("permisos", permisos);
            fd.append("method", method);
            fd.append("app", app);
            $.ajax({
                type: "POST",
                url: "../ajax/class_search.php",
                data: fd,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                }
            });
        return false;
        }
    });
});
</script>