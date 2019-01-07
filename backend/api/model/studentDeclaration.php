<?php
class StudentDeclaration {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "studentDeclaration";
    //associated table names

	// table columns
	public $id;
    public $timestamp;
    public $student_id;
    public $code;
    public $semester;

	public function __construct($connection){
		$this->connection = $connection;
	}

    public function create(){
        $query = "INSERT INTO " . $this->table_name .
        " (timestamp, student_id, code, semester) " .
        " VALUES (?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->timestamp,
            $this->student_id,
            $this->code,
            $this->semester]);

        return $this->connection->lastInsertId();
    }

    public function update(){
        $query = "UPDATE " . $this->table_name . " SET " .
        "timestamp=?, student_id=?, code=?, semester=? WHERE id=?";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->timestamp,
            $this->student_id,
            $this->code,
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
			"declarations" => $stmt->fetchAll(PDO::FETCH_CLASS),
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

    public function getByStudentId() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE student_id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->student_id]);

		$data = [
            "declaration" => $stmt->fetchAll(PDO::FETCH_CLASS),
            "count" => $stmt->rowCount()
        ];

        return $data;
    }

}
?>