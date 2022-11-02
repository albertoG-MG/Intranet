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

        <?php for($i = 1; $i <= $counttipospapeleria; $i++){
    echo (   "$('#upload-button{$i}').on('click', function () {
			 $('#infp_papeleria{$i}').click();
			 });

			$('#infp_papeleria{$i}').on('change', function () {
				if(!($('#infp_papeleria{$i}').get(0).files.length === 0)){
					var documento = $('#infp_papeleria{$i}').prop('files');
					$('#upload-text{$i}').html('');
					$('#upload-text{$i}').html(documento.length+ ' archivo seleccionado');
					$('#content-container{$i}').html('');
					$('#content-container{$i}').removeClass('grid grid-cols-1');
					$('#content-container{$i}').addClass('grid grid-cols-1');
					$('#upload-delete{$i}').addClass('z-100 md:p-2 my-auto');
					$('#upload-delete{$i}').removeClass('hidden');
					var ul = $('<ul id=\'lista{$i}\' class=\'break-all md:break-normal\'></ul>');
					$('#content-container{$i}').append(ul);
					$.each(documento, function(key, value) {
						var archivo = documento[key];
						if(archivo.type == 'application/pdf'){
							if(!(archivo.size > 10485760)){
								var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 303.188 303.188\' style=\'enable-background:new 0 0 303.188 303.188;\' xml:space=\'preserve\'><g>	<polygon style=\'fill:#E8E8E8;\' points=\'219.821,0 32.842,0 32.842,303.188 270.346,303.188 270.346,50.525 	\'/>	<path style=\'fill:#FB3449;\' d=\'M230.013,149.935c-3.643-6.493-16.231-8.533-22.006-9.451c-4.552-0.724-9.199-0.94-13.803-0.936		c-3.615-0.024-7.177,0.154-10.693,0.354c-1.296,0.087-2.579,0.199-3.861,0.31c-1.314-1.36-2.584-2.765-3.813-4.202		c-7.82-9.257-14.134-19.755-19.279-30.664c1.366-5.271,2.459-10.772,3.119-16.485c1.205-10.427,1.619-22.31-2.288-32.251		c-1.349-3.431-4.946-7.608-9.096-5.528c-4.771,2.392-6.113,9.169-6.502,13.973c-0.313,3.883-0.094,7.776,0.558,11.594		c0.664,3.844,1.733,7.494,2.897,11.139c1.086,3.342,2.283,6.658,3.588,9.943c-0.828,2.586-1.707,5.127-2.63,7.603		c-2.152,5.643-4.479,11.004-6.717,16.161c-1.18,2.557-2.335,5.06-3.465,7.507c-3.576,7.855-7.458,15.566-11.815,23.02		c-10.163,3.585-19.283,7.741-26.857,12.625c-4.063,2.625-7.652,5.476-10.641,8.603c-2.822,2.952-5.69,6.783-5.941,11.024		c-0.141,2.394,0.807,4.717,2.768,6.137c2.697,2.015,6.271,1.881,9.4,1.225c10.25-2.15,18.121-10.961,24.824-18.387		c4.617-5.115,9.872-11.61,15.369-19.465c0.012-0.018,0.024-0.036,0.037-0.054c9.428-2.923,19.689-5.391,30.579-7.205		c4.975-0.825,10.082-1.5,15.291-1.974c3.663,3.431,7.621,6.555,11.939,9.164c3.363,2.069,6.94,3.816,10.684,5.119		c3.786,1.237,7.595,2.247,11.528,2.886c1.986,0.284,4.017,0.413,6.092,0.335c4.631-0.175,11.278-1.951,11.714-7.57		C231.127,152.765,230.756,151.257,230.013,149.935z M119.144,160.245c-2.169,3.36-4.261,6.382-6.232,9.041		c-4.827,6.568-10.34,14.369-18.322,17.286c-1.516,0.554-3.512,1.126-5.616,1.002c-1.874-0.11-3.722-0.937-3.637-3.065		c0.042-1.114,0.587-2.535,1.423-3.931c0.915-1.531,2.048-2.935,3.275-4.226c2.629-2.762,5.953-5.439,9.777-7.918		c5.865-3.805,12.867-7.23,20.672-10.286C120.035,158.858,119.587,159.564,119.144,160.245z M146.366,75.985		c-0.602-3.514-0.693-7.077-0.323-10.503c0.184-1.713,0.533-3.385,1.038-4.952c0.428-1.33,1.352-4.576,2.826-4.993		c2.43-0.688,3.177,4.529,3.452,6.005c1.566,8.396,0.186,17.733-1.693,25.969c-0.299,1.31-0.632,2.599-0.973,3.883		c-0.582-1.601-1.137-3.207-1.648-4.821C147.945,83.048,146.939,79.482,146.366,75.985z M163.049,142.265		c-9.13,1.48-17.815,3.419-25.979,5.708c0.983-0.275,5.475-8.788,6.477-10.555c4.721-8.315,8.583-17.042,11.358-26.197		c4.9,9.691,10.847,18.962,18.153,27.214c0.673,0.749,1.357,1.489,2.053,2.22C171.017,141.096,166.988,141.633,163.049,142.265z		 M224.793,153.959c-0.334,1.805-4.189,2.837-5.988,3.121c-5.316,0.836-10.94,0.167-16.028-1.542		c-3.491-1.172-6.858-2.768-10.057-4.688c-3.18-1.921-6.155-4.181-8.936-6.673c3.429-0.206,6.9-0.341,10.388-0.275		c3.488,0.035,7.003,0.211,10.475,0.664c6.511,0.726,13.807,2.961,18.932,7.186C224.588,152.585,224.91,153.321,224.793,153.959z\'/>	<polygon style=\'fill:#FB3449;\' points=\'227.64,25.263 32.842,25.263 32.842,0 219.821,0 	\'/>	<g>		<path style=\'fill:#A4A9AD;\' d=\'M126.841,241.152c0,5.361-1.58,9.501-4.742,12.421c-3.162,2.921-7.652,4.381-13.472,4.381h-3.643			v15.917H92.022v-47.979h16.606c6.06,0,10.611,1.324,13.652,3.971C125.321,232.51,126.841,236.273,126.841,241.152z			 M104.985,247.387h2.363c1.947,0,3.495-0.546,4.644-1.641c1.149-1.094,1.723-2.604,1.723-4.529c0-3.238-1.794-4.857-5.382-4.857			h-3.348C104.985,236.36,104.985,247.387,104.985,247.387z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M175.215,248.864c0,8.007-2.205,14.177-6.613,18.509s-10.606,6.498-18.591,6.498h-15.523v-47.979			h16.606c7.701,0,13.646,1.969,17.836,5.907C173.119,235.737,175.215,241.426,175.215,248.864z M161.76,249.324			c0-4.398-0.87-7.657-2.609-9.78c-1.739-2.122-4.381-3.183-7.926-3.183h-3.773v26.877h2.888c3.939,0,6.826-1.143,8.664-3.43			C160.841,257.523,161.76,254.028,161.76,249.324z\'/>		<path style=\'fill:#A4A9AD;\' d=\'M196.579,273.871h-12.766v-47.979h28.355v10.403h-15.589v9.156h14.374v10.403h-14.374			L196.579,273.871L196.579,273.871z\'/>	</g>	<polygon style=\'fill:#D1D3D3;\' points=\'219.821,50.525 270.346,50.525 219.821,0 	\'/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>');
								$('#lista{$i}').append(list);
							}else{
								$('#content-container{$i}').html('');
								$('#content-container{$i}').removeClass('grid grid-cols-1');
								$('#infp_papeleria{$i}').val('');
								$('#upload-text{$i}').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
								$('#upload-delete{$i}').addClass('hidden');
								$('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
                            }
						}else if(archivo.type == 'image/jpeg'){
							if(!(archivo.size > 10485760)){
								var list = $('<li id=\'papeleria{$i}\' class=\'flex flex-wrap\'><svg style=\'width:24px; heigth:24px;\' version=\'1.1\' id=\'Layer_1\' xmlns=\'http://www.w3.org/2000/svg\' xmlns:xlink=\'http://www.w3.org/1999/xlink\' x=\'0px\' y=\'0px\'	 viewBox=\'0 0 512.001 512.001\' style=\'enable-background:new 0 0 512.001 512.001;\' xml:space=\'preserve\'><path style=\'fill:#6DABE4;\' d=\'M455.475,503.774H56.524c-9.613,0-17.406-7.793-17.406-17.406V25.632	c0-9.613,7.793-17.406,17.406-17.406h398.95c9.613,0,17.406,7.793,17.406,17.406v460.736	C472.88,495.98,465.088,503.774,455.475,503.774z\'/><path style=\'opacity:0.15;enable-background:new    ;\' d=\'M85.396,477.875c-9.613,0-17.406-7.793-17.406-17.406V8.226H56.524	c-9.613,0-17.406,7.793-17.406,17.406v460.736c0,9.613,7.793,17.405,17.406,17.405h398.95c9.613,0,17.406-7.793,17.406-17.405	v-8.494H85.396z\'/><path style=\'fill:#FFFFFF;\' d=\'M403.547,379.313H108.452c-3.678,0-6.659-2.981-6.659-6.658V77.561c0-3.678,2.981-6.659,6.659-6.659	h295.093c3.678,0,6.658,2.981,6.658,6.659v295.094C410.204,376.332,407.223,379.313,403.547,379.313z\'/><circle style=\'fill:#FFB547;\' cx=\'200.999\' cy=\'143.414\' r=\'38.958\'/><path style=\'fill:#4C9462;\' d=\'M274.461,274.643c-10.745,0-20.942,2.312-30.153,6.435c-13.325-13.042-31.554-21.091-51.672-21.091	c-14.665,0-28.321,4.29-39.814,11.659c-11.493-7.368-25.148-11.659-39.814-11.659c-3.813,0-7.557,0.29-11.215,0.847v111.82	c0,3.678,2.981,6.658,6.659,6.658h233.18c4.302-9.373,6.718-19.791,6.718-30.779C348.352,307.726,315.269,274.643,274.461,274.643z\'	/><path style=\'fill:#8D6645;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0L188.713,379.313h214.833	c3.678,0,6.658-2.981,6.658-6.658V252.621L352.717,153.049z\'/><path style=\'fill:#99DAEA;\' d=\'M352.717,153.049c-7.416-12.844-25.955-12.844-33.371,0l-41.055,71.11	c17.3,8.931,36.93,13.977,57.741,13.977s40.441-5.047,57.741-13.977L352.717,153.049z\'/><polygon style=\'opacity:0.1;enable-background:new    ;\' points=\'188.713,379.313 226.521,379.313 313.42,163.313 \'/><path style=\'fill:#1E252B;\' d=\'M403.547,62.676H108.452c-8.208,0-14.885,6.678-14.885,14.885v295.093	c0,8.208,6.678,14.884,14.885,14.884h295.093c8.208,0,14.885-6.677,14.885-14.884V77.561	C418.431,69.353,411.754,62.676,403.547,62.676z M401.978,371.086H110.021V79.128h291.958v291.957H401.978z M455.475,0H56.524	C42.39,0,30.892,11.498,30.892,25.632v460.736c0,14.134,11.498,25.632,25.632,25.632h398.951c14.134,0,25.632-11.498,25.632-25.632	V25.632C481.108,11.498,469.609,0,455.475,0z M464.655,486.368c0,5.061-4.118,9.18-9.18,9.18H56.524c-5.061,0-9.18-4.118-9.18-9.18	V25.632c0-5.061,4.118-9.18,9.18-9.18h398.951c5.061,0,9.18,4.118,9.18,9.18L464.655,486.368L464.655,486.368z\'/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'+archivo.name+'</li>'); 
								$('#lista{$i}').append(list);
							}else{
								$('#content-container{$i}').html('');
								$('#content-container{$i}').removeClass('grid grid-cols-1');
								$('#infp_papeleria{$i}').val('');
								$('#upload-text{$i}').html('<p style=\' color: rgb(244 63 94); \'>El archivo pesa más de 10 mb, intente de nuevo</p>');
								$('#upload-delete{$i}').addClass('hidden');
								$('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
                            }
						}else{
							$('#content-container{$i}').html('');
							$('#content-container{$i}').removeClass('grid grid-cols-1');
							$('#infp_papeleria{$i}').val('');
							$('#upload-text{$i}').html('<p style=\' color: rgb(244 63 94); \'>Subió archivos no validos, solo se aceptan pdfs y jpgs, intente de nuevo</p>');
							$('#upload-delete{$i}').addClass('hidden');
							$('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');
						}
					})
				}
			});

			$('#upload-delete{$i}').on('click', function () {
				$('#content-container{$i}').html('');
				$('#content-container{$i}').removeClass('grid grid-cols-1');
				$('#infp_papeleria{$i}').val('');
				$('#upload-text{$i}').html('No hay ningún archivo seleccionado');
				$('#upload-delete{$i}').addClass('hidden');
				$('#upload-delete{$i}').removeClass('z-100 md:p-2 my-auto');	
			});
		");
   } ?>

        $('#prueba').select2({
            theme: ["tailwind"],
            placeholder: '-- Seleccione --',
            "language": {
                "noResults": function(){
                    return "No hay resultados";
                }
            }
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

        $.validator.addMethod('filesize', function(value, element, param) {
         return this.optional(element) || (element.files[0].size <= param * 1000000)
      }, 'File size must be less than {0} MB');


        if($('#Guardar').length > 0 ){
            $('#Guardar').validate({
                ignore: [],
                    errorPlacement: function(error, element) {
                        if($(element).attr("type") === "file"){
                            error.insertAfter($(element));
                        }else{
                            error.insertAfter(element.parent('.group.flex'));
                        }
                    },
                    invalidHandler: function(e, validator){
                        if(!($('#error-container').length)){
                            this.$div = $('<div id="error-container" class="grid grid-cols-1 mt-5 mx-7"><div class="bg-red-50 border-l-8 border-red-900 mb-2"><div class="flex items-center"><div class="p-2"><div class="flex items-center"><div class="ml-2"><svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><p class="px-6 py-4 text-red-900 font-semibold text-lg">Por favor, arregla los siguientes errores.</p></div><div id="arrayerrors" class="px-16 mb-4"></div></div></div></div>').insertBefore("#tabs");
                        }
                        $("#arrayerrors").html(""); 
                        $.each(validator.errorMap, function( index, value ) { 
                            this.$arrayerror = $('<li class="text-md font-bold text-red-500 text-sm">'+index+ ": " +validator.errorMap[index]+'</li>');
                            $("#arrayerrors").append(this.$arrayerror);
                        });
                        if(validator.errorList.length){
                            var taberror = jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id');
                            if(taberror != "fourth"){
                                $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").removeClass("hidden") + '"]');
                                $('#tabs > li > a[href="#'+taberror+'"]').addClass("active").parent().addClass("border-blue-400 opacity-100");
                                $('#tabs > li > a:last').removeClass("active").parent().removeClass("border-blue-400 opacity-100");
                                $("#tab-contents > div:last").addClass("hidden");
                            }
                        }
                    },
                    highlight: function(element) {
                        var elem = $(element);
                        if (elem.hasClass("select2-hidden-accessible")) {
                            $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().addClass("border-2 border-rose-500 border-2"); 
                        }else{
                            $(element).removeClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
                            $(element).addClass("border-2 border-rose-500 focus:ring-rose-600");
                        }
                    },
                    unhighlight: function(element) {
                        var elem = $(element);
                        if (elem.hasClass("select2-hidden-accessible")) {
                            $("#select2-" + elem.attr("id") + "-container").parent().parent().parent().removeClass("border-2 border-rose-500 border-2");
                        }else{
                            $(element).removeClass("border-2 border-rose-500 focus:ring-rose-600");
                            $(element).addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
                        }
                    },
                rules:{
                    prueba: {
                        required:true
                    },
                    numempleado: {
	                    remote: "../ajax/expedientes/check_num_empleado.php"
                    },
                    ninterior: {
	                    digits:true
                    },
                    nexterior: {
	                    digits:true
                    },
                    codigo: {
	                    digits:true
                    },
                    teldom: {
	                    digits:true
                    },
                    fechaalta: {
	                    required:true
                    },
                    salario_contrato: {
	                    number:true
                    },
                    salario_fechaalta: {
	                    number:true
                    },
                    emergenciatel: {
	                    digits:true
                    },
                    emergenciatel2: {
	                    digits:true
                    },
                    cuenta_personal: {
	                    digits:true
                    },
                    clabe_personal: {
	                    digits:true
                    },
                    cuenta_nomina: {
	                    digits:true
                    },
                    clabe_nomina: {
	                    digits:true
                    }
                },
                messages:{
                    prueba:{
                        required: 'Este campo es requerido'
                    },
                    numempleado: {
	                    remote: "Este número de empleado ya existe, por favor, eliga otro"
                    },
                    ninterior: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    nexterior: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    codigo: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    teldom: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    fechaalta: {
	                    required: 'Este campo es requerido'
                    },
                    salario_contrato: {
	                    number: "Por favor, ingrese solamente numeros ó decimales"
                    },
                    salario_fechaalta: {
	                    number: "Por favor, ingrese solamente numeros ó decimales"
                    },
                    emergenciatel: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    emergenciatel2: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    cuenta_personal: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    clabe_personal: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    cuenta_nomina: {
	                    digits: 'Por favor, ingrese solamente números'
                    },
                    clabe_nomina: {
	                    digits: 'Por favor, ingrese solamente números'
                    }
                },
                submitHandler: function(form) {
                    $('#submit-button').html(
                        '<button disabled type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 text-center mr-2 inline-flex items-center">'+
                            '<svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                            '<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>'+
                            '<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>'+
                            '</svg>'+
                            'Cargando...'+
                        '</button>');
                    check_user_logged().then((response) => {
		                if(response == "true"){
                            var fd = new FormData();

                            /*Inputs*/
                            var select2 = $("#prueba").val();
                            var numempleado = $("#numempleado").val();
                            var puesto = $("#puesto").val();
                            var estudios = $("#estudios").val();
                            var calle = $("#calle").val();
                            var ninterior = $("#ninterior").val();
                            var nexterior = $("#nexterior").val();
                            var colonia = $("#colonia").val();
                            var estado = $("#estado").val();
                            var municipio = $("#municipio").val();
                            var codigo = $("#codigo").val();
                            var teldom = $("#teldom").val();
                            var posee_telmov = $("input[name=tel_movil]:checked", "#Guardar").val();
                            var telmov = $("#telmov").val();
                            var posee_telempresa = $("input[name=tel_movil_empresa]:checked", "#Guardar").val();
                            var marcacion = $("#marcacion").val();
		                    var serie = $("#serie").val();
		                    var sim = $("#sim").val();
                            var numred = $("#numred").val();
		                    var modelotel = $("#modelotel").val();
		                    var marcatel = $("#marcatel").val();
                            var radio = $("input[name=casa]:checked", "#Guardar").val();
                            var ecivil = $("#ecivil").val();
                            var posee_retencion = $("input[name=retencion]:checked", "#Guardar").val();
                            var monto_mensual = $("#monto_mensual").val();
                            var fechanac = $("#fechanac").val();
                            var fechacon = $("#fechacon").val();
                            var fechaalta = $("#fechaalta").val();
                            var salario_contrato = $("#salario_contrato").val();
		                    var salario_fechaalta = $("#salario_fechaalta").val();
                            var observaciones = $("#observaciones").val();
                            var curp = $("#curp").val();
                            var nss = $("#nss").val();
                            var rfc = $("#rfc").val();
                            var tipoidentificacion = $("#identificacion").val();
                            var numeroidentificacion = $("#numeroidentificacion").val();
                            var capacitacion = $("#capacitacion").val();
                            var fechauniforme = $("#fechauniforme").val();
                            var cantidadpolo = $("#cantidadpolo").val();
                            var tallapolo = $("#tallapolo").val();
                            var emergencianom = $("#emergencianom").val();
                            var emergenciaparentesco = $("#emergenciaparentesco").val();
                            var emergenciatel = $("#emergenciatel").val();
                            var emergencianom2 = $("#emergencianom2").val();
                            var emergenciaparentesco2 = $("#emergenciaparentesco2").val();
                            var emergenciatel2 = $("#emergenciatel2").val();
                            var antidoping = $("#antidoping").val();
                            var vacante = $("#vacante").val();
                            var radio2 = $("input[name=empresa]:checked", "#Guardar").val();
                            var nomfam = $("#nomfam").val();
                            var banco_personal = $("#banco_personal").val();
		                    var cuenta_personal = $("#cuenta_personal").val();
		                    var clabe_personal = $("#clabe_personal").val();
                            var banco_nomina = $("#banco_nomina").val();
		                    var cuenta_nomina = $("#cuenta_nomina").val();
		                    var clabe_nomina = $("#clabe_nomina").val();
		                    var plastico = $("#plastico").val();
                            var method = "store";
                            var app = "expediente";

                            /*Referencias laborales*/
                            var nreflab =  $("input[name=reflab]").val();
                            var reflab = [];
                            for(var i=0; i <nreflab; i++){
                                var rnombre = $("input[name=infa_rnombre" +i+ "]").val();
                                var rparentesco = $("input[name=infa_rparentesco" +i+ "]").val();
                                var rtelefono = $("input[name=infa_rtelefono" +i+ "]").val();
                                reflab[i] = {nombre: rnombre, parentesco: rparentesco, telefono: rtelefono};
                            }

                            /*Referencias bancarias*/
                            var nrefbanc =  $("input[name=refban]").val();
                            var refbanc = [];
                            for(var i=0; i <nrefbanc; i++){
                                var brnombre = $("input[name=infb_rnombre" +i+ "]").val();
                                var brparentesco = $("input[name=infb_rparentesco" +i+ "]").val();
                                var brrfc = $("input[name=infb_rrfc" +i+ "]").val();
                                var brcurp = $("input[name=infb_rcurp" +i+ "]").val();
                                var brporcentaje = $("input[name=infb_rporcentaje" +i+ "]").val();
                                refbanc[i] = {nombre: brnombre, parentesco: brparentesco, rfc: brrfc, curp: brcurp, porcentaje: brporcentaje};
                            }

                            /*File uploads*/
                            <?php 
                            for($i = 1; $i <= $counttipospapeleria; $i++){
                                echo ("
                                    var papeleria{$i} = $('#infp_papeleria{$i}')[0].files[0];
                                ");
                            } 
                            ?>

                            /*FD appends*/

                            /*Inputs*/
                            fd.append('select2', select2);
                            fd.append('numempleado', numempleado);
                            fd.append('puesto', puesto);
                            fd.append('estudios', estudios);
                            fd.append('calle', calle);
                            fd.append('ninterior', ninterior);
                            fd.append('nexterior', nexterior);
                            fd.append('colonia', colonia);
                            fd.append('estado', estado);
                            fd.append('municipio', municipio);
                            fd.append('codigo', codigo);
                            fd.append('teldom', teldom);
                            fd.append('posee_telmov', posee_telmov);
                            fd.append('telmov', telmov);
                            fd.append('posee_telempresa', posee_telempresa);
                            fd.append('marcacion', marcacion);
		                    fd.append('serie', serie);
		                    fd.append('sim', sim);
                            fd.append('numred', numred);
		                    fd.append('modelotel', modelotel);
		                    fd.append('marcatel', marcatel);
                            fd.append('radio', radio);
                            fd.append('ecivil', ecivil);
                            fd.append('posee_retencion', posee_retencion);
                            fd.append('monto_mensual', monto_mensual);
                            fd.append('fechanac', fechanac);
                            fd.append('fechacon', fechacon);
                            fd.append('fechaalta', fechaalta);
                            fd.append('salario_contrato', salario_contrato);
		                    fd.append('salario_fechaalta', salario_fechaalta);
                            fd.append('observaciones', observaciones);
                            fd.append('curp', curp);
                            fd.append('nss', nss);
                            fd.append('rfc', rfc);
                            fd.append('identificacion', tipoidentificacion);
                            fd.append('numeroidentificacion', numeroidentificacion);
                            fd.append('capacitacion', capacitacion);
                            fd.append('fechauniforme', fechauniforme);
                            fd.append('cantidadpolo', cantidadpolo);
                            fd.append('tallapolo', tallapolo);
                            fd.append('emergencianom', emergencianom);
                            fd.append('emergenciaparentesco', emergenciaparentesco);
                            fd.append('emergenciatel', emergenciatel);
                            fd.append('emergencianom2', emergencianom2);
                            fd.append('emergenciaparentesco2', emergenciaparentesco2);
                            fd.append('emergenciatel2', emergenciatel2);
                            fd.append('antidoping', antidoping);
                            fd.append('vacante', vacante);
                            fd.append('radio2', radio2);
                            fd.append('nomfam', nomfam);
                            fd.append('banco_personal', banco_personal);
		                    fd.append('cuenta_personal', cuenta_personal);
		                    fd.append('clabe_personal', clabe_personal);
                            fd.append('banco_nomina', banco_nomina);
		                    fd.append('cuenta_nomina', cuenta_nomina);
		                    fd.append('clabe_nomina', clabe_nomina);
		                    fd.append('plastico', plastico);
                            fd.append('method', method);
                            fd.append('app', app);
                            

                            /*Referencias*/
                            fd.append('referencias', JSON.stringify(reflab));
                            fd.append('refbanc', JSON.stringify(refbanc));

                            /*File uploads*/
                            <?php 
                            for($i = 1; $i <= $counttipospapeleria; $i++){
                                echo ("
                                    fd.append('papeleria{$i}', papeleria{$i});
                                ");
                            } 
                            ?>


                            /*Ajax*/
                            $.ajax({
                                type: "POST",
                                url: "../ajax/class_search.php",
                                data: fd,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    response = response.replace(/[\r\n]/gm, '');
                                    if(response == "success"){
                                        Swal.fire({
                                            title: "Expediente Creado",
                                            text: "Se ha creado un expediente exitosamente!",
                                            icon: "success"
                                        }).then(function() {
                                            $('#submit-button').html("<button disabled class='focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2' type='submit' id='finish' name='finish'>Guardar</button>");
                                            window.location.href = "expedientes.php";	
                                        });
                                    }
                                }
                            });
                        }else{
                            Swal.fire({
                                title: "Ocurrió un error",
                                text: "Su sesión expiró ó limpio el caché del navegador ó cerro sesión, por favor, vuelva a iniciar sesión!",
                                icon: "error"
                            }).then(function() {
                                $('#submit-button').html("<button disabled class='focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2' type='submit' id='finish' name='finish'>Guardar</button>");
                                window.location.href = "login.php";
                            });
                        }
                    }).catch((error) => {
		                console.log(error);
	                })
					return false;
                }
            });
        }
        if(($('input[type=radio][name=tel_movil]:checked').val() === "si")){
            document.getElementById("div_movil").classList.remove('hidden');
	        $("#telmov").rules("add", {
		        required: true,
		        digits:true,
		        messages: {
			        required: "Por favor, ingrese el télefono",
			        digits: "Por favor, ingrese solamente números"
		        }
	        });
        }else if($('input[type=radio][name=tel_movil]:checked').val() === "no"){
            document.getElementById("div_movil").classList.add('hidden');
            $("#telmov").val('');
            $("#telmov").rules("remove");
            $("#telmov").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
            $("#telmov").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
            $("#telmov-error").css("display", "none");
        }

        $('input[type=radio][name=tel_movil]').on('change', function () {
	        if(($('input[type=radio][name=tel_movil]:checked').val() === "si")){
		        document.getElementById("div_movil").classList.remove('hidden');
		        $("#telmov").rules("add", {
			        required: true,
			        digits:true,
			        messages: {
				        required: "Por favor, ingrese el télefono",
				        digits: "Por favor, ingrese solamente números"
			        }
		        });
            }else if($('input[type=radio][name=tel_movil]:checked').val() === "no"){
                document.getElementById("div_movil").classList.add('hidden');
                $("#telmov").val('');
                $("#telmov").rules("remove");
                $("#telmov").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                $("#telmov").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
                $("#telmov-error").css("display", "none");
            }
        });
		if(($('input[type=radio][name=tel_movil_empresa]:checked').val() === "si")){
            document.getElementById("div_movil_empresa").classList.remove('hidden');
			$("#marcacion").rules("add", {
				required: true,
				digits:true,
				messages: {
					required: "Por favor, ingrese la marcación",
					digits: "Por favor, ingrese solamente números"
				}
			});
			$("#serie").rules("add", {
				required: true,
				messages: {
					required: "Por favor, ingrese la serie"
				}
			});
			$("#sim").rules("add", {
				required: true,
				digits: true,
				messages: {
					required: "Por favor, ingrese un número SIM",
					digits: "Por favor, ingrese solamente numeros"
				}
			});
            $("#numred").rules("add", {
                required: true,
                digits:true,
                messages: {
                    required: "Por favor, ingrese el número de red",
                    digits: "Por favor, ingrese solamente números"
                }
            });
            $("#modelotel").rules("add", {
                required: true,
                messages: {
                    required: "Por favor, ingrese el modelo"
                }
            });
            $("#marcatel").rules("add", {
                required: true,
                messages: {
                    required: "Por favor, ingrese la marca"
                }
            });
        }else if($('input[type=radio][name=tel_movil_empresa]:checked').val() === "no"){
            document.getElementById("div_movil_empresa").classList.add('hidden');
			$("#marcacion").val('');
			$("#marcacion").rules("remove");
			$("#marcacion").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
			$("#marcacion").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
			$("#marcacion-error").css("display", "none");
			$("#serie").val('');
			$("#serie").rules("remove");
			$("#serie").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
			$("#serie").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
			$("#serie-error").css("display", "none");
			$("#sim").val('');
			$("#sim").rules("remove");
			$("#sim").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
			$("#sim").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
			$("#sim-error").css("display", "none");
            $("#numred").val('');
            $("#numred").rules("remove");
            $("#numred").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
            $("#numred").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
            $("#numred-error").css("display", "none");
            $("#modelotel").val('');
            $("#modelotel").rules("remove");
            $("#modelotel").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
            $("#modelotel").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
            $("#modelotel-error").css("display", "none");
            $("#marcatel").val('');
            $("#marcatel").rules("remove");
            $("#marcatel").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
            $("#marcatel").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
            $("#marcatel-error").css("display", "none");	
            
        }

        $('input[type=radio][name=tel_movil_empresa]').on('change', function () {
            if(($('input[type=radio][name=tel_movil_empresa]:checked').val() === "si")){
                document.getElementById("div_movil_empresa").classList.remove('hidden');
				$("#marcacion").rules("add", {
					required: true,
					digits:true,
					messages: {
						required: "Por favor, ingrese la marcación",
						digits: "Por favor, ingrese solamente números"
					}
				});
				$("#serie").rules("add", {
					required: true,
					messages: {
						required: "Por favor, ingrese la serie"
					}
				});
				$("#sim").rules("add", {
					required: true,
					digits: true,
					messages: {
						required: "Por favor, ingrese un número SIM",
						digits: "Por favor, ingrese solamente numeros"
					}
				});
                $("#numred").rules("add", {
                    required: true,
                    digits:true,
                    messages: {
                        required: "Por favor, ingrese el número de red",
                        digits: "Por favor, ingrese solamente números"
                    }
                });
                $("#modelotel").rules("add", {
                    required: true,
                    messages: {
                        required: "Por favor, ingrese el modelo"
                    }
                });
                $("#marcatel").rules("add", {
                    required: true,
                    messages: {
                        required: "Por favor, ingrese la marca"
                    }
                });	
            }else if($('input[type=radio][name=tel_movil_empresa]:checked').val() === "no"){
                document.getElementById("div_movil_empresa").classList.add('hidden');
				$("#marcacion").val('');
				$("#marcacion").rules("remove");
				$("#marcacion").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                $("#marcacion").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
				$("#marcacion-error").css("display", "none");
				$("#serie").val('');
				$("#serie").rules("remove");
				$("#serie").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                $("#serie").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
				$("#serie-error").css("display", "none");
				$("#sim").val('');
				$("#sim").rules("remove");
				$("#sim").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                $("#sim").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
				$("#sim-error").css("display", "none");
                $("#numred").val('');
                $("#numred").rules("remove");
                $("#numred").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                $("#numred").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
                $("#numred-error").css("display", "none");
                $("#modelotel").val('');
                $("#modelotel").rules("remove");
                $("#modelotel").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                $("#modelotel").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
                $("#modelotel-error").css("display", "none");
                $("#marcatel").val('');
                $("#marcatel").rules("remove");
                $("#marcatel").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
                $("#marcatel").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
                $("#marcatel-error").css("display", "none");				
            }
        });
		if(($('input[type=radio][name=retencion]:checked').val() === "si")){
			document.getElementById("div_retencion").classList.remove('hidden');
			$("#monto_mensual").rules("add", {
				required: true,
				number: true,
				messages: {
					required: "Por favor, ingrese el monto mensual",
					number: "Por favor, ingrese solamente numeros ó decimales"
				}
			});

		}else if($('input[type=radio][name=retencion]:checked').val() === "no"){
			document.getElementById("div_retencion").classList.add('hidden');
			$("#monto_mensual").val('');
			$("#monto_mensual").rules("remove");
			$("#monto_mensual").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
			$("#monto_mensual").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
			$("#monto_mensual-error").css("display", "none");
		}

		$('input[type=radio][name=retencion]').on('change', function () {
			if(($('input[type=radio][name=retencion]:checked').val() === "si")){
				document.getElementById("div_retencion").classList.remove('hidden');
				$("#monto_mensual").rules("add", {
					required: true,
					number: true,
					messages: {
						required: "Por favor, ingrese el monto mensual",
						number: "Por favor, ingrese solamente numeros ó decimales"
					}
				});
			}else if($('input[type=radio][name=retencion]:checked').val() === "no"){
				document.getElementById("div_retencion").classList.add('hidden');
				$("#monto_mensual").val('');
				$("#monto_mensual").rules("remove");
				$("#monto_mensual").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
				$("#monto_mensual").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
				$("#monto_mensual-error").css("display", "none");
			}
		});
		if(($('input[type=radio][name=empresa]:checked').val() === "si")){
            document.getElementById("famnom").classList.remove('hidden');
            $("#nomfam").rules("add", {
				required: true,
				messages: {
					required: "Por favor, ingrese el nombre completo del familiar"
				}
			});
        }else if($('input[type=radio][name=empresa]:checked').val() === "no"){
            document.getElementById("famnom").classList.add('hidden');
            $("#nomfam").val('');
			$("#nomfam").rules("remove");
			$("#nomfam").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
			$("#nomfam").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
			$("#nomfam-error").css("display", "none");
        }

        $('input[type=radio][name=empresa]').on('change', function () {
            if(($('input[type=radio][name=empresa]:checked').val() === "si")){
                document.getElementById("famnom").classList.remove('hidden');
				$("#nomfam").rules("add", {
					required: true,
					messages: {
						required: "Por favor, ingrese el nombre completo del familiar"
					}
				});
            }else if($('input[type=radio][name=empresa]:checked').val() === "no"){
                document.getElementById("famnom").classList.add('hidden');
                $("#nomfam").val('');
				$("#nomfam").rules("remove");
				$("#nomfam").removeClass("error border-2 border-rose-500 focus:ring-rose-600");
				$("#nomfam").addClass("border border-gray-200 focus:ring-2 focus:ring-black focus:border-transparent");
				$("#nomfam-error").css("display", "none");
            }
        });
    });

    $('#prueba').select2({}).on("change", function (e) {
        $(this).valid()
    });

    function check_user_logged(){
        return new Promise((resolve, reject) => {
            $.ajax({
                type: "POST",
                url: "../ajax/check_user_logged.php",
                data:{
                    pagina: <?php echo "\"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\"";?>
                },
                success: function (response) {
                    resolve(response)
                },
                error: function (error) {
                    reject(error)
                }
            });
        })
    }

    function AgregarReferencias(){
        var number = document.getElementById("reflab").value;
        var container = document.getElementById("referencias");
        var childrenCount = container.childElementCount;
        var count = childrenCount + 1;
        var result = 0;
        if (number == 0) {
            childrenCount = 0;
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }
        } else {
            if (number < childrenCount) {
                result = childrenCount - number;
                for (j = 0; j < result; j++) {
                    container.removeChild(container.lastChild);
                }
            } else if (number > childrenCount) {
                result = number - childrenCount;
                for (i=0;i<result;i++){
                    var divrow = document.createElement("div");
                    divrow.classList.add('grid', 'grid-cols-1', 'lg:grid-cols-3', 'gap-5', 'md:gap-8', 'mt-5', 'mx-7', 'items-start');
                    container.appendChild(divrow);
                    var div = document.createElement("div");
                    div.classList.add('grid', 'grid-cols-1');
                    divrow.appendChild(div);
                    var div2 = document.createElement("div");
                    div2.classList.add('grid', 'grid-cols-1');
                    divrow.appendChild(div2);
                    var div3 = document.createElement("div");
                    div3.classList.add('grid', 'grid-cols-1');
                    divrow.appendChild(div3);
                    div.appendChild(document.createTextNode("Nombre completo" + (count) + " *"));
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
                    input.name = "infa_rnombre" + childrenCount;
                    input.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
                    input.setAttribute("data-msg", "Este campo es requerido");
                    input.setAttribute("placeholder", "Nombre " +(count)); 
                    grupo.appendChild(input);
                    div2.appendChild(document.createTextNode("Parentesco " + (count) + " *"));
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
                    input2.name = "infa_rparentesco" + childrenCount;
                    input2.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
                    input2.setAttribute("data-msg", "Este campo es requerido");
                    input2.setAttribute("placeholder", "Parentesco " +(count));
                    grupo2.appendChild(input2);
                    div3.appendChild(document.createTextNode("Teléfono " + (count) + " *"));
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
                    input3.name = "infa_rtelefono" + childrenCount;
                    input3.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
                    input3.setAttribute("data-msg", "Este campo es requerido");
                    input3.setAttribute("placeholder", "Teléfono " +(count));
                    grupo3.appendChild(input3);
                    count++;
                    childrenCount++;
                }
            }
        }
     }
    
     function AgregarBanco(){
        var number = document.getElementById("refban").value;
        var container = document.getElementById("ref");
        var childrenCount = container.childElementCount;
        var count = childrenCount + 1;
        var result = 0;
        if (number == 0) {
            childrenCount = 0;
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }
        } else {
            if (number < childrenCount) {
                result = childrenCount - number;
                for (j = 0; j < result; j++) {
                    container.removeChild(container.lastChild);
                }
            } else if (number > childrenCount) {
                result = number - childrenCount;
                for (i=0;i<result;i++){
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
                    div9.classList.add('grid', 'grid-cols-1', 'col-span-1', 'md:col-span-2');
                    divcontainer.appendChild(div9);
                    div.appendChild(document.createTextNode("Nombre completo" + (count) + " *"));
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
                    input.name = "infb_rnombre" + childrenCount;
                    input.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
                    input.setAttribute("data-msg", "Este campo es requerido"); 
                    input.setAttribute("placeholder", "Nombre " +(count)); 
                    grupo.appendChild(input);
                    div2.appendChild(document.createTextNode("Parentesco " + (count) + " *"));
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
                    input2.name = "infb_rparentesco" + childrenCount;
                    input2.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
                    input2.setAttribute("data-msg", "Este campo es requerido");
                    input2.setAttribute("placeholder", "Parentesco " +(count)); 
                    grupo2.appendChild(input2);
                    div3.appendChild(document.createTextNode("RFC " + (count) + " *"));
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
                    input3.name = "infb_rrfc" + childrenCount;
                    input3.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
                    input3.setAttribute("data-msg", "Este campo es requerido");
                    input3.setAttribute("placeholder", "RFC " +(count)); 
                    grupo3.appendChild(input3);
                    div7.appendChild(document.createTextNode("CURP " + (count) + " *"));
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
                    input4.name = "infb_rcurp" + childrenCount;
                    input4.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
                    input4.setAttribute("data-msg", "Este campo es requerido");
                    input4.setAttribute("placeholder", "CURP " +(count));  
                    grupo4.appendChild(input4);
                    div9.appendChild(document.createTextNode("Porcentaje de derecho " + (count) + " *"));
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
                    input5.name = "infb_rporcentaje" + childrenCount;
                    input5.classList.add('w-full', '-ml-10', 'pl-10', 'py-2', 'px-3', 'rounded-lg', 'border', 'border-gray-200', 'focus:outline-none', 'focus:ring-2', 'focus:ring-black', 'focus:border-transparent', 'required');
                    input5.setAttribute("data-msg", "Este campo es requerido");
                    input5.setAttribute("placeholder", "Porcentaje de derecho " +(count)); 
                    grupo5.appendChild(input5);
                    count++;
                    childrenCount++;     
                }
            }
        }
    }

</script>
<style>

    .error{
        color: rgb(244 63 94);
    }
    
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