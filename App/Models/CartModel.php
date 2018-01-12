<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;
	use App\Models\IOModel;

	class CartModel extends Model{

		public $link = "";

		function __construct(){

			parent::__construct();
			$config = new Config();
			$siteConfig = $config->get("Site");
			$this->link = $siteConfig["link"];
		}

		function create($data = []){

			$IOModel = new IOModel();

			if($IOModel->isLogin()){

				$create = $this->db->table('alisverissepeti')->insert($data);

				if($this->db->insertId() > 0){

					return [
						'error' => 0,
						'errorMessage' => "Ürün başarılı bir şekilde sepete eklendi." 
					]; 
				}else{

					return [
						'error' => 1,
						'errorMessage' => "Ürünün sepete eklenmesi sırasında bir hata oluştu. İşlem gerçekleştirilemedi !"
					];
				}

			}else{

				if(isset($data['UrunId'], $data['KacTane'], $data['OdenecekTutar'])){

					/* Bir tane SepetId si oluşturmalıyız bunu nasıl yapabiliriz.*/
					$_SESSION['SepetId'] = $data;

					return [
						'error' => 0,
						'errorMessage' => "Ürün başarılı bir şekilde sepete eklendi."
					];
				}else{

					return [
						'error' => 1,
						'errorMessage' => "Ürünün sepete eklenmesi sırasında bir hata oluştu. İşlem gerçekleştirilemedi !"
					];
				}
			}
		}

		function update($data = [], $id){

			/* NOT : Veritabanında alisverissepeti tablosunun id alanı bulunmamaktadır düzeltilmesi gerekli... */
			/* NOT : Session larda veriyi nasıl güncellicez yada sepet işleminde güncelleme oluyor mu? */

			/*$update = $this->db->table('alisverissepeti')->where('UyeId',$id)->update($data);
				
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
			}*/

		}

		function destroy($id){

			$IOModel = new IOModel();

			if($IOModel->isLogin()){

				$destroy = $this->db->table('alisverissepeti')->where('UrunId', $id)->delete();

				if($destroy){

					return [
						'error' => 0,
						'errorMessage' => "Kayıt başarı ile silindi."
					];
				}else{

					return [
						'error' => 1,
						'errorMessage' => "Bir hata oluştu. Kayıt silinemedi !"
					];

				}
			}else{

				unset($_SESSION[$id]);

				return [
					'error' => 0,
					'errorMessage' => "Kayıt başarı ile silindi."
				];

			}

			

		}

		function get($id){

			$IOModel = new IOModel();

			if($IOModel->isLogin()){

				$cart = $this->db->query("SELECT * FROM alisverissepeti WHERE UyeId='$id'");

				if(count($cart)>0){

					foreach($cart as $c){
						return $c;
					}
				}else{

					return [
						'error' => 1,
						'errorMessage' => "Sepette böyle bir ürün bulunamadı."
					];
				}

			}else{

				if(isset($_SESSION[$id])){

					return $_SESSION[$id];
				}else{

					return [
						'error' => 1,
						'errorMessage' => "Sepette böyle bir ürün bulunamadı."
					];

				}	
				
			}

			
		}

		function getCount($id){
			$IOModel = new IOModel();

			if($IOModel->isLogin()){

				$cart = $this->db->query("SELECT * FROM alisverissepeti WHERE UyeId='$id'");

				return count($cart);

			}
		}

		function getAll(){

			$IOModel = new IOModel();

			if($IOModel->isLogin()){

				$carts = $this->db->query("SELECT * FROM alisverissepeti");
				
				return $carts;
			}else{

				//Session sepet işlemi
			}


		}
	}

?>