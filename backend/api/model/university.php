<?php
class University {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "universities";
    //associated table names
    private $students_table_name = "students";
    private $secretaries_table_name = "secretaries";
    private $departments_table_name = "departments";

	// table columns
	public $id;
	public $name;
    
    public function __construct($connection){
		$this->connection = $connection;
	}


	public function create(){
        $query = "INSERT INTO " . $this->table_name . 
        " (name) " . 
        " VALUES (?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->name]);

        return $this->connection->lastInsertId();
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET " .
        "name=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->name,
            $this->id]);
    }

    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$this->id]);
    }
    
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $data = [
			"universities" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function getByDepartmentId($departmentId) {
        $query = "SELECT * FROM " . $this->table_name . 
        " WHERE id in (SELECT university_id FROM " . $this->departments_table_name . " WHERE id=?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$departmentId]);

        $data = [
			"universities" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getByStudentId($studentId) {
        $query = "SELECT * FROM " . $this->table_name . 
        " WHERE id in (SELECT university_id FROM " . $this->departments_table_name . " WHERE" . 
        " id in (SELECT department_id FROM " . $this->students_table_name . " WHERE id=?))";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$studentId]);

        $data = $stmt->fetch(PDO::FETCH_OBJ);

        return $data;
    }

    public function getBySecretaryId($secretaryId) {
        $query = "SELECT * FROM " . $this->table_name . 
        " WHERE id in (SELECT university_id FROM " . $this->departments_table_name . " WHERE" . 
        " id in (SELECT department_id FROM " . $this->secretaries_table_name . " WHERE id=?))";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$secretaryId]);

        $data = [
			"universities" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }
}
?>