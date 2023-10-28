<?php
require_once('../../includes/db.php');
$conex = new PDOConex();

if (!$conex) {
    $response = array("message" => 'Error de conexión a la base de datos!', "info" => false, "error" => true);
} else {
    $get = "SELECT * FROM vista_producto";
    $result = $conex->execSQL($get);
    $result = $conex->toArray($result);
    
    $resdata = array();
    foreach($result as $key => $obj) {
        $data['id_producto'] = $obj['ID_PRODUCTO'];
        $data['titulo'] = $obj['TITULO'];
        $data['descripcion_producto'] = $obj['DESCRIPCION_PRODUCTO'];
        $data['precio'] = $obj['PRECIO'];
        $data['url'] = $obj['URL'];
        $data['id_marca'] = $obj['ID_MARCA'];
        $data['descripcion_marca'] = $obj['DESCRIPCION_MARCA'];
        $data['id_categoria'] = $obj['ID_CATEGORIA'];
        $data['descripcion_categoria'] = $obj['DESCRIPCION_CATEGORIA'];
        
        $subdata['id'] = $obj['ID_PRODUCTO'];
        $subdata['estado'] = $obj['ESTADO'];
        
        $data['ignore'] = $subdata;
        array_push($resdata, $data);
    }

    $response = array("message" => "Consulta exitosa", "data" => $resdata, "info" => false, "error" => false);
}

$conex->close();

echo json_encode($response);
?>