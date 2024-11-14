<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Crear una instancia de la base de datos
$db = new Database();
$conn = $db->conectar(); // Obtener la conexión

// Validar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $fecha_hora = $_POST['fecha_hora'];
    $nombre_solicitante = $_POST['nombre_solicitante'];
    $planta = $_POST['planta'];
    $ubicacion = $_POST['ubicacion'];
    $equipo = $_POST['equipo'];
    $prioridad = $_POST['prioridad'];
    $tipo_mantenimiento = $_POST['tipo_mantenimiento'];
    $descripcion_servicio = $_POST['descripcion_servicio'];
    $nota_operario = $_POST['nota_operario'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO solicitudes (
                fecha_hora,
                nombre_solicitante,
                planta,
                ubicacion,
                equipo,
                prioridad,
                tipo_mantenimiento,
                descripcion_servicio,
                nota_operario
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Usar una declaración preparada
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $fecha_hora,
            $nombre_solicitante,
            $planta,
            $ubicacion,
            $equipo,
            $prioridad,
            $tipo_mantenimiento,
            $descripcion_servicio,
            $nota_operario
        ]);
        echo "Solicitud registrada correctamente.";
    } catch (PDOException $e) {
        echo "Error al registrar la solicitud: " . $e->getMessage();
    }
}
?>
