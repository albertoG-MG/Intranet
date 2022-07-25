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

        $("#siguiente2").on("click", function () {
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

        $("#siguiente3").on("click", function () {
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

        $("#anterior").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.parentElement.children[0].firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.parentElement.children[0].classList.add("border-blue-400", "opacity-100");
        });

        $("#anterior2").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.parentElement.children[1].firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.parentElement.children[1].classList.add("border-blue-400", "opacity-100");
        });

        $("#anterior3").on("click", function () {
            let tabContents = document.querySelector("#tab-contents");
            let currentTab = document.querySelector(".active");
            let tabName = currentTab.parentElement.parentElement.children[2].firstChild.getAttribute("href");
            for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                    tabTogglers[i].classList.remove('active');
                    if ("#" + tabContents.children[i].id === tabName) {
                    tabTogglers[i].className="active";
                    continue;
                    }
                    tabContents.children[i].classList.add("hidden");
            }
            currentTab.parentElement.parentElement.children[2].classList.add("border-blue-400", "opacity-100");
        });

        $("#infp_curriculum").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text').text(file);
	    });

        $("#infp_evaluacion").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text2').text(file);
	    });

        $("#infp_nacimiento").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text3').text(file);
	    });

        $("#infp_curp").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text4').text(file);
	    });

        $("#infp_identificacion").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text5').text(file);
	    });

        $("#infp_comprobante").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text6').text(file);
	    });

        $("#infp_rfc").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text7').text(file);
	    });

        $("#infp_cartal").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text8').text(file);
	    });

        $("#infp_cartap").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text9').text(file);
	    });

        $("#infp_retencion").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text10').text(file);
	    });

        $("#infp_strabajo").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text11').text(file);
	    });

        $("#infp_imss").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text12').text(file);
	    });

        $("#infp_nomina").on('change', function (e) {
            var file = e.target.files[0].name;
            $('#file-text13').text(file);
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

        if($('#Guardar').length > 0 ){
            $('#Guardar').validate({
                ignore: [],
                    errorPlacement: function(error, element) {
                        error.insertAfter(element.parent('.group.flex'));
                    },
                rules:{
                    prueba: {
                        required:true
                    }
                },
                messages:{
                    prueba:{
                        required: 'Este campo es requerido'
                    }
                },
                submitHandler: function(form) {
					var fd = new FormData();
                    alert("hola");
					return false;
                }
            });
        }
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
               var grupo = document.createElement("div");
               grupo.classList.add('group', 'flex');
               div.appendChild(grupo);
               var div4 = document.createElement("div");
               div4.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
               var icon = document.createElement("i");
               icon.classList.add('mdi', 'mdi-account', 'text-gray-400', 'text-lg');
               div4.appendChild(icon);
               grupo.appendChild(div4);
               var input = document.createElement("input");
               input.type = "text";
               input.name = "infa_rnombre" + i;
               input.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input.setAttribute("data-msg", "Este campo es requerido");
               input.setAttribute("placeholder", "Nombre " +(i+1)); 
               grupo.appendChild(input);
               div2.appendChild(document.createTextNode("Parentesco " + (i+1) + " *"));
               var grupo2 = document.createElement("div");
               grupo2.classList.add('group', 'flex');
               div2.appendChild(grupo2);
               var div5 = document.createElement("div");
               div5.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
               var icon2 = document.createElement("i");
               icon2.classList.add('mdi', 'mdi-account-group', 'text-gray-400', 'text-lg');
               div5.appendChild(icon2);
               grupo2.appendChild(div5);
               var input2 = document.createElement("input");
               input2.type = "text";
               input2.name = "infa_rparentesco" + i;
               input2.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input2.setAttribute("data-msg", "Este campo es requerido");
               input2.setAttribute("placeholder", "Parentesco " +(i+1));
               grupo2.appendChild(input2);
               div3.appendChild(document.createTextNode("Teléfono " + (i+1) + " *"));
               var grupo3 = document.createElement("div");
               grupo3.classList.add('group', 'flex');
               div3.appendChild(grupo3);
               var div6 = document.createElement("div");
               div6.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
               var icon3 = document.createElement("i");
               icon3.classList.add('mdi', 'mdi-cellphone', 'text-gray-400', 'text-lg');
               div6.appendChild(icon3);
               grupo3.appendChild(div6);
               var input3 = document.createElement("input");
               input3.type = "text";
               input3.name = "infa_rtelefono" + i;
               input3.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input3.setAttribute("data-msg", "Este campo es requerido");
               input3.setAttribute("placeholder", "Teléfono " +(i+1));
               grupo3.appendChild(input3);
            }
         }
    
         function AgregarBanco(){
            var number = document.getElementById("refban").value;
            var container = document.getElementById("ref");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
               var divcontainer = document.createElement("div");
               divcontainer.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'gap-5', 'md:gap-8', 'mt-5', 'mx-7', 'items-start');
               container.appendChild(divcontainer);
               var div = document.createElement("div");
               div.classList.add('grid', 'grid-cols-1');
               divcontainer.appendChild(div);
               var div2 = document.createElement("div");
               div2.classList.add('grid', 'grid-cols-1');
               divcontainer.appendChild(div2);
               var div3 = document.createElement("div");
               div3.classList.add('grid', 'grid-cols-1');
               divcontainer.appendChild(div3);
               var div7 = document.createElement("div");
               div7.classList.add('grid', 'grid-cols-1');
               divcontainer.appendChild(div7);
               var div9 = document.createElement("div");
               div9.classList.add('grid', 'grid-cols-1', 'mt-5', 'mx-7');
               container.appendChild(div9);
               div.appendChild(document.createTextNode("Nombre completo" + (i+1) + " *"));
               var grupo = document.createElement("div");
               grupo.classList.add('group', 'flex');
               div.appendChild(grupo);
               var div4 = document.createElement("div");
               div4.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
               var icon = document.createElement("i");
               icon.classList.add('mdi', 'mdi-account', 'text-gray-400', 'text-lg');
               div4.appendChild(icon);
               grupo.appendChild(div4);
               var input = document.createElement("input");
               input.type = "text";
               input.name = "infb_rnombre" + i;
               input.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input.setAttribute("data-msg", "Este campo es requerido"); 
               input.setAttribute("placeholder", "Nombre " +(i+1)); 
               grupo.appendChild(input);
               div2.appendChild(document.createTextNode("Parentesco " + (i+1) + " *"));
               var grupo2 = document.createElement("div");
               grupo2.classList.add('group', 'flex');
               div2.appendChild(grupo2);
               var div5 = document.createElement("div");
               div5.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
               var icon2 = document.createElement("i");
               icon2.classList.add('mdi', 'mdi-account-group', 'text-gray-400', 'text-lg');
               div5.appendChild(icon2);
               grupo2.appendChild(div5);
               var input2 = document.createElement("input");
               input2.type = "text";
               input2.name = "infb_rparentesco" + i;
               input2.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input2.setAttribute("data-msg", "Este campo es requerido");
               input2.setAttribute("placeholder", "Parentesco " +(i+1)); 
               grupo2.appendChild(input2);
               div3.appendChild(document.createTextNode("RFC " + (i+1) + " *"));
               var grupo3 = document.createElement("div");
               grupo3.classList.add('group', 'flex');
               div3.appendChild(grupo3);
               var div6 = document.createElement("div");
               div6.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
               var icon3 = document.createElement("i");
               icon3.classList.add('mdi', 'mdi-file-document-edit-outline', 'text-gray-400', 'text-lg');
               div6.appendChild(icon3);
               grupo3.appendChild(div6);
               var input3 = document.createElement("input");
               input3.type = "text";
               input3.name = "infb_rrfc" + i;
               input3.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input3.setAttribute("data-msg", "Este campo es requerido");
               input3.setAttribute("placeholder", "RFC " +(i+1)); 
               grupo3.appendChild(input3);
               div7.appendChild(document.createTextNode("CURP " + (i+1) + " *"));
               var grupo4 = document.createElement("div");
               grupo4.classList.add('group', 'flex');
               div7.appendChild(grupo4);
               var div8 = document.createElement("div");
               div8.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
               var icon4 = document.createElement("i");
               icon4.classList.add('mdi', 'mdi-format-list-numbered', 'text-gray-400', 'text-lg');
               div8.appendChild(icon4);
               grupo4.appendChild(div8);
               var input4 = document.createElement("input");
               input4.type = "text";
               input4.name = "infb_rcurp" + i;
               input4.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input4.setAttribute("data-msg", "Este campo es requerido");
               input4.setAttribute("placeholder", "CURP " +(i+1));  
               grupo4.appendChild(input4);
               div9.appendChild(document.createTextNode("Porcentaje de derecho " + (i+1) + " *"));
               var grupo5 = document.createElement("div");
               grupo5.classList.add('group', 'flex');
               div9.appendChild(grupo5);  
               var div10 = document.createElement("div");
               div10.classList.add('w-10', 'z-10', 'pl-1', 'text-center', 'pointer-events-none', 'flex', 'items-center', 'justify-center');
               var icon5 = document.createElement("i");
               icon5.classList.add('mdi', 'mdi-percent-box', 'text-gray-400', 'text-lg');
               div10.appendChild(icon5);
               grupo5.appendChild(div10);
               var input5 = document.createElement("input");
               input5.type = "text";
               input5.name = "infb_rporcentaje" + i;
               input5.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
               input5.setAttribute("data-msg", "Este campo es requerido");
               input5.setAttribute("placeholder", "Porcentaje de derecho " +(i+1)); 
               grupo5.appendChild(input5);     
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