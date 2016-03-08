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
    
    function getAllAsoc($rutProfesor){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT alumno.* FROM alumno,profesor,supervisa WHERE profesor.RUT=supervisa.PRO_RUT AND supervisa.RUT=alumno.RUT AND profesor.RUT=:rut');
        $res -> bindParam(':rut',$rutProfesor,PDO::PARAM_STR);
        $res -> execute();        
        $res1 = $res->fetchAll();
        return $res1;        
    }

    function consultarAlumno($rut){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM alumno WHERE RUT=:rut');
        $res -> bindParam(':rut',$rut,PDO::PARAM_STR);
        $res -> execute();        
        $res1 = $res->fetch();
        return $res1;
    }
    
    function add($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('INSERT INTO alumno(RUT,CARRERA,NOMBRE,APATERNO,AMATERNO) VALUES(:rut,:car,:nom,:apa,:ama)');
        $res -> bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res -> bindParam(':car',$var->getCarrera(),PDO::PARAM_STR);
        $res -> bindParam(':nom',$var->getNombre(),PDO::PARAM_STR);
        $res -> bindParam(':apa',$var->getApaterno(),PDO::PARAM_STR);        
        $res -> bindParam(':ama',$var->getAmaterno(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    function modify($var){        
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con -> prepare('UPDATE alumno SET NOMBRE=:nom,APATERNO=:apa,AMATERNO=:ama WHERE RUT=:rut');
        $res -> bindParam(':rut',$var->getRut(),PDO::PARAM_STR);        
        $res -> bindParam(':nom',$var->getNombre(),PDO::PARAM_STR);
        $res -> bindParam(':apa',$var->getApaterno(),PDO::PARAM_STR);        
        $res -> bindParam(':ama',$var->getAmaterno(),PDO::PARAM_STR);
        $res -> execute();
    }
    
    function delete($var){
        $con =DBSingleton::getInstance()->getDB();
        $res = $con->prepare('DELETE FROM alumno WHERE RUT=:rut');
        $res -> bindParam(':rut',$var->getRut(),PDO::PARAM_STR);
        $res -> execute();        
    }
}
?>    