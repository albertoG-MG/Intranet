<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>
	//Empieza la configuración del SELECT 2
    $('#caja_empleado').select2({
        theme: ["tailwind"],
        placeholder: '-- Seleccione --',
        dropdownParent: $('#selectempleado'),
        "language": {
            "noResults": function(){
                return "No hay resultados";
            }
        }
    });

    $('#caja_empleado').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]')

    $('.select2-selection--single').addClass("flex focus:outline-none");

    $('.select2-selection__rendered').addClass("flex-1");

    $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');

    $('.select2-selection__arrow').addClass('rotate-180 mb-1');

    $("#selectempleado").show();

    $('#caja_empleado').on('select2:open', function (e) {
        const evt = "scroll.select2";
        $(e.target).parents().off(evt);
        $(window).off(evt);
    });

	$(document).ready(function() {
	    $('input[name="periodo_permiso"]').daterangepicker({
			showDropdowns: true,
			parentEl: "main",
			timePicker: true,
			locale: {
			format: 'YYYY/MM/DD hh:mm A'
			},
			applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700",
			cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100"
		});

		$('input[name="periodo_incapacidad"]').daterangepicker({
			showDropdowns: true,
			parentEl: "main",
			locale: {
			format: 'YYYY/MM/DD'
			},
			applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700",
			cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100"
		});

		$('input[name="fecha_acta"]').daterangepicker({
			showDropdowns: true,
			parentEl: "main",
			singleDatePicker: true,
			locale: {
			format: 'YYYY/MM/DD'
			},
			applyButtonClasses: "button bg-indigo-600 px-3 py-3 text-white rounded-md focus:ring-2 focus:outline-none focus:ring-[#4F46E5]/50 hover:bg-indigo-500 active:bg-indigo-700",
			cancelClass: "button bg-white border border-gray-300 text-gray-600 rounded-md outline-none px-3 py-3 focus:ring-2 focus:outline-none focus:ring-[#d1d5db]/50 hover:bg-gray-50 active:bg-gray-100"
		});
	});
</script>
<style>
    .select2-container--tailwind .select2-results > .select2-results__options{
        overflow-y: auto;
        max-height: 110px;
    }

	.select2-container--tailwind .select2-results__option--group{
		padding:0;
	}

	.select2-container--tailwind .select2-results__group{
		cursor: default;
		display:block;
		padding: 6px;
	}
    
    .select2-results__option--highlighted{
        background: rgb(129 140 248) !important;
        color:white;
    }

	.select2-container--above.select2-container--open{
		border-top-left-radius: 0px !important;
		border-top-right-radius: 0px !important;
	}

	.select2-container--below.select2-container--open{
		border-bottom-right-radius: 0px !important;
		border-bottom-left-radius: 0px !important;
	}

    .select2-results__option--selected{
        background: #ddd;
    }

    .select2-dropdown{
        border-width: 1px;
		border-style: solid;
		border-color: rgb(209 213 219 / var(--tw-border-opacity));
		--tw-border-opacity: 1;
    }

	.select2-search__field{
		border-radius: 0.375rem;
		box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
		height: 2.75rem;
		--tw-border-opacity: 1;
		border-color: rgb(209 213 219 / var(--tw-border-opacity));
	}

	.select2-search__field:focus{
		box-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
		--tw-ring-color: rgb(79 70 229);
	}

	main{
		position:relative !important;
	}

	.daterangepicker td.active, .daterangepicker td.active:hover{
		--tw-bg-opacity: 1 !important;
		background-color: rgb(79 70 229 / var(--tw-bg-opacity)) !important;
		border-color: transparent;
		color: #fff;
	}
</style>