<?php
session_start(); // Asegúrate de iniciar la sesión para acceder a los datos del usuario

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_maestro'])) {
    header("Location: login_maestro.php"); // Redirigir si no ha iniciado sesión
    exit;
}

include 'conexion.php';

$id_maestro = $_SESSION['id_maestro'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Maestro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="navbar.css">
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
                <a href="cerrar_sesion.php" class="text-danger">
                    <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                </a>
            </div>
        </div>

        <div class="container">
          
            </nav>

            <div id="contenido" class="mt-4">
    <h2>Bienvenido al Panel de Maestro</h2>
    <p>¡Hola, <strong><?php echo $_SESSION['nombre']; ?></strong>! Bienvenido al sistema de gestión de aprendizaje (LMS) de CtrlEdu. Este sistema ha sido diseñado para facilitar la gestión de tus clases, estudiantes y asignaturas de manera eficiente. A continuación, te explicamos cómo utilizarlo y qué funcionalidades tienes a tu disposición.</p>
    
    <h3>¿Cómo utilizar el LMS?</h3>
    <p>El LMS es intuitivo y fácil de navegar. Aquí tienes algunas instrucciones para comenzar:</p>
    <ul>
        <li><strong>Administrar Alumnos:</strong> En esta sección, podrás agregar nuevos estudiantes, editar la información de los existentes y gestionar su progreso académico.</li>
        <li><strong>Administrar Asignaturas:</strong> Aquí podrás crear y gestionar las asignaturas que impartes, así como establecer los criterios de evaluación y los materiales necesarios para cada curso.</li>
        <li><strong>Reportes:</strong> Tendrás acceso a reportes sobre el desempeño de los alumnos y estadísticas de participación, lo que te permitirá hacer un seguimiento del progreso de cada estudiante.</li>
        <li><strong>Foro de Discusión:</strong> Puedes interactuar con tus estudiantes a través del foro, donde podrás responder preguntas, compartir recursos y fomentar el aprendizaje colaborativo.</li>
        <li><strong>Recursos:</strong> En esta sección, podrás subir y compartir materiales educativos, como documentos, videos y enlaces que ayuden a tus alumnos en su aprendizaje.</li>
    </ul>
    
    <h3>Características del LMS</h3>
    <p>CtrlEdu ofrece varias características que optimizan tu experiencia como docente:</p>
    <ul>
        <li><strong>Interfaz Intuitiva:</strong> La interfaz está diseñada para ser fácil de usar, permitiéndote acceder rápidamente a las funciones que necesitas.</li>
        <li><strong>Acceso desde Cualquier Dispositivo:</strong> Puedes acceder al sistema desde tu computadora, tableta o teléfono móvil, lo que te permite gestionar tus clases en cualquier momento y lugar.</li>
        <li><strong>Soporte Técnico:</strong> Si encuentras algún problema o tienes preguntas sobre el uso del sistema, nuestro equipo de soporte técnico está disponible para ayudarte.</li>
    </ul>

    <h3>Consejos para una Gestión Eficiente</h3>
    <p>Para sacar el máximo provecho del LMS, aquí tienes algunos consejos:</p>
    <ul>
        <li>Actualiza regularmente la información de tus alumnos y asignaturas para mantener todo al día.</li>
        <li>Utiliza el foro para mantener una comunicación abierta con tus estudiantes.</li>
        <li>Revisa los reportes frecuentemente para identificar áreas donde los alumnos pueden necesitar apoyo adicional.</li>
        <li>Incorpora recursos multimedia para enriquecer tus clases y hacerlas más atractivas.</li>
    </ul>

    <p>¡Esperamos que disfrutes usando CtrlEdu y que te ayude a hacer tu labor docente más fácil y efectiva!</p>
</div>


        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </div>
</body>

</html>
