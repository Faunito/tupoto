<?php
require_once('ICrud.php');

class DBAsignatura Implements ICrud {

	function GetInstance($asignatura){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con->prepare('SELECT * FROM asignatura where ID_ASIGNATURA =:id');
        $resultado->bindParam(':id', $asignatura->getId() ,PDO::PARAM_STR);        
        $resultado->execute();
        $objeto = $resultado->fetchObject(__CLASS__);
        //puede que falten datos
        $asignatura->setCodigo($objeto->CODIGO_ASIGNATURA);
        $asignatura->setNombre($objeto->NOMBRE_ASIGNATURA);
        $asignatura->setNivel($objeto->NIVEL_ASIGNATURA);
        return $asignatura;
	}
    

    public static function getAll(){
        $con = DBSingleton::getInstance()->getDB();
        $resultado = $con -> prepare('SELECT * FROM asignatura  ORDER BY ID_MALLA DESC, NIVEL_ASIGNATURA ASC');            
        $resultado -> execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    function getAsignaturasProfesor($profesor){
        $con = DBSingleton::getInstance()->getDB();
        $res = $con -> prepare('SELECT asignatura.* FROM asignatura,profesor,dicta WHERE profesor.RUT=dicta.RUT AND dicta.ID_ASIGNATURA=asignatura.ID_ASIGNATURA AND profesor.RUT=:rut');
        $res -> bindParam(':rut',$profesor->getRut(),PDO::PARAM_STR);
        $res -> execute();        
        $res1 = $res->fetchAll();
        return $res1;  
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
        $dbh = $con->prepare('SELECT * FROM asignatura WHERE ID_MALLA = :id ORDER BY NIVEL_ASIGNATURA');
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
    }

    public static function quitarIdMalla($idmalla)
    {
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('  SELECT ID_ASIGNATURA 
                                FROM asignatura 
                                WHERE ID_MALLA = :idmalla');

        $dbh->bindParam(':idmalla', $idmalla,PDO::PARAM_STR);
        $dbh->execute();
        $asignaturas = $dbh->fetchAll(PDO::FETCH_COLUMN);
        if(!empty($asignaturas)){
            $cantidad = str_repeat("?,", count($asignaturas)-1) . "?";
            $dbh = $con->prepare('  UPDATE asignatura
                                    SET ID_MALLA = NULL
                                    WHERE ID_ASIGNATURA IN ('.$cantidad.')');
            $i = 1;
            foreach ($asignaturas as $asig) {
                $dbh->bindParam($i, intval($asig), PDO::PARAM_STR);
                $i++;
            }
            $dbh->execute();
        }

    }

    public static function borraAsignaturasCompetencia($mallas, $competencia){
        $array=array();
        $i=0;
        $con = DBSingleton::getInstance()->getDB();
        foreach ($mallas as $malla) {
            $array[$i]=$malla->getIdMalla();
            $i++;
        }
        $cantidad = str_repeat("?,", count($array)-1) . "?";
        $dbh = $con->prepare('  DELETE FROM especificacion_de_evidencia 
                                WHERE ID_COMPETENCIA = ? 
                                AND ID_ASIGNATURA IN (SELECT A.ID_ASIGNATURA 
                                                        FROM asignatura A 
                                                        WHERE A.ID_MALLA IN('.$cantidad.') )');

        $dbh->bindParam(1, intval($competencia->getIdComp()), PDO::PARAM_STR);
        $i = 2;
        foreach ($array as $id) {
            $dbh->bindParam($i, intval($id), PDO::PARAM_STR);
            $i++;
        }
        $dbh->execute();
    }

    public static function getAsignaturasNoRepetidas($mallas){
        $array=array();
        $i=0;
        $con = DBSingleton::getInstance()->getDB();
        foreach ($mallas as $malla) {
            $array[$i]=$malla->getIdMalla();
            $i++;
        }
        $cantidad = str_repeat("?,", count($array)-1) . "?";
        $dbh = $con->prepare(' SELECT DISTINCT A.*,E.ID_COMPETENCIA, E.NIVELES_COMPETENCIA FROM asignatura A 
                                LEFT JOIN especificacion_de_evidencia E 
                                ON A.ID_ASIGNATURA = E.ID_ASIGNATURA 
                                WHERE A.ID_MALLA IN ('.$cantidad.') ORDER BY E.ID_COMPETENCIA DESC');

        $i = 1;
        foreach ($array as $id) {
            $dbh->bindParam($i, intval($id), PDO::PARAM_STR);
            $i++;
        }
        $dbh->execute();
        $asignaturas = $dbh->fetchAll();
        return $asignaturas; 
    }

    public static function getAsignaturasGrafico($malla, $competencia){
        $array=array();
        $i=0;
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('  SELECT A.*, E.NIVELES_COMPETENCIA FROM asignatura A
                                INNER JOIN especificacion_de_evidencia E 
                                ON A.ID_ASIGNATURA = E.ID_ASIGNATURA 
                                AND E.ID_COMPETENCIA = :competencia AND E.NIVELES_COMPETENCIA IS NOT NULL
                                INNER JOIN malla_curricular M 
                                ON A.ID_MALLA = M.ID_MALLA AND M.ID_MALLA = :malla');
        $dbh->bindParam(':competencia', $competencia->getIdComp(), PDO::PARAM_STR);
        $dbh->bindParam(':malla', $malla->getIdMalla(), PDO::PARAM_STR);
        $dbh->execute();
        $grafico = $dbh->fetchAll();
        return $grafico;
    }

    public static function getAsignaturasResumen($malla){
        $array=array();
        $con = DBSingleton::getInstance()->getDB();
        $dbh = $con->prepare('  SELECT A.ID_ASIGNATURA, A.CODIGO_ASIGNATURA, A.NOMBRE_ASIGNATURA, A.NIVEL_ASIGNATURA, E.NIVELES_COMPETENCIA, C.ID_COMPETENCIA, C.NOMBRE_COMPETENCIA, C.CATEGORIA, C.DESCRIPCION_DE_COMPETENCIA
                    FROM asignatura A
                    LEFT JOIN especificacion_de_evidencia E ON E.ID_ASIGNATURA = A.ID_ASIGNATURA
                    LEFT JOIN competencia C ON C.ID_COMPETENCIA = E.ID_COMPETENCIA
                    WHERE A.ID_MALLA =:malla');
        $dbh->bindParam(':malla', $malla, PDO::PARAM_STR);
        $dbh->execute();
        $asignaturas = $dbh->fetchAll();
        return $asignaturas;
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