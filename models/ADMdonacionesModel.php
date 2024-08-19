<?php
require_once '../config/Conexion.php';

class ADMdonacionesModel extends Conexion
{
    protected static $cnx;
    private $id = null;
    private $nombre = null;
    private $apellidos = null;
    private $email = null;
    private $telefono = null;
    private $donacion = null;
    private $total = null;
    private $metodoPago = null;
    private $numero = null;
    private $estado= null;


    public function __construct() {}

    public function getId() 
    { return $this->id; }
    public function setId($id) 
    { $this->id = $id; }
    public function getEmail() 
    { return $this->email; }
    public function setEmail($email) 
    { $this->email = $email; }
    public function getNombre() 
    { return $this->nombre; }
    public function setNombre($nombre) 
    { $this->nombre = $nombre; }
    public function getApellidos() 
    { return $this->apellidos; }
    public function setApellidos($apellidos) 
    { $this->apellidos = $apellidos; }
    public function getTotal() 
    { return $this->total; }
    public function setTotal($total) 
    { $this->total = $total; }
    public function getTelefono() { return $this->telefono; }
    public function setTelefono($telefono) 
    { $this->telefono = $telefono; }
    public function getDonacion() { return $this->donacion; }
    public function setDonacion($donacion) 
    { $this->donacion = $donacion; }
    public function getMetodoPago() 
    { return $this->metodoPago; }
    public function setMetodoPago($metodoPago) 
    { $this->metodoPago = $metodoPago; }
    public function getNumero() 
    { return $this->numero; }
    public function setNumero($numero) 
    { $this->numero = $numero; }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar() {
        self::$cnx = null;
    }

    public function listarTodosDb() {
        $query = "SELECT * FROM donaciones";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $encontrado) {
                $user = new ADMdonacionesModel();
                $user->setId(isset($encontrado['id']) ? $encontrado['id'] : null);
                $user->setNombre(isset($encontrado['nombre']) ? $encontrado['nombre'] : null);
                $user->setApellidos(isset($encontrado['apellidos']) ? $encontrado['apellidos'] : null);
                $user->setEmail(isset($encontrado['email']) ? $encontrado['email'] : null);
                $user->setTelefono(isset($encontrado['telefono']) ? $encontrado['telefono'] : null);
                $user->setDonacion(isset($encontrado['donacion']) ? $encontrado['donacion'] : null);
                $user->setTotal(isset($encontrado['total']) ? $encontrado['total'] : null);
                $user->setMetodoPago(isset($encontrado['metodoPago']) ? $encontrado['metodoPago'] : null);
                $user->setNumero(isset($encontrado['numero']) ? $encontrado['numero'] : null);
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
        $query = "SELECT * FROM donaciones WHERE email=:email";
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
    $query = "INSERT INTO donaciones (nombre, apellidos, email, telefono, donacion, total, metodoPago, numero, estado) 
              VALUES (:nombre, :apellidos, :email, :telefono, :donacion, :total, :metodoPago, :numero, :estado)";
    try {
        self::getConexion();
        $nombre = strtoupper($this->getNombre());
        $apellidos = strtoupper($this->getApellidos());
        $email = $this->getEmail();
        $telefono = $this->getTelefono();
        $donacion = $this->getDonacion();
        $total = $this->getTotal();
        $metodoPago = $this->getMetodoPago();
        $numero = $this->getNumero();
        $estado = $this->getEstado();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $resultado->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
        $resultado->bindParam(":email", $email, PDO::PARAM_STR);
        $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
        $resultado->bindParam(":donacion", $donacion, PDO::PARAM_STR);
        $resultado->bindParam(":total", $total, PDO::PARAM_STR);
        $resultado->bindParam(":metodoPago", $metodoPago, PDO::PARAM_STR);
        $resultado->bindParam(":estado", $estado, PDO::PARAM_INT);
        $resultado->bindParam(":numero", $numero, PDO::PARAM_STR);
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
    $query = "UPDATE donaciones SET estado='1' WHERE id=:id";
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
    $query = "UPDATE donaciones SET estado='0' WHERE id=:id";
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
        $query = "SELECT * FROM donaciones WHERE email=:email";
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
        $query = "SELECT * FROM donaciones WHERE id=:id";
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

    public function actualizarDonacion() {
        $query = "UPDATE donaciones SET nombre=:nombre, apellidos=:apellidos, telefono=:telefono, donacion=:donacion, total=:total, metodoPago=:metodoPago, numero=:numero WHERE id=:id";
        try {
            self::getConexion();
            $id = $this->getId();
            $nombre = $this->getNombre();
            $apellidos = $this->getApellidos();
            $telefono = $this->getTelefono();
            $donacion = $this->getDonacion();
            $total = $this->getTotal();
            $metodoPago = $this->getMetodoPago();
            $numero = $this->getNumero();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":donacion", $donacion, PDO::PARAM_STR);
            $resultado->bindParam(":total", $total, PDO::PARAM_STR);
            $resultado->bindParam(":metodoPago", $metodoPago, PDO::PARAM_STR);
            $resultado->bindParam(":numero", $numero, PDO::PARAM_STR);
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
        $query = "SELECT email, id, nombre, apellidos, telefono FROM donaciones where email=:email and estado =1";
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
    public function obtenerEstadisticasDonaciones() {
        $query = "SELECT donacion, COUNT(*) AS cantidad FROM donaciones GROUP BY donacion";
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
    
        
    /*=====  End of Metodos de la Clase  ======*/  
}
?>