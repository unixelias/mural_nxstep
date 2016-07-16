<script>
	$(document).ready(function(e) {
		$('#Atualizar').click(function(e) {
			e.preventDefault();
			$('#loader').load('viewers/usuario.lista.php');
   	    });
		$('#Adicionar').click(function(e) {
			e.preventDefault();
			$('#loader').load('viewers/usuario.adicionar.php');
   		});
		$('.EditarItem').click(function(e) {
			e.preventDefault();
			
			var id = $(this).attr('id');
			//alert(id);
			$('#loader').load('viewers/usuario.editar.php', { id : id });
   	    });
		
		$('.ExcluirItem').click(function(e) {
			e.preventDefault();
			
			var id = $(this).attr('id');
			//alert(id);
			if (confirm("Tem certeza que deseja excluir o usuário?")){
				$.ajax({
					   url: 'engine/controllers/usuario.php',
					   data: {
							id_usuario : id,
							nome_usuario : null,
							email_usuario : null,
							matricula_usuario : null,
							senha_usuario : null,
							action: 'delete'
					   },

					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							console.log(data);
							if(data === 'true'){
								alert('Item excluído com sucesso!');
								$('#loader').load('viewers/usuario.lista.php');
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

<?php
	require_once "../../engine/config.php";
?>


<br>
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li class="active">Gerenciar Usuários</li>
</ol>

<h1> 
	Lista de Usuários Cadastrados
</h1>

<div id="blu">

</div>
<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-default" id="Atualizar"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
  <button type="button" class="btn btn-success" id="Adicionar"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Dados</button>
</section>



<br><br>
<pre>
<?php
	$Item = new Usuario();
	$Item = $Item->ReadAll();
		
	if(empty($Item)){
		
		?>
        	<h4 class="well"> Nenhum dado encontrado. </h4>
        <?php
		
	}
	else{
		?>
        
        	<table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Matrícula</th>
                  </tr>
                </thead>
             
                <tbody>
                	<?php
						
						foreach($Item as $itemRow){
					?>
                            <tr class="">
                                <td><?php echo $itemRow['nome_usuario']; ?></td>
                                <td><?php echo $itemRow['email_usuario']; ?></td>
                                <td><?php echo $itemRow['matricula_usuario']; ?></td>
                                <td><?php echo $itemRow['celular_treinador']; ?></td>
                            </tr>
                    <?php
						}
					?>
                </tbody>
            </table>
        
        <?php
	}
?>