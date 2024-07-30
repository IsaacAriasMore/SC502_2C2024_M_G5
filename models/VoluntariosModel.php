<?php
require_once '../config/Conexion.php';
class VoluntariosModel extends Conexion {

    protected static $cnx;

    private $id=null;
    private $nombre_voluntario = null;
    private $apellido_voluntario = null;
    private $email_voluntario = null;
    private $telefono_voluntario = null;
    private $cedula_voluntario = null;
    private $residencia_voluntario = null;
    private $definicion_voluntario = null;

    public function getId(){
        return $this->id;
    }
    public function getNombreV(){
        return $this->nombre_voluntario;
    }
    public function getApellidoV(){
        return $this->apellido_voluntario;
    }
    public function getEmailV(){
        return $this->email_voluntario;
    }
    public function getTelefonoV(){
        return $this->telefono_voluntario;
    }
    public function getCedulaV(){
        return $this->cedula_voluntario;
    }
    public function getResidenciaV(){
        return $this->residencia_voluntario;
    }
    public function getDefinicionV(){
        return $this->definicion_voluntario;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombreV($nombre_voluntario){
        $this->nombre_voluntario = $nombre_voluntario;
    }

    public function setApellidoV($apellido_voluntario){
        $this->apellido_voluntario = $apellido_voluntario;
    }

    public function setEmailV($email_voluntario){
        $this->email_voluntario = $email_voluntario;
    }

    public function setTelefonoV($telefono_voluntario){
        $this->telefono_voluntario = $telefono_voluntario;
    }
    public function setCedulaV($cedula_voluntario){
        $this->cedula_voluntario = $cedula_voluntario;
    }
    public function setResidenciaV($residencia_voluntario){
        $this->residencia_voluntario = $residencia_voluntario;
    }
    public function setDefinicionV($definicion_voluntario){
        $this->definicion_voluntario = $definicion_voluntario;
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
        $query = "INSERT INTO `voluntarios`(`nombre_voluntario`, `apellido_voluntario`, `email_voluntario`, `telefono_voluntario`, `cedula_voluntario`, `residencia_voluntario`, `definicion_voluntario`) VALUES (:nombre_voluntarioPDO,:apellido_voluntarioPDO,:email_voluntarioPDO,:telefono_voluntarioPDO,:cedula_voluntarioPDO, :residencia_voluntarioPDO, :definicion_voluntarioPDO)";
        try {
            self::getConexion();
            $nombre_voluntarioP = $this->getNombreV();
            $apellido_voluntarioP = $this->getApellidoV();
            $email_voluntarioP = $this->getEmailV();
            $telefono_voluntarioP = $this->getTelefonoV();
            $cedula_voluntarioP = $this->getCedulaV();
            $residencia_voluntarioP = $this->getResidenciaV();
            $definicion_voluntarioP = $this->getDefinicionV();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre_voluntarioPDO",$nombre_voluntarioP, PDO::PARAM_STR);
            $resultado->bindParam(":apellido_voluntarioPDO",$apellido_voluntarioP,PDO::PARAM_STR);
            $resultado->bindParam(":email_voluntarioPDO",$email_voluntarioP,PDO::PARAM_STR);
            $resultado->bindParam(":telefono_voluntarioPDO",$telefono_voluntarioP,PDO::PARAM_STR);
            $resultado->bindParam(":cedula_voluntarioPDO",$cedula_voluntarioP,PDO::PARAM_STR);
            $resultado->bindParam(":residencia_voluntarioPDO",$residencia_voluntarioP,PDO::PARAM_STR);
            $resultado->bindParam(":definicion_voluntarioPDO",$definicion_voluntarioP,PDO::PARAM_STR);
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