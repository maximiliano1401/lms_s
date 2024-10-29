<?php
session_start(); // Inicia la sesión

// Eliminar todas las variables de sesión
$_SESSION = [];

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión
header("Location: index.php");
exit; // Asegúrate de detener la ejecución del script
?>
