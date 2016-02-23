<?php //namespace Models;


/**
 * @author Freddy
 * @version 1.0
 * @created 19-Feb.-2016 19:48:56
 */
abstract class Persona
{

	private $apellidoMaterno;
    private $apellidoPaterno;
	private $nombre;
	private $rut;


	function getapellidoMaterno()
	{
		return $this->apellidoMaterno;
	}

	function getapellidoPaterno()
	{
		return $this->apellidoPaterno;
	}

	function getnombre()
	{
		return $this->nombre;
	}

	function getrut()
	{
		return $this->rut;
	}

	/**
	 * 
	 * @param newVal
	 */
	function setapellidoMaterno($newVal)
	{
		$this->apellidoMaterno = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	function setapellidoPaterno($newVal)
	{
		$this->apellidoPaterno = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	function setnombre($newVal)
	{
		$this->nombre = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	function setrut($newVal)
	{
		$this->rut = $newVal;
	}

}
?>