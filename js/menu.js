// JavaScript Document

/*alert('a');
confirm(); //return bool
console.log();*/


/*var x = document.getElementById('h1xulambs');
x.innerHTML = "<span class='text-primary'>ciclambs</span>";
console.log(x);*/

$(document).ready(function(e) {
<<<<<<< HEAD
    //var x = $('#h1xulambs');
	//console.log(x);
	
	/* CADASTRO */
	
	$('#cadastro_treinador_link').click(function(e) {
		e.preventDefault();
    	//loader
		$('#loader').load('viewers/cadastro/treinador.lista.php');
    });
	
	$('#cadastro_treinamento_link').click(function(e) {
		e.preventDefault();
    	//loader
		$('#loader').load('viewers/cadastro/treinamento.lista.php');
    });
	
	$('#cadastro_trainee_link').click(function(e) {
		e.preventDefault();
    	//loader
		$('#loader').load('viewers/cadastro/trainee.lista.php');
    });
	
	$('#getout').click(function(e) {
		e.preventDefault();
        //loader
		$.ajax({
		   url: '../engine/controllers/logout.php',
		   data: {
				
		   },
		   error: function() {
				alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
		   },
		   success: function(data) {
				console.log(data);
				if(data === 'kickme'){
					document.location.href = '../';
				}
				
				
				else{
					alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
				}
		   },
		   
		   type: 'POST'
		});		
    });
	
});
=======

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
>>>>>>> origin/master
