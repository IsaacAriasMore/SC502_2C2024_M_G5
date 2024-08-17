<?php
require_once '../config/SoliConexion.php';
class SolicitudModel extends Conexion {

    protected static $cnx;

    private $nombre = null;
    private $apellido = null;
    private $Telefono = null;
    private $Ayuda = null;
    private $ApellidoFamiliar = null;
    private $NumIntegrantes = null;
    private $Niños = null;
    private $Adolescentes = null;
    private $Adultos = null;
    private $Provincia = null;
    private $Canton = null;
    private $Destino = null;

    //get
 
    public function getNombre(){
        return $this->nombre;
    }

    public function getapellido(){
        return $this->apellido;
    }
    
    public function getTelefono(){
        return $this->Telefono;

    }
    public function getAyuda(){
        return $this->Ayuda;
    }

    public function getApellidoFamiliar(){
        return $this->ApellidoFamiliar;
    }

    public function getNumIntegrantes(){
        return $this->NumIntegrantes;
    }
    
    public function getNiños(){
        return $this->Niños;
    }

    public function getAdolescentes(){
        return $this->Adolescentes;
    }


    public function getAdultos(){
        return $this->Adultos;
    }

    public function getProvincia(){
        return $this->Provincia;
    }

    public function getCanton(){
        return $this->Canton;
    }

    public function getDestino(){
        return $this->Destino;
    }

//set

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setapellido($apellido){
        $this->apellido = $apellido;
    }

    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }

    public function setAyuda($Ayuda){
        $this->Ayuda = $Ayuda;
    }


    public function setApellidoFamiliar($ApellidoFamiliar){
        $this->ApellidoFamiliar = $ApellidoFamiliar;
    }


    public function setNumIntegrantes($NumIntegrantes){
        $this->NumIntegrantes = $NumIntegrantes;
    }


    public function setNiños($Niños){
        $this->Niños = $Niños;
    }


    public function setAdolescentes($Adolescentes){
        $this->Adolescentes = $Adolescentes;
    }


    public function setAdultos($Adultos){
        $this->Adultos = $Adultos;
    }


    public function setProvincia($Provincia){
        $this->Provincia = $Provincia;
    }


    public function setCanton($Canton){
        $this->Canton = $Canton;
    }


    public function setDestino($Destino){
        $this->Destino = $Destino;
    }


    //constructor
    public function __construct(){}

    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    public function guardarSinOO($nombreP,$apellidoP,$TelefonoP,$AyudaP,$ApellidoFamiliarP,$NumIntegrantesP,$NiñosP,$AdolescentesP,$AdultosP,
    $ProvinciaP,$CantonP,$DestinoP){
        $query = "INSERT INTO `TabalaSolicitudes`(`nombre`, `apellido` , `telefono` , `ayuda` , `ApellidoFamiliar`, `NumIntegrantesP`
        , `Niños` , `Adolescentes`, `Adultos`, `Provincia`, , `Canton`, `Destino`)
        VALUES (:nombrePDO,:apellidoPDO,:telefonoPDO,:ayudaPDO,:aApellidoFamiliarPDO,:NumIntegrantesPPDO,:NiñosPDO,:AdolescentesPDO,:AdultosPDO,:ProvinciaPDO
        ,:CantonPDO,:DestinoPDO)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombrePDO",$nombreP,PDO::PARAM_STR);
            $resultado->bindParam(":apellidoPDO",$apellidoP,PDO::PARAM_STR);
            $resultado->bindParam(":telefonoPDO",$TelefonoP,PDO::PARAM_STR);
            $resultado->bindParam(":ayudaPDO",$AyudaP,PDO::PARAM_STR);
            $resultado->bindParam(":aApellidoFamiliarPDO",$ApellidoFamiliarP,PDO::PARAM_STR);
            $resultado->bindParam(":NumIntegrantesPPDO",$NumIntegrantesP,PDO::PARAM_STR);
            $resultado->bindParam(":NiñosPDO",$NiñosP,PDO::PARAM_STR);
            $resultado->bindParam(":AdolescentesPDO",$AdolescentesP,PDO::PARAM_STR);
            $resultado->bindParam(":AdultosPDO",$AdultosP,PDO::PARAM_STR);
            $resultado->bindParam(":ProvinciaPDO",$ProvinciaP,PDO::PARAM_STR);
            $resultado->bindParam(":CantonPDO",$CantonP,PDO::PARAM_STR);
            $resultado->bindParam(":DestinoPDO",$DestinoP,PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error ".$ex->getCode().": ".$ex->getMessage();
            return json_encode($error);
        }
    }

    public function guardarconOO(){
        $query = "INSERT INTO INSERT INTO `TabalaSolicitudes`(`nombre`, `apellido` , `telefono` , `ayuda` , `ApellidoFamiliar`, `NumIntegrantesP`
        , `Niños` , `Adolescentes`, `Adultos`, `Provincia`, , `Canton`, `Destino`) VALUES (:nombrePDO,:apellidoPDO,:telefonoPDO,:ayudaPDO,:aApellidoFamiliarPDO,:NumIntegrantesPPDO,:NiñosPDO,:AdolescentesPDO,:AdultosPDO,:ProvinciaPDO
        ,:CantonPDO,:DestinoPDO)";
        try {
            self::getConexion();
            $nombreP = $this->getNombre();
            $apellidoP = $this->getapellido();
            $TelefonoP = $this->getTelefono();
            $AyudaP = $this->getAyuda();
            $ApellidoFamiliarP = $this->getApellidoFamiliar();
            $NumIntegrantesP = $this->getNumIntegrantes();
            $NiñosP = $this->getNiños();
            $AdolescentesP = $this->getAdolescentes();
            $AdultosP = $this->getAdultos();
            $ProvinciaP = $this->getProvincia();
            $CantonP = $this->getCanton();
            $DestinoP = $this->getDestino();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombrePDO",$nombreP,PDO::PARAM_STR);
            $resultado->bindParam(":apellidoPDO",$apellidoP,PDO::PARAM_STR);
            $resultado->bindParam(":telefonoPDO",$TelefonoP,PDO::PARAM_STR);
            $resultado->bindParam(":ayudaPDO",$AyudaP,PDO::PARAM_STR);
            $resultado->bindParam(":aApellidoFamiliarPDO",$ApellidoFamiliarP,PDO::PARAM_STR);
            $resultado->bindParam(":NumIntegrantesPPDO",$NumIntegrantesP,PDO::PARAM_STR);
            $resultado->bindParam(":NiñosPDO",$NiñosP,PDO::PARAM_STR);
            $resultado->bindParam(":AdolescentesPDO",$AdolescentesP,PDO::PARAM_STR);
            $resultado->bindParam(":AdultosPDO",$AdultosP,PDO::PARAM_STR);
            $resultado->bindParam(":ProvinciaPDO",$ProvinciaP,PDO::PARAM_STR);
            $resultado->bindParam(":CantonPDO",$CantonP,PDO::PARAM_STR);
            $resultado->bindParam(":DestinoPDO",$DestinoP,PDO::PARAM_STR);
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error ".$ex->getCode().": ".$ex->getMessage();
            return json_encode($error);
        }
    }

    public function guardar() {
        try {
            $query = "INSERT INTO INSERT INTO `TabalaSolicitudes`(`nombre`, `apellido` , `telefono` , `ayuda` , `ApellidoFamiliar`, `NumIntegrantesP`
            , `Niños` , `Adolescentes`, `Adultos`, `Provincia`, , `Canton`, `Destino`) 
            VALUES (:nombrePDO,:apellidoPDO,:telefonoPDO,:ayudaPDO,:aApellidoFamiliarPDO,:NumIntegrantesPPDO,:NiñosPDO,:AdolescentesPDO,:AdultosPDO,:ProvinciaPDO
            ,:CantonPDO,:DestinoPDO)";
            $stmt = $this->conn->prepare($sql);
            $resultado->bindParam(':nombre', $this->nombre);
            $resultado->bindParam(':lugar', $this->apellido);
            $resultado->bindParam(':fecha', $this->telefono);
            $resultado->bindParam(':hora', $this->ayuda);
            $resultado->bindParam(':hora', $this->ApellidoFamiliar);
            $resultado->bindParam(':hora', $this->NumIntegrantesP);
            $resultado->bindParam(':hora', $this->Niños);
            $resultado->bindParam(':hora', $this->Adolescentes);
            $resultado->bindParam(':hora', $this->Adultos);
            $resultado->bindParam(':hora', $this->Provincia);
            $resultado->bindParam(':hora', $this->Canton);
            $resultado->bindParam(':hora', $this->Destino);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM TablaSolicitudes";
            $stmt = $this->conn->query($sql);
            return $stmt->resultado(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
    

    
}
 //$val = new S9formModel();
//var_dump($val->guardarSinOO("Pablo","Cordero"));
?>