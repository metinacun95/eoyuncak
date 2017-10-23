<?php
	return [
		"App\Controllers\HomeController" => [
			"anyMethod" => [
				// rules
				"method" => "App\Models\LoginModel@isLogin",
				"redirect" => "P404"
			],
			"anyMethod2" => "*" // public access
		]
	];
?>