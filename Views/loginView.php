<?php 
	require_once('View.php');

	class LoginView extends View {    

	    public function __construct() {
	    }	    

	    public function output() {
	        include(ROOT_DIR . TEMPLATES_DIR . 'login_template.php');
	    }

	    public function action($action, $controller){}
		public function result($controller, $result, $post){}

	}
?>