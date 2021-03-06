<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			document.location.reload();
		});

		$('#Salvar').click(function(e) {
			e.preventDefault();

			var nome_usuario = $('#nome_usuario').val();
			var email_usuario = $('#email_usuario').val();
			var matricula_usuario = $('#matricula_usuario').val();
			var senha_usuario = $('#senha_usuario').val();

			if(nome_usuario === "" || email_usuario === "" || matricula_usuario === "" || senha_usuario === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}

			else{
				var emailtester = false;
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				emailtester = re.test(email_usuario);

				if(!emailtester){
					return alert("Formato de email incorreto. Corrija o campo e tente novamente");
				}

				else{
					$.ajax({
					   url: '../engine/controllers/usuario.php',
					   data: {
							id_usuario : null,
							nome_usuario : nome_usuario,
							email_usuario : email_usuario,
							matricula_usuario : matricula_usuario,
							senha_usuario : senha_usuario,
							action: 'create'
					   },

					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							//console.log(data);
							if(data === 'true'){
								alert('Cadastro feito com sucesso, bem vindo!');
								document.location.reload();
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

	});

</script>

<?php
	require_once "../engine/config.php";
?>
<div align="center">
    <img  style="max-height: 100px;" src="../img/logo_nxstep_completa.svg">
</div>

<h1 align="center" role="heading">Cadastro de Usuário</h1>

<br>


<div class="container-fluid">
<div class="col-md-3"></div>
<div class="col-md-6" align="justify">
    <section class="row formAdicionarDados">
        <section class="col-md-12">
            <div class="input-group">
              	<span class="input-group-addon" id="basic-addon1">Nome *</span>
              	<input type="text" class="form-control" id="nome_usuario" placeholder="Nome" aria-describedby="basic-addon1">
            </div>
        </section>
    </section>
    <br>
    <section class="row formAdicionarDados">
        <section class="col-md-12">
            <div class="input-group">
              	<span class="input-group-addon" id="basic-addon1">Email *</span>
              	<input type="text" class="form-control" id="email_usuario" placeholder="Email" aria-describedby="basic-addon1">
            </div>
        </section>
    </section>
    <br>
    <section class="row formAdicionarDados">
   		<section class="col-md-12">
            <div class="input-group">
              	<span class="input-group-addon" id="basic-addon1">Matrícula *</span>
              	<input type="text" class="form-control" id="matricula_usuario" placeholder="Matrícula" aria-describedby="basic-addon1">
            </div>
        </section>
    </section>
    <br>
    <section class="row formAdicionarDados">
    	<section class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Senha *</span>
                <input type="password" class="form-control" id="senha_usuario" placeholder="Senha" aria-describedby="basic-addon1">
            </div>
        </section>
    </section>
    <br>
    <section class="row formAdicionarDados">
        <div class="col-md-12" align="center"> 
        <section class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-warning" id="Voltar">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
            <button type="button" class="btn btn-success" id="Salvar">
            <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Salvar</button>
        </section>
        </div>
	</section>
</div>
<div class="col-md-3"></div>
</div>