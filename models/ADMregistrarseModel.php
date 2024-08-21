<?php
require_once '../config/Conexion.php';
class ADMregistrarseModel extends Conexion {

    protected static $cnx;

    private $id=null;
    private $nombre = null;
    private $usuario = null;
    private $correo = null;
    private $contrasena = null;
    private $fecharegistro = null;
    private $id_cargo = null;
    private $estado = null;

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getContrasena(){
        return $this->contrasena;
    }

    public function getFecharegistro(){
        return $this->fecharegistro;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function setFecharegistro($fecharegistro){
        $this->fecharegistro = $fecharegistro;
    }
    public function getId_cargo() {
        return $this->id_cargo;
    }

    public function setId_cargo($id_cargo) {
        $this->id_cargo = $id_cargo;
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

    public function listarTodosDb() {
        $query = "SELECT * FROM usuarios";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $encontrado) {
                $user = new ADMregistrarseModel();
                $user->setId(isset($encontrado['id']) ? $encontrado['id'] : null);
                $user->setNombre(isset($encontrado['nombre']) ? $encontrado['nombre'] : null);
                $user->setUsuario(isset($encontrado['usuario']) ? $encontrado['usuario'] : null);
                $user->setCorreo(isset($encontrado['correo']) ? $encontrado['correo'] : null);
                $user->setContrasena(isset($encontrado['contrasena']) ? $encontrado['contrasena'] : null);
                $user->setFecharegistro(isset($encontrado['fecharegistro']) ? $encontrado['fecharegistro'] : null);
                $user->setId_cargo(isset($encontrado['id_cargo']) ? $encontrado['id_cargo'] : null);
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
        $query = "SELECT * FROM usuarios WHERE correo=:correo";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $correo = $this->getCorreo();
            $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            return $resultado->rowCount() > 0;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    public function guardar(){
        $query = "INSERT INTO `usuarios`(`nombre`, `usuario`, `correo`, `contrasena`, `fecharegistro`, `id_cargo`, `estado`) VALUES (:nombrePDO,:usuarioPDO,:correoPDO,:contrasenaPDO,:fecharegistroPDO, :id_cargoPDO, :estadoPDO)";
        try {
            self::getConexion();
            $nombre = $this->getNombre();
            $usuario = $this->getUsuario();
            $correo = $this->getCorreo();
            $contrasena = $this->getContrasena();
            $fecharegistro = $this->getFecharegistro();
            $id_cargo = $this->getId_cargo();
            $estado = $this->getEstado();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombrePDO", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":usuarioPDO", $usuario, PDO::PARAM_STR);
            $resultado->bindParam(":correoPDO", $correo, PDO::PARAM_STR);
            $resultado->bindParam(":contrasenaPDO", $contrasena, PDO::PARAM_STR);
            $resultado->bindParam(":fecharegistroPDO", $fecharegistro, PDO::PARAM_STR);
            $resultado->bindParam(":id_cargoPDO", $id_cargo, PDO::PARAM_INT);
            $resultado->bindParam(":estadoPDO", $estado, PDO::PARAM_INT);
    
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error ".$ex->getCode().": ".$ex->getMessage();
            return json_encode($error);
        }
    }
    
    public function activar() {
        $id = $this->getId();  
        $query = "UPDATE usuarios SET estado='1' WHERE id=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
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
    
    public function desactivar() {
        $id = $this->getId();  
        $query = "UPDATE usuarios SET estado='0' WHERE id=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
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
    
        public function mostrar($correo) {
            $query = "SELECT * FROM usuarios WHERE correo=:correo";
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
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
            $query = "SELECT * FROM usuarios WHERE id=:id";
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
    
        public function actualizarRegistrarse() {
            $query = "UPDATE usuarios SET nombre=:nombre, usuario=:usuario, correo=:correo, contrasena=:contrasena, fecharegistro=:fecharegistro, id_cargo=:id_cargo, estado=:estado WHERE id=:id";
            try {
                self::getConexion();
                $id = $this->getId();
                $nombre = $this->getNombre();
                $usuario = $this->getUsuario();
                $correo = $this->getCorreo();
                $contrasena = $this->getContrasena();
                $fecharegistro = $this->getFecharegistro();
                $id_cargo = $this->getId_cargo();
                $estado = $this->getEstado();
        
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":id", $id, PDO::PARAM_INT);
                $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                $resultado->bindParam(":usuario", $usuario, PDO::PARAM_STR);
                $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
                $resultado->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
                $resultado->bindParam(":fecharegistro", $fecharegistro, PDO::PARAM_STR);
                $resultado->bindParam(":id_cargo", $id_cargo, PDO::PARAM_INT);
                $resultado->bindParam(":estado", $estado, PDO::PARAM_INT);
        
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
        } }
        