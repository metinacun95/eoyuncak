<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\CartModel;
	use App\Models\ProductModel;
	use App\Models\IOModel;
	use PHPMailer;
	class CartController extends Controller{ // HomeController@index
		
		public $master;

		function before(){
			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Anasayfa"
			]);
		}

		public function index(){
			$cart=new CartModel;
			$p=new ProductModel;
			$data=[];
			$data["link"] = $this->link;
			$data["carts"]=$cart->get($_SESSION["userId"]);
			$data["p"]=$p;

			$this->view("Cart",$data);
			
		}

		function after(){
			$this->master->end();
		}

		function addCart(){
			$c=new CartModel;
			$data=[];
			$data["UyeId"]=$_SESSION["userId"];
			$data["KacTane"] = $_POST["adet"];
			$data["UrunId"] = $_POST["urunId"];
			$data["OdenecekTutar"] = $_POST["tutar"];
			$data["Alinma"] = 0;
			$c->create($data);
			$this->redirect("");
		}


		function delete(){
			$c=new CartModel;
			$id = intval($this->params["id"]);
			$c->destroy($id);
			$this->redirect("cart.html");
		}


	}
?>