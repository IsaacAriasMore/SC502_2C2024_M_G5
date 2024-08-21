<?php
require_once '../config/Conexion.php';

class SolicitudModel extends Conexion {

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

    public function guardar() {
        $query = "INSERT INTO `solicitudes` 
            (`nombre`, `apellidos`, `telefono`, `ayuda`, `familiar`, `integrantes`, `ninos`, `adolecentes`, `adultos`, `provincia`, `canton`, `destino`, `estado`) 
            VALUES 
            (:nombrePDO, :apellidosPDO, :telefonoPDO, :ayudaPDO, :familiarPDO, :integrantesPDO, :ninosPDO, :adolecentesPDO, :adultosPDO, :provinciaPDO, :cantonPDO, :destinoPDO, :estadoPDO)";
        try {
            self::getConexion();
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
            $resultado->bindParam(":nombrePDO", $nombre);
            $resultado->bindParam(":apellidosPDO", $apellidos);
            $resultado->bindParam(":telefonoPDO", $telefono);
            $resultado->bindParam(":ayudaPDO", $ayuda);
            $resultado->bindParam(":familiarPDO", $familiar);
            $resultado->bindParam(":integrantesPDO", $integrantes);
            $resultado->bindParam(":ninosPDO", $ninos);
            $resultado->bindParam(":adolecentesPDO", $adolecentes);
            $resultado->bindParam(":adultosPDO", $adultos);
            $resultado->bindParam(":provinciaPDO", $provincia);
            $resultado->bindParam(":cantonPDO", $canton);
            $resultado->bindParam(":destinoPDO", $destino);
            $resultado->bindParam(":estadoPDO", $estado);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
?>
