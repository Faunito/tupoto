<?php  //namespace Models;

require_once ('Persona.php');

abstract class Funcionario extends Persona
{
	//private $cargo;
	private $correoElectronico;
	private $password;

	function getCorreoElectronico()
	{
		return $this->correoElectronico;
	}

	function getPassword()
	{
		return $this->password;
	}

	static function listarFuncionarios()
	{
	}

	function setCorreoElectronico($newVal)
	{
		$this->correoElectronico = $newVal;
	}

	function setPassword($newVal)
	{
		$this->password = $newVal;
	}

}
?>