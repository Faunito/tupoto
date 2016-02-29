<?php 

	class Template {

		private $data;

		function construct(){}

		public function load($url){
			include($url);
		}

		public function redirect($url){
			header("Location: $url");
		}

		public function setData($name, $value){
			$this->data[$name] = $value;
		}

		public function getData($name){
			if(isset($this->data[$name])){
				return $this->data[$name];
			}else{
				return '';
			}
		}

	}



 ?>