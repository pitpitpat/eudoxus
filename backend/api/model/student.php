<?php
class Student {

	// Connection instance
	private $connection;

	// table name
	private $table_name = "students";

	// table columns
	public $id;
	public $department_id;
	public $name;
	public $surname;
	public $code;
	public $password;

	public function __construct($connection){
		$this->connection = $connection;
	}


	public function create(){
	}

	public function getAll(){
		$query = "SELECT * FROM " . $this->table_name;

		$stmt = $this->connection->prepare($query);
		$stmt->execute();

		$data = [
			"students" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

		return $data;
	}

	public function getById($id){
		$query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$id]);

		$data = [
			"student" => $stmt->fetch()
		];

		return $data;
	}

	public function update(){}

	public function delete(){}
}
?>