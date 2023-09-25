<script>
  <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?> 
    var ButtonEdit = 0;
  <?php } ?>
  document.addEventListener("DOMContentLoaded", function() {
    <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?> 
        var editStatus=0;
    <?php } ?>
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
                        // <?php if($count_jerarquia > 0){ ?>
                        //     {
                        //         text: "Mis incidencias pendientes",
                        //         attr: {
                        //             'id': 'mis_incidencias_pendientes',
                        //             'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        //         },
                        //         className: 'button w-full btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700',
                        //         action: function ( e, dt, node, config ) {
                        //             $.ajax({
                        //                 url: "../config/incidencias/mi_incidencia_pendiente.php",
                        //                 method: 'POST',
                        //                 data:{
                        //                     "rol": <?php echo $_SESSION["rol"]; ?>,
                        //                     "sessionid": <?php echo $_SESSION["id"]; ?>
                        //                 },
                        //                 success: function(response) {
                        //                     <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                        //                         editStatus=0;
                        //                     <?php } ?>
                        //                     var table = $('#datatable').DataTable();
                        //                     table.clear().draw();
                        //                     const obj = JSON.parse(response);
                        //                     table.rows.add(obj).draw();
                        //                     table.column().cells().invalidate().render();
                        //                     table.columns.adjust().responsive.recalc();
                                        
                        //                 }, error: function(response) {
                        //                     console.log(response);
                        //                 }
                        //             })
                        //         }
                        //     },
                        // <?php } ?>
                        // <?php if($count_jerarquia > 0){ ?>
                        //     {
                        //         text: "Mis incidencias aprobadas",
                        //         attr: {
                        //             'id': 'mis_incidencias_aprobadas',
                        //             'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        //         },
                        //         className: 'button w-full btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700',
                        //         action: function ( e, dt, node, config ) {
                        //             $.ajax({
                        //                 url: "../config/incidencias/mi_incidencia_aprobada.php",
                        //                 method: 'POST',
                        //                 data:{
                        //                     "rol": <?php echo $_SESSION["rol"]; ?>,
                        //                     "sessionid": <?php echo $_SESSION["id"]; ?>
                        //                 },
                        //                 success: function(response) {
                        //                     <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                        //                         editStatus=0;
                        //                     <?php } ?>
                        //                     var table = $('#datatable').DataTable();
                        //                     table.clear().draw();
                        //                     const obj = JSON.parse(response);
                        //                     table.rows.add(obj).draw();
                        //                     table.column().cells().invalidate().render();
                        //                     table.columns.adjust().responsive.recalc();
                                        
                        //                 }, error: function(response) {
                        //                     console.log(response);
                        //                 }
                        //             })
                        //         }
                        //     },
                        // <?php } ?>
                        // <?php if($count_jerarquia > 0){ ?>
                        //     {
                        //         text: "Mis incidencias rechazadas",
                        //         attr: {
                        //             'id': 'mis_incidencias_rechazadas',
                        //             'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        //         },
                        //         className: 'button w-full btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700',
                        //         action: function ( e, dt, node, config ) {
                        //             $.ajax({
                        //                 url: "../config/incidencias/mi_incidencia_rechazada.php",
                        //                 method: 'POST',
                        //                 data:{
                        //                     "rol": <?php echo $_SESSION["rol"]; ?>,
                        //                     "sessionid": <?php echo $_SESSION["id"]; ?>

                        //                 },
                        //                 success: function(response) {
                        //                     <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                        //                         editStatus=0;
                        //                     <?php } ?>
                        //                     var table = $('#datatable').DataTable();
                        //                     table.clear().draw();
                        //                     const obj = JSON.parse(response);
                        //                     table.rows.add(obj).draw();
                        //                     table.column().cells().invalidate().render();
                        //                     table.columns.adjust().responsive.recalc();
                                        
                        //                 }, error: function(response) {
                        //                     console.log(response);
                        //                 }
                        //             })
                        //         }
                        //     },
                        // <?php } ?>
                        // <?php if($count_jerarquia > 0){ ?>
                        //     {
                        //         text: "Mis incidencias canceladas",
                        //         attr: {
                        //             'id': 'mis_incidencias_canceladas',
                        //             'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        //         },
                        //         className: 'button w-full btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700',
                        //         action: function ( e, dt, node, config ) {
                        //             $.ajax({
                        //                 url: "../config/incidencias/mi_incidencia_cancelada.php",
                        //                 method: 'POST',
                        //                 data:{
                        //                     "rol": <?php echo $_SESSION["rol"]; ?>,
                        //                     "sessionid": <?php echo $_SESSION["id"]; ?>
                        //                 },
                        //                 success: function(response) {
                        //                     <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                        //                         editStatus=0;
                        //                     <?php } ?>
                        //                     var table = $('#datatable').DataTable();
                        //                     table.clear().draw();
                        //                     const obj = JSON.parse(response);
                        //                     table.rows.add(obj).draw(); 
                        //                     table.column().cells().invalidate().render();
                        //                     table.columns.adjust().responsive.recalc();
                                        
                        //                 }, error: function(response) {
                        //                     console.log(response);
                        //                 }
                        //             })
                        //         }
                        //     },
                        // <?php } ?>
                        // <?php if($count_jerarquia > 0){ ?>
                        //     {
                        //         text: "Ver todas mis solicitudes",
                        //         attr: {
                        //             'id': 'mis_incidencias',
                        //             'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        //         },
                        //         className: 'button w-full btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700',
                        //         action: function ( e, dt, node, config ) {
                        //             $.ajax({
                        //                 url: "../config/ajax_incidencias.php",
                        //                 method: 'POST',
                        //                 data:{
                        //                     "rol": <?php echo $_SESSION["rol"]; ?>,
                        //                     "sessionid": <?php echo $_SESSION["id"]; ?>
                        //                 },
                        //                 success: function(response) {
                        //                     <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                        //                         editStatus=0;
                        //                     <?php } ?>
                        //                     var table = $('#datatable').DataTable();
                        //                     table.clear().draw();
                        //                     const obj = JSON.parse(response);
                        //                     table.rows.add(obj).draw();
                        //                     table.column().cells().invalidate().render();
                        //                     table.columns.adjust().responsive.recalc();				
                        //                 }, error: function(response) {
                        //                     console.log(response);
                        //                 }
                        //             })
                        //         }
                        //     },
                        // <?php } ?>

                        <?php if($count_jerarquia > 0) ?>
                            {
                                text: "Filtrar por:",
                                attr: {
                                    'id': 'incidencias_filtro',
                                    'style': 'width: -webkit-fill-available; padding-bottom:17px; font-size:large; background: none !important; border: 0px !important; color:rgb(0 0 0) !important;'
                                },
                                className: 'disabled bg-white text-2x3 text-[#64748b] font-semibold',
                                }
                        <?php ?>,
                        
                        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true"){ ?>	
                            {
                                text: "Pendientes",
                                attr: {
                                    'id': 'incidencias_abiertas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'toggle button w-full ov-btn-slide-top text-white rounded-md h-10 px-8 py-2 focus:ring-2 focus:outline-none ',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/incidencias_abiertas.php",
                                        method: 'POST',
                                        success: function(response) {
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                                                editStatus=0;
                                            <?php } ?>
                                             var table = $('#datatable').DataTable();
                                             table.clear().draw();
                                             const obj = JSON.parse(response);
                                             table.rows.add(obj).draw(); 
                                             table.column().cells().invalidate().render();
                                             table.columns.adjust().responsive.recalc();
                                        
                                        }, error: function(response) {
                                            console.log(response);
                                        }
                                    })
                                }
                            },
                        <?php } ?>
                        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true"){ ?>
                            {
                                text: "Evaluadas",
                                attr: {
                                    'id': 'incidencias_cerradas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'toggle button w-full ov-btn-slide-top text-white rounded-md h-10 px-8 py-2 focus:ring-2 focus:outline-none ',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/incidencias_cerradas.php",
                                        method: 'POST',
                                        success: function(response) {
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                                                editStatus=1;
                                                ButtonEdit=1;
                                            <?php } ?>
                                             var table = $('#datatable').DataTable();
                                             table.clear().draw();
                                             const obj = JSON.parse(response);
                                             table.rows.add(obj).draw();
                                             table.column().cells().invalidate().render();
                                             table.columns.adjust().responsive.recalc();
                                        
                                        }, error: function(response) {
                                            console.log(response);
                                        }
                                    })
                                }
                            },
                        <?php } ?>
                        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true"){ ?>
                            {
                                text: "Ver todo",
                                attr: {
                                    'id': 'incidencias_desplieguetodo',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'toggle button w-full ov-btn-slide-top text-white rounded-md h-10 px-8 py-2 focus:ring-2 focus:outline-none',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/incidencias_desplieguetodo.php",
                                        method: 'POST',
                                        success: function(response) {
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                                                editStatus=1;
                                                ButtonEdit=2;
                                            <?php } ?>
                                             var table = $('#datatable').DataTable();
                                             table.clear().draw();
                                             const obj = JSON.parse(response);
                                             table.rows.add(obj).draw();
                                             table.column().cells().invalidate().render();
                                             table.columns.adjust().responsive.recalc();
                                        }, error: function(response) {
                                            console.log(response);
                                        }
                                    })
                                }
                            },
                        <?php } ?>
                        
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            {
                                text: "+ Crear Incidencia",
                                attr: { 
                                    'id': 'Incidencia',
                                    'style': 'right: 0; background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button btn-celeste md:flex text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#FF9119]/50 hover:bg-[#FF9119]/60 active:bg-[#FF9119]/70',
                                action: function(e, dt, node, config) {
                                    window.location.href = "crear_incidencia.php";
                                }
                            }
                        <?php } ?> ,
                    ],
            "ajax":{
                <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
                    "url": "../config/incidencias/incidencias_abiertas.php",
                <?php }else if($count_jerarquia > 0 && Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "false"){ ?>
                    "url": "../config/incidencias/mi_incidencia_pendiente.php",
                <?php }else if($count_jerarquia == 0 || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true"){ ?>
                    <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Director general"){ ?>
                        "url": "../config/incidencias/incidencias_abiertas.php",
                    <?php }else{ ?>
                        "url": "../config/incidencias/mi_incidencia_pendiente.php",
                    <?php } ?>
                <?php } ?>
                "type": "POST",
                "dataSrc": "",
                "data":{
                    "rol": <?php echo $_SESSION["rol"]; ?>,
                    "sessionid": <?php echo $_SESSION["id"]; ?>

                }
            },
            "columns":[
                {"data": "solicitud_id", visible: false, searchable: false},
                {"data": "nombre"},
                {"data": "tipo_permiso"},
                {"data": "periodo"},
                {"data": "fecha_solicitud"},
                {"data": "sueldo", searchable: false},
                {"data": "estatus_id", searchable: false},
                {"data": "Incidenciaid", searchable: false}
            ],
            "columnDefs": 
            [
                {
                    target: [1],
                    className:"border-white dt-tituloL",
                    render: function (data, type, row) {
                        return(
                            "<div class='text-left'>" +
                                "<span>" + row["nombre"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [2],
                    className:"border-white ",
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["tipo_permiso"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [3],
                    className:"border-white",
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["periodo"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [4],
                    className:"border-white ",
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["fecha_solicitud"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [5],
                    className:"border-white",
                    render: function (data, type, row) {
                        if(row["sueldo"] == 0){
                            return "<div class='text-left lg:text-center'><span>No</span></div>";
                        }else if(row["sueldo"] == 1){
                            return "<div class='text-left lg:text-center'><span>Sí</span></div>";
                        }else{
                            return "<div class='text-left lg:text-center'><span>Sin datos</span></div>";
                        }
                    }
                },
                {
                    target: [6],
                    className:"border-white",
                    render: function (data, type, row) {
                        if(row["estatus_id"] == 1){
                            return "<div class='text-left lg:text-center'><span>Aprobada</span></div>";
                        }else if(row["estatus_id"] == 2){
                            return "<div class='text-left lg:text-center'><span>Cancelada</span></div>";
                        }else if(row["estatus_id"] == 3){
                            return "<div class='text-left lg:text-center'><span>Rechazada</span></div>";
                        }else if(row["estatus_id"] == 4){
                            return "<div class='text-left lg:text-center'><span>Pendiente</span></div>";
                        }
                    }
                },
                {
                    target: [7],
                    className:"border-white dt-tituloR",
                    render: function (data, type, row) {
                        <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
                            if(editStatus == 0){
                                return (
                                    "<div class='py-3 text-left'>" +
                                        "<div class='flex item-center justify-center data'>" +
                                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Ver'>" +
                                                "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                                                "</svg>"+
                                            "</div>" +
                                        "</div>" +
                                    "</div>"
                                );
                            }else if(editStatus == 1){
                                if(row["estatus_id"] != 4){
                                    return (
                                        "<div class='py-3 text-left'>" +
                                            "<div class='flex item-center justify-center gap-3'>" +
                                                "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer EditAction'>" +
                                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                                                    "</svg>" +
                                                "</div>" +
                                                "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Ver'>" +
                                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                                                    "</svg>"+
                                                "</div>" +
                                            "</div>" +
                                        "</div>"
                                    );
                                }else{
                                    return (
                                        "<div class='py-3 text-left'>" +
                                            "<div class='flex item-center justify-center data'>" +
                                                "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Ver'>" +
                                                    "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                                                    "</svg>"+
                                                "</div>" +
                                            "</div>" +
                                        "</div>"
                                    );
                                }
                            }
                        <?php }else{ ?>
                            return (
                                "<div class='py-3 text-left'>" +
                                    "<div class='flex item-center justify-center data'>" +
                                        "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Ver'>" +
                                            "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                                                "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                                                "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                                            "</svg>"+
                                        "</div>" +
                                    "</div>" +
                                "</div>"
                            );
                        <?php } ?>
                    }
                }
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
                    container.classList.add('flex-[1_0_20%]', 'm-[5px]');
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
	    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-celeste-600');
        <?php
        if(basename($_SERVER['PHP_SELF']) == 'incidencias.php'){?>
            var dropdown = document.getElementById('incidencia');
            dropdown.classList.remove("hidden"); 
        <?php } ?>

            //css de botones filtro
     var incidencias_cerradas = document.getElementById("incidencias_cerradas");
     var incidencias_abiertas = document.getElementById("incidencias_abiertas");
     var incidencias_desplieguetodo = document.getElementById("incidencias_desplieguetodo");

    document.getElementById('incidencias_cerradas').addEventListener("click", function(){

        if(incidencias_abiertas.classList.contains("active") || incidencias_desplieguetodo.classList.contains("active")){
            incidencias_abiertas.classList.remove("active");
            incidencias_desplieguetodo.classList.remove("active");
        }
        
        if(!incidencias_cerradas.classList.contains("active")){
            incidencias_cerradas.classList.toggle("active");
        }
    });

    document.getElementById('incidencias_abiertas').addEventListener("click", function(){

        if(incidencias_cerradas.classList.contains("active") || incidencias_desplieguetodo.classList.contains("active")){
            incidencias_cerradas.classList.remove("active");
            incidencias_desplieguetodo.classList.remove("active");
        }

        if(!incidencias_abiertas.classList.contains("active")){
            incidencias_abiertas.classList.toggle("active");
        }
    });

    document.getElementById('incidencias_desplieguetodo').addEventListener("click", function(){

        if(incidencias_cerradas.classList.contains("active") || incidencias_abiertas.classList.contains("active")){
            incidencias_cerradas.classList.remove("active");
            incidencias_abiertas.classList.remove("active");
        }

        if(!incidencias_desplieguetodo.classList.contains("active")){
            incidencias_desplieguetodo.classList.toggle("active");
        }
        });
        
        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true"){ ?>
            $('input[name="periodo_buscar"]').daterangepicker({ showDropdowns: true, timePicker: true, timePicker24Hour: true, timePickerSeconds: true, parentEl: "main", locale: { format: 'YYYY/MM/DD HH:mm:ss' }, applyButtonClasses: "button btn-celeste px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });

            $('#periodo_buscar').on('apply.daterangepicker', function(ev, picker) {
                var fd = new FormData();
                var fecha_inicio = picker.startDate.format('YYYY-MM-DD HH:mm:ss');
                var fecha_fin = picker.endDate.format('YYYY-MM-DD HH:mm:ss');
                fd.append('fecha_inicio', fecha_inicio);
                fd.append('fecha_fin', fecha_fin);
                $.ajax({
                    url: '../ajax/filtros/buscar_incidencias_periodo/buscarperiodo.php',
                    type: 'POST',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var table = $('#datatable').DataTable();
                        table.clear().draw();
                        const obj = JSON.parse(data);
                        table.rows.add(obj).draw();
                        table.column().cells().invalidate().render();
                        table.columns.adjust().responsive.recalc();
                    },
                    error: function(data) {
                        $("#ajax-error").text('Fail to send request');
                    }
                });        
            });
        <?php } ?>

        <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
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
        <?php } ?>

        <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
            $(document).on('click', 'tr .EditAction', function () {
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
                    '<div class="flex-col gap-3 items-center flex sm:flex-row">'+
                        '<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-celeste-100 sm:mx-0 sm:h-10 sm:w-10">'+
                            '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9.5H18V7.5H13V9.5M13,16.5H18V14.5H13V16.5M19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21M6,11H11V6H6V11M7,7H10V10H7V7M6,18H11V13H6V18M7,14H10V17H7V14Z"></path></svg>'+
                        '</div>'+
                        '<h3 class="text-lg font-medium text-gray-900"> Modificar el estatus de la incidencia </h3>'+
                    '</div>'+
                    '<div class="modal-content text-center w-full mt-3 sm:mt-0 sm:text-left">'+
                        '<div class="grid grid-cols-1 mt-5 mx-7">'+
                            '<label class="text-[#64748b] font-semibold mb-2">Estatus</label>'+
                            '<div class="group flex">'+
                                '<div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">'+
                                    '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">'+
                                        '<path fill="currentColor" d="M12 20C16.4 20 20 16.4 20 12S16.4 4 12 4 4 7.6 4 12 7.6 20 12 20M12 2C17.5 2 22 6.5 22 12S17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2M12.5 7V12.2L9.8 17L8.5 16.2L11 11.8V7H12.5Z"></path>'+
                                    '</svg>'+
                                '</div>'+
                                '<select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="estatus" name="estatus">'+
                                    '<option value="">--Seleccione--</option>'+
                                    '<option value="1">Aprobada</option>'+
                                    '<option value="2">Cancelada</option>'+
                                    '<option value="3">Rechazada</option>'+
                                '</select>'+
                            '</div>'+
                        '</div>'+
                        '<div class="grid grid-cols-1 mt-5 mx-7">'+
                            '<div class="flex gap-3 items-center">'+
                                '<input type="checkbox" id="sueldo" name="sueldo" class="border-gray-300 text-celeste-600 focus:ring-2 focus:outline-none focus:ring-celeste-600" value="1" data-valuetwo="0">¿Goce de sueldo?'+
                            '</div>'+
                        '</div>'+
                        '<div class="grid grid-cols-1 mt-5 mx-7">'+
                            '<label class="text-[#64748b] font-semibold mb-2">Comentarios</label>'+
                            '<textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-celeste-600" id="comentarios" name="comentarios" placeholder="Comentarios"></textarea>'+
                            '<div id="error_comentarios"></div>'+
                        '</div>'+
                        '<div class="mt-5">'+
                        '</div>'+
                    '</div>');
                $('.modal-actions').html(
                    '<div id="submit-changes">'+
                        '<button id="editar-incidencia" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar incidencia</button>'+
                    '</div>'+
                    '<div id="disable-close-submit">'+
                        '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                    '</div>');
                $("#estatus").val(data["estatus_id"]);
                var x = $("#estatus").val();
                if(x == 1){
                    if(data["sueldo"] == 0){
                        $("#sueldo").prop("checked", false);
                    }else if(data["sueldo"] == 1){
                        $("#sueldo").prop("checked", true);
                    }else{
                        $("#sueldo").prop("disabled", true);
                    }
                }else{
                    $("input[name='sueldo']").prop("checked", false).prop("disabled", true);
                }
                openModal();
                resetFormValidator("#Guardar");
                $('#Guardar').unbind('submit'); 
                $.validator.addMethod('comment', function (value, element) {
                    return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
                }, 'not a valid comment.');
                if ($('#Guardar').length > 0) {
                    $('#Guardar').validate({
                        ignore: [],
                        onkeyup: false,
                        errorPlacement: function(error, element) {
                            if((element.attr('name') === 'estatus')){
                                error.insertAfter(element.parent('.group.flex'));
                            }else if(element.attr('name') === 'comentarios'){
                                error.appendTo("div#error_comentarios");    
                            }
                        },
                        highlight: function(element) {
                            var elem = $(element);
                            $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                            $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                        },
                        unhighlight: function(element) {
                            var elem = $(element);	
                            $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                            $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                        },
                        rules: {
                            estatus: {
                                required: true
                            },
                            comentarios: {
                                required: true,
                                comment: true
                            }
                        },
                        messages: {
                            estatus: {
                                required: 'Este campo es requerido'
                            },
                            comentarios: {
                                required: 'Este campo es requerido',
                                comment: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
                            }
                        },
                        submitHandler: function(form) {
                            $('#submit-changes').html(
                                '<button disabled type="button" class="button w-full inline-flex items-center justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">'+
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
                                        var estatus = $("#estatus").val();
                                        var sueldo;
                                        if(estatus == 1){
                                            if($('#sueldo').is(":checked")){
                                                sueldo = $("input[name='sueldo']:checked").val();
                                            }else{
                                                sueldo = $("#sueldo").attr("data-valuetwo");
                                            }
                                        }else{
                                            sueldo = "";
                                        }
                                        var comentarios = $("#comentarios").val();
                                        var id = data["Incidenciaid"];
                                        var app = "editStatus";
                                        fd.append('estatus', estatus);
                                        fd.append('sueldo', sueldo);
                                        fd.append('comentarios', comentarios);
                                        fd.append('id', id);
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
                                                            title: "Estatus Editado",
                                                            text: array[1],
                                                            icon: "success"
                                                        }).then(function() {
                                                            var table = $('#datatable').DataTable();
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html("<button disabled class='button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto' id='editar-incidencia' type='submit'>Editar incidencia</button>");
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            if(ButtonEdit == 1){
		                                                        table.ajax.url('../config/incidencias/incidencias_cerradas.php').load();
	                                                        }else{
		                                                        table.ajax.url('../config/incidencias/incidencias_desplieguetodo.php').load();
	                                                        }
                                                            closeModal();
                                                        });
                                                    } else if(array[0] == "error") {
                                                        Swal.fire({
                                                            title: "Error",
                                                            text: array[1],
                                                            icon: "error"
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html("<button class='button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto' id='editar-incidencia' type='submit'>Editar incidencia</button>");
                                                            $('#disable-close-submit').html("<button id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        });
                                                    } else if (array[0] == "incidencia_not_found") {
                                                        Swal.fire({
                                                            title: "Error",
                                                            text: array[1],
                                                            icon: "error"
                                                        }).then(function() {
                                                            var table = $('#datatable').DataTable();
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html("<button disabled class='button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto' id='editar-incidencia' type='submit'>Editar incidencia</button>");
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            if(ButtonEdit == 1){
		                                                        table.ajax.url('../config/incidencias/incidencias_cerradas.php').load();
	                                                        }else{
		                                                        table.ajax.url('../config/incidencias/incidencias_desplieguetodo.php').load();
	                                                        }
                                                            closeModal();
                                                        });
                                                    }else if (array[0] == "forbidden") {
                                                        Swal.fire({
                                                            title: "Error",
                                                            text: array[1],
                                                            icon: "error"
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html("<button disabled class='button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto' id='editar-incidencia' type='submit'>Editar incidencia</button>");
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            window.location.href = "dashboard.php";
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
                                            $('#submit-changes').html('<button disabled id="editar-incidencia" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar incidencia</button>');
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

            $(document).on("change", "#estatus", function () {
                var x = $("#estatus").val();
                if(x == 1){
                    $("input[name='sueldo']").prop("disabled", false);
                }else{
                    $("input[name='sueldo']").prop("checked", false).prop("disabled", true);
                }
                
            });
        <?php } ?>

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
                window.location.href = "ver_incidencia.php?idIncidencia="+data['Incidenciaid']+""; 
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

        function unloadHandler(e) {
            // Cancel the event
            e.preventDefault();
            // Chrome requires returnValue to be set
            e.returnValue = '';
        }
	});
</script>

<style>

    <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las incidencias") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las incidencias") == "true")){ ?>
        .error{
            color: #FF1E2D;
        }
    <?php } ?>

    main{
		position:relative !important;
	}

	.daterangepicker td.active, .daterangepicker td.active:hover{
		--tw-bg-opacity: 1 !important;
		background-color: rgb(79 70 229 / var(--tw-bg-opacity)) !important;
		border-color: transparent;
		color: #fff;
	}

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

    .ov-btn-slide-top {
        border: 0px !important;
        font-size: 15.88px !important; 
        background-color: #c7c7c714 !important;
        color: #000003 !important;
        box-shadow: 1px 2px 0px 0px !important;
        
        border-radius: 107px !important;
        position: relative;
        z-index: 0;
        overflow: hidden;
        display: inline-block;

    }
    .ov-btn-slide-top:hover {
        color: #fff !important; /* color de fuente hover */
    }
    .ov-btn-slide-top::after {
        content: "";
        background:#1f1c1ce3;; /* color de fondo hover */
        position: absolute;
        z-index: -1;
        padding: 16px 20px;
        display: block;
        left: 0;
        right: 0;
        top: -100%;
        bottom: 100%;
        -webkit-transition: all 0.25s;
        transition: all 0.25s;
    }
    .ov-btn-slide-top:hover::after {
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        -webkit-transition: all 0.25s;
        transition: all 0.25s;
    }

    .active{
    background-color: black !important;
    color: white !important;
    }

    .text-20{
        font-size: 20px !important;
    }

    .btn-white{
        background: white !important;
        color: white !important;
        background-color: white !important;
        border: none !important;
    }
    </style>