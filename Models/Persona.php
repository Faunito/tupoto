<?php //namespace Models;

abstract class Persona
{
	private $amaterno;
    private $apaterno;
	private $nombre;
	private $rut;

    //SETTERS
	function setAmaterno($newVal)
	{
		$this->amaterno = $newVal;
	}

	function setApaterno($newVal)
	{
		$this->apaterno = $newVal;
	}

	function setNombre($newVal)
	{
		$this->nombre = $newVal;
	}

	function setRut($newVal)
	{
		$this->rut = $newVal;
	}
    //GETTERS
	function getAmaterno()
	{
		return $this->amaterno;
	}

	function getApaterno()
	{
		return $this->apaterno;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getRut()
	{
		return $this->rut;
	}
}
?>