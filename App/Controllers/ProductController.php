<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\IOModel;
	use App\Models\ProductModel;
	use PHPMailer;
	class ProductController extends Controller{ // HomeController@index
		
		public $master;
		function before(){
			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Anasayfa"
			]);
		}
		public function index(){
		
		}
		function after(){
			$this->master->end();
		}
		public function product(){
			$id = intval($this->params["productSef"]);
			$p=new ProductModel;
			$data["link"] = $this->link;
			$data["getCategories"] = $p->getCategories(0);
			$data["product"] = $p->get($id);
			$this->view("Product",$data);
		}
	}
?>