<script>
document.addEventListener("DOMContentLoaded", function() {
    $("#datatable").DataTable({
        responsive:true,
        "lengthChange": false,
        "sPaginationType": "listboxWithButtons"
    });
});
<?php
if(basename($_SERVER['PHP_SELF']) == 'users.php'){?>
    var dropdown = document.getElementById('catalogos');
    dropdown.classList.remove("hidden");
<?php } ?>
</script>

