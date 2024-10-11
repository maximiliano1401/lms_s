<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $cedula = $_POST['cedula'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verificar si las contraseñas coinciden
    if ($password !== $confirm_password) {
        echo "<script>
                alert('Las contraseñas no coinciden.');
                window.history.back();
              </script>";
        exit;
    }

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Aquí va la conexión a la base de datos
    require 'conexion.php'; // Asegúrate de incluir tu archivo de conexión

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO maestros (nombre, apellido, email, cedula, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $email, $cedula, $hashed_password);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<script>
                alert('Registro exitoso. Ahora puedes iniciar sesión.');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'index.php';
              </script>";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
}
?>
