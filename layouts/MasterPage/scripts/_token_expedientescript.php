<link rel="stylesheet" href="../src/css/select2.min.css">
<script src="../src/js/select2.min.js"></script>
<script>

	//Empieza la configuración del SELECT 2
    $('#usuario').select2({
        theme: ["tailwind"],
        placeholder: '-- Seleccione --',
        dropdownParent: $('main'),
        "language": {
            "noResults": function(){
                return "No hay resultados";
            }
        }
    });

    $('#usuario').data('select2').$container.addClass('w-full -ml-10 pl-10 py-2 px-3 h-11 border rounded-md border-[#d1d5db]');

    $('.select2-selection--single').addClass("flex focus:outline-none");

    $('.select2-selection__rendered').addClass("flex-1");

    $('.select2-selection__arrow').append('<i class="mdi mdi-apple-keyboard-control"></i>');

    $('.select2-selection__arrow').addClass('rotate-180 mb-1');

    $("#selectusuario_token").show();

    $('#usuario').on('select2:open', function (e) {
        const evt = "scroll.select2";
        $(e.target).parents().off(evt);
        $(window).off(evt);
    });

    <?php if(basename($_SERVER['PHP_SELF']) == 'token_expediente.php'){?>
		var dropdown = document.getElementById('catalogos');
		dropdown.classList.remove("hidden");
	<?php } ?>

	function waitForElm(selector) {
        return new Promise(resolve => {
            if (document.querySelector(selector)) {
                return resolve(document.querySelector(selector));
            }

            const observer = new MutationObserver(mutations => {
                if (document.querySelector(selector)) {
                    resolve(document.querySelector(selector));
                    observer.disconnect();
                }
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    }


    $('#usuario').on('select2:open', function (e) {
        waitForElm('.select2-results__options').then((elm) => {
            if ( $('.select2-results__options.select2-results__options--nested > *').length == 0 ) {
                var usuarios_group = $('#usuario').find('optgroup[label=Usuarios]');
                $(usuarios_group).prop('disabled', 'true');
                $(".select2-results__option.select2-results__option--group").css("display","none");
                $('#select2-usuario-results.select2-results__options').append("<span class='px-3'>No hay resultados</span>");
            }
        });
    });
</script>
<style>

	.error{
        color: red;
    }

	main{
		position:relative !important;
	}

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
</style>