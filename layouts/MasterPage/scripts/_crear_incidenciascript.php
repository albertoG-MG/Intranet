<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>
	var formAnterior;
	//Empieza la configuración del menú
	const menuIncidencias = [{
			id: 'permiso',
			triggerMenu: document.querySelector('#permiso-tab'),
			targetMenu: document.querySelector('#permiso')
		},
		{
			id: 'incapacidad',
			triggerMenu: document.querySelector('#incapacidad-tab'),
			targetMenu: document.querySelector('#incapacidad')
		}
		<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { echo ","; ?>
			{
				id: 'actaA',
				triggerMenu: document.querySelector('#actaA-tab'),
				targetMenu: document.querySelector('#actaA')
			}
		<?php } ?>
		<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { echo ","; ?>
			{
				id: 'cartaC',
				triggerMenu: document.querySelector('#cartaC-tab'),
				targetMenu: document.querySelector('#cartaC')
			}
		<?php } ?>
	];

	menuIncidencias.forEach((menu) => {
		if (menu.triggerMenu.className.includes("menu-active") == true){
			formAnterior = menu.id; 
		}
		menu.triggerMenu.addEventListener('click', () => {
			objective = menu;
			if (objective.triggerMenu.className.includes("menu-active") == false){
				if(objective.id == "permiso"){
					if(formAnterior == "incapacidad"){
						resetFormValidator("#incapacidad-form");
						$('#incapacidad-form').unbind('submit');
					}
					<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
						else if(formAnterior == "actaA"){
							resetFormValidator("#acta-form");
							$('#acta-form').unbind('submit');
						}
					<?php } ?>
					<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
						else if(formAnterior == "cartaC"){
							resetFormValidator("#carta-form");
							$('#carta-form').unbind('submit');
						}
					<?php } ?>
					formPermiso();
					formAnterior = "permiso";
				}else if(objective.id == "incapacidad"){
					if(formAnterior == "permiso"){
						resetFormValidator("#permiso-form");
						$('#permiso-form').unbind('submit');
					}
					<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
						else if(formAnterior == "actaA"){
							resetFormValidator("#acta-form");
							$('#acta-form').unbind('submit');
						}
					<?php } ?>
					<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
						else if(formAnterior == "cartaC"){
							resetFormValidator("#carta-form");
							$('#carta-form').unbind('submit');
						}
					<?php } ?>
					formIncapacidad();
					formAnterior = "incapacidad";
				}
				<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
					else if(objective.id == "actaA"){
						if(formAnterior == "permiso"){
							resetFormValidator("#permiso-form");
							$('#permiso-form').unbind('submit');
						}else if(formAnterior == "incapacidad"){
							resetFormValidator("#incapacidad-form");
							$('#incapacidad-form').unbind('submit');
						}
						<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
							else if(formAnterior == "cartaC"){
								resetFormValidator("#carta-form");
								$('#carta-form').unbind('submit');
							}
						<?php } ?>
						formActa();
						formAnterior = "actaA";
					}
				<?php } ?>
				<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
					else if(objective.id == "cartaC"){
						if(formAnterior == "permiso"){
							resetFormValidator("#permiso-form");
							$('#permiso-form').unbind('submit');
						}else if(formAnterior == "incapacidad"){
							resetFormValidator("#incapacidad-form");
							$('#incapacidad-form').unbind('submit');
						}
						<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
							else if(formAnterior == "actaA"){
								resetFormValidator("#acta-form");
								$('#acta-form').unbind('submit');
							}
						<?php } ?>
						formCarta();
						formAnterior = "cartaC";
					}
				<?php } ?>
			}

			menuIncidencias.forEach((trigger) => {
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

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		$('#caja_empleado').select2({
			theme: ["tailwind"],
			placeholder: '-- Seleccione --',
			dropdownParent: $('#selectempleado'),
			"language": {
				"noResults": function(){
					return "No hay resultados";
				}
			}
		});

    	$('#caja_empleado').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		$('#array_empleado').select2({
			theme: ["tailwind"],
			placeholder: '-- Seleccione --',
			dropdownParent: $('#groupempleado'),
			"language": {
				"noResults": function(){
					return "No hay resultados";
				}
			}
		});

		$('#array_empleado').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		$('.select2-selection--single').addClass("flex focus:outline-none");

		$('.select2-selection__rendered').addClass("flex-1");

		$('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');

		$('.select2-selection__arrow').addClass('rotate-180 mb-1');
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		$("#selectempleado").show();

		$('#caja_empleado').on('select2:open', function (e) {
			const evt = "scroll.select2";
			$(e.target).parents().off(evt);
			$(window).off(evt);
		});
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		$("#groupempleado").show();

		$('#array_empleado').on('select2:open', function (e) {
			const evt = "scroll.select2";
			$(e.target).parents().off(evt);
			$(window).off(evt);
		});
	<?php } ?>

	$(document).ready(function() {

		var img_permiso_r = $("#img_permiso_r").clone();
		var img_permisos_nr = $("#img_permisos_nr").clone();
		var img_incapacidad = $("#img_incapacidad").clone();
		var file_permisos_reglamentarios;
		var file_permisos_no_reglamentarios;
		var file_incapacidades;

		//Permiso
		$('input[name="periodo_pnr_fh"]').daterangepicker({ showDropdowns: true, parentEl: "main", timePicker: true, locale: { format: 'YYYY/MM/DD hh:mm A' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		$('input[name="periodo_pnr_f"]').daterangepicker({ showDropdowns: true, parentEl: "main", locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		$('input[name="periodo_pnd"]').daterangepicker({ showDropdowns: true, parentEl: "main", timePicker: true, locale: { format: 'YYYY/MM/DD hh:mm A' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		$('input[name="fechainicio_pd"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true, locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		//Incapacidad
		$('input[name="periodo_incapacidad"]').daterangepicker({ showDropdowns: true, parentEl: "main", locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
			//Acta Administrativa
			$('input[name="fecha_acta"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true, locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		<?php } ?>
		<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
			/*Carta Compromiso*/
			$('input[name="fecha_carta"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true, locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		<?php } ?>

		formPermiso();

		$('form#permiso-form input[type="text"]').on('keypress', function(e) {
		    return e.which !== 13;
	    });

		$('form#incapacidad-form input[type="text"]').on('keypress', function(e) {
		    return e.which !== 13;
	    });

		<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
			$('form#acta-form input[type="text"]').on('keypress', function(e) {
				return e.which !== 13;
			});
		<?php } ?>

		<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
			$('form#carta-form input[type="text"]').on('keypress', function(e) {
				return e.which !== 13;
			});
		<?php } ?>

		//Permisos Reglamentarios - Delete
		$('#permiso-form').on('click', '#delete_archivo_permiso_r', function() {
			$("#img_permiso_r").replaceWith(img_permiso_r.clone());
			$("#justificante_permiso_r").val("");
			$("#div_actions_archivo_permiso_r").addClass("hidden");
		});

		//Permisos NO Reglamentarios - Delete
		$('#permiso-form').on('click', '#delete_archivo_permiso_nr', function() {
			$("#img_permisos_nr").replaceWith(img_permisos_nr.clone());
			$("#justificante_permiso_nr").val("");
			$("#div_actions_archivo_permiso_nr").addClass("hidden");
		});

		//Incapacidad - Delete
		$('#incapacidad-form').on('click', '#delete_archivo_incapacidad', function() {
			$("#img_incapacidad").replaceWith(img_incapacidad.clone());
			$("#comprobante_incapacidad").val("");
			$("#div_actions_archivo_incapacidad").addClass("hidden");
		});

		//Permisos Reglamentarios - validator ONCLICK
		$('#permiso-form').on('click', '#justificante_permiso_r', function() {
			file_permisos_reglamentarios = $("#justificante_permiso_r").clone();
		});

		//Permisos Reglamentarios - validator ONCHANGE
		$('#permiso-form').on('change', '#justificante_permiso_r', function() {
			if (window.FileReader && window.Blob) {
				var files = $('input#justificante_permiso_r').get(0).files;
				if (files.length > 0) {
					var file = files[0];
					console.log('Archivo cargado: ' + file.name);
					console.log('Blob mime: ' + file.type);
					console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
					console.log('Tamaño en bytes: ' + file.size);

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
							$('#preview_permiso_r').addClass('hidden');
							$('#svg_permiso_r').removeClass('hidden');
							$('#archivo_permiso_r').text("El archivo " +file.name+ " no es un pdf y/o imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
							$("#div_actions_archivo_permiso_r").removeClass("hidden");
						} else {
							console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
							if(file.size > 10485760){
								$('#preview_permiso_r').addClass('hidden');
								$('#svg_permiso_r').removeClass('hidden');
								$('#archivo_permiso_r').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
								$("#div_actions_archivo_permiso_r").removeClass("hidden");
							}else{
								if(file.type == 'application/pdf'){
									$('#pdf_preview_r').removeClass('hidden');
									$('#preview_permiso_r').removeClass('w-10 h-10');
									$('#preview_permiso_r').addClass('hidden');
									$('#svg_permiso_r').addClass('hidden');
									$('#archivo_permiso_r').text(file.name);
									$("#div_actions_archivo_permiso_r").removeClass("hidden");
								}else if(file.type == 'image/png' || file.type == 'image/jpeg'){
									$('#preview_permiso_r').removeClass('hidden');
									$('#preview_permiso_r').addClass('w-10 h-10');
									$('#pdf_preview_r').addClass('hidden');
									$('#svg_permiso_r').addClass('hidden');
									$('#archivo_permiso_r').text(file.name);
									$("#div_actions_archivo_permiso_r").removeClass("hidden");
									let reader = new FileReader();
									reader.onload = function (event) {
										$('#preview_permiso_r').attr('src', event.target.result);
									}
									reader.readAsDataURL(file);
								}
							}
						}
					};
					fileReader.readAsArrayBuffer(file.slice(0, 4));
				}else{
					$("#justificante_permiso_r").replaceWith(file_permisos_reglamentarios.clone());
				}
			} else {
				console.error('FileReader ó Blob no es compatible con este navegador.');
				if($("#justificante_permiso_r").val() != ''){
					var file = this.files[0].name;
					var lastDot = file.lastIndexOf('.');
					var extension = file.substring(lastDot + 1);
					if(extension == "jpeg" || extension == "jpg" || extension == "png" || extension == "pdf") {
						if(this.files[0].size > 10485760){
							$('#archivo_permiso_r').text("El archivo " +file+ " debe pesar menos 10 MB.");
							$("#div_actions_archivo_permiso_r").removeClass("hidden");
						}else{
							$('#archivo_permiso_r').text(file);
							$("#div_actions_archivo_permiso_r").removeClass("hidden");
						}
					}else{
						$('#archivo_permiso_r').text("El archivo " +file+ " no es un pdf y/o imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
						$("#div_actions_archivo_permiso_r").removeClass("hidden");
					}
				}
			}
		});

		//Permisos No Reglamentarios - validator ONCLICK
		$('#permiso-form').on('click', '#justificante_permiso_nr', function() {
			file_permisos_no_reglamentarios = $("#justificante_permiso_nr").clone();
		});

		//Permisos No Reglamentarios - validator ONCHANGE
		$('#permiso-form').on('change', '#justificante_permiso_nr', function() {
			if (window.FileReader && window.Blob) {
				var files = $('input#justificante_permiso_nr').get(0).files;
				if (files.length > 0) {
					var file = files[0];
					console.log('Archivo cargado: ' + file.name);
					console.log('Blob mime: ' + file.type);
					console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
					console.log('Tamaño en bytes: ' + file.size);

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
							$('#preview_permiso_nr').addClass('hidden');
							$('#svg_permiso_nr').removeClass('hidden');
							$('#archivo_permiso_nr').text("El archivo " +file.name+ " no es un pdf y/o imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
							$("#div_actions_archivo_permiso_nr").removeClass("hidden");
						} else {
							console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
							if(file.size > 10485760){
								$('#preview_permiso_nr').addClass('hidden');
								$('#svg_permiso_nr').removeClass('hidden');
								$('#archivo_permiso_nr').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
								$("#div_actions_archivo_permiso_nr").removeClass("hidden");
							}else{
								if(file.type == 'application/pdf'){
									$('#pdf_preview_nr').removeClass('hidden');
									$('#preview_permiso_nr').removeClass('w-10 h-10');
									$('#preview_permiso_nr').addClass('hidden');
									$('#svg_permiso_nr').addClass('hidden');
									$('#archivo_permiso_nr').text(file.name);
									$("#div_actions_archivo_permiso_nr").removeClass("hidden");
								}else if(file.type == 'image/png' || file.type == 'image/jpeg'){
									$('#preview_permiso_nr').removeClass('hidden');
									$('#preview_permiso_nr').addClass('w-10 h-10');
									$('#pdf_preview_nr').addClass('hidden');
									$('#svg_permiso_nr').addClass('hidden');
									$('#archivo_permiso_nr').text(file.name);
									$("#div_actions_archivo_permiso_nr").removeClass("hidden");
									let reader = new FileReader();
									reader.onload = function (event) {
										$('#preview_permiso_nr').attr('src', event.target.result);
									}
									reader.readAsDataURL(file);
								}
							}
						}
					};
					fileReader.readAsArrayBuffer(file.slice(0, 4));
				}else{
					$("#justificante_permiso_nr").replaceWith(file_permisos_no_reglamentarios.clone());
				}
			} else {
				console.error('FileReader ó Blob no es compatible con este navegador.');
				if($("#justificante_permiso_nr").val() != ''){
					var file = this.files[0].name;
					var lastDot = file.lastIndexOf('.');
					var extension = file.substring(lastDot + 1);
					if(extension == "jpeg" || extension == "jpg" || extension == "png" || extension == "pdf") {
						if(this.files[0].size > 10485760){
							$('#archivo_permiso_nr').text("El archivo " +file+ " debe pesar menos 10 MB.");
							$("#div_actions_archivo_permiso_nr").removeClass("hidden");
						}else{
							$('#archivo_permiso_nr').text(file);
							$("#div_actions_archivo_permiso_nr").removeClass("hidden");
						}
					}else{
						$('#archivo_permiso_nr').text("El archivo " +file+ " no es un pdf y/o imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
						$("#div_actions_archivo_permiso_nr").removeClass("hidden");
					}
				}
			}
		});

		//Incapacidades - validator ONCLICK
		$('#incapacidad-form').on('click', '#comprobante_incapacidad', function() {
			file_incapacidades = $("#comprobante_incapacidad").clone();
		});

		//Incapacidad - Validator on change
		$('#incapacidad-form').on('change', '#comprobante_incapacidad', function() {
			if (window.FileReader && window.Blob) {
				var files = $('input#comprobante_incapacidad').get(0).files;
				if (files.length > 0) {
					var file = files[0];
					console.log('Archivo cargado: ' + file.name);
					console.log('Blob mime: ' + file.type);
					console.log('Tamaño en mb: ' + (file.size / 1024 / 1024).toFixed(2));
					console.log('Tamaño en bytes: ' + file.size);

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
							$('#preview_incapacidad').addClass('hidden');
							$('#svg_incapacidad').removeClass('hidden');
							$('#archivo_incapacidad').text("El archivo " +file.name+ " no es un pdf y/o imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
							$("#div_actions_archivo_incapacidad").removeClass("hidden");
						} else {
							console.log('Tipo de Mime detectado: ' + type + '. coincide con la extensión del archivo.');
							if(file.size > 10485760){
								$('#preview_incapacidad').addClass('hidden');
								$('#svg_incapacidad').removeClass('hidden');
								$('#archivo_incapacidad').text("El archivo " +file.name+ " debe pesar menos de 10 MB.");
								$("#div_actions_archivo_incapacidad").removeClass("hidden");
							}else{
								if(file.type == 'application/pdf'){
									$('#pdf_preview_incapacidad').removeClass('hidden');
									$('#preview_incapacidad').removeClass('w-10 h-10');
									$('#preview_incapacidad').addClass('hidden');
									$('#svg_incapacidad').addClass('hidden');
									$('#archivo_incapacidad').text(file.name);
									$("#div_actions_archivo_incapacidad").removeClass("hidden");
								}else if(file.type == 'image/png' || file.type == 'image/jpeg'){
									$('#preview_incapacidad').removeClass('hidden');
									$('#preview_incapacidad').addClass('w-10 h-10');
									$('#pdf_preview_incapacidad').addClass('hidden');
									$('#svg_incapacidad').addClass('hidden');
									$('#archivo_incapacidad').text(file.name);
									$("#div_actions_archivo_incapacidad").removeClass("hidden");
									let reader = new FileReader();
									reader.onload = function (event) {
										$('#preview_incapacidad').attr('src', event.target.result);
									}
									reader.readAsDataURL(file);
								}
							}
						}
					};
					fileReader.readAsArrayBuffer(file.slice(0, 4));
				}else{
					$("#comprobante_incapacidad").replaceWith(file_incapacidades.clone());
				}
			} else {
				console.error('FileReader ó Blob no es compatible con este navegador.');
				if($("#comprobante_incapacidad").val() != ''){
					var file = this.files[0].name;
					var lastDot = file.lastIndexOf('.');
					var extension = file.substring(lastDot + 1);
					if(extension == "jpeg" || extension == "jpg" || extension == "png" || extension == "pdf") {
						if(this.files[0].size > 10485760){
							$('#archivo_incapacidad').text("El archivo " +file+ " debe pesar menos 10 MB.");
							$("#div_actions_archivo_incapacidad").removeClass("hidden");
						}else{
							$('#archivo_incapacidad').text(file);
							$("#div_actions_archivo_incapacidad").removeClass("hidden");
						}
					}else{
						$('#archivo_incapacidad').text("El archivo " +file+ " no es un pdf y/o imagen ó la extensión es incorrecta ó el archivo no es originalmente un archivo pdf, jpg, jpeg y png");
						$("#div_actions_archivo_incapacidad").removeClass("hidden");
					}
				}
			}
		});

		$('#permiso-form').on('hide.daterangepicker', '#fechainicio_pd', function(ev, picker) {
			var selected = $('#permiso_r').find('option:selected').val();
			var startDate = picker.startDate.format('MM/DD/YYYY');
			var date = new Date();
			date = formatDate(startDate);
			if(selected == "FALLECIMIENTO"){
				var endDate = addDays(date,3);
				endDate = endDate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3/$1/$2");
				$('#fechafin_pd').val(endDate);
			}else if(selected == "MATRIMONIO"){
				var endDate = addDays(date,2);
				endDate = endDate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3/$1/$2");
				$('#fechafin_pd').val(endDate);
			}else if(selected == "ESCOLARIDAD"){
				var endDate = addDays(date,1);
				endDate = endDate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3/$1/$2");
				$('#fechafin_pd').val(endDate);
			}else if(selected == "NACIMIENTO_ADOPCION_ABORTO"){
				var endDate = addDays(date,5);
				endDate = endDate.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3/$1/$2");
				$('#fechafin_pd').val(endDate);		
			}
		});
	});

	function formPermiso(){
		$.validator.addMethod('field_validation', function (value, element) {
            return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
        }, 'not a valid field.');

		$.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param * 1048576)
        }, 'File size must be less than {0} MB');

		if ($('#permiso-form').length > 0) {
			$('#permiso-form').validate({
				ignore: [],
				onkeyup: false,
				errorPlacement: function(error, element) {
					if(element.attr('name') === 'justificante_permiso_r'){
						error.appendTo('div#error_justificante_permiso_r');
					}else if(element.attr('name') === 'observaciones_permiso_r'){
						error.appendTo('div#error_observaciones_permiso_r');
					}else if(element.attr('name') === 'motivo_pnd'){
						error.appendTo('div#error_motivo_pnd');
					}else if(element.attr('name') === 'motivo_permiso_nr'){
						error.appendTo('div#error_motivo_permiso_nr');
					}else if(element.attr('name') === 'observaciones_permiso_nr'){
						error.appendTo('div#error_observaciones_permiso_nr');
					}else if(element.attr('name') === 'justificante_permiso_nr'){
						error.appendTo('div#error_justificante_permiso_nr');
					}else{
						error.insertAfter(element.parent('.group.flex'));
					}
				},
				invalidHandler: function(e, validator){
					if(!($('#error-container-permisos').length)){
						this.$div = $('<div id="error-container-permisos" class="grid grid-cols-1 mt-5"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors-permisos" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#permiso-form");
					}
					$("#arrayerrors-permisos").html(""); 
					$.each(validator.errorMap, function( index, value ) { 
						this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
						$("#arrayerrors-permisos").append(this.$arrayerror);
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
					tipo_permiso:{
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val()== "" || $('#tipo_permiso').val()== "REGLAMENTARIA" || $('#tipo_permiso').val()== "NO_REGLAMENTARIA"){
									return true;
								}else{
									if($("#tipo_permiso option[value='']").length > 0){
										$('#tipo_permiso').val("");
										return true;
									}else{
										$("#tipo_permiso").append("<option value=''>--Seleccione--</option>").val("");
										return true;
									}
								}
							}
						}
					},
					permiso_r:{
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									if($('#permiso_r').val() == "FALLECIMIENTO" || $('#permiso_r').val() == "MATRIMONIO" || $('#permiso_r').val() == "ESCOLARIDAD" || $('#permiso_r').val() == "NACIMIENTO_ADOPCION_ABORTO" || $('#permiso_r').val() == "HOME_OFFICE" || $('#permiso_r').val() == "OTRO" || $('#permiso_r').val() == ""){
										return true;
									}else{
										if($("#permiso_r option[value='']").length > 0){
											$('#permiso_r').val("");
											return true;
										}else{
											$("#permiso_r").append("<option value=''>--Seleccione--</option>").val("");
											return true;
										}	
									}
								}else{
									return false;
								}
							}
						}
					},
					observaciones_permiso_r:{
						field_validation: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									return true;
								}else{
									return false;
								}
							}
						}
					},
					justificante_permiso_r: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									return true;
								}else{
									return false;
								}
							}
						},
						extension: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									return "pdf|jpg|jpeg|png";
								}else{
									return false;
								}
							}
						},
						filesize: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									return 10;
								}else{
									return false;
								}
							}
						}
					},
					fechainicio_pd: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									if($('#permiso_r').val() == "FALLECIMIENTO" || $('#permiso_r').val() == "MATRIMONIO" || $('#permiso_r').val() == "ESCOLARIDAD" || $('#permiso_r').val() == "NACIMIENTO_ADOPCION_ABORTO"){
										return true;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						}
					},
					periodo_pnd: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									if($('#permiso_r').val() == "HOME_OFFICE" || $('#permiso_r').val() == "OTRO"){
										return true;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						}
					},
					motivo_pnd: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									if($('#permiso_r').val() == "HOME_OFFICE" || $('#permiso_r').val() == "OTRO"){
										return true;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						},
						field_validation: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "REGLAMENTARIA"){
									if($('#permiso_r').val() == "HOME_OFFICE" || $('#permiso_r').val() == "OTRO"){
										return true;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						}
					},
					permiso_nr:{
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									if($('#permiso_nr').val() == "RETARDO" || $('#permiso_nr').val() == "SALIDA" || $('#permiso_nr').val() == "AUSENCIA" || $('#permiso_nr').val() == ""){
										return true;
									}else{
										if($("#permiso_nr option[value='']").length > 0){
											$('#permiso_nr').val("");
											return true;
										}else{
											$("#permiso_nr").append("<option value=''>--Seleccione--</option>").val("");
											return true;
										}	
									}
								}else{
									return false;
								}
							}
						}
					},
					motivo_permiso_nr: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									return true;
								}else{
									return false;
								}
							}
						},
						field_validation: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									return true;
								}else{
									return false;
								}
							}
						}
					},
					observaciones_permiso_nr:{
						field_validation: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									return true;
								}else{
									return false;
								}
							}
						}
					},
					posee_jpermiso_nr: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									if ($("input[name='posee_jpermiso_nr']:checked").length > 0) {
										return true;
									}else{
										$('input[name="posee_jpermiso_nr"][value="no"]').trigger('click');
									}
								}else{
									return false;
								}
							}
						}
					},
					justificante_permiso_nr: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									if($('input[name="posee_jpermiso_nr"][value="si"]').is(":checked")){
										return true;
									}else if($('input[name="posee_jpermiso_nr"][value="no"]').is(":checked")){
										return false;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						},
						extension: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									if($('input[name="posee_jpermiso_nr"][value="si"]').is(":checked")){
										return "pdf|jpg|jpeg|png";
									}else if($('input[name="posee_jpermiso_nr"][value="no"]').is(":checked")){
										return false;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						},
						filesize: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									if($('input[name="posee_jpermiso_nr"][value="si"]').is(":checked")){
										return 10;
									}else if($('input[name="posee_jpermiso_nr"][value="no"]').is(":checked")){
										return false;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						}
					},
					periodo_pnr_fh: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									if($('#permiso_nr').val() == "RETARDO" || $('#permiso_nr').val() == "SALIDA"){
										return true;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						}
					},
					periodo_pnr_f: {
						required: {
							depends: function(element) {
								if($('#tipo_permiso').val() == "NO_REGLAMENTARIA"){
									if($('#permiso_nr').val() == "AUSENCIA"){
										return true;
									}else{
										return false;
									}
								}else{
									return false;
								}
							}
						}
					}
				},
				messages: {
					tipo_permiso: {
						required: 'Este campo es requerido'
					},
					permiso_r: {
						required: 'Este campo es requerido'
					},
					observaciones_permiso_r:{
						field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
					},
					justificante_permiso_r: {
						required: 'Este campo es requerido',
						extension: 'Solo se permiten pdf, jpg, jpeg y png',
						filesize: 'No se permiten archivos con más de 10 mb'
					},
					fechainicio_pd: {
						required: 'Este campo es requerido'
					},
					periodo_pnd:{
						required: 'Este campo es requerido'
					},
					motivo_pnd:{
						required: 'Este campo es requerido',
						field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
					},
					permiso_nr:{
						required: 'Este campo es requerido'
					},
					motivo_permiso_nr: {
						required: 'Este campo es requerido',
						field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
					},
					observaciones_permiso_nr:{
						field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
					},
					posee_jpermiso_nr:{
						required: 'Este campo es requerido'
					},
					justificante_permiso_nr: {
						required: 'Este campo es requerido',
						extension: 'Solo se permiten pdf, jpg, jpeg y png',
						filesize: 'No se permiten archivos con más de 10 mb'
					},
					periodo_pnr_fh: {
						required: 'Este campo es requerido'
					},
					periodo_pnr_f: {
						required: 'Este campo es requerido'
					}
				},
				submitHandler: function(form) {
					$('#submit-permiso').html(
                        '<button disabled id="Guardar-permiso" name="Guardar-permiso" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" type="submit">'+
                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                            '</svg>'+
                            'Cargando...'+
                        '</button>');
					$('#error-container-permisos').html("");
					check_user_logged().then((response) => {
		                if(response == "true"){
							//TODO EL AJAX DE PERMISOS
							window.addEventListener('beforeunload', unloadHandler);
							var fd = new FormData();
							var tipo_permiso = $("#tipo_permiso").val();
							if(tipo_permiso == "REGLAMENTARIA"){
								var permiso_r = $("#permiso_r").val();
								var observaciones_permiso_r = $("#observaciones_permiso_r").val();
								var justificante_permiso_r = $('#justificante_permiso_r')[0].files[0];
								if(permiso_r == "FALLECIMIENTO" || permiso_r == "MATRIMONIO" || permiso_r == "ESCOLARIDAD" || permiso_r == "NACIMIENTO_ADOPCION_ABORTO"){
									var fechainicio_pd = $("#fechainicio_pd").val();
									var fechafin_pd = $("#fechafin_pd").val();
								}else if(permiso_r == "HOME_OFFICE" || permiso_r == "OTRO"){
									var periodo_pnd = $("#periodo_pnd").val();
									var motivo_pnd = $("#motivo_pnd").val();
								}
							}else if(tipo_permiso == "NO_REGLAMENTARIA"){
								var permiso_nr = $("#permiso_nr").val();
								var motivo_permiso_nr = $("#motivo_permiso_nr").val();
								var observaciones_permiso_nr = $("#observaciones_permiso_nr").val();
								var posee_jpermiso_nr = $("input[name='posee_jpermiso_nr']:checked").val();
								var justificante_permiso_nr = $('#justificante_permiso_nr')[0].files[0];
								if(permiso_nr == "RETARDO" || permiso_nr == "SALIDA"){
									var periodo_pnr_fh = $("#periodo_pnr_fh").val();
								}else if(permiso_nr == "AUSENCIA"){
									var periodo_pnr_f = $("#periodo_pnr_f").val();
								}
							}
							var tipo_incidencia_papel = "Permiso";
							var method = "store";
							var app = "Incidencias";

							//TODO EL APPEND DE PERMISOS
							fd.append('tipo_permiso', tipo_permiso);
							if(tipo_permiso == "REGLAMENTARIA"){
								fd.append('permiso_r', permiso_r);
								fd.append('observaciones_permiso_r', observaciones_permiso_r);
								fd.append('justificante_permiso_r', justificante_permiso_r);
								if(permiso_r == "FALLECIMIENTO" || permiso_r == "MATRIMONIO" || permiso_r == "ESCOLARIDAD" || permiso_r == "NACIMIENTO_ADOPCION_ABORTO"){
									fd.append('fechainicio_pd', fechainicio_pd);
									fd.append('fechafin_pd', fechafin_pd);
								}else if(permiso_r == "HOME_OFFICE" || permiso_r == "OTRO"){
									fd.append('periodo_pnd', periodo_pnd);
									fd.append('motivo_pnd', motivo_pnd);
								}
							}else if(tipo_permiso == "NO_REGLAMENTARIA"){
								fd.append('permiso_nr', permiso_nr);
								fd.append('motivo_permiso_nr', motivo_permiso_nr);
								fd.append('observaciones_permiso_nr', observaciones_permiso_nr);
								fd.append('posee_jpermiso_nr', posee_jpermiso_nr);
								fd.append('justificante_permiso_nr', justificante_permiso_nr);
								if(permiso_nr == "RETARDO" || permiso_nr == "SALIDA"){
									fd.append('periodo_pnr_fh', periodo_pnr_fh);
								}else if(permiso_nr == "AUSENCIA"){
									fd.append('periodo_pnr_f', periodo_pnr_f);
								}
							}
							fd.append('tipo_incidencia_papel', tipo_incidencia_papel);
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
										if (array[0] == "success") {
											Swal.fire({
												title: "Permiso Creado",
												text: array[1],
												icon: "success"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
												$('#submit-permiso').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-permiso' name='Guardar-permiso' type='submit'>Guardar</button>");
												window.location.href = 'incidencias.php'; 
											});
										} else if(array[0] == "error") {
											Swal.fire({
												title: "Error",
												text: array[1],
												icon: "error"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
												$('#submit-permiso').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-permiso' name='Guardar-permiso' type='submit'>Guardar</button>");
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
								$('#submit-permiso').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-permiso' name='Guardar-permiso' type='submit'>Guardar</button>");
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
	}

	function formIncapacidad(){
		$.validator.addMethod('field_validation', function (value, element) {
            return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
        }, 'not a valid field.');

		$.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param * 1048576)
        }, 'File size must be less than {0} MB');

		if ($('#incapacidad-form').length > 0) {
			$('#incapacidad-form').validate({
				ignore: [],
				onkeyup: false,
				errorPlacement: function(error, element) {
					if(element.attr('name') === 'motivo_incapacidad'){
						error.appendTo('div#error_motivo_incapacidad');
					}else if(element.attr('name') === 'comprobante_incapacidad'){
						error.appendTo('div#error_comprobante_incapacidad');
					}else if(element.attr('name') === 'observaciones_incapacidad'){
						error.appendTo('div#error_observaciones_incapacidad');
					}else{
						error.insertAfter(element.parent('.group.flex'));
					}
				},
				invalidHandler: function(e, validator){
					if(!($('#error-container-incapacidad').length)){
						this.$div = $('<div id="error-container-incapacidad" class="grid grid-cols-1 mt-5"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors-incapacidad" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#incapacidad-form");
					}
					$("#arrayerrors-incapacidad").html(""); 
					$.each(validator.errorMap, function( index, value ) { 
						this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
						$("#arrayerrors-incapacidad").append(this.$arrayerror);
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
				rules:{
					numero_incapacidad:{
						required: true,
						digits: true
					},
					serie_folio_incapacidad:{
						required: true,
						alphanumeric: true
					},
					tipo_incapacidad:{
						required: true
					},
					ramo_seguro_incapacidad:{
						required: true
					},
					periodo_incapacidad: {
						required: true
					},
					motivo_incapacidad: {
						required: true,
						field_validation: true
					},
					observaciones_incapacidad:{
						field_validation: true
					},
					comprobante_incapacidad: {
						required: true,
						extension: "pdf|jpg|jpeg|png",
						filesize: 10
					}
				},
				messages:{
					numero_incapacidad:{
						required: 'Este campo es requerido',
						digits: 'Solo se permiten números'
					},
					serie_folio_incapacidad:{
						required: 'Este campo es requerido',
						alphanumeric: 'Solo se permiten carácteres alfanúmericos'
					},
					tipo_incapacidad:{
						required: 'Este campo es requerido'
					},
					ramo_seguro_incapacidad:{
						required: 'Este campo es requerido'
					},
					periodo_incapacidad: {
						required: "Este campo es requerido"
					},
					motivo_incapacidad: {
						required: "Este campo es requerido",
						field_validation: "Solo se permiten carácteres alfabéticos y espacios"
					},
					observaciones_incapacidad:{
						field_validation: "Solo se permiten carácteres alfabéticos y espacios"
					},
					comprobante_incapacidad: {
						required : "Este campo es requerido",
						extension: "Solo se permiten pdf, jpg, jpeg y png",
						filesize: "No se permiten archivos con más de 10 mb"
					}
				},
				submitHandler: function(form) {
					$('#submit-incapacidad').html(
                        '<button disabled id="Guardar-incapacidad" name="Guardar-incapacidad" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" type="submit">'+
                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                            '</svg>'+
                            'Cargando...'+
                        '</button>');
					$('#error-container-incapacidad').html("");
					check_user_logged().then((response) => {
		                if(response == "true"){
							//TODO EL AJAX DE INCAPACIDADES
							window.addEventListener('beforeunload', unloadHandler);
							var fd = new FormData();
							var numero_incapacidad = $("#numero_incapacidad").val();
							var serie_folio_incapacidad = $("#serie_folio_incapacidad").val();
							var tipo_incapacidad = $("#tipo_incapacidad").val();
							var ramo_seguro_incapacidad = $("#ramo_seguro_incapacidad").val();
							var periodo_incapacidad = $("#periodo_incapacidad").val();
							var motivo_incapacidad = $("#motivo_incapacidad").val();
							var observaciones_incapacidad = $("#observaciones_incapacidad").val();
							var comprobante_incapacidad = $('#comprobante_incapacidad')[0].files[0];
							var tipo_incidencia_papel = "Incapacidad";
							var method = "store";
							var app = "Incidencias"
							//TODO EL APPEND DE INCAPACIDADES
							fd.append('numero_incapacidad', numero_incapacidad);
							fd.append('serie_folio_incapacidad', serie_folio_incapacidad);
							fd.append('tipo_incapacidad', tipo_incapacidad);
							fd.append('ramo_seguro_incapacidad', ramo_seguro_incapacidad);
							fd.append('periodo_incapacidad', periodo_incapacidad);
							fd.append('motivo_incapacidad', motivo_incapacidad);
							fd.append('observaciones_incapacidad', observaciones_incapacidad);
							fd.append('comprobante_incapacidad', comprobante_incapacidad);
							fd.append('tipo_incidencia_papel', tipo_incidencia_papel);
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
										if (array[0] == "success") {
											Swal.fire({
												title: "Incapacidad Creada",
												text: array[1],
												icon: "success"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
												$('#submit-incapacidad').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-incapacidad' name='Guardar-incapacidad' type='submit'>Guardar</button>");
												window.location.href = 'incidencias.php'; 
											});
										} else if(array[0] == "error") {
											Swal.fire({
												title: "Error",
												text: array[1],
												icon: "error"
											}).then(function() {
												window.removeEventListener('beforeunload', unloadHandler);
												$('#submit-incapacidad').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-incapacidad' name='Guardar-incapacidad' type='submit'>Guardar</button>");
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
								$('#submit-incapacidad').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-incapacidad' name='Guardar-incapacidad' type='submit'>Guardar</button>");
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
	}

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		function formActa(){
			$.validator.addMethod('field_validation', function (value, element) {
				return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
			}, 'not a valid field.');

			if ($('#acta-form').length > 0) {
				$('#acta-form').validate({
					ignore: [],
					onkeyup: false,
					errorPlacement: function(error, element) {
						if(element.attr('name') === 'motivo_acta'){
							error.appendTo("div#error_motivo_acta");  
						}else if(element.attr('name') === 'obcomen_acta'){
							error.appendTo("div#error_obcomen_acta");  
						}else{
							error.insertAfter(element.parent('.group.flex'));
						}
					},
					invalidHandler: function(e, validator){
						if(!($('#error-container-acta').length)){
							this.$div = $('<div id="error-container-acta" class="grid grid-cols-1 mt-5"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors-acta" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#acta-form");
						}
						$("#arrayerrors-acta").html(""); 
						$.each(validator.errorMap, function( index, value ) { 
							this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
							$("#arrayerrors-acta").append(this.$arrayerror);
						});
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
						fecha_acta:{
							required: true
						},
						caja_empleado:{
							required: true
						},
						motivo_acta: {
							required: true,
							field_validation: true
						},
						obcomen_acta: {
							field_validation: true
						}
					},
					messages: {
						fecha_acta:{
							required: "Este campo es requerido"
						},
						caja_empleado:{
							required: "Este campo es requerido"
						},
						motivo_acta: {
							required: "Este campo es requerido",
							field_validation: "Solo se permiten carácteres alfabéticos y espacios"
						},
						obcomen_acta: {
							field_validation: "Solo se permiten carácteres alfabéticos y espacios"
						}
					},
					submitHandler: function(form) {
						$('#submit-acta').html(
							'<button disabled id="Guardar-acta" name="Guardar-acta" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" type="submit">'+
								'<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
								'<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
								'<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
								'</svg>'+
								'Cargando...'+
							'</button>');
						$('#error-container-acta').html("");
						check_user_logged().then((response) => {
							if(response == "true"){
								//TODO EL AJAX DE LAS ACTAS ADMINISTRATIVAS
								window.addEventListener('beforeunload', unloadHandler);
								var fd = new FormData();
								var fecha_acta = $("#fecha_acta").val();
								var caja_empleado = $("#caja_empleado").val();
								var caja_empleado_text =  $("#caja_empleado option:selected").text();
								var motivo_acta = $("#motivo_acta").val();
								var obcomen_acta = $("#obcomen_acta").val();
								var tipo_incidencia_papel = "Acta_administrativa";
								var method = "store";
								var app = "Incidencias"
								//TODO EL APPEND DE LAS ACTAS ADMINISTRATIVAS
								fd.append('fecha_acta', fecha_acta);
								fd.append('caja_empleado', caja_empleado);
								fd.append('caja_empleado_text', caja_empleado_text);
								fd.append('motivo_acta', motivo_acta);
								fd.append('obcomen_acta', obcomen_acta);
								fd.append('tipo_incidencia_papel', tipo_incidencia_papel);
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
											if (array[0] == "success") {
												Swal.fire({
													title: "Acta Administrativa Creada",
													text: array[1],
													icon: "success"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-acta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-acta' name='Guardar-acta' type='submit'>Guardar</button>");
													window.location.href = 'incidencias.php'; 
												});
											} else if(array[0] == "error") {
												Swal.fire({
													title: "Error",
													text: array[1],
													icon: "error"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-acta').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-acta' name='Guardar-acta' type='submit'>Guardar</button>");
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
									$('#submit-acta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-acta' name='Guardar-acta' type='submit'>Guardar</button>");
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
		}
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		function formCarta(){
			$.validator.addMethod('field_validation', function (value, element) {
				return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
			}, 'not a valid field.');

			if ($('#carta-form').length > 0) {
				$('#carta-form').validate({
					ignore: [],
					onkeyup: false,
					errorPlacement: function(error, element) {
						if(element.attr('name') === 'responsabilidad_carta'){
							error.appendTo("div#error_responsabilidad_carta");  
						}else{
							error.insertAfter(element.parent('.group.flex'));
						}
					},
					invalidHandler: function(e, validator){
						if(!($('#error-container-carta').length)){
							this.$div = $('<div id="error-container-carta" class="grid grid-cols-1 mt-5"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors-carta" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#carta-form");
						}
						$("#arrayerrors-carta").html(""); 
						$.each(validator.errorMap, function( index, value ) { 
							this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
							$("#arrayerrors-carta").append(this.$arrayerror);
						});
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
						fecha_carta:{
							required: true
						},
						array_empleado:{
							required: true
						},
						responsabilidad_carta: {
							required: true,
							field_validation: true
						}
					},
					messages: {
						fecha_carta:{
							required: 'Este campo es requerido'
						},
						array_empleado:{
							required: 'Este campo es requerido'
						},
						responsabilidad_carta: {
							required: 'Este campo es requerido',
							field_validation: 'Solo se permiten carácteres alfabéticos y espacios'
						}
					},
					submitHandler: function(form) {
						$('#submit-carta').html(
							'<button disabled id="Guardar-carta" name="Guardar-carta" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" type="submit">'+
								'<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
								'<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
								'<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
								'</svg>'+
								'Cargando...'+
							'</button>');
						$('#error-container-carta').html("");
						check_user_logged().then((response) => {
							if(response == "true"){
								//TODO EL AJAX DE LAS ACTAS ADMINISTRATIVAS
								window.addEventListener('beforeunload', unloadHandler);
								var fd = new FormData();
								var fecha_carta = $("#fecha_carta").val();
								var array_empleado = $("#array_empleado").val();
								var array_empleado_text =  $("#array_empleado option:selected").text();
								var responsabilidad_carta = $("#responsabilidad_carta").val();
								var tipo_incidencia_papel = "Carta_compromiso";
								var method = "store";
								var app = "Incidencias"
								//TODO EL APPEND DE LAS ACTAS ADMINISTRATIVAS
								fd.append('fecha_carta', fecha_carta);
								fd.append('array_empleado', array_empleado);
								fd.append('array_empleado_text', array_empleado_text);
								fd.append('responsabilidad_carta', responsabilidad_carta);
								fd.append('tipo_incidencia_papel', tipo_incidencia_papel);
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
											if (array[0] == "success") {
												Swal.fire({
													title: "Carta Compromiso Creada",
													text: array[1],
													icon: "success"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-acta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-acta' name='Guardar-acta' type='submit'>Guardar</button>");
													window.location.href = 'incidencias.php'; 
												});
											} else if(array[0] == "error") {
												Swal.fire({
													title: "Error",
													text: array[1],
													icon: "error"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-acta').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-acta' name='Guardar-acta' type='submit'>Guardar</button>");
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
									$('#submit-acta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='Guardar-acta' name='Guardar-acta' type='submit'>Guardar</button>");
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
		}
	<?php } ?>

	function formatDate(date) {
		var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) 
			month = '0' + month;
		if (day.length < 2) 
			day = '0' + day;

		return [month, day, year].join('/');
	}

	function addDays(date, days) {
		var result = new Date(date);
		result.setDate(result.getDate() + days);
		result = formatDate(result);
		return result;
	}

	function resetFormValidator(formId) {
        $(formId).removeData('validator');
        $(formId).removeData('unobtrusiveValidation');
        $.validator.unobtrusive.parse(formId);
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

	function unloadHandler(e) {
		// Cancel the event
		e.preventDefault();
		// Chrome requires returnValue to be set
		e.returnValue = '';
	}

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
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
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		//Este metodo es para quitar el error en el select 2
		$('#caja_empleado').on("change", function (e) {
			$(this).valid()
		});
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		//Este metodo es para quitar el error en el segundo select 2
		$('#array_empleado').on("change", function (e) {
			$(this).valid()
		});
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear acta administrativa") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		$('#caja_empleado').on('select2:open', function (e) {
			waitForElm('.select2-results__options').then((elm) => {
				if ( $('.select2-results__options.select2-results__options--nested > *').length == 0 ) {
					var usuarios_group = $('#caja_empleado').find('optgroup[label=Usuarios]');
					$(usuarios_group).prop('disabled', 'true');
					$(".select2-results__option.select2-results__option--group").css("display","none");
					$('#select2-caja_empleado-results.select2-results__options').append("<span class='px-3'>No hay resultados</span>");
				}
			});
		});
	<?php } ?>

	<?php if (Permissions::CheckPermissions($_SESSION["id"], "Crear carta compromiso") == "true" || Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador") { ?>
		$('#array_empleado').on('select2:open', function (e) {
			waitForElm('.select2-results__options').then((elm) => {
				if ( $('.select2-results__options.select2-results__options--nested > *').length == 0 ) {
					var usuarios_group = $('#array_empleado').find('optgroup[label=Usuarios]');
					$(usuarios_group).prop('disabled', 'true');
					$(".select2-results__option.select2-results__option--group").css("display","none");
					$('#select2-array_empleado-results.select2-results__options').append("<span class='px-3'>No hay resultados</span>");
				}
			});
		});
	<?php } ?>

</script>
<style>
	.error{
        color: red;
    }

	.select2-container--tailwind .select2-results > .select2-results__options{
        overflow-y: auto;
        max-height: 120px;
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

	main{
		position:relative !important;
	}

	.daterangepicker td.active, .daterangepicker td.active:hover{
		--tw-bg-opacity: 1 !important;
		background-color: rgb(79 70 229 / var(--tw-bg-opacity)) !important;
		border-color: transparent;
		color: #fff;
	}
</style>