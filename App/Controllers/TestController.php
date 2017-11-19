<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\ProductModel;
	use PHPMailer;
	class TestController extends Controller{
		function newProduct(){
			$this->view("Test/NewProduct",["link" => $this->link]);
		}
		function newProductAjax(){
			if($_POST){
				$p = new ProductModel;
				if($this->request->get("i") == "getCategories"){
					$sub = 0;
					if($this->request->get("sub")){
						$sub = intval($this->request->get("sub"));
					}
					echo json_encode($p->getCategories($sub));
				}
			}
		}
	}
?>