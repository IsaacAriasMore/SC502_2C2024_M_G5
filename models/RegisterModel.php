<?php
class RegisterModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrar($nombre, $apellido, $correo, $telefono, $contrasena) {
        $hashedPassword = password_hash($contrasena, PASSWORD_BCRYPT);
        
        $sql = "INSERT INTO usuarios (Nombre, Apellido, Correo, Telefono, Contrasena, FechaRegistro, estado, rol) 
                VALUES (:nombre, :apellido, :correo, :telefono, :contrasena, NOW(), 1, 'usuario')";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'telefono' => $telefono,
            'contrasena' => $hashedPassword
        ]);
    }
}


?>