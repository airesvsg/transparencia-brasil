<?php
	
	/**
	 *
	 * @author: Aires Gonçalves <airesvsg@gmail.com>
	 *
	 **/

	namespace transparenciaBrasil;

	class excelencias extends base {

		protected $areas_permitidas = array('bens');

		public function estado($estado){
			$this->setParametros(array('estado' => $estado));
			return $this;
		}

		public function partido($partido){
			$this->setParametros(array('partido' => $partido));
			return $this;
		}

		public function casa($casa){
			$this->setParametros(array('casa' => $casa));
			return $this;
		}

		public function nome($nome){
			$this->setParametros(array('nome' => $nome));
			return $this;
		}

		public function cameraDosDeputados(){
			$this->casa(casas::CAMERA_DOS_DEPUTADOS);
			return $this;
		}

		public function senadoFederal(){
			$this->casa(casas::SENADO_FEDERAL);
			return $this;
		}

	}