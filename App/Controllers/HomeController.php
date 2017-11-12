<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
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
			$a = new UserModel();
			$a->create(['KullaniciAdi' => "Mustafa",'Eposta' => "mustafi", 'Parola' => md5("sa44das1")]);
		}

		

	}
?>