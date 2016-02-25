<?php
require_once('ICrud.php')

class DBCompetencia Implements ICrud{

	function GetIntance($competencia){
       /* $con = DBSingleton::getInstance()->getDB();
        $con -> prepare('SELECT * FROM profesor where EMAIL =:email and PASSWORD =:pass 
                        and TIPO_PROFESOR="profesor"');
        $res -> bindParam(':email',$profesor -> getCorreoElectronico(),PDO::PARAM_STR);
        $res -> bindParam(':pass',$profesor -> getPassword(),PDO::PARAM_STR);
        $res -> execute();
        //guardar respuesta en objeto php
        $res2 = $res -> fetchObject(__CLASS__);
        $profesor->setRut($res2->RUT);
        $profesor->setTipoProfesor($res2->TIPO_PROFESOR);
        $profesor->setCorreoElectronico($res2->EMAIL);
        //$profesor->setPassword($res2->PASSWORD); jamas guardar la pass en session!!
        $profesor->setFacultad($res2->FACULTAD);
        $profesor->setNombre($res2->NOMBRE);
        $profesor->setApaterno($res2->APATERNO);
        $profesor->setAmaterno($res2->AMATERNO);*/
	}

	function add($var){
        $con = DBSingleton::getInstance()->getDB();
        $con->prepare('INSERT INTO competencia VALUES (:id,:rut,:cate,:nombre,:desc)');
        $res->bindParam(':id',$var->getIdComp(),PDO::PARAM_STR);
        $res->bindParam(':rut',$var->getDirector()->getRut(),PDO::PARAM_STR)
        $res->bindParam(':cate',$var->getCate(),PDO::PARAM_STR)
        $res->bindParam(':nombre',$var->getNomComp(),PDO::PARAM_STR)
        $res->bindParam(':desc',$var->getDesComp(),PDO::PARAM_STR)
        $res->execute();
	}

	function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $con->prepare('UPDATE competencia SET CATEGORIA=:cate,NOMBRE_COMPETENCIA=:nombre,
                        DESCRIPCION_DE_COMPETENCIA=:desc WHERE ID_COMPETENCIA=:id');
        $res->bindParam(':id',$var->getIdComp(),PDO::PARAM_STR);        
        $res->bindParam(':cate',$var->getCate(),PDO::PARAM_STR)
        $res->bindParam(':nombre',$var->getNomComp(),PDO::PARAM_STR)
        $res->bindParam(':desc',$var->getDesComp(),PDO::PARAM_STR)
        $res->execute();
	}

	function delete($var){
        $con  DBSingleon::getInsance()->getDB();
        $con->prepare('DELETE * FROM competencia WHERE ID_COMPETENCIA=:id');
        $res->bindParam(':id',$var->getIdComp(),PDO::PARAM_STR);
        $res->execute();
	}
}
?>