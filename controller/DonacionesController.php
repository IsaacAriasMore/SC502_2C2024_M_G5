<?php
   require_once '../models/DonacionesModel.php';
    $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : "";
    $apellidos = (isset($_POST["apellidos"])) ? $_POST["apellidos"] : "";
    $email = (isset($_POST["email"])) ? $_POST["email"] : "";
    $telefono = (isset($_POST["telefono"])) ? $_POST["telefono"] : "";
    $donacion = (isset($_POST["donacion"])) ? $_POST["donacion"] : "";
    $total = (isset($_POST["total"])) ? $_POST["total"] : "";
    $metodoPago = (isset($_POST["metodoPago"])) ? $_POST["metodoPago"] : "";
    $numero = (isset($_POST["numero"])) ? $_POST["numero"] : "";
    $numero = (isset($_POST["numero"])) ? $_POST["numero"] : "";
    $estado = isset($_POST["estado"]) ? $_POST["estado"] : "1";





    $persona = new DonacionesModel();
    $persona->setNombre($nombre);
    $persona->setApellidos($apellidos);
    $persona->setEmail($email);
    $persona->setTelefono($telefono);
    $persona->setDonacion($donacion);
    $persona->setTotal($total);
    $persona->setMetodoPago($metodoPago);
    $persona->setNumero($numero);
    $persona->setNumero($numero);
    $persona->setEstado($estado);

    try {
        $persona->guardar();
        $resp = array("exito"=> true,"msg"=>"Persona insertada correctamente");
        echo json_encode($resp);
    } catch (PDOException $th) {
        $resp = array("exito"=> false,"msg"=>"Se presento un error");
        echo json_encode($resp);
    }
    
?>