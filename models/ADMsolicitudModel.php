<?php
require_once '../config/Conexion.php';

class ADMsolicitudModel extends Conexion
{
    protected static $cnx;
    private $id = null;
    private $nombre = null;
    private $apellidos = null;
    private $telefono = null;
    private $ayuda = null;
    private $familiar = null;
    private $integrantes = null;
    private $ninos = null;
    private $adolecentes = null;
    private $adultos = null;
    private $provincia = null;
    private $canton = null;
    private $destino = null;
    private $estado = null;

    public function __construct() {}

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getApellidos() { return $this->apellidos; }
    public function setApellidos($apellidos) { $this->apellidos = $apellidos; }

    public function getTelefono() { return $this->telefono; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }

    public function getAyuda() { return $this->ayuda; }
    public function setAyuda($ayuda) { $this->ayuda = $ayuda; }

    public function getFamiliar() { return $this->familiar; }
    public function setFamiliar($familiar) { $this->familiar = $familiar; }

    public function getIntegrantes() { return $this->integrantes; }
    public function setIntegrantes($integrantes) { $this->integrantes = $integrantes; }

    public function getNinos() { return $this->ninos; }
    public function setNinos($ninos) { $this->ninos = $ninos; }

    public function getAdolecentes() { return $this->adolecentes; }
    public function setAdolecentes($adolecentes) { $this->adolecentes = $adolecentes; }

    public function getAdultos() { return $this->adultos; }
    public function setAdultos($adultos) { $this->adultos = $adultos; }

    public function getProvincia() { return $this->provincia; }
    public function setProvincia($provincia) { $this->provincia = $provincia; }

    public function getCanton() { return $this->canton; }
    public function setCanton($canton) { $this->canton = $canton; }

    public function getDestino() { return $this->destino; }
    public function setDestino($destino) { $this->destino = $destino; }

    public function getEstado() { return $this->estado; }
    public function setEstado($estado) { $this->estado = $estado; }

    public static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar() {
        self::$cnx = null;
    }

    public function listarTodosDb() {
        $query = "SELECT * FROM solicitudes";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $encontrado) {
                $user = new ADMsolicitudModel();
                $user->setId(isset($encontrado['id']) ? $encontrado['id'] : null);
                $user->setNombre(isset($encontrado['nombre']) ? $encontrado['nombre'] : null);
                $user->setApellidos(isset($encontrado['apellidos']) ? $encontrado['apellidos'] : null);
                $user->setTelefono(isset($encontrado['telefono']) ? $encontrado['telefono'] : null);
                $user->setAyuda(isset($encontrado['ayuda']) ? $encontrado['ayuda'] : null);
                $user->setFamiliar(isset($encontrado['familiar']) ? $encontrado['familiar'] : null);
                $user->setIntegrantes(isset($encontrado['integrantes']) ? $encontrado['integrantes'] : null);
                $user->setNinos(isset($encontrado['ninos']) ? $encontrado['ninos'] : null);
                $user->setAdolecentes(isset($encontrado['adolecentes']) ? $encontrado['adolecentes'] : null);
                $user->setAdultos(isset($encontrado['adultos']) ? $encontrado['adultos'] : null);
                $user->setProvincia(isset($encontrado['provincia']) ? $encontrado['provincia'] : null);
                $user->setCanton(isset($encontrado['canton']) ? $encontrado['canton'] : null);
                $user->setDestino(isset($encontrado['destino']) ? $encontrado['destino'] : null);
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
        $query = "SELECT * FROM solicitudes WHERE telefono=:telefono";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $telefono = $this->getTelefono();
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
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
        $query = "INSERT INTO solicitudes (nombre, apellidos, telefono, ayuda, familiar, integrantes, ninos, adolecentes, adultos, provincia, canton, destino, estado) 
                  VALUES (:nombre, :apellidos, :telefono, :ayuda, :familiar, :integrantes, :ninos, :adolecentes, :adultos, :provincia, :canton, :destino, :estado)";
        try {
            self::getConexion();
            $nombre = strtoupper($this->getNombre());
            $apellidos = strtoupper($this->getApellidos());
            $telefono = $this->getTelefono();
            $ayuda = $this->getAyuda();
            $familiar = $this->getFamiliar();
            $integrantes = $this->getIntegrantes();
            $ninos = $this->getNinos();
            $adolecentes = $this->getAdolecentes();
            $adultos = $this->getAdultos();
            $provincia = $this->getProvincia();
            $canton = $this->getCanton();
            $destino = $this->getDestino();
            $estado = $this->getEstado();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":ayuda", $ayuda, PDO::PARAM_STR);
            $resultado->bindParam(":familiar", $familiar, PDO::PARAM_STR);
            $resultado->bindParam(":integrantes", $integrantes, PDO::PARAM_INT);
            $resultado->bindParam(":ninos", $ninos, PDO::PARAM_INT);
            $resultado->bindParam(":adolecentes", $adolecentes, PDO::PARAM_INT);
            $resultado->bindParam(":adultos", $adultos, PDO::PARAM_INT);
            $resultado->bindParam(":provincia", $provincia, PDO::PARAM_STR);
            $resultado->bindParam(":canton", $canton, PDO::PARAM_STR);
            $resultado->bindParam(":destino", $destino, PDO::PARAM_STR);
            $resultado->bindParam(":estado", $estado, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            echo $error; // Muestra el error para depurar
            return json_encode($error);
        }
    }
    

    public function activar() {
        $id = $this->getId();
        $query = "UPDATE solicitudes SET estado='1' WHERE id=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            self::$cnx->beginTransaction();
            $resultado->execute();
            self::$cnx->commit();
            self::desconectar();
            return $resultado->rowCount(); // Debería devolver 1 si se actualizó correctamente
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }
    
    public function desactivar() {
        $id = $this->getId();
        $query = "UPDATE solicitudes SET estado='0' WHERE id=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            self::$cnx->beginTransaction();
            $resultado->execute();
            self::$cnx->commit();
            self::desconectar();
            return $resultado->rowCount(); // Debería devolver 1 si se actualizó correctamente
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }
    
    
    
    

    public function mostrar($telefono) {
        $query = "SELECT * FROM solicitudes WHERE telefono=:telefono";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
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
        $query = "SELECT * FROM solicitudes WHERE id=:id";
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
                $this->setApellidos($encontrado['apellidos']);
                $this->setTelefono($encontrado['telefono']);
                $this->setAyuda($encontrado['ayuda']);
                $this->setFamiliar($encontrado['familiar']);
                $this->setIntegrantes($encontrado['integrantes']);
                $this->setNinos($encontrado['ninos']);
                $this->setAdolecentes($encontrado['adolecentes']);
                $this->setAdultos($encontrado['adultos']);
                $this->setProvincia($encontrado['provincia']);
                $this->setCanton($encontrado['canton']);
                $this->setDestino($encontrado['destino']);
                $this->setEstado($encontrado['estado']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    public function actualizarSolicitud() {
        $query = "UPDATE solicitudes SET nombre=:nombre, apellidos=:apellidos, telefono=:telefono, ayuda=:ayuda, familiar=:familiar, integrantes=:integrantes, ninos=:ninos, adolecentes=:adolecentes, adultos=:adultos, provincia=:provincia, canton=:canton, destino=:destino, estado=:estado WHERE id=:id";
        try {
            self::getConexion();
            $id = $this->getId();
            $nombre = $this->getNombre();
            $apellidos = $this->getApellidos();
            $telefono = $this->getTelefono();
            $ayuda = $this->getAyuda();
            $familiar = $this->getFamiliar();
            $integrantes = $this->getIntegrantes();
            $ninos = $this->getNinos();
            $adolecentes = $this->getAdolecentes();
            $adultos = $this->getAdultos();
            $provincia = $this->getProvincia();
            $canton = $this->getCanton();
            $destino = $this->getDestino();
            $estado = $this->getEstado();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":ayuda", $ayuda, PDO::PARAM_STR);
            $resultado->bindParam(":familiar", $familiar, PDO::PARAM_STR);
            $resultado->bindParam(":integrantes", $integrantes, PDO::PARAM_INT);
            $resultado->bindParam(":ninos", $ninos, PDO::PARAM_INT);
            $resultado->bindParam(":adolecentes", $adolecentes, PDO::PARAM_INT);
            $resultado->bindParam(":adultos", $adultos, PDO::PARAM_INT);
            $resultado->bindParam(":provincia", $provincia, PDO::PARAM_STR);
            $resultado->bindParam(":canton", $canton, PDO::PARAM_STR);
            $resultado->bindParam(":destino", $destino, PDO::PARAM_STR);
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

    public function obtenerEstadisticasSolicitudes() {
        $query = "SELECT ayuda, COUNT(*) AS cantidad FROM solicitudes GROUP BY ayuda";
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
