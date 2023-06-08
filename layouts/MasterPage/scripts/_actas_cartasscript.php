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
                        text: "Actas administrativas vinculadas a mi expediente",
                        attr: {
                            'id': 'actas_administrativas_vinculadas',
                            'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        },
                        className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                        action: function ( e, dt, node, config ) {
                            $.ajax({
                                url: "../config/documentos_administrativos/actas_vinculadas.php",
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
                                    var documento1 = table.column(4);
                                    var documento2 = table.column(5);
                                    var icon1 = table.column(6);
                                    var icon2 = table.column(7);
                                    documento1.visible(true);
                                    documento2.visible(false);
                                    icon1.visible(true);
                                    icon2.visible(false);
                                    table.column().cells().invalidate().render();
                                    table.columns.adjust().responsive.recalc();
                                
                                }, error: function(response) {
                                    console.log(response);
                                }
                            })
                        }
                    },
                    {
                        text: "Cartas compromiso vinculadas a mi expediente",
                        attr: {
                            'id': 'cartas_compromiso_vinculadas',
                            'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        },
                        className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                        action: function ( e, dt, node, config ) {
                            $.ajax({
                                url: "../config/documentos_administrativos/cartas_vinculadas.php",
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
                                    var documento1 = table.column(4);
                                    var documento2 = table.column(5);
                                    var icon1 = table.column(6);
                                    var icon2 = table.column(7);
                                    documento1.visible(true);
                                    documento2.visible(false);
                                    icon1.visible(true);
                                    icon2.visible(false);
                                    table.column().cells().invalidate().render();
                                    table.columns.adjust().responsive.recalc();
                                
                                }, error: function(response) {
                                    console.log(response);
                                }
                            })
                        }
                    },
               <?php } ?>
               <?php if(Permissions::CheckPermissions($_SESSION["id"], "Ver todos los documentos administrativos") == "true" || Roles::FetchSessionRol($_SESSION["id"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["id"]) == "Administrador"){ ?>
                {
                        text: "Administrar actas administrativas",
                        attr: {
                            'id': 'administrar_actas_administrativas',
                            'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        },
                        className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                        action: function ( e, dt, node, config ) {
                            $.ajax({
                                url: "../config/documentos_administrativos/ajax_actas.php",
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
                                    var documento1 = table.column(4);
                                    var documento2 = table.column(5);
                                    var icon1 = table.column(6);
                                    var icon2 = table.column(7);
                                    documento1.visible(false);
                                    documento2.visible(true);
                                    icon1.visible(false);
                                    icon2.visible(true);
                                    table.column().cells().invalidate().render();
                                    table.columns.adjust().responsive.recalc();
                                
                                }, error: function(response) {
                                    console.log(response);
                                }
                            })
                        }
                    },
                    {
                        text: "Administrar cartas compromiso",
                        attr: {
                            'id': 'administrar_cartas_compromiso',
                            'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                        },
                        className: 'button w-full bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700',
                        action: function ( e, dt, node, config ) {
                            $.ajax({
                                url: "../config/documentos_administrativos/ajax_cartas.php",
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
                                    var documento1 = table.column(4);
                                    var documento2 = table.column(5);
                                    var icon1 = table.column(6);
                                    var icon2 = table.column(7);
                                    documento1.visible(false);
                                    documento2.visible(true);
                                    icon1.visible(false);
                                    icon2.visible(true);
                                    table.column().cells().invalidate().render();
                                    table.columns.adjust().responsive.recalc();
                                
                                }, error: function(response) {
                                    console.log(response);
                                }
                            })
                        }
                    }
               <?php } ?>
            ],
            "ajax":{
                <?php if($count_jerarquia > 0){ ?>
                    "url": "../config/documentos_administrativos/actas_vinculadas.php",
                <?php }else{ ?>
                    "url": "../config/documentos_administrativos/ajax_actas.php",
                <?php } ?>
                "type": "POST",
                "dataSrc": "",
                "data":{
                    "rol": <?php echo $_SESSION["rol"]; ?>,
                    "sessionid": <?php echo $_SESSION["id"]; ?>

                }
            },
            "columns":[
                {"data": "creada_por"},
                {"data": "asignada_a"},
                {"data": "tipo"},
                {"data": "fecha"},
                <?php if($count_jerarquia > 0){ ?>
                    {"data": "documento_nombre", searchable: false},
                    {"data": "documento", visible: false, searchable: false},
                    {"data": "id", searchable: false},
                    {"data": "id_acta_administrativa", visible: false, searchable: false},
                <?php }else{ ?>
                    {"data": "documento_nombre", visible: false, searchable: false},
                    {"data": "documento", searchable: false},
                    {"data": "id", visible: false, searchable: false},
                    {"data": "id_acta_administrativa", searchable: false},
                <?php } ?>
                {"data": "id_carta_compromiso", visible: false, searchable: false}
            ],
            "columnDefs": 
            [
                {
                    target: [0],
                    render: function (data, type, row) {
                        return(
                            "<div class='text-left'>" +
                                "<span>" + row["creada_por"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [1],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left'>" +
                                "<span>" + row["asignada_a"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [2],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["tipo"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [3],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["fecha"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [4],
                    render: function (data, type, row) {
                        if(row["tipo"] == "ACTA ADMINISTRATIVA"){
                            if(row["documento_nombre"] == null || row["documento"] == null){
                                return (
                                    "<div class='text-left lg:text-center'>" +
                                            "<span> No se ha subido el acta administrativa firmado </span>" +
                                    "</div>"
                                ); 
                            }else{
                                return (
                                    "<div class='text-left lg:text-center'>" +
                                        "<span> Se ha subido el acta administrativa firmado </span>" +
                                    "</div>"
                                );
                            }
                        }else if(row["tipo"] == "CARTA COMPROMISO"){
                            if(row["documento_nombre"] == null || row["documento"] == null){
                                return (
                                    "<div class='text-left lg:text-center'>" +
                                            "<span> No se ha subido la carta compromiso firmada </span>" +
                                    "</div>"
                                ); 
                            }else{
                                return (
                                    "<div class='text-left lg:text-center'>" +
                                        "<span> Se ha subido la carta compromiso firmada </span>" +
                                    "</div>"
                                );
                            }
                        }
                    }
                },
                {
                    target: [5],
                    render: function (data, type, row) {
                        if(row["tipo"] == "ACTA ADMINISTRATIVA"){
                            if(row["documento_nombre"] == null || row["documento"] == null){
                                return (
                                    "<div class='text-left lg:text-center'>" +
                                        "<button type='button' class='subir_acta px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900'>Subir acta administrativa firmado</button>" +
                                    "</div>"
                                ); 
                            }else{
                                return (
                                    "<div class='text-left lg:text-center'>" +
                                        "<button type='button' class='editar_acta px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900'>Editar acta administrativa firmado</button>" +
                                    "</div>"
                                );
                            }
                        }else if(row["tipo"] == "CARTA COMPROMISO"){
                            if(row["documento_nombre"] == null || row["documento"] == null){
                                return (
                                    "<div class='text-left lg:text-center'>" +
                                        "<button type='button' class='subir_carta px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900'>Subir carta compromiso firmada</button>" +
                                    "</div>"
                                ); 
                            }else{
                                return (
                                    "<div class='text-left lg:text-center'>" +
                                        "<button type='button' class='editar_carta px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900'>Editar carta compromiso firmada</button>" +
                                    "</div>"
                                );
                            }
                        }
                    }
                },
                {
                    target: [6],
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
                },
                {
                    target: [7],
                    render: function (data, type, row) {
                        return (
                            "<div class='py-3 text-left'>" +
                            "<div class='flex item-center justify-center data'>" +
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Editar'>" +
                            "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                            "</svg>" +
                            "</div>" +
                            "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer VerImprimir'>" +
                            "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>"+
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />"+
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z' />"+
                            "</svg>"+
                            "</div>"+
                            "<div class='w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>" +
                            "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                            "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>" +
                            "</svg>" +
                            "</div>" +
                            "</div>"+
                            "</div>"
                        );		
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
                    container.classList.add('flex-[1_0_18%]', 'm-[5px]');
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
        attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-600');

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
            window.location.href = "editar_documento_administrativo.php?idIncidenciaAdministrativa="+data["id"]+""; 
        });

        $('#datatable').on('click', 'tr .VerImprimir', function () {
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
            window.location.href = "ver_documento_administrativo.php?idIncidenciaAdministrativa="+data["id"]+""; 
        });

        $('#datatable').on('click', 'tr .Eliminar', function () {
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
                check_user_logged().then((response) => {
                    if(response == "true"){
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'éxito',
                                text: 'La fila ha sido eliminada!'
                            }).then(function() {
                                var eliminarid = data["id"];
                                var tipo_incidencia = data["tipo"];
                                var fd = new FormData();
                                fd.append('id', eliminarid);
                                fd.append('tipo_incidencia', tipo_incidencia);
                                if(tipo_incidencia == "ACTA ADMINISTRATIVA"){
                                    var id_acta = data["id_acta_administrativa"];
                                    fd.append('id_acta', id_acta);
                                }else{
                                    var id_carta = data["id_carta_compromiso"];
                                    fd.append('id_carta', id_carta);
                                }
                                $.ajax({
                                    url: "../ajax/eliminar/tabla_actas_cartas/eliminardocumento.php",
                                    type: "post",
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    success: function(result) {
                                        table.row(row).remove().draw();
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

        $('#datatable').on('click', 'tr .subir_acta', function () {
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
                "<div class='modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10'><svg class='w-5 h-5 text-black' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20.1L20 10.1V8L14 2H6M13 3.5L18.5 9H13V3.5M20.1 13C20 13 19.8 13.1 19.7 13.2L18.7 14.2L20.8 16.3L21.8 15.3C22 15.1 22 14.7 21.8 14.5L20.5 13.2C20.4 13.1 20.3 13 20.1 13M18.1 14.8L12 20.9V23H14.1L20.2 16.9L18.1 14.8Z' /></svg></div>"+
                "<h3 class='text-lg font-medium text-gray-900'>Documentos administrativos</h3>"+
                "</div>"+
                "<div class='modal-content text-center w-full mt-3 sm:mt-0 sm:mt-0 sm:text-left'>"+
                    "<div class='grid grid-cols-1 mt-5'>"+
                        "<label class='text-[#64748b] font-semibold mb-2' style='word-break: break-word;'>Subir acta firmada para "+data['asignada_a']+"</label>"+
                        "<div class='flex flex-col w-full justify-center mt-2'>"+
                            "<div id='upload-button-acta' onclick='upload_acta_click()' class='inline-flex self-start items-center px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900'>"+
                                "Subir archivo"+
                            "</div>"+
                            "<div class='flex items-center justify-between'>"+
                                "<span id='upload-text-acta' style='word-break: break-word;'>No hay ningún archivo seleccionado</span>"+
                                "<button type='button' id='upload-delete-acta' class='hidden cursor-pointer'>"+
                                    "<svg xmlns='http://www.w3.org/2000/svg' class='fill-current text-red-700 w-3 h-3' viewBox='0 0 320 512'>"+
                                        "<path d='M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z'/>"+
                                    "</svg>"+
                                "</button>"+
                            "</div>"+
                        "</div>"+
                        "<input type='file' name='subir_acta' id='subir_acta'  class='hidden' />"+
                        "<div id='content-container-acta'></div>"+
                        "<div id='error_container-acta'></div>"+
                    "</div>"+
                "</div>"
            );
            $('.modal-actions').html(
                "<div id='submit-changes'>"+
                    "<button id='guardar-acta' name='guardar-acta' class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto'>Guardar acta</button>"+
                "</div>"+
                "<div id='disable-close-submit'>"+
                    "<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>"+
                "</div>"
            );
            openModal();
            resetFormValidator("#Guardar");
            $('#Guardar').unbind('submit');
            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1048576);
            }, 'File size must be less than {0} MB');
            $('#Guardar').validate({
                ignore: [],
                errorPlacement: function(error, element) {
                    error.appendTo('div#error_container-acta');
                },
                rules: {
                    subir_acta: {
                        required: true,
                        extension: "jpg|jpeg|png|pdf",
                        filesize: 10
                    }
                },
                messages: {
                    subir_acta: {
                        required: 'Este campo es requerido',
                        extension: 'Solo se permite jpg, jpeg, pngs y pdfs',
                        filesize: 'Los archivos deben pesar ser menos de 10 MB'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-changes').html(
                    '<button disabled id="guardar-acta" name="guardar-acta" class="button items-center w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto" type="submit">'+
                        '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                        '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                        '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                        '</svg>'+
                        'Cargando...'+
                    '</button>');
                    $('#disable-close-submit').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                    $('#upload-delete-acta').attr('disabled', 'true');
                    check_user_logged().then((response) => {
                        if(response == "true"){
                            window.addEventListener('beforeunload', unloadHandler);
                            var fd = new FormData();
                            var incidenciaid = data["id"];
                            var tipo = "acta_administrativa";
                            var archivo = $('#subir_acta')[0].files[0];
                            var app = "actas_cartas";
                            var method = "store";
                            fd.append('incidenciaid', incidenciaid);
                            fd.append('tipo', tipo);
                            fd.append('archivo', archivo);
                            fd.append('app', app);
                            fd.append('method', method);
                            $.ajax({
                                type: "post",
                                url: "../ajax/class_search.php",
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    setTimeout(function(){
                                        var array = $.parseJSON(data);
                                        if (array[0] == "success") {
                                            Swal.fire({
                                                title: "Éxito",
                                                text: array[1],
                                                icon: "success"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes').html("<button disabled class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='guardar-acta' name='guardar-acta' type='submit'>Guardar acta</button>");
                                                closeModal();
                                                table.ajax.reload(null, false);
                                            });
                                        } else if(array[0] == "error") {
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes').html("<button class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='guardar-acta' name='guardar-acta' type='submit'>Guardar acta</button>");
                                                $('#disable-close-submit').html("<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                $('#upload-delete-acta').removeAttr('disabled');
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


        $('#datatable').on('click', 'tr .subir_carta', function () {
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
                "<div class='modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10'><svg class='w-5 h-5 text-black' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20.1L20 10.1V8L14 2H6M13 3.5L18.5 9H13V3.5M20.1 13C20 13 19.8 13.1 19.7 13.2L18.7 14.2L20.8 16.3L21.8 15.3C22 15.1 22 14.7 21.8 14.5L20.5 13.2C20.4 13.1 20.3 13 20.1 13M18.1 14.8L12 20.9V23H14.1L20.2 16.9L18.1 14.8Z' /></svg></div>"+
                "<h3 class='text-lg font-medium text-gray-900'>Documentos administrativos</h3>"+
                "</div>"+
                "<div class='modal-content text-center w-full mt-3 sm:mt-0 sm:mt-0 sm:text-left'>"+
                    "<div class='grid grid-cols-1 mt-5'>"+
                        "<label class='text-[#64748b] font-semibold mb-2' style='word-break: break-word;'>Subir carta firmada para "+data['asignada_a']+"</label>"+
                        "<div class='flex flex-col w-full justify-center mt-2'>"+
                            "<div id='upload-button-carta' onclick='upload_carta_click()' class='inline-flex self-start items-center px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900'>"+
                                "Subir archivo"+
                            "</div>"+
                            "<div class='flex items-center justify-between'>"+
                                "<span id='upload-text-carta' style='word-break: break-word;'>No hay ningún archivo seleccionado</span>"+
                                "<button type='button' id='upload-delete-carta' class='hidden cursor-pointer'>"+
                                    "<svg xmlns='http://www.w3.org/2000/svg' class='fill-current text-red-700 w-3 h-3' viewBox='0 0 320 512'>"+
                                        "<path d='M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z'/>"+
                                    "</svg>"+
                                "</button>"+
                            "</div>"+
                        "</div>"+
                        "<input type='file' name='subir_carta' id='subir_carta'  class='hidden' />"+
                        "<div id='content-container-carta'></div>"+
                        "<div id='error_container-carta'></div>"+
                    "</div>"+
                "</div>"
            );
            $('.modal-actions').html(
                "<div id='submit-changes-carta'>"+
                    "<button id='guardar-carta' name='guardar-carta' class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto'>Guardar carta</button>"+
                "</div>"+
                "<div id='disable-close-submit-carta'>"+
                    "<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>"+
                "</div>"
            );
            openModal();
            resetFormValidator("#Guardar");
            $('#Guardar').unbind('submit');
            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1048576);
            }, 'File size must be less than {0} MB');
            $('#Guardar').validate({
                ignore: [],
                errorPlacement: function(error, element) {
                    error.appendTo('div#error_container-carta');
                },
                rules: {
                    subir_carta: {
                        required: true,
                        extension: "jpg|jpeg|png|pdf",
                        filesize: 10
                    }
                },
                messages: {
                    subir_carta: {
                        required: 'Este campo es requerido',
                        extension: 'Solo se permite jpg, jpeg, pngs y pdfs',
                        filesize: 'Los archivos deben pesar ser menos de 10 MB'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-changes-carta').html(
                    '<button disabled id="guardar-carta" name="guardar-carta" class="button items-center w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto" type="submit">'+
                        '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                        '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                        '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                        '</svg>'+
                        'Cargando...'+
                    '</button>');
                    $('#disable-close-submit-carta').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                    $('#upload-delete-carta').attr('disabled', 'true');
                    check_user_logged().then((response) => {
                        if(response == "true"){
                            window.addEventListener('beforeunload', unloadHandler);
                            var fd = new FormData();
                            var incidenciaid = data["id"];
                            var tipo = "carta_compromiso";
                            var archivo = $('#subir_carta')[0].files[0];
                            var app = "actas_cartas";
                            var method = "store";
                            fd.append('incidenciaid', incidenciaid);
                            fd.append('tipo', tipo);
                            fd.append('archivo', archivo);
                            fd.append('app', app);
                            fd.append('method', method);
                            $.ajax({
                                type: "post",
                                url: "../ajax/class_search.php",
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    setTimeout(function(){
                                        var array = $.parseJSON(data);
                                        if (array[0] == "success") {
                                            Swal.fire({
                                                title: "Éxito",
                                                text: array[1],
                                                icon: "success"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes-carta').html("<button disabled class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='guardar-carta' name='guardar-carta' type='submit'>Guardar carta</button>");
                                                closeModal();
                                                table.ajax.reload(null, false);
                                            });
                                        } else if(array[0] == "error") {
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes-carta').html("<button class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='guardar-carta' name='guardar-carta' type='submit'>Guardar carta</button>");
                                                $('#disable-close-submit-carta').html("<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                $('#upload-delete-carta').removeAttr('disabled');
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

        $('#datatable').on('click', 'tr .editar_acta', function () {
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
                "<div class='modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10'><svg class='w-5 h-5 text-black' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20.1L20 10.1V8L14 2H6M13 3.5L18.5 9H13V3.5M20.1 13C20 13 19.8 13.1 19.7 13.2L18.7 14.2L20.8 16.3L21.8 15.3C22 15.1 22 14.7 21.8 14.5L20.5 13.2C20.4 13.1 20.3 13 20.1 13M18.1 14.8L12 20.9V23H14.1L20.2 16.9L18.1 14.8Z' /></svg></div>"+
                "<h3 class='text-lg font-medium text-gray-900'>Documentos administrativos</h3>"+
                "</div>"+
                "<div class='modal-content text-center w-full mt-3 sm:mt-0 sm:mt-0 sm:text-left'>"+
                    "<div class='grid grid-cols-1 mt-5'>"+
                        "<label class='text-[#64748b] font-semibold mb-2' style='word-break: break-word;'>Editar acta firmada para "+data['asignada_a']+"</label>"+
                        "<div class='flex flex-col w-full justify-center mt-2'>"+
                            "<div id='edit-button-acta' onclick='edit_acta_click()' class='inline-flex self-start items-center px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900'>"+
                                "Editar acta"+
                            "</div>"+
                            "<div class='flex items-center justify-between'>"+
                                "<span id='edit-text-acta' style='word-break: break-word;'>1 archivo seleccionado</span>"+
                                "<button type='button' id='edit-delete-acta' class='cursor-pointer'>"+
                                    "<svg xmlns='http://www.w3.org/2000/svg' class='fill-current text-red-700 w-3 h-3' viewBox='0 0 320 512'>"+
                                        "<path d='M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z'/>"+
                                    "</svg>"+
                                "</button>"+
                            "</div>"+
                        "</div>"+
                        "<input type='file' name='edit_acta' id='edit_acta'  class='hidden' />"+
                        "<div id='edit-content-container-acta'>"+
                            "<ul id='lista-edit-acta' class='break-all md:break-normal'>"+
                                
                            "</ul>"+
                        "</div>"+
                        "<div id='error_edit_container-acta'></div>"+
                    "</div>"+
                "</div>"
            );
            $('.modal-actions').html(
                "<div id='submit-changes-edit-acta'>"+
                    "<button id='edit-changes-acta' name='edit-changes-acta' class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto'>Editar acta</button>"+
                "</div>"+
                "<div id='disable-close-submit-edit-acta'>"+
                    "<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>"+
                "</div>"
            );
            checkFile("../src/acta_administrativa/"+data['documento']+"", data["documento_nombre"], data["documento"], data["tipo"]);
            openModal();
            resetFormValidator("#Guardar");
            $('#Guardar').unbind('submit');
            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1048576);
            }, 'File size must be less than {0} MB');
            $('#Guardar').validate({
                ignore: [],
                errorPlacement: function(error, element) {
                    error.appendTo('div#error_edit_container-acta');
                },
                rules: {
                    edit_acta: {
                        required: true,
                        extension: "jpg|jpeg|png|pdf",
                        filesize: 10
                    }
                },
                messages: {
                    edit_acta: {
                        required: 'Este campo es requerido',
                        extension: 'Solo se permite jpg, jpeg, pngs y pdfs',
                        filesize: 'Los archivos deben pesar ser menos de 10 MB'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-changes-edit-acta').html(
                    '<button disabled id="edit-changes-acta" name="edit-changes-acta" class="button items-center w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto" type="submit">'+
                        '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                        '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                        '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                        '</svg>'+
                        'Cargando...'+
                    '</button>');
                    $('#disable-close-submit-edit-acta').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                    $('#edit-delete-acta').attr('disabled', 'true');
                    check_user_logged().then((response) => {
                        if(response == "true"){
                            window.addEventListener('beforeunload', unloadHandler);
                            var fd = new FormData();
                            var incidenciaid = data["id"];
                            var tipo = "acta_administrativa";
                            var archivo = $('#edit_acta')[0].files[0];
                            var app = "actas_cartas";
                            var method = "edit";
                            fd.append('incidenciaid', incidenciaid);
                            fd.append('tipo', tipo);
                            fd.append('archivo', archivo);
                            fd.append('app', app);
                            fd.append('method', method);
                            $.ajax({
                                type: "post",
                                url: "../ajax/class_search.php",
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    setTimeout(function(){
                                        var array = $.parseJSON(data);
                                        if (array[0] == "success") {
                                            Swal.fire({
                                                title: "Éxito",
                                                text: array[1],
                                                icon: "success"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes-edit-acta').html("<button disabled class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='edit-changes-acta' name='edit-changes-acta' type='submit'>Editar acta</button>");
                                                closeModal();
                                                table.ajax.reload(null, false);
                                            });
                                        } else if(array[0] == "error") {
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes-edit-acta').html("<button class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='edit-changes-acta' name='edit-changes-acta' type='submit'>Editar acta</button>");
                                                $('#disable-close-submit-edit-acta').html("<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                $('#edit-delete-acta').removeAttr('disabled');
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



        $('#datatable').on('click', 'tr .editar_carta', function () {
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
                "<div class='modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10'><svg class='w-5 h-5 text-black' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='currentColor' d='M6 2C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H10V20.1L20 10.1V8L14 2H6M13 3.5L18.5 9H13V3.5M20.1 13C20 13 19.8 13.1 19.7 13.2L18.7 14.2L20.8 16.3L21.8 15.3C22 15.1 22 14.7 21.8 14.5L20.5 13.2C20.4 13.1 20.3 13 20.1 13M18.1 14.8L12 20.9V23H14.1L20.2 16.9L18.1 14.8Z' /></svg></div>"+
                "<h3 class='text-lg font-medium text-gray-900'>Documentos administrativos</h3>"+
                "</div>"+
                "<div class='modal-content text-center w-full mt-3 sm:mt-0 sm:mt-0 sm:text-left'>"+
                    "<div class='grid grid-cols-1 mt-5'>"+
                        "<label class='text-[#64748b] font-semibold mb-2' style='word-break: break-word;'>Editar carta firmada para "+data['asignada_a']+"</label>"+
                        "<div class='flex flex-col w-full justify-center mt-2'>"+
                            "<div id='edit-button-carta' onclick='edit_carta_click()' class='inline-flex self-start items-center px-6 py-2 cursor-pointer text-xs leading-tight transition duration-150 ease-in-out font-semibold rounded text-white bg-gray-800 hover:bg-gray-900'>"+
                                "Editar carta"+
                            "</div>"+
                            "<div class='flex items-center justify-between'>"+
                                "<span id='edit-text-carta' style='word-break: break-word;'>1 archivo seleccionado</span>"+
                                "<button type='button' id='edit-delete-carta' class='cursor-pointer'>"+
                                    "<svg xmlns='http://www.w3.org/2000/svg' class='fill-current text-red-700 w-3 h-3' viewBox='0 0 320 512'>"+
                                        "<path d='M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z'/>"+
                                    "</svg>"+
                                "</button>"+
                            "</div>"+
                        "</div>"+
                        "<input type='file' name='edit_carta' id='edit_carta'  class='hidden' />"+
                        "<div id='edit-content-container-carta'>"+
                            "<ul id='lista-edit-carta' class='break-all md:break-normal'>"+
                                
                            "</ul>"+
                        "</div>"+
                        "<div id='error_edit_container-carta'></div>"+
                    "</div>"+
                "</div>"
            );
            $('.modal-actions').html(
                "<div id='submit-changes-edit-carta'>"+
                    "<button id='edit-changes-carta' name='edit-changes-carta' class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto'>Editar acta</button>"+
                "</div>"+
                "<div id='disable-close-submit-edit-carta'>"+
                    "<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>"+
                "</div>"
            );
            checkFile("../src/carta_compromiso/"+data['documento']+"", data["documento_nombre"], data["documento"], data["tipo"]);
            openModal();
            resetFormValidator("#Guardar");
            $('#Guardar').unbind('submit');
            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1048576);
            }, 'File size must be less than {0} MB');
            $('#Guardar').validate({
                ignore: [],
                errorPlacement: function(error, element) {
                    error.appendTo('div#error_edit_container-carta');
                },
                rules: {
                    edit_carta: {
                        required: true,
                        extension: "jpg|jpeg|png|pdf",
                        filesize: 10
                    }
                },
                messages: {
                    edit_carta: {
                        required: 'Este campo es requerido',
                        extension: 'Solo se permite jpg, jpeg, pngs y pdfs',
                        filesize: 'Los archivos deben pesar ser menos de 10 MB'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-changes-edit-carta').html(
                    '<button disabled id="edit-changes-carta" name="edit-changes-carta" class="button items-center w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto" type="submit">'+
                        '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                        '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                        '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                        '</svg>'+
                        'Cargando...'+
                    '</button>');
                    $('#disable-close-submit-edit-carta').html("<button disabled id='close-modal' type='button' class='button cursor-pointer w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                    $('#edit-delete-carta').attr('disabled', 'true');
                    check_user_logged().then((response) => {
                        if(response == "true"){
                            window.addEventListener('beforeunload', unloadHandler);
                            var fd = new FormData();
                            var incidenciaid = data["id"];
                            var tipo = "carta_compromiso";
                            var archivo = $('#edit_carta')[0].files[0];
                            var app = "actas_cartas";
                            var method = "edit";
                            fd.append('incidenciaid', incidenciaid);
                            fd.append('tipo', tipo);
                            fd.append('archivo', archivo);
                            fd.append('app', app);
                            fd.append('method', method);
                            $.ajax({
                                type: "post",
                                url: "../ajax/class_search.php",
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    setTimeout(function(){
                                        var array = $.parseJSON(data);
                                        if (array[0] == "success") {
                                            Swal.fire({
                                                title: "Éxito",
                                                text: array[1],
                                                icon: "success"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes-edit-carta').html("<button disabled class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='edit-changes-carta' name='edit-changes-carta' type='submit'>Editar carta</button>");
                                                closeModal();
                                                table.ajax.reload(null, false);
                                            });
                                        } else if(array[0] == "error") {
                                            Swal.fire({
                                                title: "Error",
                                                text: array[1],
                                                icon: "error"
                                            }).then(function() {
                                                window.removeEventListener('beforeunload', unloadHandler);
                                                $('#submit-changes-edit-carta').html("<button class='button w-full inline-flex justify-center bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700 sm:mt-0 sm:ml-3 sm:w-auto' id='edit-changes-carta' name='edit-changes-carta' type='submit'>Editar carta</button>");
                                                $('#disable-close-submit-edit-carta').html("<button id='close-modal' type='button' class='button w-full inline-flex justify-center bg-white border border-gray-300 text-gray-600 rounded-md outline-none h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100 sm:mt-0 sm:ml-3 sm:w-auto'>Cerrar</button>");
                                                $('#edit-delete-carta').removeAttr('disabled');
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

        var file_subir_acta;

        $(document).on('click',  '#subir_acta', function () {
	        file_subir_acta = $("#subir_acta").clone();
        });

        $(document).on('change',  '#subir_acta', function () {
            if (window.FileReader && window.Blob) {
                var files = $('#subir_acta').get(0).files;
                if (files.length > 0) {
                    var file = files[0];
                    console.log('Archivo cargado: ' + file.name);
                    console.log('Blob mime: ' + file.type);
                    console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
                    console.log('Tamaño en bytes: ' + file.size);
                    $('#upload-text-acta').html('');
                    $('#upload-text-acta').html(files.length+ ' archivo seleccionado');
                    $('#content-container-acta').html('');
                    $('#content-container-acta').removeClass('grid grid-cols-1');
                    $('#content-container-acta').addClass('grid grid-cols-1');
                    $('#upload-delete-acta').addClass('z-100 md:p-2 my-auto');
                    $('#upload-delete-acta').removeClass('hidden');
                    var ul = $('<ul id=\'lista\' class=\'break-all md:break-normal\'></ul>');
                    $('#content-container-acta').append(ul);

                    var fileReader = new FileReader();
                    fileReader.onerror = function (e) {
                        console.error('ERROR', e);
                    };
                    fileReader.onloadend = function (e) {
                        var arr = new Uint8Array(e.target.result);
                        var header = '';
                        for (var i = 0; i < arr.length; i++) {
                            header += arr[i].toString(16);
                        }
                        console.log('Encabezado: ' + header);

                        // Check the file signature against known types
                        var type = 'unknown';
                        switch (header) {
                            case '89504e47':
                                type = 'image/png';
                                break;
                            case 'ffd8ffe0':
                            case 'ffd8ffe1':
                            case 'ffd8ffe2':
                                type = 'image/jpeg';
                                break;
                            case '25504446':
                                type = 'application/pdf';
                                break;
                        }
                        if (file.type !== type) {
                            console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
                            $('#content-container-acta').html('');
                            $('#content-container-acta').removeClass('grid grid-cols-1');
                            $('#subir_acta').val('');
                            $('#upload-text-acta').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
                            $('#upload-delete-acta').addClass('hidden');
                            $('#upload-delete-acta').removeClass('z-100 md:p-2 my-auto');
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#content-container-acta').html('');
                                $('#content-container-acta').removeClass('grid grid-cols-1');
                                $('#subir_acta').val('');
                                $('#upload-text-acta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#upload-delete-acta').addClass('hidden');
                                $('#upload-delete-acta').removeClass('z-100 md:p-2 my-auto');
                            }else{
                                if(file.type == 'application/pdf'){
                                    var list = $('<li id=\'acta-pdf\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>');
                                    $('#lista').append(list);
                                }else{
                                    var list = $('<li id=\'acta-image\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>'); 
                                    $('#lista').append(list);
                                }
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#subir_acta").replaceWith(file_subir_acta.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if(!($('#subir_acta').get(0).files.length === 0)){
                    var documento = $('#subir_acta').prop('files');
                    $('#upload-text-acta').html('');
                    $('#upload-text-acta').html(documento.length+ ' archivo seleccionado');
                    $('#content-container-acta').html('');
                    $('#content-container-acta').removeClass('grid grid-cols-1');
                    $('#content-container-acta').addClass('grid grid-cols-1');
                    $('#upload-delete-acta').addClass('z-100 md:p-2 my-auto');
                    $('#upload-delete-acta').removeClass('hidden');
                    var ul = $('<ul id=\'lista\' class=\'break-all md:break-normal\'></ul>');
                    $('#content-container-acta').append(ul);
                    $.each(documento, function(key, value) {
                        var archivo = documento[key];
                        if(archivo.type == 'application/pdf'){
                            if(!(archivo.size > 10485760)){
                                var list = $('<li id=\'acta-pdf\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>');
                                $('#lista').append(list);
                            }else{
                                $('#content-container-acta').html('');
                                $('#content-container-acta').removeClass('grid grid-cols-1');
                                $('#subir_acta').val('');
                                $('#upload-text-acta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#upload-delete-acta').addClass('hidden');
                                $('#upload-delete-acta').removeClass('z-100 md:p-2 my-auto');
                            }
                        }else if(archivo.type == 'image/jpeg' || archivo.type == 'image/png'){
                            if(!(archivo.size > 10485760)){
                                var list = $('<li id=\'acta-image\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>'); 
                                $('#lista').append(list);
                            }else{
                                $('#content-container-acta').html('');
                                $('#content-container-acta').removeClass('grid grid-cols-1');
                                $('#subir_acta').val('');
                                $('#upload-text-acta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#upload-delete-acta').addClass('hidden');
                                $('#upload-delete-acta').removeClass('z-100 md:p-2 my-auto');
                            }
                        }else{
                            $('#content-container-acta').html('');
                            $('#content-container-acta').removeClass('grid grid-cols-1');
                            $('#subir_acta').val('');
                            $('#upload-text-acta').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
                            $('#upload-delete-acta').addClass('hidden');
                            $('#upload-delete-acta').removeClass('z-100 md:p-2 my-auto');
                        }
                    })
                }
            }
        });

        $(document).on('click', '#upload-delete-acta', function () {
            $('#content-container-acta').html('');
            $('#content-container-acta').removeClass('grid grid-cols-1');
            $('#subir_acta').val('');
            $('#upload-text-acta').html('No hay ningún archivo seleccionado');
            $('#upload-delete-acta').addClass('hidden');
            $('#upload-delete-acta').removeClass('z-100 md:p-2 my-auto');	
        });

        var file_subir_carta;

        $(document).on('click',  '#subir_carta', function () {
	        file_subir_carta = $("#subir_carta").clone();
        });

        $(document).on('change',  '#subir_carta', function () {
            if (window.FileReader && window.Blob) {
                var files = $('#subir_carta').get(0).files;
                if (files.length > 0) {
                    var file = files[0];
                    console.log('Archivo cargado: ' + file.name);
                    console.log('Blob mime: ' + file.type);
                    console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
                    console.log('Tamaño en bytes: ' + file.size);
                    $('#upload-text-carta').html('');
                    $('#upload-text-carta').html(files.length+ ' archivo seleccionado');
                    $('#content-container-carta').html('');
                    $('#content-container-carta').removeClass('grid grid-cols-1');
                    $('#content-container-carta').addClass('grid grid-cols-1');
                    $('#upload-delete-carta').addClass('z-100 md:p-2 my-auto');
                    $('#upload-delete-carta').removeClass('hidden');
                    var ul = $('<ul id=\'lista-carta\' class=\'break-all md:break-normal\'></ul>');
                    $('#content-container-carta').append(ul);

                    var fileReader = new FileReader();
                    fileReader.onerror = function (e) {
                        console.error('ERROR', e);
                    };
                    fileReader.onloadend = function (e) {
                        var arr = new Uint8Array(e.target.result);
                        var header = '';
                        for (var i = 0; i < arr.length; i++) {
                            header += arr[i].toString(16);
                        }
                        console.log('Encabezado: ' + header);

                        // Check the file signature against known types
                        var type = 'unknown';
                        switch (header) {
                            case '89504e47':
                                type = 'image/png';
                                break;
                            case 'ffd8ffe0':
                            case 'ffd8ffe1':
                            case 'ffd8ffe2':
                                type = 'image/jpeg';
                                break;
                            case '25504446':
                                type = 'application/pdf';
                                break;
                        }
                        if (file.type !== type) {
                            console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
                            $('#content-container-carta').html('');
                            $('#content-container-carta').removeClass('grid grid-cols-1');
                            $('#subir_carta').val('');
                            $('#upload-text-carta').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
                            $('#upload-delete-carta').addClass('hidden');
                            $('#upload-delete-carta').removeClass('z-100 md:p-2 my-auto');
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#content-container-carta').html('');
                                $('#content-container-carta').removeClass('grid grid-cols-1');
                                $('#subir_carta').val('');
                                $('#upload-text-carta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#upload-delete-carta').addClass('hidden');
                                $('#upload-delete-carta').removeClass('z-100 md:p-2 my-auto');
                            }else{
                                if(file.type == 'application/pdf'){
                                    var list = $('<li id=\'carta-pdf\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>');
                                    $('#lista-carta').append(list);
                                }else{
                                    var list = $('<li id=\'carta-image\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>'); 
                                    $('#lista-carta').append(list);
                                }
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#subir_carta").replaceWith(file_subir_carta.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if(!($('#subir_carta').get(0).files.length === 0)){
                    var documento = $('#subir_carta').prop('files');
                    $('#upload-text-carta').html('');
                    $('#upload-text-carta').html(documento.length+ ' archivo seleccionado');
                    $('#content-container-carta').html('');
                    $('#content-container-carta').removeClass('grid grid-cols-1');
                    $('#content-container-carta').addClass('grid grid-cols-1');
                    $('#upload-delete-carta').addClass('z-100 md:p-2 my-auto');
                    $('#upload-delete-carta').removeClass('hidden');
                    var ul = $('<ul id=\'lista-carta\' class=\'break-all md:break-normal\'></ul>');
                    $('#content-container-carta').append(ul);
                    $.each(documento, function(key, value) {
                        var archivo = documento[key];
                        if(archivo.type == 'application/pdf'){
                            if(!(archivo.size > 10485760)){
                                var list = $('<li id=\'carta-pdf\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>');
                                $('#lista-carta').append(list);
                            }else{
                                $('#content-container-carta').html('');
                                $('#content-container-carta').removeClass('grid grid-cols-1');
                                $('#subir_carta').val('');
                                $('#upload-text-carta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#upload-delete-carta').addClass('hidden');
                                $('#upload-delete-carta').removeClass('z-100 md:p-2 my-auto');
                            }
                        }else if(archivo.type == 'image/jpeg' || archivo.type == 'image/png'){
                            if(!(archivo.size > 10485760)){
                                var list = $('<li id=\'carta-image\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>'); 
                                $('#lista-carta').append(list);
                            }else{
                                $('#content-container-carta').html('');
                                $('#content-container-carta').removeClass('grid grid-cols-1');
                                $('#subir_carta').val('');
                                $('#upload-text-carta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#upload-delete-carta').addClass('hidden');
                                $('#upload-delete-carta').removeClass('z-100 md:p-2 my-auto');
                            }
                        }else{
                            $('#content-container-carta').html('');
                            $('#content-container-carta').removeClass('grid grid-cols-1');
                            $('#subir_carta').val('');
                            $('#upload-text-carta').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
                            $('#upload-delete-carta').addClass('hidden');
                            $('#upload-delete-carta').removeClass('z-100 md:p-2 my-auto');
                        }
                    })
                }
            }
        });

        $(document).on('click', '#upload-delete-carta', function () {
            $('#content-container-carta').html('');
            $('#content-container-carta').removeClass('grid grid-cols-1');
            $('#subir_carta').val('');
            $('#upload-text-carta').html('No hay ningún archivo seleccionado');
            $('#upload-delete-carta').addClass('hidden');
            $('#upload-delete-carta').removeClass('z-100 md:p-2 my-auto');	
        });

        var file_editar_acta;

        $(document).on('click',  '#edit_acta', function () {
	        file_editar_acta = $("#edit_acta").clone();
        });

        $(document).on('change',  '#edit_acta', function () {
            if (window.FileReader && window.Blob) {
                var files = $('#edit_acta').get(0).files;
                if (files.length > 0) {
                    var file = files[0];
                    console.log('Archivo cargado: ' + file.name);
                    console.log('Blob mime: ' + file.type);
                    console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
                    console.log('Tamaño en bytes: ' + file.size);
                    $('#edit-text-acta').html('');
                    $('#edit-text-acta').html(files.length+ ' archivo seleccionado');
                    $('#edit-content-container-acta').html('');
                    $('#edit-content-container-acta').removeClass('grid grid-cols-1');
                    $('#edit-content-container-acta').addClass('grid grid-cols-1');
                    $('#edit-delete-acta').addClass('z-100 md:p-2 my-auto');
                    $('#edit-delete-acta').removeClass('hidden');
                    var ul = $('<ul id=\'lista-edit-acta\' class=\'break-all md:break-normal\'></ul>');
                    $('#edit-content-container-acta').append(ul);

                    var fileReader = new FileReader();
                    fileReader.onerror = function (e) {
                        console.error('ERROR', e);
                    };
                    fileReader.onloadend = function (e) {
                        var arr = new Uint8Array(e.target.result);
                        var header = '';
                        for (var i = 0; i < arr.length; i++) {
                            header += arr[i].toString(16);
                        }
                        console.log('Encabezado: ' + header);

                        // Check the file signature against known types
                        var type = 'unknown';
                        switch (header) {
                            case '89504e47':
                                type = 'image/png';
                                break;
                            case 'ffd8ffe0':
                            case 'ffd8ffe1':
                            case 'ffd8ffe2':
                                type = 'image/jpeg';
                                break;
                            case '25504446':
                                type = 'application/pdf';
                                break;
                        }
                        if (file.type !== type) {
                            console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
                            $('#edit-content-container-acta').html('');
                            $('#edit-content-container-acta').removeClass('grid grid-cols-1');
                            $('#edit_acta').val('');
                            $('#edit-text-acta').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
                            $('#edit-delete-acta').addClass('hidden');
                            $('#edit-delete-acta').removeClass('z-100 md:p-2 my-auto');
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#edit-content-container-acta').html('');
                                $('#edit-content-container-acta').removeClass('grid grid-cols-1');
                                $('#edit_acta').val('');
                                $('#edit-text-acta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#edit-delete-acta').addClass('hidden');
                                $('#edit-delete-acta').removeClass('z-100 md:p-2 my-auto');
                            }else{
                                if(file.type == 'application/pdf'){
                                    var list = $('<li id=\'acta-edit-pdf\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>');
                                    $('#lista-edit-acta').append(list);
                                }else{
                                    var list = $('<li id=\'acta-edit-image\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>'); 
                                    $('#lista-edit-acta').append(list);
                                }
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#edit_acta").replaceWith(file_editar_acta.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if(!($('#edit_acta').get(0).files.length === 0)){
                    var documento = $('#edit_acta').prop('files');
                    $('#edit-text-acta').html('');
                    $('#edit-text-acta').html(documento.length+ ' archivo seleccionado');
                    $('#edit-content-container-acta').html('');
                    $('#edit-content-container-acta').removeClass('grid grid-cols-1');
                    $('#edit-content-container-acta').addClass('grid grid-cols-1');
                    $('#edit-delete-acta').addClass('z-100 md:p-2 my-auto');
                    $('#edit-delete-acta').removeClass('hidden');
                    var ul = $('<ul id=\'lista-edit-acta\' class=\'break-all md:break-normal\'></ul>');
                    $('#edit-content-container-acta').append(ul);
                    $.each(documento, function(key, value) {
                        var archivo = documento[key];
                        if(archivo.type == 'application/pdf'){
                            if(!(archivo.size > 10485760)){
                                var list = $('<li id=\'acta-edit-pdf\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>');
                                $('#lista-edit-acta').append(list);
                            }else{
                                $('#edit-content-container-acta').html('');
                                $('#edit-content-container-acta').removeClass('grid grid-cols-1');
                                $('#edit_acta').val('');
                                $('#edit-text-acta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#edit-delete-acta').addClass('hidden');
                                $('#edit-delete-acta').removeClass('z-100 md:p-2 my-auto');
                            }
                        }else if(archivo.type == 'image/jpeg' || archivo.type == 'image/png'){
                            if(!(archivo.size > 10485760)){
                                var list = $('<li id=\'acta-edit-image\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>'); 
                                $('#lista-edit-acta').append(list);
                            }else{
                                $('#edit-content-container-acta').html('');
                                $('#edit-content-container-acta').removeClass('grid grid-cols-1');
                                $('#edit_acta').val('');
                                $('#edit-text-acta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#edit-delete-acta').addClass('hidden');
                                $('#edit-delete-acta').removeClass('z-100 md:p-2 my-auto');
                            }
                        }else{
                            $('#edit-content-container-acta').html('');
                            $('#edit-content-container-acta').removeClass('grid grid-cols-1');
                            $('#edit_acta').val('');
                            $('#edit-text-acta').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
                            $('#edit-delete-acta').addClass('hidden');
                            $('#edit-delete-acta').removeClass('z-100 md:p-2 my-auto');
                        }
                    })
                }
            }
        });

        $(document).on('click', '#edit-delete-acta', function () {
            $('#edit-content-container-acta').html('');
            $('#edit-content-container-acta').removeClass('grid grid-cols-1');
            $('#edit_acta').val('');
            $('#edit-text-acta').html('No hay ningún archivo seleccionado');
            $('#edit-delete-acta').addClass('hidden');
            $('#edit-delete-acta').removeClass('z-100 md:p-2 my-auto');	
        });

        var file_editar_carta;

        $(document).on('click',  '#edit_carta', function () {
	        file_editar_carta = $("#edit_carta").clone();
        });

        $(document).on('change',  '#edit_carta', function () {
            if (window.FileReader && window.Blob) {
                var files = $('#edit_carta').get(0).files;
                if (files.length > 0) {
                    var file = files[0];
                    console.log('Archivo cargado: ' + file.name);
                    console.log('Blob mime: ' + file.type);
                    console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
                    console.log('Tamaño en bytes: ' + file.size);
                    $('#edit-text-carta').html('');
                    $('#edit-text-carta').html(files.length+ ' archivo seleccionado');
                    $('#edit-content-container-carta').html('');
                    $('#edit-content-container-carta').removeClass('grid grid-cols-1');
                    $('#edit-content-container-carta').addClass('grid grid-cols-1');
                    $('#edit-delete-carta').addClass('z-100 md:p-2 my-auto');
                    $('#edit-delete-carta').removeClass('hidden');
                    var ul = $('<ul id=\'lista-edit-carta\' class=\'break-all md:break-normal\'></ul>');
                    $('#edit-content-container-carta').append(ul);

                    var fileReader = new FileReader();
                    fileReader.onerror = function (e) {
                        console.error('ERROR', e);
                    };
                    fileReader.onloadend = function (e) {
                        var arr = new Uint8Array(e.target.result);
                        var header = '';
                        for (var i = 0; i < arr.length; i++) {
                            header += arr[i].toString(16);
                        }
                        console.log('Encabezado: ' + header);

                        // Check the file signature against known types
                        var type = 'unknown';
                        switch (header) {
                            case '89504e47':
                                type = 'image/png';
                                break;
                            case 'ffd8ffe0':
                            case 'ffd8ffe1':
                            case 'ffd8ffe2':
                                type = 'image/jpeg';
                                break;
                            case '25504446':
                                type = 'application/pdf';
                                break;
                        }
                        if (file.type !== type) {
                            console.error('Tipo de Mime detectado: ' + type + '. No coincide con la extensión del archivo.');
                            $('#edit-content-container-carta').html('');
                            $('#edit-content-container-carta').removeClass('grid grid-cols-1');
                            $('#edit_carta').val('');
                            $('#edit-text-carta').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
                            $('#edit-delete-carta').addClass('hidden');
                            $('#edit-delete-carta').removeClass('z-100 md:p-2 my-auto');
                        } else {
                            console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
                            if(file.size > 10485760){
                                $('#edit-content-container-carta').html('');
                                $('#edit-content-container-carta').removeClass('grid grid-cols-1');
                                $('#edit_carta').val('');
                                $('#edit-text-carta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#edit-delete-carta').addClass('hidden');
                                $('#edit-delete-carta').removeClass('z-100 md:p-2 my-auto');
                            }else{
                                if(file.type == 'application/pdf'){
                                    var list = $('<li id=\'carta-edit-pdf\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>');
                                    $('#lista-edit-carta').append(list);
                                }else{
                                    var list = $('<li id=\'carta-edit-image\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>'); 
                                    $('#lista-edit-carta').append(list);
                                }
                            }
                        }
                    };
                    fileReader.readAsArrayBuffer(file.slice(0, 4));
                }else{
                    $("#edit_carta").replaceWith(file_editar_carta.clone());
                }
            } else {
                console.error('FileReader ó Blob no es compatible con este navegador.');
                if(!($('#edit_carta').get(0).files.length === 0)){
                    var documento = $('#edit_carta').prop('files');
                    $('#edit-text-carta').html('');
                    $('#edit-text-carta').html(documento.length+ ' archivo seleccionado');
                    $('#edit-content-container-carta').html('');
                    $('#edit-content-container-carta').removeClass('grid grid-cols-1');
                    $('#edit-content-container-carta').addClass('grid grid-cols-1');
                    $('#edit-delete-carta').addClass('z-100 md:p-2 my-auto');
                    $('#edit-delete-carta').removeClass('hidden');
                    var ul = $('<ul id=\'lista-edit-carta\' class=\'break-all md:break-normal\'></ul>');
                    $('#edit-content-container-carta').append(ul);
                    $.each(documento, function(key, value) {
                        var archivo = documento[key];
                        if(archivo.type == 'application/pdf'){
                            if(!(archivo.size > 10485760)){
                                var list = $('<li id=\'carta-edit-pdf\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>');
                                $('#lista-edit-carta').append(list);
                            }else{
                                $('#edit-content-container-carta').html('');
                                $('#edit-content-container-carta').removeClass('grid grid-cols-1');
                                $('#edit_carta').val('');
                                $('#edit-text-carta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#edit-delete-carta').addClass('hidden');
                                $('#edit-delete-carta').removeClass('z-100 md:p-2 my-auto');
                            }
                        }else if(archivo.type == 'image/jpeg' || archivo.type == 'image/png'){
                            if(!(archivo.size > 10485760)){
                                var list = $('<li id=\'carta-edit-image\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>'); 
                                $('#lista-edit-carta').append(list);
                            }else{
                                $('#edit-content-container-carta').html('');
                                $('#edit-content-container-carta').removeClass('grid grid-cols-1');
                                $('#edit_carta').val('');
                                $('#edit-text-carta').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
                                $('#edit-delete-carta').addClass('hidden');
                                $('#edit-delete-carta').removeClass('z-100 md:p-2 my-auto');
                            }
                        }else{
                            $('#edit-content-container-carta').html('');
                            $('#edit-content-container-carta').removeClass('grid grid-cols-1');
                            $('#edit_carta').val('');
                            $('#edit-text-carta').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
                            $('#edit-delete-carta').addClass('hidden');
                            $('#edit-delete-carta').removeClass('z-100 md:p-2 my-auto');
                        }
                    })
                }
            }
        });

        $(document).on('click', '#edit-delete-carta', function () {
            $('#edit-content-container-carta').html('');
            $('#edit-content-container-carta').removeClass('grid grid-cols-1');
            $('#edit_carta').val('');
            $('#edit-text-carta').html('No hay ningún archivo seleccionado');
            $('#edit-delete-carta').addClass('hidden');
            $('#edit-delete-carta').removeClass('z-100 md:p-2 my-auto');	
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

    function checkFile(url, filename, file, type) {
        $.ajax({
            url: url,
            type:'HEAD',
            error: function()
            {
                if(type == "ACTA ADMINISTRATIVA"){
                    $('#lista-edit-acta').html("<li id='acta-not-found' class='flex flex-wrap'><svg xmlns='http://www.w3.org/2000/svg' style='width:24px; heigth:24px;' viewBox='0 0 24 24'><path fill='currentColor' d='M12 2C17.5 2 22 6.5 22 12S17.5 22 12 22 2 17.5 2 12 6.5 2 12 2M12 4C10.1 4 8.4 4.6 7.1 5.7L18.3 16.9C19.3 15.5 20 13.8 20 12C20 7.6 16.4 4 12 4M16.9 18.3L5.7 7.1C4.6 8.4 4 10.1 4 12C4 16.4 7.6 20 12 20C13.9 20 15.6 19.4 16.9 18.3Z' /></svg> No se encontró el archivo</li>");
                }else if(type == "CARTA COMPROMISO"){
                    $('#lista-edit-carta').html("<li id='carta-not-found' class='flex flex-wrap'><svg xmlns='http://www.w3.org/2000/svg' style='width:24px; heigth:24px;' viewBox='0 0 24 24'><path fill='currentColor' d='M12 2C17.5 2 22 6.5 22 12S17.5 22 12 22 2 17.5 2 12 6.5 2 12 2M12 4C10.1 4 8.4 4.6 7.1 5.7L18.3 16.9C19.3 15.5 20 13.8 20 12C20 7.6 16.4 4 12 4M16.9 18.3L5.7 7.1C4.6 8.4 4 10.1 4 12C4 16.4 7.6 20 12 20C13.9 20 15.6 19.4 16.9 18.3Z' /></svg> No se encontró el archivo</li>");
                }
            },
            success: function()
            {
                var extension= getFileExtension(file);
                if(type == "ACTA ADMINISTRATIVA"){
                    if(extension == "jpg" || extension == "png" || extension == "jpeg"){ 
                        $('#lista-edit-acta').html("<li id='acta-edit-image' class='flex flex-wrap'><svg style='width:24px; heigth:24px;' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512.001 512.001' xml:space='preserve'><path style='fill:#6DABE4;' d='M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z'></path><path style='opacity:0.15;enable-background:new    ;' d='M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z'></path><path style='fill:#FFFFFF;' d='M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z'></path><circle style='fill:#FFB547;' cx='200.999' cy='143.414' r='38.958'></circle><path style='fill:#4C9462;' d='M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z'></path><path style='fill:#8D6645;' d='M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z'></path><path style='fill:#99DAEA;' d='M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z'></path><polygon style='opacity:0.1;enable-background:new    ;' points='188.713,379.313 226.521,379.313 313.42,163.313 '></polygon><path style='fill:#1E252B;' d='M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z'></path><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>"+filename+"</li>");
                    }else if(extension == "pdf"){
                        $('#lista-edit-acta').html("<li id='acta-edit-pdf' class='flex flex-wrap'><svg style='width:24px; heigth:24px;' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 303.188 303.188' xml:space='preserve'><g>	<polygon style='fill:#E8E8E8;' points='219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	'></polygon>	<path style='fill:#FB3449;' d='M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z'></path>	<polygon style='fill:#FB3449;' points='227.64,25.263 32.842,25.263 32.842,0 219.821,0 	'></polygon>	<g>		<path style='fill:#A4A9AD;' d='M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z'></path>		<path style='fill:#A4A9AD;' d='M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z'></path>		<path style='fill:#A4A9AD;' d='M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z'></path>	</g>	<polygon style='fill:#D1D3D3;' points='219.821,50.525 270.346,50.525 219.821,0 	'></polygon></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>"+filename+"</li>");
                    }
                }else if(type == "CARTA COMPROMISO"){
                    if(extension == "jpg" || extension == "png" || extension == "jpeg"){
                        $('#lista-edit-carta').html("<li id='carta-edit-image' class='flex flex-wrap'><svg style='width:24px; heigth:24px;' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512.001 512.001' xml:space='preserve'><path style='fill:#6DABE4;' d='M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z'></path><path style='opacity:0.15;enable-background:new    ;' d='M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z'></path><path style='fill:#FFFFFF;' d='M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z'></path><circle style='fill:#FFB547;' cx='200.999' cy='143.414' r='38.958'></circle><path style='fill:#4C9462;' d='M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z'></path><path style='fill:#8D6645;' d='M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z'></path><path style='fill:#99DAEA;' d='M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z'></path><polygon style='opacity:0.1;enable-background:new    ;' points='188.713,379.313 226.521,379.313 313.42,163.313 '></polygon><path style='fill:#1E252B;' d='M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z'></path><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>"+filename+"</li>");
                    }else if(extension == "pdf"){
                        $('#lista-edit-carta').html("<li id='carta-edit-pdf' class='flex flex-wrap'><svg style='width:24px; heigth:24px;' version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 303.188 303.188' xml:space='preserve'><g>	<polygon style='fill:#E8E8E8;' points='219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	'></polygon>	<path style='fill:#FB3449;' d='M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z'></path>	<polygon style='fill:#FB3449;' points='227.64,25.263 32.842,25.263 32.842,0 219.821,0 	'></polygon>	<g>		<path style='fill:#A4A9AD;' d='M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z'></path>		<path style='fill:#A4A9AD;' d='M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z'></path>		<path style='fill:#A4A9AD;' d='M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z'></path>	</g>	<polygon style='fill:#D1D3D3;' points='219.821,50.525 270.346,50.525 219.821,0 	'></polygon></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>"+filename+"</li>");
                    }
                }
            }
        });
    }

    function getFileExtension(filename) {
        return filename.split('.').pop();
    }

    function unloadHandler(e) {
        // Cancel the event
        e.preventDefault();
        // Chrome requires returnValue to be set
        e.returnValue = '';
    }

    function upload_acta_click(){
        $('#subir_acta').click();
    }

    function upload_carta_click(){
        $('#subir_carta').click();
    }

    function edit_acta_click(){
        $('#edit_acta').click();
    }

    function edit_carta_click(){
        $('#edit_carta').click();
    }

</script>
<style>

    .error{
        color:red;
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
