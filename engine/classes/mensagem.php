<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Mensagem {

		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_mensagem;
		private $id_usuario;
		private $conteudo_mensagem;
		private $assunto_mensagem;
		private $hora_mensagem;
		private $data_mensagem;


		//setters

		//Funcao que seta uma instancia da classe
		public function SetValues($id_mensagem, $id_usuario, $conteudo_mensagem, $assunto_mensagem, $hora_mensagem, $data_mensagem) {
			$this->id_mensagem = $id_mensagem;
			$this->id_usuario = $id_usuario;
			$this->conteudo_mensagem = $conteudo_mensagem;
			$this->assunto_mensagem = $assunto_mensagem;
			$this->hora_mensagem = $hora_mensagem;
			$this->data_mensagem = $data_mensagem;

		}


		//Methods

		//Funcao que salva a instancia no BD
		public function Create() {

			$sql = "
				INSERT INTO mensagem
						  (
				 			id_mensagem,
				 			id_usuario,
				 			conteudo_mensagem,
							assunto_mensagem,
				 			hora_mensagem,
				 			data_mensagem
						  )
				VALUES
					(
				 			'$this->id_mensagem',
				 			'$this->id_usuario',
				 			'$this->conteudo_mensagem',
							'$this->assunto_mensagem',
				 			'$this->hora_mensagem',
				 			'$this->data_mensagem'
					);
			";

			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}

		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_mensagem,
					 t1.id_usuario,
					 t1.conteudo_mensagem,
					 t1.assunto_mensagem,
					 t1.hora_mensagem,
					 t1.data_mensagem
				FROM
					mensagem AS t1
				WHERE
					t1.id_mensagem  = '$id'

			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}


		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_mensagem,
					 t1.id_usuario,
					 t1.conteudo_mensagem,
					 t1.assunto_mensagem,
					 t1.hora_mensagem,
					 t1.data_mensagem
				FROM
					mensagem AS t1


			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{

				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;
					}
				}
			}
			$DB->close();
			return $realData;
		}




		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_mensagem,
					 t1.id_usuario,
					 t1.conteudo_mensagem,
					 t1.assunto_mensagem,
					 t1.hora_mensagem,
					 t1.data_mensagem
				FROM
					mensagem AS t1


				LIMIT $inicio, $registros;
			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data;
		}

		//Funcao que atualiza uma instancia no BD
		public function Update() {
			$sql = "
				UPDATE mensagem SET

				  id_usuario = '$this->id_usuario',
				  conteudo_mensagem = '$this->conteudo_mensagem',
				  assunto_mensagem = '$this->assunto_mensagem',
				  hora_mensagem = '$this->hora_mensagem',
				  data_mensagem = '$this->data_mensagem'

				WHERE id_mensagem = '$this->id_mensagem';

			";


			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		//Funcao que deleta uma instancia no BD
		public function Delete() {
			$sql = "
				DELETE FROM mensagem
				WHERE id_mensagem = '$this->id_mensagem';
			";
			$DB = new DB();

			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}


		public function ReadAll_JointInfo(){
			$sql = "
			SELECT

				t1.id_mensagem,
				t1.id_usuario,
				t1.assunto_mensagem,
				t1.conteudo_mensagem,
				t1.hora_mensagem,
				t1.data_mensagem,
				t2.id_usuario,
				t2.nome_usuario,
				t3.id_status
				FROM
				mensagem AS t1 ,
				usuario AS t2 ,
				status AS t3
				WHERE
				t1.id_usuario = t2.id_usuario
				AND
				t1.id_mensagem = t3.id_mensagem
				ORDER BY data_mensagem
			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{

				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;
					}
				}
			}
			$DB->close();
			return $realData;
		}
		
		public function ReadUserEnv_JointInfo($idRemetente){
			$sql = "
			SELECT

				t1.id_mensagem,
				t1.id_usuario,
				t1.assunto_mensagem,
				t1.conteudo_mensagem,
				t1.hora_mensagem,
				t1.data_mensagem,
				t2.id_usuario,
				t2.nome_usuario,
				t3.id_status
				FROM
				mensagem AS t1 ,
				usuario AS t2 ,
				status AS t3
				WHERE
				t1.id_usuario = t2.id_usuario
				AND
				t1.id_mensagem = t3.id_mensagem
				AND
				t1.id_usuario = '$idRemetente'
				ORDER BY data_mensagem
			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{

				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;
					}
				}
			}
			$DB->close();
			return $realData;
		}
		
		public function ReadUserRec_JointInfo($idDestinatario){
			$sql = "
			SELECT

				t1.id_mensagem,
				t1.id_usuario,
				t1.assunto_mensagem,
				t1.conteudo_mensagem,
				t1.hora_mensagem,
				t1.data_mensagem,
				t2.id_usuario,
				t2.nome_usuario,
				t3.id_status
				FROM
				mensagem AS t1 ,
				usuario AS t2 ,
				status AS t3
				WHERE
				t1.id_usuario = t2.id_usuario
				AND
				t1.id_mensagem = t3.id_mensagem
				AND
				t3.id_usuario = '$idDestinatario'
				ORDER BY data_mensagem
			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{

				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;
					}
				}
			}
			$DB->close();
			return $realData;
		}


		/*
			--------------------------------------------------
			Viewer SPecific methods -- end
			--------------------------------------------------

		*/


		//constructor

		function __construct() {
			$this->id_mensagem;
			$this->id_usuario;
			$this->conteudo_mensagem;
			$this->assunto_mensagem;
			$this->hora_mensagem;
			$this->data_mensagem;


		}

		//destructor
		function __destruct() {
			$this->id_mensagem;
			$this->id_usuario;
			$this->conteudo_mensagem;
			$this->assunto_mensagem;
			$this->hora_mensagem;
			$this->data_mensagem;


		}

	};

?>
