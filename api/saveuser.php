<?php
require_once('../includes/db.php');
$conex = new PDOConex();

if (!$conex) {
    $response = array("message" => 'Error de conexión a la base de datos!', "info" => false, "error" => true);
} else {
    $request = file_get_contents("php://input");
    $json = json_decode($request);

    if (isset($json)) {

        $validEmail = "SELECT COUNT(*) FROM usuario WHERE email = '$json->email'";
        $exec = $conex->execSQL($validEmail);
        $numrows = $conex->simpleValue($exec);

        if ($numrows > 0) {
            $response = array("message" => "El email ya se encuentra registrado, por favor intente con otro.", "info" => true, "error" => false);
        } else {
            $query = "INSERT INTO usuario (
                nombre, 
                apellido, 
                email, 
                password
            ) values (
                '$json->name',
                '$json->lastname',
                '$json->email',
                '$json->password'
            )";
            $conex->execSQL($query);

            $response = array("message" => "Se insertaron los datos correctamente.", "info" => false, "error" => false);
        }
    } else {
        $response = array("message" => "No se pudo insertar los datos.", "info" => false, "error" => true);
    }
}

$conex->close();

echo json_encode($response);
?>