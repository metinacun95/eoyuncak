<?php
	namespace System;
	class Autoload{
		public function __construct(){
			spl_autoload_register("System\Autoload::autoloadAll");
			require PATH."vendor/autoload.php";
		}
		public static function autoloadAll($className = false){
			$classMap = [
				
			];
			if($className){
				$className = str_replace("\\",DIRECTORY_SEPARATOR,$className);
				if(file_exists(PATH.$className.".php")){
					require_once PATH.$className.".php";
				}
				else if(isset($classMap[$className])){
					require_once PATH.$classMap[$className];
				}
			}
		}
	}
?>