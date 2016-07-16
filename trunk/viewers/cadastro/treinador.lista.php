<script>
	$(document).ready(function(e) {
        
    });
	


</script>

<?php
	require_once "../../engine/config.php";
?>

<br>
<!--Breadrumb-->
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Cadastro</a></li>
    <li><a href="#">Treinador</a></li>
    <li class="active">Lista de Dados</li>
</ol>
<h1>
	Lista de Treinadores Cadastrados
</h1>
<br>
<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
  <button type="button" class="btn btn-success active"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Adicionar Dados</button>
</section>
<br></br>
<br></br>

<?php
	$Item = new Treinador; //instancia Treinador
	$Item = $Item->ReadAll(); //lê todos os registros no BD
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
				  <th>Nome</th>
				  <th>Email</th>
				  <th>Telefone Fixo</th>
				  <th>Celular</th>
				  <th class="text-center">Editar</th>
				  <th class="text-center">Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($Item as $itemRow){
						//var_dump($itemRow);
                
                ?>
                <tr>
                  <td><?php echo $itemRow['nome_treinador']; ?></td>
                  <td><?php echo $itemRow['email_treinador']; ?></td>
                  <td><?php echo $itemRow['telefonefixo_treinador']; ?></td>
                  <td><?php echo $itemRow['celular_treinador']; ?></td>
                  <td class="text-center EditarItem" id="<?php echo $itemRow['id_treinador']; ?>">
                  	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  </td>
                  <td class="text-center ExcluirItem" id="<?php echo $itemRow['id_treinador']; ?>">
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

