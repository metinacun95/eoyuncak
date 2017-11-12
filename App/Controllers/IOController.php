<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\SiteModel;
	use PHPMailer;
	class IOController extends Controller{ // HomeController@index
		public $master;
		public function index(){
			$this->master = new MasterController;
			$this->master->head([
				"css" => ["reset.css","style.css"],
				"js" => ["jquery.js","js.js"],
				"title" => "E-Oyuncak - Anasayfa"
			]);
			$this->master->end();
		}
		function login(){}
		function logout(){}
		function isLogin(){}
	}
?>