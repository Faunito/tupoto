<?php
require_once ('ICrud.php');
require_once ('../Evaluacion.php')

class DBEvaluacion implements ICrud
{
	public function GetInstance($var)
	{
		$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM evaluacion where ID_EVALUACION =:id');
        $res -> bindParam(':id',$var->getIdEvaluacion(),PDO::PARAM_STR);        
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setRseultado($res2->RESULTADO);
        $var->setIdEvaluacion($res2->ID_EVALUACION);
        $var->setFechaEntrega($res2->FECHA_ENTREGA);
        $var->setObservacion($res2->OBSERVACION);
	}
    
    public function add($var)
    {
    	$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('INSERT INTO evaluacion (ID_PRACTICA, RUT, RESULTADO, FECHA_ENTREGA, OBSERVACION)
        						VALUES (:idprac,:rut,:result,:fecha,:obs) WHERE ID_EVALUACION =:id');
        $res -> bindParam(':idprac',$var->getPractica()->getIdPractica(),PDO::PARAM_STR);
        $res -> bindParam(':rut',$var->getEmpleador()->getRut(),PDO::PARAM_STR);
        $res -> bindParam(':result',$var->getResultado(),PDO::PARAM_STR);
        $res -> bindParam(':fecha',$var->getFechaEntrega(),PDO::PARAM_STR);
        $res -> bindParam(':obs',$var->getObservacion(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getIdEvaluacion(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    public function delete($var)
    {
    	con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('DELETE FROM evaluacion WHERE ID_EVALUACION =:id');
        $dbh->bindParam(':id',$var->getIdEvaluacion(),PDO::PARAM_STR);
        $dbh->execute();
    }
    
    public function modify($var)
    {
    	$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('UPDATE evaluacion (ID_PRACTICA, RUT, RESULTADO, FECHA_ENTREGA, OBSERVACION)
        						VALUES (:id,:rut,:result,:fecha,:obs)');
        $res -> bindParam(':id',$var->getPractica()->getIdPractica(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getProfesor()->getRut(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getResultado(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getFechaEntrega(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getObservacion(),PDO::PARAM_STR);
        $res -> execute();
    }

    public static function getEvalperPract($practica)
    {
    	$con = DBSingleton::getInstance()->getDB();
    	$res = $con -> prepare('SELECT * FROM evaluacion where ID_PRACTICA =:id');
    	$res -> bindParam(':id',$practica->getIdPractica(),PDO::PARAM_STR);        
        $res -> execute();
        $res2 = $res->fetchAll();
        $evals = array();
        foreach ($res2 as $key) {
        	$aux = new Evaluacion();
        	$aux->setPractica($practica);
        	$aux->setResultado($key['RESULTADO']);
        	$aux->setFechaEntrega($key['FECHA_ENTREGA']);
        	$aux->setIdEvaluacion($key['ID_EVALUACION']);
        	$aux->setObservacion($key['OBSERVACION']);
        	array_push($evals, $aux);
        }
        return $evals;
    }
}

?>