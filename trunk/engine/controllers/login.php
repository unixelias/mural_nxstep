<?php session_start();

	require_once "../config.php";

	//1. Receber os dados do form
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$res;

	//2. Validar os dados

	$user = new Usuario();
	$user = $user->ReadByEmail($email);

	if($user === NULL){
		$res = 'no_user_found';
		session_destroy();
	}
	else{
		$verificaEmail = strcmp($email,$user['email_usuario']);
		if($verificaEmail === 0){
			$verificaSenha = strcmp($senha,$user['senha_usuario']);
			if($verificaSenha === 0){

				$_SESSION['id_user'] = $user['id_usuario'];
				$_SESSION['name_user'] = $user['nome_usuario'];

				$res = 'true';
			}
			else{
				$res = 'wrong_password';
				session_destroy();
			}
		}
		else{
			$res = 'wrong_user_found';
			session_destroy();
		}
	}

	echo $res;

?>
