<script>
    document.addEventListener("DOMContentLoaded", function() {
    $("#datatable").DataTable({
        responsive:true,
        "lengthChange": false,
        "ordering": false,
        "sPaginationType": "listboxWithButtons",
        language: {
					search: ""
		},
        dom: '<"top"fB>rt<"bottom"ip><"clear">',
        buttons: [
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear departamento") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
				{
					text: "+ Crear Departamento",
					attr: {
						'id': 'Departamento',
                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
					},
					className: 'button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700'
				}
            <?php } ?>
				],
        "processing": true,
        "serverSide": true,
        "sAjaxSource": '../config/serverside_departamento.php',
        "initComplete": () => {$("#datatable").show();},
        "columns": 
        [
            {data: [1]},
            {data: [0], searchable: false}
        ],
        "columnDefs": 
        [
            {
                target: [0],
                render: function (data, type, row) {
                    return(
                        "<div class='flex items-center gap-3'>" +
                            "<svg class='w-5 h-5 text-black' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M19,20H17V11H7V20H5V9L12,5L19,9V20M8,12H16V14H8V12M8,15H16V17H8V15M16,18V20H8V18H16Z'></path></svg>"+
                            "<span>" + row[1] + "</span>" +
                        "</div>"
                    );
                }
            },
            {
                target: [1],
                render: function (data, type, row) {
                    return (
                        "<div class='flex item-center justify-start md:justify-center gap-3'>" +
                            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar departamento") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                                "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Edit'>"+
                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>"+
                                    "</svg>"+
                                "</div>"+
                            <?php } ?>
                            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar departamento") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>    
                                "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>"+
                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>"+
                                    "</svg>"+
                                "</div>"+
                            <?php } ?>
                        "</div>"
                    );
                }
            }
        ]
    });
    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear departamento") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Editar departamento") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        const modalContainer = document.querySelector(
        "#modal-component-container"
        );
        const modal = document.querySelector("#modal-container");

        $('.modal-actions').on('click', '#close-modal', function(){
            closeModal();
        });

        function resetFormValidator(formId) {
        $(formId).removeData('validator');
        $(formId).removeData('unobtrusiveValidation');
        $.validator.unobtrusive.parse(formId);
        }

        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear departamento") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
            $('.dt-buttons').on('click', '.dt-button', function(){
                $('.modal-wrapper-flex').html(
                    "<div class='flex-col gap-3 items-center flex sm:flex-row'>"+
                    "<div class='modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-celeste-100 sm:mx-0 sm:h-10 sm:w-10'><svg class='w-5 h-5 text-black' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M19,20H17V11H7V20H5V9L12,5L19,9V20M8,12H16V14H8V12M8,15H16V17H8V15M16,18V20H8V18H16Z' /></svg></div>"+
                    "<h3 class='text-lg font-medium text-gray-900'>Crear departamento</h3>"+
                    "</div>"+
                    "<div class='modal-content text-center w-full mt-3 sm:mt-0 sm:text-left'>"+
                        "<div class='grid grid-cols-1 mt-5'>"+
                            "<label class='text-[#64748b] font-semibold mb-2'>Nombre del departamento</label>"+
                            "<div class='group flex'>"+
                                "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'>"+
                                    "<svg class='w-5 h-5 text-gray-500' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M19,20H17V11H7V20H5V9L12,5L19,9V20M8,12H16V14H8V12M8,15H16V17H8V15M16,18V20H8V18H16Z' /></svg>"+
                                "</div>"+
                                "<input class='w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600' type='text' id='creardepartamento' name='creardepartamento' placeholder='Crear departamento'>"+
                            "</div>"+
                        "</div>"+
                    "</div>"
                );
                $('.modal-actions').html(
                    "<button id='crear-departamento' class='button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto'>Crear</button>"+
                    "<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>"
                );
                openModal();
                resetFormValidator("#Guardar");
                $('#Guardar').unbind('submit');
                $('#Guardar').validate({
                    ignore: [],
                    errorPlacement: function(error, element) {
                        error.insertAfter(element.parent('.group.flex'));
                    },
                    rules: {
                        creardepartamento: {
                            required: true,
                            remote: "../ajax/validacion/departamentos/checkdepartamento.php"
                        }
                    },
                    messages: {
                        creardepartamento: {
                            required: 'Por favor, ingresa un departamento',
                            remote: 'Ese departamento ya existe, por favor, ingrese otro'
                        }
                    },
                    submitHandler: function(form) {
                        check_user_logged().then((response) => {
		                    if(response == "true"){
                                var fd = new FormData();
                                var departamentos = $("input[name=creardepartamento]").val();
                                var app = "departamentos";
                                var method = "store";
                                fd.append('departamentos', departamentos);
                                fd.append('app', app);
                                fd.append('method', method);
                                var table = $('#datatable').DataTable();
                                $.ajax({
                                    type: "post",
                                    url: "../ajax/class_search.php",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        response = response.replace(/[\r\n]/gm, '');
                                        if(response == "success"){
                                            Swal.fire({
                                                title: "Departamento Creado",
                                                text: "Se ha creado un departamento exitosamente!",
                                                icon: "success"
                                            }).then(function() {
                                                table.ajax.reload(null, false);
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
		                    console.log(error);
	                    })
                        return false;
                    }
                });
            });
        <?php } ?>

        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar departamento") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
            $('#datatable').on( 'click', 'tr .Edit', function () {
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
                $('.modal-wrapper-flex').html(
                    "<div class='flex-col gap-3 items-center flex sm:flex-row'>"+
                    "<div class='modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-celeste-100 sm:mx-0 sm:h-10 sm:w-10'><svg class='w-5 h-5 text-black' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M19,20H17V11H7V20H5V9L12,5L19,9V20M8,12H16V14H8V12M8,15H16V17H8V15M16,18V20H8V18H16Z' /></svg></div>"+
                    "<h3 class='text-lg font-medium text-gray-900'>Editar departamento</h3>"+
                    "</div>"+
                    "<div class='modal-content text-center w-full mt-3 sm:mt-0 sm:text-left'>"+
                        "<div class='grid grid-cols-1 mt-5'>"+
                            "<label class='text-[#64748b] font-semibold mb-2'>Editar el departamento</label>"+
                            "<div class='group flex'>"+
                                "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'>"+
                                    "<svg class='w-5 h-5 text-gray-500' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M19,20H17V11H7V20H5V9L12,5L19,9V20M8,12H16V14H8V12M8,15H16V17H8V15M16,18V20H8V18H16Z' /></svg>"+
                                "</div>"+
                                "<input class='w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600' type='text' id='editdepartamento' name='editdepartamento' placeholder='Editar departamento' value='"+data[1]+"'>"+
                            "</div>"+
                        "</div>"+
                    "</div>"
                );
                $('.modal-actions').html(
                    "<button id='editar-departamento' class='button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto'>Editar</button>"+
                    "<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>"
                );
                openModal();
                resetFormValidator("#Guardar");
                $('#Guardar').unbind('submit'); 		
                $('#Guardar').validate({
                    ignore: [],
                    errorPlacement: function(error, element) {
                        error.insertAfter(element.parent('.group.flex'));
                    },
                    rules: {
                        editdepartamento: {
                            required: true,
                            remote: {
                                url: "../ajax/validacion/departamentos/checkeditdepartamento.php",
                                type: "post",
                                data: {
                                    "editarid": data[0]
                                }
                            }
                        }
                    },
                    messages: {
                        editdepartamento: {
                            required: 'Por favor, ingresa un departamento',
                            remote: 'Ese departamento ya existe, por favor, ingrese otro'
                        }
                    },
                    submitHandler: function(form) {
                        check_user_logged().then((response) => {
		                    if(response == "true"){
                                var fd = new FormData();
                                var departamentos = $("input[name=editdepartamento]").val();
                                var app = "departamentos";
                                var method = "edit";
                                var id = data[0];
                                fd.append('departamentos', departamentos);
                                fd.append('app', app);
                                fd.append('method', method);
                                fd.append('editarid', id);
                                var table = $('#datatable').DataTable();
                                $.ajax({
                                    type: "post",
                                    url: "../ajax/class_search.php",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        response = response.replace(/[\r\n]/gm, '');
                                        if(response == "success"){
                                            Swal.fire({
                                                title: "Departamento Editado",
                                                text: "Se ha editado un departamento exitosamente!",
                                                icon: "success"
                                            }).then(function() {
                                                table.ajax.reload(null, false);
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
                            console.log(error);
                        })
                        return false;
                    }
                });
            });
        <?php } ?>

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
    <?php } ?>
    });
    $(document).ready(function() {
        $('.dataTables_filter input[type="search"]').
	    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-celeste-600');
        <?php
        if(basename($_SERVER['PHP_SELF']) == 'departamentos.php'){?>
            var dropdown = document.getElementById('catalogos');
            dropdown.classList.remove("hidden");
        <?php } ?>
    });

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar departamento") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        $('#datatable').on( 'click', 'tr .Eliminar', function () {
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
                                var eliminarid = data[0];
                                var fd = new FormData();
                                fd.append('id', eliminarid);
                                $.ajax({
                                    url: "../ajax/eliminar/tabla_departamentos/eliminardepartamento.php",
                                    type: "post",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(result) {
                                            table
                                            .row($(this).parents('tr'))
                                            .remove()
                                            .draw();
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
		            console.log(error);
	            })
            })
        });
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

</script>
<style>
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