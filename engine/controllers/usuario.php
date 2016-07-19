<?php

	require_once "../config.php";


	//parte1

	$id_usuario = $_POST['id_usuario'];
	$nome_usuario = $_POST['nome_usuario'];
	$email_usuario = $_POST['email_usuario'];
	$senha_usuario = $_POST['senha_usuario'];
	$matricula_usuario = $_POST['matricula_usuario'];


	//parte2
	$action = $_POST['action'];

	//parte3
	$Item = new Usuario();
	$Item->SetValues($id_usuario, $nome_usuario, $email_usuario, sha1($senha_usuario), $matricula_usuario);



	//parte4
	switch($action) {
		case 'create':

			$Item = new Usuario();
			$Item->SetValues($id_usuario, $nome_usuario, $email_usuario, $senha_usuario, $matricula_usuario);

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
