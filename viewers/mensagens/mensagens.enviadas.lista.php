<?php session_start();
 ?>

<script>
	$(document).ready(function(e) {

    });
</script>

<?php
	require_once "../../engine/config.php";
?>
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
<script src="js/modernizr.js"></script> <!-- Modernizr -->