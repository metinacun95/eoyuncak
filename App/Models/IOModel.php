<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;
	class IOModel extends Model{
		public $link = "";
		function __construct(){
			parent::__construct();
			$config = new Config();
			$siteConfig = $config->get("Site");
			$this->link = $siteConfig["link"];
		}
		function login($username,$password){

			$user = $this->db->query("SELECT * FROM uyeler WHERE KullaniciAdi=$username OR Eposta=$username AND Parola=$password");

			if(count($user)>0){

				$_SESSION['userId'] = $user -> UyeId;
				$_SESSION['rolId'] = $user -> RolId;
				$_SESSION['userName'] = $username;
				$_SESSION["md5"] = md5($user->UyeId.$user->RolId.$username);
				return [
					'error' => 0,
					'errormessage' => "Giriş Başarılı"
				];
			}else{

				return [
					'error' => 1,
					'errorMessage' => "Kullanıcı adı veya parola hatalı !"
				];
			}
			
			
		}

		function logout(){

			session_destroy();

		}

		function isLogin(){

			if($_SESSION['md5'] == md5($_SESSION['userId'].$_SESSION['rolId'].$_SESSION['userName'])){

				return true;
			}
			return false;
		}
	}
?>