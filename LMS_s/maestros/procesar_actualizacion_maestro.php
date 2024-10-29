<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_maestro = $_SESSION['id_maestro'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $password = $_POST['password'];

    require '../conexion.php'; // Incluir la conexión a la base de datos

    // Actualizar los datos
    if (!empty($password)) {
        // Hashear la nueva contraseña si se proporciona
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE maestros SET nombre = ?, apellido = ?, cedula = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nombre, $apellido, $cedula, $hashed_password, $id_maestro);
    } else {
        // Si no se proporciona una nueva contraseña, no se actualiza
        $stmt = $conn->prepare("UPDATE maestros SET nombre = ?, apellido = ? , cedula = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nombre, $apellido, $cedula, $id_maestro);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Actualiza las variables de sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;

        echo "<script>
                alert('Información actualizada con éxito.');
                window.location.href = 'maestro.php'; 
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.history.back();
              </script>";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    header("Location: ../maestro.php");
}
?>
