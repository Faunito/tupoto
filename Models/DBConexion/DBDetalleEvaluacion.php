<?php
require_once ('ICrud.php');

class DBDetalleEValuacion implements ICrud
{
	public function GetInstance($var)
	{
		$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM detalle_de_evaluacion where ID_EVAlUACION =:idev AND ID_COMPETENCIA =:idcom');
        $res -> bindParam(':idev',$var->getEvaluacion()->getIdEvaluacion(),PDO::PARAM_STR);
        $res -> bindParam(':idcom',$var->getCompetencia()->getIdCompetencia(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setCalificacion($res2->CALIFICACION);
        $var->setObservacion($res->OBSERVACION);
	}
    
    public function add($var)
    {
    	$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('INSERT INTO evaluacion (ID_EVALUACION, ID_COMPETENCIA, CALIFICACION, OBSERVACION)
        						VALUES (:idval,:idcom,:cali,:obs)');
        $res -> bindParam(':idval',$var->getEvaluacion()->getIdEvaluacion()),PDO::PARAM_STR);
        $res -> bindParam(':idcom',$var->getCompetencia()->getIdCompetencia(),PDO::PARAM_STR);
        $res -> bindParam(':cali',$var->getCalifiacion(),PDO::PARAM_STR);
        $res -> bindParam(':obs',$var->getObservacion(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    public function delete($var)
    {
    	con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('DELETE FROM evaluacion WHERE ID_EVALUACION =:idval AND ID_COMPETENCIA =:idcom');
        $dbh->bindParam(':idval',$var->getEvaluacion()->getIdEvaluacion(),PDO::PARAM_STR);
        $dbh->bindParam(':idcom',$var->getCompetencia()->getIdCompetencia(),PDO::PARAM_STR);
        $dbh->execute();
    }
    
    public function modify($var)
    {
    	$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('UPDATE evaluacion (CALIFICACION, OBSERVACION)
        						VALUES (:cali,:obs) WHERE ID_EVALUACION =:ideval AND ID_COMPETENCIA =:idcom');
        $res -> bindParam(':cali',$var->getCalificacion(),PDO::PARAM_STR);
        $res -> bindParam(':obs',$var->getObservacion(),PDO::PARAM_STR);
        $res -> bindParam(':ideval',$var->getEvaluaion()->getIdEvaluacion,PDO::PARAM_STR);
        $res -> bindParam(':idcom',$var->getCompetencia()->getIdCompetencia(),PDO::PARAM_STR);
        $res -> execute();
    }
}


?>