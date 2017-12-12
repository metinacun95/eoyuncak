<?php
	namespace App\Controllers;
	use App\Models\SiteModel;
	use App\Models\ProductModel;
	use App\Models\IOModel;

	class AdminMasterController extends Controller{
		public function head($settings = []){
			$data = [
				"link" => $this->link,
				"js" => [
					"jquery-1.10.2.js",
					"bootstrap.js",
					"jquery.metisMenu.js",
					//"custom.js",
				],
				"css" => [
					"bootstrap.css",
					"font-awesome.css",
					"basic.css",
					"custom.css"
				]
			];
			foreach($settings as $key => $value){
				$data[$key] = $value;
			}
			$this->view("Master/AdminHead",$data);
		}
		public function end(){
			$this->view("Master/AdminEnd");
		}
	}
?>