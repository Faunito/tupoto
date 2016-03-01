<?php
require_once('ICrud.php');

class DBEvidencia Implements ICrud {

	function GetInstance($evidencia){
       $con = DBSingleton::getInstance()->getDB();
       $res = $con -> prepare('SELECT * FROM evidencia where ID_EVIDENCIA =:id');
        $res -> bindParam(':id',$evidencia->getIdEvidencia(),PDO::PARAM_STR);        
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $evidencia->setIdEvidencia($res2->ID_EVIDENCIA);
        $evidencia->setDescripcion($res2->DESCRIPCION_EVIDENCIA);
        $evidencia->setNivel($res2->NIVEL_EVIDENCIA);
	}
    
    public static function getAll(){
            $con = DBSingleton::getInstance()->getDB();
            $res = $con -> prepare('SELECT * FROM evidencia');            
            $res -> execute();
            $res1 = $res->fetchAll();
            return $res1;
    }
    
    public static function getAllAsoc($idCompetencia){
            $con = DBSingleton::getInstance()->getDB();
            $res = $con -> prepare('SELECT evidencia.* FROM evidencia,competencia WHERE 
                competencia.ID_COMPETENCIA=evidencia.ID_COMPETENCIA AND ID_COMPETENCIA=:id');
            $res->bindParam(':rut', $idCompetencia,PDO::PARAM_STR);            
            $res -> execute();
            $res1 = $res->fetchAll();
            return $res1;
    }
    
	function add($evidencia){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('INSERT INTO evidencia(DESCRIPCION_EVIDENCIA,NIVEL_EVIDENCIA) VALUES (:descripcion,:nivel)');
        $dbh->bindParam(':descripcion', $evidencia->getDescripcion(),PDO::PARAM_STR);
        $dbh->bindParam(':nivel', $evidencia->getNivel(),PDO::PARAM_STR);
        $dbh->execute();
	}

	function modify($evidencia){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('UPDATE evidencia SET DESCRIPCION_EVIDENCIA=:descripcion, NIVEL_EVIDENCIA=:nivel WHERE ID_EVIDENCIA=:id');
        $dbh->bindParam(':id',$evidencia->getIdEvidencia(),PDO::PARAM_STR);        
        $dbh->bindParam(':descripcion',$evidencia->getDescripcion(),PDO::PARAM_STR);
        $dbh->bindParam(':nivel',$evidencia->getNivel(),PDO::PARAM_STR);
        $dbh->execute();
	}

	function delete($evidencia){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('DELETE FROM evidencia WHERE ID_EVIDENCIA = :id');
        $dbh->bindParam(':id',$evidencia->getIdEvidencia(),PDO::PARAM_STR);
        $dbh->execute();
	}
}
?>