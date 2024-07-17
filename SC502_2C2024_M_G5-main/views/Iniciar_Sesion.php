<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/Iniciar_Sesion.css">
</head>
<body>

<div class="contenido">
    <div class="container">
        <h2>Iniciar sesión</h2>
        <form method="post" class="form-centered" id="loginForm">
           
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo" required><br><br>

            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required><br><br>

            <button type="buttom" class="boton btn btn-success" value="Iniciar_sesión" onclick="window.location.href = './index.php';">Iniciar sesión</button>
        </form>
        <p>¿No tienes cuenta? <a href="./Registrarse.php">Regístrate aquí</a>.</p>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> <!--/*Para futuro apartado de comentarios*/-->
<script src="https://unpkg.com/scrollreveal"></script>
<script src="./assets/js/iniciar_Sesion.js"></script>
</html>
