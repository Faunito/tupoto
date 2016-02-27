<?php
	
	class ProfesorController{
		private $profesor;

		function __construct($profesor){
			$this->profesor = $profesor;
		}

	}


	//============ Serializacion ==========

    function serializar($controller){
        $str = serialize($controller);
        $_SESSION['usuario'] = $str; 
    }

?>