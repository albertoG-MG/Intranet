<script src="../src/js/jQuery.print.min.js"></script>
<script>
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
