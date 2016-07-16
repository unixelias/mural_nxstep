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

	if(empty($Mensagem)){
		?>
        	<h4 class="alert-warning">Nenhum dado encontrado!</h4>
        <?php
	}
	else{
		?>
        	
        	<div class="header" >Mural de Comunicados NextStep
        	  <div id="dataYear"> 2016 </div>
			</div>
            <br/>
            <br/>
            <br/>
            <br/>

            <section class="wrap">
                <nav class="timeline  container-fluid">
                <!--div class="year"-->   
                    <?php
                        foreach($Mensagem as $itemRow){
							$Status = new Status; //Instancia Status
                            $Status = $Status->Read($temRow['id_status']);
 								
							if ($itemRow['status_mensagem'] === '0'){
								$statusMensagem = 'Não Lida';
								}else{
								$statusMensagem = 'Lida';
							}

							$Destinatario = new Usuario; //Instancia Destinatario
                            $Destinatario = $Destinatario->Read($Status['id_usuario']);

                    ?>
                    <div class="evt">
                        <article class="in">
                           <span class="date">
                                <span class="day">26</span> 
                              <span class="month">May</span>
                            </span>
                        
                            <header id="duascol">
                                <h2><?php echo $itemRow['nome_usuario']; ?> em: <?php echo $itemRow['data_mensagem']; ?></h2>
                                <p class="text-right" id="assunto">Assunto: <?php echo $itemRow['assunto_mensagem']; ?></p>
                            </header>
                            
                            <p class="data">
                                <?php echo $itemRow['conteudo_mensagem']; ?>
                            </p>
                            
                            <footer class="footer"  id="duascol">
                                <!--p class="text-left">Para: <?php echo $Destinatario['nome_usuario']; ?></p-->
                                <p class="text"><?php echo $statusMensagem; ?></p>
                            </footer>
                        </article>
                    </div>
                    <?php
					}
					?>
                <!--/div-->                    
                </nav>
            </section> 	
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