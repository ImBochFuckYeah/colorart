<?php 
// Función para autenticar al usuario (por ejemplo, después de un inicio de sesión exitoso)
function authenticateUser($user_id) {
    $_SESSION['user_id'] = $user_id;
}

// Función para cerrar la sesión del usuario
function logoutUser() {
    unset($_SESSION['user_id']);
}
?>