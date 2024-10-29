<?php
session_start(); // Iniciar la sesión

// Verificar si el alumno ha iniciado sesión
if (!isset($_SESSION['id_alumno'])) {
    header("Location: login_alumno.php"); // Redirigir al login si no ha iniciado sesión
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio en el LMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../navbar.css">

</head>
<body>


<div class="sidebar">
    <a href="" class="logo">CtrlEdu</a>
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
        <a href="../cerrar_sesion.php" class="text-danger">
            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
        </a>
    </div>
</div>


    <div class="container mt-4">
        <h1>Bienvenido a tu LMS de Control Escolar</h1>
        <p>Esta plataforma está diseñada para facilitar tu aprendizaje y gestión académica. Aquí podrás acceder a tus asignaturas, consultar tus notas, interactuar con tus profesores y mucho más.</p>

        <h2>¿Cómo iniciar?</h2>
        <ol>
            <li><strong>Inicia sesión:</strong> Usa tus credenciales (correo electrónico y contraseña) para acceder a tu cuenta.</li>
            <li><strong>Accede a tus asignaturas:</strong> Una vez que hayas iniciado sesión, dirígete a la sección "Mis Asignaturas" en el menú lateral para ver todas las materias que cursas.</li>
            <li><strong>Consulta tus notas:</strong> En la sección de cada asignatura, podrás ver tus calificaciones y evaluaciones.</li>
            <li><strong>Comunícate con tus profesores:</strong> Puedes enviar mensajes o preguntas a tus docentes a través de la plataforma.</li>
            <li><strong>Revisa la bitácora:</strong> Mantente al tanto de cualquier anotación importante en la sección de "Bitácora".</li>
        </ol>

        <h2>Consejos Útiles</h2>
        <ul>
            <li>Revisa la plataforma regularmente para estar al tanto de cualquier anuncio o actividad.</li>
            <li>Utiliza la función de búsqueda para encontrar rápidamente información o asignaturas.</li>
            <li>No dudes en contactar a tu profesor si tienes dudas sobre el contenido o las tareas.</li>
        </ul>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
