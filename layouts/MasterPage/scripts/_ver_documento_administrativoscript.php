<script src="../src/js/jQuery.print.min.js"></script>
<script>
$(document).ready(function () {
    <?php
    if(basename($_SERVER['PHP_SELF']) == 'ver_documento_administrativo.php'){?>
        var dropdown = document.getElementById('incidencia');
        dropdown.classList.remove("hidden");
    <?php } ?>
});

<?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
$(function() {
  $(document).on('click', '#print', function() {
    $.print("#main_acta");
  });
});
<?php }else{ ?>
$(function() {
  $(document).on('click', '#print', function() {
    $.print("#main_carta");
  });
});
<?php } ?>
</script>
