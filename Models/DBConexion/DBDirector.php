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
		$res = $aux -> prepare('SELECT * FROM profesor 
                               WHERE EMAIL = :email AND PASSWORD = :pass AND TIPO_PROFESOR = "director"');
        $res -> bindParam(':email',$var->getcorreoElectronico(),PDO::PARAM_STR);
        $res -> bindParam(':pass',$var->getPassword(),PDO::PARAM_STR);
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
        $var->setCarrera('ICCI');
        //retorna el objeto instanciado con 
        //los valores configurados desde la bd
	}

    function existeDirector($email,$pass,$tipo){
                $con = DBSingleton::getInstance()->getDB();
                $res = $con->prepare('SELECT count(*) 
                                      FROM profesor 
                                      WHERE EMAIL =:email AND PASSWORD =:pass AND TIPO_PROFESOR =:tipo');
                $res->bindParam(':email',$email,PDO::PARAM_STR);
                $res->bindParam(':pass',$pass,PDO::PARAM_STR);
                $res->bindParam(':tipo',$tipo,PDO::PARAM_STR);
                $res->execute();
                $res1 = $res->fetchColumn();
                return $res1 == 1 ? true : false;
        }  
}

?>