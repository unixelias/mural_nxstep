// JavaScript Document

$(document).ready(function(e) {
	
 	$('#home').click(function(){ 
     
	  $('#content').load('viewers/mensagens/mensagens.geral.lista.php'); 
      	return false; 
  		});
  //Muda a página para "home" 
  
  $('#content').load('viewers/mensagens/mensagens.geral.lista.php');
});