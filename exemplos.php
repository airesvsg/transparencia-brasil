<?php
	
	/**
	 *
	 * @author: Aires Gonçalves <airesvsg@gmail.com>
	 *
	 **/

	require_once(dirname(__FILE__).'/lib/autoload.php');

	$config = array('token' => 'MEU_TOKEN');

	$transparenciaBrasil = new transparenciaBrasil\transparenciaBrasil($config);

	$cargos = $transparenciaBrasil->cargos->listar();
	
	if($cargos->erro()){
		echo $cargos->mensagem();
	}else{
		var_dump($cargos->dados());
	}

	$partidos = $transparenciaBrasil->partidos->listar();
	
	if($partidos->erro()){
		echo $partidos->mensagem();
	}else{
		var_dump($partidos->dados());
	}

	$estados = $transparenciaBrasil->estados->listar();
	
	if($estados->erro()){
		echo $estados->mensagem();
	}else{
		var_dump($estados->dados());
	}

	$excelencias = $transparenciaBrasil->excelencias->cameraDosDeputados()->estado('rj')->listar();
	
	if($excelencias->erro()){
		echo $excelencias->mensagem();
	}else{
		var_dump($excelencias->dados());
	}

	$excelencias = $transparenciaBrasil->excelencias->listar('id_excelencia');
	
	if($excelencias->erro()){
		echo $excelencias->mensagem();
	}else{
		var_dump($excelencias->dados());
	}

	$excelenciaBens = $transparenciaBrasil->excelencias->bens()->listar('id_excelencia');
	
	if($excelenciaBens->erro()){
		echo $excelenciaBens->mensagem();
	}else{
		var_dump($excelenciaBens->dados());
	}

	$candidatos = $transparenciaBrasil->candidatos->estado('rj')->cargo(3)->listar();
	
	if($candidatos->erro()){
		echo $candidatos->mensagem();
	}else{
		var_dump($candidatos->dados());
	}

	$candidatosBens = $transparenciaBrasil->candidatos->bens()->listar('id_candidato');
	
	if($candidatosBens->erro()){
		echo $candidatosBens->mensagem();
	}else{
		var_dump($candidatosBens->dados());
	}

	$candidatosDoadores = $transparenciaBrasil->candidatos->doadores()->listar('id_candidato');
	
	if($candidatosDoadores->erro()){
		echo $candidatosDoadores->mensagem();
	}else{
		var_dump($candidatosDoadores->dados());
	}

	$candidatosCandidaturas = $transparenciaBrasil->candidatos->candidaturas()->listar('id_candidato');
	
	if($candidatosCandidaturas->erro()){
		echo $candidatosCandidaturas->mensagem();
	}else{
		var_dump($candidatosCandidaturas->dados());
	}

	$candidatosEstatisticas = $transparenciaBrasil->candidatos->estatisticas()->listar('id_candidato');
	
	if($candidatosEstatisticas->erro()){
		echo $candidatosEstatisticas->mensagem();
	}else{
		var_dump($candidatosEstatisticas->dados());
	}