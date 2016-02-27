<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Practica.php');

class DBPractica implements ICrud{
    
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();
        //ejecutar query        
        $res = $con -> prepare('INSERT INTO practica(RUT,DIRECCION_PRACTICA,ESTADO,
        FECHA_INICIO,FECHA_TERMINO,INTENTO,NIVEL_PRACTICA,HORAS) VALUES (:rut,:direccion,
        :estado,:fInicio,:fTermino,:intento,:nivel,:horas)');
        $res->bindParam(':rut',$var->getRutProfesor(),PDO::PARAM_STR);
        $res->bindParam(':direccion',$var->getDireccion(),PDO::PARAM_STR);
        $res->bindParam(':estado',$var->getEstado(),PDO::PARAM_STR);
        $res->bindParam(':fInicio',$var->getFechaInicio(),PDO::PARAM_STR);
        $res->bindParam(':fTermino',$var->getFechaTermino(),PDO::PARAM_STR);
        $res->bindParam(':intento',$var->getIntento(),PDO::PARAM_STR);
        $res->bindParam(':nivel',$var->getNivelPractica(),PDO::PARAM_STR);
        $res->bindParam(':horas',$var->getHoras(),PDO::PARAM_STR);
        $res->execute();       
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        //ejecutar query        
        $res = $con -> prepare('UPDATE practica SET DIRECCION_PRACTICA=:direccion,
        ESTADO=:estado,FECHA_INICIO=:fInicio,FECHA_TERMINO=:fTermino,INTENTO=:intento,
        NIVEL_PRACTICA=:nivel,HORAS=:horas WHERE ID_PRACTICA=:id');        
        $res->bindParam(':id',$var->getIdPractica(),PDO::PARAM_STR);
        $res->bindParam(':direccion',$var->getDireccion(),PDO::PARAM_STR);
        $res->bindParam(':estado',$var->getEstado(),PDO::PARAM_STR);
        $res->bindParam(':fInicio',$var->getFechaInicio(),PDO::PARAM_STR);
        $res->bindParam(':fTermino',$var->getFechaTermino(),PDO::PARAM_STR);
        $res->bindParam(':intento',$var->getIntento(),PDO::PARAM_STR);
        $res->bindParam(':nivel',$var->getNivelPractica(),PDO::PARAM_STR);
        $res->bindParam(':horas',$var->getHoras(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();
        //ejecutar query        
        $res = $con -> prepare('DELETE * FROM practica WHERE ID_PRACTICA=:id');        
        $res->bindParam(':id',$var->getIdPractica(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM practica where ID_PRACTICA =:id');
        $res->bindParam(':id',$var->getIdPractica(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $prac->setRutProfesor($res2->RUT);
        $prac->setIdPractica($res2->ID_PRACTICA);
        $prac->setDireccion($res2->DIRECCION_PRACTICA);
        $prac->setEstado($res2->ESTADO);
        $prac->setFechaInicio($res2->FECHA_INICIO);
        $prac->setFechaTermino($res2->FECHA_TERMINO);
        $prac->setIntento($res2->INTENTO);
        $prac->setNivelPractica($res2->NIVEL_PRACTICA);
        $prac->setHoras($res2->HORAS);
	}
}