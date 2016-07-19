<?php session_start();
  if(!empty($_SESSION)){
    require_once "../engine/config.php";
    $user = new Usuario();
    $user = $user->Read($_SESSION['id_user']);
    if(empty($user)){
        session_destroy();
    }
    
  }
 ?>

<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title>Sistema :: Login</title>

    <link rel="stylesheet" href="../css/bootstrap.css">

</head>

<main class="container-fluid" id="loader_login">
<body>
	<br>
	<section class="row">
    	<section class="col-md-3"></section>
        <section class="col-md-6 text-center well">
        	<h1> Login </h1>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Email *</span>
              <input type="text" class="form-control" id="email_login" placeholder="Email" aria-describedby="basic-addon1">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Senha *</span>
              <input type="password" class="form-control" id="senha_login" placeholder="Senha" aria-describedby="basic-addon1">
            </div>
            <br>
            <button class="btn btn-success" id="Logar"> Enviar </button>
            <button class="btn" id="cadastro"> Cadastre-se </button>
        </section>
        <section class="col-md-3"></section>
    </section>

  </main>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/login.js"></script>
</body>
</html>
