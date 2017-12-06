<?php 
	class Session{
		
		public static function olustur($isim, $deger){
			return $_SESSION[$isim] = $deger;
		}
		
		public static function getir($isim){
			if(self::varmi($isim)){
				return $_SESSION[$isim];
			}else{
				return "<br/>".$isim." isimli session kaydı bulunamadı<br/>";
			}
		}
		
		public static function varmi($isim){
			return isset($_SESSION[$isim]) ? true : false;
		}
		
		public static function sil($isim){
			if(self::varmi($isim)){
				unset($_SESSION[$isim]);
			}
		}
	}
?>