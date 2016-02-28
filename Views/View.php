<?php

abstract class View{

	public abstract function output($usuario);
	public abstract function action($action, $controller);
	public abstract function result($controller, $result, $post);
}
