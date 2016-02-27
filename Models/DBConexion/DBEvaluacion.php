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
    
    public function add($var)
    {
    	$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('INSERT INTO evaluacion (ID_PRACTICA, RUT, RESULTADO, FECHA_ENTREGA, OBSERVACION)
        						VALUES (:id,:rut,:result,:fecha,:obs)');
        $res -> bindParam(':id',$var->getPractica()->getIdPractica(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getEmpleador()->getRut(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getResultado(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getFechaEntrega(),PDO::PARAM_STR);
        $res -> bindParam(':id',$var->getObservacion(),PDO::PARAM_STR);
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

    function getEvaluacion($practica)
    {
    	$con = DBSingleton::getInstance()->getDB();
    	$res = $con -> prepare('SELECT * FROM evaluacion where ID_PRACTICA =:id');
    	$res -> bindParam(':id',$practica->getIdPractica(),PDO::PARAM_STR);        
        $res -> execute();
    }
}

?>