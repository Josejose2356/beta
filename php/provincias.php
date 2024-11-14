<?php
include('conexion.php');

if (isset($_GET['id_dep'])) {
    $id_dep = intval($_GET['id_dep']);
    $db = new CodeaDB();
    $provincias = $db->buscar("provincias", "id_dep = $id_dep");
    echo json_encode($provincias);
}
?>
