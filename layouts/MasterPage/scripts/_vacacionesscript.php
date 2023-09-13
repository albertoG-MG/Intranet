<script>
    <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
	    var ButtonEdit = 0;
    <?php } ?>
    //Datatable
    document.addEventListener("DOMContentLoaded", function() {
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Mis solicitudes de vacaciones pendientes",
                                attr: {
                                    'id': 'mis_vacaciones_pendientes',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/vacaciones/mis_vacaciones_pendientes.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>
                                        },
                                        success: function(response) {
                                            var table = $('#datatable').DataTable();
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                                var action = table.column(5);
                                                action.visible(false);
                                            <?php } ?>
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Mis solicitudes de vacaciones aprobadas",
                                attr: {
                                    'id': 'mis_vacaciones_aprobadas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/vacaciones/mis_vacaciones_aprobadas.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>
                                        },
                                        success: function(response) {
                                            var table = $('#datatable').DataTable();
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                                var action = table.column(5);
                                                action.visible(false);
                                            <?php } ?>
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Mis solicitudes de vacaciones rechazadas",
                                attr: {
                                    'id': 'mis_vacaciones_rechazadas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/vacaciones/mis_vacaciones_rechazadas.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>

                                        },
                                        success: function(response) {
                                            var table = $('#datatable').DataTable();
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                                var action = table.column(5);
                                                action.visible(false);
                                            <?php } ?>
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Mis solicitudes de vacaciones canceladas",
                                attr: {
                                    'id': 'mis_vacaciones_canceladas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/vacaciones/mis_vacaciones_canceladas.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>
                                        },
                                        success: function(response) {
                                            var table = $('#datatable').DataTable();
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                                var action = table.column(5);
                                                action.visible(false);
                                            <?php } ?>
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Desplegar todas mis solicitudes",
                                attr: {
                                    'id': 'mis_vacaciones',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/vacaciones/mis_vacaciones.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>
                                        },
                                        success: function(response) {
                                            var table = $('#datatable').DataTable();
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                                var action = table.column(5);
                                                action.visible(false);
                                            <?php } ?>
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
                        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true"){ ?>	
                            {
                                text: "Solicitudes de vacaciones pendientes",
                                attr: {
                                    'id': 'vacaciones_abiertas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/vacaciones/vacaciones_abiertas.php",
                                        method: 'POST',
                                        success: function(response) {
                                            var table = $('#datatable').DataTable();
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                                var action = table.column(5);
                                                action.visible(false);
                                            <?php } ?>
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
                        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true"){ ?>
                            {
                                text: "Solicitudes de vacaciones evaluadas",
                                attr: {
                                    'id': 'vacaciones_cerradas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/vacaciones/vacaciones_cerradas.php",
                                        method: 'POST',
                                        success: function(response) {
                                            var table = $('#datatable').DataTable();
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                                var action = table.column(5);
                                                action.visible(true);
                                                ButtonEdit = 1;
                                            <?php } ?>
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
                        <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true"){ ?>
                            {
                                text: "Desplegar todas las solicitudes",
                                attr: {
                                    'id': 'vacaciones_desplieguetodo',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/vacaciones/vacaciones_desplieguetodo.php",
                                        method: 'POST',
                                        success: function(response) {
                                            var table = $('#datatable').DataTable();
                                            <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                                                var action = table.column(5);
                                                action.visible(true);
                                                ButtonEdit = 2;
                                            <?php } ?>
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
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a solicitud vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            {
                                text: "Evaluar solicitudes de vacaciones",
                                attr: {
                                    'id': 'vacaciones_solicitudes',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-[#FF9119] text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#FF9119]/50 hover:bg-[#FF9119]/60 active:bg-[#FF9119]/70',
                                action: function ( e, dt, node, config ) {
                                    window.location.href = "solicitud_vacaciones.php";
                                }
                            },
                        <?php } ?>
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso al historial de vacaciones") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            {
                                text: "Ver historial de vacaciones",
                                attr: {
                                    'id': 'historial_vacaciones',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-[#FF9119] text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#FF9119]/50 hover:bg-[#FF9119]/60 active:bg-[#FF9119]/70',
                                action: function ( e, dt, node, config ) {
                                    window.location.href = "historial_vacaciones.php";
                                }
                            }
                        <?php } ?>
                    ],
            "ajax":{
                <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){ ?>
                    "url": "../config/vacaciones/vacaciones_abiertas.php",
                <?php }else if($count_jerarquia > 0 && Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "false"){ ?>
                    "url": "../config/vacaciones/mis_vacaciones_pendientes.php",
                <?php }else if($count_jerarquia == 0 || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true"){ ?>
                    <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Director general"){ ?>
                        "url": "../config/vacaciones/vacaciones_abiertas.php",
                    <?php }else{ ?>
                        "url": "../config/vacaciones/mis_vacaciones_pendientes.php",
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
                {"data": "periodo_solicitado"},
                {"data": "fecha_solicitud"},
                {"data": "estatus"}<?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ echo ","; } ?>
                <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                    {"data": null, visible: false, searchable: false}
                <?php } ?>
            ],
            "columnDefs": [
                {
                    target: [1],
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
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["periodo_solicitado"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [3],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["fecha_solicitud"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [4],
                    render: function (data, type, row) {
                        if(row["estatus"] == 4){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Pendiente</span>" +
                                "</div>"
                            );
                        }else if(row["estatus"] == 3){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Rechazada</span>" +
                                "</div>"
                            ); 
                        }else if(row["estatus"] == 2){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Cancelada</span>" +
                                "</div>"
                            ); 
                        }else if(row["estatus"] == 1){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Aprobada</span>" +
                                "</div>"
                            );
                        }
                    }
                }<?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ echo ","; } ?>
                <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
                    {
                        target: [5],
                        render: function (data, type, row) {
                            if(row["estatus"] == 4){
                                return "";
                            }else{
                                return (
                                    "<div class='py-3 text-left'>" +
                                        "<div class='flex item-center justify-center gap-3'>" +
                                            "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer EditAction'>" +
                                                "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                                                    "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                                                "</svg>" +
                                            "</div>" +
                                        "</div>" +
                                    "</div>"
                                );
                            }
                        }
                    }
                <?php } ?>
            ],
            "initComplete": () => {
                var table = $('#datatable').DataTable();
                $('.dt-buttons').attr('id', "botones");
                $("#botones").addClass("w-full");
                var botones_incidencia = document.querySelectorAll('#botones > button');
                var children_count = botones_incidencia.length;
                var boton = document.getElementById('botones');
                for(var i=0; i < children_count; i++){
                    if(botones_incidencia[i].id == "mis_vacaciones_pendientes" || botones_incidencia[i].id == "mis_vacaciones_aprobadas" || botones_incidencia[i].id == "mis_vacaciones_rechazadas" || botones_incidencia[i].id == "mis_vacaciones_canceladas" || botones_incidencia[i].id == "mis_vacaciones"){
                        if($("#personal").length){
                            grid_personal.append(botones_incidencia[i]);
                        }else{
                            var container_personal = document.createElement("div");
                            container_personal.setAttribute("id", "personal");
                            container_personal.setAttribute("style", "text-align:start;");
                            container_personal.classList.add('mt-5');
                            boton.append(container_personal);
                            var title_personal = document.createElement("h2");
                            title_personal.classList.add('text-2xl', 'text-[#64748b]', 'font-semibold');
                            title_personal.textContent = "Desplegar mis solicitudes";
                            container_personal.append(title_personal);
                            var span_personal = document.createElement("span");
                            span_personal.classList.add('text-[#64748b]');
                            span_personal.textContent = "Sección que despliega todas las solicitudes de vacaciones del empleado.";
                            container_personal.append(span_personal);
                            var separator_personal = document.createElement("div");
                            separator_personal.classList.add('my-3', 'h-px', 'bg-slate-200');
                            container_personal.append(separator_personal);
                            var grid_personal = document.createElement("div");
                            grid_personal.classList.add('grid', 'grid-cols-1', 'md:grid-cols-3', 'md:gap-3');
                            container_personal.append(grid_personal);
                            grid_personal.append(botones_incidencia[i]);
                        }
                    }else if(botones_incidencia[i].id == "vacaciones_abiertas" || botones_incidencia[i].id == "vacaciones_cerradas" || botones_incidencia[i].id == "vacaciones_desplieguetodo"){
                        if($("#administrador").length){
                            grid_administrativo.append(botones_incidencia[i]);
                        }else{
                            var container_administrativo = document.createElement("div");
                            container_administrativo.setAttribute("id", "administrador");
                            container_administrativo.setAttribute("style", "text-align:start;");
                            container_administrativo.classList.add('mt-5');
                            boton.append(container_administrativo);
                            var title_administrativo = document.createElement("h2");
                            title_administrativo.classList.add('text-2xl', 'text-[#64748b]', 'font-semibold');
                            title_administrativo.textContent = "Desplegar solicitudes de todos los empleados";
                            container_administrativo.append(title_administrativo);
                            var span_administrativo = document.createElement("span");
                            span_administrativo.classList.add('text-[#64748b]');
                            span_administrativo.textContent = "Sección que despliega todas las solicitudes de todos los empleados.";
                            container_administrativo.append(span_administrativo);
                            var separator = document.createElement("div");
                            separator.classList.add('my-3', 'h-px', 'bg-slate-200');
                            container_administrativo.append(separator);
                            var grid_administrativo = document.createElement("div");
                            grid_administrativo.classList.add('grid', 'grid-cols-1', 'md:grid-cols-3', 'md:gap-3');
                            container_administrativo.append(grid_administrativo);
                            grid_administrativo.append(botones_incidencia[i]);
                        }
                    }else{
                        if($("#otro").length){
                            grid_otros.append(botones_incidencia[i]);
                        }else{
                            var container_otros = document.createElement("div");
                            container_otros.setAttribute("id", "otro");
                            container_otros.setAttribute("style", "text-align:start;");
                            container_otros.classList.add('mt-5');
                            boton.append(container_otros);
                            var title_otros = document.createElement("h2");
                            title_otros.classList.add('text-2xl', 'text-[#64748b]', 'font-semibold');
                            title_otros.textContent = "Acción";
                            container_otros.append(title_otros);
                            var span_otros = document.createElement("span");
                            span_otros.classList.add('text-[#64748b]');
                            span_otros.textContent = "Sección que permite distintos tipos de acciones según el tipo de usuario.";
                            container_otros.append(span_otros);
                            var separator_otros = document.createElement("div");
                            separator_otros.classList.add('my-3', 'h-px', 'bg-slate-200');
                            container_otros.append(separator_otros);
                            var grid_otros = document.createElement("div");
                            grid_otros.classList.add('grid', 'grid-cols-1', 'md:grid-cols-3', 'md:gap-3');
                            container_otros.append(grid_otros);
                            grid_otros.append(botones_incidencia[i]);
                        }
                    }
                }
               // console.log(divsname[0].children[0].id);
            
                $('#DT-div').show();
                table.columns.adjust().responsive.recalc();
            }
        });
    });


    $(document).ready(function () {

    //CSS del botón search
    $('.dataTables_filter input[type="search"]').
	    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-600');
        
    //Inicialización de la librería de las fechas
    $('input[name="periodo_vacaciones"]').daterangepicker({ showDropdowns: true, parentEl: "main", locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });

    <?php if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true"){ ?>
        $('input[name="periodo_buscar"]').daterangepicker({ showDropdowns: true, timePicker: true, timePicker24Hour: true, timePickerSeconds: true, parentEl: "main", locale: { format: 'YYYY/MM/DD HH:mm:ss' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });

        $('#periodo_buscar').on('apply.daterangepicker', function(ev, picker) {
            var fd = new FormData();
            var fecha_inicio = picker.startDate.format('YYYY-MM-DD HH:mm:ss');
            var fecha_fin = picker.endDate.format('YYYY-MM-DD HH:mm:ss');
            fd.append('fecha_inicio', fecha_inicio);
            fd.append('fecha_fin', fecha_fin);
            $.ajax({
                url: '../ajax/filtros/buscar_vacaciones_periodo/buscarperiodo.php',
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

    if ($('#Guardar').length > 0) {
            $('#Guardar').validate({
                ignore: [],
                onkeyup: false,
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent('.group.flex'));
                },
                invalidHandler: function(e, validator){
                    if(!($('#error-container').length)){
                        this.$div = $('<div id="error-container" class="grid grid-cols-1 mt-3 md:mt-0"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#Guardar");
                    }
                    $("#arrayerrors").html(""); 
                    $.each(validator.errorMap, function( index, value ) { 
                        this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
                        $("#arrayerrors").append(this.$arrayerror);
                    });
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
                    periodo_vacaciones:{
                        required: true
                    }
                },
                messages: {
                    periodo_vacaciones:{
                        required: 'Este campo es requerido'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-vacaciones').html(
                        '<button disabled id="guardar_general" name="guardar_general" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" type="submit">'+
                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                            '</svg>'+
                            'Cargando...'+
                        '</button>');
                    $('#error-container').html("");
                    check_user_logged().then((response) => {
                        if(response == "true"){
                            //TODO EL AJAX DE LAS ACTAS ADMINISTRATIVAS
                            window.addEventListener('beforeunload', unloadHandler);
                            var fd = new FormData();
                            var periodo_vacaciones = $("#periodo_vacaciones").val();
                            var method = "store";
                            var app = "Vacaciones"
                            //TODO EL APPEND DE LAS ACTAS ADMINISTRATIVAS
                            fd.append('periodo_vacaciones', periodo_vacaciones);
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
                                        if(array[0] == "success"){
                                            Swal.fire({
                                                title: "Solicitud creada",
                                                text: array[1],
                                                icon: "success"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-vacaciones').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='guardar_general' name='guardar_general' type='submit'>Solicitar vacaciones</button>");
                                                var table = $('#datatable').DataTable();
                                                table.ajax.reload();
                                                $("#dias_restantes").html(array[2]+ " día(s)");
                                            });
                                        }else if(array[0] == "error"){
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-vacaciones').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='guardar_general' name='guardar_general' type='submit'>Solicitar vacaciones</button>");
                                            });
                                        }else if(array[0] == "forbidden"){
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-vacaciones').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='guardar_general' name='guardar_general' type='submit'>Solicitar vacaciones</button>");
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
                                $('#submit-vacaciones').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='guardar_general' name='guardar_general' type='submit'>Solicitar vacaciones</button>");
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

        <?php if((Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") || (Permissions::CheckPermissions($_SESSION["id"], "Ver todas las vacaciones") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Editar estatus de las vacaciones") == "true")){ ?>
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
	
	        $(document).on("click", ".EditAction", function () {
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
                        '<div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">'+
                            '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9.5H18V7.5H13V9.5M13,16.5H18V14.5H13V16.5M19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21M6,11H11V6H6V11M7,7H10V10H7V7M6,18H11V13H6V18M7,14H10V17H7V14Z" /></svg>'+
                        '</div>'+
                        '<h3 class="text-lg font-medium text-gray-900"> Modificar el estatus de la solicitud de vacaciones </h3>'+
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
                                '<select class="w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="estatus_vacaciones" name="estatus_vacaciones">'+
                                    '<option value="">--Seleccione--</option>'+
                                    '<option value="1">Aprobada</option>'+
                                    '<option value="2">Cancelada</option>'+
                                    '<option value="3">Rechazada</option>'+
                                '</select>'+
                            '</div>'+
                        '</div>'+
                        '<div class="grid grid-cols-1 mt-5 mx-7">'+
                            '<label class="text-[#64748b] font-semibold mb-2">Comentarios</label>'+
                            '<textarea class="w-full py-2 h-20 border rounded-md border-[#d1d5db] focus:ring-2 focus:ring-indigo-600" id="comentarios_vacaciones" name="comentarios_vacaciones" placeholder="Comentarios"></textarea>'+
                            '<div id="error_comentarios_vacaciones"></div>'+
                        '</div>'+
                        '<div class="mt-5">'+
                        '</div>'+
                    '</div>');

                $('.modal-actions').html(
                    '<div id="submit-changes">'+
                        '<button id="editar-vacaciones" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar vacaciones</button>'+
                    '</div>'+
                    '<div id="disable-close-submit">'+
                        '<button id="close-modal" type="button" class="button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto">Cerrar</button>'+
                    '</div>');
            
                $("#estatus_vacaciones").val(data["estatus"]);
                resetFormValidator("#vacaciones-guardar");
                $('#vacaciones-guardar').unbind('submit');
                openModal();

                $.validator.addMethod('comment', function (value, element) {
                    return this.optional(element) || /^(.|\s)*[a-zA-Z]+(.|\s)*$/.test(value);
                }, 'not a valid comment.');

                if ($('#vacaciones-guardar').length > 0) {
                    $('#vacaciones-guardar').validate({
                        ignore: [],
                        onkeyup: false,
                        errorPlacement: function(error, element) {
                            if((element.attr('name') === 'estatus_vacaciones')){
                                error.insertAfter(element.parent('.group.flex'));
                            }else if(element.attr('name') === 'comentarios_vacaciones'){
                                error.appendTo("div#error_comentarios_vacaciones");    
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
                            estatus_vacaciones: {
                                required: true
                            },
                            comentarios_vacaciones: {
                                required: true,
                                comment: true
                            }
                        },
                        messages: {
                            estatus_vacaciones: {
                                required: 'Este campo es requerido'
                            },
                            comentarios_vacaciones: {
                                required: 'Este campo es requerido',
                                comment: 'Se permiten carácteres alfabéticos y símbolos especiales, no se permite un texto con solamente símbolos especiales, debe contener almenos una letra'
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
                                    var estatus_vacaciones = $("#estatus_vacaciones").val();
                                    var comentarios_vacaciones = $("#comentarios_vacaciones").val();
                                    var id = data["solicitud_id"];
                                    var app = "editStatus_vacaciones";
                                    fd.append('estatus_vacaciones', estatus_vacaciones);
                                    fd.append('comentarios_vacaciones', comentarios_vacaciones);
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
                                                        title: "El estatus de la solicitud fue cambiada!",
                                                        text: array[1],
                                                        icon: "success"
                                                    }).then(function() {
                                                        var table = $('#datatable').DataTable();
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-changes').html("<button disabled class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='editar-vacaciones' type='submit'>Editar vacaciones</button>");
                                                        $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        if(ButtonEdit == 1){
                                                            table.ajax.url('../config/vacaciones/vacaciones_cerradas.php').load();
                                                        }else{
                                                            table.ajax.url('../config/vacaciones/vacaciones_desplieguetodo.php').load();
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
                                                        $('#submit-changes').html("<button class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='editar-vacaciones' type='submit'>Editar vacaciones</button>");
                                                        $('#disable-close-submit').html("<button id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                    });
                                                } else if (array[0] == "solicitud_not_found") {
                                                    Swal.fire({
                                                        title: "Solicitud no encontrada",
                                                        text: array[1],
                                                        icon: "error"
                                                    }).then(function() {
                                                        var table = $('#datatable').DataTable();
                                                        window.removeEventListener('beforeunload', unloadHandler);
                                                        $('#submit-changes').html("<button disabled class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='editar-vacaciones' type='submit'>Editar vacaciones</button>");
                                                        $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                        if(ButtonEdit == 1){
                                                            table.ajax.url('../config/vacaciones/vacaciones_cerradas.php').load();
                                                        }else{
                                                            table.ajax.url('../config/vacaciones/vacaciones_desplieguetodo.php').load();
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
                                                        $('#submit-changes').html("<button disabled class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='editar-vacaciones' type='submit'>Editar vacaciones</button>");
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
                                        $('#submit-changes').html('<button disabled id="editar-vacaciones" type="submit" class="button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto">Editar vacaciones</button>');
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

    .error{
        color: red;
    }

    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }

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