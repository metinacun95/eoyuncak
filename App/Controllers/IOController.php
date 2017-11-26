<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\IOModel;
	use GUMP;
	class IOController extends Controller{ // HomeController@index
		public $master;
		function __construct(){
			parent::__construct();
			$this->master = new MasterController;
		}
		public function index(){
			$this->master->head([
				"title" => "E-Oyuncak - Anasayfa"
			]);
			$this->master->end();
		}
		function login(){
			#$u = new UserModel;
			//$u->create(["KullaniciAdi" => "mustafa220","Parola" => "mustafa","Eposta" => "mustafacolakoglu94@gmail.com"]);
			if($_POST){

				$IOModel = new IOModel;
				$validator = GUMP::is_valid($_POST,[
					"username" => "required",
					"password" => "required"
				]);

				if($validator === true){
					$IOModel->login($this->request->username, $this->request->password);
					if($IOModel->isLogin()){
						$this->redirect('');
					}
				}else{
					$_SESSION["FLASH_LOGIN"] = $validator;
					$this->redirect("login.html");
				}
				
			}
			$this->master->head([
				"title" => "E-Oyuncak - Giriş Yap"
			]);
			$this->view("Login",["link" => $this->link]);
			$this->master->end();
		}

		function logout(){
			$io = new IOModel;
			$io->logout();
			$this->redirect("");
		}
	}
?>