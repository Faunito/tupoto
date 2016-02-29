<?php
require_once('ICrud.php');

class DBAsignatura Implements ICrud {

	function GetInstance($asignatura){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con->prepare('SELECT * FROM asignatura where ID_ASIGNATURA =:id');
        $resultado->bindParam(':id', $asignatura->getCodigo() ,PDO::PARAM_STR);        
        $resultado->execute();
        $objeto = $resultado->fetchObject(__CLASS__);
        //puede que falten datos
        $asignatura->setCodigo($objeto->ID_ASIGNATURA);
        $asignatura->setNombre($objeto->NOMBRE_ASIGNATURA);
        $asignatura->setNivel($objeto->NIVEL_ASIGNATURA);
	}
    

    public static function getAll(){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con -> prepare('SELECT * FROM asignatura');            
        $resultado -> execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    
    function getAsignatura($id){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('SELECT * FROM asignatura WHERE ID_ASIGNATURA = :id');
        $dbh->bindParam(':id', $id ,PDO::PARAM_STR);
        $dbh->execute();
        $asignatura = $dbh->fetch();
        return $asignatura;        
    }

    public static function getAsignaturasMalla($id){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('SELECT * FROM asignatura WHERE ID_MALLA = :id');
        $dbh->bindParam(':id', $id ,PDO::PARAM_STR);
        $dbh->execute();
        $asignatura = $dbh->fetchAll();
        return $asignatura;        
    }

    function actualizaIdMalla($idmalla, $asignatura)
    {
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare(' UPDATE asignatura SET ID_MALLA = :idmalla WHERE ID_ASIGNATURA = :idasignatura');
        $dbh->bindParam(':idmalla', $idmalla,PDO::PARAM_STR);
        $dbh->bindParam(':idasignatura', $asignatura->getId(),PDO::PARAM_STR);
        $dbh->execute();
        /*$dbh = $con->prepare(' INSERT INTO asignatura(CODIGO_ASIGNATURA, NOMBRE_ASIGNATURA, NIVEL_ASIGNATURA,ID_MALLA) 
                               VALUES (:codigo, :nombre, :nivel, :malla)');
        $dbh->bindParam(':codigo', $asignatura->getCodigo(),PDO::PARAM_STR);
        $dbh->bindParam(':nombre', $asignatura->getNombre(),PDO::PARAM_STR);
        $dbh->bindParam(':nivel', $asignatura->getNivel(),PDO::PARAM_STR);
        $dbh->bindParam(':malla',$asignatura->getMalla()->getIdMalla(),PDO::PARAM_STR);
        $dbh->execute();*/
    }

	function add($asignatura){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare(' INSERT INTO asignatura(CODIGO_ASIGNATURA, NOMBRE_ASIGNATURA, NIVEL_ASIGNATURA) 
                               VALUES (:codigo, :nombre, :nivel)');
        $dbh->bindParam(':codigo', $asignatura->getCodigo(),PDO::PARAM_STR);
        $dbh->bindParam(':nombre', $asignatura->getNombre(),PDO::PARAM_STR);
        $dbh->bindParam(':nivel', $asignatura->getNivel(),PDO::PARAM_STR);
        $dbh->execute();
	}

	function modify($asignatura){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('  UPDATE asignatura 
                                SET CODIGO_ASIGNATURA = :codigo, NOMBRE_ASIGNATURA = :nombre,
                                    NIVEL_ASIGNATURA = :nivel 
                                WHERE ID_ASIGNATURA = :id');
        //$dbh->bindParam(':malla',$asignatura->getMalla(),PDO::PARAM_STR);
        $dbh->bindParam(':nombre',$asignatura->getNombre(),PDO::PARAM_STR);
        $dbh->bindParam(':nivel',$asignatura->getNivel(),PDO::PARAM_STR);
        $dbh->bindParam(':codigo',$asignatura->getCodigo(),PDO::PARAM_STR);
        $dbh->bindParam(':id',$asignatura->getId(),PDO::PARAM_STR);
        $dbh->execute();
	}

	function delete($asignatura){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('DELETE FROM asignatura WHERE ID_ASIGNATURA = :id');
        $dbh->bindParam(':id',$asignatura->getId(),PDO::PARAM_STR);
        $dbh->execute();
	}
}
?>