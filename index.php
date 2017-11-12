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
<html>
<head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css">
    <link href='fonts' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href="img/logo_nxstep_preto.png">
    <!-- Resource style -->
    <title>Mural NxStep</title>

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
           <img src="img/logo_mural_nxstep.svg">
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	<ul class="nav navbar-nav navbar-right">
            	<li><a href="#" id="home"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Home </a></li>
		        <li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Mensagens <span class="caret"></span></a>
              		<ul class="dropdown-menu">
                		<li><a href="#" id="nova_mensagem_link">Nova Mensagem</a></li>
                		<li><a href="#" id="mensagens_enviadas_link">Mensagens Enviadas</a></li>
                		<li><a href="#" id="mensagens_recebidas_link">Mensagens Recebidas</a></li>
              		</ul>
            	</li>
                <li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuários <span class="caret"></span></a>
                    <ul class="dropdown-menu ">
                    	<li><a href="#" id="perfil_usuario_link">Meu Perfil</a></li>
                        <li><a href="#" id="perfis_usuarios_link">Lista de Usuários</a></li>
                    </ul>
	            </li>
            	<li><a href="#" id="getout"><i class="fa fa-sign-out" aria-hidden="true"></i><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair </a></li>
        	</ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <br />
    <br />
    <br />
    <br />
    <br />
   	<main class="container-fluid" id="loader">
      <div id="content"></div>
    </main>

    <footer class="mural-footer">
    	<p class="text-center footer-texto">Copyright © Next Step 2016. Todos os direitos reservados. </p>
    </footer>
	<script src="node_modules/jquery/dist/jquery.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/jquerymask.min.js"></script>
	<script src="js/main.js"></script>
    <script src="js/timeline.js"></script>
    <script src="js/load.js"></script>

</body>
</html>
