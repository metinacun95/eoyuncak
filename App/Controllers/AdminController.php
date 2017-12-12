<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\IOModel;
	use App\Models\OrderModel;
	use App\Models\ProductModel;
	use GUMP;
	use PHPMailer;
	class AdminController extends Controller{ // HomeController@index
		public $master;
		public function __construct(){
			parent::__construct();
			$this->master = new AdminMasterController();
		}
		public function index(){
			$this->master->head(["title" => "Admin Anasayfa"]);
		}
		public function category(){
			$this->master->head(["title" => "Admin-Kategoriler"]);
			$p = new ProductModel;
			$categories = $p->getCategories();
			return $this->view("Admin/Categories", ["categories"  => $categories, "link" => $this->link, "p" => $p]);
		}

		public function createCategory(){}
		public function updateCategory(){}

		public function deleteCategory(){
			$p = new ProductModel;
			$p->deleteCategory(intval($this->params["id"]));
			$this->redirect("admin/category.html");
		}
		public function product(){
			$this->master->head(["title" => "Admin-Ürünler"]);
			$p = new ProductModel;
			$products = $p->getAll();
			return $this->view("Admin/Products", ["products"  => $products, "link" => $this->link, "p" => $p]);
		}
		public function createProduct(){
			$this->master->head(["title" => "Admin-Yeni Ürün Ekle"]);
			$p = new ProductModel;
			$products = $p->getAll();
			return $this->view("Admin/NewProduct", ["link" => $this->link]);
		}
		public function updateProduct(){}

		public function deleteProduct(){
			$p = new ProductModel;
			$p->delete(intval($this->params["id"]), $_SESSION["userId"]);
			$this->redirect("admin/product.html");
		}
		public function user(){
			$this->master->head(["title" => "Admin-Üyeler"]);
			$u = new UserModel;
			$users = $u->getAll();
			return $this->view("Admin/Users", ["users"  => $users, "link" => $this->link, "u" => $u]);
		}
		public function createUser(){}
		public function updateUser(){}

		public function deleteUser(){
			$u = new UserModel;
			$u->destroy(intval($this->params["id"]));
			$this->redirect("admin/user.html");
		}
		public function order(){
			$this->master->head(["title" => "Admin-Siparişler"]);
			$o = new OrderModel;
			$orders = $o->getAll();
			return $this->view("Admin/Orders", ["orders"  => $users, "link" => $this->link, "o" => $o]);
		}
		public function createOrder(){}
		public function updateOrder(){}

		public function deleteOrder(){
			$o = new OrderModel;
			$o->destroy(intval($this->params["id"]));
			$this->redirect("admin/order.html");
		}
		function login(){
			if($_POST){
				$IOModel = new IOModel;
				$validator = GUMP::is_valid($_POST,[
					"username" => "required",
					"password" => "required"
				]);

				if($validator === true){
					$IOModel->adminLogin($this->request->username, $this->request->password);
					if($this->isLogin()){
						$this->redirect('admin');
					}
				}else{
					$_SESSION["FLASH_LOGIN"] = $validator;
					$this->redirect("admin/login.html");
				}
			}
			$this->view("Admin/Login",["link" => $this->link]);
		}
		function logout(){
			if(isset($_SESSION["userId"],$_SESSION["rolId"],$_SESSION["userName"],$_SESSION["md5"])){
				unset($_SESSION["userId"]);
				unset($_SESSION["rolId"]);
				unset($_SESSION["userName"]);
				unset($_SESSION["md5"]);
			}
			$this->redirect($this->link."admin/login.html");
		}
		function isLogin(){
			if(isset($_SESSION["adminLogin"])){
				return true;
			}
			return false;
		}
	}
?>