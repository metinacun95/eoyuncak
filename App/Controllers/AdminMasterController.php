<?php
	namespace App\Controllers;
	use App\Models\SiteModel;
	use App\Models\ProductModel;
	use App\Models\IOModel;

	class AdminMasterController extends Controller{
		public function head($settings = []){
			$data = [
				"link" => $this->link,
				"js" => [],
				"css" => [
					"css/bootstrap.css",
					"css/font-awesome.css",
					"css/basic.css",
					"css/custom.css"
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