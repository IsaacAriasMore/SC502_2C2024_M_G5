<?php
require_once '../config/Conexion.php';

class ADMactividadesModel extends Conexion
{
    protected static $cnx;
    private $id = null;
    private $nombre = null;
    private $lugar = null;
    private $fecha = null;
    private $hora = null;
    private $estado = null;

    public function __construct() {}

    public function getId() 
    { return $this->id; }
    public function setId($id) 
    { $this->id = $id; }
    
    public function getNombre() 
    { return $this->nombre; }
    public function setNombre($nombre) 
    { $this->nombre = $nombre; }

    public function getLugar() 
    { return $this->lugar; }
    public function setLugar($lugar) 
    { $this->lugar = $lugar; }

    public function getFecha() 
    { return $this->fecha; }
    public function setFecha($fecha) 
    { $this->fecha = $fecha; }

    public function getHora() 
    { return $this->hora; }
    public function setHora($hora) 
    { $this->hora = $hora; }

    public function getEstado() 
    { return $this->estado; }
    public function setEstado($estado) 
    { $this->estado = $estado; }

    public static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar() {
        self::$cnx = null;
    }

    public function listarTodosDb() {
        $query = "SELECT * FROM actividades";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $encontrado) {
                $user = new ADMactividadesModel();
                $user->setId(isset($encontrado['id']) ? $encontrado['id'] : null);
                $user->setNombre(isset($encontrado['nombre']) ? $encontrado['nombre'] : null);
                $user->setLugar(isset($encontrado['lugar']) ? $encontrado['lugar'] : null);
                $user->setFecha(isset($encontrado['fecha']) ? $encontrado['fecha'] : null);
                $user->setHora(isset($encontrado['hora']) ? $encontrado['hora'] : null);
                $user->setEstado(isset($encontrado['estado']) ? $encontrado['estado'] : null);
        
                $arr[] = $user;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    
    public function verificarExistenciaDb() {
        $query = "SELECT * FROM actividades WHERE email=:email";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $email = $this->getEmail();
            $resultado->bindParam(":email", $email, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            return $resultado->rowCount() > 0;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    public function guardarEnDb() {
        $query = "INSERT INTO actividades (nombre, lugar, fecha, hora, estado) 
                  VALUES (:nombre, :lugar, :fecha, :hora, :estado)";
        try {
            self::getConexion();
            $nombre = strtoupper($this->getNombre());
            $lugar = $this->getLugar();
            $fecha = $this->getFecha();
            $hora = $this->getHora();
            $estado = $this->getEstado();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":lugar", $lugar, PDO::PARAM_STR);
            $resultado->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $resultado->bindParam(":hora", $hora, PDO::PARAM_STR);
            $resultado->bindParam(":estado", $estado, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    public function activar() {
        $id = $this->getId();
        $query = "UPDATE actividades SET estado='1' WHERE id=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            self::$cnx->beginTransaction();
            $resultado->execute();
            self::$cnx->commit();
            self::desconectar();
            return $resultado->rowCount(); // Devuelve el número de filas afectadas
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }

    public function desactivar() {
        $id = $this->getId();
        $query = "UPDATE actividades SET estado='0' WHERE id=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            self::$cnx->beginTransaction();
            $resultado->execute();
            self::$cnx->commit();
            self::desconectar();
            return $resultado->rowCount(); // Devuelve el número de filas afectadas
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }

    public function mostrar($email) {
        $query = "SELECT * FROM actividades WHERE email=:email";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":email", $email, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    public function llenarCampos($id) {
        $query = "SELECT * FROM actividades WHERE id=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            $encontrado = $resultado->fetch(PDO::FETCH_ASSOC);
            if ($encontrado) {
                $this->setId($encontrado['id']);
                $this->setNombre($encontrado['nombre']);
                $this->setLugar($encontrado['lugar']);
                $this->setFecha($encontrado['fecha']);
                $this->setHora($encontrado['hora']);
                $this->setEstado($encontrado['estado']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    public function actualizarDonacion() {
        $query = "UPDATE actividades SET nombre=:nombre, lugar=:lugar, fecha=:fecha, hora=:hora, estado=:estado WHERE id=:id";
        try {
            self::getConexion();
            $id = $this->getId();
            $nombre = $this->getNombre();
            $lugar = $this->getLugar();
            $fecha = $this->getFecha();
            $hora = $this->getHora();
            $estado = $this->getEstado();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":lugar", $lugar, PDO::PARAM_STR);
            $resultado->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $resultado->bindParam(":hora", $hora, PDO::PARAM_STR);
            $resultado->bindParam(":estado", $estado, PDO::PARAM_INT);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            self::$cnx->beginTransaction();
            $resultado->execute();
            self::$cnx->commit();
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }

    public function obtenerEstadisticasActividades() {
        $query = "SELECT fecha, COUNT(*) AS cantidad FROM actividades GROUP BY fecha";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
}
?>
