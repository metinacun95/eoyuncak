<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\SiteModel;
	use PHPMailer;
	class HomeController extends Controller{ // HomeController@index
		public $master;
		public function index(){
			$this->master = new MasterController;
			$this->master->head([
				"css" => ["https://fonts.googleapis.com/css?family=Open+Sans","reset.css","style.css"],
				"js" => ["jquery.js","js.js"],
				"title" => "E-Oyuncak - Anasayfa"
			]);
			$sm = new SiteModel;
			$this->master->end();
		}
	}
?>