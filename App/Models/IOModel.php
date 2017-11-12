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

			$user = $this->db->query("SELECT * FROM uyeler WHERE KullaniciAdi='$username' OR Eposta='$username' AND Parola='$password'");


			if(count($user)>0){
				foreach ($user as $u) {
					$_SESSION['userId'] = $u->UyeId;
					$_SESSION['rolId'] = $u->RolId;
					$_SESSION['userName'] = $username;
					$_SESSION["md5"] = md5($u->UyeId.$u->RolId.$username);
				}
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

			if(isset($_SESSION['md5']) && isset($_SESSION['userId']) &&isset($_SESSION['rolId']) && isset($_SESSION['userName'])){
				
				if($_SESSION['md5'] == md5($_SESSION['userId'].$_SESSION['rolId'].$_SESSION['userName'])){

						return true;
					}
			}
			return false;
		}
	}
?>