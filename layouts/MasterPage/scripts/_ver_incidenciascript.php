<script>
	$(document).ready(function () {
    <?php
    if(basename($_SERVER['PHP_SELF']) == 'ver_incidencia.php'){?>
        var dropdown = document.getElementById('incidencia');
        dropdown.classList.remove("hidden");
    <?php } ?>
});

    <?php if($fetch_tipo -> tipo_permiso  == "PERMISO REGLAMENTARIO D" || $fetch_tipo -> tipo_permiso  == "PERMISO REGLAMENTARIO ND"){ ?>
		<?php if($fetch_information->nombre_justificante_r != null && $fetch_information->identificador_justificante_r != null){ ?>
			<?php if($fetch_tipo -> tipo_permiso  == "PERMISO REGLAMENTARIO D"){ ?>
				checkFile("../src/permisos_reglamentarios/permisos_descriptivos/<?php echo $fetch_information->identificador_justificante_r; ?>", "<?php echo $fetch_information->nombre_justificante_r; ?>", "<?php echo $fetch_information->identificador_justificante_r; ?>", "<?php echo $fetch_tipo->tipo_permiso; ?>");
			<?php }else if($fetch_tipo -> tipo_permiso  == "PERMISO REGLAMENTARIO ND"){ ?>
				checkFile("../src/permisos_reglamentarios/permisos_no_descriptivos/<?php echo $fetch_information->identificador_justificante_r; ?>", "<?php echo $fetch_information->nombre_justificante_r; ?>", "<?php echo $fetch_information->identificador_justificante_r; ?>", "<?php echo $fetch_tipo->tipo_permiso; ?>");
			<?php } ?>
		<?php } ?>
	<?php }else if($fetch_tipo -> tipo_permiso  == "PERMISO NO REGLAMENTARIO G" || $fetch_tipo -> tipo_permiso  == "PERMISO NO REGLAMENTARIO A"){ ?>
		<?php if($fetch_information->nombre_justificante_nr != null && $fetch_information->identificador_justificante_nr != null){ ?>
			<?php if($fetch_tipo -> tipo_permiso  == "PERMISO NO REGLAMENTARIO G"){ ?>
				checkFile("../src/permisos_no_reglamentarios/no_reglamentario_g/<?php echo $fetch_information->identificador_justificante_nr; ?>", "<?php echo $fetch_information->nombre_justificante_nr; ?>", "<?php echo $fetch_information->identificador_justificante_nr; ?>", "<?php echo $fetch_tipo->tipo_permiso; ?>");
			<?php }else if($fetch_tipo -> tipo_permiso  == "PERMISO NO REGLAMENTARIO A"){ ?>
				checkFile("../src/permisos_no_reglamentarios/no_reglamentario_a/<?php echo $fetch_information->identificador_justificante_nr; ?>", "<?php echo $fetch_information->nombre_justificante_nr; ?>", "<?php echo $fetch_information->identificador_justificante_nr; ?>", "<?php echo $fetch_tipo->tipo_permiso; ?>");
			<?php } ?>
		<?php } ?>
	<?php }else if($fetch_tipo -> tipo_permiso  == "INCAPACIDAD"){ ?>
		<?php if($fetch_information->nombre_justificante_incapacidad != null && $fetch_information->archivo_identificador_incapacidad != null){ ?>
			checkFile("../src/incapacidades/<?php echo $fetch_information->archivo_identificador_incapacidad; ?>", "<?php echo $fetch_information->nombre_justificante_incapacidad; ?>", "<?php echo $fetch_information->archivo_identificador_incapacidad; ?>", "<?php echo $fetch_tipo->tipo_permiso; ?>");
		<?php } ?>
	<?php } ?>

	
	function checkFile(url, filename, file, type) {
		$.ajax({
			url: url,
			type:'HEAD',
			error: function()
			{
				if(type == "PERMISO REGLAMENTARIO D"){
					$("#text_permiso_rd").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>No se encontró el justificante</p>");
				}else if(type == "PERMISO REGLAMENTARIO ND"){
					$("#text_permiso_rnd").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>No se encontró el justificante</p>");
				}else if(type == "PERMISO NO REGLAMENTARIO G"){
					$("#text_permiso_nrg").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>No se encontró el justificante</p>");
				}else if(type == "PERMISO NO REGLAMENTARIO A"){
					$("#text_permiso_nra").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>No se encontró el justificante</p>");
				}else if(type == "INCAPACIDAD"){
					$("#text_incapacidad").html("<p style='word-break:break-word;' class='lowercase text-center text-sm text-gray-400 pt-1 tracking-wider'>No se encontró el justificante</p>");
				}
			},
			success: function()
			{
				if(type == "PERMISO REGLAMENTARIO D"){
					$("#text_permiso_rd").html("<a style='word-break:break-word;' class='lowercase text-center text-sm text-blue-600 hover:border-b-[1px] hover:border-blue-600 pt-1 tracking-wider' href='../src/permisos_reglamentarios/permisos_descriptivos/"+file+"'>"+filename+"</a>");
				}else if(type == "PERMISO REGLAMENTARIO ND"){
					$("#text_permiso_rnd").html("<a style='word-break:break-word;' class='lowercase text-center text-sm text-blue-600 hover:border-b-[1px] hover:border-blue-600 pt-1 tracking-wider' href='../src/permisos_reglamentarios/permisos_no_descriptivos/"+file+"'>"+filename+"</a>");
				}else if(type == "PERMISO NO REGLAMENTARIO G"){
					$("#text_permiso_nrg").html("<a style='word-break:break-word;' class='lowercase text-center text-sm text-blue-600 hover:border-b-[1px] hover:border-blue-600 pt-1 tracking-wider' href='../src/permisos_no_reglamentarios/no_reglamentario_g/"+file+"'>"+filename+"</a>");
				}else if(type == "PERMISO NO REGLAMENTARIO A"){
					$("#text_permiso_nra").html("<a style='word-break:break-word;' class='lowercase text-center text-sm text-blue-600 hover:border-b-[1px] hover:border-blue-600 pt-1 tracking-wider' href='../src/permisos_no_reglamentarios/no_reglamentario_a/"+file+"'>"+filename+"</a>");
				}else if(type == "INCAPACIDAD"){
					$("#text_incapacidad").html("<a style='word-break:break-word;' class='lowercase text-center text-sm text-blue-600 hover:border-b-[1px] hover:border-blue-600 pt-1 tracking-wider' href='../src/incapacidades/"+file+"'>"+filename+"</a>");
				}
			}
		});
	}
</script>