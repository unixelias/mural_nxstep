//JavaScript Document

/*alert();
confirm(); //retorna true ou false
console.log();*/

/*var x = document.getElementById('h1teste');
x.innerHTML = "<span class='text-primary'>troca</span>";

console.log(x);*/


$(document).ready(function(e) {
    
		$(document).ready(function(e) {
		
			$('#mensagens_geral_link').click(function(e) { //carregando parte de uma pagina na pagina principal
				e.preventDefault();
				//loader
				$('#loader').load('viewers/mensagens.geral.lista.php');
			});
			
		});
		
		$(document).ready(function(e) {
		
			$('#cadastro_trainee_link').click(function(e) { //carregando parte de uma pagina na pagina principal
				e.preventDefault();
				//loader
				$('#loader').load('viewers/cadastro/trainee.lista.php');
			});
			
		});
		
		$(document).ready(function(e) {
		
			$('#cadastro_treinamento_link').click(function(e) { //carregando parte de uma pagina na pagina principal
				e.preventDefault();
				//loader
				$('#loader').load('viewers/cadastro/treinamento.lista.php');
			});
			
		});
		
			$(document).ready(function(e) {
		
			$('#gerenciamento_aula_link').click(function(e) { //carregando parte de uma pagina na pagina principal
				e.preventDefault();
				//loader
				$('#loader').load('viewers/gerenciamento/aula.lista.php');
			});
			
		});
		
			$(document).ready(function(e) {
		
			$('#gerenciamento_turma_link').click(function(e) { //carregando parte de uma pagina na pagina principal
				e.preventDefault();
				//loader
				$('#loader').load('viewers/gerenciamento/turma.lista.php');
			});
			
		});

});