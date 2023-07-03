<script>
    $(document).ready(function () {
        
    //Inicialización de la librería de las fechas
    $('input[name="periodo_vacaciones"]').daterangepicker({ showDropdowns: true, parentEl: "main", locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });

    if ($('#Guardar').length > 0) {
            $('#Guardar').validate({
                ignore: [],
                onkeyup: false,
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent('.group.flex'));
                },
                invalidHandler: function(e, validator){
                    if(!($('#error-container').length)){
                        this.$div = $('<div id="error-container" class="grid grid-cols-1 mt-3 md:mt-0"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#Guardar");
                    }
                    $("#arrayerrors").html(""); 
                    $.each(validator.errorMap, function( index, value ) { 
                        this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
                        $("#arrayerrors").append(this.$arrayerror);
                    });
                },
                highlight: function(element) {
                    var elem = $(element);
                    $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                    $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                },
                unhighlight: function(element) {
                    var elem = $(element);
                    $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                    $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                },
                rules: {
                    periodo_vacaciones:{
                        required: true
                    }
                },
                messages: {
                    periodo_vacaciones:{
                        required: 'Este campo es requerido'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-vacaciones').html(
                        '<button disabled id="guardar_general" name="guardar_general" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" type="submit">'+
                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                            '</svg>'+
                            'Cargando...'+
                        '</button>');
                    $('#error-container').html("");
                    check_user_logged().then((response) => {
                        if(response == "true"){
                            //TODO EL AJAX DE LAS ACTAS ADMINISTRATIVAS
                            window.addEventListener('beforeunload', unloadHandler);
                            var fd = new FormData();
                            var periodo_vacaciones = $("#periodo_vacaciones").val();
                            var method = "store";
                            var app = "Incidencias"
                            //TODO EL APPEND DE LAS ACTAS ADMINISTRATIVAS
                            fd.append('periodo_vacaciones', periodo_vacaciones);
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
                                $('#submit-vacaciones').html("<button disabled id='guardar_general' name='guardar_general' class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' type='submit'>Guardar</button>");
                                window.location.href = "login.php";
                            });
                        }
                    }).catch((error) => {
                        console.log(error);
                    })
                    return false;
                }
            });
        }

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
    });
</script>

<style>
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }

    main{
		position:relative !important;
	}

	.daterangepicker td.active, .daterangepicker td.active:hover{
		--tw-bg-opacity: 1 !important;
		background-color: rgb(79 70 229 / var(--tw-bg-opacity)) !important;
		border-color: transparent;
		color: #fff;
	}
</style>