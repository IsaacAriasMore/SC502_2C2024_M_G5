<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/Registrarse.css">
</head>
<body>


<div class="contenido">
    <div class="container">
        <h2>Registro</h2>
        <form action="signup_process.php" method="post" class="form-centered">
            <!-- Formulario de registro -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required><br><br>

            <button type="button" class="boton btn btn-success" value="Registrarse">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="./Iniciar_Sesion.php">Inicia sesión aquí</a>.</p>
    </div>
</div>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> <!--/*Para futuro apartado de comentarios*/-->
<script src="https://unpkg.com/scrollreveal"></script>
<script src="./assets/js/index.js"></script>
</html>
