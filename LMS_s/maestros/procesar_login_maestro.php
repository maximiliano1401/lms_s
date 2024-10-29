<?php
session_start(); // Iniciar la sesión
require '../conexion.php'; // Incluir archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultar el usuario por correo
    $sql = "SELECT * FROM maestros WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $fila['password'])) {
            // Guardar datos del usuario en la sesión
            $_SESSION['id_maestro'] = $fila['id'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['apellido'] = $fila['apellido'];
            // Redirigir a la página de inicio del maestro
            header("Location: maestro.php");
            exit;
        } else {
            echo "<script>
                alert('Contraseña incorrecta.');
                window.history.back();
              </script>";
        }
    } else {
        echo "<script>
                alert('Correo no registrado.');
                window.history.back();
              </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../index.php");
}
?>

