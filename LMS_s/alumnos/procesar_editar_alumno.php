<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_alumno = $_SESSION['id_alumno'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $password = $_POST['password'];

    require '../conexion.php'; // Incluir la conexión a la base de datos

    // Actualizar los datos
    if (!empty($password)) {
        // Hashear la nueva contraseña si se proporciona
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE registro_alumnos SET nombre = ?, apellido = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nombre, $apellido, $hashed_password, $id_alumno);
    } else {
        // Si no se proporciona una nueva contraseña, no se actualiza
        $stmt = $conn->prepare("UPDATE registro_alumnos SET nombre = ?, apellido = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nombre, $apellido, $id_alumno);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Actualiza las variables de sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;

        echo "<script>
                alert('Información actualizada con éxito.');
                window.location.href = 'alumno.php';
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
    header("Location: ../alumno.php");
}
?>
