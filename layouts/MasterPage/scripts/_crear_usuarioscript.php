<script>
        $(document).ready(function() {
            if ($('#Guardar').length > 0) {
                $('#Guardar').validate({
                    errorPlacement: function(error, element) {
                            error.insertAfter(element.parent('.group.flex'));
                    },
                    rules: {
                        usuario: {
                            required: true
                        }
                    },
                    messages: {
                        usuario: {
                            required: 'Por favor, ingresa un usuario'
                        }
                    },
                    submitHandler: function(form) {
                        
                        return false;
                    }
                });
            }
        });
    </script>