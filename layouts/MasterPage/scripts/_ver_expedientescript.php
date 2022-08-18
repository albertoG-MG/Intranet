<script>
$(document).ready(function () {
    <?php
    if(basename($_SERVER['PHP_SELF']) == 'ver_expediente.php'){?>
        var dropdown = document.getElementById('catalogos');
        dropdown.classList.remove("hidden");
    <?php } ?>
});
</script>