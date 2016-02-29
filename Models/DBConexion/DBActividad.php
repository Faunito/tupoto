<?php

require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Practica.php');

class DBProfesor implements ICrud {
    
    public function add($var){
        $con = DBSingleton::getInstance()->getDB();       
        $res = $con->prepare('INSERT INTO actividad(ID_COMPETENCIA,RUT,
            DESCRIPCION_ACTIVIDAD) VALUES (:idCompetencia,:rut,:descripcion)');
        $res->bindParam(':rut',$var->getAlumnoRut(),PDO::PARAM_STR);
        $res->bindParam(':idCompetencia',$var->getIdActividad(),PDO::PARAM_STR);
        $res->bindParam(':descripcion',$var->getDesAct(),PDO::PARAM_STR);
        $res->execute();       
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();
        //ejecutar query        
        $res = $con->prepare('DELETE FROM actividad where ID_ACTIVIDAD =:idActividad AND ID_COMPETENCA=:idCompetencia)');
        $res->bindParam(':idActividad',$var->getIdActividad(),PDO::PARAM_STR);
        $res->bindParam(':idCompetencia',$var->getIdCompeencia(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('UPDATE actividad SET DESCRIPCION_ACTIVIDAD=:descActividad WHERE
            ID_ACTIVIDAD=:idActividad AND ID_COMPETENCA=:idCompetencia)');
        $res->bindParam(':descActividad',$var->getDesAct(),PDO::PARAM_STR);
        $res->bindParam(':idActividad',$var->getIdActividad(),PDO::PARAM_STR);
        $res->bindParam(':idCompetencia',$var->getIdComp(),PDO::PARAM_STR);
        $res->execute();                     
    }

	public function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM actividad where ID_ACTIVIDAD=:idActividad AND ID_COMPETENCA=:idCompetencia');
        $res->bindParam(':idActividad',$var->getIdActividad(),PDO::PARAM_STR);
        $res->bindParam(':idCompetencia',$var->getIdComp(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setIdComp($res2->ID_COMPETENCIA);
        $var->setDesAct($res2->DESCRIPCION_ACTIVIDAD);
        $var->setAlumnoRut($res2->RUT);        
        $var->setIdActividad($res2->ID_ACTIVIDAD);
	}
    
}
?>