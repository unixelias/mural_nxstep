<?php session_start();

 ?>

<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
			$('#loader').load('viewers/cadastro/trainee.lista.php');
		});

		$('#Salvar').click(function(e) {
			e.preventDefault();

			//1 instansciar e recuperar valores dos inputs
			var id_usuario = $('#id_usuario').val();
			var assunto_mensagem = $('#assunto_mensagem').val();
			var conteudo_mensagem = $('#conteudo_mensagem').val();
			var hora_mensagem = $('#hora_mensagem').val();
			var data_mensagem = $('#data_mensagem').val();


			//2 validar os inputs
			if(id_usuario === "" || assunto_mensagem === "" || conteudo_mensagem === "" || hora_mensagem === "" || data_mensagem === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{

					$.ajax({
					   url: 'engine/controllers/mensagem.php',
					   data: {
						   id_mensagem : null,
							id_usuario : id_usuario,
							assunto_mensagem : assunto_mensagem,
							conteudo_mensagem : conteudo_mensagem,
							hora_mensagem : hora_mensagem,
							data_mensagem : data_mensagem,
							action: 'create'
					   },
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {

							if(data === 'true'){
								alert('Item adicionado com sucesso!');
								$('#loader').load('viewers/mensagens/mensagens.geral.lista.php');
							}

							else{
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
							}
					   },

					   type: 'POST'
					});

			}

			//3 transferir os dados dos inputs para o arquivo q ira tratar

			//4 observar a resposta, e falar pra usuario o que aconteceu
		});





	});
</script>

<?php
	require_once "../../engine/config.php";
?>


<br>
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Mensagens</a></li>
  <li><a href="#">Nova Mensagem</a></li>
</ol>

<h1>
	Nova mensagem
</h1>

<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-warning" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
  <button type="button" class="btn btn-success" id="Salvar"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Salvar</button>
</section>


<br><br>

<section class="row form AdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Assunto *</span>
          <input type="text" class="form-control" id="assunto_mensagem" placeholder="Assunto" aria-describedby="basic-addon1">
        </div>
    </section>


</section>

<br>
<section class="row formAdicionarDados">
  <section class="col-md-4">
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Mensagem *</span>
        <input type="text" class="form-control" id="conteudo_mensagem" placeholder="Mensagem" aria-describedby="basic-addon1">
      </div>
  </section>

  <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['id_user'];?>">
	<input type="hidden" id="data_mensagem" value="<?php echo date('Y-m-d');?>">
	<input type="hidden" id="hora_mensagem" value="<?php echo date('H:i:s');?>">

</section>
