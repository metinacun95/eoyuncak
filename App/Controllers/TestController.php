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
					$categories = $p->getCategories($sub);
					if(count($categories) > 0 and $sub == 0){
						echo json_encode([$p->getCategories($sub)]);
					}
					else{
						$categoryGroup = [];
						$categories = $p->getCategories($sub);
						if(count($categories) > 0){
							$categoryGroup = $this->setCategoryGroups($categoryGroup, $sub);
							echo json_encode(["categoryGroup" => $categoryGroup]);
						}
						else{
							$productTypes = $p->getProductTypes($sub);
							echo json_encode(["productTypes" => $productTypes]);
						}
					}
				}
				else if($i == "getDetails"){
					
				}
			}
		}
		function setCategoryGroups($categoryGroup,$sub){
			$p = new ProductModel;
			$thisCategory = $p->getCategory($sub);
			if(count($thisCategory) > 0){
				$thisGroup = [];
				$upGroup = [];
				$upGroup = $this->getUpCategories($upGroup,$thisCategory->Alt);
				$downGroup = [];
				$downGroup = $this->getDownCategories($downGroup,$thisCategory->KategoriId);
				$categoryGroup = array_merge($upGroup,$downGroup);
			}
			return $categoryGroup;
		}
		function getUpCategories($group,$sub = 0,$selected = 0){
			$p = new ProductModel;
			if($sub > 0){
				$addGroup = $p->getCategories($sub);
				array_unshift($group,$addGroup);
				foreach($addGroup as $a){
					$getUpCategory = $p->getCategory($a->Alt);
					$sub = $getUpCategory->Alt;
					$group = $this->getUpCategories($group,$sub,$a->Alt);
					break;
				}
			}
			else{
				$addGroup = $p->getCategories($sub);
				$addGroup["selected"] = $sub;
				array_unshift($group,$addGroup);
			}
			return $group;
		}
		function getDownCategories($group,$sub = 0){
			$p = new ProductModel;
			$addGroup = $p->getCategories($sub);
			$addGroup["selected"] = -1;
			array_push($group,$addGroup);
			return $group;
		}
	}
?>