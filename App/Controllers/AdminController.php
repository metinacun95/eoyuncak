<?php
	namespace App\Controllers;
	use App\Controllers\MasterController;
	use App\Models\UserModel;
	use App\Models\IOModel;
	use App\Models\OrderModel;
	use App\Models\ProductModel;
	use GUMP;
	use PHPMailer;
	class AdminController extends Controller{ // HomeController@index
		public $master;
		public function __construct(){
			parent::__construct();
			$this->master = new AdminMasterController();
		}
		public function index(){
			$this->master->head(["title" => "Admin Anasayfa"]);
		}
		public function category(){
			$this->master->head(["title" => "Admin-Kategoriler"]);
			$p = new ProductModel;
			$categories = $p->getCategories();
			return $this->view("Admin/Categories", ["categories"  => $categories, "link" => $this->link, "p" => $p]);
		}
		public function createCategory(){
			$p = new ProductModel;
			if($_POST){
				$catId = 0;
				$catDizi = [];
				foreach($_POST["KategoriId"] as $c){
					$catDizi[] = $c;
				}
				for($i = count($catDizi) - 1;$i>=0;$i--){
					if($catDizi[$i] != 0){
						$catId = intval($catDizi[$i]);
						break;
					}
				}
				$yeni = toHtmlChars($this->request->yeniKategori);
				$p->newCategory($yeni,$catId);
				return $this->redirect("admin/category.html");
			}
			$this->master->head(["title" => "Admin-Kategori Ekle"]);
			return $this->view("Admin/AddCategory", ["link" => $this->link]);
		}
		public function updateCategory(){
			$p = new ProductModel;
			$categoryId = intval($this->params["id"]);
			if($categoryId > 0){
				$category = $p->getCategory($categoryId);
				if($category != null){
					if(isset($this->request->yeniAd)){
						$yeniAd = toHtmlChars($this->request->yeniAd);
						$p->updateCategory($categoryId,$this->request->yeniAd);
						$category = $p->getCategory($categoryId);
					}
					$this->master->head(["title" => "Admin-Kategori Düzenle"]);
					$this->view("Admin/UpdateCategory",["link" => $this->link,"category" => $category]);
				}
				else{
					$this->redirect("");
				}
			}
			else{
				$this->redirect("");
			}
		}

		public function deleteCategory(){
			$p = new ProductModel;
			$p->deleteCategory(intval($this->params["id"]));
			$this->redirect("admin/category.html");
		}
		public function product(){
			$this->master->head(["title" => "Admin-Ürünler"]);
			$p = new ProductModel;
			$products = $p->getAll();
			return $this->view("Admin/Products", ["products"  => $products, "link" => $this->link, "p" => $p]);
		}
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
		public function createProductType(){
			$this->master->head(["title"=> "Admin - Yeni Ürün Tipi Oluştur"]);
			return $this->view("Admin/CreateProductType",["link"=>$this->link]);
		}
		function addNewProductType(){
			if(isset($_POST["TipAdi"],$_POST["KategoriId"])){
				$tipAdi = toHtmlChars($_POST["TipAdi"]);
				$kategoriId = intval($_POST["KategoriId"]);
				$p = new ProductModel();
				echo $p->addNewProductType($tipAdi,$kategoriId);
			}
			else{
				echo 0;
			}
		}
		function addFeatureToProductType(){
			$id = intval($this->params["id"]);
			$error = 0;
			if(isset($_POST["OzellikAdi"],$_POST["OzellikCins"],$_POST["degerler"])){
				$OzellikAdi = toHtmlChars($_POST["OzellikAdi"]);
				$OzellikCins = toHtmlChars($_POST["OzellikCins"]);
				$degerler = $_POST["degerler"];
				if($degerler == ""){
					$degerler = [];
				}
				else{
					$degerler = explode(",",$degerler);
					for($i=0;$i<count($degerler);$i++){
						$degerler[$i] = toHtmlChars($degerler[$i]);
					}
				}
				$p = new ProductModel;
				if($p->addFeatureToProductType($id,$OzellikAdi,$OzellikCins,$degerler)){
					$error = 1;
				}
				else{
					$error = 2;
				}
			}
			$this->master->head(["title"=> "Admin - Ürün Tipine Özellik Ekle"]);
			return $this->view("Admin/addFeatureToProductType",["link"=>$this->link,"error" => $error]);
		}
		function addDetailProductType(){
			$this->master->head(["title"=> "Admin - Ürün Tipine Özellik Ekle"]);
			return $this->view("Admin/addDetailProductType",["link"=>$this->link]);
		}
		public function createProduct(){
			$this->master->head(["title" => "Admin-Yeni Ürün Ekle"]);
			return $this->view("Admin/NewProduct", ["link" => $this->link]);
		}
		function uploadImageProduct(){
			$id = intval($this->params["id"]);
			$p = new ProductModel;
			$getProduct = $p->getKayit0($id);
			if(count($getProduct) > 0){
				if($getProduct->UyeId == $_SESSION["userId"]){
					if($_FILES){
						if(isset($_FILES["urunResim"])){
							$urunResim = $_FILES["urunResim"];
							if($urunResim["type"] == "image/jpeg" or $urunResim["type"] == "image/png"){
								$p->insertImageToProduct($id,$urunResim["tmp_name"]);
								return $this->redirect("admin/product.html");
							}else{
								$this->master->head(["title" => "Admin-Yeni Ürün Ekle"]);
								return $this->view("Admin/UploadImageProduct", ["link" => $this->link,"error" => 1]);
							}
						}
					}
					else{
						$this->master->head(["title" => "Admin-Yeni Ürün Ekle"]);
						return $this->view("Admin/UploadImageProduct", ["link" => $this->link]);
					}
				}
				else{
					
					return $this->redirect("");
				}
			}
			else{
				return $this->redirect("");
			}
		}
		public function updateProduct(){
			$id = intval($this->params["id"]);
			if($id > 0){
				$p = new ProductModel;
				$product = $p->get($id);
				$this->master->head(["title" => "Admin-Ürün Düzenle"]);
				return $this->view("Admin/UpdateProduct", ["link" => $this->link,"product"=>$product,"p" => $p]);
			}
			else{
				$this->redirect("");
			}
		}

		public function deleteProduct(){
			$p = new ProductModel;
			$p->delete(intval($this->params["id"]), $_SESSION["userId"]);
			$this->redirect("admin/product.html");
		}
		public function user(){
			$this->master->head(["title" => "Admin-Üyeler"]);
			$u = new UserModel;
			$users = $u->getAll();
			return $this->view("Admin/Users", ["users"  => $users, "link" => $this->link, "u" => $u]);
		}
		public function createUser(){}
		public function updateUser(){}

		public function deleteUser(){
			$u = new UserModel;
			$u->destroy(intval($this->params["id"]));
			$this->redirect("admin/user.html");
		}
		public function order(){
			$this->master->head(["title" => "Admin-Siparişler"]);
			$o = new OrderModel;
			$orders = $o->getAll();
			return $this->view("Admin/Orders", ["orders"  => $orders, "link" => $this->link]);
		}
		public function createOrder(){}
		public function updateOrder(){}

		public function sendOrder(){
			$o = new OrderModel;
			$o->send(intval($this->params["id"]));
			$this->redirect("admin/order.html");
		}
		function login(){
			if($_POST){
				$io = new IOModel;
				$validator = GUMP::is_valid($_POST,[
					"username" => "required",
					"password" => "required"
				]);

				if($validator === true){
					$io->adminLogin($this->request->username, $this->request->password);
					if($this->isLogin()){
						$this->redirect('admin');
					}
				}else{
					$_SESSION["FLASH_LOGIN"] = $validator;
					$this->redirect("admin/login.html");
				}
			}
			$this->view("Admin/Login",["link" => $this->link]);
		}
		function logout(){
			if(isset($_SESSION["userId"],$_SESSION["rolId"],$_SESSION["userName"],$_SESSION["md5"],$_SESSION["adminLogin"])){
				unset($_SESSION["userId"]);
				unset($_SESSION["rolId"]);
				unset($_SESSION["userName"]);
				unset($_SESSION["md5"]);
				unset($_SESSION["adminLogin"]);
			}
			$this->redirect("admin/login.html");
		}
		function isLogin(){
			if(isset($_SESSION["adminLogin"])){
				return true;
			}
			return false;
		}

		function about(){
			$this->master->head(["title" => "Admin-Hakkımızda"]);
			$io = new IOModel;
			if($_POST){
				$io->updateHakkimizda($_POST["hakkimda"]);?>
				<script>alert("Yazı Güncellendi");</script><?php
				
			}
			$data=[];
			$data["hakkimizda"] = $io->getHakkimizda();
			$this->view("Admin/Hakkimizda",$data); 
		}

		function contact(){
			$this->master->head(["title" => "Admin-İletişim"]);
			$io = new IOModel;
			if($_POST){
				$io->updateIletisim($_POST["telno"],$_POST["email"],$_POST["facebook"],$_POST["twitter"]);?>
				<script>alert("Bilgiler Güncellendi");</script><?php
				
			}
			$data=[];
			$data["iletisim"] = $io->getIletisim();
			$this->view("Admin/Iletisim",$data); 
		}
	}
?>