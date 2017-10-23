<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;
	class SiteModel extends Model{
		public $link = "";
		public $sayfalamaLimit = 12;
		function __construct(){
			parent::__construct();
			$config = new Config();
			$siteConfig = $config->get("Site");
			$this->link = $siteConfig["link"];
		}
	}
?>