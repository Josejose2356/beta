<?php
include('conexion.php');

if (isset($_GET['id_pro'])) {
    $id_pro = intval($_GET['id_pro']);  // Convierte el parámetro id_pro a un entero seguro
    $db = new CodeaDB();
    
    // Consulta los municipios que pertenecen a la provincia seleccionada
    $municipios = $db->buscar("municipios", "id_pro = $id_pro");
    
    // Devuelve los resultados en formato JSON
    echo json_encode($municipios);
}
?>
