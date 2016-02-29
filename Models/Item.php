<?php
require_once('DBConexion/DBItem.php');

class Item{
    private $idItem;
    private $nombreItem;
    private $dbitem;
    
    function __construct(){
        $this->dbitem = new DBItem();
    }    
    //GETTERS
    function getIdItem(){
        return $this->idItem;
    } 
    
    function getNombreItem(){
        return $this->idItem;
    }    
    //SETTERS
    function setIdItem($newVal){
        $this->idItem = $newVal;
    }
    
    function setNombreItem($newVal){
        $this->nombreItem = $newVal;
    }
}
?>