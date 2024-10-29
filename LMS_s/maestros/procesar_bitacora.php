<?php
session_start();
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_alumno = $_POST['id_alumno'];
    $id_maestro = $_SESSION['id_maestro']; // Obtenemos el id del maestro desde la sesión
    $anotacion = $_POST['anotacion'];

    // Insertar anotación en la bitácora
    $query = "INSERT INTO bitacora (id_alumno, id_maestro, anotacion) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iis', $id_alumno, $id_maestro, $anotacion);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Anotación guardada exitosamente.');
                window.location.href = 'bitacora.php';
              </script>";
    } else {
        echo "<script>
        alert(Error al guardar la anotación: $conn->error);
        window.location.href = 'bitacora.php';
      </script>";
    }
} else {
    header("Location: ../bitacora.php");
}
?>
