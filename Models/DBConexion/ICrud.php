<?php

interface ICrud
{
	public function GetInstance($var);

	public function add($var);

	public function modify($var);

	public function delete($var);
}


?>