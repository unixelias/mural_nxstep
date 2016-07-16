<script>
	$(document).ready(function(e) {
        
    });


</script>

<?php
	require_once "../../engine/config.php";
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
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
    <li><a href="#">Gerciamento</a></li>
    <li><a href="#">Turma</a></li>
    <li class="active">Lista de Dados</li>
</ol>
<h1>
	Lista de Turmas Cadastradas
</h1>
<br>
<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
  <button type="button" class="btn btn-success active"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Adicionar Dados</button>
</section>
<br></br>
<br></br>

<?php
	$Item = new Turma; //instancia Turma
	$Item = $Item->ReadAll(); //lê todos os registros no BD
	
	$Trainee = new Trainee; //instancia Trainee
	$Treinamento = new Treinamento; //instancia Treinamento

	if(empty($Item)){
		?>
        	<h4 class="alert-warning">Nenhum dado encontrado!</h4>
        <?php	
	}
	else{
		?>
        
		<table class="table table-striped table-hover">
			<thead>
				<tr>
				  <th>Número</th>
				  <th>Treinamento</th>
				  <th>Trainee</th>
				  <th class="text-center">Editar</th>
				  <th class="text-center">Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($Item as $itemRow){
						//var_dump($itemRow);
						//lê informações do Trainee pela ID
						$Trainee = $Trainee->Read($itemRow['id_trainee']);
						//lê o nome do Trainee
						$nomeTrainee = $Trainee['nome_trainee'];
						
                		$Treinamento = $Treinamento->Read($itemRow['id_treinamento']);
						$nomeTreinamento = $Treinamento['nome_treinamento'];
                ?>
                <tr>
                  <td><?php echo $itemRow['id_turma']; ?></td>
                  <td><?php	echo $nomeTrainee ?></td>
                  <td><?php echo $nomeTreinamento ?></td>
                  <td class="text-center EditarItem" id="<?php echo $itemRow['id_turma']; ?>">
                  	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  </td>
                  <td class="text-center ExcluirItem" id="<?php echo $itemRow['id_turma']; ?>">
                  	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  </td>  
                <?php
					}
                ?>
			
            </tbody>
		</table>
        
		<?php
	}
?>

