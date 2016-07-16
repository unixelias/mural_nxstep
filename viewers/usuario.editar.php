<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			$('#loader').load('viewers/usuario.lista.php');
		});

		$('#Salvar').click(function(e) {
			e.preventDefault();

			var nome_usuario = $('#nome_usuario').val();
			var email_usuario = $('#email_usuario').val();
			var matricula_usuario = $('#matricula_usuario').val();
			var senha_usuario = $('#senha_usuario').val();

			//2 validar os inputs
			if(nome_usuario === "" || email_usuario === "" || matricula_usuario === "" || senha_usuario === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}

			else{	
				var emailtester = false;
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				emailtester = re.test(email_treinador);
				
				if(!emailtester){
					return alert("Formato de email incorreto. Corrija o campo e tente novamente");
				}

				else{
					$.ajax({
					   url: 'engine/controllers/usuario.php',
					   data: {
							id_usuario : id_usuario,
							nome_usuario : nome_usuario,
							email_usuario : email_usuario,
							matricula_usuario : matricula_usuario,
							senha_usuario : senha_usuario,
							action: 'update'
					   },

					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							if(data === 'true'){
								alert('Item editado com sucesso!');
								$('#loader').load('viewers/usuario.lista.php');
							}
							else{
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
							}
					   },
					   type: 'POST'
					});	
				}
			}

		});
		
		$('#Excluir').click(function(e) {
			e.preventDefault();
			
			var id = $('#id_usuario').val();
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
  <li><a href="#">Gerenciar Usuários</a></li>
  <li class="active">Editar Dados</li>
</ol>

<h1> 
	Editar Usuário
</h1>

<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-warning" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
  
  <button type="button" class="btn btn-success" id="Salvar"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Salvar</button>
</section>

<button type="button" class="btn btn-danger" id="Excluir"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir</button>
</section>

<br><br>

	<?php
		$Item = new Usuario();
		$Item = $Item->Read($_POST['id']);
		//var_dump($Item);
	?>

<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Nome *</span>
          <input type="text" class="form-control" id="nome_usuario" placeholder="Nome" aria-describedby="basic-addon1" value="<?php echo $Item['nome_usuario'];?>">
        </div>
    </section>

    <section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Email *</span>
          <input type="text" class="form-control" id="email_usuario" placeholder="Email" aria-describedby="basic-addon1" value="<?php echo $Item['email_usuario'];?>">
        </div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Matrícula *</span>
          <input type="text" class="form-control" id="matricula_usuario" placeholder="Email" aria-describedby="basic-addon1" value="<?php echo $Item['matricula_usuario'];?>">
        </div>
    </section>  
</section>

<br>

<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Senha *</span>
          <input type="password" class="form-control" id="senha_usuario" placeholder="Senha" aria-describedby="basic-addon1" value="<?php echo $Item['senha_usuario'];?>">
        </div>
    </section>
</section>

<input type="hidden" id="id_usuario" value="<?php echo $Item['id_usuario'];?>">