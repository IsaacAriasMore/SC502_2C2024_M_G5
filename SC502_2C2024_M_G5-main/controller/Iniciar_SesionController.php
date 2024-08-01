<?php

require 'IniciarModel.php';

class Iniciar_SesionController{
    private $iniciarModel;

    public function __construct($db) {
        $this->iniciarModel = new IniciarModel($db);
    }

    public function iniciar($correo, $contrasena) {
        $user = $this->loginModel->authenticate($correo, $contrasena);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header('Location: ./index.php');
        } else {
            header('Location: ./Iniciar_Sesion.php?error=1');
        }
    }

}


?>