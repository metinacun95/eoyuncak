<?php 
	class Input{
		
		public static function varmi($tur = 'post'){
			switch($tur){
				case 'post' : 
					return (!empty($_POST)) ? true : false;
					break;
				case 'get' : 
					return (!empty($_GET)) ? true : false;
					break;
				default :
					return false;
					break;
			}
		}
		
		public static function getir($alan){
			if(isset($_POST[$alan])){
				return $_POST[$alan];
			}else if(isset($_GET[$alan])){
				return $_GET[$alan];
			}else{
				return '';
			}
		}
	}
?>