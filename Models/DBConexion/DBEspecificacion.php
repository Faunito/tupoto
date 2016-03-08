<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Especificacion.php');

class DBEspecificacion implements ICrud {
    
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();       

        $res = $con->prepare('INSERT INTO especificacion_de_evidencia(  ID_ASIGNATURA, ID_COMPETENCIA, NIVELES_COMPETENCIA) VALUES (:idAsignatura,:idCompetencia,:nivel) ON DUPLICATE KEY UPDATE NIVELES_COMPETENCIA = :nivel');
        $res->bindParam(':nivel',$var->getNivelCompetencia(),PDO::PARAM_STR);
        $res->bindParam(':idAsignatura',$var->getIdAsignatura(),PDO::PARAM_STR);
        $res->bindParam(':idCompetencia',$var->getIdCompetencia(),PDO::PARAM_STR);
        $res->execute();       
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con->prepare('DELETE FROM especificacion_de_evidencia WHERE ID_ASIGNATURA=:id AND ID_COMPETENCIA=:id1)');
        $res->bindParam(':id',$var->getIdAsignatura(),PDO::PARAM_STR);
        $res->bindParam(':id1',$var->getIdCompetencia(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('UPDATE especificacion_de_evidencia SET NIVEL_EVIDENCIA=:nivel WHERE ID_ASIGNATURA=:id AND ID_COMPETENCIA=:id1)');
        $res->bindParam(':nivel',$var->getNivelCompetencia(),PDO::PARAM_STR);
        $res->bindParam(':id',$var->getIdAsignatura(),PDO::PARAM_STR);
        $res->bindParam(':id1',$var->getIdCompetencia(),PDO::PARAM_STR);
        $res->execute();                     
    }

	public function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM especificacion_de_evidencia WHERE ID_ASIGNATURA=:id AND ID_COMPETENCIA=:id1');
        $res->bindParam(':id',$var->getIdAsignatura(),PDO::PARAM_STR);
        $res->bindParam(':id1',$var->getIdCompetencia(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setIdAsignatura($res2->ID_ASIGNATURA);
        $var->setIdCompetencia($res2->ID_COMPETENCIA);;        
        $var->setNivelEvidencia($res2->NIVEL_EVIDENCIA);
	}
    
    public static function getAll(){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con -> prepare('SELECT * FROM especficacion_de_evidencia');            
        $resultado -> execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    
    public static function getAllAsoc($idCompetencia){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con -> prepare('SELECT * FROM especficacion_de_evidencia WHERE ID_COMPETENCIA=ID_ASIGNATURA AND ID_COMPETENCIA=:id');
        $resultado->getIdCompetencia($res2->ID_COMPETENCIA);             
        $resultado -> execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }   

     public static function getAsignaturasCompetencia($id){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('SELECT * FROM especificacion_de_evidencia WHERE ID_COMPETENCIA = :id');
        $dbh->bindParam(':id', $id ,PDO::PARAM_STR);
        $dbh->execute();
        $asignatura = $dbh->fetchAll();
        return $asignatura;     
    }
}
?>