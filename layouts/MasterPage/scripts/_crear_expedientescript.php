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
            if($("#infp_curriculum").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text').text(file);
            }
	    });

        $("#infp_evaluacion").on('change', function (e) {
            if($("#infp_evaluacion").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text2').text(file);
            }
	    });

        $("#infp_nacimiento").on('change', function (e) {
            if($("#infp_nacimiento").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text3').text(file);
            }
	    });

        $("#infp_curp").on('change', function (e) {
            if($("#infp_curp").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text4').text(file);
            }
	    });

        $("#infp_identificacion").on('change', function (e) {
            if($("#infp_identificacion").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text5').text(file);
            }
	    });

        $("#infp_comprobante").on('change', function (e) {
            if($("#infp_comprobante").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text6').text(file);
            }
	    });

        $("#infp_rfc").on('change', function (e) {
            if($("#infp_rfc").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text7').text(file);
            }
	    });

        $("#infp_cartal").on('change', function (e) {
            if($("#infp_cartal").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text8').text(file);
            }
	    });

        $("#infp_cartap").on('change', function (e) {
            if($("#infp_cartap").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text9').text(file);
            }
	    });

        $("#infp_retencion").on('change', function (e) {
            if($("#infp_retencion").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text10').text(file);
            }
	    });

        $("#infp_strabajo").on('change', function (e) {
            if($("#infp_strabajo").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text11').text(file);
            }
	    });

        $("#infp_imss").on('change', function (e) {
            if($("#infp_imss").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text12').text(file);
            }
	    });

        $("#infp_nomina").on('change', function (e) {
            if($("#infp_nomina").val() != ''){
                var file = e.target.files[0].name;
                $('#file-text13').text(file);
            }
	    });

        if(($('input[type=radio][name=tel_movil]:checked').val() === "si")){
            document.getElementById("div_movil").classList.remove('hidden');
            document.getElementById("telmov").classList.add('required');
            document.getElementById("telmov").setAttribute("data-msg-required", "Este campo es requerido");

        }else if($('input[type=radio][name=tel_movil]:checked').val() === "no"){
            document.getElementById("div_movil").classList.add('hidden');
            document.getElementById("telmov").classList.remove('required');
            document.getElementById("telmov").removeAttribute("data-msg-required");
        }

        $('input[type=radio][name=tel_movil]').on('change', function () {
            if(($('input[type=radio][name=tel_movil]:checked').val() === "si")){
                document.getElementById("div_movil").classList.remove('hidden');
                document.getElementById("telmov").classList.add('required');
                document.getElementById("telmov").setAttribute("data-msg-required", "Este campo es requerido");

            }else if($('input[type=radio][name=tel_movil]:checked').val() === "no"){
                document.getElementById("div_movil").classList.add('hidden');
                document.getElementById("telmov").classList.remove('required');
                document.getElementById("telmov").removeAttribute("data-msg-required");
            }
        });

        if(($('input[type=radio][name=empresa]:checked').val() === "si")){
            document.getElementById("famnom").classList.remove('hidden');
            document.getElementById("nomfam").classList.add('required');
            document.getElementById("nomfam").setAttribute("data-msg-required", "Este campo es requerido");

        }else if($('input[type=radio][name=empresa]:checked').val() === "no"){
            document.getElementById("famnom").classList.add('hidden');
            document.getElementById("nomfam").classList.remove('required');
            document.getElementById("nomfam").removeAttribute("data-msg-required");
        }

        $('input[type=radio][name=empresa]').on('change', function () {
            if(($('input[type=radio][name=empresa]:checked').val() === "si")){
                document.getElementById("famnom").classList.remove('hidden');
                document.getElementById("nomfam").classList.add('required');
                document.getElementById("nomfam").setAttribute("data-msg-required", "Este campo es requerido");

            }else if($('input[type=radio][name=empresa]:checked').val() === "no"){
                document.getElementById("famnom").classList.add('hidden');
                document.getElementById("nomfam").classList.remove('required');
                document.getElementById("nomfam").removeAttribute("data-msg-required");
            }
        });

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
                rules:{
                    prueba: {
                        required:true
                    },
                    numempleado: {
	                    remote: "../ajax/expedientes/check_num_empleado.php"
                    },
                    fechaalta: {
	                    required:true
                    },
                    infp_curriculum: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_evaluacion: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_nacimiento: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_curp: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_identificacion: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_comprobante: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_rfc: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_cartal: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_cartap: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_retencion: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_strabajo: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_imss: {
                        extension: "pdf",
                        filesize: 10
                    },
                    infp_nomina: {
                        extension: "pdf",
                        filesize: 10
                    }
                },
                messages:{
                    prueba:{
                        required: 'Este campo es requerido'
                    },
                    numempleado: {
	                    remote: "Este número de empleado ya existe, por favor, eliga otro"
                    },
                    fechaalta: {
	                    required: 'Este campo es requerido'
                    },
                    infp_curriculum: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_evaluacion: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_nacimiento: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_curp: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_identificacion: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_comprobante: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_rfc: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_cartal: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_cartap: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_retencion: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_strabajo: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_imss: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    },
                    infp_nomina: {
                        extension: 'Solo se permiten pdf',
                        filesize: 'Solo se permiten pdfs de un máximo de 10 megabytes'
                    }
                },
                submitHandler: function(form) {
                    $("#finish").attr("disabled", true);
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
                            var telmov = $("#telmov").val();
                            var radio = $("input[name=casa]:checked", "#Guardar").val();
                            var fechanac = $("#fechanac").val();
                            var fechacon = $("#fechacon").val();
                            var fechaalta = $("#fechaalta").val();
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
                            var emergenciatel = $("#emergenciatel").val();
                            var antidoping = $("#antidoping").val();
                            var vacante = $("#vacante").val();
                            var radio2 = $("input[name=empresa]:checked", "#Guardar").val();
                            var nomfam = $("#nomfam").val();
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
                            var curriculum = $('#infp_curriculum')[0].files[0];
                            var evaluacion = $('#infp_evaluacion')[0].files[0];
                            var nacimiento = $('#infp_nacimiento')[0].files[0];
                            var infpcurp = $('#infp_curp')[0].files[0];
                            var identificacion = $('#infp_identificacion')[0].files[0];
                            var comprobante = $('#infp_comprobante')[0].files[0];
                            var infprfc = $('#infp_rfc')[0].files[0];
                            var cartal = $('#infp_cartal')[0].files[0];
                            var cartap = $('#infp_cartap')[0].files[0];
                            var retencion = $('#infp_retencion')[0].files[0];
                            var strabajo = $('#infp_strabajo')[0].files[0];
                            var imss = $('#infp_imss')[0].files[0];
                            var nomina = $('#infp_nomina')[0].files[0];

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
                            fd.append('telmov', telmov);
                            fd.append('radio', radio);
                            fd.append('fechanac', fechanac);
                            fd.append('fechacon', fechacon);
                            fd.append('fechaalta', fechaalta);
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
                            fd.append('emergenciatel', emergenciatel);
                            fd.append('antidoping', antidoping);
                            fd.append('vacante', vacante);
                            fd.append('radio2', radio2);
                            fd.append('nomfam', nomfam);
                            fd.append('method', method);
                            fd.append('app', app);
                            

                            /*Referencias*/
                            fd.append('referencias', JSON.stringify(reflab));
                            fd.append('refbanc', JSON.stringify(refbanc));

                            /*File uploads*/
                            fd.append('infp_curriculum', curriculum);
                            fd.append('infp_evaluacion', evaluacion);
                            fd.append('infp_nacimiento', nacimiento);
                            fd.append('infp_curp', infpcurp);
                            fd.append('infp_identificacion', identificacion);
                            fd.append('infp_comprobante', comprobante);
                            fd.append('infp_rfc', infprfc);
                            fd.append('infp_cartal', cartal);
                            fd.append('infp_cartap', cartap);
                            fd.append('infp_retencion', retencion);
                            fd.append('infp_strabajo', strabajo);
                            fd.append('infp_imss', imss);
                            fd.append('infp_nomina', nomina);


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