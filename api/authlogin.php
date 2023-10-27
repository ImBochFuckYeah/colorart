<?php
require_once('../includes/db.php');
$conex = new PDOConex();

// Función para autenticar al usuario (por ejemplo, después de un inicio de sesión exitoso)
function authenticateUser($user_id)
{
    $_SESSION['user_id'] = $user_id;
}

if (!$conex) {
    $response = array("message" => 'Error de conexión a la base de datos!', "info" => false, "error" => true);
} else {
    $request = file_get_contents("php://input");
    $json = json_decode($request);

    if (isset($json)) {

        $validUser = "SELECT idusuario FROM usuario WHERE username = '$json->username'";
        $exec = $conex->execSQL($validUser);
        $id = $conex->simpleValue($exec);

        if ($id > 0) {
            $validPassword = "SELECT
                CASE WHEN password = '$json->password' THEN 
                    1
                ELSE 
                    0
                END valid
            FROM
                usuario
            WHERE
                idusuario = $id";
            $return = $conex->execSQL($validPassword);
            $value = $conex->simpleValue($return);

            if ($value == 1) {

                authenticateUser($id);

                $response = array("message" => "Crendenciales validas.", "info" => false, "error" => false);
            } else {
                $response = array("message" => "La contraseña es incorrecta.", "info" => true, "error" => false);
            }
        } else {
            $response = array("message" => "El usuario no se encuentra registrado.", "info" => true, "error" => false);
        }
    } else {
        $response = array("message" => "No se pudieron enviar los datos.", "info" => false, "error" => true);
    }
}

$conex->close();

echo json_encode($response);
?>