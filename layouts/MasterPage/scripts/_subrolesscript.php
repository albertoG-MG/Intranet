<script>
document.addEventListener("DOMContentLoaded", function() {
    $("#datatable").DataTable({
        responsive:true,
        "lengthChange": false,
        "ordering": false,
        "sPaginationType": "listboxWithButtons",
        language: {
					search: ""
		},
        dom: '<"top"fB>rt<"bottom"ip><"clear">',
        buttons: [
            {
                text: "<i class='mdi account-supervisor-circle text-white font-semibold text-lg'></i>Crear subrol",
                attr: {
                    'id': 'subroles',
                    'style': 'background:rgb(79 70 229 / var(--tw-border-opacity));'
                },
                className: 'bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white',
				action: function ( e, dt, node, config ) {
					window.location.href = "crear_subrol.php";
				}
            },
				],
		"processing": true,
        "serverSide": true,
        "sAjaxSource": '../config/serverside_subrol.php',
        "columns": [
            {
                data: null,
                "render": function(data, type, row) {
                    return (
                        "<div class='py-3 text-left'>" +
                        "<div class='flex items-center'>" +
                        "<div class='mr-2 shrink-0'>" +
                        "<svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='currentColor' d='M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M15.6,8.34C16.67,8.34 17.53,9.2 17.53,10.27C17.53,11.34 16.67,12.2 15.6,12.2A1.93,1.93 0 0,1 13.67,10.27C13.66,9.2 14.53,8.34 15.6,8.34M9.6,6.76C10.9,6.76 11.96,7.82 11.96,9.12C11.96,10.42 10.9,11.5 9.6,11.5C8.3,11.5 7.24,10.42 7.24,9.12C7.24,7.81 8.29,6.76 9.6,6.76M9.6,15.89V19.64C7.2,18.89 5.3,17.04 4.46,14.68C5.5,13.56 8.13,13 9.6,13C10.13,13 10.8,13.07 11.5,13.21C9.86,14.08 9.6,15.23 9.6,15.89M12,20C11.72,20 11.46,20 11.2,19.96V15.89C11.2,14.47 14.14,13.76 15.6,13.76C16.67,13.76 18.5,14.15 19.44,14.91C18.27,17.88 15.38,20 12,20Z'></path></svg>" +
                        "</div>" +
                        "<span>" + row[1] + "</span>" +
                        "</div>" +
                        "</div>");
                }
            },
            {
                data: null,
                "render": function(data, type, row) {
                    return (
                        "<div class='py-3 text-left'>" +
                        "<div class='flex items-center'>" +
                        "<div class='mr-2 shrink-0'>" +
                        "<svg style='width:24px;height:24px' viewBox='0 0 24 24'><path fill='currentColor' d='M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M9.14 19.75L8.85 19L9.14 18.25C9.84 16.5 11.08 15.14 12.61 14.22C11.79 14.08 10.92 14 10 14C5.58 14 2 15.79 2 18V20H9.27C9.23 19.91 9.18 19.83 9.14 19.75M17 18C16.44 18 16 18.44 16 19S16.44 20 17 20 18 19.56 18 19 17.56 18 17 18M23 19C22.06 21.34 19.73 23 17 23S11.94 21.34 11 19C11.94 16.66 14.27 15 17 15S22.06 16.66 23 19M19.5 19C19.5 17.62 18.38 16.5 17 16.5S14.5 17.62 14.5 19 15.62 21.5 17 21.5 19.5 20.38 19.5 19Z'></path></svg>" +
                        "</div>" +
                        "<span>" + row[2] + "</span>" +
                        "</div>" +
                        "</div>");
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        "<div class='py-3 text-left'>" +
                        "<div class='flex item-center justify-end'>" +
                        "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Editar'>" +
                        "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path>" +
                        "</svg>" +
                        "</div>" +
                        "<div class='w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer Eliminar'>" +
                        "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'>" +
                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path>" +
                        "</svg>" +
                        "</div>" +
                        "</div>" +
                        "</div>");
                }
            }
        ],
        "initComplete": () => {$("#datatable").show();}
    });
});
	
	$(document).ready(function() {
		$('.dataTables_filter input[type="search"]').
		attr('placeholder', 'Buscar...').attr('class', 'search w-full rounded-lg text-gray-600 font-medium');
	});
	
</script>

<style>
    .dataTables_wrapper .dataTables_filter{
        float:left;
        text-align:left;
        padding-bottom:5px;
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
    }

    .search{
        margin:auto !important;
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
</style>