<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Status {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_status;
		private $id_mensagem;
		private $id_usuario;
		private $status_mensagem;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_status, $id_mensagem, $id_usuario, $status_mensagem) { 
			$this->id_status = $id_status;
			$this->id_mensagem = $id_mensagem;
			$this->id_usuario = $id_usuario;
			$this->status_mensagem = $status_mensagem;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO status 
						  (
				 			id_status,
				 			id_mensagem,
				 			id_usuario,
				 			status_mensagem
						  )  
				VALUES 
					(
				 			'$this->id_status',
				 			'$this->id_mensagem',
				 			'$this->id_usuario',
				 			'$this->status_mensagem'
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
					 t1.id_status,
					 t1.id_mensagem,
					 t1.id_usuario,
					 t1.status_mensagem
				FROM
					status AS t1
				WHERE
					t1.id_status  = '$id'

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
					 t1.id_status,
					 t1.id_mensagem,
					 t1.id_usuario,
					 t1.status_mensagem
				FROM
					status AS t1
				

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
					 t1.id_status,
					 t1.id_mensagem,
					 t1.id_usuario,
					 t1.status_mensagem
				FROM
					status AS t1
					
					
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
				UPDATE status SET
				
				  id_mensagem = '$this->id_mensagem',
				  id_usuario = '$this->id_usuario',
				  status_mensagem = '$this->status_mensagem'
				
				WHERE id_status = '$this->id_status';
				
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
				DELETE FROM status
				WHERE id_status = '$this->id_status';
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
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_status;
			$this->id_mensagem;
			$this->id_usuario;
			$this->status_mensagem;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_status;
			$this->id_mensagem;
			$this->id_usuario;
			$this->status_mensagem;
			
			
		}
			
	};

?>
