<?php 

class Crud  
{
	private $host = "localhost";
	private $dbname= "crud";
	private $username = "root";
	private $password = "a";
	public $connection;

	public function __construct(){
		$this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname ,$this->username ,$this->password);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->exec("SET NAMES 'utf8'");
		//var_dump($this->connection);
	}

	public function create($name, $address, $phone, $gender){
		$sql = "INSERT INTO info(name, address, phone, gender) VALUES (:name, :address, :phone, :gender)";
		$query = $this->connection->prepare($sql);
		$query->execute(array(':name'=>$name,
							  ':address'=>$address,
							  ':phone'=>$phone,
							  ':gender'=>$gender));
	}

	public function read(){
		$sql = "SELECT * FROM info";
		$query = $this->connection->query($sql);
		$query->execute();
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	public function getValueById($id){
		$sql ="SELECT * FROM info WHERE id=:id";
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id));
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

	public function update($id, $name, $address, $phone, $gender){
		$sql = "UPDATE info SET name=:name, address=:address, phone=:phone, gender=:gender WHERE id=:id" ;
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id,
							   ':name'=>$name,
							   ':address'=>$address,
							   ':phone'=>$phone,
							   ':gender'=>$gender,
							   )); 
	}
	public function delete($id){
		$sql = "DELETE FROM info WHERE id=:id";
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id));
		return true;
	}
}