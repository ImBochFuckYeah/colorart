<?php
require_once('../../includes/db.php');
$conex = new PDOConex();

if (!$conex) {
    $response = array("message" => 'Error de conexión a la base de datos!', "info" => false, "error" => true);
} else {
    $get = "SELECT * FROM vista_marca";
    $result = $conex->execSQL($get);
    $result = $conex->toArray($result);

    $resdata = array();
    
    foreach($result as $key => $obj) {
        $data['id'] = $obj['ID_MARCA'];
        $data['descripcion'] = $obj['DESCRIPCION'];
        $data['estado'] = $obj['ESTADO'];
        $subdata['id'] = $obj['ID_MARCA'];
        $subdata['estado'] = $obj['ESTADO'];
        $data['ignore'] = $subdata;
        array_push($resdata, $data);
    }

    $response = array("message" => "Consulta exitosa", "data" => $resdata, "info" => false, "error" => false);
}

$conex->close();

echo json_encode($response);
?>