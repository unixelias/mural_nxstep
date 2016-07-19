<?php session_start();

  if(empty($_SESSION)){
    ?>
    <script>
       document.location.href='login/';
    </script>

<?php
  }

 ?>

<!doctype html>
<html class="no-js">
<head>

    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>

    <title>Mural NxStep</title>

    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top ">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" id="">Sistema de Comunicações NextStep</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id="home">HOME </a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> MENSAGENS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#" id="nova_mensagem_link">Nova Mensagem</a></li>
                <li><a href="#" id="mensagens_pessoais_link">Pessoal</a></li>
                <li><a href="#" id="mensagens_geral_link">Geral</a></li>
              </ul>
            </li>
            <li><a href="#" id="gerenciamento_usuario_link">GERENCIAR USUÁRIOS</a></li>

            <li><a href="#" id="getout"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR </a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


    <main class="container-fluid" id="loader">

    	<h1 id="h1teste">Teste</h1>

    </main>



    <footer class="treinamentofooter container-fluid">
    	<p class="text-center"> Copyright © Next Step 2016. Todos os direitos reservados. </p>
    </footer>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/jquerymask.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/main.js"></script>
    <script src="js/timeline.js"></script>

</body>
</html>
