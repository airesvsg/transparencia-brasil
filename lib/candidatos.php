<?php
	
	/**
	 *
	 * @author: Aires Gonçalves <airesvsg@gmail.com>
	 *
	 **/

	namespace transparenciaBrasil;

	class candidatos extends base {

		protected $areas_permitidas = array('bens','doadores','candidaturas','estatisticas');

		public function __construct($obj){
			parent::__construct($obj);
			$this->setUrlBase('candidatos');
		}

		public function listar($id=null, $limit=null, $offset=null){
			if(is_numeric($limit) && is_numeric($offset))
				$this->setPaginacao($limit, $offset);
			return parent::listar($id);
		}

		public function estado($estado){
			$this->setParametros(array('estado' => $estado));
			return $this;
		}

		public function partido($partido){
			$this->setParametros(array('partido' => $partido));
			return $this;
		}

		public function cargo($cargo){
			$this->setParametros(array('cargo' => $cargo));
			return $this;
		}

		public function nome($nome){
			$this->setParametros(array('nome' => $nome));
			return $this;
		}

	}