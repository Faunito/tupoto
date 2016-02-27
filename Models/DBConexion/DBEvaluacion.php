<?php
require_once ('ICrud.php');

class DBEvaluacion implements ICrud
{
	public function GetInstance($var)
	{
		$con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM competencia where ID_COMPETENCIA =:id');
        $res -> bindParam(':id',$var->getIdEvaluacion(),PDO::PARAM_STR);        
        $res -> execute();
        //guardar respuesta en objeto php
        $res2 = $res -> fetchObject(__CLASS__);
        $var->set($res2->CATEGORIA);
        $var->setDirector($res2->RUT);
        $var->setDesComp($res2->DESCRIPCION_DE_COMPETENCIA);
        $var->setNomComp($res2->NOMBRE_COMPETENCIA);
	}
    
    public function add($var)
    {}
    
    public function delete($var)
    {}
    
    public function modify($var)
    {}
}

?>