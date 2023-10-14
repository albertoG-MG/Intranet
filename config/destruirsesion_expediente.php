<?php
// Permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");

// Permitir los métodos de solicitud que deseas permitir
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Establecer los encabezados permitidos para la solicitud
header("Access-Control-Allow-Headers: Content-Type");

// Permitir incluir las credenciales en las solicitudes (por ejemplo, cookies)
header("Access-Control-Allow-Credentials: true");

// Establecer el tipo de contenido de la respuesta como JSON
header("Content-Type: application/json");

session_start();

if (isset($_SESSION['expediente_id'])) {
    // La variable de sesión existe, puedes proceder a destruirla
    unset($_SESSION['expediente_id']); // Esto eliminará la variable de sesión
}

?>