<?php
	namespace System\Libraries;
	use Exception;
	use System\Libraries\Config;
	class Ex extends Exception{
		protected $error;
		private $showErrors;
		public function __construct($error){
			$this->error = $error;
			$config = new Config();
			$this->showErrors = $config->get("Site","debug");
		}
		public function message(){
			if($this->showErrors){
				return '<table style="backgound:#ccc;width:500px">
					<tr><td style="background:red;color:white;">'.$this->error["title"].'</td></tr>
					<tr><td style="background:#ccc">'.$this->error["errorMessage"].'</td></tr>
				</table>';
			}
			else{
				return "";
			}
		}
	}
?>