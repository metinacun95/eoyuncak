<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\IOModel;
	use PHPMailer;
	class HomeController extends Controller{ // HomeController@index
		
		public $master;
		public function index(){
			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Anasayfa"
			]);
			$this->master->end();
			
		}
	}
?>