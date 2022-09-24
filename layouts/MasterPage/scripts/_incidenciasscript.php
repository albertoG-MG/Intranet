<script>
  document.addEventListener("DOMContentLoaded", function() {
        var buttonlist = 0;
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
                        <?php 
                        if($count_jerarquia > 0){
                            if($fetch_jerarquia != null){
                        ?>
                        {
                            text: "<i class='mdi mdi-clock text-white font-semibold text-lg'></i>Mis Pendientes",
                            attr: {
                                'id': 'mis_incidencias_pendientes',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
                            action: function ( e, dt, node, config ) {
                                $.ajax({
                                    url: "../config/incidencias/mi_incidencia_pendiente.php",
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
                                        buttonlist = 0;
                                        var sueldo = table.column(6);
                                        sueldo.visible(false);  
                                        table.column().cells().invalidate().render();
                                        table.columns.adjust().responsive.recalc();
                                    
                                    }, error: function(response) {
                                        console.log(response);
                                    }
                                })
                            }
                        },
                        <?php 
                            }
                        }
                        if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Director general"){
                        ?>	
                        {
                            text: "<i class='mdi mdi-clock text-white font-semibold text-lg'></i> Pendientes",
                            attr: {
                                'id': 'incidencias_pendientes',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/incidencias/incidencia_pendiente.php",
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
										 buttonlist = 0;
                                         var sueldo = table.column(6);
                                         sueldo.visible(false);  
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
                        <?php 
                        }  
                        if($count_jerarquia > 0){
                            if($fetch_jerarquia != null){
                        ?>
                        {
							text: "<i class='mdi mdi-check-bold text-white font-semibold text-lg'></i>Mis Aprobadas",
							attr: {
								'id': 'mis_incidencias_aprobadas',
								'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
							},
							className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/incidencias/mi_incidencia_aprobada.php",
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
										 buttonlist = 1;
										 var sueldo = table.column(6);
										 sueldo.visible(true); 
										 table.column().cells().invalidate().render();
										 table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
						},
                        <?php 
							}
						}
                        if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Director general"){
						?>
                        {
                            text: "<i class='mdi mdi-check-bold text-white font-semibold text-lg'></i> Aprobadas",
                            attr: {
                                'id': 'incidencias_aprobadas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/incidencias/incidencia_aprobada.php",
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
										 buttonlist = 1;
                                         var sueldo = table.column(6);
                                         sueldo.visible(true); 
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
                        <?php 
                        }  
                        if($count_jerarquia > 0){
                            if($fetch_jerarquia != null){
                        ?>
                        {
                            text: "<i class='mdi mdi-close-thick text-white font-semibold text-lg'></i>Mis Rechazadas",
                            attr: {
                                'id': 'mis_incidencias_rechazadas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/incidencias/mi_incidencia_rechazada.php",
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
										 buttonlist = 1;
                                         var sueldo = table.column(6);
                                         sueldo.visible(true); 
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
                        <?php 
							}
						}
                        if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Director general"){
						?>
                        {
                            text: "<i class='mdi mdi-close-thick text-white font-semibold text-lg'></i> Rechazadas",
                            attr: {
                                'id': 'incidencias_rechazadas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/incidencias/incidencia_rechazada.php",
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
										 buttonlist = 1;
                                         var sueldo = table.column(6);
                                         sueldo.visible(true); 
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
                        <?php 
                        }  
                        if($count_jerarquia > 0){
                            if($fetch_jerarquia != null){
                        ?>
                        {
                            text: "<i class='mdi mdi-alert-circle text-white font-semibold text-lg'></i>Mis Canceladas",
                            attr: {
                                'id': 'mis_incidencias_canceladas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/incidencias/mi_incidencia_cancelada.php",
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
										 buttonlist = 1;
                                         var sueldo = table.column(6);
                                         sueldo.visible(true); 
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
                        <?php 
							}
						}
						if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Director general"){
						?>
                        {
                            text: "<i class='mdi mdi-alert-circle text-white font-semibold text-lg'></i> Canceladas",
                            attr: {
                                'id': 'incidencias_canceladas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/incidencias/incidencia_cancelada.php",
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
										 buttonlist = 1;
                                         var sueldo = table.column(6);
                                         sueldo.visible(true); 
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
                        <?php 
                        }  
                        if($count_jerarquia > 0){
                            if($fetch_jerarquia != null){
                        ?>
                        {
                            text: "<i class='mdi mdi-newspaper-variant text-white font-semibold text-lg'></i> Mis incidencias evaluadas",
                            attr: {
                                'id': 'mis_incidencias',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/ajax_incidencias.php",
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
										 buttonlist = 1;
                                         var sueldo = table.column(6);
                                         sueldo.visible(true); 
										 table.column().cells().invalidate().render();
										 table.columns.adjust().responsive.recalc();				
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
                        <?php 
							}
						}
						if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Director general"){
						?>
                        {
                            text: "<i class='mdi mdi-eye text-white font-semibold text-lg'></i> Desplegar todo",
                            attr: {
                                'id': 'incidencias_desplieguetodo',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/incidencias/incidencia_desplieguetodo.php",
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
										 buttonlist = 0; 
										 table.column().cells().invalidate().render();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
                        <?php } ?>
                        {
                            text: "<i class='mdi mdi-bus text-white font-semibold text-lg'></i> Solicitar vacaciones",
                            attr: {
                                'id': 'vacaciones',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
                            action: function ( e, dt, node, config ) {
                                
                            }
                        },
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a solicitud incidencias") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                        {
                            text: "<i class='mdi mdi-eye text-white font-semibold text-lg'></i> Ver Solicitudes",
                            attr: {
                                'id': 'incidencias_solpendientes',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
							action: function ( e, dt, node, config ) {
								window.location.href = "solicitud_incidencia.php";
							}
                        },
                        <?php } ?>
                        <?php 
                        if (Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { 
                            if($count_jerarquia > 0){
                                if($fetch_jerarquia != null){
                        ?>
						{
                            text: "<i class='mdi mdi-beaker-plus text-white font-semibold text-lg'></i> Crear Incidencia",
                            attr: {
                                'id': 'Incidencia',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white <?php if($count_block > 0){ echo "disabled"; } ?>',
                            action: function(e, dt, node, config) {
                                window.location.href = "crear_incidencia.php";
                            }
                        }
                        <?php 
                                }
                            }
                        } 
                        ?>
                    ],
            "ajax":{
                <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Director general"){ ?>
                "url": "../config/incidencias/incidencia_pendiente.php",
                <?php }else{ ?>
                "url": "../config/incidencias/mi_incidencia_pendiente.php",
                <?php } ?>
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
                {"data": "estatus_nombre"},
                { data: null, visible:false, render: function ( data, type, row ) {
                    if(row["sueldo"] == 0){
                        return "<div class='w-full text-center'><span>No</span></div>";
                    }else if(row["sueldo"] == 1){
                        return "<div class='w-full text-center'><span>Sí</span></div>";
                    }else{
                        return "<div class='w-full text-center'><span>Sin datos</span></div>";
                    }
	            }},
                { data: null, render: function ( data, type, row ) {
                    if(buttonlist == 0){
                        return     (
                            "<div class='py-3 text-left'>" +
                            "<div class='flex item-center justify-center data'>" +
                            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Ver incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Ver'>" +
                            "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                            "</svg>"+
                            "</div>" +
                            <?php } ?>
                            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Editar'>" +
                            "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                            "</svg>" +
                            "</div>" +
                            <?php } ?>
                            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>" +
                            "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>" +
                            "</svg>" +
                            "</div>" +
                            <?php } ?>
                            "</div>" +
                            "</div>"
                        );	
					}else if(buttonlist == 1){
						return     (
                            "<div class='py-3 text-left'>" +
                            "<div class='flex item-center justify-center data'>" +
                            <?php if (Permissions::CheckPermissions($_SESSION["id"], "Ver incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Ver'>" +
                            "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                            "</svg>"+
                            "</div>" +
                            <?php } ?>
                            "</div>" +
                            "</div>"
                        );	
					}
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
                    container.classList.add('flex-[1_0_21%]', 'm-[5px]');
                    boton.append(container);
                    container.append(array[j]);
                }
                $('#DT-div').show();
                table.columns.adjust().responsive.recalc();
            }
        });
    });



	$(document).ready(function () {
		$('.dataTables_filter input[type="search"]').
		attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium');

        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Ver incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>    
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
            window.location.href = "ver_incidencia.php?idIncidencia="+data['incidenciaid']+""; 
        });
        <?php } ?>

        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Editar incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>    
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
            window.location.href = "editar_incidencia.php?idIncidencia="+data['incidenciaid']+""; 
        });
        <?php } ?>

        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Eliminar incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
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
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'éxito',
                        text: 'La fila ha sido eliminada!'
                    }).then(function() {
                        var eliminarid = data["incidenciaid"];
                        var fd = new FormData();
                        fd.append('id', eliminarid);
                        $.ajax({
                            url: "../ajax/eliminar/tabla_incidencias/eliminarincidencia.php",
                            type: "post",
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function(result) {
                                table.ajax.reload();
                            }
                        });
                    });
                }
            })
        });
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