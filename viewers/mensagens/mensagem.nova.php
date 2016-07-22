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
      var destinatario_mensagem = $('#destinatario_mensagem').val();
			var assunto_mensagem = $('#assunto_mensagem').val();
			var conteudo_mensagem = $('#conteudo_mensagem').val();
			var hora_mensagem = $('#hora_mensagem').val();
			var data_mensagem = $('#data_mensagem').val();


			//2 validar os inputs
			if(id_usuario === "" || destinatario_mensagem === "" || assunto_mensagem === "" || conteudo_mensagem === "" || hora_mensagem === "" || data_mensagem === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{

					$.ajax({
					   url: 'engine/controllers/mensagem.php',
					   data: {
						   id_mensagem : null,
							id_usuario : id_usuario,
              destinatario_mensagem : destinatario_mensagem,
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
              // console.log(data);
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

  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>

    <title>Mural NxStep</title>

    <link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../../css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

<?php
	require_once "../../engine/config.php";
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="../../css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="../../css/style.css"> <!-- Resource style -->
<script src="js/modernizr.js"></script> <!-- Modernizr -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]
<br><br>

<script language='JavaScript'>

var width = 200;
var height = 200;

var left = 50;
var top = 50;

URL = 'http://localhost/xcr/exec.htm';

window.open(URL, 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

</script>-->

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Mensagens</a></li>
  <li class="active">Nova Mensagem</li>
</ol>

<h2 class="well" align="center" role="heading">Publicar nova Mensagem</h2>
<section id="cd-timeline" class="cd-container">
    <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
            <img src="img/cd-icon-picture.svg" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
            <h2>Nova Mensagem de
              <?php $user = new Usuario;
                    $user = $user->Read($_SESSION['id_user']);
                    echo '<button type="button" class="btn">'.$user['nome_usuario'].'</button>';
               ?></h2>

            <p>
			<p> </p>
            <section class="row form AdicionarDados">
                <section class="col-md-12">
                    <div class="input-group assunto">
                      <span class="input-group-addon" id="basic-addon1">Assunto *</span>
                      <input type="text" class="form-control" id="assunto_mensagem"  placeholder="Assunto da mensagem" aria-describedby="basic-addon1">

                  </div>
                </section>
            </section>
  <br/>
  <section class="row formAdicionarDados">
            <section class="col-md-6">
              <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Destinatário*</span>
                <select class="form-control" id="destinatario_mensagem">
                  <option value="<?php echo '-1'; ?>">Todos</option>
                        <?php
                        $Usuario = new Usuario();
                        $Usuario = $Usuario->ReadAll();

                        foreach ($Usuario as $ItemRow) {
                          ?>
                          <option type="text" value="<?php echo $ItemRow['id_usuario']; ?>"><?php echo $ItemRow['nome_usuario']; ?></option>

                          <?php	} ?>

                  </select>
              </div>
            </section>
          </section>
            <br/>
            <section class="row formAdicionarDados">
                <section class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
	                	<h3 class="panel-title" id="basic-addon1">Mensagem *</h3>
                    </div>
                    <div class="input-group">
                        <textarea type="text" class="form-control caixa_texto
                        " id="conteudo_mensagem" placeholder="Escreva sua mensagem" aria-describedby="basic-addon1"></textarea>
                    </div>
                </div>
                <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['id_user'];?>">
                <input type="hidden" id="data_mensagem" value="<?php echo date('Y-m-d');?>">
                <input type="hidden" id="hora_mensagem" value="<?php echo date('H:i:s');?>">
                </section>

            </section>
            </p>
            <div class="row container-fluid" align="right">
                <section class="btn-group" role="group" aria-label="...">
                	<button type="button" class="btn btn-warning" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
                	<button type="button" class="btn btn-success" id="Salvar"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Salvar</button>
                </section>
            </div>
            <span class="cd-date"><?php echo date('d/m/Y')?></span>
        </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->

</section> <!-- cd-timeline -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script src="js/modal.js"></script>


<br>
