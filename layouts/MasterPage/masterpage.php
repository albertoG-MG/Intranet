<?php include($codigophp); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../src/css/datatables.min.css">
</head>

<body>
    <div>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <?php include($sidebar); ?>
            </div>
            <div class="flex-1 flex flex-col overflow-hidden">
                    <?php include($navbar); ?>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <?php include($content); ?>
                </main>
            </div>
        </div>
    </div>
    <script src="../src/js/bundle.js"></script>
    <script src="../src/js/datatables.min.js"></script>
    <script src="../src/js/select.js"></script>
    <?php include($scripts); ?>
</body>

</html>