<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\IOModel;
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

		function before(){
			$this->master = new MasterController;
			$this->master->head([
				"title" => "E-Oyuncak - Anasayfa"
			]);
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

		function profile(){

			$u = new UserModel;
			$data=[];
			$data["user"] = $io->get();
			$this->view("Profile",$data); 
			
		}

		function after(){
			$this->master->end();
		}

	}
?>