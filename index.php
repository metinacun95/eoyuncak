<?php
/*
	* mvc
	* @package mvc
	* @author Mustafa Çolakoğlu
	* @since Version 1.0
*/
	try{
		define("PATH",__DIR__ . DIRECTORY_SEPARATOR);
		include PATH."/System/Autoload.php";
		include PATH."/System/functions.php";
		new System\Autoload;
		new System\Libraries\Load();
	}
	catch(Exception $e){
		echo $e->message();
	}
//---------------------------------------------------------------------------
/* End of file index.php */
/* Location : ./index.php*/
?>