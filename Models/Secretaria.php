<?php 

require_once ('DBSingleton.php');
require_once ('Funcionario.php');
require_once ('DBConexion/DBSecretaria.php');

class Secretaria extends Funcionario
{
    //VARS
    private $facultad;
    //FUNCIONES
    //CONSTRUCTS
    function __construct(){
        $this -> dbsecretaria = new DBSecretaria();
    }
    //FUNCTIONS
    
    //SETTERS
    function setFacultad($facultad){
        $this -> facultad = $facultad;
    }
    //GETTERS
    function getFacultad(){
        return $facultad;
    }
    
    function getSecretaria($email,$pass){
        $this -> setCorreoElectronico($email);
        $this -> setPassword($pass);
        $this -> dbsecretaria -> GetInstance($this);
    }
}
?>