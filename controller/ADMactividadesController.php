<?php
require_once '../models/ADMactividadesModel.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        ADMactividadesModel::getConexion();
        $user_login = new ADMactividadesModel();
        $usuarios = $user_login->listarTodosDb();
        ADMactividadesModel::desconectar();
        $data = array();
    
        if (is_array($usuarios) || is_object($usuarios)) {
            foreach ($usuarios as $reg) {
                $data[] = array(
                    "0" => $reg->getId(),
                    "1" => $reg->getNombre(),
                    "2" => $reg->getLugar(),
                    "3" => $reg->getFecha(),
                    "4" => $reg->getHora(),
                    "5" => ($reg->getEstado() == 1) ? '<span class="label bg-success"> Activado </span>' : '<span class="label bg-danger"> Desactivado </span>',
                    "6" => ($reg->getEstado()) ? 
    '<button class="btn btn-warning" id="modificarActividad">Modificar</button>'.
    '<button class="btn btn-danger" onclick="desactivar(\''.$reg->getId().'\')">Desactivar</button>' : 
    '<button class="btn btn-warning" id="modificarActividad">Modificar</button>'.
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
        $lugar = isset($_POST["lugar"]) ? trim($_POST["lugar"]) : "";
        $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : "";
        $hora = isset($_POST["hora"]) ? trim($_POST["hora"]) : "";
        $estado = isset($_POST["estado"]) ? trim($_POST["estado"]) : 1;

        ADMactividadesModel::getConexion();
        $actividad = new ADMactividadesModel();
        $actividad->setNombre($nombre);
        $actividad->setLugar($lugar);
        $actividad->setFecha($fecha);
        $actividad->setHora($hora);
        $actividad->setEstado($estado);
        $actividad->guardarEnDb();
        ADMactividadesModel::desconectar();

        echo 1; // Actividad registrada exitosamente
        break;

    case 'existeActividad':
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        ADMactividadesModel::getConexion();
        $actividad = new ADMactividadesModel();
        $actividad->setNombre($nombre);
        $encontrado = $actividad->verificarExistenciaDb();
        ADMactividadesModel::desconectar();
        echo $encontrado ? 1 : 0;
        break;

    case 'activar':
        ADMactividadesModel::getConexion();
        $actividad = new ADMactividadesModel();
        $actividad->setId(trim($_POST['id']));
        $rspta = $actividad->activar();
        ADMactividadesModel::desconectar();
        echo $rspta;
        break;

    case 'desactivar':
        ADMactividadesModel::getConexion();
        $actividad = new ADMactividadesModel();
        $actividad->setId(trim($_POST['id']));
        $rspta = $actividad->desactivar();
        ADMactividadesModel::desconectar();
        echo $rspta;
        break;

    case 'mostrar':
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        ADMactividadesModel::getConexion();
        $actividad = new ADMactividadesModel();
        $actividad->setNombre($nombre);
        $encontrado = $actividad->mostrar($nombre);
        ADMactividadesModel::desconectar();
        if ($encontrado != null) {
            $arr = array(
                array(
                    "nombre" => $encontrado['nombre'],
                    "lugar" => $encontrado['lugar'],
                    "fecha" => $encontrado['fecha'],
                    "hora" => $encontrado['hora']
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
        $lugar = isset($_POST["lugar"]) ? trim($_POST["lugar"]) : "";
        $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : "";
        $hora = isset($_POST["hora"]) ? trim($_POST["hora"]) : "";
        $estado = isset($_POST["estado"]) ? trim($_POST["estado"]) : "";

        ADMactividadesModel::getConexion();
        $actividad = new ADMactividadesModel();
        $actividad->setId($id);
        $actividad->setNombre($nombre);
        $actividad->setLugar($lugar);
        $actividad->setFecha($fecha);
        $actividad->setHora($hora);
        $actividad->setHora($hora);
        $actividad->setEstado($estado);
        $modificados = $actividad->actualizarDonacion();
        ADMactividadesModel::desconectar();
        echo $modificados > 0 ? 1 : 0;
        break;
        

}
?>
