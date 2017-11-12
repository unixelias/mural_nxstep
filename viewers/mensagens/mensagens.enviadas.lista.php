<?php session_start();
 ?>


  <script>
  	$(document).ready(function(e) {
     $('.Excluir').click(function(e) {
       e.preventDefault();
       //loader

       var id = $(this).attr('id');

       if(confirm("Tem certeza que deseja excluir esta mensagem?")){
         $.ajax({
            url: 'engine/controllers/mensagem.php',
            data: {
             id_mensagem : id,
             id_usuario : null,
             destinatario_mensagem : null,
             assunto_mensagem: null,
             conteudo_mensagem : null,
             hora_mensagem : null,
             data_mensagem : null,
             action: 'delete'
            },

            error: function() {
             alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
            },
            success: function(data) {

             if(data === 'true'){
               alert('Item deletado com sucesso!');
               $('#loader').load('viewers/mensagens/mensagens.geral.lista.php');
             }
             else{
               alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
             }
            },

            type: 'POST'
         });
       }

     });


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
                    if($itemRow['destinatario_mensagem'] === '-1'){
                    ?>
                        <h2>Para: <button class="btn btn-primary">Todos</button></h2>
                        <p><?php echo $itemRow['assunto_mensagem']; ?></p>
                        <p><?php echo $itemRow['conteudo_mensagem']; ?></p>
                        <button type="button" class="cd-read-more btn btn-default Status">--</button>
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
                            if($statusMensagem==='Não Lida') {echo 'btn-warning';}
                            else if($statusMensagem==='Lida') {echo 'btn-success';}
                          ?>"><?php echo $statusMensagem; ?></button>
                    <?php
                    }
                ?>

                <?php
                  if($itemRow['id_usuario']===$_SESSION['id_user']){

                    ?>
                      <button type="button" class="Excluir cd-read-more btn btn-danger" id="<?php echo $itemRow['id_mensagem']; ?>">Excluir</button>
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
