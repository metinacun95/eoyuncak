<?php
	return [
		"directs" => [
			"/" => "App\Controllers\HomeController@index",
			"login.html" => "App\Controllers\IOController@login"
		],
		"preg_matches" =>[
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