<?php
// Verificar si el archivo está siendo accedido directamente
if (!defined('INCLUDED')) {
    //die('Acceso no permitido');
    header("Location: administrar_asignaturas.php");
}

// Configuración de la conexión a la base de datos
require '../conexion.php';

// Obtener datos de la base de datos
$sql = "SELECT * FROM asignaturas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr data-id='" . htmlspecialchars($row['id']) . "'>";
        echo "<td>" . htmlspecialchars($row['nombreAsignatura']) . "</td>";
        echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
        echo "<td>" . htmlspecialchars($row['horas']) . "</td>";
        echo "<td>" . htmlspecialchars($row['profesor']) . "</td>";
        echo "<td>
                <a href='funciones_asignatura.php?accion=editar&id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>
                <a href='funciones_asignatura.php?accion=eliminar&id={$row['id']}'  onclick=\"return confirm('¿Estás seguro de que quieres eliminar esta asignatura?');\" class='btn btn-danger btn-sm'>Eliminar</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No se encontraron asignaturas.</td></tr>";
}

$conn->close();
?>
