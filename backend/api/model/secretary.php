<?php
class Secretary {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "secretaries";
    //associated table names
    
	// table columns
	public $id;
    public $department_id;
    public $name;
    public $surname;
    public $username;
    public $password;
    public $email;
    public $personalEmail;
    public $phone;
    public $personalPhone;

	public function __construct($connection){
		$this->connection = $connection;
	}

	public function create(){
        $query = "INSERT INTO " . $this->table_name . 
        " (department_id, name, surname, username, password, email, personalEmail, phone, personalPhone) " . 
        " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->department_id,
            $this->name,
            $this->surname,
            $this->username,
            $this->password,
            $this->email,
            $this->personalEmail,
            $this->phone,
            $this->personalPhone]);

        return $this->connection->lastInsertId;
    }
    
    public function update(){
        $query = "UPDATE " . $this->table_name . " SET " .
        "department_id=?, name=?, surname=?, username=?, password=?, email=?, personalEmail=?, phone=?, personalPhone=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->department_id,
            $this->name,
            $this->surname,
            $this->username,
            $this->password,
            $this->email,
            $this->personalEmail,
            $this->phone,
            $this->personalPhone,
            $this->id]);

    }

    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->id]);
    }

   public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->connect()->query($query);

        $data = [
			"secretaries" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = [false];

        if (($secretaryFetched = $stmt->fetch(PDO::FETCH_OBJ)) !== false) {
            $data = [
                "secretary" => $secretaryFetched
            ];
        }
        
        return $data;
    }

    public function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username=? AND password=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->username, $this->password]);

        $data = [false];

        if (($studentFetched = $stmt->fetch(PDO::FETCH_OBJ)) !== false) {
            $data = [
                "secretary" => $studentFetched
            ];
        }

		return $data;
    }

    public function existsByUsername($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username=?";

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