<?php
	
	/**
	 *
	 * @author: Aires Gonçalves <airesvsg@gmail.com>
	 *
	 **/

	namespace transparenciaBrasil;

	abstract class base {

		private $id;
		private $base;
		private $area;
		private $cliente;
		private $urlBase;
		private $parametros;

		public function __construct($obj){
			if($obj instanceof transparenciaBrasil){
				$this->base = $obj;
				$this->cliente = new cliente($this->base->getToken());
				$this->setUrlBase(basename(get_class($this)));
			}
		}

		public function setId($id){
			$this->id = is_numeric($id) && $id ? $id : null;
			return $this;
		}

		protected function getId(){
			return $this->id;
		}

		public function setUrlBase($path){
			$this->urlBase = transparenciaBrasil::getUrlBase().trim($path, '/').'/';
			return $this;
		}

		public function setArea($area){
			if(isset($this->areas_permitidas) && is_array($this->areas_permitidas) && in_array($area, $this->areas_permitidas)){
				$this->area = $area;
			}
			return $this;
		}

		protected function getArea($url=true){
			if($this->area && $url)
				$this->area = "/{$this->area}";
			return $this->area;
		}

		public function setPaginacao($limit=null, $offset=null){
			if(is_numeric($limit) && is_numeric($offset)){
				$this->setParametros(
					array(
						'_limit'  => $limit,
						'_offset' => $offset,
					)
				);				
			}
			return $this;
		}

		protected function setParametros($dados){
			if(is_array($dados) && count($dados)>0){
				if(is_array($this->parametros) && count($this->parametros)>0){
					$this->parametros = array_merge($this->parametros, $dados);
				}else{
					$this->parametros = $dados;
				}
			}
			return $this;
		}

		protected function getParametros(){
			return is_array($this->parametros) && count($this->parametros)>0 ? $this->parametros : null;
		}


		public function listar($id=null){
			if($id) $this->setId($id);
			return $this->cliente->receber($this->urlBase.$this->getId().$this->getArea(), $this->getParametros());
		}


	}