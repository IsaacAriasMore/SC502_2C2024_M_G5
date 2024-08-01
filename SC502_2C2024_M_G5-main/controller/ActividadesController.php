<?php
require_once '../models/ActividadesModel.php';

$action = isset($_POST["action"]) ? $_POST["action"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$lugar = isset($_POST["lugar"]) ? $_POST["lugar"] : "";
$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$hora = isset($_POST["hora"]) ? $_POST["hora"] : "";
$id = isset($_POST["id"]) ? $_POST["id"] : "";

$actividad = new ActividadesModel();
$actividad->setNombre($nombre);
$actividad->setLugar($lugar);
$actividad->setFecha($fecha);
$actividad->setHora($hora);

try {
    switch ($action) {
        case "guardar":
            $actividad->guardar();
            $resp = array("exito" => true, "msg" => "Actividad agregada correctamente");
            break;

        case "actualizar":
            $actividad->setId($id);
            $actividad->actualizar();
            $resp = array("exito" => true, "msg" => "Actividad actualizada correctamente");
            break;

        case "eliminar":
            $actividad->setId($id);
            $actividad->eliminar();
            $resp = array("exito" => true, "msg" => "Actividad eliminada correctamente");
            break;

        case "listar":
            $actividades = $actividad->listar();
            $resp = array("exito" => true, "actividades" => $actividades);
            break;

        default:
            $resp = array("exito" => false, "msg" => "Acción no válida");
            break;
    }
    echo json_encode($resp);
} catch (PDOException $e) {
    $resp = array("exito" => false, "msg" => "Se presentó un error: " . $e->getMessage());
    echo json_encode($resp);
}
?>
