<?php
	
	/**
	 *
	 * @author: Aires Gonçalves <airesvsg@gmail.com>
	 *
	 **/
	
	namespace transparenciaBrasil;

	class transparenciaBrasil {

		private static $CLASSES = array('candidatos','partidos','estados','cargos','excelencias');
		private static $URLBASE = 'http://api.transparencia.org.br/api/v1/';

		private static $CONFIG;
		private static $INSTANCIA;

		private $token;

		public function __construct($config){
			if(is_array($config) && array_key_exists('token', $config) && $config['token']){
				$this->setToken($config['token']);
				self::$CONFIG = $config;
			}
		}

		public function __get($obj){
			if(!in_array($obj, self::$CLASSES)){
				throw new Exception("Objeto inválido.", 1);
			}else{
				$classe = __NAMESPACE__ . "\\" . $obj; 
				$this->{$obj} = new $classe($this);
				return $this->{$obj};
			}
		}

		public static function getUrlBase(){
			return self::$URLBASE;
		}

		public static function instancia(){
			if(is_null(self::$INSTANCIA))
				self::$INSTANCIA = new self(self::$CONFIG);
			return self::$INSTANCIA;
		}

		public function setToken($token){
			if($token)
				$this->token = $token;
			return $this;
		}

		public function getToken(){
			return $this->token;
		}

	}