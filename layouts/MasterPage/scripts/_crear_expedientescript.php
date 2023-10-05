<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>

    //Variable global que nos permite acceder al menú desde cualquier función.
    let menuExpedientes = [];
    //Variable global que establece "datosG" como la pestaña activa inicialmente
    let pestañaActiva = {
        id: 'datosG',
        triggerMenu: $('#datosG-tab'),
        targetMenu: $('#datosG')
    };

	//Empieza la configuración del menú
    menuExpedientes = [{
			id: 'datosG',
			triggerMenu: document.querySelector('#datosG-tab'),
			targetMenu: document.querySelector('#datosG')
		},
		{
			id: 'datosA',
			triggerMenu: document.querySelector('#datosA-tab'),
			targetMenu: document.querySelector('#datosA')
		},
		{
			id: 'datosB',
			triggerMenu: document.querySelector('#datosB-tab'),
			targetMenu: document.querySelector('#datosB')
		},
		{
			id: 'documentos',
			triggerMenu: document.querySelector('#documentos-tab'),
			targetMenu: document.querySelector('#documentos')
		}
	];

	menuExpedientes.forEach((menu) => {
		menu.triggerMenu.addEventListener('click', () => {
			objective = menu;
            // Verifica si la pestaña a la que se hace clic es diferente de la pestaña activa actual
            if (menu.id !== pestañaActiva.id) {
                // Actualiza la pestaña activa al hacer clic en un botón de menú
                pestañaActiva = menu;
            }

			menuExpedientes.forEach((trigger) => {
				trigger.targetMenu.classList.remove("block")
				trigger.targetMenu.classList.add("hidden");
				trigger.triggerMenu.classList.remove("bg-[#27ceeb]", "text-white", "menu-active");
				trigger.triggerMenu.classList.add("hover:bg-slate-100", "hover:text-slate-800", 
				"focus:bg-slate-100", "focus:text-slate-800");
				trigger.triggerMenu.firstElementChild.classList.add("text-slate-400", "transition-colors", 
				"group-hover:text-slate-500", "group-focus:text-slate-500");
			})
			objective.targetMenu.classList.remove("hidden");
			objective.targetMenu.classList.add("block");
			objective.triggerMenu.classList.add("bg-[#27ceeb]", "text-white", "menu-active");
			objective.triggerMenu.classList.remove("hover:bg-slate-100", "hover:text-slate-800", 
			"focus:bg-slate-100", "focus:text-slate-800");
			objective.triggerMenu.firstElementChild.classList.remove("text-slate-400", "transition-colors", 
			"group-hover:text-slate-500", "group-focus:text-slate-500");
		})
	});
	//Termina la configuración del menú


	//Empieza la configuración del SELECT 2
    $('#user').select2({
        theme: ["tailwind"],
        placeholder: '-- Seleccione --',
        dropdownParent: $('#selectuser'),
        "language": {
            "noResults": function(){
                return "No hay resultados";
            }
        }
    });

    $('#user').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');

    $('.select2-selection--single').addClass("flex focus:outline-none");

    $('.select2-selection__rendered').addClass("flex-1");

    $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');

    $('.select2-selection__arrow').addClass('rotate-180 mb-1');

    $("#selectuser").show();

    $('#user').on('select2:open', function (e) {
        const evt = "scroll.select2";
        $(e.target).parents().off(evt);
        $(window).off(evt);
    });

	//SELECT 2 - Empieza la subsección del departamento y el correo anterior
	$('#user').on('change', function () {
		var fd =new FormData();
		var x = $('#user').val();
		fd.append('id', x);
		$.ajax({
			type: 'post',
			url: '../ajax/expedientes/checkuserinformation.php',
			data: fd,
			processData: false,
			contentType: false,
			success: function (data) {
				var array = $.parseJSON(data);
				$("#departamento").val(array[0]);
				$("#correo_usuario").val(array[1]);
			}
		});
	});
	//SELECT 2 - Termina la subsección del departamento y el correo anterior

	//Termina la configuración del SELECT 2


	//Empieza la configuración del estado y municipio
	$('#estado').on('change', function(event) {
		event.preventDefault();
		var state = $(this).val();

		var data = {
			id: state
		};

		$.ajax({
			url: '../ajax/expedientes/municipios.php',
			type: 'POST',
			data: data,
			dataType: 'html',
			success: function(data) {
				$('#imunicipio').html(data);
			},
			error: function(data) {
				$("#ajax-error").text('Fail to send request');
			}
		});	
	});
	//Termina la configuración del estado y municipio

	$(document).ready(function() {

        <?php
		    if(basename($_SERVER['PHP_SELF']) == 'crear_expediente.php'){?>
			    var dropdown = document.getElementById('expediente');
			    dropdown.classList.remove("hidden");
	    <?php } ?>

        var dt = new Date();
        dt.setDate(dt.getDate() - 1);
        dt.setFullYear(new Date().getFullYear()-18);

        $('input[name="fechanac"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true, "startDate": dt, "locale": { "format": "YYYY/MM/DD", "applyLabel": "Aceptar", "cancelLabel": "Cancelar", "daysOfWeek": ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"], "monthNames": ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]}, applyButtonClasses: "button btn-celeste px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
        $('input[name="fechacon"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true, "locale": { "format": "YYYY/MM/DD", "applyLabel": "Aceptar", "cancelLabel": "Cancelar", "daysOfWeek": ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"], "monthNames": ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]}, applyButtonClasses: "button btn-celeste px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
        $('input[name="fechaalta"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true, "locale": { "format": "YYYY/MM/DD", "applyLabel": "Aceptar", "cancelLabel": "Cancelar", "daysOfWeek": ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"], "monthNames": ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]}, applyButtonClasses: "button btn-celeste px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
        $('input[name="fechauniforme"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true, "locale": { "format": "YYYY/MM/DD", "applyLabel": "Aceptar", "cancelLabel": "Cancelar", "daysOfWeek": ["Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"], "monthNames": ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]}, applyButtonClasses: "button btn-celeste px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });

		//Empieza la navegación por los expedientes por medio de los botones (Siguiente y anterior).
		let tabsContainer = document.querySelector("#menu");
		let tabTogglers = tabsContainer.querySelectorAll("button");

		$("#siguiente").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});

        $("#siguiente2").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});

        $("#anterior").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

        $("#siguiente3").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});
		
			
		$("#anterior2").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

        $("#anterior3").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#27ceeb]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.classList.add('bg-[#27ceeb]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

		//Termina la navegación por los expedientes por medio de los botones (Siguiente y anterior).

        //Empieza la configuración de los fileupload
        //Crea dinámicamente el código si se agrega una nueva papelería en la base de datos.
        <?php for($i = 1; $i <= $counttipospapeleria; $i++){

        echo ("var papeleria_clone{$i};");

	    echo (" $('#upload-button{$i}').on('click', function () {
				    $('#infp_papeleria{$i}').click();
			    });
                
                $('#infp_papeleria{$i}').on('click', function () {
                    papeleria_clone{$i} = $('#infp_papeleria{$i}').clone();
                });
	
			    $('#infp_papeleria{$i}').on('change', function () {
				    if (window.FileReader && window.Blob) {
					    var files = $('#infp_papeleria{$i}').get(0).files;
					    if (files.length > 0) {
						    var file = files[0];
						    console.log('Archivo cargado: ' + file.name);
						    console.log('Blob mime: ' + file.type);
						    console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
						    console.log('Tamaño en bytes: ' + file.size);
						    $('#upload-text{$i}').html('');
						    $('#upload-text{$i}').html(files.length+ ' archivo seleccionado');
						    $('#content-container{$i}').html('');
						    $('#content-container{$i}').removeClass('grid grid-cols-1');
						    $('#content-container{$i}').addClass('grid grid-cols-1');
						    $('#upload-delete{$i}').addClass('z-100 md:p-2 my-auto');
						    $('#upload-delete{$i}').removeClass('hidden');
						    var ul = $('<ul id=\'lista{$i}\' class=\'break-all md:break-normal\'></ul>');
						    $('#content-container{$i}').append(ul);

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
								    $('#content-container{$i}').html('');
								    $('#content-container{$i}').removeClass('grid grid-cols-1');
								    $('#infp_papeleria{$i}').val('');
								    $('#upload-text{$i}').html('<p style=\' color: rgb(250 30 45); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
								    $('#upload-delete{$i}').addClass('hidden');
								    $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
							    } else {
								    console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
								    if(file.size > 10485760){
									    $('#content-container{$i}').html('');
									    $('#content-container{$i}').removeClass('grid grid-cols-1');
									    $('#infp_papeleria{$i}').val('');
									    $('#upload-text{$i}').html('<p style=\' color: rgb(250 30 45); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
									    $('#upload-delete{$i}').addClass('hidden');
									    $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
								    }else{
									    if(file.type == 'application/pdf'){
										    var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>');
										    $('#lista{$i}').append(list);
									    }else{
										    var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>'); 
										    $('#lista{$i}').append(list);
									    }
								    }
							    }
						    };
						    fileReader.readAsArrayBuffer(file.slice(0, 4));
					    }else{
                            $('#infp_papeleria{$i}').replaceWith(papeleria_clone{$i}.clone());
                        }
				    } else {
					    console.error('FileReader ó Blob no es compatible con este navegador.');
					    if(!($('#infp_papeleria{$i}').get(0).files.length === 0)){
					        var documento = $('#infp_papeleria{$i}').prop('files');
					        $('#upload-text{$i}').html('');
					        $('#upload-text{$i}').html(documento.length+ ' archivo seleccionado');
					        $('#content-container{$i}').html('');
					        $('#content-container{$i}').removeClass('grid grid-cols-1');
					        $('#content-container{$i}').addClass('grid grid-cols-1');
					        $('#upload-delete{$i}').addClass('z-100 md:p-2 my-auto');
					        $('#upload-delete{$i}').removeClass('hidden');
					        var ul = $('<ul id=\'lista{$i}\' class=\'break-all md:break-normal\'></ul>');
					        $('#content-container{$i}').append(ul);
					        $.each(documento, function(key, value) {
						        var archivo = documento[key];
						        if(archivo.type == 'application/pdf'){
							        if(!(archivo.size > 10485760)){
								        var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>');
								        $('#lista{$i}').append(list);
							        }else{
								        $('#content-container{$i}').html('');
								        $('#content-container{$i}').removeClass('grid grid-cols-1');
								        $('#infp_papeleria{$i}').val('');
								        $('#upload-text{$i}').html('<p style=\' color: rgb(250 30 45); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
								        $('#upload-delete{$i}').addClass('hidden');
								        $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
							        }
						        }else if(archivo.type == 'image/jpeg' || archivo.type == 'image/png'){
							        if(!(archivo.size > 10485760)){
								        var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>'); 
								        $('#lista{$i}').append(list);
							        }else{
								        $('#content-container{$i}').html('');
								        $('#content-container{$i}').removeClass('grid grid-cols-1');
								        $('#infp_papeleria{$i}').val('');
								        $('#upload-text{$i}').html('<p style=\' color: rgb(250 30 45); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
								        $('#upload-delete{$i}').addClass('hidden');
								        $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
							        }
						        }else{
							        $('#content-container{$i}').html('');
							        $('#content-container{$i}').removeClass('grid grid-cols-1');
							        $('#infp_papeleria{$i}').val('');
							        $('#upload-text{$i}').html('<p style=\' color: rgb(250 30 45); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
							        $('#upload-delete{$i}').addClass('hidden');
							        $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
						        }
					        })
				        }
				    }
			    });

			    $('#upload-delete{$i}').on('click', function () {
				    $('#content-container{$i}').html('');
				    $('#content-container{$i}').removeClass('grid grid-cols-1');
				    $('#infp_papeleria{$i}').val('');
				    $('#upload-text{$i}').html('No hay ningún archivo seleccionado');
				    $('#upload-delete{$i}').addClass('hidden');
				    $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');	
			    });
	
		    ");
	    }?>

        //Termina la configuración de los fileupload

        //EMPIEZA EL JQUERY VALIDATION - Estas funciones personalizadas para ciertas validaciones en jquery validation

        //Valida si el email está escrito correctamente - eg: flavio@flavio.com.
        $.validator.addMethod('email_verification', function (value, element) {
            return this.optional(element) || /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i.test(value);
        }, 'not a valid email.');
		
        //Valida si el número de empleado empieza con F y L, seguido de un guión y al final cualquier número.
		$.validator.addMethod('num_empleado', function (value, element) {
            return this.optional(element) || /^([FL]){1}-([0-9])+$/.test(value);
        }, 'invalid employee number.');
		
        //Un validador que acepta minúsculas y mayúsculas además permite un espacio entre palabras.
		$.validator.addMethod('field_validation', function (value, element) {
            return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
        }, 'not a valid field.');

        //Lo mismo que lo anterior solo que acepta números y algunos carácteres especiales.
        $.validator.addMethod('location_validation', function (value) {
            return /^(?:([a-zA-Z0-9\u00C0-\u00FF][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\u00C0-\u00FF]+[?:\.|,]?)*)?$/.test(value);
        }, 'not a valid field.');

        //Lo mismo que lo anterior solo que acepta números y algunos carácteres especiales.
        jQuery.validator.addMethod("model_validation", function(value, element) {
            return this.optional(element) || /^([a-zA-Z0-9\u00C0-\u00FF])+([?:\s|\-|\_][a-zA-Z0-9\u00C0-\u00FF]+)*$/i.test(value);
        }, "invalid model");

        //Función que valida si se es mayor que 18.
        jQuery.validator.addMethod("mayor18", function(value, element) {              
            var from = value.split("/");

            var day = from[2];
            var month = from[1];
            var year = from[0];
            var age = 18;

            var mydate = new Date();
            mydate.setFullYear(year, month-1, day);

            var currdate = new Date();
            var setDate = new Date();

            setDate.setFullYear(mydate.getFullYear() + age, month-1, day);

            if ((currdate - setDate) > 0){
                return true;
            }else{
                return false;
            }
        }, "Sorry, you must be 18 years of age to apply");

        //Función que valida nombres escritos en los campos.
        $.validator.addMethod('names_validation', function (value, element) {
			return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+(?:[-'\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
		}, 'not a valid name.');

        //Verifica si el usuario no modificó el dropdown a través de la consola.
        $.validator.addMethod("refvalplus3", function(value, element) {
            if ($("#reflab").val() > 3) {
                return false;
            } 
            return true;
        }, "Please enter a valid value in selectbox");

        //Lo mismo que lo anterior pero para referencias bancarias.
        $.validator.addMethod("refbanplus3", function(value, element) {
            if ($("#refban").val() > 3) {
                return false;
            } 
            return true;
        }, "Please enter a valid value in selectbox");

        if($('#Guardar').length > 0 ){
            $('#Guardar').validate({
                ignore: [],
                onkeyup: false,
                errorPlacement: function(error, element) {
                    if($(element).attr("type") === "file"){
                        error.insertAfter($(element));
                    }else if((element.attr('name') === 'observaciones')){
                        error.appendTo("div#error_observaciones");  
                    }else{
                        error.insertAfter(element.parent('.group.flex'));
                    }
                },
                invalidHandler: function(e, validator){
                    if(!($('#error-container').length)){
                        this.$div = $('<div id="error-container" class="grid grid-cols-1 mx-7 py-4"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex items-center"><div class="p-2"><div class="flex items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-6 py-4 text-red-900 font-semibold text-lg">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors" class="px-16 mb-4"></div></div></div></div>').insertBefore("#menu");
                    }
                    $("#arrayerrors").html(""); 
                    $.each(validator.errorMap, function( index, value ) { 
                        this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
                        $("#arrayerrors").append(this.$arrayerror);
                    });
                    if (validator.errorList.length) {
                        // Obtén el primer error del validador
                        var primerError = validator.errorList[0];

                        // Verifica si hay un error
                        if (primerError) {
                            // Obtiene la pestaña a la que pertenece el elemento con error
                            var tabConError = jQuery(primerError.element).closest(".tab-pane").attr("id");

                            // Actualiza la pestaña activa al hacer clic en un botón de menú
                            pestañaActiva = {
                                id: tabConError,
                                triggerMenu: $('#menu button[data-tabs-target="#' + tabConError + '"]'),
                                targetMenu: $('#' + tabConError)
                            };

                            // Activa la pestaña con error y aplica estilos
                            pestañaActiva.triggerMenu.addClass("menu-active bg-[#27ceeb] text-white").removeClass("hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800").children().first().removeClass("text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500");

                            // Activa los contenidos de la pestaña con el primer error
                            pestañaActiva.targetMenu.removeClass("hidden");

                            // Desactiva las otras pestañas
                            $('#menu button[data-tabs-target]').not('[data-tabs-target="#' + tabConError + '"]').removeClass("menu-active bg-[#27ceeb] text-white").addClass("hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800").children().first().addClass("text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500");

                            // Oculta los contenidos de las otras pestañas
                            $("#menu-contents > div[id]").not('#' + tabConError).addClass("hidden");
                        }
                    }
                },
                highlight: function(element) {
                    var elem = $(element);
                    if (elem.hasClass("select2-hidden-accessible")) {
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600"); 
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().addClass("border-2 border-rose-500 border-2"); 
                    }else{
                        $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                        $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                    }
                },
                unhighlight: function(element) {
                    var elem = $(element);
                    if (elem.hasClass("select2-hidden-accessible")) {
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().removeClass("border-2 border-rose-500 border-2");
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600"); 
                    }else{
                        $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                        $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-celeste-600");
                    }
                },
                //Inicializamos en la primera pestaña que es Datos generales
                rules: {
                    user: {
                        required: true
                    },
                    numempleado: {
                        num_empleado: {
                            depends: function(element) {
                                return (pestañaActiva.id == "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        remote: {
                            url: (pestañaActiva.id == "datosG" || pestañaActiva.id == "documentos") ? "../ajax/expedientes/check_num_empleado.php" : false,
                            type: "GET",
                            beforeSend: function () {
                                if (pestañaActiva.id == "datosG" || pestañaActiva.id == "documentos") {
                                    $('#loader-numempleado').removeClass('hidden');
                                    $('#correct-numempleado').addClass('hidden');
                                }
                            },
                            complete: function(data) {
                                if (pestañaActiva.id == "datosG" || pestañaActiva.id == "documentos") {
                                    if (data.responseText == "true") {
                                        $('#loader-numempleado').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
                                        $('#correct-numempleado').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
                                    } else {
                                        $('#loader-numempleado').addClass('hidden');
                                        $('#correct-numempleado').addClass('hidden');
                                    }
                                }
                            }
                        }
                    },
                    puesto: {
                        minlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 4
                        },
                        field_validation: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    posee_correo:{
                        required: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    correo_adicional: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='posee_correo']:checked").val() === "si"  && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        email_verification: {
                            depends: function(element) {
                                return  $("input[name='posee_correo']:checked").val() === "si"  && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        remote: {
                            url: (pestañaActiva.id == "datosG" || pestañaActiva.id == "documentos") ? "../ajax/validacion/expedientes/checkemail.php" : false,
                            type: "GET",
                            beforeSend: function () {
                                if (pestañaActiva.id == "datosG" || pestañaActiva.id == "documentos") {
                                    $('#loader-correo').removeClass('hidden');
                                    $('#correct-correo').addClass('hidden');
                                }
                            },
                            complete: function(data) {
                                if (pestañaActiva.id == "datosG" || pestañaActiva.id == "documentos") {
                                    if (data.responseText == "true") {
                                        $('#loader-correo').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
                                        $('#correct-correo').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  }); 
                                    } else {
                                        $('#loader-correo').addClass('hidden');
                                        $('#correct-correo').addClass('hidden'); 
                                    }
                                }
                            }
                        }
                    },
                    calle: {
                        location_validation: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    ninterior: {
                        digits: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    nexterior: {
                        digits: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    colonia: {
                        location_validation: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    codigo: {
                        digits: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    teldom: {
                        digits: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 10
                        },
                        maxlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 4
                        }
                    },
                    tel_movil:{
                        required: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    telmov: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='tel_movil']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        digits: {
                            depends: function(element) {
                                return  $("input[name='tel_movil']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return  $("input[name='tel_movil']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 10
                        },
                        maxlength: {
                            depends: function(element) {
                                return  $("input[name='tel_movil']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 10
                        }
                    },
                    tel_movil_empresa:{
                        required: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    marcacion: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        digits: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    serie: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        alphanumeric: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    sim: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        digits: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    numred: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        digits: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    modelotel: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        model_validation: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    marcatel: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        field_validation: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    imei: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        digits: {
                            depends: function(element) {
                                return  $("input[name='tel_movil_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    laptop_empresa: {
                        required: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    marca_laptop: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='laptop_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        field_validation: {
                            depends: function(element) {
                                return  $("input[name='laptop_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    modelo_laptop: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='laptop_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        model_validation: {
                            depends: function(element) {
                                return  $("input[name='laptop_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    serie_laptop: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='laptop_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        alphanumeric: {
                            depends: function(element) {
                                return  $("input[name='laptop_empresa']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    casa:{
                        required: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    retencion:{
                        required: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    monto_mensual: {
                        required: {
                            depends: function(element) {
                                return  $("input[name='retencion']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        number: {
                            depends: function(element) {
                                return  $("input[name='retencion']:checked").val() === "si" && (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                    },
                    fechanac:{
                        mayor18: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    salario_contrato:{
                        number:{
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    salario_fechaalta:{
                        number: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    observaciones:{
                        field_validation:{
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    curp:{
                        alphanumeric: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 18
                        },
                        maxlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 18
                        }
                    },
                    nss:{
                        digits: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 11
                        },
                        maxlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 11
                        }
                    },
                    rfc:{
                        alphanumeric: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 12
                        },
                        maxlength: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosG" || pestañaActiva.id == "documentos");
                            },
                            param: 13
                        }
                    },
                    numReferencias:{
                        refvalplus3: {
                            depends: function(element) {
                                return (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    infa_rnombre1: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rapellidopat1: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rapellidomat1: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rrelacion1: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rtelefono1: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        digits: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            },
                            param: 10
                        },
                        maxlength: {
                            depends: function(element) {
                                return ($("#numReferencias").val() >= 1 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            },
                            param: 10
                        }
                    },
                    infa_rnombre2: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rapellidopat2: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rapellidomat2: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rrelacion2: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rtelefono2: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        digits: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            },
                            param: 10
                        },
                        maxlength: {
                            depends: function(element) {
                                return ($("#numReferencias").val() >= 2 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            },
                            param: 10
                        }
                    },
                    infa_rnombre3: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rapellidopat3: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rapellidomat3: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rrelacion3: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    infa_rtelefono3: {
                        required:{
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        digits: {
                            depends: function(element) {
                                return   ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            },
                            param: 10
                        },
                        maxlength: {
                            depends: function(element) {
                                return ($("#numReferencias").val() >= 3 && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            },
                            param: 10
                        }
                    },
                    cantidadpolo: {
                        digits: {
                            depends: function(element) {
                                return  (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    emergencia_nom: {
                        names_validation: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    emergencia_nom2: {
                        names_validation: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    emergencia_appat: {
                        names_validation: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    emergencia_appat2: {
                        names_validation: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    emergencia_apmat: {
                        names_validation: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    emergencia_apmat2: {
                        names_validation: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    emergencia_tel: {
                        digits: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            },
                            param: 10
                        },
                        maxlength: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            },
                            param: 10
                        }
                    },
                    emergencia_tel2: {
                        digits: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        },
                        minlength: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            },
                            param: 10
                        },
                        maxlength: {
                            depends: function(element) {
                                return   (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            },
                            param: 10
                        }
                    },
                    empresa: {
                        required: {
                            depends: function(element) {
                                return  (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos");
                            }
                        }
                    },
                    nomfam: {
                        required: {
                            depends: function(element) {
                                return  ($("input[name='empresa']:checked").val() === "si" && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("input[name='empresa']:checked").val() === "si" && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    apfam: {
                        required: {
                            depends: function(element) {
                                return  ($("input[name='empresa']:checked").val() === "si" && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("input[name='empresa']:checked").val() === "si" && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    },
                    amfam: {
                        required: {
                            depends: function(element) {
                                return  ($("input[name='empresa']:checked").val() === "si" && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        },
                        names_validation: {
                            depends: function(element) {
                                return   ($("input[name='empresa']:checked").val() === "si" && (pestañaActiva.id === "datosA" || pestañaActiva.id == "documentos"));
                            }
                        }
                    }
                },
                messages: {
                    user: {
                        required: 'Este campo es requerido'
                    },
                    numempleado: {
                        num_empleado:function () {$('#loader-numempleado').addClass('hidden'); $('#correct-numempleado').addClass('hidden'); $("#numempleado").removeData("previousValue"); return "Número de empleado inválido"; },
                        remote:function () {$('#loader-numempleado').addClass('hidden'); $('#correct-numempleado').addClass('hidden'); $("#numempleado").removeData("previousValue"); return "Número de empleado repetido"; }
                    },
                    puesto: {
                        minlength: 'El puesto debe de contener 4 caracteres como mínimo',
                        field_validation:'Solo se permiten carácteres alfabéticos y espacios'
                    },
                    posee_correo: {
                        required: 'Este campo es requerido'
                    },
                    correo_adicional: {
                        required:function () {$('#loader-correo').addClass('hidden'); $('#correct-correo').addClass('hidden'); $("#correo_adicional").removeData("previousValue"); return "Por favor, ingrese un correo electrónico"; },
                        email_verification:function () {$('#loader-correo').addClass('hidden'); $('#correct-correo').addClass('hidden'); $("#correo_adicional").removeData("previousValue"); return "Asegúrese que el texto ingresado este en formato de email"; }
                    },
                    calle: {
                        location_validation: 'Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios'
                    },
                    ninterior: {
                        digits: 'Solo se permiten números'
                    },
                    nexterior: {
                        digits: 'Solo se permiten números'
                    },
                    colonia: {
                        location_validation: 'Solo se permiten carácteres alfanúmericos, puntos, guiones intermedios y espacios'
                    },
                    codigo: {
                        digits: 'Solo se permiten números'
                    },
                    teldom: {
                        digits: 'Solo se permiten números',
                        minlength: 'Solo puedes ingresar como mínimo 10 números',
                        maxlength: 'Solo puedes ingresar como máximo 10 números'
                    },
                    tel_movil: {
                        required: 'Este campo es requerido'
                    },
                    telmov: {
                        required: 'Este campo es requerido',
                        digits: 'Solo se permiten números',
                        minlength: 'Solo puedes ingresar como mínimo 10 números',
                        maxlength:'Solo puedes ingresar como máximo 10 números'
                    },
                    tel_movil_empresa: {
                        required: 'Este campo es requerido'
                    },
                    marcacion: {
                        required: "Este campo es requerido",
                        digits: "Solo se permiten números"
                    },
                    serie: {
                        required: "Este campo es requerido",
                        alphanumeric: "Solo se permiten carácteres alfanúmericos"
                    },
                    sim: {
                        required: "Este campo es requerido",
                        digits: "Solo se permiten números"
                    },
                    numred: {
                        required: "Este campo es requerido",
                        digits: "Solo se permiten números"
                    },
                    modelotel: {
                        required: "Este campo es requerido",
                        model_validation: "Solo se permiten carácteres alfanúmericos, guiones intermedios y espacios"
                    },
                    marcatel: {
                        required: "Este campo es requerido",
                        field_validation: "Solo se permiten carácteres alfabéticos y espacios"
                    },
                    imei: {
                        required: "Este campo es requerido",
                        digits: "Solo se permiten números"
                    },
                    laptop_empresa: {
                        required: 'Este campo es requerido'
                    },
                    marca_laptop: {
                        required: "Este campo es requerido",
                        field_validation: "Solo se permiten carácteres alfabéticos y espacios"
                    },
                    modelo_laptop: {
                        required: "Por favor, ingrese el modelo de la laptop",
                        model_validation: "Solo se permiten carácteres alfanúmericos, guiones intermedios y espacios"
                    },
                    serie_laptop: {
                        required: "Este campo es requerido",
                        alphanumeric: "Solo se permiten carácteres alfanúmericos"
                    },
                    casa: {
                        required: 'Este campo es requerido'
                    },
                    retencion: {
                        required: 'Este campo es requerido'
                    },
                    monto_mensual: {
                        required: "Este campo es requerido",
                        number: "Solo se permiten números y decimales"
                    },
                    fechanac: {
                        mayor18: 'Debes tener por lo menos 18 años para aplicar'
                    },
                    salario_contrato: {
                        number: 'Solo se permiten números y decimales'
                    },
                    salario_fechaalta: {
                        number: 'Solo se permiten números y decimales'
                    },
                    observaciones: {
                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                    },
                    curp: {
                        alphanumeric: 'Solo se permiten carácteres alfanúmericos',
                        minlength: 'Solo puedes ingresar como mínimo 18 números',
                        maxlength: 'Solo puedes ingresar como máximo 18 números'
                    },
                    nss: {
                        digits: 'Solo se permiten números',
                        minlength: 'Solo puedes ingresar como mínimo 11 números',
                        maxlength: 'Solo puedes ingresar como máximo 11 números'
                    },
                    rfc: {
                        alphanumeric: 'Solo se permiten carácteres alfanúmericos',
                        minlength: 'Solo puedes ingresar como mínimo 12 números',
                        maxlength: 'Solo puedes ingresar como máximo 13 números'
                    },
                    numReferencias: {
                        refvalplus3: 'Solo se permiten hasta 3 referencias laborales'
                    },
                    infa_rnombre1: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rapellidopat1: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rapellidomat1: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rrelacion1: {
                        required: 'Este campo es requerido'
                    },
                    infa_rtelefono1: {
                        required: 'Este campo es requerido',
                        digits: 'Solo se permiten números',
                        minlength: 'Solo puedes ingresar como mínimo 10 números',
                        maxlength: 'Solo puedes ingresar como máximo 10 números'
                    },
                    infa_rnombre2: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rapellidopat2: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rapellidomat2: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rrelacion2: {
                        required: 'Este campo es requerido'
                    },
                    infa_rtelefono2: {
                        required: 'Este campo es requerido',
                        digits: 'Solo se permiten números',
                        minlength: 'Solo puedes ingresar como mínimo 10 números',
                        maxlength: 'Solo puedes ingresar como máximo 10 números'
                    },
                    infa_rnombre3: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rapellidopat3: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rapellidomat3: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    infa_rrelacion3: {
                        required: 'Este campo es requerido'
                    },
                    infa_rtelefono3: {
                        required: 'Este campo es requerido',
                        digits: 'Solo se permiten números',
                        minlength: 'Solo puedes ingresar como mínimo 10 números',
                        maxlength: 'Solo puedes ingresar como máximo 10 números'
                    },
                    cantidadpolo: {
                        digits: 'Solo se permiten números'
                    },
                    emergencia_nom: {
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    emergencia_nom2: {
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    emergencia_appat: {
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    emergencia_appat2: {
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    emergencia_apmat: {
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    emergencia_apmat2: {
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    emergencia_tel: {
                        digits: 'Solo se permiten números',
                        minlength: 'Solo puedes ingresar como mínimo 10 números',
                        maxlength: 'Solo puedes ingresar como máximo 10 números'
                    },
                    emergencia_tel2: {
                        digits: 'Solo se permiten números',
                        minlength: 'Solo puedes ingresar como mínimo 10 números',
                        maxlength: 'Solo puedes ingresar como máximo 10 números'
                    },
                    empresa: {
                        required: 'Este campo es requerido'
                    },
                    nomfam: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    apfam: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    },
                    amfam: {
                        required: 'Este campo es requerido',
                        names_validation: 'Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-button').html(
		                '<button disabled type="submit" id="finish" name="finish" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">'+
			                '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
			                '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
			                '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
			                '</svg>'+
			                'Cargando...'+
		                '</button>');
	                $('#error-container').html("");
	                check_user_logged().then((response) => {
		                if(response == "true"){
			                if (pestañaActiva.id === "datosG"){
                                DatosG();
                            } else if (pestañaActiva.id === "datosA"){
                                DatosA();
                            } else if (pestañaActiva.id === "datosB"){
                                DatosB();
                            } else if (pestañaActiva.id === "documentos"){
                                SubmitChanges();
                            }
		                }else{
			                Swal.fire({
				                title: "Ocurrió un error",
				                text: "Su sesión expiró, se guardaran los datos, no cierre el navegador o la página!",
				                icon: "error"
			                }).then(function() {
				                SubmitChanges();
			                });
		                }
	                }).catch((error) => {
		                console.log(error)
	                })
                return false;
                }
            });
        }
        //TERMINA EL JQUERY VALIDATION

        //Este metodo es para quitar el error en el select 2
        $('#user').on("change", function (e) {
            $(this).valid()
        });

        $(document).on('click', '#guardarDG', function(e) {
            e.preventDefault(); // Evitar el envío del formulario por defecto
            
            var formularioEsValido = $('#Guardar').valid();

            if (formularioEsValido) {
                // Si la validación es exitosa, puedes enviar el formulario manualmente
                $('#Guardar').submit();
            }
        });

        $(document).on('click', '#guardarDA', function(e) {
            e.preventDefault(); // Evitar el envío del formulario por defecto
            
            var formularioEsValido = $('#Guardar').valid();

            if (formularioEsValido) {
                // Si la validación es exitosa, puedes enviar el formulario manualmente
                $('#Guardar').submit();
            }
        });

        $('#finish').on('click', function(e) {
            e.preventDefault(); // Evitar el envío del formulario por defecto
            
            var formularioEsValido = $('#Guardar').valid();

            if (formularioEsValido) {
                // Si la validación es exitosa, puedes enviar el formulario manualmente
                $('#Guardar').submit();
            }
        });
    });


    //Aquí empiezan las referencias bancarias
    function AgregarBanco() {
        var relaciones = ["PADRE", "MADRE", "CONYUGE", "HIJO", "HIJA", "OTRO"];
        var numeroReferenciasBancarias = parseInt($("#refban").val(), 10) || 0;

        var contenedor = $("#ref");
        var cantidadHijos = contenedor.children().length;
        var contador = cantidadHijos + 1;

        // Calcula la diferencia entre numeroReferencias y la cantidad actual de elementos
        var diferenciaReferenciasBancarias = numeroReferenciasBancarias - cantidadHijos;

        if (numeroReferenciasBancarias === 0 || numeroReferenciasBancarias > 2) {
            contenedor.empty();
        } else {
            if (diferenciaReferenciasBancarias < 0) {
                contenedor.children().slice(diferenciaReferenciasBancarias).remove();
            } else if (diferenciaReferenciasBancarias > 0) {
                for (var i = 0; i < diferenciaReferenciasBancarias; i++) {
                    var divFilaBancaria = $("<div>").addClass('grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7 items-start');
                    contenedor.append(divFilaBancaria);

                    var divColumnaBancaria = $("<div>").addClass('md:col-span-1');
                    divFilaBancaria.append(divColumnaBancaria);

                    var tituloReferenciaBancario = $("<div>").addClass('text-[#64748b] font-semibold mb-2').text(obtenerTituloReferenciaBancaria(contador));
                    divColumnaBancaria.append(tituloReferenciaBancario);

                    var divGridNombreReferenciaBancaria = $("<div>").addClass('grid grid-cols-1');
                    var etiquetaNombreReferenciaBancaria = $("<label>").addClass('text-[#64748b] font-semibold').text("Nombre (s)");
                    divGridNombreReferenciaBancaria.append(etiquetaNombreReferenciaBancaria);
                    var divGroupNombreReferenciaBancaria = $("<div>").addClass('group flex');
                    divGridNombreReferenciaBancaria.append(divGroupNombreReferenciaBancaria);
                    var divIconNombreReferenciaBancaria = $("<div>").addClass('w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center');
                    divGroupNombreReferenciaBancaria.append(divIconNombreReferenciaBancaria);
                    var svgNombreReferenciaBancaria = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>';
                    divIconNombreReferenciaBancaria.append(svgNombreReferenciaBancaria);
                    var inputNombreReferenciaBancaria = $("<input>").attr({
                        type: "text",
                        name: "infb_rnombre" + cantidadHijos,
                        "data-rule-required": "true",
                        "data-msg-required": "Este campo es requerido",
                        "data-rule-names_validation": "true",
                        "data-msg-names_validation": "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios",
                        placeholder: "Nombre (s) de " + obtenerTituloReferenciaBancaria(contador)
                    }).addClass('w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600');
                    divGroupNombreReferenciaBancaria.append(inputNombreReferenciaBancaria);

                    var divGridApellidoPatReferenciaBancaria = $("<div>").addClass('grid grid-cols-1');
                    var etiquetaApellidoPatReferenciaBancaria = $("<label>").addClass('text-[#64748b] font-semibold').text("Apellido paterno");
                    divGridApellidoPatReferenciaBancaria.append(etiquetaApellidoPatReferenciaBancaria);
                    var divGroupApellidoPatReferenciaBancaria = $("<div>").addClass('group flex');
                    divGridApellidoPatReferenciaBancaria.append(divGroupApellidoPatReferenciaBancaria);
                    var divIconApellidoPatReferenciaBancaria = $("<div>").addClass('w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center');
                    divGroupApellidoPatReferenciaBancaria.append(divIconApellidoPatReferenciaBancaria);
                    var svgApellidoPatReferenciaBancaria = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>';
                    divIconApellidoPatReferenciaBancaria.append(svgApellidoPatReferenciaBancaria);
                    var inputApellidoPatReferenciaBancaria = $("<input>").attr({
                        type: "text",
                        name: "infb_rapellidopat" + cantidadHijos,
                        "data-rule-required": "true",
                        "data-msg-required": "Este campo es requerido",
                        "data-rule-names_validation": "true",
                        "data-msg-names_validation": "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios",
                        placeholder: "Apellido paterno de " + obtenerTituloReferenciaBancaria(contador)
                    }).addClass('w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600');
                    divGroupApellidoPatReferenciaBancaria.append(inputApellidoPatReferenciaBancaria);

                    var divGridApellidoMatReferenciaBancaria = $("<div>").addClass('grid grid-cols-1');
                    var etiquetaApellidoMatReferenciaBancaria = $("<label>").addClass('text-[#64748b] font-semibold').text("Apellido materno");
                    divGridApellidoMatReferenciaBancaria.append(etiquetaApellidoMatReferenciaBancaria);
                    var divGroupApellidoMatReferenciaBancaria = $("<div>").addClass('group flex');
                    divGridApellidoMatReferenciaBancaria.append(divGroupApellidoMatReferenciaBancaria);
                    var divIconApellidoMatReferenciaBancaria = $("<div>").addClass('w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center');
                    divGroupApellidoMatReferenciaBancaria.append(divIconApellidoMatReferenciaBancaria);
                    var svgApellidoMatReferenciaBancaria = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>';
                    divIconApellidoMatReferenciaBancaria.append(svgApellidoMatReferenciaBancaria);
                    var inputApellidoMatReferenciaBancaria = $("<input>").attr({
                        type: "text",
                        name: "infb_rapellidomat" + cantidadHijos,
                        "data-rule-required": "true",
                        "data-msg-required": "Este campo es requerido",
                        "data-rule-names_validation": "true",
                        "data-msg-names_validation": "Solo se permiten caracteres alfabéticos, guiones intermedios, apóstrofes y espacios",
                        placeholder: "Apellido materno de " + obtenerTituloReferenciaBancaria(contador)
                    }).addClass('w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600');
                    divGroupApellidoMatReferenciaBancaria.append(inputApellidoMatReferenciaBancaria);

                    var divGridRelacionReferenciaBancaria = $("<div>").addClass('grid grid-cols-1');
                    var etiquetaRelacionReferenciaBancaria = $("<label>").addClass('text-[#64748b] font-semibold').text("Relación");
                    divGridRelacionReferenciaBancaria.append(etiquetaRelacionReferenciaBancaria);
                    var divGroupRelacionReferenciaBancaria = $("<div>").addClass('group flex');
                    divGridRelacionReferenciaBancaria.append(divGroupRelacionReferenciaBancaria);
                    var divIconRelacionReferenciaBancaria = $("<div>").addClass('w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center');
                    divGroupRelacionReferenciaBancaria.append(divIconRelacionReferenciaBancaria);
                    var svgRelacionReferenciaBancaria = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>';
                    divIconRelacionReferenciaBancaria.append(svgRelacionReferenciaBancaria);
                    var selectRelacionReferenciaBancaria = $("<select>").attr({
                        name: "infb_rrelacion" + cantidadHijos,
                        "data-rule-required": "true",
                        "data-msg-required": "Este campo es requerido"
                    }).addClass('w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600');
                    var opcionDefaultReferenciaBancaria = $("<option>").val("").text("--Selecciona--");
                    selectRelacionReferenciaBancaria.append(opcionDefaultReferenciaBancaria);
                    $.each(relaciones, function (index, value) {
                        var opcionReferenciaBancaria = $("<option>").val(value).text(value.charAt(0).toUpperCase() + value.slice(1));
                        selectRelacionReferenciaBancaria.append(opcionReferenciaBancaria);
                    });
                    divGroupRelacionReferenciaBancaria.append(selectRelacionReferenciaBancaria);

                    var divGridRFCReferenciaBancaria = $("<div>").addClass('grid grid-cols-1');
                    var etiquetaRFCReferenciaBancaria = $("<label>").addClass('text-[#64748b] font-semibold').text("Relación");
                    divGridRFCReferenciaBancaria.append(etiquetaRFCReferenciaBancaria);
                    var divGroupRFCReferenciaBancaria = $("<div>").addClass('group flex');
                    divGridRFCReferenciaBancaria.append(divGroupRFCReferenciaBancaria);
                    var divIconRFCReferenciaBancaria = $("<div>").addClass('w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center');
                    divGroupRFCReferenciaBancaria.append(divIconRFCReferenciaBancaria);
                    var svgRFCReferenciaBancaria = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>file-document-edit-outline</title><path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z"></path></svg>';
                    divIconRFCReferenciaBancaria.append(svgRFCReferenciaBancaria);
                    var inputRFCReferenciaBancaria = $("<input>").attr({
                        type: "text",
                        name: "infb_rrfc" + cantidadHijos,
                        "data-rule-required": "true",
                        "data-msg-required": "Este campo es requerido",
                        "data-rule-alphanumeric": "true",
                        "data-msg-alphanumeric": "Solo se permiten caracteres alfanuméricos",
                        "data-rule-minlength": 12,
                        "data-msg-minlength": "Debes ingresar como mínimo 12 caracteres en el RFC",
                        "data-rule-maxlength": 13,
                        "data-msg-maxlength": "Debes ingresar como máximo 13 caracteres en el RFC",
                        placeholder: "RFC de " + obtenerTituloReferenciaBancaria(contador)
                    }).addClass('w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600');
                    divGroupRFCReferenciaBancaria.append(inputRFCReferenciaBancaria);

                    var divGridCURPReferenciaBancaria = $("<div>").addClass('grid grid-cols-1');
                    var etiquetaCURPReferenciaBancaria = $("<label>").addClass('text-[#64748b] font-semibold').text("Relación");
                    divGridCURPReferenciaBancaria.append(etiquetaCURPReferenciaBancaria);
                    var divGroupCURPReferenciaBancaria = $("<div>").addClass('group flex');
                    divGridCURPReferenciaBancaria.append(divGroupCURPReferenciaBancaria);
                    var divIconCURPReferenciaBancaria = $("<div>").addClass('w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center');
                    divGroupCURPReferenciaBancaria.append(divIconCURPReferenciaBancaria);
                    var svgCURPReferenciaBancaria = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>badge-account</title><path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z"></path></svg>';
                    divIconCURPReferenciaBancaria.append(svgCURPReferenciaBancaria);
                    var inputCURPReferenciaBancaria = $("<input>").attr({
                        type: "text",
                        name: "infb_rcurp" + cantidadHijos,
                        "data-rule-required": "true",
                        "data-msg-required": "Este campo es requerido",
                        "data-rule-alphanumeric": "true",
                        "data-msg-alphanumeric": "Solo se permiten caracteres alfanuméricos",
                        "data-rule-minlength": 18,
                        "data-msg-minlength": "El curp solo se compone de 18 caracteres",
                        "data-rule-maxlength": 18,
                        "data-msg-maxlength": "El curp solo se compone de 18 caracteres",
                        placeholder: "CURP de " + obtenerTituloReferenciaBancaria(contador)
                    }).addClass('w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-[#d1d5db] outline-none focus:ring-2 focus:ring-celeste-600');
                    divGroupCURPReferenciaBancaria.append(inputCURPReferenciaBancaria);

                    var divGridPDerechoReferenciaBancaria = $("<div>").addClass('grid grid-cols-1');
                    var etiquetaPDerechoReferenciaBancaria = $("<label>").addClass('text-[#64748b] font-semibold').text("Relación");
                    divGridPDerechoReferenciaBancaria.append(etiquetaPDerechoReferenciaBancaria);
                    var divGroupPDerechoReferenciaBancaria = $("<div>").addClass('group flex');
                    divGridPDerechoReferenciaBancaria.append(divGroupPDerechoReferenciaBancaria);
                    var divIconPDerechoReferenciaBancaria = $("<div>").addClass('w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center');
                    divGroupPDerechoReferenciaBancaria.append(divIconPDerechoReferenciaBancaria);
                    var svgPDerechoReferenciaBancaria = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>percent-box</title><path fill="currentColor" d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.1 3 19 3M8.83 7.05C9.81 7.05 10.6 7.84 10.6 8.83C10.6 9.81 9.81 10.6 8.83 10.6C7.84 10.6 7.05 9.81 7.05 8.83C7.05 7.84 7.84 7.05 8.83 7.05M15.22 17C14.24 17 13.45 16.2 13.45 15.22C13.45 14.24 14.24 13.45 15.22 13.45C16.2 13.45 17 14.24 17 15.22C17 16.2 16.2 17 15.22 17M8.5 17.03L7 15.53L15.53 7L17.03 8.5L8.5 17.03Z"></path></svg>';
                    divIconPDerechoReferenciaBancaria.append(svgPDerechoReferenciaBancaria);
                    var inputPDerechoReferenciaBancaria = $("<input>").attr({
                        type: "text",
                        name: "infb_rporcentaje" + cantidadHijos,
                        "data-rule-required": "true",
                        "data-msg-required": "Este campo es requerido",
                        placeholder: "Porcentaje de derecho de " + obtenerTituloReferenciaBancaria(contador),
                        readonly: true
                    }).addClass('w-full -ml-10 pl-10 py-2 h-11 border rounded-md border-gray-200 bg-gray-200 text-gray-900 outline-none focus:ring-2 focus:ring-celeste-600');
                    
                    divGroupPDerechoReferenciaBancaria.append(inputPDerechoReferenciaBancaria);

                    if (numeroReferenciasBancarias > 1) {
                        divFilaBancaria.addClass('border-t border-[#d1d5db] pt-5 mt-5');
                    }

                    divColumnaBancaria.append(divGridNombreReferenciaBancaria, divGridApellidoPatReferenciaBancaria, divGridApellidoMatReferenciaBancaria, divGridRelacionReferenciaBancaria, divGridRFCReferenciaBancaria, divGridCURPReferenciaBancaria, divGridPDerechoReferenciaBancaria);
                    contador++;
                    cantidadHijos++;
                }
            }
        }
        for (let c = 0; c < numeroReferenciasBancarias; c++) {
            $("input[name='infb_rporcentaje" + c + "']").val(numeroReferenciasBancarias == 1 ? 100 : 50);
        }
    }

    function obtenerTituloReferenciaBancaria(numero) {
        var titulos = ["primera", "segunda"];
        return titulos[numero - 1] + " referencia";
    } 
    //Aquí terminan las referencias bancarias

    //Checa si el user esta loggeado
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
	
    //Protege si el usuario cierra, regresa durante un envio de formulario, ect...
	function unloadHandler(e) {
		// Cancel the event
		e.preventDefault();
		// Chrome requires returnValue to be set
		e.returnValue = '';
	}

    //Metodo alamcena en la tabla temporal de expedientes que envía los datosG
    function DatosG(){
        window.addEventListener('beforeunload', unloadHandler);
        var fd = new FormData();

        /*Inputs*/
        var select2 = $("#user").val();
        var select2text = $("#user option:selected").text();
        var numempleado = $("#numempleado").val();
        var puesto = $("#puesto").val();
        var estudios = $("#estudios").val();
        var posee_correo = $("input[name=posee_correo]:checked", "#Guardar").val();
        var correo_adicional = $("#correo_adicional").val();
        var calle = $("#calle").val();
        var ninterior = $("#ninterior").val();
        var nexterior = $("#nexterior").val();
        var colonia = $("#colonia").val();
        var estado = $("#estado").val();
        var estadotext = $("#estado option:selected").text();
        var municipio = $("#municipio").val();
        var municipiotext = $("#municipio option:selected").text();
        var codigo = $("#codigo").val();
        var teldom = $("#teldom").val();
        var posee_telmov = $("input[name=tel_movil]:checked", "#Guardar").val();
        var telmov = $("#telmov").val();
        var posee_telempresa = $("input[name=tel_movil_empresa]:checked", "#Guardar").val();
        var marcacion = $("#marcacion").val();
        var serie = $("#serie").val();
        var sim = $("#sim").val();
        var numred = $("#numred").val();
        var modelotel = $("#modelotel").val();
        var marcatel = $("#marcatel").val();
        var imei = $("#imei").val();
        var posee_laptop = $("input[name=laptop_empresa]:checked", "#Guardar").val();
        var marca_laptop = $("#marca_laptop").val();
        var modelo_laptop = $("#modelo_laptop").val();
        var serie_laptop = $("#serie_laptop").val();
        var radio = $("input[name=casa]:checked", "#Guardar").val();
        var ecivil = $("#ecivil").val();
        var posee_retencion = $("input[name=retencion]:checked", "#Guardar").val();
        var monto_mensual = $("#monto_mensual").val();
        var fechanac = $("#fechanac").val();
        var fechacon = $("#fechacon").val();
        var fechaalta = $("#fechaalta").val();
        var salario_contrato = $("#salario_contrato").val();
        var salario_fechaalta = $("#salario_fechaalta").val();
        var observaciones = $("#observaciones").val();
        var curp = $("#curp").val();
        var nss = $("#nss").val();
        var rfc = $("#rfc").val();
        var tipoidentificacion = $("#identificacion").val();
        var numeroidentificacion = $("#numeroidentificacion").val();
        var pestaña = "DatosG";
        var app="Expediente_temporal";

        fd.append('select2', select2);
        fd.append('select2text', select2text);
        fd.append('numempleado', numempleado);
        fd.append('puesto', puesto);
        fd.append('estudios', estudios);
        fd.append('posee_correo', posee_correo);
        fd.append('correo_adicional', correo_adicional);
        fd.append('calle', calle);
        fd.append('ninterior', ninterior);
        fd.append('nexterior', nexterior);
        fd.append('colonia', colonia);
        fd.append('estado', estado);
        fd.append('estadotext', estadotext);
        fd.append('municipio', municipio);
        fd.append('municipiotext', municipiotext);
        fd.append('codigo', codigo);
        fd.append('teldom', teldom);
        fd.append('posee_telmov', posee_telmov);
        fd.append('telmov', telmov);
        fd.append('posee_telempresa', posee_telempresa);
        fd.append('marcacion', marcacion);
        fd.append('serie', serie);
        fd.append('sim', sim);
        fd.append('numred', numred);
        fd.append('modelotel', modelotel);
        fd.append('marcatel', marcatel);
        fd.append('imei', imei);
        fd.append('posee_laptop', posee_laptop);
        fd.append('marca_laptop', marca_laptop);
        fd.append('modelo_laptop', modelo_laptop);
        fd.append('serie_laptop', serie_laptop);
        fd.append('radio', radio);
        fd.append('ecivil', ecivil);
        fd.append('posee_retencion', posee_retencion);
        fd.append('monto_mensual', monto_mensual);
        fd.append('fechanac', fechanac);
        fd.append('fechacon', fechacon);
        fd.append('fechaalta', fechaalta);
        fd.append('salario_contrato', salario_contrato);
        fd.append('salario_fechaalta', salario_fechaalta);
        fd.append('observaciones', observaciones);
        fd.append('curp', curp);
        fd.append('nss', nss);
        fd.append('rfc', rfc);
        fd.append('identificacion', tipoidentificacion);
        fd.append('numeroidentificacion', numeroidentificacion);
        fd.append('pestaña', pestaña);
        fd.append('app', app);

        $.ajax({
            type: "POST",
            url: "../ajax/class_search.php",
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                setTimeout(function(){
                    var array = $.parseJSON(response);
					if (array[0] == "success") {
                        Swal.fire({
                            title: "Expediente Almacenado",
                            text: array[1],
                            icon: "success"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                        });
                    }else if (array[0] == "error") {
                        Swal.fire({
                            title: "Error",
                            text: array[1],
                            icon: "error"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                        });
                    }
				},3000);
            }
        });
    }

    //Metodo alamcena en la tabla temporal de expedientes que envía los datosA
    function DatosA(){

        window.addEventListener('beforeunload', unloadHandler);
        var fd = new FormData();

        var select2 = $("#user").val();
        var select2text = $("#user option:selected").text();
        var numeroreferenciaslab = $("#reflab").val();
        var fechauniforme = $("#fechauniforme").val();
        var cantidadpolo = $("#cantidadpolo").val();
        var tallapolo = $("#tallapolo").val();
        var emergencianom = $("#emergencianom").val();
        var emergenciaparentesco = $("#emergenciaparentesco").val();
        var emergenciatel = $("#emergenciatel").val();
        var emergencianom2 = $("#emergencianom2").val();
        var emergenciaparentesco2 = $("#emergenciaparentesco2").val();
        var emergenciatel2 = $("#emergenciatel2").val();
		var capacitacion = $("#capacitacion").val();
        var antidoping = $("#antidoping").val();
        var tipo_sangre = $("#tipo_sangre").val();
        var vacante = $("#vacante").val();
        var radio2 = $("input[name=empresa]:checked", "#Guardar").val();
        var nomfam = $("#nomfam").val();
        var apellidopatfam = $("#apfam").val();
        var apellidomatfam = $("#amfam").val();
        /*Referencias laborales*/
        var nreflab =  $("input[name=reflab]").val();
        var reflab = [];
        for(var i=0; i <nreflab; i++){
            var rnombre = $("input[name=infa_rnombre" +i+ "]").val();
            var rapellidopat = $("input[name=infa_rapellidopat" +i+ "]").val();
            var rapellidomat = $("input[name=infa_rapellidomat" +i+ "]").val();
            var rrelacion = $("input[name=infa_rrelacion" +i+ "]").val();
            var rtelefono = $("input[name=infa_rtelefono" +i+ "]").val();
            reflab[i] = {nombre: rnombre, apellidopat: rapellidopat, apellidomat: rapellidomat, relacion: rrelacion, telefono: rtelefono};
        }
        var pestaña = "DatosA";
        var app="Expediente_temporal";


        fd.append('select2', select2);
        fd.append('select2text', select2text);
        fd.append('numeroreferenciaslab', numeroreferenciaslab);
        fd.append('fechauniforme', fechauniforme);
        fd.append('cantidadpolo', cantidadpolo);
        fd.append('tallapolo', tallapolo);
        fd.append('emergencianom', emergencianom);
        fd.append('emergenciaparentesco', emergenciaparentesco);
        fd.append('emergenciatel', emergenciatel);
        fd.append('emergencianom2', emergencianom2);
        fd.append('emergenciaparentesco2', emergenciaparentesco2);
        fd.append('emergenciatel2', emergenciatel2);
		fd.append('capacitacion', capacitacion);
        fd.append('antidoping', antidoping);
        fd.append('tipo_sangre', tipo_sangre);
        fd.append('vacante', vacante);
        fd.append('radio2', radio2);
        fd.append('nomfam', nomfam);
        fd.append('apellidopatfam', apellidopatfam);
        fd.append('apellidomatfam', apellidomatfam);
        fd.append('nreflab', nreflab);
        fd.append('referencias', JSON.stringify(reflab));
        fd.append('pestaña', pestaña);
        fd.append('app', app);

        $.ajax({
            type: "POST",
            url: "../ajax/class_search.php",
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                setTimeout(function(){
                    var array = $.parseJSON(response);
					if (array[0] == "success") {
                        Swal.fire({
                            title: "Expediente Creado",
                            text: array[1],
                            icon: "success"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                        });
                    }else if (array[0] == "error") {
                        Swal.fire({
                            title: "Error",
                            text: array[1],
                            icon: "error"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                        });
                    }
				},3000);
            }
        });
    }

    //Metodo alamcena en la tabla temporal de expedientes que envía los datosB
    function DatosB(){
        window.addEventListener('beforeunload', unloadHandler);
        var fd = new FormData();

        var select2 = $("#user").val();
        var select2text = $("#user option:selected").text();
        var numeroreferenciasban = $("#refban").val();
        var banco_personal = $("#banco_personal").val();
        var cuenta_personal = $("#cuenta_personal").val();
        var clabe_personal = $("#clabe_personal").val();
        var plastico_personal = $("#plastico_personal").val();
        var banco_nomina = $("#banco_nomina").val();
        var cuenta_nomina = $("#cuenta_nomina").val();
        var clabe_nomina = $("#clabe_nomina").val();
        var plastico = $("#plastico").val();
        /*Referencias bancarias*/
        var nrefbanc =  $("input[name=refban]").val();
        var refbanc = [];
        for(var i=0; i <nrefbanc; i++){
            var brnombre = $("input[name=infb_rnombre" +i+ "]").val();
            var brapellidopat = $("input[name=infb_rapellidopat" +i+ "]").val();
            var brapellidomat = $("input[name=infb_rapellidomat" +i+ "]").val();
            var brrelacion = $("input[name=infb_rrelacion" +i+ "]").val();
            var brrfc = $("input[name=infb_rrfc" +i+ "]").val();
            var brcurp = $("input[name=infb_rcurp" +i+ "]").val();
            var brporcentaje = $("input[name=infb_rporcentaje" +i+ "]").val();
            refbanc[i] = {nombre: brnombre, apellidopat: brapellidopat, apellidomat: brapellidomat, relacion: brrelacion, rfc: brrfc, curp: brcurp, porcentaje: brporcentaje};
        }
        var pestaña = "DatosB";
        var app="Expediente_temporal";


        fd.append('select2', select2);
        fd.append('select2text', select2text);
        fd.append('numeroreferenciasban', numeroreferenciasban);
        fd.append('banco_personal', banco_personal);
        fd.append('cuenta_personal', cuenta_personal);
        fd.append('clabe_personal', clabe_personal);
        fd.append('plastico_personal', plastico_personal);
        fd.append('banco_nomina', banco_nomina);
        fd.append('cuenta_nomina', cuenta_nomina);
        fd.append('clabe_nomina', clabe_nomina);
        fd.append('plastico', plastico);
        fd.append('nrefbanc', nrefbanc);
        fd.append('refbanc', JSON.stringify(refbanc));
        fd.append('pestaña', pestaña);
        fd.append('app', app);

        $.ajax({
            type: "POST",
            url: "../ajax/class_search.php",
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                setTimeout(function(){
                    var array = $.parseJSON(response);
					if (array[0] == "success") {
                        Swal.fire({
                            title: "Expediente Creado",
                            text: array[1],
                            icon: "success"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                        });
                    }else if (array[0] == "error") {
                        Swal.fire({
                            title: "Error",
                            text: array[1],
                            icon: "error"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                        });
                    }
				},3000);
            }
        });


    }

    //Metodo que envía el formulario
    function SubmitChanges(){
        window.addEventListener('beforeunload', unloadHandler);
        var fd = new FormData();
    
        /*Inputs*/
        var select2 = $("#user").val();
        var select2text = $("#user option:selected").text();
        var numempleado = $("#numempleado").val();
        var puesto = $("#puesto").val();
        var estudios = $("#estudios").val();
        var posee_correo = $("input[name=posee_correo]:checked", "#Guardar").val();
        var correo_adicional = $("#correo_adicional").val();
        var calle = $("#calle").val();
        var ninterior = $("#ninterior").val();
        var nexterior = $("#nexterior").val();
        var colonia = $("#colonia").val();
        var estado = $("#estado").val();
        var estadotext = $("#estado option:selected").text();
        var municipio = $("#municipio").val();
        var municipiotext = $("#municipio option:selected").text();
        var codigo = $("#codigo").val();
        var teldom = $("#teldom").val();
        var posee_telmov = $("input[name=tel_movil]:checked", "#Guardar").val();
        var telmov = $("#telmov").val();
        var posee_telempresa = $("input[name=tel_movil_empresa]:checked", "#Guardar").val();
        var marcacion = $("#marcacion").val();
        var serie = $("#serie").val();
        var sim = $("#sim").val();
        var numred = $("#numred").val();
        var modelotel = $("#modelotel").val();
        var marcatel = $("#marcatel").val();
        var imei = $("#imei").val();
        var posee_laptop = $("input[name=laptop_empresa]:checked", "#Guardar").val();
        var marca_laptop = $("#marca_laptop").val();
        var modelo_laptop = $("#modelo_laptop").val();
        var serie_laptop = $("#serie_laptop").val();
        var radio = $("input[name=casa]:checked", "#Guardar").val();
        var ecivil = $("#ecivil").val();
        var posee_retencion = $("input[name=retencion]:checked", "#Guardar").val();
        var monto_mensual = $("#monto_mensual").val();
        var fechanac = $("#fechanac").val();
        var fechacon = $("#fechacon").val();
        var fechaalta = $("#fechaalta").val();
        var salario_contrato = $("#salario_contrato").val();
        var salario_fechaalta = $("#salario_fechaalta").val();
        var observaciones = $("#observaciones").val();
        var curp = $("#curp").val();
        var nss = $("#nss").val();
        var rfc = $("#rfc").val();
        var tipoidentificacion = $("#identificacion").val();
        var numeroidentificacion = $("#numeroidentificacion").val();
        var numeroreferenciaslab = $("#reflab").val();
        var fechauniforme = $("#fechauniforme").val();
        var cantidadpolo = $("#cantidadpolo").val();
        var tallapolo = $("#tallapolo").val();
        var emergencianom = $("#emergencianom").val();
        var emergenciaparentesco = $("#emergenciaparentesco").val();
        var emergenciatel = $("#emergenciatel").val();
        var emergencianom2 = $("#emergencianom2").val();
        var emergenciaparentesco2 = $("#emergenciaparentesco2").val();
        var emergenciatel2 = $("#emergenciatel2").val();
		var capacitacion = $("#capacitacion").val();
        var antidoping = $("#antidoping").val();
        var tipo_sangre = $("#tipo_sangre").val();
        var vacante = $("#vacante").val();
        var radio2 = $("input[name=empresa]:checked", "#Guardar").val();
        var nomfam = $("#nomfam").val();
        var apellidopatfam = $("#apfam").val();
        var apellidomatfam = $("#amfam").val();
        var numeroreferenciasban = $("#refban").val();
        var banco_personal = $("#banco_personal").val();
        var cuenta_personal = $("#cuenta_personal").val();
        var clabe_personal = $("#clabe_personal").val();
        var plastico_personal = $("#plastico_personal").val();
        var banco_nomina = $("#banco_nomina").val();
        var cuenta_nomina = $("#cuenta_nomina").val();
        var clabe_nomina = $("#clabe_nomina").val();
        var plastico = $("#plastico").val();
        var method = "store";
        var app = "expediente";
    
        /*Referencias laborales*/
        var nreflab =  $("input[name=reflab]").val();
        var reflab = [];
        for(var i=0; i <nreflab; i++){
            var rnombre = $("input[name=infa_rnombre" +i+ "]").val();
            var rapellidopat = $("input[name=infa_rapellidopat" +i+ "]").val();
            var rapellidomat = $("input[name=infa_rapellidomat" +i+ "]").val();
            var rrelacion = $("input[name=infa_rrelacion" +i+ "]").val();
            var rtelefono = $("input[name=infa_rtelefono" +i+ "]").val();
            reflab[i] = {nombre: rnombre, apellidopat: rapellidopat, apellidomat: rapellidomat, relacion: rrelacion, telefono: rtelefono};
        }
    
        /*Referencias bancarias*/
        var nrefbanc =  $("input[name=refban]").val();
        var refbanc = [];
        for(var i=0; i <nrefbanc; i++){
            var brnombre = $("input[name=infb_rnombre" +i+ "]").val();
            var brapellidopat = $("input[name=infb_rapellidopat" +i+ "]").val();
            var brapellidomat = $("input[name=infb_rapellidomat" +i+ "]").val();
            var brrelacion = $("input[name=infb_rrelacion" +i+ "]").val();
            var brrfc = $("input[name=infb_rrfc" +i+ "]").val();
            var brcurp = $("input[name=infb_rcurp" +i+ "]").val();
            var brporcentaje = $("input[name=infb_rporcentaje" +i+ "]").val();
            refbanc[i] = {nombre: brnombre, apellidopat: brapellidopat, apellidomat: brapellidomat, relacion: brrelacion, rfc: brrfc, curp: brcurp, porcentaje: brporcentaje};
        }
    
        /*File uploads*/
        <?php 
            foreach($papeleria as $fetchpapeleria){
                echo ("
                    var papeleria{$fetchpapeleria['id']} = $('#infp_papeleria{$fetchpapeleria['id']}')[0].files[0];
                ");
            } 
        ?>
    
        /*FD appends*/
    
        /*Inputs*/
        fd.append('select2', select2);
        fd.append('select2text', select2text);
        fd.append('numempleado', numempleado);
        fd.append('puesto', puesto);
        fd.append('estudios', estudios);
        fd.append('posee_correo', posee_correo);
        fd.append('correo_adicional', correo_adicional);
        fd.append('calle', calle);
        fd.append('ninterior', ninterior);
        fd.append('nexterior', nexterior);
        fd.append('colonia', colonia);
        fd.append('estado', estado);
        fd.append('estadotext', estadotext);
        fd.append('municipio', municipio);
        fd.append('municipiotext', municipiotext);
        fd.append('codigo', codigo);
        fd.append('teldom', teldom);
        fd.append('posee_telmov', posee_telmov);
        fd.append('telmov', telmov);
        fd.append('posee_telempresa', posee_telempresa);
        fd.append('marcacion', marcacion);
        fd.append('serie', serie);
        fd.append('sim', sim);
        fd.append('numred', numred);
        fd.append('modelotel', modelotel);
        fd.append('marcatel', marcatel);
        fd.append('imei', imei);
        fd.append('posee_laptop', posee_laptop);
        fd.append('marca_laptop', marca_laptop);
        fd.append('modelo_laptop', modelo_laptop);
        fd.append('serie_laptop', serie_laptop);
        fd.append('radio', radio);
        fd.append('ecivil', ecivil);
        fd.append('posee_retencion', posee_retencion);
        fd.append('monto_mensual', monto_mensual);
        fd.append('fechanac', fechanac);
        fd.append('fechacon', fechacon);
        fd.append('fechaalta', fechaalta);
        fd.append('salario_contrato', salario_contrato);
        fd.append('salario_fechaalta', salario_fechaalta);
        fd.append('observaciones', observaciones);
        fd.append('curp', curp);
        fd.append('nss', nss);
        fd.append('rfc', rfc);
        fd.append('identificacion', tipoidentificacion);
        fd.append('numeroidentificacion', numeroidentificacion);
        fd.append('numeroreferenciaslab', numeroreferenciaslab);
        fd.append('fechauniforme', fechauniforme);
        fd.append('cantidadpolo', cantidadpolo);
        fd.append('tallapolo', tallapolo);
        fd.append('emergencianom', emergencianom);
        fd.append('emergenciaparentesco', emergenciaparentesco);
        fd.append('emergenciatel', emergenciatel);
        fd.append('emergencianom2', emergencianom2);
        fd.append('emergenciaparentesco2', emergenciaparentesco2);
        fd.append('emergenciatel2', emergenciatel2);
		fd.append('capacitacion', capacitacion);
        fd.append('antidoping', antidoping);
        fd.append('tipo_sangre', tipo_sangre);
        fd.append('vacante', vacante);
        fd.append('radio2', radio2);
        fd.append('nomfam', nomfam);
        fd.append('numeroreferenciasban', numeroreferenciasban);
        fd.append('banco_personal', banco_personal);
        fd.append('cuenta_personal', cuenta_personal);
        fd.append('clabe_personal', clabe_personal);
        fd.append('plastico_personal', plastico_personal);
        fd.append('banco_nomina', banco_nomina);
        fd.append('cuenta_nomina', cuenta_nomina);
        fd.append('clabe_nomina', clabe_nomina);
        fd.append('plastico', plastico);
        fd.append('method', method);
        fd.append('app', app);
        
    
        /*Referencias*/
        fd.append('referencias', JSON.stringify(reflab));
        fd.append('refbanc', JSON.stringify(refbanc));
    
        /*File uploads*/
        <?php 
            foreach($papeleria as $fetchpapeleria){
                echo ("
                fd.append('papeleria{$fetchpapeleria['id']}', 'papeleria{$fetchpapeleria['id']}');
                ");
            } 
        ?>
    
    
        /*Ajax*/
        $.ajax({
            type: "POST",
            url: "../ajax/class_search.php",
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                setTimeout(function(){
                    var array = $.parseJSON(response);
					if (array[0] == "success") {
                        Swal.fire({
                            title: "Expediente Creado",
                            text: array[1],
                            icon: "success"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button disabled class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                            window.location.href = "expedientes.php";	
                        });
                    }else if (array[0] == "error") {
                        Swal.fire({
                            title: "Error",
                            text: array[1],
                            icon: "error"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button class='button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700' id='finish' name='finish' type='submit'>Guardar</button>");
                        });
                    }
				},3000);
            }
        });
    }

    function waitForElm(selector) {
        return new Promise(resolve => {
            if (document.querySelector(selector)) {
                return resolve(document.querySelector(selector));
            }

            const observer = new MutationObserver(mutations => {
                if (document.querySelector(selector)) {
                    resolve(document.querySelector(selector));
                    observer.disconnect();
                }
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    }


    $('#user').on('select2:open', function (e) {
        waitForElm('.select2-results__options').then((elm) => {
            if ( $('.select2-results__options.select2-results__options--nested > *').length == 0 ) {
                var usuarios_group = $('#user').find('optgroup[label=Usuarios]');
                $(usuarios_group).prop('disabled', 'true');
                $(".select2-results__option.select2-results__option--group").css("display","none");
                $('#select2-user-results.select2-results__options').append("<span class='px-3'>No hay resultados</span>");
            }
        });
    });

</script>
<style>
    .error{
        color: #FF1E2D;
    }

    main{
		position:relative !important;
	}

    .select2-container--tailwind .select2-results > .select2-results__options{
        overflow-y: auto;
        max-height: 110px;
    }

    .select2-container--tailwind .select2-results__option--group{
        padding:0;
    }

    .select2-container--tailwind .select2-results__group{
        cursor: default;
        display:block;
        padding: 6px;
    }

    .select2-results__option--highlighted{
        background: rgb(0 152 255) !important;
        color:white;
    }

    .select2-container--above.select2-container--open{
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }

    .select2-container--below.select2-container--open{
        border-bottom-right-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
    }

    .select2-results__option--selected{
        background: #ddd;
    }

    .select2-dropdown{
        border-width: 1px;
        border-style: solid;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
        --tw-border-opacity: 1;
    }

    .select2-search__field{
        border-radius: 0.375rem;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        height: 2.75rem;
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
    }

    .select2-search__field:focus{
        box-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        --tw-ring-color: rgb(79 70 229);
    }

    .daterangepicker td.active, .daterangepicker td.active:hover{
		background-color:  #00a3ff !important;
		border-color: transparent;
		color: #fff;
	}
</style>