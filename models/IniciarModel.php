<?php
class IniciarModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($correo, $contrasena) {
        $sql = "SELECT * FROM usuarios WHERE correo = :correo LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['correo' => $correo]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($contrasena, $user['contrasena'])) {
            return $user;
        }
        return false;
    }
}

?>