<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\IOModel;
	use App\Models\CartModel;
	use PHPMailer;
	class HomeController extends Controller{ // HomeController@index
		
		public $master;
		public function index(){
			/*
			$this->master = new MasterController;
			$this->master->head([
				"css" => ["reset.css","style.css"],
				"js" => ["jquery.js","js.js"],
				"title" => "E-Oyuncak - Anasayfa"
			]);
			$this->master->end();*/

			$user = new UserModel();
			$IOModel = new IOModel();
			$CartModel = new CartModel();

			$CartModel->get(2);
			
			
		}
	}
?>