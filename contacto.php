<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="contacto/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Estilos del modal */
        .modal {
            display: none; /* Ocultar el modal por defecto */
            position: fixed; /* Queda en la pantalla */
            z-index: 1; /* Por encima de otros elementos */
            left: 0;
            top: 0;
            width: 100%; /* Ancho completo */
            height: 100%; /* Alto completo */
            overflow: auto; /* Habilita el scroll si es necesario */
            background-color: rgb(0,0,0); /* Color de fondo */
            background-color: rgba(0,0,0,0.4); /* Fondo negro con opacidad */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% desde la parte superior y centrado */
            padding: 20px;
            border: 1px solid #888;
            width: 40%; /* Ancho del modal */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="contact">
        <div class="content">
            <h2>Contáctanos</h2>
            <p>Si deseas contactarnos, puedes hacerlo a través de cualquiera de los métodos que se detallan a continuación.</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="text">
                        <h3>Dirección</h3>
                        <p>S/N Av. Gob, <br> Campeche, México, <br> 24020</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="text">
                        <h3>Teléfono</h3>
                        <p>+52 982 1250 643</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>salomonpablo648@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="contactForm">
                <h2>Escríbenos</h2>
                <form action="guardar_contacto.php" method="post">
                    <div class="inputBox">
                        <input type="text" name="nombre" required>
                        <span>Nombre</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="mensaje" required></textarea>
                        <span>Mensaje</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>

        <a href="index.php" id="backLink">Regresar</a>
    </section>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById("myModal");
        const span = document.getElementsByClassName("close")[0];
        
        // Verifica si el parámetro success está presente en la URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            document.getElementById("modal-message").innerText = "Mensaje enviado correctamente.";
            modal.style.display = "block"; // Muestra el modal
        } else if (urlParams.has('error')) {
            document.getElementById("modal-message").innerText = "Error al enviar el mensaje. Por favor intenta de nuevo.";
            modal.style.display = "block"; // Muestra el modal
        }

        // Cuando el usuario hace clic en <span> (x), cerrar el modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cuando el usuario hace clic en cualquier lugar fuera del modal, cerrar el modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>
</body>

</html>
