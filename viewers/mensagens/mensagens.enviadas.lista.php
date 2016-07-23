<?php session_start();
 ?>

<script>
	$(document).ready(function(e) {

    });
</script>
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Mensagens</a></li>
    <li class="active">Mensagens Enviadas</li>
</ol>

<h2 class="well" align="center" role="heading">Mensagens enviadas por <?php echo $_SESSION['name_user']; ?></h2>

<?php
	require_once "../../engine/config.php";


	$Mensagem = new Mensagem; //instancia Mensagem
	$Mensagem = $Mensagem->ReadAll_Join_Enviadas($_SESSION['id_user']); //lê todos os registros no BD


	if(empty($Mensagem)){
		?>
        	<h4 class="alert-warning">Nenhum dado encontrado!</h4>
        <?php
	}
	else{
		?>
        <section id="cd-timeline" class="cd-container">
		<?php

		foreach($Mensagem as $itemRow){
			$Status = new Status; //Instancia Status
			$Status = $Status->ReadMensagem($itemRow['id_mensagem'],$itemRow['destinatario_mensagem']);
        if(empty($Status)){
         	$statusMensagem = "Não Lida";
        	}
			else if ($Status['status_mensagem'] === '0'){
				$statusMensagem = 'Não Lida';
			}
			else{
				$statusMensagem = 'Lida';
			}
			?>
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="img/logo_nxstep_branco.svg" alt="Picture">
				</div> <!-- cd-timeline-img -->
			
                <div class="cd-timeline-content">
                <?php
                    if($itemRow['destinatario_mensagem'] === -1){
                    ?>
                        <h2>Para: <button class="btn btn-default">Todos</button></h2>
                        <p><?php echo $itemRow['assunto_mensagem']; ?></p>
                        <p><?php echo $itemRow['conteudo_mensagem']; ?></p>
                        <button type="button" class="cd-read-more btn-default">--</button>
                        <?php
                    }
                    else {
                        $Usuario = new Usuario;
                        $Usuario = $Usuario->Read($itemRow['destinatario_mensagem']);?>
                          <h2>Para: <button class="btn btn-info"><?php echo $Usuario['nome_usuario']; ?></button></h2>
                          <p><?php echo $itemRow['assunto_mensagem']; ?></p>
                          <p><?php echo $itemRow['conteudo_mensagem']; ?></p>
                          <button type="button" class="cd-read-more btn
                          <?php
                            if($statusMensagem==='Não Lida') {echo 'btn-warning Status';}
                            else if($statusMensagem==='Lida') {echo 'btn-sucess Status';}
                          ?>"><?php echo $statusMensagem; ?></button>
                    <?php
                    }
                ?>
                <span class="cd-date"><?php echo ExibeData($itemRow['data_mensagem']); ?> às <?php echo $itemRow['hora_mensagem']; ?></span>
                </div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->
        <?php
			}
		?>
		</section> <!-- cd-timeline -->
<?php
      }
?>
<script src="js/main.js"></script>
<script src="js/timeline.js"></script>
<script src="js/modernizr.js"></script> <!-- Modernizr -->
