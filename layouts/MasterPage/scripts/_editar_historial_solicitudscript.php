<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>
    $('#user_vacaciones').select2({
        theme: ["tailwind"],
        placeholder: '-- Seleccione --',
        dropdownParent: $('#selectuser_vacaciones'),
        "language": {
            "noResults": function(){
                return "No hay resultados";
            }
        }
    });

    $('#user_vacaciones').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');

    $('.select2-selection--single').addClass("flex focus:outline-none");

    $('.select2-selection__rendered').addClass("flex-1");

    $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');

    $('.select2-selection__arrow').addClass('rotate-180 mb-1');

    $("#selectuser_vacaciones").show();

    $('#user_vacaciones').on('select2:open', function (e) {
        const evt = "scroll.select2";
        $(e.target).parents().off(evt);
        $(window).off(evt);
    });
    
    $(document).ready(function () {

        //Inicialización de la librería de las fechas
        $('input[name="periodo_vacaciones"]').daterangepicker({ showDropdowns: true, parentEl: "main", locale: { format: 'YYYY/MM/DD' }, startDate: "<?php echo $break_date[0]; ?>", endDate: "<?php echo $break_date[1]; ?>", applyButtonClasses: "button btn-celeste px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
    
        //Fecha de expedición
        $('#fecha_vacaciones').daterangepicker({ "singleDatePicker": true, "timePicker": true, "timePicker24Hour": true, "timePickerSeconds": true, "parentEl": "main", locale: { format: 'YYYY/MM/DD HH:mm:ss' }, startDate: "<?php echo $editar_historial_vacaciones -> fecha_solicitud; ?>", applyButtonClasses: "button btn-celeste px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });

        //Guardar formulario
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
                    if (elem.hasClass("select2-hidden-accessible")) {
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600"); 
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().addClass("border-2 border-rose-500 border-2"); 
                    }else{
                        $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                        $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                    }
                },
                unhighlight: function(element) {
                    var elem = $(element);
                    if (elem.hasClass("select2-hidden-accessible")) {
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().removeClass("border-2 border-rose-500 border-2");
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600"); 
                    }else{
                        $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                        $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                    }
                },
                rules: {
                    user_vacaciones:{
                        required: true
                    },
                    periodo_vacaciones:{
                        required: true
                    },
                    fecha_vacaciones:{
                        required: true
                    },
                    estatus_vacaciones:{
                        required: true
                    }
                },
                messages: {
                    user_vacaciones:{
                        required: "Este campo es requerido"
                    },
                    periodo_vacaciones:{
                        required: 'Este campo es requerido'
                    },
                    fecha_vacaciones:{
                        required: 'Este campo es requerido'
                    },
                    estatus_vacaciones:{
                        required: 'Este campo es requerido'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-button').html(
                        '<button disabled type="button" class="button w-full inline-flex items-center justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">'+
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
                            var select2 = $("#user_vacaciones").val();
                            var select2text = $("#user_vacaciones option:selected").text();
                            var periodo_vacaciones = $("#periodo_vacaciones").val();
                            var fecha_vacaciones = $("#fecha_vacaciones").val();
                            var estatus_vacaciones = $("#estatus_vacaciones").val();
                            var id = "<?php echo $editarid; ?>";
                            var method = "edit";
                            var app = "Historial_vacaciones";
                            fd.append('select2', select2);
                            fd.append('select2text', select2text);
                            fd.append('periodo_vacaciones', periodo_vacaciones);
                            fd.append('fecha_vacaciones', fecha_vacaciones);
                            fd.append('estatus_vacaciones', estatus_vacaciones);
                            fd.append('id', id);
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
                                        if(array[0] == "success"){
                                            Swal.fire({
                                                title: "Solicitud de vacaciones editada",
                                                text: array[1],
                                                icon: "success"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-button').html("<button disabled class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                                                window.location.href = "historial_vacaciones.php";
                                            });
                                        }else if(array[0] == "error"){
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                                            });
                                        }else if(array[0] == "forbidden"){
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-button').html("<button disabled class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                                                window.location.href = "dashboard.php";
                                            });
                                        }else if(array[0] == "solicitud_not_found"){
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-button').html("<button disabled class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                                                window.location.href = "historial_vacaciones.php";
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
                                $('#submit-button').html("<button disabled class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
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


        //Checa si el user esta loggeado
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
        
        //Protege si el usuario cierra, regresa durante un envio de formulario, ect...
        function unloadHandler(e) {
            // Cancel the event
            e.preventDefault();
            // Chrome requires returnValue to be set
            e.returnValue = '';
        }

        //Este metodo es para quitar el error en el select 2
        $('#user_vacaciones').on("change", function (e) {
            $(this).valid()
        });

        function waitForElm(selector) {
            return new Promise(resolve => {
                if (document.querySelector(selector)) {
                    return resolve(document.querySelector(selector));
                }

                const observer = new MutationObserver(mutations => {
                    if (document.querySelector(selector)) {
                        resolve(document.querySelector(selector));
                        observer.disconnect();
                    }
                });

                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });
            });
        }

        $('#user_vacaciones').on('select2:open', function (e) {
            waitForElm('.select2-results__options').then((elm) => {
                if ( $('.select2-results__options.select2-results__options--nested > *').length == 0 ) {
                    var usuarios_group = $('#user').find('optgroup[label=Usuarios]');
                    $(usuarios_group).prop('disabled', 'true');
                    $(".select2-results__option.select2-results__option--group").css("display","none");
                    $('#select2-user-results.select2-results__options').append("<span class='px-3'>No hay resultados</span>");
                }
            });
        });
    });
</script>
<style>

    .error{
        color: red;
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

    .dataTables_wrapper .dataTables_filter{
        float:left;
        text-align:left;
        padding-bottom:5px;
        padding-top:13px;
    }

    .select2-container--tailwind .select2-results > .select2-results__options{
        overflow-y: auto;
        max-height: 110px;
    }

    .select2-container--tailwind .select2-results__option--group{
        padding:0;
    }

    .select2-container--tailwind .select2-results__group{
        cursor: default;
        display:block;
        padding: 6px;
    }

    .select2-results__option--highlighted{
        background: rgb(129 140 248) !important;
        color:white;
    }

    .select2-container--above.select2-container--open{
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }

    .select2-container--below.select2-container--open{
        border-bottom-right-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
    }

    .select2-results__option--selected{
        background: #ddd;
    }

    .select2-dropdown{
        border-width: 1px;
        border-style: solid;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
        --tw-border-opacity: 1;
    }

    .select2-search__field{
        border-radius: 0.375rem;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        height: 2.75rem;
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
    }

    .select2-search__field:focus{
        box-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        --tw-ring-color: rgb(79 70 229);
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
