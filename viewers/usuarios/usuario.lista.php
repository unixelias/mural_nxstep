<?php session_start();
 ?>
<script>
	$(document).ready(function(e) {
		$('#Atualizar').click(function(e) {
			e.preventDefault();
			$('#loader').load('viewers/usuarios/usuario.lista.php');
   	    });
	});
</script>

<?php
	require_once "../../engine/config.php";
?>

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
                            <tr class=" <?php if($_SESSION['id_user']===$itemRow['id_usuario']){echo 'danger';}?>">
                                <td><?php echo $itemRow['nome_usuario'];?></td>
																<td><?php echo $itemRow['email_usuario']; ?></td>
                                <td><?php echo $itemRow['matricula_usuario']; ?></td>
                            </tr>
                    <?php
						}
					?>
                </tbody>
            </table>

        <?php
	}
?>
