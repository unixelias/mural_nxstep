<?php session_start();
 ?>
<script>
  	$(document).ready(function(e) {

  		$('.Status').click(function(e) {
  			e.preventDefault();
  			//loader

  			//alert(id);
       var dados = $(this).attr('id');
       var corrige = dados.split(' ');

       var id_status = corrige[0];
       var id_mensagem = corrige[1];
       var id_usuario = corrige[2];
       var status_mensagem = corrige[3];


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
<!--Breadrumb-->
<ol class="breadcrumb">
<li><a href="#" id="home">Home</a></li>
    <li><a href="#" id="home">Mensagens</a></li>
    <li class="active">Mensagens Recebidas</li>
</ol>
<h2 class="well" align="center" role="heading">Mensagens Recebidas</h2>

<?php
	require_once "../../engine/config.php";

	$Mensagem = new Mensagem; //instancia Mensagem
	$Mensagem = $Mensagem->ReadAll_Join_Destinatario($_SESSION['id_user']); //lê todos os registros no

	if(empty($Mensagem)){
		?>
        	<h4 class="alert-warning">Nenhum dado encontrado!</h4>
        <?php
	}
	else{
		?>
        <section id="cd-timeline" class="cd-container">
		<?php
			$Status = new Status();
			$Status = $Status->Read_Geral($_SESSION['id_user'],$_SESSION['id_user']);
		
			if(count($Mensagem)!=count($Status)){
				for ($i=count($Status); $i < count($Mensagem) ; $i=$i+1) {
				  $novo_status = new Status();
				  $novo_status->SetValues('',$Mensagem[$i]['id_mensagem'],$_SESSION['id_user'],'0');
				  $novo_status->Create();
		
				}
			}
		
			$Mensagens = new Mensagem();
			$Mensagens = $Mensagens->ReadAll_Geral_Status($_SESSION['id_user'],$_SESSION['id_user']);
			
			foreach ($Mensagens as $itemRow) {
				switch ($itemRow['status_mensagem']) {
				case '0':
					$status_mensagem="Não Lida";
					break;
				case '1':
					$status_mensagem="Lida";
					break;
			}
		
		?>

			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="img/logo_nxstep_branco.svg" alt="Picture">
				</div> <!-- cd-timeline-img -->
                <div class="cd-timeline-content">
                    <h2>Recebida de: <button class="btn btn-sm btn-info"><?php echo $itemRow['nome_usuario']; ?></button></h2>
                    <p><?php echo $itemRow['assunto_mensagem']; ?></p>
                    <p><?php echo $itemRow['conteudo_mensagem']; ?></p>
                    <button type="button" class="cd-read-more btn
                        <?php
                            if($status_mensagem==='Não Lida') {echo 'btn-warning Status';}
                            else if($status_mensagem==='Lida') {echo 'btn-sucess Status';}
                        ?>"
                        id="<?php echo $itemRow['id_status'].' '.$itemRow['id_mensagem'].' '.$_SESSION['id_user'].' '.$itemRow['status_mensagem'];?>">
                        <?php echo $status_mensagem; ?>
                    </button>
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
<script src="js/menu.js"></script>
