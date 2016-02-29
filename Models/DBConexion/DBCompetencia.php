<?php
require_once('ICrud.php');

class DBCompetencia Implements ICrud {

	function GetInstance($competencia){
       $con = DBSingleton::getInstance()->getDB();
       $res = $con -> prepare('SELECT * FROM competencia where ID_COMPETENCIA =:id');
        $res -> bindParam(':id',$competencia->getIdComp(),PDO::PARAM_STR);        
        $res -> execute();
        //guardar respuesta en objeto php
        $res2 = $res -> fetchObject(__CLASS__);
        $competencia->setIdComp($res2->ID_COMPETENCIA);
        $competencia->setCate($res2->CATEGORIA);
        $competencia->setDirector($res2->RUT);
        $competencia->setDesComp($res2->DESCRIPCION_DE_COMPETENCIA);
        $competencia->setNomComp($res2->NOMBRE_COMPETENCIA);
        $competencia->setTipoComp($res2->TIPO_COMPETENCIA);
	}
    //probar esta funcion con profesor y director
    public static function getAll(){
            $con = DBSingleton::getInstance()->getDB();
            $res = $con -> prepare('SELECT * FROM competencia');            
            $res -> execute();
            $res1 = $res->fetchAll();
            return $res1;
    }
    
    function getCompetencia($id){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('SELECT * FROM competencia WHERE ID_COMPETENCIA=:id');
        $dbh->bindParam(':id',$id,PDO::PARAM_STR);
        $dbh->execute();
        $res1 = $dbh -> fetch();
        return $res1;        
    }

	function add($var){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('INSERT INTO competencia (RUT, CATEGORIA, NOMBRE_COMPETENCIA, DESCRIPCION_DE_COMPETENCIA, TIPO_COMPETENCIA) VALUES (:rut,:cate,:nombre,:desc,:tipo)');
        $dbh->bindParam(':rut', $var->getDirector()->getRut(),PDO::PARAM_STR);
        $dbh->bindParam(':cate', $var->getCate(),PDO::PARAM_STR);
        $dbh->bindParam(':nombre', $var->getNomComp(),PDO::PARAM_STR);
        $dbh->bindParam(':desc', $var->getDesComp(),PDO::PARAM_STR);
        $dbh->bindParam(':tipo', $var->getTipoComp(),PDO::PARAM_STR);
        $dbh->execute();
	}

	function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('UPDATE competencia SET CATEGORIA = :cate, NOMBRE_COMPETENCIA = :nombre,
                        DESCRIPCION_DE_COMPETENCIA = :desc, TIPO_COMPETENCIA =:tipo WHERE ID_COMPETENCIA = :id');
        $dbh->bindParam(':id',$var->getIdComp(),PDO::PARAM_STR);        
        $dbh->bindParam(':cate',$var->getCate(),PDO::PARAM_STR);
        $dbh->bindParam(':nombre',$var->getNomComp(),PDO::PARAM_STR);
        $dbh->bindParam(':tipo',$var->getTipoComp(),PDO::PARAM_STR);
        $dbh->bindParam(':desc',$var->getDesComp(),PDO::PARAM_STR);
        $dbh->execute();
	}

	function delete($var){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('DELETE FROM competencia WHERE ID_COMPETENCIA = :id');
        $dbh->bindParam(':id',$var->getIdComp(),PDO::PARAM_STR);
        $dbh->execute();
	}
}
?>