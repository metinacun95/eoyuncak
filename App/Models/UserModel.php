<?php
	namespace App\Models;
	use System\Libraries\Model;
	use System\Libraries\Config;

	class UserModel extends Model{

		function create($data = []){

			$user = $this->db->query("SELECT * FROM uyeler WHERE KullaniciAdi='".$data['KullaniciAdi']."' OR Eposta='".$data['Eposta']."'");

			if(count($user)==0){

				if(isset($data['Parola'])){

					$data['Parola'] = md5($data['Parola']);
				}

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

			if(isset($data['Parola'])){

				$data['Parola'] = md5($data['Parola']);
			}

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

		function destroy($id){

			$destroy = $this->db->table('uyeler')->where('UyeId', $id)->delete();

			if($destroy){

				return [
					'error' => 0,
					'errorMessage' => "Üye başarı ile silindi."
				];
			}else{

				return [
					'error' => 1,
					'errorMessage' => "Bir hata oluştu. Üye silinemedi !"
				];

			}
		}

		function get($id){

			$user = $this->db->query("SELECT * FROM uyeler WHERE UyeId='$id'");

			if(count($user)>0){

				foreach($user as $u){
					return $u;
				}
			}else{

				return [
					'error' => 1,
					'errorMessage' => "Böyle bir üye bulunamadı."
				];
			}
		}

		function getAll(){

			$users = $this->db->query("SELECT * FROM uyeler");
			
			return $users;
		}
	}
?>