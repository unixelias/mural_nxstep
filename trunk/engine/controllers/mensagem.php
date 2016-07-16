<?php

	require_once "../config.php";
	

	//parte1
	
	$id_mensagem = $_POST['id_mensagem'];
	$id_usuario = $_POST['id_usuario'];
	$conteudo_mensagem = $_POST['conteudo_mensagem'];
	$assunto_mensagem = $_POST['assunto_mensagem'];
	$hora_mensagem = $_POST['hora_mensagem'];
	$data_mensagem = $_POST['data_mensagem'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Mensagem();
	$Item->SetValues($id_mensagem, $id_usuario, $conteudo_mensagem, $assunto_mensagem, $hora_mensagem, $data_mensagem); 
	
	
		
	//parte4
	switch($action) {
		case 'create':
			
			
			$res = $Item->Create();
			if ($res === NULL) {
				$res = "true";
			}
			else {
				$res = "false";	
			}			

			echo $res;
			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update();
			
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		
		
	}
?>
