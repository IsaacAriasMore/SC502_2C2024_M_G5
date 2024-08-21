
<?php
   require_once '../models/RegisterModel.php';
   $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
   $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
   $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
   $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
   $id_cargo = isset($_POST['id_cargo']) ? $_POST['id_cargo'] : '2';
   $estado = isset($_POST['estado']) ? $_POST['estado'] : '1';

   $fecharegistro = date('Y-m-d');

    $persona = new RegisterModel();
    $persona->setNombre($nombre);
    $persona->setUsuario($usuario);
    $persona->setCorreo($correo);
    $persona->setContrasena($contrasena);
    $persona->setFecharegistro($fecharegistro);
    $persona->setId_cargo($id_cargo);
    $persona->setEstado($estado);

    try {
        if ($persona->verificarExistenciaDb()) {
            echo json_encode(["exito" => false, "msg" => "El correo o el usuario ya existen"]);
            exit;
        }
        
        $persona->guardar();
        echo json_encode(["exito" => true, "msg" => "Usuario registrado correctamente"]);
    } catch (PDOException $th) {
        echo json_encode(["exito" => false, "msg" => "Se presentó un error"]);
    }
    
?>

