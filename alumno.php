<?php
session_start(); // Iniciar la sesión para obtener el ID del alumno

// Verificar si el alumno ha iniciado sesión
if (!isset($_SESSION['id_alumno'])) {
    header("Location: login_alumno.php"); // Redirigir al login si no ha iniciado sesión
    exit;
}

// Conexión a la base de datos
include 'conexion.php'; // Asegúrate de que este archivo contenga la conexión a tu base de datos

$id_alumno = $_SESSION['id_alumno'];

// Consulta para obtener las asignaturas asignadas al alumno junto con el nombre del maestro
$query = "
    SELECT asignaturas.nombreAsignatura, maestros.nombre AS nombre_maestro, maestros.apellido AS apellido_maestro 
    FROM clases_asignadas 
    INNER JOIN asignaturas ON clases_asignadas.id_asignatura = asignaturas.id 
    INNER JOIN maestros ON clases_asignadas.id_maestro = maestros.id 
    WHERE clases_asignadas.id_alumno = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_alumno); // 'i' indica que es un entero
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron asignaturas
if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    $mensaje = "No tienes asignaturas asignadas.";
}

// Consulta para obtener las anotaciones de la bitácora del alumno
$query_bitacora = "
    SELECT anotacion, fecha 
    FROM bitacora 
    WHERE id_alumno = ?
    ORDER BY fecha DESC
";

$stmt_bitacora = $conn->prepare($query_bitacora);
$stmt_bitacora->bind_param("i", $id_alumno);
$stmt_bitacora->execute();
$result_bitacora = $stmt_bitacora->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="navbar.css">
</head>
<body>
   <div class="sidebar">
    <a href="/" class="logo">CtrlEdu</a>
    <div class="user-info">
        <a href="editar_alumno.php" class="text-decoration-none text-dark">
            <i class="fas fa-user-circle fa-lg me-2"></i>
            <span><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span>
        </a>
    </div>
    <hr>
    <ul class="nav flex-column">

    <li class="nav-item">
            <a href="comienzo_alumno.php" class="nav-link">
                <i class="fas fa-chalkboard-teacher me-2" ></i> Alumno
            </a>
        </li>
     

        <li class="nav-item">
            <a href="alumno.php" class="nav-link">
                <i class="fas fa-chalkboard-teacher me-2"></i> Administrar
            </a>
        </li>
       
    </ul>
    <hr>
    <div class="logout">
        <a href="cerrar_sesion.php" class="text-danger">
            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
        </a>
    </div>
</div>


        <!-- Contenido principal -->
        <div class="container mt-4">
            <h1>Mis Asignaturas</h1>

            <?php if (isset($mensaje)): ?>
                <div class="alert alert-warning"><?php echo $mensaje; ?></div>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Asignatura</th>
                            <th>Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['nombreAsignatura']; ?></td>
                                <td><?php echo $row['nombre_maestro'] . " " . $row['apellido_maestro']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <h2>Anotaciones en la Bitácora</h2>
            <?php if (mysqli_num_rows($result_bitacora) > 0): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Anotación</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($bitacora = mysqli_fetch_assoc($result_bitacora)): ?>
                            <tr>
                                <td><?php echo $bitacora['anotacion']; ?></td>
                                <td><?php echo date("d-m-Y H:i", strtotime($bitacora['fecha'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-info">No hay anotaciones en la bitácora.</div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
