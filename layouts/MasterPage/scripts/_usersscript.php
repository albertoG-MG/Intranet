<script>
document.addEventListener("DOMContentLoaded", function() {
    $("#datatable").DataTable({
        responsive:true,
        "lengthChange": false,
        "sPaginationType": "listboxWithButtons",
        language: {
					search: ""
		}
    });
});
$(document).ready(function() {
    $('.dataTables_filter input[type="search"]').
    attr('placeholder', 'Search').attr('class', 'w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium')
});
<?php
if(basename($_SERVER['PHP_SELF']) == 'users.php'){?>
    var dropdown = document.getElementById('catalogos');
    dropdown.classList.remove("hidden");
<?php } ?>
</script>
<style>
    .dataTables_wrapper .dataTables_filter{
        float:left;
        text-align:left;
    }
</style>

