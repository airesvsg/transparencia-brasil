<?php
	
	/**
	 *
	 * @author: Aires Gonçalves <airesvsg@gmail.com>
	 *
	 **/

	namespace transparenciaBrasil;

	class autoload {
		public static function carregar($classe){
			$classe = dirname(__FILE__)."/".basename($classe).".php";
			if(file_exists($classe))
				require_once($classe);			
		}
	}

	\spl_autoload_register(__NAMESPACE__."\autoload::carregar");