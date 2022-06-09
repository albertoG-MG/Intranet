<script>
document.addEventListener("DOMContentLoaded", function() {
    $("#datatable").DataTable({
        responsive:true,
        "lengthChange": false,
        "sPaginationType": "listboxWithButtons",
        language: {
					search: ""
		},
        dom: '<"top"fB>rt<"bottom"ip><"clear">',
        buttons: [
				{
					text: "<i class='mdi mdi-lock-outline text-white font-semibold text-lg'></i> Crear Permiso",
					attr: {
						'id': 'open-modal',
                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
					},
					className: 'bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white'
				}
				],
        "processing": true,
		"serverSide": true,
		"sAjaxSource": '../config/serverside_permiso.php',
        "initComplete": () => {$("#datatable").show();},
        "columns": [
            { 
                data: null, render: function ( data, type, row ) {
                return row[0];
                }
            },
            { 
                data: null, render: function ( data, type, row ) {
                return row[1];
                }
            },
            {
                data: null, render: function ( data, type, row ) {
                    return  (
                   "<div class='py-3 text-left'>"+
                        "<div class='flex item-center justify-end'>"+
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Edit'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>"+
                                "</svg>"+
                            "</div>"+
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>"+
                                "</svg>"+
                            "</div>"+
                        "</div>"+
                   "</div>");
                },
                orderable: false
            },
        ]
    });
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

    $('.dt-buttons').on('click', '.dt-button', function(){
        $('.modal-content').html(
            "<h3 class='text-lg font-medium text-gray-900'>Crear permiso</h3>"+
            "<div class='grid grid-cols-1 mt-5 mx-6'>"+
                "<label class='uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Nombre del permiso</label>"+
                "<div class='group flex'>"+
                    "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><i class='mdi mdi-lock-outline text-gray-400 text-lg'></i></div>"+
                    "<input class='w-full -ml-10 pl-10 py-2 px-3 rounded-lg border-2 border-indigo-600 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:border-transparent' type='text' id='crearpermiso' name='crearpermiso' placeholder='Input 1'>"+
                "</div>"+
            "</div>");
        $('.modal-actions').html(
            "<button id='crear-permiso' class='w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm'>Crear</button>"+
            "<button id='close-modal' type='button' class='w-full inline-flex justify-center rounded-md border border-gray-300 shadow-md px-4 py-2 mt-3 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm'>Cerrar</button>"
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
                        crearpermiso: {
                            required: true,
                            remote: "../ajax/checkpermiso.php"
                        }
                    },
                    messages: {
                        crearpermiso: {
                            required: 'Por favor, ingresa un permiso',
                            remote: 'Ese permiso ya existe, por favor escriba otro'
                        }
                    },
                    submitHandler: function(form) {
                        var fd = new FormData();
                        var permisos = $("input[name=crearpermiso]").val();
                        var app = "permisos";
                        var method = "store";
                        fd.append('permisos', permisos);
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
                                        title: "Permiso Creado",
                                        text: "Se ha creado un permiso exitosamente!",
                                        icon: "success"
                                    }).then(function() {
                                        table.ajax.reload(null, false);
                                        });
                                }
                            }
                        });
                        return false;
                    }
        });
    });

    $('#datatable').on( 'click', 'tr .Edit', function () {
        var table = $('#datatable').DataTable();
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var data = row.data();
        $('.modal-content').html(
            "<h3 class='text-lg font-medium text-gray-900'>Editar permiso</h3>"+
            "<div class='grid grid-cols-1 mt-5 mx-6'>"+
                "<label class='uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Editar el permiso</label>"+
                "<div class='group flex'>"+
                    "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><i class='mdi mdi-lock-outline text-gray-400 text-lg'></i></div>"+
                    "<input class='w-full -ml-10 pl-10 py-2 px-3 rounded-lg border-2 border-indigo-600 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:border-transparent' type='text' id='editpermiso' name='editpermiso' value='"+data[1]+"'>"+
                "</div>"+
            "</div>");
        $('.modal-actions').html(
            "<button id='editar-permiso' class='w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-indigo-700 font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm'>Editar</button>"+
            "<button id='close-modal' type='button' class='w-full inline-flex justify-center rounded-md border border-gray-300 shadow-md px-4 py-2 mt-3 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm'>Cerrar</button>"
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
                        editpermiso: {
                            required: true
                        }
                    },
                    messages: {
                        editpermiso: {
                            required: 'Por favor, ingresa un permiso'
                        }
                    },
                    submitHandler: function(form) {
                        var fd = new FormData();
                        var permisos = $("input[name=editpermiso]").val();
                        var app = "permisos";
                        var method = "edit";
                        fd.append('permisos', permisos);
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
                                        title: "Permiso Editado",
                                        text: "Se ha editado un permiso exitosamente!",
                                        icon: "success"
                                    }).then(function() {
                                        table.ajax.reload(null, false);
                                        });
                                }
                            }
                        });
                        return false;
                    }
        });
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
});
$(document).ready(function() {
    $('.dataTables_filter input[type="search"]').
    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium');
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
        margin:auto !important;
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

