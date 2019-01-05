<?php
class DepartmentsCourses {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "DepartmentsCourses";
    //associated table names
    
	// table columns
	public $id;
    public $department_id;
    public $course_id;
    public $semester;

	public function __construct($connection){
		$this->connection = $connection;
	}

    public function create(){
        $query = "INSERT INTO " . $this->table_name . 
        " (department_id, , semester) " . 
        " VALUES (?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->department_id,
            $this->course_id,
            $this->semester]);

        return $this->connection->lastInsertId();
    }
    
    public function update(){
        $query = "UPDATE " . $this->table_name . " SET " .
        "department_id=?, course_id=?, semester=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->department_id,
            $this->course_id,
            $this->semester,
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
			"departmentsCourses" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->id]);

		$data = $stmt->fetch(PDO::FETCH_OBJ);
        
        return $data;
    }

}
?>