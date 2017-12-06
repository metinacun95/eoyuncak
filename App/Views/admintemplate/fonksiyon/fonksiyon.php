<?php 
	## Türkçe Tarih Formatı (28 Mart 2016) ##
	
	function tarihTr($tarih){
		setlocale(LC_ALL, 'tr_TR.UTF-8');
		 
		$gun=substr($tarih,8,2);
		$ay=substr($tarih,5,2);
		$yil=substr($tarih,0,4);
		 
		return $turkce_tr= strftime("%e %B %Y\n",mktime(0,0,0,$ay,$gun,$yil));
	}
	
	## SEO Link ##
	
	function seoLink($url)
	{
		$url = trim($url);
		$find = array('<b>', '</b>');
		$url = str_replace ($find, '', $url);
		$url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
		$find = array(' ', '&amp;amp;amp;quot;', '&amp;amp;amp;amp;', '&amp;amp;amp;amp;', '\r\n', '\n', '/', '\\', '+', '<', '>');
		$url = str_replace ($find, '-', $url);
		$find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
		$url = str_replace ($find, 'e', $url);
		$find = array('í', 'ý', 'ì', 'î', 'ï', 'I', 'Ý', 'Í', 'Ì', 'Î', 'Ï','İ','ı');
		$url = str_replace ($find, 'i', $url);
		$find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
		$url = str_replace ($find, 'o', $url);
		$find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
		$url = str_replace ($find, 'a', $url);
		$find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
		$url = str_replace ($find, 'u', $url);
		$find = array('ç', 'Ç');
		$url = str_replace ($find, 'c', $url);
		$find = array('þ', 'Þ','ş','Ş');
		$url = str_replace ($find, 's', $url);
		$find = array('ð', 'Ð','ğ','Ğ');
		$url = str_replace ($find, 'g', $url);
		$find = array('/[^A-Za-z0-9\-<>]/', '/[\-]+/', '/<&#91;^>]*>/');
		$repl = array('', '-', '');
		$url = preg_replace ($find, $repl, $url);
		$url = str_replace ('--', '-', $url);
		$url = strtolower($url);
		return $url;
	}
	
	## Mail Kontrol ##
	
	function emailKontrol( $str ){
		return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
	}
	
	## Klasör Silme ##	
	
	function dosyaSil($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") 
						dosya_sil($dir."/".$object); 
					else 
						unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}
	## Kelimelerin ilk harflerini büyük yapma ##
	
	function ilkBuyuk($str) {
		return ltrim(mb_convert_case(str_replace("i", "İ",$str), MB_CASE_TITLE, "UTF-8"));
	}
	## Büyük harfe çevirme ##
	
	function buyukYap($str){
		$str = str_replace(array('i','ı','ç','ö','ğ','ü','ş'), array('İ','I','Ç','Ö','Ğ','Ü','Ş'), $str);
		return strtoupper($str);
	}
	function turkcetarih($f, $zt = 'now'){  
    $z = date("$f", strtotime($zt));  
    $donustur = array(  
        'Monday'    => 'Pazartesi',  
        'Tuesday'   => 'Salı',  
        'Wednesday' => 'Çarşamba',  
        'Thursday'  => 'Perşembe',  
        'Friday'    => 'Cuma',  
        'Saturday'  => 'Cumartesi',  
        'Sunday'    => 'Pazar',  
        'January'   => 'Ocak',  
        'February'  => 'Şubat',  
        'March'     => 'Mart',  
        'April'     => 'Nisan',  
        'May'       => 'Mayıs',  
        'June'      => 'Haziran',  
        'July'      => 'Temmuz',  
        'August'    => 'Ağustos',  
        'September' => 'Eylül',  
        'October'   => 'Ekim',  
        'November'  => 'Kasım',  
        'December'  => 'Aralık',  
        'Mon'       => 'Pts',  
        'Tue'       => 'Sal',  
        'Wed'       => 'Çar',  
        'Thu'       => 'Per',  
        'Fri'       => 'Cum',  
        'Sat'       => 'Cts',  
        'Sun'       => 'Paz',  
        'Jan'       => 'Oca',  
        'Feb'       => 'Şub',  
        'Mar'       => 'Mar',  
        'Apr'       => 'Nis',  
        'Jun'       => 'Haz',  
        'Jul'       => 'Tem',  
        'Aug'       => 'Ağu',  
        'Sep'       => 'Eyl',  
        'Oct'       => 'Eki',  
        'Nov'       => 'Kas',  
        'Dec'       => 'Ara',  
    );  
    foreach($donustur as $en => $tr){  
        $z = str_replace($en, $tr, $z);  
    }  
    if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false) $z = str_replace('Mayıs', 'May', $z);  
    return $z;  
} 

	######################################################
?>