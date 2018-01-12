<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\IOModel;
	use App\Models\OrderModel;
	use GUMP;
	use PHPMailer;
	class UserController extends Controller{ // HomeController@index
		
		public $master;
		public function index(){
			/*
			$this->master = new MasterController;
			$this->master->head([
				"css" => ["reset.css","style.css"],
				"js" => ["jquery.js","js.js"],
				"title" => "E-Oyuncak - Anasayfa"
			]);
			$this->master->end();*/
			//$a->update();
			
		}

		function signUp(){

			if($_POST){

				$userModel = new UserModel;
				$validator = GUMP::is_valid($_POST, [
					"Ad" => "required|max_len,100",
					"Soyad" => "required|max_len,100",
					"KullaniciAdi" => "required|alpha_numeric",
					"Eposta" => "required|valid_email",
					"Parola" => "required|max_len,100|min_len,6"
				]);

				if($validator === true){

					$data = [];
					$data["Ad"] = $this->request->Ad;
					$data["Soyad"] = $this->request->Soyad;
					$data["KullaniciAdi"] = $this->request->KullaniciAdi;
					$data["Eposta"] = $this->request->Eposta;
					$data["Parola"] = $this->request->Parola;
					$userModel->create($data);
					$this->redirect('');

				}else{

					$_SESSION['FLASH_SIGNUP'] = $validator;
					$this->redirect('login.html');
				}
			}

			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Anasayfa"
			]);
			$this->view("SignUp");
			$this->master->end();
		}

		function update(){
			if($_POST){
				$userModel = new UserModel;
				if(!empty($_POST["yeniparola"]) && $userModel->get($_SESSION["userId"])->Parola==md5($_POST["mevcutparola"])){

					$validator = GUMP::is_valid($_POST, [
						"Ad" => "required|max_len,100",
						"Soyad" => "required|max_len,100",
						"Eposta" => "required|valid_email",
						"yeniparola" => "required|max_len,100|min_len,6",
						"Adres"	=> "max_len,255"
					]);

					if($validator === true){
						echo "www";
						$data = [];
						$data["Ad"] = $this->request->Ad;
						$data["Soyad"] = $this->request->Soyad;
						$data["Eposta"] = $this->request->Eposta;
						$data["Parola"] = $this->request->yeniparola;
						$data["Adres"] = $this->request->Adres;
						$userModel->update($data,$_SESSION["userId"]);
						
						$this->redirect('profile.html');

					}else{

						$_SESSION['FLASH_SIGNUP'] = $validator;
						exit;
						$this->redirect('profile.html');
					}
				}else{
					$validator = GUMP::is_valid($_POST, [
						"Ad" => "required|max_len,100",
						"Soyad" => "required|max_len,100",
						"Eposta" => "required|valid_email",
						"Adres"	=> "max_len,255"
					]);
					if($validator === true){
						$data = [];
						$data["Ad"] = $this->request->Ad;
						$data["Soyad"] = $this->request->Soyad;
						$data["Eposta"] = $this->request->Eposta;
						$data["Adres"] = $this->request->Adres;
						$userModel->update($data,$_SESSION["userId"]);
						
						$this->redirect('profile.html');

					}else{

						$_SESSION['FLASH_SIGNUP'] = $validator;
						exit;
						$this->redirect('profile.html');
					}
				}
			}



		}

		function profile(){
			
			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Profile"
			]);
			
			$io=new IOModel;
			if($io->isLogin()){
				$u = new UserModel;
				$data=[];
				$data["user"] = $u->get($_SESSION['userId']);
				$this->view("Profile",$data); 
			}
			else{
				$this->redirect("login.html");
			}

			
			$this->master->end();
			
		}
		function pay(){
			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Ödeme Sayfası"
			]);
			$o = new OrderModel;
			$o->addFromCarts($_SESSION["userId"]);
			$this->view("Pay");
			$this->master->end();
		}
	}
?>