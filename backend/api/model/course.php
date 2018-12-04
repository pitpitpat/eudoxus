<?php
class Course {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "courses";
    //associated table names
    private $department_courses_table_name = "DepartmentsCourses";

	// table columns
	public $id;
	public $name;
    public $professor;
    
    public function __construct($connection){
		$this->connection = $connection;
	}


	public function create(){
	}
    
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->connect()->query($query);

        $data = [
			"courses" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$id]);

		$data = [
			"course" => $stmt->fetch()
		];
    }
    
    public function getByDepartmentId($departmentId) {
        $query = "SELECT c.* FROM " . $this->table_name . " c, " .
                  $this->department_courses_table_name . " dc WHERE dc.departmentId=?";

        $stmt = $this->connection->prepare($query);
        $stmt->execute([$id]);

        $data = [
			"courses" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

}
?>