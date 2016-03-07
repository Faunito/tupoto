<?php

require_once(ROOT_DIR . VIEWS_DIR . 'Template.php');

class SecretariaController{
    
    private $secretaria;
    private $template;
    
    function __construct($secretaria, $template){
        $this->secretaria = $secretaria;
        $this->template = $template;
    }
    //========FUNCTIONS===========
    function ingresarPractica($alumno,$direccion,$estado,$fechaInicio,$fechaTermino,$intento,$nivelPractica,$horas){
        $this->secretaria->registrarPractica($alumno,$direccion,$estado,$fechaInicio,$fechaTermino,$fechaFin,$intento,$nivelPractica,$horas);
    }
    
}
?>