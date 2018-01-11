<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\ProductModel;
	use App\Models\IOModel;
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
			$data["p"] = $p;
			$data["link"] = $this->link;
			$data["mostPays"] = $p->mostPays();
			$data["products"] = $p->getAll();
			$data["getCategories"] = $p->getCategories(0);
			$this->view("Home",$data);
		}
		function after(){
			$this->master->end();
		}

		public function about(){
			$io=new IOModel;
			$data=[];
			$data["hakkimizda"] = $io->getHakkimizda();
			$this->view("Hakkimizda",$data); 
		}
		public function iletisim(){
			$io=new IOModel;
			$data=[];
			$data["hakkimizda"] = $io->getHakkimizda();
			$data["iletisim"] = $io->getIletisim();
			$this->view("Iletisim",$data); 
		}
	}
?>