<?php 
require_once('../../includes/db.php');
$conex = new PDOConex();

if (!$conex) {
    $response = array("message" => 'Error de conexión a la base de datos!', "info" => false, "error" => true);
} else {
    $request = file_get_contents("php://input");
    $json = json_decode($request);

    if (isset($json)) {
        $update = "BEGIN
        ActualizarEstadoMarca($json->id, $json->estado);
        END;";
        $result = $conex->execSQL($update);

        $response = array("message" => "Datos actualizados correctamente.", "info" => false, "error" => false);
    } else {
        $response = array("message" => "No se recibieron los datos.", "info" => false, "error" => true);
    }
}

$conex->close();

echo json_encode($response);
?>  