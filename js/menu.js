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


});
