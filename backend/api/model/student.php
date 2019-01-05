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
    public $email;
    public $phone;

	public function __construct($connection){
		$this->connection = $connection;
	}

	public function create(){
        $query = "INSERT INTO " . $this->table_name .
        " (department_id, name, surname, code, password, email, phone) " . 
        " VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            $this->department_id,
            $this->name,
            $this->surname,
            $this->code,
            $this->password,
            $this->email,
            $this->phone
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
			"students" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

		return $data;
	}

	public function getById(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

        $data = [false];

        if (($studentFetched = $stmt->fetch(PDO::FETCH_OBJ)) !== false) {
            $data = $studentFetched;
        }
        
		return $data;
	}

	public function update(){
        $query = "UPDATE " . $this->table_name . " SET " .
        "department_id=?, name=?, surname=?, code=?, password=?, email=?, phone=? WHERE id=?";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->department_id,
            $this->name,
            $this->surname,
            $this->code,
            $this->password,
            $this->email,
            $this->phone,
            $this->id]);

    }

	public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->id]);
    }

    public function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE code=? AND password=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->code, $this->password]);

        $data = [false];

        if (($studentFetched = $stmt->fetch(PDO::FETCH_OBJ)) !== false) {
            $data = $studentFetched;
        }

		return $data;
    }

    public function existsByCode($code) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE code=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

        $data = NULL;

        if (($studentFetched = $stmt->fetch(PDO::FETCH_OBJ)) !== false) {
            $data = [true];
        }
        
		return $data;
    }
}
?>