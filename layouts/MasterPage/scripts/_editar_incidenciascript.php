<script>

	$(document).ready(function() {
	    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 1000000)
        }, 'File size must be less than {0} MB');

		if ($('#Guardar').length > 0) {
			$('#Guardar').validate({
				ignore: [],
				errorPlacement: function(error, element) {
					if((element.attr('name') === 'foto')){
						error.appendTo("div#error");  
					}else if(element.attr('name') === 'descripcion'){
						error.appendTo("div#error2");
					}else{
						error.insertAfter(element.parent('.group.flex'));
					}
				},
				rules: {
					titulo:{
						required:true
					},
					fechainicio:{
						required:true
					},
					fechafin:{
						required:true
					},
					tipo:{
						required:true
					},
					descripcion:{
						required:true
					},
					foto:{
						extension:"jpg|jpeg|png",
						filesize: 10
					}
				},
				messages: {
					titulo:{
						required: 'Este campo es requerido'
					},
					fechainicio:{
						required: 'Este campo es requerido'
					},
					fechafin:{
						required: 'Este campo es requerido'
					},
					tipo:{
						required: 'Este campo es requerido'
					},
					descripcion:{
						required: 'Este campo es requerido'
					},
					foto:{
						extension: 'Solo se permiten jpgs, pngs y jpeg',
						filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
					}
				},
				submitHandler: function(form) {
				
					$('#submit-button').html(
					'<button disabled type="button" class="w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2">'+
						'<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
						'<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
						'<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
						'</svg>'+
						'Cargando...'+
					'</button>');
					check_user_logged().then((response) => {
						if(response == "true"){
							var fd = new FormData();
							var titulo = $("#titulo").val();
							var fechainicio = $("#fechainicio").val();
							var fechafin = $("#fechafin").val();
							var tipo = $("#tipo").val();
							var descripcion = $("#descripcion").val();
							var foto = $('#foto')[0].files[0];
							var method = "edit";
							var app = "incidencias";
							var editarid = <?php echo $editarid; ?>;
							fd.append('titulo', titulo);
							fd.append('fechainicio', fechainicio);
							fd.append('fechafin', fechafin);
							fd.append('tipo', tipo);
							fd.append('descripcion', descripcion);
							fd.append('foto', foto);
							fd.append('method', method);
							fd.append('app', app);
							fd.append('editarid', editarid);
							$.ajax({
								url: '../ajax/class_search.php',
								type: 'POST',
								data: fd,
								processData: false,
								contentType: false,
								success: function(data) {
									var array = $.parseJSON(data);
									if(array[0] == "success"){
										Swal.fire({
											title: "Incidencia editada",
											text: "Se ha editado una incidencia exitosamente!",
											icon: "success"
										}).then(function() {
											$('#message-error').html("");
											$('#submit-button').html("<button disabled class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' id='grabar' name='grabar'>Guardar</button>");
											window.location.href = "incidencias.php";	
										});
									}else if (array[0] == "failed"){
										$('#message-error').html("<span class='text-rose-500'>" +array[1]+ "</span>");
										$('#submit-button').html("<button class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' id='grabar' name='grabar'>Guardar</button>");
									}
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
		}

		$('input[name="foto"]').change(function(e) {
			if($("#foto").val() != ''){
				var file = e.target.files[0].name;
				var lastDot = file.lastIndexOf('.');
				var extension = file.substring(lastDot + 1);
				const archivo = this.files[0];
				if(extension == "jpeg" || extension == "jpg" || extension == "png") {
					$('#preview').removeClass('hidden');
					$('#preview').addClass('w-10 h-10');
					$('#svg').addClass('hidden');
					$('#archivo').text(file);
					let reader = new FileReader();
					reader.onload = function(event){
						$('#preview').attr('src', event.target.result);
					}
					reader.readAsDataURL(archivo);
				}else{
					$('#preview').addClass('hidden');
					$('#svg').removeClass('hidden');
					$('#archivo').text("El archivo " +file+ " no es una imagen");
				}
			}
		});
	});
    
	function rdfechafin() {
		var fecha_inicio = $('#fechainicio').val();
		$('#fechafin').attr("min", fecha_inicio);
		$('#fechafin').attr("data-msg-min", 'Por favor, ingrese una fecha mayor o igual que ' +fecha_inicio);
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

</script>