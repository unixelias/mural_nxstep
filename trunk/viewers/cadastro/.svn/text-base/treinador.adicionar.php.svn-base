

<script>
	
		$(document).ready(function(e) {
		
			$('#Voltar').click(function(e) { //Regarregar a pagina (atualizar)
				e.preventDefault();
				$('#loader').load('viewers/cadastro/treinador.lista.php');
			});
			
			$('#Salvar').click(function(e) { //Regarregar a pagina (atualizar)
				e.preventDefault();
				$('#loader').load('viewers/cadastro/treinador.adicionar.php');
			});
		}); 
		
		//mascaras abaixo
		$('#telefonefixo_treinador').mask('(99)9999-9999');
	
</script>

<?php
	require_once "../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
    <li><a href="#">Cadastro</a></li>
    <li><a href="#">Treinador</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1>Cadastro de Treinador</h1>
<br>
<section class="btn-group" role="group" aria-label="...">
	<button type="button" class="btn btn-warning" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar </button>
	<button type="button" class="btn btn-success" id="Salvar"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Salvar </button>
</section>

<br><br>

<!-- Formulario -->

<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Nome *</span>
        	<input type="text" class="form-control" id="nome_treinador" placeholder="Nome" aria-describedby="basic-addon1">
    	</div>
    </section>
    <section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Email *</span>
        	<input type="text" class="form-control" id="email_treinador" placeholder="usuario@exemplo.com" aria-describedby="basic-addon1">
    	</div>
    </section>
    <section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Senha *</span>
        	<input type="password" class="form-control" id="senha_treinador" placeholder="Senha" aria-describedby="basic-addon1">
    	</div>
    </section>
</section>
<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Data *</span>
        	<input type="text" class="form-control" id="dtcadastro_treinador" placeholder="Data" aria-describedby="basic-addon1" value="<?php echo date('d/m/y')">
    	</div>
    </section>
    <section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Telefone Fixo *</span>
        	<input type="text" class="form-control" id="telefonefixo_treinador" placeholder="Telefone Fixo" aria-describedby="basic-addon1">
    	</div>
    </section>
    <section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Celular *</span>
        	<input type="text" class="form-control" id="celular_treinador" placeholder="Celular" aria-describedby="basic-addon1">
    	</div>
    </section>
</section>