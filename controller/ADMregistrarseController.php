<?php
require_once '../models/ADMregistrarseModel.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $registrarse_model = new ADMregistrarseModel();
        $registrarse = $registrarse_model->listarTodosDb();
        $data = array();

        if (is_array($registrarse) || is_object($registrarse)) {
            foreach ($registrarse as $reg) {
                $data[] = array(
                    "0" => $reg->getId(),
                    "1" => $reg->getNombre(),
                    "2" => $reg->getUsuario(),
                    "3" => $reg->getCorreo(),
                    "4" => $reg->getContrasena(),
                    "5" => $reg->getFecharegistro(),
                    "6" => $reg->getId_cargo(),
                    "7" => ($reg->getEstado()) ? '<span class="label bg-success"> Activado </span>' : '<span class="label bg-danger"> Desactivado </span>',
                    "8" => ($reg->getEstado()) ? 
                        '<button class="btn btn-warning" id="modificarRegistrarse">Modificar</button>'.
                        '<button class="btn btn-danger" onclick="desactivar(\''.$reg->getId().'\')">Desactivar</button>' : 
                        '<button class="btn btn-warning" id="modificarRegistrarse">Modificar</button>'.
                        '<button class="btn btn-success" onclick="activar(\''.$reg->getId().'\')">Activar</button>'
                );
            }

            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($resultados);
        } else {
            echo json_encode(array("error" => "Datos no válidos"));
        }
        break;

    case 'insertar':
        $nombre = trim($_POST["nombre"] ?? "");
        $usuario = trim($_POST["usuario"] ?? "");
        $correo = trim($_POST["correo"] ?? "");
        $contrasena = trim($_POST["contrasena"] ?? "");
        $id_cargo = trim($_POST["id_cargo"] ?? "");
        $estado = trim($_POST["estado"] ?? "");

        $fecharegistro = date('Y-m-d');

        $registrarse = new ADMregistrarseModel();
        $registrarse->setCorreo($correo);
        $encontrado = $registrarse->verificarExistenciaDb();
        if (!$encontrado) {
            $registrarse->setNombre($nombre);
            $registrarse->setUsuario($usuario);
            $registrarse->setContrasena($contrasena);
            $registrarse->setFecharegistro($fecharegistro);
            $registrarse->setId_cargo($id_cargo);
            $registrarse->setEstado($estado);
            $registrarse->guardar();
            $encontrado = $registrarse->verificarExistenciaDb();
            echo $encontrado ? 1 : 3; // 1: éxito, 3: error al guardar
        } else {
            echo 2; // La registrarse ya existe
        }
        break;

    case 'existeRegistrarse':
        $correo = $_POST["correo"] ?? "";
        $registrarse_model = new ADMregistrarseModel();
        $registrarse_model->setTelefono($correo);
        $encontrado = $registrarse_model->verificarExistenciaDb();
        echo $encontrado ? 1 : 0;
        break;

    case 'activar':
        $ul = new ADMregistrarseModel();
        $ul->setId(trim($_POST['id']));
        $rspta = $ul->activar();
        echo $rspta ? 1 : 0; // 1: éxito, 0: error
        break;

        case 'desactivar':
            $ul = new ADMregistrarseModel(); // Asegúrate de que estás usando la clase correcta
            $ul->setId(trim($_POST['id']));
            $rspta = $ul->desactivar();
            echo $rspta; // Esto debería devolver '1' si el desactivado fue exitoso
            break;
        

    case 'mostrar':
        $correo = $_POST["correo"] ?? "";
        $registrarse_model = new ADMregistrarseModel();
        $registrarse = $registrarse_model->mostrar($correo);
        if ($registrarse) {
            echo json_encode([
                [
                    "nombre" => $registrarse['nombre'],
                    "usuario" => $usuario['usuario'],
                    "correo" => $correo['correo']
                ]
            ]);
        } else {
            echo 0; // No encontrado
        }
        break;

    case 'editar':
        $id = trim($_POST["id"] ?? "");
        $nombre = trim($_POST["nombre"] ?? "");
        $usuario = trim($_POST["usuario"] ?? "");
        $correo = trim($_POST["correo"] ?? "");
        $contrasena = trim($_POST["contrasena"] ?? "");
        $fecharegistro = trim($_POST["fecharegistro"] ?? "");
        $id_cargo = trim($_POST["id_cargo"] ?? "");
        $estado = trim($_POST["estado"] ?? "");
        

        $registrarse_model = new ADMregistrarseModel();
        $registrarse_model->setId($id);
        $registrarse_model->setNombre($nombre);
        $registrarse_model->setUsuario($usuario);
        $registrarse_model->setCorreo($correo);
        $registrarse_model->setContrasena($contrasena);
        $registrarse_model->setFecharegistro($fecharegistro);
        $registrarse_model->setId_cargo($id_cargo);
        $registrarse_model->setEstado($estado);

        $modificados = $registrarse_model->actualizarRegistrarse();
        echo $modificados > 0 ? 1 : 0; // 1: éxito, 0: error
        break;

}
?>
