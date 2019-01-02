<?php
class Department {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "departments";
    //associated table names
    private $students_table_name = "Students";
    
	// table columns
	public $id;
    public $name;
    public $university_id;
    public $address;
    public $city;
    public $postalcode;
    public $county;
    public $semesters;

	public function __construct($connection){
		$this->connection = $connection;
	}

    public function create(){
        $query = "INSERT INTO " . $this->table_name . 
        " (name, univeresity_id, address, city, postalcode, county, semesters) " . 
        " VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([
            $this->name,
            $this->university_id,
            $this->address,
            $this->city,
            $this->postalcode,
            $this->county,
            $this->semesters]);

        return $this->connection->lastInsertId();
    }
    
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET " .
        "name=?, university_id=?, address=?, city=?, postalcode=?, county=?, semesters=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->name,
            $this->university_id,
            $this->address,
            $this->city,
            $this->postalcode,
            $this->county,
            $this->semesters,
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
			"departments" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = [
            "department" => $stmt->fetch(PDO::FETCH_OBJ)
        ];
        
        return $data;
    }

    public function getByUniversity() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE university_id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->university_id]);

		$data = [
            "departments" => $stmt->fetchAll(PDO::FETCH_CLASS),
            "count" => $stmt->rowCount()
        ];
        
        return $data;
    }

    public function getByStudentId($studentId) {
        $query = "SELECT * FROM " . $this->table_name . 
                 " WHERE id in (select department_id from " . $this->students_table_name . " where id = ?)";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$studentId]);

		$data = [
			"department" => $stmt->fetch(PDO::FETCH_OBJ)
        ];
        
        return $data;
    }

}
?>