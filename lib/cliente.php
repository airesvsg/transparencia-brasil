<?php
	
	/**
	 *
	 * @author: Aires Gonçalves <airesvsg@gmail.com>
	 *
	 **/

	namespace transparenciaBrasil;
    
    class cliente {

        private $curl;
        private $resposta;

        public function __construct($token=''){
            $this->inicializar($token);
        }

        private function inicializar($token){
            $this->curl = curl_init();
            $cabecalho  = array("App-Token: {$token}", "Accept: application/json");
            curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $cabecalho);
            curl_setopt($this->curl, CURLINFO_HEADER_OUT, true);
        }

        public function receber($url, $dados=array()){
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'GET');           
            curl_setopt($this->curl, CURLOPT_URL, is_array($dados) && count($dados) > 0 ? sprintf("%s?%s", $url, http_build_query($dados)) : $url);
            return $this->executar();
        }

        private function executar(){
            $resposta       = curl_exec($this->curl);
            $codigo_http    = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
            $this->resposta = new resposta($resposta, $codigo_http);
            return $this->resposta;
        }

        public function resposta(){
            return $this->resposta;
        }
        
    }
