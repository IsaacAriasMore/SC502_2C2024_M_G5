<?php
require_once '../config/Conexion.php';
class VoluntariosModel extends Conexion {

    protected static $cnx;

    private $id=null;
    private $nombre = null;
    private $apellido = null;
    private $email = null;
    private $telefono = null;
    private $cedula = null;
    private $residencia = null;
    private $descripcion = null;
    private $estado = null;

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getCedula(){
        return $this->cedula;
    }
    public function getResidencia(){
        return $this->residencia;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setCedula($cedula){
        $this->cedula = $cedula;
    }
    public function setResidencia($residencia){
        $this->residencia = $residencia;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
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

    public function guardar(){
        $query = "INSERT INTO `voluntarios`(`nombre`, `apellidos`, `email`, `telefono`, `cedula`, `residencia`, `descripcion`, `estado`) VALUES (:nombrePDO,:apellidosPDO,:emailPDO,:telefonoPDO,:cedulaPDO, :residenciaPDO, :descripcionPDO, :estadoPDO)";
        try {
            self::getConexion();
            $nombre = $this->getNombre();
            $apellidos = $this->getApellidos();
            $email = $this->getEmail();
            $telefono = $this->getTelefono();
            $cedula = $this->getCedula();
            $residencia = $this->getResidencia();
            $descripcion = $this->getDescripcion();
            $estado = $this->getEstado();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombrePDO",$nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellidosPDO",$apellidos,PDO::PARAM_STR);
            $resultado->bindParam(":emailPDO",$email,PDO::PARAM_STR);
            $resultado->bindParam(":telefonoPDO",$telefono,PDO::PARAM_STR);
            $resultado->bindParam(":cedulaPDO",$cedula,PDO::PARAM_STR);
            $resultado->bindParam(":residenciaPDO",$residencia,PDO::PARAM_STR);
            $resultado->bindParam(":descripcionPDO",$descripcion,PDO::PARAM_STR);
            $resultado->bindParam(":estadoPDO",$estado,PDO::PARAM_INT);

            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error ".$ex->getCode().": ".$ex->getMessage();
            return json_encode($error);
        }
    }
    
}

?>