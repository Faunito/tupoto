<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Empleador.php');

class DBEmpleador Implements ICrud{
    
    function add($var){
        $con = DBSingleton::getInstance()->getDB();
        $respuesta = $con->prepare('INSERT INTO empleador VALUES(:rut,:cantPractica,:nombEmp,
            :telefono,:celular,:nombre,:apaterno,:amaterno) 
            ON DUPLICATE KEY UPDATE CELULAR = :celular, TELEFONO = :telefono, CANTIDAD_PRACTICAS = CANTIDAD_PRACTICAS+1');
        $respuesta->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $respuesta->bindParam(':cantPractica',$var->getCantPractica(),PDO::PARAM_STR);
        $respuesta->bindParam(':nombEmp',$var->getNomEmpresa(),PDO::PARAM_STR);
        $respuesta->bindParam(':telefono',$var->getFonoFijo(),PDO::PARAM_STR);
        $respuesta->bindParam(':celular',$var->getCelular(),PDO::PARAM_STR);
        $respuesta->bindParam(':nombre',$var->getNombre(),PDO::PARAM_STR);
        $respuesta->bindParam(':apaterno',$var->getApaterno(),PDO::PARAM_STR);
        $respuesta->bindParam(':amaterno',$var->getAmaterno(),PDO::PARAM_STR);
        $respuesta->execute();
    }
    
    function modify($var){
       $con = DBSingleton::getInstance()->getDB();
        $respuesta = $con->prepare('UPDATE empleador SET CANTIDAD_PRACTICAS=:cantPractica,
            NOMBE_EMPRESA=:nombEmp,TELEFONO=:telefono,CELULAR=:celular,NOMBRE=:nombre,
            APATERNO=:apaterno,AMATERNO=:amaterno WHERE RUT=:rut');
        $respuesta->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $respuesta->bindParam(':cantPractica',$var->getCantPractica(),PDO::PARAM_STR);
        $respuesta->bindParam(':nombEmp',$var->getNomEmpresa(),PDO::PARAM_STR);
        $respuesta->bindParam(':telefono',$var->getFonoFijo(),PDO::PARAM_STR);
        $respuesta->bindParam(':celular',$var->getCelular(),PDO::PARAM_STR);
        $respuesta->bindParam(':nombre',$var->getNombre(),PDO::PARAM_STR);
        $respuesta->bindParam(':apaterno',$var->getApaterno(),PDO::PARAM_STR);
        $respuesta->bindParam(':amaterno',$var->getAmaterno(),PDO::PARAM_STR);
        $respuesta->execute(); 
    }
    
    function delete($var){
        $con = DBSingleton::getInstance()->getDB();
        $respuesta = $con->prepare('DELETE * FROM empleador WHERE RUT=:rut)');
        $respuesta->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $respuesta->execute();
    }
    
    function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $respuesta = $con->prepare('SELECT * FROM empleador WHERE RUT=:rut');
        $respuesta->bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $respuesta->execute();
        $res2 = $respuesta -> fetchObject(__CLASS__);
        $var->setRut($res2->RUT);
        $var->setCantPractica($res2->CANTIDAD_PRACTICAS);
        $var->setNomEmpresa($res2->NOMBRE_EMPRESA);
        $var->setFonoFijo($res2->TELEFONO);
        $var->setCelular($res2->CELULAR);
        $var->setNombre($res2->NOMBRE);
        $var->setApaterno($res2->APATERNO);
        $var->setAmaterno($res2->AMATERNO);        
    }
    
}
?>