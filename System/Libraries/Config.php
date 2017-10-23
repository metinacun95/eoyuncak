<?php
	namespace System\Libraries;
	class Config{
		public $config = [];
		public function __construct(){
			$opendir = opendir(PATH."App/Config/");
			while($file = readdir($opendir)){
				if(is_file(PATH."App/Config/".$file) and $file != ".htaccess"){
					$addConfig = include PATH."/App/Config/".$file;
					$configNameExplode = explode(".",$file);
					$configName = $configNameExplode[0];
					$this->config[$configName] = $addConfig;
				}
			}
		}
		public function get($subScript = false,$subScriptSubScript = false){
			if($subScript){
				if(isset($this->config[$subScript])){
					if($subScriptSubScript){
						return $this->config[$subScript][$subScriptSubScript];
					}
					return $this->config[$subScript];
				}
				return false;
			}
			return false;
		}
		public function getAll(){
			return $this->config;
		}
	}
?>