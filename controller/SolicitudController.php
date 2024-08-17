<?php


    require_once '../models/SolicitudModel.php';
    $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : "";
    $apellido = (isset($_POST["apellido"])) ? $_POST["apellido"] : "";
    $Telefono = (isset($_POST["Telefono"])) ? $_POST["Telefono"] : "";
    $Ayuda = (isset($_POST["Hora"])) ? $_POST["Hora"] : "";
    $ApellidoFamiliar = (isset($_POST["ApellidoFamiliar"])) ? $_POST["ApellidoFamiliar"] : "";
    $NumIntegrantes = (isset($_POST["Mascota"])) ? $_POST["Mascota"] : "";
    $Niños = (isset($_POST["Niños"])) ? $_POST["Niños"] : "";
    $Adolescentes = (isset($_POST["Adolescentes"])) ? $_POST["Adolescentes"] : "";
    $Adultos = (isset($_POST["Adultos"])) ? $_POST["Adultos"] : "";
    $Provincia = (isset($_POST["Provincia"])) ? $_POST["Provincia"] : "";
    $Canton = (isset($_POST["Canton"])) ? $_POST["Canton"] : "";
    $Destino = (isset($_POST["Destino"])) ? $_POST["Destino"] : "";
    
    $Solicitud = new SolicitudModel();
    $Solicitud->setNombre($nombre);
    $Solicitud->setapellido($apellido);
    $Solicitud->setTelefono($Telefono);
    $Solicitud->setAyuda($Ayuda);
    $Solicitud->setApellidoFamiliar($ApellidoFamiliar);
    $Solicitud->setNumIntegrantes($NumIntegrantes);
    $Solicitud->setNiños($Niños);
    $Solicitud->setAdolescentes($Adolescentes);
    $Solicitud->setAdultos($Adultos);
    $Solicitud->setProvincia($Provincia);
    $Solicitud->setCanton($Canton);
    $Solicitud->setDestino($Destino);
    
    try {
        $cita->guardarconOO();
        $resp = array("exito"=> true,"msg"=>"Cita insertada correctamente");
        echo json_encode($resp);
    } catch (PDOException $th) {
        $resp = array("exito"=> false,"msg"=>"Se presento un error");
        echo json_encode($resp);
    }
    
    

?>