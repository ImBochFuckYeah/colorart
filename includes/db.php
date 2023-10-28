<?php
/* Please set SQLNET.AUTHENTICATION_SERVICES= (NONE) in file C:\app\YourUser\product\21c\homes\OraDB21Home1\NETWORK\ADMIN\sqlnet.ora */
class PDOConex
{
    private $host;
    private $port;
    private $sid;
    private $user;
    private $pass;
    private $conexion;

    function __construct()
    {
        $this->host = 'localhost';
        $this->port = '1521';
        $this->sid = 'xe';
        $this->user = 'MYUSER';
        $this->pass = 'root';
        $this->conectarPDO();
    }

    private function conectarPDO()
    {
        try {
            $dsn = 'oci:dbname=//' . $this->host . ':' . $this->port . '/' . $this->sid;
            $this->conexion = new PDO($dsn, $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            die();
        }
    }

    public function execSQL($query, $mostrarError = false)
    {
        try {
            $statement = $this->conexion->prepare($query);
            $statement->execute();

            if ($mostrarError && $statement->errorCode() !== '00000') {
                $errorInfo = $statement->errorInfo();
                echo 'Error de consulta: ' . $errorInfo[2];
                return null;
            }
            return $statement;
        } catch (PDOException $e) {
            echo 'Error de consulta: ' . $e->getMessage();
            return null;
        }
    }

    public function toJson($response)
    {
        $jsonArray = [];
        while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
            $jsonArray[] = $row;
        }
        return $jsonArray;
    }
    
    public function toJsonArray($response)
    {
        $jsonArray = [];
        while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
            $jsonArray[] = $row;
        }
        return json_encode($jsonArray);
    }

    public function simpleValue($response)
    {
        if ($response) {

            $result = $response->fetchColumn();
            if ($result === false) {
                return 0; // Valor predeterminado si no se encuentra ningún resultado.
            }
            return intval($result);
        }
        return 0;
    }

    public function simpleData($response)
    {
        if ($response) {

            $result = $response->fetchColumn();
            if ($result === false) {
                return 0; // Valor predeterminado si no se encuentra ningún resultado.
            }
            return $result;
        }
        return 0;
    }

    public function close()
    {
        $this->conexion = null;
    }
}
?>