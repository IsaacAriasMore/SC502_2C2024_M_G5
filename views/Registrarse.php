<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/css/Registrarse.css">
    <link rel="stylesheet" href="./assets/css/plantillafooter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 


</head>
<body>
<nav class="navbaruserad navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./login.php" style="text-align:center">
                <img src="./assets/img/Logo.png" style="height: 80px; width: 80px" alt="Logo" style="text-align:center">
            </a>

            <strong style="margin-right:43%; color:white; font-size:30px">INMIGRAWEB REGISTRO</strong>

        </div>
    </nav>
<br>
<br>
<br>
<br>
<div class="contenido"> 
    <div class="container" style="height: 740px; width: 800px">
        <h2>Registro</h2>
        <form name="usuario_add" id="usuario_add" method="POST" class="form-centered">
        <input type="hidden" id="existeusuario" name="existeusuario">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br><br>

    <label for="correo">Correo electrónico:</label>
    <input type="email" id="correo" name="correo" required><br><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br><br>

    <input type="hidden" id="id_cargo" name="id_cargo" value="2">
    <input type="hidden" id="estado" name="estado" value="0">
   

    <button type="submit" class="boton btn btn-success"  style="margin-left:330px">Registrarse</button>
</form>
        <div id="response" class="mt-3"></div>
        <p>¿Ya tienes una cuenta? <a href="./login.php">Inicia sesión aquí</a>.</p>
    </div>
</div>
    <br>
</body>
<br><br><br>
<footer>
    <?php include 'plantillafooter.php'; ?>
  </footer>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> 
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./assets/js/registrarse.js"></script>
</html>
