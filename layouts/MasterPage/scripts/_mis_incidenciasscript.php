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
            dom: '<"div grid-cols-1"f>Brt<"bottom"ip><"clear">',
            language: {
                        search: ""
            },

           
            buttons: [

                        <?php if($count_jerarquia > 0) ?>
                            {
                                text: "Filtrar por:",
                                attr: {
                                    'id': 'mis_incidencias_filtro',
                                    'style': 'width: -webkit-fill-available; padding-bottom:17px; font-size:large; background: none !important; border: 0px !important; color:rgb(0 0 0) !important;'
                                },
                                className: 'disabled bg-white text-2x3 text-[#64748b] font-semibold',
                                }
                        <?php ?>,

                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Pendientes",
                                attr: {
                                    'id': 'mis_incidencias_pendientes',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/mi_incidencia_pendiente.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>
                                        },
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Aprobadas",
                                attr: {
                                    'id': 'mis_incidencias_aprobadas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none ',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/mi_incidencia_aprobada.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>
                                        },
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Rechazadas",
                                attr: {
                                    'id': 'mis_incidencias_rechazadas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/mi_incidencia_rechazada.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>

                                        },
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Canceladas",
                                attr: {
                                    'id': 'mis_incidencias_canceladas',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none toggle',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/incidencias/mi_incidencia_cancelada.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>
                                        },
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
                        <?php if($count_jerarquia > 0){ ?>
                            {
                                text: "Ver todo",
                                attr: {
                                    'id': 'mis_incidencias',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none ',
                                action: function ( e, dt, node, config ) {
                                    $.ajax({
                                        url: "../config/ajax_incidencias.php",
                                        method: 'POST',
                                        data:{
                                            "rol": <?php echo $_SESSION["rol"]; ?>,
                                            "sessionid": <?php echo $_SESSION["id"]; ?>
                                        },
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
                        {    
                            className: "disabled btn-white" 
                        },
                        {
                            className: "disabled btn-white" 
                        },
                        {
                            className: "disabled btn-white" 
                        },

                        <?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear incidencia") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
                            {
                                text: "+ Crear Incidencia",
                                attr: { 
                                    'id': 'Incidencia',
                                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                                },
                                className: 'button btn-celeste  text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#FF9119]/50 hover:bg-[#FF9119]/60 active:bg-[#FF9119]/70',
                                action: function(e, dt, node, config) {
                                    window.location.href = "crear_incidencia.php";
                                }
                            }
                        <?php } ?> ,
                                        
                    ],
            "ajax":{       
                "url": "../config/incidencias/mi_incidencia_pendiente.php",
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
                    className:"border-white",
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
                    className:"border-white",
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


            //css de botones filtro
     var mis_incidencias_pendientes = document.getElementById("mis_incidencias_pendientes");
     var mis_incidencias_aprobadas = document.getElementById("mis_incidencias_aprobadas");
     var mis_incidencias_rechazadas = document.getElementById("mis_incidencias_rechazadas");
     var mis_incidencias_canceladas = document.getElementById("mis_incidencias_canceladas");
     var mis_incidencias = document.getElementById("mis_incidencias");

    document.getElementById('mis_incidencias_rechazadas').addEventListener("click", function(){

        if(mis_incidencias_pendientes.classList.contains("active") || mis_incidencias_aprobadas.classList.contains("active") || mis_incidencias_canceladas.classList.contains("active") || mis_incidencias.classList.contains("active") ){
            mis_incidencias_pendientes.classList.remove("active");
            mis_incidencias_aprobadas.classList.remove("active");
            mis_incidencias_canceladas.classList.remove("active");
            mis_incidencias.classList.remove("active");
        }
        
        if(!mis_incidencias_rechazadas.classList.contains("active")){
            mis_incidencias_rechazadas.classList.toggle("active");
        }
    });

    document.getElementById('mis_incidencias_aprobadas').addEventListener("click", function(){

        if(mis_incidencias_pendientes.classList.contains("active") || mis_incidencias_rechazadas.classList.contains("active") || mis_incidencias_canceladas.classList.contains("active") || mis_incidencias.classList.contains("active") ){
            mis_incidencias_pendientes.classList.remove("active");
            mis_incidencias_rechazadas.classList.remove("active");
            mis_incidencias_canceladas.classList.remove("active");
            mis_incidencias.classList.remove("active");
        }

        if(!mis_incidencias_aprobadas.classList.contains("active")){
            mis_incidencias_aprobadas.classList.toggle("active");
        }
    });

    document.getElementById('mis_incidencias_pendientes').addEventListener("click", function(){

        if(mis_incidencias_rechazadas.classList.contains("active") || mis_incidencias_aprobadas.classList.contains("active") || mis_incidencias_canceladas.classList.contains("active") || mis_incidencias.classList.contains("active") ){
            mis_incidencias_rechazadas.classList.remove("active");
            mis_incidencias_aprobadas.classList.remove("active");
            mis_incidencias_canceladas.classList.remove("active");
            mis_incidencias.classList.remove("active");
        }

        if(!mis_incidencias_pendientes.classList.contains("active")){
            mis_incidencias_pendientes.classList.toggle("active");
        }
    });

    document.getElementById('mis_incidencias_canceladas').addEventListener("click", function(){

        if(mis_incidencias_pendientes.classList.contains("active") || mis_incidencias_rechazadas.classList.contains("active") || mis_incidencias_aprobadas.classList.contains("active") || mis_incidencias.classList.contains("active")){
            mis_incidencias_pendientes.classList.remove("active");
            mis_incidencias_rechazadas.classList.remove("active");
            mis_incidencias_aprobadas.classList.remove("active");
            mis_incidencias.classList.remove("active");
        }

        if(!mis_incidencias_canceladas.classList.contains("active")){
            mis_incidencias_canceladas.classList.toggle("active");
        }
        });

        document.getElementById('mis_incidencias').addEventListener("click", function(){

        if(mis_incidencias_pendientes.classList.contains("active") || mis_incidencias_aprobadas.classList.contains("active")|| mis_incidencias_rechazadas.classList.contains("active") || mis_incidencias_canceladas.classList.contains("active")){
            mis_incidencias_pendientes.classList.remove("active");
            mis_incidencias_aprobadas.classList.remove("active");
            mis_incidencias_rechazadas.classList.remove("active");
            mis_incidencias_canceladas.classList.remove("active");
        }

        if(!mis_incidencias.classList.contains("active")){
            mis_incidencias.classList.toggle("active");
        }
        });


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

            $(document).on("change", "#estatus", function () {
                var x = $("#estatus").val();
                if(x == 1){
                    $("input[name='sueldo']").prop("disabled", false);
                }else{
                    $("input[name='sueldo']").prop("checked", false).prop("disabled", true);
                }
                
            });
        <?php  ?>

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


    .ov-btn-slide-top {
        border: 0px !important;
        font-size: 15.88px !important; 
        background-color: #c7c7c714 !important;
        color: #000003 !important;
        box-shadow: 1px 2px 0px 0px !important;
        padding: 11.5px 1px;
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

    .btn-white{
        background: white !important;
        color: white !important;
        background-color: white !important;
        border: none !important;
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
    </style>