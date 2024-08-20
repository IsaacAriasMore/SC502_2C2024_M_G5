<?php
require_once '../config/Conexion.php';

class ADMvoluntariosModel extends Conexion
{
    protected static $cnx;
    private $id = null;
    private $nombre = null;
    private $apellidos = null;
    private $email = null;
    private $telefono = null;
    private $cedula = null;
    private $residencia = null;
    private $descripcion = null;
    private $estado= null;


    public function __construct() {}

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

    public function getCedula() {
        return $this->cedula;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }
    public function getResidencia() {
        return $this->residencia;
    }

    public function setResidencia($residencia) {
        $this->residencia = $residencia;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar() {
        self::$cnx = null;
    }

    public function listarTodosDb() {
        $query = "SELECT * FROM voluntarios";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $encontrado) {
                $user = new ADMvoluntariosModel();
                $user->setId(isset($encontrado['id']) ? $encontrado['id'] : null);
                $user->setNombre(isset($encontrado['nombre']) ? $encontrado['nombre'] : null);
                $user->setApellidos(isset($encontrado['apellidos']) ? $encontrado['apellidos'] : null);
                $user->setEmail(isset($encontrado['email']) ? $encontrado['email'] : null);
                $user->setTelefono(isset($encontrado['telefono']) ? $encontrado['telefono'] : null);
                $user->setCedula(isset($encontrado['cedula']) ? $encontrado['cedula'] : null);
                $user->setResidencia(isset($encontrado['residencia']) ? $encontrado['residencia'] : null);
                $user->setDescripcion(isset($encontrado['descripcion']) ? $encontrado['descripcion'] : null);
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
        $query = "SELECT * FROM voluntarios WHERE email=:email";
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
    $query = "INSERT INTO voluntarios (nombre, apellidos, email, telefono, cedula, residencia, descripcion, estado) 
              VALUES (:nombre, :apellidos, :email, :telefono, :cedula, :residencia, :descripcion, :estado)";
    try {
        self::getConexion();
        $nombre = strtoupper($this->getNombre());
        $apellidos = strtoupper($this->getApellidos());
        $email = $this->getEmail();
        $telefono = $this->getTelefono();
        $cedula = $this->getCedula();
        $residencia = $this->getResidencia();
        $descripcion = $this->getDescripcion();
        $estado = $this->getEstado();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $resultado->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
        $resultado->bindParam(":email", $email, PDO::PARAM_STR);
        $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $resultado->bindParam(":cedula", $cedula, PDO::PARAM_STR);
        $resultado->bindParam(":residencia", $residencia, PDO::PARAM_STR);
        $resultado->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
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
    $query = "UPDATE voluntarios SET estado='1' WHERE id=:id";
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
    $query = "UPDATE voluntarios SET estado='0' WHERE id=:id";
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
        $query = "SELECT * FROM voluntarios WHERE email=:email";
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
        $query = "SELECT * FROM voluntarios WHERE id=:id";
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
                $this->setEstado($encontrado['estado']);

            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    public function actualizarVoluntario() {
        $query = "UPDATE voluntarios SET nombre=:nombre, apellidos=:apellidos, telefono=:telefono, email=:email, cedula=:cedula, residencia=:residencia, descripcion=:descripcion WHERE id=:id";
        try {
            self::getConexion();
            $id = $this->getId();
            $nombre = $this->getNombre();
            $apellidos = $this->getApellidos();
            $telefono = $this->getTelefono();
            $email = $this->getEmail();
            $cedula = $this->getCedula();
            $residencia = $this->getResidencia();
            $descripcion = $this->getDescripcion();
            $estado = $this->getEstado();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":email", $email, PDO::PARAM_STR);
            $resultado->bindParam(":cedula", $cedula, PDO::PARAM_STR);
            $resultado->bindParam(":residencia", $residencia, PDO::PARAM_STR);
            $resultado->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
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

        

    public function verificarExistenciaEmail(){
        $query = "SELECT email, id, nombre, apellidos, telefono FROM voluntarios where email=:email and estado =1";
        try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);		
        $email= $this->getEmail();		
        $resultado->bindParam(":email",$email,PDO::PARAM_STR);
        $resultado->execute();
        self::desconectar();
        $encontrado = false;
        $arr=array();
        foreach ($resultado->fetchAll() as $reg) {
            $arr[]=$reg['id'];
            $arr[]=$reg['email'];   
            $arr[]=$reg['nombre'];  
            $arr[]=$reg['apellidos']; 
            $arr[]=$reg['telefono'];  
        }
        return $arr;
        return $encontrado;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        return $error;
        }
    }
    public function obtenerEstadisticasVoluntarios() {
        $query = "SELECT residencia, COUNT(*) AS cantidad FROM voluntarios GROUP BY residencia";
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
        
    /*=====  End of Metodos de la Clase  ======*/  

?>