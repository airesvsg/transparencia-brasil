<?php
	
	/**
	 *
	 * @author: Aires Gonçalves <airesvsg@gmail.com>
	 *
	 **/

	namespace transparenciaBrasil;
    
	class resposta {
        
        private $resposta;

        private static $STATUS_ERRO = array(
            200 => 'Sucesso!',
            400 => 'A requisição possui parametro(s) inválido(s)',
            401 => 'O token de acesso não foi informado ou não possui acesso as APIs.',
            404 => 'O recurso informado no request não foi encontrado.',
            413 => 'A requisição está ultrapassando o limite permitido para o perfil do seu token de acesso.',
            422 => 'A requisição possui erros de negócio.',
            429 => 'O consumidor estourou o limite de requisições por tempo.',
            500 => 'Erro não esperado, algo está quebrado na API.',
        );

        public function __construct($resposta, $codigoHttp){
            $this->resposta = new \StdClass;
            $dados = json_decode($resposta);
            $this->resposta->erro = $codigoHttp != 200;
            $this->resposta->dados  = $dados;
            $this->resposta->codigoHttp = $codigoHttp;
            $this->resposta->mensagem = "Erro!";
            if(isset($dados->message)){
                $this->resposta->mensagem = $dados->message;
            }
            if(!isset($dados->message) && array_key_exists($codigoHttp, self::$STATUS_ERRO)){
                $this->resposta->mensagem = self::$STATUS_ERRO[$codigoHttp];
            }
        }

        public function erro(){
            return $this->resposta->erro;
        }

        public function dados(){
            return $this->resposta->dados;
        }

        public function mensagem(){
            return $this->resposta->mensagem;
        }

        public function codigoHttp(){
            return $this->resposta->codigoHttp;
        }

        public function __isset($name){
            if(isset($this->resposta->{$name}))
                return $this->resposta->{$name};
        }
        
	}
