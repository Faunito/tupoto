<?php

require_once ('ICrud.php');

class DBDirector implements ICrud
{
    
    public function add($var){
        
    }
    
    public function delete($var){
        
    }
    
    public function modify($var){
        
    }
    
	public function GetInstance($var)
	{
		$con = DBSingleton::getInstance();
		$aux = $con -> getDB();
        //ejecutar query
		$res = $aux -> prepare('SELECT * FROM profesor where EMAIL =:email and PASSWORD =:pass and TIPO_PROFESOR="director"');
        $res -> bindParam(':email',$var -> getcorreoElectronico(),PDO::PARAM_STR);
        $res -> bindParam(':pass',$var -> getPassword(),PDO::PARAM_STR);
        $res -> execute();
        //guardar respuesta en ojeto php
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setRut($res2->RUT);
        $var->setTipoProfesor($res2->TIPO_PROFESOR);
        $var->setCorreoElectronico($res2->EMAIL);
        $var->setPassword($res2->PASSWORD);
        $var->setFacultad($res2->FACULTAD);
        $var->setNombre($res2->NOMBRE);
        $var->setApaterno($res2->APATERNO);
        $var->setAmaterno($res2->AMATERNO);
        //retorna el objeto instanciado con 
        //los valores configurados desde la bd
        return $var;
	}
    
    
}

?>