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
			$this->db->table("kullanicilar")->where("username",$username)->where("password",$password)->limit(1)->get();
			$thid->db->query("SELECT * FROM kullanicilar WHERE username='$username' AND password='$password' LIMIT 1");
		}
		function isLogin(){
			if(isset($_SESSION["login"])){
				return true;
			}
			return false;
		}
	}
?>