<?php
	function findChange($find = "",$change = "",$string = ""){
		$new = "";
		for($i = 0 ;$i < strlen($string); $i++){
			if($find == substr($string,$i,strlen($find))){
				$i += strlen($find) - 1;
				$new = $new . $change;
			}
			else{
				$new = $new . $string[$i];
			}
		}
		return $new;
	}
	function toHtmlChars($variable = ""){
		$variable = findChange('"',"&#34",$variable);
		$variable = findChange("%","&#37",$variable);
		$variable = findChange("'","&#39",$variable);
		$variable = findChange("?","&#63",$variable);
		$variable = findChange("`","&#96",$variable);
		$variable = findChange("‘","&#8216",$variable);
		$variable = findChange("’","&#8217",$variable);
		$variable = findChange("“","&#8220",$variable);
		$variable = findChange("”","&#8221",$variable);
		$variable = findChange(":","&#58",$variable);
		$variable = findChange(";","&#59",$variable);
		$variable = findChange("<","&#60",$variable);
		$variable = findChange("=","&#61",$variable);
		$variable = findChange(">","&#62",$variable);
		$variable = findChange("      ","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$variable);
		$variable = findChange("     ","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$variable);
		$variable = findChange("    ","&nbsp;&nbsp;&nbsp;&nbsp;",$variable);
		$variable = findChange("   ","&nbsp;&nbsp;&nbsp;",$variable);
		$variable = findChange("  ","&nbsp;&nbsp;",$variable);
		return $variable;
	}
	function trs($string = false,$array = false){
		if(!isset($_SESSION["lang"])){
			return $string;
		}
		else{
			$lang = $_SESSION["lang"];
		}
		if(file_exists(PATH."App/Languages/".$lang.".php")){
			$langArray = include PATH."App/Languages/".$lang.".php";
		}
		if($string){
			if($array){
				if(isset($langArray[$string])){
						$string = $langArray[$string];
						foreach($array as $key=>$value){
						$string = str_replace("[".$key."]",$value,$string);
					}
					return $string;
				}
				else{
					addKey($string);
					return $string;
				}
			}
			else{
				if(isset($langArray[$string])){
					return $langArray[$string];
				}
				else{
					addKey($string);
					return $string;
				}
			}
		}
	}
	function addKey($string = ""){
		if($string != ""){
			$LanguageDir = opendir(PATH."App/Languages");
			while($LanguageFile = readdir($LanguageDir)){
				if($LanguageFile == "." or $LanguageFile == ".."){}
				else if(is_file(PATH."App/Languages/".$LanguageFile)){
					$langArray = include PATH."App/Languages/".$LanguageFile;
					if(is_array($langArray)){
						$count = count($langArray);
						$sayac = 0;
						$openFile = fopen(PATH."App/Languages/".$LanguageFile,"w+");
						fwrite($openFile,"<?php
return array(");
						foreach($langArray as $key=>$value){
							if($sayac != $count-1){
								fwrite($openFile,'
"'.$key.'" => "'.$value.'",');
							}
							else{
								fwrite($openFile,'
"'.$key.'" => "'.$value.'"');
							}
							$sayac++;
						}
						if(!array_key_exists($string,$langArray)){
							if($count === 0){
								fwrite($openFile,'
"'.$string.'" => "'.$string.'"');
							}
							else{
								fwrite($openFile,',
"'.$string.'" => "'.$string.'"');
							}
						}
						fwrite($openFile,"
);
?>");
						fclose($openFile);
					}
					else{
						$openFile = fopen(PATH."App/Languages/".$LanguageFile,"w+");
						fwrite($openFile,"<?php return array(
); ?>");
						fclose($openFile);
					}
				}
			}
		}
	}
	function sefLink($url){
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
?>