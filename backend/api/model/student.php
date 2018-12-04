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

	public function create($newStudent){
        $query = "INSERT INTO " . $this->table_name . 
        " (department_id, name, surname, code, password) " . 
        " VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$newStudent->department_id,
            $newStudent->name,
            $newStudent->surname,
            $newStudent->code,
            $newStudent->password]);

        return $this->connection->lastInsertId;
	}

	public function getAll() {
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

	public function update($student){
        $query = "UPDATE " . $this->table_name . " SET " .
        "department_id=?, name=?, surname=?, code=?, password=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$student->department_id,
            $student->name,
            $student->surname,
            $student->code,
            $student->password,
            $student->id]);

    }

	public function delete($id){
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$id]);
    }
}
?>