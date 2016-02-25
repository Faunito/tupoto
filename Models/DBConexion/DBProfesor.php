<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');

class DBProfesor implements ICrud {
    
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();
        //ejecutar query        
        $res = $con -> prepare('INSERT INTO profesor VALUES (:rut,:tipo,:email,:password,:facultad,
        :nombre,:apaterno,:amaterno)');
        $res->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res->bindParam(':tipo',$var->getTipoProfesor(),PDO::PARAM_STR);
        $res->bindParam(':email',$var->getCorreoElectronico(),PDO::PARAM_STR);
        $res->bindParam(':password',$var->getPassword(),PDO::PARAM_STR);
        $res->bindParam(':facultad',$var->getFacultad(),PDO::PARAM_STR);
        $res->bindParam(':nombre',$var->getNombre(),PDO::PARAM_STR);
        $res->bindParam(':apaterno',$var->getApaterno(),PDO::PARAM_STR);
        $res->bindParam(':amaterno',$var->getAmaterno(),PDO::PARAM_STR);
        $res->execute();       
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();
        //ejecutar query        
        $res = $con -> prepare('DELETE FROM profesor where rut =:rut)');
        $res->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        //ejecutar query        
        $res = $con -> prepare('UPDATE profesor SET TIPO_PROFESOR=:tipo,EMAIL=:email,
        PASSWORD=:pass,FACULTAD=:facu,NOMBRE=:nombre,APATERNO=:apaterno,
        AMATERNO=:amaterno where RUT=:rut)');
        $res->bindParam(':rut',$var->getTipoProfesor(),PDO::PARAM_STR);
        $res->bindParam(':email',$var->getEmail(),PDO::PARAM_STR);
        $res->bindParam(':pass',$var->getPassword(),PDO::PARAM_STR);
        $res->bindParam(':facu',$var->getFacultad(),PDO::PARAM_STR);
        $res->bindParam(':nombre',$var->getNombre(),PDO::PARAM_STR);
        $res->bindParam(':apaterno',$var->getApaterno(),PDO::PARAM_STR);
        $res->bindParam(':amaterno',$var->getAmaterno(),PDO::PARAM_STR);
        $res->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res->execute();                                               
    }

	public function GetInstance($profesor){
        	$con = DBSingleton::getInstance()->getDB();
                //ejecutar query
        	$res = $con -> prepare('SELECT * FROM profesor where EMAIL =:email and PASSWORD =:pass 
            and TIPO_PROFESOR="profesor"');
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

        function existeProfesor($email,$pass,$tipo){
                $con = DBSingleton::getInstance()->getDB();
                $res = $con->prepare('SELECT count(*) FROM profesor where EMAIL =:email and PASSWORD =:pass and TIPO_PROFESOR =:profesor');
                $res->bindParam(':email',$email,PDO::PARAM_STR);
                $res->bindParam(':pass',$pass,PDO::PARAM_STR);
                $res->bindParam(':profesor',$tipo,PDO::PARAM_STR);
                $res->execute();
                $res1 = $res->fetchColumn();
                return $res1 == 1 ? true : false;
        }
    
    
}

?>