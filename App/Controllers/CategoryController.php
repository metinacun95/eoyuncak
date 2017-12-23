<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\ProductModel;
	use PHPMailer;
	class CategoryController extends Controller{ // HomeController@index
		
		public $master;
		public function index(){
			
		}
		function before(){
			$this->master = new MasterController;
		}
		function category(){
			$categorySef = $this->params["categorySef"];
			if($categorySef == sefLink($categorySef)){
				$p = new ProductModel;
				$category = $p->getCategoryFromSefLink($categorySef);
				if(is_array($category)){
					$this->redirect();
				}
				else if(count($category) == 1){
					$this->master->head(["title" => $category->KategoriAdi]);
					
					$this->master->end();
				}
				else{
					$this->redirect();
				}
			}
			else{
				$this->redirect();
			}
		}
	}
?>