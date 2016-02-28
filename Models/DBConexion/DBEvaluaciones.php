<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Evaluaciones.php');

class DBEvaluaciones implements ICrud {
    
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('INSERT INTO evaluaciones(FECHA_EVALUACION,TIPO,ID_PROGRAMA) 
            VALUES (:fechaEvaluaciones,:tipo,:idPrograma)');
        $res->bindParam(':fechaEvaluaciones',$var->getFechaEvaluaciones(),PDO::PARAM_STR);
        $res->bindParam(':tipo',$var->getTipo(),PDO::PARAM_STR);
        $res->bindParam(':idPrograma',$var->getIdPrograma(),PDO::PARAM_STR);
        $res->execute();       
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();
        //ejecutar query        
        $res = $con -> prepare('DELETE FROM evaluaciones where ID_EVALUACIONES=:idEvaluaciones,
            ID_PROGRAMA=:idPrograma)');
        $res->bindParam(':idEvaluaciones',$var->getIdEvaluaciones(),PDO::PARAM_STR);
        $res->bindParam(':idPrograma',$var->getIdPrograma(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('UPDATE evaluciones SET FECHA_EVALUACION=:fechaEvaluaciones,TIPO=:topo,
             WHERE ID_PROGRAMA=:idPrograma AND ID_EVALUACIONES=:idEvaluaciones)');
        $res->bindParam(':idEvaluaciones',$var->getIdEvaluaciones(),PDO::PARAM_STR);
        $res->bindParam(':idPrograma',$var->getIdPrograma(),PDO::PARAM_STR);
        $res->bindParam(':fechaEvaluaciones',$var->getFechaEvaluaciones(),PDO::PARAM_STR);
        $res->bindParam(':tipo',$var->getTipo(),PDO::PARAM_STR);
        $res->execute();                     
    }

	public function GetInstance($profesor){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('SELECT * FROM evaluaciones WHERE ID_EVALUACIONES=:idEvaluaciones,
            ID_PROGRAMA=:idPrograma');
        $res->bindParam(':idEvaluaciones',$var->getIdEvaluaciones(),PDO::PARAM_STR);
        $res->bindParam(':idPrograma',$var->getIdPrograma(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res->fetchObject(__CLASS__);
        $profesor->setIdEvaluaciones($res2->ID_EVALUACIONES);
        $profesor->setIdPrograma($res2->ID_PROGRAMA);
        $profesor->setFechaEvaluaciones($res2->FECHA_EVALUACIONES);
        $profesor->setTipo($res2->TIPO);
	}
}
?>