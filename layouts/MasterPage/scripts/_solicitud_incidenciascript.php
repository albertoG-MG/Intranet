<script>
	document.addEventListener("DOMContentLoaded", function() {
        var evaluation_buttons=0;
        var goce_sueldo=0;
        $("#datatable").DataTable({
            responsive:true,
            "lengthChange": false,
            "ordering": false,
            "sPaginationType": "listboxWithButtons",
            language: {
                        search: ""
            },
            dom: '<"grid grid-cols-1"f>Brt<"bottom"ip><"clear">',
            buttons: [
						{
                            text: "<i class='mdi mdi-clock text-white font-semibold text-lg'></i> Solicitudes pendientes",
                            attr: {
                                'id': 'sol_pendientes',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/ajax_solicitud_incidencia.php",
									method: 'POST',
									data:{
										"rol": <?php echo $_SESSION["rol"]; ?>,
										"sessionid": <?php echo $_SESSION["id"]; ?>

									},
									success: function(response) {
										 var table = $('#datatable').DataTable();
										 table.clear().draw();
										 const obj = JSON.parse(response);
										 table.rows.add(obj).draw();
										 evaluation_buttons=0;
										 goce_sueldo=0;
                                         var status = table.column(5);
                                         status.visible(false);
                                         var evaluation = table.column(7);
                                         evaluation.visible(true);
										 table.column().cells().invalidate().render();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
						
						{
                            text: "<i class='mdi mdi-check-bold text-white font-semibold text-lg'></i> Solicitudes Aprobadas",
                            attr: {
                                'id': 'sol_aprobadas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_incidencia/solicitud_aprobada.php",
									method: 'POST',
									data:{
										"rol": <?php echo $_SESSION["rol"]; ?>,
										"sessionid": <?php echo $_SESSION["id"]; ?>

									},
									success: function(response) {
										 var table = $('#datatable').DataTable();
										 table.clear().draw();
										 const obj = JSON.parse(response);
										 table.rows.add(obj).draw();
										 evaluation_buttons=1;
										 goce_sueldo=1;
                                         var status = table.column(5);
                                         status.visible(true);
                                         var evaluation = table.column(7);
                                         evaluation.visible(false);
										 table.column().cells().invalidate().render();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },

                        {
                            text: "<i class='mdi mdi-close-thick text-white font-semibold text-lg'></i> Solicitudes Rechazadas",
                            attr: {
                                'id': 'sol_rechazadas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_incidencia/solicitud_rechazada.php",
									method: 'POST',
									data:{
										"rol": <?php echo $_SESSION["rol"]; ?>,
										"sessionid": <?php echo $_SESSION["id"]; ?>

									},
									success: function(response) {
										 var table = $('#datatable').DataTable();
										 table.clear().draw();
										 const obj = JSON.parse(response);
										 table.rows.add(obj).draw();
										 evaluation_buttons=1;
										 goce_sueldo=1;
                                         var status = table.column(5);
                                         status.visible(true);
                                         var evaluation = table.column(7);
                                         evaluation.visible(false);
										 table.column().cells().invalidate().render();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },

                        {
                            text: "<i class='mdi mdi-alert-circle text-white font-semibold text-lg'></i> Solicitudes Canceladas",
                            attr: {
                                'id': 'sol_canceladas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_incidencia/solicitud_cancelada.php",
									method: 'POST',
									data:{
										"rol": <?php echo $_SESSION["rol"]; ?>,
										"sessionid": <?php echo $_SESSION["id"]; ?>

									},
									success: function(response) {
										 var table = $('#datatable').DataTable();
										 table.clear().draw();
										 const obj = JSON.parse(response);
										 table.rows.add(obj).draw();
										 evaluation_buttons=1;
										 goce_sueldo=1;
                                         var status = table.column(5);
                                         status.visible(true);
                                         var evaluation = table.column(7);
                                         evaluation.visible(false);
										 table.column().cells().invalidate().render();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },

                        {
                            text: "<i class='mdi mdi-eye text-white font-semibold text-lg'></i> Ver todo",
                            attr: {
                                'id': 'ver_todo',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_incidencia/ver_todo.php",
									method: 'POST',
									data:{
										"rol": <?php echo $_SESSION["rol"]; ?>,
										"sessionid": <?php echo $_SESSION["id"]; ?>

									},
									success: function(response) {
										 var table = $('#datatable').DataTable();
										 table.clear().draw();
										 const obj = JSON.parse(response);
										 table.rows.add(obj).draw();
										 evaluation_buttons=1;
										 goce_sueldo=1;
                                         var status = table.column(5);
                                         status.visible(true);
                                         var evaluation = table.column(7);
                                         evaluation.visible(false);
										 table.column().cells().invalidate().render();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        }
					],
            "ajax":{
                "url": "../config/ajax_solicitud_incidencia.php",
                "type": "POST",
                "dataSrc": "",
                "data":{
                    "rol": <?php echo $_SESSION["rol"]; ?>,
                    "sessionid": <?php echo $_SESSION["id"]; ?>

                }
            },
            "columns":[
                {"data": "incidenciaid"},
                { data: null, render: function ( data, type, row ) {
                    return (data.nombre+ ' ' +data.apellido_pat+ ' ' +data.apellido_mat); 
                }},
                {"data": "tipo_incidencia"},
                {"data": "fecha_inicio"},
                {"data": "fecha_fin"},
                {"data": "estatus_nombre", "visible": false},
				{"data": null, render: function ( data, type, row ) {
                    if(goce_sueldo == 0){
							return "<div class='text-center'><input type='checkbox' id='"+data['incidenciaid']+"' value='Check'></div>";
                    }else if(goce_sueldo == 1){
                        if(row["sueldo"] == 0){
                            return "<div class='w-full text-center'><span>No</span></div>";
                        }else if(row["sueldo"] == 1){
                            return "<div class='w-full text-center'><span>Sí</span></div>";
                        }else{
                            return "<div class='w-full text-center'><span>Sin datos</span></div>";
                        } 
                    }
                }},
				{ data: null, render: function ( data, type, row ) {
                    if(evaluation_buttons == 0){
							return '<div class="flex flex-col justify-center md:flex-row gap-4"><button type="button" id="Aprobar" name="Aprobar" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 hover:scale-110 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">Aprobar</button><button type="button" id="Rechazar" name="Rechazar" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 hover:scale-110 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Rechazar</button><button type="button" id="Cancelar" name="Cancelar" class="text-white bg-gray-800 hover:bg-gray-900 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">Cancelar</button></div>';
                    }else{
                        return null;
                    }
                }},
                { data: null, render: function ( data, type, row ) {
                    return (
                        "<div class='py-3 text-left'>" +
                        "<div class='flex item-center justify-center data'>" +
                        "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Ver'>" +
                        "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                        "</svg>"+
                        "</div>" +
                        "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Editar'>" +
                        "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                        "</svg>" +
                        "</div>" +
                        "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>" +
                        "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>" +
                        "</svg>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                    );	
                }}
            ],
            "initComplete": () => {
                var table = $('#datatable').DataTable();
                $('.dt-buttons').attr('id', "botones");
                var boton = document.getElementById('botones');
                boton.classList.add("flex", "flex-col", "md:flex-row", "md:flex-wrap", "w-full");
                var children = boton.childElementCount;
                let array = [];
                for(let i=0; i<children; i++){
                    array[i]=boton.children[i];
                }
                for(let j=0; j<children; j++){
                    var container = document.createElement("div");
                    container.classList.add('flex-[1_0_18%]', 'm-[5px]');
                    boton.append(container);
                    container.append(array[j]);
                }
                $('#DT-div').show();
                table.columns.adjust().responsive.recalc();
            }
        });
    });
	
	$(document).ready(function() {
		$('.dataTables_filter input[type="search"]').
		attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium');

        $('#datatable').on('click', 'tr #Aprobar', function () {
            var estatus=1;
            var sueldo=0;
            var message="sin goce de sueldo?";
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

            if ($('#' + data['incidenciaid']).is(":checked") == true){
                sueldo=1;
                message = "con goce de sueldo?"
            }

            Swal.fire({
                title: 'Aprobar Incidencia',
                text: "¿Está seguro que desea aprobar esta incidencia " +message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                check_user_logged().then((response) => {
                    if(response == "true"){
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'Se ha aprobado la incidencia!'
                            }).then(function() {
                                var fd = new FormData();
                                var incidenciaid = data["incidenciaid"];
                                var method = "store";
                                var app = "solicitud_incidencia";
                                var sessionid = <?php echo $_SESSION["id"]; ?>;
                                fd.append('iduser', sessionid);
                                fd.append('incidenciaid', incidenciaid);
                                fd.append('estatus', estatus);
                                fd.append('sueldo', sueldo);
                                fd.append('method', method);
                                fd.append('app', app);				
                                $.ajax({
                                    type: "POST",
                                    url: "../ajax/class_search.php",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        table.ajax.reload(null, false);
                                    }, error: function(response) {
                                        console.log(response);
                                    }	
                                });		
                            });
                        }else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                            'Cancelado',
                            'Se ha cancelado la operación',
                            'error'
                            )
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

        $('#datatable').on('click', 'tr #Cancelar', function () {
            var estatus=2;
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
                title: 'Cancelar Incidencia',
                text: "¿Está seguro que desea cancelar esta incidencia?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                check_user_logged().then((response) => {
                    if(response == "true"){
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'Se ha cancelado la incidencia!'
                            }).then(function() {
                                var fd = new FormData();
                                var incidenciaid = data["incidenciaid"];
                                var method = "store";
                                var app = "solicitud_incidencia";
                                var sessionid = <?php echo $_SESSION["id"]; ?>;
                                fd.append('iduser', sessionid);
                                fd.append('incidenciaid', incidenciaid);
                                fd.append('estatus', estatus);
                                fd.append('method', method);
                                fd.append('app', app);				
                                $.ajax({
                                    type: "POST",
                                    url: "../ajax/class_search.php",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        table.ajax.reload(null, false);
                                    }, error: function(response) {
                                        console.log(response);
                                    }	
                                });		
                            });
                        }else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                            'Cancelado',
                            'Se ha cancelado la operación',
                            'error'
                            )
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

        $('#datatable').on('click', 'tr #Rechazar', function () {
            var estatus=3;
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
                title: 'Rechazar Incidencia',
                text: "¿Está seguro que desea rechazar esta incidencia?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                check_user_logged().then((response) => {
                    if(response == "true"){
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'Se ha rechazado la incidencia!'
                            }).then(function() {
                                var fd = new FormData();
                                var incidenciaid = data["incidenciaid"];
                                var method = "store";
                                var app = "solicitud_incidencia";
                                var sessionid = <?php echo $_SESSION["id"]; ?>;
                                fd.append('iduser', sessionid);
                                fd.append('incidenciaid', incidenciaid);
                                fd.append('estatus', estatus);
                                fd.append('method', method);
                                fd.append('app', app);				
                                $.ajax({
                                    type: "POST",
                                    url: "../ajax/class_search.php",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        table.ajax.reload(null, false);
                                    }, error: function(response) {
                                        console.log(response);
                                    }	
                                });		
                            });
                        }else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                            'Cancelado',
                            'Se ha cancelado la operación',
                            'error'
                            )
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

        $('#datatable').on('click', 'tr .Ver', function () {
            alert("Ver");
        });

        $('#datatable').on('click', 'tr .Editar', function () {
            alert("Editar");
        });

        $('#datatable').on('click', 'tr .Eliminar', function () {
            alert("Eliminar");
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