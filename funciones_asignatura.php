<?php
// Habilitar el reporte de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'escuela';
$username = 'root';
$password = '';

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para insertar una nueva asignatura
function insertarAsignatura($conn) {
    $nombreAsignatura = $_POST['nombreAsignatura'];
    $descripcion = $_POST['descripcion'];
    $horas = $_POST['horas'];
    $profesor = $_POST['profesor'];

    $sql = "INSERT INTO asignaturas (nombreAsignatura, descripcion, horas, profesor) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    $stmt->bind_param("ssss", $nombreAsignatura, $descripcion, $horas, $profesor);

    if ($stmt->execute()) {
        echo "Asignatura guardada exitosamente.";
        header('Location: administrar_asignaturas.php');
    } else {
        echo "Error al guardar la asignatura: " . $stmt->error;
    }
    $stmt->close();
}

// Función para obtener los datos de una asignatura para edición
function obtenerAsignatura($conn, $id) {
    $sql = "SELECT * FROM asignaturas WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Función para actualizar una asignatura
function actualizarAsignatura($conn) {
    $id = $_POST['id'];
    $nombreAsignatura = $_POST['nombreAsignatura'];
    $descripcion = $_POST['descripcion'];
    $horas = $_POST['horas'];
    $profesor = $_POST['profesor'];

    $sql = "UPDATE asignaturas SET nombreAsignatura=?, descripcion=?, horas=?, profesor=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $nombreAsignatura, $descripcion, $horas, $profesor, $id);

    if ($stmt->execute()) {
        echo "Asignatura actualizada exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    header('Location: administrar_asignaturas.php');
    exit();
}

// Función para eliminar una asignatura
function eliminarAsignatura($conn, $id) {
    $sql = "DELETE FROM asignaturas WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "Asignatura eliminada exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    header('Location: administrar_asignaturas.php');
    exit();
}

// Comprobar la acción a realizar (crear, editar, actualizar o eliminar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        // Si existe un ID, actualizar la asignatura
        actualizarAsignatura($conn);
    } else {
        // Si no hay ID, insertar nueva asignatura
        insertarAsignatura($conn);
    }
} elseif (isset($_GET['accion'])) {
    if ($_GET['accion'] === 'editar' && isset($_GET['id'])) {
        // Obtener los datos de la asignatura para editar
        $id = $_GET['id'];
        $asignatura = obtenerAsignatura($conn, $id);
        // Mostrar formulario de edición
        ?>
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Asignatura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Asignatura</h2>
        <form action="funciones_asignatura.php" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($asignatura['id']); ?>">
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombreAsignatura" value="<?php echo htmlspecialchars($asignatura['nombreAsignatura']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($asignatura['descripcion']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="horas" class="form-label">Horas</label>
                <input type="text" class="form-control" id="horas" name="horas" value="<?php echo htmlspecialchars($asignatura['horas']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="profesor" class="form-label">Profesor</label>
                <input type="text" class="form-control" id="profesor" name="profesor" value="<?php echo htmlspecialchars($asignatura['profesor']); ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg w-100">Guardar Cambios</button>
        </form>
        <a href="administrar_asignaturas.php" class="btn btn-secondary btn-lg w-100 mt-3">Volver</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

        <?php
    } elseif ($_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
        // Eliminar la asignatura
        $id = $_GET['id'];
        eliminarAsignatura($conn, $id);
    }
} else {
    header("Location: administrar_asignaturas.php");
}

// Cerrar la conexión
$conn->close();
?>
