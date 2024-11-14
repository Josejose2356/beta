<?php
class Database {
    private $hostname = "bhbj5z54gfisyv5jxp2f-mysql.services.clever-cloud.com";
    private $database = "bhbj5z54gfisyv5jxp2f";
    private $username = "ut5xnxfan7okldav";
    private $password = "lY5yrjsDY7UewnLtYBW2"; 
    private $charset = "utf8mb4"; 

    public function conectar() {
        try {
            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($conexion, $this->username, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
            exit;
        }
    }
}
?>