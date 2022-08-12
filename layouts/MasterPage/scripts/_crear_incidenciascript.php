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
						required:true,
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
						required: 'Este campo es requerido',
						extension: 'Solo se permiten jpgs, pngs y jpeg',
						filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
					}
				},
				submitHandler: function(form) {
					$("#grabar").attr("disabled", true);
					var fd = new FormData();
					var titulo = $("#titulo").val();
					var fechainicio = $("#fechainicio").val();
					var fechafin = $("#fechafin").val();
					var tipo = $("#tipo").val();
					var descripcion = $("#descripcion").val();
					var foto = $('#foto')[0].files[0];
					var method = "store";
                    var app = "incidencias";
					fd.append('titulo', titulo);
					fd.append('fechainicio', fechainicio);
					fd.append('fechafin', fechafin);
					fd.append('tipo', tipo);
					fd.append('descripcion', descripcion);
					fd.append('foto', foto);
					fd.append('method', method);
					fd.append('app', app)
					$.ajax({
							url: '../ajax/class_search.php',
                            type: 'POST',
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                data = data.replace(/[\r\n]/gm, '');
                                if(data == "success"){
                                    Swal.fire({
                                        title: "Incidencia creada",
                                        text: "Se ha creado una incidencia exitosamente!",
                                        icon: "success"
                                    }).then(function() {
                                        window.location.href = "incidencias.php";	
                                        });
                                }
                            },
                            error: function(data) {
                                $("#ajax-error").text('Fail to send request');
                            }		
					});
					return false;
				}
			});
		}
		
		$('input[name="foto"]').change(function(e) {
			var file = e.target.files[0].name;
			const archivo = this.files[0];
			$('#preview').removeClass('hidden');
			$('#preview').addClass('w-10 h-10');
			$('#svg').addClass('hidden');
			$('#archivo').text(file);
			if (archivo){
				let reader = new FileReader();
				reader.onload = function(event){
					console.log(event.target.result);
					$('#preview').attr('src', event.target.result);
				}
				reader.readAsDataURL(archivo);
			}
		});
	});
</script>