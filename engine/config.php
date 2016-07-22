<?php

	date_default_timezone_set('America/Sao_Paulo');

	require_once "bd/bd.php";
	require_once "classes/mensagem.php";
	require_once "classes/status.php";
	require_once "classes/usuario.php";


	function ExibeData($data){
		$dataCerta = explode('-', $data);
		$dataCerta = $dataCerta[2].'/'.$dataCerta[1].'/'.$dataCerta[0];
		return $dataCerta;
	}

	function ExibeDia($data){
		$diaMsg = explode('-', $data);
		return $diaMsg[2];
	}

	function ExibeMes($data){
		$mesMsg = explode('-', $data);
		return $mesMsg[1];
	}

	function ExibeAno($data){
		$anoMsg = explode('-', $data);
		return $anoMsg[0];
	}

	function Showhm($hora){
		$horas = explode(':', $hora);
		echo $horas[0].':'.$horas[1];
	}

?>
