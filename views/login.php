<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/plantillafooter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    
</head>
<body>
<nav class="navbaruserad navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php" style="text-align:center">
                <img src="./assets/img/Logo.png" style="height: 80px; width: 80px" alt="Logo" style="text-align:center">
            </a>

            <strong style="margin-right:43%; color:white; font-size:30px">INMIGRAWEB LOGIN</strong>

        </div>
    </nav>
    <div class="container" style="margin-top: 300px; width:700px; height:500px">
    <br>
<br>
<br>
        <h2>Iniciar sesión</h2>
        <form class="form-centered" id="loginForm" action="validar.php" method="post">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" required><br>

            <label for="contrasena">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" required><br>

            <button type="submit" class="boton btn btn-success" style="margin-left:280px">Iniciar sesión</button>
        </form>
        <div id="response" class="mt-3"></div>
        <p>¿No tienes cuenta? <a href="./Registrarse.php">Regístrate aquí</a>.</p>
    </div>
    </div>
    <br>
</body>
<br><br><br>
<footer>
    <?php include 'plantillafooter.php'; ?>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> 
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
