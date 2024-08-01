<?php
require_once '../config/conexion.php';

class ActividadesModel {
    private $id;
    private $nombre;
    private $lugar;
    private $fecha;
    private $hora;
    private $conn;

    public function __construct() {
        $this->conn = Conexion::conectar();
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getLugar() {
        return $this->lugar;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function guardar() {
        try {
            $sql = "INSERT INTO actividades (nombre, lugar, fecha, hora) VALUES (:nombre, :lugar, :fecha, :hora)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':lugar', $this->lugar);
            $stmt->bindParam(':fecha', $this->fecha);
            $stmt->bindParam(':hora', $this->hora);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function actualizar() {
        try {
            $sql = "UPDATE actividades SET nombre = :nombre, lugar = :lugar, fecha = :fecha, hora = :hora WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':lugar', $this->lugar);
            $stmt->bindParam(':fecha', $this->fecha);
            $stmt->bindParam(':hora', $this->hora);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function eliminar() {
        try {
            $sql = "DELETE FROM actividades WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM actividades";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
?>
