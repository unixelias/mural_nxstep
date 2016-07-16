<?php session_start();
 ?>

<script>
	$(document).ready(function(e) {

    });


</script>

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


<br>
<!--Breadrumb-->
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Mensagens</a></li>
    <li><a href="#">Geral</a></li>
    <li class="active">Lista de Mensagens Geral</li>
</ol>
<h1>
	Lista de Mensagens Geral
</h1>
<br>
<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
  <button type="button" class="btn btn-success active"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Adicionar Dados</button>
</section>
<br></br>
<br></br>

<?php
	$Item = new Mensagem; //instancia Mensagem
	$Item = $Item->ReadAll(); //lê todos os registros no BD

	$Usuario = new Usuario; //Instancia Usuario
	$Destinatario = new Usuario; //Instancia Destinatario
	$Status = new Status; //Instancia Status

	$Lado = false;
	if(empty($Item)){
		?>
        	<h4 class="alert-warning">Nenhum dado encontrado!</h4>
        <?php
	}
	else{
		?>
        <h2>Pool Geral de Mensagens NextStep</h2>
        	<ul class="timeline">
            	<li>
				<?php
					foreach($Item as $itemRow){
						if ($Lado === false){
						//var_dump($itemRow);
						//Lê o nome do Usuario, buscando pela id_usuario
						$Usuario = $Usuario->Read($itemRow['id_usuario']);
						//Grava o nome do Usuario em nomeUsuario
						$nomeUsuario = $Usuario['nome_usuario'];

						//Busca o Status da Mensagem
						$Status = $Status->ReadMensagem($itemRow['id_mensagem']);
						//var_dump($Status['status_mensagem']);
						//Grava o Status da Mensagem em $statusMensagem
						if ($Status['status_mensagem'] === '0'){
							$statusMensagem = 'Não Lida';
						}else{
							$statusMensagem = 'Lida';
						}
						//var_dump($Status['id_usuario']);
						$idDestinatario = $Status['id_usuario'];
						//Busca o nome do Destinatário
						$Destinatario = $Destinatario->Read($idDestinatario);
						//Grava o nome do Usuario em nomeUsuario
						$nomeDestinatario = $Destinatario['nome_usuario'];



                ?>
                        <li>
                        <div class="timeline-badge">
                          <a><i class="fa fa-circle" id=""><!--Ligação com a linha do meio--></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading" id="duascol">
                                <h4><?php echo $nomeUsuario; ?> em: <?php echo $itemRow['data_mensagem']; ?></h4>
                                <p class="text-right" id="assunto">Assunto: <?php echo $itemRow['assunto_mensagem']; ?></p>
                            </div>
                            <div class="timeline-body">
                                <p><?php echo $itemRow['conteudo_mensagem']; ?></p>
                            </div>
                            <div class="timeline-footer"  id="duascol">
                                <p class="text-left">Para: <?php echo $nomeDestinatario; ?></p>
                                <p class="text-right"><?php echo $statusMensagem; ?></p>
                            </div>
                        </div>
                        </li>
                    <?php
						$Lado = true;
						} else {
					?>
                        <li class="timeline-inverted">
                        <div class="timeline-badge">
                          <a><i class="fa fa-circle" id=""><!--Ligação com a linha do meio--></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading"  id="duascol">
                                <h4><?php echo $nomeUsuario; ?> em: <?php echo $itemRow['data_mensagem']; ?></h4>
                                <p class="text-right" id="assunto">Assunto: <?php echo $itemRow['assunto_mensagem']; ?></p>
                            </div>
                            <div class="timeline-body">
                                <p><?php echo $itemRow['conteudo_mensagem']; ?></p>
                            </div>
                            <div class="timeline-footer"  id="duascol">
                                <p class="text-left">Para: <?php echo $nomeDestinatario; ?></p>
                                <p class="text-right"><?php echo $statusMensagem; ?></p>
                            </div>
                        </div>
                        </li>
					<?php
						$Lado = '0';
						}
					}
					?>
             	<li class="clearfix no-float"></li>
             </ul>
      <?php
	}
?>
