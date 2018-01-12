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
			if($sef == sefLink($sef)){
				$p=new ProductModel;
				$category = $p->getCategoryFromSefLink($sef);
				if(count($category) > 0){
					$data["p"] = $p;
					$data["sef"] = $sef;
					$data["link"] = $this->link;
					$data["mostPays"] = $p->mostPays();
					$data["products"] = $p->getFromCategory($category->KategoriId);
					$data["getCategories"] = $p->getCategories($category->KategoriId);
					$this->view("KategoriUrun",$data);
				}
				else{
					$this->redirect("");
				}
			}
			else{
				$this->redirect("");
			}
		}

		function after(){
			$this->master->end();
		}
	}
?>