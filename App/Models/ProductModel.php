<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;
	use IOModel as io;
	class ProductModel extends Model{
		function create(){
			$io = new IOModel();
			$userId = $io->getId();
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
		function getCategories($sub = 0){
			return $this->db->table("kategoriler")->select("*")->where("Alt",$sub)->orderBy("sira","ASC")->getAll();
		}
		function getProductTypes($categoryId = 0){
			return $this->db->table("uruntipler")->select("*")->where("KategoriId",$categoryId)->getAll();
		}
		function getProductDetails($productType = 0){
			return $this->db->table("urunozellikler")->select("*")->where("UrunTipId",$productType)->where("Alt",0)->getAll();
		}
		function getProductDetailSub($productType = 0,$productDetailId = 0){
			return $this->db->table("urunozellikler")->select("*")->where("UrunTipId",$productType)->where("Alt",$productDetailId)->getAll();
		}
		function updateProductStandart($productId = 0,$userId = 0,$data=[]){
			$this->db->table("urunler")->where("UrunId",$productId)->where("UyeId",$userId)->update($data);
		}
		function updateProductAdvanced($productId = 0,$userId = 0,$data){
			$control = $this->db->table("urunler")->select("UrunId")->where("UrunId",$productId)->where("UyeId",$userId)->get();
			if(count($control) > 0){
				foreach($data as $key => $value){
					$selectProductDetail = $this->db->table("urunozellikler")->select("*")->where("OzellikId",intval($key))->where("UrunTipId",$control->UrunTip)->get();
					if(count($selectProductDetail) > 0){
						$selectProductValue = $this->db->table("urunozellikdegerler")->select("OzellikDegerId")->where("UrunId",$productId)->where("OzellikId",intval($key));
						if(count($selectProductValue) > 0){
							$this->db->table("urunozellikdegerler")->where("UrunId",$productId)->where("OzellikId",intval($key))->update(["OzellikDeger" => $value]);
						}
						else{
							$this->db->table("urunozellikdegerler")->insert(["UrunId" => $productId,"OzellikId" => $key, "OzellikDeger" => $value]);
						}
						return [
							"error" => 0,
							"errorMessage" => "Bilgiler Güncellendi"
						];
					}
					else{
						return [
							"error" => 2,
							"errorMessage" => "Ürüne ait olmayan özellik eklenmeye çalışılıyor"
						];
					}
				}
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
					unlink(PATH."/App/Front/images/productImages/".$p["ResimYol"]);
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
			where("UrunId",$productId)->
			innerJoin("urunozellikler","urunler.UrunTip","urunozellikler.UrunTipId")->
			innerJoin("urunozellikdegerler","urunler.UrunId","urunozellikdegerler.UrunId")->
			innerJoin("uyeler","uyeler.UyeId","urunler.UyeId")->
			innerJoin("urunresimler","urunresimler.UrunId","urunler.UrunId")->
			get();
		}
		function insertImageToProduct($imgFile = "",$productId = 0){
			$newFileName = $this->randomFileName();
			if(file_exists($imgFile)){
				copy($imgFile,$newFileName);
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
		function randomFileName(){
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
	}
?>