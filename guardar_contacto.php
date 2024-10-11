<?php
include 'conexion.php'; // Incluye tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Preparar y vincular
    $stmt = $conn->prepare("INSERT INTO contactos (nombre, email, mensaje) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: contacto.php?success=1"); // Redirige a contacto.php con un parámetro de éxito
    } else {
        header("Location: contacto.php?error=1"); // Redirige a contacto.php con un parámetro de error
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>
