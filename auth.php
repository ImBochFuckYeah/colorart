<?php
// Inicia la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función para verificar si el usuario está autenticado
function isUserAuthenticated() {
    return isset($_SESSION['user_id']);
}

// Función para autenticar al usuario (por ejemplo, después de un inicio de sesión exitoso)
function authenticateUser($user_id) {
    $_SESSION['user_id'] = $user_id;
}

// Función para cerrar la sesión del usuario
function logoutUser() {
    unset($_SESSION['user_id']);
}

// Puedes agregar más funciones de gestión de sesiones según tus necesidades

// Verifica si el usuario está autenticado en esta página
if (!isUserAuthenticated()) {
    // Si el usuario no está autenticado, redirige a la página de inicio de sesión u otra página de autenticación
    header('Location: pages/login.php');
    exit();
}
?>