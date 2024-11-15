<?php
class CodeaDB{    
    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="1234";
    private $db     ="datosdepartamentos";
    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db) or die("error");
        $this->conexion->set_charset("utf8");
    }
    //BUSCAR
    public function buscar($tabla, $condicion){
        $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
        if($resultado)
            return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    } 
}