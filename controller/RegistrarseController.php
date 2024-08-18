<?php
require_once '../config/conexion.php';
require_once '../models/RegisterModel.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    // Validar datos
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($contrasena)) {
        $response['message'] = 'Todos los campos son requeridos.';
    } else {
        // Conectar a la base de datos
        $db = Conexion::conectar();
        $model = new RegisterModel($db);

        // Registrar usuario
        if ($model->registrar($nombre, $apellido, $correo, $telefono, $contrasena)) {
            $response['success'] = true;
            $response['message'] = 'Registro exitoso.';
        } else {
            $response['message'] = 'Error al registrar el usuario.';
        }
    }
} else {
    $response['message'] = 'Método de solicitud no válido.';
}

echo json_encode($response);
?>
