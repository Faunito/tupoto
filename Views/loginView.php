<?php 
	require_once('View.php');

	class LoginView{    

	    public function __construct() {
	    }	    

	    public function output() {
	        include(ROOT_DIR . TEMPLATES_DIR . 'login_template.php');
	    }

	}
?>