<?php
	require_once ('DBConexion/DBEspecificacion.php');

class Especificacion{

	private $idAsignatura;
    private $idCompetencia;
	private $nivelCompetencia;
    private $dbespecificacion;


	function __construct(){
        $this->dbespecificacion = new DBEspecificacion(); 
	}

	public static function getAsignaturasCompetencia($id){
		return DBEspecificacion::getAsignaturasCompetencia($id);
	}
	public static function getEspecificacionesAsignatura($id){
		return DBEspecificacion::getEspecificacionesAsignatura($id);
	}

    //GETTERS 
    function getIdCompetencia(){
        return $this->idCompetencia;
    } 

	function getIdAsignatura()
	{
		return $this->idAsignatura;
	}

	function getNivelCompetencia()
	{
		return $this->nivelCompetencia;
	}
    
    function getDBEspecificacion(){
        return $this->dbespecificacion;
    }
    //SETTERS    
	function setIdAsignatura($idAsignatura)
	{
		$this->idAsignatura = $idAsignatura;
	}
    
	function setNivelCompetencia($nivelCompetencia)
	{
		$this->nivelCompetencia = $nivelCompetencia;
	}
    
    function setIdCompetencia($idCompetencia){
        $this->idCompetencia = $idCompetencia;
    }


}
?>