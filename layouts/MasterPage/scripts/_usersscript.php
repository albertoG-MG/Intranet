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
        buttons: [{
					text: "<i class='mdi mdi-account-outline text-white font-semibold text-lg'></i> Agregar usuario",
					attr: {
						'id': 'Usuario',
                        'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
					},
					className: 'Agregar bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
					action: function(e, dt, node, config) {
						window.location.href = "crear_usuario.php";
					}
				}],
        "processing": true,
		"serverSide": true,
		"sAjaxSource": '../config/serverside_user.php',
        "initComplete": () => {$("#datatable").show();},
        "columnDefs": [{
            "render": function(data, type, row) {
                return (
								"<div class='py-3 text-left'>" +
								    "<div class='flex items-center'>" +
                                        "<div class='mr-2 shrink-0'>"+
                                            "<img class='w-6 h-6 rounded-full' src='https://randomuser.me/api/portraits/men/1.jpg'>"+
                                        "</div>"+
                                        "<span>"+row[2]+ ' ' +row[3]+ ' ' +row[4]+"</span>"+
								    "</div>" +
								"</div>");
            },
            "targets": 0
        },
        {
            "render": function(data, type, row) {
                var email = row[5].split("@");
                return(
                    "<div class='py-3 text-left'>"+
                        "<div class='flex items-center'>"+
                            "<div class='mr-2'>"+
                                "<i class='w-6 h-6 mdi mdi-email text-gray-400 text-lg'></i>"+
                            "</div>"+
                            "<span class='font-medium'>"+email[0]+ ' @ ' +email[1]+"</span>"+
                        "</div>"+
                    "</div>");
            },
            "targets": 1
        },
        {
            "render": function(data, type, row) {
                return (
                    "<div class='py-3 text-left'>"+
                        "<span class='bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs'>Active</span>"+
                    "</div>");
            },
            "targets": 2
        },
        {
            "render": function(data, type, row) {
                return(
                    "<div class='text-left lg:text-center py-3'>"+
                        "<span>"+row[8]+"</span>"+
                    "</div>");
            },
            "targets": 3
        },
        {
            "render": function(data, type, row) {
               return  (
                   "<div class='py-3 text-left'>"+
                        "<div class='flex item-center justify-center'>"+
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer' onclick='Editaruser("+row[0]+"); return false;'>"+
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
            "targets": 4
        }
        ]
    });
});
$(document).ready(function() {
    $('.dataTables_filter input[type="search"]').
    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium')
});

function Editaruser(id){
    var EditarElemento = id;
    location.href = "editar_usuario.php?idUser=" +EditarElemento;
}

$('#datatable').on( 'click', 'tr .Eliminar', function () {
    var table = $('#datatable').DataTable();
    var tr = $(this).closest('tr');
    var row = table.row(tr);
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
                    url: "../ajax/eliminaruser.php",
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
    })
});


<?php
if(basename($_SERVER['PHP_SELF']) == 'users.php'){?>
    var dropdown = document.getElementById('catalogos');
    dropdown.classList.remove("hidden");
<?php } ?>
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

