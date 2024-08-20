<?php
    require_once '../models/VoluntariosModel.php';
    $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : "";
    $apellidos= (isset($_POST["apellidos"])) ? $_POST["apellidos"] : "";
    $email = (isset($_POST["email"])) ? $_POST["email"] : "";
    $telefono = (isset($_POST["telefono"])) ? $_POST["telefono"] : "";
    $cedula = (isset($_POST["cedula"])) ? $_POST["cedula"] : "";
    $residencia = (isset($_POST["residencia"])) ? $_POST["residencia"] : "";
    $descripcion = (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "";
    $estado = (isset($_POST["estado"])) ? $_POST["estado"] : "";

    $voluntarios = new VoluntariosModel();
    $voluntarios->setNombre($nombre);
    $voluntarios->setApellidos($apellidos);
    $voluntarios->setEmail($email);
    $voluntarios->setTelefono($telefono);
    $voluntarios->setCedula($cedula);
    $voluntarios->setResidencia($residencia);
    $voluntarios->setDescripcion($descripcion);
    $voluntarios->setEstado($estado);
    try {
        $voluntarios->guardar();
        $resp = array("exito"=> true,"msg"=>"Voluntarios insertados correctamente");
        echo json_encode($resp);
    } catch (PDOException $th) {
        $resp = array("exito"=> false,"msg"=>"Se presento un error");
        echo json_encode($resp);
    }
?>