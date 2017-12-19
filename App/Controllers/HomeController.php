<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\ProductModel;
	use PHPMailer;
	class HomeController extends Controller{ // HomeController@index
		
		public $master;
		function before(){
			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Anasayfa"
			]);
		}
		public function index(){
			$p = new ProductModel;
			$data["link"] = $this->link;
			$data["mostPays"] = $p->mostPays();
			$this->view("Home",$data);
		}
		function after(){
			$this->master->end();
		}
	}
?>