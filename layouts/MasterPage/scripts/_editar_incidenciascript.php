<script>
    
    function rdfechafin() {
		$('#fechafin').prop('disabled', false);
		$('#fechafin').removeClass('bg-gray-200');
		var fecha_inicio = $('#fechainicio').val();
		$('#fechafin').attr("min", fecha_inicio);
		$('#fechafin').attr("data-msg-min", 'Por favor, ingrese una fecha mayor o igual que ' +fecha_inicio);
	}

</script>