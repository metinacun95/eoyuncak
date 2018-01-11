<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;
	use IOModel as io;
	class ProductModel extends Model{
		function create(){
			$userId = $_SESSION["userId"];
			$newProduct = $this->db->table("urunler")->insert([
				"UyeId" => $userId
			]);
			return $this->db->insertId();
		}
		function newCategory($categoryName = "",$sub = 0){
			return $this->db->table("kategoriler")->insert([
				"KategoriAdi" => $categoryName,
				"Alt" => $sub,
				"Sef" => sefLink($categoryName),
				"Sira" => 0
			]);
		}
		function getCategory($categoryId = 0){
			return $this->db->table("kategoriler")->select("*")->where("KategoriId",$categoryId)->get();
		}
		function getCategoryFromSefLink($sefLink = ""){
			if($sefLink == sefLink($sefLink)){
				return $this->db->table("kategoriler")->select("*")->where("Sef",sefLink($sefLink))->get();
			}
			return ["error" => 1,"errorMessage" => "Hatalı sef link"];
		}
		function getCategories($sub = 0){
			return $this->db->table("kategoriler")->select("*")->where("Alt",$sub)->orderBy("sira","ASC")->getAll();
		}
		function getProductTypes($categoryId = 0){
			return $this->db->table("uruntipler")->select("*")->where("KategoriId",$categoryId)->getAll();
		}
		function getProductDetails($productType = 0){
			return $this->db->table("urunozellikler")->select("*")->where("UrunTipId",$productType)->getAll();
		}
		function getProductTypeDetailList($detailId = 0){
			return $this->db->table("urunozellikliste")->select("*")->where("UrunOzellikId",$detailId)->getAll();
		}
		function updateProductStandart($productId = 0,$userId = 0,$data=[]){
			$this->db->table("urunler")->where("UrunId",$productId)->where("UyeId",$userId)->update($data);
			return [
				"error" => 0,
				"errorMessage" => "Bilgiler Güncellendi"
			];
		}
		function updateProductAdvanced($productId = 0,$userId = 0,$data){
			$control = $this->db->table("urunler")->select("UrunId,UrunTip")->where("UrunId",$productId)->where("UyeId",$userId)->get();
			if(count($control) > 0){
				foreach($data as $key => $value){
					$selectProductDetail = $this->db->table("urunozellikler")->select("*")->where("OzellikId",intval($key))->where("UrunTipId",$control->UrunTip)->getAll();
					if(count($selectProductDetail) > 0){
						foreach($selectProductDetail as $selectedDetail){
							$selectProductValue = $this->db->table("urunozellikdegerler")->select("OzellikDegerId")->where("UrunId",$productId)->where("OzellikId",intval($key))->get();
							if($selectedDetail->OzellikTip == 0){
								$newValue = toHtmlChars($value);
							}
							else if($selectedDetail->OzellikTip == 1){
								$newValue = intval($value);
							}
							if(count($selectProductValue) > 0){
								$this->db->table("urunozellikdegerler")->where("UrunId",$productId)->where("OzellikId",intval($key))->update(["OzellikDeger" => $newValue]);
							}
							else{
								$this->db->table("urunozellikdegerler")->insert(["UrunId" => $productId,"OzellikId" => $key, "OzellikDeger" => $newValue]);
							}
						}
					}
					else{
						return [
							"error" => 2,
							"errorMessage" => "Ürüne ait olmayan özellik eklenmeye çalışılıyor"
						];
					}
				}
				return [
						"error" => 0,
						"errorMessage" => "Bilgiler Güncellendi"
					];
			}
			else{
				return [
					"error" => 1,
					"errorMessage" => "Bu ürün bu üyeye ait değil"
				];
			}
		}
		function delete($productId = 0,$userId = 0){
			$control = $this->db->table("urunler")->where("UrunId",$productId)->where("UyeId",$userId)->get();
			if(count($control) > 0){
				$this->db->table("urunler")->where("UrunId",$productId)->delete();
				$this->db->table("urunozellikdegerler")->where("UrunId",$productId)->delete();
				$productImages = $this->db->table("urunresimler")->select("ResimYol")->where("UrunId",$productId)->getAll();
				foreach($productImages as $p){
					unlink(PATH."/App/Front/images/productImages/".$p->ResimYol);
					unlink($link."images/productImages/".$p["ResimYol"]);
				}
				return [
					"error" => 0,
					"errorMessage" => "Ürün başarıyla silindi."
				];
			}
			else{
				return [
					"error" => 1,
					"errorMessage" => "Bu üye bu ürünü silemez"
				];
			}
		}
		function get($productId = 0){
			return $this->
			db->
			table("urunler")->
			select("*")->
			innerJoin("urunozellikler","urunler.UrunTip","urunozellikler.UrunTipId")->
			innerJoin("urunozellikdegerler","urunler.UrunId","urunozellikdegerler.UrunId")->
			innerJoin("uyeler","uyeler.UyeId","urunler.UyeId")->
			innerJoin("urunresimler","urunresimler.UrunId","urunler.UrunId")->
			where("urunler.UrunId",$productId)->
			get();
		}
		function getAll(){
			return $this->
			db->
			table("urunler")->
			select("*")->
			innerJoin("uyeler","uyeler.UyeId","urunler.UyeId")->
			innerJoin("urunresimler","urunresimler.UrunId","urunler.UrunId")->
			getAll();
			print_r($data);
		}
		function insertImageToProduct($productId = 0,$imgFile = ""){
			$newFileName = $this->randomFileName().".png";
			if(file_exists($imgFile)){
				copy($imgFile,PATH."/App/Front/images/productImages/".$newFileName);
				$this->db->table("urunresimler")->insert(["UrunId" => $productId,"ResimYol" => $newFileName]);
				if($this->db->insertId() > 0){
					return [
						"error" => 0,
						"errorMessage" => "Resim ürüne başarıyla eklendi"
					];
				}
				return [
					"error" => 1,
					"errorMessage" => "Resim ürüne eklenemedi"
				];
			}
			return [
				"error" => 1,
				"errorMessage" => "Resim bulunamadı"
			];
		}
		function randomFileName($Size = 0){
			$abc = "ABCDEFGHIJKLMNOPRSTUVYZWXQ";
			$numbers = "0123456789";
			$Text = "";
			if($Size == 0){
				$Size = 8; // Default
			}
			for($i=0;$i<=$Size;$i++){
				$Rand1 = rand(0,1);
				if($Rand1 == 0){
					$Text.= $abc[rand(0,strlen($abc)-1)];
				}
				else{
					$Text.= $numbers[rand(0,strlen($numbers)-1)];
				}
			}
			if(file_exists(PATH."/App/Front/images/productImages/".$Text.".png")){
				return randomFileName();
			}
			return $Text;
		}		
		function deleteCategory($categoryId = 0){
			$products = $this->db->table("urunler")->select("UrunId")->where("KategoriId",$categoryId)->getAll();
			foreach($products as $p){
				$this->delete($p->UrunId);
			}
			$subCategories = $this->db->table("kategoriler")->select("KategoriId")->where("Alt",$categoryId)->getAll();
			foreach($subCategories as $sub){
				$this->deleteCategory($sub->KategoriId);
			}
			$this->db->table("kategoriler")->where("KategoriId",$categoryId)->delete();
		}
		function mostPays(){
			return $this->db->table("urunler")->select("*")->orderBy("urunler.ToplamSatinAlinma","DESC")->limit(15)->innerJoin("urunresimler","urunler.UrunId","urunresimler.UrunId")->getAll();
		}
		function kategoriBul($kategoriId){
			$p=new ProductModel;
			if($p->getCategory($kategoriId)->Alt!=0){

				return $this->kategoriBul($p->getCategory($kategoriId)->Alt);
			}
			return $p->getCategory($kategoriId)->Sef;
		}
		function addNewProductType($typeName = "",$catId = 0){
			$this->db->table("uruntipler")->insert([
				"KategoriId" => intval($catId),
				"UrunTipAdi" =>  toHtmlChars($typeName)
			]);
			return $this->db->insertId();
		}
		function addFeatureToProductType($UrunTipId,$OzellikAdi,$Cins,$degerler){
			$OzellikTip = 0;
			if(count($degerler) > 0){
				$OzellikTip = 1;
			}
			$add = $this->db->table("urunozellikler")->insert([
				"UrunTipId" => $UrunTipId,
				"OzellikAdi" => $OzellikAdi,
				"Cins" => $Cins,
				"OzellikTip" => $OzellikTip,
			]);
			if($OzellikTip == 1){
				$newFeatureId = $this->db->insertId();
				if($newFeatureId > 0){
					for($i = 0; $i<count($degerler);$i++){
						$this->db->table("urunozellikliste")->insert([
							"UrunOzellikId" => $newFeatureId,
							"Ozellik" => $degerler[$i]
						]);
					}
					return true;
				}
				return false;
			}
			return true;
		}
	}
?>