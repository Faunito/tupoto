<?php
 
require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Malla.php');

class DBMalla Implements ICrud{
    //CRUD
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('INSERT INTO malla_curricular(RUT,PLAN,
            CODIGO_CARRERA,NIVELES) VALUES (:rut,:plan,:cod,:nivel)');
        $res->bindParam(':rut',$var->getDirector()->getRut(),PDO::PARAM_STR);
        $res->bindParam(':plan',$var->getPlan(),PDO::PARAM_STR);
        $res->bindParam(':cod',$var->getCodCarrera(),PDO::PARAM_STR); 
        $res->bindParam(':nivel',$var->getNiveles(),PDO::PARAM_STR); 
        $res->execute();
        $idmalla = $con->lastInsertId(); //devuelve el id de la malla
        foreach ($var->getAsignaturas() as $asignatura) 
        {
            $asignatura->getDBAsignatura()->actualizaIdMalla($idmalla, $asignatura);
        }
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('UPDATE malla_curricular SET PLAN=:plan,CODIGO_CARRERA=:codigo,NIVELES=:niveles WHERE ID_MALLA=:id');
        $res->bindParam(':id',$var->getIdMalla(),PDO::PARAM_STR);
        $res->bindParam(':plan',$var->getPlan(),PDO::PARAM_STR);
        $res->bindParam(':codigo',$var->getCodCarrera(),PDO::PARAM_STR);
        $res->bindParam(':niveles',$var->getNiveles(),PDO::PARAM_STR);
        $res->execute();
        foreach ($var->getAsignaturas() as $asignatura) 
        {
            $asignatura->getDBAsignatura()->actualizaIdMalla($var->getIdMalla(), $asignatura);
        }
        foreach ($var->getAsignaturasOff() as $asignaturaOff) 
        {
            $asignaturaOff->getDBAsignatura()->actualizaIdMalla($asignaturaOff->getMalla(), $asignaturaOff);
        }
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('DELETE FROM malla_curricular WHERE ID_MALLA=:id');
        $res->bindParam(':id',$var->getIdMalla(),PDO::PARAM_STR);
        $res->execute();
    }
    //ID_MALLA:RUT:PLAN:NIVELES:CODIGO_CARRERA
    
    public static function getAll(){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM malla_curricular');
        $res -> execute();
        $mallas = $res->fetchAll();
        return $mallas;
    }

    public static function getMalla($id){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM malla_curricular where ID_MALLA=:id');
        $res->bindParam(':id',$id,PDO::PARAM_STR);
        $res -> execute();
        $malla = $res->fetch();
        return $malla;
    }


    function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM malla_curricular where ID_MALLA =:id');
        $res -> bindParam(':email',$profesor -> getIdMalla(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setCodCarrera($res2->CODIGO_CARRERA);
        $var->setPLan($res2->PLAN);
        $var->setIdMAlla($res2->ID_MALLA);
        $var->setNiveles($res2->NIVELES);
        return $var;
    }
}
?>