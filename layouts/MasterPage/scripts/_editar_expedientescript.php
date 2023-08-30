<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>

    let delete_switch_array = [];

	//Empieza la configuración del menú
   const menuExpedientes = [{
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

			menuExpedientes.forEach((trigger) => {
				trigger.targetMenu.classList.remove("block")
				trigger.targetMenu.classList.add("hidden");
				trigger.triggerMenu.classList.remove("bg-[#4f46e5]", "text-white", "menu-active");
				trigger.triggerMenu.classList.add("hover:bg-slate-100", "hover:text-slate-800", 
				"focus:bg-slate-100", "focus:text-slate-800");
				trigger.triggerMenu.firstElementChild.classList.add("text-slate-400", "transition-colors", 
				"group-hover:text-slate-500", "group-focus:text-slate-500");
			})
			objective.targetMenu.classList.remove("hidden");
			objective.targetMenu.classList.add("block");
			objective.triggerMenu.classList.add("bg-[#4f46e5]", "text-white", "menu-active");
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
		    if(basename($_SERVER['PHP_SELF']) == 'editar_expediente.php'){?>
			    var dropdown = document.getElementById('catalogos');
			    dropdown.classList.remove("hidden");
	    <?php } ?>

		//Empieza la navegación por los expedientes por medio de los botones (Siguiente y anterior).
		let tabsContainer = document.querySelector("#menu");
		let tabTogglers = tabsContainer.querySelectorAll("button");

		$("#siguiente").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});

        $("#siguiente2").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});

        $("#anterior").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[0].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

        $("#siguiente3").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.nextElementSibling.firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
		});
		
			
		$("#anterior2").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[1].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

        $("#anterior3").on("click", function () {
			let tabContents = document.querySelector("#menu-contents");
			let currentTab = document.querySelector(".menu-active");
			let tabName = currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.getAttribute("data-tabs-target");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].classList.remove('bg-[#4f46e5]', 'text-white', 'menu-active');
				tabTogglers[i].classList.add('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
				tabTogglers[i].firstChild.nextElementSibling.classList.add('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');
				tabContents.children[i].classList.remove('hidden');
				if ("#" + tabContents.children[i].id === tabName) {
					tabTogglers[i].classList.add('menu-active');
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.classList.add('bg-[#4f46e5]', 'text-white', 'menu-active');
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.classList.remove('hover:bg-slate-100', 'hover:text-slate-800', 'focus:bg-slate-100', 'focus:text-slate-800');
			currentTab.parentElement.parentElement.children[2].firstChild.nextElementSibling.firstChild.nextElementSibling.classList.remove('text-slate-400', 'transition-colors', 'group-hover:text-slate-500', 'group-focus:text-slate-500');	
		});

		//Termina la navegación por los expedientes por medio de los botones (Siguiente y anterior).

        //Empieza la configuración de los fileupload
        <?php for($i = 1; $i <= $counttipospapeleria; $i++){

        echo ("var papeleria_clone{$i};");

	    echo (" $('#upload-button{$i}').on('click', function () {
				    $('#infp_papeleria{$i}').click();
			    });
                
                delete_switch_array.push('false');

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
								    $('#upload-text{$i}').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
								    $('#upload-delete{$i}').addClass('hidden');
								    $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
							    } else {
								    console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
								    if(file.size > 10485760){
									    $('#content-container{$i}').html('');
									    $('#content-container{$i}').removeClass('grid grid-cols-1');
									    $('#infp_papeleria{$i}').val('');
									    $('#upload-text{$i}').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
									    $('#upload-delete{$i}').addClass('hidden');
									    $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
								    }else{
									    if(file.type == 'application/pdf'){
										    var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>');
										    $('#lista{$i}').append(list);
                                            delete_switch_array[{$i}-1]='false';
									    }else{
										    var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+file.name+'</li>'); 
										    $('#lista{$i}').append(list);
                                            delete_switch_array[{$i}-1]='false';
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
                                        delete_switch_array[{$i}-1]='false';
							        }else{
								        $('#content-container{$i}').html('');
								        $('#content-container{$i}').removeClass('grid grid-cols-1');
								        $('#infp_papeleria{$i}').val('');
								        $('#upload-text{$i}').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
								        $('#upload-delete{$i}').addClass('hidden');
								        $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
							        }
						        }else if(archivo.type == 'image/jpeg' || archivo.type == 'image/png'){
							        if(!(archivo.size > 10485760)){
								        var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>'); 
								        $('#lista{$i}').append(list);
                                        delete_switch_array[{$i}-1]='false';
							        }else{
								        $('#content-container{$i}').html('');
								        $('#content-container{$i}').removeClass('grid grid-cols-1');
								        $('#infp_papeleria{$i}').val('');
								        $('#upload-text{$i}').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
								        $('#upload-delete{$i}').addClass('hidden');
								        $('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
							        }
						        }else{
							        $('#content-container{$i}').html('');
							        $('#content-container{$i}').removeClass('grid grid-cols-1');
							        $('#infp_papeleria{$i}').val('');
							        $('#upload-text{$i}').html('<p style=\' color: rgb(244 63 94); \'>Subió un archivo inválido ó el archivo no es originalmente un archivo pdf, jpg y png, intente de nuevo</p>');
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
                    delete_switch_array[{$i}-1]='true';	
			    });
	
		    ");
	    }?>

        //Termina la configuración de los fileupload

        //EMPIEZA EL JQUERY VALIDATION
        $.validator.addMethod('email_verification', function (value, element) {
            return this.optional(element) || /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i.test(value);
        }, 'not a valid email.');
		
		$.validator.addMethod('num_empleado', function (value, element) {
            return this.optional(element) || /^([FL]){1}-([0-9])+$/.test(value);
        }, 'invalid employee number.');
		
		$.validator.addMethod('field_validation', function (value, element) {
            return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
        }, 'not a valid field.');

        $.validator.addMethod('location_validation', function (value) {
            return /^(?:([a-zA-Z0-9\u00C0-\u00FF][?:\.|,]?)+([?:\s|-][a-zA-Z0-9\u00C0-\u00FF]+[?:\.|,]?)*)?$/.test(value);
        }, 'not a valid field.');

        jQuery.validator.addMethod("model_validation", function(value, element) {
            return this.optional(element) || /^([a-zA-Z0-9\u00C0-\u00FF])+([?:\s|\-|\_][a-zA-Z0-9\u00C0-\u00FF]+)*$/i.test(value);
        }, "invalid model");

        $.validator.addMethod("maxDate", function(value, element) {
            var curDate = new Date();
            var inputDate = new Date(value);
            if (value == "" || inputDate < curDate)
                return true;
            return false;
        }, "Invalid Date!");

        $.validator.addMethod('names_validation', function (value, element) {
			return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+(?:[-'\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
		}, 'not a valid name.');

        if($('#Guardar').length > 0 ){
            $('#Guardar').validate({
                ignore: [],
                onkeyup: false,
                errorPlacement: function(error, element) {
                    if($(element).attr("type") === "file"){
                        error.insertAfter($(element));
                    }else if((element.attr('name') === 'observaciones')){
                        error.appendTo("div#error_observaciones");
                    }else if((element.attr('name') === 'estatus_motivo')){
                        error.appendTo("div#error_estatus_motivo");  
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
                    if(validator.errorList.length){
                        //Agregar los tabpane
                        var taberror = jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id');
                        if(taberror != "documentos"){
                            $('#menu button[data-tabs-target="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").removeClass("hidden") + '"]');
                            $('#menu > li > button[data-tabs-target="#'+taberror+'"]').addClass("menu-active bg-[#4f46e5] text-white").removeClass("hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800").children().first().removeClass("text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500");
                            $('#menu > li > button:last').removeClass("bg-[#4f46e5] text-white menu-active").addClass("hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800").children().first().addClass("text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500");
                            $("#menu-contents > div:last").addClass("hidden");
                        }
                    }
                },
                highlight: function(element) {
                    var elem = $(element);
                    if (elem.hasClass("select2-hidden-accessible")) {
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600"); 
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().addClass("border-2 border-rose-500 border-2"); 
                    }else{
                        $(element).removeClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                        $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                    }
                },
                unhighlight: function(element) {
                    var elem = $(element);
                    if (elem.hasClass("select2-hidden-accessible")) {
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().removeClass("border-2 border-rose-500 border-2");
                        $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600"); 
                    }else{
                        $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                        $(element).addClass("border border-[#d1d5db] focus:ring-2 focus:ring-indigo-600");
                    }
                },
                rules: {
                    user: {
                        required:true
                    },
                    numempleado: {
                        required: true,
                        num_empleado: true,
                        remote: {
                            url: "../ajax/expedientes/checkedit_num_empleado.php",
                            type: "POST",
                            data: {
                                "editarid": <?php echo $Editarid; ?>
                            },
                            beforeSend: function () {
                                $('#loader-numempleado').removeClass('hidden');
                                $('#correct-numempleado').addClass('hidden');
                            },
                            complete: function(data){
                                if(data.responseText == "true") {
                                    $('#loader-numempleado').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
                                    $('#correct-numempleado').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
                                }else{
                                    $('#loader-numempleado').addClass('hidden');
                                    $('#correct-numempleado').addClass('hidden');
                                }
                            }
                        }
                    },
                    puesto: {
                        required:true,
                        minlength: 4,
                        field_validation:true
                    },
                    correo_adicional: {
                        required: true,
                        email_verification: true,
                        remote: {
                            url: "../ajax/validacion/expedientes/checkeditemail.php",
                            type: "POST",
                            data: {
                                "editarid": <?php echo $Editarid; ?>
                            },
                            beforeSend: function () {
                                $('#loader-correo').removeClass('hidden');
                                $('#correct-correo').addClass('hidden');
                            },
                            complete: function(data){
                                if(data.responseText == "true") {
                                    $('#loader-correo').delay(3000).queue(function(next){ $(this).addClass('hidden');    next();  });
                                    $('#correct-correo').delay(3000).queue(function(next){ $(this).removeClass('hidden');    next();  });
                                }else{
                                    $('#loader-correo').addClass('hidden');
                                    $('#correct-correo').addClass('hidden');
                                }
                            }
                        }
                    },
                    situacion: {
                        required: true
                    },
                    estatus_empleado: {
                        required: true
                    },
                    fecha_estatus:{
                        required: true
                    },
                    calle: {
                        location_validation:true
                    },
                    ninterior: {
                        digits:true
                    },
                    nexterior: {
                        digits:true
                    },
                    colonia: {
                        location_validation:true
                    },
                    codigo: {
                        digits:true
                    },
                    teldom: {
                        digits:true
                    },
                    telmov: {
                        required:true,
                        digits:true
                    },
                    marcacion:{
                        required: true,
                        digits:true
                    },
                    serie:{
                        required: true,
                        alphanumeric: true
                    },
                    sim:{
                        required: true,
                        digits: true
                    },
                    numred:{
                        required: true,
                        digits:true
                    },
                    modelotel:{
                        required: true,
                        model_validation: true
                    },
                    marcatel:{
                        required: true,
                        field_validation: true
                    },
                    imei:{
                        required: true,
                        digits: true
                    },
                    marca_laptop:{
                        required: true,
                        field_validation: true
                    },
                    modelo_laptop:{
                        required: true,
                        model_validation: true
                    },
                    serie_laptop:{
                        required: true,
                        alphanumeric: true
                    },
                    monto_mensual:{
                        required: true,
                        number: true
                    },
                    fechanac:{
                        maxDate: true
                    },
                    salario_contrato:{
                        number:true
                    },
                    salario_fechaalta:{
                        number: true
                    },
                    observaciones:{
                        field_validation:true
                    },
                    curp:{
                        alphanumeric: true
                    },
                    nss:{
                        digits: true
                    },
                    rfc:{
                        alphanumeric: true
                    },
                    reflab:{
                        digits:true
                    },
                    cantidadpolo:{
			            digits: true
		            },
		            tallapolo:{
			            field_validation: true
		            },
		            emergencianom:{
			            names_validation: true
		            },
		            emergencianom2:{
			            names_validation: true
		            },
		            emergenciaparentesco:{
			            field_validation: true
		            },
		            emergenciaparentesco2:{
			            field_validation: true
		            },
		            emergenciatel:{
			            digits: true
		            },
		            emergenciatel2:{
			            digits: true
		            },
		            capacitacion:{
			            field_validation: true
		            },
		            antidoping:{
			            field_validation: true
		            },
		            vacante:{
			            field_validation: true
		            },
		            nomfam:{
			            required: true,
			            names_validation: true
	                },
                    refban:{
                        digits:true
                    },
                    banco_personal:{
				        field_validation:true
			        },
			        cuenta_personal:{
				        digits:true,
                        minlength: 10,
	                    maxlength: 10
			        },
			        clabe_personal:{
				        digits:true,
                        minlength: 18,
	                    maxlength: 18
			        },
                    plastico_personal:{
                        digits: true,
                        minlength: 16,
	                    maxlength: 16
                    },
			        banco_nomina:{
				        field_validation:true
			        },
			        cuenta_nomina:{
				        digits:true,
                        minlength: 10,
	                    maxlength: 10
			        },
			        clabe_nomina:{
				        digits:true,
                        minlength: 18,
	                    maxlength: 18
			        },
			        plastico:{
				        digits:true,
                        minlength: 16,
	                    maxlength: 16
			        }
                },
                messages: {
                    user:{
                        required: 'Este campo es requerido'
                    },
                    numempleado: {
                        required:function () {$('#loader-numempleado').addClass('hidden'); $('#correct-numempleado').addClass('hidden'); $("#numempleado").removeData("previousValue"); return "Este campo es requerido"; },
                        num_empleado:function () {$('#loader-numempleado').addClass('hidden'); $('#correct-numempleado').addClass('hidden'); $("#numempleado").removeData("previousValue"); return "Número de empleado inválido"; },
                        remote:function () {$('#loader-numempleado').addClass('hidden'); $('#correct-numempleado').addClass('hidden'); $("#numempleado").removeData("previousValue"); return "Número de empleado repetido"; }
                    },
                    puesto: {
                        required:'Este campo es requerido',
                        minlength: 'El puesto debe de contener 4 caracteres como mínimo',
                        field_validation:'Solo se permiten carácteres alfabéticos y espacios'
                    },
                    correo_adicional: {
                        required:function () {$('#loader-correo').addClass('hidden'); $('#correct-correo').addClass('hidden'); $("#correo_adicional").removeData("previousValue"); return "Este campo es requerido"; },
                        email_verification:function () {$('#loader-correo').addClass('hidden'); $('#correct-correo').addClass('hidden'); $("#correo_adicional").removeData("previousValue"); return "Asegúrese que el texto ingresado este en formato de email"; }
                    },
                    situacion: {
                        required: "Este campo es requerido"
                    },
                    estatus_empleado: {
                        required: "Este campo es requerido"
                    },
                    fecha_estatus:{
                        required: "Este campo es requerido"
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
                        digits: 'Solo se permiten números'
                    },
                    telmov: {
                        required: 'Este campo es requerido',
                        digits: 'Solo se permiten números'
                    },
                    marcacion:{
                        required: 'Este campo es requerido',
                        digits: 'Solo se permiten números'
                    },
                    serie:{
                        required: 'Este campo es requerido',
                        alphanumeric: 'Solo se permiten carácteres alfanúmericos'
                    },
                    sim:{
                        required: "Este campo es requerido",
                        digits: "Solo se permiten números"
                    },
                    numred:{
                        required: 'Este campo es requerido',
                        digits: 'Solo se permiten números'
                    },
                    modelotel:{
                        required: 'Este campo es requerido',
                        model_validation: 'Solo se permiten carácteres alfanúmericos, guiones intermedios y espacios'
                    },
                    marcatel:{
                        required: 'Este campo es requerido',
                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                    },
                    imei:{
                        required: 'Este campo es requerido',
                        digits: 'Solo se permiten números'
                    },
                    marca_laptop:{
                        required: 'Este campo es requerido',
                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                    },
                    modelo_laptop:{
                        required: 'Este campo es requerido',
                        model_validation: 'Solo se permiten carácteres alfanúmericos, guiones intermedios y espacios'
                    },
                    serie_laptop:{
                        required: 'Este campo es requerido',
                        alphanumeric: 'Solo se permiten carácteres alfanúmericos'
                    },
                    monto_mensual:{
                        required: "Este campo es requerido",
                        number: "Solo se permiten números y decimales"
                    },
                    fechanac:{
                        maxDate: 'No se permiten las fechas posteriores al día de hoy'
                    },
                    salario_contrato:{
                        number: 'Solo se permiten números y decimales'
                    },
                    salario_fechaalta:{
                        number: 'Solo se permiten números y decimales'
                    },
                    observaciones:{
                        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
                    },
                    curp: {
                        alphanumeric: 'Solo se permiten carácteres alfanúmericos'
                    },
                    nss:{
                        digits: 'Solo se permiten números'
                    },
                    rfc:{
                        alphanumeric: 'Solo se permiten carácteres alfanúmericos'
                    },
                    reflab:{
                        digits: 'Solo se permiten números'
                    },
                    cantidadpolo:{
			            digits: 'Solo se permiten números'
		            },
		            tallapolo:{
			            field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
		            },
		            emergencianom:{
			            names_validation: 'Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios'
		            },
		            emergencianom2:{
			            names_validation: 'Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios'
		            },
		            emergenciaparentesco:{
			            field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
		            },
		            emergenciaparentesco2:{
			            field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
		            },
		            emergenciatel:{
			            digits: 'Solo se permiten números'
		            },
		            emergenciatel2:{
			            digits: 'Solo se permiten números'
		            },
		            capacitacion:{
			            field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
		            },
		            antidoping:{
			            field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
		            },
		            vacante:{
			            field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
		            },
		            nomfam:{
			            required: 'Este campo es requerido',
			            names_validation: 'Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios'
		            },
                    refban:{
                        digits: 'Solo se permiten números'
                    },
                    banco_personal:{
				        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
			        },
			        cuenta_personal:{
				        digits: 'Solo se permiten números',
                        minlength: 'No puede ser menor a 10 dígitos',
	                    maxlength: 'No puede ser mayor a 10 dígitos'
			        },
			        clabe_personal:{
				        digits: 'Solo se permiten números',
                        minlength: 'No puede ser menor a 18 dígitos',
	                    maxlength: 'No puede ser mayor a 18 dígitos'
			        },
                    plastico_personal:{
                        digits: 'Solo se permiten números',
                        minlength: 'No puede ser menor a 16 dígitos',
	                    maxlength: 'No puede ser mayor a 16 dígitos'
                    },
			        banco_nomina:{
				        field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
			        },
			        cuenta_nomina:{
				        digits: 'Solo se permiten números',
                        minlength: 'No puede ser menor a 10 dígitos',
	                    maxlength: 'No puede ser mayor a 10 dígitos'
			        },
			        clabe_nomina:{
				        digits: 'Solo se permiten números',
                        minlength: 'No puede ser menor a 18 dígitos',
	                    maxlength: 'No puede ser mayor a 18 dígitos'
			        },
			        plastico:{
				        digits: 'Solo se permiten números',
                        minlength: 'No puede ser menor a 16 dígitos',
	                    maxlength: 'No puede ser mayor a 16 dígitos'
			        }
                },
                submitHandler: function(form) {
                    $('#submit-button').html(
		                '<button disabled type="submit" id="finish" name="finish" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700">'+
			                '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
			                '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
			                '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
			                '</svg>'+
			                'Cargando...'+
		                '</button>');
	                $('#error-container').html("");
	                check_user_logged().then((response) => {
		                if(response == "true"){
			                SubmitChanges();
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

        //MÉTODO PARA QUITAR EL ERROR DE JQUERY VALIDATION EN EL SELECT2
        $('#user').on("change", function (e) {
            $(this).valid()
        });

        //VALIDACIÓN PARA EL NÚMERO DE EMPLEADO CUANDO CARGUE LA PÁGINA
        if (!($('#numempleado').val().length === 0)) {
            $("#numempleado").valid();
        }

        //CORREO ELECTRÓNICO Y DEPARTAMENTO AL CARGAR LA PÁGINA
        if($('#user').val() != ""){ 
            var fd =new FormData();
            var id = $('#user').val();
            fd.append('id', id);
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
        }

        //SIMULAR CLICK EN CORREO ADICIONAL CUANDO ES NO Y CUANDO HAY VALOR ACTIVAR EL AJAX
        <?php if($edit->eposee_correo == 'no'){ ?>
            $('input[name="posee_correo"][value="no"]').trigger('click');
        <?php }else if($edit->eposee_correo == 'si'){ ?>
            $('#correo_adicional').valid();
        <?php } ?>

        //CARGA DE ESTATUS
        if ($('#situacion').val() == "ALTA") {
            $('#estatus_empleado').html(
                "<option value=\"NUEVO INGRESO\" <?php if($edit -> eestatus_del_empleado == "NUEVO INGRESO"){ echo "selected";} ?>>Nuevo ingreso</option>"+
                "<option value=\"REINGRESO\" <?php if($edit -> eestatus_del_empleado == "REINGRESO"){ echo "selected";} ?>>Reingreso</option>");
        }else if ($('#situacion').val() == "BAJA"){
            $('#estatus_empleado').html(
                "<option value=\"FALLECIMIENTO\" <?php if($edit -> eestatus_del_empleado == "FALLECIMIENTO"){ echo "selected";} ?>>Fallecimiento</option>"+
                "<option value=\"ABANDONO DE TRABAJO\" <?php if($edit -> eestatus_del_empleado == "ABANDONO DE TRABAJO"){ echo "selected";} ?>>Abandono de trabajo</option>"+
                "<option value=\"RENUNCIA VOLUNTARIA\" <?php if($edit -> eestatus_del_empleado == "RENUNCIA VOLUNTARIA"){ echo "selected";} ?>>Renuncia voluntaria</option>"+
                "<option value=\"LIQUIDACION\" <?php if($edit -> eestatus_del_empleado == "LIQUIDACION"){ echo "selected";} ?>>Liquidación</option>");
        }else if ($('#situacion').val() == "DESTAJO"){
            $('#estatus_empleado').html(
                "<option value=\"SIN NOMINA\" <?php if($edit -> eestatus_del_empleado == "SIN NOMINA"){ echo "selected";} ?>>Sin nómina</option>");
        }

        //JQUERY VALIDATION ESTATUS
        <?php if($edit -> eestatus_del_empleado == "ABANDONO DE TRABAJO" || $edit -> eestatus_del_empleado == "RENUNCIA VOLUNTARIA" || $edit -> eestatus_del_empleado == "LIQUIDACION"){ ?>
            $("#estatus_motivo").rules("add", {
                required: true,
                field_validation: true,
                messages: {
                    required: "Este campo es requerido",
                    field_validation: "Solo se permiten carácteres alfabéticos y espacios"
                }
            });
        <?php } ?>

        //MUNICIPIOS
        if($('#estado').val() != ""){
            var state = $('#estado').val();
        
            var data = {
                id:state,
                idExpediente: <?php echo ($Editarid); ?>
            };
        
            $.ajax({
            url: '../ajax/expedientes/municipios.php',
            type:'POST',
            data: data,
            dataType: 'html',
            success: function(data){
                $('#imunicipio').html(data);
            },
            error: function (data) {
            $("#ajax-error").text('Fail to send request');
            }
            });
        }

        //CARGA DE TELÉFONO MÓVIL PROPIO
        <?php if($edit->eposee_telmov == 'no'){ ?>
            $('input[name="tel_movil"][value="no"]').trigger('click');
        <?php } ?>

        //TELÉFONO ASIGNADO POR LA EMPRESA
        <?php if($edit->eposee_telempresa == 'no'){ ?>
            $('input[name="tel_movil_empresa"][value="no"]').trigger('click');
        <?php } ?>

        //LAPTOP ASIGNADO POR LA EMPRESA
        <?php if($edit->eposee_laptop == 'no'){ ?>
            $('input[name="laptop_empresa"][value="no"]').trigger('click');
        <?php } ?>

        //LAPTOP ASIGNADO POR LA EMPRESA
        <?php if($edit->eposee_retencion == 'no'){ ?>
            $('input[name="retencion"][value="no"]').trigger('click');
        <?php } ?>

        //IDENTIFICACIÓN
        <?php if($edit->etipo_identificacion == 'INE'){ ?>
            $('#identificacion').find('option:nth-child(2)').prop('selected',true);
            $("#numeroidentificacion").rules("add", {
                required: true,
                alphanumeric: true,
                messages: {
                    required: "Este campo es requerido",
                    alphanumeric: "Solo se permiten carácteres alfanúmericos"
                }
            }); 
        <?php }else if($edit->etipo_identificacion == 'PASAPORTE'){ ?>
            $('#identificacion').find('option:nth-child(3)').prop('selected',true);
            $("#numeroidentificacion").rules("add", {
                required: true,
                alphanumeric: true,
                messages: {
                    required: "Este campo es requerido",
                    alphanumeric: "Solo se permiten carácteres alfanúmericos"
                }
            });
        <?php }else if($edit->etipo_identificacion == 'CEDULA'){ ?>
            $('#identificacion').find('option:nth-child(4)').prop('selected',true);
            $("#numeroidentificacion").rules("add", {
                required: true,
                alphanumeric: true,
                messages: {
                    required: "Este campo es requerido",
                    alphanumeric: "Solo se permiten carácteres alfanúmericos"
                }
            });
        <?php } ?>

        //CARGA DE REFERENCIAS LABORALES
        if ($('#reflab').val() != "") {
            var refnumber = document.getElementById("reflab").value;
            var refcontainer = document.getElementById("referencias");
			var childrenCount = refcontainer.childElementCount;
			var contador = childrenCount + 1;
            var refjson = '<?php echo $reflaborales_json; ?>';
            const refarr = JSON.parse(refjson);
            var value = 0;
            for (a = 0; a < refnumber; a++) {
                var divcharge = document.createElement("div");
				divcharge.classList.add('grid', 'grid-cols-1', 'lg:grid-cols-3', 'gap-5', 'md:gap-8', 'mt-5', 'mx-7', 'items-start');
				refcontainer.appendChild(divcharge);
				var divcolumn = document.createElement("div");
				divcolumn.classList.add('grid', 'grid-cols-1');
				divcharge.appendChild(divcolumn);
				var divcolumn2 = document.createElement("div");
				divcolumn2.classList.add('grid', 'grid-cols-1');
				divcharge.appendChild(divcolumn2);
				var divcolumn3 = document.createElement("div");
				divcolumn3.classList.add('grid', 'grid-cols-1');
				divcharge.appendChild(divcolumn3);
				divcolumn.appendChild(document.createTextNode("Nombre completo" + (contador) + " *"));
				var divgrupo = document.createElement("div");
				divgrupo.classList.add('group', 'flex');
				divcolumn.appendChild(divgrupo);
				var icon = document.createElement("div");
				icon.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
				icon.innerHTML = ' <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account</title><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>';
				divgrupo.appendChild(icon);
				var inputtext = document.createElement("input");
				inputtext.type = "text";
				inputtext.name = "infa_rnombre" + childrenCount;
				inputtext.value = refarr[value]["nombre"];
				inputtext.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
				inputtext.setAttribute("data-rule-required", "true");
				inputtext.setAttribute("data-msg-required", "Este campo es requerido");
				inputtext.setAttribute("data-rule-names_validation", "true");
				inputtext.setAttribute("data-msg-names_validation", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios");
				inputtext.setAttribute("placeholder", "Nombre " +(contador)); 
				divgrupo.appendChild(inputtext);
				divcolumn2.appendChild(document.createTextNode("Relación " + (contador) + " *"));
				var divgrupo2 = document.createElement("div");
				divgrupo2.classList.add('group', 'flex');
				divcolumn2.appendChild(divgrupo2);
				var icon2 = document.createElement("div");
				icon2.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
				icon2.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account-group</title><path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg>';
				divgrupo2.appendChild(icon2);
				var inputtext2 = document.createElement("input");
				inputtext2.type = "text";
				inputtext2.name = "infa_rrelacion" + childrenCount;
				inputtext2.value = refarr[value]["relacion"];
				inputtext2.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
				inputtext2.setAttribute("data-rule-required", "true");
				inputtext2.setAttribute("data-msg-required", "Este campo es requerido");
				inputtext2.setAttribute("data-rule-field_validation", "true");
				inputtext2.setAttribute("data-msg-field_validation", "Solo se permiten carácteres alfabéticos y espacios");
				inputtext2.setAttribute("placeholder", "Relación " +(contador));
				divgrupo2.appendChild(inputtext2);
				divcolumn3.appendChild(document.createTextNode("Teléfono " + (contador) + " *"));
				var divgrupo3 = document.createElement("div");
				divgrupo3.classList.add('group', 'flex');
				divcolumn3.appendChild(divgrupo3);
				var icon3 = document.createElement("div");
				icon3.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
				icon3.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>cellphone</title><path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" /></svg>';
				divgrupo3.appendChild(icon3);
				var inputtext3 = document.createElement("input");
				inputtext3.type = "text";
				inputtext3.name = "infa_rtelefono" + childrenCount;
				inputtext3.value = refarr[value]["telefono"];
				inputtext3.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
				inputtext3.setAttribute("data-rule-required", "true");
				inputtext3.setAttribute("data-msg-required", "Este campo es requerido");
				inputtext3.setAttribute("data-rule-digits", "true");
				inputtext3.setAttribute("data-msg-digits", "Solo se permiten números");
				inputtext3.setAttribute("placeholder", "Teléfono " +(contador));
				divgrupo3.appendChild(inputtext3);
				contador++;
				childrenCount++;
                value++;
            }
        }

        //NOMBRE COMPLETO DEL FAMILIAR
        <?php if($edit->efam_dentro_empresa == 'no'){ ?>
            $('input[name="empresa"][value="no"]').trigger('click');
        <?php } ?>

        //REFERENCIAS BANCARIAS
        if ($('#refban').val() != "") {
            var refbannumber = document.getElementById("refban").value;
            var refbancontainer = document.getElementById("ref");
			var childrenCount2 = refbancontainer.childElementCount;
			var contador2 = childrenCount2 + 1;
            var refbanjson = '<?php echo $refban_json; ?>';
            const refbanarr = JSON.parse(refbanjson);
            var value2 = 0;
            for (b = 0; b < refbannumber; b++) {
				var divrefbancontainer = document.createElement("div");
				divrefbancontainer.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'gap-5', 'md:gap-8', 'mt-5', 'mx-7', 'items-start');
				refbancontainer.appendChild(divrefbancontainer);
				var refbandiv = document.createElement("div");
				refbandiv.classList.add('grid', 'grid-cols-1');
				divrefbancontainer.appendChild(refbandiv);
				var refbandiv2 = document.createElement("div");
				refbandiv2.classList.add('grid', 'grid-cols-1');
				divrefbancontainer.appendChild(refbandiv2);
				var refbandiv3 = document.createElement("div");
				refbandiv3.classList.add('grid', 'grid-cols-1');
				divrefbancontainer.appendChild(refbandiv3);
				var refbandiv4 = document.createElement("div");
				refbandiv4.classList.add('grid', 'grid-cols-1');
				divrefbancontainer.appendChild(refbandiv4);
				var refbandiv5 = document.createElement("div");
				refbandiv5.classList.add('grid', 'grid-cols-1', 'col-span-1', 'md:col-span-2');
				divrefbancontainer.appendChild(refbandiv5);
				refbandiv.appendChild(document.createTextNode("Nombre completo" + (contador2) + " *"));
				var refbangrupo = document.createElement("div");
				refbangrupo.classList.add('group', 'flex');
				refbandiv.appendChild(refbangrupo);
				var refbanicon = document.createElement("div");
				refbanicon.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
				refbanicon.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account</title><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>';
				refbangrupo.appendChild(refbanicon);
				var refbaninput = document.createElement("input");
				refbaninput.type = "text";
				refbaninput.name = "infb_rnombre" + childrenCount2;
				refbaninput.value = refbanarr[value2]["nombre"];
				refbaninput.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
				refbaninput.setAttribute("data-rule-required", "true"); 
				refbaninput.setAttribute("data-msg-required", "Este campo es requerido");
				refbaninput.setAttribute("data-rule-names_validation", "true"); 
				refbaninput.setAttribute("data-msg-names_validation", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios");  
				refbaninput.setAttribute("placeholder", "Nombre " +(contador2)); 
				refbangrupo.appendChild(refbaninput);
				refbandiv2.appendChild(document.createTextNode("Relación " + (contador2) + " *"));
				var refbangrupo2 = document.createElement("div");
				refbangrupo2.classList.add('group', 'flex');
				refbandiv2.appendChild(refbangrupo2);
				var refbanicon2 = document.createElement("div");
				refbanicon2.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
				refbanicon2.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account-group</title><path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg>';
				refbangrupo2.appendChild(refbanicon2);
				var refbaninput2 = document.createElement("input");
				refbaninput2.type = "text";
				refbaninput2.name = "infb_rrelacion" + childrenCount2;
				refbaninput2.value = refbanarr[value2]["relacion"];
				refbaninput2.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
				refbaninput2.setAttribute("data-rule-required", "true");
				refbaninput2.setAttribute("data-msg-required", "Este campo es requerido");
				refbaninput2.setAttribute("data-rule-field_validation", "true");
				refbaninput2.setAttribute("data-msg-field_validation", "Solo se permiten carácteres alfabéticos y espacios");
				refbaninput2.setAttribute("placeholder", "Relación " +(contador2)); 
				refbangrupo2.appendChild(refbaninput2);
				refbandiv3.appendChild(document.createTextNode("RFC " + (contador2) + " *"));
				var refbangrupo3 = document.createElement("div");
				refbangrupo3.classList.add('group', 'flex');
				refbandiv3.appendChild(refbangrupo3);
				var refbanicon3 = document.createElement("div");
				refbanicon3.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
				refbanicon3.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>file-document-edit-outline</title><path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z" /></svg>';
				refbangrupo3.appendChild(refbanicon3);
				var refbaninput3 = document.createElement("input");
				refbaninput3.type = "text";
				refbaninput3.name = "infb_rrfc" + childrenCount2;
				refbaninput3.value = refbanarr[value2]["rfc"];
				refbaninput3.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
				refbaninput3.setAttribute("data-rule-required", "true");
				refbaninput3.setAttribute("data-msg-required", "Este campo es requerido");
				refbaninput3.setAttribute("data-rule-alphanumeric", "true");
				refbaninput3.setAttribute("data-msg-alphanumeric", "Solo se permiten carácteres alfanúmericos");
				refbaninput3.setAttribute("placeholder", "RFC " +(contador2)); 
				refbangrupo3.appendChild(refbaninput3);
				refbandiv4.appendChild(document.createTextNode("CURP " + (contador2) + " *"));
				var refbangrupo4 = document.createElement("div");
				refbangrupo4.classList.add('group', 'flex');
				refbandiv4.appendChild(refbangrupo4);
				var refbanicon4 = document.createElement("div");
				refbanicon4.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
				refbanicon4.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>badge-account</title><path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z" /></svg>';
				refbangrupo4.appendChild(refbanicon4);
				var refbaninput4 = document.createElement("input");
				refbaninput4.type = "text";
				refbaninput4.name = "infb_rcurp" + childrenCount2;
				refbaninput4.value = refbanarr[value2]["curp"];
				refbaninput4.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
				refbaninput4.setAttribute("data-rule-required", "true");
				refbaninput4.setAttribute("data-msg-required", "Este campo es requerido");
				refbaninput4.setAttribute("data-rule-alphanumeric", "true");
				refbaninput4.setAttribute("data-msg-alphanumeric", "Solo se permiten carácteres alfanúmericos");
				refbaninput4.setAttribute("placeholder", "CURP " +(contador2));  
				refbangrupo4.appendChild(refbaninput4);
				refbandiv5.appendChild(document.createTextNode("Porcentaje de derecho " + (contador2) + " *"));
				var refbangrupo5 = document.createElement("div");
				refbangrupo5.classList.add('group', 'flex');
				refbandiv5.appendChild(refbangrupo5);  
				var refbanicon5 = document.createElement("div");
				refbanicon5.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
				refbanicon5.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>percent-box</title><path fill="currentColor" d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.1 3 19 3M8.83 7.05C9.81 7.05 10.6 7.84 10.6 8.83C10.6 9.81 9.81 10.6 8.83 10.6C7.84 10.6 7.05 9.81 7.05 8.83C7.05 7.84 7.84 7.05 8.83 7.05M15.22 17C14.24 17 13.45 16.2 13.45 15.22C13.45 14.24 14.24 13.45 15.22 13.45C16.2 13.45 17 14.24 17 15.22C17 16.2 16.2 17 15.22 17M8.5 17.03L7 15.53L15.53 7L17.03 8.5L8.5 17.03Z" /></svg>';
				refbangrupo5.appendChild(refbanicon5);
				var refbaninput5 = document.createElement("input");
				refbaninput5.type = "text";
				refbaninput5.name = "infb_rporcentaje" + childrenCount2;
				refbaninput5.value = refbanarr[value2]["prcnt_derecho"];
				refbaninput5.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
				refbaninput5.setAttribute("data-rule-required", "true");
				refbaninput5.setAttribute("data-msg-required", "Este campo es requerido");
				refbaninput5.setAttribute("data-rule-digits", "true");
				refbaninput5.setAttribute("data-msg-digits", "Solo se permiten números");
				refbaninput5.setAttribute("placeholder", "Porcentaje de derecho " +(contador2)); 
				refbangrupo5.appendChild(refbaninput5);
                value2++;
				contador2++;
				childrenCount2++;
            }
        }

	});

	//Aquí empiezan las referencias laborales
	function AgregarReferencias(){
        var number = document.getElementById("reflab").value;
        number = number.replace(/[^0-9]/g, function replacing() {
            document.getElementById("reflab").value = 0;
            return "0";
        });
        var container = document.getElementById("referencias");
        var childrenCount = container.childElementCount;
        var count = childrenCount + 1;
        var result = 0;
        if (number == 0) {
            childrenCount = 0;
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }
        } else {
            if (number < childrenCount) {
                result = childrenCount - number;
                for (j = 0; j < result; j++) {
                    container.removeChild(container.lastChild);
                }
            } else if (number > childrenCount) {
                result = number - childrenCount;
                for (i=0;i<result;i++){
                    var divrow = document.createElement("div");
                    divrow.classList.add('grid', 'grid-cols-1', 'lg:grid-cols-3', 'gap-5', 'md:gap-8', 'mt-5', 'mx-7', 'items-start');
                    container.appendChild(divrow);
                    var div = document.createElement("div");
                    div.classList.add('grid', 'grid-cols-1');
                    divrow.appendChild(div);
                    var div2 = document.createElement("div");
                    div2.classList.add('grid', 'grid-cols-1');
                    divrow.appendChild(div2);
                    var div3 = document.createElement("div");
                    div3.classList.add('grid', 'grid-cols-1');
                    divrow.appendChild(div3);
                    div.appendChild(document.createTextNode("Nombre completo" + (count) + " *"));
                    var grupo = document.createElement("div");
                    grupo.classList.add('group', 'flex');
                    div.appendChild(grupo);
                    var div4 = document.createElement("div");
                    div4.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
                    div4.innerHTML = ' <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account</title><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>';
                    grupo.appendChild(div4);
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = "infa_rnombre" + childrenCount;
                    input.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
                    input.setAttribute("data-rule-required", "true");
                    input.setAttribute("data-msg-required", "Este campo es requerido");
                    input.setAttribute("data-rule-names_validation", "true");
                    input.setAttribute("data-msg-names_validation", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios");
                    input.setAttribute("placeholder", "Nombre " +(count)); 
                    grupo.appendChild(input);
                    div2.appendChild(document.createTextNode("Relación " + (count) + " *"));
                    var grupo2 = document.createElement("div");
                    grupo2.classList.add('group', 'flex');
                    div2.appendChild(grupo2);
                    var div5 = document.createElement("div");
                    div5.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
                    div5.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account-group</title><path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg>';
                    grupo2.appendChild(div5);
                    var input2 = document.createElement("input");
                    input2.type = "text";
                    input2.name = "infa_rrelacion" + childrenCount;
                    input2.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
                    input2.setAttribute("data-rule-required", "true");
                    input2.setAttribute("data-msg-required", "Este campo es requerido");
                    input2.setAttribute("data-rule-field_validation", "true");
                    input2.setAttribute("data-msg-field_validation", "Solo se permiten carácteres alfabéticos y espacios");
                    input2.setAttribute("placeholder", "Relación " +(count));
                    grupo2.appendChild(input2);
                    div3.appendChild(document.createTextNode("Teléfono " + (count) + " *"));
                    var grupo3 = document.createElement("div");
                    grupo3.classList.add('group', 'flex');
                    div3.appendChild(grupo3);
                    var div6 = document.createElement("div");
                    div6.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
                    div6.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>cellphone</title><path fill="currentColor" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z" /></svg>';
                    grupo3.appendChild(div6);
                    var input3 = document.createElement("input");
                    input3.type = "text";
                    input3.name = "infa_rtelefono" + childrenCount;
                    input3.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
                    input3.setAttribute("data-rule-required", "true");
                    input3.setAttribute("data-msg-required", "Este campo es requerido");
                    input3.setAttribute("data-rule-digits", "true");
                    input3.setAttribute("data-msg-digits", "Solo se permiten números");
                    input3.setAttribute("placeholder", "Teléfono " +(count));
                    grupo3.appendChild(input3);
                    count++;
                    childrenCount++;
                }
            }
        }
     }
	 //Terminan las referencias laborales

     //Aquí empiezan las referencias bancarias
     function AgregarBanco(){
        var number = document.getElementById("refban").value;
        number = number.replace(/[^0-9]/g, function replacing() {
            document.getElementById("refban").value = 0;
            return "0";
        });
        var container = document.getElementById("ref");
        var childrenCount = container.childElementCount;
        var count = childrenCount + 1;
        var result = 0;
        if (number == 0) {
            childrenCount = 0;
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }
        } else {
            if (number < childrenCount) {
                result = childrenCount - number;
                for (j = 0; j < result; j++) {
                    container.removeChild(container.lastChild);
                }
            } else if (number > childrenCount) {
                result = number - childrenCount;
                for (i=0;i<result;i++){
                    var divcontainer = document.createElement("div");
                    divcontainer.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'gap-5', 'md:gap-8', 'mt-5', 'mx-7', 'items-start');
                    container.appendChild(divcontainer);
                    var div = document.createElement("div");
                    div.classList.add('grid', 'grid-cols-1');
                    divcontainer.appendChild(div);
                    var div2 = document.createElement("div");
                    div2.classList.add('grid', 'grid-cols-1');
                    divcontainer.appendChild(div2);
                    var div3 = document.createElement("div");
                    div3.classList.add('grid', 'grid-cols-1');
                    divcontainer.appendChild(div3);
                    var div7 = document.createElement("div");
                    div7.classList.add('grid', 'grid-cols-1');
                    divcontainer.appendChild(div7);
                    var div9 = document.createElement("div");
                    div9.classList.add('grid', 'grid-cols-1', 'col-span-1', 'md:col-span-2');
                    divcontainer.appendChild(div9);
                    div.appendChild(document.createTextNode("Nombre completo" + (count) + " *"));
                    var grupo = document.createElement("div");
                    grupo.classList.add('group', 'flex');
                    div.appendChild(grupo);
                    var div4 = document.createElement("div");
                    div4.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
                    div4.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account</title><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>';
                    grupo.appendChild(div4);
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = "infb_rnombre" + childrenCount;
                    input.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
                    input.setAttribute("data-rule-required", "true"); 
                    input.setAttribute("data-msg-required", "Este campo es requerido");
                    input.setAttribute("data-rule-names_validation", "true"); 
                    input.setAttribute("data-msg-names_validation", "Solo se permiten carácteres alfabéticos, guiones intermedios, apóstrofes y espacios");  
                    input.setAttribute("placeholder", "Nombre " +(count)); 
                    grupo.appendChild(input);
                    div2.appendChild(document.createTextNode("Relación " + (count) + " *"));
                    var grupo2 = document.createElement("div");
                    grupo2.classList.add('group', 'flex');
                    div2.appendChild(grupo2);
                    var div5 = document.createElement("div");
                    div5.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
                    div5.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>account-group</title><path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg>';
                    grupo2.appendChild(div5);
                    var input2 = document.createElement("input");
                    input2.type = "text";
                    input2.name = "infb_rrelacion" + childrenCount;
                    input2.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
                    input2.setAttribute("data-rule-required", "true");
                    input2.setAttribute("data-msg-required", "Este campo es requerido");
                    input2.setAttribute("data-rule-field_validation", "true");
			        input2.setAttribute("data-msg-field_validation", "Solo se permiten carácteres alfabéticos y espacios");
                    input2.setAttribute("placeholder", "Relación " +(count)); 
                    grupo2.appendChild(input2);
                    div3.appendChild(document.createTextNode("RFC " + (count) + " *"));
                    var grupo3 = document.createElement("div");
                    grupo3.classList.add('group', 'flex');
                    div3.appendChild(grupo3);
                    var div6 = document.createElement("div");
                    div6.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
                    div6.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>file-document-edit-outline</title><path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z" /></svg>';
                    grupo3.appendChild(div6);
                    var input3 = document.createElement("input");
                    input3.type = "text";
                    input3.name = "infb_rrfc" + childrenCount;
                    input3.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
                    input3.setAttribute("data-rule-required", "true");
                    input3.setAttribute("data-msg-required", "Este campo es requerido");
                    input3.setAttribute("data-rule-alphanumeric", "true");
                    input3.setAttribute("data-msg-alphanumeric", "Solo se permiten carácteres alfanúmericos");
                    input3.setAttribute("placeholder", "RFC " +(count)); 
                    grupo3.appendChild(input3);
                    div7.appendChild(document.createTextNode("CURP " + (count) + " *"));
                    var grupo4 = document.createElement("div");
                    grupo4.classList.add('group', 'flex');
                    div7.appendChild(grupo4);
                    var div8 = document.createElement("div");
                    div8.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
                    div8.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>badge-account</title><path fill="currentColor" d="M17,3H14V6H10V3H7A2,2 0 0,0 5,5V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V5A2,2 0 0,0 17,3M12,8A2,2 0 0,1 14,10A2,2 0 0,1 12,12A2,2 0 0,1 10,10A2,2 0 0,1 12,8M16,16H8V15C8,13.67 10.67,13 12,13C13.33,13 16,13.67 16,15V16M13,5H11V1H13V5M16,19H8V18H16V19M12,21H8V20H12V21Z" /></svg>';
                    grupo4.appendChild(div8);
                    var input4 = document.createElement("input");
                    input4.type = "text";
                    input4.name = "infb_rcurp" + childrenCount;
                    input4.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
                    input4.setAttribute("data-rule-required", "true");
                    input4.setAttribute("data-msg-required", "Este campo es requerido");
                    input4.setAttribute("data-rule-alphanumeric", "true");
                    input4.setAttribute("data-msg-alphanumeric", "Solo se permiten carácteres alfanúmericos");
                    input4.setAttribute("placeholder", "CURP " +(count));  
                    grupo4.appendChild(input4);
                    div9.appendChild(document.createTextNode("Porcentaje de derecho " + (count) + " *"));
                    var grupo5 = document.createElement("div");
                    grupo5.classList.add('group', 'flex');
                    div9.appendChild(grupo5);  
                    var div10 = document.createElement("div");
                    div10.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
                    div10.innerHTML = '<svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>percent-box</title><path fill="currentColor" d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H19C20.11 21 21 20.11 21 19V5C21 3.89 20.1 3 19 3M8.83 7.05C9.81 7.05 10.6 7.84 10.6 8.83C10.6 9.81 9.81 10.6 8.83 10.6C7.84 10.6 7.05 9.81 7.05 8.83C7.05 7.84 7.84 7.05 8.83 7.05M15.22 17C14.24 17 13.45 16.2 13.45 15.22C13.45 14.24 14.24 13.45 15.22 13.45C16.2 13.45 17 14.24 17 15.22C17 16.2 16.2 17 15.22 17M8.5 17.03L7 15.53L15.53 7L17.03 8.5L8.5 17.03Z" /></svg>';
                    grupo5.appendChild(div10);
                    var input5 = document.createElement("input");
                    input5.type = "text";
                    input5.name = "infb_rporcentaje" + childrenCount;
                    input5.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'h-11', 'border', 'rounded-md', 'border-[#d1d5db]', 'focus:ring-2', 'focus:ring-indigo-600');
                    input5.setAttribute("data-rule-required", "true");
                    input5.setAttribute("data-msg-required", "Este campo es requerido");
                    input5.setAttribute("data-rule-digits", "true");
                    input5.setAttribute("data-msg-digits", "Solo se permiten números");
                    input5.setAttribute("placeholder", "Porcentaje de derecho " +(count)); 
                    grupo5.appendChild(input5);
                    count++;
                    childrenCount++;     
                }
            }
        }
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

    //Metodo que envía el formulario
    function SubmitChanges(){
        window.addEventListener('beforeunload', unloadHandler);
        var fd = new FormData();
    
        /*Inputs*/
        var id_expediente = <?php echo $Editarid; ?>;
        var select2 = $("#user").val();
        var select2text = $("#user option:selected").text();
        var numempleado = $("#numempleado").val();
        var puesto = $("#puesto").val();
        var estudios = $("#estudios").val();
        var posee_correo = $("input[name=posee_correo]:checked", "#Guardar").val();
        var correo_adicional = $("#correo_adicional").val();
        var situacion = $('#situacion').val();
        var estatus_empleado = $('#estatus_empleado').val();
        var estatus_fecha = $('#fecha_estatus').val();
        var motivo_estatus = $('#estatus_motivo').val();
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
        var numeroreferenciasban = $("#refban").val();
        var banco_personal = $("#banco_personal").val();
        var cuenta_personal = $("#cuenta_personal").val();
        var clabe_personal = $("#clabe_personal").val();
        var plastico_personal = $("#plastico_personal").val();
        var banco_nomina = $("#banco_nomina").val();
        var cuenta_nomina = $("#cuenta_nomina").val();
        var clabe_nomina = $("#clabe_nomina").val();
        var plastico = $("#plastico").val();
        var logged_user = "<?php echo $logged_user; ?>";
        var method = "edit";
        var app = "expediente";
    
        /*Referencias laborales*/
        var nreflab =  $("input[name=reflab]").val();
        var reflab = [];
        for(var i=0; i <nreflab; i++){
            var rnombre = $("input[name=infa_rnombre" +i+ "]").val();
            var rrelacion = $("input[name=infa_rrelacion" +i+ "]").val();
            var rtelefono = $("input[name=infa_rtelefono" +i+ "]").val();
            reflab[i] = {nombre: rnombre, relacion: rrelacion, telefono: rtelefono};
        }
    
        /*Referencias bancarias*/
        var nrefbanc =  $("input[name=refban]").val();
        var refbanc = [];
        for(var i=0; i <nrefbanc; i++){
            var brnombre = $("input[name=infb_rnombre" +i+ "]").val();
            var brrelacion = $("input[name=infb_rrelacion" +i+ "]").val();
            var brrfc = $("input[name=infb_rrfc" +i+ "]").val();
            var brcurp = $("input[name=infb_rcurp" +i+ "]").val();
            var brporcentaje = $("input[name=infb_rporcentaje" +i+ "]").val();
            refbanc[i] = {nombre: brnombre, relacion: brrelacion, rfc: brrfc, curp: brcurp, porcentaje: brporcentaje};
        }
    
        /*File uploads*/
        <?php 
        for($i = 1; $i <= $counttipospapeleria; $i++){
            echo ("
                var papeleria{$i} = $('#infp_papeleria{$i}')[0].files[0];
            ");
        } 
        ?>
    
        /*FD appends*/
    
        /*Inputs*/
        fd.append('id_expediente', id_expediente);
        fd.append('select2', select2);
        fd.append('select2text', select2text);
        fd.append('numempleado', numempleado);
        fd.append('puesto', puesto);
        fd.append('estudios', estudios);
        fd.append('posee_correo', posee_correo);
        fd.append('correo_adicional', correo_adicional);
        fd.append('situacion', situacion);
        fd.append('estatus_empleado', estatus_empleado);
        fd.append('estatus_fecha', estatus_fecha);
        fd.append('motivo_estatus', motivo_estatus);
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
        fd.append('delete_array', delete_switch_array);
        fd.append('logged_user', logged_user);
        fd.append('method', method);
        fd.append('app', app);
        
    
        /*Referencias*/
        fd.append('referencias', JSON.stringify(reflab));
        fd.append('refbanc', JSON.stringify(refbanc));
    
        /*File uploads*/
        <?php 
        for($i = 1; $i <= $counttipospapeleria; $i++){
            echo ("
                fd.append('papeleria{$i}', papeleria{$i});
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
                            title: "Expediente Editado",
                            text: array[1],
                            icon: "success"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='finish' name='finish' type='submit'>Guardar</button>");
                            window.location.href = "expedientes.php";	
                        });
                    }else if (array[0] == "error") {
                        Swal.fire({
                            title: "Error",
                            text: array[1],
                            icon: "error"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='finish' name='finish' type='submit'>Guardar</button>");
                        });
                    }else if (array[0] == "user_deleted") {
                        Swal.fire({
                            title: "Error",
                            text: array[1],
                            icon: "error"
                        }).then(function() {
                            window.removeEventListener('beforeunload', unloadHandler);
                            $('#submit-button').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='finish' name='finish' type='submit'>Guardar</button>");
                            window.location.href = "expedientes.php";
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
        color: red;
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
        background: rgb(129 140 248) !important;
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
</style>