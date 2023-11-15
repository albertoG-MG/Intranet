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
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear roles") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
				{
					text: "<i class='mdi mdi-account-eye text-white font-semibold text-lg'></i> Crear Rol",
					attr: {
						'id': 'Rol',
                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
					},
					className: 'btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg shadow-xl font-medium text-white',
					action: function(e, dt, node, config) {
						window.location.href = "crear_rol.php";
					}
				},
            <?php } ?>
                {
                    text: "<i class='mdi mdi-account-supervisor-circle text-white font-semibold text-lg'></i>Administrar subroles",
                    attr: {
                        'id': 'Subroles',
                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                    },
                    className: 'btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg shadow-xl font-medium text-white',
                    action: function(e, dt, node, config) {
                        window.location.href = "subroles.php";
                    }
                },
            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a permisos") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
                {
                    text: "<i class='mdi mdi-account-lock text-white font-semibold text-lg'></i> Ver Permisos",
					attr: {
						'id': 'Permisos',
                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
					},
					className: 'btn-celeste hover:bg-celeste-700 focus:bg-celeste-700 text-white rounded-lg shadow-xl font-medium text-white',
					action: function(e, dt, node, config) {
						window.location.href = "permisos.php";
					}
                }
            <?php } ?>
				],
        "processing": true,
		"serverSide": true,
		"sAjaxSource": '../config/serverside_rol.php',
        "initComplete": () => {$("#datatable").show();},
        "columns": [
        {
            data: null,
            "render": function(data, type, row) {
                return (
                    "<div class='py-3 text-left'>" +
                    "<div class='flex items-center'>" +
                    "<div class='mr-2 shrink-0'>" +
                    "<svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='currentColor' d='M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M9.14 19.75L8.85 19L9.14 18.25C9.84 16.5 11.08 15.14 12.61 14.22C11.79 14.08 10.92 14 10 14C5.58 14 2 15.79 2 18V20H9.27C9.23 19.91 9.18 19.83 9.14 19.75M17 18C16.44 18 16 18.44 16 19S16.44 20 17 20 18 19.56 18 19 17.56 18 17 18M23 19C22.06 21.34 19.73 23 17 23S11.94 21.34 11 19C11.94 16.66 14.27 15 17 15S22.06 16.66 23 19M19.5 19C19.5 17.62 18.38 16.5 17 16.5S14.5 17.62 14.5 19 15.62 21.5 17 21.5 19.5 20.38 19.5 19Z'></path></svg>" +
                    "</div>" +
                    "<span>" + row[1] + "</span>" +
                    "</div>" +
                    "</div>");
            }
        },
        {
            data: null,
            "render": function(data, type, row) {
                return (
                    "<div class='py-3 text-left'>" +
                    "<div class='flex items-center'>" +
                    "<div class='mr-2 shrink-0'>" +
                    "<svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='currentColor' d='M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z' /></svg>" +
                    "</div>" +
					(row[2] == null && row[3] == null ? "<span>Sin jerarquia</span>" : (row[2] != null && row[3] == null ? "<span>Sin jefe</span>" : "<span>" + row[3] + "</span>"))+
                    "</div>" +
                    "</div>");
            }
        },
        {
            data: null,
            render: function(data, type, row) {
                return (
                    "<div class='py-3 text-left'>" +
                    "<div class='flex item-center justify-end'>" +
                    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar roles") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
                    "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Editar'>" +
                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                    "</svg>" +
                    "</div>" +
                    <?php } ?>
                    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar roles") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
                    "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>" +
                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>" +
                    "</svg>" +
                    "</div>" +
                    <?php } ?>
                    "</div>" +
                    "</div>");
            }
        }
        ]
    });
    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar roles") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
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
            window.location.href = "editar_rol.php?idRol="+data[0]+""; 
        });
    <?php } ?>

    <?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar roles") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador") { ?>
        $('#datatable').on('click', 'tr .Eliminar', function(){
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
                                    url: "../ajax/eliminar/tabla_roles/eliminarrol.php",
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
                    console.log(error)
                })
            })
        });
    <?php } ?>


});
$(document).ready(function() {
    $('.dataTables_filter input[type="search"]').
    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium')
});

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
if(basename($_SERVER['PHP_SELF']) == 'roles.php'){?>
    var dropdown = document.getElementById('catalogos');
    dropdown.classList.remove("hidden");
<?php } ?>
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
}

tr.odd:hover, tr.even:hover{
    background: rgb(243 244 246 / var(--tw-bg-opacity)) !important
}
tr.odd{
    font-size: 13px !important;
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

