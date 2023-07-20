<script>
$(document).ready(function () {
    <?php
    if(basename($_SERVER['PHP_SELF']) == 'ver_usuario.php'){?>
        var dropdown = document.getElementById('catalogos');
        dropdown.classList.remove("hidden");
    <?php } ?>
});

<?php  if($row->foto_identificador != null && $row->nombre_foto != null){ ?>
	if (window.FileReader && window.Blob) {
		console.log('FileReader ó Blob es compatible con este navegador.');
		$('#svg').addClass("hidden");
		checkImage("../src/img/imgs_uploaded/<?php echo $row->foto_identificador; ?>", function(){ $('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/imgs_uploaded/<?php echo $row->foto_identificador; ?>'); $('#archivo').text("<?php echo $row->nombre_foto; ?>"); }, function(){ $('#preview').removeClass("hidden").addClass('w-10 h-10').attr('src', '../src/img/not_found.jpg'); $('#archivo').text("No se encontró la imagen"); } );
	}else{
		console.error('FileReader ó Blob no es compatible con este navegador.');
		checkImage("../src/img/imgs_uploaded/<?php echo $row->foto_identificador; ?>", function(){ $('#archivo').text("<?php echo $row->nombre_foto; ?>"); }, function(){ $('#archivo').text("No se encontró la imagen"); } );
	}				
<?php }else{ ?>
	$('#archivo').text("Este usuario no tiene una fotografía vinculada");
	$('#svg').addClass("hidden");
<?php } ?>





function checkImage(imageSrc, good, bad) {
	var img = new Image();
	img.onload = good; 
	img.onerror = bad;
	img.src = imageSrc;
}
</script>
