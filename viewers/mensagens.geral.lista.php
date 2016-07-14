<script>
	$(document).ready(function(e) {
        
    });


</script>

<?php
	require_once "../engine/config.php";
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
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
                ?>
                        <li>
                        <div class="timeline-badge">
                          <a><i class="fa fa-circle" id=""></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $itemRow['id_usuario']; ?></h4>
                            </div>
                            <div class="timeline-body">
                                <p><?php echo $itemRow['conteudo_mensagem']; ?></p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right"><?php echo $itemRow['data_mensagem']; ?></p>
                            </div>
                        </div>
                        </li>
                    <?php
						$Lado = true;
						} else {
					?>
                        <li class="timeline-inverted">
                        <div class="timeline-badge">
                          <a><i class="fa fa-circle" id=""></i></a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $itemRow['id_usuario']; ?></h4>
                            </div>
                            <div class="timeline-body">
                                <p><?php echo $itemRow['conteudo_mensagem']; ?></p>
                            </div>
                            <div class="timeline-footer">
                                <p class="text-right"><?php echo $itemRow['data_mensagem']; ?></p>
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
