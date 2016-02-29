<?php
require_once ('ICrud.php');
require_once(ROOT_DIR . MODELS_DIR . 'Unidades.php');

class DBUnidades implements ICrud{

    public function add($var){
        $con = DBSingleton::getInstance()->getDB();       
        $res = $con->prepare('INSERT INTO unidades(TITULO_UNIDAD) VALUES(:tituloUnidad)');
        $res->execute();       
    }
    
    public function delete($var){
        $con = DBSingleton::getInstance()->getDB();      
        $res = $con->prepare('DELETE * FROM unidades WHERE ID_UNIDAD=:idUnidad)');
        $res->bindParam(':idUnidad',$var->getIdUnidad(),PDO::PARAM_STR);
        $res->execute();
    }
    
    public function modify($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con->prepare('UPDATE unidad SET TITULO_UNIDAD=:tituloUnidad WHERE
            ID_UNIDAD=:idUnidad)');
        $res->bindParam(':tituloUnidad',$var->getTituloUnidad(),PDO::PARAM_STR);
        $res->bindParam(':idUnidad',$var->getIdUnidad(),PDO::PARAM_STR);
        $res->execute();                     
    }

	public function GetInstance($var){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT * FROM unidades where ID_UNIDAD=:idUnidad');
        $res->bindParam(':idUnidad',$var->getIdUnidad(),PDO::PARAM_STR);
        $res -> execute();
        $res2 = $res -> fetchObject(__CLASS__);
        $var->setIdUnidad($res2->ID_UNIDAD);
        $var->setTituloUnidad($res2->TITULO_UNIDAD);
	}    
}
?>