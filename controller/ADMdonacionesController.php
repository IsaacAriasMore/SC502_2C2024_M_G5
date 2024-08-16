<?php
require_once '../models/ADMdonacionesModel.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $user_login = new ADMdonacionesModel();
        $usuarios = $user_login->listarTodosDb();
        $data = array();
    
        if (is_array($usuarios) || is_object($usuarios)) {
            foreach ($usuarios as $reg) {
                $data[] = array(
                    "0" => $reg->getId(),
                    "1" => $reg->getNombre(),
                    "2" => $reg->getApellidos(),
                    "3" => $reg->getEmail(),
                    "4" => $reg->getTelefono(),
                    "5" => $reg->getDonacion(),
                    "6" => $reg->getTotal(),
                    "7" => $reg->getMetodoPago(),
                    "8" => $reg->getNumero(),  
                    "9" => ($reg->getEstado()==1)?'<span class="label bg-success"> Activado </span>':'<span class="label bg-danger"> Desactivado </span>',
                    "10" => ($reg->getEstado()) ? 
    '<button class="btn btn-warning" id="modificarUsuario">Modificar</button>'.
    '<button class="btn btn-danger" onclick="desactivar(\''.$reg->getId().'\')">Desactivar</button>' : 
    '<button class="btn btn-warning" id="modificarUsuario">Modificar</button>'.
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
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $apellidos = isset($_POST["apellidos"]) ? trim($_POST["apellidos"]) : "";
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
        $donacion = isset($_POST["donacion"]) ? trim($_POST["donacion"]) : "";
        $total = isset($_POST["total"]) ? trim($_POST["total"]) : "";
        $metodoPago = isset($_POST["metodoPago"]) ? trim($_POST["metodoPago"]) : "";
        $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : "";
        $estado = isset($_POST["estado"]) ? trim($_POST["estado"]) : 1;


        $usuario = new ADMdonacionesModel();
        $usuario->setEmail($email);
        $encontrado = $usuario->verificarExistenciaDb();
        if ($encontrado == false) {
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setTelefono($telefono);
            $usuario->setDonacion($donacion);
            $usuario->setTotal($total);
            $usuario->setMetodoPago($metodoPago);
            $usuario->setNumero($numero);
            $usuario->setEstado($estado);
            $usuario->guardarEnDb();
            if ($usuario->verificarExistenciaDb()) {
                echo 1; // Usuario registrado exitosamente
            } else {
                echo 3; // Fallo al realizar el registro
            }
        } else {
            echo 2; // El usuario ya existe
        }
        break;

    case 'existeUsuario':
        $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
        $user_login = new ADMdonacionesModel();
        $user_login->setEmail($usuario);
        $encontrado = $user_login->verificarExistenciaDb();
        echo $encontrado ? 1 : 0;
        break;
        case 'activar':
            $ul = new ADMdonacionesModel();
            $ul->setId(trim($_POST['id']));
            $rspta = $ul->activar();
            echo $rspta;
            break;
        
        case 'desactivar':
            $ul = new ADMdonacionesModel();
            $ul->setId(trim($_POST['id']));
            $rspta = $ul->desactivar();
            echo $rspta;
            break;
        
    case 'mostrar':
        $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
        $user = new ADMdonacionesModel();
        $user->setEmail($usuario);
        $encontrado = $user->mostrar($usuario);
        if ($encontrado != null) {
            $arr = array(
                array(
                    "nombre" => $encontrado['nombre'],
                    "apellidos" => $encontrado['apellidos'],
                    "email" => $encontrado['email']
                )
            );
            echo json_encode($arr);
        } else {
            echo 0;
        }
        break;

        case 'editar':
            $id = isset($_POST["id"]) ? trim($_POST["id"]) : "";
            $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
            $apellidos = isset($_POST["apellidos"]) ? trim($_POST["apellidos"]) : "";
            $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
            $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
            $donacion = isset($_POST["donacion"]) ? trim($_POST["donacion"]) : "";
            $total = isset($_POST["total"]) ? trim($_POST["total"]) : "";
            $metodoPago = isset($_POST["metodoPago"]) ? trim($_POST["metodoPago"]) : "";
            $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : "";
        
            $usuario = new ADMdonacionesModel();
            $usuario->setId($id);
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setTelefono($telefono);
            $usuario->setDonacion($donacion);
            $usuario->setTotal($total);
            $usuario->setMetodoPago($metodoPago);
            $usuario->setNumero($numero);
        
            $modificados = $usuario->actualizarDonacion();
            echo $modificados > 0 ? 1 : 0;
            break;
        
}
?>
