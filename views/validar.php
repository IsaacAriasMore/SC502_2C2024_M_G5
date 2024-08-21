<?php
// Incluir archivo de configuración
include('../config/global.php');


// Obtener datos del formulario
$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

// Validar que los campos no estén vacíos
if (empty($usuario) || empty($contrasena)) {
    echo '<h1 class="bad">Por favor, complete todos los campos.</h1>';
    exit();
}

// Iniciar sesión
session_start();
$_SESSION['usuario'] = $usuario;

// Conectar a la base de datos usando los parámetros definidos en global.php
$conexion = mysqli_connect(db_host, db_user, db_pass, db_name);

// Verificar la conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// preparar y ejecutar la consulta
$stmt = mysqli_prepare($conexion, "SELECT id_cargo FROM usuarios WHERE usuario = ? AND contrasena = ?");
mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id_cargo);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Redirigir según el cargo
if ($id_cargo == 1) { // Administrador
    header("Location: admin.php");
    exit();
} elseif ($id_cargo == 2) { // Cliente
    header("Location: cliente.php");
    exit();
} else {
    // no hay usuario con el cargo 1 ni 2
    echo '<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.onload = function() {
                Swal.fire({
                    icon: "error",
                    title: "Autenticación Fallida",
                    text: "Usuario o contraseña invalidos",
                    confirmButtonText: "Intentar de nuevo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "login.php";
                    }
                });
            };
        </script>
    </head>
    <body>
    </body>
    </html>';
}

// Cerrar la conexión
mysqli_close($conexion);
?>
