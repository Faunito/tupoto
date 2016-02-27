<?php
 
require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Malla.php');

class DBMalla Implements ICrud{
    //CRUD
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('INSERT INTO malla_curricular(RUT,PLAN,NIVELES,
            CODIGO_CARRERA) VALUES (:rut,:plan,:niveles,:cod)');
        $res->bindParam(':rut',$var->getDirector(),PDO::PARAM_STR);
        $res->bindParam(':plan',$var->getPlan(),PDO::PARAM_STR);
        $res->bindParam(':niveles',$var->getNiveles(),PDO::PARAM_STR);
        $res->bindParam(':cod',$var->getCodCarrera(),PDO::PARAM_STR);        
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('UPDATE malla_curricular SET PLAN=:plan,NIVELES=:niveles');
        $res->bindParam(':plan',$var->getPlan(),PDO::PARAM_STR);
        $res->bindParam(':niveles',$var->getNiveles(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('DELETE FROM malla_curricular WHERE ID_MALLA=:id');
        $res->bindParam(':id',$var->getIdMalla(),PDO::PARAM_STR);
        $res->execute();
    }
    /*
    function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM malla_curricular where ID_MALLA =:id');
        $res -> bindParam(':email',$profesor -> getIdMalla(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $profesor->setRut($res2->RUT);
        $profesor->setTipoProfesor($res2->TIPO_PROFESOR);
        $profesor->setCorreoElectronico($res2->EMAIL);
        $profesor->setFacultad($res2->FACULTAD);
        $profesor->setNombre($res2->NOMBRE);
        $profesor->setApaterno($res2->APATERNO);
        $profesor->setAmaterno($res2->AMATERNO);
    }*/
}
?>