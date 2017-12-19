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
		"App\Controllers\AdminController" => [
			"index" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"category" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"createCategory" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"updateCategory" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"deleteCategory" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"product" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"createProduct" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"updateProduct" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"deleteProduct" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"user" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"createUser" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"updateUser" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"deleteUser" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"order" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"createOrder" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"updateOrder" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"deleteOrder" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ],
			"login" => [ "method" => "!App\Controllers\AdminController@isLogin","redirect" => "admin/index.html"],
			"logout" => [ "method" => "App\Controllers\AdminController@isLogin","redirect" => "admin/login.html" ]
		]
	];
?>