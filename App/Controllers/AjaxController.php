<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use PHPMailer;
	class AjaxController extends Controller{ // HomeController@index
		
		public $master;
		public function index(){
			if($_POST){
				if(isset($_POST["username"])){
					$u = new UserModel;
					$kontrol = $u->kontrolUsername($this->request->username);
					if(count($kontrol) > 0){
						echo "Bu kullanıcı adı zaten kayıtlı !";
					}
					else{
						echo "Kullanıcı adı kullanılabilir !";
					}
				}
			}
		}
	}
?>