$(document).ready(function(e) {

$(document).ready(function(e) {

			$('#mensagens_geral_link').click(function(e) { //carregando parte de uma pagina na pagina principal
				e.preventDefault();
				//loader
				$('#loader').load('viewers/mensagens/mensagens.geral.lista.php');
			});

		});

		$(document).ready(function(e) {

			$('#nova_mensagem_link').click(function(e) { //carregando parte de uma pagina na pagina principal
				e.preventDefault();
				//loader
				$('#loader').load('viewers/mensagens/mensagem.nova.php');
			});

		});

		$(document).ready(function(e) {

			$('#mensagens_pessoais_link').click(function(e) { //carregando parte de uma pagina na pagina principal
				e.preventDefault();
				//loader
				$('#loader').load('viewers/mensagens/mensagens.pessoais.php');
			});

		});

		$(document).ready(function(e) {

			$('#getout').click(function(e) {
				e.preventDefault();
		        //loader
				$.ajax({
				   url: 'engine/controllers/logout.php',
				   data: {

				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
						if(data === 'kickme'){
							document.location.href = 'login/';
						}


						else{
							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
						}
				   },

				   type: 'POST'
					});
		    });
		});


});
