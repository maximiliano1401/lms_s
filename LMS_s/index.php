<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="social.css">
    <title>LMS</title>
</head>
<body>


<style>

</style>

<header>
    <div class="logo">
        <img src="img/logogogo.png" alt="Logo" class="logo-img">
    </div>
    <nav class="navbar">
        <a href="#beneficios"><i class="fas fa-star"></i> Beneficios</a>
        <a href="#testimonios"><i class="fas fa-comments"></i> Testimonios</a>
        <a href="contacto.php"><i class="fas fa-envelope"></i> Contacto</a>
    </nav>
    <div class="menu-icon" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>
</header>

<section class="hero">
    <h1 class="main-title" style="text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.9); margin: 20px;">Bienvenido a Nuestro Proyecto</h1>
    <p style="text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.9); margin: 20px;">Mejorando la educación con innovaciones.</p>
    <button class="btn" onclick="openModal()">Iniciar Sesión</button>
</section>

<section id="beneficios">
    <h2>Beneficios de Nuestro LMS</h2>
    <div class="benefits">
        <div class="benefit">
            <i class="fas fa-user-graduate"></i>
            <h5>Acceso para Todos</h5>
            <p>Plataforma accesible para estudiantes, padres y maestros.</p>
        </div>
        <div class="benefit">
            <i class="fas fa-book-open"></i>
            <h5>Recursos Educativos</h5>
            <p>Acceso a una variedad de materiales educativos y recursos.</p>
        </div>
        <div class="benefit">
            <i class="fas fa-chart-line"></i>
            <h5>Seguimiento de Progreso</h5>
            <p>Herramientas para monitorear el rendimiento académico.</p>
        </div>
    </div>
</section>

<section id="testimonios">
    <h2>Testimonios</h2>
    <div class="testimonial-carousel">
        <div class="testimonial">
            <i class="fas fa-user"></i>
            <blockquote>
                "Este proyecto ha transformado mi forma de aprender."
                <footer>- Estudiante Satisfecho</footer>
            </blockquote>
        </div>
        <div class="testimonial">
            <i class="fas fa-user"></i>
            <blockquote>
                "Una plataforma increíble que facilita el aprendizaje."
                <footer>- Maestro Contento</footer>
            </blockquote>
        </div>
        <div class="testimonial">
            <i class="fas fa-user"></i>
            <blockquote>
                "Gracias a esta herramienta, mis hijos están aprendiendo más rápido."
                <footer>- Padre Orgulloso</footer>
            </blockquote>
        </div>
        <div class="testimonial">
            <i class="fas fa-user"></i>
            <blockquote>
                "Un recurso indispensable para cualquier educador."
                <footer>- Educador Dedicado</footer>
            </blockquote>
        </div>
    </div>
    <div class="carousel-controls">
        <button class="prev" onclick="changeTestimonial(-1)">&#10094;</button>
        <button class="next" onclick="changeTestimonial(1)">&#10095;</button>
    </div>
</section>

<footer>
    <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
    <p>Redes Sociales:</p>
    <div class="radio-inputs">
        <label>
            <input class="radio-input instagram" type="radio" name="engine" />
            <span class="radio-tile instagram">
                <span class="radio-icon">
                    <!-- SVG para Instagram -->
                    <svg class="instagram" fill-rule="nonzero" height="30px" width="30px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero">
                            <g transform="scale(8,8)">
                                <path d="M11.46875,5c-3.55078,0 -6.46875,2.91406 -6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078 -2.91406,-6.46875 -6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266 -1.99609,4.46875 -4.46875,4.46875h-9.0625c-2.47266,0 -4.46875,-1.99609 -4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0 -0.90625,0.40234 -0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391 -0.40234,-0.90625 -0.90625,-0.90625zM16,10c-3.30078,0 -6,2.69922 -6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078 -2.69922,-6 -6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266 -1.77734,4 -4,4c-2.22266,0 -4,-1.77734 -4,-4c0,-2.22266 1.77734,-4 4,-4z"></path>
                            </g>
                        </g>
                    </svg>
                </span>
            </span>
        </label>

        <label>
            <input class="radio-input twitter" type="radio" name="engine" />
            <span class="radio-tile twitter">
                <span class="radio-icon">
                    <!-- SVG para Twitter -->
                    <svg class="twitter" height="30px" width="30px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429"></path>
                    </svg>
                </span>
            </span>
        </label>

        <label>
            <input class="radio-input discord" type="radio" name="engine" />
            <span class="radio-tile discord">
                <span class="radio-icon">
                    <!-- SVG para Discord -->
                    <svg class="discord" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px">
                        <path d="M40,12c0,0-4.585-3.588-10-4l-0.488,0.976C34.408,10.174,36.654,11.891,39,14c-4.045-2.065-8.039-4-15-4s-10.955,1.935-15,4c2.346-2.109,5.018-4.015,9.488-5.024L18,8c-5.681,0.537-10,4-10,4s-5.121,7.425-6,22c5.162,5.953,13,6,13,6l1.639-2.185C13.857,36.848,10.715,35.121,8,32c3.238,2.45,8.125,5,16,5s12.762-2.55,16-5c-2.715,3.121-5.857,4.848-8.639,5.815L33,40c0,0,7.838-0.047,13-6C45.121,19.425,40,12,40,12z M17.5,30c-1.933,0-3.5-1.791-3.5-4c0-2.209,1.567-4,3.5-4s3.5,1.791,3.5,4C21,28.209,19.433,30,17.5,30z M30.5,30c-1.933,0-3.5-1.791-3.5-4c0-2.209,1.567-4,3.5-4s3.5,1.791,3.5,4C34,28.209,32.433,30,30.5,30z"></path>
                    </svg>
                </span>
            </span>
        </label>
    </div>
</footer>


<!-- Modal de Iniciar Sesión -->
<div class="modal" id="loginModal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h5>¿Cómo quieres iniciar sesión?</h5>
        <div class="modal-buttons">
            <a href="maestros/login_maestro.php" class="btn"><i class="fas fa-chalkboard-teacher"></i> Ingresar como Maestro</a>
            <a href="alumnos/login_alumno.php" class="btn"><i class="fas fa-user-graduate"></i> Ingresar como Alumno</a>
        </div>
    </div>
</div>

<script>
// Funciones para abrir y cerrar el modal
function openModal() {
    document.getElementById("loginModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("loginModal").style.display = "none";
}

let currentTestimonialIndex = 0;

function changeTestimonial(direction) {
    const testimonials = document.querySelectorAll('.testimonial');
    testimonials[currentTestimonialIndex].style.transform = `translateX(${direction * -100}%)`;

    currentTestimonialIndex += direction;

    if (currentTestimonialIndex < 0) {
        currentTestimonialIndex = testimonials.length - 1; // Regresa al último
    } else if (currentTestimonialIndex >= testimonials.length) {
        currentTestimonialIndex = 0; // Regresa al primero
    }

    testimonials[currentTestimonialIndex].style.transform = `translateX(0)`; // Muestra el nuevo testimonio
}

// Función para mostrar/ocultar el menú en dispositivos móviles
function toggleMenu() {
    const navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active');
}
</script>

</body>
</html>
