<?php

abstract class View{

	public abstract function output($usuario);
	public abstract function action($action);
	public abstract function result($result, $post);
}
