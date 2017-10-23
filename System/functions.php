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
	function seflink($title){
		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-',"'");
		$change = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ',"");
		$perma = strtolower(str_replace($find, $change, $title));
		$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
		$perma = trim(preg_replace('/\s+/',' ', $perma));
		$perma = str_replace(' ', '-', $perma);
		return $perma;
	}
?>