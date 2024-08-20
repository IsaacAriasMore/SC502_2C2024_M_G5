<?php
require_once '../models/SolicitudModel.php';

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
$ayuda = isset($_POST["ayuda"]) ? $_POST["ayuda"] : "";
$familiar = isset($_POST["familiar"]) ? $_POST["familiar"] : "";
$integrantes = isset($_POST["integrantes"]) ? $_POST["integrantes"] : "";
$ninos = isset($_POST["ninos"]) ? $_POST["ninos"] : "";
$adolecentes = isset($_POST["adolecentes"]) ? $_POST["adolecentes"] : "";
$adultos = isset($_POST["adultos"]) ? $_POST["adultos"] : "";
$provincia = isset($_POST["provincia"]) ? $_POST["provincia"] : "";
$canton = isset($_POST["canton"]) ? $_POST["canton"] : "";
$destino = isset($_POST["destino"]) ? $_POST["destino"] : "";
$estado = isset($_POST["estado"]) ? $_POST["estado"] : "0";

$Solicitud = new SolicitudModel();
$Solicitud->setNombre($nombre);
$Solicitud->setApellidos($apellidos);
$Solicitud->setTelefono($telefono);
$Solicitud->setAyuda($ayuda);
$Solicitud->setFamiliar($familiar);
$Solicitud->setIntegrantes($integrantes);
$Solicitud->setNinos($ninos);
$Solicitud->setAdolecentes($adolecentes);
$Solicitud->setAdultos($adultos);
$Solicitud->setProvincia($provincia);
$Solicitud->setCanton($canton);
$Solicitud->setDestino($destino);
$Solicitud->setEstado($estado);

try {
    $Solicitud->guardar();
    $resp = array("exito" => true, "msg" => "Datos guardados correctamente.");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Error al guardar los datos: " . $th->getMessage());
    echo json_encode($resp);
}
?>
