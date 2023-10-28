<?php
require_once('../../includes/db.php');
$conex = new PDOConex();

if (!$conex) {
    $response = array("message" => 'Error de conexión a la base de datos!', "info" => false, "error" => true);
} else {
    $request = file_get_contents("php://input");
    $json = json_decode($request);

    if (isset($json)) {
        $get = "SELECT * FROM vista_producto WHERE id_producto = $json->id";
        $result = $conex->execSQL($get);
        $result = $conex->toArray($result);

        $response = array("message" => "Consulta exitosa", "data" => $result, "info" => false, "error" => false);
    } else {
        $response = array("message" => "No se recibieron los datos.", "info" => false, "error" => true);
    }

}

$conex->close();

echo json_encode($response);
?>