<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>

    document.addEventListener("DOMContentLoaded", function() {
        $("#datatable").DataTable({
            responsive: true,
            "lengthChange": false,
            "ordering": false,
            "sPaginationType": "listboxWithButtons",
            language: {
                search: ""
            },
            dom: '<"top"fB>rt<"bottom"ip><"clear">',
            buttons: [],
            "ajax":{
                "url": "../config/tokens/asignar_tokens.php",
                "type": "POST",
                "dataSrc": ""
            },
            "initComplete": () => {
                $("#datatable").show();
            },
            "columns":[
                {"data": "empleado_id"},
                {"data": "expediente_id", visible: false, searchable: false},
                {"data": "asignado_a"},
                {"data": "filename_foto", visible: false, searchable: false},
                {"data": "foto_identificador", visible: false, searchable: false},
                {"data": "token"},
                {"data": "exp_date"},
                {"data": "link", visible: false, searchable: false},
                {"data": null, searchable: false}
            ],
            "columnDefs": 
            [
                {
                    target: [0],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left'>" +
                                "<span>" + row["empleado_id"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [2],
                    render: function (data, type, row) {
                        if(row["foto_identificador"] === null){
                            return(
                                "<div class='flex items-center gap-3'>" +
                                    "<img class='w-6 h-6 rounded-full shrink-0' src='../src/img/default-user.png'>"+
                                    "<span>" + row["asignado_a"] + "</span>" +
                                "</div>"
                            );
                        }else{
                            return(
                                "<div class='flex items-center gap-3'>" +
                                    "<img class='w-6 h-6 rounded-full shrink-0' src='../src/img/imgs_uploaded/"+row["foto_identificador"]+"' onerror='this.onerror=null; this.src=\"../src/img/not_found.jpg\"'>"+
                                    "<span>" + row["asignado_a"] + "</span>" +
                                "</div>"
                            );
                        }
                    }
                },
                {
                    target: [5],
                    render: function (data, type, row) {
                        return(
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["token"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [6],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["exp_date"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [8],
                    render: function (data, type, row) {
                        return (
                            "<div class='flex item-center justify-start md:justify-center gap-3'>" +
                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Copiar'>" +
                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                        "<path stroke-width='1.5' d='M19,21H8V7H19M19,5H8A2,2 0 0,0 6,7V21A2,2 0 0,0 8,23H19A2,2 0 0,0 21,21V7A2,2 0 0,0 19,5M16,1H4A2,2 0 0,0 2,3V17H4V3H16V1Z' />"+
                                    "</svg>"+
                                "</div>" +
                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>" +
                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>" +
                                    "</svg>" +
                                "</div>" +
                            "</div>"
                        );
                    }
                }
            ]
        });
    });

	//Empieza la configuración del SELECT 2
    $('#usuario').select2({
        theme: ["tailwind"],
        placeholder: '-- Seleccione --',
        dropdownParent: $('main'),
        "language": {
            "noResults": function(){
                return "No hay resultados";
            }
        }
    });

    $('#usuario').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');

    $('.select2-selection--single').addClass("flex focus:outline-none");

    $('.select2-selection__rendered').addClass("flex-1");

    $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');

    $('.select2-selection__arrow').addClass('rotate-180 mb-1');

    $("#selectusuario_token").show();

    $('#usuario').on('select2:open', function (e) {
        const evt = "scroll.select2";
        $(e.target).parents().off(evt);
        $(window).off(evt);
    });

    $(document).ready(function () {

        $('.dataTables_filter input[type="search"]').
		attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-celeste-600');

        if($('#Guardar').length > 0 ){
            $('#Guardar').validate({
                ignore: [],
                onkeyup: false,
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent('.group.flex'));
                },
                invalidHandler: function(e, validator){
					if(!($('#error-container').length)){
						this.$div = $('<div id="error-container" class="grid grid-cols-1 mt-5"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#Guardar");
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
                    usuario: {
                        required:true
                    }
                },
                messages: {
                    usuario:{
                        required: 'Este campo es requerido'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-button').html(
						'<button disabled type="button" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">'+
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
							var select2 = $("#usuario").val();
							var select2text = $("#usuario option:selected").text();
                            var app = "token_expediente";
							fd.append('select2', select2);
							fd.append('select2text', select2text);
                            fd.append('app', app);
							$.ajax({
								type: "POST",
								url: "../ajax/class_search.php",
								data: fd,
								processData: false,
								contentType: false,
								success: function (response) {
									setTimeout(function(){
										var array = $.parseJSON(response);
										if (array[0] == "success") {
											Swal.fire({
												title: "Token Asignado",
												text: array[1],
												icon: "success"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
                                                var table = $('#datatable').DataTable();
												$('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='guardar_token' name='guardar_token' type='submit'>Asignar</button>");
                                                $('#usuario').select2('destroy');
                                                $("#usuario option[value='"+array[2]+"']").remove();
                                                $("#usuario").val("");
                                                $('#usuario').select2({
                                                    theme: ["tailwind"],
                                                    placeholder: '-- Seleccione --',
                                                    dropdownParent: $('main'),
                                                    "language": {
                                                        "noResults": function(){
                                                            return "No hay resultados";
                                                        }
                                                    }
                                                });
                                                $('#usuario').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');
                                                $('.select2-selection--single').addClass("flex focus:outline-none");
                                                $('.select2-selection__rendered').addClass("flex-1");
                                                $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');
                                                $('.select2-selection__arrow').addClass('rotate-180 mb-1');
                                                table.ajax.reload();
                                            });
										}else if (array[0] == "error") {
											Swal.fire({
												title: "Error",
												text: array[1],
												icon: "error"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
												$('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='guardar_token' name='guardar_token' type='submit'>Asignar</button>");
											});
										}else if (array[0] == "tokenFound_userNotFound_userNotLinked") {
											Swal.fire({
												title: "Error",
												text: array[1],
												icon: "error"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
                                                var table = $('#datatable').DataTable();
												$('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='guardar_token' name='guardar_token' type='submit'>Asignar</button>");
                                                $('#usuario').select2('destroy');
                                                $("#usuario option[value='"+array[2]+"']").remove();
                                                $("#usuario").val("");
                                                $('#usuario').select2({
                                                    theme: ["tailwind"],
                                                    placeholder: '-- Seleccione --',
                                                    dropdownParent: $('main'),
                                                    "language": {
                                                        "noResults": function(){
                                                            return "No hay resultados";
                                                        }
                                                    }
                                                });
                                                $('#usuario').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');
                                                $('.select2-selection--single').addClass("flex focus:outline-none");
                                                $('.select2-selection__rendered').addClass("flex-1");
                                                $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');
                                                $('.select2-selection__arrow').addClass('rotate-180 mb-1');
                                                table.ajax.reload();
											});
										}
									},3000);
								}
							});		
		                }else{
			                Swal.fire({
				                title: "Ocurrió un error",
				                text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
				                icon: "error"
			                }).then(function() {
				                $('#submit-button').html("<button disabled class='button btn-celeste hover:bg-celeste-500 active:bg-celeste-700 text-white rounded-md h-11 px-8 py-2' id='guardar_token' name='guardar_token' type='submit'>Asignar</button>");
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


        $('#usuario').on("change", function (e) {
            $(this).valid()
        });

		function unloadHandler(e) {
			// Cancel the event
			e.preventDefault();
			// Chrome requires returnValue to be set
			e.returnValue = '';
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

        $(document).on("click", "tr .Copiar", function () {
            var table = $('#datatable').DataTable();
            var rowSelector;
            var li = $(this).closest('li');
            if ( li.length ) {
                rowSelector = table.cell( li ).index().row;
            }
            else {
                rowSelector =  $(this).closest('tr');
            }
            var row = table.row(rowSelector);
            var data = row.data();

            var copyText = data["link"];
            var el = document.createElement('textarea');
            el.value = copyText;
            el.setAttribute('readonly', '');
            el.style = {
                display:'none'
            };
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            alert("Link copiado en el portapapeles del dispositivo: " +copyText);
        });

        $(document).on("click", "tr .Eliminar", function () {
            var table = $('#datatable').DataTable();
            var rowSelector;
            var li = $(this).closest('li');
            if ( li.length ) {
                rowSelector = table.cell( li ).index().row;
            }
            else {
                rowSelector =  $(this).closest('tr');
            }
            var row = table.row(rowSelector);
            var data = row.data();

            var expediente_id = data["expediente_id"];
            var asignado_a = data["asignado_a"];

            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podras recuperar la información!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00a3ff  ',
                cancelButtonColor: '#FF1E2D',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                check_user_logged().then((response) => {
                    if(response == "true"){
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'éxito',
                                text: 'La fila ha sido eliminada!'
                            }).then(function() {
                                var eliminar = data["token"];
                                var fd = new FormData();
                                fd.append('eliminar_token', eliminar);
                                $.ajax({
                                    url: "../ajax/eliminar/tabla_token/eliminartoken.php",
                                    type: "post",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(result) {
                                        $('#usuario').select2('destroy');
                                        $( "#usuario > optgroup" ).prepend($('<option>', {
                                            value: expediente_id,
                                            text: asignado_a
                                        }));
                                        $("#usuario").val("");
                                        $('#usuario').select2({
                                            theme: ["tailwind"],
                                            placeholder: '-- Seleccione --',
                                            dropdownParent: $('main'),
                                            "language": {
                                                "noResults": function(){
                                                    return "No hay resultados";
                                                }
                                            }
                                        });
                                        $('#usuario').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');
                                        $('.select2-selection--single').addClass("flex focus:outline-none");
                                        $('.select2-selection__rendered').addClass("flex-1");
                                        $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');
                                        $('.select2-selection__arrow').addClass('rotate-180 mb-1');
                                        table.ajax.reload();
                                    }
                                });
                            });
                        }
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
            })
        });
    });

    <?php if(basename($_SERVER['PHP_SELF']) == 'token_expediente.php'){?>
		var dropdown = document.getElementById('expediente');
		dropdown.classList.remove("hidden");
	<?php } ?>

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


    $('#usuario').on('select2:open', function (e) {
        waitForElm('.select2-results__options').then((elm) => {
            if ( $('.select2-results__options.select2-results__options--nested > *').length == 0 ) {
                var usuarios_group = $('#usuario').find('optgroup[label=Usuarios]');
                $(usuarios_group).prop('disabled', 'true');
                $(".select2-results__option.select2-results__option--group").css("display","none");
                $('#select2-usuario-results.select2-results__options').append("<span class='px-3'>No hay resultados</span>");
            }
        });
    });
</script>
<style>

	.error{
        color: #FF1E2D;
    }

    .dataTables_wrapper .dataTables_filter{
        float:left;
        text-align:left;
        padding-bottom:13px;
        padding-top:5px;
    }

    @media (max-width: 640px){
        .dataTables_filter{
            width:100%;
        }
    }

    .dataTables_paginate{
        font-size:12px;
        display:flex;
        align-items:center;
        justify-content: center;
        position:relative;
        right: 7px;
    }

    .dt-buttons{
        float:right !important;
        text-align: right;
    }

    #datatable{
        border-collapse: collapse !important;
        font-size: 12px;
    }

    .search{
        margin:auto !important;
        height: 40px !important;
    }

    tr.odd:hover, tr.even:hover{
        background: rgb(243 244 246 / var(--tw-bg-opacity)) !important
    }
    tr.odd{
        border-bottom-width: 1px;
        border-color: rgb(229 231 235 / var(--tw-border-opacity));
        --tw-border-opacity: 1;
        background: transparent !important;
    }

    tr.even{
        border-bottom-width: 1px;
        border-color: rgb(229 231 235 / var(--tw-border-opacity));
        --tw-border-opacity: 1;
        background: rgb(249 250 251 / var(--tw-bg-opacity)) !important;
    }

    div.dataTables_filter .search{
			background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
			background-repeat: no-repeat;
			background-color: #fff;
			background-position: 3px 7px !important;
			padding-left: 30px;
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
        background: rgb(0 152 255) !important;
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