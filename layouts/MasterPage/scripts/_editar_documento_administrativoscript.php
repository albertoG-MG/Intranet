<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>
	<?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
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
	<?php }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ ?>
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
	
	$('.select2-selection--single').addClass("flex focus:outline-none");
	$('.select2-selection__rendered').addClass("flex-1");
	$('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');
	$('.select2-selection__arrow').addClass('rotate-180 mb-1');
	
	<?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
		$("#selectempleado").show();

		$('#caja_empleado').on('select2:open', function (e) {
			const evt = "scroll.select2";
			$(e.target).parents().off(evt);
			$(window).off(evt);
		});
		
		
	<?php }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ ?>
		$("#groupempleado").show();

		$('#array_empleado').on('select2:open', function (e) {
			const evt = "scroll.select2";
			$(e.target).parents().off(evt);
			$(window).off(evt);
		});
	<?php } ?>
	$(document).ready(function() {
		<?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
			//Acta Administrativa
			$('input[name="fecha_acta"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true,  startDate: "<?php echo $fetch_information -> fecha; ?>", locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		<?php }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ ?>
			//Carta compromiso
			$('input[name="fecha_carta"]').daterangepicker({ showDropdowns: true, parentEl: "main", singleDatePicker: true, startDate: "<?php echo $fetch_information -> fecha; ?>", locale: { format: 'YYYY/MM/DD' }, applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });
		<?php } ?>

        $('form#editar-documento input[type="text"]').on('keypress', function(e) {
            return e.which !== 13;
        });

        $.validator.addMethod('field_validation', function (value, element) {
			return this.optional(element) || /^[a-zA-Z\u00C0-\u00FF]+([\s][a-zA-Z\u00C0-\u00FF]+)*$/.test(value);
		}, 'not a valid field.');

        <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
            if ($('#editar-documento').length > 0) {
				$('#editar-documento').validate({
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
							this.$div = $('<div id="error-container-acta" class="grid grid-cols-1 mt-5"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors-acta" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#editar-documento");
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
						$('#submit-edit-acta').html(
							'<button disabled id="boton-editar-acta" name="boton-editar-acta" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" type="submit">'+
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
                                var incidenciaid = "<?php echo $editarid;  ?>";
								var method = "edit";
								var app = "Editar_incidencias"
								//TODO EL APPEND DE LAS ACTAS ADMINISTRATIVAS
								fd.append('fecha_acta', fecha_acta);
								fd.append('caja_empleado', caja_empleado);
								fd.append('caja_empleado_text', caja_empleado_text);
								fd.append('motivo_acta', motivo_acta);
								fd.append('obcomen_acta', obcomen_acta);
								fd.append('tipo_incidencia_papel', tipo_incidencia_papel);
                                fd.append('incidenciaid', incidenciaid);
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
													title: "Acta Administrativa Editada",
													text: array[1],
													icon: "success"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-edit-acta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='boton-editar-acta' name='boton-editar-acta' type='submit'>Guardar</button>");
													window.location.href = 'actas_cartas.php'; 
												});
											} else if(array[0] == "error") {
												Swal.fire({
													title: "Error",
													text: array[1],
													icon: "error"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-edit-acta').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='boton-editar-acta' name='boton-editar-acta' type='submit'>Guardar</button>");
												});
											}else if(array[0] == "incidencia_desconocida"){
												Swal.fire({
													title: "Incidencia desconocida",
													text: array[1],
													icon: "error"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-edit-carta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='boton-editar-carta' name='boton-editar-carta' type='submit'>Guardar</button>");
													window.location.href = 'actas_cartas.php';
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
									$('#submit-edit-acta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='boton-editar-acta' name='boton-editar-acta' type='submit'>Guardar</button>");
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
        <?php }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ ?>
            if ($('#editar-documento').length > 0) {
				$('#editar-documento').validate({
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
							this.$div = $('<div id="error-container-carta" class="grid grid-cols-1 mt-5"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex flex-col md:flex-row items-center"><div class="p-2"><div class="flex flex-col md:flex-row items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-3 py-4 text-red-900 font-semibold text-sm md:text-lg text-center">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors-carta" class="md:px-5 mb-4"></div></div></div></div>').insertBefore("#editar-documento");
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
						$('#submit-edit-carta').html(
							'<button disabled id="boton-editar-carta" name="boton-editar-carta" class="button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700" type="submit">'+
								'<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
								'<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
								'<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
								'</svg>'+
								'Cargando...'+
							'</button>');
						$('#error-container-carta').html("");
						check_user_logged().then((response) => {
							if(response == "true"){
								//TODO EL AJAX DE LAS CARTAS COMPROMISO
								window.addEventListener('beforeunload', unloadHandler);
								var fd = new FormData();
								var fecha_carta = $("#fecha_carta").val();
								var array_empleado = $("#array_empleado").val();
								var array_empleado_text =  $("#array_empleado option:selected").text();
								var responsabilidad_carta = $("#responsabilidad_carta").val();
								var tipo_incidencia_papel = "Carta_compromiso";
                                var incidenciaid = "<?php echo $editarid;  ?>";
								var method = "edit";
								var app = "Editar_incidencias"
								//TODO EL APPEND DE LAS CARTAS COMPROMISO
								fd.append('fecha_carta', fecha_carta);
								fd.append('array_empleado', array_empleado);
								fd.append('array_empleado_text', array_empleado_text);
								fd.append('responsabilidad_carta', responsabilidad_carta);
								fd.append('tipo_incidencia_papel', tipo_incidencia_papel);
                                fd.append('incidenciaid', incidenciaid);
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
													$('#submit-edit-carta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='boton-editar-carta' name='boton-editar-carta' type='submit'>Guardar</button>");
													window.location.href = 'actas_cartas.php'; 
												});
											} else if(array[0] == "error") {
												Swal.fire({
													title: "Error",
													text: array[1],
													icon: "error"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-edit-carta').html("<button class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='boton-editar-carta' name='boton-editar-carta' type='submit'>Guardar</button>");
												});
											}else if(array[0] == "incidencia_desconocida"){
												Swal.fire({
													title: "Incidencia desconocida",
													text: array[1],
													icon: "error"
												}).then(function() {
													window.removeEventListener('beforeunload', unloadHandler);
													$('#submit-edit-carta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='boton-editar-carta' name='boton-editar-carta' type='submit'>Guardar</button>");
													window.location.href = 'actas_cartas.php';
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
									$('#submit-edit-carta').html("<button disabled class='button bg-indigo-600 text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700' id='boton-editar-carta' name='boton-editar-carta' type='submit'>Guardar</button>");
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

    <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
		//Este metodo es para quitar el error en el select 2
		$('#caja_empleado').on("change", function (e) {
			$(this).valid()
		});
    <?php }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ ?>
		//Este metodo es para quitar el error en el segundo select 2
		$('#array_empleado').on("change", function (e) {
			$(this).valid()
		});
	<?php } ?>

    <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
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
    <?php }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ ?>
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
