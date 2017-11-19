<?php
	return [
		"App\Controllers\HomeController" => [
			"anyMethod" => [
				// rules
				"method" => "App\Models\LoginModel@isLogin",
				"redirect" => "P404"
			],
			"anyMethod2" => "*" // public access
		],
		"App\Controllers\IOController" => [
			"login" => [
				"method" => "!App\Models\IOModel@isLogin",
				"redirect" => ""
			],
			"logout" => [
				"method" => "App\Models\IOModel@isLogin",
				"redirect" => ""
			]
		],
		"App\Controllers\UserController" => [
			"signUp" => [
				"method" => "!App\Models\IOModel@isLogin",
				"redirect" => ""
			],
			"index" => [
				"method" => "App\Models\IOModel@isLogin",
				"redirect" => ""
			]
			,
			"profile" => [
				"method" => "App\Models\IOModel@isLogin",
				"redirect" => ""
			],
			"editprofile" => [
				"method" => "App\Models\IOModel@isLogin",
				"redirect" => ""
			]
		],
		"App\Controllers\CartController" => [
			"index" => "*",
			"addCart" => "*",
			"deletecart" => "*"
		],
		"App\Controllers\ProductController" => [
			"product" => "*",
			"newproduct" => [
				"method" => "App\Models\IOModel@isLogin",
				"redirect" => ""
			]
			,
			"editproduct" => [
				"method" => "App\Models\IOModel@isLogin",
				"redirect" => ""
			],
			"deleteproduct" => [
				"method" => "App\Models\IOModel@isLogin",
				"redirect" => ""
			]
		],
	];
?>