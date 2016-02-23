<?php

require_once ('ICrud.php');

class DBSecretaria implements ICrud
{
    public function GetInstance($var){
        $con = DBSingleton::getInstance();
		$aux = $con -> getDB();
        //ejecutar query
		$res = $aux -> prepare('SELECT * FROM secretaria where EMAIL =:email and PASSWORD =:pass');
        $res -> bindParam(':email',$var -> getcorreoElectronico(),PDO::PARAM_STR);
        $res -> bindParam(':pass',$var -> getpassword(),PDO::PARAM_STR);
        $res -> execute();
        //guardar respuesta en ojeto php
        $res2 = $res -> fetchObject(__CLASS__);                
        $var->setCorreoElectronico($res2->EMAIL);
        $var->setPassword($res2->PASSWORD);
        $var->setFacultad($res2->FACULTAD);
        $var->setRut($res2->RUT);
        $var->setNombre($res2->NOMBRE);
        $var->setApaterno($res2->APATERNO);
        $var->setAmaterno($res2->AMATERNO);
        //retorna el objeto instanciado con 
        //los valores configurados desde la bd
        return $var;
    }
}
?>