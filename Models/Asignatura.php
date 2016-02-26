<?php
require_once ('DBConexion/DBAsignatura.php');
require_once('Director.php');
require_once ('Competencia.php');

class Asignatura
{

	private $id;		//id autoincrement
	private $codigo;	//codigo asignatura: ICC31
	private $nombre;
	private $nivel;
	private $malla;
    private $director;
	private $dbasig;

	function __construct(){
		$this->dbasig = new DBAsignatura();
	}

	//============ Funciones ================

	static function listaAsignaturas(){

	}

	public static function getAsignaturas(){
		return DBAsignatura::getAll();
	}

	public static function getAsignatura($codigo){
        return DBAsignatura::getAsignatura($codigo);
    }

	//============ Getters ================

	function getId(){
		return $this->id;
	}

	function getCodigo(){
		return $this->codigo;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getNivel(){
		return $this->nivel;
	}

	function getMalla(){
		return $this->malla;
	}

	function getDirector(){
        return $this->director;
    }

    function getDBAsignatura(){
		return $this->dbasig;
	}

	//============ Setters ================

	function setId($id){
		$this->id = $id;
	}

	function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setNivel($nivel){
		$this->nivel = $nivel;
	}

	function setMalla($malla){
		$this->malla = $malla;
	}

	function setDirector($director){
		$this->director = $director;
	}

}
?>