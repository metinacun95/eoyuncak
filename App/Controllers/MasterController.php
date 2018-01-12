<?php
	namespace App\Controllers;
	use App\Models\SiteModel;
	use App\Models\ProductModel;
	use App\Models\CartModel;
	use App\Models\IOModel;

	class MasterController extends Controller{
		public function head($settings = []){
			$data = [
				"link" => $this->link,
				"js" => [],
				"css" => [
					"bootstrap.min.css",
					"font-awesome.min.css",
					"prettyPhoto.css",
					"price-range.css",
					"animate.css",
					"main.css",
					"responsive.css",
				]
			];
			foreach($settings as $key => $value){
				$data[$key] = $value;
			}
			$c = new ProductModel;
			$io = new IOModel;
			$cart = new CartModel;
			$data["cats"] = $c->getCategories();
			$data["isLogin"] = $io->isLogin();
			$data["iletisim"] = $io->getIletisim();
			$data["cartCount"]=$cart->getCount($_SESSION["userId"]);
			$this->view("Master/Head",$data);
		}
		public function end(){
			$this->view("Master/End");
		}
	}
?>