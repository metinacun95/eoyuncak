<?php
	namespace System\Libraries;
	use System\Libraries\Config;
	class Model{
		protected $db;
		function __construct(){
			$config = new Config();
			$dbConfig = $config->get("Database");
			$this->db = new \Buki\Pdox([
					"host"		=> $dbConfig["host"],
					"driver"	=> $dbConfig["driver"],
					"database"	=> $dbConfig["database"],
					"username"	=> $dbConfig["username"],
					"password"	=> $dbConfig["password"],
					"charset"	=> $dbConfig["charset"],
					"collation"	=> $dbConfig["collation"],
					"prefix"	=> $dbConfig["prefix"]
			]);
		}
	}
?>