<?php

require_once ('ICrud.php');

class DBProfesor implements ICrud
{
	public function GetInstance($var)
	{
		$con = DBSingleton::getInstance();
		$aux = $con -> getDB();
		$res = $aux -> prepare('SELECT * FROM profesor where EMAIL =:email and PASSWORD =:pass');
        $res -> bindParam(':email',$var -> getcorreoElectronico(),PDO::PARAM_STR);
        $res -> bindParam(':pass',$var -> getpassword(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setnombre($res2->NOMBRE);
        return $var;
	}
}

?>