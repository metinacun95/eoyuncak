<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;
	class SiteConfigModel extends Model{
		public $link = "";
		function __construct(){
			parent::__construct();
			$config = new Config();
			$siteConfig = $config->get("Site");
			$this->link = $siteConfig["link"];
		}
	}
?>