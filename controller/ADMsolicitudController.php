<?php
require_once '../models/ADMsolicitudModel.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $solicitud_model = new ADMsolicitudModel();
        $solicitudes = $solicitud_model->listarTodosDb();
        $data = array();

        if (is_array($solicitudes) || is_object($solicitudes)) {
            foreach ($solicitudes as $reg) {
                $data[] = array(
                    "0" => $reg->getId(),
                    "1" => $reg->getNombre(),
                    "2" => $reg->getApellidos(),
                    "3" => $reg->getTelefono(),
                    "4" => $reg->getAyuda(),
                    "5" => $reg->getFamiliar(),
                    "6" => $reg->getIntegrantes(),
                    "7" => $reg->getNinos(),
                    "8" => $reg->getAdolecentes(),
                    "9" => $reg->getAdultos(),
                    "10" => $reg->getProvincia(),
                    "11" => $reg->getCanton(),
                    "12" => $reg->getDestino(),
                    "13" => ($reg->getEstado() == 1) ? '<span class="label bg-success"> Activado </span>' : '<span class="label bg-danger"> Desactivado </span>',
                    "14" => ($reg->getEstado()) ? 
                        '<button class="btn btn-warning" id="modificarSolicitud">Modificar</button>'.
                        '<button class="btn btn-danger" onclick="desactivar(\''.$reg->getId().'\')">Desactivar</button>' : 
                        '<button class="btn btn-warning" id="modificarSolicitud">Modificar</button>'.
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
        $apellidos = trim($_POST["apellidos"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");
        $ayuda = trim($_POST["ayuda"] ?? "");
        $familiar = trim($_POST["familiar"] ?? "");
        $integrantes = trim($_POST["integrantes"] ?? "");
        $ninos = trim($_POST["ninos"] ?? "");
        $adolecentes = trim($_POST["adolecentes"] ?? "");
        $adultos = trim($_POST["adultos"] ?? "");
        $provincia = trim($_POST["provincia"] ?? "");
        $canton = trim($_POST["canton"] ?? "");
        $destino = trim($_POST["destino"] ?? "");
        $estado = trim($_POST["estado"] ?? "");

        $solicitud = new ADMsolicitudModel();
        $solicitud->setTelefono($telefono);
        $encontrado = $solicitud->verificarExistenciaDb();
        if (!$encontrado) {
            $solicitud->setNombre($nombre);
            $solicitud->setApellidos($apellidos);
            $solicitud->setAyuda($ayuda);
            $solicitud->setFamiliar($familiar);
            $solicitud->setIntegrantes($integrantes);
            $solicitud->setNinos($ninos);
            $solicitud->setAdolecentes($adolecentes);
            $solicitud->setAdultos($adultos);
            $solicitud->setProvincia($provincia);
            $solicitud->setCanton($canton);
            $solicitud->setDestino($destino);
            $solicitud->setEstado($estado);
            $solicitud->guardarEnDb();
            $encontrado = $solicitud->verificarExistenciaDb();
            echo $encontrado ? 1 : 3; // 1: éxito, 3: error al guardar
        } else {
            echo 2; // La solicitud ya existe
        }
        break;

    case 'existeSolicitud':
        $telefono = $_POST["telefono"] ?? "";
        $solicitud_model = new ADMsolicitudModel();
        $solicitud_model->setTelefono($telefono);
        $encontrado = $solicitud_model->verificarExistenciaDb();
        echo $encontrado ? 1 : 0;
        break;

    case 'activar':
        $ul = new ADMsolicitudModel();
        $ul->setId(trim($_POST['id']));
        $rspta = $ul->activar();
        echo $rspta ? 1 : 0; // 1: éxito, 0: error
        break;

    case 'desactivar':
        $ul = new ADMsolicitudModel();
        $ul->setId(trim($_POST['id']));
        $rspta = $ul->desactivar();
        echo $rspta ? 1 : 0; // 1: éxito, 0: error
        break;

    case 'mostrar':
        $telefono = $_POST["telefono"] ?? "";
        $solicitud_model = new ADMsolicitudModel();
        $solicitud = $solicitud_model->mostrar($telefono);
        if ($solicitud) {
            echo json_encode([
                [
                    "nombre" => $solicitud['nombre'],
                    "apellidos" => $solicitud['apellidos'],
                    "telefono" => $solicitud['telefono']
                ]
            ]);
        } else {
            echo 0; // No encontrado
        }
        break;

    case 'editar':
        $id = trim($_POST["id"] ?? "");
        $nombre = trim($_POST["nombre"] ?? "");
        $apellidos = trim($_POST["apellidos"] ?? "");
        $telefono = trim($_POST["telefono"] ?? "");
        $ayuda = trim($_POST["ayuda"] ?? "");
        $familiar = trim($_POST["familiar"] ?? "");
        $integrantes = trim($_POST["integrantes"] ?? "");
        $ninos = trim($_POST["ninos"] ?? "");
        $adolecentes = trim($_POST["adolecentes"] ?? "");
        $adultos = trim($_POST["adultos"] ?? "");
        $provincia = trim($_POST["provincia"] ?? "");
        $canton = trim($_POST["canton"] ?? "");
        $destino = trim($_POST["destino"] ?? "");

        $solicitud_model = new ADMsolicitudModel();
        $solicitud_model->setId($id);
        $solicitud_model->setNombre($nombre);
        $solicitud_model->setApellidos($apellidos);
        $solicitud_model->setTelefono($telefono);
        $solicitud_model->setAyuda($ayuda);
        $solicitud_model->setFamiliar($familiar);
        $solicitud_model->setIntegrantes($integrantes);
        $solicitud_model->setNinos($ninos);
        $solicitud_model->setAdolecentes($adolecentes);
        $solicitud_model->setAdultos($adultos);
        $solicitud_model->setProvincia($provincia);
        $solicitud_model->setCanton($canton);
        $solicitud_model->setDestino($destino);

        $modificados = $solicitud_model->actualizarSolicitud();
        echo $modificados > 0 ? 1 : 0; // 1: éxito, 0: error
        break;

     case 'obtener_estadisticas':
        $solicitud_model = new ADMsolicitudModel();
        $result = $solicitud_model->obtenerEstadisticasSolicitudes();
        echo json_encode($result);
        break;
}
?>
