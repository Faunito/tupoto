<?php  //namespace Models;
require_once ('Persona.php');

/**
 * @author Freddy
 * @version 1.0
 * @created 19-Feb.-2016 19:48:56
 */
abstract class Funcionario extends Persona
{

	var $cargo;
	var $correoElectronico;
	var $password;

	function getcorreoElectronico()
	{
		return $this->correoElectronico;
	}

	function getpassword()
	{
		return $this->password;
	}

	static function listarFuncionarios()
	{
	}

	/**
	 * 
	 * @param newVal
	 */
	function setcorreoElectronico($newVal)
	{
		$this->correoElectronico = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	function setpassword($newVal)
	{
		$this->password = $newVal;
	}

}
?>