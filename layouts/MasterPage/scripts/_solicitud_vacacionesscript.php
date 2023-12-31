<script>
	document.addEventListener("DOMContentLoaded", function() {
        var evaluation_buttons=0;
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
                    text: "Filtrar por:",
                            attr: {
                                'id': 'label_filtrar',
                                'style': 'padding-bottom:17px; font-size:large; background: none !important; border: 0px !important; color:rgb(0 0 0) !important; !important;'
                            },
                            className: ' disabled bg-white button text-2x3 h-11 px-8 py-2 text-[#64748b] font-semibold',
                           
                },
						{
                            text: "Solicitudes pendientes",
                            attr: {
                                'id': 'sol_pendientes',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'toggle button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_vacaciones/solicitud_vacaciones_pendientes.php",
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
                                         var evaluation = table.column(4);
                                         evaluation.visible(true);
                                         var estatus = table.column(5);
                                         estatus.visible(false);
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },
						
						{
                            text: "Aprobadas",
                            attr: {
                                'id': 'sol_aprobadas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'toggle button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_vacaciones/solicitud_vacaciones_aprobadas.php",
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
                                         var evaluation = table.column(4);
                                         evaluation.visible(false);
                                         var estatus = table.column(5);
                                         estatus.visible(true);
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },

                        {
                            text: "Rechazadas",
                            attr: {
                                'id': 'sol_rechazadas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'toggle button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_vacaciones/solicitud_vacaciones_rechazadas.php",
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
                                         var evaluation = table.column(4);
                                         evaluation.visible(false);
                                         var estatus = table.column(5);
                                         estatus.visible(true);
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },

                        {
                            text: "Canceladas",
                            attr: {
                                'id': 'sol_canceladas',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'toggle button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_vacaciones/solicitud_vacaciones_canceladas.php",
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
                                         var evaluation = table.column(4);
                                         evaluation.visible(false);
                                         var estatus = table.column(5);
                                         estatus.visible(true);
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        },

                        {
                            text: "Ver todo",
                            attr: {
                                'id': 'ver_todo',
                                'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                            },
                            className: 'toggle button w-full ov-btn-slide-top text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none',
							action: function ( e, dt, node, config ) {
								$.ajax({
									url: "../config/solicitud_vacaciones/ver_vacaciones.php",
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
                                         var evaluation = table.column(4);
                                         evaluation.visible(false);
                                         var estatus = table.column(5);
                                         estatus.visible(true);
										 table.column().cells().invalidate().render();
                                         table.columns.adjust().responsive.recalc();
									
									}, error: function(response) {
										console.log(response);
									}
								})
							}
                        }
					],
            "ajax":{
                "url": "../config/solicitud_vacaciones/solicitud_vacaciones_pendientes.php",
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
                {"data": "periodo"},
                {"data": "fecha_solicitud"},
                {"data": "estatus_id", searchable: false},
                {"data": "id_estatus", visible: false}
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
                                "<span>" + row["periodo"] + "</span>" +
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
                                "<span>" + row["fecha_solicitud"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [4],
                    className:"border-white dt-tituloR",
                    render: function (data, type, row) {
                        if(evaluation_buttons == 0){
                            return '<div class="flex flex-col justify-center md:flex-row gap-4"><button type="button" class="Aprobar self-start focus:outline-none text-white bg-verde hover:bg-verde-800 hover:scale-110 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5"><svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z" /></svg></button><button type="button" class="Rechazar self-start focus:outline-none text-white bg-rojo hover:bg-rojo-800 hover:scale-110 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5"><svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z" /></svg></button><button type="button" class="Cancelar self-start text-white bg-gray-800 hover:bg-gray-900 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5"><svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" stroke-width="2" stroke="white" d="M12 2C17.5 2 22 6.5 22 12S17.5 22 12 22 2 17.5 2 12 6.5 2 12 2M12 4C10.1 4 8.4 4.6 7.1 5.7L18.3 16.9C19.3 15.5 20 13.8 20 12C20 7.6 16.4 4 12 4M16.9 18.3L5.7 7.1C4.6 8.4 4 10.1 4 12C4 16.4 7.6 20 12 20C13.9 20 15.6 19.4 16.9 18.3Z" /></svg></button></div>';
                        }else{
                            return null;
                        }
                    }
                },
                {
                    target: [5],
                    className:"border-white dt-tituloR",
                    render: function (data, type, row) {
                        if(row["id_estatus"] == 4){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Pendiente</span>" +
                                "</div>"
                            );
                        }else if(row["id_estatus"] == 3){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Rechazada</span>" +
                                "</div>"
                            ); 
                        }else if(row["id_estatus"] == 2){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Cancelada</span>" +
                                "</div>"
                            ); 
                        }else if(row["id_estatus"] == 1){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Aprobada</span>" +
                                "</div>"
                            );
                        }
                    }
                }
            ],
            "initComplete": () => {
                var table = $('#datatable').DataTable();
                $('.dt-buttons').attr('id', "botones");
                var boton = document.getElementById('botones');
                boton.classList.add("flex", "flex-col", "md:flex-row", "md:flex-wrap","w-full");
                var children = boton.childElementCount;
                let array = [];
                for(let i=0; i<children; i++){
                    array[i]=boton.children[i];
                }
                for(let j=0; j<children; j++){
                    var container = document.createElement("div");
                    container.classList.add('flex-[1_0_10%]', 'gap-3');
                    boton.append(container);
                    container.append(array[j]);
                }
                $('#DT-div').show();
                table.columns.adjust().responsive.recalc();
            }
        });
    });

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
	
	$(document).ready(function() {
		$('.dataTables_filter input[type="search"]').
        attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-celeste-600');
        <?php
        if(basename($_SERVER['PHP_SELF']) == 'solicitud_vacaciones.php'){?>
            var dropdown = document.getElementById('vacaciones');
            dropdown.classList.remove("hidden"); 
        <?php } ?>

       
    //css de botones filtro
     var sol_aprobadas = document.getElementById("sol_aprobadas");
     var sol_pendientes = document.getElementById("sol_pendientes");
     var sol_rechazadas = document.getElementById("sol_rechazadas");
     var sol_canceladas = document.getElementById("sol_canceladas");
     var ver_todo = document.getElementById("ver_todo");

    document.getElementById('ver_todo').addEventListener("click", function(){

        if(sol_aprobadas.classList.contains("active") || sol_pendientes.classList.contains("active") ||sol_rechazadas.classList.contains("active") || sol_canceladas.classList.contains("active")){
            sol_aprobadas.classList.remove("active");
            sol_pendientes.classList.remove("active");
            sol_rechazadas.classList.remove("active");
            sol_canceladas.classList.remove("active");
        }
        
        if(!ver_todo.classList.contains("active")){
            ver_todo.classList.toggle("active");
        }
    });

    document.getElementById('sol_canceladas').addEventListener("click", function(){

        if(sol_aprobadas.classList.contains("active") || sol_pendientes.classList.contains("active") ||sol_rechazadas.classList.contains("active") || ver_todo.classList.contains("active")){
            sol_aprobadas.classList.remove("active");
            sol_pendientes.classList.remove("active");
            sol_rechazadas.classList.remove("active");
            ver_todo.classList.remove("active");
        }

        if(!sol_canceladas.classList.contains("active")){
            sol_canceladas.classList.toggle("active");
        }
    });

    document.getElementById('sol_rechazadas').addEventListener("click", function(){
        if(sol_aprobadas.classList.contains("active") || sol_pendientes.classList.contains("active") ||sol_canceladas.classList.contains("active") || ver_todo.classList.contains("active")){
            sol_aprobadas.classList.remove("active");
            sol_pendientes.classList.remove("active");
            sol_canceladas.classList.remove("active");
            ver_todo.classList.remove("active");
        }

        if(!sol_rechazadas.classList.contains("active")){
            sol_rechazadas.classList.toggle("active");
        }
        });

        document.getElementById('sol_pendientes').addEventListener("click", function(){
        if(sol_aprobadas.classList.contains("active") || sol_rechazadas.classList.contains("active") ||sol_canceladas.classList.contains("active") || ver_todo.classList.contains("active")){
            sol_aprobadas.classList.remove("active");
            sol_rechazadas.classList.remove("active");
            sol_canceladas.classList.remove("active");
            ver_todo.classList.remove("active");
        }

        if(!sol_pendientes.classList.contains("active")){
            sol_pendientes.classList.toggle("active");
        }
        });

        document.getElementById('sol_aprobadas').addEventListener("click", function(){
        if(sol_pendientes.classList.contains("active") || sol_rechazadas.classList.contains("active") ||sol_canceladas.classList.contains("active") || ver_todo.classList.contains("active")){
            sol_pendientes.classList.remove("active");
            sol_rechazadas.classList.remove("active");
            sol_canceladas.classList.remove("active");
            ver_todo.classList.remove("active");
        }

        if(!sol_aprobadas.classList.contains("active")){
            sol_aprobadas.classList.toggle("active");
        }
        });
    //
       
       
        $('#datatable').on('click', 'tr .Aprobar', function () {
            var estatus=1;
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
                title: 'Aprobar Vacaciones',
                text: "¿Está seguro que desea aprobar esta solicitud de vacaciones",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Confirme la siguiente acción',
                        text: '¿Desea agregar un comentario sobre el porqué del estatus de la solicitud de vacaciones?',
                        icon: 'warning',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Agregar comentario',
                        denyButtonText: 'Sin comentarios',
                        cancelButtonText: 'Cancelar',
                        showLoaderOnDeny: true,
                        reverseButtons: true,
                        preDeny: () => {
                            return new Promise((resolve, reject) => {
                                check_user_logged().then((response) => {
                                    if(response == "true"){
                                        window.addEventListener('beforeunload', unloadHandler);
                                        var fd = new FormData();
                                        var solicitud_vacaciones = data["solicitud_id"];
                                        var method = "store";
                                        var app = "solicitud_vacaciones";
                                        fd.append('solicitud_vacaciones', solicitud_vacaciones);
                                        fd.append('estatus', estatus);
                                        fd.append('method', method);
                                        fd.append('app', app);
                                        
                                        $.ajax({
                                            type: "POST",
                                            url: "../ajax/class_search.php",
                                            data: fd,
                                            processData: false,
                                            contentType: false,
                                            success: function(message) {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                resolve(message)
                                            }, error: function (error) {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                reject(error)
                                            }	
                                        });
                                    }else{
                                        Swal.fire({
                                            title: "Ocurrió un error",
                                            text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                                            icon: "error"
                                        }).then(function() {
                                            window.removeEventListener('beforeunload', unloadHandler);
                                            window.location.href = "login.php";
                                        });	
                                    }
                                }).catch((error) => {
                                    console.log(error);
                                })  
                            });
                        }
                    }).then((result) => {	
                        if (result.isConfirmed) {
                            openModal();
                            $.validator.addMethod('field_validation', function (value, element) {
                                return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
                            }, 'not a valid field.');
                            $('#Guardar').validate({
                                ignore: [],
                                errorPlacement: function(error, element) {
                                    error.insertAfter(element.parent('.group.flex'));
                                },
                                highlight: function(element) {
                                    $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                                    $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                                },
                                unhighlight: function(element) {
                                    $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                                    $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                                },
                                rules: {
                                    comentario: {
                                        required: true,
                                        field_validation:true
                                    }
                                },
                                messages: {
                                    comentario: {
                                        required: 'Por favor, ingrese un comentario',
                                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                                    }
                                },
                                submitHandler: function(form) {
                                    resetFormValidator("#Guardar");
                                    $('#Guardar').unbind('submit');
                                    $('#message-error').html("");
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
                                            var solicitud_vacaciones = data["solicitud_id"];
                                            var comentario = $('#comentario').val();
                                            var method = "store";
                                            var app = "solicitud_vacaciones";
                                            fd.append('solicitud_vacaciones', solicitud_vacaciones);
                                            fd.append('comentario', comentario);
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
                                                    var array = $.parseJSON(response);
                                                    if(array[0] == "success"){
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Éxito',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            table.ajax.reload(null, false);												
                                                        });
                                                    }else if(array[0] == "failed"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                        });
                                                    }else if(array[0] == "forbidden"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            window.location.href="dashboard.php";
                                                        });
                                                    }else if(array[0] == "solicitud_not_found"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            table.ajax.reload(null, false);
                                                        });
                                                    }
                                                }, error: function(response) {
                                                    console.log(response);
                                                }	
                                            });
                                            /*TERMINA EL AJAX*/
                                        }else{
                                            Swal.fire({
                                                title: "Ocurrió un error",
                                                text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 btn-celeste font-medium text-white hover:btn-celeste focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-celeste-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Agregar comentario</button>');
                                                $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                window.location.href = "login.php";
                                            });	
                                        }
                                    }).catch((error) => {
                                        console.log(error);
                                    })  							
                                false;
                                }
                            });					
                        }else if (result.isDenied) {
                            $('#message-error').html("");
                            var array = $.parseJSON(result.value);
                            if(array[0] == "success"){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: array[1],
                                }).then(function() {
                                    table.ajax.reload(null, false);													
                                });
                            }else if(array[0] == "failed"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1]
                                });
                            }else if(array[0] == "forbidden"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1],
                                }).then(function() {
                                    window.location.href = "dashboard.php";
                                });
                            }else if(array[0] == "solicitud_not_found"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1],
                                }).then(function() {
                                    table.ajax.reload(null, false);
                                });
                            }		      
                        }else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                                'Cancelado',
                                'Se ha cancelado la operación',
                                'error'
                            )	
                        }
                    })	
                }else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelado',
                        'Se ha cancelado la operación',
                        'error'
                    )
                }
            })
        });

        $('#datatable').on('click', 'tr .Cancelar', function () {
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
                title: 'Cancelar Vacaciones',
                text: "¿Está seguro que desea cancelar esta solicitud de vacaciones?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Confirme la siguiente acción',
                        text: '¿Desea agregar un comentario sobre el porqué del estatus de la solicitud de vacaciones?',
                        icon: 'warning',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Agregar comentario',
                        denyButtonText: 'Sin comentarios',
                        cancelButtonText: 'Cancelar',
                        showLoaderOnDeny: true,
                        reverseButtons: true,
                        preDeny: () => {
                            return new Promise((resolve, reject) => {
                                check_user_logged().then((response) => {
                                    if(response == "true"){
                                        window.addEventListener('beforeunload', unloadHandler);
                                        var fd = new FormData();
                                        var solicitud_vacaciones = data["solicitud_id"];
                                        var method = "store";
                                        var app = "solicitud_vacaciones";
                                        fd.append('solicitud_vacaciones', solicitud_vacaciones);
                                        fd.append('estatus', estatus);
                                        fd.append('method', method);
                                        fd.append('app', app);
                                        
                                        $.ajax({
                                            type: "POST",
                                            url: "../ajax/class_search.php",
                                            data: fd,
                                            processData: false,
                                            contentType: false,
                                            success: function(message) {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                resolve(message)
                                            }, error: function (error) {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                reject(error)
                                            }	
                                        });
                                    }else{
                                        Swal.fire({
                                            title: "Ocurrió un error",
                                            text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                                            icon: "error"
                                        }).then(function() {
                                            window.removeEventListener('beforeunload', unloadHandler);
                                            window.location.href = "login.php";
                                        });	
                                    }
                                }).catch((error) => {
                                    console.log(error);
                                })
                            });
                        }
                    }).then((result) => {	
                        if (result.isConfirmed) {
                            openModal();
                            $.validator.addMethod('field_validation', function (value, element) {
                                return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
                            }, 'not a valid field.');
                            $('#Guardar').validate({
                                ignore: [],
                                errorPlacement: function(error, element) {
                                    error.insertAfter(element.parent('.group.flex'));
                                },
                                highlight: function(element) {
                                    $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                                    $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                                },
                                unhighlight: function(element) {
                                    $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                                    $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                                },
                                rules: {
                                    comentario: {
                                        required: true,
                                        field_validation: true
                                    }
                                },
                                messages: {
                                    comentario: {
                                        required: 'Por favor, ingrese un comentario',
                                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                                    }
                                },
                                submitHandler: function(form) {	
                                    resetFormValidator("#Guardar");
                                    $('#Guardar').unbind('submit');
                                    $('#message-error').html("");
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
                                            var solicitud_vacaciones = data["solicitud_id"];
                                            var comentario = $('#comentario').val();
                                            var method = "store";
                                            var app = "solicitud_vacaciones";
                                            fd.append('solicitud_vacaciones', solicitud_vacaciones);
                                            fd.append('comentario', comentario);
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
                                                    var array = $.parseJSON(response);
                                                    if(array[0] == "success"){
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Éxito',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            table.ajax.reload(null, false);												
                                                        });
                                                    }else if(array[0] == "failed"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                        });
                                                    }else if(array[0] == "forbidden"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            window.location.href="dashboard.php";
                                                        });
                                                    }else if(array[0] == "solicitud_not_found"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            table.ajax.reload(null, false);
                                                        });
                                                    }
                                                }, error: function(response) {
                                                    console.log(response);
                                                }	
                                            });
                                            /*TERMINA EL AJAX*/
                                        }else{
                                            Swal.fire({
                                                title: "Ocurrió un error",
                                                text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 btn-celeste font-medium text-white hover:btn-celeste focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-celeste-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Agregar comentario</button>');
                                                $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                window.location.href = "login.php";
                                            });	
                                        }
                                    }).catch((error) => {
                                        console.log(error);
                                    })  							
                                false;
                                }
                            });					
                        }else if (result.isDenied) {
                            $('#message-error').html("");
                            var array = $.parseJSON(result.value);
                            if(array[0] == "success"){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: array[1],
                                }).then(function() {
                                    table.ajax.reload(null, false);													
                                });
                            }else if(array[0] == "failed"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1]
                                });
                            }else if(array[0] == "forbidden"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1],
                                }).then(function() {
                                    window.location.href = "dashboard.php";
                                });
                            }else if(array[0] == "solicitud_not_found"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1],
                                }).then(function() {
                                    table.ajax.reload(null, false);
                                });
                            }    
                        }else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                                'Cancelado',
                                'Se ha cancelado la operación',
                                'error'
                            )	
                        }
                    })	
                }else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelado',
                        'Se ha cancelado la operación',
                        'error'
                    )
                }
            })
        });

        $('#datatable').on('click', 'tr .Rechazar', function () {
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
                title: 'Rechazar Vacaciones',
                text: "¿Está seguro que desea rechazar esta solicitud de vacaciones?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Confirme la siguiente acción',
                        text: '¿Desea agregar un comentario sobre el porqué del estatus de la solicitud de las vacaciones?',
                        icon: 'warning',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Agregar comentario',
                        denyButtonText: 'Sin comentarios',
                        cancelButtonText: 'Cancelar',
                        showLoaderOnDeny: true,
                        reverseButtons: true,
                        preDeny: () => {
                            return new Promise((resolve, reject) => {
                                check_user_logged().then((response) => {
                                    if(response == "true"){
                                        window.addEventListener('beforeunload', unloadHandler);
                                        var fd = new FormData();
                                        var solicitud_vacaciones = data["solicitud_id"];
                                        var method = "store";
                                        var app = "solicitud_vacaciones";
                                        fd.append('solicitud_vacaciones', solicitud_vacaciones);
                                        fd.append('estatus', estatus);
                                        fd.append('method', method);
                                        fd.append('app', app);
                                        
                                        $.ajax({
                                            type: "POST",
                                            url: "../ajax/class_search.php",
                                            data: fd,
                                            processData: false,
                                            contentType: false,
                                            success: function(message) {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                resolve(message)
                                            }, error: function (error) {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                reject(error)
                                            }	
                                        });
                                    }else{
                                        Swal.fire({
                                            title: "Ocurrió un error",
                                            text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                                            icon: "error"
                                        }).then(function() {
                                            window.removeEventListener('beforeunload', unloadHandler);
                                            window.location.href = "login.php";
                                        });	
                                    }
                                }).catch((error) => {
                                    console.log(error);
                                })
                            });
                        }
                    }).then((result) => {	
                        if (result.isConfirmed) {
                            openModal();
                            $.validator.addMethod('field_validation', function (value, element) {
                                return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
                            }, 'not a valid field.');
                            $('#Guardar').validate({
                                ignore: [],
                                errorPlacement: function(error, element) {
                                    error.insertAfter(element.parent('.group.flex'));
                                },
                                highlight: function(element) {
                                    $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                                    $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                                },
                                unhighlight: function(element) {
                                    $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                                    $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                                },
                                rules: {
                                    comentario: {
                                        required: true,
                                        field_validation: true
                                    }
                                },
                                messages: {
                                    comentario: {
                                        required: 'Por favor, ingrese un comentario',
                                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                                    }
                                },
                                submitHandler: function(form) {	
                                    resetFormValidator("#Guardar");
                                    $('#Guardar').unbind('submit');
                                    $('#message-error').html("");
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
                                            var solicitud_vacaciones = data["solicitud_id"];
                                            var comentario = $('#comentario').val();
                                            var method = "store";
                                            var app = "solicitud_vacaciones";
                                            fd.append('solicitud_vacaciones', solicitud_vacaciones);
                                            fd.append('comentario', comentario);
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
                                                    var array = $.parseJSON(response);
                                                    if(array[0] == "success"){
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Éxito',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            table.ajax.reload(null, false);												
                                                        });
                                                    }else if(array[0] == "failed"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                        });
                                                    }else if(array[0] == "forbidden"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            window.location.href="dashboard.php";
                                                        });
                                                    }else if(array[0] == "solicitud_not_found"){
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: array[1],
                                                        }).then(function() {
                                                            window.removeEventListener('beforeunload', unloadHandler);
                                                            $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="button w-full inline-flex justify-center btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700 sm:mt-0 sm:ml-3 sm:w-auto">Agregar comentario</button>');
                                                            $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                            closeModal();
                                                            table.ajax.reload(null, false);
                                                        });
                                                    }
                                                }, error: function(response) {
                                                    console.log(response);
                                                }	
                                            });
                                            /*TERMINA EL AJAX*/
                                        }else{
                                            Swal.fire({
                                                title: "Ocurrió un error",
                                                text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes').html('<button disabled id="agregar-comentario" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 btn-celeste font-medium text-white hover:btn-celeste focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-celeste-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Agregar comentario</button>');
                                                $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                window.location.href = "login.php";
                                            });	
                                        }
                                    }).catch((error) => {
                                        console.log(error);
                                    })  							
                                false;
                                }
                            });					
                        }else if (result.isDenied) {
                            $('#message-error').html("");
                            var array = $.parseJSON(result.value);
                            if(array[0] == "success"){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: array[1],
                                }).then(function() {
                                    table.ajax.reload(null, false);													
                                });
                            }else if(array[0] == "failed"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1]
                                });
                            }else if(array[0] == "forbidden"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1],
                                }).then(function() {
                                    window.location.href = "dashboard.php";
                                });
                            }else if(array[0] == "solicitud_not_found"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: array[1],
                                }).then(function() {
                                    table.ajax.reload(null, false);
                                });
                            }  
                        }else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                                'Cancelado',
                                'Se ha cancelado la operación',
                                'error'
                            )	
                        }
                    })	
                }else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelado',
                        'Se ha cancelado la operación',
                        'error'
                    )
                }
            })
        });

        function unloadHandler(e) {
            // Cancel the event
            e.preventDefault();
            // Chrome requires returnValue to be set
            e.returnValue = '';
        }

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

    .error{
        color:red;
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
        float:left !important;
        text-align: left;
    }

    #datatable{
        border-collapse: collapse !important;
        font-size: 13px;
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
        padding: 16px 20px ;
        border-radius: 107px !important;
        position: relative;
        z-index: 1;
        overflow: hidden;
        display: inline-block;

    }
    .ov-btn-slide-top:hover {
        color: #fff !important; /* color de fuente hover */
    }
    .ov-btn-slide-top::after {
        content: "";
        background:#1f1c1ce3; /* color de fondo hover */
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
    </style>
