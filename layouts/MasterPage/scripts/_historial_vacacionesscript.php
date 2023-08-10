<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#datatable").DataTable({
            responsive: true,
            "lengthChange": false,
            "ordering": false,
            "sPaginationType": "listboxWithButtons",
            language: {
                search: ""
            },
            dom: '<"top"f>rt<"bottom"ip><"clear">',
            "processing": true,
            "serverSide": true,
            "sAjaxSource": '../config/serverside_historial_vacaciones.php',
            "initComplete": () => {
                $("#datatable").show();
            },
            "columns": [
                {data: [0], visible: false, searchable: false},
                {data: [1]},
                {data: [2]},
                {data: [3]},
                {data: [4]}
            ],
            "columnDefs": 
            [
                {
                    target: [1],
                    render: function (data, type, row) {
                        return(
                            "<div class='text-left'>" +
                                "<span>" + row[1] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [2],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row[2] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [3],
                    render: function (data, type, row) {
                        return (
                            "<div class='text-left lg:text-center'>" +
                                "<span>" + row[3] + "</span>" +
                            "</div>"
                        );
                    }
                },
                {
                    target: [4],
                    render: function (data, type, row) {
                        if(row[4] == 4){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Pendiente</span>" +
                                "</div>"
                            );
                        }else if(row[4] == 3){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Rechazada</span>" +
                                "</div>"
                            ); 
                        }else if(row[4] == 2){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Cancelada</span>" +
                                "</div>"
                            ); 
                        }else if(row[4] == 1){
                            return (
                                "<div class='text-left lg:text-center'>" +
                                    "<span>Aprobada</span>" +
                                "</div>"
                            );
                        }
                    }
                }
            ]
        });
    });
    $(document).ready(function() {
        $('.dataTables_filter input[type="search"]').
        attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-600');
    });

</script>
<style>
    .dataTables_wrapper .dataTables_filter {
        float: left;
        text-align: left;
        padding-bottom: 5px;
        padding-top: 5px;
    }

    @media (max-width: 640px) {
        .dataTables_filter {
            width: 100%;
        }
    }

    .dataTables_paginate {
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        right: 7px;
    }

    .dt-buttons {
        float: right !important;
        text-align: right;
    }

    #datatable {
        border-collapse: collapse !important;
    }

    .search {
        margin: auto !important;
        height: 40px !important;
    }

    tr.odd:hover,
    tr.even:hover {
        background: rgb(243 244 246 / var(--tw-bg-opacity)) !important
    }

    tr.odd {
        border-bottom-width: 1px;
        border-color: rgb(229 231 235 / var(--tw-border-opacity));
        --tw-border-opacity: 1;
        background: transparent !important;
    }

    tr.even {
        border-bottom-width: 1px;
        border-color: rgb(229 231 235 / var(--tw-border-opacity));
        --tw-border-opacity: 1;
        background: rgb(249 250 251 / var(--tw-bg-opacity)) !important;
    }

    div.dataTables_filter .search {
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
        background-repeat: no-repeat;
        background-color: #fff;
        background-position: 3px 7px !important;
        padding-left: 30px;
    }
</style>
