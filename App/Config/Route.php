<?php
	return [
		"directs" => [
			"/" => "App\Controllers\HomeController@index",
			"login.html" => "App\Controllers\IOController@login",
			"logout.html" => "App\Controllers\IOController@logout",
			"user.html" => "App\Controllers\UserController@index",
			"signUp.html" => "App\Controllers\UserController@signUp",
			"profile.html" => "App\Controllers\UserController@profile",
			"editprofile.html" => "App\Controllers\UserController@editprofile",
			"cart.html" => "App\Controllers\CartController@index",
			"addcart.html" => "App\Controllers\CartController@addCart",
			"newproduct.html" => "App\Controllers\ProductController@newproduct",
			"tnewProduct.html" => "App\Controllers\TestController@newProduct",
			"tnewProductAjax" => "App\Controllers\TestController@newProductAjax",
			"admin" => "App\Controllers\AdminController@index"
		],
		"preg_matches" =>[
			"product/(.*?).html" => "App\Controllers\ProductController@product -> {productSef => [1]}",
			"editproduct/(.*?).html" => "App\Controllers\ProductController@editproduct -> {productSef => [1]}",
			//"deleteproduct/(.*?).html" => "App\Controllers\ProductController@deleteproduct -> {productSef => [1]}",
			"deletecart/(.*?).html" => "App\Controllers\CartController@deletecart -> { productId => [1] }",
			"categories.html" => "App\Controllers\CategoryController@index",
			"category/(.*?).html" => "App\Controllers\CategoryController@category -> { categorySef => {1} }",
			"ajaxSearch" => "App\Controllers\AjaxController@search",
			"ajax" => "App\Controllers\AjaxController@index",
			"admin/login.html" => "App\Controllers\AdminController@login",
			"admin/logout.html" => "App\Controllers\AdminController@logout",
			"admin/category.html" => "App\Controllers\AdminController@category",
			"admin/product.html" => "App\Controllers\AdminController@product",
			"admin/user.html" => "App\Controllers\AdminController@user",
			"admin/order.html" => "App\Controllers\AdminController@order",
			"admin/createCategory.html" => "App\Controllers\AdminController@createCategory",
			"admin/createProduct.html" => "App\Controllers\AdminController@createProduct",
			"admin/createUser.html" => "App\Controllers\AdminController@createUser",
			"admin/createOrder.html" => "App\Controllers\AdminController@createOrder",
			"admin/updateCategory/(.*?).html" => "App\Controllers\AdminController@updateCategory -> { id => {1}}",
			"admin/updateUser/(.*?).html" => "App\Controllers\AdminController@updateUser -> { id => {1}}",
			"admin/updateOrder/(.*?).html" => "App\Controllers\AdminController@updateOrder -> { id => {1}}",
			"admin/updateProduct/(.*?).html" => "App\Controllers\AdminController@updateProduct -> { id => {1}}",
			"admin/deleteCategory/(.*?).html" => "App\Controllers\AdminController@deleteCategory",
			"admin/deleteProduct/(.*?).html" => "App\Controllers\AdminController@deleteProduct",
			"admin/deleteUser/(.*?).html" => "App\Controllers\AdminController@deleteUser",
			"admin/deleteOrder/(.*?).html" => "App\Controllers\AdminController@deleteOrder"
			//"/" => "App\Controllers\HomeController@index"
			/*"Kategori/(.*?)/Sayfa/(.*?).html" => "App\Controllers\KategoriController@sayfa -> {kategoriSefLink => [1], sayfaId => [2]}",
			"Kategori/(.*?).html" => "App\Controllers\KategoriController@index -> {kategoriSefLink => [1]}",
			"Cicek/(.*?).html" => "App\Controllers\CicekController@index -> {cicekSefLink => [1]}",
			"Urunler/Sayfa/(.*?).html" => "App\Controllers\KategoriController@hepsiSayfa -> {sayfaId => [1]}",
			"cicekAdmin/kategoriDuzenle/(.*?)" =>"App\Controllers\AdminController@kategoriDuzenle2 -> {kategoriId => [1]}",
			"cicekAdmin/kategoriSil/(.*?)" =>"App\Controllers\AdminController@kategoriSil -> {kategoriId => [1]}",
			"cicekAdmin/cicekDuzenle/(.*?)" =>"App\Controllers\AdminController@cicekDuzenle2 -> {cicekId => [1]}",
			"cicekAdmin/cicekSil/(.*?)" =>"App\Controllers\AdminController@cicekSil -> {cicekId => [1]}"*/
			
		],
		"P404" => "App\Controllers\P404@index"
	];
?>