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
            $(element).removeClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
            $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
        },
        unhighlight: function(element) {
            $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
            $(element).addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
        },
        rules: {
            rol: {
                required:true,
                remote: '../ajax/validacion/crear_roles/checkrol.php'
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
            check_user_logged().then((response) => {
		        if(response == "true"){
                    var fd = new FormData();
                    var roles = $("input[name=rol]").val();
                    var jerarquia = $("#jerarquia").val();
                    var categorias = JSON.stringify(array);
                    var method="store";
                    var app="roles";
                    fd.append("roles", roles);
                    fd.append('jerarquia', jerarquia);
                    fd.append("categorias", categorias);
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
                                    title: "Rol Creado",
                                    text: "Se ha creado un rol exitosamente!",
                                    icon: "success"
                            }).then(function() {
                                    window.location.href = "roles.php";	
                                });
                            }
                        }
                    });
                }else{
                    Swal.fire({
                        title: "Ocurrió un error",
                        text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                        icon: "error"
                    }).then(function() {
                        window.location.href = "login.php";
                    });
                }
            }).catch((error) => {
		        console.log(error)
	        })
        return false;
        }
    });
    if(document.getElementById('categoriasarray').textContent.trim() === ''){
		$('#categoriasarray').html( "<div class='bg-gray-100 flex flex-1 justify-center items-center rounded-lg h-12 font-semibold'>No hay categorías dadas de alta en el sistema</div>");
	}
    <?php
    if(basename($_SERVER['PHP_SELF']) == 'crear_rol.php'){?>
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

});
</script>
<style>
    .error{
		color: rgb(250 30 45);
	}
</style>