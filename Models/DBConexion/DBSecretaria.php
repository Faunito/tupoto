<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Secretaria.php');

class DBSecretaria implements ICrud
{
    
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('INSERT INTO secretaria VALUES (:rut,:telFijo,:email,:password,
            :facultad,:nombre,:apaterno,:amaterno)');
        $res->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res->bindParam(':telFijo',$var->getTelefono(),PDO::PARAM_STR);
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
        $res = $con -> prepare('DELETE FROM secretaria where RUT =:rut)');
        $res->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('UPDATE secretaria SET TELEFONO_FIJO=:tipo,EMAIL=:email,
            PASSWORD=:pass,FACULTAD=:facu,NOMBRE=:nombre,APATERNO=:apaterno,
            AMATERNO=:amaterno where RUT=:rut)');
        $res->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res->bindParam(':telFijo',$var->getTelefono(),PDO::PARAM_STR);
        $res->bindParam(':email',$var->getCorreoElectronico(),PDO::PARAM_STR);
        $res->bindParam(':password',$var->getPassword(),PDO::PARAM_STR);
        $res->bindParam(':facultad',$var->getFacultad(),PDO::PARAM_STR);
        $res->bindParam(':nombre',$var->getNombre(),PDO::PARAM_STR);
        $res->bindParam(':apaterno',$var->getApaterno(),PDO::PARAM_STR);
        $res->bindParam(':amaterno',$var->getAmaterno(),PDO::PARAM_STR);
        $res->execute();
    }    
    
    public function GetInstance($var){
        $con = DBSingleton::getInstance();
		$aux = $con -> getDB();
        //ejecutar query
		$res = $aux -> prepare('SELECT * FROM secretaria where EMAIL =:email and PASSWORD =:pass');
        $res -> bindParam(':email',$var -> getCorreoElectronico(),PDO::PARAM_STR);
        $res -> bindParam(':pass',$var -> getPassword(),PDO::PARAM_STR);
        $res -> execute();
        //guardar respuesta en objeto php
        $res2 = $res -> fetchObject(__CLASS__);                
        $var->setCorreoElectronico($res2->EMAIL);
        $var->setPassword($res2->PASSWORD);
        $var->setFacultad($res2->FACULTAD);
        $var->setTelefono($res2->TELEFONO_FIJO);
        $var->setRut($res2->RUT);
        $var->setNombre($res2->NOMBRE);
        $var->setApaterno($res2->APATERNO);
        $var->setAmaterno($res2->AMATERNO);
        //retorna el objeto instanciado con 
        //los valores configurados desde la bd
        return $var;
    }

    function existeSecre($email,$pass){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('SELECT count(*) FROM secretaria WHERE EMAIL =:email AND PASSWORD =:pass');
        $res->bindParam(':email',$email,PDO::PARAM_STR);
        $res->bindParam(':pass',$pass,PDO::PARAM_STR);
         $res->execute();
        $res1 = $res->fetchColumn();
        return $res1 == 1 ? true : false;
    }    
}
?>