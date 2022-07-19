<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        let tabsContainer = document.querySelector("#tabs");
        let tabTogglers = tabsContainer.querySelectorAll("a");
        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {

                tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                tabTogglers[i].classList.remove('active');
                if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                }
                tabContents.children[i].classList.add("hidden");

                }
                e.target.parentElement.classList.add("border-blue-400", "opacity-100");
            });
        });

        document.getElementById("default-tab").click();

        $("#siguiente").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.nextElementSibling.firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.nextElementSibling.classList.add("border-blue-400", "opacity-100");
        });

        $('#prueba').select2({
            theme: ["tailwind"],
            placeholder: '-- Seleccione --'
        });

        $('#prueba').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent')

        $('.select2-selection--single').addClass("flex");

        $('.select2-selection__rendered').addClass("flex-1");

        $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');

        $('.select2-selection__arrow').addClass('rotate-180 mb-1');

        $("#selectprueba").show();

        $('#prueba').on('change', function () {
            var fd =new FormData();
            var x = $('#prueba').val();
            fd.append('id', x);
            $.ajax({
                type: 'post',
                url: '../ajax/expedientes/checkuserdepartamento.php',
                data: fd,
                processData: false,
                contentType: false,
                success: function (data) {
                    data = JSON.parse(data);
                    $("#departamento").val(data);
                }
            });
        });

        $('#estado').on('change', function(event) {
            event.preventDefault();
            var state = $(this).val();

            var data = {
                id: state
            };

            $.ajax({
                url: '../ajax/expedientes/municipios.php',
                type: 'POST',
                data: data,
                dataType: 'html',
                success: function(data) {
                $('#imunicipio').html(data);
                },
                error: function(data) {
                $("#ajax-error").text('Fail to send request');
                }
            });
        });

        
        <?php
        if(basename($_SERVER['PHP_SELF']) == 'crear_expediente.php'){?>
            var dropdown = document.getElementById('catalogos');
            dropdown.classList.remove("hidden");
        <?php } ?>
    });

    function AgregarReferencias(){
            var number = document.getElementById("reflab").value;
            var container = document.getElementById("referencias");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
               var div = document.createElement("div");
               div.classList.add('grid', 'grid-cols-1');
               container.appendChild(div);
               var div2 = document.createElement("div");
               div2.classList.add('grid', 'grid-cols-1');
               container.appendChild(div2);
               var div3 = document.createElement("div");
               div3.classList.add('grid', 'grid-cols-1');
               container.appendChild(div3);
               div.appendChild(document.createTextNode("Nombre completo" + (i+1) + " *"));
               var input = document.createElement("input");
               input.type = "text";
               input.name = "infa_rnombre" + i;
               input.classList.add('w-full', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input.setAttribute("data-msg", "Este campo es requerido"); 
               div.appendChild(input);
               div2.appendChild(document.createTextNode("Parentesco " + (i+1) + " *"));
               var input2 = document.createElement("input");
               input2.type = "text";
               input2.name = "infa_rparentesco" + i;
               input2.classList.add('w-full', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input2.setAttribute("data-msg", "Este campo es requerido");
               div2.appendChild(input2);
               div3.appendChild(document.createTextNode("Teléfono " + (i+1) + " *"));
               var input3 = document.createElement("input");
               input3.type = "text";
               input3.name = "infa_rtelefono" + i;
               input3.classList.add('w-full', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input3.setAttribute("data-msg", "Este campo es requerido");
               div3.appendChild(input3);
            }
         }

</script>
<style>
    .select2-results__option--selectable:hover{
        background: #5897fb;
        color:white;
    }

    .select2-results__option--selected{
        background: #ddd;
    }

    .select2-dropdown{
        border: 1px solid #e5e7eb;
    }
</style>