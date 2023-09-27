<?php
include_once __DIR__ . "/../../classes/roles.php";
include_once __DIR__ . "/../../classes/permissions.php"; 
include_once __DIR__ . ($codigophp); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="layouts/favicon.ico" type="image/x-icon">
    <link rel="icon" href="layouts/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/EstilosP.css">
    <link rel="stylesheet" href="../src/css/bundle.css">
    <link rel="stylesheet" href="../src/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../src/css/datatables.min.css">
</head>

<body class="overflow-hidden ">
<div>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <div :class=" sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform overflow-y-auto lg:translate-x-0 lg:static lg:inset-0" style=" box-shadow: -2px 0px 16px #000000ad !important; background-image: linear-gradient(rgba(0, 94, 177, 0.9), rgba(0, 183, 230, 0.7)), url(../src/img/fondo-hexagonos.png) !important; background:linear-gradient(350deg , #005FB1 0%, #00B7E6 84%, #005FB1 84%, #002169 18%);  border-bottom-right-radius: 20px !important;" >
                <div class="flex items-center justify-center mt-2">
                    <?php include_once __DIR__ . ($sidebar); ?>
            </div>
            <div class="flex-1 flex flex-col overflow-hidden">
                    <?php include_once __DIR__ . ($navbar); ?>
                <main class="contenedor flex-1  bg-gray-250">
                    <?php include_once __DIR__ . ($content); ?>
                </main>
            </div>
        </div>
    </div>
    <script src="../src/js/bundle.js"></script>
    <script src="../src/js/datatables.min.js"></script>
    <script src="../src/js/select.js"></script>
    <script>
        $(document).ready(function () {
            load_unseen_notification();

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
                load_unseen_notification();;
            }, 20000);
        });
    </script>
    <?php include_once __DIR__ . ($scripts); ?>
</body>

<style>
.bg-gray-250{
    background-color: rgb(250,250,250)
}
.contenedor{
    overflow-x: hidden;
    overflow-y:auto;
}
.contenedor::-webkit-scrollbar {
    -webkit-appearance: none;
    
}
.contenedor::-webkit-scrollbar:vertical {
    width:12px;
}

.contenedor::-webkit-scrollbar-button:increment,.contenedor::-webkit-scrollbar-button {
    display: none;
} 

.contenedor::-webkit-scrollbar:horizontal {
    height: 10px;
}

.contenedor::-webkit-scrollbar-thumb {
    background: #c1c1c182;
    /* background: linear-gradient(262deg, #ffa8079c 44%, #ff970e99 65%, #ffa807ba 40%); */
    border-radius: 20px;
    border: 2px solid #f1f2f3;
}

.contenedor::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(256deg , #F7941E 63%, #fff 106%,#ffa807ba 3%);
    /* background: linear-gradient(262deg, #ffa8079c 44%, #ff970e99 65%, #ffa807ba 40%); */
    border-radius: 20px;
    border: 2px solid #f1f2f3;
}

.contenedor::-webkit-scrollbar-track {
    border-radius: 10px;  
}
    </style>
</html>