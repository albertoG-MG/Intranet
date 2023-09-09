<link rel="stylesheet" href="../src/css/pagination.css">
<script src="../src/js/pagination.min.js"></script>
<script>
    const tabElements = [{
            id: 'nvistas',
            triggerEl: document.querySelector('#nvistas-tab'),
            targetEl: document.querySelector('#nvistas')
        },
        {
            id: 'vistas',
            triggerEl: document.querySelector('#vistas-tab'),
            targetEl: document.querySelector('#vistas')
        }
    ];

    tabElements.forEach((tab) => {
        tab.triggerEl.addEventListener('click', () => {
            target = tab;
            tabElements.forEach((t) => {
                t.targetEl.classList.remove("block")
                t.targetEl.classList.add("hidden");
                t.triggerEl.classList.remove("menu-active", "relative", "bg-white", "shadow");
                t.targetEl.classList.add("text-gray-500");
            })
            target.targetEl.classList.remove("hidden");
            target.targetEl.classList.add("block");
            target.triggerEl.classList.add("menu-active", "relative", "bg-white", "shadow");
            target.targetEl.classList.remove("text-gray-500");
        })
    });

    $(document).ready(function () {
        totalfilas_nvistas();
        totalfilas_vistas();
    });

    
    function totalfilas_nvistas(){
        var totalrows = 0;
        $.ajax({
            type: "GET",
            url: "../config/totalrows_nvistas.php",
            success: function (response) {
                totalrows = response;
                paginacion_nvistas(totalrows);
                check_nvistas(totalrows);
            }
        });
    }

    function totalfilas_vistas(){
        var totalrows = 0;
        $.ajax({
            type: "GET",
            url: "../config/totalrows_vistas.php",
            success: function (response) {
                totalrows = response;
                paginacion_vistas(totalrows);
                check_vistas(totalrows);
            }
        });
    }

    function paginacion_nvistas(totalrows){
        $('#nvistas_demo').pagination({
            dataSource: '../config/nvistas_ajax.php',
            locator: "items",
            totalNumberLocator: function(response) {
                // you can return totalNumber by analyzing response content
                return totalrows;
            },
            pageSize: 20,
            showNavigator: true,
            formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> de <%= totalNumber %> items',
            showGoInput: true,
            showGoButton: true,
            formatGoInput: 'ir a <%= input %> página',
            ajax: {
                beforeSend: function() {
                    $("#dataContainer_nvistas").html('Cargando datos ...');
                }
            },
            callback: function(data, pagination) {
                // template method of yourself
                var html = __nvistasPreview(data);
                $("#dataContainer_nvistas").html(html);
            }
        });
    }

    function paginacion_vistas(totalrows){
        $('#vistas_demo').pagination({
            dataSource: '../config/vistas_ajax.php',
            locator: "items_vistas",
            totalNumberLocator: function(response) {
                // you can return totalNumber by analyzing response content
                return totalrows;
            },
            pageSize: 20,
            showNavigator: true,
            formatNavigator: '<%= rangeStart %>-<%= rangeEnd %> de <%= totalNumber %> items_vistas',
            showGoInput: true,
            showGoButton: true,
            formatGoInput: 'ir a <%= input %> página',
            ajax: {
                beforeSend: function() {
                    $("#dataContainer_vistas").html('Cargando datos ...');
                }
            },
            callback: function(data, pagination) {
                // template method of yourself
                var html = __vistasPreview(data);
                $("#dataContainer_vistas").html(html);
            }
        });
    }

        

    function __nvistasPreview(data) {
        for (var i = 0, len = data.length; i < len; i++) {
            data[i]=`<div class="flex justify-between py-6 px-4 bg-white rounded-lg cursor-pointer mt-5" onclick="remove_notification(${data[i].id}, \'${data[i].tipo_alerta}'\)">`+
                        `<div class="flex items-center space-x-4">`+
                            `<img src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" class="rounded-full h-14 w-14" alt="">`+
                            `<div class="flex flex-col space-y-1">`+
                                `<span class="font-bold"> ${data[i].tipo_alerta}</span>`+
                                `<span class="text-md"> ${data[i].alerta_titulo}</span>`+
                                `<span class="text-sm">${data[i].alerta_mensaje}</span>`+
                            `</div>`+
                        `</div>`+
                        `<div class="flex-none px-4 py-2 text-stone-600 text-xs md:text-sm">`+
                            ` ${data[i].fecha_creacion}`+
                        `</div>`+
                    `</div>`;
        }
        return data.join("");
    }

    
    function __vistasPreview(data) {
        for (var i = 0, len = data.length; i < len; i++) {
            data[i]=`<div class="flex justify-between py-6 px-4 bg-white rounded-lg mt-5">`+
                        `<div class="flex items-center space-x-4">`+
                            `<img src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" class="rounded-full h-14 w-14" alt="">`+
                            `<div class="flex flex-col space-y-1">`+
                                `<span class="font-bold"> ${data[i].tipo_alerta}</span>`+
                                `<span class="text-md"> ${data[i].alerta_titulo}</span>`+
                                `<span class="text-sm">${data[i].alerta_mensaje}</span>`+
                            `</div>`+
                        `</div>`+
                        `<div class="flex-none px-4 py-2 text-stone-600 text-xs md:text-sm">`+
                            ` ${data[i].fecha_creacion}`+
                        `</div>`+
                    `</div>`;
        }
        return data.join("");
    }
        
    function check_nvistas(totalrows){
        if(totalrows == 0){
            $("#nvistas_demo").attr("style", "display:none;");
        }else{
            $("#nvistas_demo").removeAttr("style");
        }
    }

    function check_vistas(totalrows){
        if(totalrows == 0){
            $("#vistas_demo").attr("style", "display:none;");
        }else{
            $("#vistas_demo").removeAttr("style");
        }
    }

    function remove_notification(id, tipo_alerta){
        load_unseen_notification(id);
        get_link(tipo_alerta);
    }

    function get_link(tipo_alerta){
        $.ajax({
            url:"../config/get_link.php",
            method:"POST",
            data:{tipo_alerta:tipo_alerta},
            dataType:"json",
            success:function(data)
            {
                window.location.href=data.link;
            }
        });
    }

    function load_unseen_notification(view = '')
    {
        $.ajax({
            url:"../ajax/notificaciones_alertas/alertas_notificaciones.php",
            method:"POST",
            data:{view:view},
            dataType:"json",
            success:function(data)
            {
                if(data.unseen_notification > 0)
                {
                    $('#notificacion_count_alert').removeAttr('style');
                    $('#notification_alert').html(data.unseen_notification);
                }else{
                    $("#notificacion_count_alert").attr("style", "display:none;");
                }
            }
        });
    }

    setInterval(function(){
        totalfilas_nvistas();
    }, 20000);
</script>