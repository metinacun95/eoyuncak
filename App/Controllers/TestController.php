<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\ProductModel;
	use PHPMailer;
	use GUMP;
	class TestController extends Controller{
		function newProduct(){
			$p = new ProductModel;
			$this->view("Test/NewProduct",["link" => $this->link,"p" => $p]);
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
				else if($this->request->get("i")== "getDetails"){
					$productType = intval($this->request->get("productType"));
					$getDetails = $p->getProductDetails($productType);
					$details = [];
					foreach($getDetails as $d){
						if($d->OzellikTip == 0){
							$details[] = ["id" => $d->OzellikId,"ad" => $d->OzellikAdi,"tip" => 0,"cins" => $d->Cins];
						}
						else if($d->OzellikTip == 1){
							$details[] = ["id" => $d->OzellikId,"ad" => $d->OzellikAdi,"tip" => 1,"cins" => $d->Cins,"ozellikler" => $p->getProductTypeDetailList($d->OzellikId)];
						}
					}
					echo json_encode($details);
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
		function addNewProduct(){
			if($_POST){
				$validate = GUMP::is_valid($_POST,[
					"Baslik" => "required|max_len,100",
					"Aciklama" => "required|max_len,10000",
					"UrunFiyat" => "required|numeric",
					"Stok" => "required|numeric",
					"KategoriId" => "required|numeric",
					"UrunTip" => "required|numeric",
				]);
				if($validate === true){
					$p = new ProductModel;
					$newProductId = $p->create();
					if($newProductId > 0){
						$data = [
							"Baslik" => toHtmlChars($this->request->get("Baslik")),
							"Aciklama" => toHtmlChars($this->request->get("Aciklama")),
							"UrunFiyat" => toHtmlChars($this->request->get("UrunFiyat")),
							"Stok" => toHtmlChars($this->request->get("Stok")),
							"KategoriId" => toHtmlChars($this->request->get("KategoriId")),
							"UrunTip" => toHtmlChars($this->request->get("UrunTip")),
						];
						$p->updateProductStandart($newProductId,$_SESSION["userId"],$data);
						$details = [];
						foreach($_POST as $key => $value){
							if(substr($key,0,strlen("detail")) == "detail"){
								$detailEx = explode("-",$key);
								if(isset($detailEx[1])){
									$newKey = intval($detailEx[1]);
									$newValue = toHtmlChars($value);
									$details[$newKey] = $newValue;
								}
							}
						}
						$encodeArray = $p->updateProductAdvanced($newProductId,$_SESSION["userId"],$details);
						$encodeArray["productId"] = $newProductId;
						echo json_encode($encodeArray);
					}
				}
			}
		}
	}
?>