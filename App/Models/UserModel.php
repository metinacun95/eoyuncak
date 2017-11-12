<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;

	class UserModel extends Model{

		public $link = "";
		public $sayfalamaLimit = 12;
		function __construct(){
			parent::__construct();
			$config = new Config();
			$siteConfig = $config->get("Site");
			$this->link = $siteConfig["link"];
		}

		function create($data = []){

			$user = $this->db->query("SELECT * FROM uyeler WHERE KullaniciAdi='".$data['KullaniciAdi']."' OR Eposta='".$data['Eposta']."'");
			

			if(count($user)>0){

				$create = $this->db->table('uyeler')->insert($data);

				if($this->db->insertId() > 0){

					return [
						'error' => 0,
						'errorMessage' => "Üye kaydı başarılı bir şekilde gerçekleştirildi." 
					]; 
				}else{

					return [
						'error' => 1,
						'errorMessage' => "Kayıt sırasında bir hata oluştu. İşlem gerçekleştirilemedi !"
					];
				}

			}else{

				return [
					'error' => 3,
					'error' => "Bu kullanıcı adı zaten kayıtlı."
				];

			}
		}

		function update($data = [], $id){

			$update = $this->db->table('uyeler')->where('UyeId',$id)->update($data);
			if(count($update) > 0){

				return [
					'error' => 0,
					'errorMessage' => "Bilgiler güncellendi."
				];
			}else{

				return [
					'error' => 1,
					'errorMessage' => "Bir hata oluştu. Güncelleme işlemi başarısız !"
				];
			}
		}
	}
?>