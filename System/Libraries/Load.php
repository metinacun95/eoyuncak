<?php
	namespace System\Libraries;
	use System\Libraries\Config as Config;
	use System\Libraries\Ex as Ex;
	class Load{
		protected $url;
		protected $auth;
		protected $site;
		protected $config;
		public function __construct(){
			if(!isset($_SESSION)){
				session_start();
			}
			$this->config = new Config();
			$this->auth = $this->config->get("Auth");
			$this->site = $this->config->get("Site");
			$this->route = $this->config->get("Route");
			$this->front = $this->config->get("Front");
			if(isset($_GET["url"])){
				$this->url = $_GET["url"];
			}
			else{
				$this->url = "/";
			}
			$isFrontUrl = explode("/",$this->url);
			if(in_array($isFrontUrl[0],$this->front)){
				$file = $this->site["link"]."App/Front/".$this->url;
				header("Location:".$file);
				return false;
			}
			$controller = "App\Controllers\P404";
			$method = "index";
			$execString = "";
			$params = [];
			foreach($this->route["directs"] as $key => $value){
				if($this->url == $key){
					$execString = $value;
					break;
				}
			}
			if(empty($execString)){
				foreach($this->route["preg_matches"] as $key => $value){
					$preg = "#/".trim($key,"/")."/#is";
					$url = "#/".trim($this->url,"/")."/#is";
					if(preg_match($preg,$url,$temp)){
						$countTemp = count($temp);
						for($i = 1; $i < $countTemp; $i++){
							$value = findChange("[".$i."]",$temp[$i],$value);
						}
						$parseValue = explode("@",$value);
						if(count($parseValue) == 1){
							// method belirtilmemiş hiç
							$parseValueForVars = explode("->",$parseValue[0]);
							if(count($parseValueForVars) == 1){
								// değişken de yok
								$controller = $parseValueForVars[0];
								$method = "index";
							}
							else{
								// değişkenleri elde ediyoruz
								$controller = $parseValueForVars[0];
								$method = "index";
								$params = $this->getParams($parseValueForVars[1]);
							}
						}
						else if(count($parseValue) == 2){
							$controller = $parseValue[0];
							$parseValueForVars = explode("->",$parseValue[1]);
							if(count($parseValueForVars) == 1){
								// değişken yok
								$method = $parseValue[1];
							}
							else{
								// değişkenleri alıyoruz
								$method = $parseValueForVars[0];
								$params = $this->getParams($parseValueForVars[1]);
							}
						}
						else{
							throw new Ex(["title" => "Route Error","errorMessage" => "Use route orders"]);
						}
						break;
					}
				}
			}
			else{
				$parseValue = explode("@",$execString);
				$controller = $parseValue[0];
				$method = "index";
				if(isset($parseValue[1])){
					$method = $parseValue[1];
				}
			}
			$controller = trim($controller);
			$method = trim($method);
			$this->loadController($controller,$method,$params);
		}
		public function loadController($controllerName,$methodName,$params = []){
			if(class_exists($controllerName)){
				$execController = new $controllerName;
				$execController->params = $params;
				if(method_exists($execController,$methodName)){
					if($this->getAuth($controllerName,$methodName)){
						if(method_exists($execController,"before")){
							$execController->before();
						}
						$execController->$methodName();
						if(method_exists($execController,"after")){
							$execController->after();
						}
					}
					else{
						if(isset($this->auth[$controllerName][$methodName]["redirect"])){
							header("Location:".$this->site["link"].$this->auth[$controllerName][$methodName]["redirect"]);
						}
						throw new Ex(["title" => "Auth error.","errorMessage" => "Take control App\Config\Auth.php file"]);
					}
				}
				else{
					throw new Ex(["title" => "Method can't finded","errorMessage" => $methodName." method can't finded in ".$controllerName." class"]);
				}
			}
			else{
				throw new Ex(["title" => "Class can't loaded","errorMessage" => $controllerName.".php file not found."]);
			}
		}
		public function getAuth($className,$methodName){
			$notAccessClasses = ["Controller"];
			$notAccessMethods = ["before","after"];
			$classesCount = count($notAccessClasses);
			$methodsCount = count($notAccessMethods);
			for($i = 0; $i < $classesCount; $i++){
				if($className == $notAccessClasses[$i]){
					return false;
				}
			}
			for($i = 0; $i < $methodsCount; $i++){
				if($methodName == $notAccessMethods[$i]){
					return false;
				}
			}
			if(isset($this->auth[$className][$methodName])){
				$auth = $this->auth[$className][$methodName];
				if(!is_array($auth)){
					if(is_string($auth)){
						if($auth == "*" | $auth == "public"){
							return true;
						}
						else{
							return false;
						}
					}
				}
				else{
					$methodBoolean = true;
					$ipBoolean = true;
					if(isset($auth["method"])){
						$parseMethod = explode("@",$auth["method"]);
						if(count($parseMethod) == 2){
							$className = $parseMethod[0];
							if($auth["method"][0] == "!"){
								$className = substr($className,1,strlen($className));
							}
							$methodName = $parseMethod[1];
							$execClass = new $className;
							$methodBoolean = $execClass->$methodName();
							if($auth["method"][0] == "!"){
								$methodBoolean = !$methodBoolean;
							}
						}
						else{
							throw new Ex(["title" => "Syntax Error","errorMessage" => "method auth must like this : App\Models\AnyClass@anymethod"]);
						}
					}
					if(isset($auth["ip"])){
						if($auth["ip"] != $_SERVER["REMOTE_ADDR"]){
							$ipBoolean = false;
						}
					}
					return $methodBoolean and $ipBoolean;
				}
				return false;
			}
			return true;
		}
		public function controlMethodAuth($methods){
			$methodArray = [];
			$method = trim($methods);
			if(strlen($method) == 0){
				return true;
			}
			if($methods[0] == "("){
				$start = 1;
				$length = strlen($method)-1;
			}
			else{
				$start = 0;
				$length = strlen($method);
			}
			$add = 0;
			$addMethod = "";
			for($i = $start; $i < $length; $i++){
				if($method[$i] == "&"){
					array_push($methodArray,$addMethod);
					array_push($methodArray,"&");
					$addMethod = "";
				}
				else if($method[$i] == "|"){
					array_push($methodArray,$addMethod);
					array_push($methodArray,"|");
					$addMethod = "";
				}
				/*else if($method[$i] == "("){
					$getNext = $this->getNext(substr($method,$i,$length));
				}*/
				else{
					$addMethod = $addMethod.$method[$i];
				}
			}
			array_push($methodArray,$addMethod);
			if(count($methodArray) == 1){
				$methodExplode = explode("@",$methodArray[0]);
				if(class_exists($methodExplode[0])){
					$execClass = new $methodExplode[0];
					if(isset($methodExplode[1])){
						return $execClass->$methodExplode[1]();
					}
					else{
						return $execClass;
					}
				}
				else{
					throw new Ex(["title" => "Class can't loaded","errorMessage" => $methodExplode[0].".php file not found."]);
				}
			}
			else if(count($methodArray) == 0){
				return true;
			}
			else{
				$countMethodArray = count($methodArray);
				$bool = true;
				for($i = 0; $i < $countMethodArray; $i+=2){
					if($i == 0){}
					else{
						if($methodArray[$i-1] == "&"){
							$var1 = intval($this->controlMethodAuth($methodArray[$i-2]));
							$var2 = intval($this->controlMethodAuth($methodArray[$i]));
							if($var1 == 1 & $var2 == 1){
								$bool = $bool & true;
							}
							else{
								$bool = $bool & false;
							}
						}
						else if($methodArray[$i-2] == "|"){
							$var1 = intval($this->controlMethodAuth($methodArray[$i-2]));
							$var2 = intval($this->controlMethodAuth($methodArray[$i]));
							if($var1 == 1 | $var2 == 1){
								$bool = $bool | true;
							}
							else{
								$bool = $bool | false;
							}
						}
					}
				}
				return $bool;
			}
		}
		function getNext($method){
			$length = strlen($method);
			$return = ["method" => "",$count = 0];
			for($i = 1; $i<$length;$i++){
				if($method[$i] == "("){
					$getNext = $this->getNext(substr($method,$i,$length));
					$return["method"] = $return["method"].$getNext["method"];
					$return["count"]++;
					$i+=$getNext["count"];
				}
				else if($method[$i] == ")"){
					
				}
			}
			return $return;
		}
		function getParams($paramsString = "{}"){
			$params = [];
			$paramsString = trim($paramsString);
			$paramsString = ltrim($paramsString,"{");
			$paramsString = rtrim($paramsString,"}");
			$explodeParamsString = explode(",",$paramsString);
			$countExplodeParamsString = count($explodeParamsString);
			for($i = 0; $i < $countExplodeParamsString; $i++){
				$explodeVar = explode("=>",$explodeParamsString[$i]);
				$params[trim($explodeVar[0])] = trim($explodeVar[1]);
			}
			return $params;
		}
	}
?>