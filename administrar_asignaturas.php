<?php
session_start(); // Asegúrate de iniciar la sesión para acceder a los datos del usuario

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_maestro'])) {
    header("Location: login_maestro.php"); // Redirigir si no ha iniciado sesión
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Asignaturas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="navbar.css">
  
</head>
<body>

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
            <a href="administrar_asignaturas.php" class="nav-link active">
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
        <a href="cerrar_sesion.php" class="text-danger">
            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
        </a>
    </div>
</div>

<!-- Contenido principal -->
<div class="container">
    <h1 class="mt-4">Administrar Asignaturas</h1>

    <!-- Barra de búsqueda -->
    <div class="mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="Buscar asignatura..." onkeyup="filtrarAsignaturas()">
    </div>

    <!-- Tabla para administrar asignaturas -->
    <table class="table table-striped table-hover" id="asignaturasTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Horas Semanales</th>
                <th>Profesor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            define('INCLUDED', true);
            include 'mostrar_asignaturas.php';
            ?>
        </tbody>
    </table>

    <!-- Botón para agregar una nueva asignatura -->
    <button class="btn btn-success mt-3" onclick="agregarAsignatura()">Agregar Asignatura</button>
</div>

<!-- Modal para agregar/editar asignatura -->
<div class="modal fade" id="asignaturaModal" tabindex="-1" aria-labelledby="asignaturaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="asignaturaModalLabel">Agregar Asignatura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar/editar asignatura -->
                <form id="asignaturaForm" action="funciones_asignatura.php" method="POST">
                    <div class="mb-3">
                        <label for="nombreAsignatura" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreAsignatura" name="nombreAsignatura" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="horas" class="form-label">Horas Semanales</label>
                        <input type="number" class="form-control" id="horas" name="horas" required>
                    </div>
                    <div class="mb-3">
                        <label for="profesor" class="form-label">Profesor</label>
                        <input type="text" class="form-control" id="profesor" name="profesor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function agregarAsignatura() {
        var myModal = new bootstrap.Modal(document.getElementById('asignaturaModal'), {
            keyboard: false
        });
        document.getElementById('asignaturaModalLabel').textContent = 'Agregar Asignatura';
        document.getElementById('asignaturaForm').reset();
        myModal.show();
    }

    function filtrarAsignaturas() {
        var input = document.getElementById('searchInput');
        var filter = input.value.toLowerCase();
        var table = document.getElementById('asignaturasTable');
        var rows = table.getElementsByTagName('tr');

        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cells.length - 1; j++) {
                if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
            rows[i].style.display = found ? "" : "none";
        }
    }
</script>
</body>
</html>
