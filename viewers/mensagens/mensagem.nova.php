
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
			var nome_trainee = $('#nome_trainee').val();
			var email_trainee = $('#email_trainee').val();
			var telefonefixo_trainee = $('#telefonefixo_trainee').val();
			var celular_trainee = $('#celular_trainee').val();


			//2 validar os inputs
			if(nome_trainee === "" || email_trainee === "" || telefonefixo_trainee === "" || celular_trainee === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{


				var emailtester = false;
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				emailtester = re.test(email_trainee);
				if(!emailtester){

					return alert("Formato de email incorreto. Corrija o campo e tente novamente");
				}
				else{
					$.ajax({
					   url: 'engine/controllers/trainee.php',
					   data: {
						   	id_trainee : null,
							nome_trainee : nome_trainee,
							email_trainee : email_trainee,
							telefonefixo_trainee: telefonefixo_trainee,
							celular_trainee: celular_trainee,
							action: 'create'
					   },
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							console.log(data);
							if(data === 'true'){
								alert('Item adicionado com sucesso!');
								$('#loader').load('viewers/cadastro/trainee.lista.php');
							}

							else{
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
							}
					   },

					   type: 'POST'
					});
				}
			}

			//3 transferir os dados dos inputs para o arquivo q ira tratar

			//4 observar a resposta, e falar pra usuario o que aconteceu
		});




		//mascaras abaixo
		$('#telefonefixo_trainee').mask('(99) 9999-9999');
		$('#celular_trainee').mask('(99) 9-9999-9999');
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

</section>
