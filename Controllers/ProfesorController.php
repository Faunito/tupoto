<?php
	
	class ProfesorController{
		private $profesor;
    	private $template;

		function __construct($profesor, $template){
			$this->profesor = $profesor;
			$this->template = $template;
		}

	}


	//============ Serializacion ==========

    function serializar($controller){
        $str = serialize($controller);
        $_SESSION['usuario'] = $str; 
    }

?>