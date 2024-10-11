<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Maestro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="maestro.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Registro como Maestro</h2>
        <form action="procesar_registro_maestro.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="nombre" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]{3,}" maxlength="50" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="apellido" name="apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]{3,}" maxlength="50" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Ingresa un correo válido" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Ingresar Cédula Profesional</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    <input type="text" class="form-control" id="cedula" name="cedula" pattern="\d{8}" max="8" maxlength="8" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener al menos un número, una letra mayúscula y minúscula, y mínimo 8 caractéres y máximo 16" maxlength="16" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="16" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Registrar</button>
        </form>
        <div class="text-center mt-3">
            <a href="login_maestro.php">¿Ya tienes una cuenta? Inicia sesión aquí.</a>
        </div>
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-secondary">Regresar</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
