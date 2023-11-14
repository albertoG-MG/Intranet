<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#datatable").DataTable({
            responsive: true,
            "ordering": false,
            "sPaginationType": "numbers",
            language: {
                search: "",
                "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        paginate: {
                            previous: "Anterior",
                            next: "Siguiente"
                        }
            },
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            "ajax":{
                "url": "../config/mi_historial_vacaciones.php",
                "type": "POST",
                "dataSrc": "",
                "data":{
                    "rol": <?php echo $_SESSION["rol"]; ?>,
                    "sessionid": <?php echo $_SESSION["id"]; ?>

                }
            },
            "columns": [
                {"data": "id", visible: false, searchable: false},
                {"data": "nombre"},
                {"data": "periodo"},
                {"data": "dias"},
                {"data": "fecha_solicitud"},
                {"data": "estatus"}
            ],
            "columnDefs": 
            [
                {
                    target: [1],
                    className:"border-white dt-tituloL",
                    render: function (data, type, row) {
                        return(
                            "<div class='text-left'>" +
                                "<span>" + row["nombre"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [2],
                    className:"border-white",
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["periodo"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [3],
                    className:"border-white",
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["dias"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [4],
                    className:"border-white",
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row["fecha_solicitud"] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [5],
                    className:"border-white",
                    render: function (data, type, row) {
                        if(row["estatus"] == 4){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Pendiente</span>" +
                                "</div>"
                            );
                        }else if(row["estatus"] == 3){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Rechazada</span>" +
                                "</div>"
                            ); 
                        }else if(row["estatus"] == 2){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Cancelada</span>" +
                                "</div>"
                            ); 
                        }else if(row["estatus"] == 1){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Aprobada</span>" +
                                "</div>"
                            );
                        }
                    }
                }
            ],
            "initComplete": () => {
                var table = $('#datatable').DataTable();
                $("#datatable").show();
                table.columns.adjust().draw();
            }
        });
    });
    
    $(document).ready(function() {

        $('input[name="periodo_buscar"]').daterangepicker({ showDropdowns: true, parentEl: "main",linkedCalendars: false, "locale": { "format": "YYYY/MM/DD", "applyLabel": "Aceptar", "cancelLabel": "Cancelar", "daysOfWeek": ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"], "monthNames": ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]}, applyButtonClasses: "button btn-celeste px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700", cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100" });

        $('.dataTables_filter input[type="search"]').
        attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-celeste-600');
        
        <?php
            if(basename($_SERVER['PHP_SELF']) == 'mi_historial_vacaciones.php'){
        ?>
                var dropdown = document.getElementById('vacaciones');
                dropdown.classList.remove("hidden"); 
        <?php 
            } 
        ?>

        $('#periodo_buscar').on('apply.daterangepicker', function(ev, picker) {
            var fd = new FormData();
            var fecha_inicio = picker.startDate.format('YYYY/MM/DD');
            var fecha_fin = picker.endDate.format('YYYY/MM/DD');
            fd.append('fecha_inicio', fecha_inicio);
            fd.append('fecha_fin', fecha_fin);
            $.ajax({
                url: '../ajax/filtros/mi_suma_vacaciones_periodo/mi_suma_vacaciones_periodo.php',
                type: 'POST',
                data: fd,
                processData: false,
                contentType: false,
                success: function(data) {
                    var table = $('#datatable').DataTable();
                    table.clear().draw();
                    const obj = JSON.parse(data);
                    table.rows.add(obj).draw();
                    table.column().cells().invalidate().render();
                    table.columns.adjust().responsive.recalc();
                },
                error: function(data) {
                    $("#ajax-error").text('Fail to send request');
                }
            });        
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
    });
</script>
<style>
.dataTables_wrapper .dataTables_filter{
    float:left;
    text-align:left;
    padding-bottom:13px;
    padding-top:5px;
}

@media (max-width: 640px){
    .dataTables_filter{
        width:100%;
    }
}

.dataTables_paginate{
    font-size:12px;
    display:flex;
    align-items:center;
    justify-content: center;
    position:relative;
    right: 7px;
}

.dt-buttons{
    float:right !important;
    text-align: right;
}

#datatable{
    border-collapse: collapse !important;
    font-size: 12px;
}

.search{
    margin:auto !important;
    height: 40px !important;
}

tr.odd:hover, tr.even:hover{
    background: rgb(243 244 246 / var(--tw-bg-opacity)) !important
}
tr.odd{
    border-bottom-width: 1px;
    border-color: rgb(229 231 235 / var(--tw-border-opacity));
    --tw-border-opacity: 1;
    background: transparent !important;
}

tr.even{
    border-bottom-width: 1px;
    border-color: rgb(229 231 235 / var(--tw-border-opacity));
    --tw-border-opacity: 1;
    background: rgb(249 250 251 / var(--tw-bg-opacity)) !important;
}

div.dataTables_filter .search{
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
    background-repeat: no-repeat;
    background-color: #fff;
    background-position: 3px 7px !important;
    padding-left: 30px;
}

.btn-celeste{
    background-color: #00a3ff  !important;
    border: none !important;
    box-shadow: 3px 3px 4px 0px rgb(0 0 0 / 22%) !important;
    font-weight: 500 !important;
    border-bottom: #fff 9px;
}

.btn-celeste:hover{
    background-color: #008eff !important;
}

main{
    position:relative !important;
}

.daterangepicker td.active, .daterangepicker td.active:hover{
    background-color:  #00a3ff !important;
    border-color: transparent;
    color: #fff;
}

.dataTables_wrapper.no-footer{
    margin-top: 1.25rem !important;
}

.dataTables_length select {
    width: 87px !important;
    box-shadow: 1px 2px 0px !important;
    width: 70px !important;
}

.dataTables_length label {
    margin-right: 10px; 
    font-size: 14px; 
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current{
  color: #fff !important;
  float: left !important;
  padding: 8px 16px !important;
  text-decoration: none !important;
  transition: background-color .3s !important;
  margin: 0 4px !important;
  background: #000 !important;
  display:flex;
  align-items:center;
  justify-content: center;
  position:relative;
  border-radius: 100px !important;
}

.paginate_button{
  float: left !important;
  padding: 8px 16px !important;
  text-decoration: none !important;
  transition: background-color .3s !important;
  margin: 0 4px !important;
  border-radius: 100px !important;
}
</style>