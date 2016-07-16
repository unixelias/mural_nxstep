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

<?php
	$Mensagem = new Mensagem; //instancia Mensagem
	$Mensagem = $Mensagem->ReadAll_JointInfo(); //lê todos os registros no BD
	
	$Usuario = new Usuario; //Instancia Usuario
	$DataInicial = explode('-', $Mensagem[0]['data_mensagem']);


	if(empty($Mensagem)){
		?>
        	<h4 class="alert-warning">Nenhum dado encontrado!</h4>
        <?php
	}
	else{
		?>
        	
        	<div class="header superheader" >Mural de Comunicados NextStep
        	  <div id="dataYear"> <?php echo $DataInicial[1]."/".$DataInicial[0]; ?> </div>
			</div>
            <br/>
            <br/>
            <br/>
            <br/>

            <div class="container-fluid" id="site colunas">
            <div id="topo">&nbsp;</div>
            <div id="col1"></div>
            <div id="col2">            
            <div class="wrap">
                <div class="timeline">
                  
                    <?php
                        foreach($Mensagem as $itemRow){
							
							$msg = $itemRow;
							$Status = new Status; //Instancia Status
                            $Status = $Status->ReadMensagem($msg['id_mensagem']);
							
							if ($mcg['status_mensagem'] === '0'){
								$statusMensagem = 'Não Lida';
								}else{
								$statusMensagem = 'Lida';
							}
							
							if ($msg['id_mensagem'] === '0'){
								$MesAnterior = explode('-', $msg['data_mensagem']);
								}
							
							$Mes = explode('-', $itemRow['data_mensagem']);

							if($MesAnterior[1] != $Mes[1]){
								$MesAnterior[1] = $Mes[1];
								$Check = 1;
								?><div class="year"><h2><?php echo $Mes[1]."/".$Mes[0]?></h2>								
                                <?php 
							}
							

                    ?>
                    <!--Se a data muda, chama um year-->
                    
                    <div class="evt">
                        <div class="in container-fluid">
                           <span class="date">
                                <span class="day"><?php echo $Mes[1]."/"?></span><span class="month"><?php echo $Mes[0]?></span>
                            </span>
                        
                            <div>
                                <h2><?php echo $itemRow['nome_usuario'] ?></h2>
                            </div>
                            
                            <p class="data">
                                <?php echo $itemRow['conteudo_mensagem']; ?>
                            </p>
                            
                            <div class="timeline-footer"  id="duascol">
                                <p class="text-left">Assunto: <?php echo $itemRow['assunto_mensagem']; ?></p>
                                <p class="text"><?php echo $statusMensagem; ?></p>
                            </div>
                        </div>
                    </div>
                    
                     
                    
					<?php
					if ($Check === 1){
						$Check = 0;
						?></div><?php
						}
					}
					
					?>
                                   
                </div>
            </div>
            </div>
            <div id="col1"></div>
            </div>
             	
<?php
      }
?>
<br>
<!--Breadrumb-->
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Mensagens</a></li>
    <li><a href="#">Geral</a></li>
    <li class="active">Lista de Mensagens Geral</li>
</ol>
</br>