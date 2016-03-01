<?php
require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'PuedeImpartir.php');

class DBPuedeImpatir Implements ICrud{
    function add($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('INSERT INTO puede_impartir VALUES(:idMalla,:idComp)');
        $res -> bindParam(':idMalla',$var->getIdMalla(),PDO::PARAM_STR);
        $res -> bindParam(':idComp',$var->getIdCompetencia(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    function modify($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('UPDTE puede_impartir SET ID_MALLA=:idMalla,ID_COMPETENCIA=:idComp)');
        $res -> bindParam(':idMalla',$var->getIdMalla(),PDO::PARAM_STR);
        $res -> bindParam(':idComp',$var->getIdCompetencia(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    function delete($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('DELETE * FROM puede_impartir WHERE ID_MALLA=:idMalla AND ID_COMPETENCIA=:idComp)');
        $res -> bindParam(':idMalla',$var->getIdMalla(),PDO::PARAM_STR);
        $res -> bindParam(':idComp',$var->getIdCompetencia(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('SELECT * FROM puede_impartir WHERE ID_MALLA=:idMalla AND ID_COMPETENCIA=:idComp)');
        $res -> bindParam(':idMalla',$var->getIdMalla(),PDO::PARAM_STR);
        $res -> bindParam(':idComp',$var->getIdCompetencia(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res->fetchObject(__CLASS__);
        $var->setIdMalla($res2->ID_MALLA);
        $var->setIdCompetencia($res2->ID_COMPETENCIA);
        return $var;
        
    }
}
?>