<?php
	namespace System\Libraries;
	class FileCache{
		public static function set($key = false, $data = false,$timer = false){
			if($key and $data){
				$newData["timer"] = $timer;
				$newData["data"] = $data;
				$jsonData = json_encode($newData);
				if(file_exists(PATH."App/Storage/FileCache/".md5($key).".php")){
					unlink(PATH."App/Storage/FileCache/".md5($key).".php");
				}
				$openFile = fopen(PATH."App/Storage/FileCache/".md5($key).".php","w+");
				fwrite($openFile,$jsonData);
			}
			return false;
		}
		public static function control($key = false){
			if($key){
				if(file_exists(PATH."App/Storage/FileCache/".md5($key).".php")){
					$getTimer = FileCache::getTimer($key);
					if(time() - $getTimer < filemtime(PATH."App/Storage/FileCache/".md5($key).".php")){
						return true;
					}
					unlink(PATH."App/Storage/FileCache/".md5($key).".php");
					return false;
				}
				else{
					return false;
				}
			}
			return false;
		}
		public static function get($key = false){
			if($key and FileCache::control($key)){
				$data = FileCache::getContents($key);
				return $data["data"];
			}
			return null;
		}
		public static function getContents($key){
			if(file_exists(PATH."App/Storage/FileCache/".md5($key).".php")){
				$fileContents = file_get_contents(PATH."App/Storage/FileCache/".md5($key).".php","r");
				$data = json_decode($fileContents,1);
				return $data;
			}
			return false;
		}
		public static function getTimer($key = false){
			$data = FileCache::getContents($key);
			return $data["timer"];
		}
		public static function save($key = false,$data = false){
			if($key and $data){
				$file = fopen(PATH."App/Storage/FileCache/".md5($key).".php","w");
				fputs($file,$data);
				fclose($file);
				return true;
			}
			return false;
		}
		public static function getFileContents($fileName = false){
			if(file_exists(PATH."App/Storage/FileCache/".md5($key).".php")){
				$fileGetContents = file_get_contents(PATH."App/Storage/FileCache/".md5($key).".php","r");
				return json_decode($fileGetContents,1);
			}
			return false;
		}
		public static function delete($key = false){
			if($key){
				if(file_exists(PATH."App/Storage/FileCache/".md5($key).".php")){
					unlink(PATH."App/Storage/FileCache/".md5($key).".php");
				}
			}
		}
	}
?>