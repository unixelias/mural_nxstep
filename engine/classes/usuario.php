<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Usuario{

		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_usuario;
		private $nome_usuario;
		private $email_usuario;
		private $senha_usuario;
		private $matricula_usuario;


		//setters

		//Funcao que seta uma instancia da classe
		public function SetValues($id_usuario, $nome_usuario, $email_usuario, $senha_usuario, $matricula_usuario) {
			$this->id_usuario = $id_usuario;
			$this->nome_usuario = $nome_usuario;
			$this->email_usuario = $email_usuario;
			$this->senha_usuario = $senha_usuario;
			$this->matricula_usuario = $matricula_usuario;

		}


		//Methods

		//Funcao que salva a instancia no BD
		public function Create() {

			$sql = "
				INSERT INTO usuario
						  (
				 			id_usuario,
				 			nome_usuario,
				 			email_usuario,
				 			senha_usuario,
				 			matricula_usuario
						  )
				VALUES
					(
				 			'$this->id_usuario',
				 			'$this->nome_usuario',
				 			'$this->email_usuario',
				 			'$this->senha_usuario',
				 			'$this->matricula_usuario'
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
					 t1.id_usuario,
					 t1.nome_usuario,
					 t1.email_usuario,
					 t1.senha_usuario,
					 t1.matricula_usuario
				FROM
					usuario AS t1
				WHERE
					t1.id_usuario  = '$id'

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
					 t1.id_usuario,
					 t1.nome_usuario,
					 t1.email_usuario,
					 t1.senha_usuario,
					 t1.matricula_usuario
				FROM
					usuario AS t1


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
					 t1.id_usuario,
					 t1.nome_usuario,
					 t1.email_usuario,
					 t1.senha_usuario,
					 t1.matricula_usuario
				FROM
					usuario AS t1


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
				UPDATE usuario SET

				  nome_usuario = '$this->nome_usuario',
				  email_usuario = '$this->email_usuario',
				  senha_usuario = '$this->senha_usuario',
				  matricula_usuario = '$this->matricula_usuario'

				WHERE id_usuario = '$this->id_usuario';

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
				DELETE FROM usuario
				WHERE id_usuario = '$this->id_usuario';
			";
			$DB = new DB();

			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin
			--------------------------------------------------

		*/

		public function ReadByEmail($email){
			$sql = "
				SELECT
					 t1.id_usuario,
					 t1.nome_usuario,
					 t1.email_usuario,
					 t1.senha_usuario,
					 t1.matricula_usuario

				FROM
					usuario AS t1
				WHERE
					t1.email_usuario = '$email'

			";


			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}


		/*
			--------------------------------------------------
			Viewer SPecific methods -- end
			--------------------------------------------------

		*/


		//constructor

		function __construct() {
			$this->id_usuario;
			$this->nome_usuario;
			$this->email_usuario;
			$this->senha_usuario;
			$this->matricula_usuario;


		}

		//destructor
		function __destruct() {
			$this->id_usuario;
			$this->nome_usuario;
			$this->email_usuario;
			$this->senha_usuario;
			$this->matricula_usuario;


		}

	};

?>
