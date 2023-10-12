<?php
session_start();

if (isset($_SESSION['expediente_id'])) {
    // La variable de sesión existe, puedes proceder a destruirla
    unset($_SESSION['expediente_id']); // Esto eliminará la variable de sesión
}

?>