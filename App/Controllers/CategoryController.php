<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\ProductModel;
	use PHPMailer;
	class CategoryController extends Controller{ // HomeController@index
		
		public $master;
		public function index(){
			
		}
		function before(){
			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Anasayfa"
			]);
		}


		function category(){
			$sef = $this->params["categorySef"];
			$p=new ProductModel;
			$data["p"] = $p;
			$data["sef"] = $sef;
			$data["link"] = $this->link;
			$data["mostPays"] = $p->mostPays();
			$data["products"] = $p->getAll();
			$data["getCategories"] = $p->getCategories(0);
			$this->view("KategoriUrun",$data);
		}

		function after(){
			$this->master->end();
		}
	}
?>