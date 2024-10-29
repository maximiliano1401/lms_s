<?php
session_start(); // Asegúrate de iniciar la sesión para acceder a los datos del usuario

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_maestro'])) {
    header("Location: login_maestro.php"); // Redirigir si no ha iniciado sesión
    exit;
}

// Conexión a la base de datos
include '../conexion.php'; // Asegúrate de que este archivo contenga la conexión a tu base de datos

// Consulta para obtener alumnos
$query_alumnos = "SELECT id, nombre, apellido FROM registro_alumnos";
$result_alumnos = mysqli_query($conn, $query_alumnos);

// Consulta para obtener asignaturas
$query_asignaturas = "SELECT id, nombreAsignatura FROM asignaturas";
$result_asignaturas = mysqli_query($conn, $query_asignaturas);

// Consulta para obtener maestros
$query_maestros = "SELECT id, nombre, apellido FROM maestros";
$result_maestros = mysqli_query($conn, $query_maestros);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Clase</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="d-flex">
        <!-- Menú lateral -->
        <div class="sidebar">
            <a href="/" class="logo">CtrlEdu</a>
            <div class="user-info">
                <a href="actualizar_maestro.php" class="text-decoration-none text-dark">
                    <i class="fas fa-user-circle fa-lg me-2"></i>
                    <span><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span>
                </a>
            </div>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="maestro.php" class="nav-link">
                        <i class="fas fa-chalkboard-teacher me-2"></i> Maestro
                    </a>
                </li>
                <li class="nav-item">
                    <a href="administrar_alumnos.php" class="nav-link">
                        <i class="fas fa-users me-2"></i> Administrar Alumnos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="administrar_asignaturas.php" class="nav-link">
                        <i class="fas fa-book me-2"></i> Administrar Asignaturas
                    </a>
                </li>

                <li class="nav-item">
                <a href="bitacora.php" class="nav-link">
                    <i class="fas fa-clipboard me-2"></i> Bitácora de Anotaciones
                </a>
            </li>

            </ul>

            <hr>
            <div class="logout">
                <a href="../cerrar_sesion.php" class="text-danger">
                    <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                </a>
            </div>
        </div>

    <div class="container mt-4">
        <h1>Asignar Clases a Alumnos</h1>
        <form action="procesar_asignacion.php" method="POST">
            <div class="mb-3">
                <label for="id_alumno" class="form-label">Seleccionar Alumno</label>
                <select name="id_alumno" id="id_alumno" class="form-select" required>
                    <option value="">-- Selecciona un Alumno --</option>
                    <?php
                    while ($alumno = mysqli_fetch_assoc($result_alumnos)) {
                        echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre'] . " " . $alumno['apellido'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_asignatura" class="form-label">Seleccionar Asignatura</label>
                <select name="id_asignatura" id="id_asignatura" class="form-select" required>
                    <option value="">-- Selecciona una Asignatura --</option>
                    <?php
                    while ($asignatura = mysqli_fetch_assoc($result_asignaturas)) {
                        echo "<option value='" . $asignatura['id'] . "'>" . $asignatura['nombreAsignatura'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_maestro" class="form-label">Seleccionar Maestro</label>
                <select name="id_maestro" id="id_maestro" class="form-select" required>
                    <option value="">-- Selecciona un Maestro --</option>
                    <?php
                    while ($maestro = mysqli_fetch_assoc($result_maestros)) {
                        echo "<option value='" . $maestro['id'] . "'>" . $maestro['nombre'] . " " . $maestro['apellido'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Asignar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>
