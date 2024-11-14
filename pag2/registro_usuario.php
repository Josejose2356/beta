<?php
include 'conexion.php'; // Incluye la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $conn = $db->conectar();

    // Captura los datos enviados desde el formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Encripta la contraseña

    // Inserta los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombres, apellidos, correo, contraseña) VALUES (?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombres, $apellidos, $correo, $contraseña]);
        echo "Usuario registrado correctamente.";
    } catch (PDOException $e) {
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
?>
