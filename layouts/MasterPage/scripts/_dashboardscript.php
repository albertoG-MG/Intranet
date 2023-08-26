<link rel="stylesheet" href="../src/css/pagination.css">
<script src="../src/js/pagination.min.js"></script>
<script>
    var originalState;
    var originalState2;
    var delete_switch;
    var delete_switch2;
    const tabElements = [{
            id: 'vision',
            triggerEl: document.querySelector('#vision-tab-profile'),
            targetEl: document.querySelector('#vision')
        },
        {
            id: 'alertas',
            triggerEl: document.querySelector('#alertas-tab-profile'),
            targetEl: document.querySelector('#alertas')
        },
        {
            id: 'avisos',
            triggerEl: document.querySelector('#avisos-tab-profile'),
            targetEl: document.querySelector('#avisos')
        },
        {
            id: 'bolsa',
            triggerEl: document.querySelector('#bolsa-tab-profile'),
            targetEl: document.querySelector('#bolsa')
        }
    ];

    tabElements.forEach((tab) => {
        tab.triggerEl.addEventListener('click', () => {
            target = tab;
            <?php 
                if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
                    if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
            ?>
            if (target.triggerEl.className.includes("menu-active") == false){
                if(target.id=="alertas"){
                    if ( ! $.fn.DataTable.isDataTable('#alertas_table') ) {
                        $("#alertas_table").DataTable({
                            responsive: true,
                            "lengthChange": false,
                            "ordering": false,
                            "sPaginationType": "listboxWithButtons",
                            language: {
                                search: ""
                            },
                            dom: '<"top"fB>rt<"bottom"ip><"clear">',
                            buttons: [
                                {
                                    text: "Crear alerta",
                                    attr: {
                                        'id': 'Alerta',
                                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                    },
                                    className: 'button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                    action: function(e, dt, node, config) {
                                        $('.modal-wrapper-flex').html(
                                            '<div class="flex-col gap-3 items-center flex sm:flex-row">'+
                                                '<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">'+
                                                    '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                                        '<path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />'+
                                                    '</svg>'+
                                                '</div>'+
                                                '<h3 class="text-lg font-medium text-gray-900"> Crear una alerta</h3>'+
                                            '</div>'+
                                            '<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left overflow-y-scroll h-[21.875rem] sm:h-full md:overflow-y-hidden">'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">'+
                                                        'Título de la alerta'+
                                                    '</label>'+
                                                    '<div class="group flex">'+
                                                        '<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">'+
                                                            '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                                                '<path d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />'+
                                                            '</svg>'+
                                                        '</div>'+
                                                        '<input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="titulo_alerta" name="titulo_alerta" placeholder="Título de la alerta">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">Descripción de la alerta</label>'+
                                                    '<textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="descripcion_alerta" name="descripcion_alerta" placeholder="Descripción de la alerta"></textarea>'+
                                                    '<div id="error_descripcion_alerta"></div>'+
                                                '</div>'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">Subir imagen para la alerta</label>'+
                                                    '<div class="flex items-center justify-center w-full">'+
                                                        '<label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">'+
                                                            '<div id="img_information" class="flex flex-col items-center justify-center pt-7">'+
                                                                '<div id="svg">'+
                                                                    '<svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">'+
                                                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>'+
                                                                    '</svg>'+
                                                                '</div>'+
                                                                '<img id="preview" class="hidden">'+
                                                                '<p id="archivo" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona una fotografía</p>'+
                                                            '</div>'+
                                                            '<input type="file" id="foto" name="foto" class="hidden">'+
                                                        '</label>'+
                                                    '</div>'+
                                                    '<div id="error" class="m-auto"></div>'+
                                                '</div>'+
                                                '<div id="div_foto" class="hidden">'+
                                                    '<div id="div_actions_foto" class="flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">'+
                                                        '<button type="button" id="delete_foto" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">'+
                                                            '<svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">'+
                                                                '<path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />'+
                                                            '</svg>'+
                                                            'Eliminar'+
                                                        '</button>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">Subir archivo para la alerta</label>'+
                                                    '<div class="flex items-center justify-center w-full">'+
                                                        '<label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">'+
                                                            '<div id="archivo_alerta_information" class="flex flex-col items-center justify-center pt-7">'+
                                                                '<div id="svg_archivo_alerta">'+
																	'<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" viewBox="0 0 24 24">'+
																		'<path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"></path>'+
																	'</svg>'+
                                                                '</div>'+
                                                                '<img id="preview_archivo_alerta" class="hidden">'+
                                                                '<p id="text_archivo_alerta" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona un archivo</p>'+
                                                            '</div>'+
                                                            '<input type="file" id="archivo_alerta" name="archivo_alerta" class="hidden">'+
                                                        '</label>'+
                                                    '</div>'+
                                                    '<div id="error_archivo_alerta" class="m-auto"></div>'+
                                                '</div>'+
                                                '<div id="div_archivo_alerta" class="hidden">'+
                                                    '<div id="div_actions_archivo_alerta" class="flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">'+
                                                        '<button type="button" id="delete_archivo_alerta" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">'+
                                                            '<svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">'+
                                                                '<path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />'+
                                                            '</svg>'+
                                                            'Eliminar'+
                                                        '</button>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>');
                                        $('.modal-actions').html(
                                            '<div id="submit-changes">'+
                                                '<button id="crear-alerta" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Crear</button>'+
                                            '</div>'+
                                            '<div id="disable-close-submit">'+
                                                '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                                            '</div>');
                                        originalState = $("#img_information").clone();
                                        originalState2 = $("#archivo_alerta_information").clone();
                                        openModal();
                                        resetFormValidator("#Guardar");
                                        $('#Guardar').unbind('submit'); 
                                        $.validator.addMethod('biggertext', function (value, element) {
                                            return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
                                        }, 'not a valid biggertext.');
                                        $.validator.addMethod('filesize', function(value, element, param) {
                                            return this.optional(element) || (element.files[0].size <= param * 1048576)
                                        }, 'File size must be less than {0} MB');
                                        if ($('#Guardar').length > 0) {
                                            $('#Guardar').validate({
                                                ignore: [],
                                                onkeyup: false,
                                                errorPlacement: function(error, element) {
                                                    if((element.attr('name') === 'foto')){
                                                        error.appendTo("div#error");
                                                    }else if(element.attr('name') === 'archivo_alerta'){
													error.appendTo("div#error_archivo_alerta"); 
												    }else if(element.attr('name') === 'descripcion_alerta'){
                                                        error.appendTo("div#error_descripcion_alerta"); 
                                                    }else{
                                                        error.insertAfter(element.parent('.group.flex'));
                                                    }
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
                                                    titulo_alerta: {
                                                        required: true,
                                                        biggertext: true
                                                    },
                                                    descripcion_alerta: {
                                                        required: true,
                                                        biggertext: true
                                                    },
                                                    foto: {
                                                        extension: "jpg|jpeg|png",
                                                        filesize: 10
                                                    },
                                                    archivo_alerta: {
                                                        extension: "pdf|jpg|jpeg|png",
                                                        filesize: 10
                                                    }
                                                },
                                                messages: {
                                                    titulo_alerta: {
                                                        required: 'Este campo es requerido',
                                                        biggertext: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                                                    },
                                                    descripcion_alerta: {
                                                        required: 'Este campo es requerido',
                                                        biggertext: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                                                    },
                                                    foto: {
                                                        extension: 'Solo se permite jpg, jpeg y pngs',
                                                        filesize: 'Las imágenes deben pesar ser menos de 10 MB'
                                                    },
                                                    archivo_alerta: {
                                                        extension: 'Solo se permite pdf, jpg, jpeg y pngs',
                                                        filesize: 'Las imágenes deben pesar ser menos de 10 MB'
                                                    }
                                                },
                                                submitHandler: function(form) {
                                                    $('#submit-changes').html(
                                                        '<button disabled type="button" class="button w-full inline-flex items-center justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">'+
                                                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                                                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                                                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                                                            '</svg>'+
                                                            'Cargando...'+
                                                        '</button>');
                                                        $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        check_user_logged().then((response) => {
                                                            if(response == "true"){
                                                                window.addEventListener('beforeunload', unloadHandler);
                                                                /*EMPIEZA EL AJAX*/
                                                                var fd = new FormData();
                                                                var titulo_alerta = $("#titulo_alerta").val();
                                                                var descripcion_alerta = $("#descripcion_alerta").val();
                                                                var foto = $('#foto')[0].files[0];
                                                                var archivo_alerta = $('#archivo_alerta')[0].files[0];
                                                                var method = "store";
                                                                var app = "alertas";
                                                                fd.append('titulo_alerta', titulo_alerta);
                                                                fd.append('descripcion_alerta', descripcion_alerta);
                                                                fd.append('foto', foto);
                                                                fd.append('archivo_alerta', archivo_alerta);
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
                                                                                    title: "Alerta Creada",
                                                                                    text: array[1],
                                                                                    icon: "success"
                                                                                }).then(function() {
                                                                                    var table = $('#alertas_table').DataTable();
                                                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                                                    $('#submit-changes').html('<button disabled id="crear-alerta" type="submit" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Crear</button>');
                                                                                    $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                                                    table.ajax.reload();
                                                                                    totalfilas_alertas();
                                                                                    closeModal();
                                                                                });
                                                                            } else if(array[0] == "error") {
                                                                                Swal.fire({
                                                                                    title: "Error",
                                                                                    text: array[1],
                                                                                    icon: "error"
                                                                                }).then(function() {
                                                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                                                    $('#submit-changes').html('<button id="crear-alerta" type="submit" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Crear</button>');
                                                                                    $('#disable-close-submit').html("<button id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
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
                                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                                    $('#submit-changes').html('<button disabled id="crear-alerta" type="submit" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Crear</button>');
                                                                    $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
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
                                    }
                                }
                            ],
                            "ajax":{
                                "url": "../config/alertas/ajax_alertas.php",
                                "type": "POST",
                                "dataSrc": "",
                                "data":{
                                    "rol": <?php echo $_SESSION["rol"]; ?>,
                                    "sessionid": <?php echo $_SESSION["id"]; ?>

                                }
                            },
                            "columns":[
                                {"data": "creada_por", visible: false, searchable: false},
                                {"data": "modificado_por", visible: false, searchable: false},
                                {"data": "filename_alertas", visible: false, searchable: false},
                                {"data": "alertas_foto_identificador"},
                                {"data": "filename_alertas_archivo", visible: false, searchable: false},
                                {"data": "alertas_archivo_identificador"},
                                {"data": "titulo_alerta"},
                                {"data": "descripcion_alerta"},
                                {"data": "fecha_creacion_alerta"},
                                {"data": "fecha_modificacion", visible: false, searchable: false},
                                {"data": "id", searchable: false}
                            ],
                            "columnDefs": 
                            [
                                {
                                    target: [3],
                                    render: function (data, type, row) {
                                        if(row["alertas_foto_identificador"] === null){
                                            return(
                                                "<div>" +
                                                    "<img class='block lg:m-auto w-10 h-10 shrink-0' src='../src/img/default_alert_image.png'>"+
                                                "</div>"
                                            );
                                        }else{
                                            return(
                                                "<div>" +
                                                    "<img class='block lg:m-auto w-10 h-10 shrink-0' src='../src/alertas/"+row['alertas_foto_identificador']+"' onerror='this.onerror=null; this.src=\"../src/img/not_found.jpg\"'>"+
                                                "</div>"
                                            );
                                        }
                                    }
                                },
                                {
                                    target: [5],
                                    render: function (data, type, row) {
                                        if(row["alertas_archivo_identificador"] != null){
                                            var url= "../src/alertas_archivo/"+row['alertas_archivo_identificador']+"";
                                            var filename = row['filename_alertas_archivo'];
                                            if(checkFile(url)){
                                                return (
                                                    "<div class='text-left lg:text-center'>" +
                                                        "<a style='word-break:break-word;' class='text-blue-600 hover:border-b-[1px] hover:border-blue-600' href="+url+">"+filename+"</a>" +
                                                    "</div>"
                                                );
                                            }else{
                                                return (
                                                    "<div class='text-left lg:text-center'>" +
                                                        "<span>No se encontró el archivo</span>" +
                                                    "</div>"
                                                );
                                            }
                                        }else{
                                            return (
                                                "<div class='text-left lg:text-center'>" +
                                                    "<span>No se ha subido un archivo</span>" +
                                                "</div>"
                                            );
                                        }
                                    }
                                },
                                {
                                    target: [6],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["titulo_alerta"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [7],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["descripcion_alerta"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [8],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["fecha_creacion_alerta"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [10],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='flex item-center justify-start md:justify-center gap-3'>" +
                                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Editar'>" +
                                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                                                    "</svg>" +
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
                            ],
                            "initComplete": () => {
                                $('.dataTables_filter input[type="search"]').
                                attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-600');
                                $("#alertas_table").show();
                            },
                        });
                    }
                }else if(target.id=="avisos"){
                    if ( ! $.fn.DataTable.isDataTable('#avisos_table') ) {
                        $("#avisos_table").DataTable({
                            responsive: true,
                            "lengthChange": false,
                            "ordering": false,
                            "sPaginationType": "listboxWithButtons",
                            language: {
                                search: ""
                            },
                            dom: '<"top"fB>rt<"bottom"ip><"clear">',
                            buttons: [
                                {
                                    text: "Crear aviso",
                                    attr: {
                                        'id': 'Aviso',
                                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                    },
                                    className: 'button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                    action: function(e, dt, node, config) {
                                        $('.modal-wrapper-flex').html(
                                            '<div class="flex-col gap-3 items-center flex sm:flex-row">'+
                                                '<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">'+
                                                    '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20.1L20 10.1V8L14 2H6M13 3.5L18.5 9H13V3.5M20.1 13C20 13 19.8 13.1 19.7 13.2L18.7 14.2L20.8 16.3L21.8 15.3C22 15.1 22 14.7 21.8 14.5L20.5 13.2C20.4 13.1 20.3 13 20.1 13M18.1 14.8L12 20.9V23H14.1L20.2 16.9L18.1 14.8Z" /></svg>'+
                                                '</div>'+
                                                '<h3 class="text-lg font-medium text-gray-900"> Crear un aviso</h3>'+
                                            '</div>'+
                                            '<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left overflow-y-scroll h-[21.875rem] sm:h-full md:overflow-y-hidden">'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">'+
                                                        'Título del aviso'+
                                                    '</label>'+
                                                    '<div class="group flex">'+
                                                        '<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">'+
                                                            '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                                                '<path d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />'+
                                                            '</svg>'+
                                                        '</div>'+
                                                        '<input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="titulo_aviso" name="titulo_aviso" placeholder="Título del aviso">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">Descripción del aviso</label>'+
                                                    '<textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="descripcion_aviso" name="descripcion_aviso" placeholder="Descripción del aviso"></textarea>'+
                                                    '<div id="error_descripcion_aviso"></div>'+
                                                '</div>'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">Subir imagen para el aviso</label>'+
                                                    '<div class="flex items-center justify-center w-full">'+
                                                        '<label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">'+
                                                            '<div id="img_information_aviso" class="flex flex-col items-center justify-center pt-7">'+
                                                                '<div id="svg_aviso">'+
                                                                    '<svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">'+
                                                                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>'+
                                                                    '</svg>'+
                                                                '</div>'+
                                                                '<img id="preview_aviso" class="hidden">'+
                                                                '<p id="archivo_aviso" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona una fotografía</p>'+
                                                            '</div>'+
                                                            '<input type="file" id="foto_aviso" name="foto_aviso" class="hidden">'+
                                                        '</label>'+
                                                    '</div>'+
                                                    '<div id="error_aviso" class="m-auto"></div>'+
                                                '</div>'+
                                                '<div id="div_foto_aviso" class="hidden">'+
                                                    '<div id="div_actions_foto_aviso" class="flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">'+
                                                        '<button type="button" id="delete_foto_aviso" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">'+
                                                            '<svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">'+
                                                                '<path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />'+
                                                            '</svg>'+
                                                            'Eliminar'+
                                                        '</button>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">Subir archivo para la aviso</label>'+
                                                    '<div class="flex items-center justify-center w-full">'+
                                                        '<label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">'+
                                                            '<div id="archivo_file_aviso_information" class="flex flex-col items-center justify-center pt-7">'+
                                                                '<div id="svg_archivo_file_aviso">'+
                                                                    '<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" viewBox="0 0 24 24">'+
                                                                        '<path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"></path>'+
                                                                    '</svg>'+
                                                                '</div>'+
                                                                '<img id="preview_archivo_file_aviso" class="hidden">'+
                                                                '<p id="text_archivo_file_aviso" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona un archivo</p>'+
                                                            '</div>'+
                                                            '<input type="file" id="archivo_file_aviso" name="archivo_file_aviso" class="hidden">'+
                                                        '</label>'+
                                                    '</div>'+
                                                    '<div id="error_archivo_file_aviso" class="m-auto"></div>'+
                                                '</div>'+
                                                '<div id="div_archivo_file_aviso" class="hidden">'+
                                                    '<div id="div_actions_archivo_file_aviso" class="flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">'+
                                                        '<button type="button" id="delete_archivo_file_aviso" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">'+
                                                            '<svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">'+
                                                                '<path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />'+
                                                            '</svg>'+
                                                            'Eliminar'+
                                                        '</button>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>');
                                        $('.modal-actions').html(
                                            '<div id="submit-changes-aviso">'+
                                                '<button id="crear-aviso" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Crear</button>'+
                                            '</div>'+
                                            '<div id="disable-close-submit-aviso">'+
                                                '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                                            '</div>');
                                        originalState = $("#img_information_aviso").clone();
                                        originalState2 = $("#archivo_file_aviso_information").clone();
                                        openModal();
                                        resetFormValidator("#Guardar");
                                        $('#Guardar').unbind('submit'); 
                                        $.validator.addMethod('biggertext', function (value, element) {
		                                    return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
	                                    }, 'not a valid biggertext.');
                                        $.validator.addMethod('filesize', function(value, element, param) {
                                            return this.optional(element) || (element.files[0].size <= param * 1048576)
                                        }, 'File size must be less than {0} MB');
                                        if ($('#Guardar').length > 0) {
                                            $('#Guardar').validate({
                                                ignore: [],
                                                onkeyup: false,
                                                errorPlacement: function(error, element) {
                                                    if((element.attr('name') === 'foto_aviso')){
                                                        error.appendTo("div#error_aviso");
                                                    }else if((element.attr('name') === 'archivo_file_aviso')){
		                                                error.appendTo("div#error_archivo_file_aviso");
                                                    }else if(element.attr('name') === 'descripcion_aviso'){
                                                        error.appendTo("div#error_descripcion_aviso"); 
                                                    }else{
                                                        error.insertAfter(element.parent('.group.flex'));
                                                    }
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
                                                    titulo_aviso: {
                                                        required: true,
                                                        biggertext: true
                                                    },
                                                    descripcion_aviso: {
                                                        required: true,
                                                        biggertext: true
                                                    },
                                                    foto_aviso: {
                                                        extension: "jpg|jpeg|png",
                                                        filesize: 10
                                                    },
                                                    archivo_file_aviso: {
                                                        extension: "pdf|jpg|jpeg|png",
                                                        filesize: 10
                                                    }
                                                },
                                                messages: {
                                                    titulo_aviso: {
                                                        required: 'Este campo es requerido',
                                                        biggertext: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                                                    },
                                                    descripcion_aviso: {
                                                        required: 'Este campo es requerido',
                                                        biggertext: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                                                    },
                                                    foto_aviso: {
                                                        extension: 'Solo se permite jpg, jpeg y pngs',
                                                        filesize: 'Las imágenes deben pesar ser menos de 10 MB'
                                                    },
                                                    archivo_file_aviso: {
                                                        extension: 'Solo se permite pdf, jpg, jpeg y pngs',
                                                        filesize: 'Los archivos deben pesar ser menos de 10 MB'
                                                    }
                                                },
                                                submitHandler: function(form) {
                                                    $('#submit-changes-aviso').html(
                                                        '<button disabled type="button" class="button w-full inline-flex items-center justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">'+
                                                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                                                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                                                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                                                            '</svg>'+
                                                            'Cargando...'+
                                                        '</button>');
                                                        $('#disable-close-submit-aviso').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        check_user_logged().then((response) => {
                                                            if(response == "true"){
                                                                window.addEventListener('beforeunload', unloadHandler);
                                                                /*EMPIEZA EL AJAX*/
                                                                var fd = new FormData();
                                                                var titulo_aviso = $("#titulo_aviso").val();
                                                                var descripcion_aviso = $("#descripcion_aviso").val();
                                                                var foto_aviso = $('#foto_aviso')[0].files[0];
                                                                var archivo_file_aviso = $('#archivo_file_aviso')[0].files[0];
                                                                var method = "store";
                                                                var app = "avisos";
                                                                fd.append('titulo_aviso', titulo_aviso);
                                                                fd.append('descripcion_aviso', descripcion_aviso);
                                                                fd.append('foto_aviso', foto_aviso);
                                                                fd.append('archivo_file_aviso', archivo_file_aviso);
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
                                                                                    title: "Aviso Creado",
                                                                                    text: array[1],
                                                                                    icon: "success"
                                                                                }).then(function() {
                                                                                    var table = $('#avisos_table').DataTable();
                                                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                                                    $('#submit-changes-aviso').html('<button disabled id="crear-aviso" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Crear</button>');
                                                                                    $('#disable-close-submit-aviso').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                                                    table.ajax.reload();
                                                                                    totalfilas_avisos();
                                                                                    closeModal();
                                                                                });
                                                                            } else if(array[0] == "error") {
                                                                                Swal.fire({
                                                                                    title: "Error",
                                                                                    text: array[1],
                                                                                    icon: "error"
                                                                                }).then(function() {
                                                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                                                    $('#submit-changes-aviso').html('<button id="crear-aviso" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Crear</button>');
                                                                                    $('#disable-close-submit-aviso').html("<button id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
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
                                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                                    $('#submit-changes-aviso').html('<button disabled id="crear-aviso" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Crear</button>');
                                                                    $('#disable-close-submit-aviso').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
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
                                    }
                                }
                            ],
                            "ajax":{
                                "url": "../config/avisos/ajax_avisos.php",
                                "type": "POST",
                                "dataSrc": "",
                                "data":{
                                    "rol": <?php echo $_SESSION["rol"]; ?>,
                                    "sessionid": <?php echo $_SESSION["id"]; ?>

                                }
                            },
                            "columns":[
                                {"data": "creada_por", visible: false, searchable: false},
	                            {"data": "modificado_por", visible: false, searchable: false},
                                {"data": "filename_avisos", visible: false, searchable: false},
                                {"data": "avisos_foto_identificador"},
                                {"data": "filename_archivo_aviso", visible: false, searchable: false},
                                {"data": "aviso_archivo_identificador"},
                                {"data": "titulo_aviso"},
                                {"data": "descripcion_aviso"},
                                {"data": "fecha_creacion_aviso"},
                                {"data": "fecha_modificacion", visible: false, searchable: false},
                                {"data": "id", searchable: false}
                            ],
                            "columnDefs": 
                            [
                                {
                                    target: [3],
                                    render: function (data, type, row) {
                                        if(row["avisos_foto_identificador"] === null){
                                            return(
                                                "<div>" +
                                                    "<img class='block lg:m-auto w-10 h-10 shrink-0' src='../src/img/default_notices_image.png'>"+
                                                "</div>"
                                            );
                                        }else{
                                            return(
                                                "<div>" +
                                                    "<img class='block lg:m-auto w-10 h-10 shrink-0' src='../src/avisos/"+row['avisos_foto_identificador']+"' onerror='this.onerror=null; this.src=\"../src/img/not_found.jpg\"'>"+
                                                "</div>"
                                            );
                                        }
                                    }
                                },
                                {
                                    target: [5],
                                    render: function (data, type, row) {
                                        if(row["aviso_archivo_identificador"] != null){
                                            var url= "../src/avisos_archivo/"+row['aviso_archivo_identificador']+"";
                                            var filename = row['filename_archivo_aviso'];
                                            if(checkFile(url)){
                                                return (
                                                    "<div class='text-left lg:text-center'>" +
                                                        "<a style='word-break:break-word;' class='text-blue-600 hover:border-b-[1px] hover:border-blue-600' href="+url+">"+filename+"</a>" +
                                                    "</div>"
                                                );
                                            }else{
                                                return (
                                                    "<div class='text-left lg:text-center'>" +
                                                        "<span>No se encontró el archivo</span>" +
                                                    "</div>"
                                                );
                                            }
                                        }else{
                                            return (
                                                "<div class='text-left lg:text-center'>" +
                                                    "<span>No se ha subido un archivo</span>" +
                                                "</div>"
                                            );
                                        }
                                    }
                                },
                                {
                                    target: [6],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["titulo_aviso"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [7],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["descripcion_aviso"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [8],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["fecha_creacion_aviso"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [10],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='flex item-center justify-start md:justify-center gap-3'>" +
                                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Editar_Aviso'>" +
                                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                                                    "</svg>" +
                                                "</div>" +
                                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar_Aviso'>" +
                                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>" +
                                                    "</svg>" +
                                                "</div>" +
                                            "</div>"
                                        );	
                                    }
                                }
                            ],
                            "initComplete": () => {
                                $('.dataTables_filter input[type="search"]').
                                attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-600');
                                $("#avisos_table").show();
                            },
                        });
                    }
                }
            }

            function checkFile(url) {
                var response = jQuery.ajax({
                    url: url,
                    type: 'HEAD',
                    async: false
                }).status;	
                
                return (response != "200") ? false : true;
            }

            <?php 
                    }
                } 
            ?>

            tabElements.forEach((t) => {
                t.targetEl.classList.remove("block")
                t.targetEl.classList.add("hidden");
                t.triggerEl.classList.remove("bg-[#4f46e5]", "text-white", "menu-active");
                t.triggerEl.classList.add("hover:bg-slate-100", "hover:text-slate-800", 
                "focus:bg-slate-100", "focus:text-slate-800");
                t.triggerEl.firstElementChild.classList.add("text-slate-400", "transition-colors", 
                "group-hover:text-slate-500", "group-focus:text-slate-500");
            })
            target.targetEl.classList.remove("hidden");
            target.targetEl.classList.add("block");
            target.triggerEl.classList.add("bg-[#4f46e5]", "text-white", "menu-active");
            target.triggerEl.classList.remove("hover:bg-slate-100", "hover:text-slate-800", 
            "focus:bg-slate-100", "focus:text-slate-800");
            target.triggerEl.firstElementChild.classList.remove("text-slate-400", "transition-colors", 
            "group-hover:text-slate-500", "group-focus:text-slate-500");
        })
    });
    

    <?php 
        if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
            if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
    ?>

    function resetFormValidator(formId) {
        $(formId).removeData('validator');
        $(formId).removeData('unobtrusiveValidation');
        $.validator.unobtrusive.parse(formId);
    }

    function totalfilas_alertas(){
        var totalrows = 0;
        $.ajax({
            type: "GET",
            url: "../config/totalrows_alertas.php",
            success: function (response) {
                totalrows = response;
                paginacion_alertas(totalrows);
                check_alerts(totalrows);
            }
        });
    }

    function paginacion_alertas(totalrows){
        $('#demo').pagination({
            dataSource: '../config/alertas_ajax.php',
            locator: "items",
            totalNumberLocator: function(response) {
                // you can return totalNumber by analyzing response content
                return totalrows;
            },
            pageSize: 9,
            showNavigator: true,
            formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> de <%= totalNumber %> items',
            showGoInput: true,
            showGoButton: true,
            formatGoInput: 'ir a <%= input %> página',
            ajax: {
                beforeSend: function() {
                    $("#dataContainer").html('Cargando datos ...');
                }
            },
            callback: function(data, pagination) {
                // template method of yourself
                var html = __alertasPreview(data);
                $("#dataContainer").html(html);
            }
        });
    }

    

    function __alertasPreview(data) {
        for (var i = 0, len = data.length; i < len; i++) {
            if(data[i].alertas_foto_identificador != null && data[i].filename_alertas != null){
                data[i]=`<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md">`+
                            `<div class="p-5">`+
                                `<picture><img class="alertas__image mb-2 w-10 h-10" src="../src/alertas/${data[i].alertas_foto_identificador}" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Alertas image"></picture>`+
                                `<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${data[i].titulo_alerta}</h5>`+
                                `<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">Alerta</div>`+
                                `<div class="mb-3 font-normal text-gray-700">Fecha de creación: ${data[i].fecha_creacion_alerta}</div>`+
                                `<button type="button" onclick="viewmore_alerts('${data[i].titulo_alerta}', '${data[i].descripcion_alerta}', '${data[i].nombre}', '${data[i].filename_alertas_archivo}', '${data[i].alertas_archivo_identificador}')" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-600 rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">`+
                                    `Ver más`+
                                    `<svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">`+
                                        `<path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>`+
                                    `</svg>`+
                                `</button>`+
                            `</div>`+
                        `</div>`;
            }else{
                data[i]=`<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md">`+
                            `<div class="p-5">`+
                                `<picture><img class="alertas__image mb-2 w-10 h-10" src="../src/img/default_alert_image.png" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Alertas image"></picture>`+
                                `<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${data[i].titulo_alerta}</h5>`+
                                `<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">Alerta</div>`+
                                `<div class="mb-3 font-normal text-gray-700">Fecha de creación: ${data[i].fecha_creacion_alerta}</div>`+
                                `<button type="button" onclick="viewmore_alerts('${data[i].titulo_alerta}', '${data[i].descripcion_alerta}', '${data[i].nombre}', '${data[i].filename_alertas_archivo}', '${data[i].alertas_archivo_identificador}')" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-600 rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">`+
                                    `Ver más`+
                                    `<svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">`+
                                        `<path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>`+
                                    `</svg>`+
                                `</button>`+
                            `</div>`+
                        `</div>`;
            }
        }
        return data.join("");
    }

    function check_alerts(totalrows){
        if(totalrows == 0){
            $("#demo").attr("style", "display:none;");
        }else{
            $("#demo").removeAttr("style");
        }
    }

    function totalfilas_avisos(){
        var totalrows = 0;
        $.ajax({
            type: "GET",
            url: "../config/totalrows_avisos.php",
            success: function (response) {
                totalrows = response;
                paginacion_avisos(totalrows);
                check_avisos(totalrows);
            }
        });
    }

    function paginacion_avisos(totalrows){
        $('#avisos_demo').pagination({
            dataSource: '../config/avisos_ajax.php',
            locator: "items_avisos",
            totalNumberLocator: function(response) {
                // you can return totalNumber by analyzing response content
                return totalrows;
            },
            pageSize: 9,
            showNavigator: true,
            formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> de <%= totalNumber %> items_avisos',
            showGoInput: true,
            showGoButton: true,
            formatGoInput: 'ir a <%= input %> página',
            ajax: {
                beforeSend: function() {
                    $("#dataContainer_avisos").html('Cargando datos ...');
                }
            },
            callback: function(data, pagination) {
                // template method of yourself
                var html = __avisosPreview(data);
                $("#dataContainer_avisos").html(html);
            }
        });
    }

    function __avisosPreview(data) {
        for (var i = 0, len = data.length; i < len; i++) {
			if(data[i].avisos_foto_identificador != null && data[i].filename_avisos != null){
                data[i]=`<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md">`+
                            `<div class="p-5">`+
								`<picture><img class="avisos__image mb-2 w-10 h-10" src="../src/avisos/${data[i].avisos_foto_identificador}" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Avisos image"></picture>`+
                                `<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${data[i].titulo_aviso}</h5>`+
                                `<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">Aviso</div>`+
                                `<div class="mb-3 font-normal text-gray-700">Fecha de creación: ${data[i].fecha_creacion_aviso}</div>`+
                                `<button type="button" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-600 rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">`+
                                    `Ver más`+
                                    `<svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">`+
                                        `<path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>`+
                                    `</svg>`+
                                `</button>`+
                            `</div>`+
                        `</div>`;
            }else{
                data[i]=`<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md">`+
                            `<div class="p-5">`+
								`<picture><img class="avisos__image mb-2 w-10 h-10" src="../src/img/default_avisos_image.png" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Avisos image"></picture>`+
                                `<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${data[i].titulo_aviso}</h5>`+
                                `<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">Aviso</div>`+
                                `<div class="mb-3 font-normal text-gray-700">Fecha de creación: ${data[i].fecha_creacion_aviso}</div>`+
                                `<button type="button" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-600 rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">`+
                                    `Ver más`+
                                    `<svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">`+
                                        `<path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>`+
                                    `</svg>`+
                                `</button>`+
                            `</div>`+
                        `</div>`;
            }
        }
        return data.join("");
    }

    function check_avisos(totalrows){
        if(totalrows == 0){
            $("#avisos_demo").attr("style", "display:none;");
        }else{
            $("#avisos_demo").removeAttr("style");
        }
    }

    <?php 
            }
        } 
    ?>

    $(document).ready(function () {

        totalfilas_alertas();
        totalfilas_avisos();

        function totalfilas_alertas(){
            var totalrows = 0;
            $.ajax({
                type: "GET",
                url: "../config/totalrows_alertas.php",
                success: function (response) {
                    totalrows = response;
                    paginacion_alertas(totalrows);
                    check_alerts(totalrows);
                }
            });
        }

        function paginacion_alertas(totalrows){
            $('#demo').pagination({
                dataSource: '../config/alertas_ajax.php',
                locator: "items",
                totalNumberLocator: function(response) {
                    // you can return totalNumber by analyzing response content
                    return totalrows;
                },
                pageSize: 9,
                showNavigator: true,
                formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> de <%= totalNumber %> items',
                showGoInput: true,
                showGoButton: true,
                formatGoInput: 'ir a <%= input %> página',
                ajax: {
                    beforeSend: function() {
                        $("#dataContainer").html('Cargando datos ...');
                    }
                },
                callback: function(data, pagination) {
                    // template method of yourself
                    var html = __alertasPreview(data);
                    $("#dataContainer").html(html);
                }
            });
        }

        function __alertasPreview(data) {
            for (var i = 0, len = data.length; i < len; i++) {
                if(data[i].alertas_foto_identificador != null && data[i].filename_alertas != null){
                    data[i]=`<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md">`+
                                `<div class="p-5">`+
                                    `<picture><img class="alertas__image mb-2 w-10 h-10" src="../src/alertas/${data[i].alertas_foto_identificador}" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Alertas image"></picture>`+
                                    `<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${data[i].titulo_alerta}</h5>`+
                                    `<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">Alerta</div>`+
                                    `<div class="mb-3 font-normal text-gray-700">Fecha de creación: ${data[i].fecha_creacion_alerta}</div>`+
                                    `<button type="button" onclick="viewmore_alerts('${data[i].titulo_alerta}', '${data[i].descripcion_alerta}', '${data[i].nombre}', '${data[i].filename_alertas_archivo}', '${data[i].alertas_archivo_identificador}')" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-600 rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">`+
                                        `Ver más`+
                                        `<svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">`+
                                            `<path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>`+
                                        `</svg>`+
                                    `</button>`+
                                `</div>`+
                            `</div>`;
                }else{
                    data[i]=`<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md">`+
                                `<div class="p-5">`+
                                    `<picture><img class="alertas__image mb-2 w-10 h-10" src="../src/img/default_alert_image.png" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Alertas image"></picture>`+
                                    `<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${data[i].titulo_alerta}</h5>`+
                                    `<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">Alerta</div>`+
                                    `<div class="mb-3 font-normal text-gray-700">Fecha de creación: ${data[i].fecha_creacion_alerta}</div>`+
                                    `<button type="button" onclick="viewmore_alerts('${data[i].titulo_alerta}', '${data[i].descripcion_alerta}', '${data[i].nombre}', '${data[i].filename_alertas_archivo}', '${data[i].alertas_archivo_identificador}')" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-600 rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">`+
                                        `Ver más`+
                                        `<svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">`+
                                            `<path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>`+
                                        `</svg>`+
                                    `</button>`+
                                `</div>`+
                            `</div>`;
                }
            }
            return data.join("");
        }

        function check_alerts(totalrows){
            if(totalrows == 0){
                $("#demo").attr("style", "display:none;");
            }else{
                $("#demo").removeAttr("style");
            }
        }

        function totalfilas_avisos(){
            var totalrows = 0;
            $.ajax({
                type: "GET",
                url: "../config/totalrows_avisos.php",
                success: function (response) {
                    totalrows = response;
                    paginacion_avisos(totalrows);
                    check_avisos(totalrows);
                }
            });
        }

        function paginacion_avisos(totalrows){
            $('#avisos_demo').pagination({
                dataSource: '../config/avisos_ajax.php',
                locator: "items_avisos",
                totalNumberLocator: function(response) {
                    // you can return totalNumber by analyzing response content
                    return totalrows;
                },
                pageSize: 9,
                showNavigator: true,
                formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> de <%= totalNumber %> items_avisos',
                showGoInput: true,
                showGoButton: true,
                formatGoInput: 'ir a <%= input %> página',
                ajax: {
                    beforeSend: function() {
                        $("#dataContainer_avisos").html('Cargando datos ...');
                    }
                },
                callback: function(data, pagination) {
                    // template method of yourself
                    var html = __avisosPreview(data);
                    $("#dataContainer_avisos").html(html);
                }
            });
        }

        function __avisosPreview(data) {
            for (var i = 0, len = data.length; i < len; i++) {
                if(data[i].avisos_foto_identificador != null && data[i].filename_avisos != null){
                    data[i]=`<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md">`+
                                `<div class="p-5">`+
                                    `<picture><img class="avisos__image mb-2 w-10 h-10" src="../src/avisos/${data[i].avisos_foto_identificador}" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Avisos image"></picture>`+
                                    `<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${data[i].titulo_aviso}</h5>`+
                                    `<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">Aviso</div>`+
                                    `<div class="mb-3 font-normal text-gray-700">Fecha de creación: ${data[i].fecha_creacion_aviso}</div>`+
                                    `<button type="button" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-600 rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">`+
                                        `Ver más`+
                                        `<svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">`+
                                            `<path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>`+
                                        `</svg>`+
                                    `</button>`+
                                `</div>`+
                            `</div>`;
                }else{
                    data[i]=`<div class="max-w-xl bg-white rounded-lg border border-gray-200 shadow-md">`+
                                `<div class="p-5">`+
                                    `<picture><img class="avisos__image mb-2 w-10 h-10" src="../src/img/default_avisos_image.png" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Avisos image"></picture>`+
                                    `<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">${data[i].titulo_aviso}</h5>`+
                                    `<div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">Aviso</div>`+
                                    `<div class="mb-3 font-normal text-gray-700">Fecha de creación: ${data[i].fecha_creacion_aviso}</div>`+
                                    `<button type="button" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-600 rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">`+
                                        `Ver más`+
                                        `<svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">`+
                                            `<path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>`+
                                        `</svg>`+
                                    `</button>`+
                                `</div>`+
                            `</div>`;
                }
            }
            return data.join("");
        }

        function check_avisos(totalrows){
            if(totalrows == 0){
                $("#avisos_demo").attr("style", "display:none;");
            }else{
                $("#avisos_demo").removeAttr("style");
            }
        }

        <?php 
            if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
                if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
        ?>

        $(document).on("click", "tr .Editar", function () {
            var table = $('#alertas_table').DataTable();
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
            $('.modal-wrapper-flex').html(
                '<div class="flex-col gap-3 items-center flex sm:flex-row">'+
                    '<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">'+
                        '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                            '<path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />'+
                        '</svg>'+
                    '</div>'+
                    '<h3 class="text-lg font-medium text-gray-900"> Editar una alerta</h3>'+
                '</div>'+
                '<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left overflow-y-scroll h-[21.875rem] sm:h-full md:overflow-y-hidden">'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">'+
                            'Título de la alerta'+
                        '</label>'+
                        '<div class="group flex">'+
                            '<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">'+
                                '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                    '<path d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />'+
                                '</svg>'+
                            '</div>'+
                            '<input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="editar_titulo_alerta" name="editar_titulo_alerta" value="'+data['titulo_alerta']+'" placeholder="Título de la alerta">'+
                        '</div>'+
                    '</div>'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">Descripción de la alerta</label>'+
                        '<textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="editar_descripcion_alerta" name="editar_descripcion_alerta" placeholder="Descripción de la alerta">'+data['descripcion_alerta']+'</textarea>'+
                        '<div id="error_editar_descripcion_alerta"></div>'+
                    '</div>'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">Subir imagen para la alerta</label>'+
                        '<div class="flex items-center justify-center w-full">'+
                            '<label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">'+
                                '<div id="editar_img_information" class="flex flex-col items-center justify-center pt-7">'+
                                    '<div id="editar_svg">'+
                                        '<svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">'+
                                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>'+
                                        '</svg>'+
                                    '</div>'+
                                    '<img id="editar_preview" class="hidden">'+
                                    '<p id="editar_archivo" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona una fotografía</p>'+
                                '</div>'+
                                '<input type="file" id="editar_foto" name="editar_foto" class="hidden">'+
                            '</label>'+
                        '</div>'+
                        '<div id="error_editar_foto" class="m-auto"></div>'+
                    '</div>'+
                    '<div id="div_editar_foto" class="hidden">'+
                        '<div id="div_editar_actions_foto" class="flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">'+
                            '<button type="button" id="editar_delete_foto" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">'+
                                '<svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">'+
                                    '<path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />'+
                                '</svg>'+
                                'Eliminar'+
                            '</button>'+
                        '</div>'+
                    '</div>'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">Subir archivo para la alerta</label>'+
                        '<div class="flex items-center justify-center w-full">'+
                            '<label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">'+
                                '<div id="editar_archivo_alerta_information" class="flex flex-col items-center justify-center pt-7">'+
                                    '<div id="editar_svg_archivo_alerta">'+
										'<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" viewBox="0 0 24 24">'+
											'<path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"></path>'+
										'</svg>'+
                                    '</div>'+
                                    '<img id="editar_preview_archivo_alerta" class="hidden">'+
                                    '<p id="editar_text_archivo_alerta" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona un archivo</p>'+
                                '</div>'+
                                '<input type="file" id="editar_archivo_alerta" name="editar_archivo_alerta" class="hidden">'+
                            '</label>'+
                        '</div>'+
                        '<div id="error_editar_archivo_alerta" class="m-auto"></div>'+
                    '</div>'+
                    '<div id="div_editar_archivo_alerta" class="hidden">'+
                        '<div id="div_editar_actions_archivo_alerta" class="flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">'+
                            '<button type="button" id="delete_editar_archivo_alerta" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">'+
                                '<svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">'+
                                    '<path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />'+
                                '</svg>'+
                                'Eliminar'+
                            '</button>'+
                        '</div>'+
                    '</div>'+
                '</div>');
                $('.modal-actions').html(
                    '<div id="submit-changes">'+
                        '<button id="editar-alerta" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar</button>'+
                    '</div>'+
                    '<div id="disable-close-submit">'+
                        '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                    '</div>');
            originalState = $("#editar_img_information").clone();
            originalState2 = $("#editar_archivo_alerta_information").clone();
            delete_switch = "false";
            delete_switch2 = "false";
            if(data["alertas_foto_identificador"] != null && data["filename_alertas"] != null){
                if (window.FileReader && window.Blob) {
                    console.log('FileReader ó Blob es compatible con este navegador.');
                    $('#editar_svg').addClass("hidden");
                    checkImage("../src/alertas/"+data['alertas_foto_identificador']+"", function(){ $('#editar_preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/alertas/'+data["alertas_foto_identificador"]+''); $('#editar_archivo').text(data["filename_alertas"]); }, function(){ $('#editar_preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/not_found.jpg'); $('#editar_archivo').text("No se encontró la imagen"); } );
                }else{
                    console.error('FileReader ó Blob no es compatible con este navegador.');
                    checkImage("../src/alertas/"+data['alertas_foto_identificador']+"", function(){ $('#editar_archivo').text(data["filename_alertas"]); }, function(){ $('#editar_archivo').text("No se encontró la imagen"); } );
                }	
                $("#div_editar_foto").removeClass("hidden");
            }
            if(data["alertas_archivo_identificador"] != null && data["filename_alertas_archivo"] != null){
                var url= "../src/alertas_archivo/"+data['alertas_archivo_identificador']+"";
                var filename = data['filename_alertas_archivo'];
                if (window.FileReader && window.Blob) {
                    console.log('FileReader ó Blob es compatible con este navegador.');
                    $('#editar_svg_archivo_alerta').addClass("hidden");
                    if(checkFile(url)){
                        var ext = filename.split('.').pop();
                        if(ext == "jpg" || ext == "jpeg" || ext == "png"){
                            $('#editar_preview_archivo_alerta').removeClass("hidden").addClass('w-10 h-10').attr('src', url); 
                            $('#editar_text_archivo_alerta').text(filename);
                        }else if(ext == "pdf"){
                            $('#editar_preview_archivo_alerta').removeClass("hidden").addClass('w-10 h-10').attr('src', "../src/img/pdf.png"); 
                            $('#editar_text_archivo_alerta').text(filename);
                        }
                    }else{
                        $('#editar_preview_archivo_alerta').removeClass("hidden").addClass('w-10 h-10').attr('src', "../src/img/not_found.jpg"); 
                        $('#editar_text_archivo_alerta').text("No se encontró el archivo");
                    }
                }else{
                    console.error('FileReader ó Blob no es compatible con este navegador.');
                    if(checkFile(url)){
                        $('#editar_text_archivo_alerta').text(data["filename_alertas_archivo"]);
                    }else{
                        $('#editar_text_archivo_alerta').text("No se encontró el archivo");
                    }
                }
                $("#div_editar_archivo_alerta").removeClass("hidden");
            }
            openModal();
            resetFormValidator("#Guardar");
            $('#Guardar').unbind('submit');
            $.validator.addMethod('biggertext', function (value, element) {
                return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
            }, 'not a valid biggertext.');
            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1048576)
            }, 'File size must be less than {0} MB');
            if ($('#Guardar').length > 0) {
                $('#Guardar').validate({
                    ignore: [],
                    onkeyup: false,
                    errorPlacement: function(error, element) {
                        if((element.attr('name') === 'editar_foto')){
                            error.appendTo("div#error_editar_foto");
                        }else if((element.attr('name') === 'editar_archivo_alerta')){
                            error.appendTo("div#error_editar_archivo_alerta");
                        }else if(element.attr('name') === 'editar_descripcion_alerta'){
                            error.appendTo("div#error_editar_descripcion_alerta"); 
                        }else{
                            error.insertAfter(element.parent('.group.flex'));
                        }
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
                        editar_titulo_alerta: {
                            required: true,
                            biggertext: true
                        },
                        editar_descripcion_alerta: {
                            required: true,
                            biggertext: true
                        },
                        editar_foto: {
                            extension: "jpg|jpeg|png",
                            filesize: 10
                        },
                        editar_archivo_alerta: {
                            extension: "pdf|jpg|jpeg|png",
                            filesize: 10
                        }
                    },
                    messages: {
                        editar_titulo_alerta: {
                            required: 'Este campo es requerido',
                            biggertext: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                        },
                        editar_descripcion_alerta: {
                            required: 'Este campo es requerido',
                            biggertext: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                        },
                        editar_foto: {
                            extension: 'Solo se permite jpg, jpeg y pngs',
                            filesize: 'Las imágenes deben pesar ser menos de 10 MB'
                        },
                        editar_archivo_alerta: {
                            extension: 'Solo se permite pdf, jpg, jpeg y pngs',
                            filesize: 'Los archivos deben pesar ser menos de 10 MB'
                        }
                    },
                    submitHandler: function(form) {
                        $('#submit-changes').html(
                            '<button disabled type="button" class="button w-full inline-flex items-center justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">'+
                                '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                                '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                                '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                                '</svg>'+
                                'Cargando...'+
                            '</button>');
                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                            check_user_logged().then((response) => {
                                if(response == "true"){
                                    window.addEventListener('beforeunload', unloadHandler);
                                    /*EMPIEZA EL AJAX*/
                                    var fd = new FormData();
                                    var titulo_alerta = $("#editar_titulo_alerta").val();
                                    var descripcion_alerta = $("#editar_descripcion_alerta").val();
                                    var foto = $('#editar_foto')[0].files[0];
                                    var archivo_alerta = $('#editar_archivo_alerta')[0].files[0];
                                    var id = data["id"];
                                    var method = "edit";
                                    var app = "alertas";
                                    fd.append('titulo_alerta', titulo_alerta);
                                    fd.append('descripcion_alerta', descripcion_alerta);
                                    fd.append('foto', foto);
                                    fd.append('archivo_alerta', archivo_alerta);
                                    fd.append('id', id);
                                    fd.append('delete', delete_switch);
                                    fd.append('delete2', delete_switch2);
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
                                                        title: "Alerta Editada",
                                                        text: array[1],
                                                        icon: "success"
                                                    }).then(function() {
                                                        var table = $('#alertas_table').DataTable();
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-changes').html('<button disabled id="editar-alerta" type="submit" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar</button>');
                                                        $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        table.ajax.reload();
                                                        totalfilas_alertas();
                                                        closeModal();
                                                    });
                                                } else if(array[0] == "error") {
                                                    Swal.fire({
                                                        title: "Error",
                                                        text: array[1],
                                                        icon: "error"
                                                    }).then(function() {
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-changes').html('<button id="editar-alerta" type="submit" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar</button>');
                                                        $('#disable-close-submit').html("<button id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                    });
                                                } else if (array[0] == "alert_not_found") {
                                                    Swal.fire({
                                                        title: "Alerta inexistente!",
                                                        text: array[1],
                                                        icon: "error"
                                                    }).then(function() {
                                                        var table = $('#alertas_table').DataTable();
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-changes').html('<button disabled id="editar-alerta" type="submit" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar</button>');
                                                        $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        table.ajax.reload();
                                                        totalfilas_alertas();
                                                        closeModal();
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
                                        window.removeEventListener('beforeunload', unloadHandler);
                                        $('#submit-changes').html('<button disabled id="editar-alerta" type="submit" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar</button>');
                                        $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
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
        });

        function checkFile(url) {
            var response = jQuery.ajax({
                url: url,
                type: 'HEAD',
                async: false
            }).status;	
            
            return (response != "200") ? false : true;
        }

        $(document).on('click', 'tr .Eliminar', function() {
            var table = $('#alertas_table').DataTable();
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
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podras recuperar la información!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí!',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                check_user_logged().then((response) => {
                    if(response == "true"){
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'éxito',
                                text: 'La fila ha sido eliminada!'
                            }).then(function() {
                                var eliminarid = data["id"];
                                var fd = new FormData();
                                fd.append('id', eliminarid);
                                $.ajax({
                                    url: "../ajax/eliminar/tabla_alertas/eliminaralerta.php",
                                    type: "post",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(result) {
                                        table.ajax.reload();
                                        totalfilas_alertas();
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

        function checkImage(imageSrc, good, bad) {
            var img = new Image();
            img.onload = good; 
            img.onerror = bad;
            img.src = imageSrc;
        }

        $(document).on('click', '#editar_delete_foto', function() {
            $("#editar_img_information").replaceWith(originalState.clone());
            $("#editar_foto").val("");
            $("#div_editar_foto").addClass("hidden");
            delete_switch = "true";
        });

        var editar_file_foto;

        $(document).on('click', '#editar_foto', function() {
			editar_file_foto = $("#editar_foto").clone();
		});

        $(document).on('change', '#editar_foto', function () {
			if (window.FileReader && window.Blob) {
				var files = $('input#editar_foto').get(0).files;
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
							$('#editar_preview').addClass('hidden');
							$('#editar_svg').removeClass('hidden');
							$('#editar_archivo').text("El archivo " +file.name+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
							$("#div_editar_foto").removeClass("hidden");
						} else {
							console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
							if(file.size > 10485760){
								$('#editar_preview').addClass('hidden');
								$('#editar_svg').removeClass('hidden');
								$('#editar_archivo').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
								$("#div_editar_foto").removeClass("hidden");
							}else{
								$('#editar_preview').removeClass('hidden');
								$('#editar_preview').addClass('w-10 h-10');
								$('#editar_svg').addClass('hidden');
								$('#editar_archivo').text(file.name);
								$("#div_editar_foto").removeClass("hidden");
								delete_switch="false";
								let reader = new FileReader();
								reader.onload = function (event) {
									$('#editar_preview').attr('src', event.target.result);
								}
								reader.readAsDataURL(file);
							}
						}
					};
					fileReader.readAsArrayBuffer(file.slice(0, 4));
				}else{
                    $("#editar_foto").replaceWith(editar_file_foto.clone());
                }
			} else {
				console.error('FileReader ó Blob no es compatible con este navegador.');
				if($("#editar_foto").val() != ''){
					var file = this.files[0].name;
					var lastDot = file.lastIndexOf('.');
					var extension = file.substring(lastDot + 1);
					if(extension == "jpeg" || extension == "jpg" || extension == "png") {
						if(this.files[0].size > 10485760){
							$('#editar_archivo').text("El archivo " +file+ " debe pesar menos 10 MB.");
							$("#div_editar_foto").removeClass("hidden");
						}else{
							$('#editar_archivo').text(file);
							$("#div_editar_foto").removeClass("hidden");
							delete_switch="false";
						}
					}else{
						$('#editar_archivo').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
						$("#div_editar_foto").removeClass("hidden");
					}
				}
			}
		});

        $(document).on('keypress', 'form#Guardar input[type="text"]', function(e) {
            return e.which !== 13;
        });

        var file_foto;


        $(document).on('click', '#delete_foto', function() {
            $("#img_information").replaceWith(originalState.clone());
            $("#foto").val("");
            $("#div_foto").addClass("hidden");
        });

        $(document).on('click', '#foto', function() {
			file_foto = $("#foto").clone();
		});

        $(document).on('change', '#foto', function () {
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
                            $("#div_foto").removeClass("hidden");
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#preview').addClass('hidden');
                                $('#svg').removeClass('hidden');
                                $('#archivo').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
                                $("#div_foto").removeClass("hidden");
                            }else{
                                $('#preview').removeClass('hidden');
                                $('#preview').addClass('w-10 h-10');
                                $('#svg').addClass('hidden');
                                $('#archivo').text(file.name);
                                $("#div_foto").removeClass("hidden");
                                let reader = new FileReader();
                                reader.onload = function (event) {
                                    $('#preview').attr('src', event.target.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#foto").replaceWith(file_foto.clone());
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
                            $("#div_foto").removeClass("hidden");
                        }else{
                            $('#archivo').text(file);
                            $("#div_foto").removeClass("hidden");
                        }
                    }else{
                        $('#archivo').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
                        $("#div_foto").removeClass("hidden");
                    }
                }
            }
        });

        var file_archivo_alerta;

        $(document).on('click', '#delete_archivo_alerta', function() {
            $("#archivo_alerta_information").replaceWith(originalState2.clone());
            $("#archivo_alerta").val("");
            $("#div_archivo_alerta").addClass("hidden");
        });

        $(document).on('click', '#archivo_alerta', function() {
            file_archivo_alerta = $("#archivo_alerta").clone();
        });

        $(document).on('change', '#archivo_alerta', function () {
            if (window.FileReader && window.Blob) {
                var files = $('input#archivo_alerta').get(0).files;
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
                            case '25504446':
                                type = 'application/pdf';
                                break;
                        }
                        if (file.type !== type) {
                            console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
                            $('#preview_archivo_alerta').addClass('hidden');
                            $('#svg_archivo_alerta').removeClass('hidden');
                            $('#text_archivo_alerta').text("El archivo " +file.name+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
                            $("#div_archivo_alerta").removeClass("hidden");
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#preview_archivo_alerta').addClass('hidden');
                                $('#svg_archivo_alerta').removeClass('hidden');
                                $('#text_archivo_alerta').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
                                $("#div_archivo_alerta").removeClass("hidden");
                            }else{
                                $('#preview_archivo_alerta').removeClass('hidden');
                                $('#preview_archivo_alerta').addClass('w-10 h-10');
                                $('#svg_archivo_alerta').addClass('hidden');
                                $('#text_archivo_alerta').text(file.name);
                                $("#div_archivo_alerta").removeClass("hidden");
                                if (file.type == "image/png" || file.type == "image/jpeg") {
                                    let reader = new FileReader();
                                    reader.onload = function (event) {
                                        $('#preview_archivo_alerta').attr('src', event.target.result);
                                    }
                                    reader.readAsDataURL(file);
                                }else if(file.type == "application/pdf"){
                                    $('#preview_archivo_alerta').attr('src', "../src/img/pdf.png");
                                }
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#archivo_alerta").replaceWith(file_archivo_alerta.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if($("#archivo_alerta").val() != ''){
                    var file = this.files[0].name;
                    var lastDot = file.lastIndexOf('.');
                    var extension = file.substring(lastDot + 1);
                    if(extension == "pdf" || extension == "jpeg" || extension == "jpg" || extension == "png") {
                        if(this.files[0].size > 10485760){
                            $('#text_archivo_alerta').text("El archivo " +file+ " debe pesar menos 10 MB.");
                            $("#div_archivo_alerta").removeClass("hidden");
                        }else{
                            $('#text_archivo_alerta').text(file);
                            $("#div_archivo_alerta").removeClass("hidden");
                        }
                    }else{
                        $('#text_archivo_alerta').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
                        $("#div_archivo_alerta").removeClass("hidden");
                    }
                }
            }
        });

        $(document).on('click', '#delete_editar_archivo_alerta', function() {
            $("#editar_archivo_alerta_information").replaceWith(originalState2.clone());
            $("#editar_archivo_alerta").val("");
            $("#div_editar_archivo_alerta").addClass("hidden");
            delete_switch2 = "true";
        });

        var editar_archivo_alerta;

        $(document).on('click', '#editar_archivo_alerta', function() {
            editar_archivo_alerta = $("#editar_archivo_alerta").clone();
        });

        $(document).on('change', '#editar_archivo_alerta', function () {
            if (window.FileReader && window.Blob) {
                var files = $('input#editar_archivo_alerta').get(0).files;
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
                            case '25504446':
                                type = 'application/pdf';
                                break;
                        }
                        if (file.type !== type) {
                            console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
                            $('#editar_preview_archivo_alerta').addClass('hidden');
                            $('#editar_svg_archivo_alerta').removeClass('hidden');
                            $('#editar_text_archivo_alerta').text("El archivo " +file.name+ " no es un archivo permitido ó tiene la extensión incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
                            $("#div_editar_archivo_alerta").removeClass("hidden");
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#editar_preview_archivo_alerta').addClass('hidden');
                                $('#editar_svg_archivo_alerta').removeClass('hidden');
                                $('#editar_text_archivo_alerta').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
                                $("#div_editar_archivo_alerta").removeClass("hidden");
                            }else{
                                $('#editar_preview_archivo_alerta').removeClass('hidden');
                                $('#editar_preview_archivo_alerta').addClass('w-10 h-10');
                                $('#editar_svg_archivo_alerta').addClass('hidden');
                                $('#editar_text_archivo_alerta').text(file.name);
                                $("#div_editar_archivo_alerta").removeClass("hidden");
                                delete_switch2="false";
                                if (file.type == "image/png" || file.type == "image/jpeg") {
                                    let reader = new FileReader();
                                    reader.onload = function (event) {
                                        $('#editar_preview_archivo_alerta').attr('src', event.target.result);
                                    }
                                    reader.readAsDataURL(file);
                                }else if(file.type == "application/pdf"){
                                    $('#editar_preview_archivo_alerta').attr('src', "../src/img/pdf.png");
                                }
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#editar_archivo_alerta").replaceWith(editar_archivo_alerta.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if($("#editar_archivo_alerta").val() != ''){
                    var file = this.files[0].name;
                    var lastDot = file.lastIndexOf('.');
                    var extension = file.substring(lastDot + 1);
                    if(extension == "jpeg" || extension == "jpg" || extension == "png") {
                        if(this.files[0].size > 10485760){
                            $('#editar_text_archivo_alerta').text("El archivo " +file+ " debe pesar menos 10 MB.");
                            $("#div_editar_archivo_alerta").removeClass("hidden");
                        }else{
                            $('#editar_text_archivo_alerta').text(file);
                            $("#div_editar_archivo_alerta").removeClass("hidden");
                            delete_switch2="false";
                        }
                    }else{
                        $('#editar_text_archivo_alerta').text("El archivo " +file+ " no es un archivo permitido ó tiene la extensión incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
                        $("#div_editar_archivo_alerta").removeClass("hidden");
                    }
                }
            }
        });

        var file_foto_avisos;


        $(document).on('click', '#delete_foto_aviso', function() {
            $("#img_information_aviso").replaceWith(originalState.clone());
            $("#foto_aviso").val("");
            $("#div_foto_aviso").addClass("hidden");
        });

        $(document).on('click', '#foto_aviso', function() {
			file_foto_avisos = $("#foto_aviso").clone();
		});

        $(document).on('change', '#foto_aviso', function () {
            if (window.FileReader && window.Blob) {
                var files = $('input#foto_aviso').get(0).files;
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
                            $('#preview_aviso').addClass('hidden');
                            $('#svg_aviso').removeClass('hidden');
                            $('#archivo_aviso').text("El archivo " +file.name+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
                            $("#div_foto_aviso").removeClass("hidden");
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#preview_aviso').addClass('hidden');
                                $('#svg_aviso').removeClass('hidden');
                                $('#archivo_aviso').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
                                $("#div_foto_aviso").removeClass("hidden");
                            }else{
                                $('#preview_aviso').removeClass('hidden');
                                $('#preview_aviso').addClass('w-10 h-10');
                                $('#svg_aviso').addClass('hidden');
                                $('#archivo_aviso').text(file.name);
                                $("#div_foto_aviso").removeClass("hidden");
                                let reader = new FileReader();
                                reader.onload = function (event) {
                                    $('#preview_aviso').attr('src', event.target.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#foto_aviso").replaceWith(file_foto_avisos.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if($("#foto_aviso").val() != ''){
                    var file = this.files[0].name;
                    var lastDot = file.lastIndexOf('.');
                    var extension = file.substring(lastDot + 1);
                    if(extension == "jpeg" || extension == "jpg" || extension == "png") {
                        if(this.files[0].size > 10485760){
                            $('#archivo_aviso').text("El archivo " +file+ " debe pesar menos 10 MB.");
                            $("#div_foto_aviso").removeClass("hidden");
                        }else{
                            $('#archivo_aviso').text(file);
                            $("#div_foto_aviso").removeClass("hidden");
                        }
                    }else{
                        $('#archivo_aviso').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
                        $("#div_foto_aviso").removeClass("hidden");
                    }
                }
            }
        });

        var archivo_file_aviso;

        $(document).on('click', '#delete_archivo_file_aviso', function() {
            $("#archivo_file_aviso_information").replaceWith(originalState2.clone());
            $("#archivo_file_aviso").val("");
            $("#div_archivo_file_aviso").addClass("hidden");
        });

        $(document).on('click', '#archivo_file_aviso', function() {
            archivo_file_aviso = $("#archivo_file_aviso").clone();
        });

        $(document).on('change', '#archivo_file_aviso', function () {
            if (window.FileReader && window.Blob) {
                var files = $('input#archivo_file_aviso').get(0).files;
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
                            case '25504446':
                                type = 'application/pdf';
                                break;
                        }
                        if (file.type !== type) {
                            console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
                            $('#preview_archivo_file_aviso').addClass('hidden');
                            $('#svg_archivo_file_aviso').removeClass('hidden');
                            $('#text_archivo_file_aviso').text("El archivo " +file.name+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
                            $("#div_archivo_file_aviso").removeClass("hidden");
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#preview_archivo_file_aviso').addClass('hidden');
                                $('#svg_archivo_file_aviso').removeClass('hidden');
                                $('#text_archivo_file_aviso').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
                                $("#div_archivo_file_aviso").removeClass("hidden");
                            }else{
                                $('#preview_archivo_file_aviso').removeClass('hidden');
                                $('#preview_archivo_file_aviso').addClass('w-10 h-10');
                                $('#svg_archivo_file_aviso').addClass('hidden');
                                $('#text_archivo_file_aviso').text(file.name);
                                $("#div_archivo_file_aviso").removeClass("hidden");
                                if (file.type == "image/png" || file.type == "image/jpeg") {
                                    let reader = new FileReader();
                                    reader.onload = function (event) {
                                        $('#preview_archivo_file_aviso').attr('src', event.target.result);
                                    }
                                    reader.readAsDataURL(file);
                                }else if(file.type == "application/pdf"){
                                    $('#preview_archivo_file_aviso').attr('src', "../src/img/pdf.png");
                                }
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#archivo_file_aviso").replaceWith(archivo_file_aviso.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if($("#archivo_file_aviso").val() != ''){
                    var file = this.files[0].name;
                    var lastDot = file.lastIndexOf('.');
                    var extension = file.substring(lastDot + 1);
                    if(extension == "pdf" || extension == "jpeg" || extension == "jpg" || extension == "png") {
                        if(this.files[0].size > 10485760){
                            $('#text_archivo_file_aviso').text("El archivo " +file+ " debe pesar menos 10 MB.");
                            $("#div_archivo_file_aviso").removeClass("hidden");
                        }else{
                            $('#text_archivo_file_aviso').text(file);
                            $("#div_archivo_file_aviso").removeClass("hidden");
                        }
                    }else{
                        $('#text_archivo_file_aviso').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
                        $("#div_archivo_file_aviso").removeClass("hidden");
                    }
                }
            }
        });

        $(document).on("click", "tr .Editar_Aviso", function () {
            var table = $('#avisos_table').DataTable();
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
            $('.modal-wrapper-flex').html(
                '<div class="flex-col gap-3 items-center flex sm:flex-row">'+
                    '<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">'+
                        '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20.1L20 10.1V8L14 2H6M13 3.5L18.5 9H13V3.5M20.1 13C20 13 19.8 13.1 19.7 13.2L18.7 14.2L20.8 16.3L21.8 15.3C22 15.1 22 14.7 21.8 14.5L20.5 13.2C20.4 13.1 20.3 13 20.1 13M18.1 14.8L12 20.9V23H14.1L20.2 16.9L18.1 14.8Z" /></svg>'+
                    '</div>'+
                    '<h3 class="text-lg font-medium text-gray-900"> Editar un aviso</h3>'+
                '</div>'+
                '<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left overflow-y-scroll h-[21.875rem] sm:h-full md:overflow-y-hidden">'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">'+
                            'Título del aviso'+
                        '</label>'+
                        '<div class="group flex">'+
                            '<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">'+
                                '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                    '<path d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />'+
                                '</svg>'+
                            '</div>'+
                            '<input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="editar_titulo_aviso" name="editar_titulo_aviso" value="'+data['titulo_aviso']+'" placeholder="Título del aviso">'+
                        '</div>'+
                    '</div>'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">Descripción del aviso</label>'+
                        '<textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="editar_descripcion_aviso" name="editar_descripcion_aviso" placeholder="Descripción del aviso">'+data['descripcion_aviso']+'</textarea>'+
                        '<div id="error_editar_descripcion_aviso"></div>'+
                    '</div>'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">Subir imagen para la alerta</label>'+
                        '<div class="flex items-center justify-center w-full">'+
                            '<label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">'+
                                '<div id="img_editar_information_aviso" class="flex flex-col items-center justify-center pt-7">'+
                                    '<div id="editar_svg_aviso">'+
                                        '<svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">'+
                                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>'+
                                        '</svg>'+
                                    '</div>'+
                                    '<img id="editar_preview_aviso" class="hidden">'+
                                    '<p id="editar_archivo_aviso" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona una fotografía</p>'+
                                '</div>'+
                                '<input type="file" id="editar_foto_aviso" name="editar_foto_aviso" class="hidden">'+
                            '</label>'+
                        '</div>'+
                        '<div id="error_editar_aviso" class="m-auto"></div>'+
                    '</div>'+
                    '<div id="div_editar_foto_aviso" class="hidden">'+
                        '<div id="div_editar_actions_foto_aviso" class="flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">'+
                            '<button type="button" id="delete_editar_foto_aviso" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">'+
                                '<svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">'+
                                    '<path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />'+
                                '</svg>'+
                                'Eliminar'+
                            '</button>'+
                        '</div>'+
                    '</div>'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">Subir archivo para la aviso</label>'+
                        '<div class="flex items-center justify-center w-full">'+
                            '<label class="flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group">'+
                                '<div id="editar_archivo_file_aviso_information" class="flex flex-col items-center justify-center pt-7">'+
                                    '<div id="svg_editar_archivo_file_aviso">'+
                                        '<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400" viewBox="0 0 24 24">'+
                                            '<path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"></path>'+
                                        '</svg>'+
                                    '</div>'+
                                    '<img id="preview_editar_archivo_file_aviso" class="hidden">'+
                                    '<p id="text_editar_archivo_file_aviso" style="word-break:break-word;" class="lowercase text-center text-sm text-gray-400 group-hover:text-black pt-1 tracking-wider">Selecciona un archivo</p>'+
                                '</div>'+
                                '<input type="file" id="editar_archivo_file_aviso" name="editar_archivo_file_aviso" class="hidden">'+
                            '</label>'+
                        '</div>'+
                        '<div id="error_editar_archivo_file_aviso" class="m-auto"></div>'+
                    '</div>'+
                    '<div id="div_editar_archivo_file_aviso" class="hidden">'+
                        '<div id="div_actions_editar_archivo_file_aviso" class="flex flex-col md:flex-row justify-center mt-5 mx-7 gap-3">'+
                            '<button type="button" id="delete_editar_archivo_file_aviso" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-2 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex flex-col md:flex-row items-center gap-3">'+
                                '<svg style="width:24px;height:24px" class="hidden md:block" viewBox="0 0 24 24">'+
                                    '<path fill="currentColor" d="M22.54 21.12L20.41 19L22.54 16.88L21.12 15.46L19 17.59L16.88 15.46L15.46 16.88L17.59 19L15.46 21.12L16.88 22.54L19 20.41L21.12 22.54M6 2C4.89 2 4 2.9 4 4V20C4 21.11 4.89 22 6 22H13.81C13.45 21.38 13.2 20.7 13.08 20H6V4H13V9H18V13.08C18.33 13.03 18.67 13 19 13C19.34 13 19.67 13.03 20 13.08V8L14 2M8 12V14H16V12M8 16V18H13V16Z" />'+
                                '</svg>'+
                                'Eliminar'+
                            '</button>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            $('.modal-actions').html(
                '<div id="submit-editar-changes-aviso">'+
                    '<button id="editar-aviso" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar</button>'+
                '</div>'+
                '<div id="disable-editar-close-submit-aviso">'+
                    '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                '</div>');
            originalState = $("#img_editar_information_aviso").clone();
            originalState2 = $("#editar_archivo_alerta_information").clone();
            delete_switch = "false";
            delete_switch2 = "false";
            if(data["avisos_foto_identificador"] != null && data["filename_avisos"] != null){
                if (window.FileReader && window.Blob) {
                    console.log('FileReader ó Blob es compatible con este navegador.');
                    $('#editar_svg_aviso').addClass("hidden");
                    checkImage("../src/avisos/"+data['avisos_foto_identificador']+"", function(){ $('#editar_preview_aviso').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/avisos/'+data["avisos_foto_identificador"]+''); $('#editar_archivo_aviso').text(data["filename_avisos"]); }, function(){ $('#editar_preview_aviso').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/not_found.jpg'); $('#editar_archivo_aviso').text("No se encontró la imagen"); } );
                }else{
                    console.error('FileReader ó Blob no es compatible con este navegador.');
                    checkImage("../src/avisos/"+data['avisos_foto_identificador']+"", function(){ $('#editar_archivo_aviso').text(data["filename_avisos"]); }, function(){ $('#editar_archivo_aviso').text("No se encontró la imagen"); } );
                }	
                $("#div_editar_foto_aviso").removeClass("hidden");
            }
            if(data["aviso_archivo_identificador"] != null && data["filename_archivo_aviso"] != null){
                var url= "../src/avisos_archivo/"+data['aviso_archivo_identificador']+"";
                var filename = data['filename_archivo_aviso'];
                if (window.FileReader && window.Blob) {
                    console.log('FileReader ó Blob es compatible con este navegador.');
                    $('#svg_editar_archivo_file_aviso').addClass("hidden");
                    if(checkFile(url)){
                        var ext = filename.split('.').pop();
                        if(ext == "jpg" || ext == "jpeg" || ext == "png"){
                            $('#preview_editar_archivo_file_aviso').removeClass("hidden").addClass('w-10 h-10').attr('src', url); 
                            $('#text_editar_archivo_file_aviso').text(filename);
                        }else if(ext == "pdf"){
                            $('#preview_editar_archivo_file_aviso').removeClass("hidden").addClass('w-10 h-10').attr('src', "../src/img/pdf.png"); 
                            $('#text_editar_archivo_file_aviso').text(filename);
                        }
                    }else{
                        $('#preview_editar_archivo_file_aviso').removeClass("hidden").addClass('w-10 h-10').attr('src', "../src/img/not_found.jpg"); 
                        $('#text_editar_archivo_file_aviso').text("No se encontró el archivo");
                    }
                }else{
                    console.error('FileReader ó Blob no es compatible con este navegador.');
                    if(checkFile(url)){
                        $('#text_editar_archivo_file_aviso').text(data["filename_alertas_archivo"]);
                    }else{
                        $('#text_editar_archivo_file_aviso').text("No se encontró el archivo");
                    }
                }
                $("#div_editar_archivo_file_aviso").removeClass("hidden");
            }
            openModal();
            resetFormValidator("#Guardar");
            $('#Guardar').unbind('submit');
            $.validator.addMethod('biggertext', function (value, element) {
		        return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
	        }, 'not a valid biggertext.');
            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1048576)
            }, 'File size must be less than {0} MB');
            if ($('#Guardar').length > 0) {
                $('#Guardar').validate({
                    ignore: [],
                    onkeyup: false,
                    errorPlacement: function(error, element) {
                        if((element.attr('name') === 'editar_foto_aviso')){
                            error.appendTo("div#error_editar_aviso");
                        }else if((element.attr('name') === 'editar_archivo_file_aviso')){
		                    error.appendTo("div#error_editar_archivo_file_aviso");
                        }else if(element.attr('name') === 'editar_descripcion_aviso'){
                            error.appendTo("div#error_editar_descripcion_aviso"); 
                        }else{
                            error.insertAfter(element.parent('.group.flex'));
                        }
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
                        editar_titulo_aviso: {
                            required: true,
                            biggertext: true
                        },
                        editar_descripcion_aviso: {
                            required: true,
                            biggertext: true
                        },
                        editar_foto_aviso: {
                            extension: "jpg|jpeg|png",
                            filesize: 10
                        },
                        editar_archivo_file_aviso: {
                            extension: "pdf|jpg|jpeg|png",
                            filesize: 10
                        }
                    },
                    messages: {
                        editar_titulo_aviso: {
                            required: 'Este campo es requerido',
                            biggertext: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                        },
                        editar_descripcion_aviso: {
                            required: 'Este campo es requerido',
                            biggertext: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                        },
                        editar_foto_aviso: {
                            extension: 'Solo se permite jpg, jpeg y pngs',
                            filesize: 'Las imágenes deben pesar ser menos de 10 MB'
                        },
                        editar_archivo_file_aviso: {
                            extension: 'Solo se permite pdf, jpg, jpeg y pngs',
                            filesize: 'Los archivos deben pesar ser menos de 10 MB'
                        }
                    },
                    submitHandler: function(form) {
                        $('#submit-editar-changes-aviso').html(
                            '<button disabled type="button" class="button w-full inline-flex items-center justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">'+
                                '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                                '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                                '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                                '</svg>'+
                                'Cargando...'+
                            '</button>');
                            $('#disable-editar-close-submit-aviso').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                            check_user_logged().then((response) => {
                                if(response == "true"){
                                    window.addEventListener('beforeunload', unloadHandler);
                                    /*EMPIEZA EL AJAX*/
                                    var fd = new FormData();
                                    var titulo_aviso = $("#editar_titulo_aviso").val();
                                    var descripcion_aviso = $("#editar_descripcion_aviso").val();
                                    var foto_aviso = $('#editar_foto_aviso')[0].files[0];
                                    var archivo_alerta = $('#editar_archivo_file_aviso')[0].files[0];
                                    var id = data["id"];
                                    var method = "edit";
                                    var app = "avisos";
                                    fd.append('titulo_aviso', titulo_aviso);
                                    fd.append('descripcion_aviso', descripcion_aviso);
                                    fd.append('foto_aviso', foto_aviso);
                                    fd.append('archivo_alerta', archivo_alerta);
                                    fd.append('id', id);
                                    fd.append('delete', delete_switch);
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
                                                        title: "Aviso Editado",
                                                        text: array[1],
                                                        icon: "success"
                                                    }).then(function() {
                                                        var table = $('#avisos_table').DataTable();
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-editar-changes-aviso').html('<button disabled id="editar-aviso" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Editar</button>');
                                                        $('#disable-editar-close-submit-aviso').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        table.ajax.reload();
                                                        totalfilas_avisos();
                                                        closeModal();
                                                    });
                                                } else if(array[0] == "error") {
                                                    Swal.fire({
                                                        title: "Error",
                                                        text: array[1],
                                                        icon: "error"
                                                    }).then(function() {
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-editar-changes-aviso').html('<button id="editar-aviso" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Editar</button>');
                                                        $('#disable-close-submit').html("<button id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                    });
                                                } else if (array[0] == "notice_not_found") {
                                                    Swal.fire({
                                                        title: "Aviso inexistente!",
                                                        text: array[1],
                                                        icon: "error"
                                                    }).then(function() {
                                                        var table = $('#avisos_table').DataTable();
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-editar-changes-aviso').html('<button disabled id="editar-aviso" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Editar</button>');
                                                        $('#disable-editar-close-submit-aviso').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        table.ajax.reload();
                                                        totalfilas_avisos();
                                                        closeModal();
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
                                        window.removeEventListener('beforeunload', unloadHandler);
                                        $('#submit-editar-changes-aviso').html('<button disabled id="editar-aviso" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Editar</button>');
                                        $('#disable-editar-close-submit-aviso').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
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
        });

        var editar_file_foto_avisos;

        $(document).on('click', '#delete_editar_foto_aviso', function() {
            $("#img_editar_information_aviso").replaceWith(originalState.clone());
            $("#editar_foto_aviso").val("");
            $("#div_editar_foto_aviso").addClass("hidden");
        });

        $(document).on('click', '#editar_foto_aviso', function() {
            editar_file_foto_avisos = $("#editar_foto_aviso").clone();
        });

        $(document).on('change', '#editar_foto_aviso', function () {
            if (window.FileReader && window.Blob) {
                var files = $('input#editar_foto_aviso').get(0).files;
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
                            $('#editar_preview_aviso').addClass('hidden');
                            $('#editar_svg_aviso').removeClass('hidden');
                            $('#editar_archivo_aviso').text("El archivo " +file.name+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
                            $("#div_editar_foto_aviso").removeClass("hidden");
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#editar_preview_aviso').addClass('hidden');
                                $('#editar_svg_aviso').removeClass('hidden');
                                $('#editar_archivo_aviso').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
                                $("#div_editar_foto_aviso").removeClass("hidden");
                            }else{
                                $('#editar_preview_aviso').removeClass('hidden');
                                $('#editar_preview_aviso').addClass('w-10 h-10');
                                $('#editar_svg_aviso').addClass('hidden');
                                $('#editar_archivo_aviso').text(file.name);
                                $("#div_editar_foto_aviso").removeClass("hidden");
                                let reader = new FileReader();
                                reader.onload = function (event) {
                                    $('#editar_preview_aviso').attr('src', event.target.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#editar_foto_aviso").replaceWith(editar_file_foto_avisos.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if($("#editar_foto_aviso").val() != ''){
                    var file = this.files[0].name;
                    var lastDot = file.lastIndexOf('.');
                    var extension = file.substring(lastDot + 1);
                    if(extension == "jpeg" || extension == "jpg" || extension == "png") {
                        if(this.files[0].size > 10485760){
                            $('#editar_archivo_aviso').text("El archivo " +file+ " debe pesar menos 10 MB.");
                            $("#div_editar_foto_aviso").removeClass("hidden");
                        }else{
                            $('#editar_archivo_aviso').text(file);
                            $("#div_editar_foto_aviso").removeClass("hidden");
                        }
                    }else{
                        $('#editar_archivo_aviso').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
                        $("#div_editar_foto_aviso").removeClass("hidden");
                    }
                }
            }
        });

        $(document).on('click', '#delete_editar_archivo_file_aviso', function() {
            $("#editar_archivo_file_aviso_information").replaceWith(originalState.clone());
            $("#editar_archivo_file_aviso").val("");
            $("#div_editar_archivo_file_aviso").addClass("hidden");
            delete_switch2 = "true";
        });

        var edit_file_notice;

        $(document).on('click', '#editar_archivo_file_aviso', function() {
            edit_file_notice = $("#editar_archivo_file_aviso").clone();
        });

        $(document).on('change', '#editar_archivo_file_aviso', function () {
			if (window.FileReader && window.Blob) {
				var files = $('input#editar_archivo_file_aviso').get(0).files;
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
							case '25504446':
                                type = 'application/pdf';
                                break;
						}
						if (file.type !== type) {
							console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
							$('#preview_editar_archivo_file_aviso').addClass('hidden');
							$('#svg_editar_archivo_file_aviso').removeClass('hidden');
							$('#text_editar_archivo_file_aviso').text("El archivo " +file.name+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
							$("#div_editar_archivo_file_aviso").removeClass("hidden");
						} else {
							console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
							if(file.size > 10485760){
								$('#preview_editar_archivo_file_aviso').addClass('hidden');
								$('#svg_editar_archivo_file_aviso').removeClass('hidden');
								$('#text_editar_archivo_file_aviso').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
								$("#div_editar_archivo_file_aviso").removeClass("hidden");
							}else{
								$('#preview_editar_archivo_file_aviso').removeClass('hidden');
								$('#preview_editar_archivo_file_aviso').addClass('w-10 h-10');
								$('#svg_editar_archivo_file_aviso').addClass('hidden');
								$('#text_editar_archivo_file_aviso').text(file.name);
								$("#div_editar_archivo_file_aviso").removeClass("hidden");
								delete_switch2="false";
								if (file.type == "image/png" || file.type == "image/jpeg") {
                                    let reader = new FileReader();
                                    reader.onload = function (event) {
                                        $('#preview_editar_archivo_file_aviso').attr('src', event.target.result);
                                    }
                                    reader.readAsDataURL(file);
                                }else if(file.type == "application/pdf"){
                                    $('#preview_editar_archivo_file_aviso').attr('src', "../src/img/pdf.png");
                                }
							}
						}
					};
					fileReader.readAsArrayBuffer(file.slice(0, 4));
				}else{
                    $("#editar_archivo_file_aviso").replaceWith(edit_file_notice.clone());
                }
			} else {
				console.error('FileReader ó Blob no es compatible con este navegador.');
				if($("#editar_archivo_file_aviso").val() != ''){
					var file = this.files[0].name;
					var lastDot = file.lastIndexOf('.');
					var extension = file.substring(lastDot + 1);
					if(extension == "jpeg" || extension == "jpg" || extension == "png") {
						if(this.files[0].size > 10485760){
							$('#text_editar_archivo_file_aviso').text("El archivo " +file+ " debe pesar menos 10 MB.");
							$("#div_editar_archivo_file_aviso").removeClass("hidden");
						}else{
							$('#text_editar_archivo_file_aviso').text(file);
							$("#div_editar_archivo_file_aviso").removeClass("hidden");
							delete_switch2="false";
						}
					}else{
						$('#text_editar_archivo_file_aviso').text("El archivo " +file+ " no es una imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo jpg, jpeg y png");
						$("#div_editar_archivo_file_aviso").removeClass("hidden");
					}
				}
			}
		});

        $(document).on('click', 'tr .Eliminar_Aviso', function() {
            var table = $('#avisos_table').DataTable();
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
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podras recuperar la información!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí!',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                check_user_logged().then((response) => {
                    if(response == "true"){
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'éxito',
                                text: 'La fila ha sido eliminada!'
                            }).then(function() {
                                var eliminarid = data["id"];
                                var fd = new FormData();
                                fd.append('id', eliminarid);
                                $.ajax({
                                    url: "../ajax/eliminar/tabla_avisos/eliminaraviso.php",
                                    type: "post",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(result) {
                                        table.ajax.reload();
                                        totalfilas_avisos();
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

        <?php 
            }
        } 
    ?>
    });

    
    const modalContainer = document.querySelector(
        "#modal-component-container"
    );

    const modal = document.querySelector("#modal-container");

    $('.modal-actions').on('click', '#close-modal', function(){
        closeModal();
    });

    function openModal(){
        showAndHide(modalContainer, ["block", "animate-fadeIn"], ["hidden", "animate-fadeOut"]);
        showAndHide(modal, ["animate-scaleIn"], ["animate-scaleOut"]);
    }

    function closeModal(){
        showAndHide(modalContainer, ["animate-fadeOut"], ["animate-fadeIn"]);
        showAndHide(modal, ["animate-scaleOut"], ["animate-scaleIn"]);
        setTimeout(() => {showAndHide(modalContainer, ["hidden"], ["block"]);}, 270);
    }

    function showAndHide(element, classesToAdd, classessToRemove){
        element.classList.remove( ...classessToRemove);
        element.classList.add( ...classesToAdd);
    }

    function viewmore_alerts(titulo_alerta, descripcion_alerta, creado_por, nombre_archivo, archivo_identificador){
        $('.modal-wrapper-flex').html(
            '<div class="flex-col gap-3 items-center flex sm:flex-row">'+
                '<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">'+
                    '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>'+
                '</div>'+
                '<h3 class="text-lg font-medium text-gray-900"> '+titulo_alerta+'</h3>'+
            '</div>'+
            '<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left overflow-y-auto h-[21.875rem]">'+
                '<div class="grid grid-cols-1 mt-5 p-3">'+
                    '<label class="text-[#64748b] font-semibold mb-2">'+
                        'Descripción del aviso:'+
                    '</label>'+
                    '<span style="word-break: break-word;">'+descripcion_alerta+'<span>'+
                '</div>'+
                '<div class="grid grid-cols-1 mt-5 p-3">'+
                    '<label class="text-[#64748b] font-semibold mb-2">'+
                        'Archivo:'+
                    '</label>'+
                    '<div id="archivo_div"></div>'+
                '</div>'+
                '<div class="grid grid-cols-1 mt-5 p-3">'+
                    '<label class="text-[#64748b] font-semibold mb-2">'+
                        'Creado por:'+
                    '</label>'+
                    '<span style="word-break: break-word;">'+creado_por+'<span>'+
                '</div>'+
            '</div>');
        $('.modal-actions').html('<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>');
        if(nombre_archivo == null && archivo_identificador == null){
            $("#archivo_div").append("<span>No se ha subido un archivo</span>");
        }else{
            if(viewmore_checkfile("../src/alertas_archivo/"+archivo_identificador+"")){
                $("#archivo_div").append("<a style='word-break:break-word;' class='text-blue-600 hover:border-b-[1px] hover:border-blue-600' href='../src/alertas_archivo/"+archivo_identificador+"'>"+nombre_archivo+"</a>");
            }else{
                $("#archivo_div").append("<span>No se encontró el archivo</span>");
            }
        }
        openModal();
    }

    function viewmore_checkfile(url) {
        var response = jQuery.ajax({
            url: url,
            type: 'HEAD',
            async: false
        }).status;	
        
        return (response != "200") ? false : true;
    }

    <?php 
        if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
            if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
    ?>

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

    <?php 
            }
        } 
    ?>
</script>

<style>

    .paginationjs{
        padding: 4px !important;
    }

    <?php 
        if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
            if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
    ?>
    
    .error{
        color: red;
    }

    .dataTables_wrapper .dataTables_filter {
        float: left;
        text-align: left;
        padding-bottom: 5px;
        padding-top: 5px;
    }

    @media (max-width: 640px) {
        .dataTables_filter {
            width: 100%;
        }
    }

    .dataTables_paginate {
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        right: 7px;
    }

    .dt-buttons {
        float: right !important;
        text-align: right;
    }

    #datatable {
        border-collapse: collapse !important;
    }

    .search {
        margin: auto !important;
        height: 40px !important;
    }

    tr.odd:hover,
    tr.even:hover {
        background: rgb(243 244 246 / var(--tw-bg-opacity)) !important
    }

    tr.odd {
        border-bottom-width: 1px;
        border-color: rgb(229 231 235 / var(--tw-border-opacity));
        --tw-border-opacity: 1;
        background: transparent !important;
    }

    tr.even {
        border-bottom-width: 1px;
        border-color: rgb(229 231 235 / var(--tw-border-opacity));
        --tw-border-opacity: 1;
        background: rgb(249 250 251 / var(--tw-bg-opacity)) !important;
    }

    div.dataTables_filter .search {
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
        background-repeat: no-repeat;
        background-color: #fff;
        background-position: 3px 7px !important;
        padding-left: 30px;
    }

    <?php 
            }
        } 
    ?>
</style>