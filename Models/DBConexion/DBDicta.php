<?php
require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Dicta.php');

class DBDicta implements ICrud{
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con->prepre('INSERT INTO dicta VALUES(:idAsig,:rut,:paralelo)');
        $resultado->bindParam(':idAsig',$var->getId(),PDO::PARAM_STR);
        $resultado->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $resultado->bindParam(':paralelo',$var->getParalelo(),PDO::PARAM_STR);
        $resultado->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con->prepre('UPDATE dicta SET RUT=:rut,
        PARALELO=:paralelo');
        $resultado->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $resultado->bindParam(':paralelo',$var->getParalelo(),PDO::PARAM_STR);
        $resultado->execute();
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con->prepre('DELETE FROM dicta WHERE RUT=:rut AND ID_ASIGNATURA=:id');
        $resultado->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $resultado->bindParam(':id',$var->getId(),PDO::PARAM_STR);
        $resultado->execute();
    }
    
    public function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM dicta where ID_ASIGNATURA=:id AND RUT=:rut');
        $res->bindParam(':id',$var->getId(),PDO::PARAM_STR);
        $res->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setId($res2->ID_ASIGNATURA);
        $var->setRut($res2->RUT);
    }
}
?>