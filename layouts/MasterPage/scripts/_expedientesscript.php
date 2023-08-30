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
                <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear expediente") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                        {
                            text: "Crear Expediente",
                            attr: {
                                'id': 'Expediente',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                            action: function(e, dt, node, config) {
                                window.location.href = "crear_expediente.php";
                            }
                        }
                <?php } ?>
                    ],
            "processing": true,
            "serverSide": true,
            "sAjaxSource": '../config/serverside_expuser.php',
            "initComplete": () => {
                $("#datatable").show();
            },
            "columns": 
            [
                {data: [0]},
                {data: [1]},
                {data: [2]},
                {data: [3]},
                {data: [4]},
                {data: [5], visible: false, searchable: false},
                {data: [6], searchable: false}
            ],
            "columnDefs": 
            [
                {
                    target: [0],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left'>" +
                                "<span>" + row[0] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [1],
                    render: function (data, type, row) {
                        if(row[5] === null){
                            return(
                                "<div class='flex items-center gap-3'>" +
                                    "<img class='w-6 h-6 rounded-full shrink-0' src='../src/img/default-user.png'>"+
                                    "<span>" + row[1] + "</span>" +
                                "</div>"
                            );
                        }else{
                            return(
                                "<div class='flex items-center gap-3'>" +
                                    "<img class='w-6 h-6 rounded-full shrink-0' src='../src/img/imgs_uploaded/"+row[5]+"' onerror='this.onerror=null; this.src=\"../src/img/not_found.jpg\"'>"+
                                    "<span>" + row[1] + "</span>" +
                                "</div>"
                            );
                        }
                    }
                },
                {
                    target: [2],
                    render: function (data, type, row) {
                        if(row[2] == "ALTA"){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span class='bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs'>ALTA</span>" +
                                "</div>"
                            );
                        }else if(row[2] == "BAJA"){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span class='bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs'>BAJA</span>" +
                                "</div>"
                            );
                        }else if(row[2] == "DESTAJO"){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span class='bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs'>DJO</span>" +
                                "</div>"
                            );
                        }
                    }
                },
                {
                    target: [3],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row[3] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [4],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row[4] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [6],
                    render: function (data, type, row) {
                        return (
                            "<div class='flex item-center justify-start md:justify-center gap-3'>" +
                                <?php if (Permissions::CheckPermissions($_SESSION["id"], "Ver expediente") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Ver'>" +
                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                                    "</svg>"+
                                "</div>" +
                                <?php 
                                }
                                if (Permissions::CheckPermissions($_SESSION["id"], "Editar expediente") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
                                ?>
                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Editar'>" +
                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                                    "</svg>" +
                                "</div>" +
                                <?php 
                                } 
                                if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar expediente") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") {
                                ?>
                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>" +
                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>" +
                                    "</svg>" +
                                "</div>" +
                                <?php } ?>
                            "</div>"
                        );
                    }
                }
            ]
        });
    });


    $(document).ready(function () {
    $('.dataTables_filter input[type="search"]').
    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-600');

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Ver expediente") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        $('#datatable').on('click', 'tr .Ver', function () {
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
            window.location.href = "ver_expediente.php?idExpediente="+data[6]+""; 
        });
    <?php } ?>

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar expediente") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
        $('#datatable').on('click', 'tr .Editar', function () {
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
            window.location.href = "editar_expediente.php?idExpediente="+data[6]+""; 
        });
    <?php } ?>

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar expediente") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
    $('#datatable').on('click', 'tr .Eliminar', function() {
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
                            var eliminarid = data[6];
                            var fd = new FormData();
                            fd.append('id', eliminarid);
                            $.ajax({
                                url: "../ajax/eliminar/tabla_expedientes/eliminarexpediente.php",
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

    <?php
    if(basename($_SERVER['PHP_SELF']) == 'expedientes.php'){?>
        var dropdown = document.getElementById('catalogos');
        dropdown.classList.remove("hidden");
    <?php } ?>
    });
</script>
<style>
    .dataTables_wrapper .dataTables_filter{
        float:left;
        text-align:left;
        padding-bottom:5px;
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
    }

    .search{
        margin: auto !important;
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
</style>