<?php
require_once '../config/Conexion.php';
class DonacionesModel extends Conexion {

    protected static $cnx;

    private $id=null;
    private $nombre = null;
    private $apellidos = null;
    private $email = null;
    private $telefono = null;
    private $donacion = null;
    private $total = null;
    private $metodoPago = null;
    private $numero = null;
    private $estado = null;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDonacion() {
        return $this->donacion;
    }

    public function setDonacion($donacion) {
        $this->donacion = $donacion;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }
    public function getMetodoPago() {
        return $this->metodoPago;
    }

    public function setMetodoPago($metodoPago) {
        $this->metodoPago = $metodoPago;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
   

    //constructor
    public function __construct(){}

    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    public function guardar() {
        $query = "INSERT INTO `donaciones`(`nombre`, `apellidos`, `email`, `telefono`, `donacion`, `total`, `metodoPago`, `numero`, `estado`) VALUES (:nombrePDO, :apellidosPDO, :emailPDO, :telefonoPDO, :donacionPDO, :totalPDO, :metodoPagoPDO, :numeroPDO, :estadoPDO)";
        try {
            self::getConexion();
            $nombre = $this->getNombre();
            $apellido = $this->getApellidos();
            $email = $this->getEmail();
            $telefono = $this->getTelefono();
            $donacion = $this->getDonacion();
            $total = $this->getTotal();
            $metodoPago = $this->getMetodoPago();
            $numero = $this->getNumero();
            $estado = $this->getEstado();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombrePDO", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellidosPDO", $apellido, PDO::PARAM_STR);
            $resultado->bindParam(":emailPDO", $email, PDO::PARAM_STR);
            $resultado->bindParam(":telefonoPDO", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":donacionPDO", $donacion, PDO::PARAM_STR);
            $resultado->bindParam(":totalPDO", $total, PDO::PARAM_STR);
            $resultado->bindParam(":metodoPagoPDO", $metodoPago, PDO::PARAM_STR);
            $resultado->bindParam(":numeroPDO", $numero, PDO::PARAM_STR);
            $resultado->bindParam(":estadoPDO", $estado, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error ".$ex->getCode().": ".$ex->getMessage();
            echo json_encode(["exito" => false, "msg" => $error]);
        }
    } 
  }

    
?>