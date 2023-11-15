<script>
document.addEventListener("DOMContentLoaded", function() {
    $("#datatable").DataTable({
        responsive:true,
            "ordering": false,
            "sPaginationType": "numbers",
            language: {
                search: "",
                "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        paginate: {
                            previous: "Anterior",
                            next: "Siguiente"
                        }
            },
        dom: '<"top"fB>rt<"bottom"lip><"clear">',
        buttons: [
            {
                text: "<i class='mdi mdi-account-box-multiple text-white font-semibold text-lg'></i>Administrar categorías",
                attr: {
                    'id': 'categorias',
                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                },
                className: 'btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg shadow-xl font-medium text-white',
                action: function(e, dt, node, config) {
                    window.location.href = "permisocategoria.php";
                }
            },
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear permiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
				{
					text: "<i class='mdi mdi-account-lock text-white font-semibold text-lg'></i> Crear Permiso",
					attr: {
						'id': 'permiso',
                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
					},
					className: 'btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg shadow-xl font-medium text-white'
				}
            <?php } ?>
				],
        "processing": true,
		"serverSide": true,
		"sAjaxSource": '../config/serverside_permiso.php',
        "initComplete": () => {$("#datatable").show();},
        "columns": [
            { 
                data: null, render: function ( data, type, row ) {
                    return (
                    "<div class='py-3 text-left'>" +
                    "<div class='flex items-center'>" +
                    "<div class='mr-2 shrink-0'>" +
                    "<svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='currentColor' d='M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M12 18.2C12 17.24 12.5 16.34 13.2 15.74V15.5C13.2 15.11 13.27 14.74 13.38 14.38C12.35 14.14 11.21 14 10 14C5.58 14 2 15.79 2 18V20H12V18.2M22 18.3V21.8C22 22.4 21.4 23 20.7 23H15.2C14.6 23 14 22.4 14 21.7V18.2C14 17.6 14.6 17 15.2 17V15.5C15.2 14.1 16.6 13 18 13C19.4 13 20.8 14.1 20.8 15.5V17C21.4 17 22 17.6 22 18.3M19.5 15.5C19.5 14.7 18.8 14.2 18 14.2C17.2 14.2 16.5 14.7 16.5 15.5V17H19.5V15.5Z' /></svg>" +
                    "</div>" +
                    "<span>" + row[1] + "</span>" +
                    "</div>" +
                    "</div>");
                }
            },
            { 
                data: null, render: function ( data, type, row ) {
                    return (
                    "<div class='py-3 text-left'>" +
                    "<div class='flex items-center'>" +
                    "<div class='mr-2 shrink-0'>" +
                    "<svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='currentColor' d='M4,2C2.89,2 2,2.89 2,4V14H4V4H14V2H4M8,6C6.89,6 6,6.89 6,8V18H8V8H18V6H8M12,10C10.89,10 10,10.89 10,12V20C10,21.11 10.89,22 12,22H20C21.11,22 22,21.11 22,20V12C22,10.89 21.11,10 20,10H12Z' /></svg>" +
                    "</div>" +
                    "<span>" + row[2] + "</span>" +
                    "</div>" +
                    "</div>");
                }
            },
            {
                data: null, render: function ( data, type, row ) {
                    return  (
                   "<div class='py-3 text-left'>"+
                        "<div class='flex item-center justify-end'>"+
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar permiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Edit'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>"+
                                "</svg>"+
                            "</div>"+
                        <?php } ?>
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar permiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>"+
                                "</svg>"+
                            "</div>"+
                        <?php } ?>
                        "</div>"+
                   "</div>");
                }
            },
        ]
    });
    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear permiso") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Editar permiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
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

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear permiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
    $('.dt-buttons').on('click', '#permiso', function(){
        $('.modal-wrapper-flex').html(
            "<div class='flex-col gap-3 items-center flex sm:flex-row'>"+
            "<div class='modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-celeste-100 sm:mx-0 sm:h-10 sm:w-10'><i class='mdi mdi-account-lock text-black font-semibold text-lg'></i></div>"+
            "<h3 class='text-lg font-medium text-gray-900'>Crear permiso</h3>"+
            "</div>"+
            "<div class='modal-content text-center w-full mt-3 sm:mt-0 sm:text-left'>"+
                "<div class='grid grid-cols-1 mt-5 mx-6 px-3'>"+
                    "<label class='uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Nombre del permiso</label>"+
                    "<div class='group flex'>"+
                        "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><i class='mdi mdi-account-lock text-gray-400 text-lg'></i></div>"+
                        "<input class='w-full -ml-10 pl-10 py-2 px-3 rounded-lg border-2 border-celeste-600 mt-1 focus:outline-none focus:ring-2 focus:ring-celeste-800 focus:border-transparent' type='text' id='crearpermiso' name='crearpermiso' placeholder='Nombre del permiso'>"+
                    "</div>"+
                "</div>"+
                "<div class='grid grid-cols-1 mt-5 mx-6 px-3'>"+
                    "<label class='uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Seleccionar categoría</label>"+
                    "<div class='group flex'>"+
                        "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><i class='mdi mdi-account-lock text-gray-400 text-lg'></i></div>"+
                        "<select class='w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent' id='category' name='category'>"+
							"<option value=''>---Seleccione---</option>"+
							"<?php
							  $categorias = categorias::FetchCategorias();
							  foreach ($categorias as $row) {
								echo "<option value='" . $row->id . "'>";
								echo "" . $row->nombre . "";
								echo "</option>";
							  }
							?>"+
						"</select>"+
                    "</div>"+
                "</div>"+ 
            "</div>");
        $('.modal-actions').html(
            "<button id='crear-permiso' class='w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 btn-celeste font-medium text-white hover:btn-celeste focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-celeste-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm'>Crear</button>"+
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
            highlight: function(element) {
                $(element).removeClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
                $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
            },
            unhighlight: function(element) {
                $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                $(element).addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
            },
                    rules: {
                        crearpermiso: {
                            required: true,
                            remote: "../ajax/validacion/permisos/checkpermiso.php"
                        },
                        category: {
					        required: true
				        }
                    },
                    messages: {
                        crearpermiso: {
                            required: 'Por favor, ingresa un permiso',
                            remote: 'Ese permiso ya existe, por favor escriba otro'
                        },
                        category: {
					        required: 'Por favor, selecciona una categoria, en caso de que no exista, crear una'
				        }
                    },
                    submitHandler: function(form) {
                        check_user_logged().then((response) => {
		                    if(response == "true"){
                                var fd = new FormData();
                                var permisos = strtoupper($("input[name=crearpermiso]").val());
                                var categorias = $("#category").val();
                                var app = "permisos";
                                var method = "store";
                                fd.append('permisos', permisos);
                                fd.append('categorias', categorias);
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

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar permiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
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
            "<div class='modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-celeste-100 sm:mx-0 sm:h-10 sm:w-10'><i class='mdi mdi-account-lock text-black font-semibold text-lg'></i></div>"+
            "<h3 class='text-lg font-medium text-gray-900'>Editar permiso</h3>"+
            "</div>"+
            "<div class='modal-content text-center w-full mt-3 sm:mt-0 sm:text-left'>"+
                "<div class='grid grid-cols-1 mt-5 mx-6 px-3'>"+
                    "<label class='uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Editar el permiso</label>"+
                    "<div class='group flex'>"+
                        "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><i class='mdi mdi-account-lock text-gray-400 text-lg'></i></div>"+
                        "<input class='w-full -ml-10 pl-10 py-2 px-3 rounded-lg border-2 border-celeste-600 mt-1 focus:outline-none focus:ring-2 focus:ring-celeste-800 focus:border-transparent' type='text' id='editpermiso' name='editpermiso' placeholder='Nombre del permiso' value='"+data[1]+"'>"+
                    "</div>"+
                "</div>"+
                "<div class='grid grid-cols-1 mt-5 mx-6 px-3'>"+
                    "<label class='uppercase md:text-sm text-xs text-gray-500 text-light font-semibold'>Seleccionar categoría</label>"+
                    "<div class='group flex'>"+
                        "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><i class='mdi mdi-account-lock text-gray-400 text-lg'></i></div>"+
                        "<select class='w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent' id='editarcategory' name='editarcategory'>"+
							"<option value=''>---Seleccione---</option>"+
							"<?php
							  $categorias = categorias::FetchCategorias();
							  foreach ($categorias as $row) {
								echo "<option value='" . $row->id . "'>";
								echo "" . $row->nombre . "";
								echo "</option>";
							  }
							?>"+
						"</select>"+
                    "</div>"+
                "</div>"+
            "</div>");
        $('.modal-actions').html(
            "<button id='editar-permiso' class='w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 btn-celeste font-medium text-white hover:btn-celeste focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-celeste-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm'>Editar</button>"+
            "<button id='close-modal' type='button' class='w-full inline-flex justify-center rounded-md border border-gray-300 shadow-md px-4 py-2 mt-3 bg-white font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm'>Cerrar</button>"
        );
        let element = document.getElementById('editarcategory');
		element.value = data[3];
        openModal();
        resetFormValidator("#Guardar");
        $('#Guardar').unbind('submit'); 		
        $('#Guardar').validate({
            ignore: [],
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent('.group.flex'));
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
                        editpermiso: {
                            required: true,
                            remote: {
                                url: "../ajax/validacion/permisos/checkeditpermiso.php",
                                type: "post",
                                data: {
                                    "editarid": data[0]
                                }
                            }
                        },
                        editarcategory: {
					        required: true
				        }
                    },
                    messages: {
                        editpermiso: {
                            required: 'Por favor, ingresa un permiso',
                            remote: 'Ese permiso ya existe, por favor, escriba otro'
                        },
                        editarcategory: {
					        required: 'Por favor, selecciona una categoria'
				        }
                    },
                    submitHandler: function(form) {
                        check_user_logged().then((response) => {
		                    if(response == "true"){
                                var fd = new FormData();
                                var permisos = $("input[name=editpermiso]").val();
                                var categorias = $("#editarcategory").val();
                                var app = "permisos";
                                var method = "edit";
                                var id = data[0];
                                fd.append('permisos', permisos);
                                fd.append('categorias', categorias);
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
                                                title: "Permiso Editado",
                                                text: "Se ha editado un permiso exitosamente!",
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
    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium');
    <?php
    if(basename($_SERVER['PHP_SELF']) == 'permisos.php'){?>
        var dropdown = document.getElementById('catalogos');
        dropdown.classList.remove("hidden");
    <?php } ?>
});

<?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar permiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
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
                        var eliminarid = data[0];
                        var fd = new FormData();
                        fd.append('id', eliminarid);
                        $.ajax({
                            url: "../ajax/eliminar/tabla_permisos/eliminarpermiso.php",
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

.error{
    color: rgb(250 30 45);
}

.dataTables_wrapper .dataTables_filter{
    float:left;
    text-align:left;
    padding-bottom:5px;
    padding-top:13px;
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

.dataTables_length select {
    width: 87px !important;
    box-shadow: 1px 2px 0px !important;
    width: 70px !important;
}

.dataTables_length label {
    margin-right: 10px; 
    font-size: 14px; 
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current{
  color: #fff !important;
  float: left !important;
  padding: 8px 16px !important;
  text-decoration: none !important;
  transition: background-color .3s !important;
  margin: 0 4px !important;
  background: #000 !important;
  display:flex;
  align-items:center;
  justify-content: center;
  position:relative;
  border-radius: 100px !important;
}

.paginate_button{
  float: left !important;
  padding: 8px 16px !important;
  text-decoration: none !important;
  transition: background-color .3s !important;
  margin: 0 4px !important;
  border-radius: 100px !important;
}
    </style>

