<?php
require_once('ICrud.php');

class DBCompetencia Implements ICrud {

	function GetInstance($competencia){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('SELECT * FROM competencia where ID_COMPETENCIA =:id');
        $res->bindParam(':id', $competencia->getIdComp(), PDO::PARAM_STR);        
        $res->execute();
        //guardar respuesta en objeto php
        $res2 = $res -> fetchObject(__CLASS__);
        $competencia->setIdComp($res2->ID_COMPETENCIA);
        $competencia->setCate($res2->CATEGORIA);
        $competencia->setDirector($res2->RUT);
        $competencia->setDesComp($res2->DESCRIPCION_DE_COMPETENCIA);
        $competencia->setNomComp($res2->NOMBRE_COMPETENCIA);
        return $competencia;
	}
    
    //probar esta funcion con profesor y director
    public static function getAll(){
            $con = DBSingleton::getInstance()->getDB();
            $res = $con -> prepare('SELECT * FROM competencia');            
            $res -> execute();
            $res1 = $res->fetchAll();
            return $res1;
    }

    public static function getCompetenciasMalla($id){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('  SELECT A.*, B.ID_COMPETENCIA, B.ID_MALLA
                                FROM competencia A
                                INNER JOIN puede_impartir B
                                ON A.ID_COMPETENCIA=B.ID_COMPETENCIA AND B.ID_MALLA =:id ORDER BY A.CATEGORIA ASC');
        $dbh->bindParam(':id',$id,PDO::PARAM_STR);
        $dbh->execute();
        $res1 = $dbh -> fetchAll();
        return $res1;        
    }

    public static function getCompetenciasNoMalla($id){
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('SELECT c.* FROM competencia c
                            WHERE c.ID_COMPETENCIA NOT IN

                            (SELECT A.ID_COMPETENCIA
                            FROM competencia A
                            INNER JOIN puede_impartir B
                            ON A.ID_COMPETENCIA=B.ID_COMPETENCIA) 

                            OR (c.CATEGORIA = "Generica" AND c.ID_COMPETENCIA NOT IN (SELECT A.ID_COMPETENCIA
                                        FROM competencia A
                                        INNER JOIN puede_impartir B
                                        ON A.ID_COMPETENCIA=B.ID_COMPETENCIA AND B.ID_MALLA =:id)) ORDER BY c.CATEGORIA ASC;');
        $dbh->bindParam(':id',$id,PDO::PARAM_STR);
        $dbh->execute();
        $res1 = $dbh -> fetchAll();
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
        $dbh = $con->prepare('INSERT INTO competencia (RUT, CATEGORIA, NOMBRE_COMPETENCIA, DESCRIPCION_DE_COMPETENCIA) VALUES (:rut,:cate,:nombre,:desc)');
        $dbh->bindParam(':rut', $var->getDirector()->getRut(),PDO::PARAM_STR);
        $dbh->bindParam(':cate', $var->getCate(),PDO::PARAM_STR);
        $dbh->bindParam(':nombre', $var->getNomComp(),PDO::PARAM_STR);
        $dbh->bindParam(':desc', $var->getDesComp(),PDO::PARAM_STR);
        $dbh->execute();
        $idevidencia = $con->lastInsertId();
        return $idevidencia;
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
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('DELETE FROM competencia WHERE ID_COMPETENCIA = :id');
        $dbh->bindParam(':id',$var->getIdComp(),PDO::PARAM_STR);
        $dbh->execute();
	}
}
?>