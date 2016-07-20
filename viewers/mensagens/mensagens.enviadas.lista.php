<?php session_start();
 ?>

<script>
	$(document).ready(function(e) {

    });


</script>
<script src="js/modernizr.js"></script> <!-- Modernizr -->
<?php
	require_once "../../engine/config.php";
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!--Breadrumb-->
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Mensagens</a></li>
    <li class="active">Mensagens Enviadas</li>
</ol>
<?php

	$user = new Usuario;
	$user = $user->Read($_SESSION['id_user']);
	$Mensagem = new Mensagem; //instancia Mensagem
	$Mensagem = $Mensagem->ReadUserEnv_JointInfo($user['id_usuario']); //lê todos os registros no BD

	if(empty($Mensagem)){
		?>
        	<h4 class="alert-warning">Nenhum dado encontrado!</h4>
        <?php
	}
	else{
		?>
        <h2 class="well" align="center" role="heading">Mensagens enviadas por <?php echo $user['nome_usuario']; ?></h2>
        <section id="cd-timeline" class="cd-container">
        
		<?php
			foreach($Mensagem as $itemRow){
				
				$msg = $itemRow;
				$Status = new Status; //Instancia Status
				$Status = $Status->ReadMensagem($msg['id_mensagem']);			
				
				if ($Status['status_mensagem'] === '0'){
					$statusMensagem = 'Não Lida';
					}else{
					$statusMensagem = 'Lida';
				}
				$Usuario = new Usuario;
				$Usuario = $Usuario->Read($Status['id_usuario']);
		?>
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Para: <?php echo $Usuario['nome_usuario']; ?></h2>
                <p><?php echo $itemRow['assunto_mensagem']; ?></p>
				<p><?php echo $itemRow['conteudo_mensagem']; ?></p>
				<a href="#0" class="cd-read-more"><?php echo $statusMensagem; ?></a>
				<span class="cd-date"><?php echo $itemRow['data_mensagem']; ?></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
        <?php
			}
		?>
		</section> <!-- cd-timeline -->
<?php
      }
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/timeline.js"></script>