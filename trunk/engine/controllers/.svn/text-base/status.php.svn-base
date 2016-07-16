<?php

	require_once "../config.php";
	

	//parte1
	
	$id_status = $_POST['id_status'];
	$id_mensagem = $_POST['id_mensagem'];
	$id_usuario = $_POST['id_usuario'];
	$status_mensagem = $_POST['status_mensagem'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Status();
	$Item->SetValues($id_status, $id_mensagem, $id_usuario, $status_mensagem); 
	
	
		
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
