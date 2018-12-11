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
        $query = "INSERT INTO " . $this->table_name .
        " (department_id, name, surname, code, password) " . 
        " VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            $this->department_id,
            $this->name,
            $this->surname,
            $this->code,
            $this->password
        ]);

        $data = [
			"id" => $this->connection->lastInsertId()
		];

        return $data;
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

	public function getById(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = [
			"student" => $stmt->fetchAll()
		];

		return $data;
	}

	public function update(){
        $query = "UPDATE " . $this->table_name . " SET " .
        "department_id=?, name=?, surname=?, code=?, password=? WHERE id=?";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->department_id,
            $this->name,
            $this->surname,
            $this->code,
            $this->password,
            $this->id]);

    }

	public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->id]);
    }
}
?>