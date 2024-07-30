<?php
    require_once '../models/VoluntariosModel.php';
    $nombre_voluntario = (isset($_POST["nombre_voluntario"])) ? $_POST["nombre_voluntario"] : "";
    $apellido_voluntario= (isset($_POST["apellido_voluntario"])) ? $_POST["apellido_voluntario"] : "";
    $email_voluntario = (isset($_POST["email_voluntario"])) ? $_POST["email_voluntario"] : "";
    $telefono_voluntario = (isset($_POST["telefono_voluntario"])) ? $_POST["telefono_voluntario"] : "";
    $cedula_voluntario = (isset($_POST["cedula_voluntario"])) ? $_POST["cedula_voluntario"] : "";
    $residencia_voluntario = (isset($_POST["residencia_voluntario"])) ? $_POST["residencia_voluntario"] : "";
    $definicion_voluntario = (isset($_POST["definicion_voluntario"])) ? $_POST["definicion_voluntario"] : "";

    $voluntarios = new VoluntariosModel();
    $voluntarios->setNombreV($nombre_voluntario);
    $voluntarios->setApellidoV($apellido_voluntario);
    $voluntarios->setEmailV($email_voluntario);
    $voluntarios->setTelefonoV($telefono_voluntario);
    $voluntarios->setCedulaV($cedula_voluntario);
    $voluntarios->setResidenciaV($residencia_voluntario);
    $voluntarios->setDefinicionV($definicion_voluntario);
    try {
        $voluntarios->guardar();
        $resp = array("exito"=> true,"msg"=>"voluntarios insertada correctamente");
        echo json_encode($resp);
    } catch (PDOException $th) {
        $resp = array("exito"=> false,"msg"=>"Se presento un error");
        echo json_encode($resp);
    }
?>