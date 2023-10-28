<?php 
require_once('../../includes/db.php');
$conex = new PDOConex();

if (!$conex) {
    $response = array("message" => 'Error de conexión a la base de datos!', "info" => false, "error" => true);
} else {
    $request = file_get_contents("php://input");
    $json = json_decode($request);

    if (isset($json)) {
        $insert = "BEGIN
        InsertarProducto(
            '$json->titulo', 
            '$json->descripcion', 
            $json->precio, 
            '$json->url', 
            $json->id_marca, 
            $json->id_categoria, 
            1 
        );
        END;";
        $result = $conex->execSQL($insert);

        $response = array("message" => "Datos insertados correctamente.", "info" => false, "error" => false);
    } else {
        $response = array("message" => "No se recibieron los datos.", "info" => false, "error" => true);
    }
}

$conex->close();

echo json_encode($response);
?>