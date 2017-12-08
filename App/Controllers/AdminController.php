<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\IOModel;
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
		public function category(){}
		public function createCategory(){}
		public function updateCategory(){}
		public function deleteCategory(){}
		public function product(){}
		public function createProduct(){}
		public function updateProduct(){}
		public function deleteProduct(){}
		public function user(){}
		public function createUser(){}
		public function updateUser(){}
		public function deleteUser(){}
		public function order(){}
		public function createOrder(){}
		public function updateOrder(){}
		public function deleteOrder(){}
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
		function logout(){}
		function isLogin(){
			if(isset($_SESSION["adminLogin"])){
				return true;
			}
			return false;
		}
	}
?>