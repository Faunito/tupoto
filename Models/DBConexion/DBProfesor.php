<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');

class DBProfesor implements ICrud {

	public function GetInstance($profesor){

        	$con = DBSingleton::getInstance()->getDB();
                //ejecutar query
        	$res = $con -> prepare('SELECT * FROM profesor where EMAIL =:email and PASSWORD =:pass');
                $res -> bindParam(':email',$profesor -> getCorreoElectronico(),PDO::PARAM_STR);
                $res -> bindParam(':pass',$profesor -> getPassword(),PDO::PARAM_STR);
                $res -> execute();
                //guardar respuesta en objeto php
                $res2 = $res -> fetchObject(__CLASS__);
                $profesor->setRut($res2->RUT);
                $profesor->setTipoProfesor($res2->TIPO_PROFESOR);
                $profesor->setCorreoElectronico($res2->EMAIL);
                //$profesor->setPassword($res2->PASSWORD); jamas guardar la pass en session!!
                $profesor->setFacultad($res2->FACULTAD);
                $profesor->setNombre($res2->NOMBRE);
                $profesor->setApaterno($res2->APATERNO);
                $profesor->setAmaterno($res2->AMATERNO);
                //retorna el objeto instanciado con los valores configurados desde la bd
                //return $profesor;
	}

        function existeProfesor($email,$pass){
                $con = DBSingleton::getInstance()->getDB();
                $res = $con->prepare('SELECT count(*) FROM profesor where EMAIL =:email and PASSWORD =:pass');
                $res->bindParam(':email',$email,PDO::PARAM_STR);
                $res->bindParam(':pass',$pass,PDO::PARAM_STR);
                $res->execute();
                $res1 = $res->fetchColumn();
                return $res1 == 1 ? true : false;
        }
    
    
}

?>