<?php session_start();
 ?>

 <script>
 	$(document).ready(function(e) {

 		$('.Status').click(function(e) {
 			e.preventDefault();
 			//loader

 			//alert(id);
      var id_status = $('#id_status').val();
      var id_mensagem = $('#id_mensagem').val();
      var id_usuario = $('#id_usuario').val();
      var status_mensagem = $('#status_mensagem').val();

      if(status_mensagem === '1'){
        status_mensagem = '0';
      }
      else{
        status_mensagem = '1';
      }

 				$.ajax({
 				   url: 'engine/controllers/status.php',
 				   data: {
 						id_status : id_status,
 						id_mensagem : id_mensagem,
 						id_usuario : id_usuario,
 						status_mensagem : status_mensagem,
 						action: 'update'
 				   },
 				   error: function() {
 						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
 				   },
 				   success: function(data) {

 						if(data === 'true'){
 							alert("Status Alterado");
 							$('#loader').load('viewers/mensagens/mensagens.recebidas.lista.php');
 						}

 						else{
 							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
 						}
 				   },

 				   type: 'POST'
 				});


 		});

 	});
 </script>

 <!--<script src="js/modernizr.js"></script> <!-- Modernizr -->
<?php
	require_once "../../engine/config.php";
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
	$Mensagem = new Mensagem; //instancia Mensagem
	$Mensagem = $Mensagem->ReadAll_Geral($_SESSION['id_user']); //lê todos os registros no BD

	if(empty($Mensagem)){
		?>
        	<h4 class="alert-warning">Nenhum dado encontrado!</h4>
        <?php
	}
	else{
		?>
        <h2 class="well" align="center" role="heading">Mural de Comunicados NextStep</h2>
        <section id="cd-timeline" class="cd-container">
		<?php

			foreach($Mensagem as $itemRow){

        $Status = new Status();
        $novo_status = new Status();

        $Status = $Status->Read_Geral($itemRow['id_mensagem'],$_SESSION['id_user']);
        if(empty($Status)){
          $novo_status->SetValues('',$itemRow['id_mensagem'],$_SESSION['id_user'],'0');
          $novo_status->Create();
          $status_mensagem = "Não Lida";
          $class = "Status";
        }
        else if($Status['status_mensagem'] === 1 && $itemRow['id_usuario'] != $_SESSION['id_user']){
            $status_mensagem = "Lida";
            $class = "Status";
      }
      else if($Status['status_mensagem'] === 0 && $itemRow['id_usuario'] != $_SESSION['id_user']){
        $status_mensagem = "Não Lida";
        $class = "Status";
      }
      else{
        $status_mensagem = "Enviado";
      }

		?>
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2><?php echo $itemRow['nome_usuario']; ?></h2>
                <p><?php echo $itemRow['assunto_mensagem']; ?></p>
				<p><?php echo $itemRow['conteudo_mensagem']; ?></p>

        <button type="button" style="float: right" class="btn <?php
        if($status_mensagem==='Não Lida') {echo 'btn-warning Status';}
        else if($status_mensagem==='Lida'){echo 'btn-sucess Status';}
        else {echo 'btn-info';}
        ?>" value="<?php echo $Status['id_status']?>" id="id_status"> <?php echo $status_mensagem; ?></button>;

        <span class="cd-date"><?php echo $itemRow['data_mensagem']; ?></span>

        <input type="hidden" value="<?php echo $itemRow['id_mensagem'];?>" id="id_mensagem">
        <input type="hidden" value="<?php echo $_SESSION['id_user'];?>" id="id_usuario">
        <input type="hidden" value="<?php echo $Status['status_mensagem'];?>" id="status_mensagem">

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
