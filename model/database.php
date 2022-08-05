<?php 

class Database
{
	//connection variables
	// private $db_host="localhost";
	// private $db_user="u282558932_root";
	// private $db_pass="Tours@#Improu$34";
	// private $db_name="u282558932_tours";

	private $db_host="localhost:3309";
	private $db_user="root";
	private $db_pass="";
	private $db_name="tours";

	private $conn=false;
	private $pdo=null;


	//make connection
	public function __construct()
	{	
		//if connection is not established then make connection
		if(!$this->conn){

			try
			{
				$this->pdo=new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name,$this->db_user, $this->db_pass);
				$conn=true;
			}
			catch (PDOException $e)
			{
				array_push($this->result,$e->getMessage());
				return false;
			}

		}
		else{
			return true;
		}
		
	}

	function runBasicQuery($sql){
		$result=array();
		$query=$this->pdo->query($sql);

		if($query){
			$result=$query->fetchAll(PDO::FETCH_ASSOC);
		}

		return $result;

	}


	function runInsertQuery($sql){

		if($this->pdo->query($sql)){
				return $this->pdo->lastInsertId();
		}else{
				return 0;
		}

	}

	function runUpdateQuery($sql){
		
		$stmt=$this->pdo->prepare($sql);

		if($stmt->execute()){
				return $stmt->rowCount();
		}else{
				return 0;
		}

	}

	function runDeleteQuery($sql){
		
		$stmt=$this->pdo->prepare($sql);

		if($stmt->execute()){
				return $stmt->rowCount();
		}else{
				return 0;
		}

	}



	//destroy connection
	public function __destruct(){
		if($this->conn){
			$this->pdo=null;
			$this->conn=false;
			return true;
		}else{
			return false;
		}
	}



}//Database class ends

?>