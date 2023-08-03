<link rel="stylesheet" href="../src/css/pagination.css">
<script src="../src/js/pagination.min.js"></script>
<script>
    var originalState;
    var delete_switch;
    const tabElements = [{
            id: 'vision',
            triggerEl: document.querySelector('#vision-tab-profile'),
            targetEl: document.querySelector('#vision')
        },
        {
            id: 'noticias',
            triggerEl: document.querySelector('#noticias-tab-profile'),
            targetEl: document.querySelector('#noticias')
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
                if(target.id=="noticias"){
                    if ( ! $.fn.DataTable.isDataTable('#noticias_table') ) {
                        $("#noticias_table").DataTable({
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
                                    text: "Crear noticia",
                                    attr: {
                                        'id': 'Noticia',
                                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                    },
                                    className: 'button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                    action: function(e, dt, node, config) {
                                        $('.modal-wrapper-flex').html(
                                            '<div class="flex-col gap-3 items-center flex sm:flex-row">'+
                                                '<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10"><svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                                        '<path fill="currentColor" d="M20 5L20 19L4 19L4 5H20M20 3H4C2.89 3 2 3.89 2 5V19C2 20.11 2.89 21 4 21H20C21.11 21 22 20.11 22 19V5C22 3.89 21.11 3 20 3M18 15H6V17H18V15M10 7H6V13H10V7M12 9H18V7H12V9M18 11H12V13H18V11Z" /></svg>'+
                                                '</div>'+
                                                '<h3 class="text-lg font-medium text-gray-900"> Crear una noticia</h3>'+
                                            '</div>'+
                                            '<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left overflow-y-scroll h-[21.875rem] sm:h-full md:overflow-y-hidden">'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">'+
                                                        'Título de la noticia'+
                                                    '</label>'+
                                                    '<div class="group flex">'+
                                                        '<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">'+
                                                            '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                                                '<path d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />'+
                                                            '</svg>'+
                                                        '</div>'+
                                                        '<input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="titulo_noticia" name="titulo_noticia" placeholder="Título de la noticia">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">Descripción de la noticia</label>'+
                                                    '<textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="descripcion_noticia" name="descripcion_noticia" placeholder="Descripción de la noticia"></textarea>'+
                                                    '<div id="error_descripcion_noticia"></div>'+
                                                '</div>'+
                                                '<div class="grid grid-cols-1 mt-5 mx-7">'+
                                                    '<label class="text-[#64748b] font-semibold mb-2">Subir imagen para la noticia</label>'+
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
                                            '</div>');
                                        $('.modal-actions').html(
                                            '<div id="submit-changes">'+
                                                '<button id="crear-noticia" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Crear</button>'+
                                            '</div>'+
                                            '<div id="disable-close-submit">'+
                                                '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                                            '</div>');
                                        originalState = $("#img_information").clone();
                                        openModal();
                                        resetFormValidator("#Guardar");
                                        $('#Guardar').unbind('submit'); 
                                        $.validator.addMethod('field_validation', function (value, element) {
                                            return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
                                        }, 'not a valid field.');
                                        $.validator.addMethod('description', function (value, element) {
                                            return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
                                        }, 'not a valid description.');
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
                                                    }else if(element.attr('name') === 'descripcion_noticia'){
                                                        error.appendTo("div#error_descripcion_noticia"); 
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
                                                    titulo_noticia: {
                                                        required: true,
                                                        field_validation: true
                                                    },
                                                    descripcion_noticia: {
                                                        required: true,
                                                        description: true
                                                    },
                                                    foto: {
                                                        extension: "jpg|jpeg|png",
                                                        filesize: 10
                                                    }
                                                },
                                                messages: {
                                                    titulo_noticia: {
                                                        required: 'Este campo es requerido',
                                                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                                                    },
                                                    descripcion_noticia: {
                                                        required: 'Este campo es requerido',
                                                        description: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                                                    },
                                                    foto: {
                                                        extension: 'Solo se permite jpg, jpeg y pngs',
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
                                                                var titulo_noticia = $("#titulo_noticia").val();
                                                                var descripcion_noticia = $("#descripcion_noticia").val();
                                                                var foto = $('#foto')[0].files[0];
                                                                var method = "store";
                                                                var app = "noticias";
                                                                fd.append('titulo_noticia', titulo_noticia);
                                                                fd.append('descripcion_noticia', descripcion_noticia);
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
                                                                        setTimeout(function(){
                                                                            var array = $.parseJSON(data);
                                                                            if (array[0] == "success") {
                                                                                Swal.fire({
                                                                                    title: "Noticia Creada",
                                                                                    text: array[1],
                                                                                    icon: "success"
                                                                                }).then(function() {
                                                                                    var table = $('#noticias_table').DataTable();
                                                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                                                    $('#submit-changes').html('<button disabled id="crear-noticia" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Crear</button>');
                                                                                    $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                                                    table.ajax.reload();
                                                                                    totalfilas_noticias();
                                                                                    closeModal();
                                                                                });
                                                                            } else if(array[0] == "error") {
                                                                                Swal.fire({
                                                                                    title: "Error",
                                                                                    text: array[1],
                                                                                    icon: "error"
                                                                                }).then(function() {
                                                                                    window.removeEventListener('beforeunload', unloadHandler);
                                                                                    $('#submit-changes').html('<button id="crear-noticia" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Crear</button>');
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
                                                                    $('#submit-changes').html('<button disabled id="crear-noticia" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Crear</button>');
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
                                "url": "../config/noticias/ajax_noticias.php",
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
                                {"data": "noticias_foto_identificador"},
                                {"data": "filename_noticias", visible: false, searchable: false},
                                {"data": "titulo_noticia"},
                                {"data": "descripcion_noticia"},
                                {"data": "fecha_creacion_noticia"},
                                {"data": "fecha_modificacion", visible: false, searchable: false},
                                {"data": "id", searchable: false}
                            ],
                            "columnDefs": 
                            [
                                {
                                    target: [2],
                                    render: function (data, type, row) {
                                        if(row["noticias_foto_identificador"] === null){
                                            return(
                                                "<div>" +
                                                    "<img class='block lg:m-auto w-10 h-10 shrink-0' src='../src/img/default_news_image.png'>"+
                                                "</div>"
                                            );
                                        }else{
                                            return(
                                                "<div>" +
                                                    "<img class='block lg:m-auto w-10 h-10 shrink-0' src='../src/noticias/"+row['noticias_foto_identificador']+"' onerror='this.onerror=null; this.src=\"../src/img/not_found.jpg\"'>"+
                                                "</div>"
                                            );
                                        }
                                    }
                                },
                                {
                                    target: [4],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["titulo_noticia"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [5],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["descripcion_noticia"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [6],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["fecha_creacion_noticia"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [8],
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
                                $("#noticias_table").show();
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
                                            '</div>');
                                        $('.modal-actions').html(
                                            '<div id="submit-changes-aviso">'+
                                                '<button id="crear-aviso" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Crear</button>'+
                                            '</div>'+
                                            '<div id="disable-close-submit-aviso">'+
                                                '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                                            '</div>');
                                        originalState = $("#img_information_aviso").clone();
                                        openModal();
                                        resetFormValidator("#Guardar");
                                        $('#Guardar').unbind('submit'); 
                                        $.validator.addMethod('field_validation', function (value, element) {
                                            return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
                                        }, 'not a valid field.');
                                        $.validator.addMethod('description', function (value, element) {
                                            return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
                                        }, 'not a valid description.');
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
                                                        field_validation: true
                                                    },
                                                    descripcion_aviso: {
                                                        required: true,
                                                        description: true
                                                    },
                                                    foto_aviso: {
                                                        extension: "jpg|jpeg|png",
                                                        filesize: 10
                                                    }
                                                },
                                                messages: {
                                                    titulo_aviso: {
                                                        required: 'Este campo es requerido',
                                                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                                                    },
                                                    descripcion_aviso: {
                                                        required: 'Este campo es requerido',
                                                        description: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                                                    },
                                                    foto_aviso: {
                                                        extension: 'Solo se permite jpg, jpeg y pngs',
                                                        filesize: 'Las imágenes deben pesar ser menos de 10 MB'
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
                                                                var method = "store";
                                                                var app = "avisos";
                                                                fd.append('titulo_aviso', titulo_aviso);
                                                                fd.append('descripcion_aviso', descripcion_aviso);
                                                                fd.append('foto_aviso', foto_aviso);
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
                                {"data": "avisos_foto_identificador"},
                                {"data": "filename_avisos", visible: false, searchable: false},
                                {"data": "titulo_aviso"},
                                {"data": "descripcion_aviso"},
                                {"data": "fecha_creacion_aviso"},
                                {"data": "fecha_modificacion", visible: false, searchable: false},
                                {"data": "id", searchable: false}
                            ],
                            "columnDefs": 
                            [
                                {
                                    target: [2],
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
                                    target: [4],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["titulo_aviso"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [5],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["descripcion_aviso"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [6],
                                    render: function (data, type, row) {
                                        return (
                                            "<div class='text-left lg:text-center'>" +
                                                "<span>" + row["fecha_creacion_aviso"] + "</span>" +
                                            "</div>"
                                        );
                                    }
                                },
                                {
                                    target: [8],
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

    function resetFormValidator(formId) {
        $(formId).removeData('validator');
        $(formId).removeData('unobtrusiveValidation');
        $.validator.unobtrusive.parse(formId);
    }

    function totalfilas_noticias(){
        var totalrows = 0;
        $.ajax({
            type: "GET",
            url: "../config/totalrows_noticias.php",
            success: function (response) {
                totalrows = response;
                paginacion_noticias(totalrows);
            }
        });
    }

    function paginacion_noticias(totalrows){
        $('#demo').pagination({
            dataSource: '../config/noticias_ajax.php',
            locator: "items",
            totalNumberLocator: function(response) {
                // you can return totalNumber by analyzing response content
                return totalrows;
            },
            pageSize: 5,
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
                var html = __noticiasPreview(data);
                $("#dataContainer").html(html);
            }
        });
    }

    function __noticiasPreview(data) {
        for (var i = 0, len = data.length; i < len; i++) {
            if(data[i].noticias_foto_identificador != null && data[i].filename_noticias != null){
                data[i] = `<div class="noticias__item-wrapper" id="noticias__item-wrapper" style="word-break:break-word; border:1px solid black; padding:4px; line-heigth:2;">`+
                    `<picture><img class="noticias__image w-10 h-10" src="../src/noticias/${data[i].noticias_foto_identificador}" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Noticias image"></picture>`+
                    `<ul class="noticias__item">`+
                    `<li><h2 class="noticias__item-heading" style="font-size:1.5rem; font-weight: 800;">${data[i].titulo_noticia}</h2></li>`+
                    `<li class="noticias__item-description"><p class="noticias__item-description">${data[i].descripcion_noticia}</p></li>`+
                    `<li class="noticias__footer flex justify-between">`+
                    `<span class="noticias__date--creation">Fecha de creación: ${data[i].fecha_creacion_noticia}</span>`+
                    `<span class="noticias__user--creator">Creado por: ${data[i].nombre}</span>`+
                    `</li>`+
                    `</ul></div>`;
            }else{
                data[i] = `<div class="noticias__item-wrapper" id="noticias__item-wrapper" style="word-break:break-word; border:1px solid black; padding:4px; line-heigth:2;">`+
                    `<picture><img class="noticias__image w-10 h-10" src="../src/img/default_news_image.png" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Noticias image"></picture>`+
                    `<ul class="noticias__item">`+
                    `<li><h2 class="noticias__item-heading" style="font-size:1.5rem; font-weight: 800;">${data[i].titulo_noticia}</h2></li>`+
                    `<li class="noticias__item-description"><p class="noticias__item-description">${data[i].descripcion_noticia}</p></li>`+
                    `<li class="noticias__footer flex justify-between">`+
                    `<span class="noticias__date--creation">Fecha de creación: ${data[i].fecha_creacion_noticia}</span>`+
                    `<span class="noticias__user--creator">Creado por: ${data[i].nombre}</span>`+
                    `</li>`+
                    `</ul></div>`;
            }
        }
        return data.join("");
    }

    function totalfilas_avisos(){
        var totalrows = 0;
        $.ajax({
            type: "GET",
            url: "../config/totalrows_avisos.php",
            success: function (response) {
                totalrows = response;
                paginacion_avisos(totalrows);
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
            pageSize: 5,
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
                data[i] = `<div class="avisos__item-wrapper" id="avisos__item-wrapper" style="word-break:break-word; border:1px solid black; padding:4px; line-heigth:2;">`+
                    `<picture><img class="avisos__image w-10 h-10" src="../src/avisos/${data[i].avisos_foto_identificador}" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Avisos image"></picture>`+
                    `<ul class="avisos__item">`+
                    `<li><h2 class="avisos__item-heading" style="font-size:1.5rem; font-weight: 800;">${data[i].titulo_aviso}</h2></li>`+
                    `<li class="avisos__item-description"><p class="avisos__item-description">${data[i].descripcion_aviso}</p></li>`+
                    `<li class="avisos__footer flex justify-between">`+
                    `<span class="avisos__date--creation">Fecha de creación: ${data[i].fecha_creacion_aviso}</span>`+
                    `<span class="avisos__user--creator">Creado por: ${data[i].nombre}</span>`+
                    `</li>`+
                    `</ul></div>`;
            }else{
                data[i] = `<div class="avisos__item-wrapper" id="avisos__item-wrapper" style="word-break:break-word; border:1px solid black; padding:4px; line-heigth:2;">`+
                    `<picture><img class="avisos__image w-10 h-10" src="../src/img/default_avisos_image.png" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Avisos image"></picture>`+
                    `<ul class="avisos__item">`+
                    `<li><h2 class="avisos__item-heading" style="font-size:1.5rem; font-weight: 800;">${data[i].titulo_aviso}</h2></li>`+
                    `<li class="avisos__item-description"><p class="avisos__item-description">${data[i].descripcion_aviso}</p></li>`+
                    `<li class="avisos__footer flex justify-between">`+
                    `<span class="avisos__date--creation">Fecha de creación: ${data[i].fecha_creacion_aviso}</span>`+
                    `<span class="avisos__user--creator">Creado por: ${data[i].nombre}</span>`+
                    `</li>`+
                    `</ul></div>`;
            }
        }
        return data.join("");
    }

    <?php 
            }
        } 
    ?>

    $(document).ready(function () {

        totalfilas_noticias();
        totalfilas_avisos();

        function totalfilas_noticias(){
            var totalrows = 0;
            $.ajax({
                type: "GET",
                url: "../config/totalrows_noticias.php",
                success: function (response) {
                    totalrows = response;
                    paginacion_noticias(totalrows);
                }
            });
        }

        function paginacion_noticias(totalrows){
            $('#demo').pagination({
                dataSource: '../config/noticias_ajax.php',
                locator: "items",
                totalNumberLocator: function(response) {
                    // you can return totalNumber by analyzing response content
                    return totalrows;
                },
                pageSize: 5,
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
                    var html = __noticiasPreview(data);
                    $("#dataContainer").html(html);
                }
            });
        }

        function __noticiasPreview(data) {
            for (var i = 0, len = data.length; i < len; i++) {
                if(data[i].noticias_foto_identificador != null && data[i].filename_noticias != null){
                    data[i] = `<div class="noticias__item-wrapper" id="noticias__item-wrapper" style="word-break:break-word; border:1px solid black; padding:4px; line-heigth:2;">`+
                        `<picture><img class="noticias__image w-10 h-10" src="../src/noticias/${data[i].noticias_foto_identificador}" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Noticias image"></picture>`+
                        `<ul class="noticias__item">`+
                        `<li><h2 class="noticias__item-heading" style="font-size:1.5rem; font-weight: 800;">${data[i].titulo_noticia}</h2></li>`+
                        `<li class="noticias__item-description"><p class="noticias__item-description">${data[i].descripcion_noticia}</p></li>`+
                        `<li class="noticias__footer flex justify-between">`+
                        `<span class="noticias__date--creation">Fecha de creación: ${data[i].fecha_creacion_noticia}</span>`+
                        `<span class="noticias__user--creator">Creado por: ${data[i].nombre}</span>`+
                        `</li>`+
                        `</ul></div>`;
                }else{
                    data[i] = `<div class="noticias__item-wrapper" id="noticias__item-wrapper" style="word-break:break-word; border:1px solid black; padding:4px; line-heigth:2;">`+
                        `<picture><img class="noticias__image w-10 h-10" src="../src/img/default_news_image.png" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Noticias image"></picture>`+
                        `<ul class="noticias__item">`+
                        `<li><h2 class="noticias__item-heading" style="font-size:1.5rem; font-weight: 800;">${data[i].titulo_noticia}</h2></li>`+
                        `<li class="noticias__item-description"><p class="noticias__item-description">${data[i].descripcion_noticia}</p></li>`+
                        `<li class="noticias__footer flex justify-between">`+
                        `<span class="noticias__date--creation">Fecha de creación: ${data[i].fecha_creacion_noticia}</span>`+
                        `<span class="noticias__user--creator">Creado por: ${data[i].nombre}</span>`+
                        `</li>`+
                        `</ul></div>`;
                }
            }
            return data.join("");
        }

        function totalfilas_avisos(){
            var totalrows = 0;
            $.ajax({
                type: "GET",
                url: "../config/totalrows_avisos.php",
                success: function (response) {
                    totalrows = response;
                    paginacion_avisos(totalrows);
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
                pageSize: 5,
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
                    data[i] = `<div class="avisos__item-wrapper" id="avisos__item-wrapper" style="word-break:break-word; border:1px solid black; padding:4px; line-heigth:2;">`+
                        `<picture><img class="avisos__image w-10 h-10" src="../src/avisos/${data[i].avisos_foto_identificador}" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Avisos image"></picture>`+
                        `<ul class="avisos__item">`+
                        `<li><h2 class="avisos__item-heading" style="font-size:1.5rem; font-weight: 800;">${data[i].titulo_aviso}</h2></li>`+
                        `<li class="avisos__item-description"><p class="avisos__item-description">${data[i].descripcion_aviso}</p></li>`+
                        `<li class="avisos__footer flex justify-between">`+
                        `<span class="avisos__date--creation">Fecha de creación: ${data[i].fecha_creacion_aviso}</span>`+
                        `<span class="avisos__user--creator">Creado por: ${data[i].nombre}</span>`+
                        `</li>`+
                        `</ul></div>`;
                }else{
                    data[i] = `<div class="avisos__item-wrapper" id="avisos__item-wrapper" style="word-break:break-word; border:1px solid black; padding:4px; line-heigth:2;">`+
                        `<picture><img class="avisos__image w-10 h-10" src="../src/img/default_avisos_image.png" onerror="this.onerror=null;this.src='../src/img/not_found.jpg'" alt="Avisos image"></picture>`+
                        `<ul class="avisos__item">`+
                        `<li><h2 class="avisos__item-heading" style="font-size:1.5rem; font-weight: 800;">${data[i].titulo_aviso}</h2></li>`+
                        `<li class="avisos__item-description"><p class="avisos__item-description">${data[i].descripcion_aviso}</p></li>`+
                        `<li class="avisos__footer flex justify-between">`+
                        `<span class="avisos__date--creation">Fecha de creación: ${data[i].fecha_creacion_aviso}</span>`+
                        `<span class="avisos__user--creator">Creado por: ${data[i].nombre}</span>`+
                        `</li>`+
                        `</ul></div>`;
                }
            }
            return data.join("");
        }

        <?php 
            if(Roles::FetchSessionRol($_SESSION["rol"]) != "" && (Roles::FetchUserDepartamento($_SESSION["id"]) != "" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador")){
                if (Roles::FetchUserDepartamento($_SESSION["id"]) == "Capital humano" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
        ?>

        $(document).on("click", "tr .Editar", function () {
            var table = $('#noticias_table').DataTable();
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
                        '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M20 5L20 19L4 19L4 5H20M20 3H4C2.89 3 2 3.89 2 5V19C2 20.11 2.89 21 4 21H20C21.11 21 22 20.11 22 19V5C22 3.89 21.11 3 20 3M18 15H6V17H18V15M10 7H6V13H10V7M12 9H18V7H12V9M18 11H12V13H18V11Z" /></svg>'+
                    '</div>'+
                    '<h3 class="text-lg font-medium text-gray-900"> Editar una noticia</h3>'+
                '</div>'+
                '<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left overflow-y-scroll h-[21.875rem] sm:h-full md:overflow-y-hidden">'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">'+
                            'Título de la noticia'+
                        '</label>'+
                        '<div class="group flex">'+
                            '<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">'+
                                '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                    '<path d="M5,4V7H10.5V19H13.5V7H19V4H5Z" />'+
                                '</svg>'+
                            '</div>'+
                            '<input class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" type="text" id="editar_titulo_noticia" name="editar_titulo_noticia" value="'+data['titulo_noticia']+'" placeholder="Título de la noticia">'+
                        '</div>'+
                    '</div>'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">Descripción de la noticia</label>'+
                        '<textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="editar_descripcion_noticia" name="editar_descripcion_noticia" placeholder="Descripción de la noticia">'+data['descripcion_noticia']+'</textarea>'+
                        '<div id="error_editar_descripcion_noticia"></div>'+
                    '</div>'+
                    '<div class="grid grid-cols-1 mt-5 mx-7">'+
                        '<label class="text-[#64748b] font-semibold mb-2">Subir imagen para la noticia</label>'+
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
                '</div>');
                $('.modal-actions').html(
                    '<div id="submit-changes">'+
                        '<button id="editar-noticia" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar</button>'+
                    '</div>'+
                    '<div id="disable-close-submit">'+
                        '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                    '</div>');
            originalState = $("#editar_img_information").clone();
            delete_switch = "false";
            if(data["noticias_foto_identificador"] != null && data["filename_noticias"] != null){
                if (window.FileReader && window.Blob) {
                    console.log('FileReader ó Blob es compatible con este navegador.');
                    $('#editar_svg').addClass("hidden");
                    checkImage("../src/noticias/"+data['noticias_foto_identificador']+"", function(){ $('#editar_preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/noticias/'+data["noticias_foto_identificador"]+''); $('#editar_archivo').text(data["filename_noticias"]); }, function(){ $('#editar_preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/not_found.jpg'); $('#editar_archivo').text("No se encontró la imagen"); } );
                }else{
                    console.error('FileReader ó Blob no es compatible con este navegador.');
                    checkImage("../src/noticias/"+data['noticias_foto_identificador']+"", function(){ $('#editar_archivo').text(data["filename_noticias"]); }, function(){ $('#editar_archivo').text("No se encontró la imagen"); } );
                }	
                $("#div_editar_foto").removeClass("hidden");
            }
            openModal();
            resetFormValidator("#Guardar");
            $('#Guardar').unbind('submit');
            $.validator.addMethod('field_validation', function (value, element) {
                return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
            }, 'not a valid field.');
            $.validator.addMethod('description', function (value, element) {
                return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
            }, 'not a valid description.');
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
                        }else if(element.attr('name') === 'editar_descripcion_noticia'){
                            error.appendTo("div#error_editar_descripcion_noticia"); 
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
                        editar_titulo_noticia: {
                            required: true,
                            field_validation: true
                        },
                        editar_descripcion_noticia: {
                            required: true,
                            description: true
                        },
                        editar_foto: {
                            extension: "jpg|jpeg|png",
                            filesize: 10
                        }
                    },
                    messages: {
                        editar_titulo_noticia: {
                            required: 'Este campo es requerido',
                            field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                        },
                        editar_descripcion_noticia: {
                            required: 'Este campo es requerido',
                            description: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                        },
                        editar_foto: {
                            extension: 'Solo se permite jpg, jpeg y pngs',
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
                                    var titulo_noticia = $("#editar_titulo_noticia").val();
                                    var descripcion_noticia = $("#editar_descripcion_noticia").val();
                                    var foto = $('#editar_foto')[0].files[0];
                                    var id = data["id"];
                                    var method = "edit";
                                    var app = "noticias";
                                    fd.append('titulo_noticia', titulo_noticia);
                                    fd.append('descripcion_noticia', descripcion_noticia);
                                    fd.append('foto', foto);
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
                                                        title: "Noticia Editada",
                                                        text: array[1],
                                                        icon: "success"
                                                    }).then(function() {
                                                        var table = $('#noticias_table').DataTable();
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-changes').html('<button disabled id="editar-noticia" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Editar</button>');
                                                        $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        table.ajax.reload();
                                                        totalfilas_noticias();
                                                        closeModal();
                                                    });
                                                } else if(array[0] == "error") {
                                                    Swal.fire({
                                                        title: "Error",
                                                        text: array[1],
                                                        icon: "error"
                                                    }).then(function() {
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-changes').html('<button id="editar-noticia" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Editar</button>');
                                                        $('#disable-close-submit').html("<button id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                    });
                                                } else if (array[0] == "news_not_found") {
                                                    Swal.fire({
                                                        title: "Noticia inexistente!",
                                                        text: array[1],
                                                        icon: "error"
                                                    }).then(function() {
                                                        var table = $('#noticias_table').DataTable();
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-changes').html('<button disabled id="editar-noticia" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Editar</button>');
                                                        $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        table.ajax.reload();
                                                        totalfilas_noticias();
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
                                        $('#submit-changes').html('<button disabled id="editar-noticia" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Editar</button>');
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

        $(document).on('click', 'tr .Eliminar', function() {
            var table = $('#noticias_table').DataTable();
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
                                    url: "../ajax/eliminar/tabla_noticias/eliminarnoticia.php",
                                    type: "post",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(result) {
                                        table.ajax.reload();
                                        totalfilas_noticias();
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
        <?php 
            }
        } 
    ?>
    });

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