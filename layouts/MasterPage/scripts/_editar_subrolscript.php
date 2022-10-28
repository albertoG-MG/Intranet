<script>
	$(document).ready(function() {
		 <?php
			if(basename($_SERVER['PHP_SELF']) == 'editar_subrol.php'){?>
				var dropdown = document.getElementById('catalogos');
				dropdown.classList.remove("hidden");
		<?php } ?>
	});
</script>