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

// Función para cerrar la sesión del usuario
function logoutUser()
{
    unset($_SESSION['user_id']);
}

if (isset($_POST['logout'])) {
    // Llama a la función para cerrar la sesión.
    logoutUser();
}

// Verifica si el usuario está autenticado en esta página
function validAuthenticated()
{
    if (isUserAuthenticated()) {
        // Si el usuario no está autenticado, redirige a la página de inicio de sesión u otra página de autenticación
        header('Location: login');
        exit();
    } else {
        header('Location: admin');
        exit();
    }
}
?>