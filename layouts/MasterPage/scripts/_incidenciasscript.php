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
            dom: '<"grid grid-cols-1"f>Brt<"bottom"ip><"clear">',
            buttons: [
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Mis incidencias pendientes",
                                attr: {
                                    'id': 'mis_incidencias_pendientes',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
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
                                text: "Mis incidencias aprobadas",
                                attr: {
                                    'id': 'mis_incidencias_aprobadas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
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
                                text: "Mis incidencias rechazadas",
                                attr: {
                                    'id': 'mis_incidencias_rechazadas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
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
                                text: "Mis incidencias canceladas",
                                attr: {
                                    'id': 'mis_incidencias_canceladas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
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
                                text: "Ver todas mis solicitudes",
                                attr: {
                                    'id': 'mis_incidencias',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
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
                                text: "Incidencias pendientes",
                                attr: {
                                    'id': 'incidencias_abiertas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/incidencias_abiertas.php",
                                        method: 'POST',
                                        success: function(response) {
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
                                text: "Incidencias evaluadas",
                                attr: {
                                    'id': 'incidencias_cerradas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/incidencias_cerradas.php",
                                        method: 'POST',
                                        success: function(response) {
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
                                text: "Desplegar todas las incidencias",
                                attr: {
                                    'id': 'incidencias_desplieguetodo',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/incidencias_desplieguetodo.php",
                                        method: 'POST',
                                        success: function(response) {
                                             var table = $('#datatable').DataTable();
                                             table.clear().draw();
                                             const obj = JSON.parse(response);
                                             table.rows.add(obj).draw();
                                             table.column().cells().invalidate().render();
                                        
                                        }, error: function(response) {
                                            console.log(response);
                                        }
                                    })
                                }
                            },
                        <?php } ?>
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a acta administrativa") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Acceso a carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador"){  ?>
                            {
                                text: "Administrar documentos administrativos",
                                attr: {
                                    'id': 'documentos_administrativos',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-[#FF9119] text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#FF9119]/50 hover:bg-[#FF9119]/60 active:bg-[#FF9119]/70',
                                action: function(e, dt, node, config) {
                                    window.location.href = "actas_cartas.php";
                                }
                            },
                        <?php } ?>
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Acceso a solicitud incidencias") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            {
                                text: "Ver solicitudes de incidencia",
                                attr: {
                                    'id': 'incidencias_solicitudes',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-[#FF9119] text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#FF9119]/50 hover:bg-[#FF9119]/60 active:bg-[#FF9119]/70',
                                action: function ( e, dt, node, config ) {
                                    window.location.href = "solicitud_incidencia.php";
                                }
                            },
                        <?php } ?>
                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            {
                                text: "Crear Incidencia",
                                attr: {
                                    'id': 'Incidencia',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full bg-[#FF9119] text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#FF9119]/50 hover:bg-[#FF9119]/60 active:bg-[#FF9119]/70',
                                action: function(e, dt, node, config) {
                                    window.location.href = "crear_incidencia.php";
                                }
                            }
                        <?php } ?>
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
                                "<span>" + row["tipo_permiso"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [3],
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
                    render: function (data, type, row) {
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
            ],
            "initComplete": () => {
                var table = $('#datatable').DataTable();
                $('.dt-buttons').attr('id', "botones");
                $("#botones").addClass("w-full");
                var botones_incidencia = document.querySelectorAll('#botones > button');
                var children_count = botones_incidencia.length;
                var boton = document.getElementById('botones');
                for(var i=0; i < children_count; i++){
                    if(botones_incidencia[i].id == "mis_incidencias_pendientes" || botones_incidencia[i].id == "mis_incidencias_aprobadas" || botones_incidencia[i].id == "mis_incidencias_rechazadas" || botones_incidencia[i].id == "mis_incidencias_canceladas" || botones_incidencia[i].id == "mis_incidencias"){
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
                            title_personal.textContent = "Desplegar mis incidencias";
                            container_personal.append(title_personal);
                            var span_personal = document.createElement("span");
                            span_personal.classList.add('text-[#64748b]');
                            span_personal.textContent = "Sección que despliega todas las incidencias del empleado.";
                            container_personal.append(span_personal);
                            var separator_personal = document.createElement("div");
                            separator_personal.classList.add('my-3', 'h-px', 'bg-slate-200');
                            container_personal.append(separator_personal);
                            var grid_personal = document.createElement("div");
                            grid_personal.classList.add('grid', 'grid-cols-1', 'md:grid-cols-3', 'md:gap-3');
                            container_personal.append(grid_personal);
                            grid_personal.append(botones_incidencia[i]);
                        }
                    }else if(botones_incidencia[i].id == "incidencias_abiertas" || botones_incidencia[i].id == "incidencias_cerradas" || botones_incidencia[i].id == "incidencias_desplieguetodo"){
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
                            title_administrativo.textContent = "Desplegar incidencias de todos los empleados";
                            container_administrativo.append(title_administrativo);
                            var span_administrativo = document.createElement("span");
                            span_administrativo.classList.add('text-[#64748b]');
                            span_administrativo.textContent = "Sección que despliega a todos los empleados.";
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
		$('.dataTables_filter input[type="search"]').
	    attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-600');

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