<?php
class StudentBook {

    // Connection instance
	private $connection;

	// table name
    private $table_name = "StudentBooks";
    //associated table names
    
	// table columns
	public $id;
    public $book_id;
    public $student_id;
    public $availability;

	public function __construct($connection){
		$this->connection = $connection;
	}

    public function create(){
        $query = "INSERT INTO " . $this->table_name . 
        " (book_id, , student_id) " . 
        " VALUES (?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->book_id,
            $this->shop_id,
            $this->availability]);

        return $this->connection->lastInsertId();
    }
    
    public function update(){
        $query = "UPDATE " . $this->table_name . " SET " .
        "book_id=?, student_id=? WHERE id=?";
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute(
            [$this->book_id,
            $this->student_id,
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
			"studentBooks" => $stmt->fetchAll(PDO::FETCH_CLASS),
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

    public function getByBookId() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE book_id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->book_id]);

		$data = [
			"studentBooks" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];
        
        return $data;
    }

    public function getByStudentId() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE student_id=?";

		$stmt = $this->connection->prepare($query);
		$stmt->execute([$this->student_id]);

		$data = [
			"studentBooks" => $stmt->fetchAll(PDO::FETCH_CLASS),
			"count" => $stmt->rowCount()
		];
        
        return $data;
    }

}
?>