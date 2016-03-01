<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Especificacion.php');

class DBEspecificacion implements ICrud {
    
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();       
        $res = $con->prepare('INSERT INTO especificacion(DESCRIPCION_EVIDENCIA,NIVEL_EVIDENCIA) VALUES (:descripcion,:nivel)');
        $res->bindParam(':descripcion',$var->getDescripcion(),PDO::PARAM_STR);
        $res->bindParam(':nivel',$var->getNivelCompetencia(),PDO::PARAM_STR);
        $res->execute();       
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();        
        $res = $con->prepare('DELETE FROM especificacion WHERE ID_EVIDENCIA=:id)');
        $res->bindParam(':idActividad',$var->getIdEvidencia(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('UPDATE especificacion SET DESCRIPCION_ESPECIFICACION=:descripcion,NIVEL_EVIDENCIA=:nivel WHERE
            ID_EVIDENCIA=:id)');
        $res->bindParam(':descripcion',$var->getDescripcion(),PDO::PARAM_STR);
        $res->bindParam(':nivel',$var->getNivelCompetencia(),PDO::PARAM_STR);
        $res->bindParam(':id',$var->getIdEspecificacion(),PDO::PARAM_STR);
        $res->execute();                     
    }

	public function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM especificacion WHERE ID_ESPECIFICACION=:idEspe');
        $res->bindParam(':idEspe',$var->getIdEspecificacion(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setIdEspecificacion($res2->ID_ESPECIFICACION);
        $var->setIdCompetencia($res2->ID_COMPETENCIA);
        $var->setDescripcion($res2->DESCRIPCION_EVIDENCIA);        
        $var->setNivelEvidencia($res2->NIVEL_EVIDENCIA);
	}
    
    public static function getAll(){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con -> prepare('SELECT * FROM especficacion');            
        $resultado -> execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    
    public static function getAllAsoc($idCompetencia){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con -> prepare('SELECT * FROM especficacion WHERE ID_COMPETENCIA=ID_ASIGNATURA AND ID_COMPETENCIA=:id');
        $resultado->getIdCompetencia($res2->ID_COMPETENCIA);             
        $resultado -> execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
}
?>