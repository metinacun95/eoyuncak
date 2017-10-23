<?php
	namespace System\Libraries;
	class Request{
		public function __construct(){
			if($_POST){
				foreach($_POST as $key => $value){
					if(!is_array($_POST[$key])){
						$this->$key = $value;
					}
				}
			}
			if($_GET){
				foreach($_GET as $key => $value){
					if(!is_array($_GET[$key])){
						$this->$key = $value;
					}
				}
			}
		}
		public function get($key = false){
			if($key){
				if(isset($this->$key)){
					return $this->$key;
				}
				return false;
			}
			return false;
		}
	}
?>