<?php
session_start(); // Iniciar la sesión para obtener el ID del alumno

// Verificar si el alumno ha iniciado sesión
if (isset($_SESSION['id_alumno'])) {
    header("Location: comienzo_alumno.php"); // Redirigir al login si no ha iniciado sesión
    exit;
} elseif (isset($_SESSION['id_maestro'])) {
    header("Location: ../maestros/maestro.php");
    exit;
}
?>

<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../maestro.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Iniciar Sesión como Alumno</h2>
        <form action="procesar_login_alumno.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Iniciar Sesión</button>
        </form>

        <div class="text-center mt-3">
            <a href="registro_alumno.php">¿No tienes una cuenta? Regístrate aquí.</a>
        </div>

        <div class="text-center mt-3">
            <a href="../index.php" class="btn btn-secondary">Regresar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
