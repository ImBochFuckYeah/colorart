<?php
require_once('../../includes/db.php');
$conex = new PDOConex();

if (!$conex) {
    $response = array("message" => 'Error de conexión a la base de datos!', "info" => false, "error" => true);
} else {
    $request = file_get_contents("php://input");
    $json = json_decode($request);

    if (isset($json)) {
        $categories = "SELECT * FROM vista_categoria WHERE id_categoria = $json->id";
        $result = $conex->execSQL($categories);
        $result = $conex->toArray($result);

        $resdata = array();

        foreach ($result as $key => $obj) {
            $data['id'] = $obj['ID_CATEGORIA'];
            $data['descripcion'] = $obj['DESCRIPCION'];

            $products = "SELECT 
            * 
        FROM 
            vista_producto
        WHERE 
            id_categoria = " . $obj['ID_CATEGORIA'] . "";
            $result = $conex->execSQL($products);
            $result = $conex->toArray($result);

            $data['productos'] = $result;

            array_push($resdata, $data);
        }

        $response = array("message" => "Consulta exitosa", "data" => $resdata, "info" => false, "error" => false);
    } else {
        $response = array("message" => "No se recibieron los datos.", "info" => false, "error" => true);
    }

}

$conex->close();

echo json_encode($response);
?>