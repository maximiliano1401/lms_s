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
function insertarAlumnos($conn) {
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $aula = $_POST['aula'];
    $ano = $_POST['ano'];

    $sql = "INSERT INTO alumnos (nombre, apellidoPaterno, apellidoMaterno, aula, ano) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    $stmt->bind_param("sssss", $nombre, $apellidoPaterno, $apellidoMaterno, $aula, $ano);

    if ($stmt->execute()) {
        echo "Alumno guardada exitosamente.";
        header('Location: administrar_alumnos.php');
    } else {
        echo "Error al guardar la alumno: " . $stmt->error;
    }
    $stmt->close();
}

// Función para obtener los datos de una asignatura para edición
function obtenerAlumno($conn, $id) {
    $sql = "SELECT * FROM alumnos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Función para actualizar una asignatura
function actualizarAlumno($conn) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $aula = $_POST['aula'];
    $ano = $_POST['ano'];

    $sql = "UPDATE alumnos SET nombre=?, apellidoPaterno=?, apellidoMaterno=?, aula=?, ano=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $nombre, $apellidoPaterno, $apellidoMaterno, $aula, $ano, $id);

    if ($stmt->execute()) {
        echo "Alumno actualizada exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    header('Location: administrar_alumnos.php');
    exit();
}

// Función para eliminar una asignatura
function eliminarAlumno($conn, $id) {
    $sql = "DELETE FROM alumnos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "Alumno eliminada exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    header('Location: administrar_alumnos.php');
    exit();
}

// Comprobar la acción a realizar (crear, editar, actualizar o eliminar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        // Si existe un ID, actualizar la asignatura
        actualizarAlumno($conn);
    } else {
        // Si no hay ID, insertar nueva asignatura
        insertarAlumnos($conn);
    }
} elseif (isset($_GET['accion'])) {
    if ($_GET['accion'] === 'editar' && isset($_GET['id'])) {
        // Obtener los datos de la asignatura para editar
        $id = $_GET['id'];
        $alumno = obtenerAlumno($conn, $id);
        // Mostrar formulario de edición
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Editar alumno</title>
        </head>
        <body>
            <h2>Editar alumno</h2>
            <form action="funciones_alumnos.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($alumno['id']); ?>">
                <label for="nombre">Nombres:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($alumno['nombre']); ?>" required><br>
                <label for="apellidoPaterno">Apellido Paterno:</label>
                <input type="text" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo htmlspecialchars($alumno['apellidoPaterno']); ?>" required><br>
                <label for="apellidoMaterno">Apellido Materno:</label>
                <input type="text" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo htmlspecialchars($alumno['apellidoMaterno']); ?>" required><br>
                <label for="aula">Aula:</label>
                <input type="text" id="aula" name="aula" value="<?php echo htmlspecialchars($alumno['aula']); ?>" required><br>
                <label for="ano">Año:</label>
                <input type="text" id="ano" name="ano" value="<?php echo htmlspecialchars($alumno['ano']); ?>" required><br>
                <button type="submit">Guardar Cambios</button>
            </form>
            <a href="administrar_alumnos.php">Volver</a>
        </body>
        </html>
        <?php
    } elseif ($_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
        // Eliminar la alumno
        $id = $_GET['id'];
        eliminarAlumno($conn, $id);
    }
}

// Cerrar la conexión
$conn->close();
?>
