<?php
require_once('ICrud.php');

class DBCompetencia Implements ICrud {

	function GetInstance($competencia){
       $con = DBSingleton::getInstance()->getDB();
       $res = $con -> prepare('SELECT * FROM profesor where ID_COMPETENCIA =:id');
        $res -> bindParam(':id',$competencia->getIdComp(),PDO::PARAM_STR);        
        $res -> execute();
        //guardar respuesta en objeto php
        $res2 = $res -> fetchObject(__CLASS__);
        $competencia->setIdComp($res2->ID_COMPETENCIA);
        $competencia->setCate($res2->CATEGORIA);
        $competencia->setDirector($res2->RUT);
        $competencia->setDesComp($res2->DESCRIPCION_DE_COMPETENCIA);
        $competencia->setNomComp($res2->NOMBRE_COMPETENCIA);
	}
    //probar esta funcion con profesor y director
    public static function getAll($var){
        $tipo = $var->getDirector()->getTipoProfesor();
        if($tipo=='profesor'){
            $con = DBSingleton::getInstance()->getDB();
            $res = $con -> prepare('SELECT * FROM competencia WHERE RUT=:rut');
            $res->setDirector(':rut',$tipo,PDO::PARAM_STR);
            $res -> execute();
            $res1 = $res->fetchAll();
            return $res1;
        }
        elseif ($tipo=='director') {
            $con = DBSingleton::getInstance()->getDB();
            $res = $con -> prepare('SELECT * FROM competencia');            
            $res -> execute();
            $res1 = $res->fetchAll();
            return $res1;
        }
    }
    
    function getCompetencia($var){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('SELECT * FROM competencia WHERE ID_COMPETENCIA=:id');
        $dbh->bindParam(':id', $var->getDirector()->getRut(),PDO::PARAM_STR);
        $dbh->execute();
        return $res1;        
    }

	function add($var){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('INSERT INTO competencia (RUT, CATEGORIA, NOMBRE_COMPETENCIA, DESCRIPCION_DE_COMPETENCIA) VALUES (:rut,:cate,:nombre,:desc)');
        $dbh->bindParam(':rut', $var->getDirector()->getRut(),PDO::PARAM_STR);
        $dbh->bindParam(':cate', $var->getCate(),PDO::PARAM_STR);
        $dbh->bindParam(':nombre', $var->getNomComp(),PDO::PARAM_STR);
        $dbh->bindParam(':desc', $var->getDesComp(),PDO::PARAM_STR);
        $dbh->execute();
	}

	function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('UPDATE competencia SET CATEGORIA = :cate, NOMBRE_COMPETENCIA = :nombre,
                        DESCRIPCION_DE_COMPETENCIA = :desc WHERE ID_COMPETENCIA = :id');
        $dbh->bindParam(':id',$var->getIdComp(),PDO::PARAM_STR);        
        $dbh->bindParam(':cate',$var->getCate(),PDO::PARAM_STR);
        $dbh->bindParam(':nombre',$var->getNomComp(),PDO::PARAM_STR);
        $dbh->bindParam(':desc',$var->getDesComp(),PDO::PARAM_STR);
        $dbh->execute();
	}

	function delete($var){
        $con = DBSingleon::getInsance()->getDB();
        $con->prepare('DELETE FROM competencia WHERE ID_COMPETENCIA = :id');
        $con->bindParam(':id',$var->getIdComp(),PDO::PARAM_STR);
        $con->execute();
	}
}
?>