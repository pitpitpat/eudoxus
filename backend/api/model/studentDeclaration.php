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

	public function __construct($connection){
		$this->connection = $connection;
	}

    public function create($relation){
        $query = "INSERT INTO " . $this->table_name . 
        " (timestamp, student_id, code) " . 
        " VALUES (?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$relation->timestamp,
            $relation->student_id,
            $relation->code]);

        return $this->connection->lastInsertId;
    }
    
    public function update($relation){
        $query = "UPDATE " . $this->table_name . " SET " .
        "timestamp=?, student_id=?, code=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$relation->timestamp,
            $relation->student_id,
            $relation->code,
            $relation->id]);

    }

    public function delete($id){
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute([$id]);
    }

   public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->connect()->query($query);

        $data = [
			"declarations" => $stmt->fetchAll(),
			"count" => $stmt->rowCount()
		];

        return $data;
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$id]);

		$data = [
			"declaration" => $stmt->fetch()
        ];
        
        return $data;
    }

}
?>