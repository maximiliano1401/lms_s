<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_maestro'])) {
    header("Location: login_maestro.php");
    exit;
}

require 'conexion.php'; // Incluir la conexión a la base de datos

$id_maestro = $_SESSION['id_maestro']; // Esto debería contener el id del maestro

// Preparar la consulta para obtener los datos actuales del maestro
$stmt = $conn->prepare("SELECT nombre, apellido, cedula FROM maestros WHERE id = ?");
$stmt->bind_param("i", $id_maestro); // Cambia 'i' si el tipo de datos es diferente

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $cedula = $row['cedula'];
} else {
    echo "No se encontraron datos para el maestro.";
}

// Cerrar la consulta
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Información del Maestro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="maestro.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Actualizar Información</h2>
        <form action="procesar_actualizacion_maestro.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $cedula; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Nueva Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
                <small>Deja este campo vacío si no deseas cambiar la contraseña.</small>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Actualizar</button>
        </form>
        <a href="maestro.php" class="btn btn-secondary btn-lg w-100 mt-3">Regresar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
