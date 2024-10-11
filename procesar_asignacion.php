<?php
session_start();
include 'conexion.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $id_alumno = $_POST['id_alumno'];
    $id_asignatura = $_POST['id_asignatura'];
    $id_maestro = $_POST['id_maestro'];

    // Consulta para insertar los datos en la tabla clases_asignadas
    $query = "INSERT INTO clases_asignadas (id_alumno, id_asignatura, id_maestro, calificacion) 
              VALUES ('$id_alumno', '$id_asignatura', '$id_maestro', NULL)";
    
    if (mysqli_query($conn, $query)) {
        echo "Asignatura asignada exitosamente.";
        header("Location: administrar_alumnos.php"); // Redirige de vuelta a la página de administración
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    header("Location: administrar_alumnos.php");
}
?>
