<?php
require_once('ICrud.php');

class DBAlumno Implements ICrud{
    
    function GetInstance($alumno){
        $res = $con -> prepare('SELECT * FROM alumno where RUT=:rut');
        $res -> bindParam(':rut',$alumno->getRut(),PDO::PARAM_STR);        
        $res -> execute();
        //guardar respuesta en objeto php
        $res2 = $res -> fetchObject(__CLASS__);
        $alumno->setRut($res2->RUT);
        $alumno->setNivAca($res2->NIVEL_ACADEMICO);        
        $alumno->setCarrera($res2->CARRERA);
        $alumno->setNombre($res2->NOMBRE);
        $alumno->setApaterno($res2->APATERNO);
        $alumno->setAmaterno($res2->AMATERNO);
    }
    
    function getAll(){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM alumno');
        $res -> execute();
        $res1 = $res->fetchAll();
        return $res1;        
    }
    
    function add($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('INSERT INTO alumno VALUES(:rut,:car,:niv,:nom,:apa,:ama)');
        $res -> bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res -> bindParam(':car',$var->getCar(),PDO::PARAM_STR);
        $res -> bindParam(':niv',$var->getNivAca(),PDO::PARAM_STR);
        $res -> bindParam(':nom',$var->getNombre(),PDO::PARAM_STR);
        $res -> bindParam(':apa',$var->getApaterno(),PDO::PARAM_STR);        
        $res -> bindParam(':ama',$var->getAmaterno(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    function modify($var){        
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('UPDATE alumno SET CARRERA=:car,NIVEL_ACADEMICO=:niv,
                                NOMBRE=:nom,APATERNO=:apa,AMATERNO=:ama WHERE RUT=:rut)');
        $res -> bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res -> bindParam(':car',$var->getCar(),PDO::PARAM_STR);
        $res -> bindParam(':niv',$var->getNivAca(),PDO::PARAM_STR);
        $res -> bindParam(':nom',$var->getNombre(),PDO::PARAM_STR);
        $res -> bindParam(':apa',$var->getApaterno(),PDO::PARAM_STR);        
        $res -> bindParam(':ama',$var->getAmaterno(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    function delete($var){
        $con =DBSingleton::getInstance()->getDB();
        $res = $con->prepare('DELETE * FROM alumno WHERE RUT=:rut');
        $res -> bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res -> execute();        
    }
}
?>    