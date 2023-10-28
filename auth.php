<?php
// Inicia la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para verificar si el usuario está autenticado
function isUserAuthenticated()
{
    return isset($_SESSION['user_id']);
}

if (!isUserAuthenticated()) {
    // Si el usuario no está autenticado, redirige a la página de inicio de sesión u otra página de autenticación
    if ($_SERVER['REDIRECT_URL'] != '/colorart/login') {
        header('Location: login');
        exit();
    }
} else {
    if ($_SERVER['REDIRECT_URL'] != '/colorart/admin') {
        header('Location: admin');
        exit();
    }
}
?>