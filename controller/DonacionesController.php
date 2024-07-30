<?php
   require_once './model/DonacionesModel.php';
    $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : "";
    $apellidos = (isset($_POST["apellidos"])) ? $_POST["apellidos"] : "";
    $email = (isset($_POST["email"])) ? $_POST["email"] : "";
    $tel = (isset($_POST["tel"])) ? $_POST["tel"] : "";
    $donación = (isset($_POST["donación"])) ? $_POST["donación"] : "";
    $cantidad = (isset($_POST["cantidad"])) ? $_POST["cantidad"] : "";
    $total = (isset($_POST["total"])) ? $_POST["total"] : "";
    $metodoPago = (isset($_POST["metodoPago"])) ? $_POST["metodoPago"] : "";
    $sinpeNumber = (isset($_POST["sinpeNumber"])) ? $_POST["sinpeNumber"] : "";
    $tarjetaNumber = (isset($_POST["tarjetaNumber"])) ? $_POST["tarjetaNumber"] : "";




    $persona = new DonacionesModel();
    $persona->setNombre($nombre);
    $persona->setApellidos($mascota);
    $persona->setEmail($fecha);
    $persona->setTel($hora);
    $persona->setDonación($nombre);
    $persona->setCantidad($mascota);
    $persona->setTotal($fecha);
    $persona->setMetodoPago($hora);
    $persona->setSinpeNumber($fecha);
    $persona->setTarjetaNumber($hora);
    try {
        $persona->guardarconOO();
        $resp = array("exito"=> true,"msg"=>"Persona insertada correctamente");
        echo json_encode($resp);
    } catch (PDOException $th) {
        $resp = array("exito"=> false,"msg"=>"Se presento un error");
        echo json_encode($resp);
    }
?>