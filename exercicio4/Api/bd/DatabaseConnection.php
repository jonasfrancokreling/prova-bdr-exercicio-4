<?php 

class DatabaseConnection{

	//Colocar as informações padrão para acessar a base de dados.
	protected $conn;
	private $db = 'provabdr';
	private $server = 'localhost';
	private $user = 'root';
	private $password = '78951236';
	
	function __construct() {
		//Usar definiçoes padrão.
	}
	
	function __destruct(){
		
	}
	
	private function closeConnection(){
		$this->conn->close();
	}
	
	private function connect(){
		$this->conn = new mysqli($this->server,$this->user,$this->password,$this->db);
		if($this->conn->connect_error){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function query($query){
		try{
			if($this->connect() === TRUE){
				$result = $this->conn->query($query);
			}else{
				return FALSE;
			}
		}catch(Exception $e){
			return FALSE;
		} 
		$this->closeConnection();
		return $result;
	}
	
}

?>