<?php 
	session_start();
	
	$GLOBALS['config'] = array(
		'mysql' => array(
			'host' 		=> '127.0.0.1',
			'dbname'	=> 'venice',
			'kullanici' => 'root',
			'sifre'		=> ''
		),
		'session' => array(
			'session_ismi' => 'session',
			'token_ismi'   => 'token'
		)
	);
	
	spl_autoload_register(function($class){
		
		require_once 'class/'.$class.'.php';
	});
	
	@require_once 'fonksiyon/fonksiyon.php';
?>