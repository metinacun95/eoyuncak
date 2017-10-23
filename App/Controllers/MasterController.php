<?php
	namespace App\Controllers;
	use App\Models\SiteModel;
	class MasterController extends Controller{
		public function head($settings = []){
			$data = [
				"link" => $this->link,
				"js" => [],
				"css" => []
			];
			foreach($settings as $key => $value){
				$data[$key] = $value;
			}
			$this->view("Head",$data);
		}
		public function headAdmin($settings = []){
			$data = [
				"link" => $this->link,
				"js" => [],
				"css" => []
			];
			foreach($settings as $key => $value){
				$data[$key] = $value;
			}
			$this->view("admin/HeadAdmin",$data);
		}
		public function headAdmin2($settings = []){
			$data = [
				"link" => $this->link,
				"js" => [],
				"css" => []
			];
			foreach($settings as $key => $value){
				$data[$key] = $value;
			}
			$this->view("admin/HeadAdmin",$data);
			$this->view("admin/Menu",$data);
		}
		public function end(){
			$this->view("End");
		}
	}
?>