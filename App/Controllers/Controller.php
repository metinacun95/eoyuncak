<?php
	namespace App\Controllers;
	use System\Libraries\Config;
	use System\Libraries\Model;
	use System\Libraries\Request;
	class Controller{
		public $db;
		public $config;
		public $params;
		public $request;
		public function __construct(){
			$this->config = new Config();
			$databaseConfig = $this->config->get("Database");
			$_SESSION["lang"] = "Tr";
			$this->request = new Request;
			$this->link = $this->config->get("Site","link");
			
		}
		public function before(){}
		public function after(){}
		public function index(){
			echo "create 'index' method in your controller";
		}
		public function view($viewFile = "",$data = []){
			if(file_exists(PATH."/App/Views/".$viewFile."View.php")){
				extract($data);
				include PATH."/App/Views/".$viewFile."View.php";
			}
		}
		function redirect($route = ""){
			header("Location:".$this->link.$route);
		}
	}
?>