<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;
	class OrderModel extends Model{
		public $link = "";
		function __construct(){
			parent::__construct();
			$config = new Config();
			$siteConfig = $config->get("Site");
			$this->link = $siteConfig["link"];
		}
		function addFromCarts($userId = 0){
			$carts = $this->db->table("alisverissepeti")->select("*")->where("UyeId",$userId)->getAll();
			foreach($carts as $c){
				$this->db->table("siparisler")->insert([
					"UyeId" => $userId,
					"UrunId" => $c->UrunId,
					"DurumId" => 0, // ödeme tamamlandı
					"SiparisTarihi" => date("d.m.Y")
				]);
			}
			$this->db->table("alisverissepeti")->where("UyeId",$userId)->delete();
			return true;
		}
		function getAll(){
			return $this->db->table("siparisler")->where("siparisler.DurumId",0)->innerJoin("urunler","urunler.UrunId","siparisler.UrunId")->innerJoin("urunresimler","siparisler.UrunId","urunresimler.UrunId")->innerJoin("uyeler","siparisler.UyeId","uyeler.UyeId")->getAll();
		}
		function sendOrder($orderId = 0){
			$this->db->table("siparisler")->where("SiparisId",$orderId)->update(["DurumId" => 1]);
		}
	}
?>