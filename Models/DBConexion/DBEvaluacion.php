<?php
require_once ('ICrud.php');

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
    
    public function add($evaluacion)
    {
    	$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('INSERT INTO evaluacion (ID_PRACTICA, RUT, RESULTADO, FECHA_ENTREGA, OBSERVACIONES)
        						VALUES (:idprac,:rut,:result,:fecha,:obs)');

        $res -> bindParam(':idprac',$evaluacion->getPractica()->getIdPractica(),PDO::PARAM_STR);

        if( $evaluacion->getEmpleador() == null ){  //revisa si la practica ingresada es de un profe
            $res -> bindParam(':rut', $evaluacion->getEmpleador(),PDO::PARAM_STR);            
        }else{
            $res -> bindParam(':rut',$evaluacion->getEmpleador()->getRut(),PDO::PARAM_STR);
        }

        $res -> bindParam(':result',$evaluacion->getResultado(),PDO::PARAM_STR);
        $res -> bindParam(':fecha',$evaluacion->getFechaEntrega(),PDO::PARAM_STR);
        $res -> bindParam(':obs',$evaluacion->getObservacion(),PDO::PARAM_STR);

        $res -> execute();

        return $con->lastInsertId();
    }

    public function addEvalua($evaluacion){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('INSERT INTO evalua (RUT, ID_EVALUACION)
                                VALUES (:rut, :id)');
        $res -> bindParam(':rut',$evaluacion->getProfesor()->getRut(),PDO::PARAM_STR);
        $res -> bindParam(':id',$evaluacion->getIdEvaluacion(),PDO::PARAM_STR);

        $res -> execute();
    }

    public function addDetalle($detalle){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('INSERT INTO detalle_de_evaluacion (ID_EVALUACION, ID_COMPETENCIA, OBSERVACION, CALIFICACION) VALUES (:ide, :idc, :obs, :cal)');
        $res -> bindParam(':ide',$detalle->getEvaluacion()->getIdEvaluacion(),PDO::PARAM_STR);
        $res -> bindParam(':idc',$detalle->getCompetencia()->getIdComp(),PDO::PARAM_STR);
        $res -> bindParam(':obs',$detalle->getObservacion(),PDO::PARAM_STR);
        $res -> bindParam(':cal',$detalle->getCalificacion(),PDO::PARAM_STR);

        $res -> execute();
    }
    
    public function delete($var)
    {
    	$con = DBSingleton::getInstance()->getDB();
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