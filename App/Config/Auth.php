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
		]
	];
?>