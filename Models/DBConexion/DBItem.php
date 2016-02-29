<?php
require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Item.php');

class DBMalla Implements ICrud{
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('INSERT INTO item(ID_ITEM,NOMBRE_ITEM) 
            VALUES(:idItem,:nombreItem)');
        $res->bindParam(':idItem',$var->getDirector()->getRut(),PDO::PARAM_STR);
        $res->bindParam(':nombreItem',$var->getPlan(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('UPDATE item SET ID_ITEM=:idItem,NOMBRE_ITEM=:nombreItem');
        $res->bindParam(':idItem',$var->getIdItem(),PDO::PARAM_STR);
        $res->bindParam(':nombreItem',$var->getNombreItem(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('DELETE * FROM item WHERE ID_ITEM=:idItem');
        $res->bindParam(':idItem',$var->getIdItem(),PDO::PARAM_STR);
        $res->execute();
    }    
    
    public function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('SELECT * FROM item WHERE ID_ITEM=:idItem');
        $res->bindParam(':idItem',$var->getIdItem(),PDO::PARAM_STR);
        $res->execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setIdItem($res2->ID_ITEM);
        $var->setNombreItem($res2->NOMBRE_ITEM);
    } 
}
?>